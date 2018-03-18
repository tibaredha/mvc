<?php 
verifsession();
buttondnr();	
?>
<h1>Donor: new</h1>
<br /><br />
<hr /><br />
<form method="post" action="<?php echo URL;?>dnr/create/"> 
	<label>DATE INSCRIPTION</label><input type="text" name="DINS" value="<?php echo date('d/m/Y') ?>" /><input type="text" name="HINS" value="<?php echo date("H:i")?>" /><br/><!-- pour calcules les nouveau donneur       -->
	<label>NOM PRENOM</label><input type="text" name="NOM" value=""  autofocus required /><input type="text" name="PRENOM" value="" required  /><br/>
	<label>SEXE DATE DE NAISSANCE</label><?php combov(260,310,'SEXE',array("M", "F"));?>&nbsp;<input type="text" name="DATENS"   value="00/00/0000" id="date" /><br/>
	<label>ADRESSE DE NAISSANCE </label> <?php WILAYA(260,540,'WILAYAN','country','mvc','wil');?>&nbsp;<?php COMMUNE(670,540,'COMMUNEN','COMMUNEN');?><br />
	<label>TEL Email</label><input id="port" type="text" name="TEL"    value="(00) 00-00-00-00" /><input id="email" type="email" name="email"    value="" /><br />
	<label>ADRESSE DE RESIDENCE </label> <?php WILAYA(260,540,'WILAYAR','countryr','mvc','wil');?>&nbsp;<?php COMMUNE(670,540,'COMMUNER','COMMUNER');?><input type="text" name="ADRESSE" value="" required />
	<?php //ADRESSE(260,540,'ADRESSE','ADRESSE','mvc','adr');?>&nbsp;<br />
    <input type="hidden" name="REGION"       value="<?php echo $_SESSION['REGION'];?>" />
	<input type="hidden" name="WILAYA"       value="<?php echo $_SESSION['WILAYA'];?>" />
	<input type="hidden" name="STRUCTURE"    value="<?php echo $_SESSION['STRUCTURE'];?>" />
	<input type="hidden" name="login"        value="<?php echo $_SESSION['login'];?>" />
	<label>&nbsp;</label><input type="submit" />
</form>
<hr />
 