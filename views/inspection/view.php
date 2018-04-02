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
$fichier = photosmfx('str',$this->user[0]['id'].'.jpg',$this->user[0]['SEX']) ;
$data = array(
"DATE"      => view::dateUS2FR($this->user[0]['DATE']),
"btn"       => 'inspection', 
"id"        => '', 
"butun"     => 'Edite  Structure', 
"photos"    => 'public/webcam/str/'.$fichier."?t=".time(),
"action"    => 'inspection/***/'.$this->user[0]['id'],

"NATURE"  => array( 
                        $this->user[0]['NATURE']=>$this->user[0]['NATURE'],
                        "PUBLIC"=>"1",
					    "PRIVEE"=>"2"	   
					  ),					  
"SEXE"  => array( 
                       $this->user[0]['SEX']=>$this->user[0]['SEX'],  
                       "Masculin"=>"M",
					   "Feminin"=>"F"					   			   
					  ),					  
"NOM"  => $this->user[0]['NOM'] ,
"NOMAR"  => $this->user[0]['NOMAR'] ,
"PRENOM"  => $this->user[0]['PRENOM'] ,	
"PRENOMAR"  => $this->user[0]['PRENOMAR'] ,					  
"AGE"  => '0' ,
"WILAYAN1"  => $this->user[0]['WILAYA'] ,"WILAYAN2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA'],'WILAYAS'),
"COMMUNEN1" => $this->user[0]['COMMUNE'] ,"COMMUNEN2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE'],'COMMUNE'),
"ADRESSE"   => $this->user[0]['ADRESSE'],
"ADRESSEAR"   => $this->user[0]['ADRESSEAR'],
"Mobile"  => $this->user[0]['Mobile'],
"Fixe"  => $this->user[0]['Fixe'],
"Email"  => $this->user[0]['Email'],

"REALISATION"  => view::dateUS2FR($this->user[0]['REALISATION']),
"NREALISATION" => $this->user[0]['NREALISATION'],
"OUVERTURE"    => view::dateUS2FR($this->user[0]['OUVERTURE']),
"NOUVERTURE"   => $this->user[0]['NOUVERTURE'],

"PROPRIETAIRE"  => $this->user[0]['PROPRIETAIRE'],
"DEBUTCONTRAT"  => view::dateUS2FR($this->user[0]['DEBUTCONTRAT']),
"FINCONTRAT"    => view::dateUS2FR($this->user[0]['FINCONTRAT'])
);
view::button($data['btn'],'');
echo "<h2>Visualiser Structure Sanitaire : ".$data['NOM'].'_'.$data['PRENOM']."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1100,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+250,'Date');              $this->txts($x+100,$y+240,'DATE',0,$data['DATE'],'dateus');  
$this->label($x+350,$y+250,'Type');          $this->combostructure($x+450,$y+240,'STRUCTURE','structurebis',$this->user[0]['STRUCTURE'],$this->user[0]['STRUCTURE'],'class','id','structure'); //$this->combov1($x+450,$y+240,'STRUCTURE',$data['STRUCTURE']);
$this->label($x+700,$y+250,'Nature');        $this->combov1($x+800,$y+240,'NATURE',$data['NATURE']);
$this->label($x,$y+280,'Nom');               $this->txt($x+100,$y+270,'NOM',0,$data['NOM'],'date');
$this->label($x+350,$y+280,'Prenom');        $this->txt($x+450,$y+270,'PRENOM',0,$data['PRENOM'],'date');
$this->label($x+700,$y+280,'Sexe');          $this->combov1($x+800,$y+270,'SEXE',$data['SEXE']);
$this->label($x,$y+310,'Wilaya');            $this->WILAYA($x+100,$y+300,'WILAYA','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+350,$y+310,'Commune');       $this->COMMUNE($x+100+350,$y+300,'COMMUNE','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
$this->label($x+700,$y+310,'Adresse');       $this->txt($x+100+350+350,$y+300,'ADRESSE',0,$data['ADRESSE'],'date');


$this->label($x,$y+340,'Mobile');            $this->txts($x+100,$y+330,'Mobile',0,$data['Mobile'],'port');
$this->label($x+350,$y+340,'Fixe');          $this->txts($x+450,$y+330,'Fixe',0,$data['Fixe'],'phone');
$this->label($x+700,$y+340,'E-mail');        $this->txt($x+100+350+350,$y+330,'Email',0,$data['Email'],'date');

$this->label($x,$y+370,'__________________________________________________________________________________________________________________');

$this->label($x,$y+400,'Propriétaire');           $this->txt($x+100,$y+390,'PROPRIETAIRE',0,$data['PROPRIETAIRE'],'date');
$this->label($x+350,$y+400,'Début contrat');      $this->txts($x+450,$y+390,'DEBUTCONTRAT',0,$data['DEBUTCONTRAT'],'dateus1');
$this->label($x+700,$y+400,'Fin contrat');        $this->txts($x+100+350+350,$y+390,'FINCONTRAT',0,$data['FINCONTRAT'],'dateus2');

$this->label($x,$y+430,'Realisation');           $this->txts($x+100,$y+390+30,'REALISATION',0,$data['REALISATION'],'dateus3');
$this->label($x+350,$y+430,'N° Realisation');    $this->txt($x+450,$y+390+30,'NREALISATION',0,$data['NREALISATION'],'date');

$this->label($x,$y+460,'Ouverture');             $this->txts($x+100,$y+390+60,'OUVERTURE',0,$data['OUVERTURE'],'dateus4');
$this->label($x+350,$y+460,'N° Ouverture');      $this->txt($x+450,$y+390+60,'NOUVERTURE',0,$data['NOUVERTURE'],'date');


$this->label($x,$y+470,'__________________________________________________________________________________________________________________');

$this->label($x+990,$y+500,'اللقب');  $this->txtar($x+690,$y+490,'NOMAR',0,$data['NOMAR'],'date');
$this->label($x+625,$y+500,'الاســـــــم');        $this->txtar($x+340,$y+490,'PRENOMAR',0,$data['PRENOMAR'],'date');
$this->label($x+290,$y+500,'العنوان');      $this->txtar($x,$y+490,'ADRESSEAR',0,$data['ADRESSEAR'],'date');






$this->submit($x+800,$y+430,$data['butun']);
$this->f1();
view::sautligne(19);
?>


	
