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
lang(Session::get('lang'));
ob_start();
view::munu('hemob');
view::h(2,50,220,'Ajout Bilan D\'Hémodialyse');
view::f0(URL.'hemod/Bilanok/','post');
view::photosurl(1070,220,URL.'public/webcam/hemo/hemodialyse.jpg');	
$x=250;
view::label(50,$x+30,'Date :');                        view::date(120,$x+20,'DATE',20,date("Y-m-d"));
view::label(250,$x+30,'Heure :');                      view::date(380,$x+20,'HEUR',20,date("H:i"));
view::label(650,$x+30,'Nom Prénom:');                  view::NOMPRENOMHEMO(770,240+30,"id");       
view::label(50,$x+60,'HVB');                 view::combov(120,$x+50,'HVB',array("negatif","douteux","Positif")); 
view::label(50,$x+90,'HVC');                 view::combov(120,$x+80,'HVC',array("negatif","douteux","Positif")); 
view::label(650,$x+60,'HIV');                view::combov(770,$x+50,'HIV',array("negatif","douteux","Positif")); 
view::label(650,$x+90,'VDRL');               view::combov(770,$x+80,'TPHA',array("negatif","douteux","Positif")); 
view::label(50,$x+136,'GB');                 view::date(120,$x+125,'GB',5,'0');
view::label(250,$x+136,'GR');                view::date(320,$x+125,'GR',5,'0');
view::label(450,$x+136,'HB');                view::date(520,$x+125,'HB',5,'0');
view::label(650,$x+136,'HT');                view::date(720,$x+125,'HT',5,'0');
view::label(850,$x+136,'PLQT');              view::date(900,$x+125,'PLQT',5,'0');
view::label(50,$x+136+30,'TP');              view::date(120,$x+125+30,'TP',5,'0');
view::label(250,$x+136+30,'INR');            view::date(320,$x+125+30,'INR',5,'0');
view::label(450,$x+136+30,'VS1H');           view::date(520,$x+125+30,'VS1H',5,'0');
view::label(650,$x+136+30,'VS2H');           view::date(720,$x+125+30,'VS2H',5,'0');
view::label(50,$x+136+60,'GLYCE');             view::date(120,$x+125+60,'GLYCE',5,'0');
view::label(250,$x+136+60,'UREE');             view::date(320,$x+125+60,'UREE',5,'0');
view::label(450,$x+136+60,'CRAET');            view::date(520,$x+125+60,'CREAT',5,'0');
view::label(650,$x+136+60,'AC URIQ');          view::date(720,$x+125+60,'ACURIQUE',5,'0');
view::label(50,$x+136+90,'BILI T');            view::date(120,$x+125+90,'BILIT',5,'0');
view::label(250,$x+136+90,'BILI D');           view::date(320,$x+125+90,'BILID',5,'0');
view::label(450,$x+136+90,'TGO');              view::date(520,$x+125+90,'TGO',5,'0');
view::label(650,$x+136+90,'TGP');              view::date(720,$x+125+90,'TGP',5,'0');
view::label(50,$x+136+120,'ASLO');            view::date(120,$x+125+120,'ASLO',5,'0');
view::label(250,$x+136+120,'CRP');            view::date(320,$x+125+120,'CRP',5,'0');
view::label(450,$x+136+120,'TRIGLI');         view::date(520,$x+125+120,'TG',5,'0');
view::label(650,$x+136+120,'CHOLES');         view::date(720,$x+125+120,'CHOLES',5,'0');
view::label(50,$x+136+150,'NA+');            view::date(120,$x+125+150,'NA',5,'0');
view::label(250,$x+136+150,'K+');            view::date(320,$x+125+150,'K',5,'0');
view::label(450,$x+136+150,'PHOS');          view::date(520,$x+125+150,'PHOS',5,'0');
view::label(650,$x+136+150,'CL');            view::date(720,$x+125+150,'CL',5,'0');
view::label(850,$x+136+150,'CA++');         view::date(900,$x+125+150,'CA',5,'0');
view::submit(770,$x+230+80,'Ajout Séance D\'Hémodialyse');
view::f1();
view:: sautligne (18);
?>







