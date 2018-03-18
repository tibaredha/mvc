<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'image','weigth=toolbar=no,scrollbars=no,resizable=yes, width=220, height=268');	
	w.document.write("<HTML><BODY onblur=\"window.close();\"><IMG src='"+img+"'>");
	w.document.write("</BODY></HTML>");
	w.document.close();
}
</script>
<?php 
verifsession();
ob_start();	
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
<th style="width:80px;">Nombre De doublons</th>
<th style="width:80px;">fiche dnr</th>
</tr>

<?php		
if (isset($this->userListview)) 
{
	
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = allow_donate('2016-01-01');
		$bgcolor_donate ='#EDF7FF';
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'dnr/view/'.$value['id'];?>'"   title="View <?php   echo $value['id'].', '.$value['id']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="LEFT" >  <?php echo $value['id'];    ?></td>
			<td align="LEFT" >  <?php echo $value['NOM'].'_'.$value['PRENOM'];    ?></td>
			<td align="center" >  <?php echo $value['DATENAISSANCE'];    ?></td>
			<td align="center" >  <?php  echo substr(date('d-m-Y'),6,4)-substr($value['DATENAISSANCE'],6,4) ; ?></td>
			<td <?php echo bgcolor_ABO(trim($value['GRABO']))  ;?> align="center" >  <?php echo trim($value['GRABO'])."_[".trim($value['GRRH'])."]";   ?></td>
			<td align="center" >  <?php echo $value['TELEPHONE'];    ?></td>
			
			<td align="center" >  <?php echo $value['nbr_doublon'];    ?></td>
			<td align="center"><a title="fiche donneur<?php echo trim($value['id']).', '.trim($value['id'])?>'s Record"" href="<?php echo URL.'pdf/FDNRPDF.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			
			</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="9" ><span>' .$total_count.' Record(s) found.</span></td></tr>';			
}				
echo "</table>";
ob_end_flush();
?>

        


