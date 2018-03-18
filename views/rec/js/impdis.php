<?php 
verifsession();	
buttondis();
?>
<h1>Distribution: imp</h1>
<br /><br />
<hr /><br />
<form method="post" action="<?php echo URL.'pdf/impdis.php' ;?>">
	<label>ordre</label><?php   combov1('ordre',array("IDP"=>"IDP","IDREC"=>"IDREC","DATEDIS"=>"DATEDIS"));   ?><br />
	<label>ascdesc</label><?php combov1('ascdesc',array("décroissant"=>"desc","croissant"=>"asc"));    ?><br />
	<label>groupage</label><?php combov1('groupage',array("Tous Groupage"=>"IS NOT NULL","A"=>"='A'","B"=>"='B'","AB"=>"='AB'","O"=>"='O'"));   ?><br />
	<label>rhesus</label><?php   combov1('rhesus',array("Tous Rhesus "=>"IS NOT NULL","Positif"=>"='Positif'","negatif"=>"='negatif'"));?><br />
	<label>PSL</label><?php combov1('PSL',array("Tous PSL"=>"IS NOT NULL","CGR"=>"='CGR'","PFC"=>"='PFC'","CPS"=>"='CPS'"));?><br />
	<label>SERVICE</label><?php combov1('SERVICE',array("Tous Service "=>"IS NOT NULL","PTS"=>"='1'","MEDECINE HOMME"=>"='2'","MEDECINE FEMME"=>"='3'","CHIRURGIE HOMME"=>"='4'","CHIRURGIE FEMME"=>"='5'","GYNECO"=>"='6'","MATERNITE"=>"='7'","PEDIATRIE"=>"='8'","BLOC OPP A"=>"='9'","BLOC OPP B"=>"='10'","UMC"=>"='11'","HEMODIALYSE"=>"='12'"));?><br />                                             
	<label>nbrlimit</label><?php combov1('nbrlimit',array("Limiter A 10"=>"10","Limiter A 20"=>"20","Limiter A 30"=>"30","Limiter A 40"=>"40","Limiter A 50"=>"50","Limiter A 60"=>"60","Limiter A 70"=>"70","Limiter A 80"=>"80","Limiter A 90"=>"90","Limiter A 100"=>"100","Limiter A 1000"=>"1000","Limiter A 10000"=>"10000"));?><br />
	<label>&nbsp;</label><input type="submit" />
</form>

    
    
	
	
	
	





