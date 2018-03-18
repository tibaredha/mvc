<?php 
verifsession();	
view::button('dnr','');
lang(Session::get('lang'));
ob_start();
view::munu('don');
view::sautligne(12);
view::graphebibi(30,220,'Etat Des Dons DE GROUPAGE ABO ARRET AU  :','4','don','DATEDON','IND',date("Y"),'IND',"GROUPAGE ='A'","GROUPAGE ='B'","GROUPAGE ='AB'","GROUPAGE ='O'",'A','B','AB','O'); 
view::BOUTONGRAPHE(30,555);
?>
