<script>
$(document).ready(function(){
/*     $("#hide").click(function(){
        $("p").hide();
    });
    $("#show").click(function(){
        $("p").show();
    }); */
	$(".h").hide();
	 $("#button").click(function(){
        $(".h").toggle();
    });
});
</script>

<?php 
verifsession();	
view::button('hemod','');
view::lang(Session::get('lang'),'d:\mvc\views\hemod\langan.php');  
ob_start();
$rouutex='hemod';
View::url(950,160,URL.'views/'.$rouutex.'/hemod.pdf','Conforme au Décret exécutif n° 15-11 du 14/01/2015',3);
// view::munu('hemos');
view::h(2,50,160,'Ajout Séance D\'Hémodialyse : Du Malade : '.view::nbrtostring('hemo','id',$this->user[0]['id'],'NOM')."_".view::nbrtostring('hemo','id',$this->user[0]['id'],'PRENOM')."_"."(".view::nbrtostring('hemo','id',$this->user[0]['id'],'FILS').")");
view:: sautligne (4);
View::fieldset("hemo0","<strong>Identification du malade</strong>"); View::fieldset("hemo","<strong>Date Séance</strong>");
View::fieldset("hemo1","<strong>Statut clinique avant la séance</strong>");   
View::fieldset("hemo2","<strong>Prescription Du Jour</strong>");   
View::fieldset("hemo3","<strong>Surveillance De La Séance</strong>");   
View::fieldset("hemo4","<strong>Après Débranchement</strong>");   
echo "<form action=\"".URL.$rouutex.'/Seanceok/'.$this->user[0]['id']."\" method=\"post\" name=\"form2\" id=\"form2\">";
view::photosurl(1170,210,URL.'public/webcam/hemo/'.$this->user[0]['id'].'.jpg');
$x=240;
view::label(50,$x,'Nom Prénom :');                  view::h(4,155,$x-18,view::nbrtostring('hemo','id',$this->user[0]['id'],'NOM')."_".view::nbrtostring('hemo','id',$this->user[0]['id'],'PRENOM')."_"."(".view::nbrtostring('hemo','id',$this->user[0]['id'],'FILS').")");
view::urlbutton(495,$x,URL.'hemod/newhemod/','+',2);   
view::urlbutton(495+30,$x,URL.'hemod/edit/'.$this->user[0]['id'],'M',2); 
view::label(760,$x,'Date');                         view::date(880,$x-10,'DATE',20,date("Y-m-d"));
view::label(975,$x,'Heure');                        view::date(1010,$x-10,'HEUR',20,date("H:i"));
view::label(760,$x+30,'Forfait :');                 
//view::combov(810,$x+20,'FORFAIT',array(view::nbrtostring('hemo','id',$this->user[0]['id'],'NOM'),"FO1","FO2","FO3","FO4","FO5")); 


view::forfait(880,$x+20,'FORFAIT','mvc','forfait',$this->user[0]['FORFAIT'],view::nbrtostring('forfait','Forfaitm',$this->user[0]['FORFAIT'],'Forfaitl')  );

// view::combov1(880,$x+20,'FORFAIT',array(
// "FORFAIT 1"=>"5600",
// "FORFAIT 2"=>"6100",
// "FORFAIT 3"=>"5900",
// "FORFAIT 4"=>"6415",
// "FORFAIT 5"=>"6115"
// ));


view::label(760,$x+60,'Heure Debut De Dialyse :');  view::date(1010,$x+50,'HEUREDD',1,date("H:i"));  
view::label(50,$x+30,'Medecin :');                  view::txt(145,$x+20,'MEDECIN',18,"DAOUD MALIK");  
view::label(380,$x+30,'Infirmier :');               view::txt(485,$x+20,'IDE',18,"x"); 

view::label(50,$x+110,'Poids idéal :');             view::txt(145,$x+100,'PI',18,view::nbrtostring('hemo','id',$this->user[0]['id'],'POIDS')); 
view::label(380,$x+110,'Poids du jour :');          view::txtjss(485,$x+100,'PJ',18,"0",'calcule()'); 
view::label(760,$x+110,'Prise de poids :');         view::txt(880,$x+100,'PP',18,"0"); 

view::label(50,$x+140,'Etat Fis/Cat :');            view::combov(145,$x+130,'EFC', array("A","B"));    
view::label(380,$x+140,'Uniponcture :');            view::combov(485,$x+130,'UNIP',array("UNIPONCTION","BIPONCTION"));   
view::label(760,$x+140,'Etat Clinique :');          view::combov(880,$x+130,'EC',  array("A","B"));  

