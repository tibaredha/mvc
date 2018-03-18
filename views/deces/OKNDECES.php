<?php	
$url1 = explode('/',$_GET['url']);
ob_start();

foreach($this->userListview as $key => $value)
{ 
$data = array(
"titre"     => 'Edit deces', 
"btn"       => 'deces', 
"id"        => $value['id'], 
"butun"     => 'OK DECES', 
"photos"    => '3.jpg',
"action"    => 'deces/NDECES',
"WILAYAR11"  => $value['WILAYAD'],"WILAYAR22"  => View::nbrtostring('wil','IDWIL',$value['WILAYAD'],'WILAYAS'),
"COMMUNER11" => $value['COMMUNED'],  "COMMUNER22" => View::nbrtostring('com','IDCOM',$value['COMMUNED'],'COMMUNE'),
"STRUCTURED"  => array($value['STRUCTURED'],"EPH_DJALFA", "EPH_AIN_OUSSERA", "EPH_HASSI_BAHBAH", "EPH_MESSAAD", "EHS_DJELFA"),
"NOM"       =>  $value['NOM'],
"PRENOM"    => $value['PRENOM'],   
"FILSDE"    => $value['FILSDE'],
"ETDE"      => $value['ETDE'],
"SEXE"      => array($value['SEX'],"M", "F"),
"DATENS"    => $value['DATENAISSANCE'], 
"WILAYAN1"  => $value['WILAYA'] ,"WILAYAN2"  => View::nbrtostring('wil','IDWIL',$value['WILAYA'],'WILAYAS'),
"COMMUNEN1" => $value['COMMUNE'] ,"COMMUNEN2" => View::nbrtostring('com','IDCOM',$value['COMMUNE'],'COMMUNE'),
"WILAYAR1"  => $value['WILAYAR'],"WILAYAR2"  =>  View::nbrtostring('wil','IDWIL',$value['WILAYAR'],'WILAYAS'),
"COMMUNER1" => $value['COMMUNER'],  "COMMUNER2" => View::nbrtostring('com','IDCOM',$value['COMMUNER'],'COMMUNE'),
"ADRESSE"   =>$value['ADRESSE'],
"CD"       => $value['CD'],
"LD"       => $value['LD'],
"AUTRES"   => $value['AUTRES'],
"OMLI"     => $value['OMLI'],
"MIEC"     => $value['MIEC'],
"EPFP"     => $value['EPFP'],
"CIM1"     => $value['CIM1'],
"CIM2"     => $value['CIM2'],
"CIM3"     => $value['CIM3'],
"CIM4"     => $value['CIM4'],
"CIM5"     => $value['CIM5'],
"NDLM"     => $value['NDLM'],
"NDLMAAP"  => $value['NDLMAAP'],
"GM"       => $value['GM'],
"MN"       => $value['MN'],
"AGEGEST"  => $value['AGEGEST'],
"POIDNSC"  => $value['POIDNSC'],
"AGEMERE"  => $value['AGEMERE'],
"DPNAT"   => $value['DPNAT'],
"EMDPNAT" => $value['EMDPNAT'],
"DECEMAT" => $value['DECEMAT'],
"GRS"     => $value['GRS'],
"POSTOPP" => $value['POSTOPP'],
"DATEHOSPI" => $value['DATEHOSPI'],
"HEURESHOSPI" => $value['HEURESHOSPI'],
"SERVICEHOSPIT" => $value['SERVICEHOSPIT'],
"MEDECINHOSPIT" => $value['MEDECINHOSPIT'],
"CODECIM0a" => $value['CODECIM0'],
"CODECIM0b" => View::stringtostring('chapitre','IDCHAP',$value['CODECIM0'],'CHAP'), 
"CODECIMa" => $value['CODECIM'],
"CODECIMb" => View::stringtostring('cim','diag_cod',$value['CODECIM'],'diag_nom'),
"DINS"      => date('Y-m-d'),
"HINS"      => date("H:i"),
"x"         => "50",
"y"         => "260"
);

}
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
//View::url(30,$data['y']-105,URL.'views/doc/deces/decesfr.pdf','Conforme au Décret exécutif N° 16-80 du 24/02/2016',3);
View::hr();
View::f0(URL.$data['action'],'post');

