<?php 
$ndp=$_GET["uc"];$idg=$_GET["idg"];require_once('drh.php');$pdf = new drh('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('DECISION');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(250);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
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

$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,$pdf->repar,0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->mspar,0,0,'C');
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,$pdf->wilayaar,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,$pdf->dsparp,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"المؤسسة العمومية الاستشفائية عين وسارة",0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,"المديرية الفرعية للموارد البشرية",0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,'رقم : ............./م . م . ب /'.date("Y"),0,1,'R');$pdf->SetFont('aefurat', '', 16);
$pdf->setRTL(true);$pdf->SetFont('aefurat', '', 28);
$pdf->SetXY(6,$pdf->GetY()+8);$pdf->Cell(198,15,'مقـرر علاوات و تعويضات و منح ',0,1,'C',1,1);
$pdf->SetFont('aefurat', '', 14);
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
		
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى  المرسوم التنفيذي رقم 199-11 مؤرخ في 12 جمادي عام 1430 الموافق 24 مايو سنة 2011 " );
		$pdf->Text(21,$pdf->GetY()+8,"المؤسس للنظام التعويضي للموظفين المنتمين للأسلاك الممارسين المتخصصين في الصحة العمومية" );
		
		if($result1["N_grade"]==1){$pdf->Text(5,$pdf->GetY()+8,"نظرا لتعيين السيد (ة ) ".$result["Nomarab"]." ".$result["Prenom_Arabe"]." بتاريخ : ".$result["Date_Premier_Recrutement"] );}
		elseif($result1["N_grade"]==3){$pdf->Text(5,$pdf->GetY()+8,"نظرا لترقية السيد (ة) ".$result["Nomarab"]." ".$result["Prenom_Arabe"]." بتاريخ : ".$result1["D_grade"] );}  
		elseif($result1["N_grade"]==4){$pdf->Text(5,$pdf->GetY()+8,"نظرا لترقية السيد (ة) ".$result["Nomarab"]." ".$result["Prenom_Arabe"]." بتاريخ : ".$result1["D_grade"] );}
		
		break;
		}	   
case '2' ://generaliste medecin pharmacien dentiste ok
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم  393-09  مؤرخ في 24 نوفمبر سنة 2009 ,المتضمن القانون الأساسي   ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين لأسلاك الممارسين الطبيين العامين في الصحة العمومية");
		
		$pdf->Text(5,$pdf->GetY()+8,"بمقتضى : المرسوم التنفيذي رقم 188-11 المؤرخ في  2 جمادي الثانية عام 1432 الموافق 5 ماي 2011 " );
		$pdf->Text(21,$pdf->GetY()+8,"المؤسس للنظام التعويضي للموظفين المنتمين لأسلاك الممارسين الطبيين العامين في الصحة العمومية " );
		
		    if($result1["N_grade"]==5 or $result1["N_grade"]==8 or $result1["N_grade"]==11){$pdf->Text(5,$pdf->GetY()+8,"نظرا لتعيين السيد (ة ) ".$result["Nomarab"]." ".$result["Prenom_Arabe"]." بتاريخ : ".$result["Date_Premier_Recrutement"] );}
		elseif($result1["N_grade"]==6 or $result1["N_grade"]==9 or $result1["N_grade"]==12){$pdf->Text(5,$pdf->GetY()+8,"نظرا لترقية السيد (ة) ".$result["Nomarab"]." ".$result["Prenom_Arabe"]." بتاريخ : ".$result1["D_grade"] );}  
		elseif($result1["N_grade"]==7 or $result1["N_grade"]==10 or $result1["N_grade"]==13){$pdf->Text(5,$pdf->GetY()+8,"نظرا لترقية السيد (ة) ".$result["Nomarab"]." ".$result["Prenom_Arabe"]." بتاريخ : ".$result1["D_grade"] );}
		
		break;
		}	    	
case '3' ://paramedicale
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى :المرسوم التنفيذي رقم 121-11 مؤرخ في 20 مارس 2011 ,يتضمن القانون الأساسي  ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين لأسلاك شبه الطبيين للصحة العمومية .");
		
		$pdf->Text(5,$pdf->GetY()+8,"بمقتضى : المرسوم التنفيذي رقم 200-11 المؤرخ في 21 جمادي الثانية عام 1432 الموافق 24 ماي سنة 2011 " );
		$pdf->Text(21,$pdf->GetY()+8,"المؤسس للنظام التعويضي للموظفين المنتمين لأسلاك شبه الطبيين للصحة العمومية المتمم ." );
		
		//$pdf->Text(5,160," نظـــرا : للمرسوم التنفيذي رقم  194-13 المؤرخ في 20 ماي 2013 المتعلق بالتعويض عن خطر العدوى" );
		//$pdf->Text(25,170,"لفائدة مستخدمي المؤسسات العمومية التابعة لقطاع الصحة " );
		break;
		}        
