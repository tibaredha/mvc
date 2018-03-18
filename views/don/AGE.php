<?php 
verifsession();	
view::button('dnr','');
lang(Session::get('lang'));
ob_start();
view::munu('don');
view::sautligne(12);
view::GRAPHEAGEDON(30,220,'Etat Des Dons par tranche d\'age  ARRET AU  :'.date("Y-m-d"),date("Y"),date("Y-m-d"));
view::BOUTONGRAPHE(30,555);
?>
 



