<?php
$ids=$_GET["ids"]; 
$idh=$_GET["idh"]; 
require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('DECISION');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf-> mysqlconnect(); 
$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$nomar=$rowx->NOMAR;
$prenomar=$rowx->PRENOMAR;
$nomfr=$rowx->NOM;
$prenomfr=$rowx->PRENOM;
}

$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'الجمـهوريـــة الجزائرية الديمقراطية الشعبية',0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,'وزارة الصحة و السكان وإصلاح المستشفيات',0,0,'C');
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,'ولايــــــــة الجلفـــــــــة',0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,'مـديريــــــة الصحة و السكان',0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,'مصلحة الهياكل و النشاط الصحي',0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,5,'رقم : ............./م. ص. س/ '.date("Y"),0,1,'R');
$pdf->SetFont('aefurat', '', 16);
$pdf->SetXY(8,$pdf->GetY()+5);$pdf->Cell(100,5,"مدير الصحة و السكان لولاية الجلفـــــــــة",0,0,'C',0,1);
$pdf->SetXY(8,$pdf->GetY()+8);$pdf->Cell(100,5,"الى",0,0,'C',0,1);
$pdf->SetXY(8,$pdf->GetY()+8);$pdf->Cell(100,5,"السيد والي ولاية الجلفـــــــــة",0,0,'C',0,1);
$pdf->SetXY(8,$pdf->GetY()+8);$pdf->Cell(100,5,"  مديرية التنظيم و الشؤون العامة",0,0,'C',0,1);
$pdf->SetXY(80,$pdf->GetY()+10);$pdf->Cell(120,5," الموضوع : طلب التأكد من صحة البطاقات الرمادية ",0,0,'R',0,1);
$pdf->SetXY(80,$pdf->GetY()+8);$pdf->Cell(120,5," المرفقات :  ".""."نسخ من البطاقات الرمادية",0,0,'R',0,1);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(1,$pdf->GetY()+15);$pdf->Cell(200,5,'حتى يتسنى لنا منح اعتماد فتح و إستغلال وحدة للنقل الصحي '.'الخاصة بالسيد(ة) '.$nomar.' '.$prenomar,0,1,'R');
$pdf->SetXY(1,$pdf->GetY()+5);$pdf->Cell(200,5,'يشرفني أن أطلب من سيادتكم تأكيد صحة البطاقات الرمادية المقدمة من طرف المعني (ة) حسب الجدول التالي :',0,1,'R');
$pdf->SetXY(15,$pdf->GetY()+6);$pdf->cell(180,6,'الوسائل المادية',1,0,'C',1,0);
$pdf->SetXY(15,$pdf->GetY()+6);$pdf->cell(30,6,'الشركة المصنعة',1,0,'C',1,0);$pdf->cell(40,6,'الطراز',1,0,'C',1,0);$pdf->cell(50,6,'رقم التسلسلي في الطراز',1,0,'C',1,0);$pdf->cell(40,6,'الترقيم',1,0,'C',1,0);$pdf->cell(20,6,'الصنف',1,0,'C',1,0);
$pdf->SetXY(15,$pdf->GetY()+6);

//يشرفني أن أطلب منكم توثيق شهادة السيد(ة)  :
// و تأكيد صحة المعلومات الخاصة بالمعني(ة).


$query_liste = "SELECT * FROM auto WHERE idt  ='$ids' and ETAT='0' order by Categorie";//
$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$tot1=mysql_num_rows($requete);
while($row=mysql_fetch_object($requete))
{
$pdf->cell(30,06,$row->Marque,1,0,'C',0);
$pdf->cell(40,06,$row->Type,1,0,'C',0);
$pdf->cell(50,06,$row->Serie_Type,1,0,'C',0);
$pdf->cell(40,06,$row->Immatri,1,0,'C',0);
$pdf->cell(20,06,$row->Categorie,1,0,'C',0);
$pdf->SetXY(15,$pdf->GetY()+6); 
}
$pdf->SetXY(15,$pdf->GetY());
$pdf->cell(30,6,'المجموع : '.$tot1,1,0,'C',1,0);
$pdf->cell(40,6,$pdf->nbrcategorie('C',$ids).' : C',1,0,'C',1,0);
$pdf->cell(50,6,$pdf->nbrcategorie('B',$ids).' : B',1,0,'C',1,0);
$pdf->cell(40,6,$pdf->nbrcategorie('A',$ids).' : A',1,0,'C',1,0);
$pdf->cell(20,6,'الصنف',1,0,'C',1,0);

$pdf->SetFont('aefurat', 'B', 14);
$pdf->SetXY(5,$pdf->GetY()+15);$pdf->Cell(100,5,'الجلفة في : ..............',0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(100,5,'مدير الصحة و السكان ',0,1,'C');
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
?>
