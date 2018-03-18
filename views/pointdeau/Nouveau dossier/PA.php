<?php	
ob_start();
$data = array(
"titre"     => 'Nouveau Poids / Age / Sexe', 
"btn"       => 'mnpe', 
"id"        => '', 
"butun"     => 'Inserer Poids', 
"photos"    => '3.jpg',
"action"    => 'mnpe/createpa/',
"AGE"       => '',
"SEXE"      => array("F", "M"),
"M3ET"      => '00',
"M2ET"      => '00',
"M1ET"      => '00',
"MED"       => '00',
"P1ET"      => '00',
"P2ET"      => '00',
"P3ET"      => '00',
"x"         => "30",
"y"         => "240"
);
View::MNPEPA($data);
view::sautligne(3);
ob_end_flush();
?>
<br/><br/><br/><br/><br/><hr/><br/>
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:10px;"  colspan="9"    >
<?php
echo '<a href="'.URL.'pdf/imppa.php">Imprimer table Poids / Age / Masculin </a>'; echo '&nbsp;';	
?>
</th>
</tr>
<tr>
<th style="width:100px;">AGE</th>
<th style="width:100px;">-3ET</th>
<th style="width:100px;">-2ET</th>
<th style="width:100px;">-1ET</th>
<th style="width:100px;">MED</th>
<th style="width:100px;">+1ET</th>
<th style="width:100px;">+2ET</th>
<th style="width:100px;">+3ET</th>
<th style="width:100px;">Update</th>
</tr>
<?php		
if (isset($this->userListview)) 
{	
		foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate ='#EDF7FF';
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" >  <?php echo $value['AGE'];?></td>
			<td align="center" >  <?php echo $value['M3ET'];?></td>
			<td align="center" >  <?php echo $value['M2ET'];?></td>
			<td align="center" >  <?php echo $value['M1ET'];?></td>
			<td align="center" bgcolor="red" ><STRONG>  <?php echo $value['MED'];?></STRONG></td>
			<td align="center" >  <?php echo $value['P1ET'];?></td>
			<td align="center" >  <?php echo $value['P2ET'];?></td>
			<td align="center" >  <?php echo $value['P3ET'];?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'pat/editpa/'.$value['IDAGE'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="9" ><span>' .$total_count.' record(s) found.</span></td></tr>';			
}				
echo "</table>";
?>

<br/><br/><br/><br/><br/><hr/><br/>
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:10px;"  colspan="9"    >
<?php
echo '<a href="'.URL.'pdf/imppaf.php">Imprimer table Poids / Age / Feminin </a>'; echo '&nbsp;';	
?>
</th>
</tr>
<tr>
<th style="width:100px;">AGE</th>
<th style="width:100px;">-3ET</th>
<th style="width:100px;">-2ET</th>
<th style="width:100px;">-1ET</th>
<th style="width:100px;">MED</th>
<th style="width:100px;">+1ET</th>
<th style="width:100px;">+2ET</th>
<th style="width:100px;">+3ET</th>
<th style="width:100px;">Update</th>
</tr>
<?php		
if (isset($this->userListview1)) 
{	
		foreach($this->userListview1 as $key => $value)
		{ 
		$bgcolor_donate ='#EDF7FF';
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" >  <?php echo $value['AGE'];?></td>
			<td align="center" >  <?php echo $value['M3ET'];?></td>
			<td align="center" >  <?php echo $value['M2ET'];?></td>
			<td align="center" >  <?php echo $value['M1ET'];?></td>
			<td align="center" bgcolor="red" ><STRONG>  <?php echo $value['MED'];?></STRONG></td>
			<td align="center" >  <?php echo $value['P1ET'];?></td>
			<td align="center" >  <?php echo $value['P2ET'];?></td>
			<td align="center" >  <?php echo $value['P3ET'];?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'pat/editpa/'.$value['IDAGE'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count1=count($this->userListview1);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="9" ><span>' .$total_count1.' record(s) found.</span></td></tr>';			
}				
echo "</table>";

view::graphemnpe(400,240,'table Poids / Age / Masculin','pa','M');

?>






