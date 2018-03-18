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
view::button('don',$this->user[0]['id']);
function dateFR2US($date)//01/01/2013
{
$J      = substr($date,0,2);
$M      = substr($date,3,2);
$A      = substr($date,6,4);
$dateFR2US =  $A."-".$M."-".$J ;
return $dateFR2US;//2013-01-01
}
$diff    = abs(time() - strtotime(dateFR2US(trim($this->user[0]['DATENAISSANCE'])))); 
$years   = floor($diff / (365*60*60*24));        
$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
//View::h('2',25,290,'Donor : Donate [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
View::fieldset("btn","--");
?>
<h2>
<?php echo 'Donor : Donate [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]"     ; ?> </h2>
<?php photosurl(900,200,URL.'public/webcam/dnr/'.$this->user[0]['id'].'.jpg');?>
<?php
//View::sautligne(2);

View::hr();
$x=1080;$y=214;$z=140;
echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
echo '<button id="button">show</button>';
echo "</div>";
View::f0(URL.'dnr/DONATEOK/','post');

View::label($x+95,360-$z,'LIEUX');  View::combov($x+100+55,350-$z,'LIEUX',array("FIXE","MOBILE")); 
View::label($x+95,390-$z,'DATE');   View::date($x+100+55,380-$z,'DATEDON',0,date ('Y-m-d'));            View::label($x+190+55,390-$z,'HEURE');View::date($x+230+55,380-$z,'HEUREDON',0,date ("H:i"));
View::label($x+95,420-$z,'DNR');
if (donpardnr($this->user[0]['id'])>=2)
{
View::combov($x+100+55,410-$z,'TYPEDONNEUR',array("REGULIER","OCCASIONNEL"));
}
else
{
View::combov($x+100+55,410-$z,'TYPEDONNEUR',array("OCCASIONNEL","REGULIER"));
} 
View::label($x+95,450-$z,'TEMP');   View::date($x+100+55,440-$z,'TEMP',0,'37');                          View::label($x+190+55,450-$z,'PULSE');   View::date($x+230+55,440-$z,'PULSE',0,'70');
View::label($x+95,480-$z,'TAS');    View::date($x+100+55,470-$z,'TA',0,'120');                           View::label($x+190+55,480-$z,'TAD');     View::date($x+230+55,470-$z,'TA1',0,'80');
View::label($x+95,510-$z,'POIDS');  View::date($x+100+55,500-$z,'POIDS',0,'75');                         View::label($x+190+55,510-$z,'Taille');  View::date($x+230+55,500-$z,'Taille',0,'170');
View::label($x+95,540-$z,'HB');     View::date($x+100+55,530-$z,'HEMOGLOBIN',0,'12');                    View::label($x+190+55,540-$z,'HT');      View::date($x+230+55,530-$z,'HEMATOCRIT',0,'34');
View::label($x+95,570-$z,'IND');    View::combovsex($x+100+55,560-$z,'IND',array("IND","CIDT","CIDD"));  View::label($x+190+55,570-$z,'IDP');     View::date($x+230+55,560-$z,'IDP',0,View::idp());
View::label($x+95,600-$z,'POCHE');  View::combov($x+100+55,590-$z,'TYPEPOCHE',array("DOUBLE","TRIPLE"));  
View::label($x+95,630-$z,'DON');    View::combov($x+100+55,620-$z,'TYPEDON',array("NORMAL","APHERESE"));   
echo "<table  width='60%' border='1' cellpadding='5' cellspacing='1' align='left'>";
echo "<tr class=\"header\">";
echo " <th>Questionnaire :  ".$this->user[0]['NOM']."_". strtolower($this->user[0]['PRENOM'])."</th>";
echo " <th style=\"width:30px\">Yes</th><th style=\"width:30px\">No</th>"; 
echo "</tr>";
View::ques1 ('q1','Vous sentez vous en forme pour donner votre sang','checked','');
if (donpardnr($this->user[0]['id'])>=1)
{
View::ques1 ('q2','Avez-vous déjà donné votre sang : NBR de dons : '.donpardnr($this->user[0]['id']).' dons','checked','','');
}
else
{
View::ques1 ('q2','Avez-vous déjà donné votre sang : NBR de dons : '.donpardnr($this->user[0]['id']).' dons','','checked','');
}

