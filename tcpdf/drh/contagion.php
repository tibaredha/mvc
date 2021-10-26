<?php 
$ndp=$_GET["uc"];$idg=$_GET["idg"];require_once('drh.php');$pdf = new drh('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf-> mysqlconnect(); 
$sql = "SELECT * FROM grh WHERE  idp = '".$ndp."' "; 
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
$result = mysql_fetch_array( $requete ); 
mysql_free_result($requete);

//******************************************************//
$sql1 = "SELECT * FROM reggrade WHERE  id = '".$idg."' "; 
$requete1 = @mysql_query($sql1) or die($sql1."<br>".mysql_error()) ;
$result1 = mysql_fetch_array( $requete1 ); 
mysql_free_result($requete1);

$pdf->ENTETEDRH('مقـرر التعويض عن خطر العدوى'," _____",date("Y")); 
$pdf->SetXY(15,$pdf->GetY()+8);$pdf->Cell(180,8,"إن مدير المؤسسة العمومية الإستشفائية بعين وسارة  ",0,1,'C');
$pdf->Text(5,$pdf->GetY()+8,"بمقتضى : الأمر رقم 03-06 المؤرخ في 15 يوليو سنة 2006 المتضمن القانون الأساسي العام  ");
$pdf->Text(25,$pdf->GetY()+8,"للوظيفة العمومية .");
$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 140-07 المؤرخ في 19 ماي سنة 2007 المتضمن إنشاء المؤسسات ");
$pdf->Text(25,$pdf->GetY()+8,"العمومية الإستشفائية و المؤسسات العمومية للصحة الجوارية و تنظيمها و سيرها.");
$uc=$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"ids");
switch($uc)
{
 case '1' ://specialiste ok
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 394-09  مؤرخ في 24 نوفمبر 2009 ,المتضمن القانون الأساسي   ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين لأسلاك الممارسين الطبيين المختصين  في الصحة العمومية");
		break;
		}	   
case '2' ://generaliste medecin pharmacien dentiste ok
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم  393-09  مؤرخ في 24 نوفمبر سنة 2009 ,المتضمن القانون الأساسي   ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين لأسلاك الممارسين الطبيين العامين في الصحة العمومية");
		break;
		}	    	
case '3' ://paramedicale
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى :المرسوم التنفيذي رقم 121-11 مؤرخ في 20 مارس 2011 ,يتضمن القانون الأساسي  ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين لأسلاك شبه الطبيين للصحة العمومية .");
		break;
		}        
case '4' ://psycholgue
		{
	    $pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 240-09 المؤرخ في 22 يوليو سنة 2009 ,المتضمن القانون للأساسي ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين لأسلاك النفسانيين للصحة العمومية ");
		break;
		}        				
case '5' ://sage femme
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 122-11 المؤرخ في 20 مارس سنة 2011 ,المتضمن القانون الأساسي  ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفات المنتميات لسلك القابلات في الصحة العمومية");
		break;
		}				
case '6' ://biologie
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 152-11 المؤرخ  في 3 ابريل سنة 2011  ,المتضمن القانون الأساسي  ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين لأسلاك البيولوجيين في الصحة العمومية ");
		break;
		}				
case '7' ://annesthesiste
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 235-11 المؤرخ في 3 يوليو سنة 2011 ، المتضمن القانون الأساسي  ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين لأسلاك الأعوان الطبيين في التخذير و لإنعاش للصحة العمومية");
		break;
		}				
case '8' ://corps communs
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 04-08 مؤرخ في يناير سنة 2008 المتضمن القانون الأساسي  ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين للأسلاك المشتركة في المؤسسات و الإدارات العمومية ");
		break;
		}				
case '9' ://op
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 05-08 مؤرخ في 19 يناير سنة 2008 المتضمن القانون الأساسي  ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين للعمال المهنيين و سائقي السيارات و الحجاب  ");
		break;
		}				
case '10' ://phisi
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 178-10 المؤرخ في 8 يوليو سنة 2010 المتضمن القانون الأساسي ");
        $pdf->Text(25,$pdf->GetY()+8," الخاص بالموظفين المنتمين لسلك الفيزيائيين الطبيين في الصحة العمومية ");
		break;
		}				
