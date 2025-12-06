FROM php:8.2-apache

#mysqli o'rnatish
RUN docker-php-ext-install mysqli

#a2enmod rewrite
RUN a2enmod rewrite

#Fayllarni server papkasiga nusxalash
COPY . /var/www/html/

#Apache porti
EXPOSE 80
