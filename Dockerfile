FROM php:7-apache
RUN docker-php-ext-install mysqli
RUN apt-get update
RUN apt-get --yes --force-yes install fail2ban 
RUN apt-get --yes --force-yes install nano
RUN cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local
RUN apt install --yes --force-yes python-certbot-apache
RUN echo "<VirtualHost *:80> \n ServerAdmin admin@example.com \n ServerName redesgrupo3.eastus.cloudapp.azure.com \n DocumentRoot /var/www/html \n ErrorLog ${APACHE_LOG_DIR}/error.log \n CustomLog ${APACHE_LOG_DIR}/access.log combined \n</VirtualHost>" >> /etc/apache2/sites-available/redesgrupo3.eastus.cloudapp.azure.com.conf
RUN a2ensite redesgrupo3.eastus.cloudapp.azure.com.conf
RUN a2dissite 000-default.conf
RUN service apache2 reload

