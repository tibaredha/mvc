
<?php	
verifsession();	
ob_start(); 
view::button('pointdeau','');
echo'<h2>Surveillance de la qualité de l’eau potable </h2 >';
$this->f0(URL.'pointdeau/screateoaep/','post');
View::photosurl(1150,150,URL.'public/images/photos/puit1.jpg');
$this->label(30,200,"EPSP");
$this->combov1(180,190,'EPSP',array(
"EPSP_DJELFA"=>"1",
"EPSP_MESSAAD"=>"2",
"EPSP_GUETTARA"=>"3",
"EPSP_HBB"=>"4",
"EPSP_AO"=>"5"
));

$this->label(30,230,"Type d'ouvrage AEP");
$this->combov1(180,220,'TOAEP',array(
"Puits individuels"=>"1",
"Puits collectifs"=>"2",
"Puits agricoles"=>"3",
"Source captée"=>"4",
"Source non captée"=>"5",
"Réservoirs"=>"6",
"Châteaux eaux"=>"7",
"Fontaine publique"=>"8",
"Robinets individuels"=>"9",
"Station de traitement"=>"10",
"Station de pompage"=>"11",
"Eau de stockage"=>"12",
"Oued"=>"13",
"Canal"=>"14",
"Forage"=>"15"
));
$this->label(30,260,'Num');$this->txt(180,220+30,'NUM',0,'000');
$this->label(480,200,'WILAYA');$this->WILAYA(700,190,'WILAYAN','country','mvc','wil','17000','wilaya de');
$this->label(480,230,'COMMUNE');$this->COMMUNE(700,190+30,'COMMUNEN','COMMUNEN','924','commune de');                 
$this->label(30,290,"chlore résiduel"); 
$this->combov1(180,280,'CR',array(
"Positif"=>"2",
"Negatif"=>"1",
"Absence de prélèvement"=>"0"
));                      
$this->label(30,320,"bactériologie"); 
$this->combov1(180,310,'BC',array(
"Absence de prélèvement"=>"0",
"Prélèvement non potable"=>"1",
"Prélèvement suspect"=>"2",
"Prélèvement potable"=>"3"
));                      
$this->label(30,350,"Date Surveillance"); $this->txt(180,340,'DATEI',0,date ('Y-m-d'));
$this->submit(700,340,'Inser New Surveillance');
$this->f1();view::sautligne(15);
?>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:10px;"  colspan="12"    >
<?php
// echo '<a href="'.URL.'pdf/lisdeceshospita.php">Releve Des Causes De Deces en pdf </a>'; echo '&nbsp;';
echo 'Surveillance de la qualité de l’eau potable  '; echo '&nbsp;';	
	
?>
</th>
</tr>
<tr>
<th style="width:60px;">Num</th>
<th style="width:100px;">Wilaya</th>
<th style="width:100px;">Commune</th>

<th style="width:100px;">EPSP</th>
<th style="width:50px;">Date</th>
<th style="width:50px;">Type</th>
<th style="width:10px;">Chlore </th>
<th style="width:10px;">Colimetrie</th>
<th style="width:10px;">Update</th>
<th style="width:10px;">Delete</th>
<th style="width:100px;">surveillance</th>
</tr>
<?php
if (isset($this->userListview)) 
{	
		foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate ='#EDF7FF';
        ?>
		<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" ><?php echo $value['NUM'];?></td>
			<td align="center" ><?php echo $value['WILAYAN'];?></td>
			<td align="center" ><?php echo $value['COMMUNEN'];?></td>
			<td align="center" ><?php echo $value['EPSP'];?></td>
			<td align="center" ><?php echo $value['DATEI'];?></td>
			<td align="center" ><?php echo $value['TOAEP'];?></td>
			<td align="center" ><?php echo $value['CR'];?></td>
			<td align="center" ><?php echo $value['BC'];?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'pointdeau/editsoaep/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'pointdeau/deletesoaep/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'pointdeau/deletesoaep/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			
		</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="15" ><span>' .$total_count.' record(s) found.</span></td></tr>';			
}
echo "</table>";

ob_end_flush();
?>
