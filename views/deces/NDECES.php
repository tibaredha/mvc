<script>
function disable() {
    document.getElementById("myCheck").disabled = true;
}

function undisable() {
    document.getElementById("myCheck").disabled = false;
}
</script>
<?php	
$url1 = explode('/',$_GET['url']);
ob_start();
$data = array(
"titre"     => 'New Patient', 
"btn"       => 'deces', 
"id"        => '', 
"butun"     => 'Inser New deces', 
"photos"    => '3.jpg',
"action"    => 'deces/createdeces',
"WILAYAR11"  => '17000',"WILAYAR22"  => 'wilaya du deces',
"COMMUNER11" => '924',  "COMMUNER22" => 'commune du deces',
"STRUCTURED"  => array("EPH_DJALFA"=>"1","EPH_AIN_OUSSERA"=>"2","EPH_HASSI_BAHBAH"=>"3","EPH_MESSAAD"=>"4","EHS_DJELFA"=>"5","EPH_IDRISSIA"=>"6"),
"NOM"       => 'x',
"PRENOM"    => 'x',   
"FILSDE"    => 'x',
"ETDE"      => 'x',
"SEXE"      => array("M", "F"),
"DATENS"    => '00/00/0000', 
"WILAYAN1"  => '17000' ,"WILAYAN2"  => 'wilaya de naissance',
"COMMUNEN1" => '924' ,  "COMMUNEN2" => 'commune de naissance',
"WILAYAR1"  => '17000',"WILAYAR2"  => 'wilaya de residence',
"COMMUNER1" => '924',  "COMMUNER2" => 'commune de residence',
"ADRESSE"   => 'x',
"CODECIM0a" => '0',
"CODECIM0b" => 'selectione chapitre', 
"CODECIMa" => '000',
"CODECIMb" => 'selectione categorie',
"DINS"      => date('Y-m-d'),
"HINS"      => date("H:i"),
"x"         => "50",
"y"         => "260"
);
View::fieldset("decesm","<strong>Hospitalisation</strong>");View::fieldset("decesn","<strong>Déces</strong>");
View::fieldset("decesa","<strong>Données etat civil</strong>");
View::fieldset("decesb","<strong>Cause de décés</strong>");
View::fieldset("decesc","<strong>Lieu du décés du malade</strong>");
View::fieldset("decesd","<strong>Signalement médico-légal</strong>");
View::fieldset("decese","<strong>Cause directe et événements morbides ayant précédé le décés</strong>");
View::fieldset("decesf","<strong>Nature de la mort</strong>");
View::fieldset("decesg","<strong>Mortinatalité, périnatalité</strong>");
View::fieldset("decesh","<strong>Décés maternel</strong>");
View::fieldset("decesi","<strong>Intervention chirugicale</strong>");
// View::fieldset("decesj","<strong>Médecin</strong>");
// View::fieldset("decesk","<strong>Hospitalisation</strong>");
// View::fieldset("decesl","<strong>Code CIM10</strong>");
view::button('deces','');
// View::url(30,$data['y']-105,URL.'views/doc/deces/decesfr.pdf','Conforme au Décret exécutif N° 16-80 du 24/02/2016',3);
View::hr();
View::f0(URL.$data['action'],'post');

$this->label($data['x'],$data['y']-30,'Wilaya');$this->WILAYA($data['x']+60,$data['y']-40,'WILAYAD','countryd','mvc','wil',$data['WILAYAR11'],$data['WILAYAR22']);
$this->label($data['x']+350,$data['y']-30,'Commune');$this->COMMUNE($data['x']+430,$data['y']-40,'COMMUNED','COMMUNED',$data['COMMUNER11'],$data['COMMUNER22']);
$this->label($data['x']+720,$data['y']-30,'Structure');

// $this->txt($data['x']+785,$data['y']-40,'STRUCTURED',0,$data['STRUCTURED']); 
$this->combov1($data['x']+785,$data['y']-40,'STRUCTURED',$data['STRUCTURED']);


$this->label($data['x'],$data['y'],'Nom');$this->txtautofocus($data['x']+60,$data['y']-10,'NOM',0,$data['NOM']);
$this->label($data['x']+350,$data['y'],'Prénom ');$this->txt($data['x']+430,$data['y']-10,'PRENOM',0,$data['PRENOM']);
$this->label($data['x']+720,$data['y'],'Fils de ');$this->date($data['x']+785,$data['y']-10,'FILSDE',0,$data['FILSDE']);
$this->label($data['x']+880,$data['y'],'Et de ');$this->date($data['x']+915,$data['y']-10,'ETDE',0,$data['ETDE']);

