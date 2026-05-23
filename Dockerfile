FROM php:8.1-apache

# 安裝 MySQL 擴充功能
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html
