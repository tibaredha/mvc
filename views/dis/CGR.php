<?php 
verifsession();
view::button('rec','');
lang(Session::get('lang'));
ob_start();
view::munu('dis'); 
view::sautligne(12);
view::graphemoisdx(30,220,'Etat Des Etat Des Distributions CGR  ARRET AU  :','CGR','1');
view::BOUTONGRAPHE3(30,555);
?>
