<?php 
verifsession();	
view::button('rds','');
lang(Session::get('lang'));
ob_start();
// view::munu('rds'); 
?>
<h2>Gestion Produits </h2><hr/><br/>
<?php
// View::CATEGORIEG() ;
?>
<br/>
<table  width='70%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr bgcolor='#EDF7FF' > 
<td align="center"> <button onclick=" document.location='<?php echo URL.'rds/newpro/';?>'"   title="<?php echo 'new produit' ; ?>"><img src="<?php echo URL.'public/images/icons/add.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;<?php echo 'new produit' ; ?> </button></td>
</tr>
</table>
<br/>
<table  width='70%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr> 
<th style="width:100px;">PRODUIT</th> 
<th style="width:50px;">Update </th>
<th style="width:50px;">Delete</th>
<th style="width:50px;">Print</th>
</tr>
<?php				
if (isset($this->userListview)) 
{	
		foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate ='#EDF7FF';
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="left" ><?php echo $value['mecicament'].'  '.$value['pre'];?></td>
			<td align="center"><a title="editer <?php echo trim($value['id']);?>'s Record"                        href="<?php echo URL.'rds/edit/'.$value['id'].'/'.$value['categorie'];?>">      <img src="<?php echo URL.'public/images/icons/edit.PNG';?>"   width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="supprimer <?php echo trim($value['id']);?>'s Record"  class="delete"     href="<?php echo URL.'rds/delete/'.$value['id'];?>">    <img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche stock <?php echo trim($value['id']);?>'s Record"                   href="<?php echo URL.'pdf/***.php?uc='.$value['id'];?>">   <img src="<?php echo URL.'public/images/icons/print.PNG';?>"  width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="12" ><span> No record found for cgr </span></td> </tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="12" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
		}
		else
		{
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="12" ><span>' .$total_count.' Record(s) found.</span></td></tr>';	
		}
}
else 
{
echo '<tr><td align="center" colspan="12" ><span> No record found.</span></td></tr>';
echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="12" ><span>&nbsp;</span></td></tr>';					      
}				
echo "</table>";
ob_end_flush();
?>