if ($this->user[0]['DPD']>=date('Y-m-d')) 
{
View::ques1 ('q3','Date du dernier don : '.$this->user[0]['DDD'].' ( Date Prochain don : '.$this->user[0]['DPD'].' ) ','','checked','');
}
else
{
View::ques1 ('q3','Date du dernier don : '.$this->user[0]['DDD'].' ( Date Prochain don : '.$this->user[0]['DPD'].' ) ','checked','','');
}
View::ques1 ('q4','Etes vous a jeun','','checked','');
View::lab1  ('Avez-vous dans votre vie :');
//View::ques1 ('q5','Eté hospitalisé(e)','','checked','');
//View::ques1 ('q6','Eté transfusé(e)','','checked','');
//View::ques1 ('q7','Eu une maladie cardiaque (trouble du rythme cardiaque,valvulopaties, angor, IDM ….) / HTA','','checked','');
//View::ques1 ('q8','Eu une affection allergique grave et/ou de l’asthme','','checked','');
//View::ques1 ('q9','Eu le diabète','','checked','');
//View::ques1 ('q10','Eu un ulcère gastro-duodénale','','checked','');
//View::ques1 ('q11','Eu une maladie dermatologique (acné « roaccutane »,psoriasis « soriatane »)','','checked','');
//View::ques1 ('q12','Eté traité(e) par hormone de croissance','','checked','');
//View::ques1 ('q13','Voyager en Afrique, en Asie, en Amérique Latin','','checked','');
//View::ques1 ('q14','Eu des relations sexuelles extra-conjugales non protégées','','checked','');
//View::ques1 ('q15','Pris des drogues par voie injectable ou nasale','','checked','');
?>
<tr class="h" >
<td>Eté hospitalisé(e)</td>
<td style="text-align:center;"><input type="radio" name="q5" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q5" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Eté transfusé(e)</td>
<td style="text-align:center;"><input type="radio" name="q6" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q6" value="0" checked /></td>
</tr>

<tr class="h" >
<td>Eu une maladie cardiaque (trouble du rythme cardiaque,valvulopaties, angor, IDM ….) / HTA</td>
<td style="text-align:center;"><input type="radio" name="q7" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q7" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Eu une affection allergique grave et/ou de l’asthme</td>
<td style="text-align:center;"><input type="radio" name="q8" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q8" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Eu le diabète</td>
<td style="text-align:center;"><input type="radio" name="q9" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q9" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Eu un ulcère gastro-duodénale</td>
<td style="text-align:center;"><input type="radio" name="q10" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q10" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Eu une maladie dermatologique (acné « roaccutane »,psoriasis « soriatane »)</td>
<td style="text-align:center;"><input type="radio" name="q11" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q11" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Eté traité(e) par hormone de croissance</td>
<td style="text-align:center;"><input type="radio" name="q12" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q12" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Voyager en Afrique, en Asie, en Amérique Latin</td>
<td style="text-align:center;"><input type="radio" name="q13" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q13" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Eu des relations sexuelles extra-conjugales non protégées</td>
<td style="text-align:center;"><input type="radio" name="q14" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q14" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Pris des drogues par voie injectable ou nasale</td>
<td style="text-align:center;"><input type="radio" name="q15" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q15" value="0" checked /></td>
</tr>
<?php
View::lab1  ('Dans les 4 derniers mois, avez-vous :');
?>
<tr class="h" >
<td>Eté opéré(e) au cours d’une hospitalisation et/ou subiune anesthésie générale ou locorégionale</td>
<td style="text-align:center;"><input type="radio" name="q16" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q16" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Eté vacciné(e)</td>
<td style="text-align:center;"><input type="radio" name="q17" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q17" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Subi une endoscopie</td>
<td style="text-align:center;"><input type="radio" name="q18" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q18" value="0" checked /></td>
</tr>

