<?php 
verifsession();
if ($this->user[0]['MODESORTI']=='')
{
?>
<h1>Hospitalisation : Sortie</h1>
<hr /><br />
<form method="post" action="<?php echo URL;?>pat/editSavesortihosp/<?php echo $this->user[0]['id']; ?>">
	<label>IDPAT</label><input type="text" name="IDDNR"  value="<?php echo $this->user[0]['IDDNR']; ?>" /><br />
	<label>DATE HOSPITALISATION</label><input type="text" name="DATEDON" value="<?php echo $this->user[0]['DATEDON']; ?>" /><br />
	<label>SERVICE</label><input type="text" name="SERVICE" value="<?php echo $this->user[0]['SERVICE']; ?>" /><br />
	<label>NLIT</label><input type="text" name="NLIT" value="<?php echo $this->user[0]['NLIT']; ?>" /><br />
	<label>MATRICULE</label><input type="text" name="MAT" value="<?php echo $this->user[0]['MAT']; ?>" /><br />
	<label>N°DOSSIER</label><input type="text" name="NDOS" value="<?php echo $this->user[0]['NDOS']; ?>" /><br />
	<label>DATESORTI</label><input type="text" name="DATESORTI" value="<?php echo  date('Y-m-d');  //echo $this->user[0]['DATESORTI']; ?>" /><br />
	<label>HEURESORTI</label><input type="text" name="HEURESORTI" value="<?php echo  date('H:i');//echo $this->user[0]['HEURESORTI']; ?>" /><br />
	<label>MODE SORTIE</label>
		<select name="MODESORTI"> 
			<option value="<?php echo $this->user[0]['MODESORTI']; ?>"><?php echo $this->user[0]['MODESORTI']; ?></option>
			<option value="1">SORTIE NORMALE</option>
			<option value="2">PAR DECES</option>
			<option value="3">EVACUATION</option>
			<option value="4">EVASION</option>
			<option value="5">CONTRE AVIS MEDICAL</option>
			<option value="6">TRANSFERT ETRANGER</option>
			<option value="6">MORT_NE</option>
		</select><br />
	<label>CHAPITRE</label><input type="text" name="x" value="<?php echo nbrtostring("CHAPITRE","IDCHAP",$this->user[0]['CHAPITRE'],"CHAP"); // echo   ;?>" /><br />
    <label>CATEGORIECIM</label><input type="text" name="y" value="<?php echo nbrtostring("cim","row_id",$this->user[0]['CATEGORIECIM'],"diag_cod"); //echo $this->user[0]['CATEGORIECIM'];?>" /><br />		
	<label>Chapitre</label>	<?php view::CHAPITRE(180,145+50,'CHAPITRE','grh','CHAPITRE'); ?><br />
    <label>Sous-Categorie</label><?php view::CATEGORIECIM(180,185+50,'CATEGORIECIM'); ?><br />
    <label>&nbsp;</label><input type="submit" /><br />	
</form>
<?php
}
else
{
header('location: ' . URL . 'pat/view/'.$this->user[0]['IDDNR'].'');
}
?>
