#!/bin/bash
# Author:: Lazarone Santos Santana
# Email::  lazarone.info.web@gmail.com
# Time::   18/11/2016

echo "DESEJA INSTALAR O RUBY/RAILS [s/n]"
read INSTALL_RUBY
if [ "$INSTALL_RUBY" != "s" ]; then
  echo "Ruby não será instalado"
else
  clear
  echo "Instalando algumas Dependencias"
  apt install elinks build-essential openssl libreadline6 libreadline6-dev curl git-core zlib1g zlib1g-dev libssl-dev libyaml-dev libsqlite3-dev sqlite3 libxml2-dev libxslt-dev autoconf libc6-dev ncurses-dev automake libtool bison subversion pkg-config
  clear
  echo "Instalando o MYSQL"
  apt install mysql-server
  apt install libmysqlclient-dev

  clear
  echo "Instalando o POSTGRESQL"
  apt install postgresql-9.4
  apt install libpq-devgem install pg

  clear
  echo "Baixando o ruby-2.3.2"
  wget http://ftp.ruby-lang.org/pub/ruby/2.3/ruby-2.3.2.tar.gz

  clear
  echo "Descompactando o ruby em /usr/local"
  tar zxvf ruby-2.3.2.tar.gz -C /usr/local

  echo "Deletando o pacote baixado"
  rm ruby-2.3.2.tar.gz

  echo "Entrando na pasta da instalação"
  cd /usr/local/ruby-2.3.2/

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
echo "Instalações finalizadas!"
