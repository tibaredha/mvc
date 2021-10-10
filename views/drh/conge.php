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
"butun"      => 'Inser New congé', 
"photos"     => 'public/webcam/drh/'.$fichier,
"action"     => 'drh/creatconge/'.$this->user[0]['idp'],

"CAUSECONGE"  => array(      
                        "إزدياد طفل للموظف"=>"1",
						"زواج الموظف"=>"2",
						"حج"=>"3",
						"عمرة"=>"4",
						"ختان إبن الموظف"=>"5",
						"زواج أحد فروع الموظف"=>"6",
						"وفاة زوج الموظف"=>"7",
						"وفاة أحد الأصول المباشرة للموظف أو زوجه"=>"8",
						"وفاة أحد الفروع المباشرة للموظف أو زوجه"=>"9",
						"وفاة أحد الحواشي المباشرة للموظف أو زوجه"=>"10",
						"علمية"=>"11",
						"تعويضية"=>"12",
						"سنوية"=>"13",
						"مهنية"=>"14",
						"مرضية"=>"15",
						"أمومة"=>"16"	
					  ),
"DURECONGE"   => '0' ,
"DEBUTCONGE"  => date('j-m-Y'),
);
view::button($data['btn'],'');
echo "<h2>Nouveau congé : ".strtoupper($this->user[0]['Nomlatin'])."_".$this->user[0]['Prenom_Latin']." ( ".$this->stringtostring("grade","idg",$this->user[0]['rnvgradear'],"gradear") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=90;
$this->label($x+960,$y+160,'السبب');              $this->combov1($x+700,$y+150,'CAUSECONGE',$data['CAUSECONGE'],'date');
$this->label($x+610,$y+160,'المدة');              $this->txtarid($x+350,$y+150,'DURECONGE','DURECONGE',0,$data['DURECONGE'],'date'); 
$this->label($x+260,$y+160,'تاريخ بداية العطلة'); $this->txts($x,$y+150,'DEBUTCONGE',0,$data['DEBUTCONGE'],'dateus1');
$this->label($x+960,$y+190,'لمستخلف');            view::usereph($x+700,$y+180,"REMPLACANT","mvc","المستخلف","","0",""); 
$this->submit($x+700,$y+210,$data['butun']);
$this->f1();
view::sautligne(19);
ob_end_flush();
//echo "<h2>List des personnels : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
?>
		
		<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th  colspan=3   style="width:50px;">
		<?php
		echo '<a title="Autres"  href="'.URL.'drh/search/0/10?o=idp&q=" > Autres : </a>';
		?>
		</th> 
		
		<th  colspan=4    style="width:50px;">
		<?php
		echo '<a target="_blank" title="Fiche personnels "  href="'.URL.'pdf/inspection/vehicule.php?uc='.$this->user[0]['idp'].'" > Fiche personnels </a>';
		
		?>
		</th> 
		
		<th  colspan=4    style="width:50px;">
		<?php
		echo '<a target="_blank" title="Fiche personnels "  href="'.URL.'pdf/inspection/vehicule.php?uc='.$this->user[0]['idp'].'" > Fiche personnels </a>';
		
		//echo '<a target="_blank" title="Fiche personnels "  href="'.URL.'pdf/inspection/vehicule.php?uc='.$this->user[0]['idp'].'" > Fiche personnels de : '.strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) ".'</a>';
		?>
		</th> 
		</tr>
		<tr>
		<th style="width:10px;">Photos</th>
		<th style="width:50px;">Cause congé</th>
		<th style="width:50px;">Durée congé</th>
		<th style="width:70px;">Debut congé</th>
		<th style="width:70px;">Fin congé</th>
		<th style="width:70px;">Remplacant</th>
		<th style="width:50px;">Stock</th>
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
		                $fichier = photosmfx('pers',$value['id'].'.jpg','M') ;
		                echo "<td  style=\"width:10px;\"     align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."inspection/upl***/".$value['id']."\" ><img  src=\"".URL."public/webcam/str/".$fichier."?t=".time()."\"  width='20' height='20' border='0'></td> " ;
		                ?>
						<td align="center"><?php echo View::nbrtostring('causeconge','id',trim($value['CAUSECONGE']),'causecongear');?></td>
						<td align="center"><?php echo $value['DURECONGE'];?></td>
						<td align="center"><?php echo view::dateUS2FR($value['DEBUTCONGE']);?></td>
						<td align="center"><?php echo view::dateUS2FR($value['FINCONGE']) ;?></td>
						<td align="center"><?php echo View::nbrtostring('grh','idp',trim($value['REMPLACANT']),'Nomarab')."_".View::nbrtostring('grh','idp',trim($value['REMPLACANT']),'Prenom_Arabe');?></td>
						<td align="center"><?php echo $value['STOCK'];?></td>
						<?php echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"titre de conge\" href=\"".URL.'tcpdf/drh/demande_ar.php?idp='.$this->user[0]['idp']."&idc=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;?>
						<?php echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"titre de conge\" href=\"".URL.'tcpdf/drh/conge_ar.php?idp='.$this->user[0]['idp']."&idc=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;?>
						<td align="center"><a title="editer" href="<?php echo URL.'drh/editconge/'.$value['id'].'/'.$value['idc'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'drh/deleteconge/'.$value['id'].'/'.$this->user[0]['idp'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
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
		
		
		