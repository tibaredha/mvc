<?php 
verifsession();
// view::button('cons',$this->user[0]['id']);
View::h('2',25,260,'Hospitalisation : Morssures [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
// View::sautligne(2);
View::hr();
View::f0(URL.'tcpdf/mors.PHP','post');
View::label(100,340+10,'Date de l\'accident ');      View::txt(260,340,'DATE',6,date('d-m-Y')); 
View::label(500,340+10,'Heure de l\'accident ');     View::txt(670,340,'HDA',6,date("H:i")); 
View::label(100,370+10,'Wilaya de l\'accident ');    View::WILAYA(260,370,'WILAYAN','country','mvc','wil','17000','wilaya de l\'accident    ');    //WILAYAN(260,370,'WILAYAN','gpts2012','wil') 
View::label(500,370+10,'Commune de l\'accident ');   View::COMMUNE(670,370,'COMMUNEN','COMMUNEN','924','COMMUNE');           
View::label(860+50,370+10,'Zone de l\'accident');     View::combov1(1090,370,'ZONE',array("RURALE"=>"1","URBAINE"=>"2"));   
View::label(100,372+30+10,'Type Animal ');            View::combov1(260,370+30,'ANIMAL',array("Chien"=>"Chien","Chat"=>"Chat","Rat"=>"Rat","Autres"=>"Autres")); //BASE DE DONNEES
// View::label(500,372+30+10,'Logement');                View::combov1(670,370+30,'INTEXT',array("INT"=>"1", "EXT"=>"2")); 
View::label(860+50,372+30+10,'Animal');          View::combov1(1090,370+30,'SCORVU',array("Vivant"=>"1", "Abattu"=>"2", "En Fuite"=>"3"));  
View::label(100,372+60+10,'type');                    View::combov1(260,370+60,'ATCD',array("Morssure"=>"1", "Griffure"=>"2")); 
View::label(500,372+60+10,'Siège');                   View::combov1(670,370+60,'SIEGE',array("Tête Cou"=>"1", "Tronc"=>"2","Membre supérieur"=>"3","Membre inférieur"=>"4")); 
// View::label(860+50,372+60+10,'Gestes_inutiles');      View::combov(1090,370+60,'GINUT',array("NON"=>"1","OUI"=>"2")); 
View::label(100,372+60+30+10,'Grade');               View::combov(260,370+60+30,'CLASSE',array("1","2","3")); 
// View::label(500,372+60+30+10,'SAS');                  View::combov(670,370+60+30,'SAS',array("OUI", "NON")); 
// View::label(860+50,372+60+30+10,'NBR AMP');           View::combov(1090,370+60+30,'NBRAMP',array("1","2","3","4","5","6","7","8","9","10")); 
// View::label(100,372+60+30+30+10,'Evacuation');        View::combov(260,370+60+60,'EVACUATION',array("NON","OUI")); 
// View::label(500,372+60+30+30+10,'Dateeva');           View::txt(670,370+60+60,'DATEEVACUATION',6,date('d-m-Y'));  
//View::label(860+50,372+60+30+30+10,'Classeeva');      View::combov(1090,370+60+60,'CLASSEEVA',array("2","3")); 
// View::label(860+50,372+60+30+30+30+10,'Deces');       View::combov(1090,370+60+60+30,'DECES',array("NON", "OUI")); 
View::hide(215,670,'id',0,$this->user[0]['id']);
View::hide(215,670,'sexe',0,$this->user[0]['SEX']);
View::hide(215,670,'dns',0,$this->user[0]['DATENAISSANCE']);
View::submit(1090,550,'Imprimer morssure');
View::f1();		
View::sautligne(15);
?>


