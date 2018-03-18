<html>

<head>

<title>Ajouter</title>
<link href="http://127.0.0.1/base/css/style2.css" rel="stylesheet" type="text/css">

</head>

<body>

  <?php
    $connect=mysql_connect("localhost", "root", "") or die ("Echec de la connexion au serveur !");
    $select=mysql_select_db("GBO");
    $query="select * from MESSAGE";
    $result=mysql_query($query);

    if ((empty($_POST["NUMERO"])) || (empty($_POST["ETAT"])) || (empty($_POST["SOURCE"])) || (empty($_POST["OBJET"])) ||
        (empty($_POST["DESTINATION"])) || (empty($_POST["DATE"])))
    {
      echo "<H4>Certains champs sont restés vides,<br>Veuillez remplir tous les champs !";
      echo "<br><br><br><br>";
      echo "<H4><a href='Javascript:history.go(-1)'>Retour à la page ajouter un nouveau message</a><br>";
    }
    else
    {
      $query="insert into message values ('','".$_POST["NUMERO"]."', '".$_POST["ETAT"]."', '".$_POST["SOURCE"]."',
                                         '".$_POST["OBJET"]."', '".$_POST["DESTINATION"]."', '".$_POST["DATE"]."')";
      $result=mysql_query($query);
      if ($result)
        echo "<H4>Message ajouté avec succés !";
      else
        echo "<H4>Erreur lors de l'ajout du Message !";
      echo "<br><br><br><br>";
      echo "<H4><a href='http://127.0.0.1/base/ajouter.html'>Ajouter un nouveau client</a><br>";
      echo "<H4><a href='http://127.0.0.1/base/lister.php?test=3'>Lister tous les clients</a>";
    }
  ?>

</body>

</html>

