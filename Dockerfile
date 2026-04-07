FROM php:8.1-cli

# Install mysqli
RUN docker-php-ext-install mysqli

# Set working directory
WORKDIR /app

# Copy files
COPY . /app

# Start PHP server on Railway port
CMD php -S 0.0.0.0:$PORT -t /app