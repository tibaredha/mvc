<?php	
$url1 = explode('/',$_GET['url']);
ob_start();
view::button('deces','');
View::hr();
View::f0(URL.'deces/editSavecim','post');
View::label(30,200,'chapitre');
View::txt(200,190,'CHAP',30,$this->user[0]['CHAP']); 
View::hide(215,670,'IDCHAP',0,$this->user[0]['IDCHAP']);
$this->submit(1185,500,'Save Chapitre');$this->f1();
view::sautligne(25);
ob_end_flush();
?>	
	
