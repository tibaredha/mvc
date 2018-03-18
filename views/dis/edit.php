<h1>Distribution: Edit</h1>
<form method="post" action="<?php echo URL;?>dis/editSavedis/<?php echo $this->user[0]['id']; ?>">
	<label>IDREC</label><input type="text" name="IDREC" value="<?php echo $this->user[0]['IDREC']; ?>" /><br />
	<label>IDP</label><input type="text" name="IDP" value="<?php echo $this->user[0]['IDP']; ?>" /><br />
	<label>SEX</label><input type="text" name="SEX" value="<?php echo $this->user[0]['SEX']; ?>" /><br />
	<label>AGE</label><input type="text" name="AGE" value="<?php echo $this->user[0]['AGE']; ?>" /><br />
	<label>PSL</label><input type="text" name="TELEPHONE" value="<?php echo $this->user[0]['PSL']; ?>" /><br />
	<label>DATEDIS</label><input type="text" name="DATEDIS" value="<?php echo $this->user[0]['DATEDIS']; ?>" /><br />
	<label>ABO</label>
		<select name="GROUPAGE">
		    <option value="<?php echo $this->user[0]['GROUPAGE']; ?>"><?php echo $this->user[0]['GROUPAGE']; ?></option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="AB">AB</option>
		    <option value="O">O</option>
		</select><br />
	<label>D ou RH1</label>
		<select name="RHESUS">
		    <option value="<?php echo $this->user[0]['RHESUS']; ?>"><?php echo $this->user[0]['RHESUS']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />
	<label>C ou RH2</label>
		<select name="CRH2">
		    <option value="<?php echo $this->user[0]['CRH2']; ?>"><?php echo $this->user[0]['CRH2']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />	
	<label>E ou RH3</label>
		<select name="ERH3">
		    <option value="<?php echo $this->user[0]['ERH3']; ?>"><?php echo $this->user[0]['ERH3']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />	
	<label>c ou RH4</label>
		<select name="CRH4">
		    <option value="<?php echo $this->user[0]['CRH4']; ?>"><?php echo $this->user[0]['CRH4']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />	
	<label>e ou RH5</label>
		<select name="ERH5">
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
	<label>SERVICE</label><input type="text" name="SERVICE" value="<?php echo $this->user[0]['SERVICE']; ?>" /><br />
	<label>MED</label><input type="text" name="MED" value="<?php echo $this->user[0]['MED']; ?>" /><br />
	<label>DGC</label><input type="text" name="DGC" value="<?php echo $this->user[0]['DGC']; ?>" /><br />
	<label>&nbsp;</label><input type="submit" />
</form>