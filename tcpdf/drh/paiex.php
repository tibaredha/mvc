<?php
require_once('../tcpdf/TCPDFPAIE.PHP');
$pdf = new TCPDFPAIE('P', 'mm', 'A4', true, 'UTF-8', false);
$idp=$_POST["idp"];
$pdf->entete();
$pdf->titre1($_POST["NSS"],$_POST["NCCP"],$_POST["NBRJ"],$_POST["NOM"],$_POST["PRENOM"],$_POST["Date_Naissance"],$_POST["Situation_familliale"],$_POST["GRADE"],$_POST["CATEGORIE"],$_POST["ECHELON"],$_POST["ENFS"]);
$uc=$_POST["GRADENBR"];
switch($uc)
{
        case '5' ://Médecin généraliste de santé publique $_POST["SB"]
		{
		$pdf->SetFont('aefurat', '', 14);
		$pdf->Text(5,130,"الاجر القاعدى");              $pdf->Text(80,130,$_POST["SB"]);
		$pdf->Text(5,135,"تعويض الخبرة المهنية");         $pdf->Text(80,135,$_POST["IEP"]);
		$pdf->Text(5,140,"منحة جزافية تعويضية");       $pdf->Text(80,140,$_POST["IFC"]);
		$pdf->Text(5,145,"زيادة استدلالية منصب عالى");   $pdf->Text(80,145,$_POST["BIPS"]); 
		$pdf->Text(5,150,"التعويض عن العدوى");         $pdf->Text(80,150,$_POST["CONT1"]);
		$pdf->Text(5,155,"منحة الانتفاع");              $pdf->Text(80,155,$_POST["INT"]);      
		$pdf->Text(5,160,"علاوة تحسين الخدمات الطبية");    $pdf->Text(80,160,$_POST["PAPM"]); //servie chaque 03 mois ne figure pas dans la paie   
		$pdf->Text(5,165,"تعويض  التأهيل");            $pdf->Text(80,165,$_POST["IQUA"]);
		$pdf->Text(5,170,"تعويض التوثيق"); 	           $pdf->Text(80,170,$_POST["IDOC"]);
		$pdf->Text(5,175,"تعويض دعم  نشاطات الصحة");   $pdf->Text(80,175,$_POST["ISAS"]);
		//********************************************************************************//
		$SBRUT=$_POST["SB"]+$_POST["IEP"]+$_POST["CONT1"]+$_POST["INT"]+$_POST["IDOC"]+$_POST["ISAS"]+$_POST["IQUA"]+$_POST["IFC"]+$_POST["BIPS"];
		$pdf->Text(5,180,"الراتب الخام");               $pdf->Text(80,180,$SBRUT);
		$pdf->Text(5,185,"منح عائلية");                $pdf->Text(80,185,$_POST["ALLF"]);
		$TOTAL=$SBRUT+$_POST["ALLF"];
		$pdf->Text(5,190,"المجموع");                     $pdf->Text(80,190,round($TOTAL,3));
		$RSS=($SBRUT*9)/100;
		$pdf->Text(5,195,"الضمان الاجتماعى");           $pdf->Text(80,195,round($RSS,3));
		$BASEIRG=$SBRUT-$RSS;
		$pdf->Text(5,200,"اساس خاضع للضريبة");         $pdf->Text(80,200,round($BASEIRG,0));
		$pdf->Text(5,205,"اقتطاع الضرائب على الاجر");   $pdf->Text(80,205,$pdf->BASEIRG($BASEIRG));
		//*************************************************//
		$IRGRSS=round($RSS,3)+$pdf->BASEIRG($BASEIRG);
		$pdf->Text(112,195,"الضمان الاجتماعى");          $pdf->Text(170,195,round($RSS,3));                      
		$pdf->Text(112,200,"اقتطاع الضرائب على الاجر");  $pdf->Text(170,200,$pdf->BASEIRG($BASEIRG));  
		$pdf->Text(112,220,"مجموع الاقتطاعات");           $pdf->Text(170,220,$IRGRSS);                   
		//*************************************************//
		$NET=$TOTAL-$IRGRSS;
		$pdf->Text(5,220,"الصافى للدفع");                $pdf->Text(80,220,round($NET,3));	
		//MANQUE FEMME 
		break;
		}
		case '6' ://Médecin généraliste PRINCIPAL
		{
		$pdf->SetFont('aefurat', '', 14);
		$pdf->Text(5,130,"الاجر القاعدى");              $pdf->Text(80,130,$_POST["SB"]);
		$pdf->Text(5,135,"تعويض الخبرة المهنية");         $pdf->Text(80,135,$_POST["IEP"]);
		$pdf->Text(5,140,"منحة جزافية تعويضية");       $pdf->Text(80,140,$_POST["IFC"]);
		$pdf->Text(5,145,"زيادة استدلالية منصب عالى");   $pdf->Text(80,145,$_POST["BIPS"]); 
		$pdf->Text(5,150,"التعويض عن العدوى");         $pdf->Text(80,150,$_POST["CONT1"]);
		$pdf->Text(5,155,"منحة الانتفاع");              $pdf->Text(80,155,$_POST["INT"]);      
		$pdf->Text(5,160,"علاوة تحسين الخدمات الطبية");    $pdf->Text(80,160,$_POST["PAPM"]); //servie chaque 03 mois ne figure pas dans la paie   
		$pdf->Text(5,165,"تعويض  التأهيل");            $pdf->Text(80,165,$_POST["IQUA"]);
		$pdf->Text(5,170,"تعويض التوثيق"); 	           $pdf->Text(80,170,$_POST["IDOC"]);
		$pdf->Text(5,175,"تعويض دعم  نشاطات الصحة");   $pdf->Text(80,175,$_POST["ISAS"]);
		//********************************************************************************//
		$SBRUT=$_POST["SB"]+$_POST["IEP"]+$_POST["CONT1"]+$_POST["INT"]+$_POST["IDOC"]+$_POST["ISAS"]+$_POST["IQUA"]+$_POST["IFC"]+$_POST["BIPS"];
		$pdf->Text(5,180,"الراتب الخام");               $pdf->Text(80,180,$SBRUT);
		$pdf->Text(5,185,"منح عائلية");                $pdf->Text(80,185,$_POST["ALLF"]);
		$TOTAL=$SBRUT+$_POST["ALLF"];
		$pdf->Text(5,190,"المجموع");                     $pdf->Text(80,190,round($TOTAL,3));
		$RSS=($SBRUT*9)/100;
		$pdf->Text(5,195,"الضمان الاجتماعى");           $pdf->Text(80,195,round($RSS,3));
		$BASEIRG=$SBRUT-$RSS;
		$pdf->Text(5,200,"اساس خاضع للضريبة");         $pdf->Text(80,200,round($BASEIRG,0));
		$pdf->Text(5,205,"اقتطاع الضرائب على الاجر");   $pdf->Text(80,205,$pdf->BASEIRG($BASEIRG));
		//*************************************************//
		$IRGRSS=round($RSS,3)+$pdf->BASEIRG($BASEIRG);
		$pdf->Text(112,195,"الضمان الاجتماعى");          $pdf->Text(170,195,round($RSS,3));                      
		$pdf->Text(112,200,"اقتطاع الضرائب على الاجر");  $pdf->Text(170,200,$pdf->BASEIRG($BASEIRG));  
		$pdf->Text(112,220,"مجموع الاقتطاعات");           $pdf->Text(170,220,$IRGRSS);                   
		//*************************************************//
		$NET=$TOTAL-$IRGRSS;
		$pdf->Text(5,220,"الصافى للدفع");                $pdf->Text(80,220,round($NET,3));	
		//MANQUE FEMME 
		break;
		}
		case '1' ://Médecin SPECIALISTE
		{
		$pdf->SetFont('aefurat', '', 14);
		$pdf->Text(5,130,"الاجر القاعدى");              $pdf->Text(80,130,$_POST["SB"]);
		$pdf->Text(5,135,"تعويض الخبرة المهنية");         $pdf->Text(80,135,$_POST["IEP"]);
		$pdf->Text(5,140,"منحة جزافية تعويضية");       $pdf->Text(80,140,$_POST["IFC"]);
		$pdf->Text(5,145,"زيادة استدلالية منصب عالى");   $pdf->Text(80,145,$_POST["BIPS"]); 
		$pdf->Text(5,150,"التعويض عن العدوى");         $pdf->Text(80,150,$_POST["CONT1"]);
		$pdf->Text(5,155,"منحة الانتفاع");              $pdf->Text(80,155,$_POST["INT"]);      
		$pdf->Text(5,$pdf->GetY()+5,"التخلي عن النشاط التكميلي");     $pdf->Text(80,$pdf->GetY(),$_POST["IAC"]);   
		$pdf->Text(5,$pdf->GetY()+5,"تعويض  التأهيل");                $pdf->Text(80,$pdf->GetY(),$_POST["IQUA"]);
		$pdf->Text(5,$pdf->GetY()+5,"تعويض التوثيق"); 	              $pdf->Text(80,$pdf->GetY(),$_POST["IDOC"]);
		$pdf->Text(5,$pdf->GetY()+5,"التعويض النوعي");                $pdf->Text(80,$pdf->GetY(),$_POST["ISP"]);
		$pdf->Text(5,$pdf->GetY()+5,"علاوة التاطير");                   $pdf->Text(80,$pdf->GetY(),$_POST["IENC"]);
		$pdf->Text(5,$pdf->GetY()+5,"علاوة تحسين الاداء");                $pdf->Text(80,$pdf->GetY(),$_POST["PAP"]);
		$pdf->Text(5,$pdf->GetY()+5,"تعويض الالزام في العلاج المتخصص");   $pdf->Text(80,$pdf->GetY(),$_POST["IASS"]);
		//********************************************************************************//
		$SBRUT=$_POST["SB"]+$_POST["IEP"]+$_POST["CONT1"]+$_POST["INT"]+$_POST["IDOC"]+$_POST["ISAS"]+$_POST["IQUA"]+$_POST["IFC"]+$_POST["BIPS"]+$_POST["IAC"]+$_POST["ISP"]+$_POST["IENC"]+$_POST["PAP"]+$_POST["IASS"];
		$pdf->Text(5,$pdf->GetY()+5,"الراتب الخام");               $pdf->Text(80,$pdf->GetY(),$SBRUT);
		$pdf->Text(5,$pdf->GetY()+5,"منح عائلية");                $pdf->Text(80,$pdf->GetY(),$_POST["ALLF"]);
		$TOTAL=$SBRUT+$_POST["ALLF"];
		$pdf->Text(5,$pdf->GetY()+5,"المجموع");                     $pdf->Text(80,$pdf->GetY(),round($TOTAL,3));
		$RSS=($SBRUT*9)/100;
		$pdf->Text(5,$pdf->GetY()+5,"الضمان الاجتماعى");           $pdf->Text(80,$pdf->GetY(),round($RSS,3));
		$BASEIRG=$SBRUT-$RSS;
		$pdf->Text(5,$pdf->GetY()+5,"اساس خاضع للضريبة");         $pdf->Text(80,$pdf->GetY(),round($BASEIRG,0));
		$pdf->Text(5,$pdf->GetY()+5,"اقتطاع الضرائب على الاجر");   $pdf->Text(80,$pdf->GetY(),$pdf->BASEIRG($BASEIRG));
		//*************************************************//
		$IRGRSS=round($RSS,3)+$pdf->BASEIRG($BASEIRG);
		$pdf->Text(112,195,"الضمان الاجتماعى");          $pdf->Text(170,195,round($RSS,3));                      
		$pdf->Text(112,200,"اقتطاع الضرائب على الاجر");  $pdf->Text(170,200,$pdf->BASEIRG($BASEIRG));  
		$pdf->Text(112,220,"مجموع الاقتطاعات");           $pdf->Text(170,220,$IRGRSS);                   
		//*************************************************//
		$NET=$TOTAL-$IRGRSS;
		$pdf->Text(5,225,"الصافى للدفع");                $pdf->Text(80,225,round($NET,3));	
		//MANQUE FEMME 
		break;
		}
		case '3' ://Médecin SPECIALISTE
		{
		$pdf->SetFont('aefurat', '', 14);
		$pdf->Text(5,130,"الاجر القاعدى");              $pdf->Text(80,130,$_POST["SB"]);
		$pdf->Text(5,135,"تعويض الخبرة المهنية");         $pdf->Text(80,135,$_POST["IEP"]);
		$pdf->Text(5,140,"منحة جزافية تعويضية");       $pdf->Text(80,140,$_POST["IFC"]);
		$pdf->Text(5,145,"زيادة استدلالية منصب عالى");   $pdf->Text(80,145,$_POST["BIPS"]); 
		$pdf->Text(5,150,"التعويض عن العدوى");         $pdf->Text(80,150,$_POST["CONT1"]);
		$pdf->Text(5,155,"منحة الانتفاع");              $pdf->Text(80,155,$_POST["INT"]);      
		$pdf->Text(5,$pdf->GetY()+5,"التخلي عن النشاط التكميلي");     $pdf->Text(80,$pdf->GetY(),$_POST["IAC"]);   
		$pdf->Text(5,$pdf->GetY()+5,"تعويض  التأهيل");                $pdf->Text(80,$pdf->GetY(),$_POST["IQUA"]);
		$pdf->Text(5,$pdf->GetY()+5,"تعويض التوثيق"); 	              $pdf->Text(80,$pdf->GetY(),$_POST["IDOC"]);
		$pdf->Text(5,$pdf->GetY()+5,"التعويض النوعي");                $pdf->Text(80,$pdf->GetY(),$_POST["ISP"]);
		$pdf->Text(5,$pdf->GetY()+5,"علاوة التاطير");                   $pdf->Text(80,$pdf->GetY(),$_POST["IENC"]);
		$pdf->Text(5,$pdf->GetY()+5,"علاوة تحسين الاداء");                $pdf->Text(80,$pdf->GetY(),$_POST["PAP"]);
		$pdf->Text(5,$pdf->GetY()+5,"تعويض الالزام في العلاج المتخصص");   $pdf->Text(80,$pdf->GetY(),$_POST["IASS"]);
		//********************************************************************************//
		$SBRUT=$_POST["SB"]+$_POST["IEP"]+$_POST["CONT1"]+$_POST["INT"]+$_POST["IDOC"]+$_POST["ISAS"]+$_POST["IQUA"]+$_POST["IFC"]+$_POST["BIPS"]+$_POST["IAC"]+$_POST["ISP"]+$_POST["IENC"]+$_POST["PAP"]+$_POST["IASS"];
		$pdf->Text(5,$pdf->GetY()+5,"الراتب الخام");               $pdf->Text(80,$pdf->GetY(),$SBRUT);
		$pdf->Text(5,$pdf->GetY()+5,"منح عائلية");                $pdf->Text(80,$pdf->GetY(),$_POST["ALLF"]);
		$TOTAL=$SBRUT+$_POST["ALLF"];
		$pdf->Text(5,$pdf->GetY()+5,"المجموع");                     $pdf->Text(80,$pdf->GetY(),round($TOTAL,3));
		$RSS=($SBRUT*9)/100;
		$pdf->Text(5,$pdf->GetY()+5,"الضمان الاجتماعى");           $pdf->Text(80,$pdf->GetY(),round($RSS,3));
		$BASEIRG=$SBRUT-$RSS;
		$pdf->Text(5,$pdf->GetY()+5,"اساس خاضع للضريبة");         $pdf->Text(80,$pdf->GetY(),round($BASEIRG,0));
		$pdf->Text(5,$pdf->GetY()+5,"اقتطاع الضرائب على الاجر");   $pdf->Text(80,$pdf->GetY(),$pdf->BASEIRG($BASEIRG));
		//*************************************************//
		$IRGRSS=round($RSS,3)+$pdf->BASEIRG($BASEIRG);
		$pdf->Text(112,195,"الضمان الاجتماعى");          $pdf->Text(170,195,round($RSS,3));                      
		$pdf->Text(112,200,"اقتطاع الضرائب على الاجر");  $pdf->Text(170,200,$pdf->BASEIRG($BASEIRG));  
		$pdf->Text(112,220,"مجموع الاقتطاعات");           $pdf->Text(170,220,$IRGRSS);                   
		//*************************************************//
		$NET=$TOTAL-$IRGRSS;
		$pdf->Text(5,225,"الصافى للدفع");                $pdf->Text(80,225,round($NET,3));	
		//MANQUE FEMME 
		break;
		}
		 case '42' ://Infirmier de santé publique
		{
		$pdf->SetFont('aefurat', '', 14);
		$pdf->Text(5,130,"الاجر القاعدى");              $pdf->Text(80,130,$_POST["SB"]);
		$pdf->Text(5,135,"تعويض الخبرة المهنية");         $pdf->Text(80,135,$_POST["IEP"]);
		$pdf->Text(5,140,"منحة جزافية تعويضية");       $pdf->Text(80,140,$_POST["IFC"]);
		$pdf->Text(5,145,"زيادة استدلالية منصب عالى");   $pdf->Text(80,145,$_POST["BIPS"]); 
		$pdf->Text(5,150,"التعويض عن العدوى");         $pdf->Text(80,150,$_POST["CONT1"]);
		$pdf->Text(5,155,"منحة الانتفاع");              $pdf->Text(80,155,$_POST["INT"]);      
		
		//MANQUE 
		$pdf->Text(5,$pdf->GetY()+5,"علاوة تحسين الاداء");            $pdf->Text(80,160,$_POST["PAPM"]); //servie chaque 03 mois ne figure pas dans la paie   
		$pdf->Text(5,$pdf->GetY()+5,"تعويض الالزام شبه طبي");       $pdf->Text(80,165,$_POST["IASSP"]);
		$pdf->Text(5,$pdf->GetY()+5,"تعويض التقنية"); 	          $pdf->Text(80,170,$_POST["ITEC"]);
		$pdf->Text(5,$pdf->GetY()+5,"تعويض دعم  نشاطات الصحة");   $pdf->Text(80,175,$_POST["ISASP"]);
		
		
		//********************************************************************************//
		$SBRUT=$_POST["SB"]+$_POST["IEP"]+$_POST["CONT1"]+$_POST["INT"]+$_POST["IFC"]+$_POST["BIPS"]+$_POST["IASSP"]+$_POST["ITEC"]+$_POST["ISASP"];
		$pdf->Text(5,$pdf->GetY()+5,"الراتب الخام");               $pdf->Text(80,180,$SBRUT);
		$pdf->Text(5,$pdf->GetY()+5,"منح عائلية");                $pdf->Text(80,185,$_POST["ALLF"]);
		$TOTAL=$SBRUT+$_POST["ALLF"];
		$pdf->Text(5,$pdf->GetY()+5,"المجموع");                     $pdf->Text(80,190,round($TOTAL,3));
		$RSS=($SBRUT*9)/100;
		$pdf->Text(5,$pdf->GetY()+5,"الضمان الاجتماعى");           $pdf->Text(80,195,round($RSS,3));
		$BASEIRG=$SBRUT-$RSS;
		$pdf->Text(5,$pdf->GetY()+5,"اساس خاضع للضريبة");         $pdf->Text(80,200,round($BASEIRG,0));
		$pdf->Text(5,$pdf->GetY()+5,"اقتطاع الضرائب على الاجر");   $pdf->Text(80,205,$pdf->BASEIRG($BASEIRG));
		//*************************************************//
		$IRGRSS=round($RSS,3)+$pdf->BASEIRG($BASEIRG);
		$pdf->Text(112,195,"الضمان الاجتماعى");          $pdf->Text(170,195,round($RSS,3));                      
		$pdf->Text(112,200,"اقتطاع الضرائب على الاجر");  $pdf->Text(170,200,$pdf->BASEIRG($BASEIRG));  
		$pdf->Text(112,220,"مجموع الاقتطاعات");           $pdf->Text(170,220,$IRGRSS);                   
		//*************************************************//
		$NET=$TOTAL-$IRGRSS;
		$pdf->Text(5,220,"الصافى للدفع");                $pdf->Text(80,220,round($NET,3));	
		//MANQUE FEMME 
		break;
		}
		 case '2' ://Infirmier breuvte
		{
		$pdf->SetFont('aefurat', '', 14);
		$pdf->Text(5,130,"الاجر القاعدى");              $pdf->Text(80,130,$_POST["SB"]);
		$pdf->Text(5,135,"تعويض الخبرة المهنية");         $pdf->Text(80,135,$_POST["IEP"]);
		$pdf->Text(5,140,"منحة جزافية تعويضية");       $pdf->Text(80,140,$_POST["IFC"]);
		$pdf->Text(5,145,"زيادة استدلالية منصب عالى");   $pdf->Text(80,145,$_POST["BIPS"]); 
		$pdf->Text(5,150,"التعويض عن العدوى");         $pdf->Text(80,150,$_POST["CONT1"]);
		$pdf->Text(5,155,"منحة الانتفاع");              $pdf->Text(80,155,$_POST["INT"]);      
		
		//MANQUE 
		$pdf->Text(5,$pdf->GetY()+5,"علاوة تحسين الاداء");            $pdf->Text(80,160,$_POST["PAPM"]); //servie chaque 03 mois ne figure pas dans la paie   
		$pdf->Text(5,$pdf->GetY()+5,"تعويض الالزام شبه طبي");       $pdf->Text(80,165,$_POST["IQUA"]);
		$pdf->Text(5,$pdf->GetY()+5,"تعويض التقنية"); 	         $pdf->Text(80,170,$_POST["IDOC"]);
		$pdf->Text(5,$pdf->GetY()+5,"تعويض دعم  نشاطات الصحة");   $pdf->Text(80,175,$_POST["ISAS"]);
		
		
		//********************************************************************************//
		$SBRUT=$_POST["SB"]+$_POST["IEP"]+$_POST["CONT1"]+$_POST["INT"]+$_POST["IFC"]+$_POST["BIPS"];
		$pdf->Text(5,$pdf->GetY()+5,"الراتب الخام");               $pdf->Text(80,180,$SBRUT);
		$pdf->Text(5,$pdf->GetY()+5,"منح عائلية");                $pdf->Text(80,185,$_POST["ALLF"]);
		$TOTAL=$SBRUT+$_POST["ALLF"];
		$pdf->Text(5,$pdf->GetY()+5,"المجموع");                     $pdf->Text(80,190,round($TOTAL,3));
		$RSS=($SBRUT*9)/100;
		$pdf->Text(5,$pdf->GetY()+5,"الضمان الاجتماعى");           $pdf->Text(80,195,round($RSS,3));
		$BASEIRG=$SBRUT-$RSS;
		$pdf->Text(5,$pdf->GetY()+5,"اساس خاضع للضريبة");         $pdf->Text(80,200,round($BASEIRG,0));
		$pdf->Text(5,$pdf->GetY()+5,"اقتطاع الضرائب على الاجر");   $pdf->Text(80,205,$pdf->BASEIRG($BASEIRG));
		//*************************************************//
		$IRGRSS=round($RSS,3)+$pdf->BASEIRG($BASEIRG);
		$pdf->Text(112,195,"الضمان الاجتماعى");          $pdf->Text(170,195,round($RSS,3));                      
		$pdf->Text(112,200,"اقتطاع الضرائب على الاجر");  $pdf->Text(170,200,$pdf->BASEIRG($BASEIRG));  
		$pdf->Text(112,220,"مجموع الاقتطاعات");           $pdf->Text(170,220,$IRGRSS);                   
		//*************************************************//
		$NET=$TOTAL-$IRGRSS;
		$pdf->Text(5,220,"الصافى للدفع");                $pdf->Text(80,220,round($NET,3));	
		//MANQUE FEMME 
		break;
		}
		 case '90' ://laborintin
		{
		$pdf->SetFont('aefurat', '', 14);
		$pdf->Text(5,130,"الاجر القاعدى");              $pdf->Text(80,130,$_POST["SB"]);
		$pdf->Text(5,135,"تعويض الخبرة المهنية");         $pdf->Text(80,135,$_POST["IEP"]);
		$pdf->Text(5,140,"منحة جزافية تعويضية");       $pdf->Text(80,140,$_POST["IFC"]);
		$pdf->Text(5,145,"زيادة استدلالية منصب عالى");   $pdf->Text(80,145,$_POST["BIPS"]); 
		$pdf->Text(5,150,"التعويض عن العدوى");         $pdf->Text(80,150,$_POST["CONT1"]);
		$pdf->Text(5,155,"منحة الانتفاع");              $pdf->Text(80,155,$_POST["INT"]);      
		
		//MANQUE 
		$pdf->Text(5,$pdf->GetY()+5,"علاوة تحسين الاداء");            $pdf->Text(80,160,$_POST["PAPM"]); //servie chaque 03 mois ne figure pas dans la paie   
		$pdf->Text(5,$pdf->GetY()+5,"تعويض الالزام شبه طبي");       $pdf->Text(80,165,$_POST["IQUA"]);
		$pdf->Text(5,$pdf->GetY()+5,"تعويض التقنية"); 	         $pdf->Text(80,170,$_POST["IDOC"]);
		$pdf->Text(5,$pdf->GetY()+5,"تعويض دعم  نشاطات الصحة");   $pdf->Text(80,175,$_POST["ISAS"]);
		
		
		//********************************************************************************//
		$SBRUT=$_POST["SB"]+$_POST["IEP"]+$_POST["CONT1"]+$_POST["INT"]+$_POST["IFC"]+$_POST["BIPS"];
		$pdf->Text(5,$pdf->GetY()+5,"الراتب الخام");               $pdf->Text(80,180,$SBRUT);
		$pdf->Text(5,$pdf->GetY()+5,"منح عائلية");                $pdf->Text(80,185,$_POST["ALLF"]);
		$TOTAL=$SBRUT+$_POST["ALLF"];
		$pdf->Text(5,$pdf->GetY()+5,"المجموع");                     $pdf->Text(80,190,round($TOTAL,3));
		$RSS=($SBRUT*9)/100;
		$pdf->Text(5,$pdf->GetY()+5,"الضمان الاجتماعى");           $pdf->Text(80,195,round($RSS,3));
		$BASEIRG=$SBRUT-$RSS;
		$pdf->Text(5,$pdf->GetY()+5,"اساس خاضع للضريبة");         $pdf->Text(80,200,round($BASEIRG,0));
		$pdf->Text(5,$pdf->GetY()+5,"اقتطاع الضرائب على الاجر");   $pdf->Text(80,205,$pdf->BASEIRG($BASEIRG));
		//*************************************************//
		$IRGRSS=round($RSS,3)+$pdf->BASEIRG($BASEIRG);
		$pdf->Text(112,195,"الضمان الاجتماعى");          $pdf->Text(170,195,round($RSS,3));                      
		$pdf->Text(112,200,"اقتطاع الضرائب على الاجر");  $pdf->Text(170,200,$pdf->BASEIRG($BASEIRG));  
		$pdf->Text(112,220,"مجموع الاقتطاعات");           $pdf->Text(170,220,$IRGRSS);                   
		//*************************************************//
		$NET=$TOTAL-$IRGRSS;
		$pdf->Text(5,220,"الصافى للدفع");                $pdf->Text(80,220,round($NET,3));	
		//MANQUE FEMME 
		break;
		}
				
}

$pdf->pied();
?>
