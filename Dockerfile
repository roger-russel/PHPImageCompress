FROM php:7.1
MAINTAINER Roger Russel <rrussel@allin.com.br>

ENV TERM=xterm
WORKDIR /opt/php-multi-image-compress

RUN ln -s /var/www/vendor/bin/codecept /usr/bin/

RUN apt-get update && apt-get install -y \
  curl \
  git \
  zip \
  unzip \
  libpng-dev \
  zlib1g-dev \
  build-essential \
  && rm -rf /var/lib/apt/lists/*

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

RUN pecl install xdebug \
&& docker-php-ext-enable xdebug