$this->label($data['x'],$data['y']+30,'Sexe');$this->combovsex($data['x']+58,$data['y']+20,'SEXE',$data['SEXE']);
$this->label($data['x']+150,$data['y']+30,'Née le');$this->txts($data['x']+60+130,$data['y']+20,'DATENS',0,$data['DATENS'],'date');
$this->label($data['x']+350,$data['y']+30,'Wilaya');$this->WILAYA($data['x']+430,$data['y']+20,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($data['x']+720,$data['y']+30,'Commune');  $this->COMMUNE($data['x']+785,$data['y']+20,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);

$this->label($data['x'],$data['y']+60,'Wilaya');      $this->WILAYA($data['x']+60,$data['y']+50,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);
$this->label($data['x']+350,$data['y']+60,'Commune'); $this->COMMUNE($data['x']+430,$data['y']+50,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);
$this->label($data['x']+720,$data['y']+60,'Citée');   $this->txt($data['x']+785,$data['y']+50,'ADRESSE',0,$data['ADRESSE']); 

$this->label($data['x']+1040,$data['y']-45,'Date du deces ');$this->date($data['x']+785+320+60,$data['y']-50,'DINS',0,$data['DINS']);
$this->label($data['x']+1255,$data['y']-45,'Heures'); $this->date($data['x']+915+320+60,$data['y']-50,'HINS',0,$data['HINS']);	

View::label($data['x']+1040,$data['y']+5,'Cause naturelle');View::radioed($data['x']+1370,$data['y']+5,"CD","CN");    
View::label($data['x']+1040,$data['y']+30,'Cause viollente');View::radio($data['x']+1370,$data['y']+30,"CD","CV");      
View::label($data['x']+1040,$data['y']+55,'Cause idetermine');View::radio($data['x']+1370,$data['y']+55,"CD","CI");    

View::label($data['x'],$data['y']+105,'Domicile ');View::radio($data['x']+150,$data['y']+105,"LD","DOM");    
View::label($data['x'],$data['y']+135,'Voie publique ');View::radio($data['x']+150,$data['y']+135,"LD","VP");     
View::label($data['x'],$data['y']+165,'Autres (a préciser). ');View::radio($data['x']+150,$data['y']+165,"LD","AAP"); View::txt($data['x']+190,$data['y']+155,'AUTRES',24,'*');   
View::label($data['x']+200,$data['y']+105,'Structure de sante public ');View::radioed($data['x']+395,$data['y']+105,"LD","SSP");  
View::label($data['x']+200,$data['y']+135,'Structure de sante privé ');View::radio($data['x']+395,$data['y']+135,"LD","SSPV");  

View::label($data['x']+450,$data['y']+105,"Obstacle médico-légal a l'inhumation (en raison du caractère violent, indéterminé ou suspect de la mort ou corps non identifié)"); View::chekbox($data['x']+1370,$data['y']+105,"OMLI","OMLI");    
View::label($data['x']+450,$data['y']+135,"Mise immédiate en cercueil hermétique en raison du risque de contagion"); View::chekbox($data['x']+1370,$data['y']+135,"MIEC","MIEC");      
View::label($data['x']+450,$data['y']+165,"Existence d'une prothèse fonctionnant au moyen d'une pile"); View::chekbox($data['x']+1370,$data['y']+165,"EPFP","EPFP");     

View::label($data['x'],$data['y']+230,"<strong>Partie I </strong>: Maladie(s) ou affection(s) morbide (s) ayant directement provoqué le décés  ");
View::label($data['x'],$data['y']+260,'Cause directe : a');View::txt($data['x']+190,$data['y']+250,'CIM1',20,"***");          
View::label($data['x'],$data['y']+290,'due ou consécutive a : b');View::txt($data['x']+190,$data['y']+280,'CIM2',20,"***");       
View::label($data['x'],$data['y']+320,'due ou consécutive a : c');View::txt($data['x']+190,$data['y']+310,'CIM3',20,"***");        
View::label($data['x'],$data['y']+350,'due ou consécutive a : d');View::txt($data['x']+190,$data['y']+340,'CIM4',20,"***"); View::label($data['x']+420,$data['y']+350,'* Cause initiale ');     
View::label($data['x'],$data['y']+380,"<strong>Partie II </strong>: Autres états morbides ayant pu contribuer au décés, non mentionnés en partie 1 ");
View::label($data['x'],$data['y']+410,'autres etats');View::txt($data['x']+190,$data['y']+200+200,'CIM5',20,"***");      

//codage cim
View::label($data['x'],$data['y']+440,'CIM 10 Chapitre/categorie');
View::cim1($data['x']+190,$data['y']+430,'CODECIM0','mvc','chapitre',$data['CODECIM0a'],$data['CODECIM0b']);
View::cim2($data['x']+430,$data['y']+430,'CODECIM',$data['CODECIMa'],$data['CODECIMb']);

View::label($data['x']+690,$data['y']+230,'Naturelle');View::radioed($data['x']+890,$data['y']+230,"NDLM","NAT");    
View::label($data['x']+690,$data['y']+260,'Accident');View::radio($data['x']+890,$data['y']+260,"NDLM","ACC");      
View::label($data['x']+690,$data['y']+290,'auto induite');View::radio($data['x']+890,$data['y']+290,"NDLM","AID"); 
View::label($data['x']+690,$data['y']+320,'agression ');View::radio($data['x']+890,$data['y']+320,"NDLM","AGR"); 
View::label($data['x']+690,$data['y']+350,'indéterminée');View::radio($data['x']+890,$data['y']+350,"NDLM","IND"); 
View::label($data['x']+690,$data['y']+380,'Autre (a préciser)');View::radio($data['x']+890,$data['y']+380,"NDLM","AAP");View::txt($data['x']+678,$data['y']+400,'NDLMAAP',20,"***");  

View::label($data['x']+930,$data['y']+230,'Grossesse multiple');View::chekbox($data['x']+1120,$data['y']+230,"GM","GM");    
View::label($data['x']+930,$data['y']+260,'Mort-né');View::chekbox($data['x']+1120,$data['y']+260,"MN","MN");      
View::label($data['x']+930,$data['y']+290,'Age gestationnel');$this->date($data['x']+1050,$data['y']+280,'AGEGEST',0,'0'); 
View::label($data['x']+930,$data['y']+320,'Poids a la naissance ');$this->date($data['x']+1050,$data['y']+310,'POIDNSC',0,'0');
View::label($data['x']+930,$data['y']+350,'Age de la mére');$this->date($data['x']+1050,$data['y']+340,'AGEMERE',0,'0');
View::label($data['x']+930,$data['y']+375,'Si décés périnatal préciser');View::chekbox($data['x']+1120,$data['y']+395,"DPNAT","DPNAT"); 
View::label($data['x']+930,$data['y']+395,"l'état morbide de la mére"); View::txt($data['x']+920,$data['y']+430,'EMDPNAT',20,"***"); 
View::label($data['x']+930,$data['y']+415,"ayant pu affecter le NN"); //  au moment du dÈcËs 

View::label($data['x']+1160,$data['y']+225,'Décés maternel');View::chekbox(1420,$data['y']+225,"DECEMAT","DECEMAT"); 
View::label($data['x']+1160,$data['y']+250,'durant la grossesse');View::radio(1420,$data['y']+250,"GRS","DGRO");    
View::label($data['x']+1160,$data['y']+275,"durant l'accouchement");View::radio(1420,$data['y']+275,"GRS","DACC");      
View::label($data['x']+1160,$data['y']+300,"durant l'avortement");View::radio(1420,$data['y']+300,"GRS","DAVO"); 
View::label($data['x']+1160,$data['y']+326,'aprés la gestation ');View::radio(1420,$data['y']+326,"GRS","AGESTATION"); 
View::label($data['x']+1160,$data['y']+350,'Indéterminé');View::radioed(1420,$data['y']+350,"GRS","IDETER"); 
View::label($data['x']+1160,$data['y']+420,'<strong>4 semaines avant le décés </strong>'); View::chekbox(1420,$data['y']+420,"POSTOPP","POSTOPP"); 
//hospitalisation  
View::label($data['x'],$data['y']-80,'Date');$this->date($data['x']+60,$data['y']-85,'DATEHOSPI',0,date('d-m-Y'));
View::label($data['x']+152,$data['y']-80,'Heures');$this->date($data['x']+190,$data['y']-85,'HEURESHOSPI',0,date("H:i"));
View::label($data['x']+350,$data['y']-80,'Service ');
View::combov1($data['x']+430,$data['y']-85,'SERVICEHOSPIT',array(
										  "CARDIOLOGIE"=>"1",
                                          "CHIRURGIE GENERALE"=>"2",
										  "CHIRURGIE PÉDIATRIQUE"=>"3",
										  "GASTROLOGIE ENTÉROLOGIE"=>"4",
										  "GYNECO-OBSTETRIQUE"=>"5",
										  "MALADIES INFECTIEUSES"=>"6",
										  "MEDECINE INTERNE"=>"7",
										  "NÉPHROLOGIE HÉMODIALYSE"=>"8",
										  "NEUROCHIRURGIE"=>"9",
										  "NÉONATOLOGIE"=>"10",
										  "ORTHOPÉDIE TRAUMATOLOGIE"=>"11",
										  "OPHTALMOLOGIE"=>"12",
										  "OTO-RHINO-LARYNGOLOGIE"=>"13",
										  "ONCOLOGIE MÉDICALE"=>"14",
										  "PEDIAITRIE"=>"15",
										  "PNEUMO-PHTISIOLOGIE"=>"16",
										  "PSYCHIATRIE"=>"17",
										  "RÉANIMATION"=>"18",
										  "UROLOGIE"=>"19",  
										  "UMC"=>"20"
										)); 
View::label($data['x']+720,$data['y']-80,'Medecin');View::txt($data['x']+785,$data['y']-85,'MEDECINHOSPIT',20,"***"); 
View::hide(215,670,'REGION',0,$_SESSION['REGION']);
View::hide(215,670,'WILAYA',0,$_SESSION['WILAYA']);
View::hide(215,670,'STRUCTURE',0,$_SESSION['STRUCTURE']);
View::hide(215,670,'login',0,$_SESSION['login']);
$this->submit($data['x']+1185,$data['y']-100,$data['butun']);$this->f1();
view::sautligne(25);
ob_end_flush();
?>
<!--
Checkbox: <input type="checkbox" id="myCheck">
<button onclick="disable()">Disable checkbox</button>
<button onclick="undisable()">Undisable checkbox</button>-->
	