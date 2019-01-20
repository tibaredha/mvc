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
"butun"      => 'imprimer conformite', 
"photos"     => 'public/images/icons/pers.PNG',
"action"     => 'tcpdf/inspection/decision_12_i.php?uc='.$this->user[0]['id'],

"WILAYAN1"  => $this->user[0]['WILAYA'] ,
"WILAYAN2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA'],'WILAYAS'),
"COMMUNEN1" => $this->user[0]['COMMUNE'] ,
"COMMUNEN2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE'],'COMMUNE'),
"ADRESSE"  => $this->user[0]['ADRESSE'],
"UNIV"  => 'الجزائر',
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
echo "<h2>PV d'intallation du local de : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+220,'Decision N ');              $this->txt($x+150,$y+210,'NUMDEC',0,"00");                    $this->label($x+400,$y+220,'Date Decision');   $this->txts($x+520,$y+210,'DATEDEC',0,date('j-m-Y'),'dateus1');
$this->label($x,$y+260,'Date diplome ');            $this->txts($x+150,$y+250,'DATED',0,date('j-m-Y'),'dateus');    $this->label($x+400,$y+260,'Universite ');   $this->txtarid($x+520,$y+250,'UNIV','UNIV',0,$data['UNIV'],'date');
$this->label($x,$y+300,'Order N ');                 $this->txt($x+150,$y+290,'NUMORDER',0,"00");                    $this->label($x+400,$y+300,'Date order');    $this->txts($x+520,$y+290,'DATEO',0,date('j-m-Y'),'dateus2');
$this->submit($x+880,$y+540,$data['butun']);
$this->f1();
view::sautligne(15);
ob_end_flush();
?>		
<script type="text/javascript">
  window.onload = function(){
			document.getElementById("UNIV").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}	
			}
</script>		