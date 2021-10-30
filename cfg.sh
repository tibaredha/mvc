#! /bin/sh
# COLOR notification du c programming 
# printf("\033[%sm",param) la couleur de la police
# 30 Noir
# 31 Rouge
# 32 Vert
# 33 Jaune
# 34 Bleu
# 35 Magenta
# 36 Cyan
# 37 Blanc
# "5" permet de faire clignoter le texte.
# "1" active la haute intensité des caracteres.
# "7" inverse la sélection de couleurs : si votre systeme est noir sur fond blanc cela deviendra blanc sur fond noir.
# printf("\033[%sm",param)la couleur de fond
# 40 Noir
# 41 Rouge
# 42 Jaune
# 43 Vert
# 44 Bleu
# 45 Magenta
# 46 Cyan
# 47 Blanc
# couleur("34");
# printf("test");
# couleur("0");
DARKGRAY='\033[1;30m'
RED='\033[0;31m'
LIGHTRED='\033[1;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
PURPLE='\033[0;35m'
LIGHTPURPLE='\033[1;35m'
CYAN='\033[0;36m'
WHITE='\033[1;37m'
DEFAULT='\033[0m'
ORANGE='\033[1;33m'
SUM='\033[1;36m'
HEADER='\033[1;36m'
HIGHLINE='\033[7;37m'
#reinitialise la couleur a zero
NC='\033[0m'
# printf("\033[%sm",param)

show_color(){
clear
# prints a color table of 8bg * 8fg * 2 states (regular/bold)
# echo
# echo "Table for 16-color terminal escape sequences."
# echo "Replace ESC with \\033 in bash."
# echo
# echo "Background | Foreground colors"
echo "---------------------------------------------------------------------"
for((bg=40;bg<=47;bg++)); do
	for((bold=0;bold<=1;bold++)) do
		echo -en "\033[0m"" ESC[${bg}m   | "
		for((fg=30;fg<=37;fg++)); do
			if [ $bold == "0" ]; then
				echo -en "\033[${bg}m\033[${fg}m [${fg}m  "
			else
				echo -en "\033[${bg}m\033[1;${fg}m [1;${fg}m"
			fi
		done
		echo -e "\033[0m"
	done
	echo "--------------------------------------------------------------------- "
done

# echo
# echo
}

show_color1(){
clear 
local var="Hello World"
echo "---------------------------------------------------------------------"
echo -e "|1-\033[1m $var|";echo -e -n "\033[0m"

# bold effect
echo -e "|2-\033[5m $var|";echo -e -n "\033[0m"

# blink effect
echo -e "|3-\033[0m $var|";echo -e -n "\033[0m"

# back to noraml
echo -e "|4-\033[31m $var|";echo -e -n "\033[0m"

# Red color
echo -e "|5-\033[32m $var|";echo -e -n "\033[0m"

# Green color
echo -e "|6-\033[33m $var|";echo -e -n "\033[0m"

# See remaing on screen
echo -e "|7-\033[34m $var|";echo -e -n "\033[0m"
echo -e "|8-\033[35m $var|";echo -e -n "\033[0m"
echo -e "|9-\033[36m $var|";echo -e -n "\033[0m"
echo -e -n "\033[0m"

# back to noraml
echo -e "|10-\033[41m $var";echo -e -n "\033[0m"
echo -e "|11-\033[42m $var";echo -e -n "\033[0m"
echo -e "|12-\033[43m $var";echo -e -n "\033[0m"
echo -e "|13-\033[44m $var";echo -e -n "\033[0m"
echo -e "|14-\033[45m $var";echo -e -n "\033[0m"
echo -e "|15-\033[46m $var";echo -e -n "\033[0m"
echo -e "|16-\033[0m $var"
echo "---------------------------------------------------------------------"
}





# echo "Traitement des arguments de trois_arg ()"
function trois_arg
{
# Cette routine attend trois arguments
if [ $# -ne 3 ] ; then
	echo "Nombre d'arguments errones dans trois_arg()"
	return
fi
}

# trois_arg
# trois_arg un deux trois quatre
# trois_arg un deux trois


function additionne
{
# Cette routine additionne tous ses arguments, et
# affiche le résultat sur la sortie standard
local somme
local i
somme=0
for i in "$@" ; do
somme=$((somme + i))
done
echo $somme
}

# additionne "$@"

parameters=$#
check_parameters () {
# Check the number of parameters given and display help
if [ "$parameters" -ne 2  ] ; then
echo "Description : This script do this"
echo "Usage       : $0 <type : isolated or nat or full>"
echo "Example     : '$0 isolated' or '$0 nat'"
exit
fi
}

are_you_sure () {
read -r -p "Are you sure? [y/N] " response
case "$response" in
    [yY][eE][sS]|[yY])
       sleep 1
        ;;
    *)
        exit
        ;;
esac
}

#exec vim "$@"
##########################################################################
# for i in "$@"; do
# echo $i
# done
##########################################################################
# echo "tibaredha"
# a=42
# echo $a

# read x
# Ceci est une phrase
# echo $x
# Ceci est une phrase

# $(cmd) récupérer le resultat texte écrit sur le terminal par une commande dans une chaîne de caracteres 
# echo "Nous sommes le $(date). "
# $cmd   acces a la valeur de la variable cmd

#condition
# if cond; then         if test $x -eq 42; then
#       cmds
# elif cond; then
#       cmds
# else
#      cmds
# fi

