# Use uma imagem oficial do PHP com Composer
FROM php:8.0-cli

# Instala extensões necessárias do PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

WORKDIR /home/dev

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

WORKDIR /home/dev/app
# Definir o diretório de trabalho dentro do container


# Comando que será executado quando o container for iniciado
#CMD ["php", "-a"]
# Rodar o bash automaticamente quando o container for iniciado
CMD ["npm", "run", "dev"]
