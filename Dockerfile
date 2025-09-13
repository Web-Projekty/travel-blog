FROM php:8.3-apache AS composer

RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY ./ /var/www/html

RUN apt-get update && apt-get install -y \
    libzip-dev

RUN composer install

FROM php:8.3-apache

# install dependencies
WORKDIR /var/www/html

RUN a2enmod rewrite
RUN a2enmod actions

# install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev
# configure PHP
#COPY php.ini /usr/local/etc/php/php.ini
RUN docker-php-ext-install pdo_mysql mysqli zip

COPY --from=composer /var/www/html /var/www/html

# RUN chown -R www-data:www-data /var/www/html

# set open ports
#EXPOSE 9000

# set environment variables
#ENV COMPOSER_HOME=/app/vendor/composer
#ENV COMPOSER_CACHE_DIR=/app/vendor/composer/cache

# prod
CMD ["bash", "-c", "apache2-foreground" ]

# dev
#CMD ["bash", "-c", "composer install && apache2-foreground" ] 
