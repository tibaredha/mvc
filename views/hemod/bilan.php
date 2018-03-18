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
view::button('hemod','');
lang(Session::get('lang'));
View::fieldset("fns","FNS");
View::fieldset("lip","Bilan Lipdique");
View::fieldset("ren","Bilan Renal");
View::fieldset("thy","Bilan Thyroidien");
View::fieldset("hep","Bilan Hepatique");
View::fieldset("iono","Ionograme");
View::fieldset("inf","Autres");
View::fieldset("sero","Serologie");
View::fieldset("infla","Inflamatoire");
ob_start();
view::munu('hemob');
view::h(2,50,220,'Ajout Bilan D\'Hémodialyse');
echo "<form action=\"".URL.'hemod/Bilanok/'."\" method=\"post\" name=\"form2\" id=\"form2\">";

view::photosurl(1070,220,URL.'public/webcam/hemo/hemodialyse.jpg');	
$x=250;
view::label(350,$x-10,'Date :');      view::date(400,$x-20,'DATE',20,date("Y-m-d"));view::date(490,$x-20,'HEUR',20,date("H:i"));view::label(650,$x-10,'Nom Prénom:');view::NOMPRENOMHEMO(760,230,"id");       
View::label(35,290,'GB');             View::date(80,280,'GB',0,'0');
View::label(35,290+30,'PNN');         View::date(80,280+30,'PNN',0,'0');
View::label(35,290+60,'PNE');         View::date(80,280+60,'PNE',0,'0');
View::label(35,290+90,'PNB');         View::date(80,280+90,'PNB',0,'0');
View::label(35,290+120,'LYM');        View::date(80,280+120,'LYM',0,'0');
View::label(35,290+150,'MON');        View::date(80,280+150,'MON',0,'0');
View::label(225,290,'GR');            View::txtjs1(280,280,'GR',29,'00','bilan()'); 
View::label(225,290+30,'HT');         View::txtjs1(280,280+30,'HT',29,'00','bilan()');
View::label(225,290+60,'HB');         View::txtjs1(280,280+60,'HB',29,'00','bilan()');
View::label(225,290+90,'VGM');        View::txtjs1(280,280+90,'VGM',29,'00','bilan()'); 
View::label(225,290+120,'CCMH');      View::txtjs1(280,280+120,'CCMH',29,'00','bilan()');  
View::label(225,290+150,'TGMH');      View::txtjs1(280,280+150,'TCMH',29,'00','bilan()'); 
View::label(425,290,'PLQT');          View::date(480,280,'PLQT',0,'0');
View::label(425,290+30,'VMP');        View::date(480,280+30,'VMP',0,'0');
View::label(425,290+60,'IDP');        View::date(480,280+60,'IDP',0,'0');
View::label(425,290+90,'PCT');        View::date(480,280+90,'PCT',0,'0');
View::label(425,290+120,'TP');        View::date(480,280+120,'TP',0,'0');
View::label(425,290+150,'INR');       View::date(480,280+150,'INR',0,'0');
View::label(625,290,'NA+');           View::date(680,280,'NA',0,'0');
View::label(625,290+30,'K+');         View::date(680,280+30,'K',0,'0');
View::label(625,290+60,'PHO');        View::date(680,280+60,'PHO',0,'0');
View::label(625,290+90,'CL-');        View::date(680,280+90,'CL',0,'0');
View::label(625,290+120,'CA++');      View::date(680,280+120,'CA',0,'0');
View::label(625,290+150,'PHOS');      View::date(680,280+150,'PHOS',0,'0');
View::label(825,290,'CRP');           View::date(880,280,'CRP',0,'0');
View::label(825,290+30,'VS1');        View::date(880,280+30,'VS1',0,'0');
View::label(825,290+60,'VS2');        View::date(880,280+60,'VS2',0,'0');
View::label(825,290+90,'FIB');        View::date(880,280+90,'FIB',0,'0');
View::label(825,290+120,'GLYCE');     View::date(880,280+120,'GLYCE',0,'0');
View::label(825,290+150,'HBGLY');     View::date(880,280+150,'HBGLY',0,'0');
View::label(35,290+150+60,'TG');      View::txtjs1(80,280+150+60,'TG',29,'00','cholesterol()');
View::label(35,290+150+90,'CT');      View::txtjs1(80,280+150+90,'CHOLES',29,'00','cholesterol()');
View::label(35,290+150+120,'HDL');    View::txtjs1(80,280+150+120,'HDL',29,'00','cholesterol()');
View::label(35,290+150+150,'LDL');    View::txtjs1(80,280+150+150,'LDL',29,'00','cholesterol()');
View::label(225,290+150+60,'CT/HDL'); View::txtjs1(280,280+150+60,'CTHDL',29,'00','cholesterol()');
View::label(225,290+150+90,'LDL/HDL');View::txtjs1(280,280+150+90,'LDLHDL',29,'00','cholesterol()');
View::label(225,290+150+120,'ASPECT');View::combovc(280,280+150+120,'ASPECT',array("clair"=>0,"opalescent"=>1)); 
View::label(425,290+150+60,'UREE');   View::date(480,280+150+60,'UREE',0,'0');
View::label(425,290+150+90,'CREAT');  View::date(480,280+150+90,'CREAT',0,'0');
View::label(425,290+150+120,'ACURI'); View::date(480,280+150+120,'ACURIQUE',0,'0');
View::label(425,290+150+150,'Poids'); View::date(480,280+150+150,'Poids',0,'0');
View::label(625,290+150+60,'T3');     View::date(680,280+150+60,'T3',0,'0');
View::label(625,290+150+90,'T4');     View::date(680,280+150+90,'T4',0,'0');
View::label(625,290+150+120,'TSH');   View::date(680,280+150+120,'TSH',0,'0');
View::label(825,290+150+60,'TGO');    View::date(880,280+150+60,'TGO',0,'0');
View::label(825,290+150+90,'TGP');    View::date(880,280+150+90,'TGP',0,'0');
View::label(825,290+150+120,'BILIT'); View::date(880,280+150+120,'BILIT',0,'0');
View::label(825,290+150+150,'BILID'); View::date(880,280+150+150,'BILID',0,'0');
View::label(35,640,'HVB');            view::combovsex(80,630,'HVB',array("negatif","douteux","Positif")); 
view::label(225,640,'HVC');           view::combovsex(280,630,'HVC',array("negatif","douteux","Positif")); 
view::label(425,640,'HIV');           view::combovsex(480,630,'HIV',array("negatif","douteux","Positif")); 
view::label(625,640,'VDRL');          view::combovsex(680,630,'TPHA',array("negatif","douteux","Positif")); 
view::label(825,640,'ASLO');          view::date(880,630,'ASLO',5,'0');
view::label(1025,640,'VS2H');         view::date(1025+50,630,'VS2H',5,'0');
view::label(1200,640,'VS1H');         view::date(1200+50,630,'VS1H',5,'0');
view::label(1025,590,'FERS');         view::date(1025+50,580,'FERS',5,'0');
view::label(1200,590,'FERE');         view::date(1200+50,580,'FERE',5,'0');
view::submit(1090,$x+230+50,'Ajout Bilan D\'Hémodialyse');
view::f1();
view:: sautligne (28);
?>



