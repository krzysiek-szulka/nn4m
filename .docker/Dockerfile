FROM php:7.4-fpm

ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/

RUN chmod uga+x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions pdo pdo_mysql apcu bcmath exif gd grpc imap intl ldap mcrypt opcache pdo_pgsql redis sockets uuid xdebug yaml zip
