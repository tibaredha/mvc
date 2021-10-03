<?php 
verifsession();	
lang(Session::get('lang'));
ob_start();
$data = array(
"Date"       => '00-00-0000', 
"btn"        => 'inspection', 
"id"         => '', 
"butun"      => 'Ajouter conformite + inspection', 
"photos"     => 'public/images/icons/pers.PNG',
"action"     => 'inspection/creathome12/'.$this->user[0]['id'],
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
"DATECOM"    => "00-00-0000",
"FINCONTRAT"    => array(
				"00m"=>"0",
				"06m"=>"180",
				"12m"=>"365",//1a
				"18m"=>"545",//1.5a
				"24m"=>"730",//2a
				"30m"=>"910",//2.5a
				"36m"=>"1095"//3a
				)			
);
view::button($data['btn'],'');
echo "<h2>PV de conformite du local de : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,210,URL.$data['photos']);
$x=50;$y=10;
//$this->txts($x+100,$y+240,'DATE',0,$data['DATE'],'dateus');
$this->label($x,$y+220,'Wilaya');                $this->WILAYA($x+150,$y+210,'WILAYA','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+400,$y+220,'Commune');           $this->COMMUNE($x+520,$y+210,'COMMUNE','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
$this->label($x+800,$y+220,'Adresse');           $this->txt($x+880,$y+210,'ADRESSE',0,$data['ADRESSE'],'date');
$this->label($x,$y+260,'Date PV ');              $this->txts($x+150,$y+250,'DATEP',0,$data['Date'],'dateus'); $this->label($x+400,$y+260,'Nature PV');    $this->combov1($x+520,$y+250,'NAT',$data['NAT']);              $this->label($x+800,$y+260,'Adresse ar ');  $this->txtarid($x+880,$y+250,'ADRESSEAR','ADRESSEAR',0,$data['ADRESSEAR'],'date');
$this->label($x,$y+300,'Demande N ');            $this->txt($x+150,$y+290,'NUMD',0,"00");                     $this->label($x+400,$y+300,'Date demande'); $this->txts($x+520,$y+290,'DATED',0,date('d-m-Y'),'dateus1');

$this->label($x,$y+340,'Salle des ventes : ');      $this->date1($x+150,$y+330,'CDS0',10,'00','cds();');$this->date1($x+225,$y+330,'CDS1',10,'00','cds();');  $this->date1($x+300,$y+330,'CDS',0,"00",'cds();');
$this->label($x,$y+380,'Bureau : ');                $this->date1($x+150,$y+370,'SDS0',10,'00','sds();');$this->date1($x+225,$y+370,'SDS1',10,'00','sds();');  $this->date1($x+300,$y+370,'SDS',0,"00",'sds();');
$this->label($x,$y+420,"Salle de préparation : ");  $this->date1($x+150,$y+410,'SAH0',10,'00','sah();');$this->date1($x+225,$y+410,'SAH1',10,'00','sah();');$this->date1($x+300,$y+410,'SAH',0,"00",'sah();');
$this->label($x,$y+460,"Salle de stockage : ");     $this->date1($x+150,$y+450,'SAF0',10,'00','saf();');$this->date1($x+225,$y+450,'SAF1',10,'00','saf();');$this->date1($x+300,$y+450,'SAF',0,"00",'saf();');
$this->label($x,$y+500,'Sanitaires ');              $this->date1($x+150,$y+490,'SAN0',10,'00','san();');$this->date1($x+225,$y+490,'SAN1',10,'00','san();');$this->date1($x+300,$y+490,'SAN',0,"00",'san();');
$this->label($x,$y+540,'Surface total ');           $this->txt($x+150,$y+530,'STL',0,"00");

$this->label($x+400,$y+340,'ًZone encl');            $this->chekbox($x+470,$y+335,"ZE");
$this->label($x+400,$y+380,'Groupe');               $this->chekbox($x+470,$y+375,"groupe"); $this->combopharmacieng($x+520,$y+370,"PHA4","","","pharmacie",12);

$this->label($x+400,$y+420,'1er pharmacien');   $this->combopharmacien($x+520,$y+410,"PHA1","","","pharmacie",12);   $this->label($x+800,$y+420,'Distance 1 ');$this->txt($x+880,$y+410,'DIST1',0,"00");
$this->label($x+400,$y+460,'2em pharmacien');   $this->combopharmacien($x+520,$y+450,"PHA2","","","pharmacie",12);   $this->label($x+800,$y+460,'Distance 2 ');$this->txt($x+880,$y+450,'DIST2',0,"00");
$this->label($x+400,$y+500,'3em pharmacien');   $this->combopharmacien($x+520,$y+490,"PHA3","","","pharmacie",12);   $this->label($x+800,$y+500,'Distance 3 '); $this->txt($x+880,$y+490,'DIST3',0,"00");

$this->label($x+800,$y+300,'Propriétaire');      $this->txtarid($x+880,$y+290,'PROPRIETAIRE','PROPRIETAIRE',0,$data['PROPRIETAIRE'],'date');
$this->label($x+800,$y+340,'Début contrat');     $this->txts($x+880,$y+330,'DEBUTCONTRAT',0,$data['DEBUTCONTRAT'],'dateus2');
$this->label($x+800,$y+380,'Fin contrat');       
// $this->txts($x+880,$y+370,'FINCONTRAT',0,$data['FINCONTRAT'],'dateus3');
$this->combov1($x+880,$y+370,'FINCONTRAT',$data['FINCONTRAT']); 

$this->label(450,550,'Num commission');$this->txt(570,540,'NUMCOM',0,"00");
$this->label(850,550,'Date commission '); $this->txts(930,540,'DATECOM',0,$data['DATECOM'],'dateus3'); 

$this->hide(100,100,"STRUCTURE","",$this->user[0]['STRUCTURE']);
$this->submit($x+1140,$y+520,$data['butun']);
$this->f1();
view::sautligne(22);
ob_end_flush();
$colspan=9;
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>";
	echo "<tr>";
		echo "<th  colspan=4    style='width:50px;'>";
		echo '<a title="Autres officine pharmaceutique"  href="'.URL.'inspection/search/0/10?o=STRUCTURE&q=12'.'" > Autres officine pharmaceutique : '.'</a>';
		echo "</th>";		
		echo "<th  colspan=5    style='width:50px;'>";
		echo '<a target="_blank" title="Fiche personnels "  href="'.URL.'inspection/searchx/0/10?o=id&q='.trim($this->user[0]['id']).'" > Fiche personnels de : '.strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) ".'</a>';
		echo "</th>";
	echo "</tr>";
	echo"<tr>";
		echo"<th style='width:10px;'>Date PV</th>";
		echo"<th style='width:10px;'>Nature PV</th>";
		echo"<th style='width:200px;'>Adresse</th>";
		echo"<th style='width:10px;'>Fin contrat</th>";
		echo"<th style='width:10px;'>Dossier</th>";
		echo"<th style='width:10px;'>Pv-Conformite</th>";
		echo"<th style='width:10px;'>Décision</th>";
		echo"<th style='width:10px;'>UPD </th>";
		echo"<th style='width:10px;'>DEL</th>";
	echo"</tr>";
	if (isset($this->userListview)) 
	{		
		foreach($this->userListview as $key => $value){ 
				echo'<tr bgcolor="WHITE" onmouseover='."this.style.backgroundColor='#9FF781';".' onmouseout='."this.style.backgroundColor='WHITE';".' >';
				echo'<td align="center">';
					echo view::dateUS2FR($value['DATEP']);
				echo'</td>';
				echo'<td align="center">';
					if($value['NAT']==1){echo "Transfert";}
					if($value['NAT']==2){echo "Instatllation";}
					if($value['NAT']==3){echo "Ouverture";}
					if($value['NAT']==4){echo "Fermeture";}
				echo'</td>';
				echo'<td align="center">';
					echo $value['ADRESSE'];
				echo'</td>';
				echo'<td align="center">';
					echo view::dateUS2FR($value['FINCONTRAT']) ;
				echo'</td>';
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Dossier\"               href=\"".URL.'tcpdf/inspection/doss12.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"PV de conformite\"      href=\"".URL.'tcpdf/inspection/conf12.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;
					if($value['NAT']==1){echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_changement\"   href=\"".URL.'tcpdf/inspection/tran12.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;}
					if($value['NAT']==2){echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_installation\" href=\"".URL.'tcpdf/inspection/inst12.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;}
					if($value['NAT']==3){echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_ouverture\"    href=\"".URL.'tcpdf/inspection/ouve12.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;}
					if($value['NAT']==4){echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_fermeture\"    href=\"".URL.'tcpdf/inspection/ferm12.php?ids='.$this->user[0]['id']."&idh=".$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;}
				
				
				echo'<td align="center">';
					echo'<a title="editer" href="'.URL.'inspection/edithome12/'.$value['idstructure'].'/'.$value['id'].'"><img src="'.URL.'public/images/icons/edit.PNG " width="16" height="16" border="0" alt=""/></a>';
				echo'</td>';
				echo'<td align="center">';
					echo'<a class="delete" title="supprimer" href="'.URL.'inspection/deletehome12/'.$value['id'].'/'.$value['idstructure'].'">';
						echo '<img src="'.URL.'public/images/icons/delete.PNG " width="16" height="16" border="0" alt=""/>';
					echo '</a>';
				echo '</td>';
				echo'</tr>';

			}
			$total_count=count($this->userListview);
			if ($total_count <= 0 )
			{
				echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for autos </span></td> </tr>';
				echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count.'/'.$total_count.' Record(s) found.</span></td></tr>';					
			}
			else
			{		
				
				echo '<tr bgcolor="#00CED1"><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
			}		
	}
	else 
	{
		echo '<tr><td align="center" colspan="8" ><span> Click search button to start searching a vms.</span></td></tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="'.$colspan.'" ><span>&nbsp;</span></td></tr>';					      
	} 
		
		?>
		</table><br/><br/>		
<script type="text/javascript">
function saf(){
	var a = parseFloat(this.document.form1.SAF0.value);
	var b = parseFloat(this.document.form1.SAF1.value);
	var result =  parseFloat(a * b).toFixed(2);
	this.document.form1.SAF.value = result;
	var st1 = parseFloat(this.document.form1.SAF.value);
	var st2 = parseFloat(this.document.form1.SAH.value);
	var st3 = parseFloat(this.document.form1.SDS.value);
	var st4 = parseFloat(this.document.form1.CDS.value);
	var st5 = parseFloat(this.document.form1.SAN.value);
	var tot = st1 + st2 + st3 + st4 + st5  ;
	this.document.form1.STL.value = tot;
	}
function sah(){
	var a = parseFloat(this.document.form1.SAH0.value);
    var b = parseFloat(this.document.form1.SAH1.value);
    var result =  parseFloat(a * b).toFixed(2);
    this.document.form1.SAH.value = result;
    var st1 = parseFloat(this.document.form1.SAF.value);
	var st2 = parseFloat(this.document.form1.SAH.value);
	var st3 = parseFloat(this.document.form1.SDS.value);
	var st4 = parseFloat(this.document.form1.CDS.value);
	var st5 = parseFloat(this.document.form1.SAN.value);
	var tot = st1 + st2 + st3 + st4 + st5  ;
	this.document.form1.STL.value = tot;
}
function sds(){
	var a = parseFloat(this.document.form1.SDS0.value);
	var b = parseFloat(this.document.form1.SDS1.value);
	var result =  parseFloat(a * b).toFixed(2);
	this.document.form1.SDS.value = result;
	var st1 = parseFloat(this.document.form1.SAF.value);
	var st2 = parseFloat(this.document.form1.SAH.value);
	var st3 = parseFloat(this.document.form1.SDS.value);
	var st4 = parseFloat(this.document.form1.CDS.value);
	var st5 = parseFloat(this.document.form1.SAN.value);
	var tot = st1 + st2 + st3 + st4 + st5  ;
	this.document.form1.STL.value = tot;
	
	}
function cds(){
	var a = parseFloat(this.document.form1.CDS0.value);
	var b = parseFloat(this.document.form1.CDS1.value);
	var result =  parseFloat(a * b).toFixed(2);
	this.document.form1.CDS.value = result;
	var st1 = parseFloat(this.document.form1.SAF.value);
	var st2 = parseFloat(this.document.form1.SAH.value);
	var st3 = parseFloat(this.document.form1.SDS.value);
	var st4 = parseFloat(this.document.form1.CDS.value);
	var st5 = parseFloat(this.document.form1.SAN.value);
	var tot = st1 + st2 + st3 + st4 + st5  ;
	this.document.form1.STL.value = tot;
	}
function san(){
	var a = parseFloat(this.document.form1.SAN0.value);
	var b = parseFloat(this.document.form1.SAN1.value);
	var result =  parseFloat(a * b).toFixed(2);
	this.document.form1.SAN.value = result;
	var st1 = parseFloat(this.document.form1.SAF.value);
	var st2 = parseFloat(this.document.form1.SAH.value);
	var st3 = parseFloat(this.document.form1.SDS.value);
	var st4 = parseFloat(this.document.form1.CDS.value);
	var st5 = parseFloat(this.document.form1.SAN.value);
	var tot = st1 + st2 + st3 + st4 + st5  ;
	this.document.form1.STL.value = tot;
	
	}

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