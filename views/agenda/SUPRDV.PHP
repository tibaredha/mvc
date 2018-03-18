<?php 
$per-> mysqlconnect();  
$id  = $_GET["id"] ;
$sql = "DELETE FROM agenda_events WHERE id =$id  " ;
$requete = mysql_query( $sql ) ;
header("Location: index.php?uc=calendrier") ;
 ?> 