FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libssl-dev

# Install PHP extensions
RUN docker-php-ext-install mysqli

# 🔥 Install MongoDB extension
RUN pecl install mongodb-1.15.0 && docker-php-ext-enable mongodb

# 🔥 Install Redis extension (IMPORTANT FIX)
RUN pecl install redis && docker-php-ext-enable redis

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project files
COPY . /app

# Install composer dependencies
RUN composer install

# Start PHP server
CMD php -S 0.0.0.0:$PORT -t /app