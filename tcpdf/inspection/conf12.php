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
$pdf->SetFont('aefurat', 'B', 12);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetLineWidth(0.4);
$pdf-> mysqlconnect(); 
$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$num=$rowx->NREALISATION;
$date=$rowx->REALISATION;
$num1=$rowx->NOUVERTURE;
$date1=$rowx->OUVERTURE;
$nom=$rowx->NOM;
$prenom=$rowx->PRENOM;
$nomar=$rowx->NOMAR;
$prenomar=$rowx->PRENOMAR;
$sexe=$rowx->SEX;
$DNS=$rowx->DNS;
$Mobile=$rowx->Mobile;
$DIPLOME=$rowx->DIPLOME;
$UNIV=$rowx->UNIV;
$NUMORDER=$rowx->NUMORDER;
$DATEORDER=$rowx->DATEORDER;
$NUMDEM=$rowx->NUMDEM;
$DATEDEM=$rowx->DATEDEM;

}

$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
while($rowy=mysql_fetch_object($requetey))
{
$NUMD=$rowy->NUMD;
$DATED=$rowy->DATED;
$DATEP=$rowy->DATEP;
$NAT=$rowy->NAT;
$PHA1=$rowy->PHA1;
$PHA2=$rowy->PHA2;
$PHA3=$rowy->PHA3;
$DIST1=$rowy->DIST1;
$DIST2=$rowy->DIST2;
$DIST3=$rowy->DIST3;
$CDS0=$rowy->CDS0;
$SDS0=$rowy->SDS0;
$SAH0=$rowy->SAH0;
$SAF0=$rowy->SAF0;
$SAN0=$rowy->SAN0;
$STL=$rowy->STL;
$adresse=$rowy->ADRESSE;
$adressear=$rowy->ADRESSEAR;


$idcommune=$rowy->COMMUNE;
$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowy->COMMUNE,'COMMUNE');
$communear=$pdf->nbrtostring('mvc','comar','IDCOM',$rowy->COMMUNE,'communear');
$wilaya=$pdf->nbrtostring('mvc','wil','IDWIL',$rowy->WILAYA,'WILAYAS');;
}
$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');

$pdf->setRTL($enable=true, $resetx=true);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(140,5,'مصلحة الهياكل و النشاط الصحي',0,0,'R');$pdf->cell(50,5,"الجلفة في : ".date('Y-m-d'),0,1,'L',0,0);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(140,5,'الرقم : .........../ م ص س / '.date('Y'),0,0,'R');
$pdf->SetXY(85,$pdf->GetY()+10);$pdf->Cell(120,5,'السيد مدير الصحة و الســـــــــكان',0,1,'C');
$pdf->SetXY(85,$pdf->GetY());$pdf->Cell(120,5,'الى',0,1,'C');
$pdf->SetXY(85,$pdf->GetY());$pdf->Cell(120,5,' السيـــــــــد ( ة ) : '.$nomar.' - '.$prenomar,0,1,'C');
$pdf->SetXY(85,$pdf->GetY());$pdf->Cell(120,5,$adressear. '  بلدية : '.$communear ,0,1,'C');
$pdf->SetXY(25,$pdf->GetY()+15);$pdf->Cell(20,5,'الموضوع :',0,0,'R');$pdf->Cell(180,5,'ف / ي  طلبكم المتعلق بتنصيب صيدلية ببلدية '.$communear,0,1,'R');
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,'تبعا لطلبكم المتعلق بتنصيب صيدلية  يشرفني ان اعلمكم بالموافقة المبدئية كما اطلب منكم تكملة ملفكم بالوثائق التالية',0,1,'R');
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(200,5,'في اجل 20 يوما والا سوف يلغى طلبكم ',0,1,'R');
$pdf->SetXY(30,$pdf->GetY()+5);$pdf->Cell(150,5,'- شهادة الميلاد',0,1,'R');
$pdf->SetXY(30,$pdf->GetY()+5);$pdf->Cell(150,5,'- شهادة الجنسية',0,1,'R');
$pdf->SetXY(30,$pdf->GetY()+5);$pdf->Cell(150,5,'- شهادة السوابق العدلية',0,1,'R');
if ($sexe=='M'){$pdf->SetXY(30,$pdf->GetY()+5);$pdf->Cell(150,5,'- الوضعية تجاه الخدمة الوطنية',0,1,'R');} 
$pdf->SetXY(30,$pdf->GetY()+5);$pdf->Cell(150,5,'- شهادت التسجيل في الفرع النضامي الجهوي للصيادلة ',0,1,'R');
$pdf->SetXY(30,$pdf->GetY()+5);$pdf->Cell(150,5,'- شهادة عدم الانتساب'.' (CNAS + CASNOS) ',0,1,'R');
$pdf->SetXY(30,$pdf->GetY()+5);$pdf->Cell(150,5,'- مفرر الاستقالة / مقرر الغلق ',0,1,'R');
$pdf->SetXY(30,$pdf->GetY()+5);$pdf->Cell(150,5,'- شهادة النجاح ',0,1,'R');
$pdf->SetXY(30,$pdf->GetY()+5);$pdf->Cell(150,5,'- شهادة طبية عامة و خاصة ',0,1,'R');
$pdf->SetXY(30,$pdf->GetY()+5);$pdf->Cell(150,5,'- صور شمسية 02 ',0,1,'R');
$pdf->SetXY(30,$pdf->GetY()+5);$pdf->Cell(150,5,'- عقد الكراء او الملكية ',0,1,'R');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(50,5,'تقبلوا تحيـــــــــــاتنا',0,1,'R');
$pdf->SetXY(120,$pdf->GetY()+5);$pdf->Cell(50,5,'مدير الصحة و الســــــــكان',0,1,'R');
$pdf->setRTL($enable=false, $resetx=true);