$this->label($data['x'],$data['y']-30,'Wilaya:'.$data['WILAYAR22']);
$this->label($data['x']+350,$data['y']-30,'Commune:'.$data['COMMUNER22']);
$this->label($data['x']+720,$data['y']-30,'Structure:'.$data['STRUCTURED']);

$this->label($data['x'],$data['y'],'Nom:'.$data['NOM']);
$this->label($data['x']+350,$data['y'],'Prénom:'.$data['PRENOM']);
$this->label($data['x']+720,$data['y'],'Fils de:'.$data['FILSDE']);
$this->label($data['x']+880,$data['y'],'Et de:'.$data['ETDE']);

$this->label($data['x'],$data['y']+30,'Sexe:'.$data['SEXE']);
$this->label($data['x']+150,$data['y']+30,'Née le:'.$data['DATENS']);
$this->label($data['x']+350,$data['y']+30,'Wilaya de:'.$data['WILAYAN2']);
$this->label($data['x']+720,$data['y']+30,'Commune:'.$data['COMMUNEN2']);  

$this->label($data['x'],$data['y']+60,'Wilaya:'.$data['WILAYAR2']);     
$this->label($data['x']+350,$data['y']+60,'Commune:'.$data['COMMUNER2']);
$this->label($data['x']+720,$data['y']+60,'Citée:'.$data['ADRESSE']);   

