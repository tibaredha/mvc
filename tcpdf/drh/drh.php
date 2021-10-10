<?php
require('../TCPDF.php');
//require('../../TCPDF.php'); dans le cas ou chaque dossier contient un module
class drh extends TCPDF
{ 
    public $db_host="localhost";
	public $db_name="mvc"; 
    public $db_user="root";
    public $db_pass="";//
	
	public $repar="الجمـهوريـــة الجزائرية الديمقراطية الشعبيــــــــة";
	public $repfr="République algérienne démocratique et populaire";
	
	public $mspar="وزارة الصحــــــــة ";
	public $mspfr="Ministère de la santé";

	public $dspfr="Direction de la santé et de la population de la wilaya de Djelfa";
	public $dspar="مـديريــــــة الصحــــة و الســـــكان لولايـــــة الجلفــــــة";
	
	public $wilayaar = "ولايــــــــة الجلفـــــــــة";
	public $dsparp   = "مـديريــــــة الصحة و السكان";
	public $dssar    = "مصلحة الهياكل و النشاط الصحي";
	public $ledspar  = "إن مدير الصحة و السكان لولاية الجلفة";
	public $directeur  = "السيد مدير جامعة ";
	public $directeur_p  = "السيد مدير المعهد التكوين الشبه الطبي ";
	public $loi85_05 = "- بمقتضى القانون 05-85 المؤرخ في 1985/02/16 المتعلق بحماية الصحة و ترقيتها المعدل و المتمم .";
	public $loi18_11 = "- بمقتضى القانون رقم 11-18 المؤرخ في 2018/07/02 المتعلق بالصحة المعدل و المتمم.";
	
	public $loi12_07 = "- بمقتضى القانون 07-12 المؤرخ في 21 فبراير 2012 المتعلق بالولاية";
	
	
	public $decret92_276 = "- بمقتضى المرسوم التنفيدي رقم 276-92 المؤرخ في 1992/07/06 المتعلق بمدونة اخلاقيات الطب .";
	public $decret97_261 = "- بمقتضى المرسوم التنفيدي رقم 261-97 المؤرخ في 1997/07/14 المحدد للقواعد الخاصة بتنظيم مديرية الصحة و السكان ";
	
	//*pharmacie*//
	public $arrete52_95 = "- بمقتضى القرار رقم 52 المؤرخ في 1995/07/10 المحدد لقائمة الادوية المرخصة بيعها في الصيدليات ";
	public $arrete58_95 = "- بمقتضى القرار رقم 58 المؤرخ في 1995/07/23 المحدد لقواعد الممارسة الحسنة للتحضير على مستوى الصيدليات";
	public $arrete67_96 = "- بمقتضى القرار رقم 67 المؤرخ في 1996/07/09 المحدد لشروط الممارسة الذاتية لمهنة الصيدلي على مستوى الصيدلية";
	public $arrete110_96 = "- بمقتضى القرار رقم 110 و. ص. س  المؤرخ في 1996/11/27 المحدد لشروط تنصيب فتح و تحويل صيدلية خاصة";
	public $cm03_05 = "- بناء على المنشور الوزاري رقم 03 م. ص المؤرخ قي 2005/11/05 المتعلق بامكانية فتح صيدليات على مستوى المناطق المعزولة";
	public $pvconformite = "- بناء على محضر المطابقة الخاص بالمحل  للصيدلية المؤرخ في ";
	public $diplome = "- بناء على شهادة النجاح في الصيدلة بتاريخ ";
	public $diplome17 = "- بناء على شهادة النجاح في الطب العام بتاريخ  ";
	public $diplome15 = "- بناء على شهادة النجاح في جراحة الاسنان بتاريخ ";
	public $diplome16 = "- و بعد الإطلاع على الشهادة (المؤقتة) للدراسات الطبية المتخصصة ";
	
	public $ordre = "- بناء على شهادة التسجيل بمجلس اخلاقيات المهنة للصيدلة رقم ";
	//*dentiste*//
	public $instruction112_90   = "- بمقتضى التعليمة الوزارية للصحة رقم 112 المؤرخة في 1987/03/02 المتعلقة بأحكام تنصيب جراحو الأسنان ";
	public $instruction112_87_m = "- بمقتضى التعليمة الوزارية رقم 112 المؤرخة في 1987/03/02 المتعلقة بأحكام تنصيب الممارسين الطبيين العامين و المتخصصين";
	public $instruction06_98 = "- بمقتضى التعليمة الوزارية رقم 06 المؤرخة في 1998/06/28 المتعلقة بتشغيل الشبه الطبيين في الهياكل الصحية الخاصة";
	
	public $instruction01_99 = "- بمقتضى التعليمة الوزارية للصحة رقم 01 المؤرخة في 1999/01/20 المتعلقة بالممارسة الحرة لمهن الصحة ";
	public $ordre15 = "- بناء على شهادة التسجيل بمجلس اخلاقيات المهنة لجراحة الأسنان رقم  ";
	public $ordre17 = "- بناء على شهادة التسجيل بمجلس اخلاقيات المهنة للطب العام رقم  ";
	
	public $proposition = "بإقتراح من السيد رئيس مصلحة الهياكل و النشاط الصحي  ";
	public $article1 = "المادة الأولى : يرخص للسيد(ة) ";
	public $article1f = "المادة الأولى : تغلق العيادة الطبية للسيد ( ة ) : ";
	public $article2 = "المادة 02 : لايمكن تحويل اي مقر صيدلية دون استشارة مصالح مديرية الصحة و السكان";
	public $article2bis = " المادة 02 : للمعني (ة) مدة تسعون يوما لإيداع طلب فتح الصيدلية لدى مصالح الصحة و السكان";
	public $article2f = "المادة 02 : لايمكن تحويل اي مقر صيدلية دون استشارة مصالح مديرية الصحة و السكان";
	public $article2m = 'المادة 02 : لايمكن تحويل اي مقر  للعيادة دون استشارة مصالح مديرية الصحة و السكان';
	public $article3 = "المادة 03 :  يسري مفعول هذه المقررة ابتداء من تاريخ إمضائها";
	public $article4 = "المادة 04 : يكلف كل من السادة مدير المؤسسة العمومية للصحة الجوارية و مدير صندوق الضمان الإجتماعي بتنفيذ هذه المقررة .";
	
	public $instruction04_2013 = "- بمقتضى التعليمة الوزارية رقم 04 المؤرخة في 2013/07/22 المتعلقة بكيفيات فتح  تحويل غلق  عيادات الفحص و العلاج ";
	public $instruction10_2018 = "- بمقتضى التعليمة الوزارية رقم 10 المؤرخة في 2018/06/09 المتعلقة بتنصيب الممارسين الاخصائين الخواص";
	//public $avisfavorable="- وبعد الاطلاع على راي الموافقة الصادر عن اللجنة المركزية المكلفة بدراسة طلبات تنصيب الممارسين الاخصائين";
	public $avisfavorable="- وبعد الاطلاع على راي الموافقة الصادر عن اللجنة الولائية المكلفة بدراسة طلبات تنصيب الممارسين الاخصائين";
	public $servicecivile ="- وبعد الاطلاع على شهادة الابراء من التزمات الخدمة المدنية الصادرة عن ";
	public $diplome160 = "- بناء على الشهادة المؤقتة للدراسات الطبية المتخصصة بتاريخ  ";
	public $diplome161 = "- بناء على شهادة النجاح في الدراسات الطبية المتخصصة بتاريخ  ";
	public $ordre16 = "- بناء على شهادة التسجيل بمجلس اخلاقيات المهنة لللاطباء الاخصائين رقم  ";
	public $circulaire10_2018 = "- بمقتضى التعليمة الوزارية رقم 10 / و .ص. س .ا . م / ا ع المؤرخة في 09 جوان 2018 و المتعلقة بتنصيب الممارسين الاخصائيين الخواص";
	
	public $decision39_98 = "- بمقتضى القرار رقم 39  و. ص. س المؤرخ في 1998/09/15 الخاص بتنظيم النقل الصحي . ";
	public $circulaire03_99 = "- بمقتضى المنشور رقم 03 و. ص. س المؤرخ في 1999/12/25 المتضمن الإجراءات المتعلقة بتسليم مقررات الإنجاز و الفتح ";
	public $circulaire03_99_0 = " لمؤسسات النقل الصحي .";
	
	public $note_00_2006 = "- بمقتضى المذكرة المؤرخة في 2006/06/21 المتعلقة بملف إنجاز وحدة النقل الصحي .";
	public $note_01_2006 = "- بمقتضى المذكرة رقم 01 المؤرخة في 2006/09/05 المتعلقة بمحضر المطابقة للنقل الصحي .";
	public $note_01_2008 = "- بمقتضى المذكرة رقم 01 و. ص. س المؤرخة في 2008/06/18 المتعلقة بالمقاييس التقنية لسيارات الإسعاف صنف ب . ";
	public $note_06_2013 = "- بمقتضى المذكرة رقم 06 و. ص. س المؤرخة في 2013/08/05 المتعلقة بإجراءات تسليم مقررات إنجاز و فتح مؤسسات النقل الصحي .";
	
