#!/bin/bash
echo "Iniciando publicação do branch prod..."

# Garante que master esteja atualizada (opcional)
# git checkout master
# git pull origin master

# Força prod a ser igual ao master
git checkout prod
git reset --hard master

# Faz push forçado para o remoto
git push origin prod --force

echo "Publicação concluída: branch prod está igual ao master."