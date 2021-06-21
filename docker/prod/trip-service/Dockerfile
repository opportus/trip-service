FROM php:7.4.20-fpm-alpine3.13
RUN docker-php-ext-install -j$(nproc) pdo_mysql
RUN apk add --no-cache composer
RUN mv ${PHP_INI_DIR}/php.ini-production ${PHP_INI_DIR}/php.ini
COPY ./docker/prod/trip-service/config/php.conf ${PHP_INI_DIR}/conf.d/php.ini
COPY . /service
WORKDIR /service
