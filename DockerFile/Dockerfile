FROM debian:buster

RUN apt-get update
RUN apt-get install -y build-essential apache2 php7.3 php7.3-dev git curl libpodofo-dev sudo sed

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_PID_FILE /var/run/apache2/apache2.pid
ENV APACHE_RUN_DIR /var/run/apache2

COPY compile.sh /tmp
RUN /tmp/compile.sh

RUN echo 'extension=php_pdfsig' >> /etc/php/7.3/apache2/php.ini

RUN mkdir /var/www/html/validar
COPY index.php /var/www/html/validar
RUN cp ~/php-pdfsig/pdfsig/prueba.pdf /var/www/html/validar

ENTRYPOINT ["/usr/sbin/apache2"]

CMD ["-D", "FOREGROUND"]
