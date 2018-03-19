<?php 
verifsession();	
view::button('rds','');
lang(Session::get('lang'));
ob_start();
View::h('2',25,150,'Ordonnace : ');
View::sautligne(3);
View::hr();
View::f0(URL.'rds/ajouterArticle/','post');
View::label(25,250,'Designation Produit');       View::medicament(215,240,'libelleProduit','mvc','pha');//View::txt(215,390,'libelleProduit',0,'');
View::label(25,250+30,'Dose par prise ');        View::txt(215,240+30,'doseparprise',0,'1');
View::label(25,250+60,'Nbr de fois par jour');   View::txt(215,240+60,'nbrdrfoisparjours',0,'3');  
View::label(25,250+90,'Nbr de jours');           View::txt(215,240+90,'nbrdejours',0,'10');  
View::label(25,250+120,'qteProduit');            View::txt(215,240+120,'qteProduit',0,'1'); 
View::label(25,250+150,'prix');                  View::txt(215,240+150,'prixProduit',0,'0');  
View::hide(215,370,'date',0,date('Y-m-d'));
View::hide(215,370,'id','0',1);
View::submit(215,240+180,'ENREGISTRER');									
View::f1();	
View::sautligne(15+rds::compterArticles());
$x=450;
$y=250;
echo "<div  style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
echo"<table width='97%' border='1' cellpadding='5' cellspacing='1' align='left'>";
echo"<tr><th colspan=\"7\">Votre Ordonnace (max 07 medicaments) </th></th>";echo"<tr>";
echo"<tr>";
echo"<th colspan=\"1\">NOM <input type=\"text\" size=\"30\" name=\"NOM\" value=\"\"/> PRENOM <input type=\"text\" size=\"30\" name=\"PRENOM\" value=\"\"/></th></th>";
echo"<th colspan=\"3\">AGE <input type=\"text\" size=\"4\" name=\"AGE\" value=\"\"/></th></th>";
echo"<th colspan=\"3\">ADRESSE <input type=\"text\" size=\"4\" name=\"ADRESSE\" value=\"\"/></th></th>";
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
	if ( rds::creationPanier()  )
	{
	   $nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
	   if ($nbArticles <= 0)
	   {
	   echo '<tr bgcolor="#F0FFF0" ><td align="center" colspan="7" >Votre Ordonnace est vide </ td></tr>';
	   }
	   else
	   {
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
	         echo '<tr  bgcolor="#F0FFF0" >';
	         echo "<td>".View::nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'mecicament').'  '.View::nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre')."</ td>";
	         echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['doseparprise'][$i])."</ td>";
	         echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['nbrdrfoisparjours'][$i])."</ td>";
	         echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['nbrdejours'][$i])."</ td>";
	         echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['qteProduit'][$i])."</ td>";	          
			 echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['prixProduit'][$i])."</ td>";	          
			 echo "<td align=\"center\" ><div id=\"smenux\"><a href=\"".URL."rds/supprimerArticle/".$_SESSION['ordonnace']['libelleProduit'][$i]."/".'1'."\">X</a></div></td>";  
			 echo "</tr>";
	      }
	      echo '<tr bgcolor="#98F5FF" ><td colspan="7">'; 
		  echo "Nombre total de medicament : ".rds::compterArticles();
		  echo "</td>";	     
		  echo "</tr>";
		  echo '<tr bgcolor="#98F5FF"     ><td colspan="3">Montant total'; 
		  $ttc=rds::MontantGlobal()*1;
		  echo "</td>";
	      echo "<td colspan=\"4\">";
	      echo "Total TTC: ".$ttc." DA ";
	      echo "</td>";
		  echo "</tr>";
		echo '<tr  bgcolor="#F0F8FF" >';//
		     
			  echo "<td align=\"center\"   colspan=\"3\">";
			  echo '<div id="smenux">';
			  echo '&nbsp;'; echo '<a href="'.URL.'rds/supprimePanier/'.'1'.'">Annuler</a>';echo '&nbsp;'; 
			  echo "</div>";
			  echo "</td>";
			  echo "<td  align=\"center\" colspan=\"4\">";
			  echo '<div id="smenux">';
			  echo '<a href="'.URL.'pdf/rds/ordo.php?uc='.'1'.'">Imprimer</a>';echo '&nbsp;'; 
			  echo "</div>";
			  echo "</td>";
			  
		echo "</tr>";	  
	   }
	   echo"<tr><th colspan=\"7\">Votre Ordonnace (max 07 medicaments) </th></th>";
	}
echo"</table>"	;
echo "</div>"; 

View::sautligne(15);
ob_end_flush();
?>