<?php
//REMISE DE LA COLONE AVNW UNE VALEUR BIEN DETERMINE
echo 'ok';
 $db_host="localhost";
 $db_name="mvc"; 
 $db_user="root";
 $db_pass="";
 $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
 $db  = mysql_select_db($db_name,$cnx) ;
 $query_liste = "SELECT id FROM don order by id desc limit 1";
 $requete = mysql_query($query_liste,$cnx ) or die( "ERREUR MYSQL num곯: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
 $result = mysql_fetch_array( $requete ) ;
 $x=$result["id"];
for ($idp=0; $idp<=$x; $idp++) 
{
$query_liste = "SELECT * FROM don  where  id ='$idp' ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$result = mysql_fetch_array( $requete ) ;
$PFC=trim($result["PFC"]);
$PFCX='1';
$sql = "UPDATE don SET PFC = '$PFCX' where id = '$idp' " ;    
$requete = mysql_query($sql, $cnx) or die( mysql_error() );		
}

// header("Location: ./index.php") ;

?>