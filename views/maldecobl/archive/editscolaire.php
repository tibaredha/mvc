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
view::button('scolaire','');
lang(Session::get('lang'));
ob_start();
// view::munu('scolaire'); 
?>
<h2>Update visite medicale </h2 >
<hr /><br />
<?php
View::fieldset("ss0","<strong>Identification</strong>");View::fieldset("ss","<strong>Conclusion D éxamen</strong>");
View::fieldset("ss1","<strong>Vaccination</strong>");View::fieldset("ss3","<strong>Ophtalmologie</strong>");View::fieldset("ss5","<strong>Neurologie</strong>");View::fieldset("ss7","<strong>Pneumologie</strong>");View::fieldset("ss9","<strong>Locomoteur</strong>");
View::fieldset("ss2","<strong>Parasitose</strong>");View::fieldset("ss4","<strong>ORL</strong>");View::fieldset("ss6","<strong>Endocrinologie</strong>");View::fieldset("ss8","<strong>Cardiologie</strong>");View::fieldset("ss10","<strong>Uro-Nephrologie</strong>");
$this->f0(URL.'scolaire/editscolaireok/'.$this->user[0]['id'],'post');
View::photosurl(1195,200,URL.'public/images/photos/PYRAMIDE.jpg');
$x=35;$y=220+90;

$this->label($x,240,'Date Examen');       $this->date($x+125,230,'DATE',0,$this->user[0]['DATE'],'date');
$this->label($x+400,240,'Palier');       
$this->combov1($x+440,230,'PALIER',array(
$this->user[0]['PALIER']=>$this->user[0]['PALIER'],
"1p"=>"1",
"2p"=>"2",
"3p"=>"3",
"4p"=>"4",
"5m"=>"5",
"1m"=>"6",
"2m"=>"7",
"3m"=>"8",
"1s"=>"9",
"2s"=>"10",
"3s"=>"11"
));
$this->WILAYA($x-5,270,'WILAYAR','countryss','mvc','wil',$this->user[0]['WILAYAR'],'Wilaya Etablissement');
$this->COMMUNE($x+220,270,'COMMUNER','COMMUNESS',$this->user[0]['COMMUNER'],'Commune Etablissement');
$this->COMMUNE($x+440,270,'ETA','ETASS',$this->user[0]['ETA'],'Nom Etablissement');