$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');
//$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'Inspection santé publique',0,1,'L');$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'مفتشية الصــــحة العموميـة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(150,5,"N° : ___________ /DSP/".date('Y'),0,0,'L',0,0);$pdf->cell(50,5,"Le : ".date('d-m-Y'),0,0,'L',0,0);
$pdf->SetXY(40,$pdf->GetY()+10);$pdf->cell(165,5,"Monsieur le Directeur de la sante et de la population de la wilaya de djelfa ",0,0,'C',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(165,5,"A",0,0,'C',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(165,5,"Monsieur le Directeur générale de la pharmacie et des équipements de santé ",0,0,'C',0,0);
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->cell(165,5,$pdf->mspfr,0,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+15);$pdf->cell(195,10,"BORDEREAU D'ENVOI",0,0,'C',1,0);
$pdf->SetXY(5,$pdf->GetY()+20);$pdf->cell(15,10,"N°",1,0,'C',1,0);$pdf->cell(105,10,"DESIGNATION",1,0,'C',1,0);$pdf->cell(15,10,"NBR",1,0,'C',1,0);$pdf->cell(60,10,"OBSERVATION",1,0,'C',1,0);
$pdf->RoundedRect($x=5, $y=$pdf->GetY()+10, $w=15, $h=130, $r=1, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=20, $y=$pdf->GetY()+10, $w=105, $h=130, $r=1, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=125, $y=$pdf->GetY()+10, $w=15, $h=130, $r=1, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=140, $y=$pdf->GetY()+10, $w=60, $h=130, $r=1, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(20,128);$pdf->cell(105,10,"Veuillez trouver ci-joint",0,0,'C',0,0);
$pdf->SetXY(5,148);$pdf->cell(15,10,"1",0,0,'C',0,0);
$pdf->SetXY(20,148);$pdf->cell(105,10,"Dossier d'installation du pharmacien",0,0,'L',0,0);$pdf->SetXY(5+15+105,148);
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->cell(105,10,$nom.'_'.$prenom,0,0,'L',0,0);
$pdf->SetXY(25,$pdf->GetY()+15);$pdf->cell(105,10,"- Demande manuscrite.",0,0,'L',0,0);
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->cell(105,10,"- Extrait de naissance.",0,0,'L',0,0);
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->cell(105,10,"- Casier judiciaire.",0,0,'L',0,0);
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->cell(105,10,"- Certificat de nationalité.",0,0,'L',0,0);
if ($sexe=='M'){$pdf->SetXY(25,$pdf->GetY()+5);$pdf->cell(105,10,"- Situation vis-à-vis du service national.",0,0,'L',0,0);} 
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->cell(105,10,"- Deux certificats médicaux de bonne santé Mg + Pn-Ph.",0,0,'L',0,0);
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->cell(105,10,"- Deux photos.",0,0,'L',0,0);
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->cell(105,10,"- Photocopie légalisée du diplôme.",0,0,'L',0,0);
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->cell(105,10,"- Inscription à la section ordinale des pharmaciens.",0,0,'L',0,0);
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->cell(105,10,"- Attestation de non affiliation CNAS + CASNOS.",0,0,'L',0,0);
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->cell(105,10,"- Acte de propriété ou contrat de location notarié.",0,0,'L',0,0);
$pdf->SetXY(25,$pdf->GetY()+5);$pdf->cell(105,10,"- Fiche technique d'inscription.",0,0,'L',0,0);

$pdf->SetXY(5+15+105,148);$pdf->cell(15,10,"1",0,0,'C',0,0);
$pdf->SetXY(5+30+105,148);$pdf->cell(65,10,"***",0,0,'C',0,0);
$pdf->SetXY(5+30+105,260);$pdf->cell(40,10,"Le Directeur",0,0,'L',0,0);
	
$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');
$pdf->setRTL($enable=true, $resetx=true);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(140,5,'مصلحة الهياكل و النشاط الصحي',0,0,'R');$pdf->cell(50,5,"الجلفة في : ".date('Y-m-d'),0,1,'L',0,0);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(140,5,'الرقم : .........../ م ص س / '.date('Y'),0,0,'R');
$pdf->setRTL($enable=false, $resetx=true);

//$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'Inspection santé publique',0,1,'L');$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'مفتشية الصــــحة العموميـة',0,1,'R');
//$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"N° : ___________ /".date('Y'),0,1,'L');//$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'الرقم : ___________/'.date('Y'),0,1,'R');
$pdf->SetXY(5,$pdf->GetY()+15);
$pdf->SetFont('aefurat', '', 16);$pdf->SetFillColor(245);
$pdf->Cell(200,5,"FICHE TECHNIQUE D'INSCRIPTION ",0,1,'C',1,1);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->Cell(200,5,"1 /Renseignements individuels du postulant : ",0,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(200,5,"- Nom et Prénom du Pharmacien : ".strtoupper($nom).'_'.strtolower ($prenom),0,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(200,5,"- Date de naissance : ".$pdf->dateUS2FR($DNS),0,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(200,5,"- Adresse : ".$adresse,0,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(200,5,"- Commune : ".$commune,0,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(200,5,"- Dairas : ***",0,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(200,5,"- N° de téléphone : ".$Mobile,0,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(200,5,"- Date d'obtention du diplome : ".$pdf->dateUS2FR($DIPLOME),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"2 /Date de depot de la demande : ".$pdf->dateUS2FR($DATED),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"3 /N° d'enregistrement sur le registre : ".$NUMD,0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"4 /Adresse du locale /site proposé : ".$adresse." Commune ".$commune,0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"5 /Date de visite /ou de creation du site : ".$pdf->dateUS2FR($DATEP),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"6 /Le cadre de l'installation : ",0,1,'L');
$pdf->SetFont('aefurat', 'U', 12);$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Si arrèté ",0,0,'L');$pdf->SetFont('aefurat', '', 12);
$distance = array ($DIST1,$DIST2,$DIST3) ;rsort($distance);
$pdf->SetXY(30,$pdf->GetY()); $pdf->Cell(200,5,": Nbr d'habitant : [".$pdf->nbrhabitcom("p2018",$idcommune)."]  Nbr D'officine : [".($pdf->nbrpharcom(12,$idcommune)-0)."]  Distance : ".$distance[0]." Conformité du locale : conforme",0,1,'L');
$pdf->SetFont('aefurat', 'U', 12);$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Si circulaire ",0,0,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(30,$pdf->GetY()); $pdf->Cell(200,5,": Criteres : obstacle ,distance par rapport a la pharmacie la plus proche ,population a couvrir ",0,1,'L');
$pdf->SetFont('aefurat', '', 12);

// if ($NAT==1) { $pdf->Cell(200,5,"FICHE TECHNIQUE DE TRANSFERT D'UNE OFFICINE DE PHARMACIE ",0,1,'C',1,1);}
// if ($NAT==2) { $pdf->Cell(200,5,"FICHE TECHNIQUE D'INSTALLATION D'UNE OFFICINE DE PHARMACIE ",0,1,'C',1,1);}
// if ($NAT==3) { $pdf->Cell(200,5,"FICHE TECHNIQUE D'OUVERTURE D'UNE OFFICINE DE PHARMACIE ",0,1,'C',1,1);}
// $pdf->SetFont('aefurat', '', 12);
// $pdf->SetXY(5,$pdf->GetY()+10); $pdf->Cell(200,5,"Pharmacien : ".strtoupper($nom).'_'.strtolower ($prenom),0,1,'L');
// $pdf->SetXY(5,$pdf->GetY()+5);  $pdf->Cell(200,5,"Objet de la demande N° : ".$NUMD." du ".$pdf->dateUS2FR($DATED),0,1,'L');
// $pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Local situé à : ",0,1,'L');
// $pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(75,5,"Adresse : ".$adresse,0,1,'L',1,1); 
// $pdf->SetXY(85,$pdf->GetY()-5.3); $pdf->Cell(50,5,"Commune : ".$commune,0,1,'L',1,1);
// $pdf->SetXY(140,$pdf->GetY()-5.3); $pdf->Cell(60,5,"Wilaya de ".$wilaya,0,1,'L',1,1);

// $pdf->SetXY(5,$pdf->GetY()+5);
// if ($NAT==1) { $pdf->Cell(200,5,"Cadre du transfert d'une officine de pharmacie : Numerus-clausus",0,1,'L');}
// if ($NAT==2) { $pdf->Cell(200,5,"Cadre d'installation d'une officine de pharmacie : Numerus-clausus",0,1,'L');}
// if ($NAT==3) { $pdf->Cell(200,5,"Cadre d'ouverture d'une officine de pharmacie : Numerus-clausus",0,1,'L');}
// $pdf->SetXY(5,$pdf->GetY()+ 5); $pdf->Cell(60,5,"Date d'inspection : ".$pdf->dateUS2FR($DATEP),0,1,'L');

// $pdf->SetFont('aefurat', 'U', 14);$pdf->SetXY(5,$pdf->GetY()+ 5); $pdf->Cell(60,5,"Constat :",0,1,'L');$pdf->SetFont('aefurat', '', 12);
// $pdf->SetXY(15,$pdf->GetY()+5);
// if ($NAT==1) { $pdf->Cell(150,5,"* Transfert d'une officine de pharmacie dans le cadre du Numerus-clausus",0,1,'L');}
// if ($NAT==2) { $pdf->Cell(150,5,"* Installation d'une officine de pharmacie dans le cadre du Numerus-clausus",0,1,'L');}
// if ($NAT==3) { $pdf->Cell(150,5,"* Ouverture d'une officine de pharmacie dans le cadre du Numerus-clausus",0,1,'L');}
// $pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(60,5,"* Local d'une superficie de ".$STL." M2",0,1,'L');
// $pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(60,5,"* Avec l'accord des officines les plus proches : ",0,1,'L');
// $pdf->SetXY(25,$pdf->GetY()+2); $pdf->Cell(10,5,"-",0,1,'L');$pdf->SetXY(30,$pdf->GetY()-5.7); $pdf->Cell(135,5,$PHA1,0,1,'L');$pdf->SetXY(165,$pdf->GetY()-5.7); $pdf->Cell(35,5,$DIST1." Mètres",0,1,'C');
// $pdf->SetXY(25,$pdf->GetY()+2); $pdf->Cell(10,5,"-",0,1,'L');$pdf->SetXY(30,$pdf->GetY()-5.7); $pdf->Cell(135,5,$PHA2,0,1,'L');$pdf->SetXY(165,$pdf->GetY()-5.7); $pdf->Cell(35,5,$DIST2." Mètres",0,1,'C');
// $pdf->SetXY(25,$pdf->GetY()+2); $pdf->Cell(10,5,"-",0,1,'L');$pdf->SetXY(30,$pdf->GetY()-5.7); $pdf->Cell(135,5,$PHA3,0,1,'L');$pdf->SetXY(165,$pdf->GetY()-5.7); $pdf->Cell(35,5,$DIST3." Mètres",0,1,'C');
// $pdf->SetFont('aefurat', 'U', 14);$pdf->SetXY(5,$pdf->GetY()+ 5); $pdf->Cell(60,5,"Conclusion :",0,1,'L');$pdf->SetFont('aefurat', '', 12);
// $pdf->SetXY(5,$pdf->GetY()+5); 
// if ($NAT==1) { $pdf->Cell(150,5,"Local proposé est conforme selon les condition de transfert d'une officine de pharmacie",0,1,'L');}
// if ($NAT==2) { $pdf->Cell(150,5,"Local proposé est conforme selon les condition de installation d'une officine de pharmacie",0,1,'L');}
// if ($NAT==3) { $pdf->Cell(150,5,"Local proposé est conforme selon les condition de ouverture d'une officine de pharmacie",0,1,'L');}
$pdf->SetXY(15,$pdf->GetY()+10); $pdf->Cell(60,5,"AVIS DE LA COMMISSION DE WILAYA (signature et griffe)",0,1,'L');
$pdf->SetXY(15,$pdf->GetY()+10); $pdf->Cell(60,5,"Le conseil de l'ordre",0,0,'L');
$pdf->SetXY(100,$pdf->GetY());   $pdf->Cell(60,5,"SNAPO",0,0,'L');
$pdf->SetXY(170,$pdf->GetY());   $pdf->Cell(60,5,"DSP ",0,1,'L');

$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'Inspection santé publique',0,1,'L');$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'مفتشية الصــــحة العموميـة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"N° : ___________ /".date('Y'),0,1,'L');//$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'الرقم : ___________/'.date('Y'),0,1,'R');
$pdf->SetFont('aefurat', '', 16);$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"PROCÉS VERBAL DE CONFORMITÉ D'UNE OFFICINE DE PHARMACIE",0,1,'C',1,1);
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"L'an deux mille ".$pdf->ANNEEFR($pdf->dateUS2FR($DATEP))." et le ".$pdf->JOURFR($pdf->dateUS2FR($DATEP))." du mois de ".$pdf->MOISFR($pdf->dateUS2FR($DATEP)),0,1,'L');
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Nous (Nom -Prénom-Grade) ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"TIBA Redha praticien inspecteur ( DSP DJELFA ) ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"LOUBACHRIA Benazzouz praticien pharmacien ( séction ordinale des pharmaciens de blida ) ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"En vertu de l'article 10 de l'arrété numéro 110 MSP/MIN du 27 novombre 1996 fixant les conditions ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"D'installation d'ouverture et de transfert d'une officine de pharmacie modifié et complété",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Et sur ordre de MR le directeur de la santé et de la population de la wilaya de Djelfa ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Avons effectué une visite de conformité du local situé à : ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(75,5,"Adresse : ".$adresse,0,1,'L',1,1); 
$pdf->SetXY(85,$pdf->GetY()-5.3); $pdf->Cell(50,5,"Commune : ".$commune,0,1,'L',1,1);
$pdf->SetXY(140,$pdf->GetY()-5.3); $pdf->Cell(60,5,"Wilaya de ".$wilaya,0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5);
if ($NAT==1) { $pdf->Cell(195,5,"Objet de la demande de transfert N°: ".$NUMD." du ".$pdf->dateUS2FR($DATED),0,1,'L',1,1);}
if ($NAT==2) { $pdf->Cell(195,5,"Objet de la demande d'installation N°: ".$NUMD." du ".$pdf->dateUS2FR($DATED),0,1,'L',1,1);}
if ($NAT==3) { $pdf->Cell(195,5,"Objet de la demande d'ouverture N°: ".$NUMD." du ".$pdf->dateUS2FR($DATED),0,1,'L',1,1);}
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(195,5,"Déposé par Mr /Mme /Melle : ".strtoupper($nom).'_'.strtolower ($prenom),0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Et avons relevé que le local est composé de : ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Salle des ventes (surface minimale admise 20 m2)",0,1,'L'); $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$CDS0." M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Bureau.",0,1,'L');                                          $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$SDS0." M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Salle de préparation.",0,1,'L');                            $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$SAH0." M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Salle de stockage.",0,1,'L');                               $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$SAF0." M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Sanitaires.",0,1,'L');                                      $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$SAN0." M2",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Le local s'étend sur une superficie de ".$STL." M2 (surface minimale admise 50 m2)",0,1,'L');

$pdf->AddPage();
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Etat des mures : ",0,1,'L');            $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Satisfaisant",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Etat des plafonds :",0,1,'L');          $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Satisfaisant",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Etat du sol : ",0,1,'L');               $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Satisfaisant",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Eclairage : ",0,1,'L');                 $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Aération : ",0,1,'L');                  $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Paillasses : ",0,1,'L');                $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Eau potable : ",0,1,'L');               $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Evacuation des eaux usées : ",0,1,'L'); $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Extincteur : ",0,1,'L');                $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Sortie de secours : ",0,1,'L');         $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->Cell(60,5,"Nous ci-dessous signataires confirmons par la présente les informations reprises sur ce PV ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->Cell(60,5,"Et donnons un avis  ",0,1,'L');        $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Favorable",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"Les agents de la santé ayant effectuées le mesurage : ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"_ _ _",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);
if ($NAT==1) { $pdf->Cell(195,5,"Le pharmacien demandeur de l'autorisation de transfert ",0,1,'L');}
if ($NAT==2){ $pdf->Cell(195,5,"Le pharmacien demandeur de l'autorisation d'installation",0,1,'L');}
if ($NAT==3) { $pdf->Cell(195,5,"Le pharmacien demandeur de l'autorisation d'ouverture ",0,1,'L');}
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"Mr /Mme /Melle : ".strtoupper($nom).'_'.strtolower ($prenom),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"NB: toute falsification du présent document et toute fausse déclaration entrainent l'annulation pure et simple",0,1,'L');
$pdf->SetXY(13,$pdf->GetY()+5);
if ($NAT==1) { $pdf->Cell(195,5,"de la décision de transfert sans préjudice des poursuites pénales prévus par",0,1,'L');}
if ($NAT==2) { $pdf->Cell(195,5,"de la décision d'installation sans préjudice des poursuites pénales prévus par",0,1,'L');}
if ($NAT==3) { $pdf->Cell(195,5,"de la décision d'ouverture sans préjudice des poursuites pénales prévus par",0,1,'L');}
$pdf->SetXY(13,$pdf->GetY()+5); $pdf->Cell(60,5,"la léglisation et la réglementation en vigueur .",0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Le Praticien Inspecteur ",0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Dr  TIBA ",0,1,'L'); 
$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'Inspection santé publique',0,1,'L');$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'مفتشية الصــــحة العموميـة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"N° : ___________ /".date('Y'),0,1,'L');//$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'الرقم : ___________/'.date('Y'),0,1,'R');
$pdf->SetFont('aefurat', '', 16);$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"PROCÉS VERBAL DE MESURAGE D'UNE OFFICINE DE PHARMACIE",0,1,'C',1,1);
$pdf->SetFont('aefurat', '', 14); 
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"L'an deux mille ".$pdf->ANNEEFR($pdf->dateUS2FR($DATEP))." et le ".$pdf->JOURFR($pdf->dateUS2FR($DATEP))." du mois de ".$pdf->MOISFR($pdf->dateUS2FR($DATEP)),0,1,'L');
$pdf->SetFont('aefurat', '', 12); 
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Nous (Nom -Prénom-Grade) ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"TIBA Redha praticien inspecteur ( DSP DJELFA )",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"LOUBACHRIA Benazzouz praticien pharmacien ( séction ordinale des pharmaciens de blida ) ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"En vertu de l'article 10 de l'arrété numéro 110 MSP/MIN du 27 novombre 1996 fixant les conditions ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"D'installation d'ouverture et de transfert d'une officine de pharmacie modifié et complété",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Et sur ordre de MR le directeur de la santé et de la population de la wilaya de Djelfa ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Avons procédé au mesurage des distances qui séparent les officines de pharmacie les plus proches ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Ainsi que la superficie du local situé à : ",0,1,'L');


