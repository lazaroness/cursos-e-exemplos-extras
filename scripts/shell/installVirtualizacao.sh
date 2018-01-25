#!/bin/bash

echo "DESEJA INSTALAR O VIRTUALBOX [s/n]"
read INSTALL_VIRTUALBOX
if [ "$INSTALL_VIRTUALBOX" != "s" ]; then
  echo "VirtualBox não será instalado"
else
  echo "Instalando o VirtualBox"
  apt-get install virtualbox
fi
