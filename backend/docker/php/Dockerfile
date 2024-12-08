# Chọn image từ PHP 8.1
FROM php:8.1-fpm

# Cài đặt các phần mở rộng và công cụ cần thiết
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc
WORKDIR /var/www

# Sao chép mã nguồn vào container
COPY . .

# Cấp quyền cho thư mục lưu trữ
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Khởi chạy PHP-FPM
CMD ["php-fpm"]
