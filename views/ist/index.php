<?php 
verifsession();	
view::button('eva','');

function collecte($colone0,$colone1,$colone2,$datejour1,$datejour2)
{
// $COLONESRS='';SRS='$COLONESRS'  and
mysqlconnect();
$sql = " select TDNR,STR,DATEDON,IND,TDON,SRS from don where   TDON='$colone0' and TDNR='$colone1'and STR='$colone2'and DATEDON >='$datejour1'and DATEDON <='$datejour2' and IND='IND'";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$collecte=mysql_num_rows($requete);
mysql_free_result($requete);
return $collecte;
}

// echo $a;
function ligne($name,$label,$value) 
{
echo "<tr><td>
<label for=\"$name\">$label</label>
</td>
<td align=\"center\"  >
<input type=\"text\" name=\"$name\" value=\"$value\" />
</td>
</tr>";	
}
function ligne1($name,$label,$colspan) 
{
echo "<tr   ><td  colspan=\"".$colspan."\"   >
<label for=\"$name\">$label</label>
</td>

</tr>";	
}
function ligne4($name,$label,$value1,$value2,$value3) 
{
echo "
<tr>
<td>
<label for=\"$name\">$label</label>
</td>
<td>
<input type=\"text\" name=\"$name\" value=\"$value1\" />
</td>
<td>
<input type=\"text\" name=\"$name\" value=\"$value2\" />
</td>
<td>
<input type=\"text\" name=\"$name\" value=\"$value3\" />
</td>

</tr>
";	
}

function ligne3($name,$label,$value1,$value2) 
{
echo "
<tr>
<td>
<label for=\"$name\">$label</label>
</td>
<td align=\"center\" >
<input type=\"text\" name=\"$name\" value=\"$value1\" />
</td>
<td align=\"center\" >
<input type=\"text\" name=\"$name\" value=\"$value2\" />
</td>
</tr>
";	
}


function ligne5($name,$label,$value1,$value2,$value3,$value4) 
{
echo "
<tr>
<td>
<label for=\"$name\">$label</label>
</td>
<td align=\"center\"  >
<input  type=\"text\" name=\"$name\" value=\"$value1\" />
</td>
<td align=\"center\" >
<input type=\"text\" name=\"$name\" value=\"$value2\" />
</td>
<td align=\"center\" >
<input type=\"text\" name=\"$name\" value=\"$value3\" />
</td>
<td align=\"center\">
<input type=\"text\" name=\"$name\" value=\"$value4\" />
</td>
</tr>
";	
}

?>
<h2> Indicateurs de sécurité transfusionnelle  </h2 >
<br /><br />
<hr /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<tr align="left"   > 
	<th colspan="2"    >RENSEINEMENTS ADMINISTRATIFS</th>	
</tr>
<?php  
ligne("rrr","Date du rapport",date('Y-m-d')) ;
ligne("rrr","Pays","Algerie") ;
ligne("rrr","Nom","tiba") ;
ligne("rrr","Titre","") ;
ligne("rrr","Fonction","") ;
ligne("rrr","Organisation","etablissement public hospitalier") ;
ligne("rrr","Adresse","ain oussera djelfa") ;
ligne("rrr","Numéro de téléphone","027822780") ;
ligne("rrr","Numéro de Fax","027822780") ;
ligne("rrr","E-mail","tibaredha@yahoo.fr") ;
ligne("rrr","Période couverte par le rapport","") ;
ligne("rrr","Population totale (donner l’année et la source)","") ;
?>
</table>

<br /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<tr align="left" > 
	<th colspan="2"  >A ETABLISSEMENTS DE COLLECTE ET D’APPROVISIONNEMENT EN SANG</th>
	
</tr>
<?php
ligne1("rrr","1 Nombre de centre de transfusion dans le pays",2) ; 
ligne("rrr","1.1 Centres de Transfusion indépendants","") ;
ligne("rrr","1.2 Centres de transfusion bases à l’hôpital","") ;
ligne("rrr","1.3 Total","") ;

