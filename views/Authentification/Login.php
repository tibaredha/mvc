 <script>
	  $(function() {
		$( "#tabs" ).tabs();
	  });
</script>

<?php 
//View::photosurl(1100,100,URL.'public/images/photos/logofinal.png');
View::photosurl(1100,100,URL.'public/images/photos/dsp.jpg');
if (isset($_SESSION['errorlogin'])) {
$sError = '<h1><span id="errorlogin">' . $_SESSION['errorlogin'] . '</span></h1>';		
echo $sError;			
}
else
{
$sError="<h1>Would you like to Login</h1>";
echo $sError;
}

echo '<div id="tabs" style="width: 600px;">';
echo' <ul><li><a href="#tabs-1">Login</a></li><li><a href="#tabs-2" class="active">Signup</a></li></ul>';
			
			echo'<div id="tabs-1">';
			echo '<form action="'.URL.'Authentification/loginrun" method="post">';
			echo '<label>Login</label>    <input type="text"     name="login" /> <br />';
			echo '<label>Password</label> <input type="password" name="password" /><br />';
			echo '<label><a href="'.URL.'Authentification/ForgotPassword">Forgot Password</a></label><input type="submit"  name="loginrun" />';
			echo '</form>';
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
echo 'licence au 2019-01-01 voir  session.php';
echo '</div>';


//modiffie la licence  dans   session.php

// echo dirname(__FILE__);
// echo dirname("/etc/passwd") . PHP_EOL;
// echo 'php verssion :'.phpversion();
// echo getcwd() . "\n";

// $dir    = getcwd();
// $files1 = scandir($dir);
// $files2 = scandir($dir, 1);

// echo '<pre>';print_r($files1);echo '<pre>';
// echo '<pre>';print_r($files2);echo '<pre>';
View::sautligne(11);


// echo '
// <div id="tabs" style="width: 600px;">
  // <ul>
    // <li><a href="#tabs-1">Login</a></li>
    // <li><a href="#tabs-2" class="active">Signup</a></li>
    
  // </ul>                 
  
  // <div id="tabs-1">
	  // <form action="" method="post" id="login">
		// <p><input id="email" name="email" type="text" placeholder="Email"></p>
		// <p><input id="password" name="password" type="password" placeholder="Password">
		// <input name="action" type="hidden" value="login" /></p>
		// <p><input type="submit" value="Login" />&nbsp;&nbsp;<a href="#forget" onclick="forgetpassword();" id="forget">Forget Password?</a></p>
	  // </form>
	  
	  // <form action="" method="post" id="passwd" style="display:none;">
		// <p><input id="email" name="email" type="text" placeholder="Email to get Password"></p>
		// <input name="action" type="hidden" value="password" /></p>
		// <p><input type="submit" value="Reset Password" /></p>
	  // </form>
  // </div>
  
  // <div id="tabs-2">
    // <form action="" method="post">
    // <p><input id="name" name="name" type="text" placeholder="Name"></p>
    // <p><input id="email" name="email" type="text" placeholder="Email"></p>
    // <p><input id="password" name="password" type="password" placeholder="Password">
    // <input name="action" type="hidden" value="signup" /></p>
    // <p><input type="submit" value="Signup" /></p>
    // </form>
  // </div>

  
  // </div>

    // <script>
	  // $(function() {
		// $( "#tabs" ).tabs();
	  // });
	  // </script>
	  
	// <script type="text/javascript">
	// function forgetpassword() {
	  // $("#login").hide();
	  // $("#passwd").show();
	// }
	// </script>
	  
// ';

 ?>
 
<?php
// $conn=mysql_connect('localhost','root','');
// $db=mysql_select_db('design',$conn);
// if(isset($_POST['submit']))
// {
	// $name=$_POST['menu_name'];
	// $insert1=mysql_query("insert into menu_tbl(menu_name) values('$name')") or die .mysql_error();
	// if($insert1) 
	// {
		// echo "<span style='color:red;'>main menu inserted</span>";
	// }
