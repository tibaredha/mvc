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
"Date"       => date('Y-m-j'), 
"btn"        => 'inspection', 
"id"         => '', 
"butun"      => 'imprimer conformite', 
"photos"     => 'public/images/icons/pers.PNG',
"action"     => 'tcpdf/inspection/pvconf12.php?uc='.$this->user[0]['id'],

"NAT"        => array( 
				"Transfert"=>"1",
				"Instatlation"=>"2",
				"Ouverture"=>"3"			 
				)


);
view::button($data['btn'],'');
echo "<h2>PV de conformite du local de : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+220,'Date PV ');              $this->txt($x+150,$y+210,'DATEP',0,date('j-m-Y')); $this->combov1($x+400,$y+210,'NAT',$data['NAT']);
$this->label($x,$y+260,'Demande N ');            $this->txt($x+150,$y+250,'NUMD',0,"00"); $this->txt($x+400,$y+250,'DATED',0,date('j-m-Y'),'date');
$this->label($x,$y+300,'Salle des ventes ');     $this->txt($x+150,$y+290,'SDV',0,"00");
$this->label($x,$y+340,'Bureau ');               $this->txt($x+150,$y+330,'BUR',0,"00");
$this->label($x,$y+380,'Salle de préparation '); $this->txt($x+150,$y+370,'SDP',0,"00");
$this->label($x,$y+420,'Salle de stockage ');    $this->txt($x+150,$y+410,'SDS',0,"00");
$this->label($x,$y+460,'Sanitaires ');           $this->txt($x+150,$y+450,'SAN',0,"00");
$this->label($x,$y+500,'Surface total ');        $this->txt($x+150,$y+490,'STL',0,"00");

$this->label($x+400,$y+420,'1er pharmacien');  $this->combopharmacien($x+520,$y+410,"PHA1","","","pharmacie");   $this->label($x+800,$y+420,'Distance 1 ');$this->txt($x+880,$y+410,'DIST1',0,"00");
$this->label($x+400,$y+460,'2em pharmacien');  $this->combopharmacien($x+520,$y+450,"PHA2","","","pharmacie");   $this->label($x+800,$y+460,'Distance 2 ');$this->txt($x+880,$y+450,'DIST2',0,"00");
$this->label($x+400,$y+500,'3em pharmacien');  $this->combopharmacien($x+520,$y+490,"PHA3","","","pharmacie");   $this->label($x+800,$y+500,'Distance 3 '); $this->txt($x+880,$y+490,'DIST3',0,"00");

$this->submit($x+400,$y+540,$data['butun']);
$this->f1();
view::sautligne(15);
ob_end_flush();

?>
		
		