FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev zip libpng-dev libpq-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql zip gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project
COPY . .

# Install dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Ensure folders exist
RUN mkdir -p storage bootstrap/cache

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose port
EXPOSE 10000

# 🚀 Run Laravel safely at runtime
CMD php artisan config:clear && \
    php artisan config:cache && \
    php artisan serve --host=0.0.0.0 --port=10000