# Usando uma imagem oficial do PHP com Apache
FROM php:8.0-apache

# Instalar extensões necessárias (exemplo: MySQL)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar o módulo de reescrita do Apache
RUN a2enmod rewrite

# Copiar o conteúdo do projeto para o container
COPY src/ /var/www/html/

# Expor a porta padrão do Apache
EXPOSE 80
