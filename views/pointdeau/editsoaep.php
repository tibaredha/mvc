<?php	
$url1 = explode('/',$_GET['url']);
ob_start();

view::button('pointdeau','');
//View::url(30,$data['y']-105,URL.'views/doc/deces/decesfr.pdf','Conforme au Décret exécutif N° 16-80 du 24/02/2016',3);
// View::hr();

echo'<h2>Edit Surveillance de la qualité de l’eau potable </h2 >';
$this->f0(URL.'pointdeau/editSavesoaep/'.$this->user[0]['id'],'post');
View::photosurl(1070,150,URL.'public/images/photos/puit1.jpg');

$this->label(30,200,"EPSP");
$this->combov1(180,190,'EPSP',array(
$this->user[0]['EPSP']=>$this->user[0]['EPSP'],
"1_EPSP_DJELFA"=>"1",
"2-EPSP_MESSAAD"=>"2",
"3_EPSP_GUETTARA"=>"3",
"4_EPSP_HBB"=>"4",
"5_EPSP_AO"=>"5"
));

$this->label(30,230,"Type d'ouvrage AEP");
$this->combov1(180,220,'TOAEP',array(
$this->user[0]['TOAEP']=>$this->user[0]['TOAEP'],
"Puits individuels"=>"1",
"Puits collectifs"=>"2",
"Puits agricoles"=>"3",
"Source captée"=>"4",
"Source non captée"=>"5",
"Réservoirs"=>"6",
"Châteaux eaux"=>"7",
"Fontaine publique"=>"8",
"Robinets individuels"=>"9",
"Station de traitement"=>"10",
"Station de pompage"=>"11",
"Eau de stockage"=>"12",
"Oued"=>"13",
"Canal"=>"14",
"Forage"=>"15"
));
$this->label(30,260,'Num');$this->txt(180,220+30,'NUM',0,$this->user[0]['NUM']);
$this->label(480,200,'WILAYA');$this->WILAYA(700,190,'WILAYAN','country','mvc','wil',$this->user[0]['WILAYAN'],$this->user[0]['WILAYAN']);
$this->label(480,230,'COMMUNE');$this->COMMUNE(700,190+30,'COMMUNEN','COMMUNEN',$this->user[0]['COMMUNEN'],$this->user[0]['COMMUNEN']);                 
$this->label(30,290,"chlore résiduel"); 
$this->combov1(180,280,'CR',array(
$this->user[0]['CR']=>$this->user[0]['CR'],
"Positif"=>"2",
"Negatif"=>"1",
"Absence de prélèvement"=>"0"
));                      
$this->label(30,320,"bactériologie"); 
$this->combov1(180,310,'BC',array(
$this->user[0]['BC']=>$this->user[0]['BC'],
"Absence de prélèvement"=>"0",
"Prélèvement non potable"=>"1",
"Prélèvement suspect"=>"2",
"Prélèvement potable"=>"3"
));                      
$this->label(30,350,"Date Surveillance"); $this->txt(180,340,'DATEI',0,$this->user[0]['DATEI']);
$this->submit(700,340,'Edit Surveillance');


















