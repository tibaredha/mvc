<?php 
verifsession();	
view::button('hemow',$this->user[0]['id']);
view::h(3,140,155,view::nbrtostring('hemo','id',$this->user[0]['id'],'NOM')."_".view::nbrtostring('hemo','id',$this->user[0]['id'],'PRENOM')."_"."(".view::nbrtostring('hemo','id',$this->user[0]['id'],'FILS').")");
?>
<h2>FACTURE :</h2 >
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

echo "<p> FACTURE N ° <input type=\"text\" name=\"num\"  value=\"000\" /></p>";


echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";


echo "<p><input type=\"submit\" value=\"calculer\" /></p>";
echo "</form>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
}
evadecesD(URL.'tcpdf/hemod/facture.php?id='.$this->user[0]['id']);
// evadecesD(URL.'pdf/hemod/facture.php?id='.$this->user[0]['id']);

?>

 
 
