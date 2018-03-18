<?php 
verifsession();
view::button('cons',$this->user[0]['id']);
// function dateFR2US($date)//01/01/2013
// {
// $J      = substr($date,0,2);
// $M      = substr($date,3,2);
// $A      = substr($date,6,4);
// $dateFR2US =  $A."-".$M."-".$J ;
// return $dateFR2US;//2013-01-01
// }
$diff    = abs(time() - strtotime(dateFR2US(trim($this->user[0]['DATENAISSANCE'])))); 
$years   = floor($diff / (365*60*60*24));        
$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
View::h('2',25,290,'Patient  : Perinatalité [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
View::sautligne(2);
View::hr();

if($this->user[0]['SEX']=='F')
{
View::f0(URL.'Pat/PERINATOK/','post');
$x=220;
View::label(50,$x+145,'Nom Père');View::txt(150,$x+140,'NOMP',20,"***");View::label(400,$x+145,'Prénom Père');View::txt(500,$x+140,'PRENOMP',20,"***");
View::label(50,$x+145+30,'DDR');View::txt(150,$x+140+30,'DDR',20,date('Y-m-d'));View::label(400,$x+145+30,'DPA');View::txt(500,$x+140+30,'DDR',20,date('Y-m-d'));
View::label(50,$x+145+60,'Grossesse');View::combov1(150,$x+140+60,'GROSSESSE',array("Intra Uterine"=>"1", "Extra Uterine"=>"2"));
View::label(400,$x+145+60,'Evolution');View::combov1(500,$x+140+60,'EVOLUTION',array("A Terme"=>"1", "Premature"=>"2", "Avortement"=>"2"));
View::label(50,$x+145+90,'Accouchement');View::combov1(150,$x+140+90,'ACCOUCHEMENT',array("Voie Basse Vaginale"=>"1", "Voie Haute Césariene"=>"2"));View::label(400,$x+145+90,'LE');View::txt(500,$x+140+90,'DATENAISSANCE',20,date('Y-m-d'));
View::label(750,$x+145+90,'HEURES');View::txt(850,$x+140+90,'HEURES',20,date('H:i'));
View::label(50,$x+145+120,'NEE');View::combov1(150,$x+140+120,'G1',array("Vivant"=>"1", "Morts"=>"2"));
View::label(400,$x+145+120,'Sexe');View::combov1(500,$x+140+120,'SEXEG1',array("M"=>"M", "F"=>"F"));
View::label(750,$x+145+120,'Prénom');View::txt(850,$x+140+120,'PRENOMG1',20,"***");
// View::label(50,$x+145+120+30,'G2');View::combov1(150,$x+140+120+30,'G2',array("Vivant nées"=>"1", "Morts nées"=>"2"));
// View::label(400,$x+145+120+30,'Sexe G2');View::combov1(500,$x+140+120+30,'SEXEG2',array("M"=>"1", "F"=>"2"));
// View::label(750,$x+145+150,'Prenom G2');View::txt(850,$x+140+120+30,'PRENOMG2',20,"***");
View::label(50,$x+145+150,'Wilaya');View::WILAYA(150,$x+140+150,'WILAYAN','country','mvc','wil','17000','wilaya de naissance'); 
View::label(400,$x+145+150,'Commune');View::COMMUNE(500,$x+140+150,'COMMUNEN','COMMUNEN','924','commune de naissance');// WILAYA(150,$x+140+150,'','','mvc','wil','$value','wilaya de naissance'); 


View::hide(215,670,'IDDNR',0,$this->user[0]['id']);
View::hide(215,670,'WILAYAR',0,$this->user[0]['WILAYAR']);
View::hide(215,670,'COMMUNER',0,$this->user[0]['COMMUNER']);
View::hide(215,670,'ADRESSE',0,$this->user[0]['ADRESSE']);
View::hide(215,670,'TELEPHONE',0,$this->user[0]['TELEPHONE']);

View::submit(1200,$x+280,'Enregistrer Gestation');									
View::f1();
}
else
{
header('location: ' . URL . 'pat/Hosp/'.$this->user[0]['id']);  
}	
View::sautligne(12);
View::hr();




?>

<h2>Gestes : prevoir insertion dans la table pat en auto alimentation  +tabl vaccination  </h2>  
		<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>	
		<th style="width:50px;"></th>
		<th style="width:50px;"></th> 
		<th style="width:50px;"></th>
		<th style="width:50px;"></th>
		<th style="width:50px;">NOM</th>
		<th style="width:50px;">PRENOM</th>
		<th style="width:50px;">FILS DE</th>
		<th style="width:50px;">SEXE</th>
		<th style="width:50px;">DATE NAISSANCE</th>
		<th style="width:50px;"></th>
		<th style="width:50px;"></th>
	
		<th style="width:50px;"></th>
		<th style="width:50px;">Update </th>
		<th style="width:50px;">Delete</th>
		</tr>
		<?php
		if (isset($this->userListview)) 
		{		
				foreach($this->userListview as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="LEFT"><?php //echo $value['NOM'];?></td>
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="étiquette" href="<?php echo URL.'pdf/ETTIDON.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/md_records.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="Questionnaire" href="<?php echo URL.'pdf/QESDNRPDF.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/b_props.png';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="Qualification" href="<?php echo URL.'pdf/RESDONPDF.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="LEFT"><?php echo $value['NOM'];?></td>
						<td align="LEFT"><?php echo $value['PRENOM'];?></td>
						<td align="LEFT"><?php echo $value['FILSDE'];?></td>
						<td align="center"><?php echo $value['SEX'];?></td>
						<td align="center"><?php echo $value['DATENAISSANCE'];?></td>
						<td align="center"><?php //echo $value['POIDS'];?></td>
						<td align="center"><?php //echo $value['Taille'];?></td>
					   
						<td align="center" <?php //if ($value['IND']!=='IND') {echo "bgcolor='red'";}?> ><?php //echo $value['IND'];?></td>
						<td align="center"><a title="editer" href="<?php echo URL.'pat/editpat/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'pat/deletepat/'.$value['id'].'/'.$value['IDDNR'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
						</tr>
				<?php 
				}
				$total_count=count($this->userListview);
				if ($total_count <= 0 )
				{
				echo '<tr><td align="center" colspan="16" ><span> No record found for patient </span></td> </tr>';
				echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="16" ><span>' .$total_count.'/'.$total_count.' Record(s) found.</span></td></tr>';					
				}
				else
				{		
				//echo '<tr bgcolor=""  ><td align="center" colspan="16" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb).'</td></tr>';	
			    echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="16" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
				}		
		}
		else 
		{
		echo '<tr><td align="center" colspan="16" ><span> Click search button to start searching a donor.</span></td></tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="16" ><span>&nbsp;</span></td></tr>';					      
		} 
		echo "</table>";
		?>