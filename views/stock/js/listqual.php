<?php 
verifsession();	
buttonqua();
?>
<h2>Qualification : list </h2 >
<br /><br />
<hr /><br />
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:50px;">IDP</th> 


<th style="width:80px;">DATE DON</th> 
<th style="width:80px;">HEURE DON</th>
<th style="width:80px;">GROUPAGE</th>
<th style="width:80px;">RHESUS</th>
<th style="width:80px;">HVB</th>
<th style="width:80px;">HVC</th>
<th style="width:80px;">HIV</th>
<th style="width:80px;">TPHA</th>
<th style="width:80px;">MODIFIER</th>
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
			
			<td align="center" >  <?php echo $value['IDP'];    ?></td>
			<td align="center" >  <?php echo $value['DATEDON'];    ?></td>
			<td align="center" >  <?php echo $value['HEUREDON'];    ?></td>
			<td align="center" >  <?php echo $value['GROUPAGE'];    ?></td>
			<td align="center" >  <?php echo $value['RHESUS'];    ?></td>
			<td align="center" >  <?php echo $value['HVB'];    ?></td>
			<td align="center" >  <?php echo $value['HVC'];    ?></td>
			<td align="center" >  <?php echo $value['HIV'];    ?></td>
			<td align="center" >  <?php echo $value['TPHA'];    ?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'qua/editqua/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="10" ><span> No record found for qualification </span></td> </tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="10" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
		}
		else
		{
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="10" ><span>' .$total_count.' Record(s) found.</span></td></tr>';	
		}
}
else 
{
echo '<tr><td align="center" colspan="10" ><span> No record found.</span></td></tr>';
echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="10" ><span>&nbsp;</span></td></tr>';					      
}				
echo "</table>";
?>
        
			

