<?php 
verifsession();	
view::button('mnpe','');
lang(Session::get('lang'));
ob_start();


view::sautligne(18);
ob_end_flush();
?>









