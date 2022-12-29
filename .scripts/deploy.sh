#!/bin/bash
set -e

echo "Deployment started ... ..."
(php artisan down) || true
export NODE_OPTIONS=--max-old-space-size=8192
git reset --hard
git pull origin production
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
php artisan clear-compiled
php artisan config:cache
php artisan optimize
npm install
npm run build

# # Run database migrations
# php artisan migrate --force

# # Exit maintenance mode
php artisan up

echo "Deployment finished Successfully!"


