<?php 
verifsession();	
lang(Session::get('lang'));
ob_start();
$fichier = photosmfy('str',$this->user[0]['id'].'.jpg',$this->user[0]['SEX']) ;
$data = array(
"btn"          => 'inspection', 
"photos"       => 'public/webcam/str/'.$fichier."?t=".time(),
"action"       => 'inspection/editSavestructure/'.$this->user[0]['id'],
"NATURE"       => array( $this->user[0]['NATURE']=>$this->user[0]['NATURE'],"PRIVEE"=>"2","PUBLIC"=>"1"),
"DATE"         => view::dateUS2FR($this->user[0]['DATE']),
"NOM"          => $this->user[0]['NOM'] ,
"PRENOM"       => $this->user[0]['PRENOM'] ,
"SEXE"         => array( $this->user[0]['SEX']=>$this->user[0]['SEX'],"Masculin"=>"M","Feminin"=>"F"),
"DNS"          => view::dateUS2FR($this->user[0]['DNS']),	
"WILAYAN1"     => $this->user[0]['WILAYAN'],"WILAYAN2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYAN'],'WILAYAS'),
"COMMUNEN1"    => $this->user[0]['COMMUNEN'],"COMMUNEN2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNEN'],'COMMUNE'),
"STRUCTURE1"   => $this->user[0]['STRUCTURE'],"STRUCTURE2"   => View::nbrtostring('structurebis','id',$this->user[0]['STRUCTURE'],'structure'),
"specialite1"  => $this->user[0]['SPECIALITEX'] ,
"specialite2"  => View::nbrtostring1('specialite','idspecialite',$this->user[0]['SPECIALITEX'],'specialitefr'),
"DIPLOME"      => view::dateUS2FR($this->user[0]['DIPLOME']),"UNIV0" => $this->user[0]['UNIV'],"UNIV1" => $this->user[0]['UNIV'],
"NUMORDER"     => $this->user[0]['NUMORDER'],"DATEORDER" => view::dateUS2FR($this->user[0]['DATEORDER']),
"NUMDEM"       => $this->user[0]['NUMDEM'],"DATEDEM" => view::dateUS2FR($this->user[0]['DATEDEM']),
"DATEDSC"      => view::dateUS2FR($this->user[0]['DATEDSC']),
"WSC0"         => $this->user[0]['WSC'],"WSC1"         => View::nbrtostring('wil','IDWIL',$this->user[0]['WSC'],'WILAYAS'),
"SERVICECIVILE0"=> $this->user[0]['SERVICECIVILE'],"SERVICECIVILE1"=> $this->user[0]['SERVICECIVILE'],
"WILAYAR1"     => $this->user[0]['WILAYA'] ,"WILAYAR2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA'],'WILAYAS'),
"COMMUNER1"    => $this->user[0]['COMMUNE'] ,"COMMUNER2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE'],'COMMUNE'),
"ADRESSE"      => $this->user[0]['ADRESSE'],
"PROPRIETAIRE" => $this->user[0]['PROPRIETAIRE'],
"DEBUTCONTRAT" => view::dateUS2FR($this->user[0]['DEBUTCONTRAT']),
"FINCONTRAT"   => view::dateUS2FR($this->user[0]['FINCONTRAT']),
"Mobile"       => $this->user[0]['Mobile'],
"Fixe"         => $this->user[0]['Fixe'],
"Email"        => $this->user[0]['Email'],
"REALISATION"  => view::dateUS2FR($this->user[0]['REALISATION']),
"NREALISATION" => $this->user[0]['NREALISATION'],
"OUVERTURE"    => view::dateUS2FR($this->user[0]['OUVERTURE']),
"NOUVERTURE"   => $this->user[0]['NOUVERTURE'],
"FERMETURE"    => $this->user[0]['FERMETURE'],
"NFERMETURE"   => $this->user[0]['NFERMETURE'],
"NOMAR"        => $this->user[0]['NOMAR'] ,
"PRENOMAR"     => $this->user[0]['PRENOMAR'] ,					  
"ADRESSEAR"    => $this->user[0]['ADRESSEAR'],
"butun"        => 'Edite  Structure' 	
);
Inspectionx::structure_sanitaire($data,"Modifier Structure Sanitaire : ".$data['NOM'].'_'.$data['PRENOM']);
?>

<script type="text/javascript">
function PopupImage(img) {
	w=open("",'image','weigth=toolbar=no,scrollbars=no,resizable=yes, width=220, height=268');	
	w.document.write("<HTML><BODY onblur=\"window.close();\"><IMG src='"+img+"'>");
	w.document.write("</BODY></HTML>");
	w.document.close();
}
  window.onload = function(){
	        document.getElementById("NOMAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
			document.getElementById("PRENOMAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}
			document.getElementById("ADRESSEAR").onkeydown = function myFunction(e){var keyCode = window.event ? window.event.keyCode : e.which; switch (keyCode) {case 65:this.value += "ض";return false;break;case 90:this.value += "ص";return false;break;case 69:this.value += "ث";return false;break;case 82:this.value += "ق";return false;break;case 84:this.value += "ف";return false;break;case 89:this.value += "غ";return false;break;case 85:this.value += "ع";return false;break;case 73:this.value += "ه";return false;break;case 79:this.value += "خ";return false;break;case 80:this.value += "ح";return false;break;case 221:this.value += "ج";return false;break;case 186:this.value += "د";return false;break;case 81:this.value += "ش";return false;break;case 83:this.value += "س";return false;break;case 68:this.value += "ي";return false;break;case 70:this.value += "ب";return false;break;case 71:this.value += "ل";return false;break;case 72:this.value += "ا";return false;break;case 74:this.value += "ت";return false;break;case 75:this.value += "ن";return false;break;case 76:this.value += "م";return false;break;case 77:this.value += "ك";return false;break;case 192:this.value += "ط";return false;break;case 220:this.value += "ذ";return false;break;case 87:this.value += "ئ";return false;break;case 88:this.value += "ء";return false;break;case 67:this.value += "ؤ";return false;break;case 86:this.value += "ر";return false;break;case 66:this.value += "لا";return false;break;case 78:this.value += "ى";return false;break;case 188:this.value += "ة";return false;break;case 190:this.value += "و";return false;break;case 191:this.value += "ز";return false;break;case 223:this.value += "ظ";return false;break;}}		
			}
</script>
	
