FROM php:8.2.10-alpine

# Copy Composer from official composer image
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

USER www-data

# Simple built in server gets the job done for local env
CMD ["php", "-S", "0.0.0.0:8080", "-t", "/app/public/"]