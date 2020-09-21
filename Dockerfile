FROM php:7.3-apache
RUN apt-get update && apt-get install -y

COPY ./corona.densu.com.conf  /etc/apache2/sites-available/
COPY ./host /etc/hosts
RUN a2enmod rewrite

RUN service apache2 restart
WORKDIR /etc/apache2/sites-available/
RUN a2ensite corona.densu.com.conf

EXPOSE 80
