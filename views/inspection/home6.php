<?php 
verifsession();	
lang(Session::get('lang'));
ob_start();
$data = array(
"Date"       => date('j-m-Y'), 
"btn"        => 'inspection', 
"id"         => '', 
"butun"      => 'Ajouter conformite + inspection', 
"photos"     => 'public/images/icons/pers.PNG',
"action"     => 'inspection/creathome6/'.$this->user[0]['id'],
"WILAYAN1"   => $this->user[0]['WILAYA'] ,
"WILAYAN2"   => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA'],'WILAYAS'),
"COMMUNEN1"  => $this->user[0]['COMMUNE'] ,
"COMMUNEN2"  => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE'],'COMMUNE'),
"ADRESSE"    => "",
"ADRESSEAR"  => "",
"NAT"        => array( 
				"Polyclinique"=>"1",
				"salle de soins"=>"2"			 
				),				
"PROPRIETAIRE"  => "*"
			
);
view::button($data['btn'],'');
echo "<h2> Structures sanitaires de soins de base : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,210,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+220,'Wilaya');                $this->WILAYA($x+150,$y+210,'WILAYA','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+400,$y+220,'Commune');           $this->COMMUNE($x+520,$y+210,'COMMUNE','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
$this->label($x+800,$y+220,'Adresse fr');        $this->txt($x+880,$y+210,'ADRESSE',0,$data['ADRESSE'],'date');
$this->label($x,$y+260,'Date inscription ');     $this->txts($x+150,$y+250,'DATEP',0,$data['Date'],'dateus'); $this->label($x+400,$y+260,'Nature structure');    $this->combov1($x+520,$y+250,'NAT',$data['NAT']);              $this->label($x+800,$y+260,'Adresse ar ');  $this->txtarid($x+880,$y+250,'ADRESSEAR','ADRESSEAR',0,$data['ADRESSEAR'],'date');
$this->label($x,$y+300,'Arrete N ');             $this->txt($x+150,$y+290,'NUMD',0,"000");                     $this->label($x+400,$y+300,'Date Arrete');         $this->txts($x+520,$y+290,'DATED',0,"14-02-2011",'dateus1');
$this->label($x+800,$y+300,'chef struct');       $this->txtarid($x+880,$y+290,'PROPRIETAIRE','PROPRIETAIRE',0,$data['PROPRIETAIRE'],'date');

$this->label($x,$y+340,"Medecine generale");     $this->chekbox($x+155,$y+335,"MG");
$this->label($x,$y+340+30,"Soins dentaires");    $this->chekbox($x+155,$y+335+30,"SD");
$this->label($x,$y+340+60,"Chirurgie generale"); $this->chekbox($x+155,$y+335+60,"CG");
$this->label($x,$y+340+90,"Medecine interne");   $this->chekbox($x+155,$y+335+90,"MI");
$this->label($x,$y+340+120,"Obstetrique");       $this->chekbox($x+155,$y+335+120,"OB");
$this->label($x,$y+340+150,"Pediatrie");         $this->chekbox($x+155,$y+335+150,"PE");

$this->label($x+400,$y+340,"Laboratoire");      $this->chekbox($x+520,$y+335,"LA");
$this->label($x+400,$y+340+30,"Radiologie");     $this->chekbox($x+520,$y+335+30,"RA");
$this->label($x+400,$y+340+60,"Pharmacie");     $this->chekbox($x+520,$y+335+60,"PH");

$this->label($x+800,$y+340,"Soins Para ");      $this->chekbox($x+885,$y+335,"SP");
$this->label($x+800,$y+340+30,"UMC");           $this->chekbox($x+885,$y+335+30,"UMC");   $this->label($x+800+150,$y+340+30,"LITS UMC");           $this->chekbox($x+885+150,$y+335+30,"litsUMC");
$this->label($x+800,$y+340+60,"Maternité");     $this->chekbox($x+885,$y+335+60,"MA");    $this->label($x+800+150,$y+340+60,"lits Maternité");     $this->chekbox($x+885+150,$y+335+60,"litsMA");

