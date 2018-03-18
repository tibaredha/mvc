<?php
$per -> sautligne (10);
// Si pas de date demandée, aujoud'hui par défaut
if (isset($_GET['mois'])) 
{ 
$mois = $_GET['mois']; 
} 
else 
{ $mois = date("n"); 
}
if (isset($_GET['an'])) 
{ 
$an = $_GET['an']; } 
else
{
$an = date("Y");
}
$jour = date("d");
//------------------------------------------- Tableau------------------------------------------// 
echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"9\" class=\"tableaux_centrer\" width=\"700\">\n";
// ----------------------- Navigation / prec. | mois affiché | suiv. -------------------------//
if ($mois == 1) 
{
$prec = "index.php?uc=calendrier&mois=12&an=".($an-1);
}
else 
{
$prec = "index.php?uc=calendrier&mois=".($mois-1)."&an=".$an; 
}


if ($mois == 12)
{ 
$suiv = "index.php?uc=calendrier&mois=1&an=".($an+1);
}
else 
{
$suiv = "index.php?uc=calendrier&mois=".($mois+1)."&an=".$an;
}
echo "<tr class=\"calendar\"><td><a href=".$prec."><img src='./images/b_firstpage.png' width='16' height='16' border='0' alt=''/></a></td><td colspan=\"5\">".$an." ".$per ->nbrtomois ($mois)."</td><td><a href=".$suiv."><img src='./images/b_lastpage.png' width='16' height='16' border='0' alt=''/></td></tr>\n";
// ----------------------- Affichage calendrier -------------------------------------------------//
// Premier jour et nb de jour du mois demandé
$debut = mktime(0,0,0,$mois,1,$an);    
$premJour = date("w" , $debut );   //1er jour dans la grille 
$nbJours = date("t" , $debut);    // nb de jours dans le mois
$numero_semaine=date("W");         //nbr de semaine 
$jour_semaine=date("w",mktime(0,0,0,$mois,1,$an)); // Jour de la semaine au format numérique 0 (pour dimanche) à 6 (pour samedi)
echo "<tr class=\"calendar1\"><td>الاثنين</td><td>الثلاثاء</td><td>الأربعاء</td><td>الخميس</td><td>الجمعة</td><td>السبت</td><td>الاحد</td></tr>\n";
$nbEmptyCells = ($premJour + 6)%7;
echo "<tr>" ;
// Affichage des premières cellules vides
for ($i=1;$i<=$nbEmptyCells;$i++) {
    echo "<td class=\"cell_vide\">&nbsp;</td>\n";
}
// Affichage des jours du mois
for ($i=1;$i<=$nbJours;$i++) {
    // Dimanche
    $dimanche=($i+$jour_semaine-1)%7;
    // test si jour d'aujourd'hui
    if ( $i==$jour && $mois == date("m") && $an == date("Y") ) {
	$day_link = "<a class=\"todaya\" href=\"./index.php?uc=calendrier&jour=$i&mois=$mois&an=$an \" >$i  </a> ".$per ->nbre ($mois,$i,$an)."   ";
        echo "<td class=\"today\">".$day_link."</td>\n";
    }
    else if ($dimanche==0) {
	$day_link = "<a href=\"./index.php?uc=calendrier&jour=$i&mois=$mois&an=$an \" >$i   </a> ".$per ->nbre ($mois,$i,$an)." ";
        echo "<td class=\"dimanche\">".$day_link."</td>\n";    
    }
    else {
	// ECHO $date = mktime(0, 0, 0, $mois, $i, $an);
	$day_link = "<a href=\"./index.php?uc=calendrier&jour=$i&mois=$mois&an=$an \" >$i  </a>  ".$per ->nbre ($mois,$i,$an)."   ";
	echo "<td class=\"calendar\">".$day_link."</td>\n";
    }
    // Changement de ligne
    if ( ($i+$nbEmptyCells)%7 == 0 ) {
        echo "</tr>\n<tr>";
    }
}
// Affichage des dernières cellules vides
$nbEmptyCells = 7 - ($nbEmptyCells + $nbJours)%7;
if ($nbEmptyCells < 7) {
    for ($i=1;$i<=$nbEmptyCells;$i++) {
        echo "<td class=\"cell_vide\">&nbsp;</td>\n";
    }
    echo "</tr>\n";
}
// if ($mois == date("n") and $an == date("Y") ) {
   // echo "<tr><td colspan=\"7\" class=\"calendar\">".$numero_semaine."  أسبوع رقم  </td></tr>\n";
// }
echo "</table>\n";
//**************************************************************************************************//


if (isset($_GET['jour'])) 
{
$datejour=$_GET['jour']  ;
}
else
{
$datejour=date('d');
}
if (isset($_GET['mois'])) 
{
$datemois=$_GET['mois']  ;
}
else
{
$datemois=date('m');
}

if (isset($_GET['an'])) 
{
$datean=$_GET['an']  ;
}
else
{
$datean=date('Y');
}


$dateseconde=mktime(0, 0, 0, $datemois, $datejour, $datean);
//uc=adevent&a=add_events&date=
$per ->f0("index.php?uc=adevent&date=$dateseconde",'post');


$x=265;
$per ->h(2,1100,180,'اخذ موعد');
$per ->label(1200+50+20,$x,'عنوان');      $per ->txtar(1050+20,$x,'titre',20,"");
$per ->label(1200+50+20,$x+30,'نوع');     $per ->combo(1050+20,$x+30,"type","grh","agenda_theme","-----","****","id","TYPEAR");
$per ->label(1200+50+20,$x+60,'النص');    $per ->textarea1(1050+20,$x+60,"texte",2,20);
$per ->submit(1050+20,$x+120,'Envoyer');
$per ->hide(595,$x+90,'datejour',20,$datejour); 
$per ->hide(595,$x+90,'datemois',20,$datemois); 
$per ->hide(595,$x+90,'datean',20,$datean); 
$per ->f1();
$per -> sautligne (1);
$per ->rdv1 ($dateseconde);


// ----------------------- Fin Affichage calendrier -----------------------
?>
       
