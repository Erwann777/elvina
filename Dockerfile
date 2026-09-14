FROM php:8.2-cli

# Install system deps + NodeSource Node.js 20 LTS (compatible with Vite 7)
RUN apt-get update && apt-get install -y curl gnupg zip unzip git libpq-dev \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy project files
COPY . .

# Remove local dev hot-reload file if it was accidentally copied
RUN rm -f public/hot

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node.js dependencies and build Vite assets
RUN npm ci && npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache \
    && chmod +x /var/www/start.sh

EXPOSE 10000

CMD ["/bin/sh", "/var/www/start.sh"]