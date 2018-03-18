<?php 
verifsession();	
view::button('hemod','');
?>
<h2>Evaluation : Activite Hemodialyse </h2 >
<hr /><br />
<?php 
function evadecesD($action)
{ 
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<form ALIGN=\"center\" action=\"$action\" method=\"post\">";
echo "<p> du";
echo "<select name=\"jour\">";
jours();
echo "</select>";
echo "<select name=\"mois\">";
mois();
echo "</select>";
echo "<select name=\"annee\">";
annee();
echo "</select>";
echo "</p>";
echo "<p> au";
echo "<select name=\"jour1\">";
jours();
echo "</select>";
echo "<select name=\"mois1\">";
mois();
echo "</select>";
echo "<select name=\"annee1\">";
annee();
echo "</select>";
echo "</p>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p> ";
echo "<select name=\"HEMO\">";
echo"<option value=\"1\">Canevas I</option>"."\n";
echo"<option value=\"2\">Canevas II</option>"."\n";
echo"<option value=\"3\">Canevas III</option>"."\n";
echo"<option value=\"4\">Canevas IV</option>"."\n";
echo"<option value=\"5\">Canevas V</option>"."\n";
echo"<option value=\"6\">Canevas VI</option>"."\n";
echo"<option value=\"7\">Canevas VII</option>"."\n";
echo"<option value=\"8\">Laboratoire</option>"."\n";
echo"<option value=\"9\">Groupage RH</option>"."\n";
echo"<option value=\"10\">Serologie</option>"."\n";
echo"<option value=\"11\">Registre labo</option>"."\n";

echo "</select>";

echo "</p> ";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";

// echo "<p> ";
// echo "<select name=\"EPH\">";
// echo"<option value=\"1\">EPH_DJALFA</option>"."\n";
// echo"<option value=\"2\">EPH_AIN_OUSSERA</option>"."\n";
// echo"<option value=\"3\">EPH_HASSI_BAHBAH</option>"."\n";
// echo"<option value=\"4\">EPH_MESSAAD</option>"."\n";
// echo"<option value=\"5\">EHS_DJELFA</option>"."\n";
// echo"<option value=\"6\">TOTAL_DJELFA</option>"."\n";
// echo "</select>";
// echo "</p> ";

// echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p><input type=\"submit\" value=\"calculer\" /></p>";
echo "</form>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
}
evadecesD(URL.'pdf/hemod/FHEMO.php');
?>

 
<?php 
// $query_liste = "SELECT * FROM com where IDWIL=17000 ";//
// $requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
// $per ->h(2,550,180,'Bultin Epidemiologique Instantané IRCT');
// $per -> sautligne (3);
// $per ->f0('./HEMO/BULTINPDF.PHP','post');
// $per ->submit(980,200,'Imprimer Bultin');
// $anneee=date("Y");  //2014
// $anneed=date("Y")-1;//2013
// $anneec=date("Y")-2;//2012
// $anneeb=date("Y")-3;//2011
// $anneea=date("Y")-4;//2010
// echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
// echo( "<tr>
// <td ROWSPAN=4 class=\"ligne0\">Résidence</td>
// <td COLSPAN=10 class=\"ligne0\">Année de mise en dialyse</td>
// </tr>" );
// echo( "<tr>
// <td COLSPAN=2 class=\"ligne0\">$anneea</td>
// <td COLSPAN=2 class=\"ligne0\">$anneeb</td>
// <td COLSPAN=2 class=\"ligne0\">$anneec</td>
// <td COLSPAN=2 class=\"ligne0\">$anneed</td>
// <td COLSPAN=2 class=\"ligne0\">$anneee</td>
// </tr>" );
// $per ->hide(595,90,'HIV',20,$anneea);
// echo "<tr>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneea."-01-01",$anneea."-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneeb."-01-01",$anneeb."-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneec."-01-01",$anneec."-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneed."-01-01",$anneed."-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneee."-01-01",$anneee."-12-31")."</td>";
// echo"</tr>" ;
// echo( "<tr>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// </tr>" );
//ajoute remarque /date premption
// while( $result = mysql_fetch_array( $requete ) )
// {
// echo( "<tr class=\"resultat\" >\n" );
// echo( "<td class=\"ligne0\" ><div align=\"left\">".$result["COMMUNE"]."</div></td>\n" );
// echo( "<td class=\"ligne00\" ><div align1=\"center\">".$per->nbrhemo($anneea."-01-01",$anneea."-12-31",$result["IDCOM"]) ."</div></td>\n" );
// echo( "<td class=\"lignep\"><div align=\"center\">".$per->rapporth($anneea."-01-01",$anneea."-12-31",$result["IDCOM"])  ."</div></td>\n" );
// echo( "<td class=\"ligne00\" ><div align=\"center\">".$per->nbrhemo($anneeb."-01-01",$anneeb."-12-31",$result["IDCOM"]) ."</div></td>\n" );
// echo( "<td class=\"lignep\"><div align=\"center\">".$per->rapporth($anneeb."-01-01",$anneeb."-12-31",$result["IDCOM"])  ."</div></td>\n" );
// echo( "<td class=\"ligne00\"><div align=\"center\">".$per->nbrhemo($anneec."-01-01",$anneec."-12-31",$result["IDCOM"])."</div></td>\n" );
// echo( "<td class=\"lignep\"><div align=\"center\">".$per->rapporth($anneec."-01-01",$anneec."-12-31",$result["IDCOM"])  ."</div></td>\n" );
// echo( "<td class=\"ligne00\"><div align=\"center\">".$per->nbrhemo($anneed."-01-01",$anneed."-12-31",$result["IDCOM"])."</div></td>\n" );
// echo( "<td class=\"lignep\"><div align=\"center\">".$per->rapporth($anneed."-01-01",$anneed."-12-31",$result["IDCOM"])  ."</div></td>\n" );
// echo( "<td class=\"ligne00\"><div align=\"center\">".$per->nbrhemo($anneee."-01-01",$anneee."-12-31",$result["IDCOM"])."</div></td>\n" );
// echo( "<td class=\"lignep\"><div align=\"center\">".$per->rapporth($anneee."-01-01",$anneee."-12-31",$result["IDCOM"])  ."</div></td>\n" );
// echo( "</tr>\n" );
// } 
// echo( "<tr><td COLSPAN=11 class=\"ligne0\"> Commune De  Résidence</td></tr>" );
// echo( "</table><br>\n" );
//*****************************************************************************************************//
// $per -> sautligne (1);
// echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
// echo( "<tr>
// <td ROWSPAN=4 class=\"ligne0\">Néphropathie</td>
// <td COLSPAN=10 class=\"ligne0\">Année de mise en dialyse</td>
// </tr>" );
// echo( "<tr>
// <td COLSPAN=2 class=\"ligne0\">$anneea</td>
// <td COLSPAN=2 class=\"ligne0\">$anneeb</td>
// <td COLSPAN=2 class=\"ligne0\">$anneec</td>
// <td COLSPAN=2 class=\"ligne0\">$anneed</td>
// <td COLSPAN=2 class=\"ligne0\">$anneee</td>
// </tr>" );

