

<?php
lang(Session::get('lang'));
ob_start();
$url1 = explode('/',$_GET['url']);
$data = array(
"titre"       => 'New Message', 
"btn"         => 'Bureauordre', 
"id"          => '', 
"butun"       => 'Inser New Message', 
"butun1"      => 'Effacer', 
"photos"      => 'PYRAMIDE.jpg',
"action"      => 'Bureauordre/createmessage/',
"Date"        => date('Y-m-d'),
"Numero"      => $url1[2],
"Etat"        => '*',   
"Source"      => array("DIVERS","MSP","DSP","EPHAO","EPHMS","EPHDJ","EPHHB","EPHID"),
"Objet"       => '*',
"Destination" => array("DIVERS","MSP","DSP","EPHAO","EPHMS","EPHDJ","EPHHB","EPHID"),
"x"         => "30",
"y"         => "240"
);
View::Message($data);
ob_end_flush();

$x=400;
$y=250;
echo "<div id=\"date\"style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
echo "</div>";
?>
<script>
$( "#date" ).datepicker({
inline: true
});
</script>

	