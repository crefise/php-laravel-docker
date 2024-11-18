#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Clear database..2."
php artisan db:wipe

echo "Running migrations..."
php artisan migrate --force

echo "Running seed..."
php artisan db:seed
