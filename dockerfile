# Menggunakan image dasar PHP 8.2 dengan server Apache
FROM php:8.2-apache

# 1. Install library sistem yang dibutuhkan untuk CodeIgniter 4 & SQLite
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    libsqlite3-dev \
    zip \
    unzip \
    && docker-php-ext-install intl zip

# 2. Aktifkan modul rewrite Apache (penting agar URL CI4 jalan)
RUN a2enmod rewrite

# 3. Tentukan folder kerja di dalam container
WORKDIR /var/www/html

# 4. Copy semua file proyek kamu dari laptop ke dalam container
COPY . /var/www/html

# 5. Ambil Composer versi terbaru secara otomatis
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Jalankan instalasi library vendor secara otomatis
RUN composer install --no-interaction --optimize-autoloader

# 7. Atur izin akses folder agar SQLite bisa menulis data
RUN chown -R www-data:www-data /var/www/html/writable \
    && chmod -R 777 /var/www/html/writable

# 8. Ubah settingan Apache agar mengarah ke folder /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Buka port 80
EXPOSE 80