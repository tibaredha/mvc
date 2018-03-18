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

 
 
