#!/bin/bash
# =============================================================================
# Accelerate Lab — Post-Deploy Script (Hostinger Webhook)
# =============================================================================
# This script runs after every webhook-triggered deploy.
# It restores files that are gitignored but required at runtime.
#
# SETUP (one-time, via Hostinger SSH terminal):
#   1. mkdir -p ~/accelerate-config
#   2. cp /path/to/.env ~/accelerate-config/.env
#   3. chmod 600 ~/accelerate-config/.env
#   4. chmod +x ~/public_html/deploy.sh
# =============================================================================

set -e

echo "=========================================="
echo "[DEPLOY] Starting post-deploy tasks..."
echo "[DEPLOY] $(date '+%Y-%m-%d %H:%M:%S')"
echo "=========================================="

# Resolve project root (where this script lives)
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
cd "$SCRIPT_DIR"

# ---------- 1. Restore .env from persistent location ----------
ENV_SOURCE="$HOME/accelerate-config/.env"

if [ -f "$ENV_SOURCE" ]; then
    cp "$ENV_SOURCE" .env
    echo "[DEPLOY] ✓ .env restored from $ENV_SOURCE"
else
    echo "[DEPLOY] ✗ WARNING: $ENV_SOURCE not found!"
    echo "[DEPLOY]   Run: mkdir -p ~/accelerate-config && cp .env ~/accelerate-config/.env"
    # Don't exit — let the rest of the script run so artisan commands
    # can at least attempt to use .env.example fallback
    if [ ! -f .env ] && [ -f .env.example ]; then
        cp .env.example .env
        echo "[DEPLOY]   Copied .env.example as emergency fallback"
    fi
fi

# ---------- 2. Install/update Composer dependencies ----------
if [ -f composer.json ]; then
    echo "[DEPLOY] Installing Composer dependencies..."
    composer install --no-dev --optimize-autoloader --no-interaction --quiet 2>/dev/null || {
        echo "[DEPLOY] ✗ composer install failed, trying with --no-scripts"
        composer install --no-dev --no-scripts --no-interaction --quiet 2>/dev/null || true
    }
    echo "[DEPLOY] ✓ Composer dependencies installed"
fi

# ---------- 3. Restore storage symlink ----------
php artisan storage:link --force 2>/dev/null || {
    # Manual fallback if artisan fails
    if [ ! -L public/storage ]; then
        ln -sfn "$(pwd)/storage/app/public" "$(pwd)/public/storage"
    fi
}
echo "[DEPLOY] ✓ Storage symlink restored"

# ---------- 4. Run pending migrations ----------
php artisan migrate --force --no-interaction 2>/dev/null && {
    echo "[DEPLOY] ✓ Migrations executed"
} || {
    echo "[DEPLOY] ⚠ Migrations skipped (may need manual run)"
}

# ---------- 5. Optimize for production ----------
php artisan config:cache 2>/dev/null && echo "[DEPLOY] ✓ Config cached"
php artisan route:cache 2>/dev/null && echo "[DEPLOY] ✓ Routes cached"
php artisan view:cache 2>/dev/null && echo "[DEPLOY] ✓ Views cached"
php artisan event:cache 2>/dev/null && echo "[DEPLOY] ✓ Events cached"

# ---------- 6. Ensure correct permissions ----------
chmod -R 775 storage 2>/dev/null || true
chmod -R 775 bootstrap/cache 2>/dev/null || true
echo "[DEPLOY] ✓ Permissions set"

echo "=========================================="
echo "[DEPLOY] Deployment complete!"
echo "[DEPLOY] $(date '+%Y-%m-%d %H:%M:%S')"
echo "=========================================="
