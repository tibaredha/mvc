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
view::button('hemow',$this->user[0]['id']);
lang(Session::get('lang'));
ob_start();
view::munu('hemod');


view::h(2,50,220,'Ajout Mode Sorti ');
view::f0(URL.'hemod/Sortirok/','post');
view::photosurl(1070,220,URL.'public/webcam/hemo/hemodialyse.jpg');	

$x=250;

view::label(50,$x+30,'Date :');                        view::date(120,$x+20,'DATE',20,date("Y-m-d"));
view::label(250,$x+30,'Heure :');                      view::date(380,$x+20,'HEUR',20,date("H:i"));
view::label(650,$x+30,'Nom Prénom : ');                view::label(780,$x+30,$this->user[0]['NOM'].'_'.$this->user[0]['PRENOM'] );        
view::label(650,$x+60,'Motif ');                       view::combov(770,240+60,'MOTIF',array($this->user[0]['SORTI'],"DECES","MUTATION")); 
View::hide(215,370,'id','0',$this->user[0]['id']);
view::submit(770,$x+90,'Ajout Mode Sorti');
view::f1();
view:: sautligne (17);
?>







