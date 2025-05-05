# Utiliser une image PHP officielle avec Apache
FROM php:8.1-apache

# Installer les dépendances nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Activer les réécritures d'URL Apache pour Laravel
RUN a2enmod rewrite

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier le code de l'application Laravel dans le conteneur
COPY . .

# Installer les dépendances PHP (Composer)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Exposer le port 80 pour l'application
EXPOSE 80

# Commande pour démarrer Apache avec PHP
CMD ["apache2-foreground"]
