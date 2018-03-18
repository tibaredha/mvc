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
view::button('hemow',$this->user[0]['id']);
View::h('2',25,180,'hemod : Ordonnace [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
View::sautligne(2);
View::hr();
View::f0(URL.'hemod/ajouterArticle/','post');
View::label(25,400-30-100,'Designation Produit');       View::medicament(215,390-130,'libelleProduit','mvc','pha');//View::txt(215,390,'libelleProduit',0,'');


// echo '<input type="text" id="search-box" placeholder="Donor Name" size="22" autofocus   />';
// echo '<div id="suggesstion-box"></div>';

View::label(25,300,'Dose par prise ');              View::txt(215,320-30,'doseparprise',0,'1');
View::label(25,330,'Nbr de fois par jour');         View::txt(215,350-30,'nbrdrfoisparjours',0,'3');  
View::label(25,360,'Nbr de jours');                 View::txt(215,380-30,'nbrdejours',0,'10');  
View::label(25,390,'qteProduit');                   View::txt(215,410-30,'qteProduit',0,'1'); 
View::label(25,420,'prix');                         View::txt(215,440-30,'prixProduit',0,'0');  
View::hide(215,370,'date',0,date('Y-m-d'));
View::hide(215,370,'id','0',$this->user[0]['id']);
View::submit(215,570-30,'ENREGISTRER');									
View::f1();	
View::sautligne(15+hemod::compterArticles());
$x=450;
$y=265;
echo "<div  style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
echo"<table width='97%' border='1' cellpadding='5' cellspacing='1' align='left'>";
echo"<tr><th colspan=\"7\">Votre Ordonnace (max 07 medicaments) </th></th>";
echo"<tr>";
echo"<th style=\"width:700px;\"    id=\"tiba\" >Libellé</th>";
echo"<th>Dose</th>";
echo"<th>Nbr/jours</th>";
echo"<th>jours</th>";
echo"<th>Quantite </th>";
echo"<th>Prix</th>";
echo"<th>Action</th>";
echo"</tr>";
echo"</tr>";
	if ( hemod::creationPanier()  )
	{
	   $nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
	   if ($nbArticles <= 0)
	   echo "<tr><td align=\"center\" colspan=\"7\" >Votre Ordonnace est vide </ td></tr>";
	   else
	   {
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
	         echo '<tr  bgcolor="#F0FFF0" >';
	         echo "<td>".View::nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'mecicament').'  '.View::nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre')."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['doseparprise'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['nbrdrfoisparjours'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['nbrdejours'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['qteProduit'][$i])."</ td>";	          
			 echo "<td>".htmlspecialchars($_SESSION['ordonnace']['prixProduit'][$i])."</ td>";	          
			 // echo "<td align=\"center\"  ><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
	         // echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
			 echo "<td align=\"center\"><a href=\"".URL."hemod/supprimerArticle/".$_SESSION['ordonnace']['libelleProduit'][$i]."/".$this->user[0]['id']."\"><img src=\"".URL."public/images/icons/delete.PNG\"     width=\'20\' height=\'20\' border=\'0\'alt=\'\' /></a></td>";  
			 echo "</tr>";
	      }
	      echo '<tr bgcolor="#98F5FF" ><td colspan="7">'; 
		  echo "Nombre total de medicament : ".hemod::compterArticles();
		  echo "</td>";	     
		  echo "</tr>";
		  echo '<tr bgcolor="#98F5FF"     ><td colspan="3">Montant total'; 
		  $ttc=hemod::MontantGlobal()*1;
		  echo "</td>";
	      echo "<td colspan=\"4\">";
	      echo "Total TTC: ".$ttc." DA ";
	      echo "</td>";
		  echo "</tr>";
		echo '<tr  bgcolor="#F0F8FF" >';//
		      echo "<td align=\"center\"   colspan=\"3\">";
			  echo '&nbsp;'; echo '<a href="'.URL.'hemod/supprimePanier/'.$this->user[0]['id'].'"><img src="'.URL.'public/images/icons/delete.PNG'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/>Suprimer</a>';echo '&nbsp;'; 
			  echo "</td>";
			  echo "<td  align=\"center\" colspan=\"4\">";
			  echo '<a href="'.URL.'pdf/hemod/hemodpha.php?uc='.$this->user[0]['id'].'"><img src="'.URL.'public/images/icons/print.PNG'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/>Imprimer</a>';echo '&nbsp;'; 
			  echo "</td>";
		echo "</tr>";	  
	   }
	}
echo"</table>"	;
echo "</div>"; 
?>