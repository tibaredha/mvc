<?php 
verifsession();	
lang(Session::get('lang'));
ob_start();
function verif($id,$val) 
{
	if ($id == $val){return 'checked';}
}
$data = array(
"Date"       => date('j-m-Y'), 
"btn"        => 'inspection', 
"id"         => '', 
"butun"      => 'Ajouter conformite + inspection', 
"photos"     => 'public/images/icons/pers.PNG',
"action"     => 'inspection/edit1home6/'.$this->home[0]['id'],
"WILAYAN1"   => $this->home[0]['WILAYA'] ,
"WILAYAN2"   => View::nbrtostring('wil','IDWIL',$this->home[0]['WILAYA'],'WILAYAS'),
"COMMUNEN1"  => $this->home[0]['COMMUNE'] ,
"COMMUNEN2"  => View::nbrtostring('com','IDCOM',$this->home[0]['COMMUNE'],'COMMUNE'),
"ADRESSE"    => $this->home[0]['ADRESSE'],
"ADRESSEAR"  => $this->home[0]['ADRESSEAR'],
"NAT"        => array(
				$this->home[0]['NAT']=>$this->home[0]['NAT'],
				"Polyclinique"=>"1",
				"salle de soins"=>"2"					
				),				
"PROPRIETAIRE"  => $this->home[0]['PROPRIETAIRE'],
"NUMD"       =>$this->home[0]['NUMD'],
"DATED"      =>$this->dateUS2FR($this->home[0]['DATED']),
"MG"         =>verif($this->home[0]['MG'],'1'), 
"SD"         =>verif($this->home[0]['SD'],'1'), 
"CG"         =>verif($this->home[0]['CG'],'1'), 
"MI"         =>verif($this->home[0]['MI'],'1'), 
"OB"         =>verif($this->home[0]['OB'],'1'), 
"PE"         =>verif($this->home[0]['PE'],'1'), 
"LA"         =>verif($this->home[0]['LA'],'1'), 
"RA"         =>verif($this->home[0]['RA'],'1'), 
"PH"         =>verif($this->home[0]['PH'],'1'), 
"SP"         =>verif($this->home[0]['SP'],'1'), 
"UMC"         =>verif($this->home[0]['UMC'],'1'), 
"MA"         =>verif($this->home[0]['MA'],'1') 
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
$this->label($x,$y+300,'Arrete N ');             $this->txt($x+150,$y+290,'NUMD',0,$data['NUMD']);            $this->label($x+400,$y+300,'Date Arrete');         $this->txts($x+520,$y+290,'DATED',0,$data['DATED'],'dateus1');
$this->label($x+800,$y+300,'chef struct');       $this->txtarid($x+880,$y+290,'PROPRIETAIRE','PROPRIETAIRE',0,$data['PROPRIETAIRE'],'date');

$this->label($x,$y+340,"Medecine generale");     $this->chekboxvx($x+155,$y+335,"MG",$data['MG']);
$this->label($x,$y+340+30,"Soins dentaires");    $this->chekboxvx($x+155,$y+335+30,"SD",$data['SD']);
$this->label($x,$y+340+60,"Chirurgie generale"); $this->chekboxvx($x+155,$y+335+60,"CG",$data['CG']);
$this->label($x,$y+340+90,"Medecine interne");   $this->chekboxvx($x+155,$y+335+90,"MI",$data['MI']);
$this->label($x,$y+340+120,"Obstetrique");       $this->chekboxvx($x+155,$y+335+120,"OB",$data['OB']);
$this->label($x,$y+340+150,"Pediatrie");         $this->chekboxvx($x+155,$y+335+150,"PE",$data['PE']);

$this->label($x+400,$y+340,"Laboratoire");      $this->chekboxvx($x+520,$y+335,"LA",$data['LA']);
$this->label($x+400,$y+340+30,"Radiologie");    $this->chekboxvx($x+520,$y+335+30,"RA",$data['RA']);
$this->label($x+400,$y+340+60,"Pharmacie");     $this->chekboxvx($x+520,$y+335+60,"PH",$data['PH']);

$this->label($x+800,$y+340,"Soins Para ");      $this->chekboxvx($x+885,$y+335,"SP",$data['SP']);
$this->label($x+800,$y+340+30,"UMC");           $this->chekboxvx($x+885,$y+335+30,"UMC",$data['UMC']);    $this->label($x+800+150,$y+340+30,"LITS UMC");           $this->chekbox($x+885+150,$y+335+30,"litsUMC");
$this->label($x+800,$y+340+60,"Maternité");     $this->chekboxvx($x+885,$y+335+60,"MA",$data['MA']);      $this->label($x+800+150,$y+340+60,"lits Maternité");     $this->chekbox($x+885+150,$y+335+60,"litsMA");

$this->hide(100,100,"STRUCTURE","",$this->user[0]['STRUCTURE']);
$this->hide(100,100,"idstructure","",$this->home[0]['idstructure']);
$this->submit($x+1140,$y+520,$data['butun']);
$this->f1();
view::sautligne(22);
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