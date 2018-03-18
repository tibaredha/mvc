<?php 
verifsession();	
view::button('pre','');
?>
<h1>Preparation: imp</h1>
<hr /><br />
<form method="post" action="<?php echo URL.'pdf/imppre.php' ;?>">
	<label>ordre</label><?php   combov1('ordre',array("IDP"=>"IDP","IDDNR"=>"IDDNR","DATE DON"=>"DATEDON"));   ?><br />
	<label>ascdesc</label><?php combov1('ascdesc',array("décroissant"=>"desc","croissant"=>"asc"));    ?><br />
	<label>groupage</label><?php combov1('groupage',array("Tous Groupage"=>"IS NOT NULL","A"=>"='A'","B"=>"='B'","AB"=>"='AB'","O"=>"='O'"));   ?><br />
	<label>rhesus</label><?php   combov1('rhesus',array("Tous Rhesus "=>"IS NOT NULL","Positif"=>"='Positif'","negatif"=>"='negatif'"));?><br />
	<label>fixemobile</label><?php combov1('fixemobile',array("Tous Fixe et Mobile"=>"IS NOT NULL","fixe"=>"='FIXE'","mobile"=>"='MOBILE'"));?><br />
	<label>indication</label><?php combov1('IND',array("IND"=>"='IND'","CIDT"=>"='CIDT'","CIDD"=>"='CIDD'"));?><br />
	<label>nbrlimit</label><?php combov1('nbrlimit',array("Limiter A 10"=>"10","Limiter A 20"=>"20","Limiter A 30"=>"30","Limiter A 40"=>"40","Limiter A 50"=>"50","Limiter A 60"=>"60","Limiter A 70"=>"70","Limiter A 80"=>"80","Limiter A 90"=>"90","Limiter A 100"=>"100","Limiter A 1000"=>"1000","Limiter A 10000"=>"10000"));?><br />
	<label>&nbsp;</label><input type="submit" />
</form>