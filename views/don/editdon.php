<?php 
verifsession();
NAV();
?>
<h1>Don: Edit</h1>
<hr /><br />
<form method="post" action="<?php echo URL;?>don/editSavedon/<?php echo $this->user[0]['id']; ?>">
	<label>IDP</label><input type="text" name="IDP" value="<?php echo $this->user[0]['IDP']; ?>" /><br />
	<label>IDDNR</label><input type="text" name="IDDNR" value="<?php echo $this->user[0]['IDDNR']; ?>" /><br />
	<label>Type Donneur</label>
		<select name="TYPEDONNEUR"> 
			<option value="<?php echo $this->user[0]['TDNR']; ?>"><?php echo $this->user[0]['TDNR']; ?></option>
			<option value="OCCASIONNEL">OCCASIONNEL</option>
			<option value="REGULIER">REGULIER</option>
		</select><br />
	<label>Type don</label>
		<select name="TYPEDON"> 
			<option value="<?php echo $this->user[0]['TDON']; ?>"><?php echo $this->user[0]['TDON']; ?></option>
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
	<label>POIDS</label><input type="text" name="POIDS" value="<?php echo $this->user[0]['POIDS']; ?>" /><br />
	<label>Taille</label><input type="text" name="Taille" value="<?php echo $this->user[0]['Taille']; ?>" /><br />
	<label>TAS</label><input type="text" name="TAS" value="<?php echo $this->user[0]['TAS']; ?>" /><br />
	<label>TAD</label><input type="text" name="TAD" value="<?php echo $this->user[0]['TAD']; ?>" /><br />
	<label>lieux</label>
		<select name="LIEUX"> 
			<option value="<?php echo $this->user[0]['STR']; ?>"><?php echo $this->user[0]['STR']; ?></option>
			<option value="FIXE">Fixe</option>
			<option value="MOBILE">Mobile</option>
		</select><br />
	<label>DATEDON</label><input type="text" name="DATEDON" value="<?php echo $this->user[0]['DATEDON']; ?>" /><br />
	<label>IND</label>
		<select name="IND"> 
			<option value="<?php echo $this->user[0]['IND']; ?>"><?php echo $this->user[0]['IND']; ?></option>
			<option value="IND">IND</option>
			<option value="CIDT">CIDT</option>
		    <option value="CIDD">CIDD</option>
		</select><br />
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
			<option value="negatif ">negatif</option>
		</select><br />
	<label>C ou RH2</label>
		<select name="GRRH2">
		    <option value="<?php echo $this->user[0]['CRH2']; ?>"><?php echo $this->user[0]['CRH2']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif</option>
		</select><br />	
	<label>E ou RH3</label>
		<select name="GRRH3">
		    <option value="<?php echo $this->user[0]['ERH3']; ?>"><?php echo $this->user[0]['ERH3']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif</option>
		</select><br />	
	<label>c ou RH4</label>
		<select name="GRRH4">
		    <option value="<?php echo $this->user[0]['CRH4']; ?>"><?php echo $this->user[0]['CRH4']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif</option>
		</select><br />	
	<label>e ou RH5</label>
		<select name="GRRH5">
		    <option value="<?php echo $this->user[0]['ERH5']; ?>"><?php echo $this->user[0]['ERH5']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif</option>
		</select><br />			
	<label>Kell ou KELL1</label>
		<select name="KELL1">
		    <option value="<?php echo $this->user[0]['KELL1']; ?>"><?php echo $this->user[0]['KELL1']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif</option>
		</select><br />			
	<label>Cellano ou KELL2</label>
		<select name="KELL2">
		    <option value="<?php echo $this->user[0]['KELL2']; ?>"><?php echo $this->user[0]['KELL2']; ?></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif</option>
		</select><br />		
	<label>AGE</label><input type="text" name="AGEDNR"  value="<?php echo $this->user[0]['AGEDNR']; ?>" /><br />		
	<br />
	<label>&nbsp;</label><input type="submit" />
</form>