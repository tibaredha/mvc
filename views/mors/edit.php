<?php 
verifsession();	
lang(Session::get('lang'));
ob_start();$url1 = explode('/',$_GET['url']);
$pieces = explode("_",$this->user[0]['NOMPRENOM']);
if (isset($pieces[1])) {$pieces[1];} else {$pieces[1]='';}  ; 
$data = array(
"DATEMDO"   => $this->dateUS2FR($this->user[0]['DATEMDO']) , 
"btn"       => 'maldecobl', 
"id"        => $this->user[0]['id'], 
"butun"     => 'Update mdo', 
"photos"    => 'public/images/photos/pda.jpg',
"action"    => 'maldecobl/editSave/',
"STRUCTURE"  => array(  
						$this->user[0]['STRUCTURE']=>$this->user[0]['STRUCTURE'],
                       
					    "EPSP_AIN_OUSSERA"=>"1",
					    "EPSP_HASSI_BAHBAH"=>"2",
					    "EPSP_DJALFA"=>"3",
						"EPSP_MESSAAD"=>"4",
						"EPSP_GUETTARA"=>"5",
						"EPH_AIN_OUSSERA"=>"6",
						"EPH_HASSI_BAHBAH"=>"7",
						"EPH_DJALFA"=>"8",
					    "EPH_MESSAAD"=>"9",
					    "EPH_IDRISSIA"=>"10",	
					    "EHS_DJELFA"=>"11"			   
					  ),
"SEXE"  => array(  
					   $this->user[0]['SEXE']=>$this->user[0]['SEXE'],
                       "Masculin"=>"M",
					   "Feminin"=>"F" 			   
					  ),					  

"nom"     => $pieces[0] ,
"prenom"  => $pieces[1] ,					  
"AGE"  => $this->user[0]['AGE'] ,
"WILAYAN1"  => $this->user[0]['WILAYAN'] ,
"WILAYAN2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYAN'],'WILAYAS'),
"COMMUNEN1" => $this->user[0]['COMMUNE'] ,
"COMMUNEN2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE'],'COMMUNE'),
"ADRESS"  => $this->user[0]['ADRESS'], 
"MDO1"  => $this->user[0]['MDO'] ,
"MDO2"  => View::nbrtostring('mdo','id',$this->user[0]['MDO'],'mdo'),
"OBSERVATION"  => $this->user[0]['OBSERVATION']
);



view::button($data['btn'],'');
echo "<h2>Maladie A Déclaration Obligatoire </h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+250,'Date');          $this->txt($x+100,$y+240,'DATEMDO',0,$data['DATEMDO'],'date');  
$this->label($x,$y+280,'Etablissement'); $this->combov1($x+100,$y+270,'STRUCTURE',$data['STRUCTURE']);
$this->label($x,$y+280+30,'Service');    //$this->combov1($x+100,$y+270+30,'STRUCTURED1',$data['STRUCTURED1']);'Maladie a declaration obligatoire'
$this->label($x,$y+280+60,'Medecin');    //$this->combov1($x+100,$y+270+60,'STRUCTURED1',$data['STRUCTURED1']);
$this->label($x,$y+280+90,'Maladie');    $this->MDO($x+100,$y+270+90,'MDO','mvc','MDO',$data['MDO1'],$data['MDO2'])  ;
$this->label($x,$y+280+120,'nom');       $this->txt($x+100,$y+280+110,'nom',0,$data['nom'],'date');
$this->label($x,$y+280+150,'prenom');    $this->txt($x+100,$y+280+140,'prenom',0,$data['prenom'],'date');
$this->label($x,$y+280+180,'sexe');      $this->combov1($x+100,$y+280+170,'SEXE',$data['SEXE']);
$this->label($x,$y+280+210,'age');       $this->txt($x+100,$y+280+200,'AGE',0,$data['AGE'],'date');
$this->label($x,$y+280+240,'Wilaya');    $this->WILAYA($x+100,$y+280+230,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x,$y+280+270,'Commune');   $this->COMMUNE($x+100,$y+280+260,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
$this->label($x,$y+280+300,'adresse');   $this->txt($x+100,$y+280+290,'ADRESS',0,$data['ADRESS'],'date');
$this->label($x,$y+280+330,'OBSERVATION');   $this->txt($x+100,$y+280+320,'OBSERVATION',0,$data['OBSERVATION'],'date');
View::hide(215,670,'id',0,$data['id']);
$this->submit($x+230,$y+650,$data['butun']);
$this->f1();
ob_end_flush();
view::sautligne(28);	
?>