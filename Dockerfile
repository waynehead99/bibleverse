# Use an official PHP image with Apache pre-installed
FROM php:7.4-apache

# Install necessary PHP extensions for MySQL
RUN docker-php-ext-install mysqli

# Copy the PHP source code into the container
COPY src/ /var/www/html/

# Expose port 80 to be able to access the web server
EXPOSE 80
