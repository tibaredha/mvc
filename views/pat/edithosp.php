<?php 
verifsession();
// view::button('cons',$this->user[0]['id']);

?>
<h1>Hospitalisation : Edit</h1>
<hr /><br />
<form method="post" action="<?php echo URL;?>pat/editSavehosp/<?php echo $this->user[0]['id']; ?>">
	<label>IDPAT</label><input type="text" name="IDDNR"  value="<?php echo $this->user[0]['IDDNR']; ?>" /><br />
	<label>AGE</label><input   type="text" name="AGEDNR" value="<?php echo $this->user[0]['AGEDNR']; ?>" /><br />	
	<label>SEXE</label>
		<select name="SEXEDNR"> 
			<option value="<?php echo $this->user[0]['SEXEDNR']; ?>"><?php echo $this->user[0]['SEXEDNR']; ?></option>
			<option value="M">M</option>
			<option value="F">F</option>
		</select><br />
	<label>MATRICULE</label><input type="text" name="MAT" value="<?php echo $this->user[0]['MAT']; ?>" /><br />
	<label>N°DOSSIER</label><input type="text" name="NDOS" value="<?php echo $this->user[0]['NDOS']; ?>" /><br />
	<label>DATE HOSPITALISATION</label><input type="text" name="DATEDON" value="<?php echo $this->user[0]['DATEDON']; ?>" /><br />
	<label>SERVICE</label>
<?php
View::comboservice1(1,1,'SERVICE','SERVICE',$this->user[0]['SERVICE'],nbrtostring('service','ids',$this->user[0]['SERVICE'],'servicefr'),'ids','servicefr','SERVICE') ;	
?>	
<br />
<label>NLIT</label>
<?php	
View::NLIT1(410,410,"NLIT",$this->user[0]['NLIT'],nbrtostring('lit','idlit',$this->user[0]['NLIT'],'nlit'));	
?>	
<br />	
	<label>MOTIF</label><input type="text" name="MOTIF" value="<?php echo $this->user[0]['MOTIF']; ?>" /><br />
	<label>DGC</label><input type="text" name="DGC" value="<?php echo $this->user[0]['DGC']; ?>" /><br />
	<label>DATESORTI</label><input type="text" name="DATESORTI" value="<?php echo $this->user[0]['DATESORTI']; ?>" /><br />
	<label>HEURESORTI</label><input type="text" name="HEURESORTI" value="<?php echo $this->user[0]['HEURESORTI']; ?>" /><br />
	<label>MODESORTI</label><input type="text" name="MODESORTI" value="<?php echo $this->user[0]['MODESORTI']; ?>" /><br />
	<label>POIDS</label><input type="text" name="POIDS" value="<?php echo $this->user[0]['POIDS']; ?>" /><br />
	<label>Taille</label><input type="text" name="Taille" value="<?php echo $this->user[0]['Taille']; ?>" /><br />
	<label>TAS</label><input type="text" name="TAS" value="<?php echo $this->user[0]['TAS']; ?>" /><br />
	<label>TAD</label><input type="text" name="TAD" value="<?php echo $this->user[0]['TAD']; ?>" /><br />
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
		
	<br />
	<label>&nbsp;</label><input type="submit" />
</form>