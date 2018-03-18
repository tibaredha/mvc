<?php verifsession();?>
<h2>Donor: Donate</h2>
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
		<label></label><input type="hidden" name="id" value="<?php echo $this->user[0]['id']; ?>" /><br />
		<label>Previous Donation</label><input type="text" name="Previous_date"  value="<?php echo $this->user[0]['DDD'];?>"/><br />
		<label>First Name</label><input type="text" name="NOM"     value="<?php echo $this->user[0]['NOM'];    ?>"  /><br />
		<label>Last  Name</label><input type="text" name="PRENOM"  value="<?php echo $this->user[0]['PRENOM']; ?>"  /><br />
		<?php
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
		<label>Birthday</label><input type="text" name="BIRTHDAY" value="<?php echo  $this->user[0]['DATENAISSANCE']; ?>" /><br />
		<label>age Years</label><input type="text" name="AGEDNR" value="<?php echo $years;?>" /><br />
		<label>ABO</label><input type="text" name="GRABO"  value="<?php echo $this->user[0]['GRABO']; ?>"  /><br />
		<label>D ou RH1</label><input type="text" name="GRRH"  value="<?php echo $this->user[0]['GRRH']; ?>"  /><br />
		<label>C ou RH2</label><input type="text" name="CRH2"  value="<?php echo $this->user[0]['CRH2']; ?>"  /><br />
		<label>E ou RH3</label><input type="text" name="ERH3"  value="<?php echo $this->user[0]['ERH3']; ?>"  /><br />
		<label>c ou RH4</label><input type="text" name="CRH4"  value="<?php echo $this->user[0]['CRH4']; ?>"  /><br />
		<label>e ou RH5</label><input type="text" name="ERH5"  value="<?php echo $this->user[0]['ERH5']; ?>"  /><br />
		<label>Kell ou KELL1</label><input type="text" name="KELL1"  value="<?php echo $this->user[0]['KELL1']; ?>"  /><br />
		<label>Cellano ou KELL2</label><input type="text" name="KELL2"  value="<?php echo $this->user[0]['KELL2']; ?>"  /><br />
		<label>lieux</label>
		<select name="LIEUX"> 
			<option value="FIXE">Fixe</option>
			<option value="MOBILE">Mobile</option>
		</select><br />
		<label>Type Donneur</label>
		<select name="TYPEDONNEUR"> 
			<option value="REGULIER">volontaires</option>
			<option value="OCCASIONNEL">familiaux</option>
		</select><br />
		<label>Type don</label>
		<select name="TYPEDON"> 
			<option value="NORMAL">Sang total</option>
			<option value="APHERESE"> aphérèse simple plasma</option>
			<option value="APHERESE"> aphérèse simple plaquettes</option>
			<option value="APHERESE"> aphérèse simple globules rouges</option>
			<option value="APHERESE"> aphérèse simple granulocytes</option>
			<option value="APHERESE"> aphérèse combinée plasma/plaquettes</option>
			<option value="APHERESE"> aphérèse combinée plasma/globules rouges</option>
			<option value="APHERESE"> aphérèse combinée plaquettes/globules rouges</option>
			<option value="APHERESE"> aphérèse combinée plasma/plaquettes/globules rouges</option>	
		</select><br />
		<p><?php photosurl(640,390,URL.'public/webcam/'.$this->user[0]['id'].'.jpg');?></p><br /><br /><br /><br />
		<p><?php  //photos(640,390,'');?><p>
		<p><?php  //photos(1050,390,'');?><p>
        </div> 
        <div id="content_2" class="content"> 
		<h2>Medical Information</h2>
		<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr class="header">
            <th>OPTIONS <?php echo $this->user[0]['NOM']."_". strtolower($this->user[0]['PRENOM']); ?>   </th>
            <th style="width:30px">VALUE</th>
        </tr>
		<tr>
            <td  ><label>Date of Donation</label></td>
            <td align="center"  ><input type="txt" name="DATEDON"     value="<?php echo date ('Y-m-d')    ?>" />
			</td>	
		</tr>
		<tr>
            <td  ><label>heure of Donation</label></td>
            <td align="center"  ><input type="txt" name="HEUREDON"     value="<?php echo date("H:i")?>" />
			</td>	
		</tr>
		<tr>
            <td  ><label>Temp</label></td>
            <td align="center"  ><input type="number" name="TEMP"    min="36"  value="37"  max="38"/></td>
		</tr>
		<tr>	
            <td><label>Pulse</label></td>
            <td align="center" ><input type="number" name="PULSE"    min="70"  value="80"  max="100"/></td>
        </tr>
        <tr>
            <td><label>Blood Pressure</label></td>
            <td align="center"><input type="number" name="TA"       min="100" value="120" max="140"/>&nbsp;&nbsp;/&nbsp;&nbsp;<input type="number" name="TA1"      min="60"  value="80"  max="80"/></td>
		</tr>
		<tr>	
            <td ><label>Weight</label></td>
            <td align="center"     width="200"  ><input type="number" name="POIDS"    min="60"  value="070"  max="100"/>
        </tr>
		<tr>	
            <td ><label>height</label></td>
            <td align="center" ><input type="number" name="Taille"   min="160" value="170" max="200"/>
        </tr>
        <tr>
            <td><label>Hemoglobin</label></td>
            <td align="center" ><input type="number" name="HEMOGLOBIN"    min="12"  value="12"  max="18"/></td>
		</tr>
        <tr>
            <td><label>Hematocrit</label></td>
            <td align="center"  ><input   type="number" name="HEMATOCRIT"    min="34"  value="35"  max="44"/>
        </tr>
		</table>
		<br/><br/>	
        </div> 
		<div id="content_3" class="content">  
		<h2>Medical History</h2>
		<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
        <tr class="header">
            <th>Questions <?php echo $this->user[0]['NOM']."_". strtolower($this->user[0]['PRENOM']); ?> </th>
            <th style="width:30px">Yes</th>
            <th style="width:30px">No</th>
        </tr>
        <?php
		function ques1 ($nom,$ques,$yes,$no) 
		{  
		echo'<tr> <td>'.$ques.'</td>';
		echo'<td style="text-align:center;"><input type="radio" name="'.$nom.'" value="1" '.$yes.' /></td>';
		echo'<td style="text-align:center;"><input type="radio" name="'.$nom.'" value="0" '.$no.' /></td></tr>';
		}
		function ddd ($ques) 
		{  
		echo'<tr bgcolor="yellow"   > <td colspan=3 >'.$ques.'</td></tr>';
		}
		function lab1 ($ques) 
		{  
		echo'<tr bgcolor="yellow"   > <td colspan=3 >'.$ques.'</td></tr>';
		}
		function ind ($ques) 
		{  
		echo'<tr bgcolor="yellow" > <td>'.$ques.'</td>';
		echo'<td colspan="2">';
		combov('','','IND',array("IND","CIDT","CIDD"));
		echo'</td>';
		echo'</tr>';
		}
		function poche ($ques) 
		{  
		echo'<tr bgcolor="yellow"  > <td>'.$ques.'</td>';
		echo'<td colspan="2">';
		combov('','','TYPEPOCHE',array("DOUBLE","TRIPLE")); 
		echo'</td>';
		echo'</tr>';
		}
		function npoche ($ques) 
		{  
		echo'<tr bgcolor="yellow"  > <td>'.$ques.'</td>';
		echo'<td colspan="2"><input type="number" name="IDP" value="0"  />';
		echo'</td>';
		echo'</tr>';
		}
		ques1 ('q1','Vous sentez vous en forme pour donner votre sang','checked','');
		ques1 ('q2','Avez-vous déjà donné votre sang','','checked');
		ques1 ('q3','Date du dernier don : '.$this->user[0]['DDD'].' ( Date Prochain don : '.$this->user[0]['DPD'].' ) ','','checked');
		ques1 ('q4','Etes vous a jeun','','checked');
		lab1 ('Avez-vous dans votre vie :');
		ques1 ('q5','Eté hospitalisé(e)','','checked');
		ques1 ('q6','Eté transfusé(e)','','checked');
		ques1 ('q7','Eu une maladie cardiaque (trouble du rythme cardiaque,valvulopaties, angor, IDM ….) / HTA','','checked');
		ques1 ('q8','Eu une affection allergique grave et/ou de l’asthme','','checked');
		ques1 ('q9','Eu le diabète','','checked');
		ques1 ('q10','Eu un ulcère gastro-duodénale','','checked');
		ques1 ('q11','Eu une maladie dermatologique (acné « roaccutane »,psoriasis « soriatane »)','','checked');
		ques1 ('q12','Eté traité(e) par hormone de croissance','','checked');
		ques1 ('q13','Voyager en Afrique, en Asie, en Amérique Latin','','checked');
		ques1 ('q14','Eu des relations sexuelles extra-conjugales non protégées','','checked');
		ques1 ('q15','Pris des drogues par voie injectable ou nasale','','checked');
		lab1 ('Dans les 4 derniers mois, avez-vous :');
		ques1 ('q16','Eté opéré(e) au cours d’une hospitalisation et/ou subiune anesthésie générale ou locorégionale','','checked');		
		ques1 ('q17','Eté vacciné(e)','','checked');
		ques1 ('q18','Subi une endoscopie','','checked');
		ques1 ('q19','Subi un tatouage ou un piercing','','checked');
		ques1 ('q20','Eu une infection urinaire','','checked');
		lab1 ('Pour la femme :');
		ques1 ('q21','Etes vous enceinte','','checked');
		ques1 ('q22','Avez-vous accouché ou fait une fausse couche','','checked');
		lab1 ('Depuis une semaine, avez-vous :');
		ques1 ('q23','Pris des médicaments ATB, CTC, Aspirine','','checked');
		ques1 ('q24','Subi des soins dentaires ?.','','checked');
		ques1 ('q25','Eu de la fièvre','','checked');
		ind ('Indication');
		poche ('Type Poche');
		npoche ('num Poche');
	   ?>
        </table>	
        <br/>
		<input type="hidden" name="SEXEDNR"      value="<?php echo $this->user[0]['SEX']; ?>" />
		<input type="hidden" name="REGION"       value="<?php echo $_SESSION['REGION'];?>" />
	    <input type="hidden" name="WILAYA"       value="<?php echo $_SESSION['WILAYA'];?>" />
	    <input type="hidden" name="STRUCTURE"    value="<?php echo $_SESSION['STRUCTURE'];?>" />
	    <input type="hidden" name="STRUCTURE"    value="<?php echo $_SESSION['STRUCTURE'];?>" />
	    <input type="hidden" name="login"        value="<?php echo $_SESSION['login'];?>" />
        <label>&nbsp;</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" />	
</form> 
<br/><br/>
        </div>		 
 </div> 








