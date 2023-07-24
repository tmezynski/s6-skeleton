FROM php:8.2.0-fpm-alpine3.17

RUN apk update

COPY --from=composer/composer:2.5.8-bin /composer /usr/bin/composer

RUN apk --no-cache add autoconf g++ make linux-headers
RUN pecl install pcov && docker-php-ext-enable pcov
RUN pecl install xdebug && docker-php-ext-enable xdebug
