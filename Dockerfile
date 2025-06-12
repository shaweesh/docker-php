# Dockerfile
FROM php:8.2-apache

# Enable mod_rewrite and SSL support
RUN a2enmod rewrite ssl

# Install PHP extensions and dependencies
RUN apt update && apt install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libzip-dev libxml2-dev libicu-dev \
    mariadb-client openssl git unzip \
  && docker-php-ext-configure gd \
      --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) \
    gd pdo mysqli pdo_mysql zip xml intl \
  && pecl install xdebug \
  && docker-php-ext-enable xdebug \
  && a2enmod ssl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Set recommended PHP.ini settings
RUN { \
    echo 'opcache.memory_consumption=128'; \
    echo 'opcache.interned_strings_buffer=8'; \
    echo 'opcache.max_accelerated_files=4000'; \
    echo 'opcache.revalidate_freq=2'; \
    echo 'opcache.fast_shutdown=1'; \
    echo 'opcache.enable_cli=1'; \
} > /usr/local/etc/php/conf.d/opcache-recommended.ini

# Install development tools
RUN apt-get update && apt-get install -y \
    vim \
    wget \
    curl \
    git \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Generate self-signed SSL certificate
# RUN mkdir -p /etc/ssl/certs /etc/ssl/private && \
#     openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
#     -keyout /etc/ssl/private/server.key \
#     -out /etc/ssl/certs/server.crt \
#     -subj "/C=US/ST=Dev/L=Localhost/O=Dev/OU=Local/CN=localhost"

#enable ssl
#openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout ssl/server.key -out ssl/server.crt -subj "/C=US/ST=Dev/L=Localhost/O=Dev/OU=Local/CN=localhost"

EXPOSE 80 443

