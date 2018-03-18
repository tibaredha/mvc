<?php
lang(Session::get('lang'));
ob_start();
$url1 = explode('/',$_GET['url']);
$data = array(
"titre"     => 'New hemod', 
"btn"       => 'hemod', 
"id"        => '', 
"butun"     => 'Inser New hemod', 
"photos"    => 'hemodialyse.jpg',
"action"    => 'hemod/create/',
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
"CRH2"      => '' ,"CRH4" => '',
"ERH3"      => '' ,"ERH5" => '',
"KELL1"     => '' ,"KELL2" => '',
"HVB"       => '' ,"HVC" => '',
"HIV"       => '' ,"TPHA" => '',
"CAUSE"     => '' ,"COMOR" => '',
"DPD"       => date('Y-m-d') ,"POIDS" => '60',
"NSS"       => '0' ,"ASSURE"       => 'x' ,
"x"         => "30",
"y"         => "240"
);
View::datahemod($data);
ob_end_flush();
?>



	