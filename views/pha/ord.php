<?php 
verifsession();	
view::button('ord','');
View::h('2',25,290,'Ordonnace  ');
View::sautligne(3);
View::hr();
View::sautligne(1);
echo"<form class=\"panier\"   method=\"post\" action=\"".URL."pdf/phaf.php"."\">";
echo"<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>";
echo"<tr><th colspan=\"7\">Votre Ordonnace</td></th>";
echo"<tr>
<th>NOM<input type=\"text\" size=\"4\" name=\"NOM\" value=\"\"/></th>
<th>PRENOM<input type=\"text\" size=\"4\" name=\"PRENOM\" value=\"\"/></th>
<th>AGE<input type=\"text\" size=\"4\" name=\"AGE\" value=\"\"/></th>
<th colspan=\"4\">ADRESSE<input type=\"text\" size=\"4\" name=\"ADRESSE\" value=\"\"/></th>";
echo"<tr>";
echo"<th id=\"tiba\" >Libellé</th>";
echo"<th>Dose par prise</th>";
echo"<th>Nbr de fois par jours</th>";
echo"<th>Nbr de jours</th>";
echo"<th>Quantite </th>";
echo"<th>Prix</th>";
echo"<th>Action</th>";
echo"</tr>";
	if ( Pha::creationPanier()  )
	{
	   $nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
	   if ($nbArticles <= 0)
	   echo "<tr><td align=\"center\" colspan=\"7\" >Votre Ordonnace est vide </ td></tr>";
	   else
	   {
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
	         echo "<tr>";
	         echo "<td>".View::nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'mecicament').'  '.View::nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre')."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['doseparprise'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['nbrdrfoisparjours'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['nbrdejours'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['qteProduit'][$i])."</ td>";	          
			 echo "<td>".htmlspecialchars($_SESSION['ordonnace']['prixProduit'][$i])."</ td>";	          
			 
			 //echo "<td align=\"center\"  ><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
	         //echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
			 echo "<td align=\"center\"><a href=\"".URL."pha/supprimerArticle/".$_SESSION['ordonnace']['libelleProduit'][$i]."\"><img src=\"".URL."public/images/icons/add.PNG\"     width=\'20\' height=\'20\' border=\'0\'alt=\'\' /></a></td>";  
			 echo "</tr>";
	      }
	      echo "<tr><td colspan=\"7\">"; 
		  echo "Nombre total de medicament : ".Pha::compterArticles();
		  echo "</td>";	     
		  echo "</tr>";
		  echo "<tr><td colspan=\"5\">Montant total"; 
		  $ttc=Pha::MontantGlobal()*1;
		  echo "</td>";
	      echo "<td colspan=\"2\">";
	      echo "Total TTC: ".$ttc." DA ";
	      echo "</td>";
		  echo "</tr>";
			// Total : 5.00 €
			// Remise: Aucune
			// Montant TV : 0.98 €
			// Total (TVA : 19.6%) : 5.98 €
			// Vous devez posséder un compte pour pouvoir commander ! 
		echo "<tr>";
		      echo "<td align=\"center\"   colspan=\"3\">";
			  echo '&nbsp;'; echo '<a href="'.URL.'pha/supprimePanier/"><img src="'.URL.'public/images/icons/delete.PNG'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/>  Suprimer</a>';echo '&nbsp;'; 
			  echo "</td>";
			  echo "<td  align=\"center\" colspan=\"4\">";
			  echo "<input type=\"submit\" value=\"Imprimer\"/>";
			  
			  echo "</td>";
		echo "</tr>";	  
	   }
	}
echo"</table>"	;
echo"</form>";
?>