$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(75,5,"Adresse : ".$adresse,0,1,'L',1,1); 
$pdf->SetXY(85,$pdf->GetY()-5.3); $pdf->Cell(50,5,"Commune : ".$commune,0,1,'L',1,1);
$pdf->SetXY(140,$pdf->GetY()-5.3); $pdf->Cell(60,5,"Wilaya de ".$wilaya,0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5);
if ($NAT==1) { $pdf->Cell(195,5,"Objet de la demande de transfert N°: ".$NUMD." du ".$pdf->dateUS2FR($DATED),0,1,'L',1,1);}
if ($NAT==2) { $pdf->Cell(195,5,"Objet de la demande d'installation N°: ".$NUMD." du ".$pdf->dateUS2FR($DATED),0,1,'L',1,1);}
if ($NAT==3) { $pdf->Cell(195,5,"Objet de la demande d'ouverture N°: ".$NUMD." du ".$pdf->dateUS2FR($DATED),0,1,'L',1,1);}
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Ont assisté à ces opérations le pharmacien demandeur ainsi que : ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(190,5,"Le pharmacien N°1 : ".$PHA1,0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+16); $pdf->Cell(190,5,"Le pharmacien N°2 : ".$PHA2,0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+16); $pdf->Cell(190,5,"Le pharmacien N°3 : ".$PHA3,0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+16); $pdf->Cell(60,5,"Le mesurage des distances a été effectuée à l'aide  d'un compteur kilométrique ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()); $pdf->Cell(60,5,"d'éxtrémité de façade du local au début de façade  de l'officine  la plus proche et a donné  ces résultats :",0,1,'L');
$pdf->AddPage();
$pdf->SetXY(10,$pdf->GetY());   $pdf->Cell(10,5,"N°",1,1,'L');$pdf->SetXY(20,$pdf->GetY()-5.7); $pdf->Cell(140,5,"Pharmaciens ",1,1,'C');$pdf->SetXY(160,$pdf->GetY()-5.7); $pdf->Cell(40,5,"Distance en métres ",1,1,'C');
$pdf->SetXY(10,$pdf->GetY()+2); $pdf->Cell(10,5,"01 ",1,1,'L');$pdf->SetXY(20,$pdf->GetY()-5.7); $pdf->Cell(140,5,$PHA1,1,1,'L');$pdf->SetXY(160,$pdf->GetY()-5.7); $pdf->Cell(40,5,$DIST1,1,1,'C');
$pdf->SetXY(10,$pdf->GetY()+2); $pdf->Cell(10,5,"02 ",1,1,'L');$pdf->SetXY(20,$pdf->GetY()-5.7); $pdf->Cell(140,5,$PHA2,1,1,'L');$pdf->SetXY(160,$pdf->GetY()-5.7); $pdf->Cell(40,5,$DIST2,1,1,'C');
$pdf->SetXY(10,$pdf->GetY()+2); $pdf->Cell(10,5,"03 ",1,1,'L');$pdf->SetXY(20,$pdf->GetY()-5.7); $pdf->Cell(140,5,$PHA3,1,1,'L');$pdf->SetXY(160,$pdf->GetY()-5.7); $pdf->Cell(40,5,$DIST3,1,1,'C');
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->Cell(195,5,"La superficie total du local est de ".$STL." M2 ",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(195,5,"La superficie de la surface de vente est de ".$CDS0." M2 ",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->Cell(60,5,"Nous ci-dessous signataires confirmons par la présente les informations reprises sur ce PV ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"Les agents de la santé ayant effectuées le mesurage",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);
if ($NAT==1) { $pdf->Cell(195,5,"Le pharmacien demandeur de l'autorisation de transfert",0,1,'L');}
if ($NAT==2) { $pdf->Cell(195,5,"Le pharmacien demandeur de l'autorisation d'installation",0,1,'L');}
if ($NAT==3) { $pdf->Cell(195,5,"Le pharmacien demandeur de l'autorisation d'ouverture",0,1,'L');}
$pdf->SetXY(10,$pdf->GetY()+5);
if ($NAT==1) { $pdf->Cell(195,5,"Les pharmaciens les plus proches du local objet  de la demande de transfert",0,1,'L');}
if ($NAT==2) { $pdf->Cell(195,5,"Les pharmaciens les plus proches du local objet  de la demande d'installation",0,1,'L');}
if ($NAT==3) { $pdf->Cell(195,5,"Les pharmaciens les plus proches du local objet  de la demande d'ouverture",0,1,'L');}
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->Cell(60,5,"NB: toute falsification du présent document et toute fausse déclaration entrainent l'annulation pure et simple",0,1,'L');
$pdf->SetXY(13,$pdf->GetY()+5);
if ($NAT==1) { $pdf->Cell(195,5,"de la décision de transfert sans préjudice des poursuites pénales prévus par",0,1,'L');}
if ($NAT==2) { $pdf->Cell(195,5,"de la décision d'installation sans préjudice des poursuites pénales prévus par",0,1,'L');}
if ($NAT==3) { $pdf->Cell(195,5,"de la décision d'ouverture sans préjudice des poursuites pénales prévus par",0,1,'L');}
$pdf->SetXY(13,$pdf->GetY()+5); $pdf->Cell(60,5,"la léglisation et la réglementation en vigueur .",0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Le Praticien Inspecteur ",0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Dr  TIBA ",0,1,'L');

$pdf->Output();
?>
