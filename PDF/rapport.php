<?php
if (!ISSET($_POST['annee'])||!ISSET($_POST['mois'])||!ISSET($_POST['jour'])||!ISSET($_POST['annee1'])||!ISSET($_POST['mois1'])||!ISSET($_POST['jour1']))
{
	 $datejour1 =date("Y-m-d");
	 $datejour2 =date("Y-m-d");
}
else
{
	 if(empty($_POST['annee'])||empty($_POST['mois'])||empty($_POST['jour'])||empty($_POST['annee1'])||empty($_POST['mois1'])||empty($_POST['jour1']))
	 {
	 $datejour1 =date("Y-m-d");
	 $datejour2 =date("Y-m-d");
	 }
	 else
	 {
	 $datejour1 = $_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour'];
	 $datejour2 = $_POST['annee1'].'-'.$_POST['mois1'].'-'.$_POST['jour1'];
	 }
}



define('URL', 'http://'.$_SERVER['SERVER_NAME'].'/mvc/');
if ($datejour1>$datejour2)
{
	header("Location: ".URL."pat/Rapport/") ;
}
else
{
	if ($_POST['pat']=='1') {
	header("Location: ".URL."tcpdf/RAP.php?d1=".$datejour1."&d2=".$datejour2) ;
	}
	if ($_POST['pat']=='2') {
	header("Location: ".URL."pdf/SASEVA.PHP?d1=".$datejour1."&d2=".$datejour2) ;
	}
	if ($_POST['pat']=='3') {
	header("Location: ".URL."pdf/MORSSURES.PHP?d1=".$datejour1."&d2=".$datejour2) ;
	}
	
	if ($_POST['pat']=='4') {
	header("Location: ".URL."pdf/deces.PHP?d1=".$datejour1."&d2=".$datejour2) ;
	}
	
	
	
	

}




?>