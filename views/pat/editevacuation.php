<?php 
verifsession();
// view::button('cons',$this->user[0]['id']);
// View::h('2',25,290,'Patient : Evacuation [ '.$this->user[0]['id']."_".$this->user[0]['id']." ]");
// View::sautligne(2);
// View::hr();
// View::f0(URL.'tcpdf/evac.php','post');
// $x=250;
// View::label(50,$x+145,'Lieu du décés du malade ');
// View::label(50,$x+145+30,'Domicile ');                    View::radio(200,$x+145+30,"LD","DOM");    
// View::label(50,$x+145+60,'Voie publique ');               View::radio(200,$x+145+60,"LD","VP");     
// View::label(50,$x+145+90,'Autres (a préciser). ');        View::radio(200,$x+145+90,"LD","AAP"); View::txt(240,$x+140+90,'AUTRES',24,'*');   
// View::label(250,$x+145+30,'Structure de sante public ');  View::radioed(430,$x+145+30,"LD","SSP");  
// View::label(250,$x+145+60,'Structure de sante privé ');   View::radio(430,$x+145+60,"LD","SSPV");  
// View::label(650,$x+145,'Causes du décés CIM 10 ');  
// View::label(650,$x+145+30,'CIM1');                        View::txt(750,$x+140+30,'CIM1',20,"***");          
// View::label(650,$x+145+60,'CIM2');                        View::txt(750,$x+140+60,'CIM2',20,"***");       
// View::label(650,$x+145+90,'CIM3');                        View::txt(750,$x+140+90,'CIM3',20,"***");        
// View::label(650,$x+145+120,'CIM4');                       View::txt(750,$x+140+120,'CIM4',20,"***");       
// View::label(650,$x+145+150,'autres etats');               View::txt(750,$x+140+150,'CIM5',20,"***");      
// View::label(1000,$x+145,'Date du décés');                 View::txt(1150,$x+140,'DD',20,date("Y-m-d")); //$per ->datetime (800,$x+24,'DD');                 
// View::label(1000,$x+145+30,'Heure du décés');             View::txt(1150,$x+140+30,'HD',4,date("H:i"));
// View::label(1000,$x+145+60,'Cause de décés'); 
// View::label(1000,$x+145+90,'Cause naturelle');                View::radioed(1150,$x+145+90,"CD","CN");    
// View::label(1000,$x+145+120,'Cause viollente');                View::radio(1150,$x+145+120,"CD","CV");      
// View::label(1000,$x+145+150,'Cause idetermine');               View::radio(1150,$x+145+150,"CD","CI");     
// View::hide(215,670,'id',0,$this->user[0]['id']);
// View::submit(1150,600,'Imprimer Certificat');
// View::f1();		
// View::sautligne(10);

?>
<h1>Hospitalisation : Evacuation</h1>
<hr /><br />
<form method="post" action="<?php echo URL;?>tcpdf/evac.php">
	<label>IDPAT</label><input type="text" name="IDDNR"  value="<?php echo $this->user[0]['IDDNR']; ?>" /><br />
	<label>CAISE</label>
		<select name="CAISE"> 
			<option value="SAA">SAA</option>
			<option value="CAAR">CAAR</option>
			<option value="CAAT">CAAT</option>
			<option value="AA">AA</option>
		</select><br />
	<label>NSS</label><input type="text" name="NSS"  value="<?php echo '000'; ?>" /><br />
	<label>RENSEINGNEMENT CLINIQUES</label><input type="text" name="DGC"  value="<?php echo $this->user[0]['DGC']; ?>" /><br />
	<label>PRÉSTATION DISPENSÉES</label><input type="text" name="PRD"  value="Avis Et Prise En Charge" /><br />
	<label>MOTIF D'ÉVACUATION</label>
		<select name="MEVAC"> 
			<option value="Manque De Specialite">Manque De Specialite</option>
			<option value="Manque De Materiel">Manque De Materiel</option>
			<option value="Manque De Place">Manque De Place</option>
		</select><br />
	<label>L'ÉTABLISSEMENT D'ACCEUIL</label>
	<select name="ETAACC"> 
			<option value="EPH DJELFA">EPH DJELFA</option>
			<option value="COMPLEXE MERE ENFANT DJELFA">COMPLEXE MERE ENFANT DJELFA</option>
			<option value="EPH MDEA">EPH MDEA</option>
			<option value="CHU BLIDA">CHU BLIDA</option>	
		</select><br />
	<label>ACCOMPAGNATEURS</label><input type="text" name="ACCOMP"  value="IDE" /><br />
	<label>SERVICE</label><input type="text" name="SERVICE" value="<?php echo $this->user[0]['SERVICE']; ?>" /><br />
	<label>NLIT</label><input type="text" name="NLIT" value="<?php echo $this->user[0]['NLIT']; ?>" /><br />
	<label>DATESORTI</label><input type="text" name="DATESORTI" value="<?php echo $this->user[0]['DATESORTI']; ?>" /><br />
	<label>HEURESORTI</label><input type="text" name="HEURESORTI" value="<?php echo $this->user[0]['HEURESORTI']; ?>" /><br />
	<label>MODE SORTIE</label>
		<select name="MODESORTI"> 
			<option value="<?php echo $this->user[0]['MODESORTI']; ?>"><?php echo $this->user[0]['MODESORTI']; ?></option>
			<option value="1">SORTIE NORMALE</option>
			<option value="2">PAR DECES</option>
			<option value="3">EVACUATION</option>
			<option value="4">EVASION</option>
			<option value="5">CONTRE AVIS MEDICAL</option>
			<option value="6">TRANSFERT ETRANGER</option>
			<option value="6">MORT_NE</option>
		</select><br />
	<br />
	<label>&nbsp;</label><input type="submit" />
</form>