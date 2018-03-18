
<?php
verifsession();	ob_start();lang(Session::get('lang'));
view::button('Bureauordre','');
view::munu('Bureauordre'); view::sautligne(2);


$connect=mysql_connect("localhost", "root", "") or die ("Echec de la connexion au serveur !"); 
$select=mysql_select_db("mvc");       
if (isset ($_POST["id"]) ) 
{

	for ($i=0;$i<sizeof($_POST["id"]); $i++)
    {
      $query="update message set 
	 
	  Numero      ='".$_POST["NUMERO"][$i]."', 
	  Etat        ='".$_POST["ETAT"][$i]."', 
	  Source      ='".$_POST["SOURCE"][$i]."', 
	  Objet       ='".$_POST["OBJET"][$i]."',
	  Destination ='".$_POST["DESTINATION"][$i]."',
	  Date        ='".$_POST["DATE"][$i]."' 
	  
	  where id='".$_POST["id"][$i]."'";
      $result=mysql_query($query);
    }
	
	
    if ($result)
    {
      echo "<H4>".$i." MESSAGE(s) édité(s) !";
      echo "<br><br><br><br>";
      echo "<H4><a href='".URL."Bureauordre/listmessage/0'>Editer MESSAGE (s)</a><br>";
   }
   }  else
      echo "<H4>Aucun message édité !";

view::sautligne(4);	  
?>