$this->label($data['x']+1040,$data['y']-45,'Date du deces:'.$data['DINS']);
$this->label($data['x']+1255,$data['y']-45,'Heures:'.$data['HINS']);
switch($data['CD'])  
{
   case 'CN' :
		{ 
		   
		View::label($data['x']+1040,$data['y'],'Cause naturelle');View::radioed($data['x']+1370,$data['y'],"CD","CN");    
        View::label($data['x']+1040,$data['y']+30,'Cause viollente');View::radio($data['x']+1370,$data['y']+30,"CD","CV");      
        View::label($data['x']+1040,$data['y']+60,'Cause idetermine');View::radio($data['x']+1370,$data['y']+60,"CD","CI");  
		break;}
   case 'CV' :
		{   
		View::label($data['x']+1040,$data['y'],'Cause naturelle');View::radio($data['x']+1370,$data['y'],"CD","CN");    
        View::label($data['x']+1040,$data['y']+30,'Cause viollente');View::radioed($data['x']+1370,$data['y']+30,"CD","CV");      
        View::label($data['x']+1040,$data['y']+60,'Cause idetermine');View::radio($data['x']+1370,$data['y']+60,"CD","CI");  
		break;}
   case 'CI' :
		{   
		View::label($data['x']+1040,$data['y'],'Cause naturelle');View::radio($data['x']+1370,$data['y'],"CD","CN");    
        View::label($data['x']+1040,$data['y']+30,'Cause viollente');View::radio($data['x']+1370,$data['y']+30,"CD","CV");      
        View::label($data['x']+1040,$data['y']+60,'Cause idetermine');View::radioed($data['x']+1370,$data['y']+60,"CD","CI");  
		break;}
  		
}		 
switch($data['LD'])  
{
   case 'DOM' :
		{ 
		View::label($data['x'],$data['y']+105,'Domicile ');View::radioed($data['x']+150,$data['y']+105,"LD","DOM");    
        View::label($data['x'],$data['y']+135,'Voie publique ');View::radio($data['x']+150,$data['y']+135,"LD","VP");     
        View::label($data['x'],$data['y']+165,'Autres (a préciser). ');View::radio($data['x']+150,$data['y']+165,"LD","AAP"); View::label($data['x']+190,$data['y']+155,$data['AUTRES']); 
        View::label($data['x']+200,$data['y']+105,'Structure de sante public ');View::radio($data['x']+395,$data['y']+105,"LD","SSP");  
        View::label($data['x']+200,$data['y']+135,'Structure de sante privé ');View::radio($data['x']+395,$data['y']+135,"LD","SSPV");  		 
		break;}
   case 'VP' :
		{   
		View::label($data['x'],$data['y']+105,'Domicile ');View::radio($data['x']+150,$data['y']+105,"LD","DOM");    
        View::label($data['x'],$data['y']+135,'Voie publique ');View::radioed($data['x']+150,$data['y']+135,"LD","VP");     
        View::label($data['x'],$data['y']+165,'Autres (a préciser). ');View::radio($data['x']+150,$data['y']+165,"LD","AAP"); View::label($data['x']+190,$data['y']+155,$data['AUTRES']);
        View::label($data['x']+200,$data['y']+105,'Structure de sante public ');View::radio($data['x']+395,$data['y']+105,"LD","SSP");  
        View::label($data['x']+200,$data['y']+135,'Structure de sante privé ');View::radio($data['x']+395,$data['y']+135,"LD","SSPV");  
		break;}
   case 'AAP' :
		{   
		View::label($data['x'],$data['y']+105,'Domicile ');View::radio($data['x']+150,$data['y']+105,"LD","DOM");    
        View::label($data['x'],$data['y']+135,'Voie publique ');View::radio($data['x']+150,$data['y']+135,"LD","VP");     
        View::label($data['x'],$data['y']+165,'Autres (a préciser). ');View::radioed($data['x']+150,$data['y']+165,"LD","AAP"); View::label($data['x']+190,$data['y']+155,$data['AUTRES']); 
        View::label($data['x']+200,$data['y']+105,'Structure de sante public ');View::radio($data['x']+395,$data['y']+105,"LD","SSP");  
        View::label($data['x']+200,$data['y']+135,'Structure de sante privé ');View::radio($data['x']+395,$data['y']+135,"LD","SSPV"); 
		break;}
	 case 'SSP' :
		{   
		View::label($data['x'],$data['y']+105,'Domicile ');View::radio($data['x']+150,$data['y']+105,"LD","DOM");    
        View::label($data['x'],$data['y']+135,'Voie publique ');View::radio($data['x']+150,$data['y']+135,"LD","VP");     
        View::label($data['x'],$data['y']+165,'Autres (a préciser). ');View::radio($data['x']+150,$data['y']+165,"LD","AAP"); View::label($data['x']+190,$data['y']+155,$data['AUTRES']);
        View::label($data['x']+200,$data['y']+105,'Structure de sante public ');View::radioed($data['x']+395,$data['y']+105,"LD","SSP");  
        View::label($data['x']+200,$data['y']+135,'Structure de sante privé ');View::radio($data['x']+395,$data['y']+135,"LD","SSPV"); 
		break;}
	 case 'SSPV' :
		{   
		View::label($data['x'],$data['y']+105,'Domicile ');View::radio($data['x']+150,$data['y']+105,"LD","DOM");    
        View::label($data['x'],$data['y']+135,'Voie publique ');View::radio($data['x']+150,$data['y']+135,"LD","VP");     
        View::label($data['x'],$data['y']+165,'Autres (a préciser). ');View::radio($data['x']+150,$data['y']+165,"LD","AAP");  View::label($data['x']+190,$data['y']+155,$data['AUTRES']);  
        View::label($data['x']+200,$data['y']+105,'Structure de sante public ');View::radio($data['x']+395,$data['y']+105,"LD","SSP");  
        View::label($data['x']+200,$data['y']+135,'Structure de sante privé ');View::radioed($data['x']+395,$data['y']+135,"LD","SSPV"); 
		break;}	
  		
}		
if ($data['OMLI']=='1') 
{
View::label($data['x']+450,$data['y']+105,"Obstacle médico-légal a l'inhumation (en raison du caractère violent, indéterminé ou suspect de la mort ou corps non identifié)"); View::chekboxed($data['x']+1370,$data['y']+105,"OMLI","OMLI");    
} 
else 
{
View::label($data['x']+450,$data['y']+105,"Obstacle médico-légal a l'inhumation (en raison du caractère violent, indéterminé ou suspect de la mort ou corps non identifié)"); View::chekbox($data['x']+1370,$data['y']+105,"OMLI","OMLI");    
}

