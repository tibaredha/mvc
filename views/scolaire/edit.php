<?php 
lang(Session::get('lang'));
ob_start();
$url1 = explode('/',$_GET['url']);
$data = array(
"titre"     => 'Update Eleve Scolarise', 
"btn"       => 'scolaire', 
"id"        => $this->user[0]['id'], 
"butun"     => 'Update eleve', 
"photos"    => 'PYRAMIDE.jpg',
"action"    => 'scolaire/editSave/'.$this->user[0]['id'],
"DINS"      => date('Y-m-d'),
"HINS"      => date("H:i"),
"NOM"       => $this->user[0]['NOM'],
"PRENOM"    => $this->user[0]['PRENOM'],    
"FILSDE"    => $this->user[0]['FILSDE'], 
"ETDE"      => $this->user[0]['ETDE'], 
"SEXE"      => array($this->user[0]['SEXE'],"M", "F"),
"DATENS"    => $this->user[0]['DATENS'],
"WILAYAN1"  => $this->user[0]['WILAYAN'] ,
"WILAYAN2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYAN'],'WILAYAS'),
"COMMUNEN1" => $this->user[0]['COMMUNEN'] ,
"COMMUNEN2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNEN'],'COMMUNE'),
"WILAYAR1"  => $this->user[0]['WILAYAR'] ,
"WILAYAR2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYAR'],'WILAYAS'),
"COMMUNER1" => $this->user[0]['COMMUNER'],
"COMMUNER2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNER'],'COMMUNE'),
"ADRESSE1"  => $this->user[0]['ADRESSE'],
"ADRESSE2"  => $this->user[0]['ADRESSE'],
"TEL"       => $this->user[0]['TEL'],
"TELF"      => $this->user[0]['TELF'],
"EMAIL"     => $this->user[0]['EMAIL'],
"GRABO"     => $this->user[0]['GRABO'] ,"GRRH"  => $this->user[0]['GRRH'],
"NEC"       => $this->user[0]['NEC'],"DATEINS"=> $this->user[0]['DATEINS'],       
"WILAYASS1" => $this->user[0]['WILAYASS'] ,
"WILAYASS2" => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYASS'],'WILAYAS'),
"COMMUNESS1" => $this->user[0]['COMMUNESS'] ,
"COMMUNESS2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNESS'],'COMMUNE'),
"ETASS1"     => $this->user[0]['ETASS'] ,
"ETASS2"     => $this->user[0]['ETASS'] ,
"x"         => "30",
"y"         => "240"
);
View::datass($data);
ob_end_flush(); 	
?>