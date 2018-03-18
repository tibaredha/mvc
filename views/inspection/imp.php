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
view::button('inspection','');
lang(Session::get('lang'));
ob_start();
view::munu('inspection'); 
$x=30;
$y=220;
echo "<div class=\"mydiv\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
?>
<form method="post" action="<?php echo URL.'pdf/inspection/imp.php' ;?>">
	<label>Ordre</label><?php   combov1('ordre',array("Nom"=>"NOM","Prenom"=>"PRENOM","Date"=>"DATE"));    ?><br />
	<label>Ascdesc</label><?php combov1('ascdesc',array("croissant"=>"asc","décroissant"=>"desc"));    ?><br />
	<label>MFT</label><?php     combov1('SEXE',array("Tous Masculin et Feminin"=>"IS NOT NULL","Masculin"=>"='M'","Feminin"=>"='F'"));?><br />
	<label>Structure</label>
	<?php 
	combov1('STRUCTURED',array(
	                    "Tous Structure"=>"IS NOT NULL",
	                    "EHU"=>"='1'",
					    "CHU"=>"='2'",
						"EPH"=>"='3'",
						"EH"=>"='4'",
						"EHS"=>"='5'",
						"EPSP"=>"='6'",
						"Polyclinique"=>"='7'",
						"Salle de soins"=>"='8'",
						"EHP"=>"='9'",
						"centre d hemodialyse"=>"='10'",
						"centre de diagnostic"=>"='11'",
						"officine pharmaceutique"=>"='12'",
						"laboratoire"=>"='13'",
						"cabinet chirurugien dentiste specialiste"=>"='14'",
						"cabinet chirurugien dentiste generaliste"=>"='15'",
						"cabinet medecin specialiste"=>"='16'",
						"cabinet medecin generaliste"=>"='17'",
						"cabinet sagefemme"=>"='18'", 
						"cabinet psychologue"=>"='19'", 
						"cabinet de soins "=>"='20'", 
						"transport sanitairee"=>"='21'" 
	                    ));  
$x=550;$y=-300;	
$this->label($x,$y+310,'Wilaya');            $this->WILAYA($x+100,$y+300,'WILAYA','country','mvc','wil','','wilaya');
$this->label($x,$y+340,'Commune');       $this->COMMUNE($x+100,$y+330,'COMMUNE','COMMUNEN','','commune');
	?>
	<br />
	<label>Nbrlimit</label><?php combov1('nbrlimit',array("Limiter A 10"=>"10","Limiter A 20"=>"20","Limiter A 30"=>"30","Limiter A 40"=>"40","Limiter A 50"=>"50","Limiter A 60"=>"60","Limiter A 70"=>"70","Limiter A 80"=>"80","Limiter A 90"=>"90","Limiter A 100"=>"100","Limiter A 1000"=>"1000","Limiter A 10000"=>"10000"));?><br />
	<label>&nbsp;</label><input type="submit" />
</form>
<?php
echo "</div>";
view::sautligne(14);
ob_end_flush();
?>










