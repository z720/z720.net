FROM php:7.0-apache

VOLUME /var/www

RUN echo "ServerName localhost" | tee /etc/apache2/conf-available/fqdn.conf
RUN a2enconf fqdn
RUN a2enmod rewrite
RUN a2enmod headers

RUN apt-get update && apt-get install -y git --no-install-recommends && apt-get clean

WORKDIR /var/www

EXPOSE 80
CMD ["apache2-foreground"]
