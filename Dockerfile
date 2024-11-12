# Use the official PHP 8.2 image as the base image
FROM  php:8.3-fpm 

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    zip \
    sqlite3 \
    libsqlite3-dev \
    cron \   # Added cron as a dependency && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath \
    && rm -rf /var/lib/apt/lists/*  # Clean up APT cache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory permissions
COPY --chown=www-data:www-data . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader \
    && chown -R www-data:www-data /var/www  # Ensure proper ownership of vendor and cache

# Copy the cron job file to the cron.d directory
COPY ./docker/cronjob /etc/cron.d/laravel-cron

# Give execution rights on the cron job
RUN chmod 0644 /etc/cron.d/laravel-cron

# Apply cron job
RUN crontab /etc/cron.d/laravel-cron

# Create the log file to be able to run tail
RUN touch /var/log/cron.log

# Expose port 9000 and start php-fpm server
EXPOSE 9000

# Start cron and php-fpm
CMD ["sh", "-c", "cron && php-fpm"]
