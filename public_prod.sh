#!/bin/bash
echo "Iniciando publicação do branch prod..."

set -e


# Garante que master esteja atualizada (opcional)
# git checkout master
# git pull origin master

# Força prod a ser igual ao master
git checkout prod


echo "Branch 'prod' verificada com sucesso."


# Caso o checkout tenha falhado, o script já terá parado aqui


git reset --hard master

set +e
git rm -r --cached docker
git rm -r --cached docker-compose.yml
git rm -r --cached .env
git rm -r --cached public_prod.sh
git rm -r --cached .gitignore
set -e

git commit -m "Preparação de publicação - $(date '+%Y-%m-%d %H:%M:%S')"
# Faz push forçado para o remoto
git push origin prod --force

# Limpa arquivos não rastreados para garantir que não reste nada no HEAD
git clean -fd

echo "Publicação concluída: branch prod está igual ao master."