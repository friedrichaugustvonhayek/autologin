#!/bin/bash

success=1
sudo apt update || success=0
sudo apt install xclip mariadb-server apache2 php libapache2-mod-php php-mysql libmariadb-dev python3 python3-pip -y || success=0
sudo cp -r autologin_server/ /var/www/html/ || success=0
cd /var/www/html/autologin_server || success=0
sudo python3 -m venv .venv && .venv/bin/pip install -r autologinChronJob/pythonDependencies.txt || success=0
sudo mariadb < seed.sql || success=0
if [ $success -eq 1 ]; then 
	echo everything looks good so far... now just paste into the following window "(strg + shift + v)."
	read -p "... after you pressed enter ..."
	sudo xclip -selection clipboard /var/www/html/autologin_server/autologinChronJob/add2crontab
	sudo crontab -e
	echo "all neccessary files have been copyied into the server root dir /var/www/html. the source files are not needed to preserve the functionality of the autologin_server";
	firefox localhost/autologin_server/index.php;
fi


