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
lang(Session::get('lang'));
$fichier = photosmfy('drh',$this->user[0]['idp'].'.jpg',$this->user[0]['Sexe']);
ob_start();
$data = array(
"Date"       => date('Y-m-j'), 
"btn"        => 'drh', 
"id"         => '', 
"butun"      => 'Inser New avance', 
"photos"     => 'public/webcam/drh/'.$fichier,
"action"     => 'drh/creatavance/'.$this->user[0]['idp'],

"NPV"        => '0' ,
"DATEPV"     => date('j-m-Y'),
"ANNEEPV"    => date('Y') ,

"DUREE"      => array(      
                        $this->user[0]['DUREE']=>$this->user[0]['DUREE'],
						"الدنيا"=>"1",
						"المتوسطة"=>"2",
						"الطويلة"=>"3"),
"CATEGORIE"	 => array(      
                        $this->user[0]['CATEGORIE']=>$this->user[0]['CATEGORIE'],
						"9"=>"9",
						"10"=>"10",
						"11"=>"11",
						"12"=>"12",
						"13"=>"13",
						"14"=>"14",
						"15"=>"15",
						"16"=>"16",
						"17"=>"17"
						),	
"ECHELON"	 => array(      
                        $this->user[0]['ECHELON']+1=>$this->user[0]['ECHELON']+1,
						"0"=>"0",
						"1"=>"1",
						"2"=>"2",
						"3"=>"3",
						"4"=>"4",
						"5"=>"5",
						"6"=>"6",
						"7"=>"7",
						"8"=>"8",
						"9"=>"9",
						"10"=>"10",
						"11"=>"11",
						"12"=>"12"
						),				  

"RESTE"		 => '0' ,
"DATEDEFFET" => date('j-m-Y'),

"NDECISION"  => '0' ,
"DATEDECISION" => date('j-m-Y')

);
view::button($data['btn'],'');
echo "<h2>Nouveau avance : ".strtoupper($this->user[0]['Nomlatin'])."_".$this->user[0]['Prenom_Latin']." ( ".$this->stringtostring("grade","idg",$this->user[0]['rnvgradear'],"gradear") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=90;
$this->label($x+960,$y+160,'رقم المحضر');             $this->txtarid($x+700,$y+150,'NPV','NPV',0,$data['NPV'],'date');             
$this->label($x+610,$y+160,'تاريخ المحضر');           $this->txts($x+350,$y+150,'DATEPV',0,$data['DATEPV'],'dateus1');
$this->label($x+260,$y+160,'السنة');                  $this->txtarid($x,$y+150,'ANNEEPV','ANNEEPV',0,$data['ANNEEPV'],'date');

$this->label($x+960,$y+190,'المدة');                  $this->combov1($x+700,$y+180,'DUREE',$data['DUREE'],'date');           
$this->label($x+610,$y+190,'الصنف');                  $this->combov1($x+350,$y+180,'CATEGORIE',$data['CATEGORIE'],'date'); 
           
$this->label($x+260,$y+190,'الدرجة');                 $this->combov1($x,$y+180,'ECHELON',$data['ECHELON'],'date'); 
         


$this->label($x+960,$y+190+30,'الاقدمية المتبقية');    $this->txtarid($x+700,$y+180+30,'RESTE','RESTE',0,$data['RESTE'],'date');                     
$this->label($x+260,$y+190+30,'تاريخ النفاذ');        $this->txts($x,$y+180+30,'DATEDEFFET',0,$data['DATEDEFFET'],'dateus2');


$this->label($x+960,$y+190+60,'رقم المقرر');          $this->txtarid($x+700,$y+180+60,'NDECISION','NDECISION',0,$data['NDECISION'],'date');                    
$this->label($x+260,$y+190+60,'تاريخ المقرر');        $this->txts($x,$y+180+60,'DATEDECISION',0,$data['DATEDECISION'],'dateus3');

//view::usereph($x+700,$y+180,"REMPLACANT","","","grh","0","المستخلف"); 
$this->hide(595,$x+90,'INDICEB',20,"i"); 

