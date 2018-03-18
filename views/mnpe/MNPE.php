<?php	
$url1 = explode('/',$_GET['url']);
ob_start();
$data = array(
"titre"     => 'New Patient', 
"btn"       => 'mnpe', 
"id"        => '', 
"butun"     => 'Inser New Patient', 
"photos"    => '3.jpg',
"action"    => 'mnpe/createmnpe/',
"DINS"      => date('Y-m-d'),
"HINS"      => date("H:i"),
"NOM"       => 'x',
"PRENOM"    => 'y',   
"FILSDE"    => '*',
"SEXE"      => array("M", "F"),
"DATENS"    => '00/00/0000', 
"WILAYAN1"  => '17000' ,"WILAYAN2"  => 'wilaya de naissance',
"COMMUNEN1" => '924' ,"COMMUNEN2" => 'commune de naissance',
"WILAYAR1"  => '17000',
"WILAYAR2"  => 'wilaya de residence',
"COMMUNER1" => '924',
"COMMUNER2" => 'commune de residence',
"ADRESSE1"  => '24',
"ADRESSE2"  => 'citée',
"TEL"       => '(07) 00-00-00-00',
"TELF"      => '(000) 00-00-00',
"EMAIL"     => 'xxx@xxx.xx',
"POIDS"     => '2.1' ,"TAILLE" => '49',
"HB"        => '00' ,"HT" => '00',
"x"         => "30",
"y"         => "240"
);
View::MNPE($data);
view::sautligne(3);
ob_end_flush();
?>

<br/><br/><br/><br/><br/><hr/><br/>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:10px;"  colspan="14"    >
<?php
echo '<a href="'.URL.'pdf/implistmnpe.php">Imprimer liste malades </a>'; echo '&nbsp;';	
?>
</th>
</tr>
<tr>
<th style="width:100px;">id</th>
<th style="width:100px;">Nom</th>
<th style="width:100px;">Prenom</th>
<th style="width:100px;">Sexe</th>
<th style="width:100px;">Date Naissance</th>
<th style="width:100px;">Age mois</th>
<th style="width:100px;">Residence</th>
<th style="width:100px;">PA</th>
<th style="width:100px;">TA</th>
<th style="width:100px;">PT</th>
<th style="width:100px;">HB</th>
<th style="width:100px;">HT</th>
<th style="width:100px;">Update</th>
<th style="width:100px;">Delete</th>
</tr>
<?php		
if (isset($this->userListview)) 
{	
		foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate ='#EDF7FF';
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" >  <?php echo $value['id'];?></td>
			<td align="center" >  <?php echo $value['NOM'];?></td>
			<td align="center" >  <?php echo $value['PRENOM'];?></td>
			<td align="center" >  <?php echo $value['SEX'];?></td>
			<td align="center" bgcolor="red" ><STRONG>  <?php echo $value['DATENAISSANCE'];?></STRONG></td>
			<td align="center" >  <?php echo $value['Months'];?></td>
			<td align="center" >  <?php echo $value['COMMUNER'];?></td>
			<td align="center" >  <?php echo $value['IPA'];?></td>
			<td align="center" >  <?php echo $value['ISTA'];?></td>
			<td align="center" >  <?php echo $value['IPT'];?></td>
			<td align="center" >  <?php echo $value['HB'];?></td>
			<td align="center" >  <?php echo $value['HT'];?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'mnpe/editmnpe/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="editer" href="<?php echo URL.'mnpe/deletemnpe/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="14" ><span>' .$total_count.' record(s) found.</span></td></tr>';			
}				
echo "</table>";
?>

	