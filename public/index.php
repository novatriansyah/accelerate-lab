<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Self-healing: restore .env and storage symlink if deleted by Hostinger Git deployment
$projectRoot = dirname(__DIR__);
$envPath = $projectRoot . '/.env';
if (!file_exists($envPath)) {
    // Extract home directory safely from the file path to avoid calling restricted functions
    $homeDir = '';
    $pathParts = explode('/', __FILE__);
    if (isset($pathParts[1]) && $pathParts[1] === 'home' && isset($pathParts[2])) {
        $homeDir = '/home/' . $pathParts[2];
    }

    $candidates = [
        dirname($projectRoot) . '/accelerate-config/.env',
        dirname($projectRoot, 2) . '/accelerate-config/.env',
        dirname($projectRoot, 3) . '/accelerate-config/.env',
    ];
    if ($homeDir) {
        $candidates[] = $homeDir . '/accelerate-config/.env';
    }
    if (isset($_SERVER['HOME'])) {
        $candidates[] = $_SERVER['HOME'] . '/accelerate-config/.env';
    }

    foreach ($candidates as $candidate) {
        if (!empty($candidate) && file_exists($candidate)) {
            copy($candidate, $envPath);
            break;
        }
    }
}

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->handleRequest(Request::capture());
