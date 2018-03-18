<?php 
verifsession();	
view::button('dnr','');
// urlbutton(1000,370,URL.'pdf/impcomp.php','IMP COMPAGNE','',5);
?>

<hr /><br />
<form method="post" action="<?php echo URL;?>don/COMP1/"> 
	<label>Date collecte</label><input type="text" name="DATEDON" value="<?php echo date('Y-m-d') ?>" /><br/>
	<label>Type collecte</label><?php combov(260,310,'STR',array("FIXE", "MOBILE"));?><br />
	<label>Adresse collecte</label> <?php WILAYA(260,540,'WILAYAR','countryr','gpts2012','wil');?>&nbsp;<?php COMMUNE(670,540,'COMMUNER','COMMUNER');?><input type="text" name="ADRESSE" value="Ain-oussera" required /><br />
    <input type="hidden" name="REGION"       value="<?php echo $_SESSION['REGION'];?>" />
	<input type="hidden" name="WILAYA"       value="<?php echo $_SESSION['WILAYA'];?>" />
	<input type="hidden" name="STRUCTURE"    value="<?php echo $_SESSION['STRUCTURE'];?>" />
	<input type="hidden" name="login"        value="<?php echo $_SESSION['login'];?>" />
	<label>&nbsp;</label><input type="submit" />
</form>
<hr />
<br />
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th colspan="9" style="width:50px;">

<?php
echo '<a href="'.URL.'pdf/impcomp.php">Imprimer Collecte</a>'; echo '&nbsp;';echo '&nbsp;';		
echo '<a href="'.URL.'pdf/calendar.php">Imprimer calendar</a>'; echo '&nbsp;';echo '&nbsp;';		
echo '<a href="'.URL.'views/doc/trans/guidedonneur.pdf">guide  donneur</a>'; echo '&nbsp;';	

?>
</th> 

</tr>
<tr>
<th style="width:50px;">ID</th> 
<th style="width:80px;">Date Collecte</th> 
<th style="width:80px;">Wilaya</th>
<th style="width:80px;">Commune</th>
<th style="width:80px;">Adresse</th>
<th style="width:80px;">Sructure</th>
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
			<td align="center" >  <?php echo $value['id'];    ?></td>
			<td align="center" >  <?php echo $value['DATEDON'];    ?></td>
			<td align="center" >  <?php echo nbrtostring('wil','IDWIL',$value['WILAYA'],'WILAYAS'); ?></td>
			<td align="center" >  <?php echo nbrtostring('com','IDCOM',$value['COMMUNE'],'COMMUNE');?></td>
			<td align="center" >  <?php echo $value['ADRESSE'];    ?></td>
			<td align="center" >  <?php echo $value['STR'];    ?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'don/editcomp/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'don/deletecomp/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche collecte<?php echo trim($value['id']).', '.trim($value['DATEDON'])?>'s Record"" href="<?php echo URL.'pdf/FCOMP.php?DATEDON='.$value['DATEDON'].'&id='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>

			</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="9" ><span> No record found for compagne </span></td> </tr>';
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
