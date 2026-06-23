FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Apache config
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/portfolio.conf \
    && a2enconf portfolio

EXPOSE 80
