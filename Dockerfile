# Stage 1: Composer dependencies
FROM composer:2 AS vendor

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install \
      --no-dev \
      --no-scripts \
      --no-interaction \
      --prefer-dist \
      --optimize-autoloader \
      --ignore-platform-reqs

# Stage 2: Production image
FROM php:8.2-apache

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
      libicu-dev \
      libonig-dev \
      unzip \
    && docker-php-ext-install \
      intl \
      mbstring \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache modules: rewrite + setenvif (needed for Cloud Run HTTPS detection)
RUN a2enmod rewrite setenvif

# Point Apache document root at CodeIgniter's public/ directory
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
      /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
      /etc/apache2/apache2.conf \
      /etc/apache2/conf-available/*.conf

# Allow .htaccess overrides inside the public/ directory
RUN printf '<Directory /var/www/html/public>\n\
    Options -Indexes +FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n' > /etc/apache2/conf-available/ci4.conf && \
    a2enconf ci4

# Cloud Run sits behind Google's HTTPS load balancer.
# When the incoming request has X-Forwarded-Proto: https, tell PHP
# that HTTPS is on so CodeIgniter generates correct https:// asset URLs.
RUN printf '<IfModule mod_setenvif.c>\n\
    SetEnvIf X-Forwarded-Proto "https" HTTPS=on\n\
</IfModule>\n' > /etc/apache2/conf-available/cloudrun-proxy.conf && \
    a2enconf cloudrun-proxy

# Copy project source
WORKDIR /var/www/html
COPY . .

# Copy pre-built vendor directory from the composer stage
COPY --from=vendor /app/vendor ./vendor

# Create a minimal .env for production (real secrets injected via Cloud Run env vars).
# APP_BASE_URL can be passed as a Cloud Run env var (via cloudbuild.yaml substitution).
# If set, it overrides CI4's auto-detection; if empty, CI4 auto-detects from headers.
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh && \
    cp env .env && \
    sed -i 's/# CI_ENVIRONMENT = production/CI_ENVIRONMENT = production/' .env && \
    sed -i 's|# app.baseURL = .*|app.baseURL = ""|' .env

# Ensure writable/ directories exist and are owned by www-data
RUN mkdir -p writable/cache writable/logs writable/session writable/uploads && \
    chown -R www-data:www-data writable && \
    chmod -R 755 writable

# Cloud Run listens on PORT (default 8080); configure Apache accordingly
ENV PORT=8080
RUN sed -i "s/Listen 80/Listen \${PORT}/" /etc/apache2/ports.conf && \
    sed -i "s/<VirtualHost \*:80>/<VirtualHost *:\${PORT}>/" \
      /etc/apache2/sites-available/000-default.conf

EXPOSE 8080

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["apache2-foreground"]