// echo "<tr>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneea."-01-01",$anneea."-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneeb."-01-01",$anneeb."-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneec."-01-01",$anneec."-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneed."-01-01",$anneed."-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneee."-01-01",$anneee."-12-31")."</td>";
// echo"</tr>" ;
// echo( "<tr>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// </tr>" );

// echo "<tr>";
// echo "<td class=\"ligne0\">HTA</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneea."-01-01",$anneea."-12-31","CAUSEMALAD","HTA")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneea."-01-01",$anneea."-12-31","CAUSEMALAD","HTA")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneeb."-01-01",$anneeb."-12-31","CAUSEMALAD","HTA")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneeb."-01-01",$anneeb."-12-31","CAUSEMALAD","HTA")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneec."-01-01",$anneec."-12-31","CAUSEMALAD","HTA")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneec."-01-01",$anneec."-12-31","CAUSEMALAD","HTA")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneed."-01-01",$anneed."-12-31","CAUSEMALAD","HTA")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneed."-01-01",$anneed."-12-31","CAUSEMALAD","HTA")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneee."-01-01",$anneee."-12-31","CAUSEMALAD","HTA")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneee."-01-01",$anneee."-12-31","CAUSEMALAD","HTA")."</td>";
// echo"</tr>" ;
// $per ->hide(595,90,'HTA2010',20,$per->rapportn($anneea."-01-01",$anneea."-12-31","CAUSEMALAD","HTA"));
// $per ->hide(595,90,'HTA2011',20,$per->rapportn($anneeb."-01-01",$anneeb."-12-31","CAUSEMALAD","HTA"));
// $per ->hide(595,90,'HTA2012',20,$per->rapportn($anneec."-01-01",$anneec."-12-31","CAUSEMALAD","HTA"));
// $per ->hide(595,90,'HTA2013',20,$per->rapportn($anneed."-01-01",$anneed."-12-31","CAUSEMALAD","HTA"));
// $per ->hide(595,90,'HTA2014',20,$per->rapportn($anneee."-01-01",$anneee."-12-31","CAUSEMALAD","HTA"));









