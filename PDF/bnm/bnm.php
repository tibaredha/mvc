<?php
require('../invoice.php');
class bnm extends PDF_Invoice
{
	 public $nomprenom ="tibaredha";
	 public $db_host="localhost";
	 public $db_name="mvc";  
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
	return $resultat2='-------';
	}

	function entete($datejour1,$datejour2) 
    {
	$this->mysqlconnect();
	$this->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
	$this->SetTitle('Service  Hemodialyse '."Du ".$datejour1." Au ".$datejour2);$this->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
	$this->SetTextColor(0,0,255);//text noire
	$this->SetFont('Times', 'B', 11);$this->AliasNbPages();//prise encharge du nbr de page // $this->SetMargins(0,0,0);
	$this->AddPage();
	$this->Text(60,10,utf8_decode("REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE"));
	$this->Text(30,15,utf8_decode("MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE"));
	$this->Text(70,20,utf8_decode("DIRECTION DE LA SANTÉ WILAYA DE DJELFA"));
	$this->Text(5,25,utf8_decode("CANEVAS I"));
	$this->Text(5,30,utf8_decode("ETABLISSEMENT PUBLIC HOSPITALIER  D'AIN - OUSSERA"));
	$this->Text(5,35,utf8_decode("SERVICE: HEMODIALYSE"));$this->Text(130,35,utf8_decode("AIN OUSSERA LE :".date("j-m-Y")));
	$this->Text(5,40,utf8_decode("N°.........../".date("Y")));
	$this->SetXY(5,45);$this->Cell(200,5,utf8_decode("Activite D'hemodialyse Arretee Du ".$datejour1." Au ".$datejour1),0,1,'C');
	 }
	
	function entete1($datejour1,$datejour2) 
    {
	$this->mysqlconnect();
	$this->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
	$this->SetTitle('Facture '."Du ".$datejour1." Au ".$datejour2);$this->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
	$this->SetTextColor(0,0,255);//text noire
	$this->SetFont('Times', 'B', 12);$this->AliasNbPages();//prise encharge du nbr de page // $this->SetMargins(0,0,0);
	$this->AddPage();
	$this->SetXY(5,10);$this->Cell(200,5,utf8_decode("CLINIQUE D HEMODIALYSE NEPHRODIALE"),0,1,'C');
	$this->SetXY(5,15);$this->Cell(200,5,utf8_decode("DR M.DAOUD NEPHROLOGUE"),0,1,'C');
	$this->SetXY(5,20);$this->Cell(200,5,utf8_decode("ALGER : ".date("j-m-Y")),0,1,'R');
	$this->SetXY(5,25);$this->Cell(200,5,utf8_decode("FACTURE N ° "),0,1,'C');
	
	
	
	
	// $this->Text(5,35,utf8_decode("SERVICE: HEMODIALYSE"));$this->Text(130,35,utf8_decode("AIN OUSSERA LE :".date("j-m-Y")));
	// $this->Text(5,40,utf8_decode("N°.........../".date("Y")));
	// $this->SetXY(5,45);$this->Cell(200,5,utf8_decode("Activite D'hemodialyse Arretee Du ".$datejour1." Au ".$datejour1),0,1,'C');
	 }
	
	
	function ordonnace($nom,$prenom,$age,$adresse)
    {
	$dateeuro=date('d-m-Y');
	$this->SetFont('Arial','B',10);
	$this->SetTextColor(0,0,255);
	$this->SetXY(5,5);$this->Cell(140,5,"CLINIQUE DE NEPHROLOGIE ET D HEMODIALYSE",0,1,'C');
	$this->SetXY(5,10);$this->Cell(140,5,"NEPHRODIALE",0,1,'C');		
	
	$this->SetXY(5,20);$this->Cell(70,5,"Dr DAOUD Malik",0,1,'C');            $this->SetXY(75,20);$this->Cell(70,5,"Alger : ",0,1,'L');	
	$this->SetXY(5,25);$this->Cell(70,5,"Spécialiste en Néphrologie",0,1,'C');$this->SetXY(75,25);$this->Cell(70,5,"Nom : ",0,1,'L');	
	$this->SetXY(5,30);$this->Cell(70,5,"Maladie des Reins",0,1,'C');         $this->SetXY(75,30);$this->Cell(70,5,"Prenom : ",0,1,'L');	
	$this->SetXY(5,35);$this->Cell(70,5,"Hypertenssion Artèrielle",0,1,'C');  $this->SetXY(75,35);$this->Cell(70,5,"Age : ",0,1,'L');	
	$this->SetXY(5,40);$this->Cell(70,5,"Insuffisance Rénale",0,1,'C');       $this->SetXY(75,40);$this->Cell(70,5,"Adresse : ",0,1,'L');	
	$this->SetXY(5,45);$this->Cell(70,5,"Rein du Diabétique ",0,1,'C');       $this->SetXY(75,45);$this->Cell(70,5,"N° : ".time(),0,1,'L');		
	$this->SetTextColor(255,0,0);
	$this->SetXY(88,20);$this->Cell(70,5,date ('d-m-Y'),0,1,'L');	
	$this->SetXY(88,25);$this->Cell(70,5,$nom,0,1,'L');	
	$this->SetXY(92,30);$this->Cell(70,5,$prenom,0,1,'L');
	$this->SetXY(85,35);$this->Cell(70,5,$age.' Ans',0,1,'L');
	$this->SetXY(92,40);$this->Cell(70,5,$adresse,0,1,'L');
	$this->SetTextColor(0,0,255);
	$this->SetFont('Arial','B',20);
	$this->SetXY(10,54);$this->cell(130,10,"ORDONNANCE",0,0,'C',0);
	$this->SetXY(5,65);
	$this->SetFont('Arial','B',10);
	$this->SetTextColor(0,0,255);$this->Text(100,175+10,"Le Médecin");$this->SetTextColor(0,0,0);
	$this->Text(100,180+10,"Dr DAOUD Malik");
	$this->SetTextColor(0,0,255);
	
	$this->Text(5,195,"_______________________________________________________________________");
	$this->Text(30,200,"170 Rue Sfindja ex La Perlier Telemly - Alger Centre-");
	$this->Text(38,205,"Tel : 00231 21 73 47 10  Mob : 0661 55 15 83");
	
	$this->SetTextColor(0,0,0);
	}	
	
	function biopha($nom,$prenom,$age,$adresse)
    {
	$dateeuro=date('d-m-Y');
	$this->SetFont('Arial','B',10);
	$this->SetTextColor(0,0,255);
	$this->SetXY(5,5);$this->Cell(140,5,"CLINIQUE DE NEPHROLOGIE ET D HEMODIALYSE",0,1,'C');
	$this->SetXY(5,10);$this->Cell(140,5,"NEPHRODIALE",0,1,'C');		
	
	$this->SetXY(5,20);$this->Cell(70,5,"Dr DAOUD Malik",0,1,'C');            $this->SetXY(75,20);$this->Cell(70,5,"Alger : ",0,1,'L');	
	$this->SetXY(5,25);$this->Cell(70,5,"Spécialiste en Néphrologie",0,1,'C');$this->SetXY(75,25);$this->Cell(70,5,"Nom : ",0,1,'L');	
	$this->SetXY(5,30);$this->Cell(70,5,"Maladie des Reins",0,1,'C');         $this->SetXY(75,30);$this->Cell(70,5,"Prenom : ",0,1,'L');	
	$this->SetXY(5,35);$this->Cell(70,5,"Hypertenssion Artèrielle",0,1,'C');  $this->SetXY(75,35);$this->Cell(70,5,"Age : ",0,1,'L');	
	$this->SetXY(5,40);$this->Cell(70,5,"Insuffisance Rénale",0,1,'C');       $this->SetXY(75,40);$this->Cell(70,5,"Adresse : ",0,1,'L');	
	$this->SetXY(5,45);$this->Cell(70,5,"Rein du Diabétique ",0,1,'C');       $this->SetXY(75,45);$this->Cell(70,5,"N° : ".time(),0,1,'L');		
	$this->SetTextColor(255,0,0);
	$this->SetXY(88,20);$this->Cell(70,5,date ('d-m-Y'),0,1,'L');	
	$this->SetXY(88,25);$this->Cell(70,5,$nom,0,1,'L');	
	$this->SetXY(92,30);$this->Cell(70,5,$prenom,0,1,'L');
	$this->SetXY(85,35);$this->Cell(70,5,$age.' Ans',0,1,'L');
	$this->SetXY(92,40);$this->Cell(70,5,$adresse,0,1,'L');
	$this->SetTextColor(0,0,255);
	$this->SetFont('Arial','B',20);
	$this->SetXY(10,54);$this->cell(130,10,"Prière de faire",0,0,'C',0);
	$this->SetXY(5,65);
	$this->SetFont('Arial','B',10);
	$this->SetTextColor(0,0,255);$this->Text(100,175+10,"Le Médecin");$this->SetTextColor(0,0,0);
	$this->Text(100,180+10,"Dr DAOUD Malik");
	$this->SetTextColor(0,0,255);
	
	$this->Text(5,195,"_______________________________________________________________________");
	$this->Text(30,200,"170 Rue Sfindja ex La Perlier Telemly - Alger Centre-");
	$this->Text(38,205,"Tel : 00231 21 73 47 10  Mob : 0661 55 15 83");
	
	$this->SetTextColor(0,0,0);
	}	
	
	
	
	
	
	
//***********************************************************************************************************************************************************//
	
}	