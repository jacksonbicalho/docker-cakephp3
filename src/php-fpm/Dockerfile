FROM php:7.2-fpm

ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && \
    apt-get -y install \
        apt-utils \
        g++ \
        unzip \
        libicu-dev \
        libpq-dev

RUN docker-php-ext-configure \
    pgsql -with-pgsql=/usr/local/pgsql

RUN docker-php-ext-install \
    intl \
    pdo \
    pdo_pgsql

COPY conf/php-fpm.conf /usr/local/etc/php-fpm.d/
COPY conf/php.ini /usr/local/etc/php/

ARG DIR_BASE

WORKDIR ${DIR_BASE}

ARG USER_ID

RUN apt-get update -yq \
    && apt-get install curl gnupg -yq \
    && curl -sL https://deb.nodesource.com/setup_8.x | bash \
    && apt-get install nodejs -yq

RUN mkdir /.config
RUN mkdir /.npm
RUN chown -R $USER_ID:$USER_ID /.config
RUN chown -R $USER_ID:$USER_ID /.npm

# Composer PHP
RUN curl -sS https://getcomposer.org/installer | \
  php -- --install-dir=/usr/local/bin --filename=composer

ENV COMPOSER_HOME /composer

COPY composer/auth.json /composer/auth.json
RUN chown -R ${USER_ID} $COMPOSER_HOME

ARG GITHUB_OAUTH
RUN sed -i.bak "s|GITHUB_OAUTH|${GITHUB_OAUTH}|g" /composer/auth.json

USER $USER_ID
