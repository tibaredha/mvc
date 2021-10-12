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
"btn"        => 'inspection', 
"id"         => '', 
"butun"      => 'Inser New service', 
"photos"     => 'public/webcam/drh/'.$fichier,
"action"     => 'drh/creatservice/'.$this->user[0]['idp'],
"CAUSESERVICE"  => array(      
                        "ضرورة المصلحة"=>"1",
						"لطلب المعني"=>"2"	
					  ),

"DEBUTSERVICE"  => date('j-m-Y')
);
view::button($data['btn'],'');
echo "<h2>Nouveau service : ".strtoupper($this->user[0]['Nomlatin'])."_".$this->user[0]['Prenom_Latin']." ( ".$this->stringtostring("grade","idg",$this->user[0]['rnvgradear'],"gradear") ." ) "."</h2 >";
echo "<h2>service : ".View::nbrtostring('servicegrh','ids',trim($this->user[0]['SERVICEAR']),'servicear')."</h2 ><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=90;
$this->label($x+960,$y+160,'سبب التحويل');             $this->combov1($x+700,$y+150,'CAUSESERVICE',$data['CAUSESERVICE'],'date');    
$this->label($x+610,$y+160,'المصلحة الجديدة');         view::userservice($x+350,$y+150,"SERVICEAR_N","","","servicegrh","0","المصلحة");      
$this->label($x+260,$y+160,'ابتداء من');               $this->txts($x,$y+150,'DEBUTSERVICE',0,$data['DEBUTSERVICE'],'dateus1');
$this->hide($x+260,$y+260,"SERVICEAR_A",50,$this->user[0]['SERVICEAR']);            
$this->submit($x+700,$y+210,$data['butun']);
$this->f1();
view::sautligne(19);
ob_end_flush();
//echo "<h2>List des personnels : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
?>
		
		<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
			<th  colspan=4   style="width:50px;">
				<?php echo '<a title="Autres"  href="'.URL.'drh/search/0/10?o=idp&q='.$this->user[0]['idp'].'" > GRH : </a>';?>
			</th> 
			<th  colspan=2    style="width:50px;">
				<?php echo '<a target="_blank" title="Fiche service "  href="'.URL.'tcpdf/drh/list_conge.php?idp='.$this->user[0]['idp'].'" > Fiche absence  </a>';?>
			</th>
			<th  colspan=2    style="width:50px;">
				<?php echo '<a target="_blank" title="Fiche service "  href="'.URL.'tcpdf/drh/list_service.php?idp='.$this->user[0]['idp'].'" > Fiche absence  </a>';?>
			</th>
		</tr>
		<tr>
		<th style="width:150px;">ancien service</th>
		<th style="width:150px;">cause transfert</th>
		<th style="width:150px;">nouveau service</th>
		<th style="width:150px;">Debut transfert</th>
		
		<th style="width:10px;">Demande</th>
		<th style="width:10px;">Titre</th>
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
						<td align="center"><?php echo View::nbrtostring('servicegrh','ids',trim($value['SERVICEAR_A']),'servicear');?></td>
						<td align="center"><?php echo $value['CAUSESERVICE'];?></td>
						<td align="center"><?php echo View::nbrtostring('servicegrh','ids',trim($value['SERVICEAR_N']),'servicear');?></td>
						<td align="center"><?php echo view::dateUS2FR($value['DEBUTSERVICE']);?></td>
						
						
						
						
						
						<?php 
						
				         echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"\" href=\"".URL.'tcpdf/drh/*.php?idp='.$this->user[0]['idp']."&ids=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;
					     echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"\" href=\"".URL.'tcpdf/drh/service.php?idp='.$this->user[0]['idp']."&ids=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;	
						
						
						// if(trim($value['CAUSECONGE'])==17)
						// {
							// echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"questionnaire\" href=\"".URL.'tcpdf/drh/questionnaire_ar.php?idp='.$this->user[0]['idp']."&idc=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;
							// echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"sanction\" href=\"".URL.'tcpdf/drh/conge_ar.php?idp='.$this->user[0]['idp']."&idc=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;	
						// }
						// else
						// {
							// echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"demande de conge\" href=\"".URL.'tcpdf/drh/demande_ar.php?idp='.$this->user[0]['idp']."&idc=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;
							// echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"titre de conge\" href=\"".URL.'tcpdf/drh/conge_ar.php?idp='.$this->user[0]['idp']."&idc=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;	
						// }
						?>
						
						<td align="center"><a title="editer" href="<?php echo URL.'drh/editservice/'.$value['id'].'/'.$this->user[0]['idp'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'drh/deleteservice/'.$value['id'].'/'.$this->user[0]['idp'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
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
		
		
		