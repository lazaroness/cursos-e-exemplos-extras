#!/bin/bash
echo "Atualizando a lista dos repositiorios(apt-get update)"
apt-get update

echo "Instalando o Qt(apt-get install qt5-default)"
apt-get install qt5-default

echo "Instalando o QtCreator(apt-get install qtcreator)"
apt-get install qtcreator
