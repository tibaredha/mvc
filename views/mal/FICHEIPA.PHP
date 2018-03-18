<?php 
verifsession();	
view::button('qua','');

view::f0( URL.'PDF/FHVBM.php?uc=2','post');
view::submit(960,910,'imprimer');

view::label(100,450,'HEPATITE B');                view::radioed(230,450,"HEPATITE","B");    
view::label(300,450,'HEPATITE C');                view::radio(430,450,"HEPATITE","C");  

view::label(100,490,'Etat civil'); 
view::label(260,490,'marie(e)');                view::radioed(330,490,"EC","MAR");    
view::label(360,490,'célibataire');             view::radio(440,490,"EC","CEL");      
   
view::label(100,490+30,'contact avec une personne présentant une HV aigue ou chronique'); 
view::label(560,490+30,'non');                  view::radioed(590,490+30,"CHV","NON");  
view::label(640,520,'sexuelle');                view::radio(700,520,"CHV","SEX");    
view::label(760,520,'familialle');              view::radio(820,520,"CHV","FAM");   
view::label(900,520,'autres');                  view::radio(950,520,"CHV","AUT");   

view::label(100,550,'hémodialisé?'); 
view::label(560,550,'oui');                  view::radio(590,550,"HEM","OUI");  
view::label(640,550,'non');                  view::radioed(700,550,"HEM","NON");    
view::label(760,550,'ind');                  view::radio(820,550,"HEM","IND");   

view::label(100,580,'transfusé?'); 
view::label(560,580,'oui');                  view::radio(590,580,"TRA","OUI");  
view::label(640,580,'non');                  view::radioed(700,580,"TRA","NON");    
view::label(760,580,'ind');                  view::radio(820,580,"TRA","IND");  

view::label(100,610,'traité pour une infection sexuellement transmissible?'); 
view::label(560,610,'oui');                  view::radio(590,610,"IST","OUI");  
view::label(640,610,'non');                  view::radioed(700,610,"IST","NON");    
view::label(760,610,'ind');                  view::radio(820,610,"IST","IND"); 

view::label(100,640,'recus des soins dentaires ou ORl ou fait des examens invasifs?'); 
view::label(560,640,'oui');                  view::radio(590,640,"SDT","OUI");  
view::label(640,640,'non');                  view::radioed(700,640,"SDT","NON");    
view::label(760,640,'ind');                  view::radio(820,640,"SDT","IND"); 

view::label(100,670,'hospitalisé?'); 
view::label(560,670,'oui');                  view::radio(590,670,"HOS","OUI");  
view::label(640,670,'non');                  view::radioed(700,670,"HOS","NON");    
view::label(760,670,'ind');                  view::radio(820,670,"HOS","IND"); 

view::label(100,700,'toxicomanie IV nasale?'); 
view::label(560,700,'oui');                  view::radio(590,700,"TOX","OUI");  
view::label(640,700,'non');                  view::radioed(700,700,"TOX","NON");    
view::label(760,700,'ind');                  view::radio(820,700,"TOX","IND"); 

view::label(100,730,'le patient travail-t-il dans une structure: medicale'); 
view::label(560,730,'oui');                  view::radio(590,730,"STM","OUI");  
view::label(640,730,'non');                  view::radioed(700,730,"STM","NON");    
view::label(760,730,'ind');                  view::radio(820,730,"STM","IND"); 

view::label(100,760,'le patient travail-t-il dans une structure:publique ou de secours'); 
view::label(560,760,'oui');                  view::radio(590,760,"STP","OUI");  
view::label(640,760,'non');                  view::radioed(700,760,"STP","NON");    
view::label(760,760,'ind');                  view::radio(820,760,"STP","IND"); 

view::label(100,790,'le patient a-t-il fait un'); 
view::label(560,790,'non');                  view::radioed(590,790,"PAF","NON");  
view::label(640,790,'sacarifi');             view::radio(700,790,"PAF","SCA");    
view::label(760,790,'percing');              view::radio(820,790,"PAF","PER");   
view::label(900,790,'tatou');                view::radio(950,790,"PAF","TAT");  

view::label(100,820,'le patient est il vacciné contre l\'hepatit B :'); 
view::label(560,820,'oui');                  view::radio(590,820,"VHB","OUI");  
view::label(640,820,'non');                  view::radioed(700,820,"VHB","NON");    
view::label(760,820,'ind');                  view::radio(820,820,"VHB","IND"); 
 
view::label(100,850,'la femme enceinte a-t-elle été confirmée AGHBS positif '); 
view::label(560,850,'oui');                  view::radio(590,850,"AGHBS","OUI");  
view::label(640,850,'non');                  view::radioed(700,850,"AGHBS","NON");    
view::label(760,850,'ind');                  view::radio(820,850,"AGHBS","IND"); 

view::label(100,880,'le nouveau né a-t-il été vacciné :  '); 
view::label(560,880,'oui');                  view::radio(590,880,"VHBNN","OUI");  
view::label(640,880,'non');                  view::radioed(700,880,"VHBNN","NON");    
view::label(760,880,'ind');                  view::radio(820,880,"VHBNN","IND");  

view::label(100,910,'le nouveau né a-t-il recu des immunoglobuline specifiques HBIG ?  '); 
view::label(560,910,'oui');                  view::radio(590,910,"IGM","OUI");  
view::label(640,910,'non');                  view::radioed(700,910,"IGM","NON");    
view::label(760,910,'ind');                  view::radio(820,910,"IGM","IND");   

view::label(100,940,'Charge Virales Anterieures ?  '); 
view::label(560,940,'oui');                  view::radio(590,940,"CHVA","OUI");  
view::label(640,940,'non');                  view::radioed(700,940,"CHVA","NON");    

view::label(100,970,'PBH ?  '); 
view::label(560,970,'oui');                  view::radio(590,970,"PBH","OUI");  
view::label(640,970,'non');                  view::radioed(700,970,"PBH","NON");    
view::label(760,970,'Stade');                view::txt(820,970,'STADEPBH',5,"0");      

view::label(100,1000,'Echec thérapeutique ?  '); 
view::label(560,1000,'oui');                  view::radio(590,1000,"ECHECTHER","OUI");  
view::label(640,1000,'non');                  view::radioed(700,1000,"ECHECTHER","NON");
view::f1();
view:: sautligne (80); 

?>

