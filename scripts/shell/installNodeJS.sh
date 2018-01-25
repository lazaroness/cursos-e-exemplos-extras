#!/bin/bash

echo "DESEJA INSTALAR O NODEJS [s/n]"
read INSTALL_NODEJS
if [ "$INSTALL_NODEJS" != "s" ]; then
  echo "NodeJs não será instalado"
else
  echo "Instalando o Curl"
  apt-get install curl

  echo "Instalando o NodeJS"
  curl -sL https://deb.nodesource.com/setup_5.x | sudo -E bash -
  apt-get install --yes nodejs
  ln -s /usr/bin/nodejs /usr/bin/node

  echo "Verificando as versões instaladas do node e do npm"
  node -v && npm -v

  echo "Instalando o Express"
  npm install -g express-generator

  echo "Opções do Express:"
  express -h
fi

