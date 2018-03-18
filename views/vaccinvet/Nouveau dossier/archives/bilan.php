<?php 
verifsession();
view::button('don',$this->user[0]['id']);
function dateFR2US($date)//01/01/2013
{
$J      = substr($date,0,2);
$M      = substr($date,3,2);
$A      = substr($date,6,4);
$dateFR2US =  $A."-".$M."-".$J ;
return $dateFR2US;//2013-01-01
}
$diff    = abs(time() - strtotime(dateFR2US(trim($this->user[0]['DATENAISSANCE'])))); 
$years   = floor($diff / (365*60*60*24));        
$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
View::h('2',25,140,'Donor : Bilan Biologique [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
View::sautligne(2);
View::hr();
View::f0(URL.'dnr/BILANOK/','post');
View::url(1100,140,URL.'pdf/LABODNR.php?uc='.$this->user[0]['id'],'Demande Bilan',3);
// View::fieldset("fns","FNS");
// View::fieldset("lip","Bilan Lipdique");
// View::fieldset("ren","Bilan Renal");
// View::fieldset("thy","Bilan Thyroidien");
// View::fieldset("hep","Bilan Hepatique");
// View::fieldset("iono","Ionograme");
// View::fieldset("inf","Autres");
// View::fieldset("btn","--");


View::label(25,220,'GB');View::date(80,210,'GB',0,'0');
View::label(25,220+30,'PNN');View::date(80,210+30,'PNN',0,'0');
View::label(25,220+60,'PNE');View::date(80,210+60,'PNE',0,'0');
View::label(25,220+90,'PNB');View::date(80,210+90,'PNB',0,'0');
View::label(25,220+120,'LYM');View::date(80,210+120,'LYM',0,'0');
View::label(25,220+150,'MON');View::date(80,210+150,'MON',0,'0');
View::label(225,220,'GR'); View::txtjs1(280,210,'GR',29,'00','bilan()'); //View::date(280,210,'GR',0,'0');
View::label(225,220+30,'HT'); View::txtjs1(280,210+30,'HT',29,'00','bilan()');// View::date(280,210+30,'HT',0,'0');
View::label(225,220+60,'HB'); View::txtjs1(280,210+60,'HB',29,'00','bilan()');// View::date(280,210+60,'HB',0,'0');
View::label(225,220+90,'VGM');View::txtjs1(280,210+90,'VGM',29,'00','bilan()'); //View::date(280,210+90,'VGM',0,'0');
View::label(225,220+120,'CCMH');View::txtjs1(280,210+120,'CCMH',29,'00','bilan()');  //View::date(280,210+120,'CCMH',0,'0'); 
View::label(225,220+150,'TGMH');View::txtjs1(280,210+150,'TCMH',29,'00','bilan()'); //View::date(280,210+150,'TCMH',0,'0');
View::label(425,220,'PLQ');View::date(480,210,'PLQ',0,'0');
View::label(425,220+30,'VMP');View::date(480,210+30,'VMP',0,'0');
View::label(425,220+60,'IDP');View::date(480,210+60,'IDP',0,'0');
View::label(425,220+90,'PCT');View::date(480,210+90,'PCT',0,'0');
View::label(425,220+120,'TP');View::date(480,210+120,'TP',0,'0');
View::label(425,220+150,'INR');View::date(480,210+150,'INR',0,'0');
View::label(625,220,'NA+');View::date(680,210,'NA',0,'0');
View::label(625,220+30,'K+');View::date(680,210+30,'K',0,'0');
View::label(625,220+60,'PHO');View::date(680,210+60,'PHO',0,'0');
View::label(625,220+90,'CL-');View::date(680,210+90,'CL',0,'0');
View::label(625,220+120,'CA++');View::date(680,210+120,'CA',0,'0');
View::label(625,220+150,'PH');View::date(680,210+150,'PH',0,'0');
View::label(825,220,'CRP');View::date(880,210,'CRP',0,'0');
View::label(825,220+30,'VS1');View::date(880,210+30,'VS1',0,'0');
View::label(825,220+60,'VS2');View::date(880,210+60,'VS2',0,'0');
View::label(825,220+90,'FIB');View::date(880,210+90,'FIB',0,'0');
View::label(825,220+120,'GLY');View::date(880,210+120,'GLY',0,'0');
View::label(825,220+150,'HBGLY');View::date(880,210+150,'HBGLY',0,'0');
View::label(25,220+150+60,'TGL');     View::txtjs1(80,210+150+60,'TGL',29,'00','cholesterol()');//View::date(0,'0');
View::label(25,220+150+90,'CT');      View::txtjs1(80,210+150+90,'CT',29,'00','cholesterol()');//View::date(0,'0');
View::label(25,220+150+120,'HDL');    View::txtjs1(80,210+150+120,'HDL',29,'00','cholesterol()');//View::date(0,'0');
View::label(25,220+150+150,'LDL');    View::txtjs1(80,210+150+150,'LDL',29,'00','cholesterol()');//View::date(80,210+150+150,'LDL',0,'0');
View::label(225,220+150+60,'CT/HDL'); View::txtjs1(280,210+150+60,'CTHDL',29,'00','cholesterol()');//View::date(0,'0');
View::label(225,220+150+90,'LDL/HDL');View::txtjs1(280,210+150+90,'LDLHDL',29,'00','cholesterol()');//View::date(0,'0');
View::label(225,220+150+120,'ASPECT');$Jour=array("clair"=>0,"opalescent"=>1);View::combovc(280,210+150+120,'ASPECT',$Jour); 
View::label(425,220+150+60,'UREE');   View::date(480,210+150+60,'UREE',0,'0');
View::label(425,220+150+90,'CREAT');  View::date(480,210+150+90,'CREAT',0,'0');
View::label(425,220+150+120,'ACU');   View::date(480,210+150+120,'ACU',0,'0');
View::label(425,220+150+150,'Poids');   View::date(480,210+150+150,'Poids',0,'0');
View::label(625,220+150+60,'T3');     View::date(680,210+150+60,'T3',0,'0');
View::label(625,220+150+90,'T4');     View::date(680,210+150+90,'T4',0,'0');
View::label(625,220+150+120,'TSH');   View::date(680,210+150+120,'TSH',0,'0');
View::label(825,220+150+60,'TGO');    View::date(880,210+150+60,'TGO',0,'0');
View::label(825,220+150+90,'TGP');    View::date(880,210+150+90,'TGP',0,'0');
View::label(825,220+150+120,'BILT');  View::date(880,210+150+120,'BILT',0,'0');
View::label(1100,210+5,'LIEUX');        View::combov(1200,210+5,'LIEUX',array("FIXE","MOBILE")); 
View::label(1100,390+5,'DATE');         View::date(1200,380+5,'DATEDON',0,date ('Y-m-d'));View::label(1290,390+5,'HEURE');View::date(1330,380+5,'HEUREDON',0,date ("H:i"));
View::hide(215,670,'id',0,$this->user[0]['id']);
View::hide(215,670,'NOM',0,$this->user[0]['NOM']);
View::hide(215,670,'PRENOM',0,$this->user[0]['PRENOM']);
View::hide(215,670,'SEXEDNR',0,$this->user[0]['SEX']);
View::hide(215,670,'BIRTHDAY',0,$this->user[0]['DATENAISSANCE']);
View::hide(215,670,'AGEDNR',0,$years);
View::hide(215,670,'REGION',0,$_SESSION['REGION']);
View::hide(215,670,'WILAYA',0,$_SESSION['WILAYA']);
View::hide(215,670,'STRUCTURE',0,$_SESSION['STRUCTURE']);
View::hide(215,670,'login',0,$_SESSION['login']);
View::submit(1200,450,'Enregistrer Bilan');									
View::f1();	
View::sautligne(22);
?>

<div class="tabbed_area">  
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Hematologie</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Biochimie</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Autres</a></li> 	
        </ul>
		<div id="content_1" class="content">
		<h2>List Des Bilans</h2>
		<A HREF="<?php echo URL;?>views/doc/trans/hemmograme.pdf">hemmograme.pdf</A>
		<br/><br/>
		<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th colspan="21">Imprime List FNS</th> 
		</tr>
		<tr>
		<th style="width:150px;">Date</th> 
		<th style="width:50px;">Age</th>
		<th style="width:40px;">GB</th>
		<th style="width:40px;">PNN</th>
		<th style="width:40px;">PNE</th>
		<th style="width:40px;">PNB</th>
		<th style="width:40px;">LYM</th>
		<th style="width:40px;">MON</th>
		<th style="width:40px;">GR</th>
		<th style="width:40px;">HT</th>
		<th style="width:40px;">HB</th>
		<th style="width:40px;">VGM</th>
		<th style="width:40px;">CCMH</th>
		<th style="width:40px;">TCMH</th>
		<th style="width:40px;">PLQ</th>
		<th style="width:40px;">VMP</th>
		<th style="width:40px;">IDP</th>
		<th style="width:40px;">PCT</th>
		<th style="width:50px;">Qualification</th>
		<th style="width:250px;">Update </th>
		<th style="width:250px;">Delete</th>
		</tr>
		<?php
		if (isset($this->userListview)) 
		{		
				foreach($this->userListview as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="center"><?php echo $value['DATEDON'];?></td>
						<td align="center"><?php echo $value['AGEDNR'];?></td>
						<td align="center"><?php echo $value['GB'];?></td>
						<td align="center"><?php echo $value['PNN'];?></td>
						<td align="center"><?php echo $value['PNE'];?></td>
						<td align="center"><?php echo $value['PNB'];?></td>
						<td align="center"><?php echo $value['LYM'];?></td>
						<td align="center"><?php echo $value['MON'];?></td>
						<td align="center"><?php echo $value['GR'];?></td>
						<td align="center"><?php echo $value['HT'];?></td>
						<td align="center"><?php echo $value['HB'];?></td>
						<td align="center"><?php echo $value['VGM'];?></td>
						<td align="center"><?php echo $value['CCMH'];?></td>
						<td align="center"><?php echo $value['TCMH'];?></td>
						<td align="center"><?php echo $value['PLQ'];?></td>
						<td align="center"><?php echo $value['VMP'];?></td>
						<td align="center"><?php echo $value['IDP'];?></td>
						<td align="center"><?php echo $value['PCT'];?></td>
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="Qualification" href="<?php echo URL.'pdf/RESBILANPDF.php?id='.$value['idbio'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center"><a title="editer" href="<?php echo URL.'dnr/editbilan/'.$value['idbio'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'dnr/deletebilan/'.$value['idbio'].'/'.$value['ID'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						</tr>
				<?php 
				}
				$total_count=count($this->userListview);
				if ($total_count <= 0 )
				{
				echo '<tr><td align="center" colspan="21" ><span> No record found for donor </span></td> </tr>';
				echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="21" ><span>' .$total_count.'/'.$total_count.' Record(s) found.</span></td></tr>';					
				}
				else
				{		
				//echo '<tr bgcolor=""  ><td align="center" colspan="16" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb).'</td></tr>';	
			    echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="21" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
				}		
		}
		else 
		{
		echo '<tr><td align="center" colspan="21" ><span> Click search button to start searching a donor.</span></td></tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="21" ><span>&nbsp;</span></td></tr>';					      
		} 
		echo "</table>";
		?>
		<br/><br/>
		
		</div>
		<div id="content_2" class="content"> 	
		<h2>List Des Bilans</h2>
		<br/><br/>
		<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th colspan="21">Imprime List FNS</th> 
		</tr>
		<tr>
		<th style="width:150px;">Date</th> 
		<th style="width:50px;">Age</th>
		<th style="width:40px;">CT</th>
		<th style="width:40px;">HDL</th>
		<th style="width:40px;">LDL</th>
		<th style="width:40px;">TGL</th>
		<th style="width:40px;">CTHDL</th>
		<th style="width:40px;">LDLHDL</th>
		<th style="width:40px;">ASPECT</th>
		<th style="width:40px;">UREE</th>
		<th style="width:40px;">CREAT</th>
		<th style="width:40px;">ACU</th>
		<th style="width:40px;">GLY</th>
		<th style="width:40px;">HBGLY</th>
		<th style="width:40px;">TP</th>
		<th style="width:40px;">INR</th>
		<th style="width:40px;">NA</th>
		<th style="width:40px;">K</th>
		<th style="width:50px;">Qualification</th>
		<th style="width:250px;">Update </th>
		<th style="width:250px;">Delete</th>
		</tr>
		<?php
		if (isset($this->userListview)) 
		{		
				foreach($this->userListview as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="center"><?php echo $value['DATEDON'];?></td>
						<td align="center"><?php echo $value['AGEDNR'];?></td>
						<td align="center"><?php echo $value['CT'];?></td>
						<td align="center"><?php echo $value['HDL'];?></td>
						<td align="center"><?php echo $value['LDL'];?></td>
						<td align="center"><?php echo $value['TGL'];?></td>
						<td align="center"><?php echo $value['CTHDL'];?></td>
						<td align="center"><?php echo $value['LDLHDL'];?></td>
						<td align="center"><?php echo $value['ASPECT'];?></td>
						<td align="center"><?php echo $value['UREE'];?></td>
						<td align="center"><?php echo $value['CREAT'];?></td>
						<td align="center"><?php echo $value['ACU'];?></td>
						<td align="center"><?php echo $value['GLY'];?></td>
						<td align="center"><?php echo $value['HBGLY'];?></td>
						<td align="center"><?php echo $value['TP'];?></td>
						<td align="center"><?php echo $value['INR'];?></td>
						<td align="center"><?php echo $value['NA'];?></td>
						<td align="center"><?php echo $value['K'];?></td>
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="Qualification" href="<?php echo URL.'pdf/RESBILANPDF.php?id='.$value['idbio'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center"><a title="editer" href="<?php echo URL.'don/editbilan/'.$value['idbio'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'dnr/deletebilan/'.$value['idbio'].'/'.$value['ID'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						</tr>
				<?php 
				}
				$total_count=count($this->userListview);
				if ($total_count <= 0 )
				{
				echo '<tr><td align="center" colspan="21" ><span> No record found for donor </span></td> </tr>';
				echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="21" ><span>' .$total_count.'/'.$total_count.' Record(s) found.</span></td></tr>';					
				}
				else
				{		
				//echo '<tr bgcolor=""  ><td align="center" colspan="16" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb).'</td></tr>';	
			    echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="21" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
				}		
		}
		else 
		{
		echo '<tr><td align="center" colspan="21" ><span> Click search button to start searching a donor.</span></td></tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="21" ><span>&nbsp;</span></td></tr>';					      
		} 
		echo "</table>";
		?>
		<br/><br/>
		
		</div>
		<div id="content_3" class="content">  
		
		
		
		
		</div>
</div>



