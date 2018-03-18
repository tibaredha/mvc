
<?php	
$url1 = explode('/',$_GET['url']);
ob_start();
view::button('deces','');

?>

<hr/><br/><br/><br/>
<?php
View::url(30,155,URL.'views/doc/deces/decesfr.pdf','Conforme a la circulaire n 607 du 24/11/1994',3);
?>

<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:10px;"  colspan="9"    >
<?php
// echo '<a href="'.URL.'pdf/lisdeceshospita.php">Releve Des Causes De Deces en pdf </a>'; echo '&nbsp;';
echo 'Releve Des Causes De Deces  '; echo '&nbsp;';	
	
?>
</th>
<th style="width:10px;" colspan="2">Maternel</th>
<th style="width:10px;" rowspan="2">Perinatal</th>


</tr>
<tr>
<th style="width:100px;">Date Ouverture</th>
<th style="width:300px;">Nom_Prénom</th>

<th style="width:10px;">Sexe</th>
<th style="width:60px;">Naissance</th>
<th style="width:10px;">Age</th>


<th style="width:150px;">CAUSE</th>
<th style="width:10px;">Update</th>
<th style="width:10px;">Delete</th>
<th style="width:100px;">Certificat</th>
<th style="width:50px;">Certificat</th>
<th style="width:50px;">Audit</th>
</tr>
<?php		
if (isset($this->userListview)) 
{	
		foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate ='#EDF7FF';
        ?>
		<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" ><?php echo view::dateUS2FR($value['DINS']);?></td>
			<td align="left" ><STRONG> <?php echo $value['NOM'].'_'.strtolower ($value['PRENOM']).' _ ['.strtolower ($value['FILSDE']).']';?></STRONG></td>
			
			<td align="center" ><?php echo $value['SEX'];?></td>
			<td align="center" ><?php echo $value['DATENAISSANCE'];?></td>
			<td align="center" ><?php echo $value['Years'];?></td>
			
			<td align="LEFT"   ><?php echo $value['CIM4'].'('.$value['CODECIM'].')';?></td>
			
			<td align="center"><a title="editer" href="<?php echo URL.'deces/editdeces/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'deces/deletedeces/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center" bgcolor="green"><a title="certificat de deces <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."pdf/deces/deceshosp.php?uc=".$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center" <?php if ($value['SEX']=='F'){echo'bgcolor="green"'; }  else {echo'bgcolor="red"';} ?>><a title="certificat de deces <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."pdf/certdecesmat.php?uc=".$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center" <?php if ($value['SEX']=='F'){echo'bgcolor="green"';}   else {echo'bgcolor="red"';} ?>><a title="certificat de deces <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."pdf/decesmaternels.php?uc=".$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>   
			<td align="center" <?php if ($value['Days'] <= 28){echo'bgcolor="green"';} else {echo'bgcolor="red"';} ?>><a title="certificat de deces <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."pdf/decesperinat.php?uc=".$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>   
		
		
		</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="15" ><span>' .$total_count.' record(s) found.</span></td></tr>';			
}				
echo "</table>";
view::sautligne(9);
ob_end_flush();
?>
	