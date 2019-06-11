<?php
define('URL', 'http://'.$_SERVER['SERVER_NAME'].'/mvc/');
function bgcolor_ABO($ABO) 
{
switch($ABO)  
{
   case 'A' :
		{ return   $bgcolor_ABO= 'bgcolor="#8DBCFD"     style="color:white"  ';break;}
   case 'B' :
		{ return   $bgcolor_ABO= 'bgcolor="yellow"      style="color:black"  ';break;}
   case 'AB' :
		{ return   $bgcolor_ABO= 'bgcolor="#ed1c24"     style="color:white"  ';break;}
   case 'O' :
		{ return   $bgcolor_ABO= 'bgcolor="white"       style="color:red"  ';break;}
		
}		
}

function allow_donate($donate) 
{
  $months_for_donor_allow_donate = 3;
  $diff = abs(time() - strtotime($donate)); 
  $years = floor($diff / (365*60*60*24));        
  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
  $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
  $allow_donate = FALSE; 
	if ($years > 0)
	{
	   $due = "" ; 
	   $allow_donate = TRUE;
	}
	else if ($months > 0)
	{
		if ($months > $months_for_donor_allow_donate)
			$allow_donate = TRUE;
	}
return $allow_donate ;	$due;
}
function bgcolor_donate($allow_donate) 
{
	if($allow_donate==true) {
	$bgcolor_donate= '#EDF7FF' ;
	}
	else{
	$bgcolor_donate= '#A4A4A4' ;
	}
	return $bgcolor_donate ;
} 

if(!empty($_POST["keyword"])) {
	$db_host="localhost";
	$db_name="mvc"; 
	$db_user="root";
	$db_pass="";
	$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	$sql=mysql_query("SELECT * FROM dnr WHERE NOM like '" . $_POST["keyword"] . "%' ORDER BY NOM,PRENOM LIMIT 0,5");
	echo 'Total Donors : '. $totalmbr4=mysql_num_rows($sql);
	echo "</br>" ;echo "</br>" ;
	echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
	echo "<tr>" ;
	echo "<th style=\"width:50px;\">View</th>" ;
	echo "<th style=\"width:50px;\">Donate</th>" ;
	echo "<th>Last_First_Name</th>" ;
	echo "<th style=\"width:100px;\">Birthday</th> " ;
	echo "<th style=\"width:80px;\">Gender</th> " ;
	echo "<th style=\"width:80px;\">Blood Type</th>" ;
	echo "<th style=\"width:110px;\">Telephone</th>" ;
	echo "<th style=\"width:100px;\">Last Donated</th>" ;
	echo "<th style=\"width:50px;\">Update </th>" ;
	echo "<th style=\"width:50px;\">Delete</th>" ;
	echo "<th style=\"width:50px;\">Print</th>" ;
	echo "</tr>" ;
	while($value=mysql_fetch_array($sql))
	{
	$allow_donate = allow_donate($value['DDD']);
	$bgcolor_donate = bgcolor_donate ($allow_donate);
	echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
	?>	
	<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'dnr/view/'.$value['id'];?>'"   title="View <?php   echo $value['NOM'].', '.$value['PRENOM']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
	<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'dnr/Donate/'.$value['id'];?>'" title="Donate <?php echo $value['NOM'].', '.$value['PRENOM']?>'s Record" <?php echo ($allow_donate==FALSE)?'disabled':'';?> >&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/gs.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
	
	<td align="left" >  <strong><?php echo trim($value['NOM']).'_'.trim(strtolower($value['PRENOM'])).'_'.trim($value['FILSDE']);?></strong></td>
	<td align="center" >  <?php echo $value['DATENAISSANCE'];?></td>
	<td align="center" >  <?php echo $value['SEX'];?></td>
	<td <?php echo bgcolor_ABO(trim($value['GRABO']))  ;?>align="center" >  <?php echo $value['GRABO'].'_'.$value['GRRH'];?></td>
	<td align="center" >  <?php echo $value['TELEPHONE'];?></td>
	<td align="center" >  <?php echo $value['DDD'];?></td>
	
	<td align="center"><a target="_blank"  title="editer" href="<?php echo URL.'dnr/edit/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
	<td align="center"><a target="_blank"class="delete" title="supprimer" href="<?php echo URL.'dnr/delete/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
	<td align="center"><a target="_blank"title="fiche donneur<?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'s Record"" href="<?php echo URL.'pdf/FDNRPDF.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
	<?php
	echo '</tr>';		
	}
	echo "<tr>" ;
	echo "<th style=\"width:50px;\">View</th>" ;
	echo "<th style=\"width:50px;\">Donate</th>" ;
	echo "<th>Last_First_Name</th>" ;
	echo "<th style=\"width:100px;\">Birthday</th> " ;
	echo "<th style=\"width:80px;\">Gender</th> " ;
	echo "<th style=\"width:80px;\">Blood Type</th>" ;
	echo "<th style=\"width:110px;\">Telephone</th>" ;
	echo "<th style=\"width:100px;\">Last Donated</th>" ;
	echo "<th style=\"width:50px;\">Update </th>" ;
	echo "<th style=\"width:50px;\">Delete</th>" ;
	echo "<th style=\"width:50px;\">Print</th>" ;
	echo "</tr>" ;
    echo "</table>";
 
}

?>

