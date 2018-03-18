<?php
lang(Session::get('lang'));
ob_start();
$url1 = explode('/',$_GET['url']);
$data = array(
"titre"     => 'New Message', 
"btn"       => 'Bureauordre', 
"id"        => '', 
"butun"     => 'Inser New Message', 
"butun1"    => 'Effacer', 
"photos"    => 'PYRAMIDE.jpg',
"action"    => 'Bureauordre/createmessage/',
"Date"        => date('Y-m-d'),
"Numero"      => $url1[2],
"Etat"        => '*',   
"Source"      => '*',
"Objet"       => '*',
"Destination" => '*',
"x"         => "30",
"y"         => "240"
);
View::Message($data);
ob_end_flush();
?>



	