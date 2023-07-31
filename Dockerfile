# Use the official PHP image with Apache
FROM php:7.4-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli

# Copy the application code into the container
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html/
