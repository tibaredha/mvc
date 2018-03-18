<?php 
verifsession();	
view::button('dnr','');
lang(Session::get('lang'));
ob_start();
view::munu('don');
view::sautligne(12);
view::graphebi(30,220,'Etat Des Dons DE SEXE M/F  ARRET AU  :','4','don','DATEDON','IND',date("Y"),'IND',"SEXEDNR ='M'","SEXEDNR ='F'","F","M");
view::BOUTONGRAPHE(30,555);
?>  