// }

 // if(isset($_POST['submit2']))
 // {
	 // $main_menu=$_POST['main_menu'];
	 // $sel1=mysql_query("select * from menu_tbl where id='$main_menu'");
	  // mysql_num_rows($sel1);
	 // while($f1=mysql_fetch_array($sel1))
	 // {
		 // $menu1_name=$f1['menu_name'];
	 // }
	 // $sub_menu1_name=$_POST['sub_menu1_name'];
	 // $sub_url1_name=$_POST['sub_url1_name'];
	 // $sub_url2_name=$_POST['sub_url2_name'];
	 // $insert2=mysql_query("insert into sub_menu(menu_id,menu_name,sub_menuname,url,urla) values('$main_menu','$menu1_name','$sub_menu1_name','$sub_url1_name','$sub_url2_name')");
	 // if($insert2)
	// {
		// echo "<span style='color:red;'>sub menu inserted</span>";
	// }
 // }
 ?> 
 
 
<!-- 
<form action="" method="post" name="form">

<table width="25%" border="2" cellspacing="0"  align="center"   cellpadding="10">
  <tr>
    <th colspan="2" scope="col">ADD Menu</th>
    </tr>
  <tr>
    <th scope="row">Menu  name:</th>
    <td><label for="menu_name"></label>
      <input type="text" name="menu_name" id="menu_name" /></td>
  </tr>
  <tr>
    <th colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Submit" /></th>
    </tr>
</table>
</form> 
</br>
<form action="" method="post" name="form1">
<table width="25%" border="2" cellspacing="0" align="center" cellpadding="10">
  <tr>
    <th colspan="2" scope="col">ADD Sub Menu</th>
    </tr>
  <tr>
    <th scope="row">Main Menu:</th>
    <td><label for="main_menu"></label>
      <select name="main_menu" id="main_menu" >
      <option value="">--select menu--</option> -->
      <?php
	  // $select=mysql_query("select * from menu_tbl");
	  // while($menu1=mysql_fetch_array($select))
	  // {
	  ?>
     <!--  <option value="<?php// echo $menu1['id'];?>"> <?php //echo $menu1['menu_name'];?></option>
      <?php
	  // }
	  ?>
      
      </select></td>
  </tr>
  <tr>
    <th scope="row">Sub Menu name 1</th>
    <td id=""><label for="sub_menu1_name"></label>
      <input type="text" name="sub_menu1_name" id="sub_menu1_name" /></td>
	  
  </tr>
    <tr>
    <th scope="row">Sub Menu url 1</th>
    <td id=""><label for="sub_url1_name"></label>
      <input type="text" name="sub_url1_name" id="sub_url1_name" /></td>
	  
  </tr>
   <tr>
    <th scope="row">Sub Menu url 2</th>
    <td id=""><label for="sub_url2_name"></label>
      <input type="text" name="sub_url2_name" id="sub_url2_name" /></td>
	  
  </tr>
  <tr>
    <th colspan="2" scope="row"><input type="submit" name="submit2" id="submit2" value="Submit" /></th>
    </tr>
</table>
</form>
-->

<?php
// $mainmenu=mysql_query("select * from menu_tbl");
// while($sss=mysql_fetch_array($mainmenu))
// {	
// echo'<ul> ';
	// echo'<li>';
	// echo'<a href="'.URL.'">'.$sss['menu_name'].'</a>';
        // $menu_id=$sss['id'];
		// $select2=mysql_query("select * from sub_menu where menu_id='$menu_id'");
		// if(mysql_num_rows($select2)=="")	
		// { 		
		// }
		// else
		// {
			// echo'<ul>';
				  // while($menu2=mysql_fetch_array($select2))
				  // {
					// echo'<li>';
					// echo'<a href="'.URL.$menu2['url'].'/'.$menu2['urla'].'">';	  	 
					// echo $menu2['sub_menuname'];	   	 
					// echo'</a>';
					// echo'</li>'; 
				  // }
			// echo' </ul>';
		// } 
	// echo'</li>';
// echo'</ul>';
// } 
?>   
  
  
