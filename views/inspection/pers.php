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
ob_start();
$data = array(
"Date"       => date('Y-m-j'), 
"btn"        => 'inspection', 
"id"         => '', 
"butun"      => 'Inser New personnel', 
"photos"     => 'public/images/icons/pers.PNG',
"action"     => 'inspection/creatpers/'.$this->user[0]['id'],

"CASNOS"        => '',
"DEBUTCONTRAT"  => '',
"FINCONTRAT"    => '',

"NOMAR"  => 'x' ,
"PRENOMAR"  => 'x' ,	
"ADRESSEAR"  => 'x',
"Categorie"  => array(      
                        "MEDECIN"=>"M",
						"PARAMEDICALE"=>"P",
					    "CHAUFFEUR"=>"C"						
					  )
);
view::button($data['btn'],'');
echo "<h2>Nouveau personnel : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x+970,$y+300,'اللقـــب');           $this->txtarid($x+690,$y+290,'PRENOMAR','PRENOMAR',0,$data['PRENOMAR'],'date');
$this->label($x+640,$y+300,'الاســـــــم');        $this->txtarid($x+340,$y+290,'NOMAR','NOMAR',0,$data['NOMAR'],'date');
$this->label($x+290,$y+300,'المهنة');             $this->combov1($x,$y+290,'Categorie',$data['Categorie'],'date');

$this->label($x,$y+370,'__________________________________________________________________________________________________________________');
$this->label($x,$y+400,'N°_CNAS');              $this->txt($x+100,$y+390,'CASNOS',0,$data['CASNOS'],'date');
$this->label($x+350,$y+400,'Début contrat');      $this->txts($x+450,$y+390,'DEBUTCONTRAT',0,$data['DEBUTCONTRAT'],'dateus1');
$this->label($x+700,$y+400,'Fin contrat');        $this->txts($x+100+350+350,$y+390,'FINCONTRAT',0,$data['FINCONTRAT'],'dateus2');

$this->submit($x+800,$y+450,$data['butun']);
$this->f1();
view::sautligne(15);
ob_end_flush();
echo "<h2>List des personnels : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
?>
		
		<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th  colspan=3   style="width:50px;">
		<?php
		echo '<a title="Autres transport sanitaire"  href="'.URL.'inspection/search/0/10?o=STRUCTURE&q=21'.'" > Autres transport sanitaire : '.'</a>';
		?>
		</th> 
		
		<th  colspan=3    style="width:50px;">
		<?php
		echo '<a target="_blank" title="Fiche personnels "  href="'.URL.'pdf/inspection/vehicule.php?uc='.$this->user[0]['id'].'" > Fiche personnels </a>';
		?>
		</th> 
		
		<th  colspan=4    style="width:50px;">
		<?php
		//echo '<a target="_blank" title="Fiche personnels "  href="'.URL.'pdf/inspection/vehicule.php?uc='.$this->user[0]['id'].'" > Fiche personnels de : '.strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) ".'</a>';
		?>
		</th> 
		
		
		
		</tr>
		<tr>
		<th style="width:10px;">Photos</th>
		<th style="width:50px;">Categorie</th>
		<th style="width:50px;">CNAS</th>
		<th style="width:70px;">debut contrat</th>
		<th style="width:70px;">fin contrat</th>
		<th style="width:70px;">الاســـــــم</th>
		<th style="width:50px;">اللقب</th>
		<th style="width:10px;">Etat</th>
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
		                echo "<td  style=\"width:10px;\"     align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."inspection/upl***/".$value['id']."\" ><img  src=\"".URL."public/webcam/str/".$fichier."?t=".time()."\"  width='25' height='25' border='0'></td> " ;
		                ?>
						<td align="center"><?php echo $value['Categorie'];?></td>
						<td align="center"><?php echo $value['CASNOS'];?></td>
						<td align="center"><?php echo view::dateUS2FR($value['DEBUTCONTRAT']);?></td>
						<td align="center"><?php echo view::dateUS2FR($value['FINCONTRAT']) ;?></td>
						
						<td align="center"><?php echo $value['NOMAR'];?></td>
						<td align="center"><?php echo $value['PRENOMAR'];?></td>
						<?php 
		                if ($value['ETAT']==0) {
		                ?>
						<td align="center"><a  title="désactivé" href="<?php echo URL.'inspection/editetatpers/'.$value['id'].'/'.$value['idt'].'/1';?>"><img src="<?php echo URL.'public/images/icons/ok.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	
		                <?php 
		                }
		                if ($value['ETAT']==1) {
		                ?>
						<td align="center"><a  title="activé" href="<?php echo URL.'inspection/editetatpers/'.$value['id'].'/'.$value['idt'].'/0';?>"><img src="<?php echo URL.'public/images/icons/non.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	
						 <?php 
		                }
		                ?>
						
						<td align="center"><a title="editer" href="<?php echo URL.'inspection/editpers/'.$value['id'].'/'.$value['idt'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'inspection/deletepers/'.$value['id'].'/'.$value['idt'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
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
		
		
		