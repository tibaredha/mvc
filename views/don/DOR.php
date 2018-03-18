<?php 
verifsession();	
view::button('dnr','');
lang(Session::get('lang'));
ob_start();
view::munu('don');
view::sautligne(12);
view::graphebi(30,220,'Etat Des Dons OCCASIONNEL/REGULIER  ARRET AU  :','4','don','DATEDON','IND',date("Y"),'IND',"TDNR ='OCCASIONNEL'","TDNR ='REGULIER'","OCCASIONNEL","REGULIER");
//view::graphemois(30,380,'Dons Par Mois Arret Au  : ','4','don','DATEDON','IND',date("Y"),'IND',"STR IS NOT NULL") ;
view::BOUTONGRAPHE(30,555);
?>
 