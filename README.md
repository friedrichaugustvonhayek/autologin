# installation

check out install_all.sh but in a nutshell you need to do shit like following:

buy the required files at [bitcoin-kleinanzeigen.cc](https://bitcoin-kleinanzeigen.cc/wordpress/?product=own-your-own-lernplattform-autologin-server)  
rent a vps if you havent already.  
choose and install an web hosting control panel and register a domain.  


install webserver (i am running apache2)  
install database  (i am running mariadb)  
install php plugin for webserver and activate php module in webserver config  
[instructions](https://www.digitalocean.com/community/tutorials/how-to-install-lamp-stack-on-ubuntu)  

- upload the files to your server working directory.  
- run seedPython.sh  
- execute seed.sql in db-program:  
    - enter db-program with `sudo mariadb` if you have choosen mariadb-server as database program.  

i tested exact these procedure and can verify that it works.  
now everything is up and running. edit the contacts.html page to your needs.  


Hi folks,

the following is more useful than mainstreammedia but still uninteresting:
nice2have:

hope you kinda get what needs to get done til this stuff runs, cause a little adjustments need to get made if you haven't admin rights or you run in a jailed home or whatever...
make a docker container und push it please
also make a instance directory to choose between servers...
and i am using a free domain which will deactivate after 6 months and i will not care because you are not paying me enough, so here is the code build something with it...
ohhh and you might want to ask yourself which part of that code is the heart of the miracle which does the magic...
its start_zeiterfassung(credentials) in parallelInteractions.py. credentials is a dictionary with (trying to remember...)the keys 'username' and 'password' or shit (i don't look that now up, i don't care)
and if you deploy an instance of my code then you owe me a half hour of help. mail to me "fahayek@postcashcash.com" but my mailserver gets rejected by some mailers because of dns shit i failed to configure... maybe try jhv83f27yhsdhfkwl3hgsadfg@proton.me

Laissez-faire - fahayek

