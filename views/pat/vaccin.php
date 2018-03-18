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
function datePlus($dateDo,$nbrJours)
{
$timeStamp = strtotime($dateDo); 
$timeStamp += 24 * 60 * 60 * $nbrJours;
$newDate = date("Y-m-d", $timeStamp);
return  $newDate;
}
function vaccin($date)
{
	if ($date=='')   
	{
	echo '';
	}
	else
	{
	echo 'checked';
	}
}

function datediff($datei,$dates,$type)
{
	if  ($type=='j') 
	{
	// $timeStampi = (((strtotime($datei)/60)/60)/24);
	// $timeStamps = (((strtotime($dates)/60)/60)/24);
	// return  $timeStamp=$timeStamps-$timeStampi;
	return  $timeStamp=round (((((strtotime($dates)-strtotime($datei))/60)/60)/24));
	}
	if  ($type=='m') 
	{
	// $timeStampi = ((((strtotime($datei)/60)/60)/24)/30);
	// $timeStamps = ((((strtotime($dates)/60)/60)/24)/30);
	// return  $timeStamp=$timeStamps-$timeStampi;
	return  $timeStamp= round ((((((strtotime($dates)-strtotime($datei))/60)/60)/24)/30));
	}

}
// echo datediff('2015-10-01','2016-03-31','j');

