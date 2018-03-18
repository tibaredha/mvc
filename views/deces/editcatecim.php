<?php	
$url1 = explode('/',$_GET['url']);
ob_start();
view::button('deces','');
View::hr();
View::f0(URL.'deces/editSavecatecim','post');
View::label(30,200,'Categorie');View::txt(200,190,'diag_nom',30,$this->user[0]['diag_nom']); 
View::label(30,230,'Code');View::txt(200,190+30,'diag_cod',30,$this->user[0]['diag_cod']); 
View::hide(215,670,'row_id',0,$this->user[0]['row_id']);
View::hide(215,670,'row',0,$url1[3]);



$this->submit(1185,500,'Save Categorie');$this->f1();
view::sautligne(25);
ob_end_flush();
?>	
	
