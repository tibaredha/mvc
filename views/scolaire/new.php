<?php
lang(Session::get('lang'));
ob_start();
$url1 = explode('/',$_GET['url']);
$data = array(
"titre"     => 'New Eleve Scolarise', 
"btn"       => 'scolaire', 
"id"        => '', 
"butun"     => 'Inser New eleve', 
"photos"    => 'PYRAMIDE.jpg',
"action"    => 'scolaire/createeleve/',
"DINS"      => date('Y-m-d'),
"HINS"      => date("H:i"),
"NOM"       => $url1[2],
"PRENOM"    => '*',   
"FILSDE"    => '*',
"ETDE"      => '*',
"SEXE"      => array("M", "F"),
"DATENS"    => '00/00/0000', 
"WILAYAN1"  => '17000' ,
"WILAYAN2"  => 'wilaya de naissance',
"COMMUNEN1" => '924' ,
"COMMUNEN2" => 'commune de naissance',
"WILAYAR1"  => '17000',
"WILAYAR2"  => 'wilaya de residence',
"COMMUNER1" => '924',
"COMMUNER2" => 'commune de residence',
"ADRESSE1"  => '1',
"ADRESSE2"  => 'citée',
"TEL"       => '(07) 00-00-00-00',
"TELF"      => '(000) 00-00-00',
"EMAIL"     => 'xxx@xxx.xx',
"GRABO"     => '' ,"GRRH" => '',
"NEC"       => '0',"DATEINS"=> date('Y-m-d'),       
"WILAYASS1" => '17000',
"WILAYASS2" => 'Wilaya etablissement',
"COMMUNESS1" => '924',
"COMMUNESS2" => 'Commune Etablissement',
"ETASS1"     => '1',
"ETASS2"     => 'Etablissement',
"x"         => "30",
"y"         => "240"
);
View::datass($data);
ob_end_flush();
?>



	