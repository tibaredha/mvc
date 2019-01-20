<?php
$id=$_GET["uc"]; 
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
$query_listex = "SELECT * FROM structure WHERE id  ='$id' ";
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,'Inspection santé publique',0,1,'L');$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'مفتشية الصــــحة العموميـة',0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"N° : ___________ /".date('Y'),0,1,'L');//$pdf->SetXY(155,$pdf->GetY()-5);$pdf->Cell(50,5,'الرقم : ___________/'.date('Y'),0,1,'R');

$pdf->SetFont('aefurat', '', 16);$pdf->SetFillColor(245);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"PROCÉS VERBAL DE CONFORMITÉ D'UNE OFFICINE DE PHARMACIE",0,1,'C',1,1);
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"L'an deux mille ".$pdf->ANNEEFR($_POST["DATEP"])." et le ".$pdf->JOURFR($_POST["DATEP"])." du mois de ".$pdf->MOISFR($_POST["DATEP"]),0,1,'L');
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Nous (Nom -Prénom-Grade) ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"--",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"--",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"En vertu de l'article 10 de l'arrété numéro 110 MSP/MIN du 27 novombre 1996 fixant les conditions ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"D'installation d'ouverture et de transfert d'une officine de pharmacie modifié et complété",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Et sur ordre de MR le directeur de la santé et de la population de la wilaya de Djelfa ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Avons effectué une visite de conformité du local situé à : ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(65,5,"Adresse : ".$_POST["ADRESSE"],0,1,'L',1,1); 
$pdf->SetXY(75,$pdf->GetY()-5.3); $pdf->Cell(60,5,"Commune : ".$pdf->nbrtostring('mvc','com','IDCOM',$_POST["COMMUNE"],'COMMUNE'),0,1,'L',1,1);
$pdf->SetXY(140,$pdf->GetY()-5.3); $pdf->Cell(60,5,"Wilaya de Djelfa",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5);
if ($_POST["NAT"]==1) { $pdf->Cell(195,5,"Objet de la demande de transfert N°: ".$_POST["NUMD"]." du ".$_POST["DATED"],0,1,'L',1,1);}
if ($_POST["NAT"]==2) { $pdf->Cell(195,5,"Objet de la demande d'installation N°: ".$_POST["NUMD"]." du ".$_POST["DATED"],0,1,'L',1,1);}
if ($_POST["NAT"]==3) { $pdf->Cell(195,5,"Objet de la demande d'ouverture N°: ".$_POST["NUMD"]." du ".$_POST["DATED"],0,1,'L',1,1);}
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(195,5,"Déposé par Mr /Mme /Melle : ".strtoupper($rowx->NOM).'_'.strtolower ($rowx->PRENOM),0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Et avons relevé que le local est composé de : ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Salle des ventes (surface minimale admise 20 m2)",0,1,'L');$pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$_POST["SDV"]." M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Bureau.",0,1,'L');                                          $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$_POST["BUR"]." M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Salle de préparation.",0,1,'L');                            $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$_POST["SDP"]." M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Salle de stockage.",0,1,'L');                               $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$_POST["SDS"]." M2",0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"* Sanitaires.",0,1,'L');                                     $pdf->SetXY(140,$pdf->GetY()-5); $pdf->Cell(60,5,"Surface : ".$_POST["SAN"]." M2",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Le local s'étend sur une superficie de ".$_POST["STL"]." M2 (surface minimale admise 50 m2)",0,1,'L');

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
if ($_POST["NAT"]==1) { $pdf->Cell(195,5,"Le pharmacien demandeur de l'autorisation de transfert ",0,1,'L');}
if ($_POST["NAT"]==2) { $pdf->Cell(195,5,"Le pharmacien demandeur de l'autorisation d'installation",0,1,'L');}
if ($_POST["NAT"]==3) { $pdf->Cell(195,5,"Le pharmacien demandeur de l'autorisation d'ouverture ",0,1,'L');}
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"Mr /Mme /Melle :".strtoupper($rowx->NOM).'_'.strtolower ($rowx->PRENOM),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"NB: toute falsification du présent document et toute fausse déclaration entrainent l'annulation pure et simple",0,1,'L');
$pdf->SetXY(13,$pdf->GetY()+5);
if ($_POST["NAT"]==1) { $pdf->Cell(195,5,"de la décision de transfert sans préjudice des poursuites pénales prévus par",0,1,'L');}
if ($_POST["NAT"]==2) { $pdf->Cell(195,5,"de la décision d'installation sans préjudice des poursuites pénales prévus par",0,1,'L');}
if ($_POST["NAT"]==3) { $pdf->Cell(195,5,"de la décision d'ouverture sans préjudice des poursuites pénales prévus par",0,1,'L');}
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
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"L'an deux mille ".$pdf->ANNEEFR($_POST["DATEP"])." et le ".$pdf->JOURFR($_POST["DATEP"])." du mois de ".$pdf->MOISFR($_POST["DATEP"]),0,1,'L');
$pdf->SetFont('aefurat', '', 12); 
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Nous (Nom -Prénom-Grade) ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"--",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"--",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"En vertu de l'article 10 de l'arrété numéro 110 MSP/MIN du 27 novombre 1996 fixant les conditions ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"D'installation d'ouverture et de transfert d'une officine de pharmacie modifié et complété",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Et sur ordre de MR le directeur de la santé et de la population de la wilaya de Djelfa ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Avons procédé au mesurage des distances qui séparent les officines de pharmacie les plus proches ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(200,5,"Ainsi que la superficie du local situé à : ",0,1,'L');


