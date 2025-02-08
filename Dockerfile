FROM php:7.4-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN echo "DirectoryIndex index.php login.php halamanawal.php" >> /etc/apache2/apache2.conf

CMD ["apache2-foreground"]