case '11' :// ok 
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 126-08 المؤرخ في 19 ابريل سنة 2008 المتعلق بجهاز  ");
        $pdf->Text(25,$pdf->GetY()+8,"المساعدة على الإدماج المهني ");
		break;
		}				
case '12' ://
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم الرئاسي رقم 308-07 المؤرخ في 29  سبتمبر سنة 2007 المحدد لكيفيات توظيف");
        $pdf->Text(25,$pdf->GetY()+8," الأعوان المتعاقدين و حقوقهم وواجباتهم و العناصرالمشكلة لرواتبهم والقواعد المتعلقة ");
		$pdf->Text(25,$pdf->GetY()+8," بتسييرهم و كذا النظام التأديبي المطبق عليهم");
		break;
		}	
case '13' ://
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 161-09 المؤرخ في 02 ماي سنة 2009 ,المتضمن القانون الأساسي ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين لسلك متصرفي مصالح الصحة");
		break;
		}	
}
$pdf->Text(5,$pdf->GetY()+8," نظـــرا : للمرسوم التنفيذي رقم  194-13 المؤرخ في 20 ماي 2013 المتعلق بالتعويض عن خطر العدوى" );
$pdf->Text(25,$pdf->GetY()+8,"لفائدة مستخدمي المؤسسات العمومية التابعة لقطاع الصحة " );


$pdf->SetFont('aefurat', '', 18);
$pdf->Text(90,$pdf->GetY()+8,"يقـــــرر");$pdf->SetFont('aefurat', '', 14);
$pdf->Text(5,$pdf->GetY()+8,"المادة الأولى  : (ت) يستفيد السيد (ة)  ".$result["Nomarab"]." ".$result["Prenom_Arabe"]);
if($result1["N_grade"]==1 or $result1["N_grade"]==3 or $result1["N_grade"]==4 )
{
	$pdf->Text(35,$pdf->GetY()+8,"بصفته (ها) ".$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"gradear")." في ".$pdf->nbrtostring("mvc","specialite","idspecialite",$result["FILIERE"],"specialitear"));
}
else
{
	$pdf->Text(35,$pdf->GetY()+8,"بصفته (ها) ".$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"gradear"));	
}
$pdf->Text(35,$pdf->GetY()+8,"من التعويض عن خطر العدوى المقدر بـ"." 000 "." إبتداء من"." 0000-00-00 ");
//**********************************************//
$pdf->SetFont('aefurat','I', 14);$pdf->SetTextColor(225,0,0);$pdf->SetTextColor(0,0,0);