<div id="soustitre1"  align="center"  >Clairance De La Créatinine Mesurée Et Corrigée *** </div></br>
<div id="soustitre">
<form name="formClairance" id="formClairance">
    <table border="0" cellpadding="5" cellspacing="0" align="center">
      <tbody><tr>
        <td>&nbsp;</td>
        <td colspan="2" class="table_titre"><em>clairance de la créatinine mesurée et corrigée</em></td>
        <td></td>
        <td>&nbsp;</td>
        <td></td>
        <td>&nbsp;</td>
        </tr>
      
      <tr bgcolor="#E5F0F0">
        <td>&nbsp;</td>
        <td><div align="right">Durée :</div></td>
        <td><div align="center">
          <input name="heures" value="24" size="5" maxlength="5" type="text">
        </div></td>
        <td>heures</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr bgcolor="#E5F0F0">
        <td>&nbsp;</td>
        <td><div align="right">Volume <strong>V</strong> :</div></td>
        <td><div align="center">
          <input name="volume" value="1000" size="5" maxlength="5" onfocus="if (this.value=='1000') {this.value=''}" type="text">
        </div></td>
        <td>ml</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr bgcolor="#E5F0F0">
        <td>&nbsp;</td>
        <td> <div align="right">Créatinine <strong>U</strong> :</div></td>
        <td><div align="center">
          <input name="Ucreat" value="10" size="5" maxlength="5" onfocus="if (this.value=='10') {this.value=''}" type="text">
        </div></td>
        <td>mmol/l</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr bgcolor="#E5F0F0">
        <td>&nbsp;</td>
        <td><div align="right">Créatinine <strong>P</strong> :</div></td>
        <td><div align="center">
          <input name="Pcreat" value="100" size="5" maxlength="5" onfocus="if (this.value=='100') {this.value=''}" type="text">
        </div></td>
        <td>µmol/l</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      
      <tr bgcolor="#D5E0E3">
        <td>&nbsp;</td>
        <td><div align="right">Clairance mesurée :</div></td>
        <td><div align="center">
          <input value="69.4" name="resClairance" class="champ" size="5" maxlength="5" type="text">
        </div></td>
        <td><div align="left">ml/min</div></td>
        <td>&nbsp;</td>
        <td></td>
        <td>&nbsp;</td>
        </tr>
      
      <tr bgcolor="#E5F0F0">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center">
          <input name="Calculate3" value="Calculer" onclick="calculClairance(
          document.formClairance.heures.value,
          document.formClairance.volume.value,
          document.formClairance.Ucreat.value,
          document.formClairance.Pcreat.value,
          document.formClairance.taille.value,
          document.formClairance.poids.value          
          )" type="button">
        </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr bgcolor="#E5F0F0">
        <td>&nbsp;</td>
        <td><div align="right">Taille :</div></td>
        <td><div align="center">
          <input name="taille" id="taille" size="5" maxlength="5" type="text" value='170'     >
        </div></td>
        <td>cm</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr bgcolor="#E5F0F0">
        <td>&nbsp;</td>
        <td><div align="right">Poids :</div></td>
        <td><div align="center">
          <input name="poids" id="poids" size="5" maxlength="5" type="text" value='80'  >
        </div></td>
        <td>kg</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr bgcolor="#D5E0E3">
        <td>&nbsp;</td>
        <td><div align="right">Surface corporelle :</div></td>
        <td><div align="center">
          <input value="NaN" name="resSurface" id="resSurface" size="5" maxlength="5" type="text">
        </div></td>
        <td>m<sup>2</sup></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      
      <tr bgcolor="#D5E0E3">
        <td>&nbsp;</td>
        <td><div align="right">Clairance corrigée :</div></td>
        <td><div align="center">
          <input value="NaN" name="resCorrigee" class="champ" id="resCorrigee" size="5" maxlength="5" type="text">
        </div></td>
        <td bgcolor="#D5E0E3">ml/min/1,73 m<sup>2</sup></td>
        <td>&nbsp;</td>
        <td></td>
        <td>&nbsp;</td>
        </tr>
      
      
      <tr bgcolor="#E5F0F0">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center">
          <input name="Calculate2" value="Calculer" onclick="calculClairance(
          document.formClairance.heures.value,
          document.formClairance.volume.value,
          document.formClairance.Ucreat.value,
          document.formClairance.Pcreat.value,
          document.formClairance.taille.value,
          document.formClairance.poids.value          
          )" type="button">
        </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr bgcolor="#E5F0F0">
        <td>&nbsp;</td>
        <td><div align="right">Créatininurie 24h :</div></td>
        <td><div align="center">H</div></td>
        <td>F</td>
        <td>&nbsp;</td>
        <td><a href="#the"></a></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr bgcolor="#D5E0E3">
        <td>&nbsp;</td>
        <td><div align="right">attendue :</div></td>
        <td><div align="center">
          <input value="NaN" name="resTheorH" id="resTheorH" size="5" maxlength="5" type="text">
        </div></td>
        <td><input value="NaN" name="resTheorF" id="resTheorF" size="5" maxlength="5" type="text"></td>
        <td>&nbsp;</td>
        <td></td>
        <td>&nbsp;</td>
      </tr>
      
      
      <tr bgcolor="#D5E0E3">
        <td>&nbsp;</td>
        <td><div align="right">mesurée <strong>U</strong>x<strong>V</strong> : </div></td>
        <td><div align="center">
          <input value="10" name="resUV" class="champ" id="resUV" size="5" maxlength="5" type="text">
        </div></td>
        <td>mmol/24h</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr bgcolor="#E5F0F0">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center">
          <input name="resetButton" value="Réinitialiser" type="reset">
        </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td colspan="5"><div class="Style2" align="left">
          pour les décimales, utilisez des points au lieu de virgules </div>        </td>
        <td>&nbsp;</td>
      </tr>
    </tbody></table>
    <div align="center"></div>
  </form>

</div>

















