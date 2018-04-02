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
"butun"      => 'Edit Courrier Arrivé ', 
"photos"     => 'public/images/photos/ar.jpg',
"action"     => 'cour/editcourSave/'.$this->user[0]['id']
);
view::button($data['btn'],'');
echo "<h2>Edit Courrier Arrivé</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;


$NARCH=view::lastid("courarch");
$this->label($x,$y+250,'Date Arrivé');       $this->txtron($x+100,$y+240,'DATEAR',0,view::dateUS2FR($this->user[0]['DATEAR']),'dateus');  
$this->label($x,$y+250+30,'N° Arrivé');      $this->txtron($x+100,$y+240+30,'NAR',0,$this->user[0]['NAR'],'dateus');
$this->label($x,$y+250+60,'Date Courrier');  $this->txts($x+100,$y+240+60,'DATECR',0,view::dateUS2FR($this->user[0]['DATECR']),'dateus1');  
$this->label($x,$y+250+90,'N° Courrier');    $this->txt($x+100,$y+240+90,'NCR',0,$this->user[0]['NCR'],'dateus');
$this->label($x,$y+250+120,'Expediteur');    $this->txt($x+100,$y+240+120,'EXP',0,$this->user[0]['EXP'],'date');
$this->label($x,$y+250+150,'Objet');         $this->txt($x+100,$y+240+150,'OBJ',0,$this->user[0]['OBJ'],'date');
$this->label($x,$y+250+180,'N° Archive');    $this->txtron($x+100,$y+240+180,'NA',0,$this->user[0]['NA'],'date');
$this->submit($x+100,$y+250+180+30,$data['butun']);
$this->f1();
view::sautligne(12);
ob_end_flush();
?>