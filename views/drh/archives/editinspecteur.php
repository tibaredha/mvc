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
"btn"       => 'inspection', 
"id"        => '', 
"butun"     => 'Edit Inspection ', 
"photos"    => 'public/images/photos/msp.jpg',
"action"    => 'inspection/editinspecteurx/'.$this->user[0]['id'],
"DATE"      => view::dateUS2FR($this->user[0]['DATE']),
"REF"       => $this->user[0]['REF'],
"PJ"        => $this->user[0]['PJ'],
"Commanditaire" => $this->user[0]['Commanditaire']
);
view::button($data['btn'],'');
echo "<h2>Inspection Structure Sanitaire : ".strtoupper($this->user[0]['ids'])."_".$this->user[0]['ids']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+220,'DATE :');              $this->txts($x+120,$y+210,'DATE',1000,$data['DATE'],'dateus');
$this->label($x,$y+250,'REF :');               $this->txt($x+120,$y+240,'REF',1000,$data['REF'],'dateus');
$this->label($x,$y+280,'PJ :');                $this->txt($x+120,$y+270,'PJ',1000,$data['PJ'],'dateus');	

$Jour=array($data['Commanditaire'],"ISPG","WALI","DSP");
$this->label($x,$y+310,'Commanditaire :');     $this->combov($x+120,$y+300,"Commanditaire",$Jour);

View::hide(215,670,'STRUCTURE',0,$this->user[0]['STRUCTURE']);
$this->submit($x+800,$y+340,$data['butun']);
$this->f1();
view::sautligne(19);
ob_end_flush();
?>



















