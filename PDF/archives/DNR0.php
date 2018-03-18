<?php
require('../PDF/PTS.php');
class DNR0 extends PTS
{ 
     
	function corpsfdp($idon) 
	{
	$this->mysqlconnect();
	$query1 = "select * from tdon WHERE  idon = '$idon'";
	$resultat1=mysql_query($query1);
	$row = mysql_fetch_array($resultat1); 
	$IDDNR=$row['IDDNR'];
	$this->RoundedRect($x=5, $y=36, $w=200, $h=30, $r=2, $style = '');
	$this->Text(5,40,"Numero d identification");
	$this->Text(5,50,"Structure de Transfusion Sanguine:");
    $this->Text(5,55,$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS").' Wilaya de '.$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(150,40,"Groupage ABO:");$this->Text(150,45,"Groupage Rhesus:");
	$this->Text(150,50,"Autres:");
    $this->Text(182,50,"---------");
    $this->Line(5 ,70 ,200 ,70 );
    $this->RoundedRect($x=5, $y=74, $w=200, $h=30, $r=2, $style = '');
    $this->Text(5,80,"Nom:");
	$this->Text(84,80,"Prénom:");
	$this->Text(165,80,"Sexe:");
	$this->Text(5,90,"Né(e):le ");
	$this->Text(165,90,"Age:");
	$this->Line(5 ,108 ,200 ,108);
	$this->RoundedRect($x=5, $y=112, $w=200, $h=30, $r=2, $style = '');
	$this->Text(5,110+8,"Wilaya de naissance:");
	$this->Text(84,110+8,"Commune de naissance:");
	$this->Text(5,120+8,"Wilaya de residence:");
	$this->Text(84,120+8,"Commune de residence:");
	$this->Text(5,130+8,"Adresse de residence:");
	$this->Text(165,130+8,"Tél:");
	$this->Text(172,130+8,"");
	$this->Line(5 ,146 ,200 ,146 );
	$this->SetTextColor(225,0,0);
	$this->Text(5,45,$row['IDDNR']);
	$this->Text(5,60,"Date:".date('d/m/Y'));
	$this->Text(182,40,$row['GROUPAGE']);
	$this->Text(182,45,$row['RHESUS']);
	$this->Text(15,80,$row['NOMDNR']);
	$this->Text(100,80,$row['PRENOMDNR']);
	$this->Text(175,80,$row['SEXE']);
	$this->Text(20,90,$row['DATENAISSANCE']);
	$this->Text(175,90,substr(date('Y-m-d'),0,4)-substr($row['DATENAISSANCE'],6,4)." ans");
	$this->Text(42,110+8,$this->nbrtostring("gpts2012","wil","IDWIL",$row['WILAYA'],"WILAYAS"));$this->Text(84+42,110+8,$this->nbrtostring("gpts2012","com","IDCOM",$row['COMMUNE'],"COMMUNE"));
	$this->Text(42,120+8,$this->nbrtostring("gpts2012","wil","IDWIL",$row['WILAYAR'],"WILAYAS"));$this->Text(84+42,120+8,$this->nbrtostring("gpts2012","com","IDCOM",$row['COMMUNER'],"COMMUNE"));
	$this->Text(43,130+8,$row['ADRESSE']);
	$this->Text(173,130+8,$row['TELEPHONE']);
	$this->SetTextColor(0,0,0);
	$h=150;
	$this->SetXY(05,$h); 	  
	$this->cell(20,05,"Date",1,0,'C',0);
	$this->SetXY(25,$h); 	  
	$this->cell(22,05,"Lieu du don ",1,0,'C',0);
	$this->SetXY(47,$h); 	  
	$this->cell(44,05,"N° d'identification du don",1,0,'C',0);
	$this->SetXY(91,$h); 	  
	$this->cell(20,05,"TA",1,0,'C',0);
	$this->SetXY(111,$h); 	  
	$this->cell(20,05,"Poids",1,0,'C',0);
	$this->SetXY(131,$h); 	  
	$this->cell(30,05,"Volume a preleve",1,0,'C',0);
	$this->SetXY(161,$h); 	  
	$this->cell(44,05,"Observation",1,0,'C',0);
	$this->SetXY(5,155); // marge sup 13
	$query = "select datedon,str,idon,IDP,ta,poids from tdon WHERE  IDDNR = '$IDDNR'  order by  idon   ";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	  {
	   $this->cell(20,5,$this->dateUS2FR($row->datedon) ,1,0,'L',0);//5  =hauteur de la cellule origine =7
	   $this->cell(22,5,$row->str,1,0,'L',0);
	   $this->cell(44,5,$row->idon,1,0,'C',0);
	   $this->cell(20,5,$row->ta,1,0,'C',0);
	   $this->cell(20,5,$row->poids,1,0,'C',0);
	   $this->cell(30,5,'',1,0,'C',0);
	   $this->cell(44,5,'',1,0,'C',0);
	   $this->SetXY(05,$this->GetY()+5); 
	  }
	$this->SetXY(05,$this->GetY()); 	  
	$this->cell(42,5," TOTAL DON",1,0,'C',0);	  
	$this->SetXY(47,$this->GetY());
	$this->cell(158,5,$totalmbr1,1,0,'C',0);	
	$this->SetXY(150,$this->GetY()+15);				 
	$this->cell(40,5,"Signature  médecin:",1,0,'C',0);
	$this->SetXY(150,$this->GetY()+10);				 
	$this->cell(40,5,"Dr ".$this->USER(),1,0,'C',0);
	$this->SetXY(5,$this->GetY()+10);				 
	$this->cell(70,5,"Code Barre D identification Du Donneur",1,0,'C',0);
	// $this->EAN13(5, $this->GetY()+10,$idon, $h=16, $w=.35);
	$this->Code39(5, $this->GetY()+10, $IDDNR, $baseline=0.5, $height=16);
	}
	
	
	

    function BSA($w,$h) 
	{
	//Formule Dubois et Dubois² (1916).
	//Surface corporelle (m²) = 0,007184 x Taille(cm)0,725 x Poids(kg)0,425  
	//poids entre 6 et 93 kg taille entre 73 et 184 cm.
	$BSA = 0.007184 * pow($w,0.425)* pow($h,0.725) ." m2" ;
	
	//Formule de Gehan et George (1970)poids entre 4 et 132 kg ;taille entre 50 et 220 cm.
	//Surface corporelle (m²) = 0,0235 x Taille(cm)0,42246 x Poids(kg)0,51456
	//$BSA1 = 0.0235 * pow($w,0.51456)* pow($h,0.42246) ."m2" ;
	
	//pour enfant 
	 //Surface corporelle (m²) = [4 x Poids(kg) +7] / [Poids(kg) + 90]
	//$BSA2 = (4*$w+7)/($w+90) ."m2" ;
	
	
	//poid ideal Formule de Lorentz
	//Femme = Taille(cm) - 100 - [Taille(cm) - 150] / 2   Homme = Taille(cm) - 100 - [Taille(cm) - 150] / 4
	//âge de supérieur à 18 ans ;taille entre 140 et 220 cm (55 à 87 inch)
	//Poids idéal = 50 + [Taille(cm) - 150]/4 + [Age(an) - 20]/4
	
	//Calcul du poids maigre (LBM)
	//Poids maigre (homme) en kg = 1.10 x Poids(kg) - 128 [Poids(kg)2/Taille(cm)2]
	//Poids maigre (femme) en kg  = 1.07 x Poids(kg) - 148 [Poids(kg)2/Taille(cm)2]
	//âge entre 18 et 80 ans ; poids entre 35 et 130 kg ;aille entre 140 et 185 cm.
	
	return $BSA;
	}
    
	function PI($h) 
	{
	//poid ideal Formule de Lorentz
	//Femme = Taille(cm) - 100 - [Taille(cm) - 150] / 2   
	//  Homme = Taille(cm) - 100 - [Taille(cm) - 150] / 4
	//âge de supérieur à 18 ans ;taille entre 140 et 220 cm (55 à 87 inch)
	//Poids idéal = 50 + [Taille(cm) - 150]/4 + [Age(an) - 20]/4
	$PI =$h-100-($h-150)/4 ."kg" ;
	return $PI;
	}



   

  
	function insertiondnr ($NOMDNR,$PRENOMDNR,$SEXE,$DATENAISSANCE,$WILAYA,$COMMUNE,$WILAYAR,$COMMUNER,$ADRESSE,$TELEPHONE,$date,$STR,$TDNR,$TDON,$POIDS,$TA,$IDP,$HDP,$IDDNR,$AGE) 
    {
	$IND='IND';
	$dateus=$this->dateFR2US($date); 
	$db_host="localhost";
    $db_name="gpts2012"; 
    $db_user="root";
    $db_pass=""; 
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($db_name,$cnx) ; 
    $DP= date('Y/m/d',strtotime('+90 days'));  //DATE PROCHAIN DON 
    $sql = "INSERT INTO TDON( iddnr,nomdnr,prenomdnr,sexe,datenaissance,age,wilaya,commune,wilayar,communer,adresse,telephone,datedon,str,tdnr,tdon,poids,ta,DP,IDP,IND,HDP,SRS,WRS,CRS,USER ) VALUES ('".$IDDNR."','".$NOMDNR."','".$PRENOMDNR."','".$SEXE."','".$DATENAISSANCE."','".$AGE."','".$WILAYA."','".$COMMUNE."','".$WILAYAR."','".$COMMUNER."','".$ADRESSE."','".$TELEPHONE."','".$dateus."','".$STR."','".$TDNR."','".$TDON."','".$POIDS."','".$TA."','".$DP."','".$IDP."','".$IND."','".$HDP."','".$this->STRUCTURE()."','".$this->WILAYA()."','".$this->REGION()."','".$this->USER()."')";
    $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()); 
    }
	
	
	
