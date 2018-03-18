<?php

echo 'ok';
echo '</br>';
 // $db_host="localhost";
 // $db_name="mvc"; 
 // $db_user="root";
 // $db_pass="";
 $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
 $db  = mysql_select_db($db_name,$cnx) ;
 mysql_query("SET NAMES 'UTF8' ");
 $sql=mysql_query("SELECT * FROM deces order by DATEDUDECE  asc");
echo "<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
 
 while($value=mysql_fetch_array($sql))
	{
	echo '<tr>';
	echo '<td>';echo $value['NOM'];echo '</td>';
	echo '<td>';echo $value['PRENOM'];echo '</td>';
	echo '<td>';echo $value['FILS'];echo '</td>';
	echo '<td>';echo $value['ETDE'];echo '</td>';
	echo '<td align="center"  >';echo $value['SEX'];echo '</td>';
	echo '<td align="center"  >';echo $value['DATENAISSA'];echo '</td>';
	
	//wilaya de naissance
	echo '<td>';echo $value['LIEUNAISSA'];echo '</td>';
  
	echo '<td>';echo $value['WILAYAR'];echo '</td>';
    echo '<td>';echo $value['COMMUNEDER'];echo '</td>';
    //adresse de residence
	$sql1 = "INSERT INTO pat (NOM,PRENOM,FILSDE,SEX,DATENAISSANCE,WILAYA,COMMUNE,WILAYAR,COMMUNER,ADRESSE) VALUES ('".$value['NOM']."','".$value['PRENOM']."','".$value['FILS']."','".$value['SEX']."','".$value['DATENAISSA']."','17000','924','17000','924','".$value['COMMUNEDER']."');";
	$query1 = mysql_query($sql1);
	
	
	
	
	

// hospitalisation	
	switch ($value['SERVICEDHO']) 
	{ 
		case 'PEDIATRIE': 
			$SERVICE=5;
		break;
		case 'PUMC': 
			$SERVICE=9;
		break;
		case 'C HOMME': 
			$SERVICE=3;
		break;
		case 'C FEMME': 
			$SERVICE=4;
		break;
		case 'M FEMME': 
			$SERVICE=2;
		break;
		case 'M HOMME': 
			$SERVICE=1;
		break;
		case 'BLOC': 
			$SERVICE=6;
		break;
		case 'GYNECO': 
			$SERVICE=7;
		break;
		case 'HEMODIALYS': 
			$SERVICE=9;
		break;
		case 'MATERNITE': 
			$SERVICE=8;
		break;
	 
		default:
			$SERVICE='';
	}
 //age en jour rest
	$idpat=mysql_insert_id();
	echo '<td>';echo $value['DATEDUDECE'];echo '</td>';
	echo '<td>';echo $value['HEURE'];echo '</td>';
	$sql2 = "INSERT INTO hosp (IDDNR,AGEDNR,SEXEDNR,DATEDON,DATESORTI,HEURESORTI,MODESORTI,DGC,DH,SERVICE) VALUES ('".$idpat."','".$value['AGEA']."','".$value['SEX']."','".$value['DATEHOSPIT']."','".$value['DATEDUDECE']."','".$value['HEURE']."','2','".$value['CAUSEDUDEC']."','".$value['DUREEHOSPI']."','".$SERVICE."');";
	$query2 = mysql_query($sql2);
	
	echo '</tr>';
	}
	
 echo "</table>";	
 ?>