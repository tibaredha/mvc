<?php 
verifsession();	
view::button('pan','');lang(Session::get('lang'));
?>
<h2>New Commande </h2><hr/><br/>
<?php
// View::CATEGORIEG() ;
?>
<br/>
<table  width='70%' border='1' cellpadding='5' cellspacing='1' align='center'>
           
<tr bgcolor='#EDF7FF' > 
	<td align="center"> <button onclick=" document.location='<?php echo URL.'pan/newcom/';?>'"   title="<?php echo 'new commande' ; ?>"><img src="<?php echo URL.'public/images/icons/add.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;<?php echo 'new commande' ; ?> </button></td>
	<td align="center"> <button onclick=" document.location='<?php echo URL.'pan/newpro/';?>'"   title="<?php echo 'new produit' ; ?>"><img src="<?php echo URL.'public/images/icons/add.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;<?php echo 'new produit' ; ?> </button></td>
	
</tr>
</table>
<br/>
<table  width='70%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:50px;">PHOTOS</th> 
<th style="width:50px;">PRODUIT</th> 
<th style="width:80px;">DESCRIPTION</th> 
<th style="width:80px;">PRIX</th>
<th style="width:80px;">Stock min</th>
<th style="width:80px;">Stock Seuil</th>
<th style="width:80px;">Stock</th>
<th style="width:80px;">Stock max</th>
<th style="width:80px;">Quantite</th>

</tr>
<?php
View::f0(URL.'pan/editcom/','post');				
if (isset($this->userListview)) 
{	
		foreach($this->userListview as $key => $value)
		{ 
		//$allow_donate = allow_donate($value['DATEDON']); 
		$bgcolor_donate ='#EDF7FF';
		
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" >  
			<img src="<?php echo  URL.'public/images/images/'.$value['id'].'.jpg'; ?>" width="60" height="60" alt="<?php echo $value['name'];?>"/>
			</td>
			<td align="left" >  <?php echo $value['name'];?></td>
			<td align="left" >  <?php echo $value['description'];?></td>
			<td align="center" ><?php echo $value['price'];?></td>
			<td align="center" ><?php echo $value['smin'];?></td>
			<td align="center" ><?php echo $value['qts'];?></td>
			<td align="center" ><?php echo $value['qte'];?></td>
			<td align="center" ><?php echo $value['smax'];?></td>
		<?php
		echo( "<td><div align=\"center\">"."<input type=\"txt\" name=\"".trim($value["name"])."\" value=\" 0\" size=\"10\" />"."</div></td>\n" );//	
		echo '</tr>';	
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
View::submit(50,410,'update');									
View::f1();
?>