if ($data['MIEC']=='1') 
{
View::label($data['x']+450,$data['y']+135,"Mise immédiate en cercueil hermétique en raison du risque de contagion"); View::chekboxed($data['x']+1370,$data['y']+135,"MIEC","MIEC");   
} 
else 
{
View::label($data['x']+450,$data['y']+135,"Mise immédiate en cercueil hermétique en raison du risque de contagion"); View::chekbox($data['x']+1370,$data['y']+135,"MIEC","MIEC");      
}

if ($data['EPFP']=='1') 
{
View::label($data['x']+450,$data['y']+165,"Existence d'une prothèse fonctionnant au moyen d'une pile"); View::chekboxed($data['x']+1370,$data['y']+165,"EPFP","EPFP");     
} 
else 
{
View::label($data['x']+450,$data['y']+165,"Existence d'une prothèse fonctionnant au moyen d'une pile"); View::chekbox($data['x']+1370,$data['y']+165,"EPFP","EPFP");     
}
View::label($data['x'],$data['y']+230,"<strong>Partie I </strong>: Maladie(s) ou affection(s) morbide (s) ayant directement provoqué le décés  ");
View::label($data['x'],$data['y']+260,'Cause directe : a : '.$data['CIM1']);       //View::txt($data['x']+190,$data['y']+250,'CIM1',20,);          
View::label($data['x'],$data['y']+290,'due ou consécutive a : b:'.$data['CIM2']);//View::txt($data['x']+190,$data['y']+280,'CIM2',20,);       
View::label($data['x'],$data['y']+320,'due ou consécutive a : c:'.$data['CIM3']);//View::txt($data['x']+190,$data['y']+310,'CIM3',20,);        
View::label($data['x'],$data['y']+350,'due ou consécutive a : d:'.$data['CIM4']);//View::txt($data['x']+190,$data['y']+340,'CIM4',20,$data['CIM4']); 
View::label($data['x']+420,$data['y']+350,'* Cause initiale ');     
View::label($data['x'],$data['y']+380,"<strong>Partie II </strong>: Autres états morbides ayant pu contribuer au décés, non mentionnés en partie 1 ");
View::label($data['x'],$data['y']+410,'autres etats:'.$data['CIM5']);            //View::txt($data['x']+190,$data['y']+200+200,'CIM5',20,);      
//codage cim
View::label($data['x'],$data['y']+440,'Chapitre/categorie:'.$data['CODECIM0b'].'/'.$data['CODECIMb']);    
 
