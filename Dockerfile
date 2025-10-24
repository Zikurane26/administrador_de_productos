# Usa PHP 8.2 con Apache
FROM php:8.2-apache

# Instala dependencias necesarias y el driver de MongoDB
RUN apt-get update && apt-get install -y \
    libssl-dev \
    pkg-config \
    ca-certificates \
    git unzip \
    && update-ca-certificates \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Instala Composer (copiado desde la imagen oficial)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia el código del proyecto al contenedor
WORKDIR /var/www/html
COPY . .

# Instala las dependencias PHP (incluye mongodb/mongodb)
RUN composer require mongodb/mongodb --no-interaction --no-progress \
    && composer install --no-dev --optimize-autoloader

# Configura Apache para Render (usa el puerto dinámico)
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf

# Expone el puerto correcto
EXPOSE 8080

# Activa módulos útiles de Apache
RUN a2enmod rewrite
