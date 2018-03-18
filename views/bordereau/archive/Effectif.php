<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'image','weigth=toolbar=no,scrollbars=no,resizable=yes, width=220, height=268');	
	w.document.write("<HTML><BODY onblur=\"window.close();\"><IMG src='"+img+"'>");
	w.document.write("</BODY></HTML>");
	w.document.close();
}
</script>
<?php 
verifsession();	
view::button('scolaire','');
lang(Session::get('lang'));
ob_start();
// view::munu('scolaire'); 
?>
<h2>New Effectif Etablissement </h2 ><hr /><br />
<?php
$this->f0(URL.'scolaire/createeffectif/','post');
View::photosurl(1070,230,URL.'public/images/photos/puit1.jpg');
$x=35;$y=220+90;


$this->label($x+5,240,'Date effectif'); $this->date($x+125,230,'DATE',0,date('Y'),'date');
$this->WILAYA($x-5,270,'WILAYAR','countryss','mvc','wil','17000','Wilaya Etablissement');
$this->COMMUNE($x+220,270,'COMMUNER','COMMUNESS','924','Commune Etablissement');
$this->COMMUNE($x+440,270,'ETA','ETASS','924','Nom Etablissement');

$this->label($x+5,310,'1ap');     $this->date($x-5,330,'1ap',0,'00','date');
$this->label($x+5+85,310,'2ap');  $this->date($x-5+85,330,'2ap',0,'00','date');
$this->label($x+5+85*2,310,'3ap');$this->date($x-5+85*2,330,'3ap',0,'00','date');
$this->label($x+5+85*3,310,'4ap');$this->date($x-5+85*3,330,'4ap',0,'00','date');
$this->label($x+5+85*4,310,'5ap');$this->date($x-5+85*4,330,'5ap',0,'00','date');


$this->label($x+5+85*5,310,'1am');$this->date($x-5+85*5,330,'1am',0,'00','date');
$this->label($x+5+85*6,310,'2am');$this->date($x-5+85*6,330,'2am',0,'00','date');
$this->label($x+5+85*7,310,'3am');$this->date($x-5+85*7,330,'3am',0,'00','date');
$this->label($x+5+85*8,310,'4am');$this->date($x-5+85*8,330,'4am',0,'00','date');

$this->label($x+5+85*9,310,'1as');$this->date($x-5+85*9,330,'1as',0,'00','date');
$this->label($x+5+85*10,310,'2as');$this->date($x-5+85*10,330,'2as',0,'00','date');
$this->label($x+5+85*11,310,'3as');$this->date($x-5+85*11,330,'3as',0,'00','date');




$this->submit(835,390,'Inser New Effectif');
$this->f1();
ob_end_flush();
view::sautligne(12);
?>






