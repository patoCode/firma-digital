#!/bin/bash

cd ~
git clone -b docker https://gitlab.softwarelibre.gob.bo/adsib/php-pdfsig.git
cd php-pdfsig
cd pdfsig
./make
cd ..
./make
cp lib/php_pdfsig.so /usr/lib/php/20180731/
