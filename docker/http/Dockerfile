FROM php:7.3-apache

WORKDIR /var/www/app
RUN apt update && apt install -y zip unzip git && docker-php-ext-install pdo_mysql && apt clean
RUN cd /tmp && curl -sS https://getcomposer.org/installer | php && mv /tmp/composer.phar /usr/local/bin/composer
RUN mkdir -p /var/www/app/public && rm -rf /var/www/html && ln -s /var/www/app/public /var/www/html
RUN a2enmod rewrite
COPY www.conf  /etc/apache2/conf-enabled/www.conf
