# Imagen base de PHP con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias (por ejemplo para MongoDB)
RUN apt-get update && apt-get install -y \
    libssl-dev \
    pkg-config \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Copiar tu código al contenedor
COPY . /var/www/html/

# Exponer el puerto que usará Render
EXPOSE 8080

# Configurar Apache para usar el puerto que Render proporciona
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf

# Activar módulos útiles
RUN a2enmod rewrite
