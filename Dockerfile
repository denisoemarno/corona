FROM php:apache
COPY index.php /var/www/html
COPY ./img /var/www/html
EXPOSE 80
