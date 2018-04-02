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
lang(Session::get('lang'));
ob_start();
$data = array(
"btn"        => 'cour', 
"id"         => '', 
"butun"      => 'Diffuser le courrier', 
"photos"     => 'public/images/icons/disp.jpg',
"action"     => 'cour/Diffcour1/'
);
view::button($data['btn'],'');
echo "<h2>Diffuser le courrier aux Destinataires </h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+250,'Date');                 $this->txts($x+40,$y+240-5,'DATE',0,date('d-m-Y'),'dateus');  
$this->label($x+100,$y+250+30,'DSP');           $this->chekboxed($x+50+100,$y+250+30-5,'DSP');
$this->label($x+100,$y+250+60,'INSP');          $this->chekbox($x+50+100,$y+250+60-5,'INSP');
$this->label($x+100,$y+250+90,'SAS');           $this->chekbox($x+50+100,$y+250+90-5,'SAS');
$this->label($x+100,$y+250+120,'PRV');          $this->chekbox($x+50+100,$y+250+120-5,'PRV');
$this->label($x+100,$y+250+150,'DRH');          $this->chekbox($x+50+100,$y+250+150-5,'DRH');
$this->label($x+100,$y+250+180,'PLF');          $this->chekbox($x+50+100,$y+250+180-5,'PLF');
View::hide(215,670,'id',0,$this->id[0]);
$this->submit($x+40,$y+280+180,$data['butun']);
$this->f1();
view::sautligne(12);
ob_end_flush();
?>