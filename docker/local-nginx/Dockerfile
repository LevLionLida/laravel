FROM php:8.1-fpm

# Обновить и установить расширения
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install pdo_mysql

RUN apt install libicu-dev
RUN docker-php-ext-install intl

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd




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

#apt-get install -y libzip-dev zip && docker-php-ext-install zip#