	function ANNEEFR($DATEINS) {
			$A      = substr($DATEINS,6,2); 
			$ANNEE  = array("treize","quatorze","quinze","seize","dix-sept","dix-huit ","dix-neuf","vingt","vingt et un ","vingt et deux","vingt -trois");
			$ANNEE1 =  $ANNEE[ $A - 12] ;
			$DATEPV=$ANNEE1;
			return $DATEPV;
		}
	 function MOISFR($DATEINS) {             
			$M      = substr($DATEINS,3,2);   
			$MOIS = array("", "janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "october", "novombre", "decembre");
			$MOIS1 =  $MOIS[ $M-0 ] ;
			$DATEPV=$MOIS1;
			return $DATEPV;
		}		
	function JOURFR($DATEINS) {
			$J      = substr($DATEINS,0,2);                  
			$JOURS = array("premier","deux","trois","quatre","cinq","six","sept","huit","neuf","dix","onze","douze","treize","quatorze","quinze","seize","dix-sept","dix-huit ","dix-neuf ","vingt","vingt et un","vingt et deux","vingt -trois","vingt -quatre"," vingt -cinq ","vingt -six"," vingt -sept ","vingt -huit ","vingt -neuf"," trente "," trente et un ");
			$JOURS1 = $JOURS[$J-1] ;
			$DATEPV=$JOURS1;
			return $DATEPV;
		}	
	//*************************************************************************************************************//
	function entete_drh($y)
	{
		$this->SetLineWidth(0.4);$this->SetFont('aefurat', 'B', 16);
		$this->Rect(5, 5, 200, 285 ,'D');$this->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->repar,0,0,'C');
		$this->SetXY(5,$this->GetY()+8);$this->Cell(200,5,$this->mspar,0,0,'C');
		$this->SetFont('aefurat', '', 14);
		//$this->SetXY(5,$this->GetY()+10);$this->Cell(200,5,$this->wilayaar,0,0,'R');
		$this->SetXY(5,$this->GetY()+8);$this->Cell(200,5,$this->dsparp." لولاية الجلفة",0,0,'R');
		$this->SetXY(5,$this->GetY()+8);$this->Cell(200,5,"المؤسسة العمومية الاستشفائية عين وســـارة",0,0,'R');
		//$this->SetXY(5,$this->GetY()+8);$this->Cell(200,5,"المديرية الفرعية للموارد البشرية",0,0,'R');
		$this->SetXY(5,$this->GetY()+8);$this->Cell(200,5,'رقم : .................../'.date("Y"),0,1,'R');
	}
	function decision_drh($y)
	{
		$this->Text(55,$this->GetY()+$y,"باقتراح من السيدة المديرة الفرعية للموارد البشرية ");                
		$this->Text(90,$this->GetY()+$y,"يقـــــرر");	
	}
	function foot_drh($y)
	{
		$this->Text(5,$this->GetY()+$y,"المادة الثانية :تكـلف كل من السيدة المديرة الفرعية للموارد البشرية  و أمين الخزينة  ما بين البلديات لعين وسارة  ");
		$this->Text(30,$this->GetY()+$y,"كل حسب اختصاصه بتنفيـذ هـذا المقرر.");
		$this->Text(140,$this->GetY()+$y,"حرر بعين وسارة في : ");
		$this->Text(150,$this->GetY()+$y,"  المدير");
	}
	function htiat($titre,$grade,$y)
	{
		$this->setRTL(true);
		$this->SetFont('aefurat', '', 28);$this->SetXY(45,$this->GetY()+$y-5);$this->Cell(120,15,$titre,0,1,'C',1,1);$this->SetFont('aefurat', '', 13);
		$this->Text(5,$this->GetY()+5,"إن مدير المؤسسة العمومية الإستشفائية بعين وسارة");
		$this->Text(10,$this->GetY()+$y,"- بمقتضى : الأمر رقم 03-06 المؤرخ في 15 يوليو سنة 2006 المتضمن القانون الأساسي العام  للوظيفة العمومية");
		$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم الرئاسي رقم 304-07 المؤرخ في 17 رمضان عام 1428 الموافق 29 سبتمبر سنة 2007");
		$this->Text(5,$this->GetY()+$y,"الذي يحدد الشبكة الاستدلالية لمرتبات الموظفين و نظام دفع رواتبهم .");
		$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم التنفيذي رقم 99-90 المؤرخ في أول رمضان عام 1410 الموافق 27 مارس سنة 1990");
		$this->Text(5,$this->GetY()+$y,"المتعلق  بسلطة التعيين و التسيير الإداري ,بالنسبة للموظفين و أعوان الإدارة المركزية و الولايات");
		$this->Text(5,$this->GetY()+$y,"و البلديات و المؤسسات العمومية ذات الطابع الإداري .");
		$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم التنفيذي رقم 140-07 المؤرخ في 19 ماي سنة 2007 المتضمن إنشاء المؤسسات");
		$this->Text(5,$this->GetY()+$y,"العمومية الإستشفائية و المؤسسات العمومية للصحة الجوارية و تنظيمها و سيرها.");
		$uc=$this->nbrtostring("mvc","grade","idg",$grade,"ids");
		switch($uc)
		{
		 case '1' ://specialiste
				{
				$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم التنفيذي رقم 394-09  مؤرخ في 24 نوفمبر 2009 ,المتضمن القانون الأساسي");
				$this->Text(5,$this->GetY()+$y,"الخاص بالموظفين المنتمين لأسلاك الممارسين الطبيين المختصين  في الصحة العمومية");
				break;
				}	   
		case '2' ://generaliste medecin pharmacien dentiste
				{
				$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم التنفيذي رقم  393-09  مؤرخ في 24 نوفمبر سنة 2009 ,المتضمن القانون الأساسي");
				$this->Text(5,$this->GetY()+$y,"الخاص بالموظفين المنتمين لأسلاك الممارسين الطبيين العامين في الصحة العمومية");
				break;
				}	    	
		case '3' ://paramedicale
				{
				$this->Text(10,$this->GetY()+$y,"- و بمقتضى :المرسوم التنفيذي رقم 121-11 مؤرخ في 20 مارس 2011 ,يتضمن القانون الأساسي");
				$this->Text(5,$this->GetY()+$y,"الخاص بالموظفين المنتمين لأسلاك شبه الطبيين للصحة العمومية .");
				break;
				}        
		case '4' ://psycholgue
				{
				$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم التنفيذي رقم 240-09 المؤرخ في 22 يوليو سنة 2009 ,المتضمن القانون للأساسي");
				$this->Text(5,$this->GetY()+$y,"الخاص بالموظفين المنتمين لأسلاك النفسانيين للصحة العمومية ");
				break;
				}        				
		case '5' ://sage femme
				{
				$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم التنفيذي رقم 122-11 المؤرخ في 20 مارس سنة 2011 ,المتضمن القانون الأساسي");
				$this->Text(5,$H2,"الخاص بالموظفات المنتميات لسلك القابلات في الصحة العمومية");
				break;
				}				
		case '6' ://biologie
				{
				$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم التنفيذي رقم 152-11 المؤرخ  في 3 ابريل سنة 2011  ,المتضمن القانون الأساسي");
				$this->Text(5,$this->GetY()+$y,"الخاص بالموظفين المنتمين لأسلاك البيولوجيين في الصحة العمومية ");
				break;
				}				
		case '7' ://annesthesiste
				{
				$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم التنفيذي رقم 235-11 المؤرخ في 3 يوليو سنة 2011 ، المتضمن القانون الأساسي");
				$this->Text(5,$this->GetY()+$y,"الخاص بالموظفين المنتمين لأسلاك الأعوان الطبيين في التخذير و لإنعاش للصحة العمومية");
				break;
				}				
		case '8' ://corps communs
				{
				$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم التنفيذي رقم 04-08 مؤرخ في يناير سنة 2008 المتضمن القانون الأساسي");
				$this->Text(5,$this->GetY()+$y,"الخاص بالموظفين المنتمين للأسلاك المشتركة في المؤسسات و الإدارات العمومية ");
				break;
				}				
		case '9' ://op
				{
				$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم التنفيذي رقم 05-08 مؤرخ في 19 يناير سنة 2008 المتضمن القانون الأساسي");
				$this->Text(5,$this->GetY()+$y,"الخاص بالموظفين المنتمين للعمال المهنيين و سائقي السيارات و الحجاب  ");
				break;
				}				
		case '10' ://phisi
				{
				$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم التنفيذي رقم 178-10 المؤرخ في 8 يوليو سنة 2010 المتضمن القانون الأساسي");
				$this->Text(5,$this->GetY()+$y,"الخاص بالموظفين المنتمين لسلك الفيزيائيين الطبيين في الصحة العمومية ");
				break;
				}				
		case '11' ://idmage
				{
				$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم التنفيذي رقم 126-08 المؤرخ في 19 ابريل سنة 2008 المتعلق بجهاز");
				$this->Text(5,$this->GetY()+$y,"المساعدة على الإدماج المهني ");
				break;
				}				
		case '12' ://idmage
				{
				$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم الرئاسي رقم 308-07 المؤرخ في 29  سبتمبر سنة 2007 المحدد لكيفيات توظيف");
				$this->Text(5,$this->GetY()+$y,"الأعوان المتعاقدين و حقوقهم وواجباتهم و العناصرالمشكلة لرواتبهم والقواعد المتعلقة ");
				$this->Text(5,$this->GetY()+$y,"بتسييرهم و كذا النظام التأديبي المطبق عليهم");
				break;
				}	
		case '13' ://idmage
				{
				$this->Text(10,$this->GetY()+$y,"- و بمقتضى : المرسوم التنفيذي رقم 161-09 المؤرخ في 02 ماي سنة 2009 ,المتضمن القانون الأساسي");
				$this->Text(5,$this->GetY()+$y,"الخاص بالموظفين المنتمين لسلك متصرفي مصالح الصحة");
				break;
				}	
		}
	
	}
	
	
	
	//*************************************************************************************************************//
	
