<?php 
verifsession();
// view::button('cons',$this->user[0]['id']);
?>
<h1>Hospitalisation : Edit service</h1>
<hr /><br />
<form method="post" action="<?php echo URL;?>pat/editSaveservice/<?php echo $this->user[0]['id']; ?>">
<label>DATE HOSPITALISATION</label><input type="text" name="DATEDON" value="<?php echo $this->user[0]['DATEDON']; ?>" /><br />
<label>SERVICE</label>
<?php
View::comboservice1(1,1,'SERVICE','SERVICE',$this->user[0]['SERVICE'],nbrtostring('service','ids',$this->user[0]['SERVICE'],'servicefr'),'ids','servicefr','SERVICE') ;	
?>
<br />
<label>NLIT</label>
<?php	
View::NLIT1(410,410,"NLIT",$this->user[0]['NLIT'],nbrtostring('lit','idlit',$this->user[0]['NLIT'],'nlit'));	
?>
<br />
<label>&nbsp;</label><input type="submit" />
</form>	