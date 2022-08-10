FROM php:8.1-fpm

ARG user
ARG uid

# Arguments defined in docker-compose.yml

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libpq-dev \
        unzip \
        nano \
        jpegoptim \
        optipng \
        pngquant \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pgsql \
    && docker-php-ext-install pdo_pgsql

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

#Create Storage dir
RUN mkdir -p /var/www/storage/app/public && \
    chown -R $user:$user /var/www/storage/app/public

# Set working directory
WORKDIR /var/www

USER $user