$this->submit($x+700,$y+210+60,$data['butun']);
$this->f1();
view::sautligne(19);
ob_end_flush();
//echo "<h2>List des personnels : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
?>
		
		<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
			<th  colspan=11   style="width:50px;">
				<?php echo '<a title="Autres"  href="'.URL.'drh/search/0/10?o=idp&q='.$this->user[0]['idp'].'" > GRH : </a>';?>
			</th> 
			<th  colspan=2    style="width:50px;">
				<?php echo '<a target="_blank" title="Fiche personnels "  href="'.URL.'tcpdf/drh/list_avance.php?idp='.$this->user[0]['idp'].'" > Fiche avance  </a>';?>
			</th>
			<th  colspan=2    style="width:50px;">
				<?php echo '<a target="_blank" title="Fiche personnels "  href="'.URL.'tcpdf/drh/list_avance.php?idp='.$this->user[0]['idp'].'" > Fiche avance  </a>';?>
			</th>
		</tr>
		<tr>
		<th style="width:10px;">NPV</th>
		<th style="width:50px;">DATEPV</th>
		<th style="width:50px;">ANNEEPV</th>
		<th style="width:70px;">DUREE</th>
		<th style="width:70px;">CATEGORIE</th>
		<th style="width:70px;">ECHELON</th>
		<th style="width:50px;">RESTE</th>
		<th style="width:10px;">DATEDEFFET</th>		
		
		<th style="width:10px;">indice_b</th>		
		<th style="width:10px;">indice_e</th>		
		<th style="width:10px;">indice_t</th>		
		
		<th style="width:10px;">Notation</th>
		<th style="width:10px;">titre</th>
		<th style="width:10px;">Upd </th>
		<th style="width:10px;">Del</th>
		</tr>
		<?php
		if (isset($this->userListview))
		{		
				foreach($this->userListview as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<?php 
		                //$fichier = photosmfy('drh',trim($value['REMPLACANT']).'.jpg',View::nbrtostring('grh','idp',trim($value['REMPLACANT']),'Sexe'));
		                //echo "<td  style=\"width:10px;\"     align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."inspection/upl***/".$value['id']."\" ><img  src=\"".URL."public/webcam/drh/".$fichier."?t=".time()."\"  width='20' height='20' border='0'></td> " ;
						//if(trim($value['CAUSECONGE'])==17){echo '<td id ="actif_nc">';	}else{echo '<td id ="actif_c" >';}echo View::nbrtostring('causeconge','id',trim($value['CAUSECONGE']),'causecongear');echo '</td>';
						?>
						<td align="center"><?php echo $value['NPV'];?></td>
						<td align="center"><?php echo view::dateUS2FR($value['DATEPV']);?></td>
						<td align="center"><?php echo $value['ANNEEPV'];?></td>
						<td align="center"><?php if($value['DUREE']==1){echo "الدنيا";}elseif($value['DUREE']==2){echo "المتوسطة";}elseif($value['DUREE']==3){echo "الطويلة";}?></td>
						<td align="center"><?php echo $value['CATEGORIE'];?></td>
						<td align="center"><?php echo $value['ECHELON'];?></td>
						<td align="center"><?php echo $value['RESTE'];?></td>
						<td align="center"><?php echo view::dateUS2FR($value['DATEDEFFET']);?></td>
						
						<td align="center"><?php echo $value['INDICEBV'];?></td>
						<td align="center"><?php echo $value['INDICEE'];?></td>
						<td align="center"><?php echo $value['INDICE'];?></td>
						
						<?php 
						echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"demande de conge\" href=\"".URL.'tcpdf/drh/notation.php?uc='.$this->user[0]['idp']."&ida=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;
					    echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"decision avancement\" href=\"".URL.'tcpdf/drh/avance.php?idp='.$this->user[0]['idp']."&ida=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;	
						?>
						
						<td align="center"><a title="editer" href="<?php echo URL.'drh/editavance/'.$value['id'].'/'.$this->user[0]['idp'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'drh/deleteavance/'.$value['id'].'/'.$this->user[0]['idp'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
						</tr>
				<?php 
				}
				$total_count=count($this->userListview);
				if ($total_count <= 0 )
				{
				echo '<tr><td align="center" colspan="16" ><span> No record found for autos </span></td> </tr>';
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
			echo '<tr><td align="center" colspan="16" ><span> Click search button to start searching a vms.</span></td></tr>';
			echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="16" ><span>&nbsp;</span></td></tr>';					      
		} 
		
		?>
		</table><br/><br/>
		
		
<script type="text/javascript">
window.onload = function(){
document.getElementById("NOMAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
document.getElementById("PRENOMAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
document.getElementById("ADRESSEAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
}
</script>	
		
		
		