<?php 
verifsession();	
lang(Session::get('lang'));
ob_start();
$data = array(
"Date"       => date('Y-m-j'), 
"btn"        => 'inspection', 
"id"         => '', 
"butun"      => 'Ajouter conformite + inspection', 
"photos"     => 'public/images/icons/pers.PNG',
"action"     => 'inspection/creathome17/'.$this->user[0]['id'],
"WILAYAN1"   => $this->user[0]['WILAYA'] ,
"WILAYAN2"   => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA'],'WILAYAS'),
"COMMUNEN1"  => $this->user[0]['COMMUNE'] ,
"COMMUNEN2"  => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE'],'COMMUNE'),
"ADRESSE"    => $this->user[0]['ADRESSE'],
"ADRESSEAR"  => $this->user[0]['ADRESSEAR'],
"NAT"        => array( 
				"Transfert"=>"1",
				"Installation"=>"2",
				"Ouverture"=>"3",
				"Fermeture"=>"4"			 
				),				
"PROPRIETAIRE"  => 'x',
"DEBUTCONTRAT"  => '00-00-0000',
"FINCONTRAT"    => '00-00-0000'				
);
view::button($data['btn'],'');
echo "<h2>PV de conformite du local de : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
//$this->txts($x+100,$y+240,'DATE',0,$data['DATE'],'dateus');
$d=date('j-m-Y');
$this->label($x,$y+220,'Wilaya');                   $this->WILAYA($x+150,$y+210,'WILAYA','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+400,$y+220,'Commune');              $this->COMMUNE($x+520,$y+210,'COMMUNE','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
$this->label($x+800,$y+220,'Adresse');              $this->txt($x+880,$y+210,'ADRESSE',0,$data['ADRESSE'],'date');
$this->label($x,$y+260,'Date PV ');                 $this->txts($x+150,$y+250,'DATEP',0,$d,'dateus'); $this->label($x+400,$y+260,'Nature PV');    $this->combov1($x+520,$y+250,'NAT',$data['NAT']);              $this->label($x+800,$y+260,'Adresse ar ');  $this->txtarid($x+880,$y+250,'ADRESSEAR','ADRESSEAR',0,$data['ADRESSEAR'],'date');
$this->label($x,$y+300,'Demande N ');               $this->txt($x+150,$y+290,'NUMD',0,"00");          $this->label($x+400,$y+300,'Date demande'); $this->txts($x+520,$y+290,'DATED',0,date('j-m-Y'),'dateus1');

$this->label($x,$y+340,'Cabinet de consultation '); $this->date1($x+150,$y+330,'CDS0',10,'00','cds();');$this->date1($x+225,$y+330,'CDS1',10,'00','cds();');  $this->date1($x+300,$y+330,'CDS',0,"00",'cds();');
$this->label($x,$y+380,'Salle de soins');           $this->date1($x+150,$y+370,'SDS0',10,'00','sds();');$this->date1($x+225,$y+370,'SDS1',10,'00','sds();');  $this->date1($x+300,$y+370,'SDS',0,"00",'sds();');
$this->label($x,$y+420,"Salle d'attente  : H ");    $this->date1($x+150,$y+410,'SAH0',10,'00','sah();');$this->date1($x+225,$y+410,'SAH1',10,'00','sah();');$this->date1($x+300,$y+410,'SAH',0,"00",'sah();');
$this->label($x,$y+460,"Salle d'attente  : F ");    $this->date1($x+150,$y+450,'SAF0',10,'00','saf();');$this->date1($x+225,$y+450,'SAF1',10,'00','saf();');$this->date1($x+300,$y+450,'SAF',0,"00",'saf();');
$this->label($x,$y+500,'Sanitaires ');              $this->date1($x+150,$y+490,'SAN0',10,'00','san();');$this->date1($x+225,$y+490,'SAN1',10,'00','san();');$this->date1($x+300,$y+490,'SAN',0,"00",'san();');
$this->label($x,$y+540,'Surface total ');           $this->txt($x+150,$y+530,'STL',0,"00");

$this->label($x+400,$y+340,'ًZone encl');            $this->chekbox($x+470,$y+335,"ZE");
$this->label($x+400,$y+380,'Groupe');               $this->chekbox($x+470,$y+375,"groupe"); $this->combopharmacieng($x+520,$y+370,"PHA4","","","pharmacie",17);

$this->label($x+400,$y+420,'1er géneraliste');      $this->combopharmacien($x+520,$y+410,"PHA1","","","pharmacie",17);   $this->label($x+800,$y+420,'Distance 1 ');$this->txt($x+880,$y+410,'DIST1',0,"00");
$this->label($x+400,$y+460,'2em géneraliste');      $this->combopharmacien($x+520,$y+450,"PHA2","","","pharmacie",17);   $this->label($x+800,$y+460,'Distance 2 ');$this->txt($x+880,$y+450,'DIST2',0,"00");
$this->label($x+400,$y+500,'3em géneraliste');      $this->combopharmacien($x+520,$y+490,"PHA3","","","pharmacie",17);   $this->label($x+800,$y+500,'Distance 3 '); $this->txt($x+880,$y+490,'DIST3',0,"00");

$this->label($x+800,$y+300,'Propriétaire');         $this->txtarid($x+880,$y+290,'PROPRIETAIRE','PROPRIETAIRE',0,$data['PROPRIETAIRE'],'date');
$this->label($x+800,$y+340,'Début contrat');        $this->txts($x+880,$y+330,'DEBUTCONTRAT',0,$data['DEBUTCONTRAT'],'dateus2');
$this->label($x+800,$y+380,'Fin contrat');          $this->txts($x+880,$y+370,'FINCONTRAT',0,$data['FINCONTRAT'],'dateus3');
$this->hide(100,100,"STRUCTURE","",$this->user[0]['STRUCTURE']);
$this->submit($x+880,$y+540,$data['butun']);
$this->f1();
view::sautligne(22);
ob_end_flush();

?>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th  colspan=4   style="width:50px;">
		<?php echo '<a title="Autres Medecin generaliste"  href="'.URL.'inspection/search/0/10?o=STRUCTURE&q=17'.'" > Autres Medecin generaliste : '.'</a>';?>
		</th> 
		<th  colspan=5   style="width:50px;">
		<?php echo '<a target="_blank" title="Fiche personnels "  href="'.URL.'inspection/searchx/0/10?o=id&q='.$this->user[0]['id'].'" > Fiche personnels de : '.strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) ".'</a>';?>
		</th> 
		</tr>
		<tr>
		<th style="width:10px;">Date PV</th>
		<th style="width:10px;">Nature PV</th>
		<th style="width:200px;">Adresse</th>
		<th style="width:10px;">Fin contrat</th>
		<th style="width:10px;">Dossier</th>
		<th style="width:10px;">Pv-Conformite</th>
		<th style="width:10px;">Décision</th>
		<th style="width:10px;">UPD </th>
		<th style="width:10px;">DEL</th>
		</tr>
		<?php
		if (isset($this->userListview)) 
		{		
				foreach($this->userListview as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="center"><?php echo view::dateUS2FR($value['DATEP']);?></td>
						<td align="center">
						<?php 
						if($value['NAT']==1){echo "Transfert";}
						if($value['NAT']==2){echo "Instatllation";}
						if($value['NAT']==3){echo "Ouverture";}
						?>
						</td>
						<td align="center"><?php echo $value['ADRESSE'];?></td>
						<td align="center"><?php echo view::dateUS2FR($value['FINCONTRAT']);?></td>
						<?php    
					    echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Dossier\" href=\"".URL.'tcpdf/inspection/doss17.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;
						echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"PV de conformite\" href=\"".URL.'tcpdf/inspection/conf17.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;
	                    if($value['NAT']==1){echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_changement\"   href=\"".URL.'tcpdf/inspection/tran17.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;}
						if($value['NAT']==2){echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_installation\" href=\"".URL.'tcpdf/inspection/inst17.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;}
						if($value['NAT']==3){echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_ouverture\"    href=\"".URL.'tcpdf/inspection/ouve17.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;}
						if($value['NAT']==4){echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_fermeture\"    href=\"".URL.'tcpdf/inspection/ferm17.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;}
						?>
						<td align="center"><a title="editer" href="<?php echo URL.'inspection/edithome17/'.$value['idstructure'].'/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'inspection/deletehome17/'.$value['id'].'/'.$value['idstructure'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
						</tr>
				<?php 
				}
				$total_count=count($this->userListview);
				if ($total_count <= 0 )
				{
				echo '<tr><td align="center" colspan="9" ><span> No record found for autos </span></td> </tr>';
				echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="9" ><span>' .$total_count.'/'.$total_count.' Record(s) found.</span></td></tr>';					
				}
				else
				{		
				//echo '<tr bgcolor=""  ><td align="center" colspan="8" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb).'</td></tr>';	
			    echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="9" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
				}		
		}
		else 
		{
		echo '<tr><td align="center" colspan="8" ><span> Click search button to start searching a vms.</span></td></tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="8" ><span>&nbsp;</span></td></tr>';					      
		} 
		
		?>
		</table><br/><br/>		
<script type="text/javascript">
function saf(){var a = parseFloat(this.document.form1.SAF0.value);var b = parseFloat(this.document.form1.SAF1.value);var result =  parseFloat(a * b).toFixed(2);this.document.form1.SAF.value = result;}
function sah(){var a = parseFloat(this.document.form1.SAH0.value);var b = parseFloat(this.document.form1.SAH1.value);var result =  parseFloat(a * b).toFixed(2);this.document.form1.SAH.value = result;}
function sds(){var a = parseFloat(this.document.form1.SDS0.value);var b = parseFloat(this.document.form1.SDS1.value);var result =  parseFloat(a * b).toFixed(2);this.document.form1.SDS.value = result;}
function cds(){var a = parseFloat(this.document.form1.CDS0.value);var b = parseFloat(this.document.form1.CDS1.value);var result =  parseFloat(a * b).toFixed(2);this.document.form1.CDS.value = result;}
function san(){var a = parseFloat(this.document.form1.SAN0.value);var b = parseFloat(this.document.form1.SAN1.value);var result =  parseFloat(a * b).toFixed(2);this.document.form1.SAN.value = result;}

function PopupImage(img) {
	w=open("",'image','weigth=toolbar=no,scrollbars=no,resizable=yes, width=220, height=268');	
	w.document.write("<HTML><BODY onblur=\"window.close();\"><IMG src='"+img+"'>");
	w.document.write("</BODY></HTML>");
	w.document.close();
}
window.onload = function(){
document.getElementById("ADRESSEAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
document.getElementById("PROPRIETAIRE").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
}
</script>		