// $this->label(30,200,"EPSP");
// $this->combov1(180,190,'EPSP',array(
// 
// "1_EPSP_DJELFA"=>"1",
// "2_EPSP_MESSAAD"=>"2",
// "3_EPSP_GUETTARA"=>"3",
// "4_EPSP_HBB"=>"4",
// "5_EPSP_AO"=>"5"
// ));
// $this->label(30,230,"Type d'ouvrage AEP");
// $this->combov1(180,220,'TOAEP',array(
// $this->user[0]['TOAEP']=>$this->user[0]['TOAEP'],
// "1_Puits individuels"=>"1",
// "2_Puits collectifs"=>"2",
// "3_Puits agricoles"=>"3",
// "4_Source captée"=>"4",
// "5_Source non captée"=>"5",
// "6_Réservoirs"=>"6",
// "7_Châteaux eaux"=>"7",
// "8_Fontaine publique"=>"8",
// "9_Robinets individuels"=>"9",
// "10_Station de traitement"=>"10",
// "11_Station de pompage"=>"11",
// "12_Eau de stockage"=>"12",
// "13_Oued"=>"13",
// "14_Canal"=>"14",
// "15_Forage"=>"15"
// ));
// $this->label(30,260,'Num');                      $this->txt(180,250,'NUM',0,$this->user[0]['NUM']);
// $this->label(30,290,'Wilaya');                   $this->WILAYA(180,280,'WILAYAN','country','mvc','wil',$this->user[0]['WILAYAN'],$this->user[0]['WILAYAN']);
// $this->label(30,290+30,'Commune');                  $this->COMMUNE(180,280+30,'COMMUNEN','COMMUNEN',$this->user[0]['COMMUNEN'],$this->user[0]['COMMUNEN']);
// $this->label(30,290+60,'Adresse');               $this->txt(180,280+60,'ADRESSE',0,$this->user[0]['ADRESSE']);
// $this->label(30,290+90,'Proprietaire');          $this->txt(180,280+90,'NOMPRENOM',0,$this->user[0]['NOMPRENOM']);
// $this->label(30,290+120,'Mise En Service');       $this->txt(180,280+120,'DATEN',0,$this->user[0]['DATEN'],'date');
// $this->label(30,290+150,'Population Desservie'); $this->txt(180,280+150,'POPDES',0,$this->user[0]['POPDES']);
// $this->label(520,200,'Systeme de Désinfection');
// switch($this->user[0]['DES'])  
// {
   // case 'CA' :
		// {   
		// $this->label(520,230,'Chlorateur automatique');View::radioed(720,230,"DES","CA");
		// $this->label(520,260,'Chlorateur de fortune');View::radio(720,260,"DES","CF");
		// $this->label(520,290,'Brique poreuse');View::radio(720,290,"DES","BP");
		// $this->label(520,320,'Galets');View::radio(720,320,"DES","G");
		// $this->label(520,350,'Manuellement');View::radio(720,350,"DES","M");
		// $this->label(520,380,'Absence de Systeme ');View::radio(720,380,"DES","AS");
		// break;}
   // case 'CF' :
		// {   
		// $this->label(520,230,'Chlorateur automatique');View::radio(720,230,"DES","CA");
		// $this->label(520,260,'Chlorateur de fortune');View::radioed(720,260,"DES","CF");
		// $this->label(520,290,'Brique poreuse');View::radio(720,290,"DES","BP");
		// $this->label(520,320,'Galets');View::radio(720,320,"DES","G");
		// $this->label(520,350,'Manuellement');View::radio(720,350,"DES","M");
		// $this->label(520,380,'Absence de Systeme ');View::radio(720,380,"DES","AS");
		// break;}
	// case 'BP' :
		// {   
		// $this->label(520,230,'Chlorateur automatique');View::radio(720,230,"DES","CA");
		// $this->label(520,260,'Chlorateur de fortune');View::radio(720,260,"DES","CF");
		// $this->label(520,290,'Brique poreuse');View::radioed(720,290,"DES","BP");
		// $this->label(520,320,'Galets');View::radio(720,320,"DES","G");
		// $this->label(520,350,'Manuellement');View::radio(720,350,"DES","M");
		// $this->label(520,380,'Absence de Systeme ');View::radio(720,380,"DES","AS");
		// break;}
	// case 'G' :
		// {   
		// $this->label(520,230,'Chlorateur automatique');View::radio(720,230,"DES","CA");
		// $this->label(520,260,'Chlorateur de fortune');View::radio(720,260,"DES","CF");
		// $this->label(520,290,'Brique poreuse');View::radio(720,290,"DES","BP");
		// $this->label(520,320,'Galets');View::radioed(720,320,"DES","G");
		// $this->label(520,350,'Manuellement');View::radio(720,350,"DES","M");
		// $this->label(520,380,'Absence de Systeme ');View::radio(720,380,"DES","AS");
		// break;}
	// case 'M' :
		// {   
		// $this->label(520,230,'Chlorateur automatique');View::radio(720,230,"DES","CA");
		// $this->label(520,260,'Chlorateur de fortune');View::radio(720,260,"DES","CF");
		// $this->label(520,290,'Brique poreuse');View::radio(720,290,"DES","BP");
		// $this->label(520,320,'Galets');View::radio(720,320,"DES","G");
		// $this->label(520,350,'Manuellement');View::radioed(720,350,"DES","M");
		// $this->label(520,380,'Absence de Systeme ');View::radio(720,380,"DES","AS");
		// break;}
	// case 'AS' :
		// {   
		// $this->label(520,230,'Chlorateur automatique');View::radio(720,230,"DES","CA");
		// $this->label(520,260,'Chlorateur de fortune');View::radio(720,260,"DES","CF");
		// $this->label(520,290,'Brique poreuse');View::radio(720,290,"DES","BP");
		// $this->label(520,320,'Galets');View::radio(720,320,"DES","G");
		// $this->label(520,350,'Manuellement');View::radio(720,350,"DES","M");
		// $this->label(520,380,'Absence de Systeme ');View::radioed(720,380,"DES","AS");
		// break;} 		
// }		 
// $this->label(520,410,"Date inscription");$this->date(650,400,'DATEI',0,$this->user[0]['DATEI']);
// $this->submit(520,340+90,'Edit Ouvrage AEP');
$this->f1();view::sautligne(15);
ob_end_flush();
?>	
	
