<html>

<head>

<title>Supprimer</title>
<link href="http://127.0.0.1/base/css/style2.css" rel="stylesheet" type="text/css">

</head>

<body bgcolor="#FFFFE0">

  <?php
    $connect=mysql_connect("localhost", "root", "") or die ("Echec de la connexion au serveur !");
    $select=mysql_select_db("GBO");

    if (!(isset($_POST["type"])))
    {
      echo "<H4>Vous devez sélectionner au moins un enregistrement !";
      echo "<br><br><br><br>";
      echo "<H4><a href='Javascript:history.go(-1)'>Retour à la page supprimer de(s) message(s)</a><br>";
    }
    else
    {
      echo "<form action='confirm_supprime.php' method='post' name='supprime' enctype='multipart/form-data'>";
      echo "<table width=100% border=1 align=center>";
      echo "<tr bgcolor='#000000'>";
      echo "<td colspan=5><h2>VOULEZ-VOUS SUPPRIMER CE(S) message(S) ?</td>";
      echo "</tr>";
      echo "<tr align=center bgcolor=#87CEEB>";
      echo "<td><h4 class='h41'>NUMERO</td>";
      echo "<td><h4 class='h41'>ETAT</td>";
      echo "<td><h4 class='h41'>SOURCE</td>";
      echo "<td><h4 class='h41'>OBJET</td>";
      echo "<td><h4 class='h41'>DESTINATION</td>";
      echo "<td><h4 class='h41'>DATE</td>";
      echo "</tr>";

      $j=0;

      for ($i=0;$i<count($_POST["type"]);$i++)
      {
	  echo count($_POST["type"]);
      	$query="select * from message where NUMERO='".$_POST["type"][$i]."'";
      	$result=mysql_query($query);
        if ($j==0)
        {
          echo "<tr bgcolor=#D3D3D3>";
          $j++;
        }
        else
        {
          echo "<tr bgcolor=#FFFFFF>";
          $j--;
        }
        $row=mysql_fetch_array($result);
        echo "<input type='hidden' name='numero[]' value='".$row["NUMERO"]."'>";
        echo "<td><h5>".$row["NUMERO"]."</td>";
		echo "<td><h5>".$row["ETAT"]."</td>";
        echo "<td><h5>".$row["SOURCE"]."</td>";
        echo "<td><h5>".$row["OBJET"]."</td>";
        echo "<td><h5>".$row["DESTINATION"]."</td>";
        echo "<td><h5>".$row["DATE"]."</td>";
        echo "<tr>";
      }
      echo "</table>";
      echo "<br><br>";
      echo "<table width=50% align=center>";
      echo "<tr>";
      echo "<td align=center><input class='bouton' type='submit' name='OK' value='OK'></td>";
      echo "<td align=center><button onClick='Javascript:history.go(-1)'>Annuler</button></td>";
      echo "</tr>";
      echo "</table>";
      echo "</form>";
    }
  ?>

</body>

</html>
