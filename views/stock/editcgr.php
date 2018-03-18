<?php 
verifsession();
view::button('rec','');
View::h('2',25,290,'Stock : Edit CGR poche n °: [ '.$this->user[0]['NDP']." ]");
View::sautligne(2);
View::hr();
View::f0(URL.'stock/editSavecgr/'.$this->user[0]['IDCGR'],'post');
View::label(25,370,'GROUPAGE');   View::combov(100,360,'GROUPAGE',array($this->user[0]['GROUPAGE'],"A","B","AB","O"));
View::label(25,400,'RHESUS');     View::combov(100,390,'RHESUS',array($this->user[0]['RHESUS'],"Positif","negatif"));
View::label(25,400+30,'DATE DON');View::txt(100,400+20,'DATEDON',0,$this->user[0]['DATEDON']);
View::label(25,400+60,'DATE PRE');View::txt(100,400+50,'DATEPER',0,$this->user[0]['DATEPER']);
View::label(25,400+90,'NDP');     View::txt(100,400+80,'NDP',0,$this->user[0]['NDP']);
View::label(25,400+120,'DIST');   View::combov(100,400+110,'DIST',array($this->user[0]['DIST'],"1"));
View::label(25,400+150,'DATEDIS');View::txt(100,400+140,'DATEDIS',0,$this->user[0]['DATEDIS']);
View::label(25,400+180,'IDREC');  View::txt(100,400+170,'IDREC',0,$this->user[0]['IDREC']);
View::label(25,400+210,'SERVICE');View::combov(100,400+200,'SERVICE',array($this->user[0]['SERVICE'],"0","1","2","3","4","5","6","7","8","9","10","11","12","13","14"));
View::label(25,400+240,'MODIFIER');View::submit(100,400+230,'MODIFIER');
View::f1();View::sautligne(10);
?>




