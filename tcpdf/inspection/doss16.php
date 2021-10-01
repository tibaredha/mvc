<?php
$ids=$_GET["ids"]; 
$idh=$_GET["idh"]; 
require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('dossier_medecin');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 12);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetLineWidth(0.4);$pdf->SetAutoPageBreak(TRUE, 0);
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
$nomar=$rowx->NOMAR;$prenomar=$rowx->PRENOMAR;
$nomfr=$rowx->NOM;$prenomfr=$rowx->PRENOM;
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
$pdf-> mysqlconnect();$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');
$pdf->SetFont('aefurat', '', 10);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"EXERCICE A TITRE LIBERAL DES PRATICIENS SPECIALISTES",1,1,'C');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"FORMULAIRE (A) : A REMPLIR PAR LE MEDECIN SPECIALISTE",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"NOM : ",0,0,'R');                          $pdf->Cell(120,5,$rowx->NOM,1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"PRENOM : ",0,0,'R');                       $pdf->Cell(120,5,$rowx->PRENOM,1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"DATE ET LIEU DE NAISSANCE : ",0,0,'R');    $pdf->Cell(120,5,$pdf->dateUS2FR($rowx->DNS)." à ".$pdf->nbrtostring('mvc','com','IDCOM',$rowx->COMMUNEN,'COMMUNE'),1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"ADRESSE : ",0,0,'R');                      $pdf->Cell(120,5,$rowx->ADRESSE,1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"TEL : ",0,0,'R');                          $pdf->Cell(120,5,$rowx->Mobile,1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"DIPLOME DE : ",0,0,'R');                   $pdf->Cell(120,5,$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"DATE D OBTENTION : ",0,0,'R');             $pdf->Cell(120,5,$pdf->dateUS2FR($rowx->DIPLOME),1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"LIEU D OBTENTION : ",0,0,'R');             $pdf->Cell(120,5,$rowx->UNIV,1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"INSTALLE EN CABINET LIBERAL A : ",0,0,'R');$pdf->Cell(120,5,"",1,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(80,5,"NON INSTALLE EXERCE A : ",0,0,'R');        $pdf->Cell(120,5,"",1,1,'L');
if ($NAT==1){
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'C');$pdf->Cell(190,5,"DEMANDE D'INSTALLATION EN CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(10,5,"X",1,0,'C');$pdf->Cell(190,5,"DEMANDE DE TRANSFER DE CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(10,5,"",1,0,'C');$pdf->Cell(190,5,"DEMANDE DE FERMETURE DE CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');	
}
if ($NAT==2){
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"X",1,0,'C');$pdf->Cell(190,5,"DEMANDE D'INSTALLATION EN CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(10,5,"",1,0,'C');$pdf->Cell(190,5,"DEMANDE DE TRANSFER DE CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(10,5,"",1,0,'C');$pdf->Cell(190,5,"DEMANDE DE FERMETURE DE CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');	
}
if ($NAT==3){
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"X",1,0,'C');$pdf->Cell(190,5,"DEMANDE D'INSTALLATION EN CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(10,5,"",1,0,'C');$pdf->Cell(190,5,"DEMANDE DE TRANSFER DE CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(10,5,"",1,0,'C');$pdf->Cell(190,5,"DEMANDE DE FERMETURE DE CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');	
}
if ($NAT==4){
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'C');$pdf->Cell(190,5,"DEMANDE D'INSTALLATION EN CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(10,5,"",1,0,'C');$pdf->Cell(190,5,"DEMANDE DE TRANSFER DE CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(10,5,"X",1,0,'C');$pdf->Cell(190,5,"DEMANDE DE FERMETURE DE CABINET SPECIALISE DE : ".$pdf->nbrtostring('mvc','specialite','idspecialite',$rowx->SPECIALITEX,'specialitefr'),0,1,'L');	
}

$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(40,5,"",0,0,'R');$pdf->Cell(40,5,"ACCOMPLI",0,0,'L');$pdf->Cell(10,5,"",1,0,'L');                      $pdf->SetXY(110,$pdf->GetY());$pdf->Cell(40,5,"",0,0,'R');$pdf->Cell(40,5,"ACCOMPLI",0,0,'L');$pdf->Cell(10,5,"",1,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(40,5,"SERVICE NATIONAL",0,0,'C');$pdf->Cell(40,5,"NON ACCOMPLI",0,0,'L');$pdf->Cell(10,5,"",1,0,'L');  $pdf->SetXY(110,$pdf->GetY());$pdf->Cell(40,5,"CERVICE CIVIL",0,0,'C');$pdf->Cell(40,5,"NON ACCOMPLI",0,0,'L');$pdf->Cell(10,5,"",1,1,'L');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(40,5,"",0,0,'R');$pdf->Cell(40,5,"EXEMPTE",0,0,'L');$pdf->Cell(10,5,"",1,0,'L');                       $pdf->SetXY(110,$pdf->GetY());$pdf->Cell(40,5,"",0,0,'R');$pdf->Cell(40,5,"EXEMPTE",0,0,'L');$pdf->Cell(10,5,"",1,1,'L');
$pdf->SetXY(110,$pdf->GetY()+5);$pdf->Cell(90,5,"LIEU D'ACCOMPLISSEMENT DU SERVICE NATIONAL :",0,0,'C');
$pdf->SetXY(110,$pdf->GetY()+5);$pdf->Cell(90,5,"......................................................................................",0,0,'C');
$pdf->SetXY(110,$pdf->GetY()+5);$pdf->Cell(90,5,"......................................................................................",0,1,'C');

if ($NAT==1){
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"",0,0,'R');                          $pdf->Cell(130,5,"DANS LA WILAYA DE : ",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'C'); $pdf->Cell(55,5,"DESIR",0,0,'C');                      $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"M'INSTALLER",0,0,'C');               $pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(10,5,"",0,0,'L'); $pdf->Cell(55,5,"DESIR",0,0,'C');                     $pdf->Cell(130,5,"DANS LA WILAYA DE : DJELFA",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"X",1,0,'C');  $pdf->Cell(55,5,"TRANSFERER",0,0,'C');               $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"MON CABINET VERS",0,0,'C');          $pdf->Cell(130,5,"DANS LA COMMUNE : ".$commune,0,0,'L');   
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(10,5,"",0,0,'L'); $pdf->Cell(55,5,"DEMANDE DE FERMETURE",0,0,'C');      $pdf->Cell(130,5,"DANS LA WILAYA DE :",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'L');  $pdf->Cell(55,5,"DE MON CABINET POUR",0,0,'C');       $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"POUR LES RAISONS SUIVANTES",0,0,'C');$pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,".........................................",0,0,'C');
}
if ($NAT==2){
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"",0,0,'R');                         $pdf->Cell(130,5,"DANS LA WILAYA DE : DJELFA",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"X",1,0,'C'); $pdf->Cell(55,5,"DESIR",0,0,'C');                     $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"M'INSTALLER",0,0,'C');               $pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(10,5,"",0,0,'L'); $pdf->Cell(55,5,"DESIR",0,0,'C');                     $pdf->Cell(130,5,"DANS LA WILAYA DE :",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'L');  $pdf->Cell(55,5,"TRANSFERER",0,0,'C');                $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"MON CABINET VERS",0,0,'C');          $pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(10,5,"",0,0,'L'); $pdf->Cell(55,5,"DEMANDE DE FERMETURE",0,0,'C');      $pdf->Cell(130,5,"DANS LA WILAYA DE :",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'L');  $pdf->Cell(55,5,"DE MON CABINET POUR",0,0,'C');       $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"POUR LES RAISONS SUIVANTES",0,0,'C');$pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,".........................................",0,0,'C');
}
if ($NAT==3){
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"",0,0,'R');                         $pdf->Cell(130,5,"DANS LA WILAYA DE : DJELFA",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'C'); $pdf->Cell(55,5,"DESIR",0,0,'C');                     $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"M'INSTALLER",0,0,'C');               $pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(10,5,"",0,0,'L'); $pdf->Cell(55,5,"DESIR",0,0,'C');                     $pdf->Cell(130,5,"DANS LA WILAYA DE :",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'L');  $pdf->Cell(55,5,"TRANSFERER",0,0,'C');                $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"MON CABINET VERS",0,0,'C');          $pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(10,5,"",0,0,'L'); $pdf->Cell(55,5,"DEMANDE DE FERMETURE",0,0,'C');      $pdf->Cell(130,5,"DANS LA WILAYA DE :",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'L');  $pdf->Cell(55,5,"DE MON CABINET POUR",0,0,'C');       $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"POUR LES RAISONS SUIVANTES",0,0,'C');$pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,".........................................",0,0,'C');
}
if ($NAT==4){
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"",0,0,'R');                         $pdf->Cell(130,5,"DANS LA WILAYA DE : ",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'C'); $pdf->Cell(55,5,"DESIR",0,0,'C');                     $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"M'INSTALLER",0,0,'C');               $pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(10,5,"",0,0,'L'); $pdf->Cell(55,5,"DESIR",0,0,'C');                     $pdf->Cell(130,5,"DANS LA WILAYA DE :",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",1,0,'L');  $pdf->Cell(55,5,"TRANSFERER",0,0,'C');                $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"MON CABINET VERS",0,0,'C');          $pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(10,5,"",0,0,'L'); $pdf->Cell(55,5,"DEMANDE DE FERMETURE",0,0,'C');      $pdf->Cell(130,5,"DANS LA WILAYA DE : DJELFA",0,0,'L');                    
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"X",1,0,'L');  $pdf->Cell(55,5,"DE MON CABINET POUR",0,0,'C');       $pdf->Cell(130,5,"DANS LA DAIRA DE :",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,"POUR LES RAISONS SUIVANTES",0,0,'C');$pdf->Cell(130,5,"DANS LA COMMUNE :",0,0,'L');   
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(10,5,"",0,0,'L');  $pdf->Cell(55,5,".........................................",0,0,'C');
}

