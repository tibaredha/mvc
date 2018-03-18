<?php 
$url1 = explode('/',$_GET['url']);
ob_start();
$data = array(
"titre"     => 'Edit Patient', 
"btn"       => 'mnpe', 
"id"        => $this->user[0]['id'], 
"butun"     => 'Edit Patient', 
"photos"    => '3.jpg',
"action"    => 'mnpe/editSavemnpe/'.$this->user[0]['id'],
"DINS"      => date('Y-m-d'),
"HINS"      => date("H:i"),
"NOM"       => $this->user[0]['NOM'],
"PRENOM"    => $this->user[0]['PRENOM'],   
"FILSDE"    => $this->user[0]['FILSDE'],
"SEXE"      => array($this->user[0]['SEX'],"M", "F"),
"DATENS"    => $this->user[0]['DATENAISSANCE'], 
"WILAYAN1"  => $this->user[0]['WILAYA'] ,"WILAYAN2"   => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA'],'WILAYAS'),
"COMMUNEN1" => $this->user[0]['COMMUNE'] ,"COMMUNEN2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE'],'COMMUNE'),
"WILAYAR1"  => $this->user[0]['WILAYAR'],
"WILAYAR2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYAR'],'WILAYAS'),
"COMMUNER1" => $this->user[0]['COMMUNER'],
"COMMUNER2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNER'],'COMMUNE'),
"ADRESSE1"  => $this->user[0]['ADRESSE'],
"ADRESSE2"  => $this->user[0]['ADRESSE'],
"TEL"       => $this->user[0]['TELEPHONE'],
"TELF"      => '(000) 00-00-00',
"EMAIL"     => 'xxx@xxx.xx',
"POIDS"     => $this->user[0]['POIDS'] ,"TAILLE" => $this->user[0]['TAILLE'],
"HB"        => $this->user[0]['HB'] ,"HT" => $this->user[0]['HT'],
"x"         => "30",
"y"         => "240"
);
View::MNPE($data);
view::sautligne(3);
ob_end_flush();	
?>
	
	
