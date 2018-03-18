<html>
<head>
<title>Editer</title>
<link href="http://127.0.01/base/css/style2.css" rel="stylesheet" type="text/css">
</head>
 <body>
   <?php
    $connect=mysql_connect("localhost", "root", "") or die ("Echec de la connexion au serveur !");
    $select=mysql_select_db("GBO");
	
  for ($i=0;$i<sizeof($_POST["numero"]); $i++)
    {
      $query="delete from MESSAGE where NUMERO='".$_POST["numero"][$i]."'";
      $result=mysql_query($query);
    }
    if ($result)
    {
      echo "<H4>".$i." MESSAGE(s) supprimé(s) !";
      echo "<br><br><br><br>";
      echo "<H4><a href='http://127.0.0.1/base/supprimer.php'>Supprimer message(s)</a><br>";
      echo "<H4><a href='http://127.0.0.1/base/lister.php?test=3'>Lister les messageS</a>";
    }
    else
      echo "<H4>Aucun message supprimé !";
  ?>

</body>

</html>