case '4' ://psycholgue
		{
	    $pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 240-09 المؤرخ في 22 يوليو سنة 2009 ,المتضمن القانون للأساسي ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين لأسلاك النفسانيين للصحة العمومية ");
		
		$pdf->Text(5,$pdf->GetY()+8,"بمقتضى : المرسوم التنفيذي رقم 166-11 المؤرخ في 20 جمادي الأولى عام 1432 الموافق 24 أبريل سنة 2011 " );
		$pdf->Text(21,$pdf->GetY()+8," المؤسس للنظام التعويضي للموظفين المنتمين لأسلاك النفسانيين للصحة العمومية المتمم ." );
		
		break;
		}        				
case '5' ://sage femme
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 122-11 المؤرخ في 20 مارس سنة 2011 ,المتضمن القانون الأساسي  ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفات المنتميات لسلك القابلات في الصحة العمومية");
		
		$pdf->Text(5,$pdf->GetY()+8,"بمقتضى : المرسوم التنفيذي رقم 201-11 المؤرخ في 21 جمادي الثانية عام 1432 الموافق 24 ماي سنة 2011 " );
		$pdf->Text(21,$pdf->GetY()+8,"المؤسس للنظام التعويضي للموظفات المنتميات لسلك القابلات في الصحة العمومية " );
		
		break;
		}				
case '6' ://biologie
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 152-11 المؤرخ  في 3 ابريل سنة 2011  ,المتضمن القانون الأساسي  ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين لأسلاك البيولوجيين في الصحة العمومية ");
		
		$pdf->Text(5,$pdf->GetY()+8,"بمقتضى : المرسوم التنفيذي رقم 255-11 المؤرخ في 12 شعبان عام 1432 الموافق 14 يوليو سنة 2011 " );
		$pdf->Text(21,$pdf->GetY()+8,"المؤسس للنظام التعويضي للموظفين المنتمين لأسلاك البيولوجيين في الصحة العمومية " );
		
		break;
		}				
case '7' ://annesthesiste
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 235-11 المؤرخ في 3 يوليو سنة 2011 ، المتضمن القانون الأساسي  ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين لأسلاك الأعوان الطبيين في التخذير و لإنعاش للصحة العمومية");
		
		$pdf->Text(5,$pdf->GetY()+8,"بمقتضى : المرسوم التنفيذي رقم 289-11 المؤرخ في 15 رمضان عام 1432 الموافق 15 أوت سنة 2011 " );
		$pdf->Text(21,$pdf->GetY()+8,"المؤسس للنظام التعويضي للموظفين المنتمين لأسلاك الأعوان الطبيين في التخدير و الإنعاش " );
		$pdf->Text(21,$pdf->GetY()+8," للصحة العمومية المتمم ." );
		
		if($result1["N_grade"]==1){$pdf->Text(5,$pdf->GetY()+8,"نظرا لتعيين السيد (ة ) ".$result["Nomarab"]." ".$result["Prenom_Arabe"]." بتاريخ : ".$result["Date_Premier_Recrutement"] );}
		elseif($result1["N_grade"]==3){$pdf->Text(5,$pdf->GetY()+8,"نظرا لترقية السيد (ة) ".$result["Nomarab"]." ".$result["Prenom_Arabe"]." بتاريخ : ".$result1["D_grade"] );}  
		elseif($result1["N_grade"]==4){$pdf->Text(5,$pdf->GetY()+8,"نظرا لترقية السيد (ة) ".$result["Nomarab"]." ".$result["Prenom_Arabe"]." بتاريخ : ".$result1["D_grade"] );}
		
		break;
		}				
case '8' ://corps communs
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 04-08 مؤرخ في يناير سنة 2008 المتضمن القانون الأساسي  ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين للأسلاك المشتركة في المؤسسات و الإدارات العمومية ");
		
		$pdf->Text(5,$pdf->GetY()+8,"بمقتضى : المرسوم التنفيذي رقم 134-10 المؤرخ في 28 جمادي الأولى عام 1431 الموافق 13 ماي سنة 2010" );
		$pdf->Text(21,$pdf->GetY()+8,"المؤسس للنظام التعويضي للموظفين المنتمين للأسلاك المشتركة في المؤسسات و الإدارات " );
		$pdf->Text(21,$pdf->GetY()+8,"العمومية المتمم ." );
		
		break;
		}				
