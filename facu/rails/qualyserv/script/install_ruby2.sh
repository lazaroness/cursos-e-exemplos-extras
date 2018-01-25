#!/bin/bash
# Author:: Lazarone Santos Santana
# Email::  lazarone.info.web@gmail.com
# Time::   27/02/2016

echo "DESEJA INSTALAR O RUBY/RAILS [s/n]"
read INSTALL_RUBY
if [ "$INSTALL_RUBY" != "s" ]; then
  echo "Ruby não será instalado"
else
  clear
  echo "Instalando algumas Dependencias"
  apt-get install build-essential openssl libreadline6 libreadline6-dev curl git-core zlib1g zlib1g-dev libssl-dev libyaml-dev libsqlite3-dev sqlite3 libxml2-dev libxslt-dev autoconf libc6-dev ncurses-dev automake libtool bison subversion pkg-config

#  clear
#  echo "Instalando o MYSQL"
#  apt-get install mysql-server
#  apt-get install libmysqlclient-dev

  clear
  echo "Instalando o POSTGRESQL"
  apt-get install postgresql-9.4
  apt-get install libpq-devgem install pg

  clear
  echo "Baixando o ruby-2.2.4"
  wget http://ftp.ruby-lang.org/pub/ruby/2.2/ruby-2.2.4.tar.gz

  clear
  echo "Descompactando o ruby em /usr/local"
  tar zxvf ruby-2.2.4.tar.gz -C /usr/local
  cd /usr/local/ruby-2.2.4/

  clear
  echo "Cofigurando o ruby"
  ./configure

  clear
  echo "Compilando o ruby"
  make

  clear
  echo "Iniciando a Intalação do Ruby"
  make install

  clear
  echo "Atualizando as gem's"
  gem update --system

  echo "Instalando o RAILS"
  gem install rails

  echo "Instalando a conexão do Rails com PostegreSQL"
  gem install pg
fi

clear

#echo "CONFIGURAR O HEROKU? [s/n]"
#read CONFIG_HEROKU
#if [ "$CONFIG_HEROKU" != "s" ]; then
#  echo "HEROKU não será configurado."
#else
#  clear
#  echo "Instalando o Heroku Toolbelt"
#  wget -O- https://toolbelt.heroku.com/install-ubuntu.sh | sh
#  heroku
#  heroku login

# https://serene-fortress-99299.herokuapp.com/
echo "Instalação Finalizada!!!"

#fi
