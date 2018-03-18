<?php 
verifsession();	
view::button('rec','');
lang(Session::get('lang'));
ob_start();
view::munu('rec'); 
?>
<br />
<form method="post" action="<?php echo URL.'pdf/imprec.php' ;?>">
	<label>ordre</label><?php   combov1('ordre',array("Nom"=>"NOM","Prenom"=>"PRENOM"));    ?><br />
	<label>ascdesc</label><?php combov1('ascdesc',array("croissant"=>"asc","décroissant"=>"desc"));    ?><br />
	<label>MFT</label><?php     combov1('SEXE',array("Tous Masculin et Feminin"=>"IS NOT NULL","Masculin"=>"='M'","Feminin"=>"='F'"));?><br />
	<label>groupage</label><?php combov1('groupage',array("Tous Groupage"=>"IS NOT NULL","A"=>"='A'","B"=>"='B'","AB"=>"='AB'","O"=>"='O'"));   ?><br />
	<label>rhesus</label><?php   combov1('rhesus',array("Tous Rhesus "=>"IS NOT NULL","Positif"=>"='Positif'","negatif"=>"='negatif'"));?><br />
	<label>nbrlimit</label><?php combov1('nbrlimit',array("Limiter A 10"=>"10","Limiter A 20"=>"20","Limiter A 30"=>"30","Limiter A 40"=>"40","Limiter A 50"=>"50","Limiter A 60"=>"60","Limiter A 70"=>"70","Limiter A 80"=>"80","Limiter A 90"=>"90","Limiter A 100"=>"100","Limiter A 1000"=>"1000","Limiter A 10000"=>"10000"));?><br />
	<label>&nbsp;</label><input type="submit" />
</form>







