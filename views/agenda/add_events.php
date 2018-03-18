<?php
    $db_host="localhost";
	$db_name="grh"; 
	$db_user="root";
	$db_pass="";
	//la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
	$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	//sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
	$db  = mysql_select_db($db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");							
    //****************************************//
     $datejour = $_POST['datejour'];
	 $datemois = $_POST['datemois'];
	 $datean = $_POST['datean'];
	
	$date = $_GET['date'];
	$type = $_POST['type'];
    $titre = $_POST['titre'];
    $texte = $_POST['texte'];
	
	
	
	
	
	//*****************************************//
	$sql = "INSERT INTO agenda_events (date,type,titre,texte) 
                   VALUES ('".$date."','".$type."','".$titre."','".$texte."')";
    $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
    //header("location: ./index.php?a=agenda&uc=agendax&date=".$date);
    header("location: ./index.php?uc=calendrier&jour=$datejour&mois=$datemois&an=$datean");
?>