<?php 
verifsession();	
buttondnr();
?>
<h2>Dons  : list  en cour... </h2 >
<br /><br />
<hr /><br />
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th style="width:50px;">étiquette</th> 
		<th style="width:50px;">Questionnaire</th>
		<th style="width:50px;">Qualification</th>
		<th style="width:50px;">IDP</th>
		<th style="width:50px;">DATEDON</th>
		<th style="width:50px;">HEUREDON</th>
		<th style="width:50px;">STR</th>
		<th style="width:50px;">TDNR</th>
		<th style="width:50px;">TDON</th>
		<th style="width:50px;">POIDS</th>
		<th style="width:50px;">Taille</th>
		<th style="width:50px;">TA</th>
		<th style="width:50px;">IND</th>
		<th style="width:50px;">Update </th>
		<th style="width:50px;">Delete</th>
		</tr>
<?php				
if (isset($this->userListview)) 
		{		
				foreach($this->userListview as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="étiquette" href="<?php //echo URL.'pdf/ETTIDON.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/md_records.PNG';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="Questionnaire" href="<?php //echo URL.'pdf/QESDNRPDF.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/b_props.png';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="Qualification" href="<?php //echo URL.'pdf/RESDONPDF.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center"><?php echo $value['IDP'];?></td>
						<td align="center"><?php echo $value['DATEDON'];?></td>
						<td align="center"><?php echo $value['HEUREDON'];?></td>
						<td align="center"><?php echo $value['STR'];?></td>
						<td align="center"><?php echo $value['TDNR'];?></td>
						<td align="center"><?php echo $value['TDON'];?></td>
						<td align="center"><?php echo $value['POIDS'];?></td>
						<td align="center"><?php echo $value['Taille'];?></td>
						<td align="center"><?php echo $value['TAS'].'_'.$value['TAD'];?></td>
						<td align="center"><?php echo $value['IND'];?></td>
						<td align="center"><a title="editer" href="<?php echo URL.'dnr/editdon/'.$value['id'];?>"><img src='<?php //echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php //echo URL.'dnr/deletedon/'.$value['id'].'/'.$value['IDDNR'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
						</tr>
				<?php 
				}
				$total_count=count($this->userListview);
				if ($total_count <= 0 )
				{
				echo '<tr><td align="center" colspan="16" ><span> No record found for donor </span></td> </tr>';
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
		