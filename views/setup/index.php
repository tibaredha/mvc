<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'image','weigth=toolbar=no,scrollbars=no,resizable=yes, width=220, height=268');	
	w.document.write("<HTML><BODY onblur=\"window.close();\"><IMG src='"+img+"'>");
	w.document.write("</BODY></HTML>");
	w.document.close();
}
</script>

<style type="text/css">
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

/* #colborder{
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    width: 210px;
	border: 1px solid gray;
    background: yellow;
	padding: 4px;
	margin: 5px 0 0 10px;
} */



</style>



<hr>
<div id="colborder">
	        <h3>Installation steps</h3>
	        <ol>
	        	<li <?php //if ($step == "introduction")    echo "class='current'"; ?>><b>Introduction</b></li>
				<li <?php //if ($step == "eula")            echo "class='current'"; ?>>EULA</li>
				<li <?php //if ($step == "requirements")    echo "class='current'"; ?>>Server requirements</li>
				<li <?php //if ($step == "filePermissions") echo "class='current'"; ?>>File permissions</li>
				<li <?php //if ($step == "database")        echo "class='current'"; ?>>Database connection</li>
				<li <?php //if ($step == "importSQL")       echo "class='current'"; ?>>Import SQL</li>
				<li <?php //if ($step == "done")            echo "class='current'"; ?>>Done</li>
	        </ol>
		</div>
<div id="colborder1">
<?php 
View::photosurl(1100,100,URL.'public/images/photos/logofinal.png');
ob_start();
echo'';
	echo'<h3>Introduction</h3>';
	echo '<p>You are about to install ';
	echo '<b>GPTS Setup Wizard';
	//echo $product; 
	echo '</b>';
	echo '(Version: 6.0';
	//echo $productVersion;
	echo ') developed by';
	echo '<b> PTS EPH AO DJELFA';
	//echo $company;
	echo '</b>.</p>';
	echo '<form action="'.URL.'setup/step1" method="post">';
	echo '<input type="hidden" name="nextStep" value="eula"> <br />';
	// echo '<label></label>         <input type="submit" />';
	echo '<button type="submit" class="button positive"><img src="'.URL.'public/images/icons/tick.png" alt=""/> Start</button>';
	echo '</form>';
echo '';
?>
</div>
<hr>
<?php
//view::sautligne(5);
ob_end_flush();
?>
