<?php 
verifsession();	
view::button('eva','');
?>
<h3><?php echo $this->flv ;?></h3>
<hr/><br/>
<center>
<object type="application/x-shockwave-flash" data="<?php echo URL;?>views/doc/jerome pages/player_flv.swf" width="500" height="350">
	<param name="movie" value="player_flv.swf" />
	<param name="allowFullScreen" value="true" />
	<param name="FlashVars" value="flv=<?php echo $this->flv ;?>" />
</object>
</center>
