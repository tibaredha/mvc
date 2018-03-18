<?php 
View::photosurl(1100,100,URL.'public/images/photos/logofinal.png');
if (isset($_SESSION['errorregister'])) {
$sError = '<h1><span id="error">' . $_SESSION['errorregister'] . '</span></h1>';		
echo $sError;			
}
else
{
$sError="<h1>Update Account</h1>";
echo $sError;
}
?>

<form action="<?php echo URL.'Authentification/editSave/'.$this->user[0]['id'];  ?>" method="post">
	<label>Agence Regional Sang </label>         <?php View::ARS(278,245-95,'REGION','mvc','ARS',$this->user[0]['REGION'],$this->user[0]['REGION']);?><br />
	<label>Wilaya Regional Sang</label>          <?php View::WRS(278,275-95,'WILAYA',$this->user[0]['WILAYA'],$this->user[0]['WILAYA']);?><br />
    <label>Structure Transfusion Sanguine</label><?php View::STR(278,305-95,'STRUCTURE',$this->user[0]['STRUCTURE'],$this->user[0]['STRUCTURE']);?><br />
	<label>Grade Utilisateur</label>
	    <select name="GRADE">
			<option value="1"><?php echo $this->user[0]['GRADE']; ?></option>
			<option value="1">Medecin S</option>
			<option value="2">Medecin G</option>
			<option value="3">Paramedical</option>
			<option value="4">Administrateur</option>
		</select><br />
	<label>Langue Utilisateur</label>
	    <select name="LANG">
			<option value="1"><?php echo $this->user[0]['lang']; ?></option>
			<option value="1">Anglais</option>
			<option value="2">Francais</option>
			<option value="3">Arabe</option>
		</select><br />	
	<label>Login  (must be between 4-11)</label>    <input type="text"     name="login"  value="<?php echo $this->user[0]['login']; ?>"       /><br />
	<label>Password (be longer then 6)  </label>    <input type="password" name="password" /><br />
	<label>Email  </label>                          <input type="text"     name="Email" value="<?php echo $this->user[0]['Email']; ?>" /><br />
	
	<label><a href="<?php echo URL.'Authentification/terms';  ?>">terms</a></label> <input type="submit" /><br /><br /><br />
</form>
