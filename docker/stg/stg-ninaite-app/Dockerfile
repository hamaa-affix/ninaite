FROM php:7.3-fpm

COPY . /var/www/ninaite
WORKDIR /var/www/ninaite
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

# install packages
RUN apt-get update && apt-get install -y \
        git \
        unzip \
        vim \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        libicu-dev \
        supervisor \
        nginx &&\
        apt-get clean -y && \
        rm -rf /var/cache/apt/archives/* /var/lib/apt/lists/*

RUN  docker-php-ext-install zip \
        #DGライブラリーをインストール
        &&  docker-php-ext-configure gd --with-png-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
        && docker-php-ext-install -j$(nproc) gd \
        #mysqlのpodドライバーのインストール
        && docker-php-ext-install zip pdo_mysql intl


# nginx 
COPY ./docker/stg/stg-ninaite-app/nginx/stg.ninaite-affix.work.conf /etc/nginx/conf.d/ninaite-affix.conf
COPY ./docker/stg/stg-ninaite-app/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./docker/stg/stg-ninaite-app/nginx/nginx.conf /etc/nginx/nginx.conf


# _PHP
RUN rm -f /usr/local/etc/php-fpm.conf.default 
RUN rm -f /usr/local/etc/php-fpm.d/www.conf.default
RUN rm -f /usr/local/etc/php-fpm.d/zz-docker.conf
COPY ./docker/stg/stg-ninaite-app/php/php-fpm.conf /usr/local/etc/php-fpm.conf
COPY ./docker/stg/stg-ninaite-app/php/php.ini /usr/local/etc/php/php.ini
COPY ./docker/stg/stg-ninaite-app/php/www.conf /usr/local/etc/php-fpm.d/www.conf


# nodejs install
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt-get install -y nodejs

#composer install
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin
RUN mv /usr/bin/composer.phar /usr/bin/composer
RUN composer install
RUN php artisan storage:link

RUN npm install npm@latest -g

# setting superviser 
COPY ./docker/stg/stg-ninaite-app/supervisor/supervisord.conf /etc/supervisord.conf
COPY ./docker/stg/stg-ninaite-app/supervisor/app.conf /etc/supervisor/conf.d/app.conf
RUN echo files = /etc/supervisor/conf.d/*.conf >> /etc/supervisord.conf


## Laravel Permission 
RUN chmod -R a+w storage/ bootstrap/cache
RUN chown -R www-data:www-data /var/www/ninaite/storage
RUN chmod -R 775 /var/www/ninaite/storage
RUN ln -sf /dev/stdout/var/log/nginx/ninaite.access.log

RUN ln -sf /dev/stdout /var/log/nginx/ninaite.access.log
RUN ln -sf /dev/stderr /var/log/nginx/ninaite.error.log
RUN ln -sf /dev/stdout  /var/log/nginx/default_access.log
RUN ln -sf /dev/stderr /var/log/nginx/default_error.log
RUN ln -sf /dev/stderr  /var/log/nginx/error.log 
RUN ln -sf /dev/stderr  /var/log/nginx/access.log

# Port to expose *outside* the container
EXPOSE 80
# Service to run
CMD ["/usr/bin/supervisord"]
