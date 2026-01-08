# Start from PHP-FPM base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies + Nginx + Supervisor
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    curl \
    libpq-dev \
    nginx \
    supervisor \
    && docker-php-ext-install pdo pdo_pgsql zip

# Install Composer globally
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Copy Nginx config (create this file: docker/nginx.conf)
COPY ./docker/nginx.conf /etc/nginx/sites-available/default

# Copy Supervisor config (create this file: docker/supervisord.conf)
COPY ./docker/supervisord.conf /etc/supervisor/supervisord.conf

# Expose port 80
EXPOSE 80

# Start Supervisord to run both Nginx + PHP-FPM
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]
