<?php 
verifsession();	
view::button('dnr','');
lang(Session::get('lang'));
ob_start();
view::munu('don');
view::sautligne(12);
view::graphemois(30,220,'Etat Des Dons REGULIER  ARRET AU  :','4','don','DATEDON','IND',date("Y"),'IND',"TDNR ='REGULIER'") ;
view::BOUTONGRAPHE(30,555);
?>
