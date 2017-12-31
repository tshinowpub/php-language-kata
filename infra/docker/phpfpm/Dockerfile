FROM php:7.1-fpm

MAINTAINER tshinowpub <shino.t.music@gmail.com>

# Install middleware
RUN apt-get update \
    && apt-get install -y \
        curl \
        cron \
        g++ \
        git \
        gcc \
        libfreetype6-dev \
        libicu-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        libxml2-dev \
        libxslt1-dev \
        make \
        mc \
        tar \
        unzip \
        vim \
        wget

# Setting PHP
RUN docker-php-ext-configure \
  gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/

RUN docker-php-ext-install \
    bcmath \
    gd \
    hash \
    intl \
    json \
    mbstring \
    mcrypt \
    mysqli \
    opcache \
    pdo \
    pdo_mysql \
    simplexml \
    zip

RUN pecl install xdebug

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

EXPOSE 9000

CMD ["php-fpm"]
