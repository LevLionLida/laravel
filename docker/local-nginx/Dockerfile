FROM php:8.1-fpm

# Обновить и установить расширения
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install pdo_mysql

# Запустить проект
COPY . /var/www/html
WORKDIR /var/www/html

# Установка Xdebug

RUN chown -R www-data:www-data /var/www/html
RUN chod -R 765 /var/www/html
RUN chod -R 777 /var/www/html/storage

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN pecl install xdebug && docker-php-ext-enable xdebug

CMD "php-fpm"
