<?php 
verifsession();	
view::button('eva','');

?>
<h2>Sauvegarde data base : activites STS </h2 >
<hr /><br />

<?php
dump_MySQL("127.0.0.1","root","","mvc",2);
?>