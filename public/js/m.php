<?php
if(!empty($_POST["keyword"])) {
	$db_host="localhost";
	$db_name="mvc"; 
	$db_user="root";
	$db_pass="";
	$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	// echo"<option value=\"1\" selected=\"selected\">liste des Produits</option>"."\n";
	$sql=mysql_query("SELECT * FROM pha16 WHERE pre like '" . $_POST["keyword"] . "%' ORDER BY pre LIMIT 0,1000");
	while($data=mysql_fetch_array($sql))
	{
	echo '<option value="'.$data['id'].'">'.$data['pre']."_".$data['FORME']."_".$data['DOSAGE'].'</option>';
	}   
}
?>

