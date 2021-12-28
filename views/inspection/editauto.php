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

"btn"        => 'inspection', 
"id"         => '', 
"butun"      => 'Modifier Vehicule', 
"photos"     => 'public/images/icons/auto.png',
"action"     => 'inspection/editSavesauto/'.$this->user[0]['id'],

"Date"       => view::dateUS2FR($this->user[0]['Date']), 
"WILAYAN1"  => $this->user[0]['WILAYA'] ,"WILAYAN2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA'],'WILAYAS'),
"COMMUNEN1" => $this->user[0]['COMMUNE'] ,"COMMUNEN2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE'],'COMMUNE'),
"Categorie"  => array( 
                        $this->user[0]['Categorie'] => $this->user[0]['Categorie'],
                        "Ambulance médicalisée"=>"A",
						"Ambulance sanitaire"=>"B",
					    "Véhicule sanitaire léger"=>"C"							
					  ),
"Type"  => $this->user[0]['Type'] ,					  
"Serie_Type"  => $this->user[0]['Serie_Type'] ,						  
"Marque"  => array( 
                        $this->user[0]['Marque'] => $this->user[0]['Marque'],
                        "BALARUS"=>"BALARUS",
						"BOULARSANE"=>"BOULARSANE",
						"CITROËN"=>"CITROËN",
						"CHEVROLET"=>"CHEVROLET",
						"DACIA"=>"DACIA",
						"HYUNDAI"=>"HYUNDAI",
						"JINBEI"=>"JINBEI",
						"JMC"=>"JMC",
						"KIA"=>"KIA",
						"NISSANE"=>"NISSANE",
						"PEUGEOT"=>"PEUGEOT",
						"RENAULT"=>"RENAULT",
						"MERCEDES"=>"MERCEDES"
					  ),					  
					  
"Immatri"  => $this->user[0]['Immatri'],
"Precedent"  => $this->user[0]['Precedent'] ,					  
"Annee"  => $this->user[0]['Annee'], 

"sieges"  => $this->user[0]['sieges'] ,

"NASS"  => $this->user[0]['NASS'], 
"DUNASS"  => view::dateUS2FR($this->user[0]['DUNASS']), 
"AUNASS"  => view::dateUS2FR($this->user[0]['AUNASS']), 
"CTRL"  => $this->user[0]['CTRL'], 
"DUCTRL"  => view::dateUS2FR($this->user[0]['DUCTRL']), 
"AUCTRL"  => view::dateUS2FR($this->user[0]['AUCTRL']) 
);
view::button($data['btn'],'');
echo "<h2>Modification Vehicule : ".$this->user[0]['Immatri']."</h2 ><hr /><br />";
//echo "<h2>Nouveau Vehicule : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+220,'Date');              $this->txts($x+100,$y+210,'Date',0,$data['Date'],'dateus');  

$this->label($x,$y+250,'Wilaya aff');        $this->WILAYA($x+100,$y+240,'WILAYA','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+350,$y+250,'Commune aff');   $this->COMMUNE($x+100+350,$y+240,'COMMUNE','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
$this->label($x+700,$y+250,'Categorie');     $this->combov1($x+800,$y+240,'Categorie',$data['Categorie']);

$this->label($x,$y+280,'Type');              $this->txt0($x+100,$y+270,'Type',20,$data['Type'],'date');
$this->label($x+350,$y+280,'Serie_Type');    $this->txt0($x+450,$y+270,'Serie_Type',20,$data['Serie_Type'],'date');
$this->label($x+700,$y+280,'Marque');        $this->combov1($x+800,$y+270,'Marque',$data['Marque']);

$this->label($x,$y+310,'Immatriculation');   $this->txts($x+100,$y+300,'Immatri',0,$data['Immatri'],'immat');
$this->label($x+350,$y+310,'Precedent num'); $this->txts($x+450,$y+300,'Precedent',0,$data['Precedent'],'immat1');
$this->label($x+700,$y+310,'Annee');         $this->txt($x+100+350+350,$y+300,'Annee',0,$data['Annee'],'date');

$this->label($x,$y+350,'Nbr de sièges');    $this->txts($x+100,$y+340,'sieges',0,$data['sieges'],'sieges');
$this->label($x+350,$y+350,'Energie');      

$this->label($x+450,$y+350,'Essence');     if ($this->user[0]['ess']==1){$this->chekboxed($x+505,$y+345,"ess");}      else  {$this->chekbox($x+505,$y+345,"ess");}  
$this->label($x+450+90,$y+350,'Diesel');   if ($this->user[0]['die']==1){$this->chekboxed($x+500+80,$y+345,"die");}     else  {$this->chekbox($x+500+80,$y+345,"die");} 
$this->label($x+450+90+85,$y+350,'Gaz');   if ($this->user[0]['gaz']==1){$this->chekboxed($x+500+80+70,$y+345,"gaz");}  else  {$this->chekbox($x+500+80+70,$y+345,"gaz");} 


$this->label($x,$y+340+40,'_______________________________________________________________________________________'); 
$this->label($x,$y+380+40,'N ASSURANCE');       $this->txt($x+100,$y+370+40,'NASS',0,$data['NASS'],'date');
$this->label($x+350,$y+380+40,'DU');            $this->txts($x+450,$y+370+40,'DUNASS',0,$data['DUNASS'],'dateus1');
$this->label($x+700,$y+380+40,'AU');            $this->txts($x+100+350+350,$y+370+40,'AUNASS',0,$data['AUNASS'],'dateus2');
$this->label($x,$y+420+40,'N CONTROLE');        $this->txt($x+100,$y+410+40,'CTRL',0,$data['CTRL'],'date');
$this->label($x+350,$y+420+40,'DU');            $this->txts($x+450,$y+410+40,'DUCTRL',0,$data['DUCTRL'],'dateus3');
$this->label($x+700,$y+420+40,'AU');            $this->txts($x+100+350+350,$y+410+40,'AUCTRL',0,$data['AUCTRL'],'dateus4');


$this->hide(215,370,'idt','0', $this->user[0]['idt']);
$this->submit($x+800,$y+450+40,$data['butun']);
$this->f1();
view::sautligne(15);
ob_end_flush();

?>
	
		




	
