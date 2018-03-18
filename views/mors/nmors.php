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
"DATEMORS"      => date('j-m-Y'), 
"btn"       => 'mors', 
"id"        => '', 
"butun"     => 'Inser New MORS', 
"photos"    => 'public/images/photos/MADO.jpg',
"action"    => 'mors/createmors/',
"STRUCTURE"  => array(      
                       "EPSP_AIN_OUSSERA"=>"1",
					    "EPSP_AIN_OUSSERA"=>"2",
					    "EPSP_HASSI_BAHBAH"=>"3",
					    "EPSP_DJALFA"=>"4",
						"EPSP_MESSAAD"=>"5",
						"EPSP_GUETTARA"=>"6",
						"EPH_AIN_OUSSERA"=>"7",
						"EPH_HASSI_BAHBAH"=>"8",
						"EPH_DJALFA"=>"9",
					    "EPH_MESSAAD"=>"10",
					    "EPH_IDRISSIA"=>"11",	
					    "EHS_DJELFA"=>"12"			   
					  ),
					  
"Rage"=> array(      
                       "PAS DE RAGE"=>"1",
					   "RAGE SUSSPECT"=>"2",
					   "RAGE CONFIRME"=>"3"	   
					  ),

"deces"=> array(      
                       "PAS DE DECES"=>"1",
					   "DECES"=>"2" 
					  ),					  
					  
"SEXE"  => array(      
                       "Masculin"=>"M",
					   "Feminin"=>"F"					   			   
					  ),					  

					  
"Vaccin"=> array(      
                       "tissulaire"=>"1",
					   "cellulaire"=>"2"					   			   
					  ),							  


"Serum"=> array(      
                       "sans Serum"=>"1",
					   "avec Serum"=>"2"					   			   
					  ),	



					  
"nom"  => 'x' ,
"prenom"  => 'x' ,					  
"AGE"  => '0' ,
"WILAYAN1"  => '17000' ,
"WILAYAN2"  => 'DJELFA',
"COMMUNEN1" => '924' ,
"COMMUNEN2" => 'Ain-oussera',
"ADRESS"  => 'x', 
"POIDS"  => 'x' 
);

view::button($data['btn'],'');
echo "<h2>Rage-Morssures-Griffure </h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+250,'Date');              $this->txt($x+100,$y+240,'DATEMORS',0,$data['DATEMORS'],'date');  
$this->label($x+350,$y+250,'Etablissement'); $this->combov1($x+450,$y+240,'STRUCTURE',$data['STRUCTURE']);
$this->label($x,$y+250+30,'Type Animal');    View::combov1($x+100,$y+270,'ANIMAL',array("Chien"=>"1","Chat"=>"2","Cheval"=>"3","Ane"=>"4",""=>"Vache","5"=>"","Chacal"=>"6","Rat"=>"7","Sanglier"=>"8","Autres"=>"9")); 
$this->label($x,$y+250+60,'Type Lesion');    View::combov1($x+100,$y+270+30,'MORSGRIF',array("Morssure"=>"1", "Griffure"=>"2"));     
$this->label($x+350,$y+250+30,'Grade');      View::combov($x+450,$y+240+30,'GRADE',array("1","2","3"));   
$this->label($x+350,$y+250+60,'Siège');      View::combov1($x+450,$y+240+60,'SIEGE',array("Tête Cou"=>"1", "Tronc"=>"2","Membre supérieur"=>"3","Membre inférieur"=>"4")); 

$this->label($x,$y+280+120,'Nom');           $this->txt($x+100,$y+280+110,'nom',0,$data['nom'],'date');
$this->label($x+350,$y+280+120,'Prenom');    $this->txt($x+450,$y+280+110,'prenom',0,$data['prenom'],'date');
$this->label($x,$y+280+150,'Sexe');          $this->combov1($x+100,$y+280+140,'SEXE',$data['SEXE']);
$this->label($x+350,$y+280+150,'Age');       $this->txt($x+450,$y+280+140,'AGE',0,$data['AGE'],'date');
$this->label($x,$y+280+240,'Wilaya');        $this->WILAYA($x+100,$y+280+230,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+350,$y+280+240,'Commune');   $this->COMMUNE($x+450,$y+280+230,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
$this->label($x,$y+280+310,'Adresse');       $this->txt($x+100,$y+280+300,'ADRESS',0,$data['ADRESS'],'date');
$this->label($x,$y+280+330+70,'Poids');   $this->txt($x+100,$y+280+330+60,'POIDS',0,$data['POIDS'],'date');

// View::label(860+50,372+30+10,'Animal');          View::combov1(1090,370+30,'SCORVU',array("Vivant"=>"1", "Abattu"=>"2", "En Fuite"=>"3"));  

$this->label($x+750,$y+250,'Rage'); $this->combov1($x+830,$y+240,'Rage',$data['Rage']);
$this->label($x+750,$y+280,'Deces'); $this->combov1($x+830,$y+270,'deces',$data['deces']);

$this->label($x+750,$y+280+30,'Vaccin'); $this->combov1($x+830,$y+270+30,'Vaccin',$data['Vaccin']);
$this->label($x+750,$y+280+60,'Serum'); $this->combov1($x+830,$y+270+60,'Serum',$data['Serum']);


               
$this->submit($x+230,$y+760,$data['butun']);
$this->f1();
ob_end_flush();
view::sautligne(28);
?>



	