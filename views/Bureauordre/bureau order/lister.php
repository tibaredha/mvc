<html>
<head>
<title>Lister</title>
<link href="css/style2.css" rel="stylesheet" type="text/css">
</head>

<body>
  <?php
    $connect=mysql_connect("localhost", "root", "") or die ("Echec de la connexion au serveur !");
    $select=mysql_select_db("GBO");
    switch($_GET["test"])
    {
      case 1 : $query="select * from message order by SOURCE asc";      break;
	  case 2 : $query="select * from message order by SOURCE desc";     break;
      case 3 : $query="select * from message order by NUMERO asc";      break;
      case 4 : $query="select * from message order by NUMERO desc";     break;
	  case 5 : $query="select * from message order by DATE asc";        break;
      case 6 : $query="select * from message order by DATE desc";       break;
      case 7 : $query="select * from message order by DESTINATION asc"; break;
      case 8 : $query="select * from message order by DESTINATION desc";break;
      case 9 : $query="select * from message order by OBJET asc";       break;
      case 10 : $query="select * from message order by OBJET desc";     break;
      default : $query="select * from message";
    }
    $result=mysql_query($query);
    $totenreg=mysql_num_rows($result);
    echo "<form action='lister.php' method='get' name='lister' enctype='multipart/form-data'>";
    echo "<table width=100% border=1 align=center>";
    echo "<tr bgcolor='#000000'>";
    if ($totenreg==0)
      echo "<td colspan=9><h2>IL N'Y A PAS DE MESSAGES</td>";
    else
    {
      echo "<td colspan=9><h2>IL Y A ".$totenreg." message(S)</td>";
      echo "</tr>";
      echo "<tr align=center bgcolor=#87CEEB>";
      echo "<td><b><h4 class='h41'>NUMERO&nbsp;&nbsp;&nbsp;&nbsp;<a href='lister.php?test=1'>  <img border=0 src='http://127.0.0.1/bureau order/images/haut.gif'><a>&nbsp;&nbsp;<a href='lister.php?test=2'><img border=0 src='http://127.0.0.1/bureau order/images/bas.gif'><a></b></td>";
      echo "<td><b><h4 class='h41'>ETAT&nbsp;&nbsp;&nbsp;&nbsp;<a href='lister.php?test=3'><img border=0 src='http://127.0.0.1/bureau order/images/haut.gif'><a>&nbsp;&nbsp;<a href='lister.php?test=4'><img border=0 src='http://127.0.0.1/bureau order/images/bas.gif'><a></b></td>";
      echo "<td><b><h4 class='h41'>SOURCE&nbsp;&nbsp;&nbsp;&nbsp;<a href='lister.php?test=3'><img border=0 src='http://127.0.0.1/bureau order/images/haut.gif'><a>&nbsp;&nbsp;<a href='lister.php?test=4'><img border=0 src='http://127.0.0.1/bureau order/images/bas.gif'><a></b></td>";
      echo "<td><b><h4 class='h41'>OBJET&nbsp;&nbsp;&nbsp;&nbsp;<a href='lister.php?test=5'><img border=0 src='http://127.0.0.1/bureau order/images/haut.gif'><a>&nbsp;&nbsp;<a href='lister.php?test=6'><img border=0 src='http://127.0.0.1/bureau order/images/bas.gif'><a></b></td>";
      echo "<td><b><h4 class='h41'>DESTINATION&nbsp;&nbsp;&nbsp;&nbsp;<a href='lister.php?test=7'><img border=0 src='http://127.0.0.1/bureau order/images/haut.gif'><a>&nbsp;&nbsp;<a href='lister.php?test=8'><img border=0 src='http://127.0.0.1/bureau order/images/bas.gif'><a></b></td>";
      echo "<td><b><h4 class='h41'>DATE&nbsp;&nbsp;&nbsp;&nbsp;<a href='lister.php?test=9'><img border=0 src='http://127.0.0.1/bureau order/images/haut.gif'><a>&nbsp;&nbsp;<a href='lister.php?test=10'><img border=0 src='http://127.0.0.1/bureau order/images/bas.gif'><a></b></td>";
      echo "</tr>";
    }
    echo "</form>";
    $i=0;
    while ($row=mysql_fetch_array($result))
    {  
	if ($i==0)
      {
        echo "<tr bgcolor=#D3D3D3>";$i++;  
      }
      else
      {
        echo "<tr bgcolor=#FFFFFF>";$i--;  
      }
      echo "<td><h5>".$row["NUMERO"]."</td>";
      echo "<td><h5>".$row["ETAT"]."</td>";
      echo "<td><h5>".$row["SOURCE"]."</td>";      
      echo "<td><h5>".$row["OBJET"]."</td>";
      echo "<td><h5>".$row["DESTINATION"]."</td>";
      echo "<td><h5>".$row["DATE"]."</td>";
      echo "<tr>";
    }
    echo "</table>";
  ?>
</body>
</html>

