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
view::munu('hemos');
view::h(2,50,220,'Ajout Séance D\'Hémodialyse');
view::f0(URL.'hemod/Seanceok/','post');
view::photosurl(1070,220,URL.'public/webcam/hemo/hemodialyse.jpg');	
$x=250;
view::label(50,$x+30,'Date :');                        view::date(120,$x+20,'DATE',20,date("Y-m-d"));
view::label(250,$x+30,'Heure :');                      view::date(380,$x+20,'HEUR',20,date("H:i"));
view::label(650,$x+30,'Nom Prénom:');                  view::NOMPRENOMHEMO(770,240+30,"id");    view::urlbutton(990,240+36,URL.'hemod/newhemod/','+',2);   
view::label(50,$x+90,'Heure Debut De Dialyse :');      view::txt(250,$x+80,'HEUREDD',1,date("H:i"));  
view::label(50,$x+120,'Poids :');                      view::date(100,$x+110,'POIDSD',5,"0");          
view::label(50+160,$x+120,'SYS :');                    view::date(250,$x+110,'SYSD',5,"0");            
view::label(345,$x+120,'DIA:');                        view::date(380,$x+110,'DIAD',5,"0");            
view::label(50,$x+150,' Heure Fin De Dialyse :');      view::txt(250,$x+140,'HEUREFD',1,date("H:i")); 
view::label(50,$x+180,'Poids :');                      view::date(100,$x+170,'POIDSF',5,"0");          
view::label(50+160,$x+180,'SYS :');                    view::date(250,$x+170,'SYSF',5,"0");            
view::label(345,$x+180,'DIA:');                        view::date(380,$x+170,'DIAF',5,"0");   
view::label(650,$x+90,'Type De Dialyse :');   view::combov(770,$x+80,'TYPEDIA',array("PROGRAMME","URGENCE")); 
view::label(650,$x+120,'Appareil Utilise:');  view::combov(770,$x+110,'NAPP',array("1","2")); 
view::label(650,$x+150,'Acces Sang :');       view::combov(770,$x+140,'ACCSANG',array("FAV","CCJ","CCF","PER"));  
view::label(650,$x+180,'Infirmier :');        view::txt(770,$x+170,'IDE',18,"x"); 
view::label(650,$x+210,'Medecin :');          view::txt(770,$x+200,'MEDECIN',18,"x");  
view::submit(770,$x+230,'Ajout Séance D\'Hémodialyse');
view::f1();
view:: sautligne (16);
?>







