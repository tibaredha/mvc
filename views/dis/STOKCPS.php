<?php 
verifsession();
view::button('rec','');
lang(Session::get('lang'));
ob_start();
view::munu('dis');
view::sautligne(12);
view::NBRPSL0S(30,220,'CPS','Stock CPS  ARRET AU  : '.date('d-m-Y'),'');
view::BOUTONGRAPHE3(30,555);
?>
 