<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'image','weigth=toolbar=no,scrollbars=no,resizable=yes, width=220, height=268');	
	w.document.write("<HTML><BODY onblur=\"window.close();\"><IMG src='"+img+"'>");
	w.document.write("</BODY></HTML>");
	w.document.close();
}
</script>
<style type="text/css"> 
#Cancel{
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    width: 210px;
    line-height:25px;
    margin: 5px 0 0 10px;
    border: 1px solid gray;
     padding: 8px;
    background: yellow;
}
#Cancel:hover {
    cursor: pointer;
    background: white;
}
form button[type=submit]{
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    width: 210px;
    line-height:25px;
    margin: 5px 0 0 10px;
    border: 1px solid gray;
    padding: 4px;
    background: yellow;
}
form button[type=submit]:hover {
    cursor: pointer;
    background: white;
}
</style>
<div class="span-5 colborder">
	        <h3>Installation steps</h3>
	        <ol>
	        	<li <?php //if ($step == "introduction")    echo "class='current'"; ?>>Introduction</li>
				<li <?php //if ($step == "eula")            echo "class='current'"; ?>>EULA</li>
				<li <?php //if ($step == "requirements")    echo "class='current'"; ?>>Server requirements</li>
				<li <?php //if ($step == "filePermissions") echo "class='current'"; ?>>File permissions</li>
				<li <?php //if ($step == "database")        echo "class='current'"; ?>>Database connection</li>
				<li <?php //if ($step == "importSQL")       echo "class='current'"; ?>><b>Import SQL</b></li>
				<li <?php //if ($step == "done")            echo "class='current'"; ?>>Done</li>
	        </ol>
		</div>
<?php 
View::photosurl(1100,100,URL.'public/images/photos/LOGOAO.GIF');
//ob_start();
?>
<h3>Importing SQL</h3>

<p>Now we are importing the needed data into our database...</p>
<hr>

<?php 
    $errors = array();
	$goToNextStep = false;

	$host = $_SESSION['db_host'];
	$username = $_SESSION['db_user'];
	$password = $_SESSION['db_pass'];
	$database = $_SESSION['db_name'];

	// connect to db
	$con = mysql_connect($host, $username, $password);
	mysql_select_db($database, $con);
	
	// read import sql
	//$import = file_get_contents("config/import.sql");
	
	$queries = array();
	//PMA_splitSqlFile($queries, $import);
	
	// foreach ($queries as $query)
	// {
		// if (!mysql_query($query['query']))
		// {
			// $errors[] = "<b>".mysql_error()."</b><br>(".substr($query['query'], 0, 200)."...)";
		// }
	// }
   
	// close connection
	mysql_close($con);




if (count($errors) > 0) { 



?>
	<div class="error">Some errors occured while importing the SQL data!</div>
	
	<ul>
		<?php foreach ($errors as $error): ?>
			<li><?php echo $error; ?></li>
		<?php endforeach; ?>
	</ul>
<?php } else { ?>
	<div class="success">Data import succeeded!</div>
<?php } ?>

<hr>

		

<?php if (count($errors) == 0) { ?>
	<form action="<?php echo URL;?>setup/step6"   method="post">
		<a href="<?php echo URL;?>setup/" id="Cancel"><img src="<?php echo URL;?>public/images/icons/cross.png" alt=""/> Cancel</a>	

		<input type="hidden" name="nextStep" value="done">
		<button type="submit" class="button positive">
			<img src="<?php echo URL;?>public/images/icons/tick.png" alt=""/> Next
		</button>
	</form>
<?php } else { ?>
	<form action="<?php echo URL;?>setup/step5"  method="post">
		<a href="<?php echo URL;?>setup/" id="Cancel"><img src="<?php echo URL;?>public/images/icons/cross.png" alt=""/> Cancel</a>	

		<input type="hidden" name="nextStep" value="importSQL">
		<button type="submit" class="button positive">
			<img src="<?php echo URL;?>public/images/icons/tick.png" alt=""/> Retry
		</button>
	</form>
<?php } ?>

<?php
// view::sautligne(5);
//ob_end_flush();
?>
