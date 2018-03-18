<?php 
verifsession();buttoneva();
NAV();
?>
<h1>Compagne : Edit</h1>
<br /><br />
<hr /><br />
<form method="post" action="<?php echo URL;?>don/editSavecomp/<?php echo $this->user[0]['id']; ?>">
	<label>id</label><input type="text" name="ID" value="<?php echo $this->user[0]['id']; ?>" /><br />
	<label>DATE </label><input type="text" name="DATEDON" value="<?php echo $this->user[0]['DATEDON']; ?>" /><br/>
	<label>lieux</label>
		<select name="STR"> 
			<option value="<?php echo $this->user[0]['STR']; ?>"><?php echo $this->user[0]['STR']; ?></option>
			<option value="FIXE">Fixe</option>
			<option value="MOBILE">Mobile</option>
		</select><br />
	<label>ADRESSE </label> <?php WILAYA(260,540,'WILAYAR','countryr','gpts2012','wil');?>&nbsp;<?php COMMUNE(670,540,'COMMUNER','COMMUNER');?><input type="text" name="ADRESSE" value="ain-oussera" required /><br />
	<label>&nbsp;</label><input type="submit" />
</form>