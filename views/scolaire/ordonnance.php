<SCRIPT LANGUAGE="JavaScript">
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "/mvc/public/js/m.PHP",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(/mvc/public/js/LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
</script>

<?php 
verifsession();	
$rouutex='scolaire';
view::button('scolaireid',$this->user[0]['id']);
View::h('2',25,140,'Eleve : Ordonnace [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
View::sautligne(2);
View::hr();
View::sautligne(1);
echo "<table border=\"1\" cellspacing=\"1\" cellpadding=\"6\" class=\"tableaux_centrer\" width=\"900\">\n";
echo"<tr><th colspan=\"7\">Votre Ordonnace (max 07 medicaments) </th></th>";echo"</tr>";
View::f0(URL.$rouutex.'/ajouterArticle/','post');
// echo"<tr>";
// echo'<th colspan=7></th>';
// echo"</tr>";
echo"<tr>";
echo"<th style=\"width:700px;\"    id=\"tiba\" ><input type=\"text\" id=\"search-box\" placeholder=\"\" size=\"64\"  value=\"\"   autofocus   /></th>";
echo"<th>Dose</th>";
echo"<th>Nbr/jours</th>";
echo"<th>jours</th>";
echo"<th>Quantite </th>";
echo"<th>Prix</th>";
echo"<th>Action</th>";
echo"</tr>";
echo"<tr>";
echo"<th>"; View::dci1(17,390-130,'libelleProduit');echo "</th>";
echo"<th><input type=\"text\"   name=\"doseparprise\"      size=\"5\"  value=\"1\" /></th>";
echo"<th><input type=\"text\"   name=\"nbrdrfoisparjours\" size=\"5\"  value=\"3\" /></th>";
echo"<th><input type=\"text\"   name=\"nbrdejours\"        size=\"5\"  value=\"10\" /></th>";
echo"<th><input type=\"text\"   name=\"qteProduit\"        size=\"5\"  value=\"1\" /> </th>";
echo"<th><input type=\"text\"   name=\"prixProduit\"       size=\"5\"  value=\"0\" /></th>";
echo"<th><input type=\"submit\" name=\"   \"      title=\"ajouter produit\"         size=\"15\" value=\"Add\" /></th>";
echo"</tr>";
View::hide(215,370,'date',0,date('Y-m-d'));
View::hide(215,370,'id','0',$this->user[0]['id']);
View::f1();	
	if ( $rouutex::creationPanier()  )
	{
	   $nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
	   if ($nbArticles <= 0)
	   {
	   echo '<tr  bgcolor="#F0FFF0" >'; echo "<td align=\"center\" colspan=\"7\" >*** </ td>"; echo "</tr>"; 
	   echo "<tr><th align=\"center\" colspan=\"7\" >Votre Ordonnace est vide </ th></tr>";
	   }
	   else
	   {
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
	         echo '<tr  bgcolor="#F0FFF0" >';
	         //echo "<td align=\"left\"   >".View::nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'mecicament').'  '.View::nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre')."</ td>";
	         echo "<td align=\"left\"   >".View::nbrtostring('pha16','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre').'  '.View::nbrtostring('pha16','id',$_SESSION['ordonnace']['libelleProduit'][$i],'DOSAGE')."</ td>";
			 echo "<td>".htmlspecialchars($_SESSION['ordonnace']['doseparprise'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['nbrdrfoisparjours'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['nbrdejours'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['qteProduit'][$i])."</ td>";	          
			 echo "<td>".htmlspecialchars($_SESSION['ordonnace']['prixProduit'][$i])."</ td>";	          
			 //echo "<td align=\"center\"  ><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
	         //echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
			 echo "<td align=\"center\"><a title=\"supprimer produit\"  href=\"".URL.$rouutex."/supprimerArticle/".$_SESSION['ordonnace']['libelleProduit'][$i]."/".$this->user[0]['id']."\"><img src=\"".URL."public/images/icons/delete.PNG\"     width=\'20\' height=\'20\' border=\'0\'alt=\'\' /></a></td>";  
			 echo "</tr>";
	      }
	      echo '<tr bgcolor="#98F5FF" ><td colspan="1">Nombre total de medicament : '.$rouutex::compterArticles()."</td>"; 
	      $ttc=$rouutex::MontantGlobal()*1; 
	      echo '<td colspan="4">Total TTC: '.$ttc."</td>"; 
		 echo '<td colspan="1">';
		 echo '<a  title="supprimer ordonnance"    href="'.URL.$rouutex.'/supprimePanier/'.$this->user[0]['id'].'"><img src="'.URL.'public/images/icons/delete.PNG'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a>';
		 echo"</td>"; 
		 echo '<td colspan="1">';
		 echo '<a title="imprimer ordonnance" href="'.URL.'pdf/phascol.php?uc='.$this->user[0]['id'].'"   title=\"today\"   ><img src="'.URL.'public/images/icons/print.PNG'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a>';
		 echo "</td></tr>";  
	    echo "<tr><th align=\"center\" colspan=\"7\" >Votre Ordonnace  </ th></tr>";
	   }
	   
	}
echo"</table>"	;
// echo "</div>"; 
View::sautligne(15+$rouutex::compterArticles());
?>