switch($uc)
{
 case '1' ://specialiste
		{
		// $pdf->SetXY(5,$pdf->GetY()+10);
		// $pdf->Cell(30,8,'تعويض الإلزام',1,0,'C');
		// $pdf->Cell(30,8,'تعويض التأهيل',1,0,'C');
		// $pdf->Cell(30,8,'تعويض التوثيق',1,0,'C');
		// $pdf->Cell(32,8,'تعويض التأطير ',1,0,'C');
		// $pdf->Cell(30,8,'تاريخ الإستفادة',1,0,'C');
		// $pdf->Cell(48,8,'ملاحظة',1,0,'C');
        // $pdf->SetXY(5,$pdf->GetY()+8);
		// $pdf->Cell(30,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND1").'%',1,0,'C');
		// $pdf->Cell(30,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND2").'%',1,0,'C');
		// $pdf->Cell(30,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND3").'دج',1,0,'C');
		// $pdf->Cell(32,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND4").'%',1,0,'C');
		
		
		// if($result1["N_grade"]==1)    {$pdf->Cell(30,8,$result["Date_Premier_Recrutement"],1,0,'C');}
		// elseif($result1["N_grade"]==3){$pdf->Cell(30,8,$result1["D_grade"],1,0,'C');}  
		// elseif($result1["N_grade"]==4){$pdf->Cell(30,8,$result1["D_grade"],1,0,'C');}
		
		// $pdf->Cell(48,8,"***",1,0,'C');

		break;
		}	   
case '2' ://generaliste medecin pharmacien dentiste
		{
        // $pdf->SetXY(5,$pdf->GetY()+10);
		// $pdf->Cell(35,8,'تعويض التأهيل',1,0,'C');
		// $pdf->Cell(35,8,'تعويض التوثيق',1,0,'C');
		// $pdf->Cell(59,8,'تعويض دعم نشاطات الصحة ',1,0,'C');
		// $pdf->Cell(31,8,'تاريخ الإستفادة',1,0,'C');
		// $pdf->Cell(40,8,'ملاحظة',1,0,'C');
        // $pdf->SetXY(5,$pdf->GetY()+8); 
		// $pdf->Cell(35,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND1").'%',1,0,'C');
		// $pdf->Cell(35,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND2").'دج',1,0,'C');
		// $pdf->Cell(59,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND3").'%',1,0,'C');
		
		
		    // if($result1["N_grade"]==5 or $result1["N_grade"]==8 or $result1["N_grade"]==11){$pdf->Cell(31,8,$result["Date_Premier_Recrutement"],1,0,'C');}
		// elseif($result1["N_grade"]==6 or $result1["N_grade"]==9 or $result1["N_grade"]==12){$pdf->Cell(31,8,$result1["D_grade"],1,0,'C');}  
		// elseif($result1["N_grade"]==7 or $result1["N_grade"]==10 or $result1["N_grade"]==13){$pdf->Cell(31,8,$result1["D_grade"],1,0,'C');}
		
		
		// $pdf->Cell(40,8,"***",1,0,'C');
		

		break;
		}	    	
case '3' ://paramedicale
		{
		// $pdf->SetXY(5,$pdf->GetY()+10);
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,'تاريخ الإستفادة',1,0,'C');
		// $pdf->Cell(48,8,'ملاحظة',1,0,'C');
        // $pdf->SetXY(5,$pdf->GetY()+8); 
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,"",1,0,'C');
		// $pdf->Cell(48,8,"***",1,0,'C');

		break;
		}        
case '4' ://psycholgue
		{
		// $pdf->SetXY(5,$pdf->GetY()+10);
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,'تاريخ الإستفادة',1,0,'C');
		// $pdf->Cell(48,8,'ملاحظة',1,0,'C');
        // $pdf->SetXY(5,$pdf->GetY()+8); 
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,"",1,0,'C');
		// $pdf->Cell(48,8,"***",1,0,'C');

		break;
		}        				
case '5' ://sage femme
		{
		// $pdf->SetXY(5,$pdf->GetY()+10);
		// $pdf->Cell(30,8,'تعويض الإلزام لعلاجات التوليد و الصحة الإنجابية ',1,0,'C');
		// $pdf->Cell(30,8,'تعويض دعم صحة الأم و الطفل ',1,0,'C');
		// $pdf->Cell(30,8,'تعويض التقنية ',1,0,'C');
        // $pdf->Cell(31,8,'تاريخ الإستفادة',1,0,'C');
		// $pdf->Cell(40,8,'ملاحظة',1,0,'C');
        // $pdf->SetXY(5,$pdf->GetY()+8); 
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,"",1,0,'C');
		// $pdf->Cell(48,8,"***",1,0,'C');
		break;
		}				
case '6' ://biologie
		{
		// $pdf->SetXY(5,$pdf->GetY()+10);
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,'تاريخ الإستفادة',1,0,'C');
		// $pdf->Cell(48,8,'ملاحظة',1,0,'C');
        // $pdf->SetXY(5,$pdf->GetY()+8); 
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,"",1,0,'C');
		// $pdf->Cell(48,8,"***",1,0,'C');

		break;
		}				
case '7' ://annesthesiste
		{
		// $pdf->SetXY(5,$pdf->GetY()+10);
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,'تاريخ الإستفادة',1,0,'C');
		// $pdf->Cell(48,8,'ملاحظة',1,0,'C');
        // $pdf->SetXY(5,$pdf->GetY()+8); 
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,"",1,0,'C');
		// $pdf->Cell(48,8,"***",1,0,'C');

		break;
		}				
case '8' ://corps communs
		{
		// $pdf->SetXY(5,$pdf->GetY()+10);
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,'تاريخ الإستفادة',1,0,'C');
		// $pdf->Cell(48,8,'ملاحظة',1,0,'C');
        // $pdf->SetXY(5,$pdf->GetY()+8); 
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,"",1,0,'C');
		// $pdf->Cell(48,8,"***",1,0,'C');

		break;
		}				
