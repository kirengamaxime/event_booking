FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev zip libpng-dev libpq-dev

RUN docker-php-ext-install pdo pdo_pgsql zip gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN mkdir -p storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000
CMD sh -c "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT"
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT