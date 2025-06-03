FROM php:8.1-cli

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
