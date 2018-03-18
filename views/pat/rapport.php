<?php 
verifsession();	
view::button('pat','');
?>
<h2>Evaluation : Activites Patients </h2 >
<hr /><br />
<?php 
eva11('pat',array("Rapport De Garde"=>"1","Envenimation Scorpionique"=>"2","Morsures De Chiens"=>"3","Deces Hospitalier"=>"4"),URL.'pdf/rapport.php');
?>