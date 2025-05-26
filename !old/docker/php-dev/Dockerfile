# Use uma imagem oficial do PHP com Composer
FROM php:8.0-cli

# Instala extensões necessárias do PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# WORKDIR /home/dev

# Instalar dependências necessárias para o Composer
# RUN apt-get update && apt-get install -y \
#     curl \
#     git \
#     unzip \
#     && docker-php-ext-install mysqli pdo pdo_mysql mbstring exif pcntl bcmath gd \
#     && docker-php-ext-enable mysqli
#     #apt-get remove --purge nodejs npm nodejs-legacy libnode72 -y && \
#     #apt-get autoremove -y && \
#     #apt-get clean && \
#     #apt-get update && \
# RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
#     && apt-get install -y nodejs \
#     && node -v \
#     && npm -v    

RUN apt-get update && apt-get install -y \
    curl \
    wget \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql mbstring exif pcntl bcmath gd \
    && docker-php-ext-enable mysqli

RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && node -v \
    && npm -v  

# Instalar o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Baixa o php-cs-fixer e torna executável
RUN wget https://github.com/FriendsOfPHP/PHP-CS-Fixer/releases/latest/download/php-cs-fixer.phar -O /usr/local/bin/php-cs-fixer \
    && chmod +x /usr/local/bin/php-cs-fixer

WORKDIR /home/dev/cotacao_app
# Definir o diretório de trabalho dentro do container


# Comando que será executado quando o container for iniciado
#CMD ["php", "-a"]
# Rodar o bash automaticamente quando o container for iniciado

<<<<<<< HEAD:!old/docker/php-dev/Dockerfile
CMD ["tail", "-f", "/dev/null"]

#CMD ["npm", "run", "dev"]
=======
# CMD ["tail", "-f", "/dev/null"]
# CMD ["npm", "run", "dev"]
# ENTRYPOINT ["tail", "-f", "/dev/null"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
>>>>>>> w0513:docker/php-dev/Dockerfile
