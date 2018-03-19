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
"btn"        => 'rds', 
"id"         => '', 
"butun"      => 'Inser Nouvelle Rupture ', 
"photos"     => 'public/images/photos/rds.jpg',
"action"     => 'rds/createrds/',
"CMM"  => '0' ,					  
"RES"  => '0' 
);
view::button($data['btn'],'');
echo "<h2>Nouvelle Rupture de Pharmaceutique  </h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$url1 = explode('/',$_GET['url']);if ($url1[2]!=='') {$date  = view::dateUS2FR(view::nbrtostring('rds','id',$url1[2],'DATE'));echo '</br>';$struc = view::nbrtostring('rds','id',$url1[2],'STRUCTURE');echo '</br>';$trds = view::nbrtostring('rds','id',$url1[2],'NATURE');echo '</br>';} else {$date  = date('j-m-Y');$struc = '';$trds = ''; }
$this->label($x,$y+250,'Date Rupture');     $this->txts($x+100,$y+240,'DATE',0,$date,'dateus');  
$this->label($x,$y+250+30,'Structure');     $this->combords($x+100,$y+270,'STRUCTURE','srds',$struc,view::nbrtostring('srds','id',$struc,'etas'),'$class',0,1) ; 
$this->label($x,$y+250+60,'Nature');        View::combords2($x+100,$y+300,'NATURE','trds',$trds,view::nbrtostring('trds','id',$trds,'trds'),'$class',0,1);
View::url($x,$y+250+70,URL.'rds/newpro/','Produit +',4);View::medicament($x+100,$y+330,'PRODUIT','mvc','pha');//$this->combords1($x+100,$y+300,'PRODUIT','pha1','','','$class',0,2,3,4,5,6) ; 
$this->label($x,$y+250+120,'CMM');          $this->txt($x+100,$y+240+120,'CMM',0,$data['CMM'],'date');
$this->label($x,$y+250+150,'RES');          $this->txt($x+100,$y+240+150,'RES',0,$data['RES'],'date');
$this->submit($x+100,$y+250+180,$data['butun']);
$this->f1();
view::sautligne(22);
ob_end_flush();
?>