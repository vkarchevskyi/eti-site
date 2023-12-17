ARG NODE_VERSION=20
ARG PHP_VERSION=8.2

FROM node:${NODE_VERSION}-bullseye AS node
FROM php:${PHP_VERSION}-fpm-bullseye

RUN apt update \
    && apt install -y nginx supervisor zip unzip libpq-dev libzip-dev libpng-dev libicu-dev \
    && apt clean autoclean \
    && docker-php-ext-configure zip \
    && docker-php-ext-configure gd --enable-gd \
    && docker-php-ext-install pdo pdo_mysql mysqli zip gd intl \
    && docker-php-ext-enable mysqli

# Install redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Install composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

# Setup nodejs
COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node /usr/local/bin/node /usr/local/bin/node
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm

# Copy nginx config
COPY .docker-local/conf/backend/nginx-site.conf /etc/nginx/sites-enabled/default

# Copy supervisor config
COPY .docker-local/conf/backend/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy entrypoint
COPY .docker-local/conf/backend/entrypoint.sh /scripts/entrypoint.sh

RUN chmod +x /scripts/entrypoint.sh

WORKDIR /var/www

COPY --chown=www-data:www-data . .

RUN echo 'alias a="php artisan"' >> ~/.bashrc

EXPOSE 80 443

ENTRYPOINT ["/scripts/entrypoint.sh"]
