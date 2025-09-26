#!/bin/bash

# Create SQLite database if it doesn't exist
echo "Setting up SQLite database..."
touch /var/www/html/database/database.sqlite
chmod 664 /var/www/html/database/database.sqlite

echo "Running migrations..."
php artisan migrate --force

echo "Creating storage link..."
php artisan storage:link

echo "Clearing and caching config..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting Apache..."
apache2-foreground
