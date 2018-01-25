#!/bin/bash
echo "Digite o IP Base da Rede: "
read IP
su -c "nmap -sP $IP/24"
