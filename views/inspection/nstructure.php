<?php 
verifsession();	
lang(Session::get('lang'));
ob_start();
$data = array(
"DATE"         => date('d-m-Y'), 
"btn"          => 'inspection', 
"id"           => '', 
"butun"        => 'Inser New Structure', 
"photos"       => 'public/images/photos/msp.jpg',
"action"       => 'inspection/createstructure/',
"specialite1"  => '0' ,
"specialite2"  => 'Spécialite',
"NATURE"       => array( "PRIVEE"=>"2" ,"PUBLIC"=>"1" ),     					 					  
"SEXE"         => array("Masculin"=>"M","Feminin"=>"F"),					  
"NOM"          => 'x' ,
"NOMAR"        => '' ,
"PRENOM"       => 'x' ,
"PRENOMAR"     => '' ,						  
"DNS"          => date('d-m-Y') ,	 
"WILAYAN1"     => '17000' ,
"WILAYAN2"     => 'DJELFA',
"COMMUNEN1"    => '924' ,
"COMMUNEN2"    => 'Ain-oussera',
"WILAYAR1"     => '17000' ,
"WILAYAR2"     => 'DJELFA',
"COMMUNER1"    => '924' ,
"COMMUNER2"    => 'Ain-oussera',
"ADRESSE"      => 'x',
"ADRESSEAR"    => '',
"Mobile"       => '(00) 00-00-00-00',
"Fixe"         => '(000) 00-00-00',
"Email"        => '@',

"DIPLOME"      => date('d-m-Y'),
"UNIV"         => '',
"NUMORDER"     => '0',
"DATEORDER"    => date('d-m-Y'),
"NUMDEM"       => '0',
"DATEDEM"      => date('d-m-Y'),


"REALISATION"  => date('d-m-Y'),
"NREALISATION" => '0',
"OUVERTURE"    => date('d-m-Y'),
"NOUVERTURE"   => '0',
"PROPRIETAIRE" => 'x',
"DEBUTCONTRAT" => date('d-m-Y'),
"FINCONTRAT"   => date('d-m-Y')
);
view::button($data['btn'],'');
echo "<h2>Structure Sanitaire</h2 ><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=60;
$this->label($x,$y+160,'Nature');            $this->combov1($x+100,$y+150,'NATURE',$data['NATURE']);
$this->label($x,$y+190,'Instalation');       $this->txts($x+100,$y+180,'DATE',0,$data['DATE'],'dateus');                                    
$this->label($x+350,$y+190,'Type');          $this->combostructure($x+450,$y+180,'STRUCTURE','structurebis','1','Structure','class','id','structure');
$this->label($x+700,$y+190,'Spécialite');    $this->specialite($x+800,$y+180,'SPECIALITE',$data['specialite1'],$data['specialite2'],'classspecialite');
$this->label($x,$y+220,'Nom');               $this->txt($x+100,$y+210,'NOM',0,$data['NOM'],'date');                                          
$this->label($x+350,$y+220,'Prenom');        $this->txt($x+450,$y+210,'PRENOM',0,$data['PRENOM'],'date');                                             
$this->label($x+700,$y+220,'Sexe');          $this->combov1($x+800,$y+210,'SEXE',$data['SEXE']);
$this->label($x,$y+250,'Naissance');         $this->txts($x+100,$y+240,'DNS',0,$data['DNS'],'dateus6');
$this->label($x+350,$y+250,'Wilaya');        $this->WILAYA($x+450,$y+240,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+700,$y+250,'Commune');       $this->COMMUNE($x+800,$y+240,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);          
$this->label($x,$y+260,'__________________________________________________________________________________________________________________');
$this->label($x,$y+290,'Date diplome');      $this->txts($x+100,$y+280,'DIPLOME',0,	$data['DIPLOME'],'dateus44');
$this->label($x,$y+290+30,'Universite');     $this->UNIVERSITE($x+100,$y+280+30,'UNIV','univ','mvc','wil',"الجزائر","الجزائر"); 
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
$this->label($x+700,$y+400,'Fin contrat');  $this->txts($x+800,$y+390,'FINCONTRAT',0,$data['FINCONTRAT'],'dateus2');
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
ob_end_flush();
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