ligne1("rrr","2 Nombre de Centre de transfusion couverts par le rapport",2) ;
ligne("rrr","2.1 Centres de Transfusion indépendants","") ;
ligne("rrr","2.2 Centres de transfusion bases à l’hôpital","") ;
ligne("rrr","2.3 Total","") ;
?>
</table>


<br /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<tr align="left"   > 
<th colspan="4"  >B DONNEURS DE SANG ET COLLECTE DE SANG</th>	
</tr>
<?php
ligne1("rrr","3 Nombre de donneurs de sang qui ont donné le sang durant la période du rapport (donneurs autologues exclus)",4) ; 
ligne4("rrr","","Sang total (a)","Par procédé d’aphérèse (b)","Total (c)") ; 
ligne4("rrr","3.1 Nombre total de donneurs qui ont donné","1","2","3") ;
ligne4("rrr","3.2 Nombre de donneurs volontaires non rémunérés qui ont donné","4","5","6") ;
?>
</table>


<br /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >

<?php
ligne1("rrr","4 Nombre et % de dons collectés durant période du rapport (dons autologues exclus), par type de don",5) ; 
ligne5("rrr","","Sang total (a)","Par procédé d’aphérèse (b)","Total (c)","Pourcentage") ; 
// ligne5("rrr","4.1 Dons volontaires non rémunérés","","","","") ;
// ligne5("rrr","4.2 Dons familiaux/de remplacement","","","","") ;
// ligne5("rrr","4.3 Dons rémunérés","","","","") ;


$datejour1='2015-01-01';
$datejour2='2020-12-31';
$a=collecte('NORMAL','regulier','fixe',$datejour1,$datejour2);
$b=collecte('NORMAL','regulier','mobile',$datejour1,$datejour2);
$c=collecte('NORMAL','Occasionnel','fixe',$datejour1,$datejour2);
$d=collecte('NORMAL','Occasionnel','mobile',$datejour1,$datejour2);
$e=collecte('APHERESE','regulier','fixe',$datejour1,$datejour2);
$f=collecte('APHERESE','regulier','mobile',$datejour1,$datejour2);
$g=collecte('APHERESE','Occasionnel','fixe',$datejour1,$datejour2);
$h=collecte('APHERESE','Occasionnel','mobile',$datejour1,$datejour2);
ligne5("rrr","4.4 Dons regulier fixe",$a,$e,$a+$e,round((($a+$e)/($a+$b+$c+$d+$e+$f+$g+$h))*100,2));  
ligne5("rrr","4.5 Dons regulier mobile",$b,$f,$b+$f,round((($b+$f)/($a+$b+$c+$d+$e+$f+$g+$h))*100,2)) ;
ligne5("rrr","4.6 Dons Occasionnel fixe",$c,$g,$c+$g,round((($c+$g)/($a+$b+$c+$d+$e+$f+$g+$h))*100,2)) ;
ligne5("rrr","4.7 Dons Occasionnel mobile",$d,$h,$d+$h,round((($d+$h)/($a+$b+$c+$d+$e+$f+$g+$h))*100,2)) ;
// ligne5("rrr","Autres (veuillez spécifier_________)","","","","") ;
ligne5("rrr","Total des dons",$a+$b+$c+$d,$e+$f+$g+$h,$a+$b+$c+$d+$e+$f+$g+$h,(($a+$b+$c+$d+$e+$f+$g+$h)/($a+$b+$c+$d+$e+$f+$g+$h))*100) ;
?>
</table>

<br /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >

<?php
ligne1("rrr","5 Nombre d’exclusions, par motif d’exclusion",2) ;
ligne("rrr","5.1 Faible poids","") ;
ligne("rrr","5.2 Hémoglobine basse","") ;
ligne("rrr","5.3 Autres conditions médicales","") ;
ligne("rrr","5.4 Comportement à haut risque","") ;
ligne("rrr","5.5 Voyage","") ;
ligne("rrr","5.6 Autres raisons (veuillez spécifier_________)","") ;
ligne("rrr","5.7 Nombre total d’exclusions","") ;
ligne("rrr","5.8 % du total d’exclusions","") ;
?>
</table>

