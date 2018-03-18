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
				<li <?php //if ($step == "requirements")    echo "class='current'"; ?>><b>Server requirements</b></li>
				<li <?php //if ($step == "filePermissions") echo "class='current'"; ?>>File permissions</li>
				<li <?php //if ($step == "database")        echo "class='current'"; ?>>Database connection</li>
				<li <?php //if ($step == "importSQL")       echo "class='current'"; ?>>Import SQL</li>
				<li <?php //if ($step == "done")            echo "class='current'"; ?>>Done</li>
	        </ol>
		</div>
<?php 
View::photosurl(1100,100,URL.'public/images/photos/LOGOAO.GIF');
//ob_start();
?>

<h3>Server requirements</h3>

<?php

    

	// php version
	// $currentPhpVersion = phpversion();
	// $phpVersionOk = version_compare($currentPhpVersion, $requirements['phpVersion']) >= 0;
	// if (!$phpVersionOk) $goToNextStep = false;
	
	// extensions
	// $loadedExtensions = get_loaded_extensions();
	// foreach ($loadedExtensions as $key => $ext) $loadedExtensions[$key] = strtolower($ext); 
	// $showExtensions = array();
	
	// foreach ($requirements['extensions'] as $ext)
	// {
		// $isLoaded = in_array($ext, $loadedExtensions);
		// $showExtensions[$ext] =  $isLoaded;
		// if (!$isLoaded) $goToNextStep = false;
	// }
	
	// show requirements
	// foreach ($requirements as $key => $value)
		// $$key = $value;
		
	// include("templates/requirements.php");


$goToNextStep = true;
if (!$goToNextStep) { 
?>
	<div class="error">Contact your webserver support (hosting service) to get the necessary PHP settings fixed and refresh this site!</div>
<?php } 

$currentPhpVersion = phpversion();
$phpVersionOk = version_compare($currentPhpVersion, 5) >= 0;
$loadedExtensions = get_loaded_extensions();
foreach ($loadedExtensions as $key => $ext) $loadedExtensions[$key] = strtolower($ext); 
$showExtensions = array();
$extensions = array("mysql", "pcre","zip");

foreach ($extensions as $ext)
	{
		$isLoaded = in_array($ext, $loadedExtensions);
		$showExtensions[$ext] =  $isLoaded;
		if (!$isLoaded) $goToNextStep = false;
	}

?>

<h4>PHP Version</h4>

<table  width='65%' >
	<thead>
		<tr>
			<th>Name</th>
			<th>Version</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<tr bgcolor="white">
			<td>Required</td>
			<td><?php //echo $phpVersion; ?></td>
			<td></td>
		</tr>
		<tr bgcolor="white">
			<td>You have</td>
			<td><?php echo $currentPhpVersion; ?></td>
			<td>
			<?php 
			if ($phpVersionOk) { 
			?> 
			<img src="<?php echo URL;?>public/images/icons/accept.png"> OK 
			<?php 
			} else { 
			?> 
			<img src="<?php echo URL;?>public/images/icons/cancel.png"> Below requirement! Please update your PHP installation.
			<?php
			}
			?>
			</td>
		</tr>
	</tbody>
</table>
<hr>

<h4>PHP Extensions</h4>

<table width='65%'  >
	<thead>
		<tr>
			<th>Name</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($showExtensions as $extension => $status): ?>
		<tr bgcolor="white">
			<td><?php echo $extension; ?></td>
			<td><?php if ($status) { ?> <img src="<?php echo URL;?>public/images/icons/accept.png"> OK <?php } else { ?> <img src="<?php echo URL;?>public/images/icons/cancel.png"> Not installed!<?php } ?> </td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<hr>




<?php if ($goToNextStep) { ?>
	<form action="<?php echo URL;?>setup/step3" method="post">
		<a href="<?php echo URL;?>setup/" id="Cancel"><img src="<?php echo URL;?>public/images/icons/cross.png" alt=""/> Cancel</a>
		<input type="hidden" name="nextStep" value="filePermissions">
		<button type="submit" class="button positive">
			<img src="<?php echo URL;?>public/images/icons/tick.png" alt=""/> Next
		</button>
	</form>
<?php } else { ?>
	<form action="<?php echo URL;?>setup/step2" method="post">
		<a href="<?php echo URL;?>setup/" id="Cancel"><img src="<?php echo URL;?>public/images/icons/cross.png" alt=""/> Cancel</a>
		<input type="hidden" name="nextStep" value="requirements">
		<button type="submit" class="button positive">
			<img src="<?php echo URL;?>public/images/icons/tick.png" alt=""/> Retry
		</button>
	</form>
<?php } ?>
<?php
// view::sautligne(5);
//ob_end_flush();
?>
