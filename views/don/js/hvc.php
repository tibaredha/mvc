<?php 
verifsession();	
buttondnr();
?>
<h2>Donor : Positf Pour HVC </h2 >
<br /><br />
<hr /><br />
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:50px;">FICHE IPA HVC</th> 
<th style="width:50px;">IDP</th>
<th style="width:80px;">NOM</th> 
<th style="width:80px;">PRENOM</th> 
<th style="width:80px;">DATE DON</th> 
<th style="width:80px;">HEURE DON</th>
<th style="width:80px;">HVC</th> 
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
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'PDF/FHVC.php?uc='.$value['id']; ?>'" title="FICHE IPA HVC <?php echo $value['IDP'].', '.$value['IDP']?>'s Record" <?php //echo ($allow_donate==FALSE)?'disabled':'';?> >&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/main_blood_drop.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" >  <?php echo $value['IDP'];    ?></td>
			<td align="LEFT" >  <?php echo  nbrtostring('dnr','id',$value['IDDNR'],'NOM') ;    ?></td>
			<td align="LEFT" >  <?php echo nbrtostring('dnr','id',$value['IDDNR'],'PRENOM') ;    ?></td>
			<td align="center" >  <?php echo $value['DATEDON'];    ?></td>
			<td align="center" >  <?php echo $value['HEUREDON'];    ?></td>
			<td align="center" >  <?php echo $value['HVC'];    ?></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="9" ><span> No record found for qualification </span></td> </tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="9" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
		}
		else
		{
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="9" ><span>' .$total_count.' Record(s) found.</span></td></tr>';	
		}
}
else 
{
echo '<tr><td align="center" colspan="9" ><span> No record found.</span></td></tr>';
echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="9" ><span>&nbsp;</span></td></tr>';					      
}				
echo "</table>";
?>
        