	function cherchednr ($IDDNR) 
    {
	$db_host="localhost";
    $db_name="gpts2012"; 
    $db_user="root";
    $db_pass=""; 
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($db_name,$cnx) ;
	//requette de recherche si un idrec existe 
	$sql = "SELECT IDDNR FROM TDON WHERE  IDDNR = '".$IDDNR."' "	;
	$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
	$result = mysql_fetch_object($requete) ;
	if(is_object($result))
	{
	$IDDNRmg =" NB:Le donneur figure dans notre base de donnees *****" ;
	}  
	else
	{
	$IDDNRmg ="NB:Le donneur ne figure pas dans notre base de donnees " ; 
	}
	mysql_free_result($requete);
	return $IDDNRmg;
    }
	//entete
    
	
	function enteteques()
    {
	$this->AddPage('p','A4');
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('Arial','B',10);
	$this->Image('../IMAGES/logoao.gif',90,26,15,15,0);
	$this->Text(70,5,'AGENCE REGIONALE DE :'.$this->nbrtostring("gpts2012","ars","IDARS",$this->REGION(),"WILAYAS"));
	$this->Text(80,10,'WILAYA DE :'.$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(46,15,'STRUCTURE DE TRANSFUSION SANGUINE :'.$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS"));
	$this->SetFont('Arial','B',20);
	$this->Text(70,25,"- QUESTIONNAIRE -");
	$this->SetFont('Arial','B',10);
    }
	// function entete()
    // {
	// $this->AddPage('p','A4');
	// $this->SetDisplayMode('fullpage','single');//mode d affichage 
	// $this->SetFont('Arial','B',10);
	// $this->Image('../IMAGES/logoao.gif',90,26,15,15,0);
	// $this->Text(70,5,'AGENCE REGIONALE DE :'.$this->nbrtostring("gpts2012","ars","IDARS",$this->REGION(),"WILAYAS"));
	// $this->Text(80,10,'WILAYA DE :'.$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	// $this->Text(46,15,'STRUCTURE DE TRANSFUSION SANGUINE :'.$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS"));
	// $this->SetFont('Arial','B',20);
	// $this->Text(55,25,"FICHE DE PRELEVEMENT ");
	// $this->SetFont('Arial','B',10);
	// $this->Text(5,40,"Numero d identification");
    // }
	function entete7()
    {
	$this->SetTextColor(0);
	$this->AddPage('p','A4');
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('Arial','B',10);
	$this->Image('../IMAGES/logoao.gif',90,26,15,15,0);
	$this->Text(70,5,'AGENCE REGIONALE DE :'.$this->nbrtostring("gpts2012","ars","IDARS",$this->REGION(),"WILAYAS"));
	$this->Text(80,10,'WILAYA DE :'.$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(46,15,'STRUCTURE DE TRANSFUSION SANGUINE :'.$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS"));
	$this->SetFont('Arial','B',20);
	$this->Text(65,25,"FICHE DONNEUR ");
	$this->SetFont('Arial','B',10);
	$this->Text(5,40,"Numero d identification");
	$this->Text(5,50,"Structure de Transfusion Sanguine:");
    $this->Text(5,55,$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS").' Wilaya de '.$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(150,40,"Groupage ABO:");$this->Text(150,45,"Groupage Rhesus:");
	$this->Text(150,50,"Autres:");
    $this->Text(182,50,"---------");
    $this->Line(5 ,70 ,200 ,70 );
    $this->Text(5,80,"Nom:");
	$this->Text(84,80,"Prénom:");
	$this->Text(165,80,"Sexe:");
	$this->Text(5,90,"Né(e):le ");
	$this->Text(165,90,"Age:");
	$this->Line(5 ,100 ,200 ,100 );
	$this->Text(5,110,"Wilaya de naissance:");
	$this->Text(84,110,"Commune de naissance:");
	$this->Text(5,120,"Wilaya de residence:");
	$this->Text(84,120,"Commune de residence:");
	$this->Text(5,130,"Adresse de residence:");
	$this->Text(165,130,"Tél:");
	$this->Text(172,130,"");
	$this->Line(5 ,140 ,200 ,140 );
	$this->SetTextColor(225,0,0);
    }
	
	function entetecpn()
    {
	$this->AddPage('p','A4');
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('Arial','B',10);
	$this->SetTextColor(225,0,0);
	$this->Text(50,68,'');//$this->USER()

	// $this->Text(35,68+16,$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS"));
	// $this->Text(35,68+24,"wilaya de  ".$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->SetTextColor(0,0,0);
	
    }
	
	function entetecarte($IDDNR)
    {
	//1ere page
	//face droite
	$this->AddPage('p','A5');
	$this->SetDisplayMode('fullpage','two');//mode d affichage 
	$this->Image('../IMAGES/LOGOAO.GIF',105,25,15,15,0);//image (url,x,y,hauteur,largeur,0)
	$this->SetFont('Arial','B',6);
	$this->RoundedRect(78, 1, 70, 100, 2, $style = '');
	
	$this->Text(82,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE ");
	$this->Text(96,15,"AGENCE NATIONALE DU SANG");
	$this->Text(90,20,"AGENCE REGIONALE DU SANG ".$this->nbrtostring("gpts2012","ars","IDARS",$this->REGION(),"WILAYAS"));
	$this->Line(80 ,23 ,145 ,23 );
	$this->SetFont('Arial','B',14);
	$this->Text(104,48,"CARTE");
	$this->Text(88,53,"DONNEUR DE SANG ");
	$this->SetFont('Arial','B',8);
	$this->Text(90,60,"Structure de Transfusion Sanguine:");
	$this->Text(90,65,$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS"));
	$this->Text(90,70,"wilaya de  ".$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->SetFont('Arial','B',7);
	$this->Text(80,94,"Numéro d'identification du donneur: ");//
	$this->Text(80,98,"Delivrée le: ");
	$this->SetFont('Arial','B',8);
	//face gauche
	$this->RoundedRect(1, 1, 70, 100, 2, $style = '');
	$this->SetTextColor(225,0,0);
	$this->Text(123,94,$IDDNR);
	$this->Text(93,98,date('d/m/Y'));
	$this->SetTextColor(0,0,0);
	
    }
	function entetecartegr($IDDNR)
    {
	//1ere page
	//face droite
	$this->AddPage('p','A5');
	$this->SetDisplayMode('fullpage','two');//mode d affichage 
	$this->Image('../IMAGES/LOGOAO.GIF',105,25,15,15,0);//image (url,x,y,hauteur,largeur,0)
	$this->SetFont('Arial','B',6);
	$this->RoundedRect(1, 1,70, 100 ,2, $style = '');
	$this->RoundedRect(78, 1,70, 100 ,2, $style = '');
	$this->Text(82,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE ");
	$this->Text(96,15,"AGENCE NATIONALE DU SANG");
	$this->Text(90,20,"AGENCE REGIONALE DU SANG ".$this->nbrtostring("gpts2012","ars","IDARS",$this->REGION(),"WILAYAS"));
	$this->Line(80 ,23 ,145 ,23 );
	$this->SetFont('Arial','B',14);
	$this->Text(104,45,"CARTE");
	$this->Text(88,50,"GROUPE SANGUIN");
	$this->Text(99,55,"-Receveur-");
	$this->SetFont('Arial','B',8);
	$this->Text(90,60,"Structure de Transfusion Sanguine:");
	$this->Text(90,65,$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS"));
	$this->Text(90,70,"wilaya de  ".$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->SetFont('Arial','B',7);
	$this->Text(80,94,"Numéro d'identification du donneur: ");//
	$this->Text(80,98,"Delivrée le: ");
	//***********************************************************************************//
	$this->SetFont('Arial','B',8);
	$this->Text(2,13,"Date");
	$this->Line(15,8 ,15 ,101);
	$this->Text(16,13,"NBR°/GR.RH");
	$this->Line(34,8 ,34 ,101);
	$this->Text(38,13,"RAI");
	$this->Line(49,8 ,49 ,101);
	$this->Text(50,13,"OBSERVATION");
	$this->Text(5,6,"Transfusion De Sang Nbr De Flacon Et Groupe");
	$this->Line(1 ,8 ,71 ,8 );
	$this->Line(1 ,16 ,71 ,16 );
	$this->Line(1 ,24 ,71 ,24 );
	$this->Line(1 ,32 ,71 ,32);
	$this->Line(1 ,40 ,71 ,40 );
	$this->Line(1 ,48 ,71 ,48 );
	$this->Line(1 ,56 ,71 ,56 );
	$this->Line(1 ,64 ,71 ,64 );
	$this->Line(1 ,72 ,71 ,72 );
	$this->Line(1 ,80 ,71 ,80 );
	$this->Line(1 ,88 ,71 ,88 );
	//$pdf->Rect(1, 109,70, 100 ,"d"); RECTANGLE DE BAS 
	//$pdf->Rect(78, 109,70, 100 ,"d");
	//****************DONNES ******//
	$this->SetTextColor(225,0,0);
	$this->Text(123,94,$IDDNR);
	$this->Text(94,98,date('d/m/Y'));
	$this->SetTextColor(0,0,0);
    }
	
	
	
    function corps($POIDS,$IDP)
    {
	$this->SetFont('Arial','B',10);
	$this->Text(55,40,"Date:");
	$this->Text(118,40,"Structure");
	$this->SetXY(158,30);
	$this->Cell(43,14,'Coller etiquette du don',1,1,'C');
	$this->SetXY(158,30+15);
	$this->Cell(43,14,'NDP'.$IDP,1,1,'C');
	$this->Text(5,65,"Structure de Transfusion Sanguine:");
	$this->Text(70,65,$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS").'  Wilaya de '.$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Line(5 ,70 ,200 ,70 );
	$this->Text(5,80,"Nom:");
	$this->Text(84,80,"Prenom:");
	$this->Text(170,80,"Sexe:");
	$this->Text(5,90,"Ne(e):le ");
	$this->Text(170,90,"Age:");
	$this->Line(5 ,100 ,200 ,100 );
	$this->Text(5,110,"Wilaya de naissance:");
	$this->Text(84,110,"Commune de naissance:");
	$this->Text(5,120,"Wilaya de residence:");
	$this->Text(84,120,"Commune de residence:");
	$this->Text(5,130,"Adresse de residence:");
	$this->Text(160,130,"Tel:");
	$this->Line(5 ,140 ,200 ,140 );
	//**************************************PARTIE A REMPLIR PAR LE MEDECIN ******************************************//
	$this->Text(5,150,"Partie a remplir  Par le Medecin:");
	$this->Text(5,160,"Type de donneur:");
	$this->Text(5,170,"Poids:");
	$this->Text(28,170,"Kg");
	$this->Text(140,170,"Autres examens: RAS");
	$this->Text(5,180,"TA:");
	$this->Text(30,180,"mmhg");
	$this->Text(140,180,"Type de poche: DOUBLE ");
	$this->Text(5,190,"Type de don:");
	$this->Text(140,190,"Volume maximum a prelever:");
	$this->Text(191,190,"500 cc");
	$this->Text(5,200,"Volume a prelever:");
	$this->Text(40,200,$POIDS*8);
	$this->Text(48,200,"cc");
	$this->Text(5,210,"Heure de prelevement:");
	$this->SetXY(150,200);				 
    $this->cell(40,5,"Signature  médecin:",1,0,'C',0);
    $this->SetXY(150,210);				 
    $this->cell(40,5,"DR : ".$this->USER() ,1,0,'C',0);
	$this->Line(5 ,230 ,200 ,230 );
	//***************************************partie a remplire PAR ide***************************************************//
	$this->Text(5,240,"Partie a remplire par IDE:");
	$this->Text(5,250,"Volume preleve:");
	$this->Text(5,260,"Temps de prelevement:");
	$this->Text(5,270,"Commentaires-Incidents:");
	$this->Text(140,270,"Signature IDE:");
	//***************************************FICHE DONNEUR 2EME PAGE ********************************************//
	$this->SetFont('Arial','B',13);
    $this->SetTextColor(225,0,0);
    }

// ***************************************************barre code******************************************
   
		
}	