// echo "<tr>";
// echo "<td class=\"ligne0\">Diabete</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneea."-01-01",$anneea."-12-31","CAUSEMALAD","DIABETE")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneea."-01-01",$anneea."-12-31","CAUSEMALAD","DIABETE")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneeb."-01-01",$anneeb."-12-31","CAUSEMALAD","DIABETE")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneeb."-01-01",$anneeb."-12-31","CAUSEMALAD","DIABETE")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneec."-01-01",$anneec."-12-31","CAUSEMALAD","DIABETE")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneec."-01-01",$anneec."-12-31","CAUSEMALAD","DIABETE")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneed."-01-01",$anneed."-12-31","CAUSEMALAD","DIABETE")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneed."-01-01",$anneed."-12-31","CAUSEMALAD","DIABETE")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneee."-01-01",$anneee."-12-31","CAUSEMALAD","DIABETE")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneee."-01-01",$anneee."-12-31","CAUSEMALAD","DIABETE")."</td>";
// echo"</tr>" ;
// $per ->hide(595,90,'DIABETE2010',20,$per->rapportn($anneea."-01-01",$anneea."-12-31","CAUSEMALAD","DIABETE"));
// $per ->hide(595,90,'DIABETE2011',20,$per->rapportn($anneeb."-01-01",$anneeb."-12-31","CAUSEMALAD","DIABETE"));
// $per ->hide(595,90,'DIABETE2012',20,$per->rapportn($anneec."-01-01",$anneec."-12-31","CAUSEMALAD","DIABETE"));
// $per ->hide(595,90,'DIABETE2013',20,$per->rapportn($anneed."-01-01",$anneed."-12-31","CAUSEMALAD","DIABETE"));
// $per ->hide(595,90,'DIABETE2014',20,$per->rapportn($anneee."-01-01",$anneee."-12-31","CAUSEMALAD","DIABETE"));






// echo "<tr>";
// echo "<td class=\"ligne0\">Polykystose renale</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneea."-01-01",$anneea."-12-31","CAUSEMALAD","PKR")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneea."-01-01",$anneea."-12-31","CAUSEMALAD","PKR")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneeb."-01-01",$anneeb."-12-31","CAUSEMALAD","PKR")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneeb."-01-01",$anneeb."-12-31","CAUSEMALAD","PKR")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneec."-01-01",$anneec."-12-31","CAUSEMALAD","PKR")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneec."-01-01",$anneec."-12-31","CAUSEMALAD","PKR")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneed."-01-01",$anneed."-12-31","CAUSEMALAD","PKR")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneed."-01-01",$anneed."-12-31","CAUSEMALAD","PKR")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneee."-01-01",$anneee."-12-31","CAUSEMALAD","PKR")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneee."-01-01",$anneee."-12-31","CAUSEMALAD","PKR")."</td>";
// echo"</tr>" ;


