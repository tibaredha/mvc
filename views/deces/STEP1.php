<style type="text/css"> 
#contente_2, #contente_3, #contente_4, #contente_5, #contente_6 { display: none; height: auto; clear: all;} 
</style> 
<script type="text/javascript">
/*Activates the Tabs*/
function tabSwitch(new_tab, new_content) {    
    document.getElementById('contente_1').style.display = 'none';  
    document.getElementById('contente_2').style.display = 'none';  
    document.getElementById('contente_3').style.display = 'none';  
	document.getElementById('contente_4').style.display = 'none';  
	document.getElementById('contente_5').style.display = 'none';  
	document.getElementById('contente_6').style.display = 'none';  
	/*document.getElementById('content_3').style.display = 'none';*/ 
	document.getElementById(new_content).style.display = 'block';     
    document.getElementById('tabe_1').className = '';  
    document.getElementById('tabe_2').className = '';  
    document.getElementById('tabe_3').className = '';  
	document.getElementById('tabe_4').className = '';  
	document.getElementById('tabe_5').className = '';  
	document.getElementById('tabe_6').className = '';  
	/*document.getElementById('tab_3').className = ''; */        
    document.getElementById(new_tab).className = 'active';        
}
</script>
<?php	
$url1 = explode('/',$_GET['url']);
ob_start();
$data = array(
"titre"     => 'Edit deces', 
"btn"       => 'deces', 
"id"        => $this->user[0]['id'], 
"butun"     => 'imp deces', 
"photos"    => '3.jpg',
"action"    => 'pdf/decesmaternels.php?uc='.$this->user[0]['id'],
"WILAYAR11"  => $this->user[0]['WILAYAD'],"WILAYAR22"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYAD'],'WILAYAS'),
"COMMUNER11" => $this->user[0]['COMMUNED'],  "COMMUNER22" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNED'],'COMMUNE'),
"STRUCTURED"  => array($this->user[0]['STRUCTURED'],"EPH_DJALFA", "EPH_AIN_OUSSERA", "EPH_HASSI_BAHBAH", "EPH_MESSAAD", "EHS_DJELFA"),
"NOM"       => $this->user[0]['NOM'],
"PRENOM"    => $this->user[0]['PRENOM'],   
"FILSDE"    => $this->user[0]['FILSDE'],
"ETDE"      => $this->user[0]['ETDE'],
"SEXE"      => array($this->user[0]['SEX'],"M", "F"),
"DATENS"    => $this->user[0]['DATENAISSANCE'], 
"WILAYAN1"  => $this->user[0]['WILAYA'] ,"WILAYAN2"  => View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYA'],'WILAYAS'),
"COMMUNEN1" => $this->user[0]['COMMUNE'] ,"COMMUNEN2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNE'],'COMMUNE'),
"WILAYAR1"  => $this->user[0]['WILAYAR'],"WILAYAR2"  =>  View::nbrtostring('wil','IDWIL',$this->user[0]['WILAYAR'],'WILAYAS'),
"COMMUNER1" => $this->user[0]['COMMUNER'],  "COMMUNER2" => View::nbrtostring('com','IDCOM',$this->user[0]['COMMUNER'],'COMMUNE'),
"ADRESSE"   => $this->user[0]['ADRESSE'],
"CD"       => $this->user[0]['CD'],
"LD"       => $this->user[0]['LD'],
"AUTRES"   => $this->user[0]['AUTRES'],
"OMLI"     => $this->user[0]['OMLI'],
"MIEC"     => $this->user[0]['MIEC'],
"EPFP"     => $this->user[0]['EPFP'],
"CIM1"     => $this->user[0]['CIM1'],
"CIM2"     => $this->user[0]['CIM2'],
"CIM3"     => $this->user[0]['CIM3'],
"CIM4"     => $this->user[0]['CIM4'],
"CIM5"     => $this->user[0]['CIM5'],
"NDLM"     => $this->user[0]['NDLM'],
"NDLMAAP"  => $this->user[0]['NDLMAAP'],
"GM"       => $this->user[0]['GM'],
"MN"       => $this->user[0]['MN'],
"AGEGEST"  => $this->user[0]['AGEGEST'],
"POIDNSC"  => $this->user[0]['POIDNSC'],
"AGEMERE"  => $this->user[0]['AGEMERE'],
"DPNAT"   => $this->user[0]['DPNAT'],
"EMDPNAT" => $this->user[0]['EMDPNAT'],
"DECEMAT" => $this->user[0]['DECEMAT'],
"GRS"     => $this->user[0]['GRS'],
"POSTOPP" => $this->user[0]['POSTOPP'],
"DATEHOSPI" => $this->user[0]['DATEHOSPI'],
"HEURESHOSPI" => $this->user[0]['HEURESHOSPI'],
"SERVICEHOSPIT" => $this->user[0]['SERVICEHOSPIT'],
"MEDECINHOSPIT" => $this->user[0]['MEDECINHOSPIT'],
"CODECIM0a" => $this->user[0]['CODECIM0'],
"CODECIM0b" => View::stringtostring('chapitre','IDCHAP',$this->user[0]['CODECIM0'],'CHAP'), 
"CODECIMa" => $this->user[0]['CODECIM'],
"CODECIMb" => View::stringtostring('cim','diag_cod',$this->user[0]['CODECIM'],'diag_nom'),
"DINS"      => $this->user[0]['DINS'],
"HINS"      => $this->user[0]['HINS'],
"x"         => "50",
"y"         => "260"
);
view::button('deces','');
View::hr();
View::f0(URL.$data['action'],'post');
?>
<h3>PARTIE COMMUNE A COMPLETER EN TOTALITE</h3>	        		
<div class="tabbed_area">  
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tabe_1', 'contente_1');" id="tabe_1" class="active">Section 1</a></li>  
            <li><a href="javascript:tabSwitch('tabe_2', 'contente_2');" id="tabe_2">Section 2</a></li> 
			<li><a href="javascript:tabSwitch('tabe_3', 'contente_3');" id="tabe_3">Section 3</a></li> 	
            <li><a href="javascript:tabSwitch('tabe_4', 'contente_4');" id="tabe_4">Section 4</a></li> 	
            <li><a href="javascript:tabSwitch('tabe_5', 'contente_5');" id="tabe_5">Section 5</a></li> 	
            <li><a href="javascript:tabSwitch('tabe_6', 'contente_6');" id="tabe_6">Section 6</a></li> 	
		</ul>    
		
		<div id="contente_1" class="content">  
		<h2>Caractéristiques de la femme</h2>
		<?php
			view::sautligne(22);		
			$this->label($data['x'],$data['y']+60," Date enquete");$this->txts($data['x']+60+130,$data['y']+50,'DATENS',0,$data['DATENS'],'date');
			$this->label($data['x'],$data['y']+90," Numéro d'identification"); 
			
			$this->label($data['x'],$data['y']+120,'Profession de la patiente');
			$this->label($data['x'],$data['y']+150,"Niveau d'instruction de la patiente");
			View::label($data['x'],$data['y']+180,'Analphabète');View::radio($data['x']+150,$data['y']+180,"NIP","A");    
			View::label($data['x'],$data['y']+210,'Ecole coranique');View::radio($data['x']+150,$data['y']+210,"NIP","B");    
			View::label($data['x'],$data['y']+240,'Primaire');View::radio($data['x']+150,$data['y']+240,"NIP","C");    
			View::label($data['x'],$data['y']+270,'Moyen');View::radio($data['x']+150,$data['y']+270,"NIP","D");    
			View::label($data['x'],$data['y']+300,'Secondaire');View::radio($data['x']+150,$data['y']+300,"NIP","E");    
			View::label($data['x'],$data['y']+330,'Universitaire');View::radio($data['x']+150,$data['y']+330,"NIP","F");    
			View::label($data['x'],$data['y']+360,'Non précis');View::radioed($data['x']+150,$data['y']+360,"NIP","G");    

			$this->label($data['x']+300,$data['y']+120,'Profession du conjoint');
			$this->label($data['x']+280,$data['y']+150,"Niveau d'instruction du conjoint");
			View::label($data['x']+280,$data['y']+180,'Analphabète');View::radio($data['x']+450,$data['y']+180,"NIC","A");    
			View::label($data['x']+280,$data['y']+210,'Ecole coranique');View::radio($data['x']+450,$data['y']+210,"NIC","B");    
			View::label($data['x']+280,$data['y']+240,'Primaire');View::radio($data['x']+450,$data['y']+240,"NIC","C");    
			View::label($data['x']+280,$data['y']+270,'Moyen');View::radio($data['x']+450,$data['y']+270,"NIC","D");    
			View::label($data['x']+280,$data['y']+300,'Secondaire');View::radio($data['x']+450,$data['y']+300,"NIC","E");    
			View::label($data['x']+280,$data['y']+330,'Universitaire');View::radio($data['x']+450,$data['y']+330,"NIC","F");    
			View::label($data['x']+280,$data['y']+360,'Non précis');View::radioed($data['x']+450,$data['y']+360,"NIC","G");  
			 
			$this->label($data['x']+520,$data['y']+150,"Couverture sociale");
			View::label($data['x']+520,$data['y']+180,'OUI');View::radio($data['x']+610,$data['y']+180,"CS","A");    
			View::label($data['x']+520,$data['y']+210,'NON');View::radio($data['x']+610,$data['y']+210,"CS","B");  
			View::label($data['x']+520,$data['y']+240,'NON  précisé');View::radioed($data['x']+610,$data['y']+240,"CS","C");  
			  
			$this->label($data['x']+680,$data['y']+150,"Lieu du décès");
			View::label($data['x']+680,$data['y']+180,'Domicile');View::radio($data['x']+950,$data['y']+180,"LD","A");    
			View::label($data['x']+680,$data['y']+210,'Maternité publique extrahospitaiière');View::radio($data['x']+950,$data['y']+210,"LD","B");    
			View::label($data['x']+680,$data['y']+240,'EHS mère/enfant');View::radio($data['x']+950,$data['y']+240,"LD","C");    
			View::label($data['x']+680,$data['y']+270,'EPH');View::radio($data['x']+950,$data['y']+270,"LD","D");    
			View::label($data['x']+680,$data['y']+300,'CHU');View::radio($data['x']+950,$data['y']+300,"LD","E");    
			View::label($data['x']+680,$data['y']+330,'EHU');View::radio($data['x']+950,$data['y']+330,"LD","F");    
			View::label($data['x']+680,$data['y']+360,'Structure de santé privée');View::radioed($data['x']+950,$data['y']+360,"LD","G");  
			View::label($data['x']+680,$data['y']+390,'Autre');View::radioed($data['x']+950,$data['y']+390,"LD","H");  
			$this->label($data['x']+680,$data['y']+420,"Si autre, Préciser"); 
			  
			$this->label($data['x']+1030,$data['y']+150,"Moment du décès");
			View::label($data['x']+1030,$data['y']+180,'Pendant !a grossesse');View::radio($data['x']+1380,$data['y']+180,"MD","A");    
			View::label($data['x']+1030,$data['y']+210,"Pendant l'avortement ");View::radio($data['x']+1380,$data['y']+210,"MD","B");    
			View::label($data['x']+1030,$data['y']+240,"Pendant le travail ou l'accouchement");View::radio($data['x']+1380,$data['y']+240,"MD","C");    
			View::label($data['x']+1030,$data['y']+270,"24 heures suivant l'issue de la grossesse ");View::radio($data['x']+1380,$data['y']+270,"MD","D");    
			View::label($data['x']+1030,$data['y']+300,"42 jours suivant un avortement");View::radio($data['x']+1380,$data['y']+300,"MD","E");    
			View::label($data['x']+1030,$data['y']+330,"42 jours suivant un accouchement ");View::radio($data['x']+1380,$data['y']+330,"MD","F");    
			View::label($data['x']+1030,$data['y']+360,"42 jours suivant l'issue d'une grossesse molaire");View::radioed($data['x']+1380,$data['y']+360,"MD","G");  
			View::label($data['x']+1030,$data['y']+390,"42 jours suivant l'issue d'une GEU");View::radioed($data['x']+1380,$data['y']+390,"MD","H");  
        ?>
		</div>
		
		<div id="contente_2" class="content"> 
		<h2>Antécédents personnels de la femme</h2>
		<?php
        view::sautligne(30);
        ?>
		</div>
		
		<div id="contente_3" class="content">  
		<h2>Histoire de la grossesse ayant entraîné le décès</h2>    		  
		<?php
        view::sautligne(30);
        ?>
		</div>

		<div id="contente_4" class="content">  
		<h2>Issue de la grossesse</h2>    		  
		<?php
        view::sautligne(30);
        ?>
		</div>
        
		<div id="contente_5" class="content">  
		<h2>Enchaînement des événements ayant mené au décès</h2>    		  
		<?php
        view::sautligne(30);
        ?>
		</div>
        
		<div id="contente_6" class="content">  
		<h2>Caractéristiques de l'établissement où a eu lieu i'issue de la grossesse</h2>    		  
		<?php
        view::sautligne(30);
        ?>
		</div>		
</div>

<?php
View::hr();
$this->submit($data['x']+1185,$data['y']-100,$data['butun']);$this->f1();
// view::sautligne(25);
ob_end_flush();
?>