$diff    = abs(time() - strtotime(dateFR2US(trim($this->user[0]['DATENAISSANCE'])))); 
$years   = floor($diff / (365*60*60*24));        
$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
View::h('2',25,140,'Patient : Vaccination [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
View::sautligne(2);
View::hr();
$maxdate=30;

?>
<div class="tabbed_area">  
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Calendrie Vaccinal</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Anti Rabique</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Anti Scorpionique</a></li> 	
        </ul>
		<div id="content_1" class="content">
		<h2>Calendrie Vaccinal :
		<A HREF="<?php echo URL;?>views/doc/vacci/vaccination.pdf"> REF:JO n°75 du 28/12/2014</A>---<A HREF="<?php echo URL;?>views/doc/vacci/Instr_AppNxCalendVacc-2016.pdf"> Instr_AppNxCalendVacc-2016</A></h2>
		<form method="post" action="<?php echo URL;?>pat/vaccinok/<?php echo $this->user[0]['id']; ?>">
		<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		
		<th colspan="11">Vaccins ( imprimer <A HREF="<?php echo URL;?>views/doc/vacci/vaccination.pdf"> Certificat De Vaccination</A> )</th>  
		</tr>
		<tr>
		<th style="width:150px;">MinDate</th> 
		<th style="width:150px;">MaxDate</th>
		<th style="width:150px;">Date</th>
		<th style="width:100px;">BCG</th>
		<th style="width:100px;">DT</th>
		<th style="width:100px;">Polio</th>
		<th style="width:100px;">Coq</th>
		<th style="width:100px;">Hib</th>
		<th style="width:100px;">Hep B</th>
		<th style="width:100px;">Pneumo</th>
		<th style="width:100px;">ROR</th>
		</tr>
		<tr bgcolor='#9FF781' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='#9FF781';" >
		<td align="left"><label>01 jours : [<?php echo dateFR2US($this->user[0]['DATENAISSANCE']); ?>]</label></td>
		<td align="left"><label>01 jours : [<?php echo dateFR2US($this->user[0]['DATENAISSANCE']); ?>]</label></td>
		<td align="center"><input type="text" name="1" value="<?php echo $this->userListview[0]['1']; ?>" /></td>
		<td align="center"><input type="checkbox" name="2"   <?php vaccin($this->userListview[0]['2']); ?> /></td>
		<td align="center"></td>
		<td align="center"><input type="checkbox" name="3"  <?php vaccin($this->userListview[0]['3']);?> /></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"><input type="checkbox" name="4"  <?php vaccin($this->userListview[0]['4']); ?> /></td>
		<td align="center"></td><td align="center"></td>
		</tr>
		<tr bgcolor='#9FF781' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='#9FF781';" >
		<td align="left"><label>02 mois : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),60) ; ?>]</label></td>
		<td align="left"><label>02 mois : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),60+$maxdate) ; ?>]</label></td>
		<td align="center"><input  type="text" name="5" value="<?php echo $this->userListview[0]['5']; ?>" /></td>
		<td align="center"></td>
		<td align="center"><input  type="checkbox" name="6" <?php vaccin($this->userListview[0]['6']); ?>   /></td>
		<td align="center"><input  type="checkbox" name="7" <?php vaccin($this->userListview[0]['7']); ?>   /></td>
		<td align="center"><input  type="checkbox" name="8" <?php vaccin($this->userListview[0]['8']); ?>   /></td>
		<td align="center"><input  type="checkbox" name="9" <?php vaccin($this->userListview[0]['9']); ?>   /></td>
		<td align="center"><input  type="checkbox" name="10" <?php vaccin($this->userListview[0]['10']); ?> /></td>
		<td align="center"><input  type="checkbox" name="11" <?php vaccin($this->userListview[0]['11']); ?> /></td>
		<td align="center"></td></tr>
		
		<tr bgcolor='#9FF781' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='#9FF781';" >
		<td align="left"><label>03 mois : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),90) ; ?>]</label></td>
		<td align="left"><label>03 mois : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),90+$maxdate) ; ?>]</label></td>
		<td align="center"><input  type="text" name="12" value="<?php echo $this->userListview[0]['12']; ?>" /></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"><input  type="checkbox" name="13" <?php vaccin($this->userListview[0]['13']); ?> /></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td></tr>
		
		<tr bgcolor='#9FF781' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='#9FF781';" >
		<td align="left"><label>04 mois : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),120) ; ?>]</label></td>
		<td align="left"><label>04 mois : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),120+$maxdate) ; ?>]</label></td>
		<td align="center"><input  type="text" name="14" value="<?php echo $this->userListview[0]['14']; ?>" /></td>
		<td align="center"></td>
		<td align="center"><input  type="checkbox" name="15" <?php vaccin($this->userListview[0]['15']); ?> /></td>
		<td align="center"><input  type="checkbox" name="16" <?php vaccin($this->userListview[0]['16']); ?> /></td>
		<td align="center"><input  type="checkbox" name="17" <?php vaccin($this->userListview[0]['17']); ?> /></td>
		<td align="center"><input  type="checkbox" name="18" <?php vaccin($this->userListview[0]['18']); ?>/></td>
		<td align="center"><input  type="checkbox" name="19" <?php vaccin($this->userListview[0]['19']); ?> /></td>
		<td align="center"><input  type="checkbox" name="20" <?php vaccin($this->userListview[0]['20']); ?> /></td>
		<td align="center"></td></tr>
		
		<tr bgcolor='#9FF781' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='#9FF781';" >
		<td align="left"><label>11 mois : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),330) ; ?>]</label></td>
		<td align="left"><label>11 mois : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),330+$maxdate) ; ?>]</label></td>
		<td align="center"><input  type="text" name="21" value="<?php echo $this->userListview[0]['21']; ?>" /></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"><input  type="checkbox" name="22" <?php vaccin($this->userListview[0]['22']); ?> /></td>
		
		<tr bgcolor='#9FF781' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='#9FF781';" >
		<td align="left"><label>12 mois : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),365) ; ?>]</label></td>
		<td align="left"><label>12 mois : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),365+$maxdate) ; ?>]</label></td>
		
		<td align="center"><input  type="text" name="23" value="<?php echo $this->userListview[0]['23']; ?>" /></td>
		<td align="center"></td>
		<td align="center"><input  type="checkbox" name="24" <?php vaccin($this->userListview[0]['24']); ?> /></td>
		<td align="center"><input  type="checkbox" name="25" <?php vaccin($this->userListview[0]['25']); ?> /></td>
		<td align="center"><input  type="checkbox" name="26" <?php vaccin($this->userListview[0]['26']); ?> /></td>
		<td align="center"><input  type="checkbox" name="27" <?php vaccin($this->userListview[0]['27']); ?> /></td>
		<td align="center"><input  type="checkbox" name="28" <?php vaccin($this->userListview[0]['28']); ?> /></td>
		<td align="center"><input  type="checkbox" name="29" <?php vaccin($this->userListview[0]['29']); ?> /></td>
		<td align="center"></td></tr>
		
		<tr bgcolor='#9FF781' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='#9FF781';" >
		<td align="left"><label>18 mois : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),365+183) ; ?>]</label></td>
		<td align="left"><label>18 mois : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),365+183+$maxdate) ; ?>]</label></td>
		
		<td align="center"><input  type="text" name="30" value="<?php echo $this->userListview[0]['30']; ?>" /></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"><input  type="checkbox" name="31" <?php vaccin($this->userListview[0]['31']); ?> /></td>
		
		<tr bgcolor='#9FF781' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='#9FF781';" >
		<td align="left"><label>06 ans : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),365*6) ; ?>]</label></td>
		<td align="left"><label>06 ans : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),(365*6)+$maxdate) ; ?>]</label></td>
		
		<td align="center"><input  type="text" name="32" value="<?php echo $this->userListview[0]['32']; ?>" /></td>
		<td align="center"></td>
		<td align="center"><input  type="checkbox" name="33" <?php vaccin($this->userListview[0]['33']); ?> /></td>
		<td align="center"><input  type="checkbox" name="34" <?php vaccin($this->userListview[0]['34']); ?> /></td>
		<td align="center"><input  type="checkbox" name="35" <?php vaccin($this->userListview[0]['35']); ?> /></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td></tr>
		
		<tr bgcolor='#9FF781' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='#9FF781';" >
		<td align="left"><label>12 ans : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),365*12) ; ?>]</label></td>
		<td align="left"><label>12 ans : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),(365*12)+$maxdate) ; ?>]</label></td>
		
		<td align="center"><input  type="text" name="36" value="<?php echo $this->userListview[0]['36']; ?>" /></td>
		<td align="center"></td>
		<td align="center"><input  type="checkbox" name="37" <?php vaccin($this->userListview[0]['37']); ?> /></td>
		<td align="center"><input  type="checkbox" name="38" <?php vaccin($this->userListview[0]['38']); ?> /></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td></tr>
		
		<tr bgcolor='#9FF781' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='#9FF781';" >
		<td align="left"><label>17 ans : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),365*17) ; ?>]</label></td>
		<td align="left"><label>17 ans : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),(365*17)+$maxdate) ; ?>]</label></td>
		
		<td align="center"><input  type="text" name="39" value="<?php echo $this->userListview[0]['39']; ?>" /></td>
		<td align="center"></td>
		<td align="center"><input  type="checkbox" name="40" <?php vaccin($this->userListview[0]['40']); ?>/></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td></tr>
		
		<tr bgcolor='#9FF781' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='#9FF781';" >
		<td align="left"><label> > 18 ans : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),365*18) ; ?>]</label></td>
		<td align="left"><label> > 18 ans : [<?php echo datePlus(dateFR2US($this->user[0]['DATENAISSANCE']),(365*18)+$maxdate) ; ?>]</label></td>
		
		<td align="center"><input  type="text" name="41" value="<?php echo $this->userListview[0]['41']; ?>" /></td>
		<td align="center"></td>
		<td align="center"><input  type="checkbox" name="42" <?php vaccin($this->userListview[0]['42']); ?> /></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td></tr>
		<tr>
		<th style="width:150px;">MinDate</th> 
		<th style="width:150px;">MaxDate</th>
		<th style="width:150px;">Date</th>
		<th style="width:100px;">BCG</th>
		<th style="width:100px;">DT</th>
		<th style="width:100px;">Polio</th>
		<th style="width:100px;">Coq</th>
		<th style="width:100px;">Hib</th>
		<th style="width:100px;">Hep B</th>
		<th style="width:100px;">Pneumo</th>
		<th style="width:100px;">ROR</th>
		</tr>
		<?php 
		echo "</table>";
		?>
		<br/><br/>
		<label></label><label></label><label></label><label></label><input type="submit" />
		</form>
		<br/><br/>
		</div>
		<div id="content_2" class="content"> 	
		<h2>Anti Rabique  <A HREF="<?php echo URL;?>pdf/rab.pdf"> CAT Risque Rabique </A><A HREF="<?php echo URL;?>pdf/Instruction_rage.pdf"> Instruction_rage 2016 </A></h2>
		<br/><br/>
		<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th style="width:50px;">étiquette</th> 
		<th style="width:50px;">Questionnaire</th>
		<th style="width:50px;">Qualification</th>
		<th style="width:50px;">IDSCOR</th>
		<th style="width:50px;">DATESCOR</th>
		<th style="width:50px;">HEURESCOR</th>
		<th style="width:50px;">SIEGE</th>
		<th style="width:50px;">LIEUX</th>
		<th style="width:50px;">CLASSE</th>
		<th style="width:50px;">AGE</th>
		<th style="width:50px;">SEXE</th>
		<th style="width:50px;">NBBRSAS</th>
		<th style="width:50px;">Update </th>
		<th style="width:50px;">Delete</th>
		</tr>
		<?php
		if (isset($this->userListviewr)) 
		{		
				foreach($this->userListviewr as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="étiquette" href="<?php //echo URL.'pdf/ETTIDON.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/md_records.PNG';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="Questionnaire" href="<?php //echo URL.'pdf/QESDNRPDF.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/b_props.png';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="Qualification" href="<?php //echo URL.'pdf/RESDONPDF.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center"><?php echo $value['idscor'];?></td>
						<td align="center"><?php echo $value['datescor'];?></td>
						<td align="center"><?php echo $value['heurescor'];?></td>
						<td align="center"><?php echo $value['siege'];?></td>
						<td align="center"><?php echo $value['lieux'];?></td>
						<td align="center"><?php echo $value['classe'];?></td>
						<td align="center"><?php echo $value['age'];?></td>
						<td align="center"><?php echo $value['sexe'];?></td>
						<td align="center"><?php echo $value['NBBRSAS'];?></td>
						<td align="center"><a title="editer" href="<?php echo URL.'pat/editscor/'.$value['idscor'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'pat/deletescor/'.$value['idscor'].'/'.$value['idpat'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
						</tr>
				<?php 
				}
				$total_count=count($this->userListviewr);
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
		<h2>Anti Scorpionique : <A HREF="<?php echo URL;?>pdf/es1.pdf"> Fiche initiale et de liaison</A></h2>
		<br/><br/>
		<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th style="width:50px;">étiquette</th> 
		<th style="width:50px;">Questionnaire</th>
		<th style="width:50px;">Qualification</th>
		<th style="width:50px;">IDSCOR</th>
		<th style="width:50px;">DATESCOR</th>
		<th style="width:50px;">HEURESCOR</th>
		<th style="width:50px;">SIEGE</th>
		<th style="width:50px;">LIEUX</th>
		<th style="width:50px;">CLASSE</th>
		<th style="width:50px;">AGE</th>
		<th style="width:50px;">SEXE</th>
		<th style="width:50px;">NBBRSAS</th>
		<th style="width:50px;">Update </th>
		<th style="width:50px;">Delete</th>
		</tr>
		<?php
		if (isset($this->userListviews)) 
		{		
				foreach($this->userListviews as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="étiquette" href="<?php //echo URL.'pdf/ETTIDON.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/md_records.PNG';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="Questionnaire" href="<?php //echo URL.'pdf/QESDNRPDF.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/b_props.png';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="Qualification" href="<?php //echo URL.'pdf/RESDONPDF.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center"><?php echo $value['idscor'];?></td>
						<td align="center"><?php echo $value['datescor'];?></td>
						<td align="center"><?php echo $value['heurescor'];?></td>
						<td align="center"><?php echo $value['siege'];?></td>
						<td align="center"><?php echo $value['lieux'];?></td>
						<td align="center"><?php echo $value['classe'];?></td>
						<td align="center"><?php echo $value['age'];?></td>
						<td align="center"><?php echo $value['sexe'];?></td>
						<td align="center"><?php echo $value['NBBRSAS'];?></td>
						<td align="center"><a title="editer" href="<?php echo URL.'pat/editscor/'.$value['idscor'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'pat/deletescor/'.$value['idscor'].'/'.$value['idpat'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
						</tr>
				<?php 
				}
				$total_count=count($this->userListviews);
				if ($total_count <= 0 )
				{
				echo '<tr><td align="center" colspan="16" ><span> No record found for pat </span></td> </tr>';
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
		echo '<tr><td align="center" colspan="16" ><span> Click search button to start searching a pat.</span></td></tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="16" ><span>&nbsp;</span></td></tr>';					      
		} 
		echo "</table>";
		?>
		<br/><br/>
		
		
		</div>
</div>