// echo "<tr>";
// echo "<td class=\"ligne0\">*Glomérulonéphrite chronique</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo"</tr>" ;


// echo "<tr>";
// echo "<td class=\"ligne0\">*Pylonéphrite chronique</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo"</tr>" ;

// echo "<tr>";
// echo "<td class=\"ligne0\">*Vasculaire</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo"</tr>" ;

// echo "<tr>";
// echo "<td class=\"ligne0\">*Autre</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo"</tr>" ;


// echo "<tr>";
// echo "<td class=\"ligne0\">Inconnu</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneea."-01-01",$anneea."-12-31","CAUSEMALAD","X")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneea."-01-01",$anneea."-12-31","CAUSEMALAD","X")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneeb."-01-01",$anneeb."-12-31","CAUSEMALAD","X")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneeb."-01-01",$anneeb."-12-31","CAUSEMALAD","X")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneec."-01-01",$anneec."-12-31","CAUSEMALAD","X")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneec."-01-01",$anneec."-12-31","CAUSEMALAD","X")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneed."-01-01",$anneed."-12-31","CAUSEMALAD","X")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneed."-01-01",$anneed."-12-31","CAUSEMALAD","X")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneee."-01-01",$anneee."-12-31","CAUSEMALAD","X")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneee."-01-01",$anneee."-12-31","CAUSEMALAD","X")."</td>";
// echo"</tr>" ;
// $per ->hide(595,90,'X2010',20,$per->rapportn($anneea."-01-01",$anneea."-12-31","CAUSEMALAD","X"));
// $per ->hide(595,90,'X2011',20,$per->rapportn($anneeb."-01-01",$anneeb."-12-31","CAUSEMALAD","X"));
// $per ->hide(595,90,'X2012',20,$per->rapportn($anneec."-01-01",$anneec."-12-31","CAUSEMALAD","X"));
// $per ->hide(595,90,'X2013',20,$per->rapportn($anneed."-01-01",$anneed."-12-31","CAUSEMALAD","X"));
// $per ->hide(595,90,'X2014',20,$per->rapportn($anneee."-01-01",$anneee."-12-31","CAUSEMALAD","X"));






// echo( "<tr>
// <td COLSPAN=11 class=\"ligne0\">Néphropathie initial ( * en cour de réalisation)</td>
// </tr>" );
// echo( "</table><br>\n" );

// *****************************************************************************************************//
// $per -> sautligne (1);
// echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
// echo( "<tr>
// <td ROWSPAN=4 class=\"ligne0\">Tranche d'age (ans)</td>
// <td COLSPAN=10 class=\"ligne0\">Année de mise en dialyse</td>
// </tr>" );
// echo( "<tr>
// <td COLSPAN=2 class=\"ligne0\">$anneea</td>
// <td COLSPAN=2 class=\"ligne0\">$anneeb</td>
// <td COLSPAN=2 class=\"ligne0\">$anneec</td>
// <td COLSPAN=2 class=\"ligne0\">$anneed</td>
// <td COLSPAN=2 class=\"ligne0\">$anneee</td>
// </tr>" );

// echo "<tr>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneea."-01-01",$anneea."-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneeb."-01-01",$anneeb."-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneec."-01-01",$anneec."-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneed."-01-01",$anneed."-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal($anneee."-01-01",$anneee."-12-31")."</td>";
// echo"</tr>" ;
// echo( "<tr>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// </tr>" );

// $age1=0;
// $age2=19;
// echo "<tr>";
// echo "<td class=\"ligne0\">00-19</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneea."-01-01",$anneea."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneea."-01-01",$anneea."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneeb."-01-01",$anneeb."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneeb."-01-01",$anneeb."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneec."-01-01",$anneec."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneec."-01-01",$anneec."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneed."-01-01",$anneed."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneed."-01-01",$anneed."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneee."-01-01",$anneee."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneee."-01-01",$anneee."-12-31",$age1,$age2)."</td>";
// echo"</tr>" ;


