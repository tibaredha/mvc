<?php
require('invoice.php');
class DIS extends PDF_Invoice
{ 
     public $nomprenom ="tibaredha";
	 public $db_host="localhost";
	 public $db_name="mvc"; //probleme avec base de donnes  il faut change  gpts avec mvc   
     public $db_user="root";
     public $db_pass="";
	 public $utf8 = "" ;
	
	function mysqlconnect()
	{
	$this->db_host;
	$this->db_name;
	$this->db_user;
	$this->db_pass;
    $cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($this->db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $db;
	}
    function REGION()
    {
	$REGION=$_SESSION["REGION"];
	return $REGION;
	}
	function WILAYA()
    {
	$WILAYA=$_SESSION["WILAYA"];
	return $WILAYA;
	}
	function STRUCTURE()
    {
	$STRUCTURE=$_SESSION["STRUCTURE"];
	return $STRUCTURE;
	}
	function USER()
    {
	$USER=$_SESSION["login"];
	return $USER;
	}
	function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."/".$M."/".$A ;
    return $dateUS2FR;//01/01/2013
    }
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	function datePlus($dateDo,$nbrJours)
	{
	$timeStamp = strtotime($dateDo); 
	$timeStamp += 24 * 60 * 60 * $nbrJours;
	$newDate = date("Y-m-d", $timeStamp);
	return  $newDate;
	}
	function nbrtostring($db_name,$tb_name,$colonename,$colonevalue,$resultatstring) 
	{
	if (is_numeric($colonevalue) and $colonevalue!=='0') 
	{ 
	$this->mysqlconnect();
    $result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
    $row=mysql_fetch_object($result);
	$resultat=$row->$resultatstring;
	return $resultat;
	} 
	return $resultat2='??????';
	}
	//********************************************************fichetrans*************************************************************************//
	function entetepage($titre)
    {
	$this->AddPage('p','A4');
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('Arial','B',10);
	$this->Image('../public/IMAGES/photos/logoao.gif',90,0,15,15,0);
	$this->Text(5,5+3,'AGENCE REGIONALE DE :'.$this->nbrtostring($this->db_name,"ars","IDARS",$this->REGION(),"WILAYAS"));$this->Text(150,5," UTILISATEUR :".$this->USER());
	$this->Text(5,10+3,'WILAYA DE :'.$this->nbrtostring($this->db_name,"wrs","IDWIL",$this->WILAYA(),"WILAYAS"));         $this->Text(150,10," DATE : ".date ('d-m-Y'));
	$this->Text(5,15+3,'STRUCTURE DE TRANSFUSION SANGUINE :'.$this->nbrtostring($this->db_name,"cts","IDCTS",$this->STRUCTURE(),"CTS"));
	$this->SetFont('Arial','B',20);
	$this->SetTextColor(225,0,0);
	$this->SetXY(5,23);				 
    $this->cell(200,10,$titre,1,0,'C',0);
	$this->SetTextColor(0,0,0);
	$this->SetFont('Arial','B',10);
    }
	
