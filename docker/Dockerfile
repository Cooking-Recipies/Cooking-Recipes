FROM php:7.4.9-fpm-alpine

ENV COMPOSER_HOME=/application/.composer
ENV COMPOSER_MEMORY_LIMIT=-1

RUN apk update && apk upgrade \
    && apk add --no-cache zip icu-dev libzip-dev libpng-dev git \
    && curl -sS https://getcomposer.org/installer | php -- --version=2.0.7 --install-dir=/usr/local/bin --filename=composer \
    && docker-php-ext-install mysqli pdo pdo_mysql bcmath intl zip gd \
    && docker-php-ext-configure zip \
    && docker-php-ext-configure intl \