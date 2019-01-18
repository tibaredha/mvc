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

"WILAYAN1"  => '17000' ,
"WILAYAN2"  => 'DJELFA',
"COMMUNEN1" => '924' ,
"COMMUNEN2" => 'Ain-oussera',
"ADRESSE"  => 'x',
"ADRESSEAR"  => 'x',

"NAT"        => array( 
				"Transfert"=>"1",
				"Instatllation"=>"2",
				"Ouverture"=>"3"			 
				)
);
view::button($data['btn'],'');
echo "<h2>PV de conformite du local de : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+220,'Wilaya');                $this->WILAYA($x+150,$y+210,'WILAYA','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+400,$y+220,'Commune');           $this->COMMUNE($x+520,$y+210,'COMMUNE','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
$this->label($x+800,$y+220,'Adresse');           $this->txt($x+880,$y+210,'ADRESSE',0,$data['ADRESSE'],'date');
$this->label($x,$y+260,'Date PV ');              $this->txt($x+150,$y+250,'DATEP',0,date('j-m-Y')); $this->label($x+400,$y+260,'Nature PV');                $this->combov1($x+520,$y+250,'NAT',$data['NAT']);
$this->label($x,$y+300,'Demande N ');            $this->txt($x+150,$y+290,'NUMD',0,"00");           $this->label($x+400,$y+300,'Date demande');          $this->txt($x+520,$y+290,'DATED',0,date('j-m-Y'),'date');
$this->label($x,$y+340,'Salle des ventes ');     $this->txt($x+150,$y+330,'SDV',0,"00");
$this->label($x,$y+380,'Bureau ');               $this->txt($x+150,$y+370,'BUR',0,"00");
$this->label($x,$y+420,'Salle de préparation '); $this->txt($x+150,$y+410,'SDP',0,"00");
$this->label($x,$y+460,'Salle de stockage ');    $this->txt($x+150,$y+450,'SDS',0,"00");
$this->label($x,$y+500,'Sanitaires ');           $this->txt($x+150,$y+490,'SAN',0,"00");
$this->label($x,$y+540,'Surface total ');        $this->txt($x+150,$y+530,'STL',0,"00");
$this->label($x+400,$y+420,'1er pharmacien');  $this->combopharmacien($x+520,$y+410,"PHA1","","","pharmacie");   $this->label($x+800,$y+420,'Distance 1 ');$this->txt($x+880,$y+410,'DIST1',0,"00");
$this->label($x+400,$y+460,'2em pharmacien');  $this->combopharmacien($x+520,$y+450,"PHA2","","","pharmacie");   $this->label($x+800,$y+460,'Distance 2 ');$this->txt($x+880,$y+450,'DIST2',0,"00");
$this->label($x+400,$y+500,'3em pharmacien');  $this->combopharmacien($x+520,$y+490,"PHA3","","","pharmacie");   $this->label($x+800,$y+500,'Distance 3 '); $this->txt($x+880,$y+490,'DIST3',0,"00");
$this->submit($x+880,$y+540,$data['butun']);
$this->f1();
view::sautligne(15);
ob_end_flush();

?>
		
		