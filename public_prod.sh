#!/bin/bash
echo "Iniciando publicação do branch prod..."

# Garante que master esteja atualizada (opcional)
# git checkout master
# git pull origin master

# Força prod a ser igual ao master
git checkout prod
git reset --hard master

git rm -r --cached docker
git rm -r --cached docker-compose.yml
git rm -r --cached .env
git rm -r --cached public_prod.sh


git commit -m "Removendo arquivos desnecessários - docker"

# Faz push forçado para o remoto
git push origin prod --force

# Limpa arquivos não rastreados para garantir que não reste nada no HEAD
git clean -fd

echo "Publicação concluída: branch prod está igual ao master."