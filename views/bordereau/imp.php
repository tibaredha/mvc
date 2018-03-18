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
view::button('Bordereau','');
lang(Session::get('lang'));
ob_start();
view::munu('Bordereau'); 
$x=30;
$y=220;
echo "<div class=\"mydiv\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
?>
<form method="post" action="<?php echo URL.'pdf/bnm/impbnm.php' ;?>">
	<label>Ordre</label>    <?php combov1('ordre',array("Mois"=>"mois","Annee"=>"annee","Commune"=>"COMMUNEN"));?><br />
	<label>Ascdesc</label>  <?php combov1('ascdesc',array("croissant"=>"asc","décroissant"=>"desc"));?><br />
	<label>MOIS</label>     <?php combov1('mois',array("mois"=>"IS NOT NULL","1"=>"='1'","2"=>"='2'","3"=>"='3'","4"=>"='4'","5"=>"='5'","5"=>"='5'","6"=>"='6'","7"=>"='7'","8"=>"='8'","9"=>"='9'","10"=>"='10'","11"=>"='11'","12"=>"='12'"));?><br />
	<label>ANNEE</label>    <?php combov1('annee',array("Annees"=>"IS NOT NULL","2015"=>"='2015'","2016"=>"='2016'"));?><br />
	<label>COMMUNE</label>  <?php combov1('COMMUNEN',array("Communes"=>"IS NOT NULL","Ain Chouhada"=>"='964'","Ain el Ibel"=>"='958'","Ain Fekka"=>"='934'","Ain Maabed"=>"='941'","Ain Oussera "=>"='924'","Amourah "=>"='968'","Benhar"=>"='931'","Beni Yacoub"=>"='923'","Birine"=>"='929'","Bouira Lahdab "=>"='933'","Charef"=>"='920'","Dar Chioukh "=>"='942'","Deldoul "=>"='952'","Djelfa"=>"='916'","Douis "=>"='963'","El Guedid "=>"='919'","El Idrissia "=>"='917'","El Khemis"=>"='928'","Faidh el Botma"=>"='967'","Guernini"=>"='925'","Guettara"=>"='951'","Had-Sahary"=>"='932'","Hassi Bahbah"=>"='935'","Hassi el Euch"=>"='940'","Hassi Fedoul"=>"='927'","M'Liliha "=>"='946'","Messad"=>"='948'","Mouadjebar"=>"='957'","Oum Laadham "=>"='956'","Sed Rahal "=>"='953'","Selmana "=>"='954'","Sidi Baizid"=>"='947'","Sidi Ladjel "=>"='926'","Tadmit "=>"='965'","Zaafrane "=>"='939'","Zaccar"=>"='962'"));?><br />
	<label>Nbrlimit</label> <?php combov1('nbrlimit',array("Limiter A 10"=>"10","Limiter A 20"=>"20","Limiter A 30"=>"30","Limiter A 40"=>"40","Limiter A 50"=>"50","Limiter A 60"=>"60","Limiter A 70"=>"70","Limiter A 80"=>"80","Limiter A 90"=>"90","Limiter A 100"=>"100","Limiter A 1000"=>"1000","Limiter A 10000"=>"10000"));?><br />
	<label>&nbsp;</label><input type="submit" />
</form>
<?php
echo "</div>";
view::sautligne(12);
ob_end_flush();
?>










