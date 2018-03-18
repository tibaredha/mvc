<?php 
verifsession();	
view::button('pre','');
View::h('2',25,290,'Preparation : Edit poche n °:'.$this->user[0]['IDP']);
View::sautligne(2);
View::hr();
View::f0(URL.'pre/editSave/'.$this->user[0]['id'],'post');


View::fieldset("pre0"," Poches De Sang Non Conformes");
View::fieldset("pre1"," PSL prepares Non Conformes");
View::fieldset("pre2"," PSL prepares  Conformes");
View::fieldset("pre3"," PSL ");


View::label(730,360+10,'Preparation date'); View::txt(850,360,'DATEPRE',0,date('Y-m-d'));
View::label(730,390+10,'ABO');           View::combov(850,390,'GRABO',array($this->user[0]['GROUPAGE'],"A","B","AB","O"));   
View::label(730,420+10,'RH');            View::combov(850,420,'GRRH1',array($this->user[0]['RHESUS'],"Positif","negatif"));
View::label(730,450+10,'Hépatite B');    View::combov(850,450,'HVB',array($this->user[0]['HVB'],"negatif","douteux","Positif"));           
View::label(730,480+10,'Hépatite C');    View::combov(850,480,'HVC',array($this->user[0]['HVC'],"negatif","douteux","Positif"));
View::label(730,510+10,'VIH/sida');      View::combov(850,510,'HIV',array($this->user[0]['HIV'],"negatif","douteux","Positif"));          
View::label(730,540+10,'Syphilis/TPHA'); View::combov(850,540,'TPHA',array($this->user[0]['TPHA'],"negatif","douteux","Positif"));
//*****//
View::label(25,370,'Volume issufisant');View::chekbox(155,370,'VI');     
View::label(225,370,'Fuite defaut soudure');View::chekbox(375,370,'FDS'); 
View::label(425,370,'Aspect coagule');View::chekbox(535,370,'AC'); 
View::label(610,370,'AUTRES');View::chekbox(670,370,'AUTRES');       

//*****//
View::label(25,430,'FDS ');View::chekbox(155,430,'CGRAUTRES');
View::label(25,460,'AC');View::chekbox(155,460,'CGRFDS');
View::label(25,490,'QNS');View::chekbox(155,490,'CGRAC');
View::label(25,520,'SP');View::chekbox(155,520,'CGRQNS');
View::label(25,550,'AUTRES');View::chekbox(155,550,'CGRSP');
//*****//
View::label(225,430,'FDS ');View::chekbox(375,430,'PFCFDS');
View::label(225,460,'QNS');View::chekbox(375,460,'PFCQNS');
View::label(225,490,'AL');View::chekbox(375,490,'PFCAL');
View::label(225,520,'AH');View::chekbox(375,520,'PFCAH');
View::label(225,550,'AI');View::chekbox(375,550,'PFCAI');
View::label(225,580,'SP');View::chekbox(375,580,'PFCSP');
View::label(225,610,'AUTRES');View::chekbox(375,610,'PFCAUTRES');
//*****//
View::label(425,430,'FDS');View::chekbox(535,430,'CPSFDS');
View::label(425,460,'AH');View::chekbox(535,460,'CPSAH');
View::label(425,490,'QNS');View::chekbox(535,490,'CPSQNS');
View::label(425,520,'SP');View::chekbox(535,520,'CPSSP');
View::label(425,550,'AUTRES');View::chekbox(535,550,'CPSAUTRES');
//*****//
View::label(25,670,'CGR');View::chekboxed(25+30,670,'CGR');
View::label(225,670,'PFC');View::chekboxed(225+30,670,'PFC');//
View::label(425,670,'CPS');View::chekbox(425+30,670,'CPS');



View::hide(215,670,'IDDNR',0,$this->user[0]['IDDNR']);
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
View::submit(850,580,'ENREGISTRER');									
View::f1();	
View::sautligne(15);	
?>	
	