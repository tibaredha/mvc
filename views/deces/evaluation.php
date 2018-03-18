<?php 
verifsession();	
view::button('deces','');
?>
<h2>Evaluation : Rapport Mortalite Hospitaliere </h2 >
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
echo "<select name=\"PDFHTML\">";
echo"<option value=\"1\">PDF</option>"."\n";
echo"<option value=\"2\">HTML</option>"."\n";
echo"<option value=\"3\">SIG</option>"."\n";
echo "</select>";

echo "<select name=\"deces\">";
echo"<option value=\"1\">RAPPORT</option>"."\n";
echo"<option value=\"2\">RELEVE</option>"."\n";
echo"<option value=\"3\">RELEVE+</option>"."\n";
echo "</select>";
echo "</p> ";

echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";

echo "<p> ";
echo "<select name=\"EPH\">";
echo"<option value=\"1\">EPH_DJALFA</option>"."\n";
echo"<option value=\"2\">EPH_AIN_OUSSERA</option>"."\n";
echo"<option value=\"3\">EPH_HASSI_BAHBAH</option>"."\n";
echo"<option value=\"4\">EPH_MESSAAD</option>"."\n";
echo"<option value=\"5\">EHS_DJELFA</option>"."\n";
echo"<option value=\"6\">EPH_IDRISSIA</option>"."\n";
echo"<option value=\"0\">TOTAL_DJELFA</option>"."\n";
echo "</select>";
echo "</p> ";

echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p><input type=\"submit\" value=\"calculer\" /></p>";
echo "</form>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
}
evadecesD(URL.'pdf/FDECES.php');
?>

 
 
