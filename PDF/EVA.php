<?php
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
	function T4F2($data)
    {
	$this->SetXY($data['xt'],$data['yt']);     $this->cell(90+15,05,$data['tt'],1,0,'L',1,0);
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,15,$data['tl'],1,0,'C',1,0);
	$this->SetXY($data['xt']+15,$this->GetY());$this->cell(75+15,10,$data['tc'],1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY()+10);$this->cell(15,5,$data['tc1'],1,0,'C',1,0); $this->SetXY($data['xt']+30,$this->GetY());$this->cell(15,5,$data['tc2'],1,0,'C',1,0); $this->SetXY($data['xt']+45,$this->GetY());$this->cell(15,5,$data['tc3'],1,0,'C',1,0); $this->SetXY($data['xt']+60,$this->GetY());$this->cell(15,5,$data['tc4'],1,0,'C',1,0); $this->SetXY($data['xt']+75,$this->GetY());$this->cell(15,5,$data['tc5'],1,0,'C',1,0); $this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,'P %',1,0,'R',1,0);
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,$data['tl1'],1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY());   $this->cell(15,5,$data['l1c1'],1,0,'C',0,0);$this->SetXY($data['xt']+30,$this->GetY());$this->cell(15,5,$data['l1c2'],1,0,'C',0,0);$this->SetXY($data['xt']+45,$this->GetY());$this->cell(15,5,$data['l1c3'],1,0,'C',0,0);$this->SetXY($data['xt']+60,$this->GetY());$this->cell(15,5,$data['l1c4'],1,0,'C',0,0);$this->SetXY($data['xt']+75,$this->GetY());$this->cell(15,5,$data['l1c5'],1,0,'C',0,0);$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,(($data['l1c5']/$data['l3c5'])*100).' %',1,0,'R',1,0);        
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,$data['tl2'],1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY());   $this->cell(15,5,$data['l2c1'],1,0,'C',0,0);$this->SetXY($data['xt']+30,$this->GetY());$this->cell(15,5,$data['l2c2'],1,0,'C',0,0);$this->SetXY($data['xt']+45,$this->GetY());$this->cell(15,5,$data['l2c3'],1,0,'C',0,0);$this->SetXY($data['xt']+60,$this->GetY());$this->cell(15,5,$data['l2c4'],1,0,'C',0,0);$this->SetXY($data['xt']+75,$this->GetY());$this->cell(15,5,$data['l2c5'],1,0,'C',0,0);$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,(($data['l2c5']/$data['l3c5'])*100).' %',1,0,'R',1,0);
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,$data['tl3'],1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY());   $this->cell(15,5,$data['l3c1'],1,0,'C',0,0);$this->SetXY($data['xt']+30,$this->GetY());$this->cell(15,5,$data['l3c2'],1,0,'C',0,0);$this->SetXY($data['xt']+45,$this->GetY());$this->cell(15,5,$data['l3c3'],1,0,'C',0,0);$this->SetXY($data['xt']+60,$this->GetY());$this->cell(15,5,$data['l3c4'],1,0,'C',0,0);$this->SetXY($data['xt']+75,$this->GetY());$this->cell(15,5,$data['l3c5'],1,0,'C',0,0);$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,(($data['l3c5']/$data['l3c5'])*100).' %',1,0,'R',1,0); 	                                                                
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,'P %',1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY());   $this->cell(15,5,(($data['l3c1']/$data['l3c5'])*100).' %',1,0,'C',0,0);$this->SetXY($data['xt']+30,$this->GetY());$this->cell(15,5,(($data['l3c2']/$data['l3c5'])*100).' %',1,0,'C',0,0);$this->SetXY($data['xt']+45,$this->GetY());$this->cell(15,5,(($data['l3c3']/$data['l3c5'])*100).' %',1,0,'C',0,0);$this->SetXY($data['xt']+60,$this->GetY());$this->cell(15,5,(($data['l3c4']/$data['l3c5'])*100).' %',1,0,'C',0,0);$this->SetXY($data['xt']+75,$this->GetY());$this->cell(15,5,(($data['l3c5']/$data['l3c5'])*100).' %',1,0,'C',0,0);$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,'***',1,0,'C',1,0); 	                                                                
	// $l1c1=pow($data['l1c1']-($data['l1c5']*$data['l3c1']/$data['l3c5']),2)/($data['l1c5']*$data['l3c1']/$data['l3c5']);
	// $l1c2=pow($data['l1c2']-($data['l1c5']*$data['l3c2']/$data['l3c5']),2)/($data['l1c5']*$data['l3c2']/$data['l3c5']);
	// $l1c3=pow($data['l1c3']-($data['l1c5']*$data['l3c3']/$data['l3c5']),2)/($data['l1c5']*$data['l3c3']/$data['l3c5']);
	// $l1c4=pow($data['l1c4']-($data['l1c5']*$data['l3c4']/$data['l3c5']),2)/($data['l1c5']*$data['l3c4']/$data['l3c5']);
	// $l2c1=pow($data['l2c1']-($data['l2c5']*$data['l3c1']/$data['l3c5']),2)/($data['l2c5']*$data['l3c1']/$data['l3c5']);
	// $l2c2=pow($data['l2c2']-($data['l2c5']*$data['l3c2']/$data['l3c5']),2)/($data['l2c5']*$data['l3c2']/$data['l3c5']);
	// $l2c3=pow($data['l2c3']-($data['l2c5']*$data['l3c3']/$data['l3c5']),2)/($data['l2c5']*$data['l3c3']/$data['l3c5']);
	// $l2c4=pow($data['l2c4']-($data['l2c5']*$data['l3c4']/$data['l3c5']),2)/($data['l2c5']*$data['l3c4']/$data['l3c5']);
	// $x2c=$l1c1+$l1c2+$l1c3+$l1c4+$l2c1+$l2c2+$l2c3+$l2c4;
    //condition1 n>=30  
	//condition2 cellule>=5
	//a=0.5
	//dll=(l-1)*(c-1)=1*3=3
	//mu=3
	//x2=critique=7,815 p=0.05
	//x2=calculer=....  p=....
	// $this->SetXY($data['xt'],$this->GetY()+10); $this->cell(90,5,'alpha=0.05 /dll=3 /x2T=7,815 /x2C='.round($x2c,3),1,0,'L',1,0);

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
	function collecte($colone1,$colone2,$datejour1,$datejour2,$TDON,$SEXEDNR)
	{
	  $this->mysqlconnect();
	  $SRS=$this->STRUCTURE();
	  $sql = " select * from don where SRS='$SRS' and TDNR='$colone1'and STR='$colone2'and DATEDON >='$datejour1'and DATEDON <='$datejour2' and IND='IND' and TDON='$TDON' and SEXEDNR='$SEXEDNR'";// 
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
 	function AGEDON($colone2,$colone3,$datejour1,$datejour2,$SEXEDNR)
	{
	$this->mysqlconnect();
	$sql = " select SEXEDNR,AGEDNR,DATEDON,IND from don where IND='IND'and  AGEDNR >=$colone2  and AGEDNR < $colone3  and DATEDON >='$datejour1'and DATEDON <='$datejour2' and SEXEDNR='$SEXEDNR' ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$collecte=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $collecte;
	}
	function corpscollecte($datejour1,$datejour2) 
	{
	//**** gauche ****//
	$this->SetXY(5,28);$this->Cell(198,8,'__________________________________________UNITE COLLECTE__________________________________________',0,1,'C');
	$this->Rect(5, 38, 198, 75 ,"d");
	$rfh=$this->collecte('regulier','fixe',$datejour1,$datejour2,'NORMAL','M');      $rmh=$this->collecte('regulier','mobile',$datejour1,$datejour2,'NORMAL','M');       $rfah=$this->collecte('regulier','fixe',$datejour1,$datejour2,'APHERESE','M');
	$rff=$this->collecte('regulier','fixe',$datejour1,$datejour2,'NORMAL','F');      $rmf=$this->collecte('regulier','mobile',$datejour1,$datejour2,'NORMAL','F');       $rfaf=$this->collecte('regulier','fixe',$datejour1,$datejour2,'APHERESE','F');
	$ofh=$this->collecte('Occasionnel','fixe',$datejour1,$datejour2,'NORMAL','M');   $omh=$this->collecte('Occasionnel','mobile',$datejour1,$datejour2,'NORMAL','M');    $ofah=$this->collecte('Occasionnel','fixe',$datejour1,$datejour2,'APHERESE','M');
    $off=$this->collecte('Occasionnel','fixe',$datejour1,$datejour2,'NORMAL','F');   $omf=$this->collecte('Occasionnel','mobile',$datejour1,$datejour2,'NORMAL','F');    $ofaf=$this->collecte('Occasionnel','fixe',$datejour1,$datejour2,'APHERESE','F');
  
    $this->SetXY(10,40);$this->Cell(25,15,'NBR de dons',1,1,'L');  
    $this->SetXY(35,40);$this->Cell(60,5,'Sang Total',1,1,'C');
	
	$this->SetXY(35,45);$this->Cell(30,5,'Fixe',1,1,'C');                                 
    $this->SetXY(35,50);$this->Cell(15,5,'H',1,1,'C'); $this->SetXY(50,50);$this->Cell(15,5,'F',1,1,'C');
    
	$this->SetXY(65,45);$this->Cell(30,5,'Mobile',1,1,'C');  
	$this->SetXY(65,50);$this->Cell(15,5,'H',1,1,'C'); $this->SetXY(80,50);$this->Cell(15,5,'F',1,1,'C');
	
	$this->SetXY(95,40);  $this->Cell(30,10,'Apherese',1,1,'C'); 
	$this->SetXY(95,50);$this->Cell(15,5,'H',1,1,'C'); $this->SetXY(110,50);$this->Cell(15,5,'F',1,1,'C');
	
	$this->SetXY(10,55);$this->Cell(25,5,'Reguliers',1,1,'L');$this->SetTextColor(225,0,0);
	$this->SetXY(35,55);$this->Cell(15,5,$rfh,1,1,'C'); $this->SetXY(50,55);$this->Cell(15,5,$rff,1,1,'C');   
	$this->SetXY(65,55);$this->Cell(15,5,$rmh,1,1,'C'); $this->SetXY(80,55);$this->Cell(15,5,$rmf,1,1,'C');
	$this->SetXY(95,55);$this->Cell(15,5,$rfah,1,1,'C'); $this->SetXY(110,55);$this->Cell(15,5,$rfaf,1,1,'C');$this->SetTextColor(0,0,0);  
	
	$this->SetXY(10,60);$this->Cell(25,5,'Occasionnels',1,1,'L');$this->SetTextColor(225,0,0);
	$this->SetXY(35,60);$this->Cell(15,5,$ofh,1,1,'C'); $this->SetXY(50,60);$this->Cell(15,5,$off,1,1,'C');   
	$this->SetXY(65,60);$this->Cell(15,5,$omh,1,1,'C'); $this->SetXY(80,60);$this->Cell(15,5,$omf,1,1,'C');
	$this->SetXY(95,60);$this->Cell(15,5,$ofah,1,1,'C'); $this->SetXY(110,60);$this->Cell(15,5,$ofaf,1,1,'C');$this->SetTextColor(0,0,0);  
	
	$this->SetXY(10,65);$this->Cell(25,5,'Contrepartie',1,1,'L');$this->SetTextColor(225,0,0);
	$this->SetXY(35,65);$this->Cell(15,5,'0',1,1,'C'); 
	$this->SetXY(50,65);$this->Cell(15,5,'0',1,1,'C');   
	$this->SetXY(65,65);$this->Cell(15,5,'0',1,1,'C'); 
	$this->SetXY(80,65);$this->Cell(15,5,'0',1,1,'C');
	$this->SetXY(95,65);$this->Cell(15,5,'0',1,1,'C'); 
	$this->SetXY(110,65);$this->Cell(15,5,'0',1,1,'C');$this->SetTextColor(0,0,0); 
	
	$this->SetXY(10,70);$this->Cell(25,5,'Total',1,1,'L');$this->SetTextColor(225,0,0);
	$this->SetXY(35,70);$this->Cell(60,5,$rfh+$rff+$rmh+$rmf+$ofh+$off+$omh+$omf,1,1,'C'); 
	$this->SetXY(95,70);$this->Cell(30,5,$rfah+$rfaf+$ofah+$ofaf,1,1,'C');$this->SetTextColor(0,0,0);  

	$this->SetXY(10,75);$this->Cell(25,5,'Total General ',1,1,'L');$this->SetTextColor(225,0,0);
	$this->SetXY(35,75);$this->Cell(90,5,$rfh+$rff+$rmh+$rmf+$ofh+$off+$omh+$omf+$rfah+$rfaf+$ofah+$ofaf,1,1,'C'); $this->SetTextColor(0,0,0); 
	
	$this->SetXY(130,40);$this->Cell(23,5,'CI ',1,1,'C');         $this->SetXY(130+23,40);$this->Cell(23,5,'ST',1,1,'C');$this->SetXY(130+46,40);$this->Cell(24,5,'Apherese',1,1,'C');
	$this->SetXY(130,45);$this->Cell(23,5,'Temporaires ',1,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(130+23,45);$this->Cell(23,5,$this->indication('CIDT',$datejour1,$datejour2),1,1,'C');$this->SetXY(130+46,45);$this->Cell(24,5,'0',1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(130,50);$this->Cell(23,5,'Definitives',1,1,'L'); $this->SetTextColor(225,0,0);$this->SetXY(130+23,50);$this->Cell(23,5,$this->indication('CIDD',$datejour1,$datejour2),1,1,'C');$this->SetXY(130+46,50);$this->Cell(24,5,'0',1,1,'C');$this->SetTextColor(0,0,0);
	
	$this->SetXY(130,65);$this->Cell(70,5,'Nombre De Collecte mobile',1,1,'C');
	$this->SetXY(130,70);$this->Cell(50,5,'avec vehicule de collecte',1,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(130+50,70);$this->Cell(20,5,'0',1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(130,75);$this->Cell(50,5,'sans vehicule de collecte',1,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(130+50,75);$this->Cell(20,5,$this->collecte1($datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	

	$this->SetXY(10,85);$this->Cell(80,5.3,' Nombre Condidats Au Don',1,1,'L');  $this->SetTextColor(225,0,0); $this->SetXY(100,85);$this->Cell(100,5.3,$rfh+$rff+$rmh+$rmf+$ofh+$off+$omh+$omf+$rfah+$rfaf+$ofah+$ofaf+$this->indication('CIDT',$datejour1,$datejour2)+$this->indication('CIDD',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
 
	$this->SetXY(10,95);$this->Cell(40,15,'Dons / Tranche d age',1,1,'L');
	$this->SetXY(50,95);$this->Cell(30,5,'18-27',1,1,'C'); 
	$this->SetXY(50,100);$this->Cell(15,5,'H',1,1,'C'); $this->SetXY(65,100);$this->Cell(15,5,'F',1,1,'C'); 
	$this->SetXY(50,105);$this->SetTextColor(225,0,0);$this->Cell(15,5,$this->AGEDON(0,27,$datejour1,$datejour2,'M'),1,1,'C'); $this->SetXY(65,105);$this->Cell(15,5,$this->AGEDON(18,27,$datejour1,$datejour2,'F'),1,1,'C'); $this->SetTextColor(0,0,0);
	
	$this->SetXY(80,95);$this->Cell(30,5,'27-36',1,1,'C');
    $this->SetXY(80,100);$this->Cell(15,5,'H',1,1,'C'); $this->SetXY(95,100);$this->Cell(15,5,'F',1,1,'C'); 
	$this->SetXY(80,105);$this->SetTextColor(225,0,0);$this->Cell(15,5,$this->AGEDON(27,36,$datejour1,$datejour2,'M'),1,1,'C'); $this->SetXY(95,105);$this->Cell(15,5,$this->AGEDON(27,36,$datejour1,$datejour2,'F'),1,1,'C'); $this->SetTextColor(0,0,0);
	
	$this->SetXY(110,95);$this->Cell(30,5,'36-45',1,1,'C'); 
	$this->SetXY(110,100);$this->Cell(15,5,'H',1,1,'C'); $this->SetXY(125,100);$this->Cell(15,5,'F',1,1,'C'); 
	$this->SetXY(110,105);$this->SetTextColor(225,0,0);$this->Cell(15,5,$this->AGEDON(36,45,$datejour1,$datejour2,'M'),1,1,'C'); $this->SetXY(125,105);$this->Cell(15,5,$this->AGEDON(36,45,$datejour1,$datejour2,'F'),1,1,'C');$this->SetTextColor(0,0,0);
	
	$this->SetXY(140,95);$this->Cell(30,5,'45-54',1,1,'C'); 
	$this->SetXY(140,100);$this->Cell(15,5,'H',1,1,'C'); $this->SetXY(155,100);$this->Cell(15,5,'F',1,1,'C');
	$this->SetXY(140,105);$this->SetTextColor(225,0,0);$this->Cell(15,5,$this->AGEDON(45,54,$datejour1,$datejour2,'M'),1,1,'C'); $this->SetXY(155,105);$this->Cell(15,5,$this->AGEDON(45,54,$datejour1,$datejour2,'F'),1,1,'C');$this->SetTextColor(0,0,0); 
	
	$this->SetXY(170,95);$this->Cell(30,5,'54-66',1,1,'C'); 
	$this->SetXY(170,100);$this->Cell(15,5,'H',1,1,'C'); $this->SetXY(185,100);$this->Cell(15,5,'F',1,1,'C');
	$this->SetXY(170,105);$this->SetTextColor(225,0,0);$this->Cell(15,5,$this->AGEDON(54,100,$datejour1,$datejour2,'M'),1,1,'C'); $this->SetXY(185,105);$this->Cell(15,5,$this->AGEDON(54,66,$datejour1,$datejour2,'F'),1,1,'C');$this->SetTextColor(0,0,0);
	 
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
	$this->SetXY(5,113);$this->Cell(198,8,'________________________________________UNITE PREPARATION________________________________________',0,1,'C');
	$this->Rect(5, 123, 198, 80 ,"d");
	//***gauche***//
	$this->SetXY(10,125);$this->Cell(73,5,'Nombre de poches de sang non conformes',1,1,'C');
	$this->SetXY(10,113+17);$this->Cell(16,25,'sang tot',1,1,'L');
	$this->SetXY(26,130);$this->Cell(42,5,'Quantite Non Suffisante',1,1,'L');   $this->SetTextColor(225,0,0);  $this->SetXY(68,130);$this->Cell(15,5,$this->PREPARATION('VI',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(26,135);$this->Cell(42,5,'Poches trop important',1,1,'L');     $this->SetTextColor(225,0,0);  $this->SetXY(68,135);$this->Cell(15,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);//???
	$this->SetXY(26,140);$this->Cell(42,5,'circuit ouvert',1,1,'L');            $this->SetTextColor(225,0,0);  $this->SetXY(68,140);$this->Cell(15,5,$this->PREPARATION('FDS',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(26,145);$this->Cell(42,5,'Aspect coagule',1,1,'L');            $this->SetTextColor(225,0,0);  $this->SetXY(68,145);$this->Cell(15,5,$this->PREPARATION('AC',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(26,150);$this->Cell(42,5,'Autres .......',1,1,'L');            $this->SetTextColor(225,0,0);  $this->SetXY(68,150);$this->Cell(15,5,$this->PREPARATION('AC',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(10,155);$this->Cell(16,15,'apherese',1,1,'L');
	$this->SetXY(26,155);$this->Cell(42,5,'Quantite Non Suffisante',1,1,'L');   $this->SetTextColor(225,0,0);  $this->SetXY(68,155);$this->Cell(15,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
    $this->SetXY(26,160);$this->Cell(42,5,'Fuite defaut de soudure',1,1,'L');   $this->SetTextColor(225,0,0);  $this->SetXY(68,160);$this->Cell(15,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(26,165);$this->Cell(42,5,'Autres',1,1,'L');                    $this->SetTextColor(225,0,0);  $this->SetXY(68,165);$this->Cell(15,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	//***centre***// 
	$this->SetXY(85,125);$this->Cell(40,5,'Nombre de PSL',1,1,'C');
	$PSLCGR=$this->PREPARATION('CGR',$datejour1,$datejour2);
	$PSLPFC=$this->PREPARATION('PFC',$datejour1,$datejour2);
	$PSLCPS=$this->PREPARATION('CPS',$datejour1,$datejour2);
	
	$this->SetXY(85,130);$this->Cell(20,5,'ST',1,1,'L');                     $this->SetTextColor(225,0,0);$this->SetXY(85+20,130);$this->Cell(20,5,'0',1,1,'C');$this->SetTextColor(0,0,0);//
	$this->SetXY(85,135);$this->Cell(20,5,'CGR DL',1,1,'L');                 $this->SetTextColor(225,0,0);$this->SetXY(85+20,135);$this->Cell(20,5,'0',1,1,'C');$this->SetTextColor(0,0,0);//
	$this->SetXY(85,140);$this->Cell(20,5,'CGR NDL',1,1,'L');                $this->SetTextColor(225,0,0);$this->SetXY(85+20,140);$this->Cell(20,5,$PSLCGR,1,1,'C');$this->SetTextColor(0,0,0);//
	$this->SetXY(85,145);$this->Cell(20,5,'PFC',1,1,'L');                    $this->SetTextColor(225,0,0);$this->SetXY(85+20,145);$this->Cell(20,5,$PSLPFC,1,1,'C');$this->SetTextColor(0,0,0);//
	$this->SetXY(85,150);$this->Cell(20,5,'CPS',1,1,'L');                    $this->SetTextColor(225,0,0);$this->SetXY(85+20,150);$this->Cell(20,5,$PSLCPS,1,1,'C');$this->SetTextColor(0,0,0);//
	$this->SetXY(85,155);$this->Cell(20,5,'CPA',1,1,'L');                    $this->SetTextColor(225,0,0);$this->SetXY(85+20,155);$this->Cell(20,5,'0',1,1,'C');$this->SetTextColor(0,0,0);//
	$this->SetXY(85,160);$this->Cell(20,5,'AUTRES',1,1,'L');                 $this->SetTextColor(225,0,0);$this->SetXY(85+20,160);$this->Cell(20,5,'0',1,1,'C');$this->SetTextColor(0,0,0);//
	$this->SetXY(85,165);$this->Cell(20,5,'TOTAL',1,1,'L');                  $this->SetTextColor(225,0,0);$this->SetXY(85+20,165);$this->Cell(20,5,$PSLCGR+$PSLPFC+$PSLCPS,1,1,'C');$this->SetTextColor(0,0,0);//
	
	$this->SetXY(10,190);$this->Cell(95,5,'Nombre de poche de sang total valides pour preparation',1,1,'L');     $this->SetTextColor(225,0,0);  $this->SetXY(85+20,190);$this->Cell(20,5,$this->PREPARATION('AC',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(10,195);$this->Cell(95,5,'Nombre de poche CPA  valides pour preparation',1,1,'L');              $this->SetTextColor(225,0,0);  $this->SetXY(85+20,195);$this->Cell(20,5,$this->PREPARATION('AC',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	//***droite***//
	$this->SetXY(127,125);$this->Cell(73,5,'Nombre de PSL prepares non conformes',1,1,'C');
	//***************// 
	$this->SetXY(127,130);$this->Cell(15,20,'CGR',1,1,'C');
	$this->SetXY(127+15,130);$this->Cell(48,5,'Circuit ouvert',1,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(127+63,130);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);//???
	$this->SetXY(127+15,135);$this->Cell(48,5,'Aspect coagule',1,1,'L');         $this->SetTextColor(225,0,0);$this->SetXY(127+63,135);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,140);$this->Cell(48,5,'Quantite Non Suffisante',1,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(127+63,140);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,145);$this->Cell(48,5,'autres',1,1,'L');     $this->SetTextColor(225,0,0);$this->SetXY(127+63,145);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	
	//***************//
	$this->SetXY(127,150);$this->Cell(15,30,'PFC',1,1,'C');
	$this->SetXY(127+15,150);$this->Cell(48,5,'Circuit ouvert',1,1,'L');         $this->SetTextColor(225,0,0);$this->SetXY(127+63,150);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,155);$this->Cell(48,5,'Quantite Non Suffisante',1,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(127+63,155);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,160);$this->Cell(48,5,'Aspect lipemique',1,1,'L');       $this->SetTextColor(225,0,0);$this->SetXY(127+63,160);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,165);$this->Cell(48,5,'Aspect hematique',1,1,'L');       $this->SetTextColor(225,0,0);$this->SetXY(127+63,165);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,170);$this->Cell(48,5,'Aspect icterique',1,1,'L');       $this->SetTextColor(225,0,0);$this->SetXY(127+63,170);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,175);$this->Cell(48,5,'autres',1,1,'L');                 $this->SetTextColor(225,0,0);$this->SetXY(127+63,175);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	
	//***************//
	$this->SetXY(127,180);$this->Cell(15,20,'CPS',1,1,'C');
	$this->SetXY(127+15,180);$this->Cell(48,5,'Circuit ouvert',1,1,'L');         $this->SetTextColor(225,0,0);$this->SetXY(127+63,180);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,185);$this->Cell(48,5,'Aspect hematique',1,1,'L');       $this->SetTextColor(225,0,0);$this->SetXY(127+63,185);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,190);$this->Cell(48,5,'Quantite Non Suffisante',1,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(127+63,190);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	$this->SetXY(127+15,195);$this->Cell(48,5,'autres',1,1,'L');                 $this->SetTextColor(225,0,0);$this->SetXY(127+63,195);$this->Cell(10,5,$this->PREPARATION('NULL',$datejour1,$datejour2),1,1,'C');$this->SetTextColor(0,0,0);
	
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
	$this->SetXY(5,202);$this->Cell(198,8,'________________________________UNITE QUALIFICATIONS BIOLOGIQUES________________________________',0,1,'C');
	$this->Rect(5, 212, 198, 75 ,"d");
	$this->SetXY(10,215);$this->Cell(40,33,'Immuno-hematologie',1,1,'C');
	$this->SetXY(50,215);$this->Cell(25,8,'Groupage',1,1,'C');
	$this->SetXY(75,215);$this->Cell(75,8,'02 epreuves/ 02 echantillons',1,1,'C');$this->SetXY(150,215);$this->Cell(25,4,'Oui',1,1,'C');$this->SetXY(175,215);$this->Cell(25,4,'X',1,1,'C');
                                                                   $this->SetXY(150,219);$this->Cell(25,4,'Non',1,1,'C');$this->SetXY(175,219);$this->Cell(25,4,'',1,1,'C');
	$this->SetXY(50,223);$this->Cell(125,5,'Recherche de D faible',1,1,'L');$this->SetXY(175,223);$this->Cell(25,5,'0',1,1,'C');
	$this->SetXY(50,228);$this->Cell(125,5,'Recherche d hemolysine anti A anti B ',1,1,'L');$this->SetXY(175,228);$this->Cell(25,5,'0',1,1,'C');
	
	$this->SetXY(50,233);$this->Cell(25,10,'Phenotypage',1,1,'C');
	$this->SetXY(75,233);$this->Cell(75,5,'Dons phenotypes',1,1,'L');   $this->SetXY(150,233);$this->Cell(50,5,$this->Phenotypage($datejour1,$datejour2),1,1,'C');
	$this->SetXY(75,238);$this->Cell(75,5,'Rec phenotypes',1,1,'L');    $this->SetXY(150,238);$this->Cell(50,5,$this->Phenotypage1($datejour1,$datejour2),1,1,'C');
	$this->SetXY(50,238+5);$this->Cell(100,5,'Epreuves de compatibilite au laboratoire par TCI',1,1,'L');$this->SetXY(150,238+5);$this->Cell(50,5,'00',1,1,'C');
	}
	
	function ligneserologie($y,$a,$b,$c,$d,$e,$f,$g,$h)
	{
	$this->SetXY(10,$y);   $this->Cell(25,4,$a,1,1,'L');$this->SetTextColor(0,0,0); 
	$this->SetXY(35,$y);   $this->SetTextColor(225,0,0);$this->Cell(25,4,$b,1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(60,$y);   $this->SetTextColor(225,0,0);$this->Cell(20,4,$c,1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(80,$y);   $this->SetTextColor(225,0,0);$this->Cell(20,4,$d,1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(100,$y);  $this->SetTextColor(225,0,0);$this->Cell(20,4,$e,1,1,'C');$this->SetTextColor(0,0,0);  
	$this->SetXY(120,$y);  $this->SetTextColor(225,0,0);$this->Cell(20,4,$f,1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(140,$y);  $this->SetTextColor(225,0,0);$this->Cell(30,4,$g,1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(170,$y);  $this->SetTextColor(225,0,0);$this->Cell(30,4,$h,1,1,'C');$this->SetTextColor(0,0,0);   
	}
	
	function enteteserologie($datejour1,$datejour2)
	{
	$this->ligneserologie(250,'Serologie','Serotypes','D+/D R1','D+/D R2','technique','controles +/D','confirmes +','Lieu');
	$this->ligneserologie(254,'HIV',$this->qualification('HIV',$datejour1,$datejour2),$this->qualificationdp('HIV','douteux',$datejour1,$datejour2),$this->qualificationdp('HIV','douteux',$datejour1,$datejour2),'ELISA','0','0','IPA');
	$this->ligneserologie(258,'HBS',$this->qualification('HVB',$datejour1,$datejour2),$this->qualificationdp('HVB','douteux',$datejour1,$datejour2),$this->qualificationdp('HVB','douteux',$datejour1,$datejour2),'ELISA','0','0','IPA');
	$this->ligneserologie(262,'HBC',$this->qualification('HVC',$datejour1,$datejour2),$this->qualificationdp('HVC','douteux',$datejour1,$datejour2),$this->qualificationdp('HVC','douteux',$datejour1,$datejour2),'ELISA','0','0','IPA');
	$this->ligneserologie(266,'SYPH',$this->qualification('TPHA',$datejour1,$datejour2),$this->qualificationdp('TPHA','douteux',$datejour1,$datejour2),$this->qualificationdp('TPHA','douteux',$datejour1,$datejour2),'ELISA','0','0','IPA');
	$y=272;
	$this->SetXY(10,$y);   $this->Cell(25,8,'Serologie +',1,1,'L');$this->SetTextColor(0,0,0); 
	$this->SetXY(35,$y);   $this->SetTextColor(225,0,0);$this->Cell(25,4,'ST',1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(60,$y);   $this->SetTextColor(225,0,0);$this->Cell(20,4,'CGR',1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(80,$y);   $this->SetTextColor(225,0,0);$this->Cell(20,4,'PFC',1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(100,$y);  $this->SetTextColor(225,0,0);$this->Cell(20,4,'CPS',1,1,'C');$this->SetTextColor(0,0,0);  
	$this->SetXY(120,$y);  $this->SetTextColor(225,0,0);$this->Cell(20,4,'CPA',1,1,'C');$this->SetTextColor(0,0,0);   
	$y=276;
	$this->SetXY(35,$y);   $this->SetTextColor(225,0,0);$this->Cell(25,4,'0',1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(60,$y);   $this->SetTextColor(225,0,0);$this->Cell(20,4,'0',1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(80,$y);   $this->SetTextColor(225,0,0);$this->Cell(20,4,'0',1,1,'C');$this->SetTextColor(0,0,0);   
	$this->SetXY(100,$y);  $this->SetTextColor(225,0,0);$this->Cell(20,4,'0',1,1,'C');$this->SetTextColor(0,0,0);  
	$this->SetXY(120,$y);  $this->SetTextColor(225,0,0);$this->Cell(20,4,'0',1,1,'C');$this->SetTextColor(0,0,0);   
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
	$this->SetXY(10,$h);         $this->Cell(94-15.5,5,$x,1,1,'L');
	$this->SetTextColor(225,0,0);
	$this->SetXY(104-15.5,$h);   $this->Cell(15.5,5,$ST,1,1,'C');
	$this->SetXY(104,$h);        $this->Cell(15.5,5,$CGR,1,1,'C');
	$this->SetXY(119.5,$h);      $this->Cell(15.5,5,$CGRF,1,1,'C');
	$this->SetXY(135,$h);        $this->Cell(15.5,5,$PFC,1,1,'C');
	$this->SetXY(150.5,$h);      $this->Cell(15.5,5,$CP,1,1,'C');
	$this->SetXY(166,$h);        $this->Cell(15.5,5,$CPA,1,1,'C'); 
	$this->SetXY(181.5,$h);      $this->Cell(18,5,$CRYO,1,1,'C');  
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
	$this->psl(40,'','ST','CGR','CGR/F','PFC','CPS','CPA','AUTRES');
	$this->psl(45,'PSL  etiquetes','0',$PSLCGR,'0',$PSLPFC,$PSLCPS,'0','0');
	$this->psl(50,'Stock Debut d annee 01 janvier','0','0','0','0','0','0','0');
	$this->psl(55,'Stock fin d annee 31 decembre','0',$STOCKCGR,'0',$STOCKPFC,$STOCKCPS,'0','0');
	$this->psl(60,'Produit perimes durant l\'annee ','0',$PERCGR,'0',$PERPFC,$PERCPS,'0','0');
	$this->psl(65,'Produit conformes elimines pour autres raisons','0','0','0','0','0','0','0');
	$this->psl(90-8,'DISTRIBUTION INTRA-HOSPITALIERE','ST','CGR','CGR/F','PFC','CPS','CPA','AUTRES');
	$chst= $this->distribution('4','ST',$datejour1,$datejour2)+$this->distribution('5','ST',$datejour1,$datejour2);
	$chcgr=$this->distribution('4','CGR',$datejour1,$datejour2)+$this->distribution('5','CGR',$datejour1,$datejour2);
	$chpfc=$this->distribution('4','PFC',$datejour1,$datejour2)+$this->distribution('5','PFC',$datejour1,$datejour2);
	$chcps=$this->distribution('4','CPS',$datejour1,$datejour2)+$this->distribution('5','CPS',$datejour1,$datejour2);
	$this->psl(90,'Chirurgie general',$chst,$chcgr,'0',$chpfc,$chcps,'0','0');
	$this->psl(95,'Chirurgie cardio-vasculaire','0','0','0','0','0','0','0');
	$this->psl(100,'Uro-chirurgie','0','0','0','0','0','0','0');
	$this->psl(105,'Neuro-chirurgie','0','0','0','0','0','0','0');
	$gost= $this->distribution('6','ST',$datejour1,$datejour2)+$this->distribution('7','ST',$datejour1,$datejour2);
	$gocgr=$this->distribution('6','CGR',$datejour1,$datejour2)+$this->distribution('7','CGR',$datejour1,$datejour2);
	$gopfc=$this->distribution('6','PFC',$datejour1,$datejour2)+$this->distribution('7','PFC',$datejour1,$datejour2);
	$gocps=$this->distribution('6','CPS',$datejour1,$datejour2)+$this->distribution('7','CPS',$datejour1,$datejour2);
	$this->psl(110,'Gyneco-Obstetrique',$gost,$gocgr,'0',$gopfc,$gocps,'0','0');
	$this->psl(115,'Orthopedie','0','0','0','0','0','0','0');
	$this->psl(120,'Gastro-enterologie','0','0','0','0','0','0','0');
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
	$this->psl(125,'Umc+bloc',$umcst+$blocast+$blocbst,$umccgr+$blocacgr+$blocbcgr,'0',$umcpfc+$blocapfc+$blocbpfc,$umccps+$blocacps+$blocbcps,'0','0');
	$this->psl(130,'Autre-chirurgie','0','0','0','0','0','0','0');
	$pedst= $this->distribution('8','ST',$datejour1,$datejour2);
	$pedcgr=$this->distribution('8','CGR',$datejour1,$datejour2);
	$pedpfc=$this->distribution('8','PFC',$datejour1,$datejour2);
	$pedcps=$this->distribution('8','CPS',$datejour1,$datejour2);
	$this->psl(135,'Pediatrie',$pedst,$pedcgr,'0',$pedpfc,$pedcps,'0','0');
	$this->psl(140,'Hematologie','0','0','0','0','0','0','0');
	$hdst= $this->distribution('12','ST',$datejour1,$datejour2);
	$hdcgr=$this->distribution('12','CGR',$datejour1,$datejour2);
	$hdpfc=$this->distribution('12','PFC',$datejour1,$datejour2);
	$hdcps=$this->distribution('12','CPS',$datejour1,$datejour2);
	$this->psl(145,'Hemodialyse',$hdst,$hdcgr,'0',$hdpfc,$hdcps,'0','0');
	$mist= $this->distribution('2','ST',$datejour1,$datejour2)+$this->distribution('3','ST',$datejour1,$datejour2);
	$micgr=$this->distribution('2','CGR',$datejour1,$datejour2)+$this->distribution('3','CGR',$datejour1,$datejour2);
	$mipfc=$this->distribution('2','PFC',$datejour1,$datejour2)+$this->distribution('3','PFC',$datejour1,$datejour2);
	$micps=$this->distribution('2','CPS',$datejour1,$datejour2)+$this->distribution('3','CPS',$datejour1,$datejour2);
	$this->psl(150,'Medecine Interne',$mist,$micgr,'0',$mipfc,$micps,'0','0');
	$autrest= $this->distribution('1','ST',$datejour1,$datejour2);
	$autrecgr=$this->distribution('1','CGR',$datejour1,$datejour2);
	$autrepfc=$this->distribution('1','PFC',$datejour1,$datejour2);
	$autrecps=$this->distribution('1','CPS',$datejour1,$datejour2);
	$this->psl(155,'Autres',$autrest,$autrecgr,'0',$autrepfc,$autrecps,'0','0');
	$totst=$umcst+$mist+$hdst+$pedst+$gost+$chst+$autrest+$blocast+$blocbst;
	$totcgr=$umccgr+$micgr+$hdcgr+$pedcgr+$gocgr+$chcgr+$autrecgr+$blocacgr+$blocbcgr;
	$totpfc=$umcpfc+$mipfc+$hdpfc+$pedpfc+$gopfc+$chpfc+$autrepfc+$blocapfc+$blocbpfc;
	$totcps=$umccps+$micps+$hdcps+$pedcps+$gocps+$chcps+$autrecps+$blocacps+$blocbcps;
	$this->psl(160,'total',$totst,$totcgr,'0',$totpfc,$totcps,'0','0');
	$this->psl(172,'DISTRIBUTION EXTRA-HOSPITALIERE','ST','CGR','CGR/F','PFC','CPS','CPA','AUTRES');
	$pubst= $this->distribution('13','ST',$datejour1,$datejour2);
	$pubcgr=$this->distribution('13','CGR',$datejour1,$datejour2);
	$pubpfc=$this->distribution('13','PFC',$datejour1,$datejour2);
	$pubcps=$this->distribution('13','CPS',$datejour1,$datejour2);
	$this->psl(180,'publics',$pubst,$pubcgr,'0',$pubpfc,$pubcps,'0','0');
	$prist= $this->distribution('14','ST',$datejour1,$datejour2);
	$pricgr=$this->distribution('14','CGR',$datejour1,$datejour2);
	$pripfc=$this->distribution('14','PFC',$datejour1,$datejour2);
	$pricps=$this->distribution('14','CPS',$datejour1,$datejour2);
	$this->psl(185,'prives',$prist,$pricgr,'0',$pripfc,$pricps,'0','0');
	$this->psl(195,'DEMANDES DE PSL NON HONOREES ','ST','CGR','CGR/F','PFC','CPS','CPA','AUTRES');
	$this->psl(200,'Total','0','0','0','0','0','0','0');
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