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
    width: 220px;
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
				<li <?php //if ($step == "eula")            echo "class='current'"; ?>><b>EULA</b></li>
				<li <?php //if ($step == "requirements")    echo "class='current'"; ?>>Server requirements</li>
				<li <?php //if ($step == "filePermissions") echo "class='current'"; ?>>File permissions</li>
				<li <?php //if ($step == "database")        echo "class='current'"; ?>>Database connection</li>
				<li <?php //if ($step == "importSQL")       echo "class='current'"; ?>>Import SQL</li>
				<li <?php //if ($step == "done")            echo "class='current'"; ?>>Done</li>
	        </ol>
		</div>
<?php 
View::photosurl(1100,100,URL.'public/images/photos/LOGOAO.GIF');
ob_start();
?>
<h3>EULA</h3>
<div class="info">You must accept the EULA to continue!</div>
<textarea style="height: 230px; width: 70%;">
<?php
$eula = file_get_contents(URL."views\setup\eula.txt");
echo $eula; 
?>
</textarea>
<hr>
<form action="<?php echo URL;?>setup/step2"  method="post">
    <a href="<?php echo URL;?>setup/" id="Cancel"><img src="<?php echo URL;?>public/images/icons/cross.png" alt=""/> Cancel</a>
	<input type="hidden" name="nextStep" value="requirements">
	<button type="submit" class="button positive"><img src="<?php echo URL;?>public/images/icons/tick.png" alt=""/> I accept the "EULA"</button>
</form>
<?php
// view::sautligne(5);
ob_end_flush();
?>
