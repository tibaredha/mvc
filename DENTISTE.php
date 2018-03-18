<?php

echo 'ok';
echo '</br>';
 $db_host="localhost";
 $db_name="mvc"; 
 $db_user="root";
 $db_pass="";
 $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
 $db  = mysql_select_db($db_name,$cnx) ;
 mysql_query("SET NAMES 'UTF8' ");
 $sql=mysql_query("SELECT * FROM poly order by NOM  asc");
echo "<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
 
 while($value=mysql_fetch_array($sql))
	{
	echo '<tr>';
	echo '<td>';echo $value['STRUCTURE'];echo '</td>';
	echo '<td>';echo $value['NATURE'];echo '</td>';
	echo '<td>';echo $value['NOM'];echo '</td>';
	echo '<td>';echo $value['PRENOM'];echo '</td>';
	echo '<td>';echo $value['SEX'];echo '</td>';
	echo '<td>';echo $value['WILAYA'];echo '</td>';
    echo '<td>';echo $value['COMMUNE'];echo '</td>';// 
	echo '<td>';echo $value['ADRESSE'];echo '</td>';// 
	
	$sql1 = "INSERT INTO structure (STRUCTURE,NATURE,NOM,PRENOM,SEX,WILAYA,COMMUNE,ADRESSE) 
	
	VALUES ('".$value['STRUCTURE']."','".$value['NATURE']."','".$value['NOM']."','".$value['PRENOM']."','".$value['SEX']."','".$value['WILAYA']."','".$value['COMMUNE']."','".$value['ADRESSE']."');";
	//$query1 = mysql_query($sql1);
	
	
	
	
	


 //age en jour rest
	// $idpat=mysql_insert_id();
	// echo '<td>';echo $value['DATEDUDECE'];echo '</td>';
	// echo '<td>';echo $value['HEURE'];echo '</td>';
	// $sql2 = "INSERT INTO hosp (IDDNR,AGEDNR,SEXEDNR,DATEDON,DATESORTI,HEURESORTI,MODESORTI,DGC,DH,SERVICE) VALUES ('".$idpat."','".$value['AGEA']."','".$value['SEX']."','".$value['DATEHOSPIT']."','".$value['DATEDUDECE']."','".$value['HEURE']."','2','".$value['CAUSEDUDEC']."','".$value['DUREEHOSPI']."','".$SERVICE."');";
	// $query2 = mysql_query($sql2);
	
	echo '</tr>';
	}
	
 echo "</table>";	
 ?>