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
"butun"      => 'Inser New grade', 
"photos"     => 'public/webcam/drh/'.$fichier,
"action"     => 'drh/creatgrade/'.$this->user[0]['idp'],
"MODE"	 => array(      
                
						"على أساس الشهادة"=>"1",
						"بعد تكوين متخصص "=>"2",
						"عن طريق إمتحان مهني "=>"3",
						"عن طريق فحص مهني "=>"4",
						"على سبيل الإختيار عن طريق التسجيل  في قائمة التأهيل "=>"5"
						),
"D_grade"     => date('j-m-Y'),
"ANNEEPV"    => date('Y') ,
"N_grade"      => array(      
                        $this->user[0]['DUREE']=>$this->user[0]['DUREE'],
						"الدنيا"=>"1",
						"المتوسطة"=>"2",
						"الطويلة"=>"3"),
"CATEGORIE"	 => array(      
                        $this->user[0]['CATEGORIE']=>$this->user[0]['CATEGORIE'],
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
						"12"=>"12",
						"13"=>"13",
						"14"=>"14",
						"15"=>"15",
						"16"=>"16",
						"17"=>"17",
						"hc1"=>"hc1",
						"hc2"=>"hc2",
						"hc3"=>"hc3",
						"hc4"=>"hc4",
						"hc5"=>"hc5",
						"hc6"=>"hc6",
						"hc7"=>"hc7"
						),	
"ECHELON"	 => array(      
                        $this->user[0]['ECHELON']=>$this->user[0]['ECHELON'],
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
"DATEDEFFET" => date('j-m-Y'),
"NDECISION"  => '0' ,
"DATEDECISION" => date('j-m-Y')
);
view::button($data['btn'],'');
echo "<h2>Nouvelle promotion dans le  grade : ".strtoupper($this->user[0]['Nomlatin'])."_".$this->user[0]['Prenom_Latin']." ( ".$this->stringtostring("grade","idg",$this->user[0]['rnvgradear'],"gradear") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=90;            
$this->label($x+960,$y+160,'تاريخ');                  $this->txts($x+700,$y+150,'D_grade',0,$data['D_grade'],'dateus1');
$this->label($x+610,$y+160,'النمط');                  $this->combov1($x+350,$y+150,'MODE',$data['MODE'],'date'); 
$this->label($x+960,$y+190,'الرتبة');                 $this->combograde($x+700,$y+180,'N_grade','data','grade',$this->user[0]['rnvgradear'],$this->stringtostring("grade","idg",$this->user[0]['rnvgradear'],"gradear"),$this->stringtostring("grade","idg",$this->user[0]['rnvgradear'],"ids"));                                                                                        
$this->label($x+610,$y+190,'الصنف');                  $this->combov1($x+350,$y+180,'CATEGORIE',$data['CATEGORIE'],'date'); 
$this->label($x+260,$y+190,'الدرجة');                 $this->combov1($x,$y+180,'ECHELON',$data['ECHELON'],'date'); 
$this->hide(595,$x+90,'A_grade',20,$this->user[0]['rnvgradear']);                                                            
$this->submit($x+700,$y+210+60,$data['butun']);
$this->f1();
view::sautligne(19);
ob_end_flush();
?>
		
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
	<tr>
		<th  colspan=5 style="width:50px;"><?php echo '<a title="Autres"  href="'.URL.'drh/search/0/10?o=idp&q='.$this->user[0]['idp'].'" > GRH : </a>';?></th> 
		<th  colspan=4  style="width:50px;"><?php echo '<a target="_blank" title="Fiche personnels "  href="'.URL.'tcpdf/drh/list_avance.php?idp='.$this->user[0]['idp'].'" > Fiche avance  </a>';?></th>
		<th  colspan=2  style="width:50px;"><?php echo '<a target="_blank" title="Fiche personnels "  href="'.URL.'tcpdf/drh/list_avance.php?idp='.$this->user[0]['idp'].'" > Fiche avance  </a>';?></th>
	</tr>
	<tr>
		<th style="width:190px;">GRADE_A</th>
		<th style="width:190px;">GRADE_N</th>
		<th style="width:70px;">CATEGORIE</th>
		<th style="width:70px;">ECHELON</th>
		<th style="width:10px;">DATEDEFFET</th>		
		<th style="width:10px;">CONTAGION</th>
		<th style="width:10px;">INDEMNITE_S</th>
		<th style="width:10px;">PAIE_F</th>
		<th style="width:10px;">DECISION</th>
		<th style="width:25px;">Upd </th>
		<th style="width:25px;">Del</th>
	</tr>
	<?php
	if (isset($this->userListview))
	{		
		foreach($this->userListview as $key => $value)
		{ 
		?>
			<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
				<td align="center"><?php echo $this->stringtostring("grade","idg",$value['A_grade'],"gradear");?></td>
				<td align="center"><?php echo $this->stringtostring("grade","idg",$value['N_grade'],"gradear");?></td>
				
				<td align="center">
				<?php 
					if($value['CATEGORIE']=="hc1"){echo"ق . ف . 1";}
					elseif($value['CATEGORIE']=="hc2"){echo"ق . ف . 2";}
					elseif($value['CATEGORIE']=="hc3"){echo"ق . ف . 3";}
					elseif($value['CATEGORIE']=="hc4"){echo"ق . ف . 4";}
					elseif($value['CATEGORIE']=="hc5"){echo"ق . ف . 5";}
					elseif($value['CATEGORIE']=="hc6"){echo"ق . ف . 6";}
					elseif($value['CATEGORIE']=="hc7"){echo"ق . ف . 7";}
					else {echo $value['CATEGORIE'];}
				?>
				</td>
				<td align="center"><?php echo $value['ECHELON'];?></td>
				<td align="center"><?php echo view::dateUS2FR($value['D_grade']);?></td>
				
				<?php 
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Contagion\"         href=\"".URL.'tcpdf/drh/contagion.php?uc='.$this->user[0]['idp']."&idg=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;		
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Indemnite\"         href=\"".URL.'tcpdf/drh/indemnite.php?uc='.$this->user[0]['idp']."&idg=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;	
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Paie\"              href=\"".URL.'tcpdf/drh/paie.php?uc='.$this->user[0]['idp']."&idg=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;	
				
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\decision promotion\" href=\"".URL.'tcpdf/drh/grade.php?uc='.$this->user[0]['idp']."&idg=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;
				?>
				<td align="center"><a title="editer" href="<?php echo URL.'drh/editavance/'.$value['id'].'/'.$this->user[0]['idp'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
				<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'drh/deletegrade/'.$value['id'].'/'.$this->user[0]['idp'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
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
			echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="16" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
		}		
	}
	else 
	{
		echo '<tr><td align="center" colspan="16" ><span> Click search button to start searching a vms.</span></td></tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="16" ><span>&nbsp;</span></td></tr>';					      
	} 
	
	?>
</table>
<br/>
<br/>		
<script type="text/javascript">
window.onload = function(){
document.getElementById("NOMAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
document.getElementById("PRENOMAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
document.getElementById("ADRESSEAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
}
</script>	
		
		
		