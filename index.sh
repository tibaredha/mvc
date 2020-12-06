#!/bin/bash
################################################################
#index.sh                                                      #
#aide git a executer les commandes plus rapidement             #
#auteur tiba redha                                             #
#historique                                                    #
################################################################
source cfg.sh
################################################################
author="redha tiba"
script=`basename $(pwd)`
version="1.0.0"
annee=2020
username="tibaredha"
useremail="tibaredha@yahoo.fr"
# {=123  |=124  }=125  ~=126  <=60  ==61 >=62  ?=63 @=64  

##########################################################################
#C:\Program Files\Git\usr\bin
if [ ! -f /bin/tiba ]; then
cp index.sh /bin/tiba
echo "you can use tiba" 
fi
##########################################################################
if [ ! -f /bin/cfg ]; then
cp cfg.sh /bin/cfg.sh
echo "you can use cfg" 
fi
##########################################################################
# MESSAGES : message d'aide
show_help(){
	clear
	local val="$1"
	bg=41
	fg=37
	echo  "+---------------|-----------------------------------------+"
    printf "|${GREEN}$0:${YELLOW} $val ${NC}                                      |\n"
	echo -e "|\033[${bg}m\033[${fg}m                                                         \033[0m|"
	echo  "+---------------|-----------------------------------------+"
	# echo "Utilisation: $0 [EXTENSIONS]"
	# echo "Additionneur de ligne de code de vos projets"
	# echo  "+---------------|-------|--------------------------------+"
	
	#Configuration
	echo -e "| --help,--h  \t afficher l'aide                          |"
	echo -e "| --version,  \t afficher des informations de version     |"
	echo -e "| --ssh       \t set ssh key                              |"
	echo -e "| --gpg       \t set gpg key                              |"
	echo -e "| --listpath  \t afficher list path                       |"
	echo -e "| --config    \t git config -l --show-origin              |"
	#git config -l --show-origin
	#importe un projet  ou clone le projet d'xy 
	echo  "+---------------|-----------------------------------------+"
	echo -e "| --cl,       \t git clone to get the code and history    |" 
	echo  "+---------------|-----------------------------------------+"
	echo -e "| --in        \t git init a new repository                |"
	echo -e "| --ig        \t add .gitignore                           |"
	echo -e "| --rr        \t create remote repository on github       |"
	echo -e "| --ld        \t display folders and files                |"
	echo  "+---------------|-----------------------------------------+"
	
	#Faire des modifications
	echo -e "| -st,       \t git status                               |"
	echo -e "| -ac,       \t git add + commit                         |"
	#Voir l'historique
	echo -e "| -lo,       \t git log --oneline to see the history     |"
	#Gérer des branches /tags
	echo -e "| -am        \t add module : ctrl_mdl_view               |"
	echo -e "| -as,       \t add submodule : url / branch             |"
	echo -e "| -at,       \t git tag -a -m                            |"
	echo -e "| -rv        \t git remote -v                            |"
	echo -e "| -po,       \t git push origin master                   |"
	echo -e "| -pl,       \t git pull origin master                   |"
	echo -e "| -fs,       \t flow feature start feature_name          |"
	echo -e "| -ff,       \t flow feature finish feature_name         |"
	echo -e "| -rs,       \t flow release start release_name          |"
	echo -e "| -rf,       \t flow release finish release_name         |"
	echo  "+---------------|-----------------------------------------+"
    echo -e "| -ci,       \t composer init                            |"
	echo -e "| -cd,       \t composer dumpautoload                    |"
	echo  "+---------------|-----------------------------------------+"
	exit 0
}

show_config(){


git config -l --show-origin

}

composerinit(){
	clear
	echo  "---------------|-------------------------------------------"
	printf "|${GREEN}$0:${YELLOW} composer init ${NC}                                 |\n"
	echo  "---------------|-------------------------------------------"
	read -p "Do you want to init composer ? (y/n)" answer
	case $answer in
		y)
			composer init 
			
		;;
		n)
		;;
		*)
		;;
	esac

}
composerdump (){
	clear
	echo  "---------------|-------------------------------------------"
	printf "|${GREEN}$0:${YELLOW} composer dumpautoload ${NC}                         |\n"
	echo  "---------------|-------------------------------------------"
	read -p "Do you want to dumpautoload composer ? (y/n)" answer
	case $answer in
		y)
			composer dumpautoload	
		;;
		n)
		;;
		*)
		;;
	esac
}

