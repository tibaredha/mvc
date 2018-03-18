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
require('fpdf.php');
require('fpdi.php');
$pdf = new FPDI();$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->setSourceFile('ES1.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);
$pdf->SetXY(40,61);
$pdf->Write(0,"Djelfa");
$pdf->SetXY(45,61+6);
$pdf->Write(0,"***");
$pdf->SetXY(55,61+12);
$pdf->Write(0,"***");
$pdf->SetXY(123,61+12);
$pdf->Write(0,"***");
$pdf->SetXY(117,61);
$texte="Ain oussera";
$pdf->Write(0,utf8_decode($texte));
$pdf->SetXY(43,61+18);
$pdf->Write(0,"Ain oussera");
$pdf->SetXY(100,61+18);
$pdf->Write(0,"***");
$pdf->SetXY(150,61+18);
$pdf->Write(0,"***");
//******************************************//
$id=$_POST["id"];
mysqlconnect();
$query = "select * from pat WHERE  id = '$id' ";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($result=mysql_fetch_object($resultat))
{
	$pdf->SetXY(58,92);$pdf->Write(0,$result->NOM);
	$pdf->SetXY(132,92);$pdf->Write(0,$result->PRENOM);
	if ($result->SEX=='M'){$pdf->SetXY(49.5,98);$pdf->Write(0,"X");}else {$pdf->SetXY(67,98);$pdf->Write(0,"X");}
    $pdf->SetXY(67,103.5);$pdf->Write(0,$result->DATENAISSANCE);
	$pdf->SetXY(50,109.5);$pdf->Write(0,"sans profession");
	//******************************************//
	$pdf->SetXY(136,121.5);$pdf->Write(0,nbrtostring("wil","IDWIL",$result->WILAYAR,"WILAYAS") );
	$pdf->SetXY(70,121.5);$pdf->Write(0,nbrtostring("com","IDCOM",$result->COMMUNER,"COMMUNE"));
	$pdf->SetXY(70,115.5);$pdf->Write(0,$result->ADRESSE);	
}

//*****************************************//
$pdf->SetXY(70,121.5+6);$pdf->Write(0,$_POST['DATE']);
$pdf->SetXY(70,121.5+6+6);$pdf->Write(0,$_POST['HDA']);
//****************************************//
$pdf->SetXY(55,122+22);$pdf->Write(0,nbrtostring("wil","IDWIL",$_POST['WILAYAN'],"WILAYAS"));
$pdf->SetXY(60,121.5+22+6);$pdf->Write(0,nbrtostring("com","IDCOM",$_POST['COMMUNEN'],"COMMUNE"));
//****************************************//
if ($_POST['ZONE']=='1')
{
$pdf->SetXY(77,121.5+22+6+6);$pdf->Write(0,"X");
}
else
{
$pdf->SetXY(146,121.5+22+6+6);$pdf->Write(0,"X");
}
//****************************************//
if ($_POST['INTEXT']=='1')
{
$pdf->SetXY(76.5,121.5+22+6+6+5);$pdf->Write(0,"X");
}
else
{
$pdf->SetXY(146,121.5+22+6+6+5);$pdf->Write(0,"X");
}
//****************************************//
switch($_POST['TYPEHABITA'])  
{
case '1' :
		{
		$pdf->SetXY(100,167);$pdf->Write(0,"X");break;
		}
case '4' :
		{
		$pdf->SetXY(161,167);$pdf->Write(0,"X");break;
		}	
case '2' :
		{
		$pdf->SetXY(100,173);$pdf->Write(0,"X");break;
		}		
case '5' :
		{
		$pdf->SetXY(161,173);$pdf->Write(0,"X");break;
		}
		
case '3' :
		{
		$pdf->SetXY(99,179);$pdf->Write(0,"X");break;
		}		
case '6' :
		{
		$pdf->SetXY(128,179);$pdf->Write(0,"X");break;
		}	
}
//*****************************************//

if ($_POST['SCORVU']=='1')
{
$pdf->SetXY(125,185);$pdf->Write(0,"X");
}
else
{
$pdf->SetXY(156,185);$pdf->Write(0,"X");
}
//***************************************//
if ($_POST['GINUT']=='2')
{
$pdf->SetXY(78,204);$pdf->Write(0,"X");
}
else
{
$pdf->SetXY(123.5,204);$pdf->Write(0,"X");
}		
//****************************************//
switch($_POST['SIEGE'])  
{
case '1' :
		{
		$pdf->SetXY(69.5,251.5);$pdf->Write(0,"X");break;
		}
case '2' :
		{
		$pdf->SetXY(69.5+53.5,251.5);$pdf->Write(0,"X");break;
		}		
		
case '3' :
		{
		$pdf->SetXY(69.5,251.5+4.5);$pdf->Write(0,"X");break;
		}
case '4' :
		{
		$pdf->SetXY(69+53.5,251.5+5);$pdf->Write(0,"X");break;
		}		
}		
//****************************************//
$pdf->SetXY(70,161+65);
$pdf->Write(0,date('d-m-Y'));
$pdf->SetXY(70,161+70);
$pdf->Write(0,date("H:i"));
//*****************************************//
if ($_POST['ATCD']=='1')
{
$pdf->SetXY(85,235);
$pdf->Write(0,"X");
}
else
{
$pdf->SetXY(105,235);
$pdf->Write(0,"X");
}		
//******************************************//
$pdf->AddPage();
$pdf->setSourceFile('es1.pdf');
$tplIdx = $pdf->importPage(2);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);

