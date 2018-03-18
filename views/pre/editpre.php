<?php 
verifsession();	
view::button('pre','');
View::h('2',25,290,'Preparation : Edit poche n °:'.$this->user[0]['IDP']);
View::sautligne(2);
View::hr();
View::f0(URL.'pre/editSave/'.$this->user[0]['id'],'post');
View::label(25,400-15,'Preparation date');View::txt(215,400-15,'DATEPRE',0,date('Y-m-d'));


// View::label(25,460,'C');View::combov(215,460,'GRRH2',array($this->user[0]['CRH2'],"Positif","negatif"));      View::label(500,460,'c');     View::combov(750,460,'GRRH4',array($this->user[0]['CRH4'],"Positif","negatif"));
// View::label(25,490,'E');View::combov(215,490,'GRRH3',array($this->user[0]['ERH3'],"Positif","negatif"));      View::label(500,490,'e');     View::combov(750,490,'GRRH5',array($this->user[0]['ERH5'],"Positif","negatif"));
// View::label(25,520,'K1');View::combov(215,520,'KELL1',array($this->user[0]['KELL1'],"Positif","negatif"));    View::label(500,520,'K2');    View::combov(750,520,'KELL2',array($this->user[0]['KELL2'],"Positif","negatif"));


View::label(25,520,'ABO');View::combov(215,520,'GRABO',array($this->user[0]['GROUPAGE'],"A","B","AB","O"));   View::label(500,520,'RH');    View::combov(750,520,'GRRH1',array($this->user[0]['RHESUS'],"Positif","negatif"));
View::label(25,550,'Hépatite B');View::combov(215,550,'HVB',array("negatif","douteux","Positif"));         View::label(500,550,'VIH/sida');     View::combov(750,550,'HIV',array("negatif","douteux","Positif"));
View::label(25,580,'Hépatite C');View::combov(215,580,'HVC',array("negatif","douteux","Positif"));         View::label(500,580,'Syphilis/TPHA');View::combov(750,580,'TPHA',array("negatif","douteux","Positif"));

View::label(25,430,'CGR prepare');View::chekboxed(115,430,'CGR');View::label(215,430,'Volume issufisant');     View::chekbox(400,430,'VI');View::label(450,430,'PFC/CP contamine');View::chekbox(600,430,'PCC');
View::label(25,460,'PFC prepare');View::chekboxed(115,460,'PFC');View::label(215,460,'Fuite defaut soudure');  View::chekbox(400,460,'FDS');View::label(450,460,'PFC Lipemique');View::chekbox(600,460,'PL');
View::label(25,490,'CPS prepare');View::chekbox(115,490,'CPS');  View::label(215,490,'Aspect coagule');        View::chekbox(400,490,'AC');View::label(450,490,'AUTRES');View::chekbox(600,490,'AUTRES');

View::hide(215,670,'IDDNR',0,$this->user[0]['IDDNR']);
View::hide(215,670,'GROUPAGE',0,$this->user[0]['GROUPAGE']);
View::hide(215,670,'RHESUS',0,$this->user[0]['RHESUS']);
View::hide(215,670,'CRH2',0,$this->user[0]['CRH2']);
View::hide(215,670,'ERH3',0,$this->user[0]['ERH3']);
View::hide(215,670,'CRH4',0,$this->user[0]['CRH4']);
View::hide(215,670,'ERH5',0,$this->user[0]['ERH5']);
View::hide(215,670,'KELL1',0,$this->user[0]['KELL1']);
View::hide(215,670,'KELL2',0,$this->user[0]['KELL2']);
View::hide(215,670,'DATEDON',0,$this->user[0]['DATEDON']);
View::hide(215,670,'IDP',0,$this->user[0]['IDP']);
View::hide(215,670,'REGION',0,$_SESSION['REGION']);
View::hide(215,670,'WILAYA',0,$_SESSION['WILAYA']);
View::hide(215,670,'STRUCTURE',0,$_SESSION['STRUCTURE']);
View::hide(215,670,'login',0,$_SESSION['login']);
View::photosurl(1100,350,URL.'public/images/photos/PRE.jpg');	
View::submit(760,620,'ENREGISTRER');									
View::f1();	
View::sautligne(15);	
?>	
	