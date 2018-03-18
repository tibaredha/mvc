<?php 
verifsession();
// echo'<pre>';
// print_r ($_SESSION);
// echo'</pre>';	
?>
<script type="text/javascript">

</script>
<h1>Recever: new</h1>
<hr />
<br />
<form method="post" action="<?php echo URL;?>rec/create/">
    <label>DATE INSCRIPTION </label><input type="text" name="DINS" value="<?php echo date('d/m/Y') ?>" /><input type="text" name="HINS" value="<?php echo date("H:i")?>" /><br/><!-- pour calcules les nouveau donneur       -->
	<label>NOM PRENOM</label><input type="text" name="NOM" value="" autofocus required  /><input type="text" name="PRENOM" value="" required  /><br/>
	<label>SEXE DATE DE NAISSANCE</label><?php combov(260,310,'SEXE',array("M", "F"));?>&nbsp;<input type="text" name="DATENS"   value="00/00/0000" id="date" /><br/>
	<label>ADRESSE DE NAISSANCE </label> <?php WILAYA(260,540,'WILAYAN','country','gpts2012','wil');?>&nbsp;<?php COMMUNE(670,540,'COMMUNEN','COMMUNEN');?><br />
    <label>TEL Email</label><input id="port" type="text" name="TEL"    value="(00) 00-00-00-00" /><input id="email" type="text" name="email"    value="" /><br />
	<label>ADRESSE DE RESIDENCE </label> <?php WILAYA(260,540,'WILAYAR','countryr','gpts2012','wil');?>&nbsp;<?php COMMUNE(670,540,'COMMUNER','COMMUNER');?><input type="text" name="ADRESSE" value="Ain oussera" required /><br />
    
 <hr/> 
  <label>ABO</label>
		<select name="GRABO">
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="AB">AB</option>
		    <option value="O">O</option>
		</select><br />
	<label>D ou RH1</label>
		<select name="GRRH">
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />
	<label>C ou RH2</label>
		<select name="CRH2">
		    <option value=""></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />	
	<label>E ou RH3</label>
		<select name="ERH3">
		    <option value=""></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />	
	<label>c ou RH4</label>
		<select name="CRH4">
		    <option value=""></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />	
	<label>e ou RH5</label>
		<select name="ERH5">
		   <option value=""></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />			
	<label>Kell ou KELL1</label>
		<select name="KELL1">
		    <option value=""></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />			
	<label>Cellano ou KELL2</label>
		<select name="KELL2">
		    <option value=""></option>
			<option value="Positif">Positif</option>
			<option value="negatif ">negatif </option>
		</select><br />
	<input type="hidden" name="REGION"       value="<?php echo $_SESSION['REGION'];?>" />
	<input type="hidden" name="WILAYA"       value="<?php echo $_SESSION['WILAYA'];?>" />
	<input type="hidden" name="STRUCTURE"    value="<?php echo $_SESSION['STRUCTURE'];?>" />
	<input type="hidden" name="login"        value="<?php echo $_SESSION['login'];?>" />
	<label>&nbsp;</label><input type="submit" />
</form>
<hr />

 