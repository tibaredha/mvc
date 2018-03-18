<?php 
verifsession();	
view::button('dnr','');
lang(Session::get('lang'));
ob_start();
view::munu('don');
view::sautligne(12);
view::graphemois(30,220,'Dons CONTRE-IND DEFINITIVE Par Mois Arret Au  : ','4','don','DATEDON','IND',date("Y"),'CIDD',"STR IS NOT NULL") ;
view::BOUTONGRAPHE(30,555);
?>