##########################################################################
# MESSAGES : message de version
show_version(){
	clear
	local val="$1"
	bg=41
	fg=37
	echo  "+---------------|-----------------------------------------+"
    printf "|${GREEN}$0:${YELLOW} $val ${NC}                                   |\n"
	echo -e "|\033[${bg}m\033[${fg}m                                                         \033[0m|"
	echo -e "+---------------|-----------------------------------------+"
	echo -e "| $(git --version)                            |"
	echo -e "|                                                         |"
	echo -e "|(Script tools) $version                                     |"
	echo -e "|                                                         |"
	echo -e "| Copyright © $annee $author.                            |"
	echo -e "|                                                         |"
	echo -e "| Écrit par $author.                                   |"
	echo -e "+---------------|-----------------------------------------+"
	exit 0
}
##########################################################################
# MESSAGES : message d'erreur
show_error_miss(){
	clear
	echo  "+---------------------------------------------------------+"
	printf "|${GREEN}$0:${YELLOW}[EXTENSIONS]: Opérateur Non pris en charge !!!${NC}|\n"
	echo  "+----------------------------------------------------------"
	printf "|${GREEN}$0:${YELLOW} --help pour plus d'informations ${NC}             |\n"
	echo  "+----------------------------------------------------------"
	exit 1
}

##########################################################################
clone_status(){
echo  "---------------|-------|-----------------------------------"
read -p "Do you want to clone this repository $script ? (y/n)" answerx
case $answerx in
  y)
	echo  "---------------|-------|-----------------------------------"
	# Check for $script Directory
	if [ ! -d $script ]; then
	   echo "/$script folder doesn't exist"
	   git clone git@github.com:$username/$script.git  $script
	   echo  "---------------|-------|-----------------------------------"
	   echo "/$script done"
	else
	   echo "/$script folder exist"
	fi
	echo  "---------------|-------|-----------------------------------"
	;;
  n)
    read -p 'git_repository_to_clone :' repo
	if [ ! -d $repo ]; then
	   echo "/$repo folder doesn't exist"
	   git clone git@github.com:$username/$repo.git  $repo
	   echo  "---------------|-------|-----------------------------------"
	   echo "/$repo done"
	else
	   echo "/$repo folder exist"
	fi
	echo  "---------------|-------|-----------------------------------"
    ;;
  *)
    ;;
esac
# read -p 'Do you want to clone this repository '$script' ? (y/n)' repo
# read -p 'git_repository_to_clone :' repo
# read -p 'dir_repository_to_clone :' direc
# git clone  git@github.com:tibaredha/framework.git  framework
# git clone /opt/git/projet.git   git clone file:///opt/git/projet.git  git clone ssh://utilisateur@serveur/projet.git 
}
##########################################################################
feature_start()
{
	clear
	echo  "---------------|-------------------------------------------"
	printf "|${GREEN}$0:${YELLOW} ajouter feature_start ${NC}                       |\n"
	echo  "---------------|-------------------------------------------"
	read -p "Do you want to add feature_start ? (y/n)" answer
	case $answer in
		y)
			read -p 'donner nom feature : ' msgf
			git flow feature start $msgf
		;;
		n)
		;;
		*)
		;;
	esac
}
feature_finish()
{
	clear
	echo  "---------------|-------------------------------------------"
	printf "|${GREEN}$0:${YELLOW} ajouter feature_finish ${NC}                       |\n"
	echo  "---------------|-------------------------------------------"
	read -p "Do you want to add feature_finish ? (y/n)" answer
	case $answer in
		y)
			read -p 'donner nom feature : ' msgff
			git flow feature finish $msgff
		;;
		n)
		;;
		*)
		;;
	esac
}
release_start()
{
	clear
	echo  "---------------|-------------------------------------------"
	printf "|${GREEN}$0:${YELLOW} ajouter release_start ${NC}                       |\n"
	echo  "---------------|-------------------------------------------"
	read -p "Do you want to add release_start ? (y/n)" answer
	case $answer in
		y)
			read -p 'donner nom release : ' msgf
			git flow release start $msgf
		;;
		n)
		;;
		*)
		;;
	esac
}
release_finish()
{
	clear
	echo  "---------------|-------------------------------------------"
	printf "|${GREEN}$0:${YELLOW} ajouter release_finish ${NC}                       |\n"
	echo  "---------------|-------------------------------------------"
	read -p "Do you want to add release_finish ? (y/n)" answer
	case $answer in
		y)
			read -p 'donner nom release : ' msgf
			git flow release finish $msgf
		;;
		n)
		;;
		*)
		;;
	esac
}

 
# flow release 
##########################################################################
add_folder(){
	###0-contorleur
	# Check for Directory
	if [ ! -d $1 ]; then
	   echo $1" folder doesn't exist "
	   mkdir $1
	   echo $1" folder a été ajouté avec succés"
	else
	   echo $1" folder exist"
	fi
}