<tr class="h" >
<td>Subi un tatouage ou un piercing</td>
<td style="text-align:center;"><input type="radio" name="q19" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q19" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Eu une infection urinaire</td>
<td style="text-align:center;"><input type="radio" name="q20" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q20" value="0" checked /></td>
</tr>
<?php
// View::ques1 ('q16','Eté opéré(e) au cours d’une hospitalisation et/ou subiune anesthésie générale ou locorégionale','','checked','');	
// View::ques1 ('q17','Eté vacciné(e)','','checked','','','');
// View::ques1 ('q18','Subi une endoscopie','','checked','','','');
// View::ques1 ('q19','Subi un tatouage ou un piercing','','checked','','','');
// View::ques1 ('q20','Eu une infection urinaire','','checked','','','');
View::lab1  ('Pour la femme :');
?>
<tr class="h" >
<td>Etes vous enceinte</td>
<td style="text-align:center;"><input type="radio" name="q21" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q21" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Avez-vous accouché ou fait une fausse couche</td>
<td style="text-align:center;"><input type="radio" name="q22" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q22" value="0" checked /></td>
</tr>
<?php
//View::ques1 ('q21','Etes vous enceinte','','checked','','','');
//View::ques1 ('q22','Avez-vous accouché ou fait une fausse couche','','checked','','','');
View::lab1  ('Depuis une semaine, avez-vous :','','','');
?>
<tr class="h" >
<td>Pris des médicaments ATB, CTC, Aspirine</td>
<td style="text-align:center;"><input type="radio" name="q23" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q23" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Subi des soins dentaires ?.</td>
<td style="text-align:center;"><input type="radio" name="q24" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q24" value="0" checked /></td>
</tr>
<tr class="h" >
<td>Eu de la fièvre</td>
<td style="text-align:center;"><input type="radio" name="q25" value="1"  /></td>
<td style="text-align:center;"><input type="radio" name="q25" value="0" checked /></td>
</tr>
<?php
//View::ques1 ('q23','Pris des médicaments ATB, CTC, Aspirine','','checked','','','');
//View::ques1 ('q24','Subi des soins dentaires ?.','','checked','','','');
//View::ques1 ('q25','Eu de la fièvre','','checked','','','');
echo "</table>";
View::hide(215,670,'id',0,$this->user[0]['id']);
View::hide(215,670,'NOM',0,$this->user[0]['NOM']);
View::hide(215,670,'PRENOM',0,$this->user[0]['PRENOM']);
View::hide(215,670,'SEXEDNR',0,$this->user[0]['SEX']);
View::hide(215,670,'BIRTHDAY',0,$this->user[0]['DATENAISSANCE']);
View::hide(215,670,'AGEDNR',0,$years);
View::hide(215,670,'GRABO',0,$this->user[0]['GRABO']);
View::hide(215,670,'GRRH',0,$this->user[0]['GRRH']);
View::hide(215,670,'CRH2',0,$this->user[0]['CRH2']);
View::hide(215,670,'ERH3',0,$this->user[0]['ERH3']);
View::hide(215,670,'CRH4',0,$this->user[0]['CRH4']);
View::hide(215,670,'ERH5',0,$this->user[0]['ERH5']);
View::hide(215,670,'KELL1',0,$this->user[0]['KELL1']);
View::hide(215,670,'KELL2',0,$this->user[0]['KELL2']);
View::hide(215,670,'REGION',0,$_SESSION['REGION']);
View::hide(215,670,'WILAYA',0,$_SESSION['WILAYA']);
View::hide(215,670,'STRUCTURE',0,$_SESSION['STRUCTURE']);
View::hide(215,670,'login',0,$_SESSION['login']);
View::hide(215,670,'COMMUNER',0,$this->user[0]['COMMUNER']);
View::submit($x+100+55,650-$z,'Enregistrer Don');									
View::f1();	
View::sautligne(40);
?>







