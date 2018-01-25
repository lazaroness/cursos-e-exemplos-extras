#!/bin/bash
#echo "Informe o usuario: "
#read USER
#echo "Informe a Mensagem: "
#read MSG
su $1 -c "DISPLAY=:0 notify-send $2"
