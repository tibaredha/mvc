﻿<?php
$db_host = "localhost";
$db_name = "mvc";
$db_user = "root";
$db_pass = "";
$cnx = mysql_connect($db_host, $db_user, $db_pass)or die('I cannot connect to the database because: ' . mysql_error());
$db = mysql_select_db($db_name);
mysql_query("SET NAMES 'UTF8' ");
if($_POST['id'])
{
$id=$_POST['id'];
$sql=mysql_query("select * from cts where IDWRS='$id'order by CTS");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row[0].'">'.$row[1].'</option>';
}
}
?>