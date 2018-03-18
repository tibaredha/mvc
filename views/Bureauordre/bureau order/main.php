<html>
<head>
<title>Principale</title>
<link href="css/style2.css" rel="stylesheet" type="text/css">
</head>

<body>
  <h1 align="center"  >etablissement public hospitalier <br>ain oussera</h1>
  <br><br>
  <h1  align="center"   >GESTION<br>DU BUREAU D'ORDRE</h1>
  <br><br><br>
  <h3>Réalisé par:<br>tiba redha  <br></h3>


  <?php
  
  
  
    $connect=mysql_connect("localhost", "root", "") or die ("Echec de la connexion au serveur !");
    $select=mysql_select_db("GBO");
    if (!($select))
    {
      $query="CREATE DATABASE GBO";
      $result=mysql_query($query);
      if ($result)
        echo "<h4>Base de données GBO créée !<br>";
      $select=mysql_select_db("GBO");
    }
    $query="select * from Client";
    $result=mysql_query($query);
    if (!($result))
    {
      $query="CREATE TABLE MESSAGE (NUMBASE int(11) not null auto_increment Primary Key, NUMERO int(11) not null, ETAT varchar(50) not null, SOURCE varchar(50) not null,OBJET LONGTEXT not null, DESTINATION varchar(50) not null,DATE varchar(10) not null)";
	  $query1="CREATE TABLE setting (champ varchar(50), valeur varchar(50))";
	  $result=mysql_query($query);
  	  $result1=mysql_query($query1);
      if ($result)
        echo "<h4>Table message créée !<br>";
	 if ($result1)
        echo "<h4>Table setting créée !<br>";
    }
  ?>

</body>

</html>