switch($_POST['CLASSE'])  
{
case '1' :
		{
		$pdf->SetXY(67,45);$pdf->Write(0,"X");
		$pdf->SetXY(67,50);$pdf->Write(0,"X");
		$pdf->SetXY(67,55);$pdf->Write(0,"X");
		$pdf->SetXY(67,60);$pdf->Write(0,"X");
		$pdf->SetXY(59,94);$pdf->Write(0,"X");
		break;
		}
case '2' :
		{
		$pdf->SetXY(59+51.5,94);$pdf->Write(0,"X");break;
		}		
		
case '3' :
		{
		$pdf->SetXY(59+101.5,94);$pdf->Write(0,"X");break;
		}				
}		
//****************************************//		
if ($_POST['SAS']=='OUI')
{
$pdf->SetXY(56,94+11);$pdf->Write(0,"X");
$pdf->SetXY(56+95,94+11);$pdf->Write(0,$_POST['NBRAMP']);
$pdf->SetXY(56+65,94+11+4.5);$pdf->Write(0,DATE('H:I'));
$pdf->SetXY(25+65,94+11+13.5);$pdf->Write(0,"- ASPEGIC 1gr IM");
$pdf->SetXY(25+65,94+11+13.5+5);$pdf->Write(0,"- HHC 100 IVL");
}
else
{
$pdf->SetXY(56+30,94+11);$pdf->Write(0,"X");
$pdf->SetXY(56+95,94+11);$pdf->Write(0,"0");
}
//********************************//
if ($_POST['EVACUATION']=='OUI')
{
	// $pdf->SetXY(25+65,134);$pdf->Write(0,"OUI");
	$pdf->SetXY(50,140);$pdf->Write(0,$_POST['DATEEVACUATION']);
	if ($_POST['CLASSEEVA']=='2'){
	$pdf->SetXY(81,215);$pdf->Write(0,"X");
	}
	else{
	$pdf->SetXY(127,215);$pdf->Write(0,"X");
	}

	$pdf->SetXY(25+65,134);$pdf->Write(0,"Pour une meilleur prise en charge");
}
$pdf->SetXY(140,252);$pdf->Write(0,'DR TIBA');
//insertion dans la base de donnees scor
mysqlconnect();
$age=substr(date('Y-m-d'),0,4)-substr($_POST['dns'],6,4);
$sqls = "INSERT INTO scor( idpat,datescor,heurescor,age,sexe,siege,lieux,classe,NBBRSAS,wil,com ) 
VALUES ('".$id."','".dateFR2US($_POST['DATE'])."','".$_POST['HDA']."','".$age."','".$_POST['sexe']."','".$_POST['SIEGE']."','".$_POST['INTEXT']."','".$_POST['CLASSE']."','".$_POST['NBRAMP']."','".$_POST['WILAYAN']."','".$_POST['COMMUNEN']."')";
$requete = @mysql_query($sqls) or die($sql."<br>".mysql_error()); 

