FROM php:7.3-fpm

COPY . /var/www/html
WORKDIR /var/www/html

COPY ./docker/php/php.ini /usr/local/etc/php/
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN apt-get update && apt-get install -y \
          git \
          unzip \
          vim \
          libfreetype6-dev \
          libjpeg62-turbo-dev \
          libpng-dev \
          libzip-dev

#phpのextnsionのリポをインストール。apt-getではないことに注意。
#zipを解凍するモジュール
RUN  docker-php-ext-install zip \
          #DGライブラリーをインストール
          &&  docker-php-ext-configure gd --with-png-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
          && docker-php-ext-install -j$(nproc) gd \
          #mysqlのpodドライバーのインストール
          && docker-php-ext-install zip pdo_mysql 


# nodejs install
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt-get install -y nodejs

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV COMPOSER_HOME=/usr/local/share/composer
ENV PATH $PATH:/composer/vendor/bin

RUN composer global require "laravel/installer"
RUN composer install -n --prefer-dist --no-dev 
RUN composer update
RUN npm install npm@latest -g


## Laravel Permission 
RUN chmod -R a+w storage/ bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage


