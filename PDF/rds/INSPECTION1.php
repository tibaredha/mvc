<?php
require('../invoice.php');
class INSPECTION1 extends PDF_Invoice
{ 
	 public $nomprenom ="tibaredha";
	 public $db_host="localhost";
	 public $db_name="mvc"; //probleme avec base de donnes  il faut change  gpts avec mvc   
     public $db_user="root";
     public $db_pass="";
	 public $utf8 = "" ;
	
//*************poure mettre le celle en verticale 	
	var $angle=0;

	function Rotate($angle,$x=-1,$y=-1)
	{
		if($x==-1)
			$x=$this->x;
		if($y==-1)
			$y=$this->y;
		if($this->angle!=0)
			$this->_out('Q');
		$this->angle=$angle;
		if($angle!=0)
		{
			$angle*=M_PI/180;
			$c=cos($angle);
			$s=sin($angle);
			$cx=$x*$this->k;
			$cy=($this->h-$y)*$this->k;
			$this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
		}
	}

	function RotatedText($x,$y,$txt,$angle)
	{
		//Text rotated around its origin
		$this->Rotate($angle,$x,$y);
		$this->Text($x,$y,$txt);
		//$this->Cell(30,8,$txt,1,1,'C');
		$this->Rotate(0);
	}
	function Rotatedcell($x1,$y1,$x,$y,$txt,$angle)
	{
		//Text rotated around its origin
		$this->Rotate($angle,$x1,$y1);
		$this->SetXY($x1,$y1);
		$this->Cell($x,$y,$txt,1,1,1,'L');
		$this->Rotate(0);
	}




