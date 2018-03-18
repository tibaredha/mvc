<h1>Receveur: Edit</h1>
<form method="post" action="<?php echo URL;?>rec/editSave/<?php echo $this->user[0]['id']; ?>">
	<label>fname</label><input type="text" name="NOM" value="<?php echo $this->user[0]['NOM']; ?>" /><br />
	<label>lname</label><input type="text" name="PRENOM" value="<?php echo $this->user[0]['PRENOM']; ?>" /><br />
	<label>Date Naissance</label><input type="text" name="DATENAISSANCE" value="<?php echo $this->user[0]['DATENAISSANCE']; ?>" /><br />
	<label>Telephone</label><input type="text" name="TELEPHONE" value="<?php echo $this->user[0]['TELEPHONE']; ?>" /><br />
	
	<label>date derniere distribution</label><input type="text" name="DATE" value="<?php echo $this->user[0]['DDT']; ?>" /><br />
	<label>ABO</label>
		<select name="GRABO">
		    <option value="<?php echo $this->user[0]['GRABO']; ?>"><?php echo $this->user[0]['GRABO']; ?></option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="AB">AB</option>
		    <option value="O">O</option>
		</select><br />
	
	<label>D ou RH1</label>
		<select name="GRRH1">
		    <option value="<?php echo $this->user[0]['GRRH']; ?>"><?php echo $this->user[0]['GRRH']; ?></option>
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
	<br />
	<label>&nbsp;</label><input type="submit" />
</form>