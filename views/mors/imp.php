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
view::button('maldecobl','');
lang(Session::get('lang'));
ob_start();
view::munu('maldecobl'); 
$x=30;
$y=220;
echo "<div class=\"mydiv\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
?>
<form method="post" action="<?php echo URL.'pdf/mdo/impmdo.php' ;?>">
	<label>Ordre</label>    <?php combov1('ordre',array("Date"=>"DATEMDO","Nom Prenom"=>"NOMPRENOM","Age"=>"AGE"));?><br />
	<label>Ascdesc</label>  <?php combov1('ascdesc',array("croissant"=>"asc","décroissant"=>"desc"));?><br />
	<label>Sexe</label>     <?php combov1('sexe',array("MF"=>"IS NOT NULL","M"=>"='M'","F"=>"='F'"));?><br />
	<label>MDO</label>      <?php combov1('MDO',array("MDO"=>"IS NOT NULL","CHOLERA"=>"='1'","FIEVRE TYPHOIDE ET PARA TYPHOIDE"=>"='2'","DYSENTERIE AMIBIENNE ET BACILLAIRE"=>"='3'","TOXI INFECTION ALIMENTAIRES COLLECTIVES"=>"='4'","HEPATITE VIRALE"=>"='5'","DIPHTERIE"=>"='6'","TETANOS"=>"='7'","COQUELUCHE"=>"='8'","POLIOMYELITE"=>"='9'","ROUGEOLE"=>"='10'","MENINGITES CEREBROSPINALE"=>"='11'","AUTRES MENINGITES"=>"='12'","TUBERCULOSE"=>"='13'","PALUDISME"=>"='14'","LEISHMANIOSE CUTANEE"=>"='15'","LEISHMANIOSE VISCERALE"=>"='16'","KYSTE HYDATIQUE"=>"='17'","RAGE"=>"='18'","CHARBON"=>"='19'","BRUCELLOSE"=>"='20'","BILHARZIOSE"=>"='21'","LEPRE"=>"='22'","LEPTOSPIROSE"=>"='23'","URETRITES GONOCOCCIQUE"=>"='24'","URETRITES NON GONOCOCCIQUE"=>"='25'","SYPHILIS"=>"='26'","INFECTION PAR LE VIH"=>"='27'","TYPHUS EXANTHEMATIQUE"=>"='28'","AUTRES RICKETSIOSES"=>"='29'","PESTE"=>"='30'","FIEVRE JAUNE"=>"='31'","TRACHOME"=>"='32'"));?><br />
	<label>COMMUNE</label>  <?php combov1('COMMUNEN',array("Communes"=>"IS NOT NULL","Ain Chouhada"=>"='964'","Ain el Ibel"=>"='958'","Ain Fekka"=>"='934'","Ain Maabed"=>"='941'","Ain Oussera "=>"='924'","Amourah "=>"='968'","Benhar"=>"='931'","Beni Yacoub"=>"='923'","Birine"=>"='929'","Bouira Lahdab "=>"='933'","Charef"=>"='920'","Dar Chioukh "=>"='942'","Deldoul "=>"='952'","Djelfa"=>"='916'","Douis "=>"='963'","El Guedid "=>"='919'","El Idrissia "=>"='917'","El Khemis"=>"='928'","Faidh el Botma"=>"='967'","Guernini"=>"='925'","Guettara"=>"='951'","Had-Sahary"=>"='932'","Hassi Bahbah"=>"='935'","Hassi el Euch"=>"='940'","Hassi Fedoul"=>"='927'","M'Liliha "=>"='946'","Messad"=>"='948'","Mouadjebar"=>"='957'","Oum Laadham "=>"='956'","Sed Rahal "=>"='953'","Selmana "=>"='954'","Sidi Baizid"=>"='947'","Sidi Ladjel "=>"='926'","Tadmit "=>"='965'","Zaafrane "=>"='939'","Zaccar"=>"='962'"));?><br />
	<label>Nbrlimit</label> <?php combov1('nbrlimit',array("Limiter A 10"=>"10","Limiter A 20"=>"20","Limiter A 30"=>"30","Limiter A 40"=>"40","Limiter A 50"=>"50","Limiter A 60"=>"60","Limiter A 70"=>"70","Limiter A 80"=>"80","Limiter A 90"=>"90","Limiter A 100"=>"100","Limiter A 1000"=>"1000","Limiter A 10000"=>"10000"));?><br />
	<label>&nbsp;</label><input type="submit" />
</form>
<?php
echo "</div>";
view::sautligne(12);
ob_end_flush();
?>