switch($data['NDLM'])  
{
   case 'NAT' :
		{   
		View::label($data['x']+690,$data['y']+230,'Naturelle');View::radioed($data['x']+890,$data['y']+230,"NDLM","NAT");    
		View::label($data['x']+690,$data['y']+260,'Accident');View::radio($data['x']+890,$data['y']+260,"NDLM","ACC");      
		View::label($data['x']+690,$data['y']+290,'auto induite');View::radio($data['x']+890,$data['y']+290,"NDLM","AID"); 
		View::label($data['x']+690,$data['y']+320,'agression ');View::radio($data['x']+890,$data['y']+320,"NDLM","AGR"); 
		View::label($data['x']+690,$data['y']+350,'indéterminée');View::radio($data['x']+890,$data['y']+350,"NDLM","IND"); 
		View::label($data['x']+690,$data['y']+380,'Autre (a préciser)');View::radio($data['x']+890,$data['y']+380,"NDLM","AAP");View::txt($data['x']+678,$data['y']+400,'NDLMAAP',20,$data['NDLMAAP']);  
		break;}
     case 'ACC' :
		{   
		View::label($data['x']+690,$data['y']+230,'Naturelle');View::radio($data['x']+890,$data['y']+230,"NDLM","NAT");    
		View::label($data['x']+690,$data['y']+260,'Accident');View::radioed($data['x']+890,$data['y']+260,"NDLM","ACC");      
		View::label($data['x']+690,$data['y']+290,'auto induite');View::radio($data['x']+890,$data['y']+290,"NDLM","AID"); 
		View::label($data['x']+690,$data['y']+320,'agression ');View::radio($data['x']+890,$data['y']+320,"NDLM","AGR"); 
		View::label($data['x']+690,$data['y']+350,'indéterminée');View::radio($data['x']+890,$data['y']+350,"NDLM","IND"); 
		View::label($data['x']+690,$data['y']+380,'Autre (a préciser)');View::radio($data['x']+890,$data['y']+380,"NDLM","AAP");View::txt($data['x']+678,$data['y']+400,'NDLMAAP',20,$data['NDLMAAP']);  
		break;}
     case 'AID' :
		{   
		View::label($data['x']+690,$data['y']+230,'Naturelle');View::radio($data['x']+890,$data['y']+230,"NDLM","NAT");    
		View::label($data['x']+690,$data['y']+260,'Accident');View::radio($data['x']+890,$data['y']+260,"NDLM","ACC");      
		View::label($data['x']+690,$data['y']+290,'auto induite');View::radioed($data['x']+890,$data['y']+290,"NDLM","AID"); 
		View::label($data['x']+690,$data['y']+320,'agression ');View::radio($data['x']+890,$data['y']+320,"NDLM","AGR"); 
		View::label($data['x']+690,$data['y']+350,'indéterminée');View::radio($data['x']+890,$data['y']+350,"NDLM","IND"); 
		View::label($data['x']+690,$data['y']+380,'Autre (a préciser)');View::radio($data['x']+890,$data['y']+380,"NDLM","AAP");View::txt($data['x']+678,$data['y']+400,'NDLMAAP',20,$data['NDLMAAP']);  
		break;}
     case 'AGR' :
		{   
		View::label($data['x']+690,$data['y']+230,'Naturelle');View::radio($data['x']+890,$data['y']+230,"NDLM","NAT");    
		View::label($data['x']+690,$data['y']+260,'Accident');View::radio($data['x']+890,$data['y']+260,"NDLM","ACC");      
		View::label($data['x']+690,$data['y']+290,'auto induite');View::radio($data['x']+890,$data['y']+290,"NDLM","AID"); 
		View::label($data['x']+690,$data['y']+320,'agression ');View::radioed($data['x']+890,$data['y']+320,"NDLM","AGR"); 
		View::label($data['x']+690,$data['y']+350,'indéterminée');View::radio($data['x']+890,$data['y']+350,"NDLM","IND"); 
		View::label($data['x']+690,$data['y']+380,'Autre (a préciser)');View::radio($data['x']+890,$data['y']+380,"NDLM","AAP");View::txt($data['x']+678,$data['y']+400,'NDLMAAP',20,$data['NDLMAAP']);  
		break;}
     case 'IND' :
		{   
		View::label($data['x']+690,$data['y']+230,'Naturelle');View::radio($data['x']+890,$data['y']+230,"NDLM","NAT");    
		View::label($data['x']+690,$data['y']+260,'Accident');View::radio($data['x']+890,$data['y']+260,"NDLM","ACC");      
		View::label($data['x']+690,$data['y']+290,'auto induite');View::radio($data['x']+890,$data['y']+290,"NDLM","AID"); 
		View::label($data['x']+690,$data['y']+320,'agression ');View::radio($data['x']+890,$data['y']+320,"NDLM","AGR"); 
		View::label($data['x']+690,$data['y']+350,'indéterminée');View::radioed($data['x']+890,$data['y']+350,"NDLM","IND"); 
		View::label($data['x']+690,$data['y']+380,'Autre (a préciser)');View::radio($data['x']+890,$data['y']+380,"NDLM","AAP");View::txt($data['x']+678,$data['y']+400,'NDLMAAP',20,$data['NDLMAAP']);  
		break;}
     case 'AAP' :
		{   
		View::label($data['x']+690,$data['y']+230,'Naturelle');View::radio($data['x']+890,$data['y']+230,"NDLM","NAT");    
		View::label($data['x']+690,$data['y']+260,'Accident');View::radio($data['x']+890,$data['y']+260,"NDLM","ACC");      
		View::label($data['x']+690,$data['y']+290,'auto induite');View::radio($data['x']+890,$data['y']+290,"NDLM","AID"); 
		View::label($data['x']+690,$data['y']+320,'agression ');View::radio($data['x']+890,$data['y']+320,"NDLM","AGR"); 
		View::label($data['x']+690,$data['y']+350,'indéterminée');View::radio($data['x']+890,$data['y']+350,"NDLM","IND"); 
		View::label($data['x']+690,$data['y']+380,'Autre (a préciser)');View::radioed($data['x']+890,$data['y']+380,"NDLM","AAP");View::txt($data['x']+678,$data['y']+400,'NDLMAAP',20,$data['NDLMAAP']);  
		break;}
       
  		
}		
if ($data['GM']=='1') 
{
View::label($data['x']+930,$data['y']+230,'Grossesse multiple');View::chekboxed($data['x']+1120,$data['y']+230,"GM","GM");
} 
else 
{
View::label($data['x']+930,$data['y']+230,'Grossesse multiple');View::chekbox($data['x']+1120,$data['y']+230,"GM","GM");
}

