<?php 
verifsession();	
view::button('dnr','');
lang(Session::get('lang'));
ob_start();
view::munu('don');
view::sautligne(12);
view::graphebi(30,220,'Etat Des Dons fixe/mobile  ARRET AU  :','4','don','DATEDON','IND',date("Y"),'IND',"STR ='MOBILE'","STR ='FIXE'","fixe","mobile");
//view::graphemois(30,380,'Dons Par Mois Arret Au  : ','4','don','DATEDON','IND',date("Y"),'IND',"STR IS NOT NULL") ;
view::BOUTONGRAPHE(30,555);
?>