	function fichetrans($IDREC)
    {
	$this->entetepage("FICHE TRANSFUSIONNELLE ");
	$this->SetFont('Arial','B',10);
	$this->Text(5,40,"Nom:");
	$this->Text(45,40,"Prénom:");
	$this->Text(91,40,"Date de naissance:");
	$this->Text(156,40,"Age:");
	$this->Text(180,40,"Sexe:");
	$this->Text(5,50,"Adresse : ");
	$this->Text(156,50,"Telephone:");
	$this->Text(5,60,"Groupage:");
	$this->Text(91,60,"Rhésus:");
	$this->Text(156,60,"Phénotype: C..c.. E..e.. ");
	$this->SetTextColor(225,0,0);
	$this->mysqlconnect();
	$query = "SELECT * FROM rec where id='".$IDREC."'  ";
	$resultat=mysql_query($query);
	$this->SetFont('Arial','B',10);
	while($row=mysql_fetch_object($resultat))
    {
    $this->Text(15,40,$row->NOM);
    $this->Text(22,50,$this->nbrtostring($this->db_name,"wil","IDWIL",$row->WILAYAR,"WILAYAS").'/'.$this->nbrtostring($this->db_name,"com","IDCOM",$row->COMMUNER,"COMMUNE").'/'.$row->ADRESSE);
	$this->Text(176,50,$row->TELEPHONE);
    $this->Text(62,40,$row->PRENOM);
    $this->Text(124,40,$row->DATENAISSANCE);
	$this->Text(165,40,substr(date('Y-m-d'),0,4)-substr($row->DATENAISSANCE,6,4)." ANS");
    $this->Text(190,40,$row->SEX);
    $this->Text(27,60,$row->GRABO);
    $this->Text(110,60,$row->GRRH);
	}
	$this->SetTextColor(0,0,0);
	$this->SetFont('Arial','B',10);
	$h=70;
	$this->SetXY(05,$h); 	  
	$this->cell(20,05,"DATE",1,0,'C',0);
	$this->SetXY(25,$h); 	  
	$this->cell(20,05,"HEURE",1,0,'C',0);
	$this->SetXY(45,$h); 	  
	$this->cell(45,05,"PRODUITS TRANSFUSES",1,0,'C',0);
	$this->SetXY(90,$h); 	  
	$this->cell(30,05,"N° DE POCHE",1,0,'C',0);
	$this->SetXY(120,$h); 	  
	$this->cell(40,05,"MEDECIN",1,0,'C',0);
	$this->SetXY(160,$h); 	  
	$this->cell(40,05,"SERVICE",1,0,'C',0);
	$this->SetXY(5,75); // marge sup 13
	$this->mysqlconnect();
	$query1 = "SELECT * FROM dis where IDREC='$IDREC' order by DATEDIS asc ";
	$resultat1=mysql_query($query1);
	$totalmbr1=mysql_num_rows($resultat1);
	while($row=mysql_fetch_object($resultat1))
	  {
	   $this->cell(20,5,$row->DATEDIS,1,0,'C',0);
	   $this->cell(20,5,$row->HEUREDIS,1,0,'C',0);
	   $this->cell(45,5,$row->PSL,1,0,'C',0);
	   $this->cell(30,5,$row->IDP,1,0,'C',0);
	   // $this->cell(40,5,trim($row->MED),1,0,'C',0);
	   $this->cell(40,5,trim($this->nbrtostring('mvc','grh','idp',$row->MED,'Nomlatin')),1,0,'C',0);
	   $this->cell(40,5,trim($this->nbrtostring('mvc','ser','id',$row->SERVICE,'service')),1,0,'C',0);
	   $this->SetXY(5,$this->GetY()+5); 
	  }
	for( $compteur = 0 ; $compteur < 35-$totalmbr1 ; $compteur++)
	  {
	   $this->cell(20,5,"",1,0,'C',0);
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
	$this->Output();
    }
	function hospitalisation($dateeuro,$IDDNR)
    {
	$this->mysqlconnect();
	$session=$_SESSION["login"];
	//$this->SetTextColor(0,0,255);
	$this->SetDisplayMode('fullpage','single');
	$this->SetFont('Arial', '', 10);$this->AddPage();
	$query = "select * from REC WHERE  id = '$IDDNR' ";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	$this->SetFont('Arial', '', 50); 
	while($result=mysql_fetch_object($resultat))
	{
	$this->SetFont('Arial','I', 10);
	$this->Text(50,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE ");
	$this->Text(35,10,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE");
	$this->Text(55,15,"ETABLISSEMENT PUBLIC HOSPITALIER AIN OUSSERA");
	$this->SetFont('Arial','I', 22);
	$this->Text(50,35,"DEMANDE D'HOSPITALISATION  ");
	$this->SetFont('Arial','I', 14);
	
	$this->RoundedRect(4, 55-5, 202, 35, 2, $style = ''); 
	$this->Text(5,56,"SERVICE : UMC" );
	$this->Text(100,56,"SPECIALITE :");
	$this->Text(5,66,"Non Du Praticien Ayant Accordé L'hospitalisation : DR TIBA");
	$this->Text(5,76,"Grade : MEDECIN GENERALISTE CHEF ");
	
	
	$this->RoundedRect(4, 94-5, 202, 50, 2, $style = '');//
	$this->SetFont('Arial','I', 18);
	$this->Text(90,95,"PATIENT");
	$this->SetFont('Arial','I', 14);
	$this->Text(5,105,"Nom : ".Trim($result->NOM));
	$this->Text(100,105,"Nom De Jeune Fille:"); 
	$this->Text(175,105,"Sexe : ".Trim($result->SEX)); 
	$this->Text(5,115,"Prénom : ".Trim($result->PRENOM));
	$this->Text(100,115,"Date  De Naissance : ".Trim($result->DATENAISSANCE));
	
	$age=substr(date('Y/m/d'),0,4)-substr($result->DATENAISSANCE,0,4);
	$this->Text(175,115,"Age : ".$age );
	$this->Text(5,125,"Nom De La Salle : ");   
	$this->Text(100,125,"N°Du Lit D'Hospitalisation : ");
	$this->Text(5,135,"Date Admission Hopital : ".date("d-m-Y")); 
	$this->Text(100,135,"Heure Hospitalisation : ".date("H:i"));
	
	$this->RoundedRect(4, 147-5, 202, 40, 2, $style = '');//
	$this->SetFont('Arial','I', 18);
	$this->Text(45,148,"MALADE ORIENTE OU ADRESSE PAR :");
	$this->SetFont('Arial','I', 14);
	$this->Text(5,158,"Nom et Prémom Du Médecin :  ");
	$this->Text(5,168,"Grade :"); 
	$this->Text(100,168,"Etablissement : "); 
	$this->Text(5,178,"Etablissement / Unite / Service :");
	
	$this->RoundedRect(4, 190-5, 202, 50, 2, $style = '');
	$this->SetFont('Arial','I', 18);
	$this->Text(75,191,"GARDE MALADE "); 
	$this->SetFont('Arial','I', 14);
	$this->Text(5,200,"Nom et Prénom Du Garde Malade : "); 
	$this->Text(5,210,"Pièce D'identité N°: "); 
	$this->Text(100,210,"Délivrée Le : ");
	$this->Text(5,220,"Par : ");
	
	// $this->EAN13(15,250,Trim($result->ID));
	$this->Text(120,250,"Date : ".date("d-m-Y"));
	$this->Text(120,250+8,"Signature et Visa Du Praticien");
	$this->Text(120,250+16,"Dr TIBA");
	
	
	
	// $this->Cell(30,8,Trim($result->NOM)."_".Trim($result->PRENOM),0,1,'r');
	// $this->SetXY(37,65);
	// $this->Cell(30,8,$result->DATENAISSANCE,0,1,'r');
	// $this->SetXY(111,65);
	// $this->Cell(30,8,substr(date('d/m/Y'),6,4)-substr($result->DATENAISSANCE,6,4),0,1,'r');
	// $this->SetTextColor(0,0,225);
	// $this->Image('../public/images/photos/grife.jpg',85,185,55,22,0);//85,143
	// $this->Text(80,178,"AIN OUSSERA LE :".$dateeuro);
    // $this->Text(85,183,"Le Medecin : DR TIBA");
	}
	$this->Output();
    }
	function LABODIS($dateeuro,$IDDNR)
    {
	$this->mysqlconnect();
	$session=$_SESSION["login"];
	$this->SetTextColor(0,0,255);
	$this->SetDisplayMode('fullpage','single');
	$this->SetFont('Arial', '', 10);$this->AddPage();
	$query = "select * from REC WHERE  id = '$IDDNR' ";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	$this->SetFont('Arial', '', 50); 
	while($result=mysql_fetch_object($resultat))
	{
	$this->SetFont('Arial', '', 10);
	$this->Text(5,10,"");
	$this->Text(10,15,"ETABLISSEMENT PUBLIC");
	$this->Text(8,20,"HOSPITALIER AIN OUSSERA");
	$this->Rect(74,5,65,25,"d");
	$this->Text(90,9+5,"N° D'enregistrement ");
	$this->Text(83,14+5,"Poste De Transfusion Sanguine ");
	$this->Text(83+20,19+5,$IDDNR);
	$this->Text(80,36,"AIN OUSSERA LE :".$dateeuro);
	$this->SetFont('Arial', '', 15);
	$this->Text(40,44,"DEMANDE D 'EXAMEN ");
	$this->Text(40,52,"BIOLOGIQUE   N°: ".Trim($result->id));
	$this->SetFont('Arial', '', 10);
	$this->Text(5,65,"Nom,Prénom du Receveur :");
	$this->Text(5,70,"Date De Naissance :");$this->Text(100,70,"Age :             ANS");
	$this->Text(5,75,"Service Hospitalier :");$this->Text(100,75,"Matricule : ".$IDDNR);
	$this->Text(5,80,"Service Extra Hospitalier : *** ");
	$this->Text(5,85,"Adresse : ".Trim($result->ADRESSE));
	$this->SetFont('Arial', '', 15);
	$this->Text(40,91,"DIAGNOSTIC CLINIQUE :");
	$this->SetFont('Arial', '', 10);
	$this->Text(5,102,"Examen demandés :");$this->Text(90,102,"Resultats :");
	$this->Line(50 ,106 ,50 ,173);
	$this->SetFont('Arial', '', 12);
	$this->Text(5,110,"1)- FNS de controle ");
	$this->Text(5,120,"2)- RAI");
	$this->Text(5,130,"3)- HIV");
	$this->Text(5,140,"4)- HVB");
	$this->Text(5,150,"5)- HVC");
	$this->Text(5,160,"6)- TPHA");
	$this->Text(5,170,"7)- VDRL");
	$this->Text(52,110,"-----------------------------------------------------------------");
	$this->Text(52,120,"-----------------------------------------------------------------");
	$this->Text(52,130,"-----------------------------------------------------------------");
	$this->Text(52,140,"-----------------------------------------------------------------");
	$this->Text(52,150,"-----------------------------------------------------------------");
	$this->Text(52,160,"-----------------------------------------------------------------");
	$this->Text(52,170,"-----------------------------------------------------------------");
	$this->SetTextColor(225,0,0);
	$this->SetFont('Arial', '', 10);
	$this->Text(32,95,"RECEVEUR DE SANG POUR SUIVI MEDICAL");$this->SetFont('Arial', '', 9);
	$this->Text(38,75,"POSTE DE TRANSFUSION SANGUINE");
	$this->SetFont('Arial', '', 12);
	$this->SetTextColor(225,0,0);
	$this->SetXY(50,60);
	$this->Cell(30,8,Trim($result->NOM)."_".Trim($result->PRENOM),0,1,'r');
	$this->SetXY(37,65);
	$this->Cell(30,8,$result->DATENAISSANCE,0,1,'r');
	$this->SetXY(111,65);
	$this->Cell(30,8,substr(date('d/m/Y'),6,4)-substr($result->DATENAISSANCE,6,4),0,1,'r');
	$this->SetTextColor(0,0,225);
	$this->Image('../public/images/photos/grife.jpg',85,185,55,22,0);//85,143
	$this->Text(80,178,"AIN OUSSERA LE :".$dateeuro);
    $this->Text(85,183,"Le Medecin : DR TIBA");
	}
	$this->Output();
    }
	function entete($datejour)
    {
	$this->entetepage("DEMANDE DE PRODUITS SANGUINS ");
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
	$this->Rect(5, 68, 200, 38 ,"d");
	$this->Text(7,72,"Diagnostic et motif de la transfusion:");
	$this->Text(7,80,"Polytransfusé oui/non:");
	$this->Text(110,80,"Date de la dernière transfusion");
	$this->Text(7,88,"Date de la dernière RAI:");
	$this->Text(110,88,"Résultats:");
	$this->Text(7,96,"Réactions transfusionnelles antérieures oui/non:");
	$this->Text(110,96,"Types:");
	$this->Text(7,104,"Nombre de grossesses antérieures:");
	$this->SetXY(5,107);$this->Cell(66,8,'PRODUITS DEMANDE',1,1,'C');
	$this->SetXY(72,107);$this->Cell(66,8,'QUANTITE',1,1,'C');
	$this->SetXY(139,107);$this->Cell(66,8,'QUALIFICATION',1,1,'C');
	$this->Rect(5, 116, 66, 54 ,"d");
	$this->Rect(72, 116, 66, 54 ,"d");
	$this->Rect(139, 116, 66, 54 ,"d");
	$this->SetFont('Arial','B',10);
	$this->Text(7,120,"O");
	$this->Text(14,120,"Sang total");
    $this->Text(95,120,"00");
	$this->Text(140,120,"Phénotype");
	$this->Text(7,128,"O");
	$this->Text(14,128,"Concentré  erythroytaire");
	$this->Text(95,128,"....");
	$this->Text(140,128,"Déleucocyté");
	$this->Text(7,136,"O");
	$this->Text(14,136,"Concentré plaquettaire standard");
	$this->Text(95,136,"....");
	$this->Text(140,136,"Lavé ");
	$this->Text(7,144,"O");
	$this->Text(14,144,"Concentré unitaire plaquettaire");
	$this->Text(95,144,"00");
	$this->Text(140,144,"Autres");
	$this->Text(7,152,"O");
	$this->Text(14,152,"PFC");
	$this->Text(95,152,"....");
	$this->Text(7,160,"O");
	$this->Text(14,160,"Cryoprécipité");
	$this->Text(95,160,"00");
	$this->Text(7,168,"O");
	$this->Text(14,168,"Autres");
	$this->Text(95,168,"00");
	$this->SetXY(5,171);$this->Cell(66,8,'MEDECIN PRESCRIPTEUR',1,1,'C');
	$this->SetXY(5,180);$this->Cell(66,13,'.................',1,1,'C');
	$this->SetXY(72,171);$this->Cell(32,8,'TELEPHONE',1,1,'C');$this->Rect(72, 180, 32, 13,"d");
	$this->SetXY(106,171);$this->Cell(32,8,'SIGNATURE',1,1,'C'); $this->Rect(106, 180, 32, 13,"d");
	$this->SetXY(139,171);$this->Cell(66,8,'CACHET',1,1,'C');$this->Rect(139, 180, 66, 13 ,"d");
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
    }
	function commande($dateeuro,$IDDNR)
    {
	$this->entete($dateeuro);
	$this->mysqlconnect();
	$session=$_SESSION["login"];
	$this->SetDisplayMode('fullpage','single');
	$this->SetFont('Arial', '', 10);
	$query = "select * from REC WHERE  id = '$IDDNR' ";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	$this->SetFont('Arial', '', 50); 
	while($result=mysql_fetch_object($resultat))
	{
	$this->SetTextColor(225,0,0);
	$this->SetFont('Arial','B',10);
	$this->Text(15,40,Trim($result->NOM));
	$this->Text(62,40,Trim($result->PRENOM));
	$this->Text(124,40,$result->DATENAISSANCE);
	$this->Text(165,40,substr(date('d/m/Y'),6,4)-substr($result->DATENAISSANCE,6,4));
	$this->Text(190,40,$result->SEX);
	$this->Text(22,50,'.................');
	$this->Text(113,50,'.................');
	$this->Text(173,50,'.................');
	$this->Text(27,60,$result->GRABO);
	$this->Text(110,60,$result->GRRH);
	$this->Text(177,60,"***");
	$this->Text(70,72,'......................................................................................................................');
	$this->Text(46,80,$result->POLYT);
	$this->Text(165,80,$result->DDT);
	$this->Text(47,88,$result->DRAI);
	$this->Text(128,88,$result->RESULTAT);
	$this->Text(90,96,$result->RTA);
	$this->Text(122,96,$result->TYPERTA);
	}
	$this->Output();
    }
	//*******************************************************************************************************************************//
	function entetecarte($IDDNR,$TYPECARTE)
    {
	//1ere page
	//face droite
	$this->AddPage('p','A5');
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->Image('../public/images/photos/LOGOAO.GIF',105,25,15,15,0);//image (url,x,y,hauteur,largeur,0)
	$this->SetFont('Arial','B',6);
	$this->RoundedRect(78, 1, 70, 100, 2, $style = '');
	$this->SetTextColor(225,0,0); 
	$this->Text(82,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE ");
	$this->Text(96,15,"AGENCE NATIONALE DU SANG");
	$this->Text(90,20,"AGENCE REGIONALE DU SANG ".$this->nbrtostring($this->db_name,"ars","IDARS",$this->REGION(),"WILAYAS"));
	$this->SetTextColor(0,0,0); 
	$this->Line(80 ,23 ,145 ,23 );
	$this->SetFont('Arial','B',14);
	$this->Text(104,48,"CARTE");
	$this->Text(88,53,$TYPECARTE);
	$this->SetFont('Arial','B',8);
	$this->Text(90,60,"Structure de Transfusion Sanguine:");
	$this->Text(90,65,$this->nbrtostring($this->db_name,"cts","IDCTS",$this->STRUCTURE(),"CTS"));
	$this->Text(90,70,"wilaya de  ".$this->nbrtostring($this->db_name,"wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->SetFont('Arial','B',7);
	$this->Text(80,84,"Numéro d'identification du receveur:");//
	$this->Text(80,98,"Delivrée le:");
	$this->SetFont('Arial','B',8);
	$this->SetTextColor(225,0,0);
	$this->Text(93,98,date('d/m/Y'));
	$this->SetTextColor(0,0,0);
	$this->Code39(80,85 , $IDDNR, $baseline=0.5, $height=5);
	}
	function ENTETECARTDNRPDF1($IDDNR)
    {
	//2ere page
	//face gauche
	$this->mysqlconnect();
	$this->AddPage('p','A5');
	$this->SetFont('Arial','B',10);//$this->Image('../IMAGES/grife.jpg',15,80,55,22,0);
	$this->RoundedRect(1, 1, 70, 100, 2, $style = '');
	$this->Text(4,10,"GROUPAGE:");
	$this->Text(7,20,"RHESUS:");
	$this->Text(6,30,"Phenotype:");
	$this->Line(1 ,50 ,71 ,50);
	$this->SetFillColor(255,246,143);
	$this->SetXY(3,52);
	$this->Cell(50+15,8,'Nom : ',0,1,1,'r');
	$this->SetXY(3,52+8);
	$this->Cell(50+15,8,'Prénom : ',0,1,1,'r');
	$this->SetXY(3,52+8+8);
	$this->Cell(50+15,8,'Date de naissance : ',0,1,1,'r');
	$this->SetXY(3,52+8+8+8);
	$this->Cell(50+15,8,'Carte établie le: ',0,1,1,'r');
	$this->SetFillColor(255,246,143);
	$this->Text(25,90,"le responsable:");
	$this->Text(30,95,"Dr TIBA");
	$filename='../public/images/photos/'.$IDDNR.'.jpg';//85,143
	if (file_exists($filename)) 
	{
	$this->Image('../public/images/photos/'.$IDDNR.'.jpg', $x='35', $y='6', $w=35, $h=40, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=1, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	} 
	else
	{
	$idpp='lb';
	$this->Image('../public/images/photos/'.$idpp.'.jpg', $x='35', $y='6', $w=35, $h=40, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=1, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	}
	$this->RoundedRect(35, 2, 35, 45, 2, $style = '');
	$query4 = "select * from REC WHERE  id = '$IDDNR'";
	$resultat4=mysql_query($query4);
	$row4 = mysql_fetch_array($resultat4);
	$this->SetTextColor(225,0,0);
	$this->SetFont('Arial','B',14);
	$this->Text(13,15,$row4['GRABO']);
	$this->Text(8,25,$row4['GRRH']);
	$this->SetFont('Arial','B',10);
	$this->Text(4,35,"C ... c ... E ... e ... ");
	// $this->Text(4,40,"Kell1 ... Kell2 ... ");
	// $this->Text(4,45,"Autres ... ");
	$this->SetTextColor(0,0,0);
	$this->Text(15,55+2,$row4['NOM']);
	$this->Text(20,60+5,$row4['PRENOM']);
	$this->Text(38,65+8,$row4['DATENAISSANCE']);
	$this->Text(31,65+8+8,date('d/m/Y'));
	}
	function CARTABORDNR($idon,$TYPECARTE)
    {
	$this->mysqlconnect();
	$query1 = "select * from rec WHERE  id = '$idon'";
	$resultat1=mysql_query($query1);
	$row = mysql_fetch_array($resultat1); 
	$IDDNR=$row['id'];//1ere page droite
	$this->entetecarte($IDDNR,$TYPECARTE);//1ere page gauche
	$this->RoundedRect(1, 1,70, 100 ,2, $style = '');
	
	$h=01;
	$this->SetXY(01,$h); 	  
	$this->cell(23,05,"Date",1,0,'C',0);
	$this->SetXY(01+23,$h); 	  
	$this->cell(24,05,"N°poche",1,0,'C',0);
	$this->SetXY(01+23+24,$h); 	  
	$this->cell(23,05,"TYPE PSL",1,0,'C',0);
	$this->SetXY(01,06); // marge sup 13
	$this->mysqlconnect();
	$query11 = "select * from dis WHERE  IDREC='$IDDNR' order by  id asc ";//    LIMIT 15, 30
	$resultat11=mysql_query($query11);
	$totalmbr11=mysql_num_rows($resultat11);
	while($row11=mysql_fetch_object($resultat11))
	  {
	   $this->cell(23,5,$this->dateUS2FR($row11->DATEDIS),1,0,'L',0);//5  =hauteur de la cellule origine =7
	   $this->cell(24,5,$row11->IDP,1,0,'C',0);
	   $this->cell(23,5,$row11->PSL,1,0,'C',0);
	   $this->SetXY(01,$this->GetY()+5); 
	  }
	for( $compteur = 0 ; $compteur < 19-$totalmbr11 ; $compteur++)
	  {
	   $this->cell(23,5,'',1,0,'L',0);
	   $this->cell(24,5,'',1,0,'C',0);
	   $this->cell(23,5,'',1,0,'C',0);
	   $this->SetXY(01,$this->GetY()+5); 
	  } 
	// $this->SetFont('Arial','B',8);
	// $this->Text(2,13,"Date");
	// $this->Line(15,8 ,15 ,101);
	// $this->Text(16,13,"NBR°/GR.RH");
	// $this->Line(34,8 ,34 ,101);
	// $this->Text(38,13,"RAI");
	// $this->Line(49,8 ,49 ,101);
	// $this->Text(50,13,"OBSERVATION");
	// $this->Text(5,6,"Transfusion De Sang Nbr De Flacon Et Groupe");
	// $this->Line(1 ,8 ,71 ,8 );
	// $this->Line(1 ,16 ,71 ,16 );
	// $this->Line(1 ,24 ,71 ,24 );
	// $this->Line(1 ,32 ,71 ,32);
	// $this->Line(1 ,40 ,71 ,40 );
	// $this->Line(1 ,48 ,71 ,48 );
	// $this->Line(1 ,56 ,71 ,56 );
	// $this->Line(1 ,64 ,71 ,64 );
	// $this->Line(1 ,72 ,71 ,72 );
	// $this->Line(1 ,80 ,71 ,80 );
	// $this->Line(1 ,88 ,71 ,88 );//2eme page face gauche
	$this->ENTETECARTDNRPDF1($IDDNR);//face droite
	$this->RoundedRect(78, 1,70, 100 ,2, $style = '');
	$this->SetFont('Arial','B',8);
	$this->Text(80,5,"1ERE détermination:");
	$this->Text(80,10,date('d/m/Y'));
	$this->Text(80,15,"Laboratoire :");
	$this->Text(80,20,"PTS Ain oussera");
	$this->Text(80,25,"GROUPAGE : "."".$row['GRABO']);
	$this->Text(80,30,"RHESUS : "."".$row['GRRH']);
	$this->Text(80,35,"Du : ");
	$this->Text(80,40,"D : ".$row['GRRH']);
	$this->Text(80,45,"C : ".$row['CRH2']);
	$this->Text(80,50,"E : ".$row['ERH3']);
	$this->Text(80,55,"c : ".$row['CRH4']);
	$this->Text(80,60,"e : ".$row['ERH5']);
	$this->Text(80,65,"K : ".$row['KELL1']);
	$this->Line(115,1 ,115 ,68);
	$this->Text(116,5,"2EME détermination:");
	$this->Text(116,10,"-------------------------------");
	$this->Text(116,15,"Laboratoire :");
	$this->Text(116,20,"-------------------------------");
	$this->Text(116,25,"GROUPAGE : ");
	$this->Text(116,30,"RHESUS : ");
	$this->Text(116,35,"Du : ");
	$this->Text(116,40,"D : ");
	$this->Text(116,45,"C : ");
	$this->Text(116,50,"E : ");
	$this->Text(116,55,"c : ");
	$this->Text(116,60,"e : ");
	$this->Text(116,65,"K : ");
	$this->Line(78 ,70 ,148 ,70);
	$this->SetFont('Arial','B',9);
	$this->Text(80,75,"les resultats figurant ci dessus ne doivent");
	$this->Text(80,80,"étre considerés comme définitifs qu'aprés");
	$this->Text(80,85,"une deuxième détermination effectuée sur");
	$this->Text(80,90,"un second prélèvement.");
	$this->Output();
	}
	//*******************************************************************************************************************************//
	
	
	
	
	
	
	
	
}	