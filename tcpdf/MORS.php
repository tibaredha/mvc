<?php
// if ($_GET['MODESORTI'] =='') {
$id=$_POST["id"];
// $iddnr=$_POST["iddnr"];
require('PDF0.php');
$pdf = new PDF0( 'P', 'mm', 'A5',true,'UTF-8',false );
// $pdf->SetTextColor(0,0,255);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage('P','A5');
//$pdf->setRTL(true); 
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->Rect(77, 1, 70, 100,"d");
$pdf->Rect(1, 1, 70, 100,"d");
$pdf->SetFont('aefurat', '', 6);
$pdf->Text(82,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE ");
$pdf->Text(84,15,"ETABLISSEMENT PUBLIC HOSPITALIER AIN OUSSERA ");
$pdf->Line(80 ,23 ,145 ,23 );
$pdf->SetFont('aefurat','B',13);
$pdf->Text(95,45,"CARTE SUIVI");
$pdf->Text(79,50,"VACCINATION ANTIRABIQUE");
$pdf->SetFont('aefurat','B',8);
$pdf->Text(86,60,"service des urgences medico-chirurgicales");
$pdf->SetFont('aefurat','B',7);
$pdf->Text(80,94,"Numéro d'identification du malade: ");//
$pdf->Text(80,98,"Delivrée le: ");
$pdf->Text(5,5,"ref instruction n 1824 MSPRH  DU 26/10/2004 ");
$pdf->Text(5,$pdf->GetY()+5,"relative a la conduite a tenire en cas de morssure ");
$pdf->Text(5,$pdf->GetY()+5,"NB meme sur presentation du carnet de vaccination ");
$pdf->Text(5,$pdf->GetY()+5,"de l animal il faut toujours mettre en observation   ");
$pdf->Text(5,$pdf->GetY()+5,"l animal mordeur pendant 15 jours et paratiquer ");
$pdf->Text(5,$pdf->GetY()+5,"la vaccination anti rabique j usqu au 15 eme ");
$pdf->Text(5,$pdf->GetY()+5,"jours d observation si l animal mordeur est sain  ");
$pdf->Text(5,$pdf->GetY()+5,"interompre la vaccination si la rage animal est confirme ");
$pdf->Text(5,$pdf->GetY()+5,"poursuivre la vaccination ");
$pdf->Text(5,$pdf->GetY()+5," NB toute interuption de la vaccination ");
$pdf->Text(5,$pdf->GetY()+5,"  pour le vaccin preparer ");
$pdf->Text(5,$pdf->GetY()+5,"sur cerveau de souriceaux nouveaux nees ");
$pdf->Text(5,$pdf->GetY()+5,"le reprendre au debut");
$pdf->Text(5,$pdf->GetY()+5,"centre de vaccination anti rabique : benkous brahim");
$pdf->Text(5,$pdf->GetY()+5,"trt adjuvant :antibio therapie + vaccination dta/dte   ");
$pdf->Text(5,$pdf->GetY()+5,"selon le risque  ");
$pdf->AddPage('P','A5');

$pdf->mysqlconnect();
$query = "select * from pat WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$A = substr($result->DATENAISSANCE,6,4);$AGE    = date("Y")-$A;
$pdf->SetFont('aefurat', '', 6);
$pdf->RAGE($AGE,70,1);//1ere var=age 2eme var=poid 3eme var=serovaccination
$pdf->SetFont('aefurat', '', 10);
$i=9;
$pdf->Text(5,10,"Grade : (".$_POST["CLASSE"].")");
$pdf->Text(5,$pdf->GetY()+$i,"NOM : ".trim($result->NOM));
$pdf->Text(5,$pdf->GetY()+$i,"PRENOM : ".trim($result->PRENOM));
$pdf->Text(5,$pdf->GetY()+$i,"AGE : ".$AGE.' Ans');
$pdf->Text(5,$pdf->GetY()+$i,"ADRESSE : ".trim($result->ADRESSE));
}
$pdf->Text(5,$pdf->GetY()+$i,"POIDS : KG");
$pdf->Text(5,$pdf->GetY()+$i,"DATE CONATAMINATION : ".$_POST["DATE"]);
$pdf->Text(5,$pdf->GetY()+$i,"ANIMALE : ".$_POST["ANIMAL"]);
$pdf->Text(5,$pdf->GetY()+$i,"MEDECIN : DR TIBA");
$pdf->Output();
//insertion dans la base de donnees rab
mysqlconnect();
// $age=substr(date('Y-m-d'),0,4)-substr($_POST['dns'],6,4);
// $sqls = "INSERT INTO rab( idpat,datescor,heurescor,age,sexe,siege,lieux,classe,NBBRSAS,wil,com ) 
// VALUES ('".$id."','".dateFR2US($_POST['DATE'])."','".$_POST['HDA']."','".$age."','".$_POST['sexe']."','".$_POST['SIEGE']."','".$_POST['INTEXT']."','".$_POST['CLASSE']."','".$_POST['NBRAMP']."','".$_POST['WILAYAN']."','".$_POST['COMMUNEN']."')";
// $requete = @mysql_query($sqls) or die($sql."<br>".mysql_error()); 



// }
// else
// {
// header('location: ../Pat/view/'.$_GET['iddnr']);
// }


?>


