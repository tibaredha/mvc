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
"butun"     => 'Inser New MesurePrise ', 
"photos"    => 'public/images/photos/msp.jpg',
"action"    => 'inspection/createMesurePrise/'.$this->user[0]['id'],
"MP"        => array( 
				$this->user[0]['MP'] => $this->user[0]['MP'],
				"Ras"=>"0",
				"Convocation"=>"1",
				"Questionnaire"=>"2",
				"Mise en Demeure"=>"3",
				"Rappel à l'ordre"=>"4",
				// "Fermeture_temp"=>"5",
				// "Fermeture_def"=>"6"					 
				)
);
view::button($data['btn'],'');
echo "<h2>Mesure Prise : ".strtoupper($this->user[0]['DATE'])."_".$this->user[0]['ids']." ( ".$this->nbrtostring("structure","id",$this->user[0]['ids'],"NOM")."_".$this->nbrtostring("structure","id",$this->user[0]['ids'],"PRENOM")." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+220,'Mesure Prise');    $this->combov1($x+100,$y+210,'MP',$data['MP']);
$this->hide(215,370,'ids','0', $this->user[0]['ids']);
$this->submit($x+800,$y+340,$data['butun']);
$this->f1();
view::sautligne(19);
ob_end_flush();
?>
















