<?php 
verifsession();
// view::button('cons',$this->user[0]['id']);
View::h('2',25,90,'Hospitalisation : Envenimation Scorpionique [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
// View::sautligne(2);
View::hr();
View::f0(URL.'pdf/SAS.PHP','post');
View::label(100,140+10,'Date de l\'accident ');      View::txt(260,140,'DATE',6,date('d-m-Y')); 
View::label(500,140+10,'Heure de l\'accident ');     View::txt(670,140,'HDA',6,date("H:i")); 
View::label(100,170+10,'Wilaya de l\'accident ');    View::WILAYA(260,170,'WILAYAN','country','mvc','wil','17000','wilaya de l\'accident    ');    //WILAYAN(260,370,'WILAYAN','gpts2012','wil') 
View::label(500,170+10,'Commune de l\'accident ');   View::COMMUNE(670,170,'COMMUNEN','COMMUNEN','924','COMMUNE');           
View::label(860+50,170+10,'Zone de l\'accident');     View::combov1(1090,170,'ZONE',array("RURALE"=>"1","URBAINE"=>"2"));   
View::label(100,172+30+10,'Type d\'habitat ');        View::combov1(260,170+30,'TYPEHABITA',array("Maison individuelle/Villa"=>"1","Habitat précaire"=>"2","Tente de nomade"=>"3","Immeuble"=>"4","Maison traditionnelle"=>"5","Autres"=>"6")); //BASE DE DONNEES
View::label(500,172+30+10,'Logement');                View::combov1(670,170+30,'INTEXT',array("INT"=>"1", "EXT"=>"2")); 
View::label(860+50,172+30+10,'Scorpion_vu');          View::combov1(1090,170+30,'SCORVU',array("OUI"=>"1", "NON"=>"2"));  
View::label(100,172+60+10,'ATCD');                    View::combov1(260,170+60,'ATCD',array("NON"=>"1", "OUI"=>"2")); 
View::label(500,172+60+10,'Siège');                   View::combov1(670,170+60,'SIEGE',array("Tête Cou"=>"1", "Tronc"=>"2","Membre supérieur"=>"3","Membre inférieur"=>"4")); 
View::label(860+50,172+60+10,'Gestes_inutiles');      View::combov1(1090,170+60,'GINUT',array("NON"=>"1","OUI"=>"2")); 
View::label(100,172+60+30+10,'Classe');               View::combov(260,170+60+30,'CLASSE',array("1","2","3")); 
View::label(500,172+60+30+10,'SAS');                  View::combov(670,170+60+30,'SAS',array("OUI", "NON")); 
View::label(860+50,172+60+30+10,'NBR AMP');           View::combov(1090,170+60+30,'NBRAMP',array("1","2","3","4","5","6","7","8","9","10")); 
View::label(100,172+60+30+30+10,'Evacuation');        View::combov(260,170+60+60,'EVACUATION',array("NON","OUI")); 
View::label(500,172+60+30+30+10,'Dateeva');           View::txt(670,170+60+60,'DATEEVACUATION',6,date('d-m-Y'));  
View::label(860+50,172+60+30+30+10,'Classeeva');      View::combov(1090,170+60+60,'CLASSEEVA',array("2","3")); 
View::label(860+50,172+60+30+30+30+10,'Deces');       View::combov(1090,170+60+60+30,'DECES',array("NON", "OUI")); 
View::hide(215,670,'id',0,$this->user[0]['id']);
View::hide(215,670,'sexe',0,$this->user[0]['SEX']);
View::hide(215,670,'dns',0,$this->user[0]['DATENAISSANCE']);
View::submit(1090,550,'Imprimer Envenimation Scorpionique');
View::f1();		
View::sautligne(25);
?>


