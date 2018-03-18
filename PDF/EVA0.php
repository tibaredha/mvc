<?php
//ANCIENNE BILAN  SANS TRACHE DAGE  
require('invoice.php');
class eva extends PDF_Invoice
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
	
	function compagne($colone1,$colone2,$datejour)
	{
	  $this->mysqlconnect();
	  $SRS=$this->STRUCTURE();
	  $sql = " select * from don   ";// where SRS='$SRS' and GROUPAGE='$colone1'and RHESUS='$colone2'and DATEDON ='$datejour' and IND='IND'
	  $requete = mysql_query($sql) or die($sql."<br>".mysql_error());
	  $compagne=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $compagne;
	}
	
	 function entete($x,$h,$t1,$st1,$st2)
    {
	$this->SetXY($x,$h); 	  
	$this->cell(22,7.5,$t1,1,0,'C',1,0);
	$this->SetXY($x,$h+7.5); 	  
	$this->cell(11,7.5,$st1,1,0,'C',1,0);
	$this->SetXY($x+11,$h+7.5); 	  
	$this->cell(11,7.5,$st2,1,0,'C',1,0);
    }
	function malade($colone1,$colone2,$datejour1,$datejour2)
    {
	  $this->mysqlconnect();
	  $SRS=$this->STRUCTURE();
	  $sql = "select * from mal where SERVICE='$colone1'and $colone2!='' and DQ >='$datejour1'and DQ <='$datejour2'";// 
	  $requete = mysql_query($sql) or die($sql."<br>".mysql_error());
	  $compagne=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $compagne;
    }
	function ligne($h1,$t1,$st1,$st3,$st5,$st7,$st9,$st11,$st13,$st15,$st17,$st19,$st21,$st22,$test,$datejour1,$datejour2)
    {
	$x=5;$this->SetXY($x,$h1); 	                  $this->cell(30,7.5,$t1,1,0,'C',0);
	$x=5+30;$this->SetXY($x,$h1); 	              $this->cell(10,7.5,$st1,1,0,'C',0);
	$x=5+30+10;$this->SetXY($x,$h1); 	          $this->cell(11,7.5,$this->malade("MEDECINE HOMME",$test,$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+11;$this->SetXY($x,$h1); 	      $this->cell(11,7.5,$st3*$this->malade("MEDECINE HOMME",$test,$datejour1,$datejour2),1,0,'C',0);
	$x=5+30+10+(11*2);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->malade("MEDECINE FEMME",$test,$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*3);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st5*$this->malade("MEDECINE FEMME",$test,$datejour1,$datejour2),1,0,'C',0);
	$x=5+30+10+(11*4);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->malade("CHIRURGIE HOMME",$test,$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*5);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st7*$this->malade("CHIRURGIE HOMME",$test,$datejour1,$datejour2),1,0,'C',0);
	$x=5+30+10+(11*6);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->malade("CHIRURGIE FEMME",$test,$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*7);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st9*$this->malade("CHIRURGIE FEMME",$test,$datejour1,$datejour2),1,0,'C',0);
	$x=5+30+10+(11*8);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->malade("GYNECO",$test,$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*9);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st11*$this->malade("GYNECO",$test,$datejour1,$datejour2),1,0,'C',0);
	$x=5+30+10+(11*10);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->malade("MATERNITE",$test,$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*11);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st13*$this->malade("MATERNITE",$test,$datejour1,$datejour2),1,0,'C',0);
	$x=5+30+10+(11*12);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->malade("PEDIATRIE",$test,$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*13);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st15*$this->malade("PEDIATRIE",$test,$datejour1,$datejour2),1,0,'C',0);
	$x=5+30+10+(11*14);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->malade("HEMODIALYSE",$test,$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*15);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st17*$this->malade("HEMODIALYSE",$test,$datejour1,$datejour2),1,0,'C',0);
	$x=5+30+10+(11*16);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->malade("EXT",$test,$datejour1,$datejour2),1,0,'C',0);
	$x=5+30+10+(11*17);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st19*$this->malade("EXT",$test,$datejour1,$datejour2),1,0,'C',0);
	$x=5+30+10+(11*18);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->malade("UMC",$test,$datejour1,$datejour2),1,0,'C',0);//manque bloc
	$x=5+30+10+(11*19);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st21*$this->malade("UMC",$test,$datejour1,$datejour2),1,0,'C',0);
	$x=5+30+10+(11*20);$this->SetXY($x,$h1); 	  $this->cell(22,7.5,$st22,1,0,'C',0);
    }
	
	function distributioneva($service,$PSL,$datejour1,$datejour2)
	{
	  $this->mysqlconnect();
	  $SRS=$this->STRUCTURE();
	  $sql= "select service,PSL from dis ";//where SRS='$SRS' and PSL='$PSL' and service ='$service' and condate >='$datejour1' and condate <='$datejour2'
	  $requete = mysql_query($sql) or die($sql."<br>".mysql_error());
	  $compagne=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $compagne;
	}
	function lignedis($h1,$t1,$st1,$st3,$st5,$st7,$st9,$st11,$st13,$st15,$st17,$st19,$st21,$st22,$datejour1,$datejour2)
    {
	$x=5;$this->SetXY($x,$h1); 	                  $this->cell(30,7.5,$t1,1,0,'C',0);
	$x=5+30;$this->SetXY($x,$h1); 	              $this->cell(10,7.5,$st1,1,0,'C',0);
	$x=5+30+10;$this->SetXY($x,$h1);              $this->cell(11,7.5,$this->distribution('MEDECINE HOMME','CGR',$datejour1,$datejour2)+$this->distribution('MEDECINE HOMME','PFC',$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+11;$this->SetXY($x,$h1); 	      $this->cell(11,7.5,$st3*($this->distribution('MEDECINE HOMME','CGR',$datejour1,$datejour2)+$this->distribution('MEDECINE HOMME','PFC',$datejour1,$datejour2)),1,0,'C',0);
	$x=5+30+10+(11*2);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->distribution('MEDECINE FEMME','CGR',$datejour1,$datejour2)+$this->distribution('MEDECINE FEMME','PFC',$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*3);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st5*($this->distribution('MEDECINE FEMME','CGR',$datejour1,$datejour2)+$this->distribution('MEDECINE FEMME','PFC',$datejour1,$datejour2)),1,0,'C',0);//$this->distribution('','CGR',$datejour1,$datejour2)
	$x=5+30+10+(11*4);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->distribution('CHIRURGIE HOMME','CGR',$datejour1,$datejour2)+$this->distribution('CHIRURGIE HOMME','PFC',$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*5);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st7*($this->distribution('CHIRURGIE HOMME','CGR',$datejour1,$datejour2)+$this->distribution('CHIRURGIE HOMME','PFC',$datejour1,$datejour2)),1,0,'C',0);
	$x=5+30+10+(11*6);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->distribution('CHIRURGIE FEMME','CGR',$datejour1,$datejour2)+$this->distribution('CHIRURGIE FEMME','PFC',$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*7);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st9*($this->distribution('CHIRURGIE FEMME','CGR',$datejour1,$datejour2)+$this->distribution('CHIRURGIE FEMME','PFC',$datejour1,$datejour2)),1,0,'C',0);
	$x=5+30+10+(11*8);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->distribution('GYNECO','CGR',$datejour1,$datejour2)+$this->distribution('GYNECO','PFC',$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*9);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st11*($this->distribution('GYNECO','CGR',$datejour1,$datejour2)+$this->distribution('GYNECO','PFC',$datejour1,$datejour2)),1,0,'C',0);
	$x=5+30+10+(11*10);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->distribution('MATERNITE','CGR',$datejour1,$datejour2)+$this->distribution('MATERNITE','PFC',$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*11);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st13*($this->distribution('MATERNITE','CGR',$datejour1,$datejour2)+$this->distribution('MATERNITE','PFC',$datejour1,$datejour2)),1,0,'C',0);
	$x=5+30+10+(11*12);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->distribution('PEDIATRIE','CGR',$datejour1,$datejour2)+$this->distribution('PEDIATRIE','PFC',$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*13);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st15*($this->distribution('PEDIATRIE','CGR',$datejour1,$datejour2)+$this->distribution('PEDIATRIE','PFC',$datejour1,$datejour2)),1,0,'C',0);
	$x=5+30+10+(11*14);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->distribution('HEMODIALYSE','CGR',$datejour1,$datejour2)+$this->distribution('HEMODIALYSE','PFC',$datejour1,$datejour2),1,0,'C',0);//
	$x=5+30+10+(11*15);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st17*($this->distribution('HEMODIALYSE','CGR',$datejour1,$datejour2)+$this->distribution('HEMODIALYSE','PFC',$datejour1,$datejour2)),1,0,'C',0);
	$x=5+30+10+(11*16);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->distribution('EXT','CGR',$datejour1,$datejour2)+$this->distribution('EXT','PFC',$datejour1,$datejour2),1,0,'C',0);
	$x=5+30+10+(11*17);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st19*($this->distribution('EXT','CGR',$datejour1,$datejour2)+$this->distribution('EXT','PFC',$datejour1,$datejour2)),1,0,'C',0);
	$x=5+30+10+(11*18);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$this->distribution('UMC','CGR',$datejour1,$datejour2)+$this->distribution('BLOC OPP A','CGR',$datejour1,$datejour2)+$this->distribution('BLOC OPP B','CGR',$datejour1,$datejour2)+$this->distribution('UMC','PFC',$datejour1,$datejour2)+$this->distribution('BLOC OPP A','PFC',$datejour1,$datejour2)+$this->distribution('BLOC OPP B','PFC',$datejour1,$datejour2),1,0,'C',0);//manque bloc
	$x=5+30+10+(11*19);$this->SetXY($x,$h1); 	  $this->cell(11,7.5,$st21*($this->distribution('UMC','CGR',$datejour1,$datejour2)+$this->distribution('BLOC OPP A','CGR',$datejour1,$datejour2)+$this->distribution('BLOC OPP B','CGR',$datejour1,$datejour2)+$this->distribution('UMC','PFC',$datejour1,$datejour2)+$this->distribution('BLOC OPP A','PFC',$datejour1,$datejour2)+$this->distribution('BLOC OPP B','PFC',$datejour1,$datejour2)),1,0,'C',0);
	$x=5+30+10+(11*20);$this->SetXY($x,$h1); 	  $this->cell(22,7.5,$st22,1,0,'C',0);
    }
	
	//****************************************RAPPORT ******************************************************************//
	function RAPPORT($datejour1,$datejour2) 
	{
	$this->AddPage('p','a4');
	$this->SetFont('Arial','B',10);
	$this->Image('../public/images/photos/LOGOAO.GIF',5,5,15,15,0);
	$this->Text(70,5,'AGENCE REGIONALE DE :'.$this->nbrtostring("mvc","ars","IDARS",$this->REGION(),"WILAYAS"));
	$this->Text(20,13,'Wilaya de :'.$this->nbrtostring("mvc","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(100,13,'Structure :'.$this->nbrtostring("mvc","cts","IDCTS",$this->STRUCTURE(),"CTS"));	              
	$this->Text(140,18,"Adresse:".$this->nbrtostring("mvc","cts","IDCTS",$this->STRUCTURE(),"CTS"));			  
	$this->Text(20,18,"TEL:027/82/32/88");
	$this->Text(100,18,"FAX:027/82/21/37");
	$this->SetXY(5,19);$this->Cell(198,8,'________________________________________FICHE D EVALUATION________________________________________',0,1,'C');
	$this->SetXY(5,19+4.5);$this->Cell(198,8,'DU '.$this->dateUS2FR($datejour1).' AU '.$this->dateUS2FR($datejour2),0,1,'C');
	}
	
	
	//****************************************evaluation ******************************************************************//
	function enteteeva($datejour1,$datejour2) 
	{
	$this->AddPage('p','a4');
	$this->SetFont('Arial','B',10);
	$this->Image('../public/images/photos/LOGOAO.GIF',5,5,15,15,0);
	$this->Text(70,5,'AGENCE REGIONALE DE :'.$this->nbrtostring("mvc","ars","IDARS",$this->REGION(),"WILAYAS"));
	$this->Text(20,13,'Wilaya de :'.$this->nbrtostring("mvc","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(100,13,'Structure :'.$this->nbrtostring("mvc","cts","IDCTS",$this->STRUCTURE(),"CTS"));	              
	$this->Text(140,18,"Adresse:".$this->nbrtostring("mvc","cts","IDCTS",$this->STRUCTURE(),"CTS"));			  
	$this->Text(20,18,"TEL:027/82/32/88");
	$this->Text(100,18,"FAX:027/82/21/37");
	$this->SetXY(5,19);$this->Cell(198,8,'________________________________________FICHE D EVALUATION________________________________________',0,1,'C');
	$this->SetXY(5,19+4.5);$this->Cell(198,8,'DU '.$this->dateUS2FR($datejour1).' AU '.$this->dateUS2FR($datejour2),0,1,'C');
	}
	function collecte($colone1,$colone2,$datejour1,$datejour2,$TDON)
	{
	  $this->mysqlconnect();
	  $SRS=$this->STRUCTURE();
	  $sql = " select * from don where SRS='$SRS' and TDNR='$colone1'and STR='$colone2'and DATEDON >='$datejour1'and DATEDON <='$datejour2' and IND='IND' and TDON='$TDON' ";// 
	  $requete = mysql_query($sql) or die($sql."<br>".mysql_error());
	  $collecte=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $collecte;
	}
	function collecte1($datejour1,$datejour2)
	{
	  $this->mysqlconnect();
	  $SRS=$this->STRUCTURE();
	  $sql = " select * from compagne where SRS='$SRS' and DATEDON >='$datejour1'and DATEDON <='$datejour2'  ";// 
	  $requete = mysql_query($sql) or die($sql."<br>".mysql_error());
	  $collecte=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $collecte;
	}
	function indication($ind,$datejour1,$datejour2)
	{
	  $this->mysqlconnect();
	  $SRS=$this->STRUCTURE();
	  $sql = " select IND,DATEDON from don where SRS='$SRS' and IND ='$ind' and DATEDON >='$datejour1' and DATEDON <='$datejour2'";
	  $requete = mysql_query($sql) or die($sql."<br>".mysql_error());
	  $indication=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $indication;
	}  	
	function corpscollecte($datejour1,$datejour2) 
	{
	//**** gauche ****//
	$this->SetXY(5,28);$this->Cell(198,8,'__________________________________________UNITE COLLECTE__________________________________________',0,1,'C');
	$this->Rect(5, 38, 198, 52 ,"d");
	$rf=$this->collecte('regulier','fixe',$datejour1,$datejour2,'NORMAL');      $rm=$this->collecte('regulier','mobile',$datejour1,$datejour2,'NORMAL');       $rfa=$this->collecte('regulier','fixe',$datejour1,$datejour2,'APHERESE');
	$of=$this->collecte('Occasionnel','fixe',$datejour1,$datejour2,'NORMAL');   $om=$this->collecte('Occasionnel','mobile',$datejour1,$datejour2,'NORMAL');    $ofa=$this->collecte('Occasionnel','fixe',$datejour1,$datejour2,'APHERESE');
                                                                                $this->SetXY(35,40);$this->Cell(30,5.3,'Sang Total',1,1,'C');
	$this->SetXY(10,40);$this->Cell(25,10.6,'NBR de dons',1,1,'L');    $this->SetXY(35,45.5);$this->Cell(15,5.3,'Fixe',1,1,'C');                                  $this->SetXY(50,45.5);$this->Cell(15,5.3,'Mobile',1,1,'C');  $this->SetXY(65,40);$this->Cell(25,10.6,'Apherese',1,1,'C');    
	$this->SetXY(10,51);  $this->Cell(25,5.3,'Reguliers',1,1,'L');     $this->SetTextColor(225,0,0); $this->SetXY(35,51);$this->Cell(15,5.3,$rf,1,1,'C');         $this->SetXY(50,51);$this->Cell(15,5.3,$rm,1,1,'C');         $this->SetXY(65,51);$this->Cell(25,5.3,$rfa,1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(10,56.3);$this->Cell(25,5.3,'Occasionnels',1,1,'L');  $this->SetTextColor(225,0,0); $this->SetXY(35,56.3);$this->Cell(15,5.3,$of,1,1,'C');       $this->SetXY(50,56.3);$this->Cell(15,5.3,$om,1,1,'C');       $this->SetXY(65,56.3);$this->Cell(25,5.3,$ofa,1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(10,61.6);$this->Cell(25,5.3,'Familiaux',1,1,'L');     $this->SetTextColor(225,0,0); $this->SetXY(35,61.6);$this->Cell(15,5.3,'0',1,1,'C');       $this->SetXY(50,61.6);$this->Cell(15,5.3,'0',1,1,'C');       $this->SetXY(65,61.6);$this->Cell(25,5.3,'0',1,1,'C'); $this->SetTextColor(0,0,0);
	$this->SetXY(10,66.9);$this->Cell(25,5.3,'Total',1,1,'L');         $this->SetTextColor(225,0,0); $this->SetXY(35,66.9);$this->Cell(15,5.3,$rf+$of,1,1,'C');	  $this->SetXY(50,66.9);$this->Cell(15,5.3,$rm+$om,1,1,'C');   $this->SetXY(65,66.9);$this->Cell(25,5.3,$rfa+$ofa,1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(10,72.5);$this->Cell(25,5.3,'Total General ',1,1,'L');$this->SetTextColor(225,0,0); $this->SetXY(35,72.5);$this->Cell(55,5.3,$rf+$of+$rm+$om+$rfa+$ofa,1,1,'C');$this->SetTextColor(0,0,0);

	$this->SetXY(100,40);$this->Cell(100,8,'Nombre De Contre Indications ',1,1,'C');
	$this->SetXY(100,48);$this->Cell(55,5.3,'C.I.Temporaires',1,1,'L');
	$this->SetXY(100,53.3);$this->Cell(55,5.5,'C.I.Definitives',1,1,'L');
	$this->SetTextColor(225,0,0);
	$this->SetXY(155,48);$this->Cell(45,5.3,$this->indication('CIDT',$datejour1,$datejour2),1,1,'C');
	$this->SetXY(155,53.3);$this->Cell(45,5.3,$this->indication('CIDD',$datejour1,$datejour2),1,1,'C');
	$this->SetTextColor(0,0,0);
	
	$this->SetXY(100,60);$this->Cell(100,5.5,'Nombre De Collecte mobile ',1,1,'C');
	$this->SetXY(100,65.5);$this->Cell(55,5.3,'par vehicule de collecte',1,1,'L');
	$this->SetXY(100,70.8);$this->Cell(55,5.5,'sans vehicule de collecte',1,1,'L');
	$this->SetTextColor(225,0,0);
	$this->SetXY(155,65.5);$this->Cell(45,5.3,'0',1,1,'C');
	$this->SetXY(155,65.5+5.3);$this->Cell(45,5.3,$this->collecte1($datejour1,$datejour2),1,1,'C');
	$this->SetTextColor(0,0,0);

	$this->SetXY(10,80);$this->Cell(80,5.3,' Nombre Condidats Au Don',1,1,'L');  $this->SetTextColor(225,0,0); $this->SetXY(100,80);$this->Cell(100,5.3,$rf+$of+$rm+$om+$rfa+$ofa+$this->indication('CIDT',$datejour1,$datejour2)+$this->indication('CIDD',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);

	}	
	//________________________________________UNITE PREPARATION________________________________________
	function PREPARATION($colone,$datejour1,$datejour2)
	{
	  $this->mysqlconnect(); 
	  $SRS=$this->STRUCTURE();
	  $sql = " select $colone,DATEDON from don where SRS='$SRS' and IND ='IND' and $colone='1' and  DATEDON >='$datejour1'and DATEDON <='$datejour2' ";
	  $requete = mysql_query($sql) or die($sql."<br>".mysql_error());
	  $PREPARATION=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $PREPARATION;
	}

	function corpspreparation($datejour1,$datejour2)
	{
	$this->SetXY(5,90);$this->Cell(198,8,'________________________________________UNITE PREPARATION________________________________________',0,1,'C');
	$this->Rect(5, 100, 198, 117 ,"d");
	// ***gauche***//
	$this->SetXY(10,105);$this->Cell(73,8,'Nombre de dons non conformes',1,1,'C');
	$this->SetXY(10,113);$this->Cell(16,40,'sang tot',1,1,'L');
	$this->SetXY(26,113);$this->Cell(42,8,'Quantite Non Suffisante',1,1,'L');$this->SetTextColor(225,0,0);  $this->SetXY(68,113);$this->Cell(15,8,$this->PREPARATION('VI',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(26,121);$this->Cell(42,8,'Poches non conformes',1,1,'L');   $this->SetTextColor(225,0,0);  $this->SetXY(68,121);$this->Cell(15,8,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);//???
	$this->SetXY(26,129);$this->Cell(42,8,'Fuite defaut de soudure',1,1,'L');$this->SetTextColor(225,0,0);  $this->SetXY(68,129);$this->Cell(15,8,$this->PREPARATION('FDS',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(26,137);$this->Cell(42,8,'Aspect coagule',1,1,'L');         $this->SetTextColor(225,0,0);  $this->SetXY(68,137);$this->Cell(15,8,$this->PREPARATION('AC',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(26,145);$this->Cell(42,8,'Autres',1,1,'L');                 $this->SetTextColor(225,0,0);  $this->SetXY(68,145);$this->Cell(15,8,$this->PREPARATION('AC',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(10,153);$this->Cell(16,24,'apherese',1,1,'L');
	$this->SetXY(26,153);$this->Cell(42,8,'Quantite Non Suffisante',1,1,'L');$this->SetTextColor(225,0,0);  $this->SetXY(68,153);$this->Cell(15,8,$this->PREPARATION('VI',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
    $this->SetXY(26,161);$this->Cell(42,8,'Fuite defaut de soudure',1,1,'L');$this->SetTextColor(225,0,0);  $this->SetXY(68,161);$this->Cell(15,8,$this->PREPARATION('FDS',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(26,169);$this->Cell(42,8,'Autres',1,1,'L');                 $this->SetTextColor(225,0,0);  $this->SetXY(68,169);$this->Cell(15,8,$this->PREPARATION('AC',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	//***centre***// 
	$this->SetXY(85,105);$this->Cell(40,8,'Nombre de PSL',1,1,'C');
	$PSLCGR=$this->PREPARATION('CGR',$datejour1,$datejour2);
	$PSLPFC=$this->PREPARATION('PFC',$datejour1,$datejour2);
	$PSLCPS=$this->PREPARATION('CPS',$datejour1,$datejour2);
	
	$this->SetXY(85,113);$this->Cell(20,8,'CGR',1,1,'L');                    $this->SetTextColor(225,0,0);$this->SetXY(85+20,113);$this->Cell(20,8,$PSLCGR,1,1,'C');$this->SetTextColor(0,0,0);//
	$this->SetXY(85,121);$this->Cell(20,8,'CGR/F',1,1,'L');                  $this->SetTextColor(225,0,0);$this->SetXY(85+20,121);$this->Cell(20,8,'0',1,1,'C');$this->SetTextColor(0,0,0);//
	$this->SetXY(85,129);$this->Cell(20,8,'PFC',1,1,'L');                    $this->SetTextColor(225,0,0);$this->SetXY(85+20,129);$this->Cell(20,8,$PSLPFC,1,1,'C');$this->SetTextColor(0,0,0);//
	$this->SetXY(85,137);$this->Cell(20,8,'CPS',1,1,'L');                    $this->SetTextColor(225,0,0);$this->SetXY(85+20,137);$this->Cell(20,8,$PSLCPS,1,1,'C');$this->SetTextColor(0,0,0);//
	$this->SetXY(85,145);$this->Cell(20,8,'CRYO',1,1,'L');                   $this->SetTextColor(225,0,0);$this->SetXY(85+20,145);$this->Cell(20,8,'0',1,1,'C');$this->SetTextColor(0,0,0);//
	$this->SetXY(85,153);$this->Cell(20,8,'TOTAL',1,1,'L');                  $this->SetTextColor(225,0,0);$this->SetXY(85+20,153);$this->Cell(20,8,$PSLCGR+$PSLPFC+$PSLCPS,1,1,'C');$this->SetTextColor(0,0,0);//
	
	$this->SetXY(85,170);$this->Cell(20,8,'ST non Pre',1,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(85+20,170);$this->Cell(20,8,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);//
	
	$this->SetXY(10,190);$this->Cell(95,8,'total don de sang total valide pour preparation',1,1,'L');  $this->SetTextColor(225,0,0);  $this->SetXY(85+20,190);$this->Cell(20,8,$this->PREPARATION('AC',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(10,198);$this->Cell(95,8,'total don par apherese conforme',1,1,'L');                  $this->SetTextColor(225,0,0);  $this->SetXY(85+20,198);$this->Cell(20,8,$this->PREPARATION('AC',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	// ***droite***//
	$this->SetXY(127,105);$this->Cell(73,8,'Nombre de PSL prepares non conformes',1,1,'C');
	//***************// 
	$this->SetXY(127,95+18);$this->Cell(15,30,'CGR',1,1,'C');
	$this->SetXY(127+15,95+18);$this->Cell(48,6,'Fuite defaut de soudure',1,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(127+63,95+18);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);//???
	$this->SetXY(127+15,95+24);$this->Cell(48,6,'Aspect coagule',1,1,'L');         $this->SetTextColor(225,0,0);$this->SetXY(127+63,95+24);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,95+30);$this->Cell(48,6,'Quantite Non Suffisante',1,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(127+63,95+30);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,95+36);$this->Cell(48,6,'serologie positive',1,1,'L');     $this->SetTextColor(225,0,0);$this->SetXY(127+63,95+36);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,95+42);$this->Cell(48,6,'autres',1,1,'L');                 $this->SetTextColor(225,0,0);$this->SetXY(127+63,95+42);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	//***************//
	$this->SetXY(127,143);$this->Cell(15,42,'PFC',1,1,'C');
	$this->SetXY(127+15,95+48);$this->Cell(48,6,'Fuite defaut de soudure',1,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(127+63,95+48);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,95+54);$this->Cell(48,6,'Quantite Non Suffisante',1,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(127+63,95+54);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,95+60);$this->Cell(48,6,'Aspect lipemique',1,1,'L');       $this->SetTextColor(225,0,0);$this->SetXY(127+63,95+60);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,95+66);$this->Cell(48,6,'Aspect hematique',1,1,'L');       $this->SetTextColor(225,0,0);$this->SetXY(127+63,95+66);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,95+72);$this->Cell(48,6,'Aspect icterique',1,1,'L');       $this->SetTextColor(225,0,0);$this->SetXY(127+63,95+72);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,95+78);$this->Cell(48,6,'serologie positive',1,1,'L');     $this->SetTextColor(225,0,0);$this->SetXY(127+63,95+78);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,95+84);$this->Cell(48,6,'autres',1,1,'L');                 $this->SetTextColor(225,0,0);$this->SetXY(127+63,95+84);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	//***************//
	$this->SetXY(127,185);$this->Cell(15,30,'CPS',1,1,'C');
	$this->SetXY(127+15,95+90);$this->Cell(48,6,'Fuite defaut de soudure',1,1,'L'); $this->SetTextColor(225,0,0);$this->SetXY(127+63,95+90);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,95+96);$this->Cell(48,6,'Aspect hematique',1,1,'L');        $this->SetTextColor(225,0,0);$this->SetXY(127+63,95+96);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,95+102);$this->Cell(48,6,'Quantite Non Suffisante',1,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(127+63,95+102);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,95+108);$this->Cell(48,6,'serologie positive',1,1,'L');     $this->SetTextColor(225,0,0);$this->SetXY(127+63,95+108);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,95+114);$this->Cell(48,6,'autres',1,1,'L');                 $this->SetTextColor(225,0,0);$this->SetXY(127+63,95+114);$this->Cell(10,6,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	}
	
	//********************************************UNITE QUALIFICATIONS BIOLOGIQUES*********************************** corpsdistribution1
	function qualification($colone,$datejour1,$datejour2)
	{
	  $this->mysqlconnect(); 
	  $SRS=$this->STRUCTURE();
	  $sql = " select $colone,DATEDON from don where SRS='$SRS' and IND ='IND'  and DATEDON >='$datejour1'and DATEDON <='$datejour2' ";
	  $requete = mysql_query($sql) or die($sql."<br>".mysql_error());
	  $qualification=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $qualification;
	}
	function qualificationdp($colone,$dp,$datejour1,$datejour2)
	{
	  $this->mysqlconnect(); 	
	  $SRS=$this->STRUCTURE();
	  $sql = " select $colone,DATEDON from don where SRS='$SRS' and IND ='IND' and $colone='$dp'  and DATEDON >='$datejour1'and DATEDON <='$datejour2' ";
	  $requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	  $qualificationdp=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $qualificationdp;
	}
	function Phenotypage($datejour1,$datejour2)
	{
	  $this->mysqlconnect(); 
	  $SRS=$this->STRUCTURE();
	  $sql = " select GROUPAGE,DATEDON from don where SRS='$SRS' and IND ='IND' and CRH2!=''and DATEDON >='$datejour1'and DATEDON <='$datejour2' ";
	  $requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	  $immunologie=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $immunologie;
	}
	function Phenotypage1($datejour1,$datejour2)
	{
	  $this->mysqlconnect(); 
	  $SRS=$this->STRUCTURE();
	  $sql = " select CRH2,DATEDIS from dis where SRS='$SRS'  and CRH2!=''and DATEDIS >='$datejour1'and DATEDIS <='$datejour2' ";
	  $requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	  $immunologie=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $immunologie;
	}
	function Immuno($datejour1,$datejour2)
	{
	$this->SetXY(5,216);$this->Cell(198,8,'________________________________UNITE QUALIFICATIONS BIOLOGIQUES________________________________',0,1,'C');
	$this->Rect(5, 230-4, 198, 55 ,"d");
	$this->SetXY(10,235-4);$this->Cell(40,20,'Immuno-hematologie',1,1,'C');
	$this->SetXY(50,235-4);$this->Cell(25,8,'Groupage',1,1,'C');
	$this->SetXY(75,235-4);$this->Cell(75,8,'02 epreuves',1,1,'C');$this->SetXY(150,235-4);$this->Cell(25,4,'Oui',1,1,'C');$this->SetXY(175,235-4);$this->Cell(25,4,'X',1,1,'C');
                                                                   $this->SetXY(150,239-4);$this->Cell(25,4,'Non',1,1,'C');$this->SetXY(175,239-4);$this->Cell(25,4,'',1,1,'C');
	$this->SetXY(50,235+4);$this->Cell(25,12,'Phenotypage',1,1,'C');
	$this->SetXY(75,235+4);$this->Cell(75,4,'Dons phenotypes',1,1,'L');   $this->SetXY(150,235+4);$this->Cell(50,4,$this->Phenotypage($datejour1,$datejour2),1,1,'C');
	$this->SetXY(75,235+8);$this->Cell(75,4,'Rec phenotypes',1,1,'L');    $this->SetXY(150,235+8);$this->Cell(50,4,$this->Phenotypage1($datejour1,$datejour2),1,1,'C');
	$this->SetXY(75,235+12);$this->Cell(75,4,'Epreuves de compa',1,1,'L');$this->SetXY(150,235+12);$this->Cell(50,4,'00',1,1,'C');
	}
	
	function ligneserologie($y,$a,$b,$c,$d,$e,$f,$g)
	{
	$this->SetXY(10,$y);   $this->Cell(25,4,$a,1,1,'L');$this->SetTextColor(0,0,0); 
	$this->SetXY(35,$y);   $this->SetTextColor(225,0,0);$this->Cell(25,4,$b,1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(60,$y);   $this->SetTextColor(225,0,0);$this->Cell(25,4,$c,1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(85,$y);   $this->SetTextColor(225,0,0);$this->Cell(25,4,$d,1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(110,$y);  $this->SetTextColor(225,0,0);$this->Cell(25,4,$e,1,1,'C');$this->SetTextColor(0,0,0);  
	$this->SetXY(135,$y);  $this->SetTextColor(225,0,0);$this->Cell(25,4,$f,1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(160,$y);  $this->SetTextColor(225,0,0);$this->Cell(40,4,$g,1,1,'C');$this->SetTextColor(0,0,0);   
	}
	
	function enteteserologie($datejour1,$datejour2)
	{
	$this->ligneserologie(254,'Serologie','Serotypes','Depiste(+)/D','Controles(+)','Confirmes(+)','Technique','Lieu');
	$this->ligneserologie(258,'HIV', $this->qualification('HIV',$datejour1,$datejour2), $this->qualificationdp('HIV','douteux',$datejour1,$datejour2),$this->qualificationdp('HIV','douteux',$datejour1,$datejour2),$this->qualificationdp('HIV','Positif',$datejour1,$datejour2),'ELISA','IPA');
	$this->ligneserologie(262,'HBS', $this->qualification('HVB',$datejour1,$datejour2), $this->qualificationdp('HVB','douteux',$datejour1,$datejour2),$this->qualificationdp('HVB','douteux',$datejour1,$datejour2),$this->qualificationdp('HVB','Positif',$datejour1,$datejour2),'ELISA','IPA');
	$this->ligneserologie(266,'HBC', $this->qualification('HVC',$datejour1,$datejour2), $this->qualificationdp('HVC','douteux',$datejour1,$datejour2),$this->qualificationdp('HVC','douteux',$datejour1,$datejour2),$this->qualificationdp('HVC','Positif',$datejour1,$datejour2),'ELISA','IPA');
	$this->ligneserologie(270,'SYPH',$this->qualification('TPHA',$datejour1,$datejour2),$this->qualificationdp('TPHA','douteux',$datejour1,$datejour2),$this->qualificationdp('TPHA','douteux',$datejour1,$datejour2),$this->qualificationdp('TPHA','Positif',$datejour1,$datejour2),'ELISA','IPA');
	}
	
	//********************************************UNITE DISTRIBUTION***********************************
	function distribution($service,$PSL,$datejour1,$datejour2)
	{
	  $SRS=$this->STRUCTURE(); $this->mysqlconnect(); 
	  $sql= "select SERVICE,PSL from dis where SRS='$SRS' and PSL='$PSL' and service ='$service' and DATEDIS >='$datejour1' and DATEDIS <='$datejour2'";
	  $requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	  $distribution=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $distribution;
	}
	function distributionpsl($PSL,$datejour1,$datejour2)
	{
	  $SRS=$this->STRUCTURE(); $this->mysqlconnect(); 
	  $sql= "select PSL from dis where SRS='$SRS' and PSL='$PSL' and DATEDIS >='$datejour1' and DATEDIS <='$datejour2'";
	  $requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	  $distribution=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $distribution;
	}
	function psl($h,$x,$ST,$CGR,$CGRF,$PFC,$CP,$CPA,$CRYO)
	{
	$this->SetXY(10,$h);         $this->Cell(94-15.5,8,$x,1,1,'L');
	$this->SetTextColor(225,0,0);
	$this->SetXY(104-15.5,$h);   $this->Cell(15.5,8,$ST,1,1,'C');
	$this->SetXY(104,$h);        $this->Cell(15.5,8,$CGR,1,1,'C');
	$this->SetXY(119.5,$h);      $this->Cell(15.5,8,$CGRF,1,1,'C');
	$this->SetXY(135,$h);        $this->Cell(15.5,8,$PFC,1,1,'C');
	$this->SetXY(150.5,$h);      $this->Cell(15.5,8,$CP,1,1,'C');
	$this->SetXY(166,$h);        $this->Cell(15.5,8,$CPA,1,1,'C'); 
	$this->SetXY(181.5,$h);      $this->Cell(18,8,$CRYO,1,1,'C');  
	$this->SetTextColor(0,0,0);
	}
	function PERUMPTION($table,$datejour1,$datejour2)
	{
	  $this->mysqlconnect(); 
	  $SRS=$this->STRUCTURE();
	  $DATEPER=date('Y-m-d');
	  $sql = " select DIST,DATEDON,DATEPER from $table where  DATEPER<='$DATEPER' and SRS='$SRS' and DIST!='1' and DATEDON >='$datejour1' and DATEDON <='$datejour2' ";
	  $requete = mysql_query($sql) or die($sql."<br>".mysql_error());
	  $PREPARATION=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $PREPARATION;
	}
	function STOCKPSL($table,$datejour1,$datejour2)
	{
	  $this->mysqlconnect(); 
	  $SRS=$this->STRUCTURE();
	  $DATEPER=date('Y-m-d');
	  $sql = " select DIST,DATEDON,DATEPER from $table where  DATEPER>='$DATEPER' and SRS='$SRS' and DIST!='1' and DATEDON >='$datejour1' and DATEDON <='$datejour2' ";
	  $requete = mysql_query($sql) or die($sql."<br>".mysql_error());
	  $PREPARATION=mysql_num_rows($requete);
	  mysql_free_result($requete);
	  return $PREPARATION;
	}
	
	function corpsdistribution1($datejour1,$datejour2)
	{
	$PSLCGR=$this->PREPARATION('CGR',$datejour1,$datejour2);
	$PSLPFC=$this->PREPARATION('PFC',$datejour1,$datejour2);
	$PSLCPS=$this->PREPARATION('CPS',$datejour1,$datejour2);
	
	$PERCGR=$this->PERUMPTION('CGR',$datejour1,$datejour2);
	$PERPFC=$this->PERUMPTION('PFC',$datejour1,$datejour2);
	$PERCPS=$this->PERUMPTION('CPS',$datejour1,$datejour2);
	
	$STOCKCGR=$this->STOCKPSL('CGR',$datejour1,$datejour2);
	$STOCKPFC=$this->STOCKPSL('PFC',$datejour1,$datejour2);
	$STOCKCPS=$this->STOCKPSL('CPS',$datejour1,$datejour2);
	
	
	$this->SetXY(5,28);$this->Cell(198,8,'__________________________________________UNITE DISTRIBUTION__________________________________________',0,1,'C'); 
	$this->Rect(5, 38, 198, 225 ,"d");
	$this->psl(40,'','ST','CGR','CGR/F','PFC','CPS','CPA','CRYO');
	$this->psl(40+8,'PSL qualifies et etiquetes','0',$PSLCGR,'0',$PSLPFC,$PSLCPS,'0','0');
	$this->psl(40+16,'Stock Debut d Annee','0','0','0','0','0','0','0');
	$this->psl(40+24,'Stock fin d Annee','0',$STOCKCGR,'0',$STOCKPFC,$STOCKCPS,'0','0');
	$this->psl(40+32,'Produit perimes durant l\'annee ecoulee','0',$PERCGR,'0',$PERPFC,$PERCPS,'0','0');
	
	$this->psl(90-8,'DISTRIBUTION INTRA MUROS','ST','CGR','CGR/F','PFC','CPS','CPA','CRYO');
	
	$chst= $this->distribution('4','ST',$datejour1,$datejour2)+$this->distribution('5','ST',$datejour1,$datejour2);
	$chcgr=$this->distribution('4','CGR',$datejour1,$datejour2)+$this->distribution('5','CGR',$datejour1,$datejour2);
	$chpfc=$this->distribution('4','PFC',$datejour1,$datejour2)+$this->distribution('5','PFC',$datejour1,$datejour2);
	$chcps=$this->distribution('4','CPS',$datejour1,$datejour2)+$this->distribution('5','CPS',$datejour1,$datejour2);
	$this->psl(98-8,'Chirurgie',$chst,$chcgr,'0',$chpfc,$chcps,'0','0');
	
	$gost= $this->distribution('6','ST',$datejour1,$datejour2)+$this->distribution('7','ST',$datejour1,$datejour2);
	$gocgr=$this->distribution('6','CGR',$datejour1,$datejour2)+$this->distribution('7','CGR',$datejour1,$datejour2);
	$gopfc=$this->distribution('6','PFC',$datejour1,$datejour2)+$this->distribution('7','PFC',$datejour1,$datejour2);
	$gocps=$this->distribution('6','CPS',$datejour1,$datejour2)+$this->distribution('7','CPS',$datejour1,$datejour2);
	$this->psl(106-8,'Gyneco-Obstetrique',$gost,$gocgr,'0',$gopfc,$gocps,'0','0');
	
	$pedst= $this->distribution('8','ST',$datejour1,$datejour2);
	$pedcgr=$this->distribution('8','CGR',$datejour1,$datejour2);
	$pedpfc=$this->distribution('8','PFC',$datejour1,$datejour2);
	$pedcps=$this->distribution('8','CPS',$datejour1,$datejour2);
	$this->psl(114-8,'Pediatrie',$pedst,$pedcgr,'0',$pedpfc,$pedcps,'0','0');
	
	$this->psl(122-8,'Hematologie','0','0','0','0','0','0','0');
	
	$hdst= $this->distribution('12','ST',$datejour1,$datejour2);
	$hdcgr=$this->distribution('12','CGR',$datejour1,$datejour2);
	$hdpfc=$this->distribution('12','PFC',$datejour1,$datejour2);
	$hdcps=$this->distribution('12','CPS',$datejour1,$datejour2);
	$this->psl(130-8,'Hemodialyse',$hdst,$hdcgr,'0',$hdpfc,$hdcps,'0','0');
	
	$mist= $this->distribution('2','ST',$datejour1,$datejour2)+$this->distribution('3','ST',$datejour1,$datejour2);
	$micgr=$this->distribution('2','CGR',$datejour1,$datejour2)+$this->distribution('3','CGR',$datejour1,$datejour2);
	$mipfc=$this->distribution('2','PFC',$datejour1,$datejour2)+$this->distribution('3','PFC',$datejour1,$datejour2);
	$micps=$this->distribution('2','CPS',$datejour1,$datejour2)+$this->distribution('3','CPS',$datejour1,$datejour2);
	$this->psl(138-8,'Medecine Interne',$mist,$micgr,'0',$mipfc,$micps,'0','0');
	
	
	$blocast= $this->distribution('9','ST',$datejour1,$datejour2);
	$blocacgr=$this->distribution('9','CGR',$datejour1,$datejour2);
	$blocapfc=$this->distribution('9','PFC',$datejour1,$datejour2);
	$blocacps=$this->distribution('9','CPS',$datejour1,$datejour2);
	$blocbst= $this->distribution('10','ST',$datejour1,$datejour2);
	$blocbcgr=$this->distribution('10','CGR',$datejour1,$datejour2);
	$blocbpfc=$this->distribution('10','PFC',$datejour1,$datejour2);
	$blocbcps=$this->distribution('10','CPS',$datejour1,$datejour2);
	
	$umcst= $this->distribution('11','ST',$datejour1,$datejour2);
	$umccgr=$this->distribution('11','CGR',$datejour1,$datejour2);
	$umcpfc=$this->distribution('11','PFC',$datejour1,$datejour2);
	$umccps=$this->distribution('11','CPS',$datejour1,$datejour2);
	$this->psl(146-8,'Umc+bloc',$umcst+$blocast+$blocbst,$umccgr+$blocacgr+$blocbcgr,'0',$umcpfc+$blocapfc+$blocbpfc,$umccps+$blocacps+$blocbcps,'0','0');
	
	$this->psl(154-8,'Oncologie','0','0','0','0','0','0','0');
	$this->psl(162-8,'Gastro-enterologie','0','0','0','0','0','0','0');
	$this->psl(170-8,'Orthopedie','0','0','0','0','0','0','0');
	
	$autrest= $this->distribution('1','ST',$datejour1,$datejour2);
	$autrecgr=$this->distribution('1','CGR',$datejour1,$datejour2);
	$autrepfc=$this->distribution('1','PFC',$datejour1,$datejour2);
	$autrecps=$this->distribution('1','CPS',$datejour1,$datejour2);
	$this->psl(178-8,'Autre',$autrest,$autrecgr,'0',$autrepfc,$autrecps,'0','0');
	
	$totst=$umcst+$mist+$hdst+$pedst+$gost+$chst+$autrest+$blocast+$blocbst;
	$totcgr=$umccgr+$micgr+$hdcgr+$pedcgr+$gocgr+$chcgr+$autrecgr+$blocacgr+$blocbcgr;
	$totpfc=$umcpfc+$mipfc+$hdpfc+$pedpfc+$gopfc+$chpfc+$autrepfc+$blocapfc+$blocbpfc;
	$totcps=$umccps+$micps+$hdcps+$pedcps+$gocps+$chcps+$autrecps+$blocacps+$blocbcps;
	$this->psl(186-8,'total',$totst,$totcgr,'0',$totpfc,$totcps,'0','0');
	
	$this->psl(202-14,'DISTRIBUTION EXTRA MUROS','ST','CGR','CGR/F','PFC','CPS','CPA','CRYO');
	
	$pubst= $this->distribution('13','ST',$datejour1,$datejour2);
	$pubcgr=$this->distribution('13','CGR',$datejour1,$datejour2);
	$pubpfc=$this->distribution('13','PFC',$datejour1,$datejour2);
	$pubcps=$this->distribution('13','CPS',$datejour1,$datejour2);
	$this->psl(210-14,'public',$pubst,$pubcgr,'0',$pubpfc,$pubcps,'0','0');
	$prist= $this->distribution('14','ST',$datejour1,$datejour2);
	$pricgr=$this->distribution('14','CGR',$datejour1,$datejour2);
	$pripfc=$this->distribution('14','PFC',$datejour1,$datejour2);
	$pricps=$this->distribution('14','CPS',$datejour1,$datejour2);
	$this->psl(218-14,'prives',$prist,$pricgr,'0',$pripfc,$pricps,'0','0');

	// $totcps=$this->distributionpsl('CPS',$datejour1,$datejour2);
	// $totpfc=$this->distributionpsl('PFC',$datejour1,$datejour2);
	// $totcgr=$this->distributionpsl('CGR',$datejour1,$datejour2);
	// $totst=$this->distributionpsl('ST',$datejour1,$datejour2);
	// $this->psl(186-8,'total',$totst,$totcgr,'0',$totpfc,$totcps,'0','0');
	
	$this->psl(234-20,'DEMANDES DE PSL NON SATISFAITES ','ST','CGR','CGR/F','PFC','CPS','CPA','CRYO');
	$this->psl(242-20,'Total','0','0','0','0','0','0','0');
	}
	
	function incidenttrans($h,$x,$ST)
	{
	$this->SetXY(10,$h);$this->Cell(94-15.5,8,$x,1,1,'L');$this->SetXY(104-15.5,$h);$this->Cell(111,8,$ST,1,1,'C');
	$this->SetXY(10,$h+8);$this->Cell(94-15.5,8,'',1,1,'L');$this->SetXY(104-15.5,$h+8);$this->Cell(111,8,'',1,1,'C');
	$this->SetXY(10,$h+16);$this->Cell(94-15.5,8,'',1,1,'L');$this->SetXY(104-15.5,$h+16);$this->Cell(111,8,'',1,1,'C');
	}
	function piedeva()
	{
	$this->Text(5,270," le responsable de la structure  ");
	$this->Text(8,275," de transfusion sanguine");
	$this->Text(18,280," DR ".$this->USER());
	$this->Text(140,270," Le Directeur de l'etablissement ");
	}
	
}	