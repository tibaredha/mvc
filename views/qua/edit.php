<?php 
verifsession();	
view::button('qua','');
View::h('2',25,220,'Qualification : Edit poche n °: '.$this->user[0]['IDP']);
View::sautligne(2);
View::hr();
//View::fieldset("ih","Immuno-Hematologie-Serologie");
View::f0(URL.'qua/editSave/'.$this->user[0]['id'],'post');
View::label(25,300,'Qualification date');View::txt(215,300,'DATEQUA',0,date('Y-m-d'));
View::label(25,330,'ABO');View::combov(215,330,'GRABO',array($this->user[0]['GROUPAGE'],"A","B","AB","O"));   View::label(500,330,'C'); View::combov(550,330,'GRRH2',array($this->user[0]['CRH2'],"Positif","negatif"));  
View::label(25,360,'RH'); View::combov(215,360,'GRRH1',array($this->user[0]['RHESUS'],"Positif","negatif"));  View::label(500,360,'c'); View::combov(550,360,'GRRH4',array($this->user[0]['CRH4'],"Positif","negatif"));
View::label(25,390,'Hépatite B');   View::combov(215,390,'HVB',array("negatif","douteux","Positif"));         View::label(500,390,'E'); View::combov(550,390,'GRRH3',array($this->user[0]['ERH3'],"Positif","negatif")); 
View::label(25,420,'Hépatite C');   View::combov(215,420,'HVC',array("negatif","douteux","Positif"));         View::label(500,420,'e'); View::combov(550,420,'GRRH5',array($this->user[0]['ERH5'],"Positif","negatif"));
View::label(25,450,'VIH/sida');     View::combov(215,450,'HIV',array("negatif","douteux","Positif"));         View::label(500,450,'K1');View::combov(550,450,'KELL1',array($this->user[0]['KELL1'],"Positif","negatif")); 
View::label(25,480,'Syphilis/TPHA');View::combov(215,480,'TPHA',array("negatif","douteux","Positif"));        View::label(500,480,'K2');View::combov(550,480,'KELL2',array($this->user[0]['KELL2'],"Positif","negatif"));
View::hide(215,570,'IDDNR',0,$this->user[0]['IDDNR']);
View::photosurl(1100,250,URL.'public/images/photos/fig2-1.gif');	
View::submit(550,520,'ENREGISTRER');									
View::f1();	
View::sautligne(15);	
?>







