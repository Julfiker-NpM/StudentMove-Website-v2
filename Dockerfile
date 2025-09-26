# Use PHP 8.1 with Apache
FROM php:8.1-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html

# Ensure CSS and JS files are accessible
RUN chmod -R 755 /var/www/html/public/css
RUN chmod -R 755 /var/www/html/public/js
RUN chmod -R 755 /var/www/html/public/images
RUN chmod -R 755 /var/www/html/public/pdf

# Create public directories if they don't exist
RUN mkdir -p /var/www/html/public/css
RUN mkdir -p /var/www/html/public/js
RUN mkdir -p /var/www/html/public/images
RUN mkdir -p /var/www/html/public/pdf

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Database will be created by MySQL service

# Set permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html
RUN chmod -R 644 /var/www/html/public/css/*.css
RUN chmod -R 644 /var/www/html/public/js/*.js
RUN chmod -R 644 /var/www/html/public/images/*

# Copy environment file for build
COPY .env.example .env

# Set basic environment variables for build
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV DB_CONNECTION=mysql

# Generate application key
RUN php artisan key:generate

# Run migrations
RUN php artisan migrate --force

# Create storage link
RUN php artisan storage:link

# Clear and cache config
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Configure Apache
RUN a2enmod rewrite
RUN a2enmod headers

# Set Apache document root to Laravel public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Add Apache configuration for CSS/JS files
RUN echo '<Directory "/var/www/html/public">' > /etc/apache2/conf-available/laravel.conf
RUN echo '    Options Indexes FollowSymLinks' >> /etc/apache2/conf-available/laravel.conf
RUN echo '    AllowOverride All' >> /etc/apache2/conf-available/laravel.conf
RUN echo '    Require all granted' >> /etc/apache2/conf-available/laravel.conf
RUN echo '</Directory>' >> /etc/apache2/conf-available/laravel.conf
RUN a2enconf laravel

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