	function entetedecision($titre,$DATEP)
	{
		$this->Rect(5, 5, 200, 285 ,'D');$this->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->repar,0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->mspar,0,1,'C');$this->SetFont('aefurat', '', 14);
		$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,$this->wilayaar,0,1,'R');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->dsparp,0,1,'R');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->dssar,0,1,'R');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,'رقم : '.'_____'.' / م. ص. س / '.substr($DATEP,0,4),0,1,'R');$this->SetFont('aefurat', 'B', 22);
		$this->SetXY(5,$this->GetY()+3);$this->Cell(200,5,$titre,0,1,'C');$this->SetFont('aefurat', '', 16);
		$this->SetXY(100,$this->GetY()+5);$this->Cell(100,5,$this->ledspar,0,1,'C');$this->SetFont('aefurat', '', 12);	
	}
	function entetedecisions($titre,$DATEP)
	{
		$this->Rect(5, 5, 200, 285 ,'D');$this->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->repar,0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->mspar,0,1,'C');$this->SetFont('aefurat', '', 14);
		$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,"مديرية الصحة و السكان لولاية الجلفة",0,1,'R');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,"=======================================================================",0,1,'R');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,"المقرر رقم: "." ________ "."/ م . ص . س / ".substr($DATEP,0,4)." /"."المؤرخ في "." ___________________ ",0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5," المتضمن الترخيص ".$titre,0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,"=======================================================================",0,1,'R');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->ledspar,0,1,'R');$this->SetFont('aefurat', '', 12);	
		
	}
	
	function propositiondecision()
	{
		$this->SetXY(5,$this->GetY()+8);$this->Cell(200,5,$this->proposition,0,1,'C');$this->SetFont('aefurat', 'U', 16);
		$this->SetXY(5,$this->GetY()+3);$this->Cell(200,5,'يقــــــــــرر ',0,1,'C');$this->SetFont('aefurat', '', 13);

	}
	function propositiondecisions()
	{
		$this->SetFont('aefurat', 'U', 16);
		$this->SetXY(5,$this->GetY()+3);$this->Cell(200,5,'يقــــــــــرر ',0,1,'C');$this->SetFont('aefurat', '', 13);

	}
	function footdecision($nomar,$prenomar,$adresse,$commune,$DATEP,$grade)
	{
		$this->SetXY(5,$this->GetY()+5);
		if($grade=="M"){$this->Cell(200,5,$this->article1.$nomar.' '.$prenomar.' طبيب (ة) عام (ة) '.' بفتح عيادته (ها) الطبية العامة الكائن مقرها ',0,1,'R');}
		if($grade=="D"){$this->Cell(200,5,$this->article1.$nomar.' '.$prenomar.' جراح (ة) أسنان'.' بفتح عيادته (ها) الطبية لجراحة الاسنان الكائن مقرها ',0,1,'R');}
		
		$this->SetXY(0,$this->GetY());$this->Cell(200,5,'               بـ : '.$adresse.' بلدية '.$commune.' ولاية الجلفة',0,1,'R');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,'المادة 02 : لايمكن تحويل اي مقر  للعيادة دون استشارة مصالح مديرية الصحة و السكان',0,1,'R');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->article3,0,1,'R');$this->SetFont('aefurat', '', 12.5);
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->article4,0,1,'R');$this->SetFont('aefurat', 'B', 14);
		

	}
	function ctdecision($nomfr,$prenomfr,$DATEP)
	{   
	    $this->SetXY(5,$this->GetY()+10);$this->Cell(100,5,' حرر بالجلفة في : .........................',0,1,'C');
		$this->SetXY(5,$this->GetY()+3);$this->Cell(100,5,'مدير الصحة و السكان ',0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,"الاسم و اللقب بالاحرف اللاتنية :",0,1,'R');$this->SetFont('aefurat', 'B', 12);
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$nomfr." ".$prenomfr,0,1,'R');$this->SetFont('aefurat', 'B', 14);
		$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,"نسخة مرسلة الى :",0,1,'R');
		$this->SetXY(5,$this->GetY()+2);$this->Cell(200,5," - صندوق الضمان الاجتماعي",0,1,'R');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5," - المعني (نسخة أصلية)",0,1,'R');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5," - ملف المعني",0,1,'R');
	}
	function dossier($DATEP)
	{
		$this->AddPage();$this->SetFont('aefurat', '', 12);
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->repar,0,1,'C');$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->repfr,0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->mspar,0,1,'C');$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->mspfr,0,1,'C');
		//$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->dspar,0,1,'C');$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->dspfr,0,1,'C');
		$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,$this->wilayaar,0,1,'R');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->dsparp,0,1,'R');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->dssar,0,1,'R');
		$this->SetXY(5,$this->GetY());$this->Cell(200,5,'رقم : '.'_____'.' / م. ص. س / '.substr($DATEP,0,4),0,1,'R');$this->SetFont('aefurat', 'B', 14);
		$this->SetXY(5,$this->GetY()+3);$this->Cell(200,5,"الوثائق المطلوبة لتكوين ملف, فتح / تحويل / غلق ,محل للممارسة الحرة لمهن الصحة ",0,1,'C');$this->SetFont('aefurat', '', 14);
	    $this->SetXY(5,$this->GetY()+3);$this->Cell(200,5,"طبيب أخصائي / طبيب عام / جراح أسنان / صيدلي /  أخصائي نفساني /شبه طبي  ",0,1,'C');$this->SetFont('aefurat', '', 12);
	    
		$this->SetXY(5,$this->GetY()+10);$this->Cell(25,5,"غلق مقر",1,0,'C',1,0);$this->Cell(25,5,"تحويل مقر",1,0,'C',1,0);$this->Cell(25,5,"فتح مقر",1,0,'C',1,0);$this->Cell(110,5,"الوثائق المطلوبة",1,0,'C',1,0);$this->Cell(15,5,"الرقم",1,1,'C',1,0);
	    $this->SetXY(5,$this->GetY());$this->Cell(25,5,"*",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"طلب خطي ",1,0,'R');$this->Cell(15,5,"01",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"شهادة ميلاد أصلية ",1,0,'R');$this->Cell(15,5,"02",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"شهادة الجنسية ",1,0,'R');$this->Cell(15,5,"03",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"سوابق عدلية ",1,0,'R');$this->Cell(15,5,"04",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"شهادة أداء أو إعفاء من الخدمة الوطنية",1,0,'R');$this->Cell(15,5,"05",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"شهادة إقامة ",1,0,'R');$this->Cell(15,5,"06",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"شهادة الحالة العائلية",1,0,'R');$this->Cell(15,5,"07",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"صور شمسية 02",1,0,'R');$this->Cell(15,5,"08",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"شهادة طبية عامة و خاصة صدرية ",1,0,'R');$this->Cell(15,5,"09",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"شهادة النجاح ",1,0,'R');$this->Cell(15,5,"10",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"شهادة التسجيل في مجلس أخلاقيات المهنة",1,0,'R');$this->Cell(15,5,"11",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"مقرر الإستقالة في حالة توظيف سابق",1,0,'R');$this->Cell(15,5,"12",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"شهادة توقيف الراتب في حالة توظيف سابق ",1,0,'R');$this->Cell(15,5,"13",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"شهادة إبراء من الخدمة المدنية للأخصائيين",1,0,'R');$this->Cell(15,5,"14",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"شهادة عدم الإنتساب للضمان الإجتماعي / أجراء/ غير أجراء",1,0,'R');$this->Cell(15,5,"15",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"مقرر غلق مقر إن وجد",1,0,'R');$this->Cell(15,5,"16",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"عقد ملكية أو كراء أو إمتياز أو إعارة ",1,0,'R');$this->Cell(15,5,"17",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"مخطط المقر مؤشر عليه من قبل مكتب الدراسات و المعني",1,0,'R');$this->Cell(15,5,"18",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"محضر المطابقة للمقر من قبل مصالح الصحة",1,0,'R');$this->Cell(15,5,"19",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"فاتورة جهاز التعقييم  للإختصاصات الجراحية بإسم المعني",1,0,'R');$this->Cell(15,5,"20",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"إتفاقية حرق النفايات مع مؤسسة عمومية أو خاصة",1,0,'R');$this->Cell(15,5,"21",1,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(25,5,"",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(25,5,"*",1,0,'C');$this->Cell(110,5,"شهادة مطابقة العزل للأشعة بالنسبة لمالكي جهاز الأشعة ",1,0,'R');$this->Cell(15,5,"22",1,1,'C');
	    $this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,"ملاحظة : يودع الملف لدى أمانة مديرية الصحة و السكان كل يوم ثلثاء إبتداء من الساعة الثامنة",0,1,'R',1,0);
		$this->SetXY(5,$this->GetY()+10);$this->Cell(100,5,' حرر بالجلفة في : ',0,1,'C');
		$this->SetXY(5,$this->GetY()+3);$this->Cell(100,5,'مدير الصحة و السكان ',0,1,'C');
	}
	
	
	function dossierm($NUMD,$DATED,$NAT,$communear,$sexe,$titre)
	{
		$this->SetXY(25,$this->GetY()+10);$this->Cell(20,5,'الموضوع :',0,0,'R');
		if ($NAT==1) {$this->Cell(180,5,'ف / ي  طلبكم المتعلق '.'بتحويل '.$titre.' ببلدية '.$communear." رقم ".$NUMD." المؤرخة في ".$DATED,0,1,'R'); }
		if ($NAT==2) {$this->Cell(180,5,'ف / ي  طلبكم المتعلق '.'بتنصيب '.$titre.' ببلدية '.$communear." رقم ".$NUMD." المؤرخة في ".$DATED,0,1,'R'); }
		if ($NAT==3) {$this->Cell(180,5,'ف / ي  طلبكم المتعلق '.'بفتح '.$titre.' ببلدية '.$communear." رقم ".$NUMD." المؤرخة في ".$DATED,0,1,'R'); }
		if ($NAT==4) {$this->Cell(180,5,'ف / ي  طلبكم المتعلق '.'بغلق '.$titre.' ببلدية '.$communear." رقم ".$NUMD." المؤرخة في ".$DATED,0,1,'R'); }
		if ($NAT==1) {$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,'تبعا لطلبكم المتعلق '.'بتحويل '.$titre. ' يشرفني ان اعلمكم بالموافقة المبدئية كما اطلب منكم تكملة ملفكم بالوثائق التالية',0,1,'R');}
		if ($NAT==2) {$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,'تبعا لطلبكم المتعلق '.'بتنصيب '.$titre. ' يشرفني ان اعلمكم بالموافقة المبدئية كما اطلب منكم تكملة ملفكم بالوثائق التالية',0,1,'R');}
		if ($NAT==3) {$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,'تبعا لطلبكم المتعلق '.'بفتح '.$titre. ' يشرفني ان اعلمكم بالموافقة المبدئية كما اطلب منكم تكملة ملفكم بالوثائق التالية',0,1,'R');}
		if ($NAT==4) {$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,'تبعا لطلبكم المتعلق '.'بغلق'.$titre. ' يشرفني ان اعلمكم بالموافقة المبدئية كما اطلب منكم تكملة ملفكم بالوثائق التالية',0,1,'R');}
		$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,'في اجل 20 يوما والا سوف يلغى طلبكم ',0,1,'R');
		$this->SetXY(15,$this->GetY()+5);$this->Cell(95,5,'قائمة الوثائق المطلوبة في حالة ',0,0,'R');                        
		if ($NAT==1) {$this->Cell(20,5,'التحويل',1,1,'C',1,0);}
		if ($NAT==2) {$this->Cell(20,5,'التنصيب',1,1,'C',1,0);} 
		if ($NAT==3) {$this->Cell(20,5,'الفتح',1,1,'C',1,0);}
		if ($NAT==4) {$this->Cell(20,5,'الغلق',1,1,'C',1,0);}
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- طلب خطي ',0,0,'R');                                   $this->Cell(20,5,'',1,1,'C');
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- شهادة ميلاد أصلية ',0,0,'R');                          $this->Cell(20,5,'',1,1,'C');
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- شهادة الجنسية',0,0,'R');                              $this->Cell(20,5,'',1,1,'C');
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- سوابق عدلية',0,0,'R');                                $this->Cell(20,5,'',1,1,'C');
		if ($sexe=='M'){$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- شهادة أداء أو إعفاء من الخدمة الوطنية',0,0,'R');$this->Cell(20,5,'',1,1,'C');} 
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- شهادة إقامة ',0,0,'R');                              $this->Cell(20,5,'',1,1,'C');
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- شهادة النجاح ',0,0,'R');                              $this->Cell(20,5,'',1,1,'C');
		//$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- شهادة الحالة العائلية',0,0,'R');                              $this->Cell(20,5,'',1,1,'C');
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- شهادت التسجيل في الفرع النضامي الجهوي ',0,0,'R');     $this->Cell(20,5,'',1,1,'C');
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- مقرر الاستقالة / مقرر الغلق ',0,0,'R');                $this->Cell(20,5,'',1,1,'C');
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- شهادة عدم الانتساب'.' (CNAS + CASNOS) ',0,0,'R');      $this->Cell(20,5,'',1,1,'C');
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- شهادة طبية عامة و خاصة ',0,0,'R');                    $this->Cell(20,5,'',1,1,'C');
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- صور شمسية 02 ',0,0,'R');                              $this->Cell(20,5,'',1,1,'C');
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'- عقد ملكية أو كراء أو إمتياز أو إعارة ',0,0,'R');               $this->Cell(20,5,'',1,1,'C');
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'مخطط تفصيلي للمحل مقياس 1/100 (A4) ',0,0,'R');          $this->Cell(20,5,'',1,1,'C');
		$this->SetXY(15,$this->GetY()+1);$this->Cell(95,5,'شهادة المطابقة للمحل',0,0,'R');                         $this->Cell(20,5,'',1,1,'C');
		$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,"ملاحظة : يودع الملف لدى أمانة مديرية الصحة و السكان كل يوم ثلثاء إبتداء من الساعة الثامنة",0,1,'R',1,0);
		$this->SetXY(100,$this->GetY()+5);$this->Cell(50,5,'تقبلوا تحيـــــــــــاتنا',0,1,'R');
		$this->setRTL($enable=false, $resetx=true);
		$this->SetXY(5,$this->GetY()+10);$this->Cell(100,5,' حرر بالجلفة في : ',0,1,'C');
		$this->SetXY(5,$this->GetY()+3);$this->Cell(100,5,'مدير الصحة و السكان ',0,1,'C');
		
	}
	
	
	//*************************************************************************************************************//
	function mhmts($ids,$nomar,$prenomar)
	{
	$this->AddPage();
	$this->SetLineWidth(0.4);
	$this->Rect(5, 5, 200, 285 ,'D');$this->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
	$this->SetXY(5,$this->GetY());$this->Cell(200,5,'ملحق المقررة رقم ___________',0,1,'C');
	$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,'  المادة 03 : تعين الوسائل المادية و البشرية  للسيد(ة) '.$nomar.' '.$prenomar.' كالتالي :',0,1,'R');
	$this->SetXY(15,$this->GetY()+6);$this->cell(180,6,'الوسائل المادية',1,0,'C',1,0);
	$this->SetXY(15,$this->GetY()+6);$this->cell(30,6,'الشركة المصنعة',1,0,'C',1,0);$this->cell(40,6,'الطراز',1,0,'C',1,0);$this->cell(50,6,'رقم التسلسلي في الطراز',1,0,'C',1,0);$this->cell(40,6,'الترقيم',1,0,'C',1,0);$this->cell(20,6,'الصنف',1,0,'C',1,0);
	$this->SetXY(15,$this->GetY()+6);
	$query_liste = "SELECT * FROM auto WHERE idt  ='$ids' and ETAT='0' order by Categorie";//
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$tot1=mysql_num_rows($requete);
	while($row=mysql_fetch_object($requete))
	{
	$this->cell(30,06,$row->Marque,1,0,'C',0);
	$this->cell(40,06,$row->Type,1,0,'C',0);
	$this->cell(50,06,$row->Serie_Type,1,0,'C',0);
	$this->cell(40,06,$row->Immatri,1,0,'C',0);
	$this->cell(20,06,$row->Categorie,1,0,'C',0);
	$this->SetXY(15,$this->GetY()+6); 
	}
	$this->SetXY(15,$this->GetY());
	$this->cell(30,6,'المجموع : '.$tot1,1,0,'C',1,0);
	$this->cell(40,6,$this->nbrcategorie('C',$ids).' : C',1,0,'C',1,0);
	$this->cell(50,6,$this->nbrcategorie('B',$ids).' : B',1,0,'C',1,0);
	$this->cell(40,6,$this->nbrcategorie('A',$ids).' : A',1,0,'C',1,0);
	$this->cell(20,6,'الصنف',1,0,'C',1,0);
	$this->SetXY(15,$this->GetY()+12);$this->cell(180,6,'الوسائل البشرية',1,0,'C',1,0);
	$this->SetXY(15,$this->GetY()+6);
	$this->cell(100,6,'الرتبة',1,0,'C',1,0);
	$this->cell(40,6,'الإسم',1,0,'C',1,0);
	$this->cell(40,6,'اللقب',1,0,'C',1,0);
	$this->SetXY(15,$this->GetY()+6);
	$query_listep = "SELECT * FROM pers WHERE idt  ='$ids' and ETAT='0' order by Categorie";//
	$requetep = mysql_query( $query_listep ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$tot1p=mysql_num_rows($requetep);
	while($rowp=mysql_fetch_object($requetep))
	{
	if ($rowp->Categorie=='M') {$this->cell(100,06,'',1,0,'R',0);}
	if ($rowp->Categorie=='P') {$this->cell(100,06,'ممرض',1,0,'C',0);}
	if ($rowp->Categorie=='C') {$this->cell(100,06,'سائق',1,0,'C',0);}
	if ($rowp->Categorie=='')  {$this->cell(100,06,'X',1,0,'C',0);}
	$this->cell(40,06,$rowp->NOMAR,1,0,'R',0);
	$this->cell(40,06,$rowp->PRENOMAR,1,0,'R',0);
	$this->SetXY(15,$this->GetY()+6); 
	}
	$this->SetXY(15,$this->GetY());
	$this->cell(100,6,'المجموع : '.$tot1p,1,0,'C',1,0);
	$this->cell(40,6,'  سائق : '.$this->nbrpers('C',$ids),1,0,'C',1,0);
	$this->cell(40,6,'  ممرض : '.$this->nbrpers('P',$ids),1,0,'C',1,0);

	$this->SetXY(5,$this->GetY()+12);$this->Cell(200,5,"المادة 04  : ".'يسري مفعول هذه المقررة ابتداء من تاريخ إمضائها',0,1,'R');
	$this->SetXY(5,$this->GetY()+6);$this->Cell(200,5,'المادة 05 : يكلف كل من السادة مدير المؤسسة العمومية للصحة الجوارية '.' و مدير صندوق الضمان الإجتماعي بتنفيذ هذه المقررة .',0,1,'R');
	}
	//*************************************************************************************************************//
	
	function entetesiple()
	{
	$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->repar,0,0,'C');
	$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,$this->repfr,0,0,'C');
	$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,$this->mspar,0,0,'C');
	$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,$this->mspfr,0,0,'C');
	$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,$this->dspar,0,0,'C');
	$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,$this->dspfr,0,0,'C');	
	}
	
	
	function entete($id2)
	{
	$url1 = explode('-',$id2);	
	$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->repar,0,1,'C');
	$this->SetXY(5,$this->GetY()+2);$this->Cell(200,5,$this->repfr,0,1,'C');
	$this->SetXY(5,$this->GetY()+2);$this->Cell(200,5,$this->mspar,0,1,'C');
	$this->SetXY(5,$this->GetY()+2);$this->Cell(200,5,$this->mspfr,0,1,'C');
	$this->SetXY(5,$this->GetY()+2);$this->Cell(200,5,$this->dspar,0,1,'C');
	$this->SetXY(5,$this->GetY()+2);$this->Cell(200,5,$this->dspfr,0,1,'C');
	$this->SetXY(10,55);$this->Cell(40,5,'N° : ........../DSP/'.$url1[2],0,1,'C');
	//$this->SetXY(140,55);$this->Cell(50,5,'Djelfa le : '.$id2,0,1,'L');
	$this->SetXY(140,55);$this->Cell(50,5,'Djelfa le : ',0,1,'L');
	
	$this->SetXY(90,$this->GetY()+5);$this->Cell(100,5,'Le directeur de la santé et de la population de la wilaya de Djelfa',0,1,'C');
	$this->SetXY(70,$this->GetY()+2.5);$this->Cell(100,5,'A',0,1,'C');
	}
	function pied()
	{
	$this->SetXY(130,$this->GetY()+10);$this->Cell(50,5," Le Directeur de la santé ",0,1,'C');
	$this->SetXY(10,$this->GetY()-5);$this->Cell(100,5,'CT :',0,1,'L');
	$this->SetXY(20,$this->GetY());$this->Cell(100,5,'- Archives',0,1,'L');
	$this->SetXY(20,$this->GetY());$this->Cell(100,5,'- Inspection (pour information)',0,1,'L');
	}
	
	function mysqlconnect()
	{
	$this->db_host;
	$this->db_name;
	$this->db_user;
	$this->db_pass;
    $cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($this->db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $cnx;
	return $db;
	}

	function nbrtostringx($tb_name,$colonename,$colonevalue,$resultatstring) 
	{
		if (is_numeric($colonevalue) and $colonevalue!=='0') 
		{ 
			$this->mysqlconnect();
			$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
			$row=mysql_fetch_object($result);
			$resultat=$row->$resultatstring;
			return $resultat;
		} 
		return $resultat2='??????';
	}
	function dateUS2FR($date)
	{
	  $date = explode('-', $date);
	  $date = array_reverse($date);
	  $date = implode('-', $date);
	  return $date;
	}
	//************************//
	function orderdemision($numm,$nomprenom,$fonction,$wilaya,$commune,$lieu,$depart,$arrive,$nbr,$num,$cause)
	{
	$this->SetCreator(PDF_CREATOR);
	$this->SetAuthor('tiba redha');
	$this->SetTitle("Order de mision");
	$this->SetSubject('PROTOCOLE');
	$this->SetFillColor(250);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
	$this->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
	$this->setPrintHeader(false);
	$this->setPrintFooter(false);
	$this->SetFont('aefurat', 'B', 14);
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->AddPage();
	$this->SetLineWidth(0.4);
	$this->StartTransform();
	$this->SetXY(108,0);$this->SetFillColor(0, 128, 0);
	$this->Rotate(-45);
	$this->cell(145,8,"",0,0,'C',1,0);
	$this->StopTransform();
	$this->StartTransform();
	$this->SetXY(108-5,5);$this->SetFillColor(255, 0, 0);
	$this->Rotate(-45);
	$this->cell(145,8,"",0,0,'C',1,0);
	$this->StopTransform();
	$this->Rect(5, 5, 200, 285 ,'D');$this->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
	$this->SetXY(5,$this->GetY());$this->Cell(200,5,$this->repar,0,1,'C');
	$this->SetXY(5,$this->GetY()+2);$this->Cell(200,5,$this->repfr,0,1,'C');
	$this->SetXY(5,$this->GetY()+2);$this->Cell(200,5,$this->mspar,0,1,'C');
	$this->SetXY(5,$this->GetY()+2);$this->Cell(200,5,$this->mspfr,0,1,'C');
	$this->SetXY(5,$this->GetY()+2);$this->Cell(200,5,$this->dspar,0,1,'C');
	$this->SetXY(5,$this->GetY()+2);$this->Cell(200,5,$this->dspfr,0,1,'C');
	$this->SetFont('aefurat', 'B', 22);
	$this->SetXY(5,$this->GetY()+10);$this->Cell(200,5,'امـــــر بمهمــــــــة',0,1,'C');
	$this->SetXY(5,$this->GetY()+2);$this->Cell(200,5,'ORDRE DE MISSION',0,1,'C');
	$this->SetFont('aefurat', 'B', 18);
	$this->SetXY(5,$this->GetY()+5);$this->Cell(200,5,'الرقـــــــم : '.$numm.' / '.date('y'),0,1,'C');
	// $this->SetXY(5,$this->GetY()+2);$this->Cell(200,5,'N° : ............................/ '.date('y'),0,1,'C');
	$this->SetFont('aefurat', 'B', 16);
	$this->setRTL(true);
	$this->SetXY(40,120);$this->Cell(50,5,$nomprenom,0,1,'R');
	$this->SetXY(40,130);$this->Cell(50,5,$fonction,0,1,'R');
	$this->SetXY(40,140);$this->Cell(50,5,$lieu." بلدية  ".$this->nbrtostring('mvc','com','IDCOM',$commune,'communear')." ولاية ".$this->nbrtostring('mvc','wil','IDWIL',$wilaya,'WILAYASAR'),0,1,'R');
	$this->SetXY(40,150);$this->Cell(50,5,$depart,0,1,'R');
	$this->SetXY(40,160);$this->Cell(50,5,$arrive,0,1,'R');
    $this->SetXY(70,170);$this->Cell(50,5,$nbr,0,1,'R');
	$this->SetXY(40,180);$this->Cell(50,5,$num,0,1,'R');
	$this->SetXY(40,190);$this->Cell(50,5,$cause,0,1,'R');
	$this->SetFont('aefurat', 'B', 16);
	$this->SetXY(5,120);$this->Cell(50,5,'الاسم و اللقب : '.' ..................................................................................................................... ',0,1,'R');
	$this->SetXY(5,130);$this->Cell(50,5,'الوضيفة : '.' .............................................................................................................................',0,1,'R');
	$this->SetXY(5,140);$this->Cell(50,5,'المكان المقصود : '.' .................................................................................................................. ',0,1,'R');
	$this->SetXY(5,150);$this->Cell(50,5,'تاريخ الذهاب : '.' .....................................................................................................................',0,1,'R');
	$this->SetXY(5,160);$this->Cell(50,5,'تاريخ الاياب : '.' .......................................................................................................................',0,1,'R');//.''
	$this->SetXY(5,170);$this->Cell(50,5,'عدد الاشخاص بداخل السيارة :'.' ................................................................................................',0,1,'R');
	$this->SetXY(5,180);$this->Cell(50,5,'رقم السيارة : '.'  ....................................................................................................................... ',0,1,'R');
	$this->SetXY(5,190);$this->Cell(50,5,'سبب الانتقال : '.'  ..................................................................................................................... ',0,1,'R');//.''.strtoupper($this->nbrtostring('mvc','structure','id',$rowy->ids,'NOM'))."_".ucfirst($this->nbrtostring('mvc','structure','id',$rowy->ids,'PRENOM'))
	$this->SetFont('aefurat', 'B', 16);
	$this->SetXY(120,$this->GetY()+20);$this->Cell(20,5,'في : الجلفة '.'يوم : '.$depart,0,1,'R');
	$this->SetXY(140,$this->GetY()+10);$this->Cell(20,5,'المدير',0,1,'R');
	$this->SetFont('aefurat', '', 9.5);
	$this->SetXY(5.5,$this->GetY()+25);$this->Cell(200,5,'______________________________________________________________________________________________________________________',0,1,'R');
	$this->SetXY(5.5,$this->GetY()+0);$this->Cell(200,5,'على السلطات المدنية و العسكرية السماح لحامل هذا الامر بالمهمة بالمرور بكل حرية  وفي كل الضروف وتسهيل عليه القيام بمهمته وتمديد له يد المساعدة عند الضرورة',0,1,'C');
	$this->setRTL(false);
	}
	//************************//
	function nbrcategorie($Categorie,$idt)
	{
	$this-> mysqlconnect();
	$query_liste = "SELECT * FROM auto WHERE  Categorie='$Categorie' and ETAT='0' and idt=$idt";//
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	
	function nbrpharcom($STRUCTURE,$COMMUNE)
	{
	$this-> mysqlconnect();
	$query_liste = "SELECT * FROM structure WHERE STRUCTURE=12 and COMMUNE=$COMMUNE and ETAT='0'";//
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	
	function nbrhabitcom($val,$COMMUNE)
	{
	$this-> mysqlconnect();
	$query_liste = "SELECT * FROM com WHERE IDCOM=$COMMUNE ";//
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$result1 = mysql_fetch_array( $requete ) ;
	$valhb=$result1["$val"];
	return $valhb;
	}
	
	
	
	function nbrpers($Categorie,$idt)
	{
	$this-> mysqlconnect();
	$query_liste = "SELECT * FROM pers WHERE  Categorie='$Categorie' and ETAT='0' and idt=$idt";//
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	
	
	
	
	function valhbfer($id,$datejour1,$datejour2,$val)
	{
	$this-> mysqlconnect();
	$query_liste = "SELECT * FROM hemobio WHERE  DATE BETWEEN '$datejour1' AND '$datejour2'  and  id  ='$id' AND  $val != 0  order by DATE  DESC   limit 0,1 ";
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$result1 = mysql_fetch_array( $requete ) ;
	$valhb=$result1["$val"];
	return $valhb;
	}
	function nbrepo($id,$datejour1,$datejour2)
	{
	$this-> mysqlconnect();
	$req="SELECT SUM(EPO) AS total FROM HEMOSEANCE WHERE  dateseance BETWEEN '$datejour1' AND '$datejour2'   and  id  ='$id' ";
	$query1 = mysql_query($req);   
	$rs = mysql_fetch_assoc($query1);
	$prixseance1=$rs['total'];
	return $prixseance1;
	}
	function nbrepot($datejour1,$datejour2)
	{
	$this-> mysqlconnect();
	$req="SELECT SUM(EPO) AS total FROM HEMOSEANCE WHERE  dateseance BETWEEN '$datejour1' AND '$datejour2' ";
	$query1 = mysql_query($req);   
	$rs = mysql_fetch_assoc($query1);
	$prixseance1=$rs['total'];
	return $prixseance1;
	}
	function nbrfer($id,$datejour1,$datejour2)
	{
	$this-> mysqlconnect();
	$req="SELECT SUM(FER) AS total FROM HEMOSEANCE WHERE  dateseance BETWEEN '$datejour1' AND '$datejour2'   and  id  ='$id' ";
	$query1 = mysql_query($req);   
	$rs = mysql_fetch_assoc($query1);
	$prixseance1=$rs['total'];
	return $prixseance1;
	}
	function nbrfert($datejour1,$datejour2)
	{
	$this-> mysqlconnect();
	$req="SELECT SUM(FER) AS total FROM HEMOSEANCE WHERE  dateseance BETWEEN '$datejour1' AND '$datejour2'";
	$query1 = mysql_query($req);   
	$rs = mysql_fetch_assoc($query1);
	$prixseance1=$rs['total'];
	return $prixseance1;
	}
	function nbrseance($id,$datejour1,$datejour2)
	{
	$this-> mysqlconnect();
	$query_liste = "SELECT * FROM HEMOSEANCE WHERE  dateseance BETWEEN '$datejour1' AND '$datejour2'  and  id  ='$id' ";
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	function nbrseancet($datejour1,$datejour2)
	{
	$this-> mysqlconnect();
	$query_liste = "SELECT * FROM HEMOSEANCE WHERE  dateseance BETWEEN '$datejour1' AND '$datejour2' ";
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	function depense($id,$datejour1,$datejour2)
	{
	$this-> mysqlconnect();
	$req="SELECT SUM(FORFAIT) AS total FROM HEMOSEANCE WHERE  dateseance BETWEEN '$datejour1' AND '$datejour2'   and  id  ='$id' ";
	$query1 = mysql_query($req);   
	$rs = mysql_fetch_assoc($query1);
	$prixseance1=$rs['total'];
	return $prixseance1;
	}
	function depenset($datejour1,$datejour2)
	{
	$this-> mysqlconnect();
	$req="SELECT SUM(FORFAIT) AS total FROM HEMOSEANCE WHERE  dateseance BETWEEN '$datejour1' AND '$datejour2' ";
	$query1 = mysql_query($req);   
	$rs = mysql_fetch_assoc($query1);
	$prixseance1=$rs['total'];
	return $prixseance1;
	}
	
	
    function P44($y,$d,$c,$n,$co,$p)//entete fiche navette
		{
		$this->SetXY(10,$y); 	  
        $this->cell(20,5,$d,1,0,'C',0);
		$this->SetXY(30,$y); 	  
        $this->cell(30,5,"HEMODIALYSE",1,0,'C',0);
		$this->SetXY(60,$y); 	  
        $this->cell(20,5,$c,1,0,'C',0);
		$this->SetXY(60+20,$y); 	  
        $this->cell(60,5,$n,1,0,'L',0);
		$this->SetXY(60+20+60,$y); 	  
        $this->cell(20,5,$co,1,0,'C',0);
		$this->SetXY(160,$y); 
		$this->cell(40,5,$p,1,0,'L',0);
		}
	function P444($y,$d,$c,$dci,$pre,$four,$pra)//entete fiche navette
		{
		$this->SetXY(10,$y); 	  
        $this->cell(20,5,$d,1,0,'C',0);
		
		$this->SetXY(30,$y); 	  
        $this->cell(30,5,$c,1,0,'C',0);
		
		$this->SetXY(60,$y); 	  
        $this->cell(60,5,$dci,1,0,'L',0);
		
		$this->SetXY(120,$y); 	  
        $this->cell(20,5,$pre,1,0,'C',0);
		
		$this->SetXY(60+20+60,$y); 	  
        $this->cell(20,5,$four,1,0,'C',0);
		
		$this->SetXY(160,$y); 
		$this->cell(40,5,$pra,1,0,'L',0);
		}
		function USER()
    {
	$USER=$_SESSION["login"];
	return $USER;
	}
	function fichenavettehd($ndp)//entete fiche navette
		{
		$this-> mysqlconnect();
	    $sql = "SELECT * FROM hemo WHERE id = '".$ndp."' "; 
        $requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
        if( $result = mysql_fetch_object( $requete ) )
        {
	    // $session=$_SESSION["USER"];
		$this->setPrintHeader(false);
        $this->setPrintFooter(false);
        $this->SetFont('aefurat', '', 10);
        $this->SetDisplayMode('fullpage','single');
        //P1 FICHE NAVETTE
		$this->AddPage();
		$this->Text(55,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
		$this->Text(35,10,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE");
		$this->Text(40.5,15,"DIRECTION DE LA SANTE ET DE LA POPULAION DE LA WILAYA DE DJELFA");
		$this->Text(60,20,"ETABLISSEMENT PUBLIC HOSPITALIER AIN OUSSERA");
		$this->SetFont('aefurat', '', 24);
		$this->Text(52,28," FICHE D'HEMODIALYSE");
		$this->SetFont('aefurat', '', 10);
		$this->Rect(10, 40, 190, 15 ,'D');
        $this->Text(10,40,"IDENTIFICATION DE L'ASSURE:");
        $this->Text(15,45,"Nom:".$result->NOM);$this->Text(105,45,"Prénom:".$result->PRENOM);
        $this->Text(15,50,"Date de Naissance:". $this->dateUS2FR($result->DATENAISSA));$this->Text(105,50,"N°Immatriculation: ".$result->NSS);
		$this->Rect(10, 40+18, 190, 15 ,'D');                                                          
		$this->Text(10,40+18,"IDENTIFICATION DU DEMUNI:");
        $this->Text(15,45+18,"Nom:");$this->Text(105,45+18,"Prénom:");
        $this->Text(15,50+18,"Date de Naissance:");$this->Text(105,50+18,"N°Immatriculation:");
		$this->Rect(140, 74.5, 60, 5 ,'D');$this->Text(140,74.5,"N°SS:".$result->NSS); 
		$this->Rect(10, 81, 190, 20 ,'D');
		$this->Text(10,81,"IDENTIFICATION DU PATIENT:"); 
		$this->Text(15,86,"1.N° D'ADMISSION:");$this->Text(80,86,"2.GROUPAGE SANGUIN:");$this->Text(150,86,"3.AGE:");
        $this->SetXY(15,91);$this->cell(60,6,"",1,0,'L',0); 	  
	    $this->SetXY(80,91);  $this->cell(60,6,"".$result->GRABO."_".$result->GRRH,1,0,'C',0);	  
	    $this->SetXY(150,91);  $AGE1=substr(DATE('Y-m-d'),0,4)-substr($result->DATENAISSA,0,4); $this->cell(40,6,$AGE1." ans",1,0,'C',0);//$this->dateUS2FR($result->DATENAISSA)	  
		$this->Rect(10,101, 190, 7 ,'D'); 
		$this->Text(15,102,"4.Nom : ".$result->NOM);$this->Text(80,102,"5.Nom de jeune fille : ");$this->Text(150,102,"6.Prénom : ".$result->PRENOM);
		$this->Rect(10,109, 190, 25 ,'D');
		$this->Text(10,109,"7.Service: Hemodialyse");                        $this->Text(100,109,"8.Nom et qualité du chef de Service : MR BOUZAHAR");
		$this->Text(10,109+5,"9.Date d'entree : ".date('d-m-Y'));            $this->Text(100,109+5,"10.Heure d'entree : ".date("H:i"));//.date("H:i")
		$this->Text(10,109+10,"11.Nom de la Salle : Hemodialyse");           $this->Text(100,109+10,"12.N°lit : ".$result->NLIT);
		$this->Text(10,109+15,"13.Nom Prénom et Qualite du medecin traitant : Dr ");//.$session
		$this->Text(10,109+20,"14.Mode d'entree : NORMAL");                  $this->Text(100,109+20,"15.Code entrée : ");
		$this->Text(10,135,"SEANCE D HEMODIALYSE:");
		$this->Rect(10,135, 190, 25 ,'D');
		$this->Text(10,135+5,"APPREIL UTILISE : ".$result->NLIT);             $this->Text(100,135+5,"DATES : ".date('d-m-Y'));
		$this->Text(10,135+10,"ACCES SANG : FAV    CJ    CF    VP");          $this->Text(100,135+10,"BAIN DE DIALYSE : ");
		$this->Text(10,135+15,"INFIRMIER : ");                                $this->Text(100,135+15,"N° LOT DE LOT  DE SOLUTION CONCENTREE:");
		$this->Text(10,135+20,"POIDS SEC : ".$result->POIDS."  Kg");          $this->Text(100,135+20,"TYPE DE DIALYSE : Programme     Urgence");
		$this->Rect(10,135+25, 90, 20 ,'D');$this->Rect(100,135+25, 100, 20 ,'D');
		$this->Text(10,135+25,"DEBUT DE LA DIALYSE ");                        $this->Text(100,135+25,"FIN DE LA DIALYSE ");
		$this->Text(10,135+30,"Heure : _ _ _ heures ");                       $this->Text(100,135+30,"Heure : _ _ _ heures "); 
		$this->Text(10,135+35,"Poids : _ _ _ Kg");                            $this->Text(100,135+35,"Poids :  _ _ _ Kg");   
		$this->Text(10,130+45,"TA : _ _ _ /_ _ mmhg");  $this->Text(65,130+45,"Temperature : _ _ C°"); 	                $this->Text(100,130+45,"TA : _ _ _ /_ _ mmhg"); $this->Text(165,130+45,"Temperature : _ _ C°");        
		       
		$this->SetXY(10,181); 	  
        $this->cell(20,10,"HEURE",1,0,'C',0);
		$this->SetXY(30,181); 	  
        $this->cell(10,10,"TA",1,0,'C',0);
		$this->SetXY(40,181); 	  
        $this->cell(30,10,"DEBIT SANGUIN",1,0,'C',0);
		$this->SetXY(70,181); 	  
        $this->cell(10,10,"HEP",1,0,'C',0);
		$this->SetXY(80,181); 	  
        $this->cell(15,10,"UF ml/h",1,0,'C',0);
		$this->SetXY(95,181); 	  
        $this->cell(15,10,"PTM",1,0,'C',0);
		$this->SetXY(110,181); 	  
        $this->cell(40,10,"Pression Ultra Filtra Sang",1,0,'C',0);
		$this->SetXY(150,181); 	  
        $this->cell(50,10,"OBSERVATION ET TRT",1,0,'C',0);
		$this->SetXY(10,191); 	  
        $this->cell(20,18,"",1,0,'C',0);
		$this->SetXY(30,191); 	  
        $this->cell(10,18,"",1,0,'C',0);
		$this->SetXY(40,191); 	  
        $this->cell(30,18,"",1,0,'C',0);
		$this->SetXY(70,191); 	  
        $this->cell(10,18,"",1,0,'C',0);
		$this->SetXY(80,191); 	  
        $this->cell(15,18,"",1,0,'C',0);
		$this->SetXY(95,191); 	  
        $this->cell(15,18,"",1,0,'C',0);
		$this->SetXY(110,191); 	  
        $this->cell(40,18,"",1,0,'C',0);
		$this->SetXY(150,191); 	  
        $this->cell(50,18,"",1,0,'C',0);
		
		
		
		$this->Rect(10,185+30, 190, 60 ,'D');
		$this->Text(10,180+30,"2.SOINS INFIRMIERS ACTES PARAMEDICAUX EFFECTUES DANS L'ETABLISSEMENT D'HOSPITALISATION:");
		$this->SetXY(10,185+30); 	  
        $this->cell(20,10,"2.1 DATE",1,0,'C',0);
		$this->SetXY(30,185+30); 	  
        $this->cell(30,10,"2.2 SERVICE",1,0,'C',0);
		$this->SetXY(60,185+30); 	  
        $this->cell(100,5,"ACTE ET EXAMENS ",1,0,'C',0);
		$this->SetXY(60,190+30); 	  
        $this->cell(20,5,"2.3 Code",1,0,'C',0);
		$this->SetXY(60+20,190+30); 	  
        $this->cell(60,5,"2.4 Nature",1,0,'C',0);
		$this->SetXY(60+20+60,190+30); 	  
        $this->cell(20,5,"2.5 Cotation",1,0,'C',0);
		$this->SetXY(160,185+30); 
		$this->cell(40,5,"2.6.Nom Prenom  ",1,0,'C',0);
		$this->SetXY(160,190+30); 
		$this->cell(40,5,"et Qualite du paramedical ",1,0,'C',0);
		$this->P44(195+30,date('d-m-Y'),"1173","injection isolée","ami2","","");
		$this->P44(200+30,date('d-m-Y'),"1175","prélèvement multiples","ami4","","");
		$this->P44(205+30,date('d-m-Y'),"1167","injection sous cutané","ami1","","");
		$this->P44(210+30,date('d-m-Y'),"1180","panssement petit","ami1","","");
		$this->P44(215+30,date('d-m-Y'),"1190","perfusion iv","ami5","","");
		$this->P44(220+30,date('d-m-Y'),"1194","surveillance et observation","ami1","","");
		$this->P44(225+30,date('d-m-Y'),"","","","","");
		$this->P44(230+30,date('d-m-Y'),"","","","","");
		$this->P44(235+30,date('d-m-Y'),"","","","","");
		$this->P44(240+30,date('d-m-Y'),"","","","","");
		
		
		
		$this->AddPage();
		$this->Text(10,10,"1.ACTES MEDICAUX CHIRURGICAUX ET EXAMENTS  PRATIQUES DANS L'ETABLISSEMENT D'HOSPITALISATION :");
		$this->Text(10,15,"Y COMPRIS LES CONSULTATION EFFECTUEES PAR LES PRATICIENS EXTERNE AU SERVICE");
		$this->SetXY(10,20); 	  
        $this->cell(20,10,"2.1 DATE",1,0,'C',0);
		$this->SetXY(30,20); 	  
        $this->cell(30,10,"2.2 SERVICE",1,0,'C',0);
		$this->SetXY(60,20); 	  
        $this->cell(100,5,"ACTE ET EXAMENS ",1,0,'C',0);
		$this->SetXY(60,25); 	  
        $this->cell(20,5,"2.3 Code",1,0,'C',0);
		$this->SetXY(60+20,25); 	  
        $this->cell(60,5,"2.4 Nature",1,0,'C',0);
		$this->SetXY(60+20+60,25); 	  
        $this->cell(20,5,"2.5 Cotation",1,0,'C',0);
		$this->SetXY(160,20); 
		$this->cell(40,5,"2.6.Nom Prenom  ",1,0,'C',0);
		$this->SetXY(160,25); 
		$this->cell(40,5,"et Qualite du Praticien ",1,0,'C',0);
		$this->P44(30,date('d-m-Y'),"0869/01","séance d'hemodialyse pour IRC","k100","Dr ","");//.$_SESSION["USER"]
		$this->P44(35,date('d-m-Y'),"0868","surveillance d'une séance d'hémodialyse ","k20","Dr ","");//.$_SESSION["USER"]
		$this->P44(40,date('d-m-Y'),"","","","","");
		$this->P44(45,date('d-m-Y'),"","","","","");
		$this->P44(50,date('d-m-Y'),"","","","","");
		$this->P44(55,date('d-m-Y'),"","","","","");
		$this->Text(10,62,"4.MEDICAMENTS :");$this->Text(265,10," PAGE 7");
		$this->SetXY(10,68); 	  
        $this->cell(20,10,"4.1 DATE",1,0,'C',0);
		$this->SetXY(30,68); 	  
        $this->cell(30,10,"4.2 CODE",1,0,'C',0);
		$this->SetXY(60,68); 	  
        $this->cell(100,5,"PRESCRIPTION MEDICAMENTS",1,0,'C',0);
		$this->SetXY(60,68+5); 	  
        $this->cell(60,5,"4.3 LIBELLE DCI ",1,0,'C',0);
		$this->SetXY(120,68+5); 	  
        $this->cell(20,5,"4.4 Prescrite",1,0,'C',0);
		$this->SetXY(60+20+60,68+5); 	  
        $this->cell(20,5,"4.5 Fournie ",1,0,'C',0);
		$this->SetXY(160,68); 
		$this->cell(40,5,"4.6.Nom Prenom ",1,0,'C',0);
		$this->SetXY(160,68+5); 
		$this->cell(40,5,"Qualite du Praticien   ",1,0,'C',0);
		$this->P444(68+10,date('d-m-Y'),"14078","SSI 0.9 %","","","Dr ","6");//.$_SESSION["USER"]
		$this->P444(68+15,date('d-m-Y'),"14044","SGI 05 %","","","Dr ","6");//.$_SESSION["USER"]
		$this->P444(68+20,date('d-m-Y'),"70503/35","LIGNES A/V","","","Dr ","6");//.$_SESSION["USER"]
		$this->P444(68+25,date('d-m-Y'),"70501","DIALYSEUR F06","","","Dr ","6");//.$_SESSION["USER"]
		$this->P444(68+30,date('d-m-Y'),"70506","AIGUILLES A/V","","","Dr ","6");//.$_SESSION["USER"]
		$this->P444(68+35,date('d-m-Y'),"25020","ACIDE B/10L","","","Dr ","6");//.$_SESSION["USER"]
		$this->P444(68+40,date('d-m-Y'),"26029","BICA","","","Dr ","6");//.$_SESSION["USER"]
		$this->P444(68+45,date('d-m-Y'),"70230","COMPRESSE 5*5","","","Dr ","6");//.$_SESSION["USER"]
		$this->P444(68+50,date('d-m-Y'),"70192","GANT JETABLES","","","Dr ","6");//.$_SESSION["USER"]
		$this->P444(68+55,date('d-m-Y'),"70302","SPARADRAP","","","Dr ","6");//.$_SESSION["USER"]
		$this->P444(68+60,date('d-m-Y'),"70002","TRANSFUSEUR","","","Dr ","6");//.$_SESSION["USER"]
		$this->P444(68+65,date('d-m-Y'),"5589","LOVENOX","","","Dr ","6");//.$_SESSION["USER"]
		$this->P444(68+70,date('d-m-Y'),"7167","EPO","","","Dr ","6");//.$_SESSION["USER"]
		$this->P444(68+75,date('d-m-Y'),"","","","","","6");
		$this->P444(68+80,date('d-m-Y'),"","","","","","6");
		$this->SetFont('aefurat', '', 15);
		$this->Text(90,68+87,"SORTIE");
		$this->SetFont('aefurat', '', 10);
		$this->Rect(10, 68+95, 190, 55 ,'D');
        $this->Text(10,68+95,"CADRE RESERVE AU PRATICIEN");
	    $this->Text(10,168,"1.Date de sortie: ".$this->dateUS2FR(DATE('Y-m-d')));$this->Text(100,168,"2.Heure de Sortie: ");
        $this->Text(10,168+10,"3.Mode de Sortie: NORMAL ");$this->Text(100,168+10,"4.Code de Sortie:");
		$this->Text(10,168+20,"5.Diagnostic ou Motif d'entrée : Séance D'hémodialyse ");
	    $this->Text(10,168+30,"6.Diagnostic de Sortie: IRCT  ");
		$this->Text(10,168+40,"7.code CIM:Z49");$this->Text(100,168+40,"8.Code GHM: ");
		$this->Text(10,168+52,"NOM PRENOM ET GRADE DU PRATICIEN");$this->Text(150,168+52,"VISA DU CHEF DE SERVICE");//.$session
		$this->Text(30,168+60,"Dr ");//.$session
		$this->Text(25,168+70,"DATE ET CACHET");
		$this->Text(30,168+80,$this->dateUS2FR(DATE('Y-m-d')));
		$this->Text(29,168+90,"SIGNATURE");
		}
		}
	
		function entetecertificat($ndp)
		{
		$this-> mysqlconnect();
	    $sql = "SELECT * FROM hemo WHERE id = '".$ndp."' "; 
        $requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
        if( $result = mysql_fetch_object( $requete ) )
        {
	    // $session=$_SESSION["USER"];
		$this->setPrintHeader(false);
        $this->setPrintFooter(false);
        $this->SetFont('aefurat', '', 11);
        $this->SetDisplayMode('fullpage','single');//mode d affichage 
        $this->AddPage();
		$this->SetLineWidth(0.4);
		$this->Rect(5, 5, 200, 285 ,'D');
		$this->Rect(5, 5, 200, 30 ,'D');
		$this->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
		$this->SetFont('aefurat', '', 14);
		$this->SetXY(5,5);$this->Cell(200,10,"CLINIQUE DE NEPHROLOGIE ET D HEMODIALYSE",0,1,'C');
		$this->SetFont('aefurat', '', 20);
		$this->SetXY(5,15);$this->Cell(200,10,"NEPHRODIALE",0,1,'C');
		$this->SetFont('aefurat', '', 14);
		$this->SetXY(5,25);$this->Cell(200,10,"Docteur M.DAOUD Nephrologue ",0,1,'C');
		$this->SetXY(155,35);$this->Cell(50,10,"Alger Le : " . date ('d-m-Y')   ,0,1,'C',0);	
		$this->SetFont('aefurat', '', 20);
		$this->SetXY(5,70);$this->Cell(200,10," CERTIFICAT MEDICAL",0,1,'C');
		$this->SetFont('aefurat', '', 14);
		
		$this->Text(10,110," Je soussigné Docteur M.DAOUD Nephrologue, certifie que ");
		$this->Text(10,120," Le (a) patient (e) : ".$result->NOM." ".$result->PRENOM." , Presente ");
		$this->Text(10,130," une insufisance renale chronique terminale,hemodialysé (e), a raison de (03) trois ");
		$this->Text(10,140," séance par semaine de (04) quatre heures chacune");
		$this->Text(10,150," nécessite un transport de son domicile a la clinique NEPHRODIALE de type : ");//.
		$this->SetFont('aefurat', '', 10);
		switch($result->TRANS) 
		{  
			case 'VSL':
				{
				$this->SetFont('aefurat', '', 14);
		        $this->Text(20,160,"un transport sanitare type VSL");        $this->SetXY(135,160);$this->Cell(3,3,"X",1,1,'C');
		        $this->Text(20,170,"un transport par ambulance categorie B");$this->SetXY(135,170);$this->Cell(3,3,"",1,1,'C');
				break;
				}
			case 'ACB':
				{
				$this->SetFont('aefurat', '', 14);
				$this->Text(20,160,"un transport sanitare type VSL");        $this->SetXY(135,160);$this->Cell(3,3,"",1,1,'C');
				$this->Text(20,170,"un transport par ambulance categorie B");$this->SetXY(135,170);$this->Cell(3,3,"X",1,1,'C');
				break;
				}
				
		}
		switch($result->JOURS)  
		{ 
        case 'SLM':
				{
				$this->Text(10,180,"jour de dialyse : ");
	            $this->Text(50,180," Samedi-Lundi-Mercredi   De "); 
				if ($result->BRANCHEMENT==1){$this->Text(110,180," 08 H a 12 H"); }    
				if ($result->BRANCHEMENT==2){$this->Text(110,180," 12 H a 16 H"); }    
				if ($result->BRANCHEMENT==3){$this->Text(110,180," 16 H a 20 H"); }  
				if ($result->BRANCHEMENT==4){$this->Text(110,180," 20 H a 00 H"); }  
				if ($result->BRANCHEMENT==5){$this->Text(110,180," 00 H a 04 H"); }  
				if ($result->BRANCHEMENT==6){$this->Text(110,180," 04 H a 08 H"); }    
				break;
				}
		case 'DMJ':
				{
				$this->Text(10,180,"jour de dialyse : ");
	            $this->Text(50,180," Dimanche-Mardi-Jeudi    De ");
				if ($result->BRANCHEMENT==1){$this->Text(110,180," 08 H a 12 H"); }    
				if ($result->BRANCHEMENT==2){$this->Text(110,180," 12 H a 16 H"); }    
				if ($result->BRANCHEMENT==3){$this->Text(110,180," 16 H a 20 H"); }  
				if ($result->BRANCHEMENT==4){$this->Text(110,180," 20 H a 00 H"); }  
				if ($result->BRANCHEMENT==5){$this->Text(110,180," 00 H a 04 H"); }  
				if ($result->BRANCHEMENT==6){$this->Text(110,180," 04 H a 08 H"); }  
				break;
				}
		}
		$this->Text(10,190,"ce traitement est indispensable a la survie ce (tte) patient (e) et doit etre ");
		$this->Text(10,200,"poursuivi a vie a moins  dune transplantation renale. ");
		$this->Text(10,210,"Dont certificat.");
		$this->Text(100,230,"Alger le :".date("d-m-Y"));
		$this->Text(120,240,"Docteur M DAOUD");
		$this->SetFont('aefurat', '', 10);
		$this->SetXY(5,266);$this->Cell(200,10,"170 Rue Sfindja ex La Perlier Telemly - Alger -  TEL  0661 55 15 83",1,1,'C');
		}
		}
		function entetecertificat1($ndp)
		{
		$this-> mysqlconnect();
	    $sql = "SELECT * FROM hemo WHERE id = '".$ndp."' "; 
        $requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
        if( $result = mysql_fetch_object( $requete ) )
        {
		$this->setPrintHeader(false);
        $this->setPrintFooter(false);
        $this->SetFont('aefurat', '', 11);
        $this->SetDisplayMode('fullpage','single');//mode d affichage 
        $this->AddPage();
		$this->SetLineWidth(0.4);
		$this->Rect(5, 5, 200, 285 ,'D');
		$this->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
		$this->SetFont('aefurat', '', 14);
		$this->SetXY(5,5);$this->Cell(200,10,"CAISSE NATIONALE DES ASSURANCES SOCIALES",1,1,'C');
		$this->SetFont('aefurat', '', 12);
		$this->SetXY(5,15);$this->Cell(50,10,"AGENCE : ",0,1,'L');
		$this->SetXY(5,25);$this->Cell(50,10,"CENTRE PAYEURE DE : ",0,1,'L');
		$this->SetXY(5,35);$this->Cell(50,10,"CODE CENTRE : ",0,1,'L');
		$this->SetFont('aefurat', '', 20);
		$this->SetXY(5,60);$this->Cell(200,10," ATTESTATION D OUVERTURE DE DROIT ",0,1,'C');
		$this->SetXY(5,70);$this->Cell(200,10," AUX PRESTATION EN NATURE",0,1,'C');
		$this->SetFont('aefurat', '', 14);$this->Rect(5, 80, 200, 30 ,'D');
		$this->SetXY(5,80);$this->Cell(200,10," CONVENTION ".$result->CAISSE." /SARL NEPHRODIAL CENTRE D HEMODIALYSE DE ",0,1,'C');
		$this->SetXY(5,100);$this->Cell(200,10," CLINIQUE NEPHRODIAL /".$result->CAISSE,0,1,'C');
		$this->SetXY(5,110);$this->Cell(200,10," Identification de L'assuré (e) ",0,1,'C');
		$this->Rect(5, 120, 200, 40 ,'D');
		$this->SetXY(5,120);$this->Cell(50,10," Nom : ",0,1,'L');      $this->SetXY(125,120);$this->Cell(60,10,"Numéro d'immatriculation",0,1,'C');
		$this->SetXY(5,130);$this->Cell(50,10," Prénom : ",0,1,'L');   
		$this->SetXY(5,140);$this->Cell(50,10," Date de naissance : ",0,1,'L');
		$this->SetXY(5,150);$this->Cell(50,10," Adresse : ",0,1,'L');$this->SetXY(140,150);$this->Cell(50,10," Wilaya : Alger",0,1,'L');
		$this->SetXY(5,160);$this->Cell(200,10," Identification du malade ",0,1,'C');
		$this->Rect(5, 170, 200, 50 ,'D');
		$this->SetXY(5,170);$this->Cell(50,10," Nom : ",0,1,'L');
		$this->SetXY(5,180);$this->Cell(50,10," Prénom : ",0,1,'L');
		$this->SetXY(5,190);$this->Cell(50,10," Date de naissance : ",0,1,'L');
		$this->SetXY(5,200);$this->Cell(50,10," Adresse : ",0,1,'L');$this->SetXY(140,200);$this->Cell(50,10," Wilaya : ",0,1,'L');
		$this->SetXY(5,210);$this->Cell(25,5,"Assuré (e) : ",0,1,'L');
		$this->SetXY(40,210);$this->Cell(25,5,"Conjount : ",0,1,'L');
		$this->SetXY(75,210);$this->Cell(25,5,"Enfant : ",0,1,'L');
		$this->SetXY(103,210);$this->Cell(25,5,"Ascendant : ",0,1,'L');
		$this->SetXY(140,210);$this->Cell(20,5,"Autre a preciser : ",0,1,'L');
		$this->SetXY(15,230);$this->Cell(200,10," Est bénèficiare des prestations en nature de l'assurance maladie a ce jour et ",0,1,'L');
		$this->SetXY(15,240);$this->Cell(200,10," jusqu'au ",0,1,'L');
		$this->SetXY(15,255);$this->Cell(50,10," Date d'affiliation :  ",0,1,'L');	$this->SetXY(155,255);$this->Cell(50,10," Le  :  ",0,1,'L');

		$this->SetTextColor(200,0,0);
		if ($result->QUALITE=='Assure')   {$this->SetXY(30,210);$this->Cell(5,5,"X",1,1,'C');}
		if ($result->QUALITE=='Conjoint') {$this->SetXY(63,210);$this->Cell(5,5,"X",1,1,'C');}
		if ($result->QUALITE=='Enfant')   {$this->SetXY(93,210);$this->Cell(5,5,"X",1,1,'C');}
		if ($result->QUALITE=='Ascendant'){$this->SetXY(129,210);$this->Cell(5,5,"X",1,1,'C');}
		if ($result->QUALITE=='Autre')    {$this->SetXY(176,210);$this->Cell(5,5,"X",1,1,'C');$this->SetXY(181,210);$this->Cell(24,5,"***",0,1,'C');  }
	
		$this->SetXY(30,210);$this->Cell(5,5,"",1,1,'C');
		$this->SetXY(63,210);$this->Cell(5,5,"",1,1,'C');
		$this->SetXY(93,210);$this->Cell(5,5,"",1,1,'C');
		$this->SetXY(129,210);$this->Cell(5,5,"",1,1,'C');
		$this->SetXY(176,210);$this->Cell(5,5,"",1,1,'C');$this->SetXY(181,210);$this->Cell(24,5,"***",0,1,'C');
		
		$this->SetXY(55,15);$this->Cell(50,10,$result->CAISSE,0,1,'L');
		$this->SetXY(55,25);$this->Cell(50,10,$result->ADRESSENSS,0,1,'L');
		$this->SetXY(55,35);$this->Cell(50,10,$result->NCP,0,1,'L');
		
		$this->SetXY(55,120);$this->Cell(50,10,$result->ASSURE,0,1,'L');
		$this->SetXY(55,130);$this->Cell(50,10,$result->ASSURE,0,1,'L');     $this->SetXY(125,130);$this->Cell(60,10,$result->NSS,1,1,'C');
		$this->SetXY(55,140);$this->Cell(50,10,$this->dateUS2FR($result->DNASSURE),0,1,'L');
		$this->SetXY(55,150);$this->Cell(50,10,$result->ADRESSENSS,0,1,'L');    

		$this->SetXY(55,170);$this->Cell(50,10,$result->NOM,0,1,'L');
		$this->SetXY(55,180);$this->Cell(50,10,$result->PRENOM,0,1,'L');
		$this->SetXY(55,190);$this->Cell(50,10,$this->dateUS2FR($result->DATENAISSA),0,1,'L');
		$this->SetXY(55,200);$this->Cell(50,10,$result->ADRESSE,0,1,'L');   $this->SetXY(160,200);$this->Cell(50,10,$this->nbrtostring('mvc','wil','IDWIL',$result->WILAYAR,'WILAYAS') ,0,1,'L'); 
		}
		}
		
		
		
		
		function PROTOCOLE($ndp)
		{
	    $this-> mysqlconnect();
	    $sql = "SELECT * FROM hemo WHERE id = '".$ndp."' "; 
        $requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
        if( $result = mysql_fetch_object( $requete ) )
        {
		$this->setPrintHeader(false);
        $this->setPrintFooter(false);
        $this->SetFont('aefurat', '', 11);
        $this->SetDisplayMode('fullpage','single');//mode d affichage 
        $this->AddPage();
		$this->SetLineWidth(0.4);
		$this->Rect(5, 5, 200, 285 ,'D');
		$this->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
		$this->Text(45,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
		$this->Text(30,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE");
		$this->Text(55,20,"DIRECTION DE LA SANTÉ WILAYA DE DJELFA");
		$this->Text(5,40,"ETABLISSEMENT PUBLIC HOSPITALIER  D'AIN - OUSSERA");
		$this->Text(5,45,"SERVICE:HEMODIALYSE");
		$this->Text(5,50,"N°.........../".date("Y"));
		$this->SetFont('aefurat', '', 14);
		$this->SetFont('aefurat', '', 20);
		$this->Text(65,80," PROTOCOLE MEDICAL");
		$this->SetFont('aefurat', '', 14);
		$this->Text(10,100,"Nom :".$result->NOM);  
		$this->Text(10,110,"Prénom :".$result->PRENOM); 
		$this->Text(10,120,"Date De Naissance :".$this->dateUS2FR($result->DATENAISSA));
		$this->Text(10,130,"Nephropathie Initiale :".$result->CAUSEMALAD);
		$this->Text(10,140,"Groupage sanguin :".$result->GRABO."_".$result->GRRH);
		$this->Text(10,150,"Profil Sérologique : ");
		$this->Text(50,150,"HVB:".$result->HVB);
		$this->Text(80,150,"HVC:".$result->HVC);
		$this->Text(110,150,"HIV:".$result->HIV);
		$this->Text(10,160,"Type capillaire  : NIPRO");
		$this->Text(10,170,"Type Génerateur  : FRESINUS 4008");
		$this->Text(10,180,"Poids sec  :".$result->POIDS.' Kg');
		$this->Text(10,190,"Prise de poids inter dialytique  :".$result->POIDS.' Kg');
		$nbrs='03';
		$this->Text(10,200,"Nombre de séance  : ".$nbrs." seances");
		$this->Text(10,210,"Date de la première  séance  : ".$result->NOM);
		$this->Text(100,230,"Ain oussera le :".date("d-m-Y"));
		$this->Text(120,240,"LE MEDECIN");
		// $this->Text(125,245,"Dr ".$session);
		}
		}
		function bilans($id)
		{
		$this->setPrintHeader(false);
        $this->setPrintFooter(false);
        $this->SetFont('aefurat', '', 10);
        $this->SetDisplayMode('fullpage','single');//mode d affichage 
        $this->AddPage();
		$this->Text(5,10,"المؤسسة العمومية الاستشفائية عين وسارة");
		$this->Text(10,15,"ETABLISSEMENT PUBLIC");
		$this->Text(8,20,"HOSPITALIER AIN OUSSERA");
		$this->Rect(70+150,5,65,25,"d");
		$this->Text(80+155,7,"SUIVIE BIOLOGIQUE ");
		$this->Text(83+150,12,"Laboratoire D'Hemodialyse ");
		$this->Text(83+150,17,"......................................");
		$this->Text(80+150,22,"AIN OUSSERA LE :".date('d-m-Y'));
		$this->SetFont('aefurat', '', 14);
        $this->Text(30+70,32,"HISTORIQUE BILAN BIOLOGIQUE");
		$this->SetFont('aefurat', '', 10);
		$this-> mysqlconnect();
	    $sql = "SELECT * FROM hemo WHERE id = '".$id."' "; 
        $requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
        if( $result = mysql_fetch_object( $requete ) )
        {
		$this->Text(5,40,"Nom,Prénom du malade:".$result->NOM."_".$result->PRENOM);
		$this->Text(5,45,"Date De Naissance:".$this->dateUS2FR($result->DATENAISSA)); 
		$AGE=substr(date('d/m/Y'),6,4)-substr($result->DATENAISSA,0,4);   
		$this->Text(100+150,45,"Age: ".$AGE." Ans " );
		$this->Text(5,50,"Laboratoire:  Hemodialyse");                     $this->Text(100+150,50,"Matricule:-------");
		}
		$h1=10;$h=59;  
		$this->SetXY(5,$h); 	  
		$this->cell(25,05,"Date d'Examens",1,0,'C',0);
		$this->SetXY(30,$h);$this->cell($h1,05,"GB",1,0,'C',0);
		$this->SetXY(40,$h);$this->cell($h1,05,"GB",1,0,'C',0);
		$this->SetXY(50,$h);$this->cell($h1,05,"HB",1,0,'C',0);
		$this->SetXY(60,$h);$this->cell($h1,05,"HT",1,0,'C',0);
		$this->SetXY(70,$h);$this->cell($h1,05,"PLQT",1,0,'C',0);
		$this->SetXY(80,$h);$this->cell($h1,05,"TP",1,0,'C',0);
		$this->SetXY(90,$h);$this->cell($h1,05,"INR",1,0,'C',0);
		$this->SetXY(100,$h);$this->cell($h1,05,"VS1",1,0,'C',0);
		$this->SetXY(110,$h);$this->cell($h1,05,"VS2",1,0,'C',0);
		$this->SetXY(120,$h);$this->cell($h1,05,"GLYC",1,0,'C',0);
		$this->SetXY(130,$h);$this->cell($h1,05,"UREE",1,0,'C',0);
		$this->SetXY(140,$h);$this->cell($h1,05,"CRET",1,0,'C',0);
        $this->SetXY(150,$h);$this->cell($h1,05,"ACUR",1,0,'C',0);
		$this->SetXY(160,$h);$this->cell($h1,05,"BLT",1,0,'C',0);
		$this->SetXY(170,$h);$this->cell($h1,05,"BLD",1,0,'C',0);
		$this->SetXY(180,$h);$this->cell($h1,05,"TGO",1,0,'C',0);
		$this->SetXY(190,$h);$this->cell($h1,05,"TGP",1,0,'C',0);
		$this->SetXY(200,$h);$this->cell($h1,05,"ASLO",1,0,'C',0);
		$this->SetXY(210,$h);$this->cell($h1,05,"CRP",1,0,'C',0);
		$this->SetXY(220,$h);$this->cell($h1,05,"TGC",1,0,'C',0);
		$this->SetXY(230,$h);$this->cell($h1,05,"CHO",1,0,'C',0);
		$this->SetXY(240,$h);$this->cell($h1,05,"NA",1,0,'C',0);
		$this->SetXY(250,$h);$this->cell($h1,05,"K",1,0,'C',0);
		$this->SetXY(260,$h);$this->cell($h1,05,"PHO",1,0,'C',0);
		$this->SetXY(270,$h);$this->cell($h1,05,"CL",1,0,'C',0);
		$this->SetXY(280,$h);$this->cell($h1,05,"CA",1,0,'C',0);
		$this->SetXY(5,$h+5);
		$query_liste = "SELECT * FROM HEMOBIO WHERE id  ='$id' ";
		$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
		$totalmbr1=mysql_num_rows($requete);
		while($row=mysql_fetch_object($requete))
		  {
		  $this->cell(25,05,$row->DATE,1,0,'C',0);
		  $this->cell($h1,05,$row->GB,1,0,'C',0);
		  $this->cell($h1,05,$row->GR,1,0,'C',0);
		  $this->cell($h1,05,$row->HB,1,0,'C',0);
		  $this->cell($h1,05,$row->HT,1,0,'C',0);
		  $this->cell($h1,05,$row->PLQT,1,0,'C',0);
		  $this->cell($h1,05,$row->TP,1,0,'C',0);
		  $this->cell($h1,05,$row->INR,1,0,'C',0);
		  $this->cell($h1,05,$row->VS1H,1,0,'C',0);
		  $this->cell($h1,05,$row->VS2H,1,0,'C',0);
		  $this->cell($h1,05,$row->GLYCE,1,0,'C',0);
		  $this->cell($h1,05,$row->UREE,1,0,'C',0);
		  $this->cell($h1,05,$row->CREAT,1,0,'C',0);
		  $this->cell($h1,05,$row->ACURIQUE,1,0,'C',0);
		  $this->cell($h1,05,$row->BILIT,1,0,'C',0);
		  $this->cell($h1,05,$row->BILID,1,0,'C',0);
		  $this->cell($h1,05,$row->TGO,1,0,'C',0);
		  $this->cell($h1,05,$row->TGP,1,0,'C',0);
		  $this->cell($h1,05,$row->ASLO,1,0,'C',0);
		  $this->cell($h1,05,$row->CRP,1,0,'C',0);
		  $this->cell($h1,05,$row->TG,1,0,'C',0);
		  $this->cell($h1,05,$row->CHOLES,1,0,'C',0);
		  $this->cell($h1,05,$row->NA,1,0,'C',0);
		  $this->cell($h1,05,$row->K,1,0,'C',0);
		  $this->cell($h1,05,$row->PHOS,1,0,'C',0);
		  $this->cell($h1,05,$row->CL,1,0,'C',0);
		  $this->cell($h1,05,$row->CA,1,0,'C',0);
		  $this->SetXY(5,$this->GetY()+5); 
		  }
		$this->SetXY(5,$this->GetY()); 	
		$this->cell(25,05,"Total",1,0,'C',0);	  
		$this->SetXY(30,$this->GetY()); 	  
		$this->cell(260,05,$totalmbr1."  "."BILANS",1,0,'C',0);	
		$this->Text(80+150,180,"Laboratoire : Hemodialyse");
        $this->Text(80+150,185,"FATOUH Mustapha");
		}
		
		function seances($id)
		{
		$this->setPrintHeader(false);
        $this->setPrintFooter(false);
        $this->SetFont('aefurat', '', 10);
        $this->SetDisplayMode('fullpage','single');//mode d affichage 
        $this->AddPage();
		$this->Text(5,10,"المؤسسة العمومية الاستشفائية عين وسارة");
		$this->Text(10,15,"ETABLISSEMENT PUBLIC");
		$this->Text(8,20,"HOSPITALIER AIN OUSSERA");
		$this->Rect(70+150,5,65,25,"d");
		$this->Text(80+155,7,"SUIVIE SEANCE ");
		$this->Text(83+150,12,"Service D'Hemodialyse ");
		$this->Text(83+150,17,"......................................");
		$this->Text(80+150,22,"AIN OUSSERA LE :".date('d-m-Y'));
		$this->SetFont('aefurat', '', 14);
        $this->Text(30+70,32,"HISTORIQUE SEANCE HEMODIALYSE");
		$this->SetFont('aefurat', '', 10);
		$this-> mysqlconnect();
	    $sql = "SELECT * FROM hemo WHERE id = '".$id."' "; 
        $requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
        if( $result = mysql_fetch_object( $requete ) )
        {
		$this->Text(5,40,"Nom,Prénom du malade:".$result->NOM."_".$result->PRENOM);
		$this->Text(5,45,"Date De Naissance:".$this->dateUS2FR($result->DATENAISSA)); 
		$AGE=substr(date('d/m/Y'),6,4)-substr($result->DATENAISSA,0,4);   
		$this->Text(100+150,45,"Age: ".$AGE." Ans " );
		$this->Text(5,50,"Laboratoire:  Hemodialyse");                     $this->Text(100+150,50,"Matricule:-------");
		}
		$h1=10;$h=59;  
		$h1=10;
		$this->SetXY(5,$h);$this->cell(25,05,"Date Séance",1,0,'C',0);
		$this->SetXY(30,$h);$this->cell(20,05,"Heure",1,0,'C',0);
		$this->setxy(50,$h);$this->cell(25,05,"Type",1,0,'C',0);
		$this->SetXY(75,$h);$this->cell($h1+5,05,"N°APP",1,0,'C',0);
		$this->SetXY(90,$h);$this->cell($h1+5,05,"ACC",1,0,'C',0);
		$this->SetXY(105,$h);$this->cell($h1+5,05,"POIDS",1,0,'C',0);
		$this->SetXY(120,$h);$this->cell($h1+5,05,"POIDSD",1,0,'C',0);
		$this->SetXY(135,$h);$this->cell($h1+5,05,"SYSD",1,0,'C',0);
		$this->SetXY(150,$h);$this->cell($h1+5,05,"DIAD",1,0,'C',0);
		$this->SetXY(165,$h);$this->cell($h1+5,05,"TD",1,0,'C',0);
		$this->SetXY(180,$h);$this->cell($h1+5,05,"POIDSF",1,0,'C',0);
		$this->SetXY(195,$h);$this->cell($h1+5,05,"SYSF",1,0,'C',0);
		$this->SetXY(210,$h);$this->cell($h1+5,05,"DIAF",1,0,'C',0);
		$this->SetXY(225,$h);$this->cell($h1+5,05,"TF",1,0,'C',0);
		$this->SetXY(240,$h);$this->cell($h1+15,05,"IDE",1,0,'C',0);
		$this->SetXY(265,$h);$this->cell($h1+15,05,"MEDECIN",1,0,'C',0);
		$this->SetXY(5,$h+5);
		$query_liste = "SELECT * FROM HEMOSEANCE WHERE id  ='$id' ";
		$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
		$totalmbr1=mysql_num_rows($requete);
		while($row=mysql_fetch_object($requete))
		  {
		  $this->cell(25,05,$row->dateseance,1,0,'C',0);
		  $this->cell($h1+10,05,$row->heures,1,0,'C',0);
		  $this->cell($h1+15,05,$row->TYPEDIA,1,0,'C',0);
		  $this->cell($h1+5,05,$row->NAPP,1,0,'C',0);
		  $this->cell($h1+5,05,$row->ACCSANG,1,0,'C',0);
		  $this->cell($h1+5,05,$row->POIDS,1,0,'C',0);
		  $this->cell($h1+5,05,$row->POIDSD,1,0,'C',0);
		  $this->cell($h1+5,05,$row->SYSD,1,0,'C',0);
		  $this->cell($h1+5,05,$row->DIAD,1,0,'C',0);
		  $this->cell($h1+5,05,$row->TD,1,0,'C',0);
		  $this->cell($h1+5,05,$row->POIDSF,1,0,'C',0);
		  $this->cell($h1+5,05,$row->SYSF,1,0,'C',0);
		  $this->cell($h1+5,05,$row->DIAF,1,0,'C',0);
		  $this->cell($h1+5,05,$row->TF,1,0,'C',0);
		  $this->cell($h1+15,05,$row->IDE,1,0,'C',0);
		  $this->cell($h1+15,05,$row->MEDECIN,1,0,'C',0);
		  $this->SetXY(5,$this->GetY()+5); 
		  }
		$this->SetXY(5,$this->GetY()); 	
		$this->cell(25,05,"Total",1,0,'C',0);	  
		$this->SetXY(30,$this->GetY()); 	  
		$this->cell(260,05,$totalmbr1."  "."Séances",1,0,'C',0);	
		$this->Text(80+150,180,"Laboratoire : Hemodialyse");
        $this->Text(80+150,185,"FATOUH Mustapha");
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
			
	
}	