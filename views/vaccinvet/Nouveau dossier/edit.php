<?php 
lang(Session::get('lang'));
ob_start();
$url1 = explode('/',$_GET['url']);
$data = array(
"titre"     => 'Update hemod', 
"btn"       => 'hemod', 
"id"        =>  $this->user[0]['id'],
"butun"     => 'Update hemod', 
"photos"    => $this->user[0]['id'].'.jpg',
"action"    => 'hemod/editSave/'.$this->user[0]['id'],
"DINS"      => date('Y-m-d'),
"HINS"      => date("H:i"),
"NOM"       => $this->user[0]['NOM'],
"PRENOM"    => $this->user[0]['PRENOM'],   
"FILSDE"    => $this->user[0]['FILS'], 
"ETDE"      => $this->user[0]['ETDE'], 
"SEXE"      => array($this->user[0]['SEX'],"M", "F"),
"DATENS"    => $this->user[0]['DATENAISSA'], 
"WILAYAN1"  => $this->user[0]['WILAYA'] ,
"WILAYAN2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA'],'WILAYAS'),
"COMMUNEN1" => $this->user[0]['COMMUNE'] ,
"COMMUNEN2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE'],'COMMUNE'),
"WILAYAR1"  => $this->user[0]['WILAYAR'] ,
"WILAYAR2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYAR'],'WILAYAS'),
"COMMUNER1" => $this->user[0]['COMMUNER'],
"COMMUNER2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNER'],'COMMUNE'),
"ADRESSE1"  => $this->user[0]['ADRESSE'],
"ADRESSE2"  => $this->user[0]['ADRESSE'],
"TEL"       => $this->user[0]['TELEPHONE'],
"TELF"      => '(000) 00-00-00',
"EMAIL"     => 'xxx@xxx.xx',
"GRABO"     => $this->user[0]['GRABO'] ,"GRRH"  => $this->user[0]['GRRH'],
"CRH2"      => $this->user[0]['CRH2']  ,"CRH4"  => $this->user[0]['CRH4'],
"ERH3"      => $this->user[0]['ERH3']  ,"ERH5"  => $this->user[0]['ERH5'],
"KELL1"     => $this->user[0]['KELL1'] ,"KELL2" => $this->user[0]['KELL2'],
"HVB"       => $this->user[0]['HVB']   ,"HVC"   => $this->user[0]['HVC'],
"HIV"       => $this->user[0]['HIV']   ,"TPHA"  => $this->user[0]['TPHA'],
"CAUSE"     => $this->user[0]['CAUSEMALAD'] ,"COMOR" => $this->user[0]['CODGC'],
"DPD"       => $this->user[0]['DATE1ERSEA'] ,"POIDS" => $this->user[0]['POIDS'],
"NSS"       => $this->user[0]['NSS'] ,"ASSURE"       => $this->user[0]['ASSURE'] ,
"x"         => "30",
"y"         => "240"
);
View::datahemod($data);
ob_end_flush();	
	
?>