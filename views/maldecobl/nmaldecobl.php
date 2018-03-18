<?php
verifsession();	
lang(Session::get('lang'));
ob_start();
View::fieldset("mdo0","<strong>***</strong>"); 
View::fieldset("bnm1","<strong>***</strong>"); 
View::fieldset("bnm2","<strong>***</strong>"); 
View::fieldset("bnm3","<strong>***</strong>"); 
View::fieldset("bnm4","<strong>***</strong>"); 
View::fieldset("bnm5","<strong>***</strong>"); 
View::fieldset("bnm6","<strong>***</strong>"); 
$data = array(
"DATEMDO"      => date('j-m-Y'), 
"btn"       => 'maldecobl', 
"id"        => '', 
"butun"     => 'Inser New MDO', 
"photos"    => 'public/images/photos/MADO.jpg',
"action"    => 'maldecobl/createmaldecobl/',
"STRUCTURE"  => array(       
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
                       "Masculin"=>"M",
					   "Feminin"=>"F"					   			   
					  ),					  

"nom"  => 'x' ,
"prenom"  => 'x' ,					  
"AGE"  => '0' ,
"WILAYAN1"  => '17000' ,
"WILAYAN2"  => 'DJELFA',
"COMMUNEN1" => '924' ,
"COMMUNEN2" => 'Ain-oussera',
"ADRESS"  => 'x', 
"OBSERVATION"  => 'x' 
);

view::button($data['btn'],'');
echo "<h2>Maladie A Déclaration Obligatoire </h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+250,'Date');              $this->txt($x+100,$y+240,'DATEMDO',0,$data['DATEMDO'],'date');  
$this->label($x+350,$y+250,'Etablissement'); $this->combov1($x+450,$y+240,'STRUCTURE',$data['STRUCTURE']);
$this->label($x,$y+250+30,'Service');        //$this->combov1($x+100,$y+270+30,'STRUCTURED1',$data['STRUCTURED1']);
$this->label($x,$y+250+60,'Medecin');        //$this->combov1($x+100,$y+270+60,'STRUCTURED1',$data['STRUCTURED1']);
$this->label($x+350,$y+250+60,'Maladie');    $this->MDO($x+450,$y+250+50,'MDO','mvc','MDO','34','Maladie a declaration obligatoire')  ;
$this->label($x,$y+280+120,'Nom');           $this->txt($x+100,$y+280+110,'nom',0,$data['nom'],'date');
$this->label($x+350,$y+280+120,'Prenom');    $this->txt($x+450,$y+280+110,'prenom',0,$data['prenom'],'date');
$this->label($x,$y+280+150,'Sexe');          $this->combov1($x+100,$y+280+140,'SEXE',$data['SEXE']);
$this->label($x+350,$y+280+150,'Age');       $this->txt($x+450,$y+280+140,'AGE',0,$data['AGE'],'date');
$this->label($x,$y+280+240,'Wilaya');        $this->WILAYA($x+100,$y+280+230,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+350,$y+280+240,'Commune');   $this->COMMUNE($x+450,$y+280+230,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
$this->label($x,$y+280+310,'Adresse');       $this->txt($x+100,$y+280+300,'ADRESS',0,$data['ADRESS'],'date');
$this->label($x,$y+280+330+70,'Observation');   $this->txt($x+100,$y+280+330+60,'OBSERVATION',0,$data['OBSERVATION'],'date');
$this->submit($x+230,$y+760,$data['butun']);
$this->f1();
ob_end_flush();
view::sautligne(28);
?>



	