<h1>Dump  Sauvegarde data base : activites Décés   </h1><hr><br/>
    
<?php 
verifsession();	
view::button('deces','');
view::sautligne(5);
dump_MySQL("127.0.0.1","root","","mvc",2);
view::sautligne(25);
?>	    
		
		
	
	
	
	 
	 