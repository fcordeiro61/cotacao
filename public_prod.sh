#!/bin/bash
echo "Iniciando publicação do branch prod..."
# 1. Atualiza master local e prod local
#git checkout master
#git pull origin master

git checkout prod
#git pull origin prod

# 2. Atualiza prod com o conteúdo da master
git merge master

# 3. Força o add dos arquivos ignorados pelo .gitignore
git add -f $(git ls-files --others -i --exclude-standard)
git reset cotacao_app/node_modules/public-encrypt/test/test_rsa_privkey.pem

# 4. Commit (se houver mudanças)
if ! git diff-index --quiet HEAD --; then
    git commit -m "Atualiza prod com master e adiciona arquivos ignorados"
    git push origin prod
    echo "publicado prod com sucesso!"
else
    echo "Nada para commitar em prod."
fi
