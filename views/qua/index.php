<?php 
verifsession();	
view::button('qua','');
lang(Session::get('lang'));
ob_start();
view::munu('qua'); 
?>
<br />
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:50px;">IDP</th> 
<th  style="width:50px;">QUALIFICATION</th>
<th style="width:80px;">DATE DON</th> 
<th style="width:80px;">HEURE DON</th>
<th style="width:80px;">GROUPAGE</th>
<th style="width:80px;">RHESUS</th>
<th style="width:80px;">HVB</th>
<th style="width:80px;">HVC</th>
<th style="width:80px;">HIV</th>
<th style="width:80px;">TPHA</th>
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
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'qua/edit/'.$value['id'];?>'" title="qualifie <?php echo $value['IDP'].', '.$value['IDP']?>'s Record" <?php //echo ($allow_donate==FALSE)?'disabled':'';?> >&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/main_blood_drop.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" >  <?php echo $value['DATEDON'];    ?></td>
			<td align="center" >  <?php echo $value['HEUREDON'];    ?></td>
			<td align="center" >  <?php echo $value['GROUPAGE'];    ?></td>
			<td align="center" >  <?php echo $value['RHESUS'];    ?></td>
			<td align="center" >  <?php echo $value['HVB'];    ?></td>
			<td align="center" >  <?php echo $value['HVC'];    ?></td>
			<td align="center" >  <?php echo $value['HIV'];    ?></td>
			<td align="center" >  <?php echo $value['TPHA'];    ?></td>		
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
view::sautligne(3);

?>
        
			

