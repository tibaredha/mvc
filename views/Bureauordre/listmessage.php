
<?php
verifsession();	ob_start();lang(Session::get('lang'));
view::button('Bureauordre','');
view::munu('Bureauordre'); 
view::sautligne(2);
echo "<form action='".URL."Bureauordre/listmessage1' method='post' name='editer' enctype='multipart/form-data'>";
echo "<table width=100% border=1 align=center  border='1' cellpadding='5' cellspacing='1'  >";
echo "</tr>";
echo "<tr align=center bgcolor=#87CEEB>";
echo "<td>NUMERO&nbsp;&nbsp;&nbsp;&nbsp;     <a href='".URL."Bureauordre/listmessage/1'><img border=0 src='".URL."/public/images/icons/haut.gif' style=\"height:20px; width:20px\"><a>&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/2'><img border=0 src='".URL."/public/images/icons/bas.gif' style=\"height:20px; width:20px\"><a></td>";
echo "<td>ETAT&nbsp;&nbsp;&nbsp;&nbsp;       <a href='".URL."Bureauordre/listmessage/3'><img border=0 src='".URL."/public/images/icons/haut.gif' style=\"height:20px; width:20px\"><a>&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/4'><img border=0 src='".URL."/public/images/icons/bas.gif' style=\"height:20px; width:20px\"><a></td>";
echo "<td>SOURCE&nbsp;&nbsp;&nbsp;&nbsp;     <a href='".URL."Bureauordre/listmessage/5'><img border=0 src='".URL."/public/images/icons/haut.gif' style=\"height:20px; width:20px\"><a>&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/6'><img border=0 src='".URL."/public/images/icons/bas.gif' style=\"height:20px; width:20px\"><a></td>";
echo "<td>OBJET&nbsp;&nbsp;&nbsp;&nbsp;      <a href='".URL."Bureauordre/listmessage/7'><img border=0 src='".URL."/public/images/icons/haut.gif' style=\"height:20px; width:20px\"><a>&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/8'><img border=0 src='".URL."/public/images/icons/bas.gif' style=\"height:20px; width:20px\"><a></td>";
echo "<td>DESTINATION&nbsp;&nbsp;&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/9'><img border=0 src='".URL."/public/images/icons/haut.gif' style=\"height:20px; width:20px\"><a>&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/10'><img border=0 src='".URL."/public/images/icons/bas.gif' style=\"height:20px; width:20px\"><a></td>";
echo "<td>DATE&nbsp;&nbsp;&nbsp;&nbsp;       <a href='".URL."Bureauordre/listmessage/11'><img border=0 src='".URL."/public/images/icons/haut.gif' style=\"height:20px; width:20px\"><a>&nbsp;&nbsp;<a href='".URL."Bureauordre/listmessage/12'><img border=0 src='".URL."/public/images/icons/bas.gif' style=\"height:20px; width:20px\"><a></td>";
echo "<td>Cocher</td>";
echo "</tr>";$i=0;	
if (isset($this->userListview)) 
{
	foreach($this->userListview as $key => $value)
	{			
		if ($i==0){echo "<tr bgcolor=#D3D3D3>";$i++;}else{echo "<tr bgcolor=#FFFFFF>";$i--;}
		echo "<td>".$value["Numero"]."</td>";
		echo "<td>".$value["Etat"]."</td>";
		echo "<td>".$value["Source"]."</td>";
		echo "<td >".$value["Objet"]."</td>";
		echo "<td>".$value["Destination"]."</td>";
		echo "<td>".$value["Date"]."</td>";
		echo "<td align=center><input type='checkbox' name='type[]' value=".$value["id"]."></td>";
		echo "<tr>";
	}
}
echo "</table>";
echo "<table width=100% align=center>";
echo "<tr>";
echo "<td align=center><input class='bouton' type='submit' name='Suivant' value='Suivant'></td>";
echo "<td align=center><input class='bouton' type='reset' name='Effacer' value='Effacer'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";
view::sautligne(6);
?>