$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,5,"---------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(100,5,"DATE DE LA DEMANDE",0,0,'C'); $pdf->Cell(95,5,"SIGNATURE DE LA DEMANDE",0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(100,5,$pdf->dateUS2FR($rowx->DATEDEM),0,0,'C');$pdf->Cell(95,5,"",0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,5,"---------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(100,5,"PARTIE RESERVEE A L'ADMINISTRATION ",0,0,'L'); 
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(100,5,"NUMERO DE LA DEMANDE : ".$rowx->NUMDEM,0,0,'L'); 
}
$pdf->dossier($DATEP);
$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');
$pdf->setRTL($enable=true, $resetx=true);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(140,5,'مصلحة الهياكل و النشاط الصحي',0,0,'R');$pdf->cell(50,5,"الجلفة في : ".date('Y-m-d'),0,1,'L',0,0);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(140,5,'الرقم : .........../ م ص س / '.date('Y'),0,0,'R');
$pdf->SetXY(85,$pdf->GetY()+5);$pdf->Cell(120,5,'السيد مدير الصحة و الســـــــــكان',0,1,'C');
$pdf->SetXY(85,$pdf->GetY()+2);$pdf->Cell(120,5,'الى',0,1,'C');
$pdf->SetXY(85,$pdf->GetY()+2);$pdf->Cell(120,5,' السيـــــــــد ( ة ) : '.$nomar.' - '.$prenomar,0,1,'C');
$pdf->SetXY(85,$pdf->GetY()+2);$pdf->Cell(120,5,$adressear. ' بلدية : '.$communear ,0,1,'C');
$pdf->SetXY(85,$pdf->GetY()+2);$pdf->Cell(120,5,'Tel : '.$Mobile ,0,1,'C');
$pdf->dossierm($NUMD,$DATED,$NAT,$communear,$sexe,"عيادة طبية متخصصة");
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
?>
