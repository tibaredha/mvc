#!/bin/bash
#NAVIGATION

ls      - list directory contents
pwd     - print name of current/working directory
cd      - change working directory
pushd/popd - put working directory on a stack
file     - determine file type
locate   - find files by name
updatedb - update database for locate
which    - locate a command
history  - display bash command history

#GETTING HELP

whatis  - display the on-line manual descriptions
apropos - search the manual page names and descriptions
man     - an interface to the on-line reference manuals

#WORKING WITH FILES

mkdir - create a directory/make directories
touch - change file timestamps/create empty files
cp    - copy files and directories
mv    - move (rename) files
rm    - remove files or directories
rmdir - remove empty directories

#TEXT FILES

cat - concatenate files and print on the standard output
more/less - file perusal filter for crt viewing
nano - command line text editor

#USERS

sudo   - execute a command as superuser
su     - change user ID or become another user
users  - print the user names of users currently logged in
id     - print real and effective user and group IDs

#CHANGING FILE PERMISSIONS

chmod - change permissions of a file

#KILLING PROGRAMS AND LOGGING OUT

Ctrl+C   - kill a running command
killall  - kill processes by name
exit     - log out of bash

#USEFUL SHORTCUTS

Ctrl+D - signal bash that there is no more input
Ctrl+L - redraw the screen
Ctrl++ - make text bigger in terminal emulator
Ctrl+- - make text smaller in terminal emulator

#apache2
apt-get install apache2 apache2-common
# a2enmod : permet d’activer un mod pour apache (apache2 enable mod)
# a2dismod : permet de désactiver un mod (apache2 disable mod)
# a2ensite : active un site
# a2dissite : désactive un site
# apache2ctl -t -D DUMP_MODULES : permet de voir la liste des modules activés

a2enmod rewrite
a2dismod rewrite
# create a file in site available
#/etc/apache2/sites-available/nom_du_site
#Par contre, avec apache vous devez utiliser le mode userdir et modifier le userdir.conf (dans /etc/apache2/mods-available) pour remplacer “public_html” par “www”. Enfin bref, c’est expliqué dans la vidéo, c’était juste une parenthèse pour ceux qui souhaite copier/coller ma configuration.
a2ensite 
a2dissite

# ajouter une balise directory avec le nom site  tres important !!!!!!!!!!

# security in apache2.conf 
# Server Signature off
# Servertokens Prod
# ServerName localhost
#:wq

/etc/init.d/apache2/ reload or restart

sudo service apache2 reload

#dir.conf :contient tous la liste des fichiers index.php index.html

apache2ctl -t -D DUMP_MODULES 



apt-get install mysql-server mysql-client mysql-common
apt-get install phpmyadmin
apt-get install proftpd



# Utilisez les commandes suivantes pour activer, désactiver le serveur:

# /etc/init.d/apache start
# /etc/init.d/apache stop

# Pour relire le fichier de configuration alors qu'apache est déjà lancé, utilisez :

# /etc/init.d/apache reload

# Pour activer et desactiver un module, utilisez :

# a2enmod nomModule

# a2dismod nomModule

# nomModule est le nom d'un module présent dans /etc/apaches2/mods-available

# Pour activer et desactiver un site WEB, utilisez

# a2ensite nomSite
# a2dissite nomSite

# nomSite est le nom d'un fichier de configuration du site présent dans /etc/apaches2/sites-available

# Pensez dans tous les cas à consulter les journaux afin de détecter les dysfonctionnements.




# ssh-keygen -t rsa
# Enter file in which to save the key (/home/james/.ssh/id_rsa):
# Enter passphrase (empty for no passphrase):
# Enter same passphrase again:
# ssh-copy-id utilisateur@ipduserveur
# The authenticity of host 'Server's IP address' can't be established. RSA key fingerprint is ... Are you sure you want to continue connecting (yes/no)?
# Warning: Permanently added 'SERVER IP' (RSA) to the list of known hosts. utilisateur@ipduserveur's password:
# ssh 'utilisateur@ipduserveur’










