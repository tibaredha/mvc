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
$pdf->setRTL($enable=false, $resetx=true);
$pdf->SetFont('aefurat', '', 14);$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"PROCÉS VERBAL DE CONFORMITÉ D'UNE ENTREPRISE ",0,1,'C',1,1);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"DE PRODUCTION ET/OU DE DISTRIBUTION DE PRODUITS PHARMACEUTIQUES ",0,1,'C',1,1);
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"L'an deux mille ".$pdf->ANNEEFR($pdf->dateUS2FR($DATEP))." et le ".$pdf->JOURFR($pdf->dateUS2FR($DATEP))." du mois de ".$pdf->MOISFR($pdf->dateUS2FR($DATEP)),0,1,'L');
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Nous (Nom -Prénom-Grade) ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"TIBA Redha praticien inspecteur ( DSP DJELFA )",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"LOUBACHRIA Benazzouz praticien pharmacien ( séction ordinale des pharmaciens de blida ) ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"--",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"--",0,1,'L');

$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"En vertu du Déc exé n° 93-114 du 12 mai 1993 modifiant et complétant le Déc exé n° 92-285 du 6 juillet 1992 ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"relatif à l'autorisation d'exploitation d'un établissement de production ou de distribution de produits pharmaceutiques",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Et sur ordre de MR le directeur de la santé et de la population de la wilaya de Djelfa ",0,1,'L');

$pdf->SetXY(5,$pdf->GetY()+5);     $pdf->Cell(200,5,"Avons effectué une visite de conformité du local situé à : ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5);     $pdf->Cell(85,5,"Adresse : ".$adresse,0,1,'L',1,1); 
$pdf->SetXY(95,$pdf->GetY()-5.3);  $pdf->Cell(50,5,"Commune : ".$commune,0,1,'L',1,1);
$pdf->SetXY(150,$pdf->GetY()-5.3); $pdf->Cell(50,5,"Wilaya de ".$wilaya,0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5);
if ($NAT==1) { $pdf->Cell(195,5,"Objet de la demande de transfert N°: ".$NUMD." du ".$pdf->dateUS2FR($DATED),0,1,'L',1,1);}
if ($NAT==2) { $pdf->Cell(195,5,"Objet de la demande d'installation N°: ".$NUMD." du ".$pdf->dateUS2FR($DATED),0,1,'L',1,1);}
if ($NAT==3) { $pdf->Cell(195,5,"Objet de la demande d'ouverture N°: ".$NUMD." du ".$pdf->dateUS2FR($DATED),0,1,'L',1,1);}
if ($NAT==4) { $pdf->Cell(195,5,"Objet de la demande de changement du directeur technique  N°: ".$NUMD." du ".$pdf->dateUS2FR($DATED),0,1,'L',1,1);}
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(195,5,"Déposé par Mr /Mme /Melle : ".strtoupper($nom).'_'.strtolower ($prenom),0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Et avons relevé que le local est composé de : ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Bureau 1 :",0,1,'L');                $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$CDS0."   M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Bureau 2 :",0,1,'L');                $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$SDS0."   M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Bureau 3 :",0,1,'L');                $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$SAH0."   M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Bureau 4 :",0,1,'L');                $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$SAF0."   M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Réception : ",0,1,'L');              $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$SAN0."   M2",0,1,'L',1,1);
$pdf->AddPage();
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Depot : ",0,1,'L');                  $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface :    M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Sanitaires : ",0,1,'L');             $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface :    M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Zone de quarantaine : ",0,1,'L');    $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface :    M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Zone de produits réceptionnés : ",0,1,'L');$pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface :    M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Zone de produits refusés : ",0,1,'L');$pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface :    M2",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Le local s'étend sur une superficie de ".$STL." M2 (surface minimale admise 300 m2)",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Etat des mures : ",0,1,'L');            $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Satisfaisant",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Etat des plafonds :",0,1,'L');          $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Satisfaisant",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Etat du sol : ",0,1,'L');               $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Satisfaisant",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Eclairage : ",0,1,'L');                 $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Aération : ",0,1,'L');                  $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Climatisation : ",0,1,'L');             $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Eau potable : ",0,1,'L');               $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Evacuation des eaux usées : ",0,1,'L'); $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Extincteur : ",0,1,'L');                $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Sortie de secours : ",0,1,'L');         $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Oui",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->Cell(60,5,"Nous ci-dessous signataires confirmons par la présente les informations reprises sur ce PV ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->Cell(60,5,"Et donnons un avis  ",0,1,'L');        $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Favorable",0,1,'L',1,1);

$pdf->SetXY(10,$pdf->GetY()+15);$pdf->Cell(100,5,"La direction de la santé et de la population   ",0,0,'L');$pdf->Cell(100,5,"Le conseil de l'ordre des pharmaciens ",0,1,'L');

$pdf->SetXY(10,$pdf->GetY()+20);$pdf->Cell(100,5,"La direction de L'industrie ",0,0,'L');$pdf->Cell(100,5,"La direction du commerce ",0,1,'L');

// $pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Dr  TIBA ",0,1,'L'); 
$pdf->Output();
?>
