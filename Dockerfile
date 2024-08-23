FROM php:8.1-apache
# Set working directory
WORKDIR /var/www/html

# Copy your PHP files
COPY index.php /var/www/html


RUN docker-php-ext-install mysqli

# Enable mod_rewrite
RUN a2enmod rewrite


# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]