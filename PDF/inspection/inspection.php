<?php
function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	
function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."/".$M."/".$A ;
    return $dateUS2FR;//01/01/2013
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
require('../fpdf.php');
require('../fpdi.php');
$pdf = new FPDI();$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->setSourceFile('decesfrx.pdf');
$tplIdx = $pdf->importPage(13);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$ID=$_GET["uc"];
$pdf->EAN13(15,50,$ID,$h=6,$w=.35);$pdf->EAN13(150,50,time(),$h=6,$w=.35);
$pdf->EAN13(15,144,$ID,$h=6,$w=.35);$pdf->EAN13(150,144,time(),$h=6,$w=.35);
$pdf->SetFont('Arial','B',9);
mysqlconnect();
$query = "SELECT * FROM deceshosp where id='".$ID."'  ";
$resultat=mysql_query($query);
$pdf->SetFont('Arial','B',08);
while($row=mysql_fetch_object($resultat))
{
	// $pdf->Text(15,40,);
	//partie administrative***//
	if ($row->STRUCTURED=='1') {$EPH='EPH_DJALFA';}
	if ($row->STRUCTURED=='2') {$EPH='EPH_AIN_OUSSERA';}
	if ($row->STRUCTURED=='3') {$EPH='EPH_HASSI_BAHBAH';}
	if ($row->STRUCTURED=='4') {$EPH='EPH_MESSAAD';}
	if ($row->STRUCTURED=='5') {$EPH='EHS_DJELFA';}
	if ($row->STRUCTURED=='6') {$EPH='WILAYA_DJELFA';}
	
	$pdf->SetFont('Arial','B',08);
	$pdf->SetXY(64,35.5);$pdf->Write(0,'ETABLISSEMENT DE SANTE : '.$EPH);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(255,0,0);
	$pdf->SetXY(42,63.5);$pdf->Write(0,nbrtostring('WIL','IDWIL',$row->WILAYAD,'WILAYAS'));$pdf->SetXY(42,59.5);$pdf->Write(0,nbrtostring('com','IDCOM',$row->COMMUNED,'COMMUNE'));
	$pdf->SetXY(24,61+6);$pdf->Write(0,$row->NOM);
	$pdf->SetXY(71,61+6);$pdf->Write(0,$row->PRENOM);
	$pdf->SetXY(33,77.7);$pdf->Write(0,$row->FILSDE);$pdf->SetXY(85,77.7);$pdf->Write(0,$row->ETDE);
	$pdf->SetXY(24,74);$pdf->Write(0,$row->SEX);
	$pdf->SetXY(48,81.7);$pdf->Write(0,$row->DATENAISSANCE);$pdf->SetXY(85,81.7);$pdf->Write(0,nbrtostring('com','IDCOM',$row->COMMUNE,'COMMUNE'));
	$pdf->SetXY(35,82+3);$pdf->Write(0,dateUS2FR($row->DINS));
	
	if ($row->Days >= 365) 
	{
	$pdf->SetXY(89,82+3);$pdf->Write(0,$row->Years);
	$pdf->SetXY(108.5,83+7);$pdf->Write(0,'***');
	$pdf->SetXY(123.5,83+7);$pdf->Write(0,'***');
	}
	if ($row->Days <= 30) 
	{
	$pdf->SetXY(89,83+3);$pdf->Write(0,'***');
	$pdf->SetXY(108.5,83+7);$pdf->Write(0,'***');
	$pdf->SetXY(123.5,82+7);$pdf->Write(0,$row->Days);
	}
	
	if ($row->Days > 30  and  $row->Days < 365 ) 
	{
	$pdf->SetXY(89,83+3);$pdf->Write(0,'***');
	$pdf->SetXY(108.5,82+7);$pdf->Write(0,$row->Months);
	$pdf->SetXY(123.5,83+7);$pdf->Write(0,'***');
	}
	// $pdf->SetXY(84,82+3);$pdf->Write(0,$row->Years);
	// $pdf->SetXY(107.5,82+7);$pdf->Write(0,$row->Months);
	// $pdf->SetXY(123.5,82+7);$pdf->Write(0,$row->Days);
	//LIEU DU DECES
	switch($row->LD)  
		{
			case 'DOM':
				{
				$pdf->SetXY(21.8,96.7);$pdf->Write(0,'X');
				break;
				}
			case 'VP':
				{
				$pdf->SetXY(65.8,96.7+4);$pdf->Write(0,"X");
				break;
				}
			case 'AAP':
				{
				$pdf->SetXY(21.8,96.7+8);$pdf->Write(0,"X");
	            $pdf->SetXY(49.8,96.7+8);$pdf->Write(0,$row->AUTRES);
				break;
				}
			case 'SSP':
				{
				 $pdf->SetXY(65.8,96.7);$pdf->Write(0,"X");
				break;
				}
			case 'SSPV':
				{
				$pdf->SetXY(21.8,96.7+4);$pdf->Write(0,"X");
				break;
				}		
		}
	$pdf->SetXY(143,73);$pdf->Write(0,dateUS2FR($row->DINS));
	$pdf->SetXY(143,76.5);$pdf->Write(0,$row->HINS);
    //CAUSES DECES
	$pdf->SetXY(141,82.5);$pdf->Cell(4,2,"",1,1,'C');
	$pdf->SetXY(141,83.5+3);$pdf->Cell(4,2,"",1,1,'C');
	$pdf->SetXY(141,83.5+6.5);$pdf->Cell(4,2,"",1,1,'C'); 
	switch($row->CD)  
		{
			case 'CN':
				{
				$pdf->SetXY(141,82.5);$pdf->Cell(4,2,"X",1,1,'C');
				break;
				}
			case 'CV':
				{
				$pdf->SetXY(141,83.5+3);$pdf->Cell(4,2,"X",1,1,'C');
				break;
				}
			case 'CI':
				{
				$pdf->SetXY(141,83.5+6.5);$pdf->Cell(4,2,"X",1,1,'C'); 
				break;
				}			
		}

	$pdf->SetXY(143,94.5);$pdf->Write(0,nbrtostring('com','IDCOM',$row->COMMUNED,'COMMUNE'));
	$pdf->SetXY(143,98.6);$pdf->Write(0,dateUS2FR($row->DINS));
	$pdf->SetXY(143,108);$pdf->Write(0,'Dr : '.$row->USER);
  
  //Signalement mÈdico-légal- A remplir par le médecin (cocher la case adéquate)
	$pdf->SetXY(17,116.7+7);$pdf->Cell(3,2,"",1,1,'C');
	// $pdf->SetXY(106,116.7+7);$pdf->Cell(3,2,"",1,1,'C');
	$pdf->SetXY(17,116.7+14);$pdf->Cell(3,2,"",1,1,'C');
	if ($row->OMLI=='1'){$pdf->SetXY(16.5,116.7+8);$pdf->Write(0,"X");}
	if ($row->MIEC=='1'){$pdf->SetXY(106,116.7+8.5);$pdf->Write(0,"X");}
	if ($row->EPFP=='1'){$pdf->SetXY(16.5,116.7+15);$pdf->Write(0,"X");}
	//partie medicale//
	$pdf->SetXY(42,136.7+16.5);$pdf->Write(0,nbrtostring('com','IDCOM',$row->COMMUNED,'COMMUNE'));
	$pdf->SetXY(38,136.7+16.5+4);$pdf->Write(0,nbrtostring('WIL','IDWIL',$row->WILAYAD,'WILAYAS'));
	$pdf->SetXY(46,136.7+16.5+7.5);$pdf->Write(0,nbrtostring('com','IDCOM',$row->COMMUNER,'COMMUNE'));
	$pdf->SetXY(42,136.7+16.5+7.5+3.5);$pdf->Write(0,nbrtostring('WIL','IDWIL',$row->WILAYAR,'WILAYAS'));
	$pdf->SetXY(39,136.7+16.5+15);$pdf->Write(0,$row->DATENAISSANCE);$pdf->SetXY(90,136.7+16.5+7.5+7.5);$pdf->Write(0,dateUS2FR($row->DINS));
	if ($row->Days >= 365) 
	{
	$pdf->SetXY(94,136.7+16.5+15+3.5);$pdf->Write(0,$row->Years);
	$pdf->SetXY(108,137.7+16.5+15+7.5);$pdf->Write(0,'***');
	$pdf->SetXY(108+15,137.7+16.5+15+7.5);$pdf->Write(0,'***');
	}
	if ($row->Days <= 30) 
	{
	$pdf->SetXY(94,137.7+16.5+15+3.5);$pdf->Write(0,'***');
	$pdf->SetXY(108,137.7+16.5+15+7.5);$pdf->Write(0,'***');
	$pdf->SetXY(108+15,136.7+16.5+15+7.5);$pdf->Write(0,$row->Days);
	}
	
	if ($row->Days > 30  and  $row->Days < 365 ) 
	{
	$pdf->SetXY(94,137.7+16.5+15+3.5);$pdf->Write(0,'***');
	$pdf->SetXY(108,136.7+16.5+15+7.5);$pdf->Write(0,$row->Months);
	$pdf->SetXY(108+15,137.7+16.5+15+7.5);$pdf->Write(0,'***');
	}
	$pdf->SetXY(24,136.7+16.5+15+3.5);$pdf->Write(0,$row->SEX);
	switch($row->LD)  
		{
			case 'DOM':
				{
				$pdf->SetXY(21.5,136.7+16.5+25+6.5);$pdf->Write(0,"X");
				break;
				}
			case 'VP':
				{
				$pdf->SetXY(65.5,136.7+16.5+25+10);$pdf->Write(0,"X");
				break;
				}
			case 'AAP':
				{
				$pdf->SetXY(21.5,136.7+16.5+25+14);$pdf->Write(0,"X");
	            $pdf->SetXY(51,136.8+16.5+25+14);$pdf->Write(0,$row->AUTRES);
				break;
				}
			case 'SSP':
				{
					$pdf->SetXY(65.5,136.7+16.5+25+6.5);$pdf->Write(0,"X");
				break;
				}
			case 'SSPV':
				{
				$pdf->SetXY(21.5,136.7+16.5+25+10);$pdf->Write(0,"X");
				break;
				}		
		}
	$pdf->SetXY(48,136.8+16.5+25+29);$pdf->Write(0,$row->CIM1);
	$pdf->SetXY(48,136.8+16.5+25+36);$pdf->Write(0,$row->CIM2);
	$pdf->SetXY(48,136.8+16.5+25+39);$pdf->Write(0,$row->CIM3);
	$pdf->SetXY(48,136.8+16.5+25+43);$pdf->Write(0,$row->CIM4);
	$pdf->SetXY(15,136.8+16.5+25+53);$pdf->Write(0,$row->CIM5);
	// $pdf->SetXY(15,136.8+16.5+25+53);$pdf->Write(0,"50");
	// $pdf->SetXY(15,136.8+16.5+25+55.5);$pdf->Write(0,"51");
	$pdf->SetXY(22,136.8+16.5+25+59);$pdf->Write(0,dateUS2FR($row->DINS));
	$pdf->SetXY(100,136.8+16.5+25+59);$pdf->Write(0,'Dr : '.$row->USER);
	//partie droite   
	//- Nature de la mort
	switch($row->NDLM)  
		{
			case 'NAT':
				{
				$pdf->SetXY(176,136.7+16.5);$pdf->Write(0,"x");
				break;
				}
			case 'ACC':
				{
				$pdf->SetXY(150,136.7+19.5);$pdf->Write(0,"x");
				break;
				}
			case 'AID':  
				{
				$pdf->SetXY(167.8,136.7+19.5);$pdf->Write(0,"x");
				break;
				}	
			case 'AGR':  
				{
				$pdf->SetXY(150,136.7+22);$pdf->Write(0,"x");
				break;
				}	
			case 'IND':  
				{
				$pdf->SetXY(168.8,136.7+22);$pdf->Write(0,"x");
				break;
				}		
			case 'AAP':  
				{
				$pdf->SetXY(172,136.7+25);$pdf->Write(0,"x");
				$pdf->SetXY(158,136.7+25);$pdf->Write(0,$row->NDLMAAP);
				break;
				}			
		}
	
	//- Mortinatalité, périnatalité
	if ($row->GM=='1')
	{
	$pdf->SetXY(167,136.7+32);$pdf->Write(0,"x");
	}
	else
	{
	$pdf->SetXY(176.5,136.7+32);$pdf->Write(0,"x");
	}
    
	if ($row->MN=='1')
	{
	$pdf->SetXY(157.5,136.7+35);$pdf->Write(0,"x");
	}
	else
	{
	$pdf->SetXY(168,136.7+35);$pdf->Write(0,"x");
	}
	$pdf->SetXY(176,136.7+38);$pdf->Write(0,$row->AGEGEST);
	$pdf->SetXY(179,136.7+41);$pdf->Write(0,$row->POIDNSC);
	$pdf->SetXY(169.5,136.7+43);$pdf->Write(0,$row->AGEMERE);
	$pdf->SetXY(173.5,136.7+51.5);$pdf->Write(0,$row->EMDPNAT);
	// Décés maternel 
	if ($row->DECEMAT=='1')
	{
	$pdf->SetXY(166.5,136.7+58.5);$pdf->Write(0,"X");
	switch($row->GRS)          
		{
			case 'DGRO':
				{
				$pdf->SetXY(154.5,136.7+64.5);$pdf->Write(0,"X");//$pdf->SetXY(165,136.7+64.5);$pdf->Write(0,"4");
				break;
				}
			case 'DACC':
				{
				$pdf->SetXY(144,136.7+73);$pdf->Write(0,"x");//$pdf->SetXY(154,136.7+73);$pdf->Write(0,"x");
				break;
				}
			case 'DAVO':
				{
				$pdf->SetXY(144,136.7+73);$pdf->Write(0,"x");//$pdf->SetXY(154,136.7+73);$pdf->Write(0,"x");
				break;
				}
			case 'AGESTATION':
				{
				$pdf->SetXY(155,136+79);$pdf->Write(0,"x");//$pdf->SetXY(164,136+79);$pdf->Write(0,"x");
				break;
				}
			case 'IDETER':
				{
				$pdf->SetXY(155.5,136+82);$pdf->Write(0,"x");
				break;
				}		
		}
	}
	else
	{
	$pdf->SetXY(176,136.7+58.5);$pdf->Write(0,"X");
	}
    if ($row->OMLI=='1'){ $pdf->SetXY(166,136+98);$pdf->Write(0,"x");}else {$pdf->SetXY(176,136+98);$pdf->Write(0,"x");}
	if ($row->MIEC=='1'){ $pdf->SetXY(162,136+106);$pdf->Write(0,"x");}else {$pdf->SetXY(173.5,136+106);$pdf->Write(0,"x");}
	if ($row->EPFP=='1'){ $pdf->SetXY(144.5,136+115);$pdf->Write(0,"x");}else {$pdf->SetXY(156.5,136+115);$pdf->Write(0,"x");}
    if ($row->POSTOPP=='1'){ $pdf->SetXY(154.5,136+127);$pdf->Write(0,"x");}else {$pdf->SetXY(166.5,136+127);$pdf->Write(0,"x");}
$pdf->AddPage();
$pdf->setSourceFile('decesfrx.pdf');
$tplIdx = $pdf->importPage(14);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->EAN13(15,50,$ID,$h=6,$w=.35);$pdf->EAN13(150,50,time(),$h=6,$w=.35);
$pdf->SetXY(28,63);$pdf->Write(0,nbrtostring('WIL','IDWIL',$row->WILAYAD,'WILAYAS'));
$pdf->SetXY(32,69);$pdf->Write(0,nbrtostring('com','IDCOM',$row->COMMUNED,'COMMUNE'));
}
$pdf->Output();
?>