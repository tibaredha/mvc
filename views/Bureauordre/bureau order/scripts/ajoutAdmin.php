<html>

<head>

<title>Ajouter</title>
<link href="http://127.0.0.1/base/css/style2.css" rel="stylesheet" type="text/css">

</head>

<body>

  <?php
    $connect=mysql_connect("localhost", "root", "") or die ("Echec de la connexion au serveur !");
    $select=mysql_select_db("GBO");
    $query="select * from setting";
    $result=mysql_query($query);

    if ((empty($_POST["NouvSrc"])) && (empty($_POST["Nouvdest"]))  )
    {
      echo "<H4>Certains champs sont restés vides,<br>Veuillez remplir les champs convenablement !";
      echo "<br><br><br><br>";
      echo "<H4><a href='Javascript:history.go(-1)'>Retour à la page ajouter un nouveau message</a><br>";
    }
    elseif ((isset($_POST["NouvSrc"])) || (isset($_POST["Nouvdest"]))  )
    {
      if (empty($_POST["Nouvdest"]) && (isset($_POST["NouvSrc"]))) 
	  	 {
	   	 $query="insert into setting values ('source','".$_POST["NouvSrc"]."')";
         $result=mysql_query($query);
	  	  }
	  if (empty($_POST["NouvSrc"]) &&  (isset($_POST["Nouvdest"]))) 
	  	 {
	   	  $query="insert into setting values ('destination','".$_POST["Nouvdest"]."')";
		  $result=mysql_query($query);
	  	  } 
	elseif ((isset($_POST["NouvSrc"])) && (isset($_POST["Nouvdest"]))  )
	{
	 	    $query="insert into setting values ('source','".$_POST["NouvSrc"]."')";
			$query1="insert into setting values ('destination','".$_POST["Nouvdest"]."')";
		    $result=mysql_query($query);
		    $result1=mysql_query($query1);
			
	}
	  	
      if ($result || $result1 )
        echo "<H4>Configuration ajouté avec succés !";
      else
        echo "<H4>Erreur lors de l'ajout du Configuration !";
      echo "<br><br><br><br>";
      echo "<H4><a href='http://127.0.0.1/base/admin.php'>Ajouter un nouveau </a><br>";
     
    }
  ?>

</body>

</html>

