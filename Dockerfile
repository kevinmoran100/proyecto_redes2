FROM php:7-apache
RUN docker-php-ext-install mysqli
RUN apt-get update
RUN apt-get install fail2ban
RUN apt-get install nano
RUN cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local
RUN apt install python-certbot-apache
RUN echo "<VirtualHost *:80>
    ServerAdmin admin@example.com
    ServerName redesgrupo3.eastus.cloudapp.azure.com
    DocumentRoot /var/www/html
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>" >> /etc/apache2/sites-available/redesgrupo3.eastus.cloudapp.azure.com.conf
RUN a2ensite redesgrupo3.eastus.cloudapp.azure.com.conf
RUN a2dissite 000-default.conf
RUN service apache2 reload

