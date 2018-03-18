<?php 
verifsession();
buttondnr1($this->user[0]['id']);
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
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
?>
<h2>Donor: Donate</h2>
<br /><br />
<hr /><br />
<div class="tabbed_area">  
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Personal Information</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Medical Information</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Medical History</a></li> 	
        </ul>   
		<div id="content_1" class="content">  
		<h2>Personal Information</h2>
		<form name="donor-form"  method="post" action="<?php echo URL;?>dnr/DONATEOK">
		<input type="hidden" name="id"             value="<?php echo $this->user[0]['id'];?>" /><br />
		<input type="hidden" name="Previous_date"  value="<?php echo $this->user[0]['DDD'];?>"/><br />
	    <input type="hidden" name="NOM"            value="<?php echo $this->user[0]['NOM'];?>"/><br />
		<input type="hidden" name="PRENOM"         value="<?php echo $this->user[0]['PRENOM'];?>"/><br />		
	    <input type="hidden" name="BIRTHDAY"       value="<?php echo $this->user[0]['DATENAISSANCE'];?>"/><br />
		<input type="hidden" name="AGEDNR"         value="<?php echo $years;?>"/><br />
		<input type="hidden" name="GRABO"          value="<?php echo $this->user[0]['GRABO']; ?>"/><br/>
		<input type="hidden" name="GRRH"           value="<?php echo $this->user[0]['GRRH']; ?>"/><br/>
		<input type="hidden" name="CRH2"           value="<?php echo $this->user[0]['CRH2']; ?>"/><br />
		<input type="hidden" name="ERH3"           value="<?php echo $this->user[0]['ERH3']; ?>"/><br />
		<input type="hidden" name="CRH4"           value="<?php echo $this->user[0]['CRH4']; ?>"/><br />
		<input type="hidden" name="ERH5"           value="<?php echo $this->user[0]['ERH5']; ?>"/><br />
		<input type="hidden" name="KELL1"          value="<?php echo $this->user[0]['KELL1']; ?>"/><br />
		<input type="hidden" name="KELL2"          value="<?php echo $this->user[0]['KELL2']; ?>"/><br />
		<input type="hidden" name="SEXEDNR"      value="<?php echo $this->user[0]['SEX']; ?>" />
		<input type="hidden" name="REGION"       value="<?php echo $_SESSION['REGION'];?>" />
	    <input type="hidden" name="WILAYA"       value="<?php echo $_SESSION['WILAYA'];?>" />
	    <input type="hidden" name="STRUCTURE"    value="<?php echo $_SESSION['STRUCTURE'];?>" />
	    <input type="hidden" name="STRUCTURE"    value="<?php echo $_SESSION['STRUCTURE'];?>" />
	    <input type="hidden" name="login"        value="<?php echo $_SESSION['login'];?>" />
		<p>
		<?php 
		$fichier = photosmf($this->user[0]['id'].'.jpg',$this->user[0]['SEX']) ;
		photosurl(700,420,URL.'public/webcam/'.$fichier);?>
		</p><br /><br /><br /><br />
		<p><?php  //photos(640,420,'5.JPG');?><p>
		<p><?php  //photos(1050,390,'');?><p>
        </div> 
        <div id="content_2" class="content"> 
        </div> 
		<div id="content_3" class="content">  
		<h2>Medical History</h2>
		<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
        <tr class="header">
            <th>Questions <?php echo $this->user[0]['NOM']."_". strtolower($this->user[0]['PRENOM']); ?> </th>
            <th >Yes</th><th ">No</th> <th >parametre</th> <th >valeur</th> 
        </tr>
        <?php
		function lab1 ($ques) 
		{  
		echo'<tr bgcolor="yellow"   > <td colspan=5 >'.$ques.'</td></tr>';
		}
		function ques1 ($nom,$ques,$yes,$no,$label,$input,$value) 
		{  
		echo'<tr>'; 
		echo'<td>'.$ques.'</td>';
		echo'<td style="text-align:center;"><input type="radio" name="'.$nom.'" value="1" '.$yes.' /></td>';
		echo'<td style="text-align:center;"><input type="radio" name="'.$nom.'" value="0" '.$no.' /></td>';
		echo'<td style="text-align:left;"><label>'.$label.'</label></td>';
		echo'<td style="text-align:left;"><input type="txt" name="'.$input.'" value="'.$value.'"  /></td>';
		echo'</tr>';
		}
        function ques2 ($nom,$ques,$yes,$no,$label,$input,$value) 
		{  
		echo'<tr>'; 
		echo'<td>'.$ques.'</td>';
		echo'<td style="text-align:center;"><input type="radio" name="'.$nom.'" value="1" '.$yes.' /></td>';
		echo'<td style="text-align:center;"><input type="radio" name="'.$nom.'" value="0" '.$no.' /></td>';
		echo'<td style="text-align:left;"><label>'.$label.'</label></td>';
		echo'<td >';
		combov('','',$input,$value); 
		echo'</td>';
		echo'</tr>';
		}
		ques1 ('q1','Vous sentez vous en forme pour donner votre sang','checked','','Date of Donation','DATEDON',date ('Y-m-d'));
		ques1 ('q2','Avez-vous déjà donné votre sang','','checked','heure of Donation','DATEDON',date ("H:i"));
		ques1 ('q3','Date du dernier don : '.$this->user[0]['DDD'].' ( Date Prochain don : '.$this->user[0]['DPD'].' ) ','','checked','ID Poche automatique','IDP',idp());
		ques2 ('q4','Etes vous a jeun','','checked','Indication','IND',array("IND","CIDT","CIDD"));
		lab1 ('Avez-vous dans votre vie :');
		ques1 ('q5','Eté hospitalisé(e)','','checked','Temp','TEMP','37');
		ques1 ('q6','Eté transfusé(e)','','checked','Pulse','PULSE','80');
		ques1 ('q7','Eu une maladie cardiaque (trouble du rythme cardiaque,valvulopaties, angor, IDM ….) / HTA','','checked','Blood Pressure','TA','120');
		ques1 ('q8','Eu une affection allergique grave et/ou de l’asthme','','checked','Blood Pressure','TA1','80');
		ques1 ('q9','Eu le diabète','','checked','Weight','POIDS','70');
		ques1 ('q10','Eu un ulcère gastro-duodénale','','checked','height','Taille','170');
		ques1 ('q11','Eu une maladie dermatologique (acné « roaccutane »,psoriasis « soriatane »)','','checked','Hemoglobin','HEMOGLOBIN','12');
		ques1 ('q12','Eté traité(e) par hormone de croissance','','checked','Hematocrit','HEMATOCRIT','35');
		ques2 ('q13','Voyager en Afrique, en Asie, en Amérique Latin','','checked','Type Poche','TYPEPOCHE',array("DOUBLE","TRIPLE"));
		ques2 ('q14','Eu des relations sexuelles extra-conjugales non protégées','','checked','Type Donneur','TYPEDONNEUR',array("OCCASIONNEL","REGULIER"));
		ques2 ('q15','Pris des drogues par voie injectable ou nasale','','checked','lieux','LIEUX',array("FIXE","MOBILE"));
		lab1 ('Dans les 4 derniers mois, avez-vous :');
		ques2 ('q16','Eté opéré(e) au cours d’une hospitalisation et/ou subiune anesthésie générale ou locorégionale','','checked','Type don','TYPEDON',array("NORMAL","APHERESE"));	
		ques1 ('q17','Eté vacciné(e)','','checked','','','');
		ques1 ('q18','Subi une endoscopie','','checked','','','');
		ques1 ('q19','Subi un tatouage ou un piercing','','checked','','','');
		ques1 ('q20','Eu une infection urinaire','','checked','','','');
		lab1 ('Pour la femme :');
		ques1 ('q21','Etes vous enceinte','','checked','','','');
		ques1 ('q22','Avez-vous accouché ou fait une fausse couche','','checked','','','');
		lab1 ('Depuis une semaine, avez-vous :','','','');
		ques1 ('q23','Pris des médicaments ATB, CTC, Aspirine','','checked','','','');
		ques1 ('q24','Subi des soins dentaires ?.','','checked','','','');
		ques1 ('q25','Eu de la fièvre','','checked','','','');
	    ?>
        </table>	
        <br/>
		
        <label>&nbsp;</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" />	
</form> 
<br/><br/>
        </div>		 
</div> 