add_module()
{
clear
echo  "---------------|-------------------------------------------"
printf "|${GREEN}$0:${YELLOW} ajouter nom module ${NC}                          |\n"
echo  "---------------|-------------------------------------------"
read -p "Do you want to add module ? (y/n)" answer
case $answer in
y)
read -p 'ajouter nom module : ' msg

###1-contorleur
echo  "---------------|-------------------------------------------"
add_folder "controllers"
touch controllers/"$msg".php
OUTC=controllers/"$msg".php	
cat  << EOF > $OUTC 
<?php
class $msg extends Controller { 
	
	public \$controleur="$msg";
	
	function __construct() {
		parent::__construct();
		Session::init();
		\$logged = Session::get('loggedIn');
		if (\$logged == false) {
			Session::destroy();
			header('location: '.URL.'login');
			exit;
		}
		\$this->view->js = array(\$this->controleur.'/js/default.js?t='.time());
		\$this->view->css = array(\$this->controleur.'/css/default.css?t='.time());
	}
	
	function index() {
		\$this->view->title = '$msg';
		\$this->view->msg = '$msg';
		\$this->view->render(\$this->controleur.'/index');
	}
	
	
	
	
	
	
	
	
}
?>
EOF
DIR="controllers/$msg.php"
for file in $(ls $DIR); do
# Affichage du nom du fichier et de ses droits
echo "Fichier : "$file" a pour droits : "$(stat -c "%A" "$file")	  
done

###2-model
echo  "---------------|-------------------------------------------"
add_folder "models"
touch models/"$msg"_model.php
message0=$msg"_Model"
OUTM=models/"$msg"_model.php
cat  << EOF > $OUTM 
<?php
class $message0 extends Model { 
    
	public \$tbl="$msg";
   
	public function __construct() {
		parent::__construct();
	}






	
}
?>
EOF
DIR="models/$msg"_model.php
for file in $(ls $DIR); do
# Affichage du nom du fichier et de ses droits
echo "Fichier : "$file" a pour droits : "$(stat -c "%A" "$file")
done

###3-view
echo  "---------------|-------------------------------------------"
add_folder "views"
mkdir views/"$msg"
touch views/"$msg"/index.php
OUTV=views/"$msg"/index.php
cat  << EOF > $OUTV 
<?php
  
?>
EOF
DIR="views/$msg"/index.php
for file in $(ls $DIR); do
# Affichage du nom du fichier et de ses droits
echo "Fichier : "$file" a pour droits : "$(stat -c "%A" "$file")
done

###4-creer le dossier css/default.css + js /default.js
mkdir views/"$msg"/css
touch views/"$msg"/css/default.css
mkdir views/"$msg"/js
touch views/"$msg"/js/default.js

###
echo  "---------------|-------------------------------------------"
echo  "le module : $msg a été ajouté avec succés"
echo  "---------------|-------------------------------------------"
git add .
git commit -m "add module $msg"
echo  "---------------|-------------------------------------------"
;;
n)
;;
*)
;;
esac
}
##########################################################################
add_submodule(){
clear
echo  "---------------|-------------------------------------------"
printf "|${GREEN}$0:${YELLOW} ajouter nom submodule ${NC}                       |\n"
echo  "---------------|-------------------------------------------"
read -p "Do you want to add submodule ? (y/n)" answer
case $answer in
y)
read -p 'Ajouter nom submodule : ' submodule
###################################################
# 1-Add a submodule
git submodule add --force  https://github.com/tibaredha/$submodule.git
git submodule status
cat .gitmodules
# git submodule add <remote_url> <destination_folder> like : ./xxxxx
# git submodule add https://github.com/tibaredha/data.git
# git status

# git config --global diff.submodule log

# git config -f .gitmodules submodule.data.branch develop
# git submodule update --remote data

###################################################
# 2-Cloning a project with submodules
# When you clone a repository that contains submodules there are a few extra steps to be taken
# git clone /url/to/repo/with/submodules
# git submodule init
# git submodule update

