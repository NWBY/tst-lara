FROM node:20-alpine AS node

WORKDIR /var/www/html

COPY package.json ./

RUN npm ci

COPY . .

RUN npm run build

FROM serversideup/php:8.4-fpm

WORKDIR /var/www/html

# Copy composer.lock and composer.json
COPY composer.lock composer.json ./

# Copy existing application directory contents
COPY --chown=www-data:www-data . .

# Copy node build
COPY --from=node --chown=www-data:www-data /var/www/html/public/build ./public/build

# Install composer dependencies
RUN composer install --no-interaction --no-plugins --no-scripts

# Cache configuration
RUN php artisan \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan event:cache