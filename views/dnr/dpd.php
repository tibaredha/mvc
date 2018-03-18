<?php 
verifsession();	
view::button('dnr','');
?>

<hr/><br/>
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:10px;"  colspan="9"    >
<?php
echo '<a href="'.URL.'pdf/impdpd.php">Imprimer Donners</a>'; echo '&nbsp;';	
?>
</th>
</tr>
<tr>
<th style="width:10px;">View</th>
<th style="width:10px;">IDDNR</th>
<th style="width:100px;">Nom_Prenom</th>
<th style="width:80px;">Date De Naissance</th>
<th style="width:80px;">Age(Ans)</th>
<th style="width:80px;">Groupage_Rhesus</th>
<th style="width:80px;">Telephone</th>
<th style="width:80px;">Nombre De Dons</th>
<th style="width:80px;">fiche dnr</th>
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
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'dnr/view/'.$value['IDDNR'];?>'"   title="View <?php   echo $value['IDDNR'].', '.$value['IDDNR']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" >  <?php echo $value['IDDNR'];    ?></td>
			<td align="left" > <STRONG>     <?php echo TRIM(nbrtostring('dnr','id',$value['IDDNR'],'NOM')).'_'.strtolower(trim(nbrtostring('dnr','id',$value['IDDNR'],'PRENOM')))   ;    ?></STRONG></td>
			<td align="center" >  <?php echo nbrtostring('dnr','id',$value['IDDNR'],'DATENAISSANCE');    ?></td>
			<td align="center" >  <?php  echo substr(date('d-m-Y'),6,4)-substr(nbrtostring('dnr','id',$value['IDDNR'],'DATENAISSANCE'),6,4) ; ?></td>
			<td <?php echo bgcolor_ABO(trim($value['GROUPAGE']))  ;?> align="center" >  <?php echo trim($value['GROUPAGE'])."_[".trim($value['RHESUS'])."]";   ?></td>
			<td align="center" >  <?php echo nbrtostring('dnr','id',$value['IDDNR'],'TELEPHONE');    ?></td>
			<td align="center" >  <?php echo $value['NBRDON'];    ?></td>
			<td align="center"><a title="fiche donneur<?php echo trim($value['IDDNR']).', '.trim($value['IDDNR'])?>'s Record"" href="<?php echo URL.'pdf/FDNRPDF.php?uc='.$value['IDDNR'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="9" ><span>' .$total_count.' Record(s) found.</span></td></tr>';			
}				
echo "</table>";
?>

        