###################################################
# 3-Remove a submodule
# git submodule deinit <submodule>
# git rm <submodule>
# git commit -m "removes submodule <submodule>"

###################################################
# 4-see submodule status in git status
# git config status.submodulesummary 1
# git log -p 
# git log -p --submodule
;;
n)
;;
*)
;;
esac
#git status
}
##########################################################################
show_status(){
clear
echo  "---------------|-------------------------------------------"
printf "|${GREEN}$0:${YELLOW} status ${NC}                                      |\n"
echo  "---------------|-------------------------------------------"
git status
}
##########################################################################
add_status(){
clear
git add .
# echo "ajouter message : "
read -p 'ajouter message : ' msg
git commit -a -m "$msg"
}
##########################################################################
add_tag(){
clear
read -p "Do you want to add tag? (y/n)" answer
case $answer in
  y)
    # show all tags
    git tag
    # add a new tag
    read -p "Tag Version: " tagVersion
    read -p "Tagging Message: " taggingMessage
    git tag -a $tagVersion -m "$taggingMessage"
    git push --tags
    # What's new in **** 3.0 (release date: Dec 29, 2012)
    # -------------------------------------------------------
	git tag > tag.txt
	;;
  n)
    ;;
  *)
    ;;
esac
}
##########################################################################
view_status(){
clear
echo  "---------------|-------|-----------------------------------"
# echo "preciser le nombre de commit : "
read -p 'preciser le nombre de commit :' nbr
git log --oneline  -$nbr
}
##########################################################################
pull_status(){
clear
echo  "---------------|-------|-----------------------------------"
read -p "Do you want to pull whith msg?(y/n): " answer_pull
case $answer_pull in
  y)
    git pull  
    ;;
  n)
	git pull --quiet
	;;
  *)
    ;;
esac
# git pull origin  develop
# git pull origin  master
# git fetch xxx
}
##########################################################################
push_status(){
clear
echo  "---------------|-------------------------------------------"
printf "|${GREEN}$0:${YELLOW} push online  ${NC}                                |\n"
echo  "---------------|-------------------------------------------"
read -p "Do you want to push whith msg?(y/n): " answer_push
case $answer_push in
  y)
    git push  
    ;;
  n)
	git push --quiet
	;;
  *)
    ;;
esac
# git push origin  develop
# git push origin  master
}
##########################################################################
config_status(){
clear
echo  "---------------|-------|-----------------------------------"
git init              #--bare 
git config --local user.name "$username"
git config --local user.email "$useremail"
git config --local alias.co checkout
git config --local alias.br branch
git config --local alias.ci commit
git config --local alias.st status
echo  "---------------|-------|-----------------------------------"
echo  "git init : "
echo  "---------------|-------|-----------------------------------"
git flow init
echo  "---------------|-------|-----------------------------------"
git add .
git commit -m "add index.sh  cfg.sh" 
echo  "---------------|-------|-----------------------------------"
# create empty README.md
echo "Creating README ..."
touch README.md
echo " projet : tibaredha" >> README.md
echo " done."
git add .
git commit -m "add README.md" 
echo  "---------------|-------|-----------------------------------"
# touch index.php
# cat  << EOF > index.php
# <?php
# require './libs/config.php';
# // \$cfg = './libs/cfgg.php';
# \$cfg = './libs/cfg.php';
# if(!file_exists(\$cfg)) {header('location: ./install/');}else {require \$cfg;} 
# spl_autoload_register(function (\$class) {require LIBS . \$class .".php";});
# \$app = new Bootstrap();
# ?>
# EOF
# echo " done."
# git add .
# git commit -m "add index.php" 
echo  "---------------|-------|-----------------------------------"
echo "list configuration : "
echo  "---------------|-------|-----------------------------------"
git config --list
echo  "---------------|-------|-----------------------------------"
git log
echo  "---------------|-------|-----------------------------------"
}
##########################################################################
remote_status(){
clear
# git remote
echo  "---------------|-------|-----------------------------------"
git remote -v 
# git remote show origin
# git remote add xxx urlxx   git remote add proj_local /opt/git/projet.git
# git remote rename xxx  yyy
# git remote rm  xxx
echo  "---------------|-------|-----------------------------------"
read -p "Do you want to open the new repo page $script in browser?(y/n): " answer_browser
case $answer_browser in
  y)
    echo "Opening in a browser ..."
    start https://github.com/$username/$script
    ;;
  n)
	read -p 'git_repository_to_open :' repo
	echo "Opening in a browser ..."
    start https://github.com/$username/$repo
	;;
  *)
    ;;