$this->hide(100,100,"STRUCTURE","",$this->user[0]['STRUCTURE']);
$this->submit($x+1140,$y+520,$data['butun']);
$this->f1();
view::sautligne(22);
ob_end_flush();

?>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th  colspan=6  style="width:50px;"><?php echo '<a title="Autres EPSP"  href="'.URL.'inspection/search/0/10?o=STRUCTURE&q=6'.'" > Autres EPSP : '.'</a>';echo " /__ /";   echo '<a title="Arrete"  href="'.URL.'pdf/inspection/arrete/'.$this->user[0]['id'].'.pdf" > Arrete consistance physique : '.'</a>';  ?></th>
        <th  colspan=5  style="width:50px;"><?php echo '<a target="_blank" title="Fiche structure"  href="'.URL.'pdf/inspection/epsp.php?uc='.$this->user[0]['id'].'" > Fiche structure de : '.strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) ".'</a>';?></th> 
		</tr>
		<tr>
		<th style="width:100px;">Adresse</th>
		<th style="width:100px;">Commune</th>
		<th style="width:20px;">Nature</th>
		<th style="width:20px;">Maternité</th>
		<th style="width:10px;">Arrete N</th>
		<th style="width:10px;">Date Arrete</th>
		
		
		
		<th style="width:10px;">ins</th>
		<th style="width:10px;">nor</th>
		<th style="width:10px;">***</th>
		
		<th style="width:10px;">UPD </th>
		<th style="width:10px;">DEL</th>
		</tr>
		<?php
		if (isset($this->userListview)) 
		{		
				foreach($this->userListview as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						
						<td align="left"><?php echo $value['ADRESSE'];?></td>
						<td align="left"><?php echo View::nbrtostring('com','IDCOM',$value['COMMUNE'],'COMMUNE');?></td>
						<td align="center">
						<?php 
						if($value['NAT']==1){echo "Polyclinique";}
						if($value['NAT']==2){echo "salle de soins";}
						?>
						</td>
						<td align="center">
						<?php 
						if($value['MA']==1){echo "Oui";}
						if($value['MA']==0){echo "***";}
						?>
						</td>
						<td align="center"><?php echo $value['NUMD'];?></td>
						<td align="center"><?php echo view::dateUS2FR($value['DATED']);?></td>
						
						
						<?php 
						echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"inspection\"            href=\"".URL.'pdf/inspection/epsp_inspection.php?uc='.$this->user[0]['id']."&id=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;  
						if($value['NAT']==1){echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"circulaire\"   href=\"".URL.'pdf/inspection/po.pdf'.""."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;}
						if($value['NAT']==2){echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"circulaire\"   href=\"".URL.'pdf/inspection/ss.pdf'.""."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;}
						if($value['NAT']==1){echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_changement\"   href=\"".URL.'tcpdf/inspection/tran15.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;}
						if($value['NAT']==2){echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_installation\" href=\"".URL.'tcpdf/inspection/inst15.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;}
						?>
						
						<td align="center"><a title="editer" href="<?php echo URL.'inspection/edithome6/'.$value['idstructure'].'/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'inspection/deletehome6/'.$value['id'].'/'.$value['idstructure'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
						</tr>
				<?php 
				}
				$total_count=count($this->userListview);
				if ($total_count <= 0 )
				{
				echo '<tr><td align="center" colspan="9" ><span> No record found for autos </span></td> </tr>';
				echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="8" ><span>' .$total_count.'/'.$total_count.' Record(s) found.</span></td></tr>';					
				}
				else
				{		
				//echo '<tr bgcolor=""  ><td align="center" colspan="8" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb).'</td></tr>';	
			    echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="11" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
				}		
		}
		else 
		{
		echo '<tr><td align="center" colspan="8" ><span> Click search button to start searching a vms.</span></td></tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="11" ><span>&nbsp;</span></td></tr>';					      
		} 
		
		?>
		</table>


<br/><br/>		
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