// if ($this->user[0]['AD']==1) {} else {}
View::label($x+700,240,'Convoqué Pour Un Suivi ');         if ($this->user[0]['CPS']==1) {View::chekboxed($x+870,240,"CPS","CPS");} else {View::chekbox($x+870,240,"CPS","CPS");}
View::label($x+700,270,'Presenté Pour Un Suivi ');         if ($this->user[0]['PPS']==1) {View::chekboxed($x+870,270,"PPS","PPS");} else {View::chekbox($x+870,270,"PPS","PPS");}
View::label($x+925,240,'Orienté Specialisee ');             if ($this->user[0]['OS']==1) {View::chekboxed($x+1095,240,"OS","OS");} else {View::chekbox($x+1095,240,"OS","OS");}
View::label($x+925,270,'Pris En Charge ');                  if ($this->user[0]['PS']==1) {View::chekboxed($x+1095,270,"PS","PS");} else {View::chekbox($x+1095,270,"PS","PS");}
View::label($x,$y+30,'Vaccination incomplète');             if ($this->user[0]['AD1']==1){View::chekboxed($x+170,$y+30,"AD1","AD1");}else{View::chekbox($x+170,$y+30,"AD1","AD1");}
View::label($x,$y+60,'Absence cicatrice BCG');              if ($this->user[0]['AD2']==1){View::chekboxed($x+170,$y+60,"AD2","AD2");} else {View::chekbox($x+170,$y+60,"AD2","AD2");}
View::label($x,$y+120,'Pédiculose');                        if ($this->user[0]['AD3']==1) {View::chekboxed($x+170,$y+120,"AD3","AD3");} else {View::chekbox($x+170,$y+120,"AD3","AD3");}     
View::label($x,$y+150,'Gale');                              if ($this->user[0]['AD4']==1) {View::chekboxed($x+170,$y+150,"AD4","AD4");} else {View::chekbox($x+170,$y+150,"AD4","AD4");} 
View::label($x,$y+180,'Oxyurose');                          if ($this->user[0]['AD5']==1) {View::chekboxed($x+170,$y+180,"AD5","AD5");} else {View::chekbox($x+170,$y+180,"AD5","AD5");}
View::label($x+240,$y+30,'Ptosis Nystagmus');               if ($this->user[0]['AD6']==1) {View::chekboxed($x+410,$y+30,"AD6","AD6");} else {View::chekbox($x+410,$y+30,"AD6","AD6");}
View::label($x+240,$y+60,'Paleur conjonctivale');           if ($this->user[0]['AD7']==1) {View::chekboxed($x+410,$y+60,"AD7","AD7");} else {View::chekbox($x+410,$y+60,"AD7","AD7");}
View::label($x+240,$y+90,'Strabisme');                      if ($this->user[0]['AD8']==1) {View::chekboxed($x+410,$y+90,"AD8","AD8");} else {View::chekbox($x+410,$y+90,"AD8","AD8");}
View::label($x+240,$y+120,'Baisse acuité visuelle');        if ($this->user[0]['AD9']==1) {View::chekboxed($x+410,$y+120,"AD9","AD9");} else {View::chekbox($x+410,$y+120,"AD9","AD9");}
View::label($x+240,$y+150,'Trachome');                      if ($this->user[0]['AD10']==1) {View::chekboxed($x+410,$y+150,"AD10","AD10"); } else {View::chekbox($x+410,$y+150,"AD10","AD10"); }
View::label($x+240,$y+210,'Surdité Hypoacousie');           if ($this->user[0]['AD11']==1) {View::chekboxed($x+410,$y+210,"AD11","AD11");} else {View::chekbox($x+410,$y+210,"AD11","AD11");}
View::label($x+480,$y+30,'Difficultés scolaires');          if ($this->user[0]['AD12']==1) {View::chekboxed($x+650,$y+30,"AD12","AD12");} else {View::chekbox($x+650,$y+30,"AD12","AD12");}
View::label($x+480,$y+60,'Troubles comportement');          if ($this->user[0]['AD13']==1) {View::chekboxed($x+650,$y+60,"AD13","AD13");} else {View::chekbox($x+650,$y+60,"AD13","AD13");}
View::label($x+480,$y+90,'Troubles langage');               if ($this->user[0]['AD14']==1) {View::chekboxed($x+650,$y+90,"AD14","AD14");} else {View::chekbox($x+650,$y+90,"AD14","AD14");}
View::label($x+480,$y+120,'Epilepsie');                     if ($this->user[0]['AD15']==1) {View::chekboxed($x+650,$y+120,"AD15","AD15");} else {View::chekbox($x+650,$y+120,"AD15","AD15");}
View::label($x+480,$y+180,'Diabète');                       if ($this->user[0]['AD16']==1) {View::chekboxed($x+650,$y+180,"AD16","AD16");} else {View::chekbox($x+650,$y+180,"AD16","AD16");}
View::label($x+480,$y+210,'Goitre');                        if ($this->user[0]['AD17']==1) {View::chekboxed($x+650,$y+210,"AD17","AD17");} else {View::chekbox($x+650,$y+210,"AD17","AD17");}
View::label($x+700,$y+30,'Asthme');                         if ($this->user[0]['AD18']==1) {View::chekboxed($x+870,$y+30,"AD18","AD18");} else {View::chekbox($x+870,$y+30,"AD18","AD18");}
View::label($x+700,$y+90,'Souffle cardiaque');              if ($this->user[0]['AD19']==1) {View::chekboxed($x+870,$y+90,"AD19","AD19");} else {View::chekbox($x+870,$y+90,"AD19","AD19");}
View::label($x+700,$y+120,'Antécédents de RAA');            if ($this->user[0]['AD20']==1) {View::chekboxed($x+870,$y+120,"AD20","AD20");} else {View::chekbox($x+870,$y+120,"AD20","AD20");}
View::label($x+925,$y+30,'Déformation des Mbres');          if ($this->user[0]['AD21']==1) {View::chekboxed($x+1095,$y+30,"AD21","AD21");} else {View::chekbox($x+1095,$y+30,"AD21","AD21");}
View::label($x+925,$y+60,'Déformations du rachis');         if ($this->user[0]['AD22']==1) {View::chekboxed($x+1095,$y+60,"AD22","AD22");} else {View::chekbox($x+1095,$y+60,"AD22","AD22");}
View::label($x+925,$y+120,'Troubles urinaires');            if ($this->user[0]['AD23']==1) {View::chekboxed($x+1095,$y+120,"AD23","AD23");} else {View::chekbox($x+1095,$y+120,"AD23","AD23");}
View::label($x+925,$y+150,'Ectopie testiculaire');          if ($this->user[0]['AD24']==1) {View::chekboxed($x+1095,$y+150,"AD24","AD24");} else {View::chekbox($x+1095,$y+150,"AD24","AD24");}
View::label($x+925,$y+180,'Enurésie');                      if ($this->user[0]['AD25']==1) {View::chekboxed($x+1095,$y+180,"AD25","AD25");} else {View::chekbox($x+1095,$y+180,"AD25","AD25");}

View::hide(215,370,'NEC','0',$this->user[0]['NEC']);
View::hide(215,370,'WILAYAN','0',$this->user[0]['WILAYAN']);
View::hide(215,370,'COMMUNEN','0',$this->user[0]['COMMUNEN']);
View::hide(215,370,'id','0',$this->user[0]['id']);


$this->submit($x+1180,$y+180+30,'Update visite medicale');
$this->f1();
ob_end_flush();
view::sautligne(14);
?>






