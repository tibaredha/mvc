<?php 
verifsession();
view::button('rec','');
?>
<h2>Stock CGR DATEPER + : list </h2><hr/><br/>
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:50px;">IDCGR</th> 
<th style="width:50px;">NDP</th> 
<th style="width:80px;">DATE DON</th> 
<th style="width:80px;">DATEPER</th>
<th style="width:80px;">GROUPAGE</th>
<th style="width:80px;">RHESUS</th>
<th style="width:80px;">DATEDIS</th>
<th style="width:80px;">IDREC</th>
<th style="width:80px;">DIST</th>
<th style="width:80px;">SER</th>
<th style="width:50px;">Update </th>
<th style="width:50px;">Delete</th>
<th style="width:50px;">Print</th>
</tr>
<?php				
if (isset($this->userListview)) 
{	
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = allow_donate($value['DATEDON']);
		$bgcolor_donate ='#EDF7FF';
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" >  <?php echo $value['IDCGR'];    ?></td>
			<td align="center" >  <?php echo $value['NDP'];    ?></td>
			<td align="center" >  <?php echo $value['DATEDON'];    ?></td>
			<td align="center" >  <?php echo $value['DATEPER'];    ?></td>
			<td <?php echo bgcolor_ABO($value['GROUPAGE'])  ;?> align="center" > <?php echo $value['GROUPAGE'];    ?></td>
			<td align="center" >  <?php echo $value['RHESUS'];    ?></td>
			<td align="center" >  <?php echo $value['DATEDIS'];    ?></td>
			<td align="center" >  <?php echo $value['IDREC'];    ?></td>
			<td <?php echo bgcolor_dis($value['DIST']);?> align="center"   >  <?php echo $value['DIST'];    ?></td>
			<td align="center" >  <?php echo $value['SERVICE'];?></td>
			<td align="center"><a title="editer <?php echo trim($value['IDCGR']);?>'s Record"                        href="<?php echo URL.'stock/editcgr/'.$value['IDCGR'];?>">      <img src="<?php echo URL.'public/images/icons/edit.PNG';?>"   width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="supprimer <?php echo trim($value['IDCGR']);?>'s Record"  class="delete"     href="<?php echo URL.'stock/deletecgr/'.$value['IDCGR'];?>">    <img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche stock <?php echo trim($value['IDCGR']);?>'s Record"                   href="<?php echo URL.'pdf/stock.php?uc='.$value['IDCGR'];?>">   <img src="<?php echo URL.'public/images/icons/print.PNG';?>"  width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="13" ><span> No record found for cgr </span></td> </tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="13" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
		}
		else
		{
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="13" ><span>' .$total_count.' Record(s) found.</span></td></tr>';	
		}
}
else 
{
echo '<tr><td align="center" colspan="13" ><span> No record found.</span></td></tr>';
echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="13" ><span>&nbsp;</span></td></tr>';					      
}				
echo "</table>";
?>
        
			

