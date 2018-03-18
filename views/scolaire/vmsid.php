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


echo '<h2>New  visite medicale : '.$this->user[0]['NOM'].'_'.$this->user[0]['PRENOM'].'_['.$this->user[0]['FILSDE'].'] </h2 ><hr /><br />';


View::fieldset("ss0","<strong>Identification</strong>");View::fieldset("ss","<strong>Conclusion D éxamen</strong>");
View::fieldset("ss1","<strong>Vaccination</strong>");View::fieldset("ss3","<strong>Ophtalmologie</strong>");View::fieldset("ss5","<strong>Neurologie</strong>");View::fieldset("ss7","<strong>Pneumologie</strong>");View::fieldset("ss9","<strong>Locomoteur</strong>");
View::fieldset("ss2","<strong>Parasitose</strong>");View::fieldset("ss4","<strong>ORL</strong>");View::fieldset("ss6","<strong>Endocrinologie</strong>");View::fieldset("ss8","<strong>Cardiologie</strong>");View::fieldset("ss10","<strong>Uro-Nephrologie</strong>");


$this->f0(URL.'scolaire/createid/'.$this->user[0]['id'],'post');
View::photosurl(1195,200,URL.'public/images/photos/PYRAMIDE.jpg');

$x=35;$y=220+90;


$this->label($x,240,'Date Examen');       $this->date($x+125,230,'DATE',0,date('Y-m-d'),'date');
$this->label($x+400,240,'Palier');       
$this->combov1($x+440,230,'PALIER',array(
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
$this->WILAYA($x-5,270,'WILAYAR','countryss','mvc','wil','17000','Wilaya Etablissement');
$this->COMMUNE($x+220,270,'COMMUNER','COMMUNESS','924','Commune Etablissement');
$this->COMMUNE($x+440,270,'ETA','ETASS','924','Nom Etablissement');


View::label($x+700,240,'Convoqué Pour Un Suivi ');         View::chekbox($x+870,240,"CPS","CPS");
View::label($x+700,270,'Presenté Pour Un Suivi ');         View::chekbox($x+870,270,"PPS","PPS");

View::label($x+925,240,'Orienté Specialisee ');            View::chekbox($x+1095,240,"OS","OS");
View::label($x+925,270,'Pris En Charge ');                 View::chekbox($x+1095,270,"PS","PS");


View::label($x,$y+30,'Vaccination incomplète');             View::chekbox($x+170,$y+30,"AD1","AD1");
View::label($x,$y+60,'Absence cicatrice BCG');              View::chekbox($x+170,$y+60,"AD2","AD2");

View::label($x,$y+120,'Pédiculose');                        View::chekbox($x+170,$y+120,"AD3","AD3");
View::label($x,$y+150,'Gale');                              View::chekbox($x+170,$y+150,"AD4","AD4");
View::label($x,$y+180,'Oxyurose');                          View::chekbox($x+170,$y+180,"AD5","AD5");

View::label($x+240,$y+30,'Ptosis Nystagmus');               View::chekbox($x+410,$y+30,"AD6","AD6");
View::label($x+240,$y+60,'Paleur conjonctivale');           View::chekbox($x+410,$y+60,"AD7","AD7");
View::label($x+240,$y+90,'Strabisme');                      View::chekbox($x+410,$y+90,"AD8","AD8");
View::label($x+240,$y+120,'Baisse acuité visuelle');        View::chekbox($x+410,$y+120,"AD9","AD9");
View::label($x+240,$y+150,'Trachome');                      View::chekbox($x+410,$y+150,"AD10","AD10"); 

View::label($x+240,$y+210,'Surdité Hypoacousie');           View::chekbox($x+410,$y+210,"AD11","AD11");

View::label($x+480,$y+30,'Difficultés scolaires');          View::chekbox($x+650,$y+30,"AD12","AD12");
View::label($x+480,$y+60,'Troubles comportement');          View::chekbox($x+650,$y+60,"AD13","AD13");
View::label($x+480,$y+90,'Troubles langage');               View::chekbox($x+650,$y+90,"AD14","AD14");
View::label($x+480,$y+120,'Epilepsie');                     View::chekbox($x+650,$y+120,"AD15","AD15");

View::label($x+480,$y+180,'Diabète');                       View::chekbox($x+650,$y+180,"AD16","AD16");
View::label($x+480,$y+210,'Goitre');                        View::chekbox($x+650,$y+210,"AD17","AD17");

View::label($x+700,$y+30,'Asthme');                         View::chekbox($x+870,$y+30,"AD18","AD18");

View::label($x+700,$y+90,'Souffle cardiaque');              View::chekbox($x+870,$y+90,"AD19","AD19");
View::label($x+700,$y+120,'Antécédents de RAA');            View::chekbox($x+870,$y+120,"AD20","AD20");


View::label($x+925,$y+30,'Déformation des Mbres');         View::chekbox($x+1095,$y+30,"AD21","AD21");
View::label($x+925,$y+60,'Déformations du rachis');        View::chekbox($x+1095,$y+60,"AD22","AD22");
                             
View::label($x+925,$y+120,'Troubles urinaires');           View::chekbox($x+1095,$y+120,"AD23","AD23");
View::label($x+925,$y+150,'Ectopie testiculaire');         View::chekbox($x+1095,$y+150,"AD24","AD24");
View::label($x+925,$y+180,'Enurésie');                     View::chekbox($x+1095,$y+180,"AD25","AD25");

View::hide(215,370,'NEC','0',$this->user[0]['id']);
View::hide(215,370,'WILAYAN','0',$this->user[0]['WILAYAN']);
View::hide(215,370,'COMMUNEN','0',$this->user[0]['COMMUNEN']);
View::hide(215,370,'id','0',$this->user[0]['id']);
$this->submit($x+1180,$y+180+30,'Inser New scolaire');
$this->f1();

view::sautligne(12);
ob_end_flush();
?>






