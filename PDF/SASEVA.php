<?php
function dateFR2US($date)//01/01/2013
{
$J      = substr($date,0,2);
$M      = substr($date,3,2);
$A      = substr($date,6,4);
$dateFR2US =  $A."-".$M."-".$J ;
return $dateFR2US;//2013-01-01
}
function mysqlconnect()
{
$nomprenom ="tibaredha";
$db_host="localhost";
$db_name="mvc"; //probleme avec base de donnes  il faut change  gpts avec mvc   
$db_user="root";
$db_pass="";
$utf8 = "" ;
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
return $db;
}
function nbrtostring($tb_name,$colonename,$colonevalue,$resultatstring) 
{
if (is_numeric($colonevalue) and $colonevalue!=='0') 
{ 
mysqlconnect();
$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
$row=mysql_fetch_object($result);
$resultat=$row->$resultatstring;
return $resultat;
} 
return $resultat2='??????';
}
$datejour1=$_GET['d1'];
$datejour2=$_GET['d2'];

require('fpdf.php');
require('fpdi.php');
$pdf = new FPDI();$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->setSourceFile('eseva.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);
$pdf->SetXY(44,52.5);$pdf->Write(0,"Djelfa");


//tableau 1 sexe tranche dage 
function nbrenvscor($sexe,$datejour1,$datejour2,$age1,$age2)
{
mysqlconnect();
$sql = " select * from SCOR WHERE SEXE='$sexe' AND (datescor  BETWEEN '$datejour1' AND '$datejour2') AND (age  BETWEEN '$age1' AND '$age2') ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
$a=nbrenvscor('M',$datejour1,$datejour2,0,0);$b=nbrenvscor('F',$datejour1,$datejour2,0,0);
$c=nbrenvscor('M',$datejour1,$datejour2,1,4);$d=nbrenvscor('F',$datejour1,$datejour2,1,4);
$e=nbrenvscor('M',$datejour1,$datejour2,5,14);$f=nbrenvscor('F',$datejour1,$datejour2,5,14);
$g=nbrenvscor('M',$datejour1,$datejour2,15,49);$h=nbrenvscor('F',$datejour1,$datejour2,15,49);
$i=nbrenvscor('M',$datejour1,$datejour2,50,100);$j=nbrenvscor('F',$datejour1,$datejour2,50,100);
$k=$a+$c+$e+$g+$i;
$l=$b+$d+$f+$h+$j;
$m=$k+$l;
$pdf->SetXY(33,82);$pdf->Write(0,$a);$pdf->SetXY(33+8,82);$pdf->Write(0,$b);
$pdf->SetXY(33+17,82);$pdf->Write(0,$c);$pdf->SetXY(33+20+8,82);$pdf->Write(0,$d);
$pdf->SetXY(33+40,82);$pdf->Write(0,$e);$pdf->SetXY(33+42+8,82);$pdf->Write(0,$f);
$pdf->SetXY(33+60,82);$pdf->Write(0,$g);$pdf->SetXY(33+64+8,82);$pdf->Write(0,$h);
$pdf->SetXY(33+84,82);$pdf->Write(0,$i);$pdf->SetXY(33+85+8,82);$pdf->Write(0,$j);
$pdf->SetXY(137,82);$pdf->Write(0,$k);$pdf->SetXY(147,82);$pdf->Write(0,$l);
$pdf->SetXY(165,82);$pdf->Write(0,$m);

//tableau 2 sexe siege
function nbrenvscorss($sexe,$datejour1,$datejour2,$siege)
{
mysqlconnect();
$sql = " select * from SCOR WHERE SEXE='$sexe' AND (datescor  BETWEEN '$datejour1' AND '$datejour2') AND (siege ='$siege') ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
$a1=nbrenvscorss('M',$datejour1,$datejour2,1);$b1=nbrenvscorss('F',$datejour1,$datejour2,1);
$c1=nbrenvscorss('M',$datejour1,$datejour2,2);$d1=nbrenvscorss('F',$datejour1,$datejour2,2);
$e1=nbrenvscorss('M',$datejour1,$datejour2,3);$f1=nbrenvscorss('F',$datejour1,$datejour2,3);
$g1=nbrenvscorss('M',$datejour1,$datejour2,4);$h1=nbrenvscorss('F',$datejour1,$datejour2,4);
$k1=$a1+$c1+$e1+$g1;
$l1=$b1+$d1+$f1+$h1;
$m1=$k1+$l1;
$pdf->SetXY(35,108);$pdf->Write(0,$a1);   $pdf->SetXY(35+15,108);$pdf->Write(0,$b1);
$pdf->SetXY(35+29,108);$pdf->Write(0,$c1);$pdf->SetXY(35+41,108);$pdf->Write(0,$d1);
$pdf->SetXY(35+52,108);$pdf->Write(0,$e1);$pdf->SetXY(35+64,108);$pdf->Write(0,$f1);
$pdf->SetXY(35+75,108);$pdf->Write(0,$g1);$pdf->SetXY(35+87,108);$pdf->Write(0,$h1);
$pdf->SetXY(47+90,108);$pdf->Write(0,$k1);$pdf->SetXY(152,108);$pdf->Write(0,$l1);
$pdf->SetXY(166,108);$pdf->Write(0,$m1);

//tableau 3  sexe lieux
function nbrenvscorsl($sexe,$datejour1,$datejour2,$lieux)
{
mysqlconnect();
$sql = " select * from SCOR WHERE SEXE='$sexe' AND (datescor  BETWEEN '$datejour1' AND '$datejour2') AND (lieux ='$lieux') ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
$a2=nbrenvscorss('M',$datejour1,$datejour2,1);$b2=nbrenvscorss('F',$datejour1,$datejour2,1);
$c2=nbrenvscorss('M',$datejour1,$datejour2,2);$d2=nbrenvscorss('F',$datejour1,$datejour2,2);
$k2=$a2+$c2;
$l2=$b2+$d2;
$m2=$k2+$l2;
$pdf->SetXY(39,133);$pdf->Write(0,$a2);      $pdf->SetXY(48+15,133);$pdf->Write(0,$b2);
$pdf->SetXY(38+50,133);$pdf->Write(0,$c2);   $pdf->SetXY(48+10+50,133);$pdf->Write(0,$d2);
$pdf->SetXY(39+90,133);$pdf->Write(0,$k2);   $pdf->SetXY(44+10+90,133);$pdf->Write(0,$l2);
$pdf->SetXY(64+10+90,133);$pdf->Write(0,$m2);

//tableau 3  sexe heures
function nbrenvscorsh($sexe,$datejour1,$datejour2,$heurescor1,$heurescor2)
{
mysqlconnect();
$sql = " select * from SCOR WHERE SEXE='$sexe' AND (datescor  BETWEEN '$datejour1' AND '$datejour2') AND (heurescor  BETWEEN '$heurescor1' AND '$heurescor2') ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
$a3=nbrenvscorsh('M',$datejour1,$datejour2,0,5);$b3=nbrenvscorsh('F',$datejour1,$datejour2,0,5);
$c3=nbrenvscorsh('M',$datejour1,$datejour2,6,11);$d3=nbrenvscorsh('F',$datejour1,$datejour2,6,11);
$e3=nbrenvscorsh('M',$datejour1,$datejour2,12,17);$f3=nbrenvscorsh('F',$datejour1,$datejour2,12,17);
$g3=nbrenvscorsh('M',$datejour1,$datejour2,18,23);$h3=nbrenvscorsh('F',$datejour1,$datejour2,18,23);
$k3=$a3+$c3+$e3+$g3;
$l3=$b3+$d3+$f3+$h3;
$m3=$k3+$l3;
$pdf->SetXY(35,159);$pdf->Write(0,$a3);   $pdf->SetXY(35+15,159);$pdf->Write(0,$b3);
$pdf->SetXY(35+29,159);$pdf->Write(0,$c3);$pdf->SetXY(35+41,159);$pdf->Write(0,$d3);
$pdf->SetXY(35+52,159);$pdf->Write(0,$e3);$pdf->SetXY(35+64,159);$pdf->Write(0,$f3);
$pdf->SetXY(35+75,159);$pdf->Write(0,$g3);$pdf->SetXY(35+87,159);$pdf->Write(0,$h3);
$pdf->SetXY(47+90,159);$pdf->Write(0,$k3);$pdf->SetXY(152,159);$pdf->Write(0,$l3);
$pdf->SetXY(166,159);$pdf->Write(0,$m3);

//tableau 4  classe
function nbrenvscorc($datejour1,$datejour2,$classe)
{
mysqlconnect();
$sql = " select * from SCOR WHERE  (datescor  BETWEEN '$datejour1' AND '$datejour2') AND (classe ='$classe') ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
$a4=nbrenvscorc($datejour1,$datejour2,1);
$b4=nbrenvscorc($datejour1,$datejour2,2);
$c4=nbrenvscorc($datejour1,$datejour2,3);
$d4=$a4+$b4+$c4;
$pdf->SetXY(35,182);$pdf->Write(0,$a4);
$pdf->SetXY(55,182);$pdf->Write(0,$b4);
$pdf->SetXY(70,182);$pdf->Write(0,$c4);
$pdf->SetXY(95,182);$pdf->Write(0,$d4);

//tableau 5  sexe  age deces
function nbrenvscord($sexe,$datejour1,$datejour2,$age1,$age2)
{
mysqlconnect();
$sql = " select * from SCOR WHERE SEXE='$sexe' AND (datescor  BETWEEN '$datejour1' AND '$datejour2') AND (age  BETWEEN '$age1' AND '$age2') and (deces='1') ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
} 
$a5=nbrenvscord('M',$datejour1,$datejour2,0,0);$b5=nbrenvscord('F',$datejour1,$datejour2,0,0);
$c5=nbrenvscord('M',$datejour1,$datejour2,1,4);$d5=nbrenvscord('F',$datejour1,$datejour2,1,4);
$e5=nbrenvscord('M',$datejour1,$datejour2,5,14);$f5=nbrenvscord('F',$datejour1,$datejour2,5,14);
$g5=nbrenvscord('M',$datejour1,$datejour2,15,49);$h5=nbrenvscord('F',$datejour1,$datejour2,15,49);
$i5=nbrenvscord('M',$datejour1,$datejour2,50,100);$j5=nbrenvscord('F',$datejour1,$datejour2,50,100);
$k5=$a5+$c5+$e5+$g5+$i5;
$l5=$b5+$d5+$f5+$h5+$j5;
$m5=$k5+$l5;
$pdf->SetXY(33,208);$pdf->Write(0,$a5);$pdf->SetXY(33+8,208);$pdf->Write(0,$b5);
$pdf->SetXY(33+17,208);$pdf->Write(0,$c5);$pdf->SetXY(33+20+8,208);$pdf->Write(0,$d5);
$pdf->SetXY(33+40,208);$pdf->Write(0,$e5);$pdf->SetXY(33+42+8,208);$pdf->Write(0,$f5);
$pdf->SetXY(33+60,208);$pdf->Write(0,$g5);$pdf->SetXY(33+64+8,208);$pdf->Write(0,$h5);
$pdf->SetXY(33+84,208);$pdf->Write(0,$i5);$pdf->SetXY(33+85+8,208);$pdf->Write(0,$j5);
$pdf->SetXY(137,208);$pdf->Write(0,$k5);$pdf->SetXY(147,208);$pdf->Write(0,$l5);
$pdf->SetXY(165,208);$pdf->Write(0,$m5);

//tableau 6  nbr de sas 
function nbrsas()
{
mysqlconnect();
$sql = " select datescor,sum(NBBRSAS) as  nbr  from SCOR  ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$row = mysql_fetch_array($requete); 
$Qvac=$row['nbr'];
mysql_free_result($requete);
return $Qvac;
}
$sas=nbrsas($datejour1,$datejour2);
$pdf->SetXY(142,215);$pdf->Write(0,$sas);
 


//$pdf->SetXY(117,61);$texte="Ain oussera";$pdf->Write(0,utf8_decode($texte));
$pdf->Output();
?>