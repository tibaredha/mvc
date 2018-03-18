<?php 
verifsession();buttondis1($this->user[0]['id']);
$diff = abs(time() - strtotime($this->user[0]['DATENAISSANCE'])); 
$years = floor($diff / (365*60*60*24));        
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
?>
<h2>Receveur: Distribution CPS </h2>
<br /><br />
<hr /><br />
<div class="tabbed_area">  
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Personal Information</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Medical Information</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Poche : CPS</a></li> 	
        </ul>   
		<div id="content_1" class="content">  
		<h2>Personal Information</h2>
		<form name="donor-form"  method="post" action="<?php echo URL;?>dis/DISOK">
		<label>First Name</label><input type="text" name="NOM"     value="<?php echo $this->user[0]['NOM'];    ?>"  /><br />
		<label>Last  Name</label><input type="text" name="PRENOM"  value="<?php echo $this->user[0]['PRENOM']; ?>"  /><br />	
		<label>Birthday</label><input type="text" name="BIRTHDAY" value="<?php echo $this->user[0]['DATENAISSANCE']; ?>" /><br />	
		<label>Age&nbsp; Years </label><input type="text" name="AGE" value="<?php echo $years;?>" /><br />
		<label>ABO</label><input type="text" name="GRABO"  value="<?php echo $this->user[0]['GRABO']; ?>"  /><br />
		<label>D ou RH1</label><input type="text" name="GRRH"  value="<?php echo $this->user[0]['GRRH']; ?>"  /><br />
		<label>C ou RH2</label><input type="text" name="CRH2"  value="<?php echo $this->user[0]['CRH2']; ?>"  /><br />
		<label>E ou RH3</label><input type="text" name="ERH3"  value="<?php echo $this->user[0]['ERH3']; ?>"  /><br />
		<label>c ou RH4</label><input type="text" name="CRH4"  value="<?php echo $this->user[0]['CRH4']; ?>"  /><br />
		<label>e ou RH5</label><input type="text" name="ERH5"  value="<?php echo $this->user[0]['ERH5']; ?>"  /><br />
		<label>Kell ou KELL1</label><input type="text" name="KELL1"  value="<?php echo $this->user[0]['KELL1']; ?>"  /><br />
		<label>Cellano ou KELL2</label><input type="text" name="KELL2"  value="<?php echo $this->user[0]['KELL2']; ?>"  /><br />
		<input type="hidden" name="id" value="<?php echo $this->user[0]['id']; ?>" /><br />
		<input type="hidden" name="SEX" value="<?php echo $this->user[0]['SEX']; ?>" /><br />
		<input type="hidden" name="REGION"       value="<?php echo $_SESSION['REGION'];?>" />
	    <input type="hidden" name="WILAYA"       value="<?php echo $_SESSION['WILAYA'];?>" />
	    <input type="hidden" name="STRUCTURE"    value="<?php echo $_SESSION['STRUCTURE'];?>" />
	    <input type="hidden" name="login"        value="<?php echo $_SESSION['login'];?>" />
		<input type="hidden" name="PSL"          value="CPS" />
		<p><?php //photosurl(1040,420,URL.'public/webcam/'.$this->user[0]['id'].'.jpg');?></p><br /><br /><br /><br />
		<p><?php photosurl(1040,420,URL.'public/images/photos/cgrplaq.jpg');?></p><br /><br /><br /><br />
		<p><?php  //photos(640,390,'');?><p>
		<p><?php  //photos(1050,390,'');?><p>
        </div> 
		<div id="content_2" class="content"> 
		<h2>Medical Information</h2>
		<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr class="header">
            <th>OPTIONS <?php echo $this->user[0]['NOM']."_". strtolower($this->user[0]['PRENOM']).'  Groupage : '.$this->user[0]['GRABO'].':'.$this->user[0]['GRRH']; ; ?>   </th>
            <th style="width:30px">VALUE</th>
        </tr>
		
<tr>
            <td  ><label>Poly transfuse  </label></td>
            <td align="center"  ><input type="txt" name="POLYT"     value="<?php echo $this->user[0]['POLYT']    ?>" />
			</td>	
		</tr>
		<tr>
            <td  ><label>Date derniere transfusion   </label></td>
            <td align="center"  ><input type="txt" name="DDT"     value="<?php echo $this->user[0]['DDT']    ?>" />
			</td>	
		</tr>
		<tr>
            <td  ><label>Reaction  transfusionnel  anterieur   </label></td>
            <td align="center"  ><input type="txt" name="RTA"     value="<?php echo $this->user[0]['RTA']    ?>" />
			</td>	
		</tr>
		<tr>
            <td  ><label>Type raction transfusionnel    </label></td>
            <td align="center"  ><input type="txt" name="TYPERTA"     value="<?php echo $this->user[0]['TYPERTA']    ?>" />
			</td>	
		</tr>
		<tr>
            <td  ><label>RAI   </label></td>
            <td align="center"  ><input type="txt" name="RAI"     value="<?php echo $this->user[0]['RAI']    ?>" />
			</td>	
		</tr>
		<tr>
            <td  ><label>DATE RAI   </label></td>
            <td align="center"  ><input type="txt" name="DRAI"     value="<?php echo $this->user[0]['DRAI']    ?>" />
			</td>	
		</tr>
		<tr>
            <td  ><label>Resultat RAI    </label></td>
            <td align="center"  ><input type="txt" name="RESULTAT"     value="<?php echo $this->user[0]['RESULTAT']    ?>" />
			</td>	
		</tr>
		</table>
		<br/><br/>	
        </div> 
		<div id="content_3" class="content">  
		<h2>NDP : CPS</h2>
		<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
        <tr class="header">
            <th>Receveur <?php echo $this->user[0]['NOM']."_". strtolower($this->user[0]['PRENOM']).'  Groupage : '.$this->user[0]['GRABO'].':'.$this->user[0]['GRRH']; ; ?> </th>
            <th style="width:30px">VALEUR</th>
        </tr>
		<tr>
            <td  ><label>Date of distribution CPS </label></td>
            <td align="center"  ><input type="txt" name="DATEDIS"     value="<?php echo date ('Y-m-d')    ?>" />
			</td>	
		</tr>
		<tr>
            <td  ><label>HEURS of distribution CPS </label></td>
            <td align="center"  ><input type="txt" name="HEUREDIS"     value="<?php echo date ('m:s')    ?>" />
			</td>	
		</tr>
         <tr>
            <td  ><label>Service   </label></td>
            <td align="center"  >
			<?php SER('SERVICE','mvc','ser');?><br />
			</td>	
		</tr>
		<tr>
            <td  ><label>Concentrés de Plaquettes Standard conservé en plasma (Date Peremption Desactive + Compatible Groupage Desactive) </label></td>
            <td align="center"  ><?php PSL('CPS',$this->user[0]['GRABO'],$this->user[0]['GRRH']);  ?>
			</td>	
		</tr>
			<tr>
            <td  ><label>Nom Du Medecin   </label></td>
            <td align="center"  >
			<?php MED('MED','mvc','med');?><br />
			</td>	
			</td>	
		</tr>
		
		<tr>
		<td  ><label>DGC</label>   <input type="text" name="DGC1"     value=""  /></td>
		<td align="center"  >
		<select name="DGC">
		<option value="1">Thrombopenie</option>
		</select><br />
		</td>	
		</td>	
		</tr>
        </table>	
        <br/>	
       <label>&nbsp;</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" />	
</form> 
<br/><br/>
        </div>		 
 </div> 

