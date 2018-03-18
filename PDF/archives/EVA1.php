<?php
require('../PDF/invoice.php');
class EVA extends PDF_Invoice
{   
	function connection()
	{
	  $db_host="localhost";
	  $db_name="gpts2012"; 
	  $db_user="root";
	  $db_pass="";
	  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	  $db  = mysql_select_db($db_name,$cnx) ;
	  return  $cnx;
	  return  $db;
	}

    function REGION()
    {
	// session_start() ;  initialiser dans fpdf
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
	$USER=$_SESSION["USER"];
	return $USER;
	}

    function nbrtostring($db_name,$tb_name,$colonename,$colonevalue,$resultatstring) 
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
    $row=mysql_fetch_object($result);
	$resultat=$row->$resultatstring;
	return $resultat;
	}
    function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."/".$M."/".$A ;
    return $dateUS2FR;//01/01/2013
    }
//*************************************************unite collecte********************************************************************//
function enteteeva($datejour1,$datejour2) 
{
	$this->AddPage('p','a4');
	$this->SetFont('Arial','B',10);
	//$this->Image('../IMAGES/logoao.gif',5,5,15,15,0);
	//$this->Text(70,5,'AGENCE REGIONALE DE :'.$this->nbrtostring("gpts2012","ars","IDARS",$this->REGION(),"WILAYAS"));
	$this->SetXY(5,5);
	$this->Cell(198,8,'FICHE D EVALUATION '.' DU '.$this->dateUS2FR($datejour1).' AU '.$this->dateUS2FR($datejour2),1,1,'C');
	$this->Text(20,13+5,'Wilaya de :'.$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(100,13+5,'Structure :'.$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS"));	              
	$this->Text(140,18+5,"Adresse:".$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS"));	$this->Text(20,18+5,"TEL:027/82/32/88");$this->Text(100,18+5,"FAX:027/82/21/37");		  
	$this->Text(20,18+10,"Responsable de la structure : Dr tiba ");	
}	
function collecte($colone1,$colone2,$datejour1,$datejour2)
{
  $SRS=$this->STRUCTURE();
  $sql = " select * from tdon where SRS='$SRS' and tdnr='$colone1'and str='$colone2'and datedon >='$datejour1'and datedon <='$datejour2' and IND='IND'";
  $requete = @mysql_query($sql,$this->connection()) or die($sql."<br>".mysql_error());
  $collecte=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $collecte;
}
function indication($ind,$datejour1,$datejour2)
{
  $SRS=$this->STRUCTURE();
  $sql = " select IND,datedon from tdon where SRS='$SRS' and ind ='$ind' and datedon >='$datejour1' and datedon <='$datejour2'";
  $requete = @mysql_query($sql, $this->connection()) or die($sql."<br>".mysql_error());
  $indication=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $indication;
}  	
function corpscollecte($datejour1,$datejour2) 
{
//****gauche****//
$this->SetXY(5,28);
$this->Cell(198,8,'__________________________________________UNITE COLLECTE__________________________________________',0,1,'C');
// $this->Rect(5, 38, 198, 42 ,"d");
$this->SetXY(10,43-5);
$this->Cell(55,8,'Nombre de dons ',1,1,'L');
$this->SetXY(10,51-5);
$this->Cell(55,8,'Dons réguliers',1,1,'L');
$this->SetXY(10,59-5);
$this->Cell(55,8,'Dons occasionnels et familiaux',1,1,'L');
$this->SetXY(10,67-5);
$this->Cell(55,8,'Total ',1,1,'L');
$this->SetXY(10,67+8-5);
$this->Cell(55,8,'Total général ',1,1,'L');
$this->SetXY(120,67+8-5);
$this->Cell(55,8,'Nombre de collectes mobiles ',1,1,'L');
$this->SetXY(65,43-5);
$this->Cell(15,8,'Fixe',1,1,'C');
$this->SetXY(80,43-5);
$this->Cell(15,8,'Mobile',1,1,'C');
$this->SetXY(95,43-5);
$this->Cell(20,8,'Aphérèse',1,1,'C');
$this->SetTextColor(225,0,0);
$this->SetXY(65,51-5);
$this->Cell(15,8,$this->collecte('regulier','fixe',$datejour1,$datejour2),1,1,'C');
$this->SetXY(80,51-5);
$this->Cell(15,8,$this->collecte('regulier','mobile',$datejour1,$datejour2),1,1,'C');
$this->SetXY(95,51-5);
$this->Cell(20,8,"00",1,1,'C');
$this->SetXY(65,59-5);
$this->Cell(15,8,$this->collecte('Occasionnel','fixe',$datejour1,$datejour2),1,1,'C');
$this->SetXY(80,59-5);
$this->Cell(15,8,$this->collecte('Occasionnel','mobile',$datejour1,$datejour2),1,1,'C');
$this->SetXY(95,59-5);
$this->Cell(20,8,"00",1,1,'C');
$this->SetXY(65,67-5);
$this->Cell(15,8,$this->collecte('regulier','fixe',$datejour1,$datejour2)+$this->collecte('Occasionnel','fixe',$datejour1,$datejour2),1,1,'C');
$this->SetXY(80,67-5);
$this->Cell(15,8,$this->collecte('regulier','mobile',$datejour1,$datejour2)+$this->collecte('Occasionnel','mobile',$datejour1,$datejour2),1,1,'C');
$this->SetXY(95,67-5);
$this->Cell(20,8,"00",1,1,'C');
$this->SetXY(65,67+8-5);
$this->Cell(50,8,$this->collecte('regulier','fixe',$datejour1,$datejour2)+$this->collecte('Occasionnel','fixe',$datejour1,$datejour2)+$this->collecte('regulier','mobile',$datejour1,$datejour2)+$this->collecte('Occasionnel','mobile',$datejour1,$datejour2),1,1,'C');
$this->SetXY(175,67+8-5);
$this->Cell(20,8,"02",1,1,'C');
$this->SetTextColor(0,0,0);
//*******droite*****//
// $this->SetXY(100,43);
// $this->Cell(55,8,'Donneur Aphérèse prélevé',1,1,'L');
// $this->SetXY(100,51);
// $this->Cell(100,8,'Nombre De Donneurs Contre Indiqués (CI)',1,1,'C');
// $this->SetXY(100,59);
// $this->Cell(55,5.3,'C.I.Temporaires',1,1,'L');
// $this->SetXY(100,64.3);
// $this->Cell(55,5.5,'C.I.Definitives',1,1,'L');
// $this->SetXY(100,69.8);
// $this->Cell(55,5.2,'Total',1,1,'L');
// $this->SetTextColor(225,0,0);
// $this->SetXY(155,43);
// $this->Cell(45,8,'00',1,1,'C');
// $this->SetXY(155,59);
// $this->Cell(45,5.3,$this->indication('CIDT',$datejour1,$datejour2),1,1,'C');
// $this->SetXY(155,64.3);
// $this->Cell(45,5.3,$this->indication('CIDD',$datejour1,$datejour2),1,1,'C');
// $this->SetXY(155,69.8);
// $this->Cell(45,5.2,$this->indication('CIDT',$datejour1,$datejour2)+$this->indication('CIDD',$datejour1,$datejour2),1,1,'C');
// $this->SetTextColor(0,0,0);
}			
//************************************************************unite preparation ********************************************//
function PREPARATION($colone,$datejour1,$datejour2)
{
  $SRS=$this->STRUCTURE();
  $sql = " select $colone,datedon from tdon where SRS='$SRS' and ind ='IND' and $colone='on'and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql, $this->connection()) or die($sql."<br>".mysql_error());
  $PREPARATION=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $PREPARATION;
}

function corpspreparation($datejour1,$datejour2)
{
$this->SetXY(5,80);
$this->Cell(198,8,'________________________________________UNITE PREPARATION________________________________________',0,1,'C');
// $this->Rect(5, 90, 198, 83 ,"d");
//***gauche***//
$this->SetXY(10,95-5);
$this->Cell(73,8,'Nombre de dons non conformes',1,1,'C');
$this->SetXY(10,103-5);
$this->Cell(58,8,'ST Quantité non suffisante',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(10+58,103-5);
$this->Cell(15,8,$this->PREPARATION('VI',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
$this->SetXY(10,111-5);
$this->Cell(58,8,'Poches non conformes',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(68,111-5);
$this->Cell(15,8,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
$this->SetXY(10,119-5);
$this->Cell(58,8,'Fuite défaut de soudure',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(68,119-5);
$this->Cell(15,8,$this->PREPARATION('FDS',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
$this->SetXY(10,127-5);
$this->Cell(58,8,'Aspect coagulé',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(68,127-5);
$this->Cell(15,8,$this->PREPARATION('AC',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
$this->SetXY(10,135-5);
$this->Cell(58,8,'CPA quantite insuffisante',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(68,135-5);
$this->Cell(15,8,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
$this->SetXY(10,143-5);
$this->Cell(58,8,'Fuite défaut de soudure',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(68,143-5);
$this->Cell(15,8,$this->PREPARATION('FDS',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
$this->SetXY(10,151-5);
$this->Cell(58,8,'Autres',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(68,151-5);
$this->Cell(15,8,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
$this->SetXY(10,159-5);
$this->Cell(58,8,'Total dons st validés pour pré',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(68,159-5);
$this->Cell(15,8,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
$this->SetXY(10,159-5+19);
$this->Cell(58+15,8,'NBR de poche ST destiné a la distribution ',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(68+17,159-5+19);
$this->Cell(40,8,$this->PREPARATION('CGR',$datejour1,$datejour2)+$this->PREPARATION('PFC',$datejour1,$datejour2)+$this->PREPARATION('CPS',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
//***centre***// 
$this->SetXY(85,95-5);
$this->Cell(40,8,'Nombre de PSL',1,1,'C');
$this->SetXY(85,103-5);
$this->Cell(40,8,'preparés conformes',1,1,'C');
$this->SetXY(85,111-5);
$this->Cell(20,8,'CGR FC',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(85+20,111-5);
$this->Cell(20,8,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);//
$this->SetXY(85,119-5);
$this->Cell(20,8,'CGR NFC',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(85+20,119-5);
$this->Cell(20,8,$this->PREPARATION('CGR',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);//
$this->SetXY(85,127-5);
$this->Cell(20,8,'PFC C',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(85+20,127-5);
$this->Cell(20,8,$this->PREPARATION('PFC',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);//
$this->SetXY(85,135-5);
$this->Cell(20,8,'CPS C ',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(85+20,135-5);
$this->Cell(20,8,$this->PREPARATION('CPS',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);//
$this->SetXY(85,143-5);
$this->Cell(20,8,'CUP F',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(85+20,143-5);
$this->Cell(20,8,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);//NON FAITE par le pts 
$this->SetXY(85,151-5);
$this->Cell(20,8,'CRYO C',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(85+20,151-5);
$this->Cell(20,8,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);//???
$this->SetXY(85,159-5);
$this->Cell(20,8,'Total PSL C',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(85+20,159-5);
$this->Cell(20,8,$this->PREPARATION('CGR',$datejour1,$datejour2)+$this->PREPARATION('PFC',$datejour1,$datejour2)+$this->PREPARATION('CPS',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);



//***droite***//
$this->SetXY(127,95-5);
$this->Cell(73,8,'Nombre de PSL',1,1,'C');
$this->SetXY(127,95+8-5);
$this->Cell(73,8,'preparés non conformes',1,1,'C');
//***************// probleme incomprehenssion ??? C EST POUR CA QUE J AI MIS DES NULL DANS LES FONCTION POUR AVOIR UN RESULTAT ZERO 
$this->SetXY(127,95+16-5);
$this->Cell(15,18.5,'CGR',1,1,'C');
$this->SetXY(127+15,95+16-5);
$this->Cell(48,6,'Fuite défaut de soudure',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(127+63,95+16-5);
$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);//???
$this->SetXY(127+15,95+22-5);
$this->Cell(48,6,'Aspect coagulé',1,1,'L');
$this->SetXY(127+63,95+22-5);$this->SetTextColor(225,0,0);
$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');//???
$this->SetTextColor(0,0,0);
$this->SetXY(127+15,95+28-5);
$this->Cell(48,6.5,'Autres',1,1,'L');
$this->SetXY(127+63,95+28-5);$this->SetTextColor(225,0,0);
$this->Cell(10,6.5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');//???	
$this->SetTextColor(0,0,0);


//***************//
$this->SetXY(127,113.5+16-5);
$this->Cell(15,18.5+19.5,'PFC',1,1,'C');
$this->SetXY(127+15,113.5+16-5);
$this->Cell(48,6,'Fuite défaut de soudure',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(127+63,113.5+16-5);
$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
$this->SetXY(127+15,113.5+22-5);
$this->Cell(48,6,'Quantite non suffisante',1,1,'L');
$this->SetXY(127+63,113.5+22-5);$this->SetTextColor(225,0,0);
$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');//???
$this->SetXY(127+15,113.5+28-5);$this->SetTextColor(0,0,0);
$this->Cell(48,6.5,'Aspect lipemique',1,1,'L');
$this->SetXY(127+63,113.5+28-5);$this->SetTextColor(225,0,0);
$this->Cell(10,6.5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');//???	
$this->SetXY(127+15,113.5+28+6.5-5);$this->SetTextColor(0,0,0);
$this->Cell(48,6.5,'Aspect hematique',1,1,'L');
$this->SetXY(127+63,113.5+28+6.5-5);$this->SetTextColor(225,0,0);
$this->Cell(10,6.5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');//???	
$this->SetXY(127+15,113.5+28+13-5);$this->SetTextColor(0,0,0);
$this->Cell(48,6.5,'Aspect icterique',1,1,'L');
$this->SetXY(127+63,113.5+28+13-5);$this->SetTextColor(225,0,0);
$this->Cell(10,6.5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');//???	
$this->SetXY(127+15,113.5+28+19.5-5);$this->SetTextColor(0,0,0);
$this->Cell(48,6.5,'Autres',1,1,'L');
$this->SetXY(127+63,113.5+28+19.5-5);$this->SetTextColor(225,0,0);
$this->Cell(10,6.5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');//???	
$this->SetTextColor(0,0,0);
//***************//
$this->SetXY(127,132+16+14.5);
$this->Cell(15,18.5,'CPS',1,1,'C');
$this->SetXY(127+15,132+16+14.5);
$this->Cell(48,6,'Fuite defaut de soudure',1,1,'L');$this->SetTextColor(225,0,0);
$this->SetXY(127+63,132+16+14.5);
$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);//???
$this->SetXY(127+15,132+22+14.5);
$this->Cell(48,6,'Contaminés par GR',1,1,'L');
$this->SetXY(127+63,132+22+14.5);$this->SetTextColor(225,0,0);
$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');//???
$this->SetXY(127+15,132+28+14.5);$this->SetTextColor(0,0,0);
$this->Cell(48,6.5,'Autres',1,1,'L');
$this->SetXY(127+63,132+28+14.5);$this->SetTextColor(225,0,0);
$this->Cell(10,6.5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');//???	
$this->SetTextColor(0,0,0);
}
//********************************************UNITE QUALIFICATIONS BIOLOGIQUES*********************************** 
function qualification($colone,$datejour1,$datejour2)
{
  $SRS=$this->STRUCTURE();
  $sql = " select $colone,datedon from tdon where SRS='$SRS' and ind ='IND' and $colone!=''and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql,$this->connection()) or die($sql."<br>".mysql_error());
  $qualification=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $qualification;
}
function qualificationdp($colone,$dp,$datejour1,$datejour2)
{
  $SRS=$this->STRUCTURE();
  $sql = " select $colone,datedon from tdon where SRS='$SRS' and ind ='IND' and $colone='$dp'and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql,$this->connection()) or die($sql."<br>".mysql_error());
  $qualificationdp=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $qualificationdp;
}
function immunologie($datejour1,$datejour2)
{
  $SRS=$this->STRUCTURE();
  $sql = " select GROUPAGE,datedon from tdon where SRS='$SRS' and ind ='IND' and GROUPAGE!=''and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql,$this->connection()) or die($sql."<br>".mysql_error());
  $immunologie=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $immunologie;
}
function Immuno($datejour1,$datejour2)
{
$this->SetXY(5,180);
$this->Cell(198,8,'________________________________UNITE QUALIFICATIONS BIOLOGIQUES________________________________',0,1,'C');
$this->Rect(5, 190, 198, 65 ,"d");
$this->SetXY(10,195);
$this->Cell(80,8,'Immuno-hematologie',1,1,'C');
$this->SetXY(10,203);
$this->Cell(25,16,'Groupage',1,1,'C');
$this->SetXY(35,203);
$this->Cell(35,16,'02 épreuves',1,1,'C');
$this->SetXY(70,203);
$this->Cell(10,8,'oui',1,1,'C');
$this->SetXY(70,211);
$this->Cell(10,8,'non',1,1,'C');
$this->SetXY(80,203);$this->SetTextColor(225,0,0);
$this->Cell(10,8,'X',1,1,'C');$this->SetTextColor(0,0,0);
$this->SetXY(80,211);$this->SetTextColor(225,0,0);
$this->Cell(10,8,'-',1,1,'C');$this->SetTextColor(0,0,0);
$this->SetXY(10,219);
$this->Cell(25,30,'Phenotypage',1,1,'C');
$this->SetXY(35,219);
$this->Cell(45,10,'dons phénotypés',1,1,'C');
$this->SetXY(80,219);$this->SetTextColor(225,0,0);
$this->Cell(10,10,'00',1,1,'C');$this->SetTextColor(0,0,0);
$this->SetXY(35,229);
$this->Cell(45,10,'Receveurs phénotypés',1,1,'C');
$this->SetXY(80,229);$this->SetTextColor(225,0,0);
$this->Cell(10,10,'00',1,1,'C');$this->SetTextColor(0,0,0);
$this->SetXY(35,239);
$this->Cell(45,10,'Epreuves de compatibilité',1,1,'C');
$this->SetXY(80,239);$this->SetTextColor(225,0,0);
$this->Cell(10,10,$this->immunologie($datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
}
function enteteserologie($datejour1,$datejour2)
{
$this->SetXY(107,195);
$this->Cell(92,5,'serologie',1,1,'C');
$this->SetXY(107,200);
$this->Cell(92,5,'Nombre de tests',1,1,'C');
$this->SetXY(107,205);
$this->Cell(92,5,'(procedures et algorithme de depistage)',1,1,'C');
$this->SetXY(92,195);
$this->Cell(15,21.5,'',1,1,'C');
$this->SetXY(107,210);
$this->Cell(17,6.5,'sérotypés',1,1,'C');
$this->SetXY(124,210);
$this->Cell(21,6.5,'depiste(+)/D',1,1,'C');
$this->SetXY(145,210);
$this->Cell(21,6.5,'controles(+)',1,1,'C');
$this->SetXY(166,210);
$this->Cell(21,6.5,'confirmes(+)',1,1,'C');
$this->SetXY(187,210);
$this->Cell(12,6.5,'lieu',1,1,'C');
$this->SetXY(92,216.5);
$this->Cell(15,6.5,'HIV',1,1,'C');
$this->SetXY(107,216.5);$this->SetTextColor(225,0,0);
$this->Cell(17,6.5,$this->qualification('HIV',$datejour1,$datejour2),1,1,'C');
$this->SetXY(124,216.5);
$this->Cell(21,6.5,$this->qualificationdp('HIV','douteux',$datejour1,$datejour2),1,1,'C');
$this->SetXY(145,216.5);
$this->Cell(21,6.5,$this->qualificationdp('HIV','douteux',$datejour1,$datejour2),1,1,'C');
$this->SetXY(166,216.5);
$this->Cell(21,6.5,$this->qualificationdp('HIV','Positif',$datejour1,$datejour2),1,1,'C');
$this->SetXY(187,216.5);
$this->Cell(12,6.5,'IPA',1,1,'C'); $this->SetTextColor(0,0,0);
$this->SetXY(92,223);
$this->Cell(15,6.5,'HBS',1,1,'C');
$this->SetXY(107,223);$this->SetTextColor(225,0,0);
$this->Cell(17,6.5,$this->qualification('HVB',$datejour1,$datejour2),1,1,'C');
$this->SetXY(124,223);
$this->Cell(21,6.5,$this->qualificationdp('HVB','douteux',$datejour1,$datejour2),1,1,'C');
$this->SetXY(145,223);
$this->Cell(21,6.5,$this->qualificationdp('HVB','douteux',$datejour1,$datejour2),1,1,'C');
$this->SetXY(166,223);
$this->Cell(21,6.5,$this->qualificationdp('HVB','Positif',$datejour1,$datejour2),1,1,'C');
$this->SetXY(187,223);
$this->Cell(12,6.5,'IPA',1,1,'C'); $this->SetTextColor(0,0,0);
$this->SetXY(92,229.5);
$this->Cell(15,6.5,'HCV',1,1,'C');
$this->SetXY(107,229.5);$this->SetTextColor(225,0,0);
$this->Cell(17,6.5,$this->qualification('HVC',$datejour1,$datejour2),1,1,'C');
$this->SetXY(124,229.5);
$this->Cell(21,6.5,$this->qualificationdp('HVC','douteux',$datejour1,$datejour2),1,1,'C');
$this->SetXY(145,229.5);
$this->Cell(21,6.5,$this->qualificationdp('HVC','douteux',$datejour1,$datejour2),1,1,'C');
$this->SetXY(166,229.5);
$this->Cell(21,6.5,$this->qualificationdp('HVC','Positif',$datejour1,$datejour2),1,1,'C');
$this->SetXY(187,229.5);
$this->Cell(12,6.5,'IPA',1,1,'C'); $this->SetTextColor(0,0,0);
$this->SetXY(92,236);
$this->Cell(15,6.5,'SYPH',1,1,'C');
$this->SetXY(107,236);$this->SetTextColor(225,0,0);
$this->Cell(17,6.5,$this->qualification('TPHA',$datejour1,$datejour2),1,1,'C');
$this->SetXY(124,236);
$this->Cell(21,6.5,$this->qualificationdp('TPHA','douteux',$datejour1,$datejour2),1,1,'C');
$this->SetXY(145,236);
$this->Cell(21,6.5,$this->qualificationdp('TPHA','douteux',$datejour1,$datejour2),1,1,'C');
$this->SetXY(166,236);
$this->Cell(21,6.5,$this->qualificationdp('TPHA','Positif',$datejour1,$datejour2),1,1,'C');
$this->SetXY(187,236);
$this->Cell(12,6.5,'IPA',1,1,'C'); $this->SetTextColor(0,0,0);
$this->SetXY(92,242.5);
$this->Cell(15,6.5,'PALU',1,1,'C');
$this->SetXY(107,242.5);$this->SetTextColor(225,0,0);
$this->Cell(17,6.5,$this->qualification('NULL',$datejour1,$datejour2),1,1,'C');
$this->SetXY(124,242.5);
$this->Cell(21,6.5,$this->qualificationdp('NULL','douteux',$datejour1,$datejour2),1,1,'C');
$this->SetXY(145,242.5);
$this->Cell(21,6.5,$this->qualificationdp('NULL','douteux',$datejour1,$datejour2),1,1,'C');
$this->SetXY(166,242.5);
$this->Cell(21,6.5,$this->qualificationdp('NULL','Positif',$datejour1,$datejour2),1,1,'C');
$this->SetXY(187,242.5);
$this->Cell(12,6.5,'IPA',1,1,'C'); $this->SetTextColor(0,0,0);
}
//********************************************UNITE DISTRIBUTION***********************************
//******HAUT******//
function psl($h,$x,$ST,$CGR,$PFC,$CP,$CPA,$CRYO)
{
$this->SetXY(10,$h);
$this->Cell(94,8,$x,1,1,'L');
$this->SetXY(104,$h);$this->SetTextColor(225,0,0);
$this->Cell(15.5,8,$ST,1,1,'C');
$this->SetXY(119.5,$h);
$this->Cell(15.5,8,$CGR,1,1,'C');
$this->SetXY(135,$h);
$this->Cell(15.5,8,$PFC,1,1,'C');
$this->SetXY(150.5,$h);
$this->Cell(15.5,8,$CP,1,1,'C');
$this->SetXY(166,$h);
$this->Cell(15.5,8,$CPA,1,1,'C'); 
$this->SetXY(181.5,$h);
$this->Cell(18,8,$CRYO,1,1,'C');$this->SetTextColor(0,0,0);
}
function corpsdistribution1()
{
$this->SetXY(5,28);
$this->Cell(198,8,'__________________________________________UNITE DISTRIBUTION__________________________________________',0,1,'C'); 
$this->Rect(5, 38, 198, 220 ,"d");
$this->SetXY(10,40);
$this->Cell(94,8,'------------------------------------------------------------------------------',1,1,'L');
$this->SetXY(104,40);
$this->Cell(15.5,8,'ST',1,1,'C');
$this->SetXY(119.5,40);
$this->Cell(15.5,8,'CGR',1,1,'C');
$this->SetXY(135,40);
$this->Cell(15.5,8,'PFC',1,1,'C');
$this->SetXY(150.5,40);
$this->Cell(15.5,8,'CP',1,1,'C');
$this->SetXY(166,40);
$this->Cell(15.5,8,'CPA',1,1,'C'); 
$this->SetXY(181.5,40);
$this->Cell(18,8,'CRYO',1,1,'C');
$this->psl(40+8,'PSL qualifiés et étiquetés','0','0','0','0','0','0');
$this->psl(40+16,'Stock Debut d Annee','0','35','51','0','0','0');
$this->psl(40+24,'Stock fin d Annee','0','0','0','0','0','0');
$this->psl(40+32,'produit périmés durant l\'année écoulée','0','0','0','0','0','0');
}
//******GAUCHE******//
function distribution($service,$PSL,$datejour1,$datejour2)
{
  $SRS=$this->STRUCTURE();
  $sql= "select service,PSL from tdis1 where SRS='$SRS' and PSL='$PSL' and service ='$service' and condate >='$datejour1' and condate <='$datejour2'";
  $requete = @mysql_query($sql,$this->connection()) or die($sql."<br>".mysql_error());
  $distribution=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $distribution;
}
function distributionpsl($PSL,$datejour1,$datejour2)
{
  $SRS=$this->STRUCTURE();
  $sql= "select PSL from tdis1 where SRS='$SRS' and PSL='$PSL' and condate >='$datejour1' and condate <='$datejour2'";
  $requete = @mysql_query($sql,$this->connection()) or die($sql."<br>".mysql_error());
  $distribution=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $distribution;
}
function lignedistributionim($h,$Service,$ST,$CGR,$PFC,$CP,$CPA,$CRYO)
{
$this->SetXY(10,$h);
$this->Cell(20,8,$Service,1,1,'C');
$this->SetXY(30,$h);$this->SetTextColor(225,0,0);
$this->Cell(12,8,$ST,1,1,'C');
$this->SetXY(42,$h);
$this->Cell(12,8,$CGR,1,1,'C');
$this->SetXY(54,$h);
$this->Cell(12,8,$PFC,1,1,'C');
$this->SetXY(66,$h);
$this->Cell(12,8,$CP,1,1,'C');
$this->SetXY(78,$h);
$this->Cell(12,8,$CPA,1,1,'C'); 
$this->SetXY(90,$h);
$this->Cell(14,8,$CRYO,1,1,'C');$this->SetTextColor(0,0,0);
}
function corpsdistribution2($datejour1,$datejour2)
{
$this->SetXY(10,82+115);
$this->Cell(94,8,'DISTRIBUTION INTRA MUROS',1,1,'C'); 
$this->SetXY(10,90+115);
$this->Cell(20,8,'',1,1,'C');
$this->SetXY(30,90+115);
$this->Cell(12,8,'ST',1,1,'C');
$this->SetXY(42,90+115);
$this->Cell(12,8,'CGR',1,1,'C');
$this->SetXY(54,90+115);
$this->Cell(12,8,'PFC',1,1,'C');
$this->SetXY(66,90+115);
$this->Cell(12,8,'CP',1,1,'C');
$this->SetXY(78,90+115);
$this->Cell(12,8,'CPA',1,1,'C'); 
$this->SetXY(90,90+115);
$this->Cell(14,8,'CRYO',1,1,'C'); 
$this->lignedistributionim(162+51,'Total',$this->distributionpsl('ST',$datejour1,$datejour2),$this->distributionpsl('CGR',$datejour1,$datejour2),$this->distributionpsl('PFC',$datejour1,$datejour2),$this->distributionpsl('CPS',$datejour1,$datejour2),'0','0');
}




//******DROITE******//
function lignedistributionem1($h,$Service,$ST,$CGR,$PFC,$CP,$CPA,$CRYO)
{
$this->SetXY(106,$h);
$this->Cell(20,8,$Service,1,1,'C');
$this->SetXY(126,$h);
$this->Cell(12,8,$ST,1,1,'C');
$this->SetXY(138,$h);
$this->Cell(12,8,$CGR,1,1,'C');
$this->SetXY(150,$h);
$this->Cell(12,8,$PFC,1,1,'C');
$this->SetXY(162,$h);
$this->Cell(12,8,$CP,1,1,'C');
$this->SetXY(174,$h);
$this->Cell(12,8,$CPA,1,1,'C'); 
$this->SetXY(186,$h);
$this->Cell(14,8,$CRYO,1,1,'C');
}
function corpsdistribution3()
{
$this->SetXY(10,82+115+30);
$this->Cell(94,8,'DISTRIBUTION EXTRA MUROS',1,1,'C'); 
$this->SetXY(10,90+115+30);
$this->Cell(20,8,'',1,1,'C');
$this->SetXY(30,90+115+30);
$this->Cell(12,8,'ST',1,1,'C');
$this->SetXY(42,90+115+30);
$this->Cell(12,8,'CGR',1,1,'C');
$this->SetXY(54,90+115+30);
$this->Cell(12,8,'PFC',1,1,'C');
$this->SetXY(66,90+115+30);
$this->Cell(12,8,'CP',1,1,'C');
$this->SetXY(78,90+115+30);
$this->Cell(12,8,'CPA',1,1,'C'); 
$this->SetXY(90,90+115+30);
$this->Cell(14,8,'CRYO',1,1,'C'); 
$this->SetXY(10,90+115+30+8);
$this->Cell(20,8,'E/Public',1,1,'C');
$this->SetXY(30,90+115+30+8);
$this->Cell(12,8,'00',1,1,'C');
$this->SetXY(42,90+115+30+8);
$this->Cell(12,8,'00',1,1,'C');
$this->SetXY(54,90+115+30+8);
$this->Cell(12,8,'00',1,1,'C');
$this->SetXY(66,90+115+30+8);
$this->Cell(12,8,'00',1,1,'C');
$this->SetXY(78,90+115+30+8);
$this->Cell(12,8,'00',1,1,'C'); 
$this->SetXY(90,90+115+30+8);
$this->Cell(14,8,'00',1,1,'C'); 
$this->SetXY(10,90+115+30+16);
$this->Cell(20,8,'E/Privés',1,1,'C');
$this->SetXY(30,90+115+30+16);
$this->Cell(12,8,'00',1,1,'C');
$this->SetXY(42,90+115+30+16);
$this->Cell(12,8,'00',1,1,'C');
$this->SetXY(54,90+115+30+16);
$this->Cell(12,8,'00',1,1,'C');
$this->SetXY(66,90+115+30+16);
$this->Cell(12,8,'00',1,1,'C');
$this->SetXY(78,90+115+30+16);
$this->Cell(12,8,'00',1,1,'C'); 
$this->SetXY(90,90+115+30+16);
$this->Cell(14,8,'00',1,1,'C');  

}
function PPDNS()
{
$this->SetXY(110,82+115+40);
$this->Cell(65,8,'produits périmés',1,1,'L'); 
$this->SetXY(110+65,82+115+40);
$this->Cell(20,8,'00',1,1,'C'); 
$this->SetXY(110,82+115+40+8);
$this->Cell(65,8,'nbr de demande de psl non satisfaites',1,1,'L'); 
$this->SetXY(110+65,82+115+40+8);
$this->Cell(20,8,'00',1,1,'C'); 
}

//******BAS******//
function incidenttrans($h)
{
$this->SetXY(10,$h-8);
$this->Cell(94,8,'incidents transfusionnels',1,1,'C');
$this->SetXY(10,194);
$this->Cell(20,32,'NOMBRE',1,1,'C');
$this->SetXY(30,194);
$this->Cell(74,8,'',1,1,'C');
$this->SetXY(30,202);
$this->Cell(74,8,'',1,1,'C');
$this->SetXY(30,210);
$this->Cell(74,8,'',1,1,'C');
$this->SetXY(30,218);
$this->Cell(74,8,'',1,1,'C');
$this->SetXY(10,226);
$this->Cell(20,24,'TYPES ',1,1,'C');
$this->SetXY(30,226);
$this->Cell(74,8,'',1,1,'C');
$this->SetXY(30,234);
$this->Cell(74,8,'',1,1,'C');
$this->SetXY(30,242);
$this->Cell(74,8,'',1,1,'C');
}
function corpsdistribution4()
{

$this->Text(5,270," le responsable de la structure  ");
$this->Text(8,275," de transfusion sanguine");
$this->Text(18,280," DR ".$this->USER());
$this->Text(140,270," Le Directeur de l'etablissement ");
}






function lignedistributionimfin($h,$Servicet,$service,$datejour1,$datejour2)
{
$this->SetXY(10,$h);
$this->Cell(20,8,$Servicet,1,1,'C');
$this->SetXY(30,$h);
$this->Cell(12,8,$this->distribution($service,'ST',$datejour1,$datejour2),1,1,'C');
$this->SetXY(42,$h);
$this->Cell(12,8,$this->distribution($service,'CGR',$datejour1,$datejour2),1,1,'C');
$this->SetXY(54,$h);
$this->Cell(12,8,$this->distribution($service,'PFC',$datejour1,$datejour2),1,1,'C');
$this->SetXY(66,$h);
$this->Cell(12,8,$this->distribution($service,'CPS',$datejour1,$datejour2),1,1,'C');
$this->SetXY(78,$h);
$this->Cell(12,8,$this->distribution($service,'CPA',$datejour1,$datejour2),1,1,'C'); 
$this->SetXY(90,$h);
$this->Cell(14,8,$this->distribution($service,'CRYO',$datejour1,$datejour2),1,1,'C');
}
function lignedistributionimtotal($h,$Servicet,$datejour1,$datejour2)
{
$this->SetXY(10,$h);
$this->Cell(20,8,$Servicet,1,1,'C');
$this->SetXY(30,$h);
$this->Cell(12,8,$this->distributionpsl('ST',$datejour1,$datejour2),1,1,'C');
$this->SetXY(42,$h);
$this->Cell(12,8,$this->distributionpsl('CGR',$datejour1,$datejour2),1,1,'C');
$this->SetXY(54,$h);
$this->Cell(12,8,$this->distributionpsl('PFC',$datejour1,$datejour2),1,1,'C');
$this->SetXY(66,$h);
$this->Cell(12,8,$this->distributionpsl('CPS',$datejour1,$datejour2),1,1,'C');
$this->SetXY(78,$h);
$this->Cell(12,8,$this->distributionpsl('CPA',$datejour1,$datejour2),1,1,'C'); 
$this->SetXY(90,$h);
$this->Cell(14,8,$this->distributionpsl('CRYO',$datejour1,$datejour2),1,1,'C');
}
function disa($datejour1,$datejour2)
{
$this->entetedistributionim(90);
$this->lignedistributionim(90,'Service','ST','CGR','PFC','CP','CPA','CRYO');
$this->lignedistributionimfin(98,'CHIR H','CHIRURGIE HOMME',$datejour1,$datejour2);
$this->lignedistributionimfin(106,'CHIR F','CHIRURGIE FEMME',$datejour1,$datejour2);
$this->lignedistributionimfin(114,'GYNECO','GYNECO',$datejour1,$datejour2);
$this->lignedistributionimfin(122,'MATE','MATERNITE',$datejour1,$datejour2);
$this->lignedistributionimfin(130,'PEDI','PEDIATRIE',$datejour1,$datejour2);
$this->lignedistributionimfin(138,'MEDE H','MEDECINE HOMME',$datejour1,$datejour2);
$this->lignedistributionimfin(146,'MEDE F','MEDECINE FEMME',$datejour1,$datejour2);
$this->lignedistributionimfin(154,'UMC','UMC',$datejour1,$datejour2);
$this->lignedistributionimfin(162,'BLOC A','BLOC OPP A',$datejour1,$datejour2);
$this->lignedistributionimfin(170,'BLOC B','BLOC OPP B',$datejour1,$datejour2);
$this->lignedistributionimfin(178,'HEMOD','HEMODIALYSE',$datejour1,$datejour2);
$this->lignedistributionimfin(186,'PTS','PTS',$datejour1,$datejour2);
$this->lignedistributionimtotal(194,'Total',$datejour1,$datejour2);
}

	
}	