# res="fr"
# case $res in
#	 "fr")
# 		 echo "Bonjour";;
# 	 "it")
#       echo "Ciao";;
#       *)
#        echo "Hello";;
# esac

#boucle
# x=10
# while [ $x -ge 0 ]; do
# 		read x
# 		echo $x
# done

# for var in 1 2 3 4; do
#         echo $var
# done


# -eq	==	Equal
# -ne	!=	Not equal
# -gt	>	Greater than
# -ge	>=	Greater than or equal
# -lt	<	Less than
# -le	<=	Less than or equal

# -e "$file" Returns true if the file exists.
# -d "$file" Returns true if the file exists and is a directory
# -f "$file" Returns true if the file exists and is a regular file
# -h "$file" Returns true if the file exists and is a symbolic link

# -z "$str" True if length of string is zero
# -n "$str  True if length of string is non-zero
# "$str"  = "$str2" True if string $str is equal to string $str2. Not best for integers. It may work but will be inconsitent
# "$str" != "$str2" True if the strings are not equal

#argument de cmd   mon_script.sh arg1 arg2 arg3 arg4
#$0,$1....$9,$#,$*,$@
# echo "0-"$0 le nom de la commande
# echo "1-"$1 les parametres de la commande
# echo "2-"$2 les parametres de la commande
# echo "#-"$# nombre de parametres de la commande
# echo "*-"$*
# echo "@-"$@ liste des parametres

##########################################################################






##########################################################################
# get user name
# username=`git config user.name`
# if [ "$username" = "" ]; then
    # echo "Could not find username, run 'git config --global user.name 'tibaredha'"
    # invalid_credentials=1
# else 
# echo $username	
# fi
# get repo name
# dir_name=`basename $(pwd)`
# read -p "Do you want to use '$dir_name' as a repo name?(y/n)" answer_dirname
# case $answer_dirname in
  # y)
    # reponame=$dir_name
    # ;;
  # n)
    # read -p "Enter your new repository name: " reponame
    # if [ "$reponame" = "" ]; then
        # reponame=$dir_name
    # fi
    # ;;
  # *)
    # ;;
# esac
# create repo
# echo "Creating Github repository '$reponame' ..."
# curl -u $username https://api.github.com/user/repos -d '{"name":"'$reponame'"}'
# echo " done."
#create empty README.md
# echo "Creating README ..."
# touch README.md
# echo " done."
# push to remote repo
# echo "Pushing to remote ..."
# git init
# git add -A
# git commit -m "first commit"
# git remote rm origin
# git remote add origin https://github.com/$username/$reponame.git
# git push -u origin master
# echo " done."

# open in a browser
# read -p "Do you want to open the new repo page in browser?(y/n): " answer_browser

# case $answer_browser in
  # y)
    # echo "Opening in a browser ..."
    # open https://github.com/$username/$reponame
    # ;;
  # n)
    # ;;
  # *)
    # ;;
# esac
##########################################################################


# shift $(($OPTIND - 1))

# DARKGRAY='\033[1;30m'
# RED='\033[0;31m'
# LIGHTRED='\033[1;31m'
# GREEN='\033[0;32m'
# YELLOW='\033[1;33m'
# BLUE='\033[0;34m'
# PURPLE='\033[0;35m'
# LIGHTPURPLE='\033[1;35m'
# CYAN='\033[0;36m'
# WHITE='\033[1;37m'
# DEFAULT='\033[0m'

# COLORS=($DARKGRAY $RED $LIGHTRED $GREEN $YELLOW $BLUE $PURPLE $LIGHTPURPLE $CYAN $WHITE )

# for c in "${COLORS[@]}";do
    # printf "\r $c tibaredha $DEFAULT "
    # sleep 1
# done



 


# FILES=/Users/tania/dev/*

# for file in $FILES
# do
    # echo $(basename $file)
# done


# for F in *
# do
	# if [[ -f $F ]]
	# then
		# echo $F: $(cat $F | wc -l)
	# fi
# done

#ls -all > tiba.txt
# mkdir mimi

#. ./myscript.sh    Notice the dot and space before the script name.

#cd mimi 

 # if [ ! -d "$HOME"/git-sources ]; then
    # mkdir "$HOME"/git-sources
# fi

# cd "$HOME"/git-sources || { printf "cd failed, exiting\n" >&2;  return 1; }

# printf "Gitsource: "
# read -r gitsource

# git clone "$gitsource"

# unset gitsource

# echo "Please choose from the options bellow"

# echo "1) Go back to your working directory"
# echo "2) Go to the 'git-sources' folder"

# read -r ans
# back="1"
# stay="2"
# if [ "$ans" = "$back" ]; then
      # cd - || { printf "cd failed, exiting\n" >&2; unset ans; return 1; }
# elif [ "$ans" = "$stay" ]; then
      # cd "$HOME"/git-sources || { printf "cd failed, exiting\n" >&2; unset ans; return 1; }
# fi

# unset ans

 # if [ $# -eq 0 ]; then     $#=nombre d' argument    $@ tous les arguments 
  # echo "oui = 0" 
 # else
  # echo "non != 0"  
 # fi

# read filename
# if [ -f $filename  ]; then
  # echo "oui this fille name "$filename" exist" 
 # else
  # echo "non this fille name "$filename" doesn't exist" 
 # fi



