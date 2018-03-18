<html>
<head>
<title>Editer</title>
<link href="css/style2.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php
    $connect=mysql_connect("localhost", "root", "") or die ("Echec de la connexion au serveur !");
    $select=mysql_select_db("GBO");
    $query="select * from MESSAGE";
    $result=mysql_query($query);
    $totenreg=mysql_num_rows($result);

    echo "<form action='scripts/edite.php' method='post' name='editer' enctype='multipart/form-data'>";
    echo "<table width=100% border=1 align=center>";
    echo "<tr bgcolor='#000000'>";
    if ($totenreg==0)
      echo "<td colspan=7><h2>IL N'Y A PAS DE MESSAGES A EDITER</td>";
    else
    {
      echo "<td colspan=7><h2>EDITER MESSAGE(S)</td>";
      echo "</tr>";
      echo "<tr align=center bgcolor=#87CEEB>";
      echo "<td><h4 class='h41'>NUMERO</td>";
      echo "<td><h4 class='h41'>ETAT</td>";
      echo "<td><h4 class='h41'>SOURCE</td>";
      echo "<td><h4 class='h41'>OBJET</td>";
      echo "<td><h4 class='h41'>DESTINATION</td>";
	  echo "<td><h4 class='h41'>DATE</td>";
      echo "<td><h4 class='h41'>Cocher</td>";
      echo "</tr>";
      $i=0;
      while ($row=mysql_fetch_array($result))
      {
        // if ($i==0)
        // {
          // echo "<tr bgcolor=#D3D3D3>";
          // $i++;
        // }
        // else
        // {
          // echo "<tr bgcolor=#FFFFFF>";
          // $i--;
        // }
        echo "<td><h5>".$row["NUMERO"]."</td>";
        echo "<td><h5>".$row["ETAT"]."</td>";
        echo "<td><h5>".$row["SOURCE"]."</td>";
        echo "<td ><h5>".$row["OBJET"]."</td>";
        echo "<td><h5>".$row["DESTINATION"]."</td>";
	    echo "<td><h5>".$row["DATE"]."</td>";
        echo "<td align=center><h5><input type='checkbox' name='type[]' value=".$row["NUMERO"]."></td>";
        echo "<tr>";
        }
      echo "</table>";
      echo "<br><br>";
      echo "<table width=50% align=center>";
      echo "<tr>";
      echo "<td align=center><input class='bouton' type='submit' name='Suivant' value='Suivant'></td>";
      echo "<td align=center><input class='bouton' type='reset' name='Effacer' value='Effacer'></td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
  ?>

</body>

</html>
