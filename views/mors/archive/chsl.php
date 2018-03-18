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
<h2>Controle Hygiene et salubrite des etablissements scolaires </h2 ><hr /><br />
<?php
$this->f0(URL.'scolaire/createchsl/','post');
View::photosurl(1070,230,URL.'public/images/photos/puit1.jpg');
$this->label(30,250,'ID ETA');
$this->WILAYA(90,240,'WILAYAR','countryss','mvc','wil','17000','Wilaya Etablissement');
$this->COMMUNE(80+240,240,'COMMUNER','COMMUNESS','924','Commune Etablissement');
$this->COMMUNE(80+230+240,240,'ETA','ETASS','1','Nom Etablissement');
$this->label(400,250+30,'Anomalies');         $this->label(150+410,250+30,'Constatées');          $this->label(160+530,250+30,'Corrigées ');
$this->label(400,250+60,'Cantine');           $this->date(150+400,240+60,'STCANTINE',0,'0');       $this->date(150+530,240+60,'RGCANTINE',0,'0');
$this->label(400,250+90,'Environnement');     $this->date(150+400,240+90,'STENVIRONNEMENT',0,'0'); $this->date(150+530,240+90,'RGENVIRONNEMENT',0,'0');
$this->label(400,250+120,'Points d eau');     $this->date(150+400,240+120,'STAEP',0,'0');          $this->date(150+530,240+120,'RGAEP',0,'0');
$this->label(400,250+150,'Bloc Sanitaire');   $this->date(150+400,240+150,'STSANITAIRE',0,'0');    $this->date(150+530,240+150,'RGSANITAIRE',0,'0'); 
$this->label(400,250+180,'Clases');           $this->date(150+400,240+180,'STCLASES',0,'0');       $this->date(150+530,240+180,'RGCLASES',0,'0'); 
$this->label(400,250+210,'Date');$this->txt(150+400,240+210,'DATE',0,date('Y-m-d'),'date');
$this->submit(150+400,480,'Inser New Controle');
$this->f1();
ob_end_flush();
view::sautligne(12);
?>