view::label(50,$x+210,'Type Dialyse :');            view::combov(145,$x+200,'TYPEDIA',array("PROGRAMME","URGENCE")); 
view::label(380,$x+210,'Acces Dialyse :');          view::combov(485,$x+200,'ACCSANG',array("FAV","CCJ","CCF","PER")); 
view::label(760,$x+210,'Héparinisation :');         view::combov(880,$x+200,'HEPARINE',array("LOVENOX","INNOHEP","FRAXIPARINE")); 

view::label(50,$x+240,'Durée Dialyse:');            view::txt(145,$x+230,'DDIA',18,"4"); 
view::label(380,$x+240,'Poids A Perdre:');          view::txt(485,$x+230,'PAP',18,"0"); 
view::label(760,$x+240,'UF/h:');                    view::date(880,$x+230,'UFPH',18,"1.2"); 
view::label(975,$x+240,'UF T:');                    view::date(1010,$x+230,'UFT',18,"1.2"); 

view::label(50,$x+270,'EPO IVD:');                  view::txt(145,$x+260,'EPO',18,"1"); 
view::label(380,$x+270,'FER: IVD 30 mn');           view::txt(485,$x+260,'FER',18,"1"); 
view::label(760,$x+270,'AUTRES: ');                 view::txt(880,$x+260,'AUTRES',18,"X"); 

view::label(50,$x+300,'Surveillances Particulières:');  
view::label(250,$x+300,'Dext');       view::date(275,$x+290,'DEX',18,"0");
view::label(380,$x+300,'TA Sys_Dia'); view::date(485,$x+290,'TA',18,"0");
view::label(580,$x+300,'Pouls');      view::date(615,$x+290,'POO',18,"0");
view::label(760,$x+300,'Scope');      View::chekbox(810,$x+300,"SCO","SCO");                   
view::label(885,$x+300,'Autres');     view::date(1010,$x+290,'AUTRESAP',18,"X");
	
view::label(50,$x+370,'Hémodialyseur :');            view::combov(145,$x+360,'HEMODIALYSEUR',array("HEMODIALYSEUR","HEMODIALYSEUR")); 
view::label(380,$x+370,'Génerateur :');              view::combov(485,$x+360,'NAPP',array("1","2","3","4","5","6","7","8","9","10")); 
view::label(760,$x+370,'Bain :');                    view::combov(880,$x+360,'BAIN',array("pauvre en K","modifiés en Ca","modifiés en Na","Bicarb / citrate :  Citrasate","enrichis en Mg")); 
view::label(1160,$x+370,'Rinçage :');                view::combov(1240,$x+360,'RINC',array("RinCage","RinCage","RinCage")); 

  
view::label(50,$x+400,'Heure');
view::label(50+120,$x+400,'UF/h (ml)');
view::label(50+240,$x+400,'UF eff (ml)');
view::label(50+360,$x+400,'TAS (mm Hg)');
view::label(50+480,$x+400,'TAD (mm Hg)');
view::label(50+600,$x+400,'DS (ml/min)');
view::label(50+720,$x+400,'PV (mm Hg)');
view::label(50+840,$x+400,'DB (ml/min)');
view::label(50+960,$x+400,'PTM (mm Hg)');
view::label(50+1080,$x+400,'CDC (ms/cm)');
view::label(50+1260,$x+400,'Observation');


view::date(40+(120*0),$x+420,'HRD1',18,date("H:i"));
view::date(40+(120*1),$x+420,'UFH1',18,"0");
view::date(40+(120*2),$x+420,'UFE1',18,"0"); 
view::date(40+(120*3),$x+420,'TAS1',18,"0"); 
view::date(40+(120*4),$x+420,'TAD1',18,"0"); 
view::date(40+(120*5),$x+420,'DES1',18,"0"); 
view::date(40+(120*6),$x+420,'PRV1',18,"0"); 
view::date(40+(120*7),$x+420,'DEB1',18,"0"); 
view::date(40+(120*8),$x+420,'PTM1',18,"0"); 
view::date(40+(120*9),$x+420,'CDC1',18,"0"); 
view::txt(40+(120*10),$x+420,'OBS1',18,"_"); 

