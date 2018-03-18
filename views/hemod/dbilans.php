<script>
$(document).ready(function(){
/*     $("#hide").click(function(){
        $("p").hide();
    });
    $("#show").click(function(){
        $("p").show();
    }); */
	$("#soustitre").hide();
	 $("#soustitre1").click(function(){
        $("#soustitre").toggle();
    });
});
</script>
<?php 
verifsession();	
view::button('hemow',$this->user[0]['id']);
lang(Session::get('lang'));ob_start();
View::h('2',25,160,'Demande Bilan  :  [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
View::fieldset("fns","FNS");
View::fieldset("lip","Bilan Lipdique");
View::fieldset("ren","Bilan Renal");
View::fieldset("thy","Bilan Thyroidien");
View::fieldset("hep","Bilan Hepatique");
View::fieldset("iono","Ionograme");
View::fieldset("inf","Autres");
View::fieldset("sero","Serologie");
View::fieldset("infla","Inflamatoire");
// view::munu('hemob');
echo "<form action=\"".URL.'pdf/hemod/biopha.php?id='.$this->user[0]['id']."\" method=\"post\" name=\"form2\" id=\"form2\">";
view::photosurl(1070,220,URL.'public/webcam/hemo/hemodialyse.jpg');	
$x=250;
// view::label(350,$x-10,'Date :');      view::date(400,$x-20,'DATE',20,date("Y-m-d"));view::date(490,$x-20,'HEUR',20,date("H:i"));view::label(650,$x-10,'Nom Prénom:');view::NOMPRENOMHEMO(760,230,"id");       
View::label(35,290,'Groupage');       View::chekbox(80,290,"ABORH");     
View::label(35,290+30,'FNS');         View::chekbox(80,290+30,'FNS');
View::label(35,290+60,'Fer');         View::chekbox(80,290+60,'Fer');
View::label(35,290+90,'Transferine');         View::chekbox(80,290+90,'Transferine');
// View::label(35,290+120,'LYM');        View::chekbox(80,290+120,'LYM');
// View::label(35,290+150,'MON');        View::chekbox(80,290+150,'MON');
// View::label(225,290,'GR');            View::chekbox(280,290,'GR'); 
// View::label(225,290+30,'HT');         View::chekbox(280,290+30,'HT');
//View::label(225,290+60,'HB');         View::chekbox(280,290+60,'HB');
// View::label(225,290+90,'VGM');        View::chekbox(280,290+90,'VGM'); 
// View::label(225,290+120,'CCMH');      View::chekbox(280,290+120,'CCMH');  
// View::label(225,290+150,'TGMH');      View::chekbox(280,290+150,'TCMH'); 
// View::label(425,290,'PLQT');          View::chekbox(480,290,'PLQT');
// View::label(425,290+30,'VMP');        View::chekbox(480,290+30,'VMP');
// View::label(425,290+60,'IDP');        View::chekbox(480,290+60,'IDP');
// View::label(425,290+90,'PCT');        View::chekbox(480,290+90,'PCT');
View::label(425,290+120,'TP');        View::chekbox(480,290+120,'TP');
View::label(425,290+150,'INR');       View::chekbox(480,290+150,'INR');
View::label(625,290,'NA+');           View::chekbox(680,290,'NA');
View::label(625,290+30,'K+');         View::chekbox(680,290+30,'K');
// View::label(625,290+60,'PHO');        View::chekbox(680,290+60,'PHO');
View::label(625,290+90,'MG');        View::chekbox(680,290+90,'MG');
View::label(625,290+120,'CA++');      View::chekbox(680,290+120,'CA');
View::label(625,290+150,'PHOS');      View::chekbox(680,290+150,'PHOS');
View::label(825,290,'CRP');           View::chekbox(880,290,'CRP');
// View::label(825,290+30,'VS1');        View::chekbox(880,290+30,'VS1');
// View::label(825,290+60,'VS2');        View::chekbox(880,290+60,'VS2');
// View::label(825,290+90,'FIB');        View::chekbox(880,290+90,'FIB');
View::label(825,290+120,'GLYCE');     View::chekbox(880,290+120,'GLYCE');
View::label(825,290+150,'HBA1C');     View::chekbox(880,290+150,'HB');
View::label(35,290+150+60,'TG');      View::chekbox(80,290+150+60,'TG');
View::label(35,290+150+90,'CT');      View::chekbox(80,290+150+90,'CHOLES');
View::label(35,290+150+120,'HDL');    View::chekbox(80,290+150+120,'HDL');
View::label(35,290+150+150,'LDL');    View::chekbox(80,290+150+150,'LDL');
// View::label(225,290+150+60,'CT/HDL'); View::chekbox(280,290+150+60,'CTHDL');
// View::label(225,290+150+90,'LDL/HDL');View::chekbox(280,290+150+90,'LDLHDL');
// View::label(225,290+150+120,'ASPECT');View::chekbox(280,290+150+120,'ASPECT'); 
View::label(425,290+150+60,'UREE');   View::chekbox(480,290+150+60,'UREE');
View::label(425,290+150+90,'CREAT');  View::chekbox(480,290+150+90,'CREAT');
View::label(425,290+150+120,'ACURI'); View::chekbox(480,290+150+120,'ACURIQUE');
View::label(425,290+150+150,'ECBU'); View::chekbox(480,290+150+150,'ECBU');
View::label(625,290+150+60,'T3');     View::chekbox(680,290+150+60,'T3');
// View::label(625,290+150+90,'T4');     View::chekbox(680,290+150+90,'T4');
// View::label(625,290+150+120,'TSH');   View::chekbox(680,290+150+120,'TSH');
View::label(825,290+150+60,'TGO');    View::chekbox(880,290+150+60,'TGO');
// View::label(825,290+150+90,'TGP');    View::chekbox(880,290+150+90,'TGP');
View::label(825,290+150+120,'BILIT'); View::chekbox(880,290+150+120,'BILIT');
// View::label(825,290+150+150,'BILID'); View::chekbox(880,290+150+150,'BILID');
// View::label(35,640,'HVB');            view::chekbox(80,640,'HVB'); 
// view::label(225,640,'HVC');           view::chekbox(280,640,'HVC'); 
// view::label(425,640,'HIV');           view::chekbox(480,640,'HIV'); 
// view::label(625,640,'VDRL');          view::chekbox(680,640,'TPHA'); 
// view::label(825,640,'ASLO');          view::chekbox(880,640,'ASLO');
// view::label(1025,640,'VS2H');         view::chekbox(1025+50,640,'VS2H');
// view::label(1200,640,'VS1H');         view::chekbox(1200+50,640,'VS1H');
// view::label(1025,590,'FERS');         view::chekbox(1025+50,590,'FERS');
// view::label(1200,590,'FERE');         view::chekbox(1200+50,590,'FERE');
view::submit(1090,$x+230+50,'Imprimer Demande Bilan');
view::f1();
view:: sautligne (28);
?>

















