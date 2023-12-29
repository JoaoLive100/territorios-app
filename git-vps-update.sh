#!/bin/bash

# Diretório do seu projeto no servidor
PROJETO_DIR="/var/www/html/territorios-app"

# Certifique-se de estar na branch main
git -C $PROJETO_DIR checkout main

# Atualiza o repositório local
git -C $PROJETO_DIR pull origin main

# Reinicia o Apache (se necessário)
# sudo systemctl restart apache2   # Comente esta linha se não for necessário reiniciar o Apache

echo "Projeto atualizado com sucesso."
