
<?php	
verifsession();	
ob_start(); 
view::button('pointdeau','');
echo'<h2> Ouvrage AEP</h2 >';
$this->f0(URL.'pointdeau/createoaep/','post');
View::photosurl(1070,150,URL.'public/images/photos/puit1.jpg');
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
$this->label(30,260,'Num');                      $this->txt(180,220+30,'NUM',0,'000');
$this->label(30,290,'Wilaya');                   $this->WILAYA(180,250+30,'WILAYAN','country','mvc','wil','17000','wilaya de');
$this->label(30,290+30,'Commune');                  $this->COMMUNE(180,280+30,'COMMUNEN','COMMUNEN','924','commune de');
$this->label(30,290+60,'Adresse');               $this->txt(180,280+60,'ADRESSE',0,'*');
$this->label(30,290+90,'Proprietaire');          $this->txt(180,280+90,'NOMPRENOM',0,'*');
$this->label(30,290+120,'Mise En Service');       $this->txt(180,280+120,'DATEN',0,'01/01/2016','date');
$this->label(30,290+150,'Population Desservie'); $this->txt(180,280+150,'POPDES',0,'10000');


// $this->label(30,,'Type Puit');                        $this->combov1(180,,'TYPEPUIT',array("Puits creusé"=>"1","Puits foncé"=>"2","Puits foré"=>"3"));    
// $this->label(420,200,'Revêtement interne');           $this->combov1(620,190,'REVINT',array("CONFORME"=>"2","XXX"=>"1","NON-CONFORME"=>"0")); 
// $this->label(420,230,'Plate forme');                  $this->combov1(620,220,'PLAFOR',array("CONFORME"=>"2","XXX"=>"1","NON-CONFORME"=>"0"));
// $this->label(420,260,'Margelle de sécurité');         $this->combov1(620,250,'MARSEC',array("CONFORME"=>"2","XXX"=>"1","NON-CONFORME"=>"0"));
// $this->label(420,290,'Périmètre de protection');      $this->combov1(620,280,'PERPRO',array("CONFORME"=>"2","XXX"=>"1","NON-CONFORME"=>"0"));
// $this->label(420,320,"Moyens d'extraction de l'eau"); $this->combov1(620,310,'EXTEAU',array("CONFORME"=>"2","XXX"=>"1","NON-CONFORME"=>"0"));
// $this->label(420,380,"Nature du Puit ");              $this->combov1(620,370,'REVINT',array("INDIVIDUEL"=>"2","COLLECTIF"=>"1","AGRICOLE"=>"0"));

$this->label(520,200,'Systeme de Désinfection');
$this->label(520,230,'Chlorateur automatique');View::radioed(720,230,"DES","CA");
$this->label(520,260,'Chlorateur de fortune');View::radio(720,260,"DES","CF");
$this->label(520,290,'Brique poreuse');View::radio(720,290,"DES","BP");
$this->label(520,320,'Galets');View::radio(720,320,"DES","G");
$this->label(520,350,'Manuellement');View::radio(720,350,"DES","M");
$this->label(520,380,'Absence de Systeme ');View::radio(720,380,"DES","AS");
$this->label(520,410,"Date inscription");$this->date(650,400,'DATEI',0,date ('d-m-Y'));



$this->submit(520,340+90,'Inser New Ouvrage AEP');
$this->f1();view::sautligne(20);
?>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:10px;"  colspan="12"    >
<?php
// echo '<a href="'.URL.'pdf/lisdeceshospita.php">Releve Des Causes De Deces en pdf </a>'; echo '&nbsp;';
echo 'Releve Des puits  '; echo '&nbsp;';	
	
?>
</th>
</tr>
<tr>
<th style="width:60px;">Num</th>
<th style="width:100px;">Wilaya</th>
<th style="width:100px;">Commune</th>
<th style="width:100px;">Adresse</th>
<th style="width:100px;">Proprietaire</th>
<th style="width:10px;">Service</th>
<th style="width:50px;">TOAEP</th>
<th style="width:10px;">Population </th>
<th style="width:10px;">DES</th>
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
			<td align="center" ><?php echo $value['ADRESSE'];?></td>
			<td align="center" ><?php echo $value['NOMPRENOM'];?></td>
			<td align="center" ><?php echo $value['DATEN'];?></td>
			<td align="center" ><?php echo $value['TOAEP'];?></td>
			<td align="center" ><?php echo $value['POPDES'];?></td>
			<td align="center" ><?php echo $value['DES'];?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'pointdeau/editoaep/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'pointdeau/deleteoaep/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'pointdeau/deleteoaep/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			
		</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="15" ><span>' .$total_count.' record(s) found.</span></td></tr>';			
}
echo "</table>";

ob_end_flush();
?>
