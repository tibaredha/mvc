<?php 
verifsession();
view::button('rec','');
lang(Session::get('lang'));
ob_start();
view::munu('dis'); 
view::sautligne(12);
view::SERVICECGRX(30,220,'Etat Des Distributions CGR  par service  ARRET AU  : '.date('d-m-y'),'CGR');
view::BOUTONGRAPHE3(30,555);
?>