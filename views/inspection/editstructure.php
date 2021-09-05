<?php 
verifsession();	
lang(Session::get('lang'));
ob_start();
$fichier = photosmfx('str',$this->user[0]['id'].'.jpg',$this->user[0]['SEX']) ;
$data = array(
"DATE"         => view::dateUS2FR($this->user[0]['DATE']),
"btn"          => 'inspection', 
"id"           => '', 
"butun"        => 'Edite  Structure', 
"photos"       => 'public/webcam/str/'.$fichier."?t=".time(),
"action"       => 'inspection/editSavestructure/'.$this->user[0]['id'],
"specialite1"  => $this->user[0]['SPECIALITEX'] ,
"specialite2"  => View::nbrtostring1('specialite','idspecialite',$this->user[0]['SPECIALITEX'],'specialitefr'),
"NATURE"       => array( $this->user[0]['NATURE']=>$this->user[0]['NATURE'],"PRIVEE"=>"2","PUBLIC"=>"1"),
"SEXE"         => array( $this->user[0]['SEX']=>$this->user[0]['SEX'],"Masculin"=>"M","Feminin"=>"F"),
"NOM"          => $this->user[0]['NOM'] ,
"NOMAR"        => $this->user[0]['NOMAR'] ,
"PRENOM"       => $this->user[0]['PRENOM'] ,	
"PRENOMAR"     => $this->user[0]['PRENOMAR'] ,					  
"DNS"          => view::dateUS2FR($this->user[0]['DNS']),		
"WILAYAN1"     => $this->user[0]['WILAYAN'] ,"WILAYAN2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYAN'],'WILAYAS'),
"COMMUNEN1"    => $this->user[0]['COMMUNEN'] ,"COMMUNEN2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNEN'],'COMMUNE'),
"WILAYAR1"     => $this->user[0]['WILAYA'] ,"WILAYAR2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA'],'WILAYAS'),
"COMMUNER1"    => $this->user[0]['COMMUNE'] ,"COMMUNER2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE'],'COMMUNE'),
"ADRESSE"      => $this->user[0]['ADRESSE'],
"ADRESSEAR"    => $this->user[0]['ADRESSEAR'],
"Mobile"       => $this->user[0]['Mobile'],
"Fixe"         => $this->user[0]['Fixe'],
"Email"        => $this->user[0]['Email'],
"DIPLOME"      => view::dateUS2FR($this->user[0]['DIPLOME']),
"UNIV0"        => $this->user[0]['UNIV'],
"UNIV1"        => $this->user[0]['UNIV'],
"NUMORDER"     => $this->user[0]['NUMORDER'],
"DATEORDER"    => view::dateUS2FR($this->user[0]['DATEORDER']),
"NUMDEM"       => $this->user[0]['NUMDEM'],
"DATEDEM"      => view::dateUS2FR($this->user[0]['DATEDEM']),
"Consultation" => 'X',
"salledesoins" => 'X',
"salledattente"=> 'X',
"REALISATION"  => view::dateUS2FR($this->user[0]['REALISATION']),
"NREALISATION" => $this->user[0]['NREALISATION'],
"OUVERTURE"    => view::dateUS2FR($this->user[0]['OUVERTURE']),
"NOUVERTURE"   => $this->user[0]['NOUVERTURE'],
"PROPRIETAIRE" => $this->user[0]['PROPRIETAIRE'],
"DEBUTCONTRAT" => view::dateUS2FR($this->user[0]['DEBUTCONTRAT']),
"FINCONTRAT"   => view::dateUS2FR($this->user[0]['FINCONTRAT'])
);
view::button($data['btn'],'');
echo "<h2>Modifier Structure Sanitaire : ".$data['NOM'].'_'.$data['PRENOM']."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=60;
$this->label($x,$y+160,'Nature');            $this->combov1($x+100,$y+150,'NATURE',$data['NATURE']);
$this->label($x+350,$y+160,'Instalation');   $this->txts($x+450,$y+150,'DATE',0,$data['DATE'],'dateus');                                    
$this->label($x,$y+190,'Nom');               $this->txt($x+100,$y+180,'NOM',0,$data['NOM'],'date');                                          
$this->label($x+350,$y+190,'Prenom');        $this->txt($x+450,$y+180,'PRENOM',0,$data['PRENOM'],'date');                                             
$this->label($x+700,$y+190,'Sexe');          $this->combov1($x+800,$y+180,'SEXE',$data['SEXE']);
$this->label($x,$y+220,'Naissance');         $this->txts($x+100,$y+210,'DNS',0,$data['DNS'],'dateus6');
$this->label($x+350,$y+220,'Wilaya');        $this->WILAYA($x+450,$y+210,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+700,$y+220,'Commune');       $this->COMMUNE($x+800,$y+210,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);          
$this->label($x,$y+230,'__________________________________________________________________________________________________________________');
$this->label($x,$y+260,'Type');              $this->combostructure($x+100,$y+250,'STRUCTURE','structurebis',$this->user[0]['STRUCTURE'],View::nbrtostring('structurebis','id',$this->user[0]['STRUCTURE'],'structure'),'class','id','structure');
$this->label($x+350,$y+260,'Spécialite');    $this->specialite($x+450,$y+250,'SPECIALITE',$data['specialite1'],$data['specialite2'],'classspecialite');
$this->label($x,$y+290,'Date diplome');      $this->txts($x+100,$y+280,'DIPLOME',0,	$data['DIPLOME'],'dateus44');
$this->label($x,$y+290+30,'Universite');     $this->UNIVERSITE($x+100,$y+280+30,'UNIV','UNIV','mvc','wil',$data['UNIV0'],$data['UNIV1']); 
$this->label($x+350,$y+290,'Order N ');      $this->txt($x+450,$y+280,'NUMORDER',0,$data['NUMORDER'],'date');
$this->label($x+350,$y+320,'Date order');    $this->txts($x+450,$y+280+30,'DATEORDER',0,$data['DATEORDER'],'dateusx');  
$this->label($x+700,$y+290,'Démission N');   $this->txt($x+800,$y+280,'NUMDEM',0,$data['NUMDEM'],'date');
$this->label($x+700,$y+320,'Date Démission');$this->txts($x+800,$y+280+30,'DATEDEM',0,$data['DATEDEM'],'dateusy');  
$this->label($x,$y+340,'__________________________________________________________________________________________________________________');
$this->label($x,$y+370,'Wilaya');            $this->WILAYA($x+100,$y+360,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);
$this->label($x+350,$y+370,'Commune');       $this->COMMUNE($x+100+350,$y+360,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);            
$this->label($x+700,$y+370,'Adresse');       $this->txt($x+800,$y+360,'ADRESSE',0,$data['ADRESSE'],'date');
$this->label($x,$y+400,'Propriétaire');      $this->txt($x+100,$y+390,'PROPRIETAIRE',0,$data['PROPRIETAIRE'],'date');                        
$this->label($x+350,$y+400,'Début contrat'); $this->txts($x+450,$y+390,'DEBUTCONTRAT',0,$data['DEBUTCONTRAT'],'dateus1');                            
$this->label($x+700,$y+400,'Fin contrat');   $this->txts($x+800,$y+390,'FINCONTRAT',0,$data['FINCONTRAT'],'dateus2');
$this->label($x,$y+430,'Mobile');            $this->txts($x+100,$y+420,'Mobile',0,$data['Mobile'],'port');
$this->label($x+350,$y+430,'Fixe');          $this->txts($x+450,$y+420,'Fixe',0,$data['Fixe'],'phone');
$this->label($x+700,$y+430,'E-mail');        $this->txt($x+800,$y+420,'Email',0,  $data['Email'],'date');
$this->label($x,$y+437+15,'__________________________________________________________________________________________________________________');
$this->label($x,$y+480,'Realisation');       $this->txts($x+100,$y+470,'REALISATION',0,$data['REALISATION'],'dateus3');                      $this->label($x+700,$y+480,'N° Realisation');             $this->txt($x+800,$y+470,'NREALISATION',0,$data['NREALISATION'],'date');
$this->label($x,$y+510,'Ouverture');         $this->txts($x+100,$y+500,'OUVERTURE',0,$data['OUVERTURE'],'dateus4');                          $this->label($x+700,$y+510,'N° Ouverture');               $this->txt($x+800,$y+500,'NOUVERTURE',0,$data['NOUVERTURE'],'date');
$this->label($x,$y+500+23,'__________________________________________________________________________________________________________________');
$this->label($x+700,$y+550,'اللقب');         $this->txtarid($x+800,$y+540,'NOMAR','NOMAR',0,$data['NOMAR'],'date');$this->label($x+350,$y+550,'الاســـــــم');   $this->txtarid($x+450,$y+540,'PRENOMAR','PRENOMAR',0,$data['PRENOMAR'],'date'); $this->label($x,$y+550,'العنوان');           $this->txtarid($x+100,$y+540,'ADRESSEAR','ADRESSEAR',0,$data['ADRESSEAR'],'date');
$this->submit($x+800,$y+570,$data['butun']);
$this->f1();
view::sautligne(19);
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
	
