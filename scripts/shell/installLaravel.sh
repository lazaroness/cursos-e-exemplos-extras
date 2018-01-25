#!/bin/bash

echo "DESEJA INSTALAR O LARAVEL [s/n]"
read INSTALL_LARAVEL
if [ "$INSTALL_LARAVEL" != "s" ]; then
  echo "Laravel não será instalado"
else
  echo "Instalando o Curl"
  apt-get install curl

  echo "Instalando o Composer"
  curl -sS https://getcomposer.org/installer | php
  mv composer.phar /usr/local/bin/composer
  composer self-update

  echo "Instalando o Laravel"
  composer global require "laravel/installer=~1.1"
  PATH="$HOME/.composer/vendor/bin:$PATH"
fi
