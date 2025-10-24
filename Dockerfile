# Usa una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala extensiones necesarias (incluye MongoDB)
RUN apt-get update && apt-get install -y \
    libssl-dev \
    pkg-config \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Copia el código al contenedor
COPY . /var/www/html/

# Configura Apache para escuchar el puerto que Render asigna
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf

# Expone el puerto de la app
EXPOSE 8080

# Activa módulos útiles de Apache
RUN a2enmod rewrite