$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(65,5,"Adresse : ".$_POST["ADRESSE"],0,1,'L',1,1); 
$pdf->SetXY(75,$pdf->GetY()-5.3); $pdf->Cell(60,5,"Commune : ".$pdf->nbrtostring('mvc','com','IDCOM',$_POST["COMMUNE"],'COMMUNE'),0,1,'L',1,1);
$pdf->SetXY(140,$pdf->GetY()-5.3); $pdf->Cell(60,5,"Wilaya de Djelfa",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5);
if ($_POST["NAT"]==1) { $pdf->Cell(195,5,"Objet de la demande de transfert N°: ".$_POST["NUMD"]." du ".$_POST["DATED"],0,1,'L',1,1);}
if ($_POST["NAT"]==2) { $pdf->Cell(195,5,"Objet de la demande d'installation N°: ".$_POST["NUMD"]." du ".$_POST["DATED"],0,1,'L',1,1);}
if ($_POST["NAT"]==3) { $pdf->Cell(195,5,"Objet de la demande d'ouverture N°: ".$_POST["NUMD"]." du ".$_POST["DATED"],0,1,'L',1,1);}
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(60,5,"Ont assisté à ces opérations le pharmacien demandeur ainsi que : ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(190,5,"Le pharmacien N°1 : ".$_POST["PHA1"],0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+16); $pdf->Cell(190,5,"Le pharmacien N°2 : ".$_POST["PHA2"],0,1,'L',1,1);
$pdf->SetXY(10,$pdf->GetY()+16); $pdf->Cell(190,5,"Le pharmacien N°3 : ".$_POST["PHA3"],0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+16); $pdf->Cell(60,5,"Le mesurage des distances a été effectuée à l'aide  d'un compteur kilométrique ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY()); $pdf->Cell(60,5,"d'éxtrémité de façade du local au début de façade  de l'officine  la plus proche et a donné  ces résultats :",0,1,'L');

$pdf->AddPage();
$pdf->SetXY(10,$pdf->GetY()); $pdf->Cell(10,5,"N°",1,1,'L');$pdf->SetXY(20,$pdf->GetY()-5.7); $pdf->Cell(140,5,"Pharmaciens ",1,1,'C');$pdf->SetXY(160,$pdf->GetY()-5.7); $pdf->Cell(40,5,"Distance en métres ",1,1,'C');
$pdf->SetXY(10,$pdf->GetY()+2); $pdf->Cell(10,5,"01 ",1,1,'L');$pdf->SetXY(20,$pdf->GetY()-5.7); $pdf->Cell(140,5,$_POST["PHA1"],1,1,'L');$pdf->SetXY(160,$pdf->GetY()-5.7); $pdf->Cell(40,5,$_POST["DIST1"],1,1,'C');
$pdf->SetXY(10,$pdf->GetY()+2); $pdf->Cell(10,5,"02 ",1,1,'L');$pdf->SetXY(20,$pdf->GetY()-5.7); $pdf->Cell(140,5,$_POST["PHA2"],1,1,'L');$pdf->SetXY(160,$pdf->GetY()-5.7); $pdf->Cell(40,5,$_POST["DIST2"],1,1,'C');
$pdf->SetXY(10,$pdf->GetY()+2); $pdf->Cell(10,5,"03 ",1,1,'L');$pdf->SetXY(20,$pdf->GetY()-5.7); $pdf->Cell(140,5,$_POST["PHA3"],1,1,'L');$pdf->SetXY(160,$pdf->GetY()-5.7); $pdf->Cell(40,5,$_POST["DIST3"],1,1,'C');
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->Cell(195,5,"La superficie total du local est de ".$_POST["STL"]." M2 ",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(195,5,"La superficie de la surface de vente est de ".$_POST["SDV"]." M2 ",0,1,'L',1,1);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->Cell(60,5,"Nous ci-dessous signataires confirmons par la présente les informations reprises sur ce PV ",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5); $pdf->Cell(60,5,"Les agents de la santé ayant effectuées le mesurage",0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);
if ($_POST["NAT"]==1) { $pdf->Cell(195,5,"Le pharmacien demandeur de l'autorisation de transfert",0,1,'L');}
if ($_POST["NAT"]==2) { $pdf->Cell(195,5,"Le pharmacien demandeur de l'autorisation d'installation",0,1,'L');}
if ($_POST["NAT"]==3) { $pdf->Cell(195,5,"Le pharmacien demandeur de l'autorisation d'ouverture",0,1,'L');}
$pdf->SetXY(10,$pdf->GetY()+5);
if ($_POST["NAT"]==1) { $pdf->Cell(195,5,"Les pharmaciens les plus proches du local objet  de la demande de transfert",0,1,'L');}
if ($_POST["NAT"]==2) { $pdf->Cell(195,5,"Les pharmaciens les plus proches du local objet  de la demande d'installation",0,1,'L');}
if ($_POST["NAT"]==3) { $pdf->Cell(195,5,"Les pharmaciens les plus proches du local objet  de la demande d'ouverture",0,1,'L');}
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->Cell(60,5,"NB: toute falsification du présent document et toute fausse déclaration entrainent l'annulation pure et simple",0,1,'L');
$pdf->SetXY(13,$pdf->GetY()+5);
if ($_POST["NAT"]==1) { $pdf->Cell(195,5,"de la décision de transfert sans préjudice des poursuites pénales prévus par",0,1,'L');}
if ($_POST["NAT"]==2) { $pdf->Cell(195,5,"de la décision d'installation sans préjudice des poursuites pénales prévus par",0,1,'L');}
if ($_POST["NAT"]==3) { $pdf->Cell(195,5,"de la décision d'ouverture sans préjudice des poursuites pénales prévus par",0,1,'L');}
$pdf->SetXY(13,$pdf->GetY()+5); $pdf->Cell(60,5,"la léglisation et la réglementation en vigueur .",0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Le Praticien Inspecteur ",0,1,'L');
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(200,5,"Dr  TIBA ",0,1,'L');
}
$pdf->Output();
?>