case '9' ://op
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 05-08 مؤرخ في 19 يناير سنة 2008 المتضمن القانون الأساسي  ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين للعمال المهنيين و سائقي السيارات و الحجاب  ");
		
		$pdf->Text(5,$pdf->GetY()+8,"بمقتضى : المرسوم التنفيذي رقم 135-10 المؤرخ في 28 جمادي الأولى عام 1431 الموافق 13 ماي سنة 2010 " );
		$pdf->Text(21,$pdf->GetY()+8,"المؤسس للنظام التعويضي للعمال المهنيين و سائقي السيارات و الحجاب المتمم ." );
		
		break;
		}				
case '10' ://phisi
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 178-10 المؤرخ في 8 يوليو سنة 2010 المتضمن القانون الأساسي ");
        $pdf->Text(25,$pdf->GetY()+8," الخاص بالموظفين المنتمين لسلك الفيزيائيين الطبيين في الصحة العمومية ");
		
		$pdf->Text(5,$pdf->GetY()+8,"" );
		$pdf->Text(21,$pdf->GetY()+8,"" );
		
		
		break;
		}				
case '11' :// ok 
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 126-08 المؤرخ في 19 ابريل سنة 2008 المتعلق بجهاز  ");
        $pdf->Text(25,$pdf->GetY()+8,"المساعدة على الإدماج المهني ");
		
		$pdf->Text(5,$pdf->GetY()+8,"" );
		$pdf->Text(21,$pdf->GetY()+8,"" );
		
		break;
		}				
case '12' ://
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم الرئاسي رقم 308-07 المؤرخ في 29  سبتمبر سنة 2007 المحدد لكيفيات توظيف");
        $pdf->Text(25,$pdf->GetY()+8," الأعوان المتعاقدين و حقوقهم وواجباتهم و العناصرالمشكلة لرواتبهم والقواعد المتعلقة ");
		$pdf->Text(25,$pdf->GetY()+8," بتسييرهم و كذا النظام التأديبي المطبق عليهم");
		
		$pdf->Text(5,$pdf->GetY()+8,"بمقتضى : المرسوم التنفيذ رقم 136-10 المؤرخ في 28 جمادي الأولى عام 1431 الموافق 13 ماي سنة 2010" );
		$pdf->Text(21,$pdf->GetY()+8,"المؤسس للظام التعويضي للأعوان المتعاقدين المتمم ." );
		
		break;
		}	
case '13' ://
		{
		$pdf->Text(5,$pdf->GetY()+8," بمقتضى : المرسوم التنفيذي رقم 161-09 المؤرخ في 02 ماي سنة 2009 ,المتضمن القانون الأساسي ");
        $pdf->Text(25,$pdf->GetY()+8,"الخاص بالموظفين المنتمين لسلك متصرفي مصالح الصحة");
		
		$pdf->Text(5,$pdf->GetY()+8,"بمقتضى : المرسوم التنفيذي رقم 99-11 المؤرخ في 28 ربيع الأول عام 1432 الموافق 3 مارس سنة 2011 " );
		$pdf->Text(21,$pdf->GetY()+8,"المؤسس للنظام التعويضي للموظفين المنتمين لسلك متصرفي مصالح الصحة المعدل و المتمم ." );
		
		break;
		}	
}
$pdf->SetFont('aefurat', '', 18);
$pdf->Text(90,$pdf->GetY()+8,"يقـــــرر");$pdf->SetFont('aefurat', '', 16);
$pdf->Text(5,$pdf->GetY()+8,"المادة الأولى  : (ت) يستفيد السيد (ة)  ".$result["Nomarab"]." ".$result["Prenom_Arabe"]);
if($result1["N_grade"]==1 or $result1["N_grade"]==3 or $result1["N_grade"]==4 )
{
	$pdf->Text(35,$pdf->GetY()+8,"بصفته (ها) ".$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"gradear")." في ".$pdf->nbrtostring("mvc","specialite","idspecialite",$result["FILIERE"],"specialitear"));
}
else
{
	$pdf->Text(35,$pdf->GetY()+8,"بصفته (ها) ".$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"gradear"));	
}
$pdf->Text(35,$pdf->GetY()+8,"من التعويضات التالية : ");
//**********************************************//
$pdf->SetFont('aefurat','I', 15);$pdf->SetTextColor(225,0,0);$pdf->SetTextColor(0,0,0);