	function RotatedImage($file,$x,$y,$w,$h,$angle)
	{
		//Image rotated around its upper-left corner
		$this->Rotate($angle,$x,$y);
		$this->Image($file,$x,$y,$w,$h);
		$this->Rotate(0);
	}
	//************************************************************//	
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
	$dateUS2FR =  $J."-".$M."-".$A ;
    return $dateUS2FR;//01-01-2013
    }	
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	function nbrtostring($tb_name,$colonename,$colonevalue,$resultatstring) 
	{
	if (is_numeric($colonevalue) and $colonevalue!=='0') 
	{ 
	$this->mysqlconnect();
    $result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
    $row=mysql_fetch_object($result);
	$resultat=$row->$resultatstring;
	return $resultat;
	} 
	return $resultat2='-------';
	}
	function ordonnace($nom,$prenom,$age,$adresse)
    {
	$dateeuro=date('d-m-Y');
	$this->SetFont('Arial','B',10);
	$this->SetTextColor(0,0,255);
	$this->Text(20,10,"Wilaya de djelfa");$this->Text(95,10,"Ain-oussera le: ".$dateeuro);
	$this->Text(10,15,html_entity_decode(utf8_decode("Etablissement Public Hospitalier")));
	$this->Text(25,20,"Ain-oussera");
	$this->EAN13(100,15,time(),$h=6,$w=.35);
	$this->Text(100,25,html_entity_decode(utf8_decode("N° : ".time())));
	$this->SetFont('Arial','B',20);
	$this->SetXY(10,32);$this->cell(130,10,"ORDONNANCE",0,0,'C',0);
	$this->SetFont('Arial','B',10);
	$this->SetXY(10,50);$this->cell(130,5,html_entity_decode(utf8_decode("Médecin :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ")),0,0,'L',0);
	$this->SetXY(10,55);$this->cell(110,5,html_entity_decode(utf8_decode("Nom Prénom :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _")),0,0,'L',0);
	$this->SetXY(110,55);$this->cell(30,5,html_entity_decode(utf8_decode(" Age :_ _ _ _ _ _ _  ")),0,0,'L',0);
	$this->SetXY(10,60);$this->cell(130,5,html_entity_decode(utf8_decode("Adresse :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _  ")),0,0,'L',0);
	$this->SetTextColor(0,0,0);
	$this->SetXY(27,50);$this->cell(130,5," Dr TIBA",0,0,'L',0);
	$this->SetXY(35,55);$this->cell(110,5,$nom.'_'.$prenom,0,0,'L',0);
	$this->SetXY(122,55);$this->cell(15,5,$age.' Ans',0,0,'L',0);
	$this->SetXY(27,60);$this->cell(130,5,$adresse,0,0,'L',0);
	$this->SetXY(05,70); // marge sup 13
	$this->SetTextColor(0,0,255);$this->Text(100,175+10,"Le medecin");$this->SetTextColor(0,0,0);
	$this->Text(100,180+10,"Dr TIBA");
	$this->SetTextColor(0,0,255);$this->Text(10,200,html_entity_decode(utf8_decode("* Le patient ou son accompagnateur sont seuls résponsables de l'authenticité")));$this->SetTextColor(0,0,0);
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
	
	
	//************************************************************//	
	function entete($datejour1,$datejour2,$titre,$EPH1)
	{
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
    $this->SetFont('Arial','B',10.5);
	$this->SetXY(05,5); $this->cell(200,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",0,0,'C',0,0);
    $this->SetXY(05,10);$this->cell(200,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
    $this->SetXY(05,15);$this->cell(200,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
    $this->SetXY(05,30);$this->cell(100,5,"Service Des Structures Et De L'action Sanitaire ",0,0,'L',0,0);$this->SetXY(155,30);$this->cell(50,5," Djelfa Le : ".date ('d-m-Y'),0,0,'R',0,0);
    $this->SetXY(05,35);$this->cell(100,5,"Bureau De La Régulation Des Produits Pharmaceutiques",0,0,'L',0,0);
	$this->SetXY(05,40);$this->cell(100,5,"N: _ _ _ /DSP/SAS/BRPP/ ".date ('Y'),0,0,'L',0,0);
	$this->SetXY(05,$this->GetY()+5);$this->cell(200,5,$titre,0,0,'C',0,0);
	$this->SetXY(05,$this->GetY()+5);$this->cell(200,5,'Etablissement de santé : '.$EPH1,0,0,'C',0,0);
    $this->SetXY(05,$this->GetY()+5);$this->cell(200,5,'Du  '.$this->dateUS2FR($datejour1).'  Au  '.$this->dateUS2FR($datejour2),0,0,'C',0,0);
	}
	function entete2($datejour1,$datejour2,$titre,$EPH1)
	{
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
    $this->SetFont('Arial','B',10.5);
	$this->SetXY(05,5); $this->cell(290,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",0,0,'C',0,0);
    $this->SetXY(05,10);$this->cell(290,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
    $this->SetXY(05,15);$this->cell(290,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
    $this->SetXY(05,30);$this->cell(100,5,"Service Des Structures Et De L'action Sanitaire ",0,0,'L',0,0);$this->SetXY(240,30);$this->cell(50,5," Djelfa Le : ".date ('d-m-Y'),0,0,'R',0,0);
    $this->SetXY(05,35);$this->cell(100,5,"Bureau De La Régulation Des Produits Pharmaceutiques",0,0,'L',0,0);
	$this->SetXY(05,40);$this->cell(100,5,"N: _ _ _ /DSP/SAS/BRPP/ ".date ('Y'),0,0,'L',0,0);
	$this->SetXY(05,$this->GetY()+5);$this->cell(290,5,$titre,0,0,'C',0,0);
	$this->SetXY(05,$this->GetY()+5);$this->cell(290,5,'Etablissement de santé : '.$EPH1,0,0,'C',0,0);
    $this->SetXY(05,$this->GetY()+5);$this->cell(290,5,'Du  '.$this->dateUS2FR($datejour1).'  Au  '.$this->dateUS2FR($datejour2),0,0,'C',0,0);
	}
	function entete1($datejour1,$datejour2,$titre,$EPH1)
	{
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
    $this->SetFont('Arial','B',10.5);
	$this->SetXY(05,5); $this->cell(200,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",0,0,'C',0,0);
    $this->SetXY(05,10);$this->cell(200,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
    $this->SetXY(05,15);$this->cell(200,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
    $this->SetXY(05,30);$this->cell(100,5,"Service Des Structures Et De L'action Sanitaire ",0,0,'L',0,0);$this->SetXY(155,30);$this->cell(50,5," Djelfa Le : ".date ('d-m-Y'),0,0,'R',0,0);
    $this->SetXY(05,35);$this->cell(100,5,"Bureau De La Régulation Des Produits Pharmaceutiques",0,0,'L',0,0);
	$this->SetXY(05,40);$this->cell(100,5,"N: _ _ _ /DSP/SAS/BRPP/ ".date ('Y'),0,0,'L',0,0);
	$this->SetXY(55,$this->GetY()+10);$this->cell(150,5,'Le Directeur De La Santé Et De La Population De La Wilaya De Djelfa',0,1,'C',1,0);
	$this->SetXY(55,$this->GetY()+2);$this->cell(150,5,'A Monsieur ',0,1,'C',1,0);
	$this->SetXY(55,$this->GetY()+2);$this->cell(150,5,'Le Directeur Général De La Pharmacie Et Des Equipements De Santé',0,1,'C',1,0);
	$this->SetXY(55,$this->GetY()+2);$this->cell(150,5,'Ministere De La Santé De La Population Et De La Réforme Hospitalière',0,1,'C',1,0);
	$this->SetXY(05,$this->GetY()+18);$this->cell(200,5,$titre,0,1,'L',1,0);
	$this->SetXY(20,$this->GetY()+2);$this->cell(185,5,'Etablissement de santé : '.$EPH1,0,1,'L',1,0);
	$this->SetXY(20,$this->GetY()+2);$this->cell(185,5,'Du  '.$this->dateUS2FR($datejour1).'  Au  '.$this->dateUS2FR($datejour2),0,1,'L',1,0);
	$this->SetXY(05,$this->GetY()+2);$this->cell(200,5,'REF : Feuille De Route ',0,1,'L',1,0);
	$this->SetXY(05,$this->GetY()+2);$this->cell(200,5,'PJ : '.'( {nb} )'.' Pages',0,1,'L',1,0);// $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	$this->SetXY(25,$this->GetY()+18);$this->cell(100,5,"Suite à vos orientations,j'ai l'honneur Monsieur le directeur général de vous transmettre l'état mensuel ",0,0,'L',0,0);
	$this->SetXY(10,$this->GetY()+8);$this->cell(100,5,"des ruptures des produits pharmaceutiques ".'Du  '.$this->dateUS2FR($datejour1).'  Au  '.$this->dateUS2FR($datejour2).".",0,0,'L',0,0);
	$this->SetXY(25,$this->GetY()+18);$this->cell(100,5,"Veuillez Agréer Monsieur Le Directeur Géneral ,L'éxpression De Ma Parfaite Considération.",0,0,'L',0,0);
	}
	function entetel($datejour1,$datejour2,$titre,$EPH1)
	{
	$this->SetDisplayMode('fullpage','single');
    $this->SetFont('Arial','B',9);
	$this->SetXY(05,5); $this->cell(290,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",0,0,'C',0,0);
    $this->SetXY(05,10);$this->cell(290,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
    $this->SetXY(05,15);$this->cell(290,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
    $this->SetXY(05,20);$this->cell(100,5,'INSPECTION SANTE PUBLIQUE',0,0,'L',0,0);
	$this->SetXY(230,20);$this->cell(60,5,"LE : ".date ('d-m-Y'),0,0,'C',0,0);
    $this->SetXY(05,25);$this->cell(100,5,"N               / ".date ('Y'),0,0,'L',0,0);
	$this->SetXY(05,25);$this->cell(290,5,$titre.$EPH1,0,0,'C',0,0);
    $this->SetXY(05,29);$this->cell(290,5,'Du  '.$this->dateUS2FR($datejour1).'  Au  '.$this->dateUS2FR($datejour2),0,0,'C',0,0);
	}
	function pied()
	{ 
	$this->SetXY(5,$this->GetY()+25);$this->cell(50,5,"CT : ",0,0,'L',1,0);                 $this->SetXY(130,$this->GetY());$this->cell(75,6,"LE DIRECTEUR  ",0,0,'L',1,0);
	$this->SetXY(10,$this->GetY()+6.5);$this->cell(45,5,"- PCH BISKRA",0,0,'L',1,0);
	$this->SetXY(10,$this->GetY()+6);$this->cell(45,5,"- IPA  ALGER",0,0,'L',1,0);
	}
	function produitrtr($NATURE,$nature,$datejour1,$datejour2,$EPH)
    {
		$this->mysqlconnect();
		$query = "SELECT * from rtr order by DATE"; // WHERE NATURE =$NATURE and (DATE BETWEEN '$datejour1' AND '$datejour2') and STRUCTURE $EPH GROUP BY PRODUIT  id   
		$res=mysql_query($query);
		$tot=mysql_num_rows($res);
		$this->SetXY(5,70); $this->cell(66.5*3,10,"Produit Pharmaceutique : ".$nature,1,0,'C',1,0);
		$this->SetXY(5,$this->GetY()+10);
		$this->cell(66.5*3,5,"Dci, Forme, Dosage /Motif /Ref /N° LOT /DDP",1,0,'C',1,0);
		
		$this->SetXY(5,$this->GetY()+5);
		$x=0;
		while($row=mysql_fetch_object($res))
		{
			$this->SetFont('Arial','B',9);
			$this->cell(10,20,$x=$x+1,1,0,'C',0);
			$this->cell(189.5,5,"Dci, Forme, Dosage : ".$this->nbrtostring('pha','id',$row->PRODUIT,'mecicament').' : '.$this->nbrtostring('pha','id',$row->PRODUIT,'pre'),1,0,'L',0);
			$this->SetXY(15,$this->GetY()+5); 
			$this->cell(189.5,5,"Motif : ".$row->MOTIF,1,0,'L',0);
			$this->SetXY(15,$this->GetY()+5); 
			$this->cell(189.5,5,"Réf : ".$row->REF,1,0,'L',0);
			$this->SetXY(15,$this->GetY()+5); 
			$this->cell(120,5,"N° LOT : ".$row->NLOT,1,0,'L',0);
			$this->cell(25,5,'DDP',1,0,'C',0);
			$this->cell(44.5,5,$this->dateUS2FR($row->DDP),1,0,'C',0);
			$this->SetXY(5,$this->GetY()+5);  
		}
		$this->SetXY(5,$this->GetY());
		$this->cell(66.5*3,5,"Total Produit en Retrait et Mise en Quarantaine : ".$tot." Produit(s)",1,0,'L',1,0);
	}
	
	
	function produit($NATURE,$nature,$datejour1,$datejour2,$EPH)
    {
		$this->mysqlconnect();
		$query = "SELECT rds.PRODUIT,sum(rds.CMM) as sumcmm ,rds.NATURE,rds.DATE,rds.STRUCTURE,pha.mecicament from rds  INNER JOIN pha ON rds.PRODUIT = pha.id WHERE rds.NATURE =$NATURE and (rds.DATE BETWEEN '$datejour1' AND '$datejour2') and rds.STRUCTURE $EPH GROUP BY rds.PRODUIT order by pha.mecicament "; //   
		$res=mysql_query($query);
		$tot=mysql_num_rows($res);
		$this->SetXY(5,70); $this->cell(66.5*3,10,"Produit Pharmaceutique : ".$nature,1,0,'C',1,0);
		$this->SetXY(5,$this->GetY()+10);
		$this->cell(130,5,"Dci, Forme, Dosage",1,0,'C',1,0);
		$this->cell(25,5,"Fournisseur",1,0,'C',1,0);
		$this->cell(39.5+5,5,"C M M ",1,0,'C',1,0);
		$this->SetXY(5,$this->GetY()+5);
		$x=0;
		while($row=mysql_fetch_object($res))
		{
			$this->SetFont('Arial','B',9);
			$this->cell(10,5,$x=$x+1,1,0,'C',0);
			$this->cell(120,5,$this->nbrtostring('pha','id',$row->PRODUIT,'mecicament').' : '.$this->nbrtostring('pha','id',$row->PRODUIT,'pre'),1,0,'L',0);
			$this->cell(25,5,"PCH ET IPA",1,0,'C',0);
			$this->cell(20.5,5,$row->sumcmm,1,0,'C',0);
			$this->cell(19+5,5,'Unité(s)',1,0,'C',0);
			$this->SetXY(5,$this->GetY()+5);  
		}
		$this->SetXY(5,$this->GetY());
		$this->cell(66.5*3,5,"Total Produit en Rupture de stock : ".$tot." Produit(s)",1,0,'L',1,0);
	}
	
	function produitn($NATURE,$nature,$datejour1,$datejour2,$EPH)
    {
		$this->mysqlconnect();
		$query = "SELECT rds.PRODUIT,sum(rds.CMM) as sumcmm ,rds.NATURE,rds.DATE,rds.STRUCTURE,pha.mecicament from rds  INNER JOIN pha ON rds.PRODUIT = pha.id WHERE rds.NATURE =$NATURE and (rds.DATE BETWEEN '$datejour1' AND '$datejour2') and rds.STRUCTURE $EPH GROUP BY rds.PRODUIT order by pha.mecicament "; //   
		$res=mysql_query($query);
		$tot=mysql_num_rows($res);
		
		
		$this->SetXY(5,70); $this->cell(66.5*3,10,"Produit Pharmaceutique : ".$nature,1,0,'C',1,0);
		$this->SetXY(5,$this->GetY()+10);
		$this->cell(130,5,"Dci, Forme, Dosage",1,0,'C',1,0);
		$this->cell(25,5,"Conditionnement",1,0,'C',1,0);
		$this->cell(25,5,"Quantite en stock",1,0,'C',1,0);
		$this->cell(25,5,"autonomie en mois",1,0,'C',1,0);
		$this->cell(25,5,"commande passe  a la pch  an date du ",1,0,'C',1,0);
		$this->cell(25,5,"observation",1,0,'C',1,0);
		$this->cell(25,5,"structure sanitaire  ",1,0,'C',1,0);
		
		
		$this->SetXY(5,$this->GetY()+5);
		$x=0;
		while($row=mysql_fetch_object($res))
		{
			$this->SetFont('Arial','B',9);
			// $this->cell(10,5,$x=$x+1,1,0,'C',0);
			$this->cell(120,5,$this->nbrtostring('pha','id',$row->PRODUIT,'mecicament').' : '.$this->nbrtostring('pha','id',$row->PRODUIT,'pre'),1,0,'L',0);
			// $this->cell(25,5,"PCH ET IPA",1,0,'C',0);
			$this->cell(20.5,5,$row->sumcmm,1,0,'C',0);
			// $this->cell(19+5,5,'Unité(s)',1,0,'C',0);
			$this->SetXY(5,$this->GetY()+5);  
		}
		$this->SetXY(5,$this->GetY());
		$this->cell(66.5*3,5,"Total Produit en Rupture de stock : ".$tot." Produit(s)",1,0,'L',1,0);
	}
	function produitetab($NATURE,$nature,$datejour1,$datejour2,$EPH,$PRODUIT) 
	{
	$this->mysqlconnect();
	$requete = "SELECT PRODUIT,sum(CMM) as sumcmm ,NATURE,DATE,STRUCTURE from rds WHERE NATURE =$NATURE and (DATE BETWEEN '$datejour1' AND '$datejour2') and STRUCTURE $EPH and PRODUIT=$PRODUIT GROUP BY PRODUIT order by id "; //   
	$requete = @mysql_query($requete) or die($requete."<br>".mysql_error());
	$row = mysql_fetch_array($requete); 
	$produitetab=$row['sumcmm'];
	return $produitetab;
	}
	
	
	function produit2($NATURE,$nature,$datejour1,$datejour2)
    {
		$this->mysqlconnect();
		$query = "SELECT rds.PRODUIT,sum(rds.CMM) as sumcmm ,rds.NATURE,rds.DATE,rds.STRUCTURE,rds.CMM,pha.mecicament from rds INNER JOIN pha ON rds.PRODUIT = pha.id  WHERE rds.NATURE =$NATURE and (rds.DATE BETWEEN '$datejour1' AND '$datejour2') GROUP BY rds.PRODUIT  order by pha.mecicament "; //   
		$res=mysql_query($query);
		$tot=mysql_num_rows($res);
		$this->SetXY(5,70); $this->cell(285,10,"CMM Produit Pharmaceutique : ".$nature,1,0,'C',1,0);
		$this->SetXY(5,$this->GetY()+10);
		$this->cell(130,10,"Dci, Forme, Dosage",1,0,'C',1,0);
		$this->cell(60,5,"EPH",1,0,'C',1,0);$this->cell(10,5,"EHS ",1,0,'C',1,0);$this->cell(10,5,"EH",1,0,'C',1,0);$this->cell(50,5,"EPSP ",1,0,'C',1,0);$this->cell(15,10,"TOT",1,0,'C',1,0);$this->cell(10,10,"U",1,0,'C',1,0);
		$this->SetXY(135,$this->GetY()+5);$this->cell(10,5,"AO",1,0,'C',1,0);$this->cell(10,5,"HBB",1,0,'C',1,0);$this->cell(10,5,"DJL",1,0,'C',1,0);$this->cell(10,5,"MAS",1,0,'C',1,0);$this->cell(10,5,"IDR",1,0,'C',1,0);$this->cell(10,5,"CHA",1,0,'C',1,0);$this->cell(10,5,"MEF",1,0,'C',1,0);$this->cell(10,5,"OPH",1,0,'C',1,0);$this->cell(10,5,"AO",1,0,'C',1,0);$this->cell(10,5,"HBB",1,0,'C',1,0);$this->cell(10,5,"DJL",1,0,'C',1,0);$this->cell(10,5,"MAS",1,0,'C',1,0);$this->cell(10,5,"GUE",1,0,'C',1,0);
		$this->SetXY(5,$this->GetY()+5);
		$x=0;
		while($row=mysql_fetch_object($res))
		{
			$this->SetFont('Arial','B',9);
			$this->cell(10,5,$x=$x+1,1,0,'C',0);
			$this->cell(120,5,$this->nbrtostring('pha','id',$row->PRODUIT,'mecicament').' : '.$this->nbrtostring('pha','id',$row->PRODUIT,'pre'),1,0,'L',0);
			$this->cell(10,5,$this->produitetab($NATURE,$nature,$datejour1,$datejour2,'= 1',$row->PRODUIT) ,1,0,'C',0);//EPH AO
			$this->cell(10,5,$this->produitetab($NATURE,$nature,$datejour1,$datejour2,'= 2',$row->PRODUIT),1,0,'C',0);//EPH HBB
			$this->cell(10,5,$this->produitetab($NATURE,$nature,$datejour1,$datejour2,'= 3',$row->PRODUIT),1,0,'C',0);//EPH DJELFA
			$this->cell(10,5,$this->produitetab($NATURE,$nature,$datejour1,$datejour2,'= 4',$row->PRODUIT),1,0,'C',0);//EPH MESSAAD
			$this->cell(10,5,$this->produitetab($NATURE,$nature,$datejour1,$datejour2,'= 5',$row->PRODUIT),1,0,'C',0);//EPH IDRISSIA
			$this->cell(10,5,$this->produitetab($NATURE,$nature,$datejour1,$datejour2,'= 6',$row->PRODUIT),1,0,'C',0);//EPH CHAOUA
			$this->cell(10,5,$this->produitetab($NATURE,$nature,$datejour1,$datejour2,'= 7',$row->PRODUIT),1,0,'C',0);//EHS DJELFA
			$this->cell(10,5,$this->produitetab($NATURE,$nature,$datejour1,$datejour2,'= 13',$row->PRODUIT),1,0,'C',0);//EHP  OPHTALMO
			$this->cell(10,5,$this->produitetab($NATURE,$nature,$datejour1,$datejour2,'= 8',$row->PRODUIT),1,0,'C',0);//EPSP AO
			$this->cell(10,5,$this->produitetab($NATURE,$nature,$datejour1,$datejour2,'= 9',$row->PRODUIT),1,0,'C',0);//EPSP HBB
			$this->cell(10,5,$this->produitetab($NATURE,$nature,$datejour1,$datejour2,'= 10',$row->PRODUIT),1,0,'C',0);//EPSP DJELFA
			$this->cell(10,5,$this->produitetab($NATURE,$nature,$datejour1,$datejour2,'= 11',$row->PRODUIT),1,0,'C',0);//EPSP MESSAAD
			$this->cell(10,5,$this->produitetab($NATURE,$nature,$datejour1,$datejour2,'= 12',$row->PRODUIT),1,0,'C',0);//EPSP GUETARA
			$this->cell(15,5,$row->sumcmm,1,0,'C',0);
			$this->cell(10,5,'U',1,0,'C',0);
			$this->SetXY(5,$this->GetY()+5);  
		}
		$this->SetXY(5,$this->GetY());
		$this->cell(285,5,"Total Produit en Rupture de stock : ".$tot." Produit(s)",1,0,'L',1,0);
	}
	
	function produitmois($NATURE,$nature,$datejour1,$datejour2,$EPH,$PRODUIT) 
	{
	$this->mysqlconnect();
	$requete = "SELECT PRODUIT,sum(CMM) as sumcmm ,NATURE,DATE,STRUCTURE from rds WHERE NATURE =$NATURE and (DATE BETWEEN '$datejour1' AND '$datejour2')  and PRODUIT=$PRODUIT  and STRUCTURE $EPH GROUP BY PRODUIT order by id "; //   
	$requete = @mysql_query($requete) or die($requete."<br>".mysql_error());
	$row = mysql_fetch_array($requete); 
	$produitetab=$row['sumcmm'];
	return $produitetab;
	}
	// en cours de realisation 
	function produit3($NATURE,$nature,$EPH)
    {
		$datejour1=date('Y-m-d',mktime(12, 0, 0, date("m")-11,1, date("Y")));
		$datejour2=date('Y-m-d',mktime(12, 0, 0, date("m")+1,1, date("Y")));
		$this->mysqlconnect();
		$query = "SELECT PRODUIT,sum(CMM) as sumcmm ,NATURE,DATE,STRUCTURE,CMM from rds WHERE NATURE =$NATURE and (DATE BETWEEN '$datejour1' AND '$datejour2') and STRUCTURE $EPH GROUP BY PRODUIT  order by id "; //   
		//$query = "SELECT rds.PRODUIT,sum(rds.CMM) as sumcmm ,rds.NATURE,rds.DATE,rds.STRUCTURE,pha.mecicament from rds  INNER JOIN pha ON rds.PRODUIT = pha.id WHERE rds.NATURE =$NATURE and (rds.DATE BETWEEN '$datejour1' AND '$datejour2') and rds.STRUCTURE $EPH GROUP BY rds.PRODUIT order by pha.mecicament "; //   
		$res=mysql_query($query);
		$tot=mysql_num_rows($res);
		$this->SetXY(5,70); $this->cell(285,10,"CMM/ Dernier 12-Mois Produit Pharmaceutique : ".$nature,1,0,'C',1,0);
		$this->SetXY(5,$this->GetY()+10);
		$this->cell(130,10,"Dci, Forme, Dosage",1,0,'C',1,0);
		$this->cell(12.92*12,5,'Du '.$this->dateUS2FR($datejour1)." Au ".$this->dateUS2FR($datejour2),1,0,'C',1,0);
		$this->SetXY(135,$this->GetY()+5);
		$this->cell(12.92,5,date('m',mktime(12, 0, 0, date("m")-11,1, date("Y"))),1,0,'C',1,0);
		$this->cell(12.92,5,date('m',mktime(12, 0, 0, date("m")-10,1, date("Y"))),1,0,'C',1,0);
		$this->cell(12.92,5,date('m',mktime(12, 0, 0, date("m")-9,1, date("Y"))),1,0,'C',1,0);
		$this->cell(12.92,5,date('m',mktime(12, 0, 0, date("m")-8,1, date("Y"))),1,0,'C',1,0);
		$this->cell(12.92,5,date('m',mktime(12, 0, 0, date("m")-7,1, date("Y"))),1,0,'C',1,0);
		$this->cell(12.92,5,date('m',mktime(12, 0, 0, date("m")-6,1, date("Y"))),1,0,'C',1,0);
		$this->cell(12.92,5,date('m',mktime(12, 0, 0, date("m")-5,1, date("Y"))),1,0,'C',1,0);
		$this->cell(12.92,5,date('m',mktime(12, 0, 0, date("m")-4,1, date("Y"))),1,0,'C',1,0);
		$this->cell(12.92,5,date('m',mktime(12, 0, 0, date("m")-3,1, date("Y"))),1,0,'C',1,0);
		$this->cell(12.92,5,date('m',mktime(12, 0, 0, date("m")-2,1, date("Y"))),1,0,'C',1,0);
		$this->cell(12.92,5,date('m',mktime(12, 0, 0, date("m")-1,1, date("Y"))),1,0,'C',1,0);
		$this->cell(12.92,5,date('m',mktime(12, 0, 0, date("m"),1, date("Y"))),1,0,'C',1,0);
		$this->SetXY(5,$this->GetY()+5);
		$x=0;
		while($row=mysql_fetch_object($res))
		{
			$this->SetFont('Arial','B',9);
			$this->cell(10,5,$x=$x+1,1,0,'C',0);
			$this->cell(120,5,$this->nbrtostring('pha','id',$row->PRODUIT,'mecicament').' : '.$this->nbrtostring('pha','id',$row->PRODUIT,'pre'),1,0,'L',0);
			// $this->cell(12.92,5,$this->produitmois($NATURE,$nature,'2018-04-01','2018-04-30',$EPH,$row->PRODUIT),1,0,'C',0);
			// $this->cell(12.92,5,$this->produitmois($NATURE,$nature,'2018-05-01','2018-05-31',$EPH,$row->PRODUIT),1,0,'C',0);
			// $this->cell(12.92,5,$this->produitmois($NATURE,$nature,'2018-06-01','2018-06-30',$EPH,$row->PRODUIT),1,0,'C',0);
			// $this->cell(12.92,5,$this->produitmois($NATURE,$nature,'2018-07-01','2018-07-31',$EPH,$row->PRODUIT),1,0,'C',0);
		    // $this->cell(12.92,5,$this->produitmois($NATURE,$nature,'2018-08-01','2018-08-31',$EPH,$row->PRODUIT),1,0,'C',0);
			// $this->cell(12.92,5,$this->produitmois($NATURE,$nature,'2018-09-01','2018-09-30',$EPH,$row->PRODUIT),1,0,'C',0);
			// $this->cell(12.92,5,$this->produitmois($NATURE,$nature,'2018-10-01','2018-10-31',$EPH,$row->PRODUIT),1,0,'C',0);
		    // $this->cell(12.92,5,$this->produitmois($NATURE,$nature,'2018-11-01','2018-11-30',$EPH,$row->PRODUIT),1,0,'C',0);
			// $this->cell(12.92,5,$this->produitmois($NATURE,$nature,'2018-12-01','2018-12-31',$EPH,$row->PRODUIT),1,0,'C',0);
			// $this->cell(12.92,5,$this->produitmois($NATURE,$nature,'2018-01-01','2018-01-31',$EPH,$row->PRODUIT),1,0,'C',0);
			// $this->cell(12.92,5,$this->produitmois($NATURE,$nature,'2018-02-01','2018-02-28',$EPH,$row->PRODUIT),1,0,'C',0);
			// $this->cell(12.92,5,$this->produitmois($NATURE,$nature,'2018-03-01','2018-03-31',$EPH,$row->PRODUIT),1,0,'C',0);
			$this->SetXY(5,$this->GetY()+5);  
		}
		$this->SetXY(5,$this->GetY());
		$this->cell(285,5,"Total Produit en Rupture de stock : ".$tot." Produit(s)",1,0,'L',1,0);
	}	
}	