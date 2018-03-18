<?php 
$url1 = explode('/',$_GET['url']);
$data = array(
"titre"     => 'Patient: new', 
"btn"       => 'qua', 
"id"        => '', 
"butun"     => 'Inser New Patient', 
"photos"    => '3.jpg',
"action"    => 'mal/create/',
"DINS"      => date('Y-m-d'),
"HINS"      => date("H:i"),
"NOM"       => $url1[2],
"PRENOM"    => '',   
"FILSDE"    => 'xxx',
"SEXE"      => array("M", "F"),
"DATENS"    => '00/00/0000', 
"WILAYAN1"  => '1' ,"WILAYAN2"  => 'wilaya de naissance',
"COMMUNEN1" => '1' ,"COMMUNEN2" => 'commune de naissance',
"WILAYAR1"  => '1',"WILAYAR2"  => 'wilaya de residence',
"COMMUNER1" => '1',"COMMUNER2" => 'commune de residence',
"ADRESSE1"  => '1',"ADRESSE2"  => 'citée',
"TEL"       => '(07) 00-00-00-00',
"TELF"      => '(000) 00-00-00',
"EMAIL"     => 'xxx@xxx.xx',
"GRABO"     => '' ,"GRRH" => '',
"CRH2"      => '' ,"CRH4" => '',
"ERH3"      => '' ,"ERH5" => '',
"KELL1"     => '' ,"KELL2" => '',
"NUM"         => '0' ,
"valuemed"    => '1' ,
"selectedmed" => 'Medecin' ,
"HVB"         => '' ,
"HVC"         => '' ,
"HIV"         => '' ,
"TPHA"        => '' ,
"x"           => "30",
"y"           => "220"
);
View::datamalade($data);
view::sautligne(4);
?>





 