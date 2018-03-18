<?php
require('invoice.php');
class PHA extends PDF_Invoice
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
	return $resultat2='??????';
	}
// *******************************************************************************************************
	function ordonnace($nom,$prenom,$age,$adresse)
    {
	$dateeuro=date('d-m-Y');
	$this->SetFont('Arial','B',10);
	$this->SetTextColor(0,0,255);
	$this->Text(20,10,"Wilaya de djelfa");$this->Text(95,10,"Ain-oussera le: ".$dateeuro);
	$this->Text(10,15,"Etablissement Public Hospitalier");
	$this->Text(25,20,"Ain-oussera");
	$this->EAN13(100,15,time(),$h=6,$w=.35);
	$this->Text(100,25,"N° : ".time());
	$this->SetFont('Arial','B',20);
	$this->SetXY(10,32);$this->cell(130,10,"ORDONNANCE",0,0,'C',0);
	$this->SetFont('Arial','B',10);
	$this->SetXY(10,50);$this->cell(130,5,"Médecin :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ",0,0,'L',0);
	$this->SetXY(10,55);$this->cell(110,5,"Nom Prénom :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,0,'L',0);
	$this->SetXY(110,55);$this->cell(30,5," Age :_ _ _ _ _ _ _  ",0,0,'L',0);
	$this->SetXY(10,60);$this->cell(130,5,"Adresse :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _  ",0,0,'L',0);
	$this->SetTextColor(0,0,0);
	$this->SetXY(27,50);$this->cell(130,5," Dr TIBA",0,0,'L',0);
	$this->SetXY(35,55);$this->cell(110,5,$nom.'_'.$prenom,0,0,'L',0);
	$this->SetXY(122,55);$this->cell(15,5,$age.' Ans',0,0,'L',0);
	$this->SetXY(27,60);$this->cell(130,5,$adresse,0,0,'L',0);
	$this->SetXY(05,70); // marge sup 13
	$this->SetTextColor(0,0,255);$this->Text(100,175+10,"Le medecin");$this->SetTextColor(0,0,0);
	$this->Text(100,180+10,"Dr TIBA");
	$this->SetTextColor(0,0,255);$this->Text(10,200,"* Le patient ou son accompagnateur sont seuls résponsables de l'authenticité");$this->SetTextColor(0,0,0);
	}	
	function cmbs($nom,$prenom,$age,$adresse)
    {
	$dateeuro=date('d-m-Y');
	$this->SetFont('Arial','B',10);
	$this->SetTextColor(0,0,255);
	$this->Text(20,10,"Wilaya de djelfa");$this->Text(95,10,"Ain-oussera le: ".$dateeuro);
	$this->Text(10,15,"Etablissement Public Hospitalier");
	$this->Text(25,20,"Ain-oussera");
	$this->EAN13(100,15,time(),$h=6,$w=.35);
	$this->Text(100,25,"N° : ".time());
	$this->SetFont('Arial','B',20);
	$this->SetXY(10,32);$this->cell(130,10,"ORDONNANCE",0,0,'C',0);
	$this->SetFont('Arial','B',10);
	$this->SetXY(10,50);$this->cell(130,5,"Médecin :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ",0,0,'L',0);
	$this->SetXY(10,55);$this->cell(110,5,"Nom Prénom :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,0,'L',0);
	$this->SetXY(110,55);$this->cell(30,5," Age :_ _ _ _ _ _ _  ",0,0,'L',0);
	$this->SetXY(10,60);$this->cell(130,5,"Adresse :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _  ",0,0,'L',0);
	$this->SetTextColor(0,0,0);
	$this->SetXY(27,50);$this->cell(130,5," Dr TIBA",0,0,'L',0);
	$this->SetXY(35,55);$this->cell(110,5,$nom.'_'.$prenom,0,0,'L',0);
	$this->SetXY(122,55);$this->cell(15,5,$age.' Ans',0,0,'L',0);
	$this->SetXY(27,60);$this->cell(130,5,$adresse,0,0,'L',0);
	$this->SetXY(05,70); // marge sup 13
	$this->Text(05,70,"Certificat de bonne santé");
	$this->Text(05,70,"Certificat de bonne santé");
	
	
	$this->SetTextColor(0,0,255);$this->Text(100,175+10,"Le medecin");$this->SetTextColor(0,0,0);
	$this->Text(100,180+10,"Dr TIBA");
	$this->SetTextColor(0,0,255);$this->Text(10,200,"* Le patient ou son accompagnateur sont seuls résponsables de l'authenticité");$this->SetTextColor(0,0,0);

    //
// je soussigné dr ............certifie avoir reçu et examiner ce jour ,le nommé ....... agé de....... , et déclare que son état de santé est indemne de toute pathologie cliniquement décelable ce jour.
// dont certificat établi a la demande de l intéressé et remis en main propre pour servir et faire valoir ce que de droit.
	
	
	
	
	}	
	
	
	
	
// ***************************************************barre code******************************************
//ne pas modifier
	function EAN13($x, $y, $barcode, $h=16, $w=.35)
	{
		$this->Barcode($x,$y,$barcode,$h,$w,13);
	}

	function UPC_A($x, $y, $barcode, $h=16, $w=.35)
	{
		$this->Barcode($x,$y,$barcode,$h,$w,12);
	}

	function GetCheckDigit($barcode)
	{
		//Calcule le chiffre de contrôle
		$sum=0;
		for($i=1;$i<=11;$i+=2)
			$sum+=3*$barcode[$i];
		for($i=0;$i<=10;$i+=2)
			$sum+=$barcode[$i];
		$r=$sum%10;
		if($r>0)
			$r=10-$r;
		return $r;
	}

	function TestCheckDigit($barcode)
	{
		//Vérifie le chiffre de contrôle
		$sum=0;
		for($i=1;$i<=11;$i+=2)
			$sum+=3*$barcode[$i];
		for($i=0;$i<=10;$i+=2)
			$sum+=$barcode[$i];
		return ($sum+$barcode[12])%10==0;
	}

	function Barcode($x, $y, $barcode, $h, $w, $len)
	{
		//Ajoute des 0 si nécessaire
		$barcode=str_pad($barcode,$len-1,'0',STR_PAD_LEFT);
		if($len==12)
			$barcode='0'.$barcode;
		//Ajoute ou teste le chiffre de contrôle
		if(strlen($barcode)==12)
			$barcode.=$this->GetCheckDigit($barcode);
		elseif(!$this->TestCheckDigit($barcode))
			$this->Error('Incorrect check digit');
		//Convertit les chiffres en barres
		$codes=array(
			'A'=>array(
				'0'=>'0001101','1'=>'0011001','2'=>'0010011','3'=>'0111101','4'=>'0100011',
				'5'=>'0110001','6'=>'0101111','7'=>'0111011','8'=>'0110111','9'=>'0001011'),
			'B'=>array(
				'0'=>'0100111','1'=>'0110011','2'=>'0011011','3'=>'0100001','4'=>'0011101',
				'5'=>'0111001','6'=>'0000101','7'=>'0010001','8'=>'0001001','9'=>'0010111'),
			'C'=>array(
				'0'=>'1110010','1'=>'1100110','2'=>'1101100','3'=>'1000010','4'=>'1011100',
				'5'=>'1001110','6'=>'1010000','7'=>'1000100','8'=>'1001000','9'=>'1110100')
			);
		$parities=array(
			'0'=>array('A','A','A','A','A','A'),
			'1'=>array('A','A','B','A','B','B'),
			'2'=>array('A','A','B','B','A','B'),
			'3'=>array('A','A','B','B','B','A'),
			'4'=>array('A','B','A','A','B','B'),
			'5'=>array('A','B','B','A','A','B'),
			'6'=>array('A','B','B','B','A','A'),
			'7'=>array('A','B','A','B','A','B'),
			'8'=>array('A','B','A','B','B','A'),
			'9'=>array('A','B','B','A','B','A')
			);
		$code='101';
		$p=$parities[$barcode[0]];
		for($i=1;$i<=6;$i++)
			$code.=$codes[$p[$i-1]][$barcode[$i]];
		$code.='01010';
		for($i=7;$i<=12;$i++)
			$code.=$codes['C'][$barcode[$i]];
		$code.='101';
		//Dessine les barres
		for($i=0;$i<strlen($code);$i++)
		{
			if($code[$i]=='1')
				$this->Rect($x+$i*$w,$y,$w,$h,'F');
		}
		//Imprime le texte sous le code-barres
		$this->SetFont('Arial','', 12);$this->SetFont('Arial','',12);
		//$this->Text($x,$y+$h+0.5/$this->k,substr($barcode,-$len));
	}
// ***************************************************barre code******************************************	
}	