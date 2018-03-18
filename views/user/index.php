<h1> User  </h1 >
<?php 
// echo "diff:". time() ; echo "<br>" ;
// echo "diff:". strtotime("1970-05-03") ; echo "<br>" ;
// echo "diff:". $diff    = abs(time() - strtotime("1970-05-03")); echo "<br>" ;
// echo "years:".$years   = floor($diff / (365*60*60*24));         echo "<br>" ;
// echo "months:".$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));echo "<br>" ;
// echo "days:".$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));echo "<br>" ;
// echo "allow_donate :".$allow_donate = FALSE; echo "<br>" ;

// if ($years > 0)
// {
   // echo "due:". $due = "" ; echo "<br>" ; // .$ddate
   // echo "allow_donate:". $allow_donate = TRUE;echo "<br>" ;
// }
// else if ($months > 0)
// {
	// if ($months == 1)
		// $due = "<i>About a month ago</i>";
	// else
		// $due = "<i>About $months months ago</i>";

	// if ($months > $months_for_donor_allow_donate)
		// $allow_donate = TRUE;
// }
// else if ($days > 0)
// {
	// if ($days == 1)
		// $due = "<i>Yesterday</i>";
	// else
		// $due = "<i>About $days days ago</i>";

	// $allow_donate = FALSE;
// }

 ?>
<span class="tooltip" onmouseover="tooltip.pop(this, '<h3>User</h3><br/> Add a new user')">User</span>
<hr />
<?php

// echo "role : ".Session::get('role');echo'<br/>';
// echo "id : ".Session::get('id');echo'<br/>';
// echo "loggedIn : ".Session::get('loggedIn');echo'<br/>';
// echo "login : ".Session::get('login');echo'<br/>';

// view::h(1,100,283,'User');
// view::f0( URL.'user/create','post');$x=190;$y=350;
// view::txt($x,$y,'login',20,'');
// view::txt($x,$y+30,'password',20,'');
// view::txt($x,$y+60,'role',20,'admin');
// view::submit($x,$y+90,'submit');
// view::f1();
// view::sautligne (12);
// view::hr();
// view::sautligne (2);
// echo '<table  width="90%" border="1" cellpadding="1" cellspacing="1" align="center" >';
// echo"<tr>
// <td class=\"ligne1\">id</div></td>
// <td class=\"ligne1\">login</div></td>
// <td class=\"ligne\">role</div></td>
// <td class=\"ligne\">Edit</div></td>
// <td class=\"ligne\">Delete</div></td>
// </tr>";
// foreach($this->userListview as $key => $value) {
	// echo '<tr>';
	// echo '<td>' . $value['id'] . '</td>';
	// echo '<td>' . $value['login'] .'</td>';
	// echo '<td>' . $value['role'] . '</td>';
	// echo '<td align="center"   ><a href="'.URL.'user/edit/'.$value['id'].'">Edit</a></td>';
	// echo '<td align="center"   ><a href="'.URL.'user/delete/'.$value['id'].'">Delete</a></td>';	
// }
// echo '</table>';   '.URL.''.$value['id'].'"
?> 
<br /><br />
<div class="tabbed_area">  
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View User</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add User</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3"></a></li> 			
        </ul>   
        <div id="content_1" class="content">  
		<?php 
		echo "<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>";
		echo "<tr> 
		<th>id</th>
		<th>login</th> 
		<th>role</th> 
		<th>password</th>
		<th>Update </th>
		<th>Delete</th>
		<th>imprimer</th>
		</tr>";
		foreach($this->userListview as $key => $value){ ?>
				<tr>
				<td align="center"  > <?php echo $value['id'];    ?></td>
				<td align="left" > <?php echo $value['login']; ?></td>
				<td align="center" > <?php echo $value['role'];  ?></td>
				<td align="center" > <?php echo $value['password'];  ?></td>
				<td align="center"><a title="editer" href="<?php echo URL.'user/edit/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
				<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'user/delete/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
				<td align="center"><a title="imprimer pdf" href="<?php echo URL.'user/pdf/pdf.php?uc='.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/gs.jpg';?>' width='16' height='16' border='0' alt=''/></a></td>
				</tr>
		<?php 
		} 
		echo "</table>";
		
		if (isset($_SESSION['error']))
		{
		echo $_SESSION['error'];
		}

		?>
        </div> 
        <div id="content_2" class="content">  	  
		<form name="form1"  onsubmit="return validateForm(this);"  method="post" action="<?php echo URL;?>user/create">
		<label>Login</label><input type="text" name="login"  placeholder="login"     onfocus = "tooltip.pop(this, 'Login: <br />alphanumerique.');"   /><br />
		<label>Password</label><input type="text" name="password"   placeholder="password"  onfocus = "tooltip.pop(this, 'Password: <br />alphanumerique.');" /><br />
		<label>Role</label>
		<select name="role">
		<option value="default">Default</option>
		<option value="admin">Admin</option>
		<option value="owner">owner</option>
		</select><br />
		<label>&nbsp;</label><input type="submit" />
		</form>	  
        </div> 

       <div id="content_3" class="content">
		</div>
    </div>
