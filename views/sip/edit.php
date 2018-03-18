<h1>Donor: Edit</h1>
<form method="post" action="<?php echo URL;?>dnr/editSave/<?php echo $this->user[0]['id']; ?>">
	<label>fname</label><input type="text" name="NOM" value="<?php echo $this->user[0]['NOM']; ?>" /><br />
	<label>lname</label><input type="text" name="PRENOM" value="<?php echo $this->user[0]['PRENOM']; ?>" /><br />
	<label>donation date </label><input type="text" name="DATE" value="<?php echo $this->user[0]['DATE']; ?>" /><br />
	<label>ABO</label>
		<select name="GRABO">
		    <option value="<?php echo $this->user[0]['GRABO']; ?>"><?php echo $this->user[0]['GRABO']; ?></option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="AB">AB</option>
		    <option value="O">O</option>
		</select>
	<br />
	<label>RH</label>
		<select name="GRRH">
		    <option value="<?php echo $this->user[0]['GRRH']; ?>"><?php echo $this->user[0]['GRRH']; ?></option>
			<option value="P">P</option>
			<option value="N">N</option>
		</select>
	<br />
	<label>&nbsp;</label><input type="submit" />
</form>