#!/bin/bash
echo "Insira o Range: " # 192.168.1.0
read RANGE
echo "Insira o Usuario: "
read USER
nmap -sP $RANGE/24 | grep for | cut -d " " -f5 >> /home/$USER/Desktop/ips_ativos_nmap.txt