if ($data['MN']=='1') 
{
View::label($data['x']+930,$data['y']+260,'Mort-né');View::chekboxed($data['x']+1120,$data['y']+260,"MN","MN");  
} 
else 
{
View::label($data['x']+930,$data['y']+260,'Mort-né');View::chekbox($data['x']+1120,$data['y']+260,"MN","MN");  
}
View::label($data['x']+930,$data['y']+290,'Age gestationnel');$this->date($data['x']+1050,$data['y']+280,'AGEGEST',0,$data['AGEGEST']); 
View::label($data['x']+930,$data['y']+320,'Poids a la naissance ');$this->date($data['x']+1050,$data['y']+310,'POIDNSC',0,$data['POIDNSC']);
View::label($data['x']+930,$data['y']+350,'Age de la mére');$this->date($data['x']+1050,$data['y']+340,'AGEMERE',0,$data['AGEMERE']);
if ($data['DPNAT']=='1') 
{
View::label($data['x']+930,$data['y']+375,'Si décés périnatal préciser');View::chekboxed($data['x']+1120,$data['y']+395,"DPNAT","DPNAT"); 
View::label($data['x']+930,$data['y']+395,"l'état morbide de la mére"); View::txt($data['x']+920,$data['y']+430,'EMDPNAT',20,$data['EMDPNAT']); 
View::label($data['x']+930,$data['y']+415,"ayant pu affecter le NN"); //  au moment du dÈcËs 
} 
else 
{
View::label($data['x']+930,$data['y']+375,'Si décés périnatal préciser');View::chekbox($data['x']+1120,$data['y']+395,"DPNAT","DPNAT"); 
View::label($data['x']+930,$data['y']+395,"l'état morbide de la mére"); View::txt($data['x']+920,$data['y']+430,'EMDPNAT',20,$data['EMDPNAT']); 
View::label($data['x']+930,$data['y']+415,"ayant pu affecter le NN"); //  au moment du dÈcËs 
}
if ($data['DECEMAT']=='1') 
{
View::label($data['x']+1160,$data['y']+225,'Décés maternel');View::chekboxed(1420,$data['y']+225,"DECEMAT","DECEMAT"); 
} 
else 
{
View::label($data['x']+1160,$data['y']+225,'Décés maternel');View::chekbox(1420,$data['y']+225,"DECEMAT","DECEMAT"); 
}
switch($data['GRS'])  
{
   case 'DGRO' :
		{    
		View::label($data['x']+1160,$data['y']+250,'durant la grossesse');View::radioed(1420,$data['y']+250,"GRS","DGRO");    
		View::label($data['x']+1160,$data['y']+275,"durant l'accouchement");View::radio(1420,$data['y']+275,"GRS","DACC");      
		View::label($data['x']+1160,$data['y']+300,"durant l'avortement");View::radio(1420,$data['y']+300,"GRS","DAVO"); 
		View::label($data['x']+1160,$data['y']+326,'aprés la gestation ');View::radio(1420,$data['y']+326,"GRS","AGESTATION"); 
		View::label($data['x']+1160,$data['y']+350,'Indéterminé');View::radio(1420,$data['y']+350,"GRS","IDETER"); 
		break;}
  case 'DACC' :
		{    
		View::label($data['x']+1160,$data['y']+250,'durant la grossesse');View::radio(1420,$data['y']+250,"GRS","DGRO");    
		View::label($data['x']+1160,$data['y']+275,"durant l'accouchement");View::radioed(1420,$data['y']+275,"GRS","DACC");      
		View::label($data['x']+1160,$data['y']+300,"durant l'avortement");View::radio(1420,$data['y']+300,"GRS","DAVO"); 
		View::label($data['x']+1160,$data['y']+326,'aprés la gestation ');View::radio(1420,$data['y']+326,"GRS","AGESTATION"); 
		View::label($data['x']+1160,$data['y']+350,'Indéterminé');View::radio(1420,$data['y']+350,"GRS","IDETER"); 
		break;}
  case 'DAVO' :
		{    
		View::label($data['x']+1160,$data['y']+250,'durant la grossesse');View::radio(1420,$data['y']+250,"GRS","DGRO");    
		View::label($data['x']+1160,$data['y']+275,"durant l'accouchement");View::radio(1420,$data['y']+275,"GRS","DACC");      
		View::label($data['x']+1160,$data['y']+300,"durant l'avortement");View::radioed(1420,$data['y']+300,"GRS","DAVO"); 
		View::label($data['x']+1160,$data['y']+326,'aprés la gestation ');View::radio(1420,$data['y']+326,"GRS","AGESTATION"); 
		View::label($data['x']+1160,$data['y']+350,'Indéterminé');View::radio(1420,$data['y']+350,"GRS","IDETER"); 
		break;}
  case 'AGESTATION' :
		{    
		View::label($data['x']+1160,$data['y']+250,'durant la grossesse');View::radio(1420,$data['y']+250,"GRS","DGRO");    
		View::label($data['x']+1160,$data['y']+275,"durant l'accouchement");View::radio(1420,$data['y']+275,"GRS","DACC");      
		View::label($data['x']+1160,$data['y']+300,"durant l'avortement");View::radio(1420,$data['y']+300,"GRS","DAVO"); 
		View::label($data['x']+1160,$data['y']+326,'aprés la gestation ');View::radioed(1420,$data['y']+326,"GRS","AGESTATION"); 
		View::label($data['x']+1160,$data['y']+350,'Indéterminé');View::radio(1420,$data['y']+350,"GRS","IDETER"); 
		break;}
  case 'IDETER' :
		{    
		View::label($data['x']+1160,$data['y']+250,'durant la grossesse');View::radio(1420,$data['y']+250,"GRS","DGRO");    
		View::label($data['x']+1160,$data['y']+275,"durant l'accouchement");View::radio(1420,$data['y']+275,"GRS","DACC");      
		View::label($data['x']+1160,$data['y']+300,"durant l'avortement");View::radio(1420,$data['y']+300,"GRS","DAVO"); 
		View::label($data['x']+1160,$data['y']+326,'aprés la gestation ');View::radio(1420,$data['y']+326,"GRS","AGESTATION"); 
		View::label($data['x']+1160,$data['y']+350,'Indéterminé');View::radioed(1420,$data['y']+350,"GRS","IDETER"); 
		break;}
  
  		
}		
if ($data['POSTOPP']=='1') 
{
View::label($data['x']+1160,$data['y']+420,'<strong>4 semaines avant le décés </strong>'); View::chekboxed(1420,$data['y']+420,"POSTOPP","POSTOPP"); 
} 
else 
{
View::label($data['x']+1160,$data['y']+420,'<strong>4 semaines avant le décés </strong>'); View::chekbox(1420,$data['y']+420,"POSTOPP","POSTOPP"); 
}
//hospitalisation  
View::label($data['x'],$data['y']-80,'Date:'.$data['DATEHOSPI']);
View::label($data['x']+152,$data['y']-80,'Heures:'.$data['HEURESHOSPI']);
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
View::label($data['x']+720,$data['y']-80,'Medecin:'.$data['MEDECINHOSPIT']);
View::hide(215,670,'id',0,$data['id']);
View::hide(215,670,'REGION',0,$_SESSION['REGION']);
View::hide(215,670,'WILAYA',0,$_SESSION['WILAYA']);
View::hide(215,670,'STRUCTURE',0,$_SESSION['STRUCTURE']);
View::hide(215,670,'login',0,$_SESSION['login']);
$this->submit($data['x']+1185,$data['y']-100,$data['butun']);$this->f1();
view::sautligne(25);
ob_end_flush();
?>	
	