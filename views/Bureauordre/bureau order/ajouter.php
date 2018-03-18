<html>

<head>

<title>Ajouter</title>
<link href="css/style2.css" rel="stylesheet" type="text/css">

</head>

<body>
<?php
  $connect=mysql_connect("localhost", "root", "") or die ("Echec de la connexion au serveur !");
  $select=mysql_select_db("GBO");
  $query="select * from setting  where champ='source'  order by valeur desc" ;
  $query1="select * from setting  where champ='destination'  order by valeur desc" ;
  $result=mysql_query($query);
  $result1=mysql_query($query1);
  
  echo "<form action='scripts/ajout.php' method='post' name='ajouter' enctype='multipart/form-data'>";
  echo "<table  bgcolor='#a3a3a3' width=75% border=2 align=center>";
  echo "<tr>";
  echo "<td colspan=6 bgcolor='#f6000f'><h2>AJOUTER UN MESSAGE</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td colspan=2><h4 class='h42'>Numero</td>";
  echo "<td colspan=4><h5><input class='text' type='text' name='NUMERO' size=5 maxlength=50></td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td colspan=2><h4 class='h42'>Etat</td>";
  echo "<td colspan=4><h5><input class='text' type='text' name='ETAT' size=10 maxlength=50></td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td colspan=2><h4 class='h42'>Source</td>";
  echo "<td colspan=2><h4>";
  echo "<select name='SOURCE' align='left'>";
  	 while ($row=mysql_fetch_array($result))
          {
			echo "<option selected value=".$row["valeur"].">";echo "".$row["valeur"]."";
			
	    }
  echo "</select></td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td colspan=2><h4 class='h42'>Objet</td>";
  echo "<td colspan=2> <textarea name='OBJET' rows=8 cols=40 ></textarea> </td>";
  echo "</tr>";
  echo "<tr>";       	
  echo "<td colspan=2><h4 class='h42'>Destination</td>";
  echo "<td colspan=2><h4>";
  echo "<select name='DESTINATION' align='left'>";
  while ($row=mysql_fetch_array($result1))
          {
			echo "<option selected value=".$row["valeur"].">";
			echo "".$row["valeur"]."";
	    }
  echo "</select></td>";	
  echo "</tr>";
  echo "<tr>";
  echo "<td colspan=2><h4 class='h42'>Date</td>";
  echo "<td align=center colspan=1><h5><input class='text' type='text' name='DATE' size=15 maxlength=12></td>";
  echo "</tr>";
  echo "</table>";
  echo "<br>";
  echo "<table width=50% align=center>";
  echo "<tr>";
  echo "<td align=center><input class='bouton' type='submit' name='Enregistrer' value='Enregistrer'></td>"; 
  echo "<td align=center><input class='bouton' type='reset' name='Effacer' value='Effacer'></td>";
  echo "</tr>";
  echo "</table>";
  echo "</form>";
?>
</body>

</html>
