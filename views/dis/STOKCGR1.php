<?php 
verifsession();
view::button('rec','');
lang(Session::get('lang'));
ob_start();
view::munu('dis'); 
view::sautligne(12);
view::NBRPSL0(30,220,'CGR','Etat Des Distributions CGR  ARRET AU  : '.date('d-m-Y'),'1');
view::BOUTONGRAPHE3(30,555);


?>
 