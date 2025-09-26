#!/bin/bash
# Build script for Render.com deployment

echo "Starting Laravel build process..."

# Install dependencies
composer install --no-dev --optimize-autoloader

# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate --force

# Create storage link
php artisan storage:link

# Clear and cache config
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Build process completed successfully!"
