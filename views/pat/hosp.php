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
view::button('cons',$this->user[0]['id']);
// function dateFR2US($date)//01/01/2013
// {
// $J      = substr($date,0,2);
// $M      = substr($date,3,2);
// $A      = substr($date,6,4);
// $dateFR2US =  $A."-".$M."-".$J ;
// return $dateFR2US;//2013-01-01
// }
$diff    = abs(time() - strtotime(dateFR2US(trim($this->user[0]['DATENAISSANCE'])))); 
$years   = floor($diff / (365*60*60*24));        
$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
View::h('2',25,140,'Patient : Consultation [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
View::sautligne(2);
View::hr();
View::f0(URL.'pat/HOSPOK/','post');View::fieldset("btn","--");
View::label(25,360-160,'MOTIF');View::txt(100,350-160,'MOTIF',60,'MOTIF');
View::label(25,390-160,'DGC');View::txt(100,380-160,'DGC',60,'DGC');
View::label(1100,290,'DATE');View::date(1200,280,'DATEDON',0,date ('Y-m-d'));View::label(1290,290,'HEURE');View::date(1330,280,'HEUREDON',0,date ("H:i"));
if (hospparpat($this->user[0]['id'])>=2)
{
View::label(1100,320,'TYPE PAT');View::combov(1200,310,'TYPEDONNEUR',array("REGULIER","OCCASIONNEL"));
}
else
{
View::label(1100,320,'TYPE PAT');View::combov(1200,310,'TYPEDONNEUR',array("OCCASIONNEL","REGULIER"));
} 
View::label(1100,350,'TEMP');View::date(1200,340,'TEMP',0,'37');View::label(1290,350,'PULSE');View::date(1330,340,'PULSE',0,'70');
View::label(1100,380,'SYS');View::date(1200,370,'TA',0,'120');View::label(1290,380,'DIA');View::date(1330,370,'TA1',0,'80');
View::label(1100,410,'POIDS');View::date(1200,400,'POIDS',0,'75');View::label(1290,410,'Taille');View::date(1330,400,'Taille',0,'170');
View::label(1100,440,'HB');View::date(1200,430,'HEMOGLOBIN',0,'12');View::label(1290,440,'HT');View::date(1330,430,'HEMATOCRIT',0,'34');
View::label(1100,470,'HOSPITA');View::combov(1200,460,'HOSP',array("NON","OUI")); 
View::label(1100,500,'SERVICE');View::comboservice(1200,490,"SERVICE","mvc","service","SERVICE","SERVICE","ids","servicefr") ;//View::combov(1200,590,'TYPEPOCHE',array("DOUBLE","TRIPLE"));  
View::label(1100,530,'N LIT');View::NLIT(1200,520,"NLIT");//View::combov(1200,620,'TYPEDON',array("NORMAL","APHERESE"));   
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
View::submit(1200,550,'Enregistrer Consultation');									
View::f1();	
View::sautligne(5);
?>
<form name="form2">   
 <table width="1000" align="LEFT" cellpadding="2" cellspacing="0" bgcolor="#F6CECE" style="border:3px solid  red;">
   <tbody>
   <tr>
         <td class="ligne" > <span class="noir12"><b>Ouverture des   yeux</b></span></td>
         <td class="ligne" ><span class="noir12"><b>Réponse   verbale</b></span></td>  
         <td class="ligne" ><span class="noir12"><b>Meilleure  réponse motrice*</b></span></td>        
    </tr>
    <tr>
         <td class="ligne2" >
            <span class="noir12">
            <input type="radio" name="yeux" value="4" onclick="num1=4, calcul()">Spontanée (4)<br>
            <input type="radio" name="yeux" value="3" onclick="num1=3, calcul()">A la demande (3)<br>
            <input type="radio" name="yeux" value="2" onclick="num1=2, calcul()">A la douleur (2)<br>
            <input type="radio" name="yeux" value="1" onclick="num1=1, calcul()">Aucune (1)<br> 
            </span>
		</td>
        <td class="ligne2" >
            <span class="noir12">
            <input type="radio" name="repver" value="5" onclick="num2=5, calcul()">Orientée (5)<br>
            <input type="radio" name="repver" value="4" onclick="num2=4, calcul()">Confuse (4)<br>
            <input type="radio" name="repver" value="3" onclick="num2=3, calcul()">Inappropriée (3)<br>
            <input type="radio" name="repver" value="2" onclick="num2=2, calcul()">Incompréhensible (2)<br>
            <input type="radio" name="repver" value="1" onclick="num2=1, calcul()">Aucune (1)
            </span>
		</td>
         <td class="ligne2" >
            <span class="noir12">
            <input type="radio" name="repmo" value="6" onclick="num3=6, calcul()">Obéit à la demande verbale (6)<br>
            <input type="radio" name="repmo" value="5" onclick="num3=5, calcul()">Orientée à la douleur (5)<br>
            <input type="radio" name="repmo" value="4" onclick="num3=4, calcul()">Evitement non adapté (4)<br> 
            <input type="radio" name="repmo" value="3" onclick="num3=3, calcul()">Décortication (flexion à la douleur)(3)<br>
            <input type="radio" name="repmo" value="2" onclick="num3=2, calcul()">Décérébration (extension à la douleur) (2)<br> 
            <input type="radio" name="repmo" value="1" onclick="num3=1, calcul()">Aucune (1)<br> 
            </span></td>
      </tr>
      <tr>
         <td class="ligne" colspan="3"  dotted #969696;">
            <span class="noir12"><b>Total Glasgow = </b> 
            <input type="text" align="center"  name="res"  value="3" size="2">  
            </span>
			</td>
      </tr>
     
   </tbody>
   </table> 
</form>
 </br> </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  
<form name="form3"> 
<p></p><table width="1000" align="left" cellpadding="2" cellspacing="0" bgcolor="#F6CECE" style="border:3px solid  red;">
      <tbody><tr class="bleu12">
         <td class="ligne">
            <p><strong>Variables</strong></p>
         </td>
         <td class="ligne">
            <p><strong>Gravité
            </strong></p>
         </td>
         <td class="ligne">
            <p><strong>Points</strong></p>
         </td>
      </tr>
      <tr>
         <td class="ligne2">
            <p><span class="normal"><strong>Tête etcou</strong></span></p>
            
         </td>
         <td class="ligne2">
            <p><span class="normal">
              <select name="head" onchange="CalcISS(form)">
                <option value="0" selected="">
                </option><option value="1">Mineure (1)
                </option><option value="2">Modérée (2)
                </option><option value="3">Sérieuse (3)
                </option><option value="4">Sévère (4)
                </option><option value="5">Critique (5)
                </option><option value="6">Maximale (6)
              </option></select>
            </span></p>
         </td>
         <td class="ligne2">
            <p><span class="normal">
              <input type="text" name="zhead" value="0" size="4">
            </span></p>
         </td>
      </tr>
      <tr>
         <td class="ligne2">
            <p><span class="normal"><strong>Face</strong></span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;border-right:1px dotted #969696;">
            <p><span class="normal">
              <select name="face" onchange="CalcISS(form)">
                <option value="0" selected="">
                </option><option value="1">Mineure (1)
                </option><option value="2">Modérée (2)
                </option><option value="3">Sérieuse (3)
                </option><option value="4">Sévère (4)
                </option><option value="5">Critique (5)
                </option><option value="6">Maximale (6)
              </option></select>
            </span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;">
            <p><span class="normal">
              <input type="text" name="zface" value="0" size="4">
            </span></p>
         </td>
      </tr>
      <tr>
          <td class="ligne2">
            <p><span class="normal"><strong>Thorax</strong></span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;border-right:1px dotted #969696;">
            <p><span class="normal">
              <select name="chest" onchange="CalcISS(form)">
                <option value="0" selected="">
                </option><option value="1">Mineure (1)
                </option><option value="2">Modérée (2)
                </option><option value="3">Sérieuse (3)
                </option><option value="4">Sévère (4)
                </option><option value="5">Critique (5)
                </option><option value="6">Maximale (6)
              </option></select>
            </span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;">
            <p><span class="normal">
              <input type="text" name="zchest" value="0" size="4">
            </span></p>
         </td>
      </tr>
      <tr>
         <td class="ligne2">
            <p><span class="normal"><strong>Abdomen, pelvis</strong></span></p>
           
         </td>
         <td style="border-bottom:1px dotted #969696;border-right:1px dotted #969696;">
            <p><span class="normal">
              <select name="abdo" onchange="CalcISS(form)">
                <option value="0" selected="">
                </option><option value="1">Mineure (1)
                </option><option value="2">Modérée (2)
                </option><option value="3">Sérieuse (3)
                </option><option value="4">Sévère (4)
                </option><option value="5">Critique (5)
                </option><option value="6">Maximale (6)
              </option></select>
            </span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;">
            <p><span class="normal">
              <input type="text" name="zabdo" value="0" size="4">
            </span></p>
         </td>
      </tr>
      <tr>
         <td class="ligne2">
            <p><span class="normal"><strong>Membres, bassin</strong></span></p>
           
         </td>
         <td style="border-bottom:1px dotted #969696;border-right:1px dotted #969696;">
            <p><span class="normal">
              <select name="extre" onchange="CalcISS(form)">
                <option value="0" selected="">
                </option><option value="1">Mineure (1)
                </option><option value="2">Modérée (2)
                </option><option value="3">Sérieuse (3)
                </option><option value="4">Sévère (4)
                </option><option value="5">Critique (5)
                </option><option value="6">Maximale (6)
              </option></select>
            </span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;">
            <p><span class="normal">
              <input type="text" name="zextre" value="0" size="4">
            </span></p>
         </td>
      </tr>
      <tr>
         <td class="ligne2">
            <p><span class="normal"><strong>Peau, tissus sous cutané</strong></span></p>
           
         </td>
         <td style="border-bottom:1px dotted #969696;border-right:1px dotted #969696;">
            <p><span class="normal">
              <select name="exter" onchange="CalcISS(form)">
                <option value="0" selected="">
                </option><option value="1">Mineure (1)
                </option><option value="2">Modérée (2)
                </option><option value="3">Sérieuse (3)
                </option><option value="4">Sévère (4)
                </option><option value="5">Critique (5)
                </option><option value="6">Maximale (6)
              </option></select>
            </span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;">
            <p><span class="normal">
              <input type="text" name="zexter" value="0" size="4">
            </span></p>
         </td>
      </tr>
      <tr>
         <td class="ligne" colspan="3">
            <center>
              <span class="normal">&nbsp;<br>
              <strong>ISS =
              </strong>
              <input type="text" name="ziss" value="0" size="5"><br><br>
            </span>
            </center>
         </td>
      </tr>
      <tr>
        <td class="ligne2">
            <p><span class="normal"><strong>Fréquence respiratoire (par min)</strong></span></p>
            
         </td>
         <td style="border-bottom:1px dotted #969696;border-right:1px dotted #969696;">
            <p><span class="normal">
              <select name="fr" onchange="CalcFR(form)">
                <option value="0" selected="">
                </option><option value="0">0
                </option><option value="1">1 - 5
                </option><option value="2">6 - 9
                </option><option value="4">10 - 29
                </option><option value="3">&gt; = 30
              </option></select>
            </span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;">
            <p><span class="normal">
              <input type="text" name="zfr" value="0" size="4">
            </span></p>
         </td>
      </tr>
      <tr>
         <td class="ligne2">
            <p><span class="normal"><strong>Pression
            artérielle systolique (mmHg)</strong></span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;border-right:1px dotted #969696;">
            <p><span class="normal">
              <select name="pas" onchange="CalcPAS(form)">
                <option value="0" selected="">
                </option><option value="0">0
                </option><option value="1">1 - 49
                </option><option value="2">50 - 75
                </option><option value="3">76 - 89
                </option><option value="4">&gt; =  90
              </option></select>
            </span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;">
            <p><span class="normal">
              <input type="text" name="zpas" value="0" size="4">
            </span></p>
         </td>
      </tr>
      <tr>
         <td class="ligne2">
            <p><span class="normal"><strong>Score de Glasgow </span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;border-right:1px dotted #969696;">
            <p><span class="normal">
              <select name="glasgow" onchange="CalcGLASGOW(form)">
                <option value="0" selected="">
                </option><option value="0">3
                </option><option value="1">4 - 5
                </option><option value="2">6 - 8
                </option><option value="3">9 - 11
                </option><option value="4">12 - 15
              </option></select>
            </span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;">
            <p><span class="normal">
              <input type="text" name="zglasgow" value="0" size="4">
            </span></p>
         </td>
      </tr>
      <tr>
         <td class="ligne" colspan="3">
            <center>
              <span class="normal"><strong><br>
            RTS</strong> = <input type="text" name="zrts" value="0" size="5"><br><br>
           </span>
            </center>
         </td>
      </tr>
      <tr>
         <td class="ligne2">
            <p><span class="normal"><strong>Age<br>
            </strong>si
            age &lt; 15ans , le modèle "lésion
            fermée" est utilisé quelque soit le
            mécanisme.</span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;border-right:1px dotted #969696;">
            <p><span class="normal">
              <select name="age" onchange="CalcAGE(form)">
                <option value="0" selected="">
                </option><option value="-1">&lt; 15 ans
                </option><option value="0">15 à 54 ans
                </option><option value="1">&gt; =  55 ans
              </option></select>
            </span></p>
         </td>
         <td style="border-bottom:1px dotted #969696;">
            <p><span class="normal">
              <input type="text" name="zage" value="0" size="4">
            </span></p>
         </td>
      </tr>
      <tr>
          <td class="ligne">
            <p><span class="normal"><strong><br>  Mortalité prédite <br>
            </span></p>
         </td>
		 <td class="ligne">
            <p><span class="normal"><strong><br>(lésion fermée)<br>
            TRISS </strong>= <input type="text" name="ztriss" value="0" size="11">
            </span></p>
         </td>
         
          <td class="ligne">
            <p><span class="normal"><strong><br> (lésion pénétrante)<br>
            TRISS </strong>= <input type="text" name="ztrisss" value="0" size="11">
            </span></p>
         </td>
      </tr>   
   </tbody>
   </table>
</form>
 </br> </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  
 </br> </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  
  </br> </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  
   </br> </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  
    </br> </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  
	













