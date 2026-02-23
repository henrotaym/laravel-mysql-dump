FROM php:8.3-cli-alpine AS cli

COPY --from=composer:2.5.8 /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache mysql-client mariadb-connector-c && \
    docker-php-ext-install pdo pdo_mysql && \
    printf "[client]\nssl=0\n" > /root/.my.cnf

WORKDIR /opt/apps/app

COPY composer.json composer.lock ./

RUN composer install --no-scripts --no-autoloader --prefer-dist

COPY . .

RUN composer install --prefer-dist
