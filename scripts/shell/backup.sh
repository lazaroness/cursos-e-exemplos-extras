#!/bin/bash
# Autor:: Lazarone Santos Santana
# Email:: mailto:lazarone.info.web@gmail.com
# WhatsApp:: +5511993142917
# Script de backup /home/lazarone/projetos
ARQUIVO=$(date +%d%m%Y-%H%M)-projetos.tar.xz
#echo $ARQUIVO
sudo tar -Jcf /backup/projetos/$ARQUIVO -C /home/lazarone/projetos .
CONSULTA=$(ls /backup/projetos/ | grep $ARQUIVO)
#echo $CONSULTA
if [ -z $CONSULTA ]; then
  zenity --error --text="Erro ao tentar gerar o backup dps projetos\!"
else
  zenity --info --text="Backup dos Projetos foi gerado com sucesso\!\nArquivo Gerado: /backup/projetos/$ARQUIVO"
fi
