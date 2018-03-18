<?php 
verifsession();	
view::button('dnr','');
lang(Session::get('lang'));
ob_start();
view::munu('don');
view::sautligne(12);
view::graphemois(30,220,'Etat Des Dons TPHA Positif  ARRET AU  :','4','don','DATEDON','IND',date("Y"),'IND',"TPHA ='Positif'") ;
view::BOUTONGRAPHE(30,555);
?>