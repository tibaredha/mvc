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