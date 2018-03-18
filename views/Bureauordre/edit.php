<?php
lang(Session::get('lang'));
ob_start();
$url1 = explode('/',$_GET['url']);
$data = array(
"titre"       => 'Update Message', 
"btn"         => 'Bureauordre', 
"id"          => $this->user[0]['id'], 
"butun"       => 'Update Message', 
"butun1"      => 'Effacer', 
"photos"      => 'PYRAMIDE.jpg',
"action"      => 'Bureauordre/editSave/'.$this->user[0]['id'],
"Date"        => $this->user[0]['Date'],
"Numero"      => $this->user[0]['Numero'],
"Etat"        => $this->user[0]['Etat'],   
"Source"      => array($this->user[0]['Source'],"DIVERS","MSP","DSP","EPHAO","EPHMS","EPHDJ","EPHHB","EPHID"),   
"Objet"       => $this->user[0]['Objet'],
"Destination" => array($this->user[0]['Destination'],"DIVERS","MSP","DSP","EPHAO","EPHMS","EPHDJ","EPHHB","EPHID"),  
"x"         => "30",
"y"         => "240"
);
View::Message($data);
ob_end_flush();
?>