case '9' ://op
		{
		// $pdf->SetXY(5,$pdf->GetY()+10);
		// $pdf->Cell(30,8,'تعويض الضرر',1,0,'C');
		// $pdf->Cell(30,8,'التعويض الجزافي عن الخدمة ',1,0,'C');
		// $pdf->Cell(30,8,'تعويض دعم نشاطات الإدارة ',1,0,'C');
        // $pdf->Cell(31,8,'تاريخ الإستفادة',1,0,'C');
		// $pdf->Cell(40,8,'ملاحظة',1,0,'C');
        // $pdf->SetXY(5,$pdf->GetY()+8); 
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,"",1,0,'C');
		// $pdf->Cell(48,8,"***",1,0,'C');

		break;
		}				
case '10' ://phisi
		{
		// $pdf->SetXY(5,$pdf->GetY()+10);
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,'تاريخ الإستفادة',1,0,'C');
		// $pdf->Cell(48,8,'ملاحظة',1,0,'C');
        // $pdf->SetXY(5,$pdf->GetY()+8); 
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,"",1,0,'C');
		// $pdf->Cell(48,8,"***",1,0,'C');

		break;
		}				
case '11' ://idmage
		{
		// $pdf->SetXY(5,$pdf->GetY()+10);
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,'تاريخ الإستفادة',1,0,'C');
		// $pdf->Cell(48,8,'ملاحظة',1,0,'C');
        // $pdf->SetXY(5,$pdf->GetY()+8); 
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,"",1,0,'C');
		// $pdf->Cell(48,8,"***",1,0,'C');

		break;
		}				
case '12' ://idmage
		{
		// $pdf->SetXY(5,$pdf->GetY()+10);
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,'تاريخ الإستفادة',1,0,'C');
		// $pdf->Cell(48,8,'ملاحظة',1,0,'C');
        // $pdf->SetXY(5,$pdf->GetY()+8);
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(30,8,'',1,0,'C');
		// $pdf->Cell(32,8,'',1,0,'C');
		// $pdf->Cell(30,8,"",1,0,'C');
		// $pdf->Cell(48,8,"***",1,0,'C');

		break;
		}	
case '13' ://ميمي
		{
		// $pdf->SetXY(5,$pdf->GetY()+10);
		// $pdf->Cell(74,8,'تعويض مصالح الدعم لنشاطات الصحة ',1,0,'C');
		// $pdf->Cell(55,8,'تعويض تسيير مصالح الصحة ',1,0,'C');
		// $pdf->Cell(31,8,'تاريخ الإستفادة',1,0,'C');
		// $pdf->Cell(40,8,'ملاحظة',1,0,'C');
        // $pdf->SetXY(5,$pdf->GetY()+8); 
		// $pdf->Cell(74,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND1").'%',1,0,'C');
		// $pdf->Cell(55,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND2").'%',1,0,'C');
		
		// if($result1["N_grade"]==158)    {$pdf->Cell(31,8,$result["Date_Premier_Recrutement"],1,0,'C');}
		// elseif($result1["N_grade"]==159){$pdf->Cell(31,8,$result1["D_grade"],1,0,'C');}  
		// elseif($result1["N_grade"]==160){$pdf->Cell(31,8,$result1["D_grade"],1,0,'C');}
		// elseif($result1["N_grade"]==161){$pdf->Cell(31,8,$result1["D_grade"],1,0,'C');}
		
		// $pdf->Cell(40,8,'***',1,0,'C');
		break;
		}	
}

$pdf->Text(5,$pdf->GetY()+13,"المادة الثانية :تكلف السيدة المديرة الفرعية للموارد البشرية و امين خزينة المؤسسة العمومية ");
$pdf->Text(25,$pdf->GetY()+8,"الإستشفائية بعين وسارة بتنفيذ هذا المقرر.");
$pdf->Text(140,$pdf->GetY()+8," عين وسارة في :  ");
$pdf->Text(150,$pdf->GetY()+8,"  المدير");
$pdf->Output('indemnite_ar.pdf','I');
?>
