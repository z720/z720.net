FROM php:5-apache

RUN echo "ServerName z720.net" | tee /etc/apache2/conf-available/fqdn.conf
RUN a2enconf fqdn
RUN a2enmod rewrite
RUN a2enmod headers

RUN apt-get update && apt-get install -y git --no-install-recommends && apt-get clean

WORKDIR /var/www

COPY vendor /var/www/vendor
COPY html /var/www/html
COPY cache /var/www/cache
COPY config /var/www/config
COPY build /var/www
COPY deploy.sh /var/www

VOLUME /var/www

EXPOSE 80
CMD ["apache2-foreground"]
