FROM php:8.1-fpm
# Sử dụng image PHP 8.1 với PHP-FPM (FastCGI Process Manager) để xử lý request PHP.

# RUN apt-get update && apt-get install -y \
#     zip unzip git curl libpq-dev libpng-dev libonig-dev libjpeg-dev libfreetype6-dev \
#     && docker-php-ext-configure gd --with-freetype --with-jpeg \
#     && docker-php-ext-install pdo pdo_mysql gd mbstring opcache
# # Cập nhật danh sách gói và cài đặt các công cụ cần thiết:
# # - zip, unzip, git: Hỗ trợ làm việc với source code.
# # - libpq-dev, libpng-dev, libonig-dev, libjpeg-dev, libfreetype6-dev: Thư viện cho các tính năng như GD (xử lý ảnh), mbstring (xử lý chuỗi đa byte).
# # - pdo_mysql: Cho phép kết nối với MySQL/MariaDB.
# # - opcache: Tăng tốc xử lý PHP.

# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
# # Sao chép Composer (trình quản lý gói PHP) từ image Composer chính thức vào container.

# WORKDIR /var/www
# # Đặt thư mục làm việc mặc định là /var/www (nơi chứa mã nguồn ứng dụng Laravel).

# =====================

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