<br /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >

<?php
ligne1("rrr","6 Taux de don de sang total",2) ;
ligne("rrr","6.1 Dons de sang total pour 1000 habitants","") ;
ligne("rrr","6.2 Si ce rapport ne couvre pas tous les dons de sang qui ont été collectés dans votre pays, veuillez estimer le pourcentage de dons ou de la population qui est couverte par ce rapport","") ;
ligne("rrr","6.3 Dons de sang total ajustés pour 1000 habitants","") ;
?>
</table>

<br /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<?php
ligne("rrr","Rapport don/donneur : (fréquence moyenne de dons par donneur) pour les donneurs volontaires non rémunérés de sang total","") ;
?>
</table>


<br /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<tr align="left" > 
	<th colspan="3"  >C DEPISTAGE DES INFECTIONS TRANSMISSIBLES PAR TRANSFUSION</th>
	
</tr>
<?php
ligne3("","","Nombre","Pourcentage");
ligne3("","8 Nombre et % de centre de transfusion qui effectuent le dépistage au
laboratoire des dons don pour les infections transmissibles par transfusion","",""); 
?>
</table>

<br /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<?php
ligne1("rrr","9 Nombre et % de dons (sang total et aphérèse) dépistés pour les infections transmissibles par transfusion (ITT)",3) ;
ligne3("","Marqueurs des ITT","Nombre","Pourcentage");
ligne3("","9.1 VIH","","");
ligne3("","9.2 VHB","","");
ligne3("","9.3 VHC","","");
ligne3("","9.4 Syphilis","","");
ligne3("","9.5 Maladie de Chagas","","");
ligne3("","9.6 Paludisme","","");
ligne3("","9.7 Virus du lymphome humain à cellules T de type I/II (HTLV I/II)","","");
ligne3("","9.8 Autres (veuillez spécifier_________)","","");
?>
</table>


<br /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<?php
ligne1("rrr","10 Détails des centres de transfusion/laboratoires où le dépistage des ITT est effectué : nombre de dons testés,
utilisation des procédures opératoires standards (POS) et participation à l’Evaluation Externe de la Qualité (EEQ)",3) ;

?>
</table>

<br /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<?php
ligne1("rrr","11 Nombre et % de dons dépistés pour les ITT conformément à l’assurance qualité",3) ;
ligne3("","","Nombre de dons testé/analysé ","% de dons testé/analysé ");
ligne3("","11.1 VIH","","");
ligne3("","11.2 VHB","","");
ligne3("","11.3 VHC","","");
ligne3("","11.4 Syphilis","","");
?>
</table>


<br /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<?php
ligne1("rrr","12 Nombre et % de dons qui ont réagi lors du test de dépistage et/ou positifs lors test de confirmation",5) ;
ligne5("rrr","Marqueurs des ITT","Nombre dépistage ","Pourcentage dépistage","Nombre confirmation","Pourcentage confirmation") ;
ligne5("rrr","12.1 VIH","","","","") ;
ligne5("rrr","12.2 VHB","","","","") ;
ligne5("rrr","12.3 VHC","","","","") ;
ligne5("rrr","12.4 Syphilis","","","","") ;
ligne5("rrr","12.5 Maladie de Chagas","","","","") ;
ligne5("rrr","12.6 Paludisme","","","","") ;
ligne5("rrr","12.7 HTLV I/II","","","","") ;
ligne5("rrr","12.8 Autres (veuillez spécifier_________)","","","","") ;
?>
</table>
<br /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<tr align="left" > 
	<th colspan="3"  >D PREPARATION, CONSERVATION ET TRANSPORT DES CONSTITUANTS DU SANG</th>	
</tr>
<?php
?>
</table>










