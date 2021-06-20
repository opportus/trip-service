FROM php:7.4.20-fpm-alpine3.13

# Sets default development PHP configuration
RUN mv ${PHP_INI_DIR}/php.ini-development ${PHP_INI_DIR}/php.ini

# Sets PHP configuration
COPY ./docker/dev/trip-service/config/php.conf ${PHP_INI_DIR}/conf.d/php.ini

# Copies the service directory
COPY . /service
