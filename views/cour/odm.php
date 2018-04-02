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
"butun"      => 'Inser Ordre de mission ', 
"photos"     => 'public/images/icons/mision.jpg',
"action"     => 'tcpdf/inspection/odm.php'
);
view::button($data['btn'],'');
echo "<h2>Ordre de mission</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$url1 = explode('/',$_GET['url']);
if (isset($url1[2]) and $url1[2]!=='' ) 
{
$NAR = view::nbrtostring('courar','id',$url1[2],'NAR');
} 
else 
{
$NAR=view::lastid("courar");
}
$this->label($x,$y+250,'N° mission');$this->txt($x+110,$y+240,'NM',0,$NAR+1,'dateus');
$this->label($x,$y+250+30,'Nom et Prénom');$this->txt($x+110,$y+240+30,'NOMPRENOM',0,'طيبة رضا','dateus');  
$this->label($x,$y+250+60,'Fonction');$this->txt($x+110,$y+240+60,'FONCTION',0,'طبيب مفتش في الصحة العمومية','dateus');
$this->label($x,$y+250+90,'Destination');$this->txt($x+110,$y+240+90,'DEST',0,'الجلفـــــــــة','date');
$this->label($x,$y+250+120,'Date depart');  $this->txts($x+110,$y+240+120,'DATED',0,date('d-m-Y'),'dateus'); 
$this->label($x,$y+250+150,'Date retour');  $this->txt($x+110,$y+240+150,'DATEA',0,'نهاية المهمة','dateus');  
$this->label($x,$y+250+180,'NBR personne');$this->txt($x+110,$y+240+180,'NBRP',0,'02','date');
$this->label($x,$y+250+180+30,'NUM véhicule');$this->txt($x+110,$y+240+180+30,'NUMV',0,'00000-00-17','date');
$this->label($x,$y+250+180+60,'Objet');$this->txt($x+110,$y+240+180+60,'OBJ',0,'مهمة تفتيشية','date');
$this->submit($x+110,$y+250+180+90,$data['butun']);
$this->f1();
view::sautligne(12);
ob_end_flush();
?>