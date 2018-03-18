<html>
<head>
<title>Lister Le message</title>
<link href="css/style2.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
    $connect=mysql_connect("localhost", "root", "") or die ("Echec de la connexion au serveur !");
    $select=mysql_select_db("GBO");
	$query="select * from message";
	$result=mysql_query($query);

    echo "<table  bgcolor='#a3a3a3' width=75% border=2 align=center>";
    echo "<tr>";
    echo "<td colspan=6 bgcolor='#f6000f'><h2>LISTER LE MESSAGE</td>";
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
    $query1="select * from setting champ ='source'  order by valeur asc";
	$result1=mysql_query($query);
	echo "<select name='SOURCE' align='left'>";
			while ($row=mysql_fetch_array($result1))
			    	{
					echo "<option selected value=".$row["valeur"].">".$row["valeur"]."";
				}
	echo "</select></td>";
	echo "</tr>";
    echo "<tr>";
    echo "<td colspan=2><h4 class='h42'>Objet</td>";
	echo "<td colspan=2> <textarea name='OBJET' rows=8 cols=30 ></textarea> </td>";
	echo "</tr>";
    echo "<tr>";       	
	echo "<td colspan=2><h4 class='h42'>Destination</td>";
	echo "<td colspan=2><h4>";
   	$query2="select * from setting where champ ='desination' order by valeur  asc";
	$result2=mysql_query($query);
	echo "<select name='DESTINATION' align='left'>";
	while ($row=mysql_fetch_array($result2))
	    	{
 				echo "<option selected value=".$row["valeur"].">".$row["valeur"]."";
			}
	echo "</select></td>";	
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan=2><h4 class='h42'>Date</td>";
    echo "<td align=center colspan=1><h5><input class='text' type='text' name='DATE' size=15 maxlength=12></td>";
    echo "</tr>";
    echo "</table>";
   echo "<br>";
    ?>
     

</body>

</html>

