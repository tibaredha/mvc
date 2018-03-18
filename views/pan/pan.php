<?php 
verifsession();	
view::button('pan','');
?>
<h2>Panier</h2 >
<hr/><br/>
<?php
echo"<form class=\"panier\"   method=\"post\" action=\"".URL."pan/miseajour"."\">";
echo"<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>";
echo"<tr><th colspan=\"5\">Votre panier</td></th>";
echo"<tr>";
echo"<th id=\"tiba\" >Libellé</th>";
echo"<th>Quantité</th>";
echo"<th>Prix Unitaire TTC DA</th>";
echo"<th>Action</th>";
echo"</tr>";
	if ( Pan::creationPanier()  )
	{
	   $nbArticles=count($_SESSION['panier']['libelleProduit']);
	   if ($nbArticles <= 0)
	   echo "<tr><td align=\"center\" colspan=\"4\" >Votre panier est vide </ td></tr>";
	   else
	   {
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
	         echo "<tr>";
	         echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
	         echo "<td align=\"center\"  ><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
	         echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])." DA</td>";
			 echo "<td align=\"center\">
			 <a href=\"".URL."pan/supprimerArticle/".$_SESSION['panier']['libelleProduit'][$i]."\"><img src=\"".URL."public/images/icons/add.PNG\"     width=\'20\' height=\'20\' border=\'0\'alt=\'\' /></a>
			 </td>";  
			 echo "</tr>";
	      }
	      echo "<tr><td colspan=\"2\">"; 
		  echo "Nombre total d'article : ".Pan::compterArticles();
		  echo "</td>";
	      echo "<td colspan=\"2\">";
	      echo "Total TTC: ".Pan::MontantGlobal()." DA ";
	      echo "</td>";
		  echo "</tr>";
		  // echo "<tr><td colspan=\"2\">"; 
		  // $ttc=Pan::MontantGlobal()*1;
		  // echo "</td>";
	      // echo "<td colspan=\"2\">";
	      // echo "Total TTC: ".$ttc." DA ";
	      // echo "</td>";
		  // echo "</tr>";
			// Total : 5.00 €
			// Remise: Aucune
			// Montant TV : 0.98 €
			// Total (TVA : 19.6%) : 5.98 €
			// Vous devez posséder un compte pour pouvoir commander !
 
		echo "<tr>";
		      echo "<td align=\"center\"   colspan=\"2\">";
			  echo '&nbsp;'; echo '<a href="'.URL.'pan/supprimePanier/"><img src="'.URL.'public/images/icons/delete.PNG'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a>';echo '&nbsp;'; 
              echo "<input type=\"submit\" value=\"Mise a jour \"/>";
			  echo "</td>";
			  echo "<td  align=\"center\" colspan=\"2\">";
			  echo '<a href="'.URL.'pdf/panf.php"><img src="'.URL.'public/images/icons/print.PNG'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/>&nbsp;&nbsp;&nbsp;Imprimer </a>'; 
			  echo "</td>";
		echo "</tr>";	  
	   }
	}
echo"</table>"	;
echo"</form>";
?>