esac
}
##########################################################################
list_status(){
clear
list=($(ls))
echo  "---------------|-------|-----------------------------------"
for f in "${list[@]}";do
	if [[ -d $f ]]
	then	
		printf "|${YELLOW} $f  ${NC}\n"
	else
	    printf "|${WHITE} $f  ${NC}\n"
	fi
	sleep 1
	echo  "---------------|-------|-----------------------------------"
done
}
##########################################################################
show_listpath () {
clear
echo  "---------------|-------|-----------------------------------"
#a revoir
# PATH=$PATH:.
# echo $PATH
# export PATH=$PATH:/home/user/mes_prog
# echo 'export PATH=$PATH:/home/user/mes_prog' >> /home/user/.bashrc
echo $PATH | tr : \\n
echo  "---------------|-------|-----------------------------------" 
}
##########################################################################
ssh_status (){
# Exit script on Error
set -e
# Check for SSH Directory
echo  "---------------|-------|-----------------------------------"
if [ ! -d ~/.ssh ]; then
   mkdir -p ~/.ssh/
   echo "/.ssh folder doesn't exist and it was created"
else
	echo "/.ssh folder exist"
fi
# Check for existence of passphrase
if [ ! -f ~/.ssh/id_rsa.pub ]; then
        ssh-keygen -t rsa -N "" -f ~/.ssh/id_rsa
        echo "Execute ssh-keygen --[done]"
else
	    echo "/.ssh/id_rsa.pub fille exist"		
fi
# Check for existence of authorized_keys and append the shared ssh keys
if [ ! -f ~/.ssh/authorized_keys ]; then
        touch ~/.ssh/authorized_keys
        echo "Create ~/.ssh/authorized_keys --[done]"
        chmod 700 ~/.ssh/authorized_keys
        cat ~/.ssh/id_rsa.pub >> ~/.ssh/authorized_keys
        echo "Append the public keys id_rsa into authorized keys --[done]"
        chmod 400 ~/.ssh/authorized_keys
        chmod 700 ~/.ssh/
fi
# Create user's ssh config it not exist
if [ ! -f ~/.ssh/config ]; then
        touch ~/.ssh/config
        echo "StrictHostKeyChecking no" > ~/.ssh/config
        echo "StrictHostKeyChecking no --[done]"
        chmod 644 ~/.ssh/config
fi
# Unset error on exit or it will affect after bash command ðŸ™‚
set +e
echo  "---------------|-------|-----------------------------------"
}
##########################################################################
# from https://docs.github.com/en
#cle SSH
#ls -al ~/.ssh
#ssh-keygen -t ed25519 -C "your_email@example.com"
#lire la suite

#clé GPG
#gpg --list-secret-keys --keyid-format LONG
#gpg --full-generate-key
#Enter passphrase the pass phrase = tibaredha  ou laisser vide 
#git config --global user.signingkey *la clé * a 16 caractere
#gpg --armor --export  *la clé * a 16 caractere

#Copiez votre clé GPG, en commençant par -----BEGIN PGP PUBLIC KEY BLOCK-----et en terminant par -----END PGP PUBLIC KEY BLOCK-----.
#settings /SSH and GPG keys / new GPG key / copy and paste (Copiez votre clé GPG en commençant par -----BEGIN)
#github / framework / la ligne de tibaredha / commits / mention verified  est presente 

#en peut signe le tag 
#git tag -s mytag
#git tag -v mytag
gpg_status ()
{
clear
# Exit script on Error
set -e
# Check for GPG Directory
echo  "---------------|-------|-----------------------------------"
if [ ! -f ~/.gnupg/pubring.kbx ]; then
        gpg --full-generate-key
        echo "Execute ssh-keygen --[done]"
else
	    echo "/.gnupg/pubring.kbx fille exist"
echo  "---------------|-------|-----------------------------------"		      		
fi
gpg --list-secret-keys --keyid-format LONG
echo  "---------------|-------|-----------------------------------"
}
##########################################################################
addToGitignore () {
    # add filename to .gitignore
    echo  "---------------|-------|-----------------------------------"
	printf "${YELLOW} Hit q for quit ${NC}                                          |\n"
    echo  "---------------|-------|-----------------------------------"
	while :
    do
        read -p "Type file name to add to .gitignore: " filename
        # quit when
        if [ $filename = "q" ]
            then
                break
            else
               echo $filename >> .gitignore
        fi
    done

}

