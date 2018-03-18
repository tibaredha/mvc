<?php 
verifsession();	
view::button('qua','');
View::h('2',25,290,'Qualification : Edit poche n °: '.$this->user[0]['IDP']);
View::sautligne(2);
View::hr();
View::f0(URL.'qua/editSave/'.$this->user[0]['id'],'post');
View::label(25,400,'Qualification date');View::txt(215,400,'DATEQUA',0,date('Y-m-d'));
View::label(25,430,'ABO');          View::combov(215,430,'GRABO',array($this->user[0]['GROUPAGE'],"A","B","AB","O"));   View::label(500,430,'C'); View::combov(550,430,'GRRH2',array($this->user[0]['CRH2'],"Positif","negatif"));  
View::label(25,460,'RH');           View::combov(215,460,'GRRH1',array($this->user[0]['RHESUS'],"Positif","negatif"));  View::label(500,460,'c'); View::combov(550,460,'GRRH4',array($this->user[0]['CRH4'],"Positif","negatif"));
View::label(25,490,'Hépatite B');   View::combov(215,490,'HVB',array($this->user[0]['HVB'],"negatif","douteux","Positif"));                   View::label(500,490,'E'); View::combov(550,490,'GRRH3',array($this->user[0]['ERH3'],"Positif","negatif")); 
View::label(25,520,'Hépatite C');   View::combov(215,520,'HVC',array($this->user[0]['HVC'],"negatif","douteux","Positif"));                   View::label(500,520,'e'); View::combov(550,520,'GRRH5',array($this->user[0]['ERH5'],"Positif","negatif"));
View::label(25,550,'VIH/sida');     View::combov(215,550,'HIV',array($this->user[0]['HIV'],"negatif","douteux","Positif"));                   View::label(500,550,'K1');View::combov(550,550,'KELL1',array($this->user[0]['KELL1'],"Positif","negatif")); 
View::label(25,580,'Syphilis/TPHA');View::combov(215,580,'TPHA',array($this->user[0]['TPHA'],"negatif","douteux","Positif"));                  View::label(500,580,'K2');View::combov(550,580,'KELL2',array($this->user[0]['KELL2'],"Positif","negatif"));
View::hide(215,670,'IDDNR',0,$this->user[0]['IDDNR']);
View::photosurl(1100,350,URL.'public/images/photos/fig2-1.gif');	
View::submit(760,620,'ENREGISTRER');									
View::f1();	
View::sautligne(15);
?>