switch($uc)
{
 case '1' ://specialiste
		{
		$pdf->SetXY(5,$pdf->GetY()+10);
		$pdf->Cell(30,8,'تعويض الإلزام',1,0,'C');
		$pdf->Cell(30,8,'تعويض التأهيل',1,0,'C');
		$pdf->Cell(30,8,'تعويض التوثيق',1,0,'C');
		$pdf->Cell(32,8,'تعويض التأطير ',1,0,'C');
		$pdf->Cell(30,8,'تاريخ الإستفادة',1,0,'C');
		$pdf->Cell(48,8,'ملاحظة',1,0,'C');
        $pdf->SetXY(5,$pdf->GetY()+8);
		$pdf->Cell(30,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND1").'%',1,0,'C');
		$pdf->Cell(30,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND2").'%',1,0,'C');
		$pdf->Cell(30,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND3").'دج',1,0,'C');
		$pdf->Cell(32,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND4").'%',1,0,'C');
		
		
		if($result1["N_grade"]==1)    {$pdf->Cell(30,8,$result["Date_Premier_Recrutement"],1,0,'C');}
		elseif($result1["N_grade"]==3){$pdf->Cell(30,8,$result1["D_grade"],1,0,'C');}  
		elseif($result1["N_grade"]==4){$pdf->Cell(30,8,$result1["D_grade"],1,0,'C');}
		
		$pdf->Cell(48,8,"",1,0,'C');

		break;
		}	   
case '2' ://generaliste medecin pharmacien dentiste
		{
        $pdf->SetXY(5,$pdf->GetY()+10);
		$pdf->Cell(35,8,'تعويض التأهيل',1,0,'C');
		$pdf->Cell(35,8,'تعويض التوثيق',1,0,'C');
		$pdf->Cell(59,8,'تعويض دعم نشاطات الصحة ',1,0,'C');
		$pdf->Cell(31,8,'تاريخ الإستفادة',1,0,'C');
		$pdf->Cell(40,8,'ملاحظة',1,0,'C');
        $pdf->SetXY(5,$pdf->GetY()+8); 
		$pdf->Cell(35,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND1").'%',1,0,'C');
		$pdf->Cell(35,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND2").'دج',1,0,'C');
		$pdf->Cell(59,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND3").'%',1,0,'C');
		
		
		    if($result1["N_grade"]==5 or $result1["N_grade"]==8 or $result1["N_grade"]==11){$pdf->Cell(31,8,$result["Date_Premier_Recrutement"],1,0,'C');}
		elseif($result1["N_grade"]==6 or $result1["N_grade"]==9 or $result1["N_grade"]==12){$pdf->Cell(31,8,$result1["D_grade"],1,0,'C');}  
		elseif($result1["N_grade"]==7 or $result1["N_grade"]==10 or $result1["N_grade"]==13){$pdf->Cell(31,8,$result1["D_grade"],1,0,'C');}
		
		
		$pdf->Cell(40,8,"",1,0,'C');
		

		break;
		}	    	
case '3' ://paramedicale
		{
		$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(48,8,'',1,0,'C');
        $pdf->SetXY(5,$pdf->GetY()+8); $pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,"",1,0,'C');$pdf->Cell(48,8,"",1,0,'C');

		break;
		}        
case '4' ://psycholgue
		{
		$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(48,8,'',1,0,'C');
        $pdf->SetXY(5,$pdf->GetY()+8); $pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,"",1,0,'C');$pdf->Cell(48,8,"",1,0,'C');

		break;
		}        				
case '5' ://sage femme
		{
		$pdf->SetXY(5,$pdf->GetY()+10);
		$pdf->Cell(30,8,'تعويض الإلزام لعلاجات التوليد و الصحة الإنجابية ',1,0,'C');
		$pdf->Cell(30,8,'تعويض دعم صحة الأم و الطفل ',1,0,'C');
		$pdf->Cell(30,8,'تعويض التقنية ',1,0,'C');
        $pdf->Cell(31,8,'تاريخ الإستفادة',1,0,'C');
		$pdf->Cell(40,8,'ملاحظة',1,0,'C');
        $pdf->SetXY(5,$pdf->GetY()+8); 
		$pdf->Cell(30,8,'',1,0,'C');
		$pdf->Cell(30,8,'',1,0,'C');
		$pdf->Cell(30,8,'',1,0,'C');
		$pdf->Cell(32,8,'',1,0,'C');
		$pdf->Cell(30,8,"",1,0,'C');
		$pdf->Cell(48,8,"",1,0,'C');
		break;
		}				
case '6' ://biologie
		{
		$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(48,8,'',1,0,'C');
        $pdf->SetXY(5,$pdf->GetY()+8); $pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,"",1,0,'C');$pdf->Cell(48,8,"",1,0,'C');

		break;
		}				
case '7' ://annesthesiste
		{
		$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(48,8,'',1,0,'C');
        $pdf->SetXY(5,$pdf->GetY()+8); $pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,"",1,0,'C');$pdf->Cell(48,8,"",1,0,'C');

		break;
		}				
case '8' ://corps communs
		{
		$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(48,8,'',1,0,'C');
        $pdf->SetXY(5,$pdf->GetY()+8); $pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,"",1,0,'C');$pdf->Cell(48,8,"",1,0,'C');

		break;
		}				
case '9' ://op
		{
		$pdf->SetXY(5,$pdf->GetY()+10);
		$pdf->Cell(30,8,'تعويض الضرر',1,0,'C');
		$pdf->Cell(30,8,'التعويض الجزافي عن الخدمة ',1,0,'C');
		$pdf->Cell(30,8,'تعويض دعم نشاطات الإدارة ',1,0,'C');
        $pdf->Cell(31,8,'تاريخ الإستفادة',1,0,'C');
		$pdf->Cell(40,8,'ملاحظة',1,0,'C');
        $pdf->SetXY(5,$pdf->GetY()+8); 
		$pdf->Cell(30,8,'',1,0,'C');
		$pdf->Cell(30,8,'',1,0,'C');
		$pdf->Cell(30,8,'',1,0,'C');
		$pdf->Cell(32,8,'',1,0,'C');
		$pdf->Cell(30,8,"",1,0,'C');
		$pdf->Cell(48,8,"",1,0,'C');

		break;
		}				
case '10' ://phisi
		{
		$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(48,8,'',1,0,'C');
        $pdf->SetXY(5,$pdf->GetY()+8); $pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,"",1,0,'C');$pdf->Cell(48,8,"",1,0,'C');

		break;
		}				
case '11' ://idmage
		{
		$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(48,8,'',1,0,'C');
        $pdf->SetXY(5,$pdf->GetY()+8); $pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,"",1,0,'C');$pdf->Cell(48,8,"",1,0,'C');

		break;
		}				
case '12' ://idmage
		{
		$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(48,8,'',1,0,'C');
        $pdf->SetXY(5,$pdf->GetY()+8); $pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(30,8,'',1,0,'C');$pdf->Cell(32,8,'',1,0,'C');$pdf->Cell(30,8,"",1,0,'C');$pdf->Cell(48,8,"",1,0,'C');

		break;
		}	
case '13' ://ميمي
		{
		$pdf->SetXY(5,$pdf->GetY()+10);
		$pdf->Cell(74,8,'تعويض مصالح الدعم لنشاطات الصحة ',1,0,'C');
		$pdf->Cell(55,8,'تعويض تسيير مصالح الصحة ',1,0,'C');
		$pdf->Cell(31,8,'تاريخ الإستفادة',1,0,'C');
		$pdf->Cell(40,8,'ملاحظة',1,0,'C');
        $pdf->SetXY(5,$pdf->GetY()+8); 
		$pdf->Cell(74,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND1").'%',1,0,'C');
		$pdf->Cell(55,8,$pdf->nbrtostring("mvc","grade","idg",$result1["N_grade"],"IND2").'%',1,0,'C');
		
		if($result1["N_grade"]==158)    {$pdf->Cell(31,8,$result["Date_Premier_Recrutement"],1,0,'C');}
		elseif($result1["N_grade"]==159){$pdf->Cell(31,8,$result1["D_grade"],1,0,'C');}  
		elseif($result1["N_grade"]==160){$pdf->Cell(31,8,$result1["D_grade"],1,0,'C');}
		elseif($result1["N_grade"]==161){$pdf->Cell(31,8,$result1["D_grade"],1,0,'C');}
		
		$pdf->Cell(40,8,'',1,0,'C');
		break;
		}	
}

$pdf->Text(5,$pdf->GetY()+13,"المادة الثانية :تكلف السيدة المديرة الفرعية للموارد البشرية و امين خزينة المؤسسة العمومية ");
$pdf->Text(25,$pdf->GetY()+8,"الإستشفائية بعين وسارة بتنفيذ هذا المقرر.");
$pdf->Text(140,$pdf->GetY()+8," عين وسارة في :  ");
$pdf->Text(150,$pdf->GetY()+8,"  المدير");
$pdf->SetFont('aefurat','I', 17);
$pdf->SetTextColor(225,0,0);
$pdf->Output('indemnite_ar.pdf','I');
?>