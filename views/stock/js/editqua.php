<h1>Qualification : Edit poche n °: <?php echo $this->user[0]['IDP']; ?></h1>
<hr /><br />
<form method="post" action="<?php echo URL;?>qua/editSave/<?php echo $this->user[0]['id']; ?>">
	
	<label>Qualification date </label><input type="text" name="DATEQUA" value="<?php echo date ('Y-m-d')    ?>" /><br />
	<label>ABO</label>
		<select name="GRABO">
		    <option value="<?php echo $this->user[0]['GROUPAGE']; ?>"><?php echo $this->user[0]['GROUPAGE']; ?></option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="AB">AB</option>
		    <option value="O">O</option>
		</select><br />
	<label>D ou RH1</label>
		<select name="GRRH1">
		    <option value="<?php echo $this->user[0]['RHESUS']; ?>"><?php echo $this->user[0]['RHESUS']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />
	<label>C ou RH2</label>
		<select name="GRRH2">
		    <option value="<?php echo $this->user[0]['CRH2']; ?>"><?php echo $this->user[0]['CRH2']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />	
	<label>E ou RH3</label>
		<select name="GRRH3">
		    <option value="<?php echo $this->user[0]['ERH3']; ?>"><?php echo $this->user[0]['ERH3']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />	
	<label>c ou RH4</label>
		<select name="GRRH4">
		    <option value="<?php echo $this->user[0]['CRH4']; ?>"><?php echo $this->user[0]['CRH4']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />	
	<label>e ou RH5</label>
		<select name="GRRH5">
		   <option value="<?php echo $this->user[0]['ERH5']; ?>"><?php echo $this->user[0]['ERH5']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />			
	<label>Kell ou KELL1</label>
		<select name="KELL1">
		    <option value="<?php echo $this->user[0]['KELL1']; ?>"><?php echo $this->user[0]['KELL1']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />			
	<label>Cellano ou KELL2</label>
		<select name="KELL2">
		    <option value="<?php echo $this->user[0]['KELL2']; ?>"><?php echo $this->user[0]['KELL2']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />
<hr/>		
	<label>Hépatite B</label>
		<select name="HVB">
		    <option value="<?php echo $this->user[0]['HVB']; ?>"><?php echo $this->user[0]['HVB']; ?></option>
			<option value="negatif">negatif</option>
			<option value="douteux">douteux</option>
		    <option value="Positif">Positif</option>
		</select><br />		
	<label>Hépatite C</label>
		<select name="HVC">
			<option value="<?php echo $this->user[0]['HVC']; ?>"><?php echo $this->user[0]['HVC']; ?></option>
			<option value="negatif">negatif</option>
			<option value="douteux">douteux</option>
		    <option value="Positif">Positif</option>
		</select><br />	
	<label>VIH/sida</label>
		<select name="HIV">
			<option value="<?php echo $this->user[0]['HIV']; ?>"><?php echo $this->user[0]['HIV']; ?></option>
			<option value="negatif">negatif</option>
			<option value="douteux">douteux</option>
		    <option value="Positif">Positif</option>
		</select><br />	
	<label>Syphilis/TPHA</label>
		<select name="TPHA">
			<option value="<?php echo $this->user[0]['TPHA']; ?>"><?php echo $this->user[0]['TPHA']; ?></option>
			<option value="negatif">negatif</option>
			<option value="douteux">douteux</option>
		    <option value="Positif">Positif</option>
		</select><br />			
	<input type="hidden" name="IDDNR" value="<?php echo $this->user[0]['IDDNR']; ?>" />	
	<br />
	<label>&nbsp;</label><input type="submit" />
</form>