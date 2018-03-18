<?php
require('invoice.php');
class MDO extends PDF_Invoice
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
	function entetemdo($titre)
    {
	$date=date("d-m-y");
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
	$this->SetTextColor(0,0,0);//text noire
	$this->SetFont('Arial', '', 10);
	$this->AddPage();
	$this->Text(90,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
	$this->Text(70,10,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE");
	$this->Text(75.5,15,"DIRECTION DE LA SANTE ET DE LA POPULAION DE LA WILAYA DE DJELFA");
	$this->Text(80,25,$titre);
	$this->Text(95,30,"RELEVE DES MALADIES A DECLARATION OBLIGATOIRE   ");
	$this->Text(5,35,"ETABLISSEMENT PUBLIC HOSPITALIER AIN OUSSERA");$this->Text(190,35,"DATE :  ".DATE('d-m-Y')); 
	$this->Text(5,40,"SERVICE:POSTE DE TRANSFUSION SANGUINE  ");     
	$this->Text(5,45,"CODE :17200"); 
	}
	
	function maladie($tab,$DATEJOUR1,$DATEJOUR2,$germe)
    {
	$this->Text(115,45,'DU  '.$this->dateUS2FR($DATEJOUR1).'  AU  '.$this->dateUS2FR($DATEJOUR2));
	$query = "SELECT * from $tab where( DATEDON BETWEEN '$DATEJOUR1' AND '$DATEJOUR2')  and  $germe='Positif' order by DATEDON asc";
	$resultat=mysql_query($query);
	$totalmbr=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	  {
		   $this->cell(20,10,$row->id,1,0,'C',0);
		   $this->cell(20,10,$this->dateUS2FR($row->DATEDON),1,0,'C',0);
		   $this->cell(60,10,Trim($this->nbrtostring('mvc','dnr','id',$row->IDDNR,'NOM'))."_".Trim($this->nbrtostring('mvc','dnr','id',$row->IDDNR,'PRENOM')),1,0,'L',0);
		   $this->cell(20,10,$row->AGEDNR,1,0,'C',0);
			  if (Trim($row->SEXEDNR)=='M')
			  {
			   $this->cell(5,10,'X',1,0,'L',0);
			   $this->cell(5,10,'',1,0,'L',0);
			  }
			  if (Trim($row->SEXEDNR)=='F')
			  {
			   $this->cell(5,10,'',1,0,'L',0);
			   $this->cell(5,10,'X',1,0,'L',0);
			  } 
		   $this->cell(60,10,Trim($this->nbrtostring('mvc','dnr','id',$row->IDDNR,'ADRESSE')),1,0,'L',0);
		   
			  if (Trim($row->$germe)=='Positif')
			  {
				  if($germe =='HVB')
				  {
				  $this->cell(40,10,'hepatite viral B',1,0,'C',0);
				  }
				  if($germe =='HVC')
				  {
				  $this->cell(40,10,'hepatite viral C',1,0,'C',0);
				  }
				  if($germe =='HIV')
				  {
				  $this->cell(40,10,'HIV',1,0,'C',0);
				  }
				  if($germe =='TPHA')
				  {
				  $this->cell(40,10,'Syphilis',1,0,'C',0);
				  } 
				  
			  }
		   $this->cell(50,10,'Donneur de sang',1,0,'C',0);
		   $this->SetXY(05,$this->GetY()+10); 
	  }
	}
	
	function serologie($tab,$DATEJOUR1,$DATEJOUR2)
    {
	$this->maladie($tab,$DATEJOUR1,$DATEJOUR2,'HVB');
	$this->maladie($tab,$DATEJOUR1,$DATEJOUR2,'HVC');
	$this->maladie($tab,$DATEJOUR1,$DATEJOUR2,'HIV');
	$this->maladie($tab,$DATEJOUR1,$DATEJOUR2,'TPHA');
	}
	function maladiex($tab,$DATEJOUR1,$DATEJOUR2,$germe)
    {
	$query = "SELECT * from $tab where ( DQ BETWEEN '$DATEJOUR1' AND '$DATEJOUR2')  and  $germe='Positif' order by DQ asc";
	$resultat=mysql_query($query);
	$totalmbr=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	  {
		   $this->cell(20,10,$row->NUM,1,0,'C',0);
		   $this->cell(20,10,$this->dateUS2FR($row->DQ),1,0,'C',0);
		   $this->cell(60,10,Trim($row->NOM)."_".Trim($row->PRENOM),1,0,'L',0);
		  $age=substr(date('Y-m-d'),0,4)-substr($row->DATENAISSANCE,6,4);
		  $this->cell(20,10,$age,1,0,'C',0);
			  if (Trim($row->SEX)=='M')
			  {
			   $this->cell(5,10,'X',1,0,'L',0);
			   $this->cell(5,10,'',1,0,'L',0);
			  }
			  if (Trim($row->SEX)=='F')
			  {
			   $this->cell(5,10,'',1,0,'L',0);
			   $this->cell(5,10,'X',1,0,'L',0);
			  } 
		   $this->cell(60,10,Trim($row->ADRESSE),1,0,'L',0);
		   
			  if (Trim($row->$germe)=='Positif')
			  {
				  if($germe =='HVB')
				  {
				  $this->cell(40,10,'hepatite viral B',1,0,'C',0);
				  }
				  if($germe =='HVC')
				  {
				  $this->cell(40,10,'hepatite viral C',1,0,'C',0);
				  }
				  if($germe =='HIV')
				  {
				  $this->cell(40,10,'HIV',1,0,'C',0);
				  }
				  if($germe =='TPHA')
				  {
				  $this->cell(40,10,'Syphilis',1,0,'C',0);
				  } 
				  
			  }
		   $this->cell(50,10,'malade externe',1,0,'C',0);
		   $this->SetXY(05,$this->GetY()+10); 
	  }
	}
	function serologiex($tab,$DATEJOUR1,$DATEJOUR2)
    {
	$this->maladiex($tab,$DATEJOUR1,$DATEJOUR2,'HVB');
	$this->maladiex($tab,$DATEJOUR1,$DATEJOUR2,'HVC');
	$this->maladiex($tab,$DATEJOUR1,$DATEJOUR2,'HIV');
	$this->maladiex($tab,$DATEJOUR1,$DATEJOUR2,'TPHA');
	}
	
	function MDO2($DATEJOUR1,$DATEJOUR2)
    {
	$this->entetemdo("ANNEXE II - CIRCULAIRE N° 1126 /MSP/DP/SDPG... DU 17 NOVEMBER 1990");                                                                            
	$h=50;
	$this->SetXY(005,$h);$this->cell(20,10,"N°",1,0,'C',1,0);
	$this->SetXY(25,$h);$this->cell(20,10,"DATE",1,0,'C',1,0);
	$this->SetXY(45,$h);$this->cell(60,10,"NOM ET PRENOM",1,0,'C',1,0);
	$this->SetXY(105,$h);$this->cell(20,10,"AGE",1,0,'C',1,0);
	$this->SetXY(125,$h);$this->cell(10,5,"SEXE",1,0,'C',1,0);
	$this->SetXY(125,$h+5);$this->cell(5,5,"M",1,0,'C',1,0);
	$this->SetXY(130,$h+5);$this->cell(5,5,"F",1,0,'C',1,0);
	$this->SetXY(135,$h);$this->cell(60,10,"ADRESSE",1,0,'C',1,0);
	$this->SetXY(185+10,$h);$this->cell(40,10,"MALADIE",1,0,'C',1,0);
	$this->SetXY(225+10,$h); $this->cell(50,10,"OBSERVATION",1,0,'C',1,0);
	$this->SetXY(05,60); 
    $this->mysqlconnect();
    $this->serologie('don',$DATEJOUR1,$DATEJOUR2);
    $this->serologiex('mal',$DATEJOUR1,$DATEJOUR2);
	$this->piedmdo();	
	}
	function MDO3($date)
    {
	$this->entetemdo("ANNEXE III - CIRCULAIRE N° 1126 /MSP/DP/SDPG... DU 17 NOVEMBER 1990");                                                                            
	$h=50;
	$this->SetXY(005,$h);$this->cell(20,10,"N°",1,0,'C',1,0);
	$this->SetXY(25,$h);$this->cell(20,10,"DATE",1,0,'C',1,0);
	$this->SetXY(45,$h);$this->cell(60,10,"NOM ET PRENOM",1,0,'C',1,0);
	$this->SetXY(105,$h);$this->cell(20,10,"AGE",1,0,'C',1,0);
	$this->SetXY(125,$h);$this->cell(10,5,"SEXE",1,0,'C',1,0);
	$this->SetXY(125,$h+5);$this->cell(5,5,"M",1,0,'C',1,0);
	$this->SetXY(130,$h+5);$this->cell(5,5,"F",1,0,'C',1,0);
	$this->SetXY(135,$h);$this->cell(60,10,"ADRESSE",1,0,'C',1,0);
	$this->SetXY(185+10,$h);$this->cell(40,10,"MALADIE",1,0,'C',1,0);
	$this->SetXY(225+10,$h); $this->cell(50,10,"OBSERVATION",1,0,'C',1,0);
	$this->SetXY(05,60); 
    $this->mysqlconnect();
    // $this->serologie('don',$date);
    // $this->serologie('mal',$date);
	$this->piedmdo();	
	}
	
	

	function maladie1($tab,$date,$germe)
    {
	$queryHVB = "SELECT * from don where DATEDON>='$date'  and   $germe='Positif' order by DATEDON asc ";
	$resultatHVB=mysql_query($queryHVB);
	$totalmbrHVB=mysql_num_rows($resultatHVB);
	while($rowHVB=mysql_fetch_object($resultatHVB))
	  {
		$this->cell(20,10,$rowHVB->id,1,0,'C',0);
		$this->cell(60,10,Trim($this->nbrtostring('mvc','dnr','id',$rowHVB->IDDNR,'NOM'))."_".Trim($this->nbrtostring('mvc','dnr','id',$rowHVB->IDDNR,'PRENOM')),1,0,'L',0);
		$this->cell(60,10,Trim($this->nbrtostring('mvc','dnr','id',$rowHVB->IDDNR,'ADRESSE')),1,0,'L',0);
		$this->cell(10,10,$rowHVB->AGEDNR,1,0,'C',0);
		$this->cell(10,10,Trim($rowHVB->SEXEDNR),1,0,'C',0);
		$this->cell(50,10,'ELISA',1,0,'C',0); 
		
		 if (Trim($rowHVB->$germe)=='Positif')
			  {
				  if($germe =='HVB')
				  {
				  $this->cell(45,10,'VHB',1,0,'C',0);
				  }
				  if($germe =='HVC')
				  {
				  $this->cell(45,10,'VHC',1,0,'C',0);
				  }
				  if($germe =='HIV')
				  {
				  $this->cell(45,10,'HIV',1,0,'C',0);
				  }
				  if($germe =='TPHA')
				  {
				  $this->cell(45,10,'Syphilis',1,0,'C',0);
				  } 
				  
			  }
		// $this->cell(45,10,'VHB',1,0,'C',0);
		$this->cell(30,10,'***',1,0,'C',0);
		$this->SetXY(05,$this->GetY()+10); 
	  }
	
	}
	
	function serologie1($tab,$date)
    {
	$this->maladie1($tab,$date,'HVB');
	$this->maladie1($tab,$date,'HVC');
	$this->maladie1($tab,$date,'HIV');
	$this->maladie1($tab,$date,'TPHA');
	}
	
	function MDO5($date)
    {
	$this->entetemdo("ANNEXE V - CIRCULAIRE N° 1126 /MSP/DP/SDPG... DU 17 NOVEMBER 1990");                                                                            
	$h=50;
	$this->SetXY(005,$h);$this->cell(20,10,"N°",1,0,'C',1,0);
	$this->SetXY(25,$h);$this->cell(60,10,"NOM ET PRENOM",1,0,'C',1,0);
	$this->SetXY(85,$h);$this->cell(60,10,"ADRESSE",1,0,'C',1,0);
	$this->SetXY(145,$h);$this->cell(10,10,"AGE",1,0,'C',1,0);
	$this->SetXY(155,$h);$this->cell(10,10,"SEXE",1,0,'C',1,0);
	$this->SetXY(165,$h);$this->cell(50,10,"MODE DE CONFIRMATION",1,0,'C',1,0);
	$this->SetXY(215,$h);$this->cell(45,10,"GERME EN CAUSE ",1,0,'C',1,0);
	$this->SetXY(260,$h);$this->cell(30,10,"EVOLUTION ",1,0,'C',1,0);
	$this->SetXY(05,60); 
	$this->mysqlconnect();
	$this->serologie1('don',$date);  
	$this->piedmdo();	
	}
	function piedmdo()
    {
	$this->SetXY(30,$this->GetY()); 	  
	$this->cell(120,15," NOM ET QUALITE DU SIGNATAIRE",0,0,'C',0);
	$this->SetXY(30,$this->GetY()); 	  
	$this->cell(320,15," FAIT A AIN OUSSERA LE : ".DATE('d-m-Y'),0,0,'C',0);	
	$this->SetXY(30,$this->GetY()+4); 	  
	$this->cell(120,15,"DR TIBA PTS AIN OUSSERA ",0,0,'C',0);
	$this->Output();	
	}
	
	
	//****************************************carte donneur receveur ******************************************************************//
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
	$this->Text(80,84,"Numéro d'identification du donneur:");//
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
	$query4 = "select * from DNR WHERE  id = '$IDDNR'";
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
	function CARTDNRPDF($idon,$TYPECARTE)
    {
	$this->mysqlconnect();
	$query0 = "select * from DNR WHERE  id = '$idon'";
	$resultat0=mysql_query($query0);
	$row0 = mysql_fetch_array($resultat0); 
	$IDDNR=$row0['id'];
	//1ere page droite
	$this->entetecarte($IDDNR,$TYPECARTE);
	//1ere page gauche
	$this->RoundedRect(1, 1, 70, 100, 2, $style = '');
	$h=01;
	$this->SetXY(01,$h); 	  
	$this->cell(23,05,"Date",1,0,'C',0);
	$this->SetXY(01+23,$h); 	  
	$this->cell(24,05,"N°poche",1,0,'C',0);
	$this->SetXY(01+23+24,$h); 	  
	$this->cell(23,05,"TA",1,0,'C',0);
	$this->SetXY(01,06); // marge sup 13
	$query1 = "select DATEDON,IDP,TAS,TAD,IDDNR,id from don WHERE  IDDNR='$IDDNR'  order by  id asc    LIMIT 15, 30 ";
	$resultat1=mysql_query($query1);
	$totalmbr1=mysql_num_rows($resultat1);
	while($row1=mysql_fetch_object($resultat1))
	  {
	   $this->cell(23,5,$this->dateUS2FR($row1->DATEDON),1,0,'L',0);//5  =hauteur de la cellule origine =7
	   $this->cell(24,5,$row1->id,1,0,'C',0);
	   $this->cell(23,5,$row1->TAS,1,0,'C',0);
	   $this->SetXY(01,$this->GetY()+5); 
	  }
	for( $compteur = 0 ; $compteur < 19-$totalmbr1 ; $compteur++)
	  {
	   $this->cell(23,5,'',1,0,'L',0);
	   $this->cell(24,5,'',1,0,'C',0);
	   $this->cell(23,5,'',1,0,'C',0);
	   $this->SetXY(01,$this->GetY()+5); 
	  } 
	//2eme page
	//face gauche 
    $this->ENTETECARTDNRPDF1($IDDNR);
	//face droite 
	$this->RoundedRect(78, 1, 70, 100, 2, $style = '');
	$h=15.8;
	$this->SetXY(78,$h); 	  
	$this->cell(23,05,"Date",1,0,'C',0);
	$this->SetXY(78+23,$h); 	  
	$this->cell(24,05,"N°poche",1,0,'C',0);
	$this->SetXY(78+23+24,$h); 	  
	$this->cell(23,05,"TA",1,0,'C',0);
	$this->SetXY(78,20.8); 
	$query2 = "select DATEDON,IDP,TAS,TAD,IDDNR,id from don WHERE  IDDNR='$IDDNR' order by  id asc LIMIT 0, 15 ";
	$resultat2=mysql_query($query2);
	$totalmbr2=mysql_num_rows($resultat2);
	while($row2=mysql_fetch_object($resultat2))
	  {
	   $this->cell(23,5,$this->dateUS2FR($row2->DATEDON),1,0,'L',0);
	   $this->cell(24,5,$row2->IDP,1,0,'C',0);
	   $this->cell(23,5,$row2->TAS.'/'.$row2->TAD,1,0,'C',0);
	   $this->SetXY(78,$this->GetY()+5); 
	  } 
	 for( $compteur = 0 ; $compteur < 16-$totalmbr2 ; $compteur++)
	  {
	   $this->cell(23,5,'',1,0,'L',0);
	   $this->cell(24,5,'',1,0,'C',0);
	   $this->cell(23,5,'',1,0,'C',0);
	   $this->SetXY(78,$this->GetY()+5); 
	  }
	$query3 = "select DATEDON,IDP,TAS,TAD,IDDNR,id from don WHERE  IDDNR='$IDDNR' order by id asc LIMIT 0, 1 ";
	$resultat3=mysql_query($query3);
	$row3 = mysql_fetch_array($resultat3); 
	$datedon=$row3['DATEDON'];
	$this->Text(82,8,"Date Du Premier Don:");
	$this->Text(120,8,$this->dateUS2FR($datedon));
	$this->Text(82,13,"Nombre De Don Antérieur:");
	$this->Text(128,13,$totalmbr2);
	$this->Output();
	}
	function CARTABORDNR($idon,$TYPECARTE)
    {
	$this->mysqlconnect();
	$query1 = "select * from DNR WHERE  id = '$idon'";
	$resultat1=mysql_query($query1);
	$row = mysql_fetch_array($resultat1); 
	$IDDNR=$row['id'];//1ere page droite
	$this->entetecarte($IDDNR,$TYPECARTE);//1ere page gauche
	$this->RoundedRect(1, 1,70, 100 ,2, $style = '');
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
	$this->Line(1 ,88 ,71 ,88 );//2eme pageface gauche
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
	//**********************************************fiche donneur********************************************************************//
	function entetepage1($titre)
    {
	$this->AddPage('L','A4');
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('Arial','B',10);
	$this->Image('../public/IMAGES/photos/logoao.gif',90,0,15,15,0);
	$this->Text(5,5+3,'AGENCE REGIONALE DE :'.$this->nbrtostring($this->db_name,"ars","IDARS",$this->REGION(),"WILAYAS"));$this->Text(150,5," UTILISATEUR :".$this->USER());
	$this->Text(5,10+3,'WILAYA DE :'.$this->nbrtostring($this->db_name,"wrs","IDWIL",$this->WILAYA(),"WILAYAS"));         $this->Text(150,10," DATE : ".date ('d-m-Y'));
	$this->Text(5,15+3,'STRUCTURE DE TRANSFUSION SANGUINE :'.$this->nbrtostring($this->db_name,"cts","IDCTS",$this->STRUCTURE(),"CTS"));
	$this->SetFont('Arial','B',20);
	$this->SetTextColor(225,0,0);
	$this->SetXY(5,23);	$this->cell(285,10,$titre,1,0,'C',0);
	$this->SetTextColor(0,0,0);
	$this->SetFont('Arial','B',10);
    }
	function entetepage($titre)
    {
	$this->AddPage('p','A4');
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('Arial','B',10);
	$this->Image('../public/IMAGES/photos/logoao.gif',90,0,15,15,0);
	$this->Text(5,5+3,'AGENCE REGIONALE DE : '.$this->nbrtostring($this->db_name,"ars","IDARS",$this->REGION(),"WILAYAS"));$this->Text(150,5," UTILISATEUR : Dr ".$this->USER());
	$this->Text(5,10+3,'WILAYA DE : '.$this->nbrtostring($this->db_name,"wrs","IDWIL",$this->WILAYA(),"WILAYAS"));         $this->Text(150,10," DATE : ".date ('d-m-Y'));
	$this->Text(5,15+3,'STRUCTURE DE TRANSFUSION SANGUINE : '.$this->nbrtostring($this->db_name,"cts","IDCTS",$this->STRUCTURE(),"CTS"));
	$this->SetFont('Arial','B',20);
	$this->SetTextColor(225,0,0);
	$this->SetXY(5,23);				 
    $this->cell(200,10,$titre,1,0,'C',0);
	$this->SetTextColor(0,0,0);
	$this->SetFont('Arial','B',10);
    }
	function FDNRPDF($IDDNR) 
	{
	$this->entetepage("FICHE DONNEUR");
	$this->mysqlconnect();
	$query1 = "select * from DNR WHERE  id = '$IDDNR'";
	$resultat1=mysql_query($query1);
	$row = mysql_fetch_array($resultat1); // $IDDNR=$row['IDDNR'];
	$this->RoundedRect($x=5, $y=36, $w=200, $h=30, $r=2, $style = '');
	$this->Text(5,40,"Numero D identification : ");
	$this->Text(5,50,"Structure de Transfusion Sanguine : ");
	$this->Text(5,55,$this->nbrtostring($this->db_name,"cts","IDCTS",$this->STRUCTURE(),"CTS").' Wilaya de '.$this->nbrtostring($this->db_name,"wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(150,40,"Groupage ABO : ");$this->Text(150,45,"Groupage Rhesus : ");
	$this->Text(150,50,"Autres : ");
    $this->Text(164,50,"D..C..c..E..e..K..");
    $this->Line(5 ,70 ,200 ,70 );
    $this->RoundedRect($x=5, $y=74, $w=200, $h=30, $r=2, $style = '');
    $this->Text(5,80,"Nom :");
	$this->Text(84,80,"Prénom :");
	$this->Text(165,80,"Sexe :");
	$this->Text(5,90,"Né(e)le :");
	$this->Text(165,90,"Age :");
	$this->Line(5 ,108 ,200 ,108);
	$this->RoundedRect($x=5, $y=112, $w=200, $h=30, $r=2, $style = '');
	$this->Text(5,110+8,"Wilaya de naissance :");
	$this->Text(84,110+8,"Commune de naissance :");
	$this->Text(5,120+8,"Wilaya de residence :");
	$this->Text(84,120+8,"Commune de residence :");
	$this->Text(5,130+8,"Adresse de residence :");
	$this->Text(165,130+8,"Tél :");
	$this->Text(172,130+8,"");
	$this->Line(5 ,146 ,200 ,146 );
	$this->SetTextColor(225,0,0);
	$this->Text(50,40,$row['id']);
	$this->Text(5,60,"Date : ".date('d/m/Y'));
	$this->Text(178,40,$row['GRABO']);
	$this->Text(183,45,$row['GRRH']);
	$this->Text(16,80,$row['NOM']);
	$this->Text(101,80,$row['PRENOM']);
	$this->Text(176,80,$row['SEX']);
	$this->Text(20,90,$row['DATENAISSANCE']);
	$this->Text(175,90,substr(date('Y-m-d'),0,4)-substr($row['DATENAISSANCE'],6,4)." ans");
	$this->Text(42,110+8,$this->nbrtostring($this->db_name,"wil","IDWIL",$row['WILAYA'],"WILAYAS"));$this->Text(84+43,110+8,$this->nbrtostring($this->db_name,"com","IDCOM",$row['COMMUNE'],"COMMUNE"));
	$this->Text(42,120+8,$this->nbrtostring($this->db_name,"wil","IDWIL",$row['WILAYAR'],"WILAYAS"));$this->Text(84+43,120+8,$this->nbrtostring($this->db_name,"com","IDCOM",$row['COMMUNER'],"COMMUNE"));
	$this->Text(44,130+8,$row['ADRESSE']);
	$this->Text(173,130+8,$row['TELEPHONE']);
	$this->SetTextColor(0,0,0);
	$h=150;
	$this->SetXY(05,$h); 	  
	$this->cell(20,05,"Date",1,0,'C',0);
	$this->SetXY(25,$h); 	  
	$this->cell(22,05,"Lieu du don ",1,0,'C',0);
	$this->SetXY(47,$h); 	  
	$this->cell(44,05,"N° de poche ",1,0,'C',0);
	$this->SetXY(91,$h); 	  
	$this->cell(20,05,"TA",1,0,'C',0);
	$this->SetXY(111,$h); 	  
	$this->cell(20,05,"Poids",1,0,'C',0);
	$this->SetXY(131,$h); 	  
	$this->cell(30,05,"Volume a preleve",1,0,'C',0);
	$this->SetXY(161,$h); 	  
	$this->cell(44,05,"Observation",1,0,'C',0);
	$this->SetXY(5,155); // marge sup 13
	$query = "select DATEDON,STR,id,IDP,TAS,TAD,POIDS from don WHERE  IDDNR = '$IDDNR'  order by  id   ";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	  {
	   $this->cell(20,5,$this->dateUS2FR($row->DATEDON) ,1,0,'L',0);//5  =hauteur de la cellule origine =7
	   $this->cell(22,5,$row->STR,1,0,'L',0);
	   $this->cell(44,5,$row->IDP,1,0,'C',0);
	   $this->cell(20,5,$row->TAS."/".$row->TAS,1,0,'C',0);
	   $this->cell(20,5,$row->POIDS,1,0,'C',0);
	   $this->cell(30,5,$row->POIDS*8,1,0,'C',0);
	   $this->cell(44,5,'RAS',1,0,'C',0);
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
	$this->Code39(5, $this->GetY()+10, $IDDNR, $baseline=0.5, $height=16);
	$this->Output();
	}
	//**************************************************************************************************************************//
	function ENTETEPEC() 
	{
	$this->mysqlconnect();
	$this->AddPage('p','A4');
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('Arial','B',12);
	$this->RoundedRect(5,4,202,290, 2, $style = '');
	$this->Text(45,15,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE   ");
	$this->Text(20,20,"MINSTERE DE LA SANTE DE LA POPUALATION ET DE LA REFORME HOSPITALIERE ");
	$this->Text(30,25,"DIRECTION DE LA SANTE DE LA POPULATION DE LA WILAYA DE DJELFA  ");
	$this->Text(50,30,"ETABLISSEMENT PUBLIC HOSPITALIER AIN OUSSERA  ");
	$this->SetFont('Arial','B',16);
	$this->Text(40,50,"FICHE DE TRANSFERT ET DE PRISE EN CHARGE ");
	$this->SetFont('Arial','B',12);
	$this->Text(6,70,"IDENTIFICATION DE L ETABLISSEMENT : EPH AIN OUSSERA ");
	$this->Text(6,80,"IDENTIFICATION DU SERVICE : POSTE DE TRANSFUSION SANGUINE  ");
	$this->Text(70,100," IDENTIFICATION DU MALADE ");
	$this->Text(6,110,"Nom:");
	$this->Text(84,110,"Prénom:");
	$this->Text(165,110,"Sexe:");
	$this->Text(6,120,"fils(fille)de :");
	$this->Text(84,120,"et de:");
	$this->Text(6,130,"Né(e)le: ");
	$this->Text(165,130,"Age:");
	$this->Text(6,140,"Profession : sans profession");
	$this->Text(6,160,"N Securite sociale : ");
	$this->Text(76,180," MOTIF DE TRANSFERT ");
	$this->Text(8,185,"......................................................................................................................................................................");
	$this->Text(8,195,"......................................................................................................................................................................");
	$this->Text(8,200,"......................................................................................................................................................................");
	$this->Text(60,220," IDENTIFICATION  DU CENTRE D'ACCEUIL");
	$this->Text(8,225,"......................................................................................................................................................................");
	$this->Text(8,230,"...........................................Institut Pasteur D'Algerie Annexe De Sidi Fredj...........................................");
	$this->Text(8,235,"......................................................................................................................................................................");
	$this->Text(6,260,"Le Medecin ");
	$this->Text(130,260,"Ain oussera le :".date("d-m-Y"));
	$this->Text(150,270,"Le directeur ");
	}
	
	
	function FHVB($IDDNR) 
	{
	$this->ENTETEPEC(); 
	
	$query1 = "select * from DNR WHERE  id = '$IDDNR'";
	$resultat1=mysql_query($query1);
	$row = mysql_fetch_array($resultat1); 
	$this->Text(18,110,$row['NOM']);
	$this->Text(102,110,$row['PRENOM']);
	$this->Text(177,110,$row['SEX']);
	$this->Text(22,130,$row['DATENAISSANCE']);
	$this->Text(175,130,substr(date('Y-m-d'),0,4)-substr($row['DATENAISSANCE'],6,4)." Ans");
	$this->Text(6,150,"Adresse : ".$this->nbrtostring($this->db_name,"wil","IDWIL",$row['WILAYAR'],"WILAYAS").'/'.$this->nbrtostring($this->db_name,"com","IDCOM",$row['COMMUNER'],"COMMUNE").'/'.$row['ADRESSE']);
	$datejour=date("d-m-Y");
	$anne=substr($datejour,6,4);
	$this->Text(6,170,"N°du prelevement : ".$row['id']."/".$anne);
	$this->Text(8,190,"....................................................Confirmation HEPATITE VIRALE B.......................................................");
	
	$this->AddPage('p','A4');
	$this->Image('../public/IMAGES/photos/ipa.jpg',90,10,15,15,0);
	$this->Text(15,15,"INSTITUT PASTEUR D ALGERIE   ");$this->Text(142,15,"service de virologie humaine  ");
	$this->Text(25,20,"Annexe de sidi fredj   ");      $this->Text(138,20,"laboratoire des hepatites virales  ");												   $this->Text(136,25," Tél:021 37 68 50 Fax:021 37 76 47   ");
	$this->Text(45,35,"FICHE DE RENSIEGNEMENTS DES HEPATITES VIRALES B");
	$this->RoundedRect(5,40,202,34, 2, $style = '');
	$this->Text(8,45,"Identification du patient");$this->Text(80,45,"Date:".DATE('d-m-Y'));$this->Text(120,45,"Identification du service demandeur");
	$this->Text(8,50,"Nom et Prenom:".trim($row['NOM'])."_".trim($row['PRENOM']));                $this->Text(120,50,"Nom du médecin:"."Dr Tiba");
	$this->Text(8,55,"Nom de Jeune fille:");                                                      $this->Text(120,55,"Service:"."Poste De Transfusion Sanguine ");
	$this->Text(8,60,"Date de naissance:".$row['DATENAISSANCE']);                                 $this->Text(120,60,"Structure:"."EPH Ain Ousserra");
	$this->Text(8,65,"Etat civil:"."marie(e):   "."  célibataire:");                              $this->Text(120,65,"Tel/fax:027/82/21/37 poste 34");
	$this->Text(8,70,"Tel:".$row['TELEPHONE'] );                                                  $this->Text(120,70,"E-mail:tibaredha@yahoo.fr");
	$this->RoundedRect(5,76,202,7, 2, $style = '');
	$this->Text(8,130,"hepatite virale B: preciser la periode précédant les symptomes de 6 semaines a 6 mois:");
	$this->Text(8,80,"Analyse demandées: Ag_HBS / Ac_HBS / Ag_HBE / Ac_HBE / Ac_HBC ."); 
	$this->Text(68,105,"Hepatite virale B"); 
	$this->RoundedRect(5,85,202,22, 2, $style = '');  
	$this->Text(8,90,"Renseignements Cliniques:");
	$this->Text(8,95,"Date de debut de la maladie:I__I__I____I");$this->Text(110,95,"Date du dernier bilan hépatique:I__I__I____I");
	$this->Text(8,100,"Signes cliniques:");$this->Text(110,100,"normal:O");$this->Text(140,100,"perturbé:O");
	$this->Text(8,105,"Diagnostic clinique suspecté:");$this->Text(110,105,"Valeurs des transaminases : I_______I");
	$this->RoundedRect(5,110,202,170, 2, $style = ''); 
	$this->Text(8,115,"renseignements épidemiologique :");
	$this->Text(8,140,"est ce que le patient a été:");
	$this->Text(10,150,"o en contact avec une personne présentant une HV aigue ou chronique (suspectée ou confirmée)?");
	$this->Text(12,160,"si oui,quel type de contact:");
	$this->Text(110,160,"sexuelle:O");
	$this->Text(140,160,"familialle:O");
	$this->Text(180,160,"autres:O");
	$this->Text(10,170,"o hémodialisé?");
	$this->Text(12,180,"si oui preciser la date de la 1ere dialyse:I__I__I____I");
	$this->Text(140,170,"oui:O");
	$this->Text(160,170,"non:O");
	$this->Text(180,170,"ind:O");
	$this->Text(10,190,"o transfusé?");
	$this->Text(12,200,"si oui preciser la date de la transfusion:I__I__I____I");
	$this->Text(140,190,"oui:O");
	$this->Text(160,190,"non:O");
	$this->Text(180,190,"ind:O");
	$this->Text(10,210,"o traité pour une infection sexuellement transmissible?");
	$this->Text(12,220,"si oui préciser la date du dernier traitement:I__I__I____I");
	$this->Text(140,210,"oui:O");
	$this->Text(160,210,"non:O");
	$this->Text(180,210,"ind:O");
	$this->Text(10,230,"o recus des soins dentaires ou ORl ou fait des examens invasifs ");
	$this->Text(12,240,"si oui préciser la date:I__I__I____I ");
	$this->Text(140,230,"oui:O");
	$this->Text(160,230,"non:O");
	$this->Text(180,230,"ind:O");
	$this->Text(10,250,"o hospitalisé?");
	$this->Text(12,260,"si oui préciser la date:I__I__I____I  ");
	$this->Text(140,250,"oui:O");
	$this->Text(160,250,"non:O");
	$this->Text(180,250,"ind:O");
	$this->Text(10,270,"o toxicomanie IV nasale?");
	$this->Text(140,270,"oui:O");
	$this->Text(160,270,"non:O");
	$this->Text(180,270,"ind:O");
	$this->SetFont('Arial','B',10);
	//****************FICHE DE RENSIEGNEMENTS DES HEPATITES VIRALES B&C ******************************************//
	$this->AddPage('p','A4');$this->Image('../public/IMAGES/photos/ipa.jpg',90,10,15,15,0);
	$this->Text(45,35,"FICHE DE RENSIEGNEMENTS DES HEPATITES VIRALES B  ");
	$this->RoundedRect(5, 40, 200, 136, 2, $style = ''); 
	$this->Text(8,50,"le patient travail-t-il dans une structure:");
	$this->Text(10,60,"o medicale l'exposant directement au sang hummain ?");
	$this->Text(140,60,"oui:O");
	$this->Text(160,60,"non:O");
	$this->Text(180,60,"ind:O");
	$this->Text(10,70,"o publique ou de secours (pompier,secouriste,etc)?");
	$this->Text(140,70,"oui:O");
	$this->Text(160,70,"non:O");
	$this->Text(180,70,"ind:O");
	$this->Text(12,80,"si oui combien de fois a-t-il été exposé ? :I____I ");
	$this->Text(8,90,"le patient a-t-il fait un:");
	$this->Text(110,90,"sacarification:O");
	$this->Text(140,90,"percing:O");
	$this->Text(180,90,"tatouage:O");
	$this->Text(8,100,"le patient est il vacciné contre l'hepatit B :");
	$this->Text(140,100,"oui:O");
	$this->Text(160,100,"non:O");
	$this->Text(180,100,"ind:O");
	$this->Text(12,110,"si oui la date de la vaccination: 1er dose:I__I__I____I  2eme dose:I__I__I____I  3eme dose:I__I__I____I  ");
	$this->Text(8,120,"la femme enceinte a-t-elle été confirmée AGHBS positif pendant la grossesse :");
	$this->Text(140,120,"oui:O");
	$this->Text(160,120,"non:O");
	$this->Text(180,120,"ind:O");
	$this->Text(12,130,"si oui preciser la date de la contamination de AGHBS :I__I__I____I");
	$this->Text(8,140,"le nouveau né a-t-il été vacciné :");
	$this->Text(140,140,"oui:O");
	$this->Text(160,140,"non:O");
	$this->Text(180,140,"ind:O");
	$this->Text(12,150,"si oui la date de la vaccination: 1er dose:I__I__I____I  2eme dose:I__I__I____I  3eme dose:I__I__I____I  ");
	$this->Text(12,160,"a t il recu des immunoglobuline specifiques HBIG ?");
	$this->Text(140,160,"oui:O");
	$this->Text(160,160,"non:O");
	$this->Text(180,160,"ind:O");
	$this->Text(12,170,"si oui preciser la date :I__I__I____I  ");
	$this->RoundedRect(5, 180, 200, 50, 2, $style = '');
	$this->Text(12,190," NB:si des analyse similaires ont deja été effectuées a l IPA rappeler obligatoirement");
	$this->Text(12,200," leurs numeros d'ordre ou bien les joindre a la fiche de renseignements");
	$this->Text(12,210," tout prelevement doit obligatoirement etre acccompazgné d'une fiche de renseignements");
	$this->Text(12,220," correctement remple ,d'un bon de paiment ou d'une prise en charge du service demandeur.");
	$this->Text(140,260," Le Médecin ");
	//**************FICHE DE RENSIEGNEMENTS CHARGE VIRALE HEPATITE B&C     en cours de realisation *******************************************//
	$this->AddPage('p','A4');
	$this->Image('../public/IMAGES/photos/ipa.jpg',90,10,15,15,0);
	$this->Text(15,15,"Institut Pasteur d'Algerie   ");            $this->Text(142,15,"Service de Virologie Humaine  ");
	$this->Text(15,20,"Annexe de sidi fredj   ");                  $this->Text(142,20,"Laboratoire Des Hepatites Virales  ");
	$this->Text(15,25,"Tél:021-37-68-50 poste 109");               $this->Text(142,25,"Fax:021-37-76-47");
	$this->Text(52,35,"FICHE DE RENSIEGNEMENTS CHARGE VIRALE HEPATITE B   ");
	$this->SetFont('Arial','B',12);
	$this->RoundedRect(5,40,202,34, 2, $style = '');
	$this->Text(8,45,"Identification du patient");$this->Text(80,45,"Date:".DATE('d-m-Y'));$this->Text(120,45,"Identification du service demandeur");
	$this->Text(8,50,"Nom et Prenom:".trim($row['NOM'])."_".trim($row['PRENOM']));$this->Text(100,50,"Sexe:".$row['SEX']);   $this->Text(120,50,"Nom du médecin:"."Dr Tiba");
	$this->Text(8,55,"Nom de Jeune fille:");                                           $this->Text(120,55,"Service:"."Poste De Transfusion Sanguine ");
	$this->Text(8,60,"Date de naissance:".$row['DATENAISSANCE']);                         $this->Text(120,60,"Structure:"."EPH Ain Ousserra");
	$this->Text(8,65,"Etat civil:"."marie(e):   "."  célibataire:");                      $this->Text(120,65,"Tel/fax:027/82/21/37 poste 34");
	$this->Text(8,70,"Tel:".$row['TELEPHONE']);                                           $this->Text(120,70,"E-mail:tibaredha@yahoo.fr");
	$this->RoundedRect(5,75,202,28, 2, $style = '');  
	$this->Text(8,80,"Renseignements Cliniques:");
	$this->Text(8,85,"Stade De La Maladie Hépatique:     HC asymptomatique         HC active          cirhose          CHC");
	$this->Text(8,90,"Génotypage:");
	$this->Text(8,95,"Charge Virales Anterieures:");$this->Text(90,95,"Oui           Non");
	$this->Text(8,100,"PBH:");                              $this->Text(90,100,"Oui           Non               stade:");
	$this->RoundedRect(5,75+29,202,34, 2, $style = ''); 
	$this->Text(8,109,"Traitement VHB/VHC:");               $this->Text(90,109,"Oui           Non");
	$this->Text(8,115,"Durée du Traitement:");
	$this->Text(8,120,"Molécules antivirales:");
	$this->Text(8,125,"Echec thérapeutique:");              $this->Text(90,125,"Oui           Non");
	$this->Text(8,130,"Antécedents Personnels:");           
	$this->Text(8,135,"Antécedents Familiaux d'hepatites:");$this->Text(90,135,"Oui           Non");
	$this->RoundedRect(5,139,141,34, 2, $style = ''); $this->RoundedRect(147,139,60,34, 2, $style = ''); 
	$this->Text(8,144,"Facteurs de risque :");$this->Text(147,144," Autres Facteurs de risque :");
	$this->Text(8,150,"Hemodialyse :");               $this->Text(80,150,"Soins Dentaires Régulirs :");         $this->Text(147,150," Alcool :");
	$this->Text(8,155,"Transfusion sanguine :");      $this->Text(80,155,"Soins Dentaires Occasionnels :");     $this->Text(147,155," Diabete :");
	$this->Text(8,160,"Piercing :");                  $this->Text(80,160,"ATCD Chirurgicaux :");                $this->Text(147,160," Obesite :");
	$this->Text(8,165,"Tatouage :");                  $this->Text(80,165,"Toxicomanie IV :");                   $this->Text(147,165," Tabac :");
	$this->Text(8,170,"Professionnel de la sante :"); $this->Text(80,170,"ATCD IST :");     
	$this->RoundedRect(5,174,100,70, 2, $style = '');$this->RoundedRect(106,174,100,70, 2, $style = '');
	$this->Text(8,180,"MARQUEURS VIROLOGIQUE :");    $this->Text(107,180,"BILAN BIOLOGIQUE :");
	$this->Text(8,190,"Ag HBs");                     $this->Text(107,190,"ALAT ");     
	$this->Text(8,195,"Ac anti-HBs");                $this->Text(107,195,"ASAT ");     
	$this->Text(8,200,"Ac anti-HBc");                $this->Text(107,200,"Gamma GT ");     
	$this->Text(8,205,"Ag HBe");                     $this->Text(107,205,"phosphatase alcaline");     
	$this->Text(8,210,"Ac anti-HBe");                $this->Text(107,210,"albumine");     
	$this->Text(8,215,"charge virale VHB");          $this->Text(107,215,"bilirubine total");     
	$this->Text(8,220,"Ac anti-VHD");                $this->Text(107,220,"alfa foeto proteine ");     
	$this->Text(8,225,"Ac anti-VHC");                $this->Text(107,225,"creatinine");     
	$this->Text(8,230,"charge virale VHC");          $this->Text(107,230,"palaquettes");     
	$this->Text(8,235,"Ac anti-VIH");                $this->Text(107,235,"taux de prothrombine");     
													 $this->Text(107,240,"fibrinogene");												
	$this->SetFont('Arial','B',9);												
	$this->Text(12,250," NB:si des analyse similaires ont deja été effectuées a l'IPA rappeler obligatoirement");
	$this->Text(12,255," leurs numeros d'ordre ou bien les joindre a la fiche de renseignements");
	$this->Text(12,260," tout prelevement doit obligatoirement etre acccompagné d'une fiche de renseignements");
	$this->Text(12,265," correctement remplie ,d'un bon de paiment ou d'une prise en charge du service demandeur.");
	$this->SetFont('Arial','B',12);
	$this->Text(140,270," le medecin ");
	$this->Text(142,275," DR TIBA ");
	$this->Output();
	}
	function FHVC($IDDNR) 
	{
	$this->ENTETEPEC(); 
	$query1 = "select * from DNR WHERE  id = '$IDDNR'";
	$resultat1=mysql_query($query1);
	$row = mysql_fetch_array($resultat1); 
	$this->Text(18,110,$row['NOM']);
	$this->Text(102,110,$row['PRENOM']);
	$this->Text(177,110,$row['SEX']);
	$this->Text(22,130,$row['DATENAISSANCE']);
	$this->Text(175,130,substr(date('Y-m-d'),0,4)-substr($row['DATENAISSANCE'],6,4)." Ans");
	$this->Text(6,150,"Adresse : ".$this->nbrtostring($this->db_name,"wil","IDWIL",$row['WILAYAR'],"WILAYAS").'/'.$this->nbrtostring($this->db_name,"com","IDCOM",$row['COMMUNER'],"COMMUNE").'/'.$row['ADRESSE']);
	$datejour=date("d-m-Y");
	$anne=substr($datejour,6,4);
	$this->Text(6,170,"N°du prelevement : ".$row['id']."/".$anne);
	$this->Text(8,190,"....................................................Confirmation HEPATITE VIRALE C.......................................................");
	
	$this->AddPage('p','A4');
	$this->Image('../public/IMAGES/photos/ipa.jpg',90,10,15,15,0);
	$this->Text(15,15,"INSTITUT PASTEUR D ALGERIE   ");$this->Text(142,15,"service de virologie humaine  ");
	$this->Text(25,20,"Annexe de sidi fredj   ");      $this->Text(138,20,"laboratoire des hepatites virales  ");												   $this->Text(136,25," Tél:021 37 68 50 Fax:021 37 76 47   ");
	$this->Text(45,35,"FICHE DE RENSIEGNEMENTS DES HEPATITES VIRALES C  ");
	$this->RoundedRect(5,40,202,34, 2, $style = '');
	$this->Text(8,45,"Identification du patient");$this->Text(80,45,"Date:".DATE('d-m-Y'));$this->Text(120,45,"Identification du service demandeur");
	$this->Text(8,50,"Nom et Prenom:".trim($row['NOM'])."_".trim($row['PRENOM']));                $this->Text(120,50,"Nom du médecin:"."Dr Tiba");
	$this->Text(8,55,"Nom de Jeune fille:");                                                      $this->Text(120,55,"Service:"."Poste De Transfusion Sanguine ");
	$this->Text(8,60,"Date de naissance:".$row['DATENAISSANCE']);                                 $this->Text(120,60,"Structure:"."EPH Ain Ousserra");
	$this->Text(8,65,"Etat civil:"."marie(e):   "."  célibataire:");                              $this->Text(120,65,"Tel/fax:027/82/21/37 poste 34");
	$this->Text(8,70,"Tel:".$row['TELEPHONE'] );                                                  $this->Text(120,70,"E-mail:tibaredha@yahoo.fr");
	$this->RoundedRect(5,76,202,7, 2, $style = '');
	$this->Text(8,130,"hepatite virale C: preciser la periode précédant les symptomes de 6 semaines a 6 mois:");
	$this->Text(8,80,"Analyse demandées: Ac_HCV ."); 
	$this->Text(68,105,"Hepatite virale C"); 
	$this->RoundedRect(5,85,202,22, 2, $style = '');  
	$this->Text(8,90,"Renseignements Cliniques:");
	$this->Text(8,95,"Date de debut de la maladie:I__I__I____I");$this->Text(110,95,"Date du dernier bilan hépatique:I__I__I____I");
	$this->Text(8,100,"Signes cliniques:");$this->Text(110,100,"normal:O");$this->Text(140,100,"perturbé:O");
	$this->Text(8,105,"Diagnostic clinique suspecté:");$this->Text(110,105,"Valeurs des transaminases : I_______I");
	$this->RoundedRect(5,110,202,170, 2, $style = ''); 
	$this->Text(8,115,"renseignements épidemiologique :");
	$this->Text(8,140,"est ce que le patient a été:");
	$this->Text(10,150,"o en contact avec une personne présentant une HV aigue ou chronique (suspectée ou confirmée)?");
	$this->Text(12,160,"si oui,quel type de contact:");
	$this->Text(110,160,"sexuelle:O");
	$this->Text(140,160,"familialle:O");
	$this->Text(180,160,"autres:O");
	$this->Text(10,170,"o hémodialisé?");
	$this->Text(12,180,"si oui preciser la date de la 1ere dialyse:I__I__I____I");
	$this->Text(140,170,"oui:O");
	$this->Text(160,170,"non:O");
	$this->Text(180,170,"ind:O");
	$this->Text(10,190,"o transfusé?");
	$this->Text(12,200,"si oui preciser la date de la transfusion:I__I__I____I");
	$this->Text(140,190,"oui:O");
	$this->Text(160,190,"non:O");
	$this->Text(180,190,"ind:O");
	$this->Text(10,210,"o traité pour une infection sexuellement transmissible?");
	$this->Text(12,220,"si oui préciser la date du dernier traitement:I__I__I____I");
	$this->Text(140,210,"oui:O");
	$this->Text(160,210,"non:O");
	$this->Text(180,210,"ind:O");
	$this->Text(10,230,"o recus des soins dentaires ou ORl ou fait des examens invasifs ");
	$this->Text(12,240,"si oui préciser la date:I__I__I____I ");
	$this->Text(140,230,"oui:O");
	$this->Text(160,230,"non:O");
	$this->Text(180,230,"ind:O");
	$this->Text(10,250,"o hospitalisé?");
	$this->Text(12,260,"si oui préciser la date:I__I__I____I  ");
	$this->Text(140,250,"oui:O");
	$this->Text(160,250,"non:O");
	$this->Text(180,250,"ind:O");
	$this->Text(10,270,"o toxicomanie IV nasale?");
	$this->Text(140,270,"oui:O");
	$this->Text(160,270,"non:O");
	$this->Text(180,270,"ind:O");
	$this->SetFont('Arial','B',10);
	//****************FICHE DE RENSIEGNEMENTS DES HEPATITES VIRALES B&C ******************************************//
	$this->AddPage('p','A4');$this->Image('../public/IMAGES/photos/ipa.jpg',90,10,15,15,0);
	$this->Text(45,35,"FICHE DE RENSIEGNEMENTS DES HEPATITES VIRALES C  ");
	$this->RoundedRect(5, 40, 200, 136, 2, $style = ''); 
	$this->Text(8,50,"le patient travail-t-il dans une structure:");
	$this->Text(10,60,"o medicale l'exposant directement au sang hummain ?");
	$this->Text(140,60,"oui:O");
	$this->Text(160,60,"non:O");
	$this->Text(180,60,"ind:O");
	$this->Text(10,70,"o publique ou de secours (pompier,secouriste,etc)?");
	$this->Text(140,70,"oui:O");
	$this->Text(160,70,"non:O");
	$this->Text(180,70,"ind:O");
	$this->Text(12,80,"si oui combien de fois a-t-il été exposé ? :I____I ");
	$this->Text(8,90,"le patient a-t-il fait un:");
	$this->Text(110,90,"sacarification:O");
	$this->Text(140,90,"percing:O");
	$this->Text(180,90,"tatouage:O");
	$this->Text(8,100,"le patient est il vacciné contre l'hepatit B :");
	$this->Text(140,100,"oui:O");
	$this->Text(160,100,"non:O");
	$this->Text(180,100,"ind:O");
	$this->Text(12,110,"si oui la date de la vaccination: 1er dose:I__I__I____I  2eme dose:I__I__I____I  3eme dose:I__I__I____I  ");
	$this->Text(8,120,"la femme enceinte a-t-elle été confirmée AGHBS positif pendant la grossesse :");
	$this->Text(140,120,"oui:O");
	$this->Text(160,120,"non:O");
	$this->Text(180,120,"ind:O");
	$this->Text(12,130,"si oui preciser la date de la contamination de AGHBS :I__I__I____I");
	$this->Text(8,140,"le nouveau né a-t-il été vacciné :");
	$this->Text(140,140,"oui:O");
	$this->Text(160,140,"non:O");
	$this->Text(180,140,"ind:O");
	$this->Text(12,150,"si oui la date de la vaccination: 1er dose:I__I__I____I  2eme dose:I__I__I____I  3eme dose:I__I__I____I  ");
	$this->Text(12,160,"a t il recu des immunoglobuline specifiques HBIG ?");
	$this->Text(140,160,"oui:O");
	$this->Text(160,160,"non:O");
	$this->Text(180,160,"ind:O");
	$this->Text(12,170,"si oui preciser la date :I__I__I____I  ");
	$this->RoundedRect(5, 180, 200, 50, 2, $style = '');
	$this->Text(12,190," NB:si des analyse similaires ont deja été effectuées a l IPA rappeler obligatoirement");
	$this->Text(12,200," leurs numeros d'ordre ou bien les joindre a la fiche de renseignements");
	$this->Text(12,210," tout prelevement doit obligatoirement etre acccompazgné d'une fiche de renseignements");
	$this->Text(12,220," correctement remple ,d'un bon de paiment ou d'une prise en charge du service demandeur.");
	$this->Text(140,260," Le Médecin ");
	//**************FICHE DE RENSIEGNEMENTS CHARGE VIRALE HEPATITE B&C     en cours de realisation *******************************************//
	$this->AddPage('p','A4');
	$this->Image('../public/IMAGES/photos/ipa.jpg',90,10,15,15,0);
	$this->Text(15,15,"Institut Pasteur d'Algerie   ");            $this->Text(142,15,"Service de Virologie Humaine  ");
	$this->Text(15,20,"Annexe de sidi fredj   ");                  $this->Text(142,20,"Laboratoire Des Hepatites Virales  ");
	$this->Text(15,25,"Tél:021-37-68-50 poste 109");               $this->Text(142,25,"Fax:021-37-76-47");
	$this->Text(52,35,"FICHE DE RENSIEGNEMENTS CHARGE VIRALE HEPATITE C   ");
	$this->SetFont('Arial','B',12);
	$this->RoundedRect(5,40,202,34, 2, $style = '');
	$this->Text(8,45,"Identification du patient");$this->Text(80,45,"Date:".DATE('d-m-Y'));$this->Text(120,45,"Identification du service demandeur");
	$this->Text(8,50,"Nom et Prenom:".trim($row['NOM'])."_".trim($row['PRENOM']));$this->Text(100,50,"Sexe:".$row['SEX']);   $this->Text(120,50,"Nom du médecin:"."Dr Tiba");
	$this->Text(8,55,"Nom de Jeune fille:");                                           $this->Text(120,55,"Service:"."Poste De Transfusion Sanguine ");
	$this->Text(8,60,"Date de naissance:".$row['DATENAISSANCE']);                         $this->Text(120,60,"Structure:"."EPH Ain Ousserra");
	$this->Text(8,65,"Etat civil:"."marie(e):   "."  célibataire:");                      $this->Text(120,65,"Tel/fax:027/82/21/37 poste 34");
	$this->Text(8,70,"Tel:".$row['TELEPHONE']);                                           $this->Text(120,70,"E-mail:tibaredha@yahoo.fr");
	$this->RoundedRect(5,75,202,28, 2, $style = '');  
	$this->Text(8,80,"Renseignements Cliniques:");
	$this->Text(8,85,"Stade De La Maladie Hépatique:     HC asymptomatique         HC active          cirhose          CHC");
	$this->Text(8,90,"Génotypage:");
	$this->Text(8,95,"Charge Virales Anterieures:");$this->Text(90,95,"Oui           Non");
	$this->Text(8,100,"PBH:");                              $this->Text(90,100,"Oui           Non               stade:");
	$this->RoundedRect(5,75+29,202,34, 2, $style = ''); 
	$this->Text(8,109,"Traitement VHB/VHC:");               $this->Text(90,109,"Oui           Non");
	$this->Text(8,115,"Durée du Traitement:");
	$this->Text(8,120,"Molécules antivirales:");
	$this->Text(8,125,"Echec thérapeutique:");              $this->Text(90,125,"Oui           Non");
	$this->Text(8,130,"Antécedents Personnels:");           
	$this->Text(8,135,"Antécedents Familiaux d'hepatites:");$this->Text(90,135,"Oui           Non");
	$this->RoundedRect(5,139,141,34, 2, $style = ''); $this->RoundedRect(147,139,60,34, 2, $style = ''); 
	$this->Text(8,144,"Facteurs de risque :");$this->Text(147,144," Autres Facteurs de risque :");
	$this->Text(8,150,"Hemodialyse :");               $this->Text(80,150,"Soins Dentaires Régulirs :");         $this->Text(147,150," Alcool :");
	$this->Text(8,155,"Transfusion sanguine :");      $this->Text(80,155,"Soins Dentaires Occasionnels :");     $this->Text(147,155," Diabete :");
	$this->Text(8,160,"Piercing :");                  $this->Text(80,160,"ATCD Chirurgicaux :");                $this->Text(147,160," Obesite :");
	$this->Text(8,165,"Tatouage :");                  $this->Text(80,165,"Toxicomanie IV :");                   $this->Text(147,165," Tabac :");
	$this->Text(8,170,"Professionnel de la sante :"); $this->Text(80,170,"ATCD IST :");     
	$this->RoundedRect(5,174,100,70, 2, $style = '');$this->RoundedRect(106,174,100,70, 2, $style = '');
	$this->Text(8,180,"MARQUEURS VIROLOGIQUE :");    $this->Text(107,180,"BILAN BIOLOGIQUE :");
	$this->Text(8,190,"Ag HBs");                     $this->Text(107,190,"ALAT ");     
	$this->Text(8,195,"Ac anti-HBs");                $this->Text(107,195,"ASAT ");     
	$this->Text(8,200,"Ac anti-HBc");                $this->Text(107,200,"Gamma GT ");     
	$this->Text(8,205,"Ag HBe");                     $this->Text(107,205,"phosphatase alcaline");     
	$this->Text(8,210,"Ac anti-HBe");                $this->Text(107,210,"albumine");     
	$this->Text(8,215,"charge virale VHB");          $this->Text(107,215,"bilirubine total");     
	$this->Text(8,220,"Ac anti-VHD");                $this->Text(107,220,"alfa foeto proteine ");     
	$this->Text(8,225,"Ac anti-VHC");                $this->Text(107,225,"creatinine");     
	$this->Text(8,230,"charge virale VHC");          $this->Text(107,230,"palaquettes");     
	$this->Text(8,235,"Ac anti-VIH");                $this->Text(107,235,"taux de prothrombine");     
													 $this->Text(107,240,"fibrinogene");												
	$this->SetFont('Arial','B',9);												
	$this->Text(12,250," NB:si des analyse similaires ont deja été effectuées a l'IPA rappeler obligatoirement");
	$this->Text(12,255," leurs numeros d'ordre ou bien les joindre a la fiche de renseignements");
	$this->Text(12,260," tout prelevement doit obligatoirement etre acccompagné d'une fiche de renseignements");
	$this->Text(12,265," correctement remplie ,d'un bon de paiment ou d'une prise en charge du service demandeur.");
	$this->SetFont('Arial','B',12);
	$this->Text(140,270," le medecin ");
	$this->Text(142,275," DR TIBA ");
	$this->Output();
	}
	function FHIV($IDDNR)
	{
	$this->ENTETEPEC(); 
	$query1 = "select * from DNR WHERE  id = '$IDDNR'";
	$resultat1=mysql_query($query1);
	$row = mysql_fetch_array($resultat1); 
	$this->Text(18,110,$row['NOM']);
	$this->Text(102,110,$row['PRENOM']);
	$this->Text(177,110,$row['SEX']);
	$this->Text(22,130,$row['DATENAISSANCE']);
	$this->Text(175,130,substr(date('Y-m-d'),0,4)-substr($row['DATENAISSANCE'],6,4)." Ans");
	$this->Text(6,150,"Adresse : ".$this->nbrtostring($this->db_name,"wil","IDWIL",$row['WILAYAR'],"WILAYAS").'/'.$this->nbrtostring($this->db_name,"com","IDCOM",$row['COMMUNER'],"COMMUNE").'/'.$row['ADRESSE']);
	$datejour=date("d-m-Y");
	$anne=substr($datejour,6,4);
	$this->Text(6,170,"N°du prelevement : ".$row['id']."/".$anne);
	$this->Text(8,190,"...............................................................Confirmation VIH..........................................................................");

	
	$this->AddPage('p','A4');
	$this->Text(5,15,"FICHE DE RENSIEGNEMENTS  ");
	$this->Text(120,15,"INFECTION A VIH");
	$this->SetFont('Arial','B',10);
	$this->Image('../public/IMAGES/photos/ipa.jpg',90,10,15,15,0);
	$this->Line(5 ,30 ,205 ,30 );
	$this->Text(5,40,"EXPEDITEUR:Identité et adresse");
	$this->Text(5,45,"EPH AIN OUSSERA WILAYA DE DJELFA");
	$this->Text(5,50,"POSTE DE TRANSFUSION SANGUINE");
	$this->Text(5,55,"TEL/FAX:-027822137-poste-34");
	$this->Text(120,40,"DESTINATAIRE:INSTITUT PASTEUR D'ALGER ");
	$this->Text(120,45,"Laboratoire National de Référence de l'infection à VIH");
	$this->Text(120,50,"Sidi-Fredj-Staoueli-Alger");
	$this->Text(120,55,"TEL: 021 37 8 50 / 51               FAX: 021 39 02 57 ");
	$this->Line(5 ,60 ,205 ,60 );
	$this->Text(5,65,"CARACTERISTIQUES DU PATIENT:");
	$this->Text(5,70,"Nom et Prénom:".trim($row['NOM'])."_".trim($row['PRENOM']));
	$this->Text(5,75,"Date de naissance: ".$row['DATENAISSANCE']);
	$this->Text(5,80,"Domicile habituel:".$row['ADRESSE']);
	$this->Text(5,85,"Nationalité ALGERIENNE : oui-non");
	$this->Text(120,65,"");
	$this->Text(120,70,"Sexe:".$row['SEX']);
	$this->Text(120,75,"Profession: sans profession"); 
	$this->Text(120,80,"Etat civil:"."marie(e):   "."  célibataire:");
	$this->Text(120,85,"Nombre d'enfants : ");
	$this->Line(5 ,90 ,205 ,90 );
	$this->Text(5,95,"PRELEVEMENT:");
	$this->Text(5,100,"N° d'ordre du prélèvement:");
	$this->Text(5,105,"Date du prélèvement: ");
	$this->Text(5,110,"Justification du prélèvement:confirmation VIH ");
	$this->Text(120,95,"");
	$this->Text(120,100,"Suspicion de le maladie: oui-non");
	$this->Text(120,105,"Donneur du sang:oui-non");
	$this->Text(120,110,"Autres: ");
	$this->Line(5 ,115 ,205 ,115 );
	$this->Text(5,120,"SIGNE CLINIQUES EVENTUELS:");
	$this->Text(5,125,"Amaigrissement:");
	$this->Text(50,125,"oui-non");
	$this->Text(5,130,"Diarrhée:");
	$this->Text(50,130,"oui-non");
	$this->Text(5,135,"Fièvre:");
	$this->Text(50,135,"oui-non");
	$this->Text(5,140,"Polyadénopathie:");
	$this->Text(50,140,"oui-non");
	$this->Text(5,145,"Infections oportunistes:");
	$this->Text(50,145,"oui-non");
	$this->Text(120,125,"Lymphome non Hodjkinien:");
	$this->Text(170,125,"oui-non");
	$this->Text(120,130,"Sarcome de Kaposie:");
	$this->Text(170,130,"oui-non");
	$this->Text(120,135,"Autres:.................................................... ");
	$this->Text(120,140,"Date d'apparition des premiers ");
	$this->Text(120,145,"signes cliniques : I__I__I____I ");
	$this->Line(5 ,150 ,205 ,150 );
	$this->Text(5,155,"CONTAMINATION:");
	$this->Text(5,160,"Lieu probable :............................................");
	$this->Text(5,165,"Date probable :............................................");
	$this->Text(5,170,"Séjour a l'étranger depuis 1981: oui -non ");
	$this->Text(5,175,"Date et durée de séjour:");
	$this->Text(5,180,".....................................................................");
	$this->Text(120,155,"MODE DE TRANSMISSION");
	$this->Text(80,160,"Hémophilie:");
	$this->Text(105,160,"oui-non");
	$this->Text(80,165,"Homosexuel: ");
	$this->Text(105,165,"oui-non");
	$this->Text(80,170,"Hétérosexuel:");
	$this->Text(105,170,"oui-non");
	$this->Text(80,175,"Bisexuel:");
	$this->Text(105,175,"oui-non");
	$this->Text(80,180,"Transfusion:");
	$this->Text(105,180,"oui-non");
	$this->Text(150,160,"Toxicomanie:");
	$this->Text(175,160,"oui-non");
	$this->Text(150,165,"Mère-enfants:");
	$this->Text(175,165,"oui-non");
	$this->Text(150,170,"Indéterminé:");
	$this->Text(175,170,"oui-non");
	$this->Text(150,175,"autres:............................ ");
	$this->Text(150,180,"........................................ ");
	$this->Line(5 ,185 ,205 ,185 );
	$this->Text(5,190,"RESULTAT:");
	$this->SetXY(5,200);
	$this->Cell(100,8,'Méthodes ELISA',1,1,'C');
	$this->SetXY(5,208);
	$this->Cell(50,8,'Nom de la trousse (kit)',1,1,'C');
	$this->SetXY(55,208);
	$this->Cell(50,8,'Dencité optique',1,1,'C');
	$this->SetXY(5,216);
	$this->Cell(50,8,'.....',1,1,'C');
	$this->SetXY(55,216);
	$this->Cell(50,8,'.....',1,1,'C');
	$this->SetXY(5,224);
	$this->Cell(50,8,'.....',1,1,'C');
	$this->SetXY(55,224);
	$this->Cell(50,8,'.....',1,1,'C');
	$this->SetXY(108,200);
	$this->Cell(100,8,'Autres méthodes(préciser)',1,1,'l');
	$this->SetXY(108,208);
	$this->Cell(50,8,'Nom de la trousse (kit)',1,1,'C');
	$this->SetXY(158,208);
	$this->Cell(50,8,'Résultat',1,1,'C');
	$this->SetXY(108,216);
	$this->Cell(50,8,'.....',1,1,'C');
	$this->SetXY(158,216);
	$this->SetFont('Arial','B',8);
	$this->Cell(50,8,'douteux -positif (faible-moyen-fort)',1,1,'C');
	$this->SetXY(108,224);
	$this->Cell(50,8,'.....',1,1,'C');
	$this->SetXY(158,224);
	$this->SetFont('Arial','B',8);
	$this->Cell(50,8,'douteux -positif (faible-moyen-fort)',1,1,'C');
	$this->SetFont('Arial','B',12);
	$this->Text(140,260," le medecin ");
	$this->Text(142,265," DR TIBA ");
	$this->SetFont('Arial','B',8);
	$this->Text(5,280,"*: Rayer la mention inutil");
	$this->Text(5,285,"** :Préciser");
	$this->Output();
	}
	//******************************************************prospectus fr ******************************************************//	

	function PROSDNRFR($idon)
	{
	$this->mysqlconnect();
	$this->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
	$this->SetTextColor(0,0,0);  //text noire
	$query = "select * from DNR WHERE  ID = '$idon'     ";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($result=mysql_fetch_object($resultat))//1ere page
	{
	$this->AddPage();
	$this->SetFont('Times', '', 12);
	$this->RoundedRect(2, 2, 95, 205, 2, $style = '');
	$this->SetTextColor(225,0,0);
	$this->Text(5,10,"Pourquoi donner son sang ? ");
	$this->SetTextColor(0,0,0);
	$this->Text(5,15,"le don de sang permet de soigner et de sauver");
	$this->Text(5,20,"des patients qui souffrent d'un déficite ");
	$this->Text(5,25,"en composants sanguins,du à un accident  ");
	$this->Text(5,30,"ou à des maladies telles que l'annemie sévère ");
	$this->Text(5,35,"leucémie,l'hémophilie .......  ");
	$this->SetTextColor(225,0,0);
	$this->Text(5,50,"qui peut donner son sang ");
	$this->SetTextColor(0,0,0);
	$this->Text(5,55,"toute personne en bonne santé,agée");
	$this->Text(5,60,"entre 18 et 65 ans peut donner du sang  ");
	$this->Text(5,65,"à raison de 04 fois par an pour les hommes ");
	$this->Text(5,70,"et 03 fois par an pour les femmes avec un intervalle");
	$this->Text(5,75,"minimal de 02 mois entre 02 dons consécutifs");
	$this->SetTextColor(225,0,0);
	$this->Text(8,184,"le sang est une source de vie qu'on peut partager");
	$this->SetTextColor(0,0,0);
	$this->RoundedRect(2+95+3, 2, 95, 205, 2, $style = '');
	$this->SetTextColor(225,0,0);
	$this->Text(103,10,"Ou peut-on donner son sang ");
	$this->SetTextColor(0,0,0);
	$this->Text(103,15,"on peut donner du sang au niveau des:");
	$this->Text(103,20,"structures de transfusion sanguine des hopitaux");
	$this->Text(103,25,"véhicules de collecte dotés de l'équipements nécesaire ");
	$this->SetTextColor(225,0,0);
	$this->Text(103,85,"comment se déroule le don de sang ?");
	$this->SetTextColor(0,0,0);
	$this->Image('../public/images/photos/1.JPG',123,30, 50, 50, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
	$this->Text(103,90,"chaque don de sang est précédé d'un entretient");
	$this->Text(103,95,"et d'un examen médical,");
	$this->Text(103,100,"  ");
	$this->Image('../public/images/photos/4.JPG',115,100, 25, 25, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
	$this->Image('../public/images/photos/3.JPG', 155, 100, 25, 25, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
	$this->Text(103,130,"cette étape est importante pour garantire la sécurité");
	$this->Text(103,135,"du receveur et du donneur,si la personne est apte");
	$this->Text(103,140,"adonner du sang une quantité de sang égale à 450 ml");
	$this->Text(103,145,"lui sera prélevée sans aucun effet néfaste sur la santé  ");
	$this->Text(103,150,"apres le pélèvement il aura droit à une collation ");
	$this->Image('../public/images/photos/6.JPG', 115, 154, 25, 25, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
	$this->Image('../public/images/photos/5.JPG', 155, 154, 25, 25, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
	$this->SetTextColor(225,0,0);
	$this->Text(108,184,"le sang est une source de vie qu'on peut partager");
	$this->SetTextColor(0,0,0);
	$this->RoundedRect(2+95+95+6, 2, 95, 205, 2, $style = '');
	$this->SetTextColor(225,0,0);
	$this->Text(200,10,"ya-t-il un risque de contamination en donnant du sang");
	$this->SetTextColor(0,0,0);
	$this->Text(200,15,"il n'ya aucun risque d'étre contaminé par un virus");
	$this->Text(200,20,"comme celui du sida ou de l'hépatite B ou C pendant");
	$this->Text(200,25,"le prélèvement,puisque le materiel utilisé est stérile");
	$this->Text(200,30,"et a usage unique ");
	$this->Image('../public/images/photos/4.JPG', 215,38, 25, 25, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
	$this->Image('../public/images/photos/3.JPG', 255,38, 25, 25, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
	$this->SetTextColor(225,0,0);
	$this->Text(200,90,"faut-il étre à jeun pour donner son sang ");
	$this->SetTextColor(0,0,0);
	$this->Text(200,95,"non il n'est pas recommandé d'étre à jeun avant de");
	$this->Text(200,100,"donner son sang,il est conseillé de prendre un repas");
	$this->Text(200,105,"léger en evitant la la consomation de matires grasses ");
	$this->SetTextColor(225,0,0);
	$this->Text(205,184,"le sang est une source de vie qu'on peut partager");
	$this->SetTextColor(0,0,0);//2eme page
	$this->AddPage();
	$this->SetFont('Times', '', 12);
	$this->RoundedRect(2, 2, 95, 205, 2, $style = '');
	$this->SetTextColor(225,0,0);
	$this->Text(5,10,"pourquoi doit-on donner régulierement du sang ");
	$this->SetTextColor(0,0,0);
	$this->Text(5,15,"le don de sang régulier permet de satisfaire  ");
	$this->Text(5,20,"les besoins des malades en produits sanguins ");
	$this->Text(5,25,"en période normale et en cas d'urgence car la durée ");
	$this->Text(5,30,"de vie des composants sanguinsest limitée ");
	$this->Text(5,35,"35 à 45 jours pour les globules rouges");$this->Text(5,40,"et 05 jours pour les plaquettes");
	$this->Image('../public/images/photos/DIS.JPG',25,50, 50, 50, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
	$this->SetTextColor(225,0,0);
	$this->Text(8,184,"le sang est une source de vie qu'on peut partager");
	$this->SetTextColor(0,0,0);
	$this->RoundedRect(2+95+3, 2, 95, 205, 2, $style = '');
	$this->Text(103,10,"souvenez vous que vous meme ou un membre de  ");
	$this->Text(103,15,"votre famille peut avoir besoin un jour de sang");
	$this->Text(103,20,"pour plus d'information contacter la structure de");
	$this->Text(103,25,"de transfusion sanguine la plus proche ou ANS ");
	$this->Text(103,30,"l'agence national du sang");
	$this->SetTextColor(225,0,0);
	$this->Text(103,60,"Important:");
	$this->Text(103,70,"Journée nationale:25-10-".DATE('Y')." du don de sang");
	$this->Text(103,80,"Journée maghrébine:30-03-".DATE('Y')." du don de sang");
	$this->Text(103,90,"Journée mondiale:14-06-".DATE('Y')." du don de sang");
	$this->Code39(40,135,$result->id, $baseline=0.5, $height=16);
	$this->SetXY(103,110);
	$this->Cell(90,8,trim($result->id)." / ".trim($result->DINS),0,1,'C');
	$this->SetXY(103,115);
	$this->Cell(90,8,trim($result->NOM)."_".trim($result->PRENOM),0,1,'C');
	$this->SetXY(103,120);
	$this->Cell(90,8,trim($result->GRABO)."_".trim($result->GRRH),0,1,'C');
	$this->SetTextColor(0,0,0);
	$this->Image('../public/images/photos/LOGOAO.GIF', 135, 130, 30, 30, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
	$this->Text(108,165,"l'etablissement public hospitalier d'ain oussera");
	$this->Text(123,170,"poste de transfusion sanguine ");
	$this->Text(123,175,"tel 027-82-32-88 poste 34 ");
	$this->Text(130,180,"fax 027-82-12-80");
	$this->SetTextColor(225,0,0);
	$this->Text(108,184,"le sang est une source de vie qu'on peut partager");
	$this->SetTextColor(0,0,0);
	$this->RoundedRect(2+95+95+6, 2, 95, 205, 2, $style = '');
	$this->Text(205,10,"republique algerienne démocratique et populaire ");
	$this->SetFont('Times', '', 10);
	$this->Text(198,15,"ministere de la sante de la population et de la reforme hospitaliere");
	$this->SetFont('Times', '', 12);
	$this->Text(208,20,"l'etablissement public hospitalier d'ain oussera");
	$this->Text(223,25,"poste de transfusion sanguine");
	$this->SetXY(240, 35);
	$this->Image('../public/images/photos/gs.jpg',240,35, 10, 10, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
	$this->Image('../public/images/photos/1.JPG',220, 50, 50, 50, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
	$this->SetFont('Times', 'B', 16);
	$this->Text(225,108," DON DE SANG");
	$this->Text(215,113,"QU'EN SAVEZ-VOUS ?");
	$this->SetFont('Times', '', 12);
	$this->Image('../public/images/photos/LOGOAO.GIF', 230,130, 30, 30, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
	$this->Text(235,163,DATE('d-m-Y'));
	$this->SetTextColor(225,0,0);
	$this->Text(205,184,"le sang est une source de vie qu'on peut partager");
	$this->SetTextColor(0,0,0);
	}
	$this->Output();
    }

//***************************************************RESULTAT DON **********************************************************************************//
    function RESDONPDF($idon,$iddnr,$DATEDON)
	{
	$this->mysqlconnect();
	$sql = "SELECT * FROM dnr WHERE id = ".$iddnr ;
	$requete = mysql_query( $sql ) ; 
	if( $result = mysql_fetch_object( $requete ) )
	{ 
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->AddPage('p','A5');
	$this->SetFont('Times','B',10);
	$this->SetTextColor(225,0,0); 
	$this->RoundedRect(5, 2, 135, 24, 2, $style = '');
	$this->SetXY(5,2);
	$this->Cell(135,8,'Etablissement Public Hospitalier Ain-Oussera',0,1,'C');
	$this->SetXY(5,2+8);
	$this->Cell(135,8,'Poste De Transfusion Sanguine',0,1,'C');
	$this->SetXY(5,2+8+8);
	$this->Cell(135,8,'Resultat De La Qualification Biologique',0,1,'C');
	$this->Line(5, 30, 140, 30);
	$this->Image('../public/images/photos/LOGOAO.GIF',10,7,15,15,0);
	$this->Image('../public/images/photos/LOGOAO.GIF',120,7,15,15,0);
	$this->Image('../public/images/photos/grife.jpg',85,150,55,22,0);//85,143
	$this->SetTextColor(0,0,0);
	$this->SetFont('Arial','B',10);
	$this->RoundedRect(5, 35, 60, 42, 2, $style = '');
	$this->SetFillColor(255,246,143);//https://vela.astro.ulg.ac.be/Vela/Colors/rgb.html
	$this->RoundedRect(80, 35, 60, 42, 2, $style = '');
	$this->SetXY(82,40);
	$this->Cell(55,8,'Nom : '.$result->NOM,0,1,1,'r');
	$this->SetXY(82,48);
	$this->Cell(55,8,'Prenom : '.$result->PRENOM,0,1,1,'r');
	$this->SetXY(82,56);
	$d1=substr($result->DATENAISSANCE,6,4);
	$d2=substr(date('d/m/Y'),6,4);
	$d3=$d2-$d1;
	$this->Cell(55,8,'Age : '.$d3." Ans ",0,1,1,'r');
	$this->SetXY(82,56+8);
	$this->Cell(55,8,'Adresse : '.$result->ADRESSE,0,1,1,'r');
	$this->SetFont('Arial','B',8);
	$this->RoundedRect(5, 80, 135, 58, 2, $style = ''); 
	$this->SetXY(6,85);
	$this->Cell(30,8,'Examens Demandes',1,1,'C'); 
	$this->SetXY(36,85);
	$this->Cell(30,8,'Resultats',1,1,'C'); 
	$this->SetXY(66,85);
	$this->Cell(40,8,'Valeurs de Référence',1,1,'C'); 
	$this->SetXY(106,85);
	$this->Cell(32,8,'Anteriorités',1,1,'C'); 
	$this->SetXY(6,85+8);
	$this->Cell(30,8,'Groupage Rhesus:',0,1,'r'); 
	$sql1 = "SELECT * FROM don WHERE id = ".$idon ;
	$requete1 = mysql_query( $sql1 ) ; 
	if( $result1 = mysql_fetch_object( $requete1 ) )
	{ 
	$this->SetXY(5,40);
	$this->Cell(20,8,'Code Prelevement : ',0,1,'r');
	$idp=$result1->IDP;
	$this->Code39(33,40 ,$result1->IDP, $baseline=0.5, $height=5);
	$this->SetXY(5,48);$this->Cell(20,8,'Poids : '.$result1->POIDS.' '.'kg',0,1,'r');
	$this->SetXY(5,56);$this->Cell(20,8,'SYS/DIA : '.$result1->TAS.'/'.$result1->TAD.' '.'mmhg',0,1,'r');
	$this->SetXY(5,56+8);$this->Cell(20,8,'Date Prelevement : '.$this->dateUS2FR($result1->DATEDON),0,1,'r');
	$this->SetXY(36,85+8);
	$this->Cell(30,8,$result1->GROUPAGE.' / '.$result1->RHESUS,0,1,'C'); 
	$this->SetXY(66,85+8);
	$this->Cell(40,8,'***',0,1,'C');  
	$this->SetXY(106,85+8);
	$this->Cell(32,8,'***',0,1,'C');  
	$this->SetXY(6,85+8+8);
	$this->Cell(30,8,'HVB:',0,1,'r'); 
	$this->SetXY(36,85+8+8);
	$this->Cell(30,8,ucfirst($result1->HVB),0,1,'C'); 
	$this->SetXY(66,85+8+8);
	$this->Cell(40,8,'Négatif',0,1,'C');  
	$this->SetXY(106,85+8+8);
	$this->Cell(32,8,'***',0,1,'C');  
	$this->SetXY(6,85+8+8+8);
	$this->Cell(30,8,'HVC:',0,1,'r'); 
	$this->SetXY(36,85+8+8+8);
	$this->Cell(30,8,ucfirst($result1->HVC),0,1,'C'); 
	$this->SetXY(66,85+8+8+8);
	$this->Cell(40,8,'Négatif',0,1,'C');  
	$this->SetXY(106,85+8+8+8);
	$this->Cell(32,8,'***',0,1,'C');  
	$this->SetXY(6,85+8+8+8+8);
	$this->Cell(30,8,'HIV:',0,1,'r'); 
	$this->SetXY(36,85+8+8+8+8);
	$this->Cell(30,8,ucfirst($result1->HIV),0,1,'C'); 
	$this->SetXY(66,85+8+8+8+8);
	$this->Cell(40,8,'Négatif',0,1,'C');  
	$this->SetXY(106,85+8+8+8+8);
	$this->Cell(32,8,'***',0,1,'C');  
	$this->SetXY(6,85+8+8+8+8+8);
	$this->Cell(30,8,'VDRL:',0,1,'r'); 
	$this->SetXY(36,85+8+8+8+8+8);
	$this->Cell(30,8,trim(ucfirst($result1->TPHA)),0,1,'C'); 
	$this->SetXY(66,85+8+8+8+8+8);
	$this->Cell(40,8,'Négatif',0,1,'C');  
	$this->SetXY(106,85+8+8+8+8+8);
	$this->Cell(32,8,'***',0,1,'C'); 
	}
	$this->RoundedRect(5, 143, 55, 30, 2, $style = ''); 
	$this->SetXY(5,143);
	$this->Cell(55,8,'Date: ',0,1,'C'); 
	$this->SetXY(5,143+8);
	$this->Cell(55,8,date('d-m-Y'),0,1,'C'); 
	$this->RoundedRect(85, 143, 55, 30, 2, $style = ''); 
	$this->SetXY(85,143);$this->SetFont('Arial','B',8);
	$this->Cell(55,8,'La Structure De Transfusion Sanguine ',0,1,'C');
	$this->SetFillColor(220);
	$this->SetXY(5,176);
	$this->Cell(135,6,'NB: les resultats figurants ci dessus ne doivent etre consideres definitives ',0,0,1,'C');
	$this->SetXY(5,176+6);
	$this->Cell(135,6,'qu\'apres une deuxieme qualification effectuee sur un second prelevement',0,0,1,'C');
	$this->Output();
	}
	}
	//*****************************************************************************************************************//
	function enteteques($titre)
    {
	$this->AddPage('p','A4');
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('Arial','B',10);
	$this->Image('../public/images/photos/logoao.gif',90,26,15,15,0);
	$this->Text(70,5,'AGENCE REGIONALE DE :'.$this->nbrtostring($this->db_name,"ars","IDARS",$this->REGION(),"WILAYAS"));
	$this->Text(80,10,'WILAYA DE :'.$this->nbrtostring($this->db_name,"wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(46,15,'STRUCTURE DE TRANSFUSION SANGUINE :'.$this->nbrtostring($this->db_name,"cts","IDCTS",$this->STRUCTURE(),"CTS"));
	$this->SetFont('Arial','B',20);
	$this->Text(70,25,$titre);
	$this->SetFont('Arial','B',10);
    }
	function corps($POIDS,$IDP,$TYPEPOCHE)
    {
	$this->SetFont('Arial','B',10);
	$this->Text(5,40,"Numero d identification");
	$this->Text(55,40,"Date:");
	$this->Text(118,40,"Structure");
	$this->SetXY(158,30);
	$this->Cell(43,14,'Coller etiquette du don',1,1,'C');
	$this->SetXY(158,30+15);
	$this->Cell(43,14,'NDP'.$IDP,1,1,'C');
	$this->Text(5,65,"Structure de Transfusion Sanguine:");
	$this->Text(70,65,$this->nbrtostring($this->db_name,"cts","IDCTS",$this->STRUCTURE(),"CTS").'  Wilaya de '.$this->nbrtostring($this->db_name,"wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
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
	$this->Text(140,180,"Type de poche : ".$TYPEPOCHE);
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
	
	function QESDNRPDF($idon,$IDDNR) 
	{
	$this->mysqlconnect();
	$query = "select * from don WHERE  id = '$idon'";
	$resultat=mysql_query($query);
	if($row = mysql_fetch_array($resultat))
	{ 
	$this->enteteques("-QUESTIONNAIRE-");
	$this->SetFillColor(250); //elle fonctionne avec 3 parametre si le 2et 3 sont absent  la couleurvarie du noire  au gris //sinon 1=rouge 2vert 3 bleu 
	$this->setxy(159,18);
	$this->Cell(40,10,'Nouveau donneur',0,1,'C',true,'http://pcephao/gpts/index.php?uc=CHDNR'); //A MODIFIER EN RESEAU  EN CHANGANT LOCALHOSTE PAR ADRESSE IP DU SERVEUR   
	$this->Text(10,45,'* Vous sentez vous en forme pour donner votre sang ......................................................................');$this->Text(180,45,$row["q1"]);
	$this->Text(10,52,"* Avez-vous déjà donné votre sang .....................................................................................................");$this->Text(180,52,$row["q2"]);
	$this->Text(10,59,'* Date du dernier don ');$this->Text(180,59,$row["q3"]);
	$this->Text(10,66,'* Etes vous a jeun ..................................................................................................................................'); $this->Text(180,66,$row["q4"]);
	$this->Text(10,73,'Avez-vous dans votre vie :');
	$this->Text(10,80,'* Eté hospitalisé(e) ................................................................................................................................');$this->Text(180,80,$row["q5"]);
	$this->Text(10,87,'* Eté transfusé(e) ..................................................................................................................................');$this->Text(180,87,$row["q6"]);
	$this->Text(10,94,'* Eu une maladie cardiaque (trouble du rythme cardiaque,valvulopaties, angor, IDM ...) et/ou HTA  ');$this->Text(180,94,$row["q7"]);
	$this->Text(10,101,'* Eu une affection allergique grave et/ou de l\'asthme ......................................................................'); $this->Text(180,101,$row["q8"]);
	$this->Text(10,108,'* Eu le diabète .......................................................................................................................................');$this->Text(180,108,$row["q9"]);
	$this->Text(10,115,'* Eu un ulcere gastro-duodénale ........................................................................................................');$this->Text(180,115,$row["q10"]);
	$this->Text(10,122,'* Eu une maladie dermatologique (acné =roaccutane=,psoriasis =soriatane=) ............................'); $this->Text(180,122,$row["q11"]);
	$this->Text(10,129,'* Eté traité(e) par hormone de croissance .........................................................................................');$this->Text(180,129,$row["q12"]);
	$this->Text(10,136,'* Voyager en Afrique, en Asie, en Amerique Latine ..........................................................................'); $this->Text(180,136,$row["q13"]);
	$this->Text(10,143,'* Eu des relations sexuelles extra-conjugales non protégées ........................................................');$this->Text(180,143,$row["q14"]);
	$this->Text(10,150,'* Pris des drogues par voie injectable ou nasale ..............................................................................'); $this->Text(180,150,$row["q15"]);
	$this->Text(10,157,'Dans les 4 derniers mois, avez-vous :');                                                            
	$this->Text(10,164,'* Eté opéré(e) au cours d\'une hospitalisation et/ou subi une anesthésie genérale ou locorégionale ');$this->Text(180,164,$row["q16"]);
	$this->Text(10,171,'* Eté vacciné(e).....................................................................................................................................');$this->Text(180,171,$row["q17"]);
	$this->Text(10,178,'* Subi une endoscopie .......................................................................................................................');$this->Text(180,178,$row["q18"]);
	$this->Text(10,185,'* Subi un tatouage ou un piercing .....................................................................................................'); $this->Text(180,185,$row["q19"]);
	$this->Text(10,192,'* Eu une infection urinaire ..................................................................................................................');$this->Text(180,192,$row["q20"]);
	$this->Text(10,199,'Pour la femme :');                                                                                  
	$this->Text(10,206,'* Etes vous enceinte............................................................................................................................'); $this->Text(180,206,$row["q21"]);
	$this->Text(10,213,'* Avez-vous accouché ou fait une fausse couche depuis moins de 06 mois ...............................');$this->Text(180,213,$row["q22"]);
	$this->Text(10,220,'Depuis une semaine, avez-vous :');                                                                  
	$this->Text(10,227,'* Pris des médicaments ATB, CTC, Aspirine ....................................................................................'); $this->Text(180,227,$row["q23"]);
	$this->Text(10,234,'* Subi des soins dentaires ?................................................................................................................'); $this->Text(180,234,$row["q24"]);
	$this->Text(10,241,'* Eu de la fièvre ....................................................................................................................................');$this->Text(180,241,$row["q25"]);
	$this->Text(10,256,'Le Donneur Nom et Prenom');
	$this->Text(10,256+8,strtoupper($row["IDDNR"]).'_'.ucwords($row["IDDNR"]));
	$this->SetXY(150,250);				 
	$this->cell(40,5,"Signature  médecin:",1,0,'C',0);
	$this->SetXY(150,260);				 
	$this->cell(40,5,"DR : ".$this->USER() ,1,0,'C',0);//2EME PAGE  FICHE DONNEUR
	$this->enteteques("-FICHE DE PRELEVEMENT-");
	$this->corps($row["POIDS"],$row["IDP"],$row["TYPEPOCHE"]);
	$this->Text(65,40,date('d/m/Y'));
	$this->text(136,40,$row["STR"]);
	$this->Text(37,160,$row["TDNR"]);
	$this->SetFont('Arial','B',10);
	$this->Text(20,170,$row["POIDS"]);                
	$this->Text(35,170,'Taille en cm : '.$row["Taille"]);   
	$this->Text(65,170,'PI M : '.$this->PI($row["Taille"]));  
	$this->Text(90,170,'BSA : '.round($this->BSA($row["POIDS"],$row["Taille"]), 2) );//Body Mass Index 
	$this->Text(15,180,$row["TAS"].'/'.$row["TAD"]);  $this->Text(50,180,'PAM : '.round(($row["TAS"]+(2*$row["TAD"]))/3,2).' mmhg');                
	$this->Text(32,190,$row["TDON"]);
	$this->Text(45,210,$row["HEUREDON"]);
	$this->Code39(5,43,$idon,1,12); 
	}
	$this->mysqlconnect();
	$query1 = "select * from dnr WHERE  id = '$IDDNR'";
	$resultat1=mysql_query($query1);
	if($row1 = mysql_fetch_array($resultat1))
	{ 
	$this->Text(22,80,strtoupper($row1["NOM"]));
	$this->Text(100,80,ucwords($row1["PRENOM"]));
	$this->Text(180,80,$row1["SEX"]);
	$this->Text(22,90,$row1["DATENAISSANCE"]);
	$this->Text(178,90,substr(date('Y-m-d'),0,4)-substr($row1['DATENAISSANCE'],6,4)."Ans");
	$this->Text(45,110,$this->nbrtostring($this->db_name,'wil','IDWIL',$row1["WILAYA"],'WILAYAS'));
	$this->Text(130,110,$this->nbrtostring($this->db_name,'com','IDCOM',$row1["COMMUNE"],'COMMUNE'));
	$this->Text(45,120,$this->nbrtostring($this->db_name,'wil','IDWIL',$row1["WILAYAR"],'WILAYAS'));
	$this->Text(130,120,$this->nbrtostring($this->db_name,'com','IDCOM',$row1["COMMUNER"],'COMMUNE'));
	$this->Text(45,130,$row1["ADRESSE"]);
	$this->Text(167,130,$row1["TELEPHONE"]);
	}
	$this->Output();
	}
	//***********************************************************************************************//
	function etiquette($GROUPAGE,$RHESUS,$datedon,$IDP,$y,$psl,$volume,$conservation,$condition,$nbrj)
	{
	$this->RoundedRect(5, $y, 138, 60, 2, $style = '');
	$this->RoundedRect(80, $y+3, 60, 54, 2, $style = '');
	$this->SetTextColor(225,0,0);
	$this->SetXY(100,$y+24);
	$this->Cell(30,8,trim($GROUPAGE),0,1,'r');
	$this->SetXY(85,$y+45);
	$this->Cell(30,8,trim($RHESUS),0,1,'r');
	$this->SetTextColor(0,0,0);
	$this->SetFont('Arial', 'B', 9);
	$this->Text(6,$y+4,"EPH AIN OUSSERA DJELFA : PTS");
	$this->SetXY(95,$y+2);
	$this->Cell(30,8,$psl,0,1,'C');
	$this->Text(95,$y+12,"GROUPE SANGUIN");
	$this->SetFont('Arial', 'B', 9);
	$this->Text(5,$y+8,"Type PSL : CGR ");
	$this->Text(50,$y+8,"volume: ".$volume." ml");
	$this->Text(5,$y+12,"Prelever Le: ".$this->dateUS2FR($datedon));
	$this->Text(5,$y+16,"Perimer  Le: ".$this->dateUS2FR($this->datePlus($datedon,$nbrj)));
	$this->Text(5,$y+20,"Conserver Entre  ".$conservation);$this->Text(5,$y+25,$condition);
	$this->Text(5,$y+33,"NDP:");$this->Text(5,$y+47,"CB:ENA13");
	$this->SetFont('Arial', '', 22);
	$this->SetTextColor(225,0,0);
	$this->SetXY(20,$y+30);
	$this->Cell(50,8,trim($IDP),1,1,'C');
	$this->EAN13(27, $y+42, trim($IDP), $h=16, $w=.35);
	$this->SetTextColor(0,0,0);
	$this->SetFont('Arial', '', 50);
	}
	function ETTIDON($idon)
    {
	$this->mysqlconnect();
	$session=$_SESSION["login"];
	$this->SetTextColor(0,0,255);
	$this->SetDisplayMode('fullpage','single');
	$this->SetFont('Arial', '', 10);
	$this->AddPage();
	$query = "select * from don WHERE  id = '$idon'  order by  id   ";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	$this->SetFont('Arial', '', 50); 
	while($result=mysql_fetch_object($resultat))
	{
	$this->etiquette($result->GROUPAGE,$result->RHESUS,$result->DATEDON,$result->IDP,5,"CONCENTRE DE GLOBULES ROUGES",450,"(+4° et +8°)","",30);
	$this->etiquette($result->GROUPAGE,$result->RHESUS,$result->DATEDON,$result->IDP,66,"PLASMA FRAIS CONGELE",250,"(-25° et -80°)","Décongeler a (+37°) en moins de 30 mn ",90);
	$this->etiquette($result->GROUPAGE,$result->RHESUS,$result->DATEDON,$result->IDP,127,"CONCENTRE DE PLAQUETTES STAND",250,"(+18° et +22°)","Sous Agitation Lente Et Continue",5);
	}
	$this->Output();
    }
	//***********************************************************************************************//
	function LABODNR($dateeuro,$IDDNR)
    {
	$this->mysqlconnect();
	$session=$_SESSION["login"];
	$this->SetTextColor(0,0,255);
	$this->SetDisplayMode('fullpage','single');
	$this->SetFont('Arial', '', 10);$this->AddPage();
	$query = "select * from DNR WHERE  id = '$IDDNR' ";
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
	$this->Text(5,65,"Nom,Prénom du donneur:");
	$this->Text(5,70,"Date De Naissance:");$this->Text(100,70,"Age:_____ans");
	$this->Text(5,75,"Service Hospitalier :");$this->Text(100,75,"Matricule : ".$IDDNR);
	$this->Text(5,80,"Service Extra Hospitalier : *** ");
	$this->Text(5,85,"Adresse : ".Trim($result->ADRESSE));
	$this->SetFont('Arial', '', 15);
	$this->Text(40,89,"DIAGNOSTIC CLINIQUE :");
	$this->SetFont('Arial', '', 10);
	$this->Text(5,102,"Examen demandés :");$this->Text(90,102,"Resultats :");
	$this->Line(50 ,110 ,50 ,173);
	$this->SetFont('Arial', '', 12);
	$this->Text(5,110,"1)- FNS");
	$this->Text(5,120,"2)- UREE");
	$this->Text(5,130,"3)- CREATININE");
	$this->Text(5,140,"4)- GLYCEMIE");
	$this->Text(5,150,"5)- TP");
	$this->Text(5,160,"6)- CA++");
	$this->Text(5,170,"7)- IONOGRAMME /S");
	$this->Text(52,110,"-----------------------------------------------------------------");
	$this->Text(52,120,"-----------------------------------------------------------------");
	$this->Text(52,130,"-----------------------------------------------------------------");
	$this->Text(52,140,"-----------------------------------------------------------------");
	$this->Text(52,150,"-----------------------------------------------------------------");
	$this->Text(52,160,"-----------------------------------------------------------------");
	$this->Text(52,170,"-----------------------------------------------------------------");
	$this->SetTextColor(225,0,0);
	$this->SetFont('Arial', '', 10);
	$this->Text(30,95,"DONNEUR DE SANG POUR SUIVIE MEDICAL");
	$this->Text(35,75,"POSTE DE TRANSFUSION SANGUINE");
	$this->SetFont('Arial', '', 12);
	$this->SetTextColor(225,0,0);
	$this->SetXY(45,60);
	$this->Cell(30,8,Trim($result->NOM)."_".Trim($result->PRENOM),0,1,'r');
	$this->SetXY(36,65);
	$this->Cell(30,8,$result->DATENAISSANCE,0,1,'r');
	$this->SetXY(109,65);
	$this->Cell(30,8,substr(date('d/m/Y'),6,4)-substr($result->DATENAISSANCE,6,4),0,1,'r');
	$this->SetTextColor(0,0,225);
	$this->Image('../public/images/photos/grife.jpg',85,185,55,22,0);//85,143
	$this->Text(80,178,"AIN OUSSERA LE :".$dateeuro);
    $this->Text(85,183,"Le Medecin : DR TIBA");
	}
	$this->Output();
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//***********************************************************************************************//
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
	//Homme = Taille(cm) - 100 - [Taille(cm) - 150] / 4
	//âge de supérieur à 18 ans ;taille entre 140 et 220 cm (55 à 87 inch)
	//Poids idéal = 50 + [Taille(cm) - 150]/4 + [Age(an) - 20]/4
	$PI =$h-100-($h-150)/4 ."kg" ;
	return $PI;
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