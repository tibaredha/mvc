<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'image','weigth=toolbar=no,scrollbars=no,resizable=yes, width=220, height=268');	
	w.document.write("<HTML><BODY onblur=\"window.close();\"><IMG src='"+img+"'>");
	w.document.write("</BODY></HTML>");
	w.document.close();
}
</script>
<?php 
verifsession();ob_start();
view::lang(Session::get('lang'),'C:\wamp\www\mvc\views\hemod\langan.php');  
view::button('hemod','');
view::munu('hemos'); 
view::photosurl(1070,220,URL.'public/webcam/hemo/hemodialyse.jpg');	
$x=30;
$y=250;
echo "<div class=\"mydiv\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
view::f0(URL.'pdf/hemod/imps.php','post');
?>

	<label>Ordre</label>   <?php combov1('ordre',array("Date Seance"=>"dateseance","ID malade"=>"id","N APP"=>"NAPP"));    ?><br/>    
	<label>Ascdesc</label> <?php combov1('ascdesc',array("croissant"=>"asc","décroissant"=>"desc"));    ?><br/>
	<label>Type Dialyse</label>     <?php combov1('TYPEDIA',array("Tous Type Dialyse "=>"IS NOT NULL","Programme"=>"='PROGRAMME'","Urgence"=>"='URGENCE'"));?><br />
	<label>Tous Acc Sang</label><?php combov1('ACCSANG',array("Tous Acc Sang"=>"IS NOT NULL","FAV"=>"='FAV'","CCJ"=>"='CCJ'"));   ?><br />
	<label>****</label>  <?php //combov1('rhesus',array("Tous Rhesus "=>"IS NOT NULL","Positif"=>"='Positif'","negatif"=>"='negatif'"));?><br />
	<label>Nbrlimit</label><?php combov1('nbrlimit',array("Limiter A 10"=>"10","Limiter A 20"=>"20","Limiter A 30"=>"30","Limiter A 40"=>"40","Limiter A 50"=>"50","Limiter A 60"=>"60","Limiter A 70"=>"70","Limiter A 80"=>"80","Limiter A 90"=>"90","Limiter A 100"=>"100","Limiter A 1000"=>"1000","Limiter A 10000"=>"10000"));?><br />
	

<?php
view::submit(770,$x+230,'Imprimer sous pdf');
view::f1();
echo "</div>";
view::sautligne(12);
ob_end_flush();
?>










