<html>

<head>

<title>Editer</title>
<link href="http://127.0.0.1/base/css/style2.css" rel="stylesheet" type="text/css">

</head>

<body>

  <?php
    $connect=mysql_connect("localhost", "root", "") or die ("Echec de la connexion au serveur !");
    $select=mysql_select_db("GBO");

	echo sizeof($_POST["numero"]); 
    for ($i=0;$i<sizeof($_POST["numero"]); $i++)
    {
      $query="update MESSAGE set NUMERO='".$_POST["NUMERO"][$i]."', ETAT='".$_POST["ETAT"][$i]."', SOURCE='".$_POST["SOURCE"][$i]."', OBJET='".$_POST["OBJET"][$i]."',DESTINATION='".$_POST["DESTINATION"][$i]."',DATE='".$_POST["DATE"][$i]."' where NUMERO='".$_POST["NUMERO"][$i]."'";
      $result=mysql_query($query);
    }
    if ($result)
    {
      echo "<H4>".$i." MESSAGE(s) édité(s) !";
      echo "<br><br><br><br>";
      echo "<H4><a href='editer.php'>Editer MESSAGE (s)</a><br>";
      echo "<H4><a href='lister.php?test=3'>Lister les MESSAGES</a>";
    }
    else
      echo "<H4>Aucun message édité !";
  ?>

</body>

</html>
