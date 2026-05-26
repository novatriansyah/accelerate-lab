<?php
/**
 * Accelerate Lab — Deployment Hook
 * =================================
 * Hostinger webhook does a bare `git pull` with no post-deploy steps.
 * This script restores .env, storage symlink, and caches.
 *
 * USAGE:
 *   Option 1 (manual): After each push, visit https://acceleratelab.id/deploy.php?token=YOUR_TOKEN
 *   Option 2 (automated): Add as a secondary webhook URL in Hostinger/GitHub
 *
 * SETUP (one-time via Hostinger File Manager or SSH):
 *   1. Create directory: ~/accelerate-config/
 *   2. Upload your .env file to: ~/accelerate-config/.env
 *   3. Change the DEPLOY_TOKEN below to a random string
 */

// ──────────────────────────────────────────────
// SECURITY: Token is read from DEPLOY_TOKEN env var.
// Set it in ~/accelerate-config/.env:
//   DEPLOY_TOKEN=your_random_token_here
// Generate one: php -r "echo bin2hex(random_bytes(32));"
// ──────────────────────────────────────────────
$deployToken = '';

// Try environment variable first
if (!empty(getenv('DEPLOY_TOKEN'))) {
    $deployToken = getenv('DEPLOY_TOKEN');
} else {
    // Fallback: parse from persistent .env (before Laravel bootstraps)
    $envFile = dirname(dirname(__DIR__)) . '/accelerate-config/.env';
    if (file_exists($envFile)) {
        foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            if (str_starts_with(trim($line), '#')) continue;
            if (str_starts_with($line, 'DEPLOY_TOKEN=')) {
                $deployToken = trim(substr($line, strlen('DEPLOY_TOKEN=')), '"\'');
                break;
            }
        }
    }
}

// ──────────────────────────────────────────────
// Auth check
// ──────────────────────────────────────────────
$providedToken = $_GET['token'] ?? $_SERVER['HTTP_X_DEPLOY_TOKEN'] ?? '';

if (empty($deployToken)) {
    http_response_code(500);
    die('[DEPLOY] ERROR: DEPLOY_TOKEN not configured. Set it in ~/accelerate-config/.env');
}

if (!hash_equals($deployToken, $providedToken)) {
    http_response_code(403);
    die('[DEPLOY] Unauthorized.');
}

// ──────────────────────────────────────────────
// Run deploy
// ──────────────────────────────────────────────
header('Content-Type: text/plain; charset=utf-8');
set_time_limit(120);

$projectRoot = dirname(__DIR__); // deploy.php is in public/, so go up one level
$envSource = dirname($projectRoot) . '/accelerate-config/.env'; // ~/accelerate-config/.env
$log = [];

$log[] = '==========================================';
$log[] = '[DEPLOY] Starting post-deploy tasks...';
$log[] = '[DEPLOY] ' . date('Y-m-d H:i:s');
$log[] = '[DEPLOY] Project root: ' . $projectRoot;
$log[] = '==========================================';

// ── 1. Restore .env ──
if (file_exists($envSource)) {
    copy($envSource, $projectRoot . '/.env');
    $log[] = '[DEPLOY] ✓ .env restored from ' . $envSource;
} else {
    $log[] = '[DEPLOY] ✗ WARNING: ' . $envSource . ' not found!';
    $log[] = '[DEPLOY]   Create ~/accelerate-config/.env with your production config.';

    // Emergency fallback
    if (!file_exists($projectRoot . '/.env') && file_exists($projectRoot . '/.env.example')) {
        copy($projectRoot . '/.env.example', $projectRoot . '/.env');
        $log[] = '[DEPLOY]   ⚠ Copied .env.example as emergency fallback';
    }
}

// ── 2. Storage symlink ──
$storageLink = $projectRoot . '/public/storage';
$storageTarget = $projectRoot . '/storage/app/public';

// Remove broken symlink
if (is_link($storageLink) && !file_exists($storageLink)) {
    unlink($storageLink);
}

if (!file_exists($storageLink)) {
    chdir($projectRoot);
    exec('php artisan storage:link --force 2>&1', $output, $code);

    if ($code !== 0) {
        // Manual fallback
        if (function_exists('symlink')) {
            @symlink($storageTarget, $storageLink);
        }
    }
    $log[] = '[DEPLOY] ✓ Storage symlink restored';
} else {
    $log[] = '[DEPLOY] ✓ Storage symlink already exists';
}

// ── 3. Composer install (if vendor missing or autoload stale) ──
if (!file_exists($projectRoot . '/vendor/autoload.php')) {
    chdir($projectRoot);
    exec('composer install --no-dev --optimize-autoloader --no-interaction 2>&1', $output, $code);
    $log[] = $code === 0
        ? '[DEPLOY] ✓ Composer dependencies installed'
        : '[DEPLOY] ⚠ Composer install issue (code: ' . $code . ')';
} else {
    $log[] = '[DEPLOY] ✓ Vendor directory exists (skipping composer install)';
}

// ── 4. Migrations ──
chdir($projectRoot);
exec('php artisan migrate --force --no-interaction 2>&1', $output, $code);
$log[] = $code === 0
    ? '[DEPLOY] ✓ Migrations executed'
    : '[DEPLOY] ⚠ Migrations skipped or failed (code: ' . $code . ')';

// ── 5. Cache optimization ──
$cacheCommands = [
    'config:cache' => 'Config cached',
    'route:cache' => 'Routes cached',
    'view:cache' => 'Views cached',
    'event:cache' => 'Events cached',
];

chdir($projectRoot);
foreach ($cacheCommands as $cmd => $label) {
    exec("php artisan {$cmd} 2>&1", $output, $code);
    $log[] = $code === 0
        ? "[DEPLOY] ✓ {$label}"
        : "[DEPLOY] ⚠ {$label} failed";
}

// ── 6. Permissions ──
chdir($projectRoot);
exec('chmod -R 775 storage bootstrap/cache 2>&1');
$log[] = '[DEPLOY] ✓ Permissions set';

$log[] = '==========================================';
$log[] = '[DEPLOY] Deployment complete!';
$log[] = '[DEPLOY] ' . date('Y-m-d H:i:s');
$log[] = '==========================================';

// ── Output ──
$result = implode("\n", $log);

// Also write to a log file for debugging
file_put_contents(
    $projectRoot . '/storage/logs/deploy-' . date('Y-m-d') . '.log',
    $result . "\n\n",
    FILE_APPEND
);

echo $result;
