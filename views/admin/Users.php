<?php 
verifsession();	
view::button('admin','');
lang(Session::get('lang'));
echo "<hr/><br/>" ;
$colspan=12;				
if (isset($this->user)) 
{
echo "<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th colspan=\"14\"style=\"width:50px;\"><a href=\"".URL."pdf/***.php\">Print Users</a></th>" ;	
echo "</tr>" ;
echo "<tr>" ;
echo "<th style=\"width:100px;\">Photos</th>" ;
echo "<th style=\"width:100px;\">View</th>" ;
echo "<th style=\"width:50px;\">id</th>" ;
echo "<th style=\"width:200px;\">region</th>" ;
echo "<th style=\"width:200px;\">wilaya</th>" ;
echo "<th style=\"width:200px;\">structure</th>" ;
echo "<th style=\"width:200px;\">grade</th>" ;
echo "<th style=\"width:200px;\">login</th>" ;
echo "<th style=\"width:200px;\">password</th>" ;
echo "<th style=\"width:200px;\">role</th>" ;
echo "<th style=\"width:200px;\">langue</th>" ;
echo "<th style=\"width:50px;\">Update </th>" ;
echo "<th style=\"width:50px;\">Delete</th>" ;
echo "<th style=\"width:50px;\">Fiche</th>" ;
echo "</tr>" ;		
		foreach($this->user as $key => $value)
		{ 
		$allow_donate = allow_donate($value['id']);
		$bgcolor_donate = bgcolor_donate ($allow_donate);$fichier = photosmfx('users',$value['id'].'.jpg','M') ;
        echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;    
		echo "<td align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."admin/upl/".$value['id']."\" ><img  src=\"".URL."public/webcam/users/".$fichier."\"  width='25' height='25' border='1' alt='photos'></td> " ;
		?>
			
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'admin/view/'.$value['id'];?>'"   title="View <?php   //echo $value['NOM'].', '.$value['PRENOM']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" >  <?php echo $value['id']?></td>
			<td align="center" >  <?php echo $value['REGION']?></td>
			<td align="center" >  <?php echo $value['WILAYA']?></td>
			<td align="center" >  <?php echo $value['STRUCTURE']?></td>
			<td align="center" >  <?php echo $value['GRADE']?></td>
			<td align="center" >  <?php echo $value['login']?></td>
			<td align="center" >  <?php echo $value['password']?></td>
			<td align="center" >  <?php echo $value['role']?></td>
			<td align="center" >  <?php echo $value['lang']?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'admin/***/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'admin/***/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche patient <?php //echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'s Record"" href="<?php echo URL.'pdf/***.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>			
			</tr>	
        <?php 
		}
}		
ob_end_flush();
echo "</table>" ;
?>