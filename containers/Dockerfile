FROM serversideup/php:8.4-fpm

WORKDIR /var/www/html

# Copy composer.lock and composer.json
COPY composer.lock composer.json ./

# Copy existing application directory contents
COPY --chown=www-data:www-data . .

# Install composer dependencies
RUN composer install --no-interaction --no-plugins --no-scripts

# Cache configuration
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan event:cache