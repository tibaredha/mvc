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
"butun"      => 'Inser Courrier Arrivé ', 
"photos"     => 'public/images/photos/ar.jpg',
"action"     => 'cour/createcour/'
);
view::button($data['btn'],'');
echo "<h2>Courrier Arrivé</h2 ><hr /><br />";
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
$NARCH=view::lastid("courarch");
$this->label($x,$y+250,'Date Arrivé');       $this->txts($x+100,$y+240,'DATEAR',0,date('d-m-Y'),'dateus');  
$this->label($x,$y+250+30,'N° Arrivé');      $this->txtron($x+100,$y+240+30,'NAR',0,$NAR+1,'dateus');

$this->label($x+340,$y+250,'Date Courrier');     $this->txts($x+440,$y+240,'DATECR',0,date('d-m-Y'),'dateus1');  
$this->label($x+340,$y+250+30,'N° Courrier');    $this->txt($x+440,$y+240+30,'NCR',0,'0','dateus');


$this->label($x+700,$y+250,'Expediteur');       $this->txt($x+800,$y+240,'EXP',0,'x','date');
$this->label($x+700,$y+250+30,'Objet');         $this->txt($x+800,$y+240+30,'OBJ',0,'x','date');
$this->label($x+700,$y+250+60,'N° Archive');    $this->txtron($x+800,$y+240+60,'NA',0,$NARCH+1,'date');



$this->submit($x+100,$y+250+180+30,$data['butun']);
$this->f1();
view::sautligne(12);
ob_end_flush();
?>