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
<h2>New Etablissement </h2 ><hr /><br />
<?php
$this->f0(URL.'scolaire/createetabscolaire/','post');
View::photosurl(1070,230,URL.'public/images/photos/puit1.jpg');
$x=35;$y=220+90;
$this->label($x,250,'Etablissement');$this->txt(150,240,'ETA',0,'x');
$this->label($x,280,'Wilaya');$this->WILAYA(150,270,'WILAYAN','country','mvc','wil','17000','Wilaya De Residence');
$this->label($x,310,'Commune');$this->COMMUNE(150,300,'COMMUNEN','COMMUNEN','924','Commune De Residence');
$this->label($x,340,'Adresse');$this->txt(150,330,'ADRESSE',0,'x');
$this->label($x,370,'Type');
$this->combov1(150,360,'TYPEETA',array(
"Primaire"=>"1",
"Moyenne"=>"2",
"Secondaire"=>"3",
"Universitaire"=>"4"
));
$this->label($x+400,250,'Clases');         $this->txt(150+400,240,'CLASES',0,'0');
$this->label($x+400,250+30,'Cantine');     $this->txt(150+400,240+30,'CANTINE',0,'0');
$this->label($x+400,250+60,'Points d eau');$this->txt(150+400,240+60,'AEP',0,'0');
$this->label($x+400,250+90,'Sanitaire');   $this->txt(150+400,240+90,'SANITAIRE',0,'0');
$this->label($x+400,250+120,'Date');$this->date(150+400,240+120,'DATE',0,date('Y-m-d'),'date');
$this->submit(150+400,390,'Inser New scolaire');
$this->f1();
ob_end_flush();
view::sautligne(12);
?>






