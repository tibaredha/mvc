<?php
class DIS extends PDF_Invoice
{   
	function insertiondis ($AGEN,$IDREC,$NOMREC,$PRENOMREC,$SEXE,$DATENAISSANCE,$WILAYA,$commune,$GROUPAGE,$rhesus,$SERVICE,$MATRICULE,$DOSSIER,$DIAGNOSTIC,$MEDECIN,$datedemdis,$heursdemdis,$QCGR,$QPFC,$QCPS)
    {
	$db_host="localhost";
    $db_name="gpts2012"; 
    $db_user="root";
    $db_pass="";
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($db_name,$cnx) ;
    $sql = "INSERT INTO tdis( AGEN,idrec,nomrec,prenomrec,sexe,datenaissance,wilayanaissance,communenaissance,groupage,rhesus,service,matricule,dossier,dgc,nommed,datedemdis,heursdemdis,QCGR,QPFC,QCPS ) VALUES ('".$AGEN."','".$IDREC."','".$NOMREC."','".$PRENOMREC."','".$SEXE."','".$DATENAISSANCE."','".$WILAYA."','".$commune."','".$GROUPAGE."','".$rhesus."','".$SERVICE."','".$MATRICULE."','".$DOSSIER."','".$DIAGNOSTIC."','".$MEDECIN."','".$datedemdis."','".$heursdemdis."','".$QCGR."','".$QPFC."','".$QCPS."')";
    $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());  
    }
	
	
	
	function chercherec ($IDREC) 
    {
	$db_host="localhost";
    $db_name="gpts2012"; 
    $db_user="root";
    $db_pass="";
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($db_name,$cnx) ;
	$sql = "SELECT IDREC FROM TDIS WHERE  IDREC = '".$IDREC ."' "	;
	$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
	$result = mysql_fetch_object($requete) ;
	if(is_object($result))
	  {
	   $IDRECmg ="le receveur figure dans notre base de données sous code:" ;
		mysql_free_result($requete);
	  }  
	  else
	  {
	   $IDRECmg ="le receveur ne figure pas dans notre base de données et son code est de:" ; 
	  }
	return $IDRECmg;
    }
	function cherchestockCGR ($CGR,$GROUPAGE,$rhesus) 
    {
		$db_host="localhost";
		$db_name="gpts2012"; 
		$db_user="root";
		$db_pass="";
		$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
		$db  = mysql_select_db($db_name,$cnx) ;
		if( $CGR == 'X' )
		{
		$sql = "SELECT * FROM cgr WHERE  GROUPAGE = '".$GROUPAGE ."' AND RHESUS ='".$rhesus."'  ";  //AJOUTE and DIST!=''
		$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
	    $result = mysql_fetch_object($requete) ;
		$nbr=mysql_num_rows($requete);
		   if(is_object($result))
			{
			$IDRECmgP ="le cgr du groupage $GROUPAGE $rhesus chercher existe au nombre de : $nbr poche(s) au niveau du stock " ;
			 mysql_free_result($requete);
			}  
			else
			{
			$IDRECmgP ="le cgr du groupage $GROUPAGE $rhesus chercher n'existe pas au niveau du stock   " ; 
			}
			return $IDRECmgP;	
		}
         else return $IDRECmgP =" cgr champ vide " ;		
    }
	function cherchestockPFC ($PFC,$GROUPAGE,$rhesus) 
    {
		$db_host="localhost";
		$db_name="gpts2012"; 
		$db_user="root";
		$db_pass="";
		$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
		$db  = mysql_select_db($db_name,$cnx) ;
		if( $PFC == 'X' )
		{
		$sql = "SELECT * FROM pfc WHERE  GROUPAGE = '".$GROUPAGE ."' AND RHESUS ='".$rhesus."' ";
		$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
	    $result = mysql_fetch_object($requete) ;
		$nbr=mysql_num_rows($requete);
		   if(is_object($result))
			{
			$IDRECmgP ="le pfc du groupage $GROUPAGE $rhesus chercher existe au nombre de : $nbr poche(s) au niveau du stock " ;
			 mysql_free_result($requete);
			}  
			else
			{
			$IDRECmgP ="le pfc du groupage $GROUPAGE $rhesus chercher n'existe pas au niveau du stock   " ; 
			}
			return $IDRECmgP;	
		}
        else return $IDRECmgP =" pfc champ vide " ; 		
    }
	
	function cherchestockCPS ($CPS,$GROUPAGE,$rhesus) 
    {
		$db_host="localhost";
		$db_name="gpts2012"; 
		$db_user="root";
		$db_pass="";
		$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
		$db  = mysql_select_db($db_name,$cnx) ;
		if( $CPS == 'X' )
		{
		$sql = "SELECT * FROM cps WHERE  GROUPAGE = '".$GROUPAGE ."' AND RHESUS ='".$rhesus."' ";
		$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
	    $result = mysql_fetch_object($requete) ;
		$nbr=mysql_num_rows($requete);
		   if(is_object($result))
			{
			$IDRECmgP ="le cps du groupage $GROUPAGE $rhesus chercher existe au nombre de : $nbr poche(s) au niveau du stock " ;
			 mysql_free_result($requete);
			}  
			else
			{
			$IDRECmgP ="le cps du groupage $GROUPAGE $rhesus chercher n'existe pas au niveau du stock   " ; 
			}
			return $IDRECmgP;	
		}
        else return $IDRECmgP =" cps champ vide " ; 		
    }
	
	//entete
    function entete($datejour)
    {
	$this->AddPage('p','A4');
	$this->SetFont('Arial','B',10);
	$this->Text(50,5,"ETABLISSEMENT PUBLIC HOSPITALIER AIN OUSSERA");
	$this->Text(65,10,"POSTE DE TRANSFUSION SANGUINE");
	$this->SetFont('Arial','B',20);
	$this->Text(45,25,"DEMANDE DE PRODUITS SANGUINS ");
	$this->SetFont('Arial','B',10);
	//**************************************label****************************************************************//
	$this->Text(5,40,"Nom:");
	$this->Text(45,40,"Prénom:");
	$this->Text(91,40,"Date de naissance:");
	$this->Text(156,40,"Age:");
	$this->Text(180,40,"Sexe:");
	$this->Text(5,50,"Service:");
	$this->Text(91,50,"Matricule:");
	$this->Text(156,50,"Dossier:");
	$this->Text(5,60,"Groupage:");
	$this->Text(91,60,"Rhésus:");
	$this->Text(156,60,"Phénotype:");
	$this->Rect(5, 68, 191, 38 ,"d");
	$this->Text(7,72,"Diagnostic et motif de la transfusion:");
	$this->Text(7,80,"Polytransfusé oui/non:");
	$this->Text(110,80,"Date de la dernière transfusion");
	$this->Text(7,88,"Date de la dernière RAI:");
	$this->Text(110,88,"Résultats:");
	$this->Text(7,96,"Réactions transfusionnelles antérieures oui/non:");
	$this->Text(110,96,"Types:");
	$this->Text(7,104,"Nombre de grossesses antérieures:");
	$this->SetXY(5,107);
	$this->Cell(63,8,'PRODUITS DEMANDE',1,1,'C');
	$this->SetXY(69,107);
	$this->Cell(63,8,'QUANTITE',1,1,'C');
	$this->SetXY(133,107);
	$this->Cell(63,8,'QUALIFICATION',1,1,'C');
	$this->Rect(5, 116, 63, 54 ,"d");
	$this->Rect(69, 116, 63, 54 ,"d");
	$this->Rect(133, 116, 63, 54 ,"d");
	$this->SetFont('Arial','B',10);
	$this->Text(14,120,"Sang total");
	$this->Text(7,120,"O");
    $this->Text(95,120,"00");
	$this->Text(140,120,"Phénotype");
	$this->Text(14,128,"Concentré  erythroytaire");
	$this->Text(140,128,"Déleucocyté");
	$this->Text(14,136,"Concentré plaquettaire standard");
	$this->Text(140,136,"Lavé ");
	$this->Text(7,144,"O");
	$this->Text(14,144,"Concentré unitaire plaquettaire");
	$this->Text(95,144,"00");
	$this->Text(140,144,"Autres");
	$this->Text(14,152,"PFC");
	$this->Text(7,160,"O");
	$this->Text(14,160,"Cryoprécipité");
	$this->Text(95,160,"00");
	$this->Text(7,168,"O");
	$this->Text(14,168,"Autres");
	$this->Text(95,168,"00");
	$this->SetXY(5,171);
	$this->Cell(63,8,'MEDECIN PRESCRIPTEUR',1,1,'C');
	$this->SetXY(69,171);
	$this->Cell(32,8,'TELEPHONE',1,1,'C');
	$this->SetXY(100,171);
	$this->Cell(32,8,'SIGNATURE',1,1,'C');
	$this->SetXY(133,171);
	$this->Cell(63,8,'CACHET',1,1,'C');
	$this->Rect(69, 180, 31, 13,"d");
	$this->Rect(101, 180, 31, 13,"d");
	$this->Rect(133, 180, 63, 13 ,"d");
	$this->Text(160,200,"Date $datejour");
	$this->Text(10,208," Joindre  à la demande ");
	$this->Text(70,208," Carte de groupe sanguin ");
	$this->Text(70,216," Echantillon de sang du malade pour test de compatibilité  ");
	$this->Text(10,224," Numéros des Unités distribuées ");
	$this->Text(11,232,"-----------        -----------         ----------- ");
	$this->Text(70,232," Date $datejour ");
	$this->Text(120,232,"Nom et Signature du porteur ");
	$this->Text(11,240,"-----------        -----------         ----------- ");
	$this->Text(11,248,"-----------        -----------         ----------- ");
	$this->SetFont('Arial','B',8);
	$this->Line(10 ,253 ,200 ,253 ); 
	$this->Text(10,256,"- Avant toute transfusion , S'assurer que  les unités à transfuser correspondent à ceux inscrites sur la présente demande.");
	$this->Text(10,262,"- Effectuer le contrôle prétransfusionnel ultime au lit du malade. ");
	$this->Text(10,268,"- Consigner toute transfusion d'un produit sanguin sur le registre transfusionnel du service et sur la fiche ");
	$this->Text(10,274,"  transfusionnelle du receveur ");
	$this->Line(10 ,275 ,200 ,275 ); 
	$this->Text(10,280,"quantite en stock du psl  ");
	$this->SetTextColor(225,0,0);
    }
    
    function fichetrans()
    {
	$this->AddPage('p','A4');
	$this->SetFont('Arial','B',10);
	$this->Text(50,5,"ETABLISSEMENT PUBLIC HOSPITALIER AIN OUSSERA");
	$this->Text(65,10,"POSTE DE TRANSFUSION SANGUINE");
	$this->SetFont('Arial','B',20);
	$this->Text(55,25,"FICHE TRANSFUSIONNELLE ");
	$this->SetFont('Arial','B',10);
	//**************************************label****************************************************************//
	$this->Text(5,40,"Nom:");
	$this->Text(45,40,"Prénom:");
	$this->Text(91,40,"Date de naissance:");
	$this->Text(156,40,"Age:");
	$this->Text(180,40,"Sexe:");
	$this->Text(5,50,"Service:");
	$this->Text(91,50,"Matricule:");
	$this->Text(156,50,"Dossier:");
	$this->Text(5,60,"Groupage:");
	$this->Text(91,60,"Rhésus:");
	$this->Text(156,60,"Phénotype:");
	$this->SetTextColor(225,0,0);
    }
	function fichetrans1($IDREC)
    {
	$this->SetTextColor(0,0,0);
	$db_host="localhost";
	$db_name="gpts2012"; 
	$db_user="root";
	$db_pass="";
	$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");//  and dp >='".$ds."'
	$query = "SELECT * FROM TDIS1 where idrec='".$IDREC."'  ";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	$this->SetFont('Arial','B',10);
	$h=70;
	$this->SetXY(05,$h); 	  
	$this->cell(20,05,"DATE",1,0,'C',0);
	$this->SetXY(25,$h); 	  
	$this->cell(20,05,"HEURE",1,0,'C',0);
	$this->SetXY(45,$h); 	  
	$this->cell(45,05,"PRODUITS TRANSFUSES",1,0,'C',0);
	$this->SetXY(90,$h); 	  
	$this->cell(30,05,"REFERENCE",1,0,'C',0);
	$this->SetXY(120,$h); 	  
	$this->cell(40,05,"medecin",1,0,'C',0);
	$this->SetXY(160,$h); 	  
	$this->cell(40,05,"observation",1,0,'C',0);
	$this->SetXY(5,75); // marge sup 13
	while($row=mysql_fetch_object($resultat))
	  {
	   $this->cell(20,5,$row->condate,1,0,'C',0);//5  =hauteur de la cellule origine =7
	   $this->cell(20,5,$row->heursdis,1,0,'C',0);
	   $this->cell(45,5,$row->PSL,1,0,'C',0);
	   $this->cell(30,5,$row->NDP,1,0,'C',0);
	   $this->cell(40,5,$row->nommed,1,0,'C',0);
	   $this->cell(40,5,"",1,0,'C',0);
	   $this->SetXY(5,$this->GetY()+5); 
	  }
	for( $compteur = 0 ; $compteur < 35-$totalmbr1 ; $compteur++)
	  {
	   $this->cell(20,5,"",1,0,'C',0);//5  =hauteur de la cellule origine =7
	   $this->cell(20,5,"",1,0,'C',0);
	   $this->cell(45,5,"",1,0,'C',0);
	   $this->cell(30,5,"",1,0,'C',0);
	   $this->cell(40,5,"",1,0,'C',0);
	   $this->cell(40,5,"",1,0,'C',0);
	   $this->SetXY(5,$this->GetY()+5);
	  }  
	$this->SetXY(05,$this->GetY()); 	  
	$this->cell(70,05,"total transfusion :",1,0,'C',0);	  
	$this->SetXY(75,$this->GetY()); 	  
	$this->cell(125,05,$totalmbr1,1,0,'C',0);
	$this->SetXY(75,$this->GetY()+10); 	  
	$this->cell(125,05,"Dr TIBA PTS  EPH AIN OUSSERA ",0,0,'C',0);
    }	
}	