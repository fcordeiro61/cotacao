#!/bin/bash
echo "Iniciando publicação do branch prod na Locaweb..."
echo "Apagando diretorio"
rm -rf prod

echo "Git clone"
git clone --branch prod git@github.com:fcordeiro61/cotacao.git ~/prod

echo "Laravel - limpando log"
echo "" > ~/prod/cotacao_app/storage/logs/laravel.log

echo "Laravel - limpando cache, rotas, config"
cd ~/prod/cotacao_app

/usr/bin/php80 artisan optimize:clear

echo "atualizando arquivos para produção - public_html"
cp ~/prod/cotacao_app/.env.prod ~/prod/cotacao_app/.env
cp -R ~/prod/cotacao_app/public/assets ~/public_html/assets
cp ~/prod/cotacao_app/public/index_prod.php ~/public_html/cotacao.php

