FROM php:7.2-fpm

ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && \
    apt-get -y install \
        apt-utils \
        g++ \
        unzip \
        libicu-dev

RUN docker-php-ext-install \
        intl

# Install system packages for PHP extensions recommended for Yii 2.0 Framework
# ENV DEBIAN_FRONTEND=noninteractive
# RUN apt-get update && \
#     apt-get -y install \
#         gnupg2 && \
#     apt-key update && \
#     apt-get update && \
#     apt-get -y install \
#             g++ \
#             git \
#             curl \
#             imagemagick \
#             libfreetype6-dev \
#             libcurl3-dev \
#             libicu-dev \
#             libfreetype6-dev \
#             libjpeg-dev \
#             libjpeg62-turbo-dev \
#             libmagickwand-dev \
#             libpq-dev \
#             libpng-dev \
#             libxml2-dev \
#             zlib1g-dev \
#             mysql-client \
#             openssh-client \
#             nano \
#             unzip \
#         --no-install-recommends && \
#         apt-get clean && \
#         rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# # Install PHP extensions required for Yii 2.0 Framework
# RUN docker-php-ext-configure gd \
#         --with-freetype-dir=/usr/include/ \
#         --with-png-dir=/usr/include/ \
#         --with-jpeg-dir=/usr/include/ && \
#     docker-php-ext-configure bcmath && \
#     docker-php-ext-install \
#         soap \
#         zip \
#         curl \
#         bcmath \
#         exif \
#         gd \
#         iconv \
#         intl \
#         mbstring \
#         opcache \
#         pdo_mysql \
#         pdo_pgsql

# RUN pecl install xdebug
# RUN docker-php-ext-enable xdebug

# ENV PHP_MEMORY_LIMIT 2G
# ENV PHP_PORT 9000
# ENV PHP_PM dynamic
# ENV PHP_PM_MAX_CHILDREN 10
# ENV PHP_PM_START_SERVERS 4
# ENV PHP_PM_MIN_SPARE_SERVERS 2
# ENV PHP_PM_MAX_SPARE_SERVERS 6

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
