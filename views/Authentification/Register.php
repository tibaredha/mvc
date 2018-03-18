 <script>
	  $(function() {
		$( "#tabs" ).tabs();
	  });
</script>
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

echo '<div id="tabs" style="width: 600px;">';
echo' <ul><li><a href="#tabs-1">Login</a></li><li><a href="#tabs-2" class="active">Signup</a></li></ul>';
			
			echo'<div id="tabs-1">';
			// echo '<form action="'.URL.'Authentification/loginrun" method="post">';
			// echo '<label>Login</label>    <input type="text"     name="login" /> <br />';
			// echo '<label>Password</label> <input type="password" name="password" /><br />';
			// echo '<label><a href="'.URL.'Authentification/ForgotPassword">Forgot Password</a></label>         <input type="submit" />';
			// echo '</form>';
			echo '</div>';

			echo'<div id="tabs-2">';
			echo '<form action="'.URL.'Authentification/Registerrun" method="post">';
			echo '<label>Agence Regional Sang</label>'; View::ARS(278,245-95,'REGION','mvc','ARS','7000','AGENCE REGIONAL DU SANG');echo'<br />';
			echo '<label>Wilaya Regional Sang</label>'; View::WRS(278,275-95,'WILAYA','17000','WILAYA');echo'<br />';
			echo '<label>Structure Transfusion Sanguine</label>';View::STR(278,305-95,'STRUCTURE','4','STRUCTURE');echo'<br />';
			echo '<label>Grade Utilisateur</label>
			<select name="GRADE">
			<option value="1">Medecin S</option>
			<option value="2">Medecin G</option>
			<option value="3">Paramedical</option>
			<option value="4">Administrateur</option>
		    </select><br />';
			echo '<label>Langue Utilisateur</label>
			<select name="LANG">
			<option value="1">Anglais</option>
			<option value="2">Francais</option>
			<option value="3">Arabe</option>
		    </select><br/>';
			echo '<label>Login  (must be between 4-11)</label><input type="text"     name="login" /><br />';
			echo '<label>Password (be longer then 6)</label><input type="password" name="password" /><br />';
			echo '<label>Email </label><input type="text"     name="Email" value="***@yahoo.fr" /><br />';
			echo '<label><a href="'.URL.'Authentification/terms">terms</a></label> <input type="submit"  name="Registerrun" />';
			echo '</form>';
			echo '</div>';
			
			
			
echo 'licence au 2017-01-01';
echo '</div>';



?>
	
	    
	                 

