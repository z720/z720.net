FROM php:5-apache

VOLUME /var/www
WORKDIR /var/www

RUN echo "ServerName z720.net" | tee /etc/apache2/conf-available/fqdn.conf
RUN a2enconf fqdn
RUN a2enmod rewrite
RUN a2enmod headers

RUN apt-get update && apt-get install -y git --no-install-recommends && apt-get clean

COPY vendor /var/www/vendor
COPY html /var/www/html
COPY cache /var/www/cache
COPY config /var/www/config
COPY deploy.sh /var/www

