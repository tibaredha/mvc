<?php 
verifsession();
// echo'<pre>';
// print_r ($_SESSION);
// echo'</pre>';	
?>
<h1>Donor: new</h1>
<hr/><br/>
<form method="post" action="<?php echo URL;?>dnr/create/; ?>"> 
	<label>DATE </label><input type="text" name="DINS" value="<?php echo date('d/m/Y') ?>" /><input type="text" name="HINS" value="<?php echo date("H:i")?>" /><br/><!-- pour calcules les nouveau donneur       -->
	<label>NOM PRENOM</label><input type="text" name="NOM" value="" /><input type="text" name="PRENOM" value=""/><br/>
	<label>SEXE DATE DE NAISSANCE</label><?php combov(260,310,'SEXE',array("M", "F"));?>&nbsp;<input type="text" name="DATENS"   value="<?php echo date('d/m/Y') ?>" id="date" /><br/>
	<label>ADRESSE DE NAISSANCE </label> <?php WILAYA(260,540,'WILAYAN','country','gpts2012','wil');?>&nbsp;<?php COMMUNE(670,540,'COMMUNEN','COMMUNEN');?><br />
    <label>ADRESSE DE RESIDENCE </label> <?php WILAYA(260,540,'WILAYAR','countryr','gpts2012','wil');?>&nbsp;<?php COMMUNE(670,540,'COMMUNER','COMMUNER');?><input type="text" name="ADRESSE" value="" /><br />
    <label>TEL</label><input id="port" type="text" name="TEL"    value="" /><br />
    <input type="hidden" name="REGION"       value="<?php echo $_SESSION['REGION'];?>" />
	<input type="hidden" name="WILAYA"       value="<?php echo $_SESSION['WILAYA'];?>" />
	<input type="hidden" name="STRUCTURE"    value="<?php echo $_SESSION['STRUCTURE'];?>" />
	<input type="hidden" name="STRUCTURE"    value="<?php echo $_SESSION['STRUCTURE'];?>" />
	<input type="hidden" name="login"        value="<?php echo $_SESSION['login'];?>" />
	<label>&nbsp;</label><input type="submit" />
</form>

 