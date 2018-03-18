<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'image','weigth=toolbar=no,scrollbars=no,resizable=yes, width=220, height=268');	
	w.document.write("<HTML><BODY onblur=\"window.close();\"><IMG src='"+img+"'>");
	w.document.write("</BODY></HTML>");
	w.document.close();
}
</script>
<?php 
verifsession();	
view::button('dnr','');
lang(Session::get('lang'));
ob_start();
view::munu('dnr'); 
$x=30;
$y=220;
echo "<div class=\"mydiv\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
?>
<form method="post" action="<?php echo URL.'pdf/impdnr.php' ;?>">
	<label>Ordre</label><?php   combov1('ordre',array("Nom"=>"NOM","Prenom"=>"PRENOM"));    ?><br />
	<label>Ascdesc</label><?php combov1('ascdesc',array("croissant"=>"asc","décroissant"=>"desc"));    ?><br />
	<label>MFT</label><?php     combov1('SEXE',array("Tous Masculin et Feminin"=>"IS NOT NULL","Masculin"=>"='M'","Feminin"=>"='F'"));?><br />
	<label>Groupage</label><?php combov1('groupage',array("Tous Groupage"=>"IS NOT NULL","A"=>"='A'","B"=>"='B'","AB"=>"='AB'","O"=>"='O'"));   ?><br />
	<label>Rhesus</label><?php   combov1('rhesus',array("Tous Rhesus "=>"IS NOT NULL","Positif"=>"='Positif'","negatif"=>"='negatif'"));?><br />
	<label>Nbrlimit</label><?php combov1('nbrlimit',array("Limiter A 10"=>"10","Limiter A 20"=>"20","Limiter A 30"=>"30","Limiter A 40"=>"40","Limiter A 50"=>"50","Limiter A 60"=>"60","Limiter A 70"=>"70","Limiter A 80"=>"80","Limiter A 90"=>"90","Limiter A 100"=>"100","Limiter A 1000"=>"1000","Limiter A 10000"=>"10000"));?><br />
	<label>&nbsp;</label><input type="submit" />
</form>
<?php
echo "</div>";
view::sautligne(12);
ob_end_flush();
?>










