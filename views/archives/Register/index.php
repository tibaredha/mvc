<?php 
View::photosurl(1100,100,URL.'public/images/photos/logofinal.png');
if (isset($_SESSION['errorregister'])) {
$sError = '<h1><span id="error">' . $_SESSION['errorregister'] . '</span></h1>';		
echo $sError;			
}
else
{
$sError="<h1>Register for this site</h1>";
echo $sError;
}
?>
<form action="Register/run" method="post">
	<label>Agence Regional Sang </label><?php ARS(670,245,'REGION','gpts2012','ARS');?><br />
	<label>Wilaya Regional Sang</label><?php WRS(670,275,'WILAYA');?><br />
    <label>Structure Transfusion Sanguine</label><?php STR(670,305,'STRUCTURE');?><br />
	<label>Grade Utilisateur</label>
	    <select name="GRADE">
			<option value="1">Medecin S</option>
			<option value="2">Medecin G</option>
			<option value="3">Paramedical</option>
			<option value="4">Administrateur</option>
		</select><br />
	<label>Langue Utilisateur</label>
	    <select name="LANG">
			<option value="1">Anglais</option>
			<option value="2">Francais</option>
			<option value="3">Arabe</option>
		</select><br />	
	<label>Login  (must be between 4-11)</label>    <input type="text"     name="login" /><br />
	<label>Password (be longer then 6)  </label>    <input type="password" name="password" /><br />
	<label>Email  </label>                          <input type="text"     name="Email" value="***@yahoo.fr" /><br />
	
	<label><a href="<?php echo URL.'Register/terms';  ?>">terms</a></label> <input type="submit" /><br /><br /><br />
</form>