view::date(40+(120*0),$x+420+30,'HRD2',18,date("H:i"));
view::date(40+(120*1),$x+420+30,'UFH2',18,"0");
view::date(40+(120*2),$x+420+30,'UFE2',18,"0"); 
view::date(40+(120*3),$x+420+30,'TAS2',18,"0"); 
view::date(40+(120*4),$x+420+30,'TAD2',18,"0"); 
view::date(40+(120*5),$x+420+30,'DES2',18,"0"); 
view::date(40+(120*6),$x+420+30,'PRV2',18,"0"); 
view::date(40+(120*7),$x+420+30,'DEB2',18,"0"); 
view::date(40+(120*8),$x+420+30,'PTM2',18,"0"); 
view::date(40+(120*9),$x+420+30,'CDC2',18,"0"); 
view::txt(40+(120*10),$x+420+30,'OBS2',18,"_"); 

view::date(40+(120*0),$x+420+60,'HRD3',18,date("H:i"));
view::date(40+(120*1),$x+420+60,'UFH3',18,"0");
view::date(40+(120*2),$x+420+60,'UFE3',18,"0"); 
view::date(40+(120*3),$x+420+60,'TAS3',18,"0"); 
view::date(40+(120*4),$x+420+60,'TAD3',18,"0"); 
view::date(40+(120*5),$x+420+60,'DES3',18,"0"); 
view::date(40+(120*6),$x+420+60,'PRV3',18,"0"); 
view::date(40+(120*7),$x+420+60,'DEB3',18,"0"); 
view::date(40+(120*8),$x+420+60,'PTM3',18,"0"); 
view::date(40+(120*9),$x+420+60,'CDC3',18,"0"); 
view::txt(40+(120*10),$x+420+60,'OBS3',18,"_"); 

view::date(40+(120*0),$x+420+90,'HRD4',18,date("H:i"));
view::date(40+(120*1),$x+420+90,'UFH4',18,"0");
view::date(40+(120*2),$x+420+90,'UFE4',18,"0"); 
view::date(40+(120*3),$x+420+90,'TAS4',18,"0"); 
view::date(40+(120*4),$x+420+90,'TAD4',18,"0"); 
view::date(40+(120*5),$x+420+90,'DES4',18,"0"); 
view::date(40+(120*6),$x+420+90,'PRV4',18,"0"); 
view::date(40+(120*7),$x+420+90,'DEB4',18,"0"); 
view::date(40+(120*8),$x+420+90,'PTM4',18,"0"); 
view::date(40+(120*9),$x+420+90,'CDC4',18,"0"); 
view::txt(40+(120*10),$x+420+90,'OBS4',18,"_"); 

view::date(40+(120*0),$x+420+120,'HRD5',18,date("H:i"));
view::date(40+(120*1),$x+420+120,'UFH5',18,"0");
view::date(40+(120*2),$x+420+120,'UFE5',18,"0"); 
view::date(40+(120*3),$x+420+120,'TAS5',18,"0"); 
view::date(40+(120*4),$x+420+120,'TAD5',18,"0"); 
view::date(40+(120*5),$x+420+120,'DES5',18,"0"); 
view::date(40+(120*6),$x+420+120,'PRV5',18,"0"); 
view::date(40+(120*7),$x+420+120,'DEB5',18,"0"); 
view::date(40+(120*8),$x+420+120,'PTM5',18,"0"); 
view::date(40+(120*9),$x+420+120,'CDC5',18,"0"); 
view::txt(40+(120*10),$x+420+120,'OBS5',18,"_"); 


view::label(50,$x+630,'Heure Fin De Dialyse :');          view::date(200,$x+620,'HEUREFD',1,date("H:i")); 
view::label(300,$x+630,'Poids fin de séance :');           view::date(445,$x+620,'POIDSF',18,"0"); 
view::label(580,$x+630,'Perte de poids :');               view::date(690,$x+620,'PPFS',18,"0"); 
view::label(860,$x+630,'VST :');                          view::date(900,$x+620,'VST',18,"0"); 
view::label(1125,$x+630,'Commentaires :');                view::txt(1240,$x+620,'COMM',18,"_"); 

view::submit(1190,$x+280,'Ajout Séance D\'Hémodialyse');
view::f1();
view:: sautligne (33);


     
// view::label(50+160,$x+120,'SYS :');                    view::date(250,$x+110,'SYSD',5,"0");            
// view::label(345,$x+120,'DIA:');                        view::date(380,$x+110,'DIAD',5,"0");            
       
// view::label(50+160,$x+180,'SYS :');                    view::date(250,$x+170,'SYSF',5,"0");            
// view::label(345,$x+180,'DIA:');                        view::date(380,$x+170,'DIAF',5,"0"); 
?>







