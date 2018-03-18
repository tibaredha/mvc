<?php 
verifsession();	
view::button('maldecobl','');
?>
<h2>Evaluation : Activite Bordereau </h2 >
<hr /><br />
<?php 
function evass($action)
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
echo "<select name=\"MDO\">";
echo"<option value=\"0\">Rapport0</option>"."\n";
echo"<option value=\"1\">Rapport1</option>"."\n";
echo"<option value=\"2\">Rapport II</option>"."\n";
echo"<option value=\"3\">Rapport III</option>"."\n";
echo"<option value=\"4\">Rapport TBL</option>"."\n";

echo "</select>";
echo "<select name=\"PDFHTML\">";
echo"<option value=\"1\">PDF</option>"."\n";
echo"<option value=\"2\">HTML</option>"."\n";
echo "</select>";
echo "</p> ";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p> ";
echo "<select name=\"ETABLISSEMENT\">";
echo"<option value=\"1\">EPSP_AIN_OUSSERA</option>"."\n";
echo"<option value=\"2\">EPSP_HASSI_BAHBAH</option>"."\n";
echo"<option value=\"3\">EPSP_DJALFA</option>"."\n";
echo"<option value=\"4\">EPSP_MESSAAD</option>"."\n";
echo"<option value=\"5\">EPSP_GUETTARA</option>"."\n";
echo"<option value=\"6\">EPH_AIN_OUSSERA</option>"."\n";
echo"<option value=\"7\">EPH_HASSI_BAHBAH</option>"."\n";
echo"<option value=\"8\">EPH_DJALFA</option>"."\n";
echo"<option value=\"9\">EPH_MESSAAD</option>"."\n";
echo"<option value=\"10\">EPH_IDRISSIA</option>"."\n";
echo"<option value=\"11\">EHS_DJALFA</option>"."\n";
echo"<option value=\"12\">TOTAL_DJELFA</option>"."\n";
echo "</select>";
echo "</p> ";
view::MDO(390,440,'MADO','mvc','MDO','34','Maladie a declaration obligatoire')  ;
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p><input type=\"submit\" value=\"calculer\" /></p>";
echo "</form>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
}
evass(URL.'pdf/mdo/rapport.php');
?>

 
 