// $age1=20;
// $age2=44;
// echo "<tr>";
// echo "<td class=\"ligne0\">20-44</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneea."-01-01",$anneea."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneea."-01-01",$anneea."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneeb."-01-01",$anneeb."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneeb."-01-01",$anneeb."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneec."-01-01",$anneec."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneec."-01-01",$anneec."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneed."-01-01",$anneed."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneed."-01-01",$anneed."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneee."-01-01",$anneee."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneee."-01-01",$anneee."-12-31",$age1,$age2)."</td>";
// echo"</tr>" ;


// $age1=45;
// $age2=64;
// echo "<tr>";
// echo "<td class=\"ligne0\">45-64</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneea."-01-01",$anneea."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneea."-01-01",$anneea."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneeb."-01-01",$anneeb."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneeb."-01-01",$anneeb."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneec."-01-01",$anneec."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneec."-01-01",$anneec."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneed."-01-01",$anneed."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneed."-01-01",$anneed."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneee."-01-01",$anneee."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneee."-01-01",$anneee."-12-31",$age1,$age2)."</td>";
// echo"</tr>" ;



// $age1=65;
// $age2=74;
// echo "<tr>";
// echo "<td class=\"ligne0\">65-74</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneea."-01-01",$anneea."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneea."-01-01",$anneea."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneeb."-01-01",$anneeb."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneeb."-01-01",$anneeb."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneec."-01-01",$anneec."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneec."-01-01",$anneec."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneed."-01-01",$anneed."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneed."-01-01",$anneed."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneee."-01-01",$anneee."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneee."-01-01",$anneee."-12-31",$age1,$age2)."</td>";
// echo"</tr>" ;

// $age1=75;
// $age2=100;
// echo "<tr>";
// echo "<td class=\"ligne0\"> >=75</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneea."-01-01",$anneea."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneea."-01-01",$anneea."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneeb."-01-01",$anneeb."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneeb."-01-01",$anneeb."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneec."-01-01",$anneec."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneec."-01-01",$anneec."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneed."-01-01",$anneed."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneed."-01-01",$anneed."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->tranchehemo($anneee."-01-01",$anneee."-12-31",$age1,$age2)."</td>";
// echo "<td class=\"ligne00\">".$per->rapportt($anneee."-01-01",$anneee."-12-31",$age1,$age2)."</td>";
// echo"</tr>" ;

// echo( "<tr>
// <td COLSPAN=11 class=\"ligne0\">Age initial ( * en cour de réalisation)</td>
// </tr>" );
// echo( "</table><br>\n" );


// *****************************************************************************************************//
// $per -> sautligne (1);
// echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
// echo( "<tr>
// <td ROWSPAN=4 class=\"ligne0\">Sexe </td>
// <td COLSPAN=10 class=\"ligne0\">Année de mise en dialyse</td>
// </tr>" );
// echo( "<tr>
// <td COLSPAN=2 class=\"ligne0\">$anneea</td>
// <td COLSPAN=2 class=\"ligne0\">$anneeb</td>
// <td COLSPAN=2 class=\"ligne0\">$anneec</td>
// <td COLSPAN=2 class=\"ligne0\">$anneed</td>
// <td COLSPAN=2 class=\"ligne0\">$anneee</td>
// </tr>" );

// echo "<tr>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal("2010-01-01","2010-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal("2011-01-01","2011-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal("2012-01-01","2012-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal("2013-01-01","2013-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal("2014-01-01","2014-12-31")."</td>";
// echo"</tr>" ;
// echo( "<tr>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// </tr>" );

