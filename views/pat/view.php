<?php 
verifsession();
view::button('cons',$this->user[0]['id']);
View::h('2',25,140,'Patient :  [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
?>
<br /><br />
<hr /><br />
<div class="tabbed_area">  
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Personal Information</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">list des Consultations</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">list des Hospitalitations</a></li> 	
        </ul>    
		<div id="content_1" class="content">  
		<h2>Personal Information</h2>
		<form method="post" action="<?php echo URL;?>dnr/DONATEOK">
		<label>First Name</label><input type="text" name="NOM"     value="<?php echo $this->user[0]['NOM'];    ?>"  /><br />
		<label>Last  Name</label><input type="text" name="PRENOM"  value="<?php echo $this->user[0]['PRENOM']; ?>"  /><br />
		<label>ABO</label><input type="text" name="GRABO"  value="<?php echo $this->user[0]['GRABO']; ?>"  /><br />
		<label>D ou RH1</label><input type="text" name="GRRH"  value="<?php echo $this->user[0]['GRRH']; ?>"  /><br />
		<label>C ou RH2</label><input type="text" name="CRH2"  value="<?php echo $this->user[0]['CRH2']; ?>"  /><br />
		<label>E ou RH3</label><input type="text" name="ERH3"  value="<?php echo $this->user[0]['ERH3']; ?>"  /><br />
		<label>c ou RH4</label><input type="text" name="CRH4"  value="<?php echo $this->user[0]['CRH4']; ?>"  /><br />
		<label>e ou RH5</label><input type="text" name="ERH5"  value="<?php echo $this->user[0]['ERH5']; ?>"  /><br />
		<label>Kell ou KELL1</label><input type="text" name="KELL1"  value="<?php echo $this->user[0]['KELL1']; ?>"  /><br />
		<label>Cellano ou KELL2</label><input type="text" name="KELL2"  value="<?php echo $this->user[0]['KELL2']; ?>"  /><br />
		<label>HVB</label><input  type="text" name="HVB"     value="<?php echo $this->user[0]['HVB'];    ?>"  /><br />
		<label>HVC</label><input  type="text" name="HVC"     value="<?php echo $this->user[0]['HVC'];    ?>"  /><br />
		<label>HIV</label><input  type="text" name="HIV"     value="<?php echo $this->user[0]['HIV'];    ?>"  /><br />
		<label>TPHA</label><input type="text" name="TPHA"    value="<?php echo $this->user[0]['TPHA'];    ?>"  /><br />
		<label>WILAYA </label><input type="text" name="WILAYA"          value="<?php echo nbrtostring('wil','IDWIL', $this->user[0]['WILAYA'],'WILAYAS');    ?>"  /><br />
		<label>WILAYAR </label><input type="text" name="WILAYAR"        value="<?php echo nbrtostring('wil','IDWIL', $this->user[0]['WILAYAR'],'WILAYAS');   ?>"  /><br />
		<label>COMMUNE </label><input type="text" name="COMMUNE"        value="<?php echo nbrtostring('com','IDCOM', $this->user[0]['COMMUNE'],'COMMUNE');   ?>"  /><br />
		<label>COMMUNER </label><input type="text" name="COMMUNER"      value="<?php echo nbrtostring('com','IDCOM', $this->user[0]['COMMUNER'],'COMMUNE');   ?>"  /><br />
		<label>ADRESSE </label><input type="text" name="ADRESSE"        value="<?php echo $this->user[0]['ADRESSE'];    ?>"  /><br />
		<label>TELEPHONE </label><input type="text" name="TELEPHONE"    value="<?php echo $this->user[0]['TELEPHONE'];    ?>"  /><br />		
		<p><?php  //photos(1050,390,'');?></p><br /><br /><br /><br />
		<p><?php // photosurl(400,435,URL.'public/webcam/'.$this->user[0]['id'].'.jpg');?></p><br /><br /><br /><br />
		</div>
		
		<div id="content_2" class="content"> 
		<h2>Consultations </h2>
		<br/>
		<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th style="width:50px;">étiquette</th> 
		<th style="width:50px;">Questionnaire</th>
		<th style="width:50px;">Qualification</th>
		<th style="width:50px;">IDP</th>
		<th style="width:50px;">DATEDON</th>
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
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="étiquette" href="<?php echo URL.'pdf/ETTIDON.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/md_records.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="Questionnaire" href="<?php echo URL.'pdf/QESDNRPDF.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/b_props.png';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="Qualification" href="<?php echo URL.'pdf/RESDONPDF.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="center"><?php echo $value['IDP'];?></td>
						<td align="center"><?php echo $value['DATEDON'];?></td>
						<td align="center"><?php echo $value['STR'];?></td>
						<td align="center"><?php echo $value['TDNR'];?></td>
						<td align="center"><?php echo $value['TDON'];?></td>
						<td align="center"><?php echo $value['POIDS'];?></td>
						<td align="center"><?php echo $value['Taille'];?></td>
						<td align="center"><?php echo $value['TAS'].'_'.$value['TAD'];?></td>
						<td align="center" <?php if ($value['IND']!=='IND') {echo "bgcolor='red'";}?> ><?php echo $value['IND'];?></td>
						<td align="center"><a title="editer" href="<?php echo URL.'don/editdon/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'pat/deletecons/'.$value['id'].'/'.$value['IDDNR'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
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
		<br/><br/>
		</div>
		<div id="content_3" class="content">  
		<h2>Hospitalitations</h2>
		<br/>
		<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th style="width:30px;">Admis Le</th>
		<th style="width:50px;">Service</th>
		<th style="width:10px;">Hosp</th>
		<th style="width:10px;">FISU</th>
		<th style="width:10px;">PAR</th>
		<th style="width:10px;">SCOR</th>
		<th style="width:10px;">MORS</th>
		<th style="width:50px;">DGC</th>
		<th style="width:50px;">***</th>
		<th style="width:50px;">Date Sorti</th>
		<th style="width:50px;">Mode</th>
		<th style="width:25px;">Resume</th>
		<th style="width:25px;">FI/NA</th>
		<th style="width:25px;">Evacu</th>
		<th style="width:25px;">Deces</th>
		<th style="width:15px;">Update </th>
		<th style="width:15px;">Delete</th>
		</tr>
		<?php
		if (isset($this->userListview1)) 
		{		
				foreach($this->userListview1 as $key1 => $value1){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						
						<td align="center"><?php echo $value1['DATEDON'];?></td>
						<td align="left"><a title="Changement De Service" href="<?php echo URL.'pat/editservice/'.$value1['id'].'/'.$this->user[0]['id'].'/'.$value1['MODESORTI'];?>"><?php echo nbrtostring('service','ids',$value1['SERVICE'],'servicefr') ;//echo  nbrtostring('lit','idlit',$value1['NLIT'],'nlit');?></a></td>
						
						
						<td align="center" class="bg-gray" "><a title="Demande Hospitalisation et feuille d'observation" href="<?php echo URL.'tcpdf/hospobs.php?id='.$value1['id'].'&IDDNR='.$this->user[0]['id'].'&MODESORTI='.$value1['MODESORTI'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" "><a title="Fiche de surveillance" href="<?php echo URL.'tcpdf/sur.php?id='.$value1['id'].'&IDDNR='.$this->user[0]['id'].'&MODESORTI='.$value1['MODESORTI'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" "><a title="Partogramme" href="<?php echo URL.'tcpdf/parto.php?id='.$value1['id'].'&iddnr='.$this->user[0]['id'].'&MODESORTI='.$value1['MODESORTI'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" "><a title="Envenimation Scorpionique" href="<?php echo URL.'pat/sas/'.$this->user[0]['id'].'/'.$value1['id'].'/'.$value1['MODESORTI'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" "><a title="Morssures" href="<?php echo URL.'pat/mors/'.$this->user[0]['id'].'/'.$value1['id'].'/'.$value1['MODESORTI'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='16' height='16' border='0' alt=''/></a></td>       
						
						
						
						<td align="left"><?php echo $value1['DGC'];?></td>
						<td align="center"><?php //echo $value1['DATESORTI'];?></td>
						<td align="center"><a title="Faire Sortir" href="<?php echo URL.'pat/editsortihosp/'.$value1['id'];?>"><?php echo $value1['DATESORTI'];?></a></td>
						<td align="center" <?php if ($value1['MODESORTI'] == '' ) {echo "bgcolor='red'";}else {echo "bgcolor='green'";}?> ><?php echo nbrtostring('mods','IDMODS',$value1['MODESORTI'],'MODS') ;?></td>
						<td align="center"><a title="Resume Standard et Clinique De Sortie "href="<?php echo URL.'pdf/RSS.php?id='.$value1['id'].'&IDDNR='.$this->user[0]['id'].'&MODESORTI='.$value1['MODESORTI'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="center"><a title="fiche navette "            href="<?php echo URL.'tcpdf/fn.php?id='.$value1['id'].'&IDDNR='.$this->user[0]['id'].'&MODESORTI='.$value1['MODESORTI'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="center"><a title="evacuation"                href="<?php echo URL.'pat/editevacuation/'.$value1['id'].'/'.$value1['IDDNR'].'/'.$value1['MODESORTI'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="center"><a title="deces"                     href="<?php echo URL.'pat/deces/'.$value1['id'].'/'.$value1['IDDNR'].'/'.$value1['MODESORTI'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='16' height='16' border='0' alt=''/></a></td>       
						<td align="center"><a title="editer"                    href="<?php echo URL.'pat/edithosp/'.$value1['id'].'/'.$value1['IDDNR'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer"  href="<?php echo URL.'pat/deletehosp/'.$value1['id'].'/'.$value1['IDDNR'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
						</tr>
				<?php 
				}
				$total_count1=count($this->userListview1);
				if ($total_count1 <= 0 )
				{
				echo '<tr><td align="center" colspan="17" ><span> No record found for donor </span></td> </tr>';
				echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="17" ><span>' .$total_count1.'/'.$total_count1.' Record(s) found.</span></td></tr>';					
				}
				else
				{		
				//echo '<tr bgcolor=""  ><td align="center" colspan="17" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb).'</td></tr>';	
			    echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="17" ><span>' .$total_count1.' Record(s) found.</span></td></tr>';					
				}		
		}
		else 
		{
		echo '<tr><td align="center" colspan="17" ><span> Click search button to start searching a donor.</span></td></tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="17" ><span>&nbsp;</span></td></tr>';					      
		} 
		echo "</table>";
		?>
		<br/><br/>
            		  
		</div>
</div> 


       