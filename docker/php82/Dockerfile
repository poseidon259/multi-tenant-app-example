FROM php:8.2-fpm

ARG user
ARG uid

# Cài đặt các dependencies và extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN docker-php-ext-install mbstring exif pcntl bcmath gd
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user
RUN chown -R $uid:$uid /var/www

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Chuyển sang user không phải root
# USER $user

# PHP82 mặc định chạy php-fpm