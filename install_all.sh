#!/bin/bash

## Hi folks, hope you kinda get what needs to get done til this stuff runs, cause a little adjustments need to get made if you haven't admin rights or you run in a jailed home or whatever...
# make a docker container und push it please
# also make a instance directory to choose between servers...
# and i am using a free domain which will deactivate after 6 months and i will not care because you are not paying me enough, so here is the code build something with it...
# ohhh and you might want to ask yourself which part of that code is the heart of the miracle which does the magic...
# its start_zeiterfassung(credentials) in parallelInteractions.py. credentials is a dictionary with (trying to remember...)the keys 'username' and 'password' or shit (i don't look that now up, i don't care)
# and if you deploy an instance of my code then you owe me a half hour of help.
#
# Laissez-faire - fahayek
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