if ($_POST['DECES']=='OUI')
{
$pdf->AddPage();
$pdf->setSourceFile('es2.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(40,61-5);$pdf->Write(0,"Djelfa");
$pdf->SetXY(45,61+6-5);$pdf->Write(0,"***");
$pdf->SetXY(55,61+12-5);$pdf->Write(0,"***");
$pdf->SetXY(123,61+12-5);$pdf->Write(0,"***");
$pdf->SetXY(117,61-5);$texte="Ain oussera";$pdf->Write(0,utf8_decode($texte));
$pdf->SetXY(43,61+18-5);$pdf->Write(0,"Ain oussera");
$pdf->SetXY(100,61+18-5);$pdf->Write(0,"***");
$pdf->SetXY(150,61+18-5);$pdf->Write(0,"***");
mysqlconnect();
$query = "select * from pat WHERE  id = '$id' ";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($result=mysql_fetch_object($resultat))
{
	$pdf->SetXY(58,102);$pdf->Write(0,$result->NOM);
	$pdf->SetXY(132,102);$pdf->Write(0,$result->PRENOM);
	if ($result->SEX=='M'){$pdf->SetXY(49.5,98+10);$pdf->Write(0,"X");}else {$pdf->SetXY(67,98+10);$pdf->Write(0,"X");}
    $pdf->SetXY(67,103.5+10);$pdf->Write(0,$result->DATENAISSANCE);
	$pdf->SetXY(50,109.5+10);$pdf->Write(0,"sans profession");
	//******************************************//
	$pdf->SetXY(70,124.5);$pdf->Write(0,nbrtostring("wil","IDWIL",$result->WILAYAR,"WILAYAS") );
	$pdf->SetXY(70,124.5+5);$pdf->Write(0,nbrtostring("com","IDCOM",$result->COMMUNER,"COMMUNE"));
	
}
//*****************************************//
$pdf->SetXY(70,121.5+14);$pdf->Write(0,$_POST['DATE']);
$pdf->SetXY(70,121.5+6+14);$pdf->Write(0,$_POST['HDA']);
//****************************************//
$pdf->SetXY(55,122+30);$pdf->Write(0,nbrtostring("wil","IDWIL",$_POST['WILAYAN'],"WILAYAS"));
$pdf->SetXY(60,121.5+22+14);$pdf->Write(0,nbrtostring("com","IDCOM",$_POST['COMMUNEN'],"COMMUNE"));
//****************************************//
//****************************************//
if ($_POST['ZONE']=='rurale')
{
$pdf->SetXY(77,121.5+22+6+16);$pdf->Write(0,"X");
}
else
{
$pdf->SetXY(146,121.5+22+6+16);$pdf->Write(0,"X");
}
//****************************************//
if ($_POST['INTEXT']=='INT')
{
$pdf->SetXY(76.5,121.5+22+6+6+15);$pdf->Write(0,"X");
}
else
{
$pdf->SetXY(146,121.5+22+6+6+15);$pdf->Write(0,"X");
}
//****************************************//
switch($_POST['TYPEHABITA'])  
{
case 'Maison individuelle/Villa' :
		{
		$pdf->SetXY(100,177);$pdf->Write(0,"X");break;
		}
case 'Immeuble' :
		{
		$pdf->SetXY(161,177);$pdf->Write(0,"X");break;
		}	
case 'Habitat précaire' :
		{
		$pdf->SetXY(100,183);$pdf->Write(0,"X");break;
		}		
case 'Maison traditionnelle' :
		{
		$pdf->SetXY(161,183);$pdf->Write(0,"X");break;
		}
		
case 'Tente de nomade' :
		{
		$pdf->SetXY(99,189);$pdf->Write(0,"X");break;
		}		
case 'Autres' :
		{
		$pdf->SetXY(128,189);$pdf->Write(0,"X");break;
		}	
}
//*****************************************//

if ($_POST['SCORVU']=='OUI')
{
$pdf->SetXY(127,194);$pdf->Write(0,"X");
}
else
{
$pdf->SetXY(162,194);$pdf->Write(0,"X");
}
//***************************************//
// if ($_POST['GINUT']=='OUI')
// {
// $pdf->SetXY(78,204);$pdf->Write(0,"X");
// }
// else
// {
// $pdf->SetXY(123.5,204);$pdf->Write(0,"X");
// }		
//****************************************//
// switch($_POST['SIEGE'])  
// {
// case 'Tête Cou' :
		// {
		// $pdf->SetXY(69.5,251.5);$pdf->Write(0,"X");break;
		// }
// case 'Tronc' :
		// {
		// $pdf->SetXY(69.5+53.5,251.5);$pdf->Write(0,"X");break;
		// }		
		
// case 'Membre supérieur' :
		// {
		// $pdf->SetXY(69.5,251.5+4.5);$pdf->Write(0,"X");break;
		// }
// case 'Membre inférieur' :
		// {
		// $pdf->SetXY(69+53.5,251.5+5);$pdf->Write(0,"X");break;
		// }		
// }		
//****************************************//
// $pdf->SetXY(70,161+65);
// $pdf->Write(0,date('d-m-Y'));
// $pdf->SetXY(70,161+70);
// $pdf->Write(0,date("H:i"));
//*****************************************//
// if ($_POST['ATCD']=='OUI')
// {
// $pdf->SetXY(85,235);
// $pdf->Write(0,"X");
// }
// else
// {
// $pdf->SetXY(105,235);
// $pdf->Write(0,"X");
// }		





$pdf->AddPage();
$pdf->setSourceFile('es2.pdf');
$tplIdx = $pdf->importPage(2);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);


$pdf->AddPage();
$pdf->setSourceFile('es2.pdf');
$tplIdx = $pdf->importPage(3);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
}

$pdf->Output();
?>