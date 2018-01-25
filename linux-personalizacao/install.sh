#!/bin/bash

clear
echo "execute: tar -xvf Apple-Arc-OSX.tar.xz"
tar -xvf Apple-Arc-OSX.tar.xz

clear
echo "execute: mv Apple-Arc-OSX /usr/share/themes/"
mv Apple-Arc-OSX /usr/share/themes/

clear
echo "execute: tar -xvf Arc.tar.xz"
tar -xvf Arc.tar.xz

clear
echo "execute: mv Arc /usr/share/themes/"
mv Arc /usr/share/themes/

clear
echo "execute: tar -xvf Paper.tar.xz"
tar -xvf Paper.tar.xz

clear
echo "execute: mv Paper /usr/share/icons/"
mv Paper /usr/share/icons/

clear
echo "Operação Finalizada."
