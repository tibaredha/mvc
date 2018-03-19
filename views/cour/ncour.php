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
lang(Session::get('lang'));
ob_start();
$data = array(
"btn"        => 'cour', 
"id"         => '', 
"butun"      => 'Inser Courrier Arrivé ', 
"photos"     => 'public/images/photos/ar.jpg',
"action"     => 'cour/createcour/'
);
view::button($data['btn'],'');
echo "<h2>Courrier Arrivé</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+250,'Date Arrivé');       $this->txts($x+100,$y+240,'DATEAR',0,date('d-m-Y'),'dateus');  
$this->label($x,$y+250+30,'N° Arrivé');      $this->txt($x+100,$y+240+30,'NAR',0,'','dateus');
$this->label($x,$y+250+60,'Date Courrier');  $this->txts($x+100,$y+240+60,'DATECR',0,date('d-m-Y'),'dateus');  
$this->label($x,$y+250+90,'N° Courrier');    $this->txt($x+100,$y+240+90,'NCR',0,'','dateus');
$this->label($x,$y+250+120,'Expediteur');    $this->txt($x+100,$y+240+120,'EXP',0,'','date');
$this->label($x,$y+250+150,'Objet');         $this->txt($x+100,$y+240+150,'OBJ',0,'','date');
$this->submit($x+100,$y+250+180,$data['butun']);
$this->f1();
view::sautligne(12);
ob_end_flush();
?>