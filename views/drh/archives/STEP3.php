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
"DATE"   => date('Y-m-j'), 
"btn"       => 'inspection', 
"id"        => '', 
"butun"     => 'Inser New Inspection ', 
"photos"    => 'public/images/photos/msp.jpg',
"action"    => 'inspection/STEP4/'.$this->user[0]['id'],
"STRUCTURE"  => array(      
                        "EHU"=>"1",
					    "CHU"=>"2",
						"EPH"=>"3",
						"EH"=>"4",
						"EHS"=>"5",
						"EPSP"=>"6",
						"Polyclinique"=>"7",
						"Salle de soins"=>"8",
						"EHP"=>"9",
						"centre d hemodialyse"=>"10",
						"centre de diagnostic"=>"11",
						"officine pharmaceutique"=>"12",
						"laboratoire"=>"13",
						"cabinet chirurugien dentiste specialiste"=>"14",
						"cabinet chirurugien dentiste generaliste"=>"15",
						"cabinet medecin specialiste"=>"16",
						"cabinet medecin generaliste"=>"17",
						"cabinet sagefemme"=>"18", 
						"cabinet psychologue"=>"19", 
						"cabinet de soins "=>"20", 
						"transport sanitairee"=>"21" 
					  ),
"NATURE"  => array(      
                        "PUBLIC"=>"1",
					    "PRIVEE"=>"2"	   
					  ),					  
"SEXE"  => array(      
                       "Masculin"=>"M",
					   "Feminin"=>"F"					   			   
					  ),					  
"NOM"  => 'x' ,
"PRENOM"  => 'x' ,					  
"AGE"  => '0' ,
"WILAYAN1"  => '17000' ,
"WILAYAN2"  => 'DJELFA',
"COMMUNEN1" => '924' ,
"COMMUNEN2" => 'Ain-oussera',
"ADRESSE"  => 'x', 
"OBSERVATION"  => 'x' 
);
view::button($data['btn'],'');
echo "<h2>Inspection Structure Sanitaire : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+250,'Date');              $this->txt($x+100,$y+240,'DATE',0,$data['DATE'],'date');  
// $this->label($x+350,$y+250,'Type');          $this->combov1($x+450,$y+240,'STRUCTURE',$data['STRUCTURE']);
// $this->label($x+700,$y+250,'Nature');        $this->combov1($x+800,$y+240,'NATURE',$data['NATURE']);
// $this->label($x,$y+280,'Nom');               $this->txt($x+100,$y+270,'NOM',0,$data['NOM'],'date');
// $this->label($x+350,$y+280,'Prenom');        $this->txt($x+450,$y+270,'PRENOM',0,$data['PRENOM'],'date');
// $this->label($x+700,$y+280,'Sexe');          $this->combov1($x+800,$y+270,'SEXE',$data['SEXE']);
// $this->label($x,$y+310,'Wilaya');            $this->WILAYA($x+100,$y+300,'WILAYA','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
// $this->label($x+350,$y+310,'Commune');       $this->COMMUNE($x+100+350,$y+300,'COMMUNE','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
// $this->label($x+700,$y+310,'Adresse');       $this->txt($x+100+350+350,$y+300,'ADRESSE',0,$data['ADRESSE'],'date');
$this->submit($x+800,$y+340,$data['butun']);
$this->f1();
view::sautligne(19);
ob_end_flush();