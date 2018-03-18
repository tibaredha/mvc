<?php 
verifsession();	
view::button('dnr','');
lang(Session::get('lang'));
ob_start();
view::munu('don');
view::sautligne(12);
view::graphebi(30,220,'Etat Des Dons DE RH Positif/negatif  ARRET AU  :','4','don','DATEDON','IND',date("Y"),'IND',"RHESUS ='negatif'","RHESUS ='Positif'","Positif","negatif");
view::BOUTONGRAPHE(30,555);
?> 