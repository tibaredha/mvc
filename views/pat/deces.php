
<?php 
verifsession();
// view::button('cons',$this->user[0]['id']);
View::h('2',25,70,'Patient : Certificat De Deces [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
View::fieldset("deces1","--");
View::fieldset("deces2","--");
View::fieldset("deces3","--");
View::fieldset("deces4","--");
View::url(650,70,URL.'views/doc/deces/decesfr.pdf','REF:JO n°12 du 28/02/2016   page 12 ',2);
View::sautligne(2);
View::hr();
View::f0(URL.'tcpdf/deces.php','post');
$x=70;

View::label(50,$x+145-50,'Date du décés');                View::txt(240,$x+145-60,'DD',20,date("Y-m-d")); //$per ->datetime (800,$x+24,'DD');                 
View::label(980,$x+145-50,'Heure du décés');              View::txt(1200,$x+145-60,'HD',4,date("H:i"));

View::label(650,$x+145-50,'la mere');                    View::txt(750,$x+145-60,'ETDE',20,"***");      



View::label(50,$x+145,'<strong>Lieu du décés du malade </strong>');
View::label(50,$x+145+30,'Domicile ');                    View::radio(200,$x+145+30,"LD","DOM");    
View::label(50,$x+145+60,'Voie publique ');               View::radio(200,$x+145+60,"LD","VP");     
View::label(50,$x+145+90,'Autres (a préciser). ');        View::radio(200,$x+145+90,"LD","AAP"); View::txt(240,$x+140+90,'AUTRES',24,'*');   
View::label(250,$x+145+30,'Structure de sante public ');  View::radioed(430,$x+145+30,"LD","SSP");  
View::label(250,$x+145+60,'Structure de sante privé ');   View::radio(430,$x+145+60,"LD","SSPV");  


View::label(650,$x+145,'<strong>Cause de décés</strong>');
View::label(650,$x+145+30,'Cause naturelle');                View::radioed(780,$x+145+30,"CD","CN");    
View::label(650,$x+145+60,'Cause viollente');                View::radio(780,$x+145+60,"CD","CV");      
View::label(650,$x+145+90,'Cause idetermine');               View::radio(780,$x+145+90,"CD","CI");     


View::label(980,$x+145,'<strong>Signalement médico-légal</strong>');
View::label(980,$x+145+30,"Obstacle médico-légal a l'inhumation");                      View::radio(1420,$x+145+30,"SML","OMLI");    
View::label(980,$x+145+60,"Mise immédiate en cercueil hermétique");                     View::radio(1420,$x+145+60,"SML","MIEC");      
View::label(980,$x+145+90,"Existence d'une prothèse fonctionnant au moyen d'une pile"); View::radio(1420,$x+145+90,"SML","EPFP");     






View::label(50,$x+290,"<strong>Cause directe et événements morbides ayant précédé le décés</strong> ");  
View::label(50,$x+290+30,"<strong>Partie I </strong>: Maladie(s) ou affection(s) morbide (s) ayant directement provoqué le décés  ");
View::label(50,$x+290+60,'Cause directe : a');                               View::txt(240,$x+290+50,'CIM1',20,"***");          
View::label(50,$x+290+90,'due ou consécutive a : b');                        View::txt(240,$x+290+80,'CIM2',20,"***");       
View::label(50,$x+290+120,'due ou consécutive a : c');                       View::txt(240,$x+290+110,'CIM3',20,"***");        
View::label(50,$x+290+150,'due ou consécutive a : d');                       View::txt(240,$x+290+140,'CIM4',20,"***");       
View::label(50,$x+290+180,"<strong>Partie II </strong>: Autres états morbides ayant pu contribuer au décés, non mentionnés en partie 1 ");
View::label(50,$x+290+210,'autres etats');                                   View::txt(240,$x+290+200,'CIM5',20,"***");      


View::label(750,$x+290,'<strong>Nature de la mort </strong>');
View::label(750,$x+290+30,'Naturelle');                   View::radioed(940,$x+290+30,"NDLM","CN");    
View::label(750,$x+290+60,'Accident');                    View::radio(940,$x+290+60,"NDLM","CV");      
View::label(750,$x+290+90,'auto induite');                View::radio(940,$x+290+90,"NDLM","CI"); 
View::label(750,$x+290+120,'agression ');                 View::radio(940,$x+290+120,"NDLM","CI"); 
View::label(750,$x+290+150,'indéterminée');               View::radio(940,$x+290+150,"NDLM","CI"); 
View::label(750,$x+290+180,'Autre (a préciser)');         View::radio(940,$x+290+180,"NDLM","CI"); 
                                                          View::txt(738,$x+290+200,'NDLMAP',20,"***"); 
View::label(980,$x+290,'<strong> Mortinatalité, périnatalité</strong>');
View::label(980,$x+290+30,'Grossesse multiple');          View::radio(940+230,$x+290+30,"GM","CN");    
View::label(980,$x+290+60,'Mort-né');                     View::radio(940+230,$x+290+60,"MN","CV");      
View::label(980,$x+290+90,'Age gestationnel');            //View::radio(940,$x+290+90,"NDLM","CI"); 
View::label(980,$x+290+120,'Poids a la naissance ');      //View::radio(940,$x+290+120,"NDLM","CI"); 
View::label(980,$x+290+150,'Age de la mére');             //View::radio(940,$x+290+150,"NDLM","CI"); 
View::label(980,$x+290+180,'Si décés périnatal');         //View::radio(940,$x+290+180,"NDLM","CI"); 
                                                          View::txt(970,$x+290+200,'NDLMAP',20,"***"); 
 
View::label(1210,$x+290,'<strong> Décés maternel </strong>');
View::label(1210,$x+290+30,'durant la grossesse');          View::radio(1420,$x+290+30,"GRS","CN");    
View::label(1210,$x+290+60,"durant l'accouchement");        View::radio(1420,$x+290+60,"GRS","CV");      
View::label(1210,$x+290+90,"durant l'avortement");          View::radio(1420,$x+290+90,"GRS","CI"); 
View::label(1210,$x+290+120,'aprés la gestation ');         View::radio(1420,$x+290+120,"GRS","CI"); 
View::label(1210,$x+290+150,' Indéterminé');                View::radio(1420,$x+290+150,"GRS","CI"); 
View::label(1210,$x+290+180,'<strong>intervention chirugicale</strong>');        
View::label(1210,$x+290+180+30,'<strong>4 semaines avant le décés </strong>'); View::radio(1420,$x+290+180+30,"POSTOPP","CI"); 
                                                        
 



 

View::hide(215,670,'id',0,$this->user[0]['id']);
View::submit(1240,80,'Imprimer Certificat');
View::f1();		
View::sautligne(20);
?>