// echo "<tr>";
// echo "<td class=\"ligne0\">Hommes</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneea."-01-01",$anneea."-12-31","SEX","M")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneea."-01-01",$anneea."-12-31","SEX","M")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneeb."-01-01",$anneeb."-12-31","SEX","M")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneeb."-01-01",$anneeb."-12-31","SEX","M")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneec."-01-01",$anneec."-12-31","SEX","M")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneec."-01-01",$anneec."-12-31","SEX","M")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneed."-01-01",$anneed."-12-31","SEX","M")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneed."-01-01",$anneed."-12-31","SEX","M")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneee."-01-01",$anneee."-12-31","SEX","M")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneee."-01-01",$anneee."-12-31","SEX","M")."</td>";
// echo"</tr>" ;

// echo "<tr>";
// echo "<td class=\"ligne0\">Femmes</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneea."-01-01",$anneea."-12-31","SEX","F")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneea."-01-01",$anneea."-12-31","SEX","F")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneeb."-01-01",$anneeb."-12-31","SEX","F")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneeb."-01-01",$anneeb."-12-31","SEX","F")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneec."-01-01",$anneec."-12-31","SEX","F")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneec."-01-01",$anneec."-12-31","SEX","F")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneed."-01-01",$anneed."-12-31","SEX","F")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneed."-01-01",$anneed."-12-31","SEX","F")."</td>";
// echo "<td class=\"ligne00\">".$per->nbrhemocarct($anneee."-01-01",$anneee."-12-31","SEX","F")."</td>";
// echo "<td class=\"ligne00\">".$per->rapportn($anneee."-01-01",$anneee."-12-31","SEX","F")."</td>";
// echo"</tr>" ;
// echo( "<tr>
// <td COLSPAN=11 class=\"ligne0\">Sexe initial</td>
// </tr>" );
// echo( "</table><br>\n" );

// *****************************************************************************************************//
// $per -> sautligne (1);
// echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
// echo( "<tr>
// <td ROWSPAN=4 class=\"ligne0\">Co-morbidités</td>
// <td COLSPAN=10 class=\"ligne0\">Année de mise en dialyse</td>
// </tr>" );
// echo( "<tr>
// <td COLSPAN=2 class=\"ligne0\">$anneea</td>
// <td COLSPAN=2 class=\"ligne0\">$anneeb</td>
// <td COLSPAN=2 class=\"ligne0\">$anneec</td>
// <td COLSPAN=2 class=\"ligne0\">$anneed</td>
// <td COLSPAN=2 class=\"ligne0\">$anneee</td>
// </tr>" );

// echo "<tr>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal("2010-01-01","2010-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal("2011-01-01","2011-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal("2012-01-01","2012-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal("2013-01-01","2013-12-31")."</td>";
// echo "<td COLSPAN=2 class=\"ligne0\">N=".$per->nbrhemototal("2014-01-01","2014-12-31")."</td>";
// echo"</tr>" ;
// echo( "<tr>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// <td class=\"ligne0\">n</td>
// <td class=\"ligne0\">%</td>
// </tr>" );

// echo "<tr>";
// echo "<td class=\"ligne0\">HTA</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo"</tr>" ;

// echo "<tr>";
// echo "<td class=\"ligne0\">Diabete</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo"</tr>" ;

// echo "<tr>";
// echo "<td class=\"ligne0\">Insufisance cardiaque</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo"</tr>" ;

// echo "<tr>";
// echo "<td class=\"ligne0\">Coronaropathie</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo"</tr>" ;

// echo "<tr>";
// echo "<td class=\"ligne0\">Trouble du rythme</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo"</tr>" ;

// echo "<tr>";
// echo "<td class=\"ligne0\">Arterite des mbr inf</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo"</tr>" ;

// echo "<tr>";
// echo "<td class=\"ligne0\">AVC</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo"</tr>" ;

// echo "<tr>";
// echo "<td class=\"ligne0\">Autre</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo"</tr>" ;

// echo "<tr>";
// echo "<td class=\"ligne0\">Inconnu</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo "<td class=\"ligne00\">0</td>";
// echo"</tr>" ;
// echo( "<tr>
// <td COLSPAN=11 class=\"ligne0\">Co-morbidités initial</td>
// </tr>" );
// echo( "</table><br>\n" );

// mysql_free_result($requete);
// $per ->f1();

 ?> 
