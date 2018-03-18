<h1>Women: new</h1>
<hr />
<br /><br />
<form method="post" action="<?php echo URL;?>sip/create/; ?>">
	<label>First Name</label><input type="text" name="NOM" value="" /><br />
	<label>Last Name</label><input type="text" name="PRENOM" value="" /><br />
	<label>date de naissance </label><input type="date" name="dns" value="" /><br />
	<label>wilaya de naissance </label><input type="text" name="" value="" /><br />
	<label>commune de naissance </label><input type="text" name="" value="" /><br />
	<label>wilaya de residence </label><input type="text" name="" value="" /><br />
	<label>commune de residence </label><input type="text" name="" value="" /><br />
	<label>adresse de residence </label><input type="text" name="" value="" /><br />
	<label>nom marie </label><input type="text" name="" value="" /><br />
	<label>prenom marie </label><input type="text" name="" value="" /><br />
	
	
	<label>ABO</label>
		<select class="GRABO"    name="GRABO">
		    <option value="<?php //echo $this->user[0]['GRABO']; ?>"><?php //echo $this->user[0]['GRABO']; ?></option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="AB">AB</option>
		    <option value="O">O</option>
		</select><br />
	
	<label>D ou RH1</label>
		<select class="GRABO"  name="GRRH1">
		    <option value="<?php //echo $this->user[0]['GRRH']; ?>"><?php //echo $this->user[0]['GRRH']; ?></option>
			<option value="P">P</option>
			<option value="N">N</option>
		</select><br />
	<label>C ou RH2</label>
		<select  class="GRABO" name="GRRH2">
		    <option value="<?php //echo $this->user[0]['GRRH']; ?>"><?php //echo $this->user[0]['GRRH']; ?></option>
			<option value="P">P</option>
			<option value="N">N</option>
		</select><br />	
	<label>E ou RH3</label>
		<select class="GRABO" name="GRRH3">
		    <option value="<?php //echo $this->user[0]['GRRH']; ?>"><?php //echo $this->user[0]['GRRH']; ?></option>
			<option value="P">P</option>
			<option value="N">N</option>
		</select><br />	
	<label>c ou RH4</label>
		<select class="GRABO" name="GRRH4">
		    <option value="<?php //echo $this->user[0]['GRRH']; ?>"><?php //echo $this->user[0]['GRRH']; ?></option>
			<option value="P">P</option>
			<option value="N">N</option>
		</select><br />	
	<label>e ou RH5</label>
		<select class="GRABO" name="GRRH5">
		    <option value="<?php //echo $this->user[0]['GRRH']; ?>"><?php //echo $this->user[0]['GRRH']; ?></option>
			<option value="P">P</option>
			<option value="N">N</option>
		</select><br />		
		
	<label>Kell ou KELL1</label>
		<select class="GRABO" name="KELL1">
		    <option value="<?php //echo $this->user[0]['GRRH']; ?>"><?php //echo $this->user[0]['GRRH']; ?></option>
			<option value="P">P</option>
			<option value="N">N</option>
		</select><br />		
		
	<label>Cellano ou KELL2</label>
		<select class="GRABO" name="KELL2">
		    <option value="<?php //echo $this->user[0]['GRRH']; ?>"><?php //echo $this->user[0]['GRRH']; ?></option>
			<option value="P">P</option>
			<option value="N">N</option>
		</select><br />	
	
	
	<!--<label>WILAYAr</label> -->
	<?php //View::WILAYAN2(100,100,'','gpts2012','wil') ;     //meilleur method  ?>

	
	
	<?php
// View::hr();       
// $name='gfgfgf';
// echo "<select size=1 class=\"country\" name=\"".$name."\">"."\n";
// echo"<option value=\"1\" selected=\"selected\">selectionner wilaya</option>"."\n";
// foreach($this->wilayaview as $key => $value)
// { 		
?>
<!--<option value="<?php  //echo $value['WILAYAS'];    ?>"><?php  //echo $value['WILAYAS'];    ?></option>-->
<?php 
// }
// echo '</select>'."\n"; 
?>
	
	<br /> 
	
	<label>&nbsp;</label><input type="submit" />
</form>


 