ignore_status(){
clear
echo  "---------------|-------|-----------------------------------"
if [ ! -f  .gitignore  ]; then
	printf "${YELLOW} .gitignore doesn't exist  ${NC}                               |\n"
echo  "---------------|-------|-----------------------------------"
	read -p "Do you want to add .gitignore? (y/n)" answer
	case $answer in
	  y)
		touch .gitignore
		addToGitignore
		;;
	  n)
		;;
	  *)
		;;
	esac
else
	printf "${YELLOW} .gitignore exist  ${NC}                                       |\n"
echo  "---------------|-------|-----------------------------------"
	read -p "Do you want to update .gitignore? (y/n)" answer
	case $answer in
	  y)
		addToGitignore
		;;
	  n)
		;;
	  *)
		;;
	esac		
fi
echo  "---------------|-------|-----------------------------------"
printf "${YELLOW} .gitignore =   ${NC}                                          |\n"
echo  "---------------|-------|-----------------------------------"
git add .
git commit -m "add .gitignore" 
cat .gitignore
git log 
}

##########################################################################
# si pas de paramètre, affiche une erreur
if [ -z  $1  ]; then 
 show_error_miss $1
fi

# if [ $# == 0 ] ; then
        # show_usage;
# fi

# if [ $# -eq 0 ] ; then
	# show_error_miss
# fi
##########################################################################
user_status(){
echo  "---------------|-------|-----------------------------------"
# get user name
username=`git config user.name`
if [ "$username" = "" ]; then
    echo "Could not find username, run 'git config --global user.name 'tibaredha'"
    invalid_credentials=1
else 
	echo $username	
fi
echo  "---------------|-------|-----------------------------------"
# get user email
useremail=`git config user.email`
if [ "$useremail" = "" ]; then
    echo "Could not find useremail, run 'git config --global user.email 'tibaredha@yahoo.fr'"
    invalid_credentials=1
else 
	echo $useremail	
fi
#pasword
echo  "---------------|-------|-----------------------------------"
}
github_status(){

user_status

dir_name=`basename $(pwd)`
read -p "Do you want to use '$dir_name' as a repo name?(y/n)" answer_dirname
case $answer_dirname in
  y)
    # use currently dir name as a repo name
    reponame=$dir_name
    ;;
  n)
    read -p "Enter your new repository name: " reponame
    if [ "$reponame" = "" ]; then
        reponame=$dir_name
    fi
    ;;
  *)
    exit 1
    ;;
esac

# create repo
echo "Creating Github repository '$reponame' ..."
curl -u "tibaredha:git030570" https://api.github.com/user/repos -d '{"name":"'$reponame'"}'
echo " done."

# create empty README.md
# echo "Creating README ..."
# touch README.md
# echo "tibaredha" >> README.md
# echo " done."

# push to remote repo
echo "Pushing to remote ..."
# git init
# git add README.md
# git commit -m "first commit"
git remote add origin git@github.com:tibaredha/$reponame.git
git push -u origin master
# git flow init
git push --set-upstream origin develop
echo " done."

echo "Opening in a browser ..."
start https://github.com/tibaredha/$reponame
}

##########################################################################
# SWITCHER
for option in "$@" ; do
	case $option in
	
        # affiche l'aide
		--h|--help)
		show_help $1;;
		# affiche la version
		--v|--version)
		show_version $1;;
		--cl)
		clone_status;;
		--in)
		config_status;;
		--ig)
		ignore_status;;
		--ssh)
		ssh_status;;
		--gpg)
		gpg_status;;
		# git github_status
		--rr)
		github_status;;
		# affiche la version
		--ld)
		list_status;;
		# affiche listpath
		--listpath)
		show_listpath;;
		# affiche config file localisation  
		--config)
		show_config;;
        ##########################################################################
		-st)
		show_status;;
		-ac)
		add_status;;
		-at)
		add_tag;;
		-lo)
		view_status;;
		-pl)
		pull_status;;
		-po)
		push_status;;
		-rv)
		remote_status;;
		-sc)
		show_color;;
		-sc1)
		show_color1;;
		-am)
		add_module;;
		-as)
		add_submodule;;
		-fs)
		feature_start;;
		-ff)
		feature_finish;;
		-rs)
		release_start;;
		-rf)
		release_finish;;
		-ci)
		composerinit;;
		-cd)
		composerdump;;
		*)
		show_error_miss $1;; 	 
	esac
done
