<?php 
verifsession();	
view::button('Bordereau','');
?>
<h2>Evaluation : Bordereau Numerique Mensuel </h2 >
<hr /><br />
<?php 
function evass($action)
{ 
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<form ALIGN=\"center\" action=\"$action\" method=\"post\">";
echo "<p>";
// echo "<select name=\"jour\">";
// jours();
// echo "</select>";
// echo "<select name=\"mois\">";
// mois();
// echo "</select>";
// echo "<p> ";
// echo "<input type=\"txt\" name=\"\" size=\"26   \"      value=\"2016\" />";
echo "<select name=\"annee\">";
annee();
echo "</select>";
echo "</p>";
// echo "<p> au";
// echo "<select name=\"jour1\">";
// jours();
// echo "</select>";
// echo "<select name=\"mois1\">";
// mois();
// echo "</select>";
// echo "<select name=\"annee1\">";
// annee();
// echo "</select>";
echo "</p>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p> ";
echo "<select name=\"BNM\">";
echo"<option value=\"1\">Naissance</option>"."\n";
echo"<option value=\"2\">Mariage</option>"."\n";
echo"<option value=\"3\">Deces</option>"."\n";
echo"<option value=\"4\">Bnm</option>"."\n";
echo"<option value=\"5\">Rapport</option>"."\n";

echo "</select>";


// echo "<select name=\"PDFHTML\">";
// echo"<option value=\"1\">PDF</option>"."\n";
// echo"<option value=\"2\">HTML</option>"."\n";
// echo "</select>";


echo "</p> ";
// echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
// echo "<p> ";
// echo "<select name=\"EPSP\">";
// echo"<option value=\"1\">EPSP_DJALFA</option>"."\n";
// echo"<option value=\"2\">EPSP_MESSAAD</option>"."\n";
// echo"<option value=\"3\">EPSP_GUETTARA</option>"."\n";
// echo"<option value=\"4\">EPSP_HASSI_BAHBAH</option>"."\n";
// echo"<option value=\"5\">EPSP_AIN_OUSSERA</option>"."\n";
// echo"<option value=\"0\">TOTAL_DJELFA</option>"."\n";
// echo "</select>";
// echo "</p> ";

echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p><input type=\"submit\" value=\"calculer\" /></p>";
echo "</form>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
}
evass(URL.'pdf/bnm/BNM1.php');
?>

 
 
