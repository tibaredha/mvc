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
"butun"      => 'Inser Courrier Depart ', 
"photos"     => 'public/images/photos/dep.jpg',
"action"     => 'cour/createcour1/',
"EXP"  => array(      
                        "DSP"=>"1",
					    "INSP"=>"2",
						"PRV"=>"3",
						"SAS"=>"4",
						"DRH"=>"5",
						"PLA"=>"6"
					  ),					  

);
view::button($data['btn'],'');
echo "<h2>Courrier Depart</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;

$url1 = explode('/',$_GET['url']);
if (isset($url1[2]) and $url1[2]!=='' ) 
{
$NDP = view::nbrtostring('courdep','id',$url1[2],'NDP');
//$NARCH = view::nbrtostring('courarch','id',$url1[2],'NDP');
} 
else 
{
$NDP=view::lastid("courdep");
}
$NARCH=view::lastid("courarch");
$this->label($x,$y+250,'Date Depart');       $this->txts($x+100,$y+240,'DATEDP',0,date('d-m-Y'),'dateus');  
$this->label($x,$y+250+30,'N° Depart');      $this->txtron($x+100,$y+240+30,'NDP',0,$NDP+1,'dateus');
$this->label($x,$y+250+60,'Ref Arrivé');     $this->combocour($x+100,$y+240+60,'REF','courar',0,'N°_DATE_OBJET','$class',0,6) ; //view::nbrtostring('srds','id',$struc,'etas')
$this->label($x,$y+250+90,'Nbr Piece');      $this->txt($x+100,$y+240+90,'NP',0,'0','dateus');  
$this->label($x,$y+250+120,'Destinataire');  $this->txt($x+100,$y+240+120,'DEST',0,'X','dateus');
$this->label($x,$y+250+150,'Objet');         $this->txt($x+100,$y+240+150,'OBJ',0,'X','date');
$this->label($x,$y+250+180,'N° Archive');    $this->txtron($x+100,$y+240+180,'NA',0,$NARCH+1,'date');
$this->label($x,$y+250+180+30,'Observation');$this->txt($x+100,$y+240+180+30,'OBS',0,'X','date');
$this->label($x,$y+250+150+90,'Expediteur'); $this->combov1($x+100,$y+240+150+90,'EXP',$data['EXP']);
$this->submit($x+100,$y+250+180+80,$data['butun']);
$this->f1();
view::sautligne(12);
ob_end_flush();
?>