<?php 
$diff = abs(time() - strtotime($this->user[0]['DATENAISSANCE'])); 
$years = floor($diff / (365*60*60*24));        
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$data = array(
"titre"     => 'Distribution PFC iso groupe iso rhesus ',
"css"       => 'pslpfc', 
"btn"       => 'dis', 
"id"        => $this->user[0]['id'],
"butun"     => 'Receveur: Distribution PFC ', 
"photos"    => 'plasmas.jpg',
"action"    => 'rec/DISOK',
"DINS"      => date('Y-m-d'),
"HINS"      => date("H:i"),
"NOM"       => $this->user[0]['NOM'],
"PRENOM"    => $this->user[0]['PRENOM'],   
"FILSDE"    => 'xxx',
"SEXE"      => array($this->user[0]['SEX'],"M", "F"),
"DATENS"    => $this->user[0]['DATENAISSANCE'], 
"AGE"       => $years, 
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
"GRABO"     => $this->user[0]['GRABO'] ,"GRRH" => $this->user[0]['GRRH'],
"CRH2"      => $this->user[0]['CRH2']  ,"CRH4" => $this->user[0]['CRH4'],
"ERH3"      => $this->user[0]['ERH3']  ,"ERH5" => $this->user[0]['ERH5'],
"KELL1"     => $this->user[0]['KELL1'] ,"KELL2" => $this->user[0]['KELL2'],
"POLYT"     => $this->user[0]['POLYT'] ,
"DDT"       => $this->user[0]['DDT'] ,
"RTA"       => $this->user[0]['RTA'] ,
"TYPERTA"   => $this->user[0]['TYPERTA'] ,
"RAI"       => $this->user[0]['RAI'] ,
"DRAI"      => $this->user[0]['DRAI'] ,
"RESULTAT"  => $this->user[0]['RESULTAT'] ,
"DGC"       => array("coagulopathie"),
"PSL"       => "PFC" ,
"valuemed"     => "1" ,
"selectedmed"  => "medecin" ,
"x"         => "30",
"y"         => "380"
);
View::datacgrpfccps($data);
?>


 
