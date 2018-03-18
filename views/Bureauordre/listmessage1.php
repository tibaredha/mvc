
<?php
verifsession();	ob_start();lang(Session::get('lang'));
view::button('Bureauordre','');
view::munu('Bureauordre'); view::sautligne(2);

echo "<form action='".URL."Bureauordre/listmessage2' method='post' name='editer' enctype='multipart/form-data'>";
echo "<table width=100% border=1 align=center  border='1' cellpadding='5' cellspacing='1'  >";
echo "</tr>";
echo "<tr align=center bgcolor=#87CEEB>";
echo "<td>NUMERO&nbsp;&nbsp;&nbsp;&nbsp;     <a href='".URL."Bureauordre/listmessage/1'><img border=0 src='".URL."/public/images/icons/haut.gif' style=\"height:20px; width:20px\"><a>&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/2'><img border=0 src='".URL."/public/images/icons/bas.gif' style=\"height:20px; width:20px\"><a></td>";
echo "<td>ETAT&nbsp;&nbsp;&nbsp;&nbsp;       <a href='".URL."Bureauordre/listmessage/3'><img border=0 src='".URL."/public/images/icons/haut.gif' style=\"height:20px; width:20px\"><a>&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/4'><img border=0 src='".URL."/public/images/icons/bas.gif' style=\"height:20px; width:20px\"><a></td>";
echo "<td>SOURCE&nbsp;&nbsp;&nbsp;&nbsp;     <a href='".URL."Bureauordre/listmessage/5'><img border=0 src='".URL."/public/images/icons/haut.gif' style=\"height:20px; width:20px\"><a>&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/6'><img border=0 src='".URL."/public/images/icons/bas.gif' style=\"height:20px; width:20px\"><a></td>";
echo "<td>OBJET&nbsp;&nbsp;&nbsp;&nbsp;      <a href='".URL."Bureauordre/listmessage/7'><img border=0 src='".URL."/public/images/icons/haut.gif' style=\"height:20px; width:20px\"><a>&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/8'><img border=0 src='".URL."/public/images/icons/bas.gif' style=\"height:20px; width:20px\"><a></td>";
echo "<td>DESTINATION&nbsp;&nbsp;&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/9'><img border=0 src='".URL."/public/images/icons/haut.gif' style=\"height:20px; width:20px\"><a>&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/10'><img border=0 src='".URL."/public/images/icons/bas.gif' style=\"height:20px; width:20px\"><a></td>";
echo "<td>DATE&nbsp;&nbsp;&nbsp;&nbsp;       <a href='".URL."Bureauordre/listmessage/11'><img border=0 src='".URL."/public/images/icons/haut.gif' style=\"height:20px; width:20px\"><a>&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/12'><img border=0 src='".URL."/public/images/icons/bas.gif' style=\"height:20px; width:20px\"><a></td>";
echo "</tr>";
$connect=mysql_connect("localhost", "root", "") or die ("Echec de la connexion au serveur !");
$select=mysql_select_db("mvc");	
$ii=0;   
if (isset ($_POST["type"]) ) 
{
 for ($i=0;$i<count($_POST["type"]);$i++)
      {
      	$query="select * from message where id='".$_POST["type"][$i]."'";
      	$result=mysql_query($query); 
        $row=mysql_fetch_array($result);		
		if ($ii==0){echo "<tr bgcolor=#D3D3D3>";$ii++;}else{echo "<tr bgcolor=#FFFFFF>";$ii--;}
		echo "    <input  type='hidden' Name='id[]'           value='".$row["id"]."'>";
        echo "<td><input  type='text'   Name='NUMERO[]'       value='".$row["Numero"]."'></td>";
	    echo "<td><input  type='text'   Name='ETAT[]'         value='".$row["Etat"]."'></td>";
        echo "<td><input  type='text'   Name='SOURCE[]'       value='".$row["Source"]."'></td>";
        echo "<td><input  type='text'   Name='OBJET[]'        value='".$row["Objet"]."'></td>";
        echo "<td><input  type='text'   Name='DESTINATION[]'  value='".$row["Destination"]."'></td>";
		echo "<td><input  type='text'   Name='DATE[]'         value='".$row["Date"]."'></td>";
        echo "<tr>";
      }
} 
echo "</table>";
echo "<table width=100% align=center>";
echo "<tr>";
echo "<td align=center><input class='bouton' type='submit' name='Suivant' value='Suivant'></td>";
echo "<td align=center><button  id='boutonannuler'   onClick='Javascript:history.go(-1)'>Annuler</button></td>";
echo "</tr>";
echo "</table>";
echo "</form>";
view::sautligne(6);
  
?>