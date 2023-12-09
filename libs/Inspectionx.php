<?php
class Inspectionx  extends View 
{
	
	function afi()
	{
		echo "tibaredha";
		//echo $this->db_host;
	}
	
	function structure_sanitaire($data,$titre) 
	{
	$this->button($data['btn'],'');	
	echo "<h2>$titre</h2 ><br />";
	$this->f0(URL.$data['action'],'post');
	$this->photosurl(1170,210,URL.$data['photos']);
	$x=50;$y=60;
    $this->label($x,$y+160,'Nature');            $this->combov1($x+100,$y+150,'NATURE',$data['NATURE']);
	$this->label($x+350,$y+160,'Instalation');   $this->txts($x+450,$y+150,'DATE',0,$data['DATE'],'dateus');  
	$this->label($x,$y+190,'Nom');               $this->txt($x+100,$y+180,'NOM',0,$data['NOM'],'date');                                          
	$this->label($x+350,$y+190,'Prenom');        $this->txt($x+450,$y+180,'PRENOM',0,$data['PRENOM'],'date');                                             
	$this->label($x+700,$y+190,'Sexe');          $this->combov1($x+800,$y+180,'SEXE',$data['SEXE']);
	$this->label($x,$y+220,'Naissance');         $this->txts($x+100,$y+210,'DNS',0,$data['DNS'],'dateus6');
	$this->label($x+350,$y+220,'Wilaya');        $this->WILAYA($x+450,$y+210,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
	$this->label($x+700,$y+220,'Commune');       $this->COMMUNE($x+800,$y+210,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);          
	$this->label($x,$y+230,'__________________________________________________________________________________________________________________');
	$this->label($x,$y+260,'Type');              $this->combostructure($x+100,$y+250,'STRUCTURE','structurebis',$data['STRUCTURE1'],$data['STRUCTURE2'],'class','id','structure');
	$this->label($x+350,$y+260,'Spécialite');    $this->specialite($x+450,$y+250,'SPECIALITE',$data['specialite1'],$data['specialite2'],'classspecialite');
	$this->label($x,$y+290,'Universite');        $this->UNIVERSITE($x+100,$y+280,'UNIV','univ','mvc','wil',$data['UNIV0'],$data['UNIV1']); 
	$this->label($x,$y+290+30,'Date diplome');   $this->txts($x+100,$y+280+30,'DIPLOME',0,	$data['DIPLOME'],'dateus44');
	$this->label($x+350,$y+290,'Order N ');      $this->txt($x+450,$y+280,'NUMORDER',0,$data['NUMORDER'],'date');
	$this->label($x+350,$y+320,'Date order');    $this->txts($x+450,$y+280+30,'DATEORDER',0,$data['DATEORDER'],'dateusx');  
	$this->label($x+700,$y+290,'Démission N');   $this->txt($x+800,$y+280,'NUMDEM',0,$data['NUMDEM'],'date');
	$this->label($x+700,$y+320,'Date Démission');$this->txts($x+800,$y+280+30,'DATEDEM',0,$data['DATEDEM'],'dateusy');  
	$this->label($x,$y+350,'Date service');      $this->txts($x+100,$y+280+60,'DATEDSC',0,$data['DATEDSC'],'datesc');  
	$this->label($x+350,$y+350,'Wilya ser-civil'); 
	$this->WILAYA($x+450,$y+340,'WSC','WSC','mvc','wil',$data['WSC0'],$data['WSC1']);
	$this->label($x+700,$y+350,'Etab ser-civil'); 
	$this->COMMUNE($x+800,$y+340,'SERVICECIVILE','ETABSC',$data['SERVICECIVILE0'],$data['SERVICECIVILE1']); 
	$y=90;                                        //SERVICECIVILE ($x,$y,$name,$class,$db_name,$tb_name,$value,$selected) 
	$this->label($x,$y+340,'__________________________________________________________________________________________________________________');
	$this->label($x,$y+370,'Wilaya');            $this->WILAYA($x+100,$y+360,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);
	$this->label($x+350,$y+370,'Commune');       $this->COMMUNE($x+100+350,$y+360,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);            
	$this->label($x+700,$y+370,'Adresse');       $this->txt($x+800,$y+360,'ADRESSE',0,$data['ADRESSE'],'date');
	$this->label($x,$y+400,'Propriétaire');      $this->txt($x+100,$y+390,'PROPRIETAIRE',0,$data['PROPRIETAIRE'],'date');                        
	$this->label($x+350,$y+400,'Début contrat'); $this->txts($x+450,$y+390,'DEBUTCONTRAT',0,$data['DEBUTCONTRAT'],'dateus1');                            
	$this->label($x+700,$y+400,'Fin contrat');  $this->txts($x+800,$y+390,'FINCONTRAT',0,$data['FINCONTRAT'],'dateus2');
	$this->label($x,$y+430,'Mobile');            $this->txts($x+100,$y+420,'Mobile',0,$data['Mobile'],'port');
	$this->label($x+350,$y+430,'Fixe');          $this->txts($x+450,$y+420,'Fixe',0,$data['Fixe'],'phone');
	$this->label($x+700,$y+430,'E-mail');        $this->txt($x+800,$y+420,'Email',0,  $data['Email'],'date');
	$this->label($x,$y+437+15,'__________________________________________________________________________________________________________________');
	$this->label($x,$y+480,'N° Realisation');   $this->txt($x+100,$y+470,'NREALISATION',0,$data['NREALISATION'],'date');
	$this->label($x,$y+510,'Realisation');      $this->txts($x+100,$y+500,'REALISATION',0,$data['REALISATION'],'dateus3');                      
	$this->label($x+350,$y+480,'N° Ouverture'); $this->txt($x+450,$y+470,'NOUVERTURE',0,$data['NOUVERTURE'],'date');
	$this->label($x+350,$y+510,'Ouverture');    $this->txts($x+450,$y+500,'OUVERTURE',0,$data['OUVERTURE'],'dateus4');                         
	$this->label($x+700,$y+480,'N° Fermeture'); $this->txt($x+800,$y+470,'NFERMETURE',0,$data['NFERMETURE'],'date');
	$this->label($x+700,$y+510,'Fermeture');    $this->txts($x+800,$y+500,'FERMETURE',0,$data['FERMETURE'],'dateus5');                      
	$this->label($x,$y+500+23,'__________________________________________________________________________________________________________________');
	$this->label($x+700,$y+550,'اللقب');         $this->txtarid($x+800,$y+540,'NOMAR','NOMAR',0,$data['NOMAR'],'date');$this->label($x+350,$y+550,'الاســـــــم');   $this->txtarid($x+450,$y+540,'PRENOMAR','PRENOMAR',0,$data['PRENOMAR'],'date'); $this->label($x,$y+550,'العنوان');           $this->txtarid($x+100,$y+540,'ADRESSEAR','ADRESSEAR',0,$data['ADRESSEAR'],'date');
	$this->submit($x+1140,$y+520,$data['butun']);
	$this->f1();
	$this->sautligne(19);
	ob_end_flush();		
	}
	
	function home($data,$titre,$grade) 
	{
	$this->button($data['btn'],'');
	echo "<h2>".$titre.strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
	$this->f0(URL.$data['action'],'post');
	$this->photosurl(1170,210,URL.$data['photos']);
	$x=50;$y=10;
	$d=date('j-m-Y');
	$this->label($x,$y+220,'Wilaya');                   $this->WILAYA($x+150,$y+210,'WILAYA','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
	$this->label($x+400,$y+220,'Commune');              $this->COMMUNE($x+520,$y+210,'COMMUNE','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
	$this->label($x+800,$y+220,'Adresse');              $this->txt($x+880,$y+210,'ADRESSE',0,$data['ADRESSE'],'date');
	$this->label($x,$y+260,'Date PV ');                 $this->txts($x+150,$y+250,'DATEP',0,$d,'dateus'); $this->label($x+400,$y+260,'Nature PV');    $this->combov1($x+520,$y+250,'NAT',$data['NAT']);              $this->label($x+800,$y+260,'Adresse ar ');  $this->txtarid($x+880,$y+250,'ADRESSEAR','ADRESSEAR',0,$data['ADRESSEAR'],'date');
	$this->label($x,$y+300,'Demande N ');               $this->txt($x+150,$y+290,'NUMD',0,"00");          $this->label($x+400,$y+300,'Date demande'); $this->txts($x+520,$y+290,'DATED',0,date('j-m-Y'),'dateus1');
	$this->label($x,$y+340,'Cabinet de consultation '); $this->date1($x+150,$y+330,'CDS0',10,'00','cds();');$this->date1($x+225,$y+330,'CDS1',10,'00','cds();');  $this->date1($x+300,$y+330,'CDS',0,"00",'cds();');
	
	
	if ($grade==15)
	{
		$this->label($x,$y+380,'Salle de stérilisation');
	}
	elseif($grade==28)
	{
		$this->label($x,$y+380,'Salle de stérilisation');
	}
	else{
		$this->label($x,$y+380,'Salle de soins'); 
	}
	          
	$this->date1($x+150,$y+370,'SDS0',10,'00','sds();');$this->date1($x+225,$y+370,'SDS1',10,'00','sds();');$this->date1($x+300,$y+370,'SDS',0,"00",'sds();');
	
	
	$this->label($x,$y+420,"Salle d'attente  : H ");    $this->date1($x+150,$y+410,'SAH0',10,'00','sah();');$this->date1($x+225,$y+410,'SAH1',10,'00','sah();');$this->date1($x+300,$y+410,'SAH',0,"00",'sah();');
	$this->label($x,$y+460,"Salle d'attente  : F ");    $this->date1($x+150,$y+450,'SAF0',10,'00','saf();');$this->date1($x+225,$y+450,'SAF1',10,'00','saf();');$this->date1($x+300,$y+450,'SAF',0,"00",'saf();');
	$this->label($x,$y+500,'Sanitaires ');              $this->date1($x+150,$y+490,'SAN0',10,'00','san();');$this->date1($x+225,$y+490,'SAN1',10,'00','san();');$this->date1($x+300,$y+490,'SAN',0,"00",'san();');
	$this->label($x,$y+540,'Surface total ');           $this->txt($x+150,$y+530,'STL',0,"00");
	$this->label($x+400,$y+340,'ًZone encl');            $this->chekbox($x+470,$y+335,"ZE");
	$this->label($x+400,$y+380,'Groupe');               $this->chekbox($x+470,$y+375,"groupe"); $this->combopharmacieng($x+520,$y+370,"PHA4","","","pharmacie",$grade);
	$this->label($x+400,$y+420,'1er Voisin');           $this->combopharmacien($x+520,$y+410,"PHA1","","","pharmacie",$grade);   $this->label($x+800,$y+420,'Distance 1 ');$this->txt($x+880,$y+410,'DIST1',0,"00");
	$this->label($x+400,$y+460,'2em Voisin');           $this->combopharmacien($x+520,$y+450,"PHA2","","","pharmacie",$grade);   $this->label($x+800,$y+460,'Distance 2 ');$this->txt($x+880,$y+450,'DIST2',0,"00");
	$this->label($x+400,$y+500,'3em Voisin');           $this->combopharmacien($x+520,$y+490,"PHA3","","","pharmacie",$grade);   $this->label($x+800,$y+500,'Distance 3 '); $this->txt($x+880,$y+490,'DIST3',0,"00");
	$this->label($x+800,$y+300,'Propriétaire');         $this->txtarid($x+880,$y+290,'PROPRIETAIRE','PROPRIETAIRE',0,$data['PROPRIETAIRE'],'date');
	$this->label($x+800,$y+340,'Début contrat');        $this->txts($x+880,$y+330,'DEBUTCONTRAT',0,$data['DEBUTCONTRAT'],'dateus2');
	$this->label($x+800,$y+380,'Fin contrat');          
	$this->combov1($x+880,$y+370,'FINCONTRAT',$data['FINCONTRAT']); 
	$this->label(450,550,'Num commission');$this->txt(570,540,'NUMCOM',0,"00");
	$this->label(850,550,'Date commission '); $this->txts(930,540,'DATECOM',0,$data['DATECOM'],'dateus3'); 
	$this->hide(100,100,"STRUCTURE","",$this->user[0]['STRUCTURE']);
	$this->submit($x+1140,$y+520,$data['butun']);
	$this->f1();
	$this->sautligne(22);
	ob_end_flush();
	}
}
