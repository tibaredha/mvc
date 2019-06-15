<SCRIPT LANGUAGE="JavaScript">

</script>
<?php 
verifsession();	
lang(Session::get('lang'));
ob_start();
$data = array(
"Date"       => date('Y-m-j'), 
"btn"        => 'inspection', 
"id"         => '', 
"butun"      => 'imprimer conformite', 
"photos"     => 'public/images/icons/pers.PNG',
"action"     => 'tcpdf/inspection/pvconf16.php?uc='.$this->user[0]['id'],

"WILAYAN1"  => $this->user[0]['WILAYA'] ,
"WILAYAN2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA'],'WILAYAS'),
"COMMUNEN1" => $this->user[0]['COMMUNE'] ,
"COMMUNEN2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE'],'COMMUNE'),
"ADRESSE"  => $this->user[0]['ADRESSE'],
"ADRESSEAR"  => $this->user[0]['ADRESSEAR'],

"NAT"        => array( 
				"Transfert"=>"1",
				"Instatllation"=>"2",
				"Ouverture"=>"3"			 
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
$this->label($x,$y+220,'Wilaya');                $this->WILAYA($x+150,$y+210,'WILAYA','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+400,$y+220,'Commune');           $this->COMMUNE($x+520,$y+210,'COMMUNE','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
$this->label($x+800,$y+220,'Adresse');           $this->txt($x+880,$y+210,'ADRESSE',0,$data['ADRESSE'],'date');
$this->label($x,$y+260,'Date PV ');              $this->txts($x+150,$y+250,'DATEP',0,date('j-m-Y'),'dateus'); $this->label($x+400,$y+260,'Nature PV');    $this->combov1($x+520,$y+250,'NAT',$data['NAT']);              $this->label($x+800,$y+260,'Adresse ar ');  $this->txtarid($x+880,$y+250,'ADRESSEAR','ADRESSEAR',0,$data['ADRESSEAR'],'date');
$this->label($x,$y+300,'Demande N ');            $this->txt($x+150,$y+290,'NUMD',0,"00");                     $this->label($x+400,$y+300,'Date demande'); $this->txts($x+520,$y+290,'DATED',0,date('j-m-Y'),'dateus1');

$this->label($x,$y+340,'Cabinet de consultation '); $this->date1($x+150,$y+330,'CDS0',10,'00','cds();');$this->date1($x+225,$y+330,'CDS1',10,'00','cds();');  $this->date1($x+300,$y+330,'CDS',0,"00",'cds();');
$this->label($x,$y+380,'Salle de soins');           $this->date1($x+150,$y+370,'SDS0',10,'00','sds();');$this->date1($x+225,$y+370,'SDS1',10,'00','sds();');  $this->date1($x+300,$y+370,'SDS',0,"00",'sds();');
$this->label($x,$y+420,"Salle d'attente  : H ");    $this->date1($x+150,$y+410,'SAH0',10,'00','sah();');$this->date1($x+225,$y+410,'SAH1',10,'00','sah();');$this->date1($x+300,$y+410,'SAH',0,"00",'sah();');
$this->label($x,$y+460,"Salle d'attente  : F ");    $this->date1($x+150,$y+450,'SAF0',10,'00','saf();');$this->date1($x+225,$y+450,'SAF1',10,'00','saf();');$this->date1($x+300,$y+450,'SAF',0,"00",'saf();');
$this->label($x,$y+500,'Sanitaires ');              $this->date1($x+150,$y+490,'SAN0',10,'00','san();');$this->date1($x+225,$y+490,'SAN1',10,'00','san();');$this->date1($x+300,$y+490,'SAN',0,"00",'san();');
$this->label($x,$y+540,'Surface total ');           $this->txt($x+150,$y+530,'STL',0,"00");

$this->label($x+400,$y+420,'1er spécialiste');   view::combopharmacienj($x+520,$y+410,"PHA1","","","pharmacie",16,$this->user[0]['SPECIALITEX']);   $this->label($x+800,$y+420,'Distance 1 ');$this->txt($x+880,$y+410,'DIST1',0,"00");
$this->label($x+400,$y+460,'2em spécialiste');   $this->combopharmacienj($x+520,$y+450,"PHA2","","","pharmacie",16,$this->user[0]['SPECIALITEX']);   $this->label($x+800,$y+460,'Distance 2 ');$this->txt($x+880,$y+450,'DIST2',0,"00");
$this->label($x+400,$y+500,'3em spécialiste');   $this->combopharmacienj($x+520,$y+490,"PHA3","","","pharmacie",16,$this->user[0]['SPECIALITEX']);   $this->label($x+800,$y+500,'Distance 3 '); $this->txt($x+880,$y+490,'DIST3',0,"00");

$this->label($x+800,$y+300,'Propriétaire');      $this->txtarid($x+880,$y+290,'PROPRIETAIRE','PROPRIETAIRE',0,$data['PROPRIETAIRE'],'date');
$this->label($x+800,$y+340,'Début contrat');     $this->txts($x+880,$y+330,'DEBUTCONTRAT',0,$data['DEBUTCONTRAT'],'dateus2');
$this->label($x+800,$y+380,'Fin contrat');       $this->txts($x+880,$y+370,'FINCONTRAT',0,$data['FINCONTRAT'],'dateus3');

$this->submit($x+880,$y+540,$data['butun']);
$this->f1();
view::sautligne(15);
ob_end_flush();

?>
		
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