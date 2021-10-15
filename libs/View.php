<?php
class View {

	function __construct() {
		//echo 'this is the view';
		// $this->aspirateur();	
	}
	public function render($name, $noInclude = false)
	{
		if ($noInclude == true) {
			require 'views/' . $name . '.php';	
		}
		else {
			require 'views/header.php';
			require 'views/'.$name.'.php';
			require 'views/footer.php';	
		}
	}
	
	function structure_sanitaire($data,$titre) 
	{
	view::button($data['btn'],'');	
	echo "<h2>$titre</h2 ><br />";
	$this->f0(URL.$data['action'],'post');
	View::photosurl(1170,210,URL.$data['photos']);
	$x=50;$y=60;
	$this->label($x,$y+160,'Nature');            $this->combov1($x+100,$y+150,'NATURE',$data['NATURE']);
	$this->label($x+350,$y+160,'Instalation');   $this->txts($x+450,$y+150,'DATE',0,$data['DATE'],'dateus');  
	$this->label($x,$y+190,'Nom');               $this->txt($x+100,$y+180,'NOM',0,$data['NOM'],'date');                                          
	$this->label($x+350,$y+190,'Prenom');        $this->txt($x+450,$y+180,'PRENOM',0,$data['PRENOM'],'date');                                             
	$this->label($x+700,$y+190,'Sexe');          $this->combov1($x+800,$y+180,'SEXE',$data['SEXE']);
	$this->label($x,$y+220,'Naissance');         $this->txts($x+100,$y+210,'DNS',0,$data['DNS'],'dateus6');
	$this->label($x+350,$y+220,'Wilaya');        $this->WILAYA($x+450,$y+210,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
	$this->label($x+700,$y+220,'Commune');       $this->COMMUNE($x+800,$y+210,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);          
	$this->label($x,$y+230,'__________________________________________________________________________________________________________________');
	$this->label($x,$y+260,'Type');              $this->combostructure($x+100,$y+250,'STRUCTURE','structurebis',$data['STRUCTURE1'],$data['STRUCTURE2'],'class','id','structure');
	$this->label($x+350,$y+260,'Spécialite');    $this->specialite($x+450,$y+250,'SPECIALITE',$data['specialite1'],$data['specialite2'],'classspecialite');
	$this->label($x,$y+290,'Date diplome');      $this->txts($x+100,$y+280,'DIPLOME',0,	$data['DIPLOME'],'dateus44');
	$this->label($x,$y+290+30,'Universite');     $this->UNIVERSITE($x+100,$y+280+30,'UNIV','univ','mvc','wil',$data['UNIV0'],$data['UNIV1']); 
	$this->label($x+350,$y+290,'Order N ');      $this->txt($x+450,$y+280,'NUMORDER',0,$data['NUMORDER'],'date');
	$this->label($x+350,$y+320,'Date order');    $this->txts($x+450,$y+280+30,'DATEORDER',0,$data['DATEORDER'],'dateusx');  
	$this->label($x+700,$y+290,'Démission N');   $this->txt($x+800,$y+280,'NUMDEM',0,$data['NUMDEM'],'date');
	$this->label($x+700,$y+320,'Date Démission');$this->txts($x+800,$y+280+30,'DATEDEM',0,$data['DATEDEM'],'dateusy');  
	$this->label($x,$y+350,'Date service');      $this->txts($x+100,$y+280+60,'DATEDSC',0,$data['DATEDSC'],'datesc');  
	$this->label($x+350,$y+350,'Etablissement'); $this->SERVICECIVILE($x+450,$y+280+60,'SERVICECIVILE','univ','mvc','str_sc',$data['SERVICECIVILE0'],$data['SERVICECIVILE1']); 
	$y=90;                                        //SERVICECIVILE ($x,$y,$name,$class,$db_name,$tb_name,$value,$selected) 
	$this->label($x,$y+340,'__________________________________________________________________________________________________________________');
	$this->label($x,$y+370,'Wilaya');            $this->WILAYA($x+100,$y+360,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);
	$this->label($x+350,$y+370,'Commune');       $this->COMMUNE($x+100+350,$y+360,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);            
	$this->label($x+700,$y+370,'Adresse');       $this->txt($x+800,$y+360,'ADRESSE',0,$data['ADRESSE'],'date');
	$this->label($x,$y+400,'Propriétaire');      $this->txt($x+100,$y+390,'PROPRIETAIRE',0,$data['PROPRIETAIRE'],'date');                        
	$this->label($x+350,$y+400,'Début contrat'); $this->txts($x+450,$y+390,'DEBUTCONTRAT',0,$data['DEBUTCONTRAT'],'dateus1');                            
	$this->label($x+700,$y+400,'Fin contrat');  $this->txts($x+800,$y+390,'FINCONTRAT',0,$data['FINCONTRAT'],'dateus2');
	$this->label($x,$y+430,'Mobile');            $this->txts($x+100,$y+420,'Mobile',0,$data['Mobile'],'port');
	$this->label($x+350,$y+430,'Fixe');          $this->txts($x+450,$y+420,'Fixe',0,$data['Fixe'],'phone');
	$this->label($x+700,$y+430,'E-mail');        $this->txt($x+800,$y+420,'Email',0,  $data['Email'],'date');
	$this->label($x,$y+437+15,'__________________________________________________________________________________________________________________');
	$this->label($x,$y+480,'Realisation');       $this->txts($x+100,$y+470,'REALISATION',0,$data['REALISATION'],'dateus3');                      $this->label($x+700,$y+480,'N° Realisation');             $this->txt($x+800,$y+470,'NREALISATION',0,$data['NREALISATION'],'date');
	$this->label($x,$y+510,'Ouverture');         $this->txts($x+100,$y+500,'OUVERTURE',0,$data['OUVERTURE'],'dateus4');                          $this->label($x+700,$y+510,'N° Ouverture');               $this->txt($x+800,$y+500,'NOUVERTURE',0,$data['NOUVERTURE'],'date');
	$this->label($x,$y+500+23,'__________________________________________________________________________________________________________________');
	$this->label($x+700,$y+550,'اللقب');         $this->txtarid($x+800,$y+540,'NOMAR','NOMAR',0,$data['NOMAR'],'date');$this->label($x+350,$y+550,'الاســـــــم');   $this->txtarid($x+450,$y+540,'PRENOMAR','PRENOMAR',0,$data['PRENOMAR'],'date'); $this->label($x,$y+550,'العنوان');           $this->txtarid($x+100,$y+540,'ADRESSEAR','ADRESSEAR',0,$data['ADRESSEAR'],'date');
	$this->submit($x+1140,$y+520,$data['butun']);
	$this->f1();
	view::sautligne(19);
	ob_end_flush();	
		
	}
	
	
	// function WILAYA($x,$y,$name,$class,$db_name,$tb_name,$value,$selected) 
	// {
	// mysqlconnect();
	// echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";		 
	// echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
	// echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	// mysql_query("SET NAMES 'UTF8' ");
	// $result = mysql_query("SELECT * FROM $tb_name order by WILAYAS" );
	// while($data =  mysql_fetch_array($result))
	// {
	// echo '<option value="'.$data[0].'">'.$data[1].'</option>';
	// }
	// echo '</select>'."\n"; 
	// echo "</div>";
	// }
	function usereph($x,$y,$name,$class,$db_name,$tb_name,$value,$selected) 
	{
	mysqlconnect();
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
    $result = mysql_query("SELECT * FROM $tb_name order by Nomlatin  " );
    while($data =  mysql_fetch_array($result))
    {
		echo '<option value="'.$data[0].'">'.$data["Nomlatin"].'_'.$data["Prenom_Latin"].'</option>';
    }
	echo '</select>'."\n"; 
	echo "</div>";
	}
	function userservice($x,$y,$name,$class,$db_name,$tb_name,$value,$selected) 
	{
	mysqlconnect();
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
    $result = mysql_query("SELECT * FROM $tb_name order by servicear  " );
    while($data =  mysql_fetch_array($result))
    {
		echo '<option value="'.$data[0].'">'.$data["servicear"].'</option>';
    }
	echo '</select>'."\n"; 
	echo "</div>";
	}
	function structure_sanitaire_drh($data,$titre) 
	{
	view::button($data['btn'],'');	
	echo "<h2>$titre</h2 ><br />";
	$this->f0(URL.$data['action'],'post');
	View::photosurl(1170,210,URL.$data['photos']);
	$x=50;$y=60;
	// $this->label($x,$y+160,'Nature');            $this->combov1($x+100,$y+150,'NATURE',$data['NATURE']);
	// $this->label($x+350,$y+160,'Instalation');   $this->txts($x+450,$y+150,'DATE',0,$data['DATE'],'dateus');  
	// $this->label($x,$y+190,'Nom');               $this->txt($x+100,$y+180,'NOM',0,$data['NOM'],'date');                                          
	// $this->label($x+350,$y+190,'Prenom');        $this->txt($x+450,$y+180,'PRENOM',0,$data['PRENOM'],'date');                                             
	// $this->label($x+700,$y+190,'Sexe');          $this->combov1($x+800,$y+180,'SEXE',$data['SEXE']);
	// $this->label($x,$y+220,'Naissance');         $this->txts($x+100,$y+210,'DNS',0,$data['DNS'],'dateus6');
	// $this->label($x+350,$y+220,'Wilaya');        $this->WILAYA($x+450,$y+210,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
	// $this->label($x+700,$y+220,'Commune');       $this->COMMUNE($x+800,$y+210,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);          
	// $this->label($x,$y+230,'__________________________________________________________________________________________________________________');
	// $this->label($x,$y+260,'Type');              $this->combostructure($x+100,$y+250,'STRUCTURE','structurebis',$data['STRUCTURE1'],$data['STRUCTURE2'],'class','id','structure');
	// $this->label($x+350,$y+260,'Spécialite');    $this->specialite($x+450,$y+250,'SPECIALITE',$data['specialite1'],$data['specialite2'],'classspecialite');
	// $this->label($x,$y+290,'Date diplome');      $this->txts($x+100,$y+280,'DIPLOME',0,	$data['DIPLOME'],'dateus44');
	// $this->label($x,$y+290+30,'Universite');     $this->UNIVERSITE($x+100,$y+280+30,'UNIV','univ','mvc','wil',$data['UNIV0'],$data['UNIV1']); 
	// $this->label($x+350,$y+290,'Order N ');      $this->txt($x+450,$y+280,'NUMORDER',0,$data['NUMORDER'],'date');
	// $this->label($x+350,$y+320,'Date order');    $this->txts($x+450,$y+280+30,'DATEORDER',0,$data['DATEORDER'],'dateusx');  
	// $this->label($x+700,$y+290,'Démission N');   $this->txt($x+800,$y+280,'NUMDEM',0,$data['NUMDEM'],'date');
	// $this->label($x+700,$y+320,'Date Démission');$this->txts($x+800,$y+280+30,'DATEDEM',0,$data['DATEDEM'],'dateusy');  
	// $this->label($x,$y+350,'Date service');      $this->txts($x+100,$y+280+60,'DATEDSC',0,$data['DATEDSC'],'datesc');  
	// $this->label($x+350,$y+350,'Etablissement'); $this->SERVICECIVILE($x+450,$y+280+60,'SERVICECIVILE','univ','mvc','str_sc',$data['SERVICECIVILE0'],$data['SERVICECIVILE1']); 
	// $y=90;                                        //SERVICECIVILE ($x,$y,$name,$class,$db_name,$tb_name,$value,$selected) 
	// $this->label($x,$y+340,'__________________________________________________________________________________________________________________');
	// $this->label($x,$y+370,'Wilaya');            $this->WILAYA($x+100,$y+360,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);
	// $this->label($x+350,$y+370,'Commune');       $this->COMMUNE($x+100+350,$y+360,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);            
	// $this->label($x+700,$y+370,'Adresse');       $this->txt($x+800,$y+360,'ADRESSE',0,$data['ADRESSE'],'date');
	// $this->label($x,$y+400,'Propriétaire');      $this->txt($x+100,$y+390,'PROPRIETAIRE',0,$data['PROPRIETAIRE'],'date');                        
	// $this->label($x+350,$y+400,'Début contrat'); $this->txts($x+450,$y+390,'DEBUTCONTRAT',0,$data['DEBUTCONTRAT'],'dateus1');                            
	// $this->label($x+700,$y+400,'Fin contrat');  $this->txts($x+800,$y+390,'FINCONTRAT',0,$data['FINCONTRAT'],'dateus2');
	// $this->label($x,$y+430,'Mobile');            $this->txts($x+100,$y+420,'Mobile',0,$data['Mobile'],'port');
	// $this->label($x+350,$y+430,'Fixe');          $this->txts($x+450,$y+420,'Fixe',0,$data['Fixe'],'phone');
	// $this->label($x+700,$y+430,'E-mail');        $this->txt($x+800,$y+420,'Email',0,  $data['Email'],'date');
	// $this->label($x,$y+437+15,'__________________________________________________________________________________________________________________');
	// $this->label($x,$y+480,'Realisation');       $this->txts($x+100,$y+470,'REALISATION',0,$data['REALISATION'],'dateus3');                      $this->label($x+700,$y+480,'N° Realisation');             $this->txt($x+800,$y+470,'NREALISATION',0,$data['NREALISATION'],'date');
	// $this->label($x,$y+510,'Ouverture');         $this->txts($x+100,$y+500,'OUVERTURE',0,$data['OUVERTURE'],'dateus4');                          $this->label($x+700,$y+510,'N° Ouverture');               $this->txt($x+800,$y+500,'NOUVERTURE',0,$data['NOUVERTURE'],'date');
	// $this->label($x,$y+500+23,'__________________________________________________________________________________________________________________');
	
	
	$this->label($x+960,$y+160,'اللقب');         $this->txtarid($x+700,$y+150,'NOMAR','NOMAR',0,$data['NOMAR'],'date');
	$this->label($x+610,$y+160,'الاســـــــم');   $this->txtarid($x+350,$y+150,'PRENOMAR','PRENOMAR',0,$data['PRENOMAR'],'date'); 
	$this->label($x+260,$y+160,'لقب الزوج');     $this->txtarid($x,$y+150,'NOMJFAR','NOMJFAR',0,$data['NOMJFAR'],'date'); 
	
	$this->label($x+960,$y+190,'اسم الاب');       $this->txtarid($x+700,$y+180,'FILSDE','FILSDE',0,$data['FILSDE'],'date');
	$this->label($x+610,$y+190,'اسم و لقب الاب'); $this->txtarid($x+350,$y+180,'ETDE','ETDE',0,$data['ETDE'],'date'); 
	$this->label($x+260,$y+190,'الجنس');         $this->combov1($x,$y+180,'SEXE',$data['SEXE']);
	
	
	$this->label($x+960,$y+190+30,'تاريخ الميلاد'); $this->txts($x+700,$y+180+30,'DNS',0,$data['DNS'],'dateus6');
	$this->label($x+610,$y+190+30,'ولاية الميلاد');  $this->WILAYA($x+350,$y+180+30,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
	$this->label($x+260,$y+190+30,'بلدية الميلاد'); $this->COMMUNE($x,$y+180+30,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);  
 
	$this->label($x+960,$y+190+30+30,'رقم عقد الميلاد');   $this->txtarid($x+700,$y+180+30+30,'NEC','NEC',0,$data['NEC'],'date');
	$this->label($x+610,$y+190+30+30,'الحالة العائلية');  $this->combov1($x+350,$y+180+30+30,'SF',$data['SF']);
	$this->label($x+260,$y+190+30+30,'عدد الاولاد');        $this->txtarid($x,$y+180+30+30,'NBRENF','NBRENF',0,$data['NBRENF'],'date');
 
	$this->label($x+960,$y+190+30+30+30,'ولاية الإقامة');   $this->WILAYA($x+700,$y+180+30+30+30,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);  
	$this->label($x+610,$y+190+30+30+30,'بلدية الإقامة');  $this->COMMUNE($x+350,$y+180+30+30+30,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);  
	$this->label($x+260,$y+190+30+30+30,'العنوان');       $this->txtarid($x,$y+180+30+30+30,'ADRESSE','ADRESSE',0,$data['ADRESSE'],'date');
     
	
 
 
	
	
	// $this->label($x,$y+550,'العنوان');           
	// $this->txtarid($x+100,$y+540,'ADRESSEAR','ADRESSEAR',0,$data['ADRESSEAR'],'date');
	$this->submit($x+1140,$y+520,$data['butun']);
	$this->f1();
	view::sautligne(19);
	ob_end_flush();	
		
	}
	
	
	
	
	
	
	
	
	
	function lastid($tbl) 
	{
	mysqlconnect();
	$sql = " select id from $tbl order by  id desc limit 1";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$row = mysql_fetch_array($requete); 
	$id=$row['id'];
	mysql_free_result($requete);
	return $id;
	}
	
	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
	
	function nbrano($ids) 
	{
	mysqlconnect();
	$sql = " select * from  inspection where  ids=$ids and ETAT='0' ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function nbranoinsp($ids) 
	{
	mysqlconnect();
	$sql = " select * from  inspection where  idinsp=$ids and ETAT='0' ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function nbrveh($idt) 
	{
	mysqlconnect();
	$sql = " select * from  auto where  idt=$idt and ETAT='0' ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}

	function nbrpers($idt) 
	{
	mysqlconnect();
	$sql = " select * from  pers where idt=$idt and ETAT='0' ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function nbrhome($idt) 
	{
	mysqlconnect();
	$sql = " select * from  home where idstructure=$idt  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function decescomm($COMMUNER,$DATEJOUR1,$DATEJOUR2,$STRUCTURED) 
	{
	mysqlconnect();
	// $sql = " select $COLONE1,$COLONE2,SRS from $TBL where (SRS='$SRS' and $STR and $COLONE2='$VALEUR2') and ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
	$sql = " select * from  deceshosp where  COMMUNER=$COMMUNER and DINS BETWEEN '$DATEJOUR1' AND '$DATEJOUR2' and STRUCTURED $STRUCTURED ";//where $COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2' 
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function decescommt($DATEJOUR1,$DATEJOUR2,$STRUCTURED) 
	{
	mysqlconnect();
	// $sql = " select $COLONE1,$COLONE2,SRS from $TBL where (SRS='$SRS' and $STR and $COLONE2='$VALEUR2') and ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
	$sql = " select * from  deceshosp where DINS BETWEEN '$DATEJOUR1' AND '$DATEJOUR2' and STRUCTURED $STRUCTURED ";//where $COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2' 
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	
	
	
	// SELECT DATEDIFF( date1, date2 );
	function valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR) 
	{
	mysqlconnect();
	// $sql = " select $COLONE1,$COLONE2,SRS from $TBL where (SRS='$SRS' and $STR and $COLONE2='$VALEUR2') and ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
	$sql = " select * from $TBL  where $COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2'  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function graphemoisdeces($x,$y,$TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$STR) 
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet();

	$dataSet->addPoint(new Point("JAN", $this->valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-01-01",$ANNEE."-01-31",$IND,$STR) ));
	$dataSet->addPoint(new Point("FEV", $this->valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-02-01",$ANNEE."-02-29",$IND,$STR)));
	$dataSet->addPoint(new Point("MAR", $this->valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-03-01",$ANNEE."-03-31",$IND,$STR)));
	$dataSet->addPoint(new Point("AVR", $this->valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-04-01",$ANNEE."-04-30",$IND,$STR)));
	$dataSet->addPoint(new Point("MAI", $this->valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-05-01",$ANNEE."-05-31",$IND,$STR)));
	$dataSet->addPoint(new Point("JUIN",$this->valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-06-01",$ANNEE."-06-30",$IND,$STR)));
	$dataSet->addPoint(new Point("JUIL",$this->valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-07-01",$ANNEE."-07-31",$IND,$STR)));
	$dataSet->addPoint(new Point("AOUT",$this->valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-08-01",$ANNEE."-08-31",$IND,$STR)));
	$dataSet->addPoint(new Point("SEP", $this->valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-09-01",$ANNEE."-09-30",$IND,$STR)));
	$dataSet->addPoint(new Point("OCT", $this->valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-10-01",$ANNEE."-10-31",$IND,$STR)));
	$dataSet->addPoint(new Point("NOV", $this->valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-11-01",$ANNEE."-11-30",$IND,$STR)));
	$dataSet->addPoint(new Point("DEC", $this->valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-12-01",$ANNEE."-12-31",$IND,$STR)));
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
	function BOUTONGRAPHEDECES($x,$y) 
	{
	echo "<div id=\"smenug\" class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	echo '<a href="'.URL.'deces/">DECES MOIS</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'deces/decesanne">DECES ANNEE</a>'; echo '&nbsp;';
	
	echo "</div>";
	}
	
	
	
	
	
	function aspirateur()
	{	
	//anti aspirateur qui marche bien 
	$navigateur = $_SERVER["HTTP_USER_AGENT"];
	$bannav = Array('HTTrack','httrack','WebCopier','HTTPClient'); // liste d'aspirateurs bannis
	foreach ($bannav as $banni)
	{ $comparaison = strstr($navigateur, $banni);
	if($comparaison!==false)
		{
		 echo '<center>Aspirateur interdit !<br><br>Votre IP est :<br>';
		 $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		 echo '<br>';
		 echo $hostname;
		 echo '</center>';
		 exit;
		}
	}
	}
	function combocour($x,$y,$name,$tb_name,$value,$choisir,$class,$ve,$va) 
	{
		mysqlconnect(); 
		echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
		echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
		echo"<option   value=\"".$value."\" selected=\"selected\">".$choisir."</option>"."\n";
		$result = mysql_query("SELECT * FROM $tb_name where NRP='0' order by id" );
		while($data =  mysql_fetch_array($result))
		{
		echo '<option value="'.$data[$ve].'">'.$data['NCR'].'_'.$this->dateUS2FR($data['DATECR']).'_'.$data[$va].'</option>';
		}
		echo '</select>'."\n"; echo "</div>";
	}
	function combords($x,$y,$name,$tb_name,$value,$choisir,$class,$ve,$va) 
	{
		mysqlconnect(); 
		echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
		echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
		echo"<option   value=\"".$value."\" selected=\"selected\">".$choisir."</option>"."\n";
		$result = mysql_query("SELECT * FROM $tb_name order by id" );
		while($data =  mysql_fetch_array($result))
		{
		echo '<option value="'.$data[$ve].'">'.$data[$va].'</option>';
		}
		echo '</select>'."\n"; echo "</div>";
	}
	function combords1($x,$y,$name,$tb_name,$value,$choisir,$class,$ve,$va,$va1,$va2,$va3,$va4) 
	{
		mysqlconnect(); 
		echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
		echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
		echo"<option   value=\"".$value."\" selected=\"selected\">".$choisir."</option>"."\n";
		$result = mysql_query("SELECT * FROM $tb_name order by DCI" );
		while($data =  mysql_fetch_array($result))
		{
		echo '<option value="'.$data[$ve].'">'.$data[$va].'_'.$data[$va1].'_'.$data[$va2].'_'.$data[$va3].'_'.$data[$va4].'</option>';
		}
		echo '</select>'."\n"; echo "</div>";
	}
	function combords2($x,$y,$name,$tb_name,$value,$choisir,$class,$ve,$va) 
	{
		mysqlconnect(); 
		echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
		echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
		echo"<option   value=\"".$value."\" selected=\"selected\">".$choisir."</option>"."\n";
		$result = mysql_query("SELECT * FROM $tb_name order by id" );
		while($data =  mysql_fetch_array($result))
		{
		echo '<option value="'.$data[$ve].'">'.$data[$va].'</option>';
		}
		echo '</select>'."\n"; echo "</div>";
	}
	function specialite($x,$y,$name,$value,$choisir,$class) 
	{
		mysqlconnect(); 
		echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
		echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
		echo"<option   value=\"".$value."\" selected=\"selected\">".$choisir."</option>"."\n";
		$result = mysql_query("SELECT * FROM specialite  order by specialitefr" );
		while($data =  mysql_fetch_array($result))
		{
		echo '<option value="'.$data["idspecialite"].'">'.$data["specialitefr"].'</option>';
		}
		echo '</select>'."\n"; echo "</div>";
	}
	function combopharmacienj($x,$y,$name,$value,$choisir,$class,$str,$SPECIALITEX) 
	{
		mysqlconnect(); 
		echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
		echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
		echo"<option   value=\"".$value."\" selected=\"selected\">".$choisir."</option>"."\n";
		$result = mysql_query("SELECT * FROM structure where STRUCTURE = $str  and SPECIALITEX = $SPECIALITEX order by NOM" );
		while($data =  mysql_fetch_array($result))
		{
		echo '<option value="'.$data["NOM"].'_'.$data["PRENOM"].'">'.$data["NOM"].'_'.$data["PRENOM"].'</option>';
		}
		echo '</select>'."\n"; echo "</div>";
	}
	function combopharmacien($x,$y,$name,$value,$choisir,$class,$str) 
	{
		mysqlconnect(); 
		echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
		echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
		echo"<option   value=\"".$value."\" selected=\"selected\">".$choisir."</option>"."\n";
		$result = mysql_query("SELECT * FROM structure where STRUCTURE = $str  order by NOM" );
		while($data =  mysql_fetch_array($result))
		{
		echo '<option value="'.$data["NOM"].'_'.$data["PRENOM"].'">'.$data["NOM"].'_'.$data["PRENOM"].'</option>';
		}
		echo '</select>'."\n"; echo "</div>";
	}
	
	function combopharmacieng($x,$y,$name,$value,$choisir,$class,$str) 
	{
		mysqlconnect(); 
		echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
		echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
		echo"<option   value=\"".$value."\" selected=\"selected\">".$choisir."</option>"."\n";
		$result = mysql_query("SELECT * FROM structure where STRUCTURE = $str  order by NOM" );
		while($data =  mysql_fetch_array($result))
		{
		echo '<option value="'.$data["id"].'">'.$data["NOM"].'_'.$data["PRENOM"].'</option>';
		}
		echo '</select>'."\n"; echo "</div>";
	}
	
	
	function combostructure($x,$y,$name,$tb_name,$value,$choisir,$class,$ve,$va) 
	{
		mysqlconnect(); 
		echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
		echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
		echo"<option   value=\"".$value."\" selected=\"selected\">".$choisir."</option>"."\n";
		$result = mysql_query("SELECT * FROM $tb_name  order by structure" );
		while($data =  mysql_fetch_array($result))
		{
		echo '<option value="'.$data[$ve].'">'.$data[$va].'</option>';
		}
		echo '</select>'."\n"; echo "</div>";
	}
	function comboservice($x,$y,$name,$db_name,$tb_name,$choisir,$class,$ve,$va) 
	{
	mysqlconnect();
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
	echo"<option   value=\"1\" selected=\"selected\">".$choisir."</option>"."\n";
    $result = mysql_query("SELECT * FROM $tb_name  where NBRLIT > 0  " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[$ve].'">'.$data[$va].'</option>';
    }
	echo '</select>'."\n"; 
	echo "</div>";
	}
	function NLIT($x,$y,$name) 
	{
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"NLIT\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">N DU LIT</option>"."\n";
    echo '</select>'."\n"; 
	echo "</div>";
	}
	function comboservice1($x,$y,$class,$name,$ve1,$va1,$ve2,$va2,$tb_name) 
	{
	mysqlconnect();
	//echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
	echo"<option   value=\"".$ve1."\" selected=\"selected\">".$va1."</option>"."\n";
    $result = mysql_query("SELECT * FROM $tb_name  where NBRLIT > 0  " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[$ve2].'">'.$data[$va2].'</option>';
    }
	echo '</select>'."\n"; 
	//echo "</div>";
	}
	function NLIT1($x,$y,$name,$ve1,$va1) 
	{
	// echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"NLIT\" name=\"".$name."\">"."\n";
	echo '<option value="'.$ve1.'">'.$va1.'</option>';
    echo '</select>'."\n"; 
	// echo "</div>";
	}

	
	//ELEMETS HTML
    //***************************************************************************************************************************************************//
	function stringtostring($tb_name,$colonename,$colonevalue,$resultatstring) 
	{
	if ($colonevalue!=='') 
		{
		mysqlconnect();
		$result = mysql_query("SELECT * FROM $tb_name where $colonename='$colonevalue'" );
		$row=mysql_fetch_object($result);
		$resultat=$row->$resultatstring;
		return $resultat;
		}
		else
		{
		return $resultat2='??????';
		}
	}
	function nbrtostring($tb_name,$colonename,$colonevalue,$resultatstring) 
	{
		if (is_numeric($colonevalue) and $colonevalue!=='0') 
		{ 
			mysqlconnect();
			$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
			$row=mysql_fetch_object($result);
			$resultat=$row->$resultatstring;
			return $resultat;
		} 
	return $resultat2='??????';
	}
	
	function nbrtostring1($tb_name,$colonename,$colonevalue,$resultatstring) 
	{
		if (is_numeric($colonevalue) and $colonevalue!=='0') 
		{ 
		mysqlconnect();
		$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
		$row=mysql_fetch_object($result);
		$resultat=$row->$resultatstring;
		return $resultat;
		} 
	return $resultat2='??????';
	}
	
	
	function UNIVERSITE($x,$y,$name,$class,$db_name,$tb_name,$value,$selected) 
	{
	mysqlconnect();
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";		 
		echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
			echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
			mysql_query("SET NAMES 'UTF8' ");
			$result = mysql_query("SELECT * FROM $tb_name order by WILAYAS" );
			while($data =  mysql_fetch_array($result))
			{
			echo '<option value="'.$data[2].'">'.$data[1].'</option>';
			}
		echo '</select>'."\n"; 
	echo "</div>";
	}
	function SERVICECIVILE ($x,$y,$name,$class,$db_name,$tb_name,$value,$selected) 
	{
	mysqlconnect();
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";		 
		echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
			echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
			mysql_query("SET NAMES 'UTF8' ");
			$result = mysql_query("SELECT * FROM $tb_name order by structure" );
			while($data =  mysql_fetch_array($result))
			{
			echo '<option value="'.$data[4].'">'.$data[1].'</option>';
			}
		echo '</select>'."\n"; 
	echo "</div>";
	}
	function WILAYA($x,$y,$name,$class,$db_name,$tb_name,$value,$selected) 
	{
	mysqlconnect();
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";		 
	echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
	$result = mysql_query("SELECT * FROM $tb_name order by WILAYAS" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data[0].'">'.$data[1].'</option>';
	}
	echo '</select>'."\n"; 
	echo "</div>";
	}
	function COMMUNE($x,$y,$name,$class,$value,$selected) 
	{
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";		 
	echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
	echo '</select>'."\n";
	echo "</div>";
	}
	function ADRESSE($x,$y,$name,$class,$db_name,$tb_name,$value,$selected) 
	{
	mysqlconnect();
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";		 
	echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
	$result = mysql_query("SELECT * FROM $tb_name order by Adresse" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data[1].'">'.ucwords($data[1]).'</option>';
	}
	echo '</select>'."\n"; 
	echo "</div>";
	}
	function idp() 
	{
	mysqlconnect();
	$sql = " select IDP from don   order by  IDP desc limit 1";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$row = mysql_fetch_array($requete); 
	$IDP=$row['IDP'];
	mysql_free_result($requete);
	return $IDP+1;
	}
	function SER($x,$y,$name,$db_name,$tb_name) 
	{
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
	mysqlconnect();	 
	echo "<select size=1 class=\"ARS\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">Service</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name  " );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['service'].'</option>';
	}
	echo '</select>'."\n"; 
	echo "</div>";
	}
	
	function dci1($x,$y,$name) 
	{
	echo "<div class=\"frmSearch\" \">";	
	echo '<select id="suggesstion-box" class=\"ARS\"  name="'.$name.'" >';
	echo '</select> '; 
	echo "</div>";
	}
	
	
	
	
	
	function dci($x,$y,$name,$db_name,$tb_name) 
	{	
	mysqlconnect();	 
	echo "<select size=1 class=\"ARS\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">Designation Produit</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name order by mecicament" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['mecicament'].$data['pre'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	
	
	
	function medicament($x,$y,$name,$db_name,$tb_name) 
	{
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
	mysqlconnect();	 
	echo "<select size=1 class=\"ARS\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">Designation Produit</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name order by mecicament  " );//limit 0,100
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['mecicament'].$data['pre'].'</option>';
	}
	echo '</select>'."\n"; 
	echo "</div>";
	}
	function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."-".$M."-".$A ;
    return $dateUS2FR;//01-01-2013
    }
	
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
    function hr($x,$y){
		echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
		echo '<hr class="new1">';
		echo "</div>";
		}
    function h($h,$x,$y,$txt){echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 echo "<h".$h." >".$txt."</h".$h.">";echo "</div>";}
	function f0($url,$method){echo "<form class=\"form\" action=\"".$url."\" method=\"".$method."\" name=\"form1\" id=\"form1\">";}
	function label($x,$y,$l){echo "<div class=\"label\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	echo $l;echo "</div>";}
	function txt($x,$y,$name,$size,$value){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" required  />";echo "</div>";}
    function txtw($x,$y,$name,$size,$value){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" id=\"datejour1\"/>";echo "</div>";}
	
	function txtron($x,$y,$name,$size,$value){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" readonly  />";echo "</div>";}
	function ANOMALIE($x,$y,$name,$size,$value){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" id=\"ANOMALIE\"  />";echo "</div>";}
	function txtjss($x,$y,$name,$size,$value,$cal){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\"  onblur=\"$cal\"   />";echo "</div>";}
	function txtar($x,$y,$name,$size,$value){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input style=\"text-align:right;\"  id=\"tiba\"  type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" required  />";echo "</div>";}
	function txtarid($x,$y,$id,$name,$size,$value){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input id=\"".$id."\"   style=\"text-align:right;\" type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" required  />";echo "</div>";}
	
	function range($x,$y,$name,$size,$value){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input type=\"number\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\"   max=\"50\" min=\"0\" step=\"5\"      required  />";echo "</div>";}
	function txt0($x,$y,$name,$size,$value){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" />";echo "</div>";}
	function date($x,$y,$name,$size,$value){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input id=\"datejour\"type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" required  />";echo "</div>";}
	function date1($x,$y,$name,$size,$value,$nomfonction){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input id=\"datejour1\"type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" onblur=\"".$nomfonction."\"  />";echo "</div>";}
	
	function txtautofocus($x,$y,$name,$size,$value){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" required autofocus />";echo "</div>";}
	function txts($x,$y,$name,$size,$value,$param){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input style=\"text-align:center;\"   type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\"  id=\"".$param."\"   required />";echo "</div>";}
	function verif($id,$val) {if ($id == $val){return 'checked';}}
	function hide($x,$y,$name,$size,$value){echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	  echo " <input type=\"hidden\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" />";echo "</div>";}
	function sautligne($x){for ($i=1; $i<=$x; $i++){echo "<br />";}}
	function submit($x,$y,$value){echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 echo " <input type=\"submit\" name=\"VALIDER\" id=\"VALIDER\" style=\"color: red\" value=\" ".$value."\" />";echo "</div>";}
	function reset($x,$y,$value) {echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 echo " <input type=\"reset\"  name=\"VALIDER1\" id=\"VALIDER1\" style=\"color: red\" value=\" ".$value."\" />";echo "</div>";}
	function combov($x,$y,$name,$Jour){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo "<select name=\"".$name."\" >";foreach ($Jour as $value) { echo "<option>$value</option>";}echo "</select> ";	echo "</div>"; }
	function combovsex($x,$y,$name,$Jour){echo "<div id=\"combovsex\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo "<select name=\"".$name."\" >";foreach ($Jour as $value) { echo "<option>$value</option>";}echo "</select> ";	echo "</div>"; }
	function photosurl($x,$y,$nom){echo "<div style=\"position:absolute;left:".$x."px;top:".$y."px;\">";echo "<p><input type=\"button\" value=\"zoom (&ndash;)\" onClick=\"changeTaille(-5)\"><input type=\"button\" value=\"zoom (+)\" onClick=\"changeTaille(5)\"></p>";echo "<p>&nbsp;&nbsp;<img id=\"image\" src = \"".$nom."\" style=\"height:250px; width:250px\" alt=\"Photos\" ></p>";	 echo "</div>";}
	function lab1 ($ques) {echo'<tr bgcolor="yellow"> <td colspan=5 >'.$ques.'</td></tr>';}
	function ques1 ($nom,$ques,$yes,$no){echo'<tr>'; echo'<td>'.$ques.'</td>';echo'<td style="text-align:center;"><input type="radio" name="'.$nom.'" value="1" '.$yes.' /></td>';echo'<td style="text-align:center;"><input type="radio" name="'.$nom.'" value="0" '.$no.' /></td>';echo'</tr>';}
	function chekbox($x,$y,$nom){echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	  echo " <input id=\"CHECK\"    type=\"checkbox\" name=\"$nom\"  />";echo "</div>";}
	function chekboxed($x,$y,$nom){echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">"; echo " <input id=\"CHECK\"    type=\"checkbox\" name=\"$nom\" checked=\"checked\" />";echo "</div>";}
	function chekboxvx($x,$y,$nom,$vx){echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">"; echo "<input id=\"CHECK\"   type=\"checkbox\" name=\"$nom\" $vx >";echo "</div>";}
	
	function radio($x,$y,$nom,$val){echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input type=\"radio\" name=\"$nom\" value=\"$val\"  />";echo "</div>";}
	function radioed($x,$y,$nom,$val){echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input type=\"radio\" name=\"$nom\" value=\"$val\" checked=\"checked\"    />";echo "</div>";}

	function f1() {echo "</form> ";}
	function url($x,$y,$url,$value,$h){echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">"; echo "<h".$h." >"."<a href=\"".$url."\">".$value."</a>"."</h".$h.">"; echo "</div>";}
	function urlbutton($x,$y,$url,$value,$h){echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo "<a href=\"".$url."\"><input type=\"button\"value=\"".$value."\"style=\"color: red  \" /></a>";echo "";echo "</div>";}
	function txtjs($x,$y,$name,$size,$value,$action){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input    type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\"  onblur=\"".$action."\" required />";echo "</div>";}
	function txtjs1($x,$y,$name,$size,$value,$action){echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";echo " <input  id=\"datejour\"   type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\"  onblur=\"".$action."\" required />";echo "</div>";}
	function combovc($x,$y,$name,$Jour)  //como vierge//$per ->combov(100,900,'gggg',array("?????", "???????", "???????", "????????", "??????", "??????", "?????"))   ;  
	{
	 echo "<div id=\"combovsex\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo "<select name=\"".$name."\" >";
	 foreach ($Jour as $cle => $value) 
		{
		echo"<OPTION VALUE=\"".$value."\">".$cle."</OPTION>";
		}
	 echo "</select> ";	
	 echo "</div>"; 
    }
	function combov1($x,$y,$name,$Jour)  
	{
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	echo "<select name=\"".$name."\" >";
	foreach ($Jour as $cle => $value) 
	{
	echo"<OPTION VALUE=\"".$value."\">".$cle."</OPTION>";
	}
	echo "</select> ";
	echo "</div>";
	} 
	
	function combov2($x,$y,$name,$Jour)  
	{
	echo "<div class=\"ANOMALIEX\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
		echo "<select class=\"ANOMALIEX\" name=\"".$name."\" >";
		foreach ($Jour as $cle => $value) 
		{
		echo"<OPTION VALUE=\"".$value."\">".$cle."</OPTION>";
		}
		echo "</select> ";
	echo "</div>";
	} 

	
	function fieldset($class,$legend)
	{
	echo "<fieldset class=\"".$class."\">";
	echo " <legend  class=\"legend\">".$legend."</legend>";
	echo "</fieldset>";
    }
	function textarea1($x,$y,$nom,$rows,$cols) 
	{
	
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo "<textarea STYLE=\"Text-ALIGN:left\" rows=$rows cols=$cols   name=\"".$nom."\"  value=\"\"> </textarea>";
	 echo "</div>";
	} 
	
	function CHAPITRE($x,$y,$name,$db_name,$tb_name) 
	{
	mysqlconnect();
	// echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"CHAPITRE\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">selectionner chapitre</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name order by CHAP" );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.$data[1].'</option>';
    }
	echo '</select>'."\n"; 
	// echo "</div>";
	}
    function CATEGORIECIM($x,$y,$name) 
	{
	// echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"CATEGORIECIM\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">sous-categorie</option>"."\n";
    // echo '</select>'."\n"; 
	echo "</div>";
	}
//***************************************************************************************************************************************************//
	function verifsession() 
	{
		if (!Session::get('loggedIn') == 1) 
		header("Location: ".URL."login") ;
	}
	function backforward($backforward,$value)
	{
	echo "<button onclick=\"javascript:".$backforward."();\">".$value."</button>";
	}
	function NAV()
	{
	echo '<div  id="sn" >';
	$this->backforward('history.back','Précédent');echo '&nbsp;';
	$this->backforward('location.reload','Recharger la page');echo '&nbsp;';  
	$this->backforward('history.forward','Suivant');echo '&nbsp;';
	$this->backforward('toggleFullScreen','fullscreen');echo '&nbsp;';//la fonctin se trouve au niveau du fichier fonction js
	echo '</div>';
	}
	function button($btn,$id)
	{
	echo "<div id=\"smenu\">";
	if ($btn=='admin') 
	{
	echo '<a href="'.URL.'admin/Users">Users</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'admin/">Agence Regionale</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'admin/">Wilaya Regionale</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'admin/">Structure De Transfusion</a>'; echo '&nbsp;';
	}
	if ($btn=='dnr') 
	{
	echo '<a href="'.URL.'dnr/doublons/">DNR doublons </a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/wilaya/">DNR Wilaya </a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/commune/">DNR Commune </a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/adresse/">DNR Adresse </a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/DPD/">DNR Dons</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/COMP/">Collectes </a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/ND/">ND </a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/TD/">TD </a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/XD/">X2D </a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/BD/">BD </a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/stat/">stat </a>'; echo '&nbsp;';
	}
	if ($btn=='don') 
	{
	echo '<a href="'.URL.'pdf/CARTDNRPDF.php?uc='.$id.'">C-Dnr</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pdf/CARTABORDNR.php?uc='.$id.'">C-Grp</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pdf/PROSDNRFR.php?uc='.$id.'">P-fr</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'tcpdf/pdf.php?uc='.$id.'">P-ar</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pdf/LABODNR.php?uc='.$id.'">B-Std </a>'; echo '&nbsp;';
	//echo '<a href="'.URL.'pdf/FDNRPDF.php?uc='.$id.'">F-Dnr</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/prenuptial/'.$id.'">C-Pre</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pdf/BIOMETRIE.php?uc='.$id.'">BIOM</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'pdf/Bio1.pdf"></a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/Donate/'.$id.'">Faire un Don</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/Bilan/'.$id.'">Bilan Biologique</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/ordonnacednr/'.$id.'">Ordonnace</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/view/'.$id.'">View Dnr</a>'; echo '&nbsp;';
	}
	if ($btn=='qua') 
	{
	echo '<a href="'.URL.'qua/search/0/10?q=&o=IDP">Dons Qualifiers</a>'; echo '&nbsp;';	
	echo '<a href="'.URL.'don/HVB/">Serologie (+)</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'mal/">Malade</a>'; echo '&nbsp;';	
	echo '<a href="'.URL.'MDO/">MDO</a>'; echo '&nbsp;';	
	echo '<a href="'.URL.'qua/">Qualifications Dons</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'mal/impmal/">Imprimer Malades</a>'; echo '&nbsp;';	
	}
	if ($btn=='pre') 
	{
	echo '<a href="'.URL.'pre/search/0/10?q=&o=IDP">Dons prepares</a>'; echo '&nbsp;';
	}
	if ($btn=='rec') 
	{
	echo '<a href="'.URL.'stock/cgr">Stock CGR</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'stock/pfc">Stock PFC</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'stock/cps">Stock CPS</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'rec/DPR/">Distribution/Receveur</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'rec/HOS/">Hospitalisation</a>'; echo '&nbsp;';
	//echo '<a href="'.URL.'pdf/impdpr.php">imp dis/rec</a>'; echo '&nbsp;';
	}
	if ($btn=='dis') 
	{
	echo '<a href="'.URL.'pdf/CARTABORREC.php?uc='.$id.'">C-G</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pdf/info.php?uc='.$id.'">INF</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pdf/LABODIS.php?uc='.$id.'">B-S</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pdf/fichetrans.php?uc='.$id.'">F-T</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pdf/commande.php?uc='.$id.'">C-PSL</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'rec/discgr/'.$id.'">PSL</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'rec/Bilan/'.$id.'">Bilan Biologique</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'rec/ordonnacerec/'.$id.'">Ordonnace</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pdf/Hospitalisation.php?uc='.$id.'">Hospitalisation</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'rec/view/'.$id.'">VIEW</a>'; echo '&nbsp;';
	}
	if ($btn=='eva') 
	{
	echo '<a href="'.URL.'eva/">PTS</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'eva/upl/">UPL</a>'; echo '&nbsp;';	
	echo '<a href="'.URL.'eva/download/">DOW</a>'; echo '&nbsp;';	
	echo '<a href="'.URL.'dnr/dump/">DUMP</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'ist/">IST</a>'; echo '&nbsp;';	
	echo '<a href="'.URL.'ist/procedure">PRO</a>'; echo '&nbsp;';	
	// echo '<a href="'.URL.'stat/">STAT</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pha/pha">Pharmacie</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'stock">STOCK</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'doc/trans">Bibliotheque</a>'; echo '&nbsp;';	
	echo '<a href="'.URL.'ist/map">MAP</a>'; echo '&nbsp;';	
	echo '<a href="'.URL.'dnr/ALGERIE/">DJELFA</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/AFRIQUE/">AFRIQUE</a>'; echo '&nbsp;';
	}
	if ($btn=='pan') 
	{
	echo '<a href="'.URL.'pan/cat/A">Produit</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pan/pan">Panier</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pan/gestion/A">Gestion</a>'; echo '&nbsp;';
	}
	if ($btn=='ord') 
	{
	echo '<a href="'.URL.'pha/pha">Medicament</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pha/ord">Ordonnace</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pha/gestion/A">Gestion</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pha/">Pharmacie</a>'; echo '&nbsp;';
	}
	if ($btn=='pat') 
	{
	echo '<a href="'.URL.'pat/Rapport">Rapport</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pat/MALHOSP">Malade Hospitalise </a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pat/">Patient</a>'; echo '&nbsp;';
	}
	if ($btn=='mnpe') 
	{
	echo '<a href="'.URL.'mnpe/MNPE">MNPE</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'mnpe/PA">PA</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'mnpe/TA">TA</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'mnpe/PT">PT</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'mnpe/RPTMNPE">RPT</a>'; echo '&nbsp;';
	}
	if ($btn=='deces') 
	{
	echo '<a href="'.URL.'deces">Search Certificat</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'deces/NDECES">Nouveau Certificat </a>'; echo '&nbsp;';
	echo '<a href="'.URL.'deces/LDECES">Liste Certificats </a>'; echo '&nbsp;';
	echo '<a href="'.URL.'deces/eva">Rapport PDF</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'deces/EVALUATION">Rapport HTML</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'deces/ALGERIE/">SIG DJELFA</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'deces/dump/">Dump</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'deces/miseajours/">miseajours</a>'; echo '&nbsp;';
	
	echo '<a href="'.URL.'deces/CIM">CIM</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'mnpe/RPTMNPE">RPT</a>'; echo '&nbsp;';
	}
	if ($btn=='cons') 
	{
	echo '<a href="'.URL.'pat/Hosp/'.$id.'">Consultation</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pat/Bilan/'.$id.'">Biologique</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pat/Radio/'.$id.'">Radiologique</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'Pat/ordonnacepat/'.$id.'">Ordonnace</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pat/vaccin/'.$id.'">Vaccination</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'Pat/Perinat/'.$id.'">Perinat</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'Pat/dial/'.$id.'">Dialyse</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'Pat/view/'.$id.'">View Pat</a>'; echo '&nbsp;';
	}
	if ($btn=='pointdeau') 
	{
	echo '<a href="'.URL.'pointdeau/">pointdeau</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pointdeau/SOAEP/">Surveillance</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pointdeau/Evaluation/">Evaluation</a>'; echo '&nbsp;';
	}
	if ($btn=='hemod') 
	{
	echo '<a href="'.URL.'hemod/">Aj Hemod</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'hemod/news">Aj Seance</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'hemod/Bilan">Aj Bilan</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'hemod/Evaluation">Evaluation</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'hemod/Agenda/'.date('d').'/'.date('m').'/'.date('Y').'">Agenda</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'hemod/Bordereau/">Bordereau</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'hemod/Bilananemie/">Bilan anemie</a>'; echo '&nbsp;';
	}
	if ($btn=='hemow') 
	{
	echo '<a href="'.URL.'hemod/ordonnace/'.$id.'">Ordonnace</a>'; echo '&nbsp;';
    echo '<a href="'.URL.'hemod/dbilans/'.$id.'">Dbilans</a>'; echo '&nbsp;';
	
	echo '<a href="'.URL.'tcpdf/hemod/histohemodbilan.php?id='.$id.'">Bilans pdf</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'tcpdf/hemod/histohemodseance.php?id='.$id.'">Seances pdf</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'hemod/sbilans/'.$id.'">Sbilans</a>'; echo '&nbsp;';
	
	
	echo '<a href="'.URL.'hemod/Facture/'.$id.'">Facture</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'hemod/edit/'.$id.'">edit</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'hemod/view/'.$id.'">View</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'hemod/">Hemod</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'hemod/Sortir/'.$id.'">Sortir</a>'; echo '&nbsp;';
	}
	if ($btn=='scolaire') 
	{
	echo '<a href="'.URL.'scolaire/">Eleve</a>'; echo '&nbsp;'; 
    echo '<a href="'.URL.'scolaire/vms">Visite</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'scolaire/Suivi/">Suivi</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'scolaire/chsl/">Controle Hyginne </a>'; echo '&nbsp;';
	echo '<a href="'.URL.'scolaire/vac/">Vaccination </a>'; echo '&nbsp;';
	//echo '<a href="'.URL.'scolaire/Agenda/'.date('m').'/'.date('Y').'">Agenda</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'scolaire/Agenda/'.date('d').'/'.date('m').'/'.date('Y').'">Agenda</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'scolaire/Etablissement/">Etablissement</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'scolaire/Effectif/">Effectif</a>'; echo '&nbsp;';
	
	echo '<a href="'.URL.'scolaire/Evaluation/">Evaluation</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'scolaire/bo/">bo</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'tcpdf/histohemodbilan.php?id='.$id.'">Bilans pdf</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'tcpdf/histohemodseance.php?id='.$id.'">Seances pdf</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'scolaire/edit/'.$id.'">edit</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'scolaire/view/'.$id.'">View</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'scolaire/">Hemod</a>'; echo '&nbsp;';
	}
	if ($btn=='scolaireid') 
	{
	echo '<a href="'.URL.'scolaire/">Acceuil</a>'; echo '&nbsp;'; 
	echo '<a href="'.URL.'scolaire/VMSID/'.$id.'">VMSID</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'scolaire/ordonnance/'.$id.'">ordonnance</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'scolaire/view/'.$id.'">View</a>'; echo '&nbsp;';
	}
	if ($btn=='Bureauordre') 
	{
	echo '<a href="'.URL.'Bureauordre/">Bureauordre</a>'; echo '&nbsp;'; 
	echo '<a href="'.URL.'Bureauordre/listmessage/0">listmessage</a>'; echo '&nbsp;'; 

	}
    if ($btn=='Bordereau') 
	{
	echo '<a href="'.URL.'Bordereau/">Bordereau</a>'; echo '&nbsp;';  
	echo '<a href="'.URL.'Bordereau/Evaluation">Evaluation</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'Bordereau/Evaluation1">Rapport</a>'; echo '&nbsp;';
	}
	 if ($btn=='maldecobl') 
	{
	echo '<a href="'.URL.'maldecobl/">MDO</a>'; echo '&nbsp;';  
	// echo '<a href="'.URL.'maldecobl/Evaluation">Evaluation</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'maldecobl/Evaluation">Rapport</a>'; echo '&nbsp;';
	}
	 if ($btn=='mors') 
	{
	echo '<a href="'.URL.'mors/">MORS</a>'; echo '&nbsp;';  
	// echo '<a href="'.URL.'maldecobl/Evaluation">Evaluation</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'mors/Evaluation">Rapport</a>'; echo '&nbsp;';
	}
	
	if ($btn=='inspection') 
	{
	echo '<a href="'.URL.'inspection/">Structure</a>'; echo '&nbsp;';  
	// echo '<a href="'.URL.'maldecobl/Evaluation">Evaluation</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'inspection/inspecteur">inspection</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'inspection/ALGERIE">Sig Structures</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'inspection/evaluation">Evaluation</a>'; echo '&nbsp;';  
	
	}
	if ($btn=='inspecteur') 
	{
	echo '<a href="'.URL.'inspection/">Structure</a>'; echo '&nbsp;';  
	// echo '<a href="'.URL.'maldecobl/Evaluation">Evaluation</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'inspection/inspecteur">inspection</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'inspection/ALGERIE">Sig Structures</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'inspection/evaluation">Evaluation</a>'; echo '&nbsp;';  
	
	}
	if ($btn=='rds') 
	{
	echo '<a href="'.URL.'rds/">Rupture Produit</a>';    echo '&nbsp;';
	// echo '<a href="'.URL.'rds/nrds/">Nouveau Rupture Produit</a>';    echo '&nbsp;';
	echo '<a href="'.URL.'rds/gestion">List Produit</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'rds/nrtr/">Retrait Produit</a>';    echo '&nbsp;';
	echo '<a href="'.URL.'rds/ordonnacerec/1">Ordonnance</a>'; echo '&nbsp;';   
	echo '<a href="'.URL.'rds/evaluation">Evaluation Rupture Produit</a>'; echo '&nbsp;';
	}
	
	if ($btn=='cour') 
	{
	echo '<a href="'.URL.'cour/">Courrier</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'cour/ncour/">Courrier Arrivé</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'cour/ncour1/">Courrier Depart</a>';echo '&nbsp;';
	echo '<a href="'.URL.'cour/odm/">Ordre de mission</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'cour/gestion">List Produit</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'cour/nrtr/">Retrait Produit</a>';    echo '&nbsp;';
	// echo '<a href="'.URL.'cour/ordonnacerec/1">Ordonnance</a>'; echo '&nbsp;';   
	echo '<a href="'.URL.'cour/evaluation">Evaluation Courrier </a>'; echo '&nbsp;';
	}
	
	if ($btn=='drh') 
	{
	echo '<a href="'.URL.'drh/">Structure</a>'; echo '&nbsp;';  
	//echo '<a href="'.URL.'drh/inspecteur">inspection</a>'; echo '&nbsp;';
	//echo '<a href="'.URL.'drh/ALGERIE">Sig Structures</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'drh/evaluation">Evaluation</a>'; echo '&nbsp;';  
	
	}
	
	$this->NAV();
	echo'</div>';//
	}
//*************************************************************************************************************************************//	

	//menu final
	function smunu($data) //ancienne verssion a enleve plus tard  
		{
				echo "<form   onsubmit=\"return validateForm11(this);\" name=\"form1\"  action=\"".URL.$data['c']."/".$data['m']."/0/10\" method=\"GET\">" ;
					echo "<tr bgcolor='#EDF7FF' >" ;
						echo "<td align=\"left\"  >" ;
							echo "<select name=\"o\" style=\"width: 100px;\">" ;
								echo "<option value=\"".$data['v1']."\">".$data['v11']."</option>" ;
								echo "<option value=\"".$data['v2']."\">".$data['v22']."</option>" ;
								echo "<option value=\"".$data['v3']."\">".$data['v33']."</option>" ;
							echo "</select>&nbsp;" ;
							echo "<input type=\"search\"  placeholder=\"Search...\"    name=\"q\"  value=\"\"  autofocus /> " ;//<!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
							echo "<img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>" ;
							echo "<input type=\"submit\" name=\"\" value=\"".$data['submitvalue']."\"/> " ;
				echo "</form>" ;
							echo "<button  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\"><img src=\"".URL."public/images/icons/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>".$data['vb1']."</button> " ;
						echo "</td>" ;
						echo "<td align=\"right\"> " ;
							echo "<button  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\"><img src=\"".URL."public/images/icons/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>".$data['vb2']."</button> " ;
							echo "<button  onclick=\"document.location='".URL.$data['cb3']."/".$data['mb3']."/';  \"   title=\"".$data['tb3']."\"><img src=\"".URL."public/images/icons/".$data['icon3']."\" width='15' height='15' border='0' alt=''/>".$data['vb3']."</button> " ;
							echo "<button  onclick=\"document.location='".URL.$data['cb4']."/".$data['mb4']."/';  \"   title=\"".$data['tb4']."\"><img src=\"".URL."public/images/icons/".$data['icon4']."\" width='15' height='15' border='0' alt=''/>".$data['vb4']."</button> " ;
						echo "</td>" ;
					echo "</tr>" ;	
		}
	function smunuf($data) //verssion  finale  avec combo dynamique 
	{
			echo "<form   onsubmit=\"return validateForm11(this);\" name=\"form1\"  action=\"".URL.$data['c']."/".$data['m']."/0/10\" method=\"GET\">" ;
				echo "<tr bgcolor='#EDF7FF' >" ;
					echo "<td align=\"left\"  >" ;
						echo "<select name=\"o\" style=\"width: 100px;\">" ;				
						foreach ($data['combo'] as $cle => $value) 
						{
						echo"<OPTION VALUE=\"".$value."\">".$cle."</OPTION>";
						}	
						echo "</select>&nbsp;" ;
						echo "<input type=\"search\"  placeholder=\"Search...\"    name=\"q\"  value=\"\"  autofocus /> " ;//<!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
						echo "<img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>" ;
						echo "<input type=\"submit\" name=\"\" value=\"".$data['submitvalue']."\"/> " ;
			echo "</form>" ;
						echo "<button  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\"><img src=\"".URL."public/images/icons/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>".$data['vb1']."</button> " ;
					echo "</td>" ;
					echo "<td align=\"right\"> " ;
						echo "<button  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\"><img src=\"".URL."public/images/icons/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>".$data['vb2']."</button> " ;
						echo "<button  onclick=\"document.location='".URL.$data['cb3']."/".$data['mb3']."/';  \"   title=\"".$data['tb3']."\"><img src=\"".URL."public/images/icons/".$data['icon3']."\" width='15' height='15' border='0' alt=''/>".$data['vb3']."</button> " ;
						echo "<button  onclick=\"document.location='".URL.$data['cb4']."/".$data['mb4']."/';  \"   title=\"".$data['tb4']."\"><img src=\"".URL."public/images/icons/".$data['icon4']."\" width='15' height='15' border='0' alt=''/>".$data['vb4']."</button> " ;
					echo "</td>" ;
				echo "</tr>" ;	
	}
	function munu($menu) 
	{
	echo "<hr/>";
	echo "<br/>";
	echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
		if ($menu=='dnr')
		{
			echo "<form   onsubmit=\"return validateForm11(this);\" name=\"form1\"  action=\"".URL."Dnr/search/0/10\"   method=\"GET\"   >" ;
				echo "<tr bgcolor='#EDF7FF' >" ;
					echo "<td align=\"left\"  >" ;
						echo "<select name=\"o\" style=\"width: 100px;\">" ;
							echo "<option value=\"NOM\">Donor</option>" ;
							echo "<option value=\"GRABO\">Blood_Type</option>" ;
							echo "<option value=\"SEX\">Gender</option>" ;
						echo "</select>&nbsp;" ;
						echo "<input type=\"search\"  placeholder=\"Search...\"    name=\"q\"  value=\"\"  autofocus /> " ;//<!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
						echo "<img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>" ;
						echo "<input type=\"submit\" name=\"\" value=\"Search_donor\"/> " ;
			echo "</form>" ;
						echo "<button  onclick=\"document.location='".URL."dnr/newdnr/';  \"   title=\"New_donor\"><img src=\"".URL."public/images/icons/add.PNG\" width='15' height='15' border='0' alt=''/>New_donor</button> " ;
					echo "</td>" ;
					echo "<td align=\"right\"> " ;
						echo "<button  onclick=\"document.location='".URL."dnr/imp/';  \"   title=\"Print_donor\"><img src=\"".URL."public/images/icons/print.PNG\" width='20' height='20' border='0' alt=''/>Print_donor</button> " ;
						echo "<button  onclick=\"document.location='".URL."dnr/dnr/';  \"   title=\"graphe_donor\"><img src=\"".URL."public/images/icons/graph.PNG\" width='20' height='20' border='0' alt=''/>graphe_donor</button> " ;
						echo "<button  onclick=\"document.location='".URL."don/';  \"       title=\"Search_Don\"><img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>Search_Don</button> " ;
					echo "</td>" ;
				echo "</tr>" ;	
		}
		if ($menu=='don')
		{
			echo "<form   onsubmit=\"return validateForm11(this);\" name=\"form1\"  action=\"".URL."Don/search/0/10\"   method=\"GET\"   >" ;
				echo "<tr bgcolor='#EDF7FF' >" ;
					echo "<td align=\"left\"  >" ;
						echo "<select name=\"o\" style=\"width: 100px;\">" ;
							echo "<option value=\"IDP\">IDP</option>" ;
							echo "<option value=\"IDDNR\">IDDNR</option>" ;
							echo "<option value=\"GROUPAGE\">Blood_Type</option>" ;
							echo "<option value=\"SEXEDNR\">Gender</option>" ;
						echo "</select>&nbsp;" ;
						echo "<input type=\"search\"  placeholder=\"Search...\" name=\"q\"  value=\"\"  autofocus /> " ;//<!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
						echo "<img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>" ;
						echo "<input type=\"submit\" name=\"\" value=\"Search don\"/> " ;
			echo "</form>" ;
						//echo "<button  onclick=\"document.location='".URL."dnr/newdnr/';  \"   title=\"".New_donor."\"><img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>".New_donor."</button> " ;
					echo "</td>" ;
					echo "<td align=\"right\"> " ;
						echo "<button  onclick=\"document.location='".URL."don/impdon/';  \"   title=\"Print don\"><img src=\"".URL."public/images/icons/print.PNG\" width='20' height='20' border='0' alt=''/>Print don</button> " ;
						echo "<button  onclick=\"document.location='".URL."don/IND/';  \"      title=\"graphe don\"><img src=\"".URL."public/images/icons/graph.PNG\" width='20' height='20' border='0' alt=''/>graphe don</button> " ;
						echo "<button  onclick=\"document.location='".URL."dnr/';  \"          title=\"Search dnr\"><img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>Search dnr</button> " ;
					echo "</td>" ;
				echo "</tr>" ;	
		}
		if ($menu=='qua')
		{
			echo "<form   onsubmit=\"return validateForm11(this);\" name=\"form1\"  action=\"".URL."Don/search/0/10\"   method=\"GET\"   >" ;
				echo "<tr bgcolor='#EDF7FF' >" ;
					echo "<td align=\"left\"  >" ;
						echo "<select name=\"o\" style=\"width: 100px;\">" ;
							echo "<option value=\"IDP\">IDP</option>" ;
							echo "<option value=\"IDDNR\">IDDNR</option>" ;
							echo "<option value=\"GROUPAGE\">".Blood_Type."</option>" ;
							echo "<option value=\"SEXEDNR\">".Gender."</option>" ;
						echo "</select>&nbsp;" ;
						echo "<input type=\"text\" name=\"q\"  value=\"\"  autofocus /> " ;//<!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
						echo "<img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>" ;
						echo "<input type=\"submit\" name=\"\" value=\"Search don\"/> " ;
			echo "</form>" ;
						//echo "<button  onclick=\"document.location='".URL."dnr/newdnr/';  \"   title=\"".New_donor."\"><img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>".New_donor."</button> " ;
					echo "</td>" ;
					echo "<td align=\"right\"> " ;
						echo "<button  onclick=\"document.location='".URL."don/impdon/';  \"   title=\"Print don\"><img src=\"".URL."public/images/icons/print.PNG\" width='20' height='20' border='0' alt=''/>Print don</button> " ;
						echo "<button  onclick=\"document.location='".URL."don/IND/';  \"      title=\"graphe don\"><img src=\"".URL."public/images/icons/graph.PNG\" width='20' height='20' border='0' alt=''/>graphe don</button> " ;
						echo "<button  onclick=\"document.location='".URL."dnr/';  \"          title=\"Search dnr\"><img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>Search dnr</button> " ;
					echo "</td>" ;
				echo "</tr>" ;	
		}
		if ($menu=='rec')
		{
			echo "<form   onsubmit=\"return validateForm11(this);\" name=\"form1\"  action=\"".URL."rec/search/0/10\"   method=\"GET\"   >" ;
				echo "<tr bgcolor='#EDF7FF' >" ;
					echo "<td align=\"left\"  >" ;
						echo "<select name=\"o\" style=\"width: 100px;\">" ;
							echo "<option value=\"NOM\">Recever</option>" ;
							echo "<option value=\"GRABO\">".Blood_Type."</option>" ;
							echo "<option value=\"SEX\">".Gender."</option>" ;
						echo "</select>&nbsp;" ;
						echo "<input type=\"search\"  placeholder=\"Search...\" name=\"q\"  value=\"\"  autofocus /> " ;//<!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
						echo "<img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>" ;
						echo "<input type=\"submit\" name=\"\" value=\"Search Recever\"/> " ;
			echo "</form>" ;
						echo "<button  onclick=\"document.location='".URL."rec/newrec/';  \"   title=\"New Recever\"><img src=\"".URL."public/images/icons/add.PNG\" width='20' height='20' border='0' alt=''/>New Recever</button> " ;
					echo "</td>" ;
					echo "<td align=\"right\"> " ;
						echo "<button  onclick=\"document.location='".URL."rec/imp/';  \"   title=\"Print Recever\"><img src=\"".URL."public/images/icons/print.PNG\" width='20' height='20' border='0' alt=''/>Print Recever </button> " ;
						echo "<button  onclick=\"document.location='".URL."rec/';  \"       title=\"Graphe Recever\"><img src=\"".URL."public/images/icons/graph.PNG\" width='20' height='20' border='0' alt=''/>Graphe Recever</button> " ;
						echo "<button  onclick=\"document.location='".URL."dis/';  \"       title=\"Search dis\"><img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>Search dis</button> " ;
					echo "</td>" ;
				echo "</tr>" ;	
		}
		if ($menu=='dis')
		{
		    $data = array(
			"c"   => 'dis',
			"m"   => 'search',
			"v1"  => 'IDREC',  "v11" => 'Recever',
			"v2"  => 'GRABO',  "v22" => 'Blood_Type',
			"v3"  => 'SEX',    "v33" => 'Gender',
			"submitvalue" => 'Search_Distribution',
			"cb1" => 'rec',"mb1" => 'newrec',  "tb1" => 'New_Recever',   "vb1" => 'New_Recever',   "icon1" => 'add.PNG',
			"cb2" => 'dis',"mb2" => 'impdis',  "tb2" => 'Print_Dist', "vb2" => 'Print_Dist', "icon2" => 'print.PNG',
			"cb3" => 'dis',"mb3" => 'CGR',     "tb3" => 'graphe_Dist',"vb3" => 'graphe_Dist',"icon3" => 'graph.PNG',
			"cb4" => 'rec',"mb4" => 'xxx',     "tb4" => 'Search_rec',"vb4" => 'Search_rec',"icon4" => 'search.PNG'
			);
			$this->smunu($data);	
		}

		if ($menu=='deces')
		{
			$data = array(
			"c"   => 'deces',
			"m"   => 'search',
			"combo"   => array( 
								"Nom"            => 'NOM',
							    "Prenom"         => 'PRENOM',
								"Sexe"           => 'SEX',
								"Date naissance" => 'DATENAISSANCE',//00-00-0000
								"Date deces"     => 'DINS'//0000-00-00
							  ),
			"submitvalue" => 'Search_Certificat',
			"cb1" => 'deces',"mb1" => 'NDECES',  "tb1" => 'New_Certificat',   "vb1" => 'New_Certificat',   "icon1" => 'add.PNG',
			"cb2" => 'deces',"mb2" => 'imp',     "tb2" => 'Print_Certificat', "vb2" => 'Print_Certificat', "icon2" => 'print.PNG',
			"cb3" => 'deces',"mb3" => 'CGR',     "tb3" => 'graphe_Certificat',"vb3" => 'graphe_Certificat',"icon3" => 'graph.PNG',
			"cb4" => 'deces',"mb4" => '',        "tb4" => 'Search_Certificat',"vb4" => 'Search_Certificat',"icon4" => 'search.PNG'
			);
			$this->smunuf($data);	

		}
		if ($menu=='pointdeau')
		{
			$data = array(
			"c"   => 'pointdeau',
			"m"   => 'search',
			"combo"   => array( 
								"NUM"            => 'NUM',
							    "TOAEP"         => 'TOAEP'
								
							  ),
			"submitvalue" => 'Search_Pointdeau',
			"cb1" => 'pointdeau',"mb1" => 'OAEP', "tb1" => 'New_Pointdeau',   "vb1" => 'New_Pointdeau',   "icon1" => 'add.PNG',
			"cb2" => 'pointdeau',"mb2" => '',     "tb2" => 'Print_Pointdeau', "vb2" => 'Print_Pointdeau', "icon2" => 'print.PNG',
			"cb3" => 'pointdeau',"mb3" => '',     "tb3" => 'graphe_Pointdeau',"vb3" => 'graphe_Pointdeau',"icon3" => 'graph.PNG',
			"cb4" => 'pointdeau',"mb4" => '',     "tb4" => 'Search_Pointdeau',"vb4" => 'Search_Pointdeau',"icon4" => 'search.PNG'
			);
			$this->smunuf($data);	

		}
		if ($menu=='hemod')
		{
			$data = array(
			"c"   => 'hemod',
			"m"   => 'search',
			"combo"   => array( 
								"Nom"      => 'NOM',
							    "Prenom"   => 'PRENOM',
							    "ABO"      => 'GRABO',
								"RH"       => 'GRRH',
								"Sexe"     => 'SEX'
							  ),
			"submitvalue" => 'Search_hemod',
			"cb1" => 'hemod',"mb1" => 'newhemod',"tb1" => 'New_hemod',   "vb1" => 'New_hemod',   "icon1" => 'add.PNG',
			"cb2" => 'hemod',"mb2" => 'imp',     "tb2" => 'Print_hemod', "vb2" => 'Print_hemod', "icon2" => 'print.PNG',
			"cb3" => 'hemod',"mb3" => 'xxx',     "tb3" => 'graphe_hemod',"vb3" => 'graphe_hemod',"icon3" => 'graph.PNG',
			"cb4" => 'hemod',"mb4" => 'Seance',  "tb4" => 'Search_Seance',"vb4" => 'Search_Seance',"icon4" => 'search.PNG'
			);
			$this->smunuf($data);	
		}		
		if ($menu=='hemos')
		{
			$data = array(
			"c"   => 'hemod',
			"m"   => 'searchs',
			"combo"   => array( 
								"ids"     => 'ids',
							    "id"      => 'id',
								"TYPEDIA" => 'TYPEDIA',
								"NAPP"    => 'NAPP'
								
								
							  ),
			"submitvalue" => 'Search_Seance',
			"cb1" => 'hemod',"mb1" => 'news',    "tb1" => 'New_Seance',   "vb1" => 'New_Seance',   "icon1" => 'add.PNG',
			"cb2" => 'hemod',"mb2" => 'imps',     "tb2" => 'Print_Seance', "vb2" => 'Print_Seance', "icon2" => 'print.PNG',
			"cb3" => 'hemod',"mb3" => 'xxx',     "tb3" => 'graphe_Seance',"vb3" => 'graphe_Seance',"icon3" => 'graph.PNG',
			"cb4" => 'hemod',"mb4" => 'index',        "tb4" => 'Search_Hemod',"vb4" => 'Search_Hemod',"icon4" => 'search.PNG'
			);
			$this->smunuf($data);
		}
		if ($menu=='hemob')
		{
			$data = array(
			"c"   => 'hemod',
			"m"   => 'search',
			"combo"   => array( 
								"Nom"      => 'NOM',
							    "Prenom"   => 'PRENOM',
							    "ABO"      => 'GRABO',
								"RH"       => 'GRRH',
								"Sexe"     => 'SEX'
							  ),
			"submitvalue" => 'Search_Bilan',
			"cb1" => 'hemod',"mb1" => 'Bilan',   "tb1" => 'New_Bilan',   "vb1" => 'New_Bilan',   "icon1" => 'add.PNG',
			"cb2" => 'hemod',"mb2" => 'imp',     "tb2" => 'Print_Bilan', "vb2" => 'Print_Bilan', "icon2" => 'print.PNG',
			"cb3" => 'hemod',"mb3" => 'xxx',     "tb3" => 'graphe_Bilan',"vb3" => 'graphe_Bilan',"icon3" => 'graph.PNG',
			"cb4" => 'hemod',"mb4" => 'xxx',     "tb4" => 'Search_Bilan',"vb4" => 'Search_Bilan',"icon4" => 'search.PNG'
			);
			$this->smunuf($data);	
		}
		if ($menu=='scolaire')
		{
			$data = array(
			"c"   => 'scolaire',
			"m"   => 'search',
			"combo"   => array( 
								"NEC"      => 'NEC',
								"Nom"      => 'NOM',
			                    "Prenom"   => 'PRENOM',
							    "Gorupage" => 'GRABO',
								"Sexe"     => 'SEXE'
							  ),
			"submitvalue" => 'Search_Eleve',
			"cb1" => 'scolaire',"mb1" => 'eleve',   "tb1" => 'New_Eleve',   "vb1" => 'New_Eleve',   "icon1" => 'add.PNG',
			"cb2" => 'scolaire',"mb2" => 'imp',     "tb2" => 'Print_Eleve', "vb2" => 'Print_Eleve', "icon2" => 'print.PNG',
			"cb3" => 'scolaire',"mb3" => '',        "tb3" => 'Graphe_Eleve',"vb3" => 'graphe_Eleve',"icon3" => 'graph.PNG',
			"cb4" => 'scolaire',"mb4" => 'vms',     "tb4" => 'Vms_Eleve',   "vb4" => 'Vms_Eleve',   "icon4" => 'search.PNG'
			);
			$this->smunuf($data);		
		}
		if ($menu=='Bureauordre')
		{
			$data = array(
			"c"   => 'Bureauordre',
			"m"   => 'search',
			"combo"   => array( 
								"Numero"          => 'Numero',
								"Etat"            => 'Etat',
			                    "Source"          => 'Source',
							    "Objet"           => 'Objet',
								"Destination"     => 'Destination'
							  ),
			"submitvalue" => 'Search_Bureauordre',
			"cb1" => 'Bureauordre',"mb1" => 'Message', "tb1" => 'New_Bureauordre',   "vb1" => 'New_Bureauordre',   "icon1" => 'add.PNG',
			"cb2" => 'Bureauordre',"mb2" => 'imp',     "tb2" => 'Print_Bureauordre', "vb2" => 'Print_Bureauordre', "icon2" => 'print.PNG',
			"cb3" => 'Bureauordre',"mb3" => '',        "tb3" => 'Graphe_Bureauordre',"vb3" => 'graphe_Bureauordre',"icon3" => 'graph.PNG',
			"cb4" => 'Bureauordre',"mb4" => 'vms',     "tb4" => 'Bureauordre',   "vb4" => 'Vms_Bureauordre',   "icon4" => 'search.PNG'
			);
			$this->smunuf($data);		
		}
		if ($menu=='Bordereau')
		{
			$data = array(
			"c"   => 'Bordereau',
			"m"   => 'search',
			"combo"   => array( 
								"id"          => 'id',
								"mois"            => 'mois',
			                    "annee"          => 'annee'
							  ),
			"submitvalue" => 'Search_Bordereau',
			"cb1" => 'Bordereau',"mb1" => 'NBordereau', "tb1" => 'New_Bordereau',      "vb1" => 'New_Bordereau',   "icon1" => 'add.PNG',
			"cb2" => 'Bordereau',"mb2" => 'imp',        "tb2" => 'Print_Bordereau',    "vb2" => 'Print_Bordereau', "icon2" => 'print.PNG',
			"cb3" => 'Bordereau',"mb3" => '',           "tb3" => 'Graphe_Bordereau',   "vb3" => 'graphe_Bordereau',"icon3" => 'graph.PNG',
			"cb4" => 'Bordereau',"mb4" => '',           "tb4" => 'Bordereau',          "vb4" => 'Bordereau',   "icon4" => 'search.PNG'
			);
			$this->smunuf($data);		
		}
		
		
		if ($menu=='maldecobl')
		{
			$data = array(
			"c"   => 'maldecobl',
			"m"   => 'search',
			"combo"   => array( 
								"id"          => 'id',
								"NOMPRENOM"   => 'NOMPRENOM',
			                    "SEXE"        => 'SEXE',
								"MDO"        => 'MDO'
							  ),
			"submitvalue" => 'Search_maldecobl',
			"cb1" => 'maldecobl',"mb1" => 'nmaldecobl', "tb1" => 'New_maldecobl',      "vb1" => 'New_maldecobl',   "icon1" => 'add.PNG',
			"cb2" => 'maldecobl',"mb2" => 'imp',        "tb2" => 'Print_maldecobl',    "vb2" => 'Print_maldecobl', "icon2" => 'print.PNG',
			"cb3" => 'maldecobl',"mb3" => '',           "tb3" => 'Graphe_maldecobl',   "vb3" => 'graphe_maldecobl',"icon3" => 'graph.PNG',
			"cb4" => 'maldecobl',"mb4" => '',           "tb4" => 'maldecobl',          "vb4" => 'maldecobl',   "icon4" => 'search.PNG'
			);
			$this->smunuf($data);		
		}
		if ($menu=='mors')
		{
			$data = array(
			"c"   => 'mors',
			"m"   => 'search',
			"combo"   => array( 
								"id"          => 'id',
								"NOMPRENOM"   => 'NOMPRENOM',
			                    "SEXE"        => 'SEXE'
								
							  ),
			"submitvalue" => 'Search_mors',
			"cb1" => 'mors',"mb1" => 'nmors',      "tb1" => 'New_mors',      "vb1" => 'New_mors',   "icon1" => 'add.PNG',
			"cb2" => 'mors',"mb2" => 'imp',        "tb2" => 'Print_mors',    "vb2" => 'Print_mors', "icon2" => 'print.PNG',
			"cb3" => 'mors',"mb3" => '',           "tb3" => 'Graphe_mors',   "vb3" => 'graphe_mors',"icon3" => 'graph.PNG',
			"cb4" => 'mors',"mb4" => '',           "tb4" => 'mors',          "vb4" => 'mors',       "icon4" => 'search.PNG'
			);
			$this->smunuf($data);		
		}
		
		if ($menu=='inspection')
		{
			$data = array(
			"c"   => 'inspection',
			"m"   => 'search',
			"combo"   => array( 
								// "id"=> 'id',
								"Nom"=> 'NOM',
								"Prenom"=> 'PRENOM',
			                    "Sexe"=> 'SEX',
								"Structure"=> 'STRUCTURE',
								"Etat Act=0/Des=1"=> 'ETAT',
								"Nature Pub=1/Pri=2"=> 'NATURE'
							  ),
			"submitvalue" => 'Search_structure',
			"cb1" => 'inspection',"mb1" => 'nstructure',      "tb1" => 'New_structure',      "vb1" => 'New_structure',   "icon1" => 'add.PNG',
			"cb2" => 'inspection',"mb2" => 'imp',        "tb2" => 'Print_structure',    "vb2" => 'Print_structure', "icon2" => 'print.PNG',
			"cb3" => 'inspection',"mb3" => '',           "tb3" => 'Graphe_structure',   "vb3" => 'graphe_structure',"icon3" => 'graph.PNG',
			"cb4" => 'inspection',"mb4" => '',           "tb4" => 'structure',          "vb4" => 'structure',       "icon4" => 'search.PNG'
			);
			$this->smunuf($data);		
		}
		
		if ($menu=='inspecteur')
		{
			$data = array(
			"c"   => 'inspecteur',
			"m"   => 'search',
			"combo"   => array( 
								// "id"=> 'id',
								"Nom"=> 'NOM',
								"Prenom"=> 'PRENOM',
			                    "Sexe"=> 'SEX',
								"Structure"=> 'STRUCTURE',
								"Etat Act=0/Des=1"=> 'ETAT',
								"Nature Pub=1/Pri=2"=> 'NATURE'
							  ),
			"submitvalue" => 'Search_structure',
			"cb1" => 'inspection',"mb1" => 'nstructure',      "tb1" => 'New_structure',      "vb1" => 'New_structure',   "icon1" => 'add.PNG',
			"cb2" => 'inspection',"mb2" => 'imp',        "tb2" => 'Print_structure',    "vb2" => 'Print_structure', "icon2" => 'print.PNG',
			"cb3" => 'inspection',"mb3" => '',           "tb3" => 'Graphe_structure',   "vb3" => 'graphe_structure',"icon3" => 'graph.PNG',
			"cb4" => 'inspection',"mb4" => '',           "tb4" => 'structure',          "vb4" => 'structure',       "icon4" => 'search.PNG'
			);
			$this->smunuf($data);		
		}
		
		if ($menu=='rds')
		{
			$data = array(
			"c"   => 'rds',
			"m"   => 'search',
			"combo"   => array( 
								"val0"=> 'id',
								"val1"=> 'date',
								"val2"=> '*',
			                    "val3"=> '*',
								"val4"=> '*',
								"val5"=> '*',
								"val6"=> '*'
							  ),
			"submitvalue" => 'Search_rds',
			"cb1" => 'rds',"mb1" => 'nrds',       "tb1" => 'New_rds',      "vb1" => 'New_rds',   "icon1" => 'add.PNG',
			"cb2" => 'rds',"mb2" => 'imp',        "tb2" => 'Print_rds',    "vb2" => 'Print_rds', "icon2" => 'print.PNG',
			"cb3" => 'rds',"mb3" => '',           "tb3" => 'Graphe_rds',   "vb3" => 'graphe_rds',"icon3" => 'graph.PNG',
			"cb4" => 'rds',"mb4" => '',           "tb4" => 'rds',          "vb4" => 'rds',       "icon4" => 'search.PNG'
			);
			$this->smunuf($data);		
		}
		
		if ($menu=='cour')
		{
			$data = array(
			"c"   => 'cour',
			"m"   => 'search',
			"combo"   => array( 
								"val0"=> 'id',
								"val1"=> 'date',
								"val2"=> '*',
			                    "val3"=> '*',
								"val4"=> '*',
								"val5"=> '*',
								"val6"=> '*'
							  ),
			"submitvalue" => 'Search_cour',
			"cb1" => 'cour',"mb1" => 'ncour',      "tb1" => 'New_cour',      "vb1" => 'New_cour',   "icon1" => 'add.PNG',
			"cb2" => 'cour',"mb2" => 'imp',        "tb2" => 'Print_cour',    "vb2" => 'Print_cour', "icon2" => 'print.PNG',
			"cb3" => 'cour',"mb3" => '',           "tb3" => 'Graphe_cour',   "vb3" => 'graphe_cour',"icon3" => 'graph.PNG',
			"cb4" => 'cour1',"mb4" => '',          "tb4" => 'cour1',         "vb4" => 'cour',       "icon4" => 'search.PNG'
			);
			$this->smunuf($data);		
		}
		if ($menu=='drh')
		{
			$data = array(
			"c"   => 'drh',
			"m"   => 'search',
			"combo"   => array( 
								//"idp"=> 'idp',
								"Nomlatin"=> 'Nomlatin',
								"Prenom_Latin"=> 'Prenom_Latin'
			                    //"val3"=> '*',
								//"val4"=> '*',
								//"val5"=> '*',
								//"val6"=> '*'
							  ),
			"submitvalue" => 'Search_drh',
			"cb1" => 'drh',"mb1" => 'ndrh',       "tb1" => 'New_drh',       "vb1" => 'New_drh',    "icon1" => 'add.PNG',
			"cb2" => 'drh',"mb2" => 'imp',        "tb2" => 'Print_cour',    "vb2" => 'Print_cour', "icon2" => 'print.PNG',
			"cb3" => 'drh',"mb3" => '',           "tb3" => 'Graphe_cour',   "vb3" => 'graphe_cour',"icon3" => 'graph.PNG',
			"cb4" => 'drh',"mb4" => '',           "tb4" => 'cour1',         "vb4" => 'cour',       "icon4" => 'search.PNG'
			);
			$this->smunuf($data);		
		}
		
	echo "</table>" ;
	}
	function lang ($lang,$route)
    {
		if($lang=='1') 
		{
		include $route;	
		}
		if($lang=='2') 
		{
		 include $route;	
		}
		if($lang=='3') 
		{
		include $route;	
		}
    }
	
	
//*************************************************************************************************************************************//	
	//partie graphe complete 
	
	
	function hemomois($parametre,$tbl,$datejour1,$datejour2,$idp) 
	{
	mysqlconnect();
	$query_liste1 = "SELECT id,DATE,$parametre FROM $tbl WHERE id ='$idp' and $parametre !=0 and DATE >='$datejour1'and DATE <='$datejour2'  ";
	$requete1 = mysql_query( $query_liste1 ) or die( "ERREUR MYSQL num�ro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete1);
	$query_liste = "SELECT id,DATE,$parametre,SUM($parametre)as bilan FROM $tbl WHERE id ='$idp' and DATE >='$datejour1'and DATE <='$datejour2' ";
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL num�ro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	
	$this -> sautligne (3); 
	while( $result = mysql_fetch_array( $requete ) )
	{
	$DPVAB=$result['bilan'];
	}
	mysql_free_result($requete);
	if ($totalmbr1=='0')
	{
	return $DPVAB=0;
	}
	else
	{
	return $DPVAB/$totalmbr1;
	}
	}
	function mdomois($DATEJOUR1,$DATEJOUR2) 
	{
	mysqlconnect();
	$sql = " select * from mdo1 where ( DATEMDO BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function graphe1mois($COLONE1,$TBL,$DATEJOUR1,$DATEJOUR2) 
	{
	mysqlconnect();
	$sql = " select $COLONE1 from $TBL where ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function graphe12mois($data) 
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet(); 
	$dataSet->addPoint(new Point("JAN",$data['JAN']));
	$dataSet->addPoint(new Point("FEV",$data['FEV'] ));
	$dataSet->addPoint(new Point("MAR",$data['MAR'] ));
	$dataSet->addPoint(new Point("AVR",$data['AVR']));
	$dataSet->addPoint(new Point("MAI",$data['MAI']));
	$dataSet->addPoint(new Point("JUIN",$data['JUIN']));
	$dataSet->addPoint(new Point("JUIL",$data['JUIL']));
	$dataSet->addPoint(new Point("AOUT",$data['AOUT']));
	$dataSet->addPoint(new Point("SEP",$data['SEP']));
	$dataSet->addPoint(new Point("OCT",$data['OCT']));
	$dataSet->addPoint(new Point("NOV",$data['NOV']));
	$dataSet->addPoint(new Point("DEC",$data['DEC']));
	$chart->setDataSet($dataSet);
	$chart->setTitle($data['titre'].$data['DATE']);
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$data['x']."px;top:".$data['y']."px;\">";	 
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	echo "<div id=\"smenug\" class=\"data\" style=\" position:absolute;left:".$data['x1']."px;top:".$data['y1']."px;\">";
			foreach ($data['combo'] as $cle => $value) 
			{
				echo '<a href="'.URL.$value.'">'.$cle.'</a>'; echo '&nbsp;';
			}
		echo "</div>";
	echo "<div class=\"mydiv\" style=\" position:absolute;left:".$data['x2']."px;top:".$data['y2']."px;\">";	 
	echo "<marquee behavior=\"scroll\" direction=\"up\" scrollamount=\"3\" scrolldelay=\"80\" onmouseover=\"this.stop()\"onmouseout=\"this.start()\" height=\"252\" width=\"350\" bgcolor=\"GREEN\">";
	foreach ($data['combo1'] as $cle => $value) 
	{
     echo "<H2 align=\"center\">".$value."</H2>";	
	 echo "<p align=\"center\"><img  id=\"mydiv2\"   align=\"center\"  src=\"".URL.'public/images/photos/'.$data['dossier'].'/'.$cle.'.JPG'."\" width=\"300\" height=\"300\" alt=\"1\" /></p>";	
	}
	echo "</marquee>";
	echo "</div>";
	}
//********************************************************************agenda*****************************************************************//
	

function nbre ($month,$d,$year)
{
	mysqlconnect();
	$dateLa = $year.'/'.$month.'/'.$d;
	$extraire = mysql_query("select * from rdv WHERE DATERDV='$dateLa'");
	$nbrEvents = mysql_numrows($extraire);
	if ($nbrEvents > 0) {$nbrEvents1='['.$nbrEvents.']';return $nbrEvents1;}else{$nbrEvents1='';return $nbrEvents1;}
}

function nbrtomois ($def_mois)
{
	switch($def_mois)  
	{
		case '01':{return "Janvier";}
		case '02':{return "Fevrier";}	
		case '03':{return "Mars";}	
		case '04':{return "Avril";}	
		case '05':{return "Mai";}	
		case '06':{return "Juin";}	
		case '07':{return "Juillet";}	
		case '08':{return "Aout";}	
		case '09':{return "Septembre";}	
		case '10':{return "Octobre";}	
		case '11':{return "Novombre";}	
		case '12':{return "Decembre";}			
	}
}
	
function agenda ($controleur)
{
$this->sautligne(5);
$this->photosurl(1195,200,URL.'public/images/photos/PYRAMIDE.jpg');
$this->f0(URL.$controleur.'/createrdv/','post');
$x=35;$y=220+90;
$this->label($x,230,'Titre RDV');       $this->txt($x+100,220,'TIRDV',0,'*','date');
$this->label($x,260,'Type  RDV');       
$this->combov1($x+100,250,'TYRDV',array(
"1 Reunion EPH"=>"1",
"2 Reunion EPSP"=>"2",
"3 Reunion EHS"=>"3",
"4 Reunion DSP"=>"4"
));
$this->label($x,290,'Txt  RDV');
$this->textarea1($x+109,290,"TXRDV",5,24);
$url = explode('/',$_GET['url']);
$this->hide(215,370,'url2','0',$url[2]);
$this->hide(215,370,'url3','0',$url[3]);
$this->hide(215,370,'url4','0',$url[4]);
$this->submit($x+100,$y+120,'Inser New RDV');
$this->f1();

if (isset($this->userListviewa))   { $an   = $this->userListviewa; }  else {$an   = date("Y");}
if (isset($this->userListviewm))   { $mois = $this->userListviewm; }  else {$mois = date("n");}
// if (isset($this->userListviewd))   { $jour = $this->userListviewd; }  else {$jour = date("d");}  ne pas utiliser  car il fait disparaitre la case verte du jour 
$jour = date("d");
$debut = mktime(0,0,0,$mois,1,$an);    
$premJour = date("w" , $debut );    //1er jour dans la grille 
$nbJours = date("t" , $debut);      //nb de jours dans le mois
$numero_semaine=date("W");         //nbr de semaine 
$jour_semaine=date("w",mktime(0,0,0,$mois,1,$an)); // Jour de la semaine au format num곩que 0 (pour dimanche) ࠶ (pour samedi)
$nbEmptyCells = ($premJour + 6)%7;

//partie agendat 
echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"9\" class=\"tableaux_centrer\" width=\"700\">\n";
    if ($mois == 1)  {$prec = URL.$controleur.'/Agenda/1/12/'.($this->userListviewa-1);} else {$prec = URL.$controleur.'/Agenda/1/'.($this->userListviewm-1).'/'.$an;}
	if ($mois == 12) {$suiv = URL.$controleur.'/Agenda/1/1/'.($this->userListviewa+1);}  else {$suiv = URL.$controleur.'/Agenda/1/'.($this->userListviewm+1).'/'.$an;}
	echo "<tr class=\"calendar\"><td><a href=".$prec."><img src='".URL.'public/images/icons/b_firstpage.png'."' width='16' height='16' border='0' alt=''/></a></td><td colspan=\"5\">".$this->nbrtomois ($mois)." ".$an."</td><td><a href=".$suiv."><img src='".URL.'public/images/icons/b_lastpage.png'."' width='16' height='16' border='0' alt=''/></td></tr>\n";
	echo "<tr class=\"calendar1\"><td>Lundi</td><td>Mardi</td><td>Mercredi</td><td>Jeudi</td><td>Vendredi</td><td>Samedi</td><td>Dimanche</td></tr>\n";
	echo "<tr>" ;
		for ($i=1;$i<=$nbEmptyCells;$i++) 
		{
			echo "<td class=\"cell_vide\">&nbsp;</td>\n";
		}
		for ($i=1;$i<=$nbJours;$i++) 
		{
			$dimanche=($i+$jour_semaine-1)%7;
			if ( $i==$jour && $mois == date("m") && $an == date("Y") ) {
			
			   $day_link = "<a class=\"todaya\" title=\"today\"   href=\"".URL.$controleur.'/Agenda/'.$i.'/'.$mois.'/'.$an."\" >$i  </a> <font size=\"1\"><sup>".$this->nbre ($mois,$i,$an)." </sup></font>  ";
			   echo "<td class=\"today\">".$day_link."</td>\n";
			}
			else if ($dimanche==0) 
			{
			    $day_link = "<a href=\"".URL.$controleur.'/Agenda/'.$i.'/'.$mois.'/'.$an."\" >$i   </a> ".$this->nbre ($mois,$i,$an)." ";
			    echo "<td class=\"dimanche\">".$day_link."</td>\n";    
			}
			else 
			{
			     $day_link = "<a href=\"".URL.$controleur.'/Agenda/'.$i.'/'.$mois.'/'.$an."\" >$i  </a> <font size=\"1\"><sup>".$this->nbre ($mois,$i,$an)." </sup></font>   ";
			     echo "<td class=\"calendar\">".$day_link."</td>\n";
			}
			if ( ($i+$nbEmptyCells)%7 == 0 ) 
			{
	echo "</tr>";
	
	echo "\n<tr>";
		    }
	    }
	$nbEmptyCells = 7 - ($nbEmptyCells + $nbJours)%7;
	if ($nbEmptyCells < 7) 
	{
		for ($i=1;$i<=$nbEmptyCells;$i++) 
		{
			echo "<td class=\"cell_vide\">&nbsp;</td>\n";
		}
	echo "</tr>\n";
	}
echo "</table>\n";
//partie  liste rdv  
	echo "</br>";
    $date1= $this->userListviewa.'-'.$this->userListviewm.'-'.$this->userListviewd ;
    mysqlconnect();
	$query_liste = "SELECT * FROM RDV WHERE DATERDV='".$date1."'" ;
    $requete = mysql_query( $query_liste) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
    $totalmbr1=mysql_num_rows($requete);
	if ($totalmbr1 >= 1)
    {
	echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"9\" class=\"tableaux_centrer\" width=\"700\">\n"; 
	echo( "<tr class=\"calendar1\"><td  colspan=\"5\"><div align=\"center\"><font  color=\"green\">Liste  RDV : ".$totalmbr1."</td></tr>" ); 
	echo( "<tr class=\"calendar1\"     >
	<td class=\"ligne\"><div align=\"center\"><font  color=\"#FFFFFF\">id</td>
	<td class=\"ligne\"><div align=\"center\"><font  color=\"#FFFFFF\">Titre</div></td>
	<td class=\"ligne\"><div align=\"center\"><font  color=\"#FFFFFF\">Type</div></td>
	<td class=\"ligne\"><div align=\"center\"><font  color=\"#FFFFFF\">Texte</div></td>
	<td class=\"ligne\"><div align=\"center\"><font  color=\"#FFFFFF\">Delete</div></td>
	</tr>" ); 
	while( $result = mysql_fetch_array( $requete ) )
	{
	$bgcolor = ($i++ & 1) ? '#fff' : '#E6E6E6';echo '<tr bgcolor='.$bgcolor.'>'; // ligne en couleur alterne
	echo( "<td><div align=\"center\">".$result["id"]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result["TIRDV"]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result["TYRDV"]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result["TXRDV"]."</div></td>\n" );		
	echo "<td> <a   href=\"".URL.$controleur."/deleterdv/".$result['id'].""."/".$this->userListviewd.""."/".$this->userListviewm.""."/".$this->userListviewa."\"><img  src=\"".URL."public/images/icons/delete.PNG \"  width='16' height='16' border='0' alt=''/></a></td>\n" ; 
	echo( "</tr>\n" );
	}
	echo( "<tr class=\"calendar1\"   >
	<td class=\"ligne\"><div align=\"center\"><font  color=\"#FFFFFF\">id</td>
	<td class=\"ligne\"><div align=\"center\"><font  color=\"#FFFFFF\">Titre</div></td>
	<td class=\"ligne\"><div align=\"center\"><font  color=\"#FFFFFF\">Type</div></td>
	<td class=\"ligne\"><div align=\"center\"><font  color=\"#FFFFFF\">Texte</div></td>
	<td class=\"ligne\"><div align=\"center\"><font  color=\"#FFFFFF\">Delete</div></td>
	</tr>" ); 
	echo( "</table><br>\n" );
	mysql_free_result($requete);
	}
	else
	{
	$this->label($x,430,'Pas De RDV ! ');  
	}	
}		
//*************************************************************************************************************************************//
	function CATEGORIE() 
	{
	echo "<div id=\"smenug\">";
	echo '<a href="'.URL.'pan/cat/A">Legumes</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pan/cat/B">Fruits</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pan/cat/C">C</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pan/cat/D">D</a>'; echo '&nbsp;';
	echo "</div>";
	}
	function CATEGORIEG() 
	{
	echo "<div id=\"smenug\">";
	echo '<a href="'.URL.'pan/gestion/A">Legumes</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pan/gestion/B">Fruits</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pan/gestion/C">C</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pan/gestion/D">D</a>'; echo '&nbsp;';
	echo "</div>";
	}
	function CATEGORIEM() 
	{
	echo "<div id=\"smenug\">";
	echo '<a href="'.URL.'pan/gestion/A">AINS</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pan/gestion/B">ANTALGIQUE</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pan/gestion/C">ATB</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'pan/gestion/D">D</a>'; echo '&nbsp;';
	echo "</div>";
	}	
	function prenuptial($data)
	{
	$this->verifsession();
	$this->button($data['btn'],$data['id']);
	echo'<h2>'.$data['titre'].'</h2>';
	$this->sautligne(0);$this->hr();
	$this->f0(URL.$data['action'],'post');
	$this->label($data['x'],$data['y'],'Nom');$this->txtautofocus($data['x']+60,$data['y']-10,'NOM',0,$data['NOM']);
	$this->label($data['x']+350,$data['y'],'Prénom ');$this->txt($data['x']+430,$data['y']-10,'PRENOM',0,$data['PRENOM']);
	$this->label($data['x']+720,$data['y'],'Fils de ');$this->txt($data['x']+785,$data['y']-10,'FILSDE',0,$data['FILSDE']);
	$this->label($data['x'],$data['y']+30,'Sexe');$this->combovsex($data['x']+58,$data['y']+20,'SEXE',$data['SEXE']);
	$this->label($data['x']+150,$data['y']+30,'Née le');$this->txts($data['x']+60+130,$data['y']+20,'DATENS',0,$data['DATENS'],'date');
	$this->label($data['x']+350,$data['y']+30,'Wilaya de');
	$this->WILAYA($data['x']+430,$data['y']+20,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);$this->label($data['x']+720,$data['y']+30,'Commune');$this->COMMUNE($data['x']+785,$data['y']+20,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
	$this->label($data['x'],$data['y']+60,'Mobile ');$this->txts($data['x']+60,$data['y']+50,'TEL',0,$data['TEL'],'port');$this->label($data['x']+350,$data['y']+60,'Fixe');$this->txt($data['x']+430,$data['y']+50,'TELF',0,$data['TELF']);$this->label($data['x']+720,$data['y']+60,'E-Mail');$this->txt($data['x']+785,$data['y']+50,'EMAIL',0,$data['EMAIL']); 
	$this->label($data['x'],$data['y']+90,'Wilaya');$this->WILAYA($data['x']+60,$data['y']+80,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);$this->label($data['x']+350,$data['y']+90,'Commune'); 
	$this->COMMUNE($data['x']+430,$data['y']+80,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);$this->label($data['x']+720,$data['y']+90,'Citée');$this->ADRESSE($data['x']+785,$data['y']+80,'ADRESSE','ADRESSE','mvc','adr',$data['ADRESSE1'],$data['ADRESSE2']);
    $this->label($data['x']+350,$data['y']+120,'Num carte '); $this->txt($data['x']+430,$data['y']+110,'NUMCARTE',0,'0');
	$this->label($data['x']+350,$data['y']+150,'delivrée a ');$this->txt($data['x']+430,$data['y']+140,'DELIVREEA',0,'X');
	$this->label($data['x']+350,$data['y']+180,'le ');        $this->txt($data['x']+430,$data['y']+170,'LE',0,'00-00-0000');
	$this->label($data['x'],$data['y']+120,'ABO');$this->combovsex($data['x']+60,$data['y']+110,'GRABO',array($data['GRABO'],"A","B","AB","O"));
	$this->label($data['x']+165,$data['y']+120,'RH');$this->combovsex($data['x']+190,$data['y']+110,'GRRH',array($data['GRRH'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+150,'C');$this->combovsex($data['x']+60,$data['y']+140,'CRH2',array($data['CRH2'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+150,'c');$this->combovsex($data['x']+190,$data['y']+140,'CRH4',array($data['CRH4'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+180,'E');$this->combovsex($data['x']+60,$data['y']+170,'ERH3',array($data['ERH3'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+180,'e');$this->combovsex($data['x']+190,$data['y']+170,'ERH5',array($data['ERH5'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+210,'K1');$this->combovsex($data['x']+60,$data['y']+200,'KELL1',array($data['KELL1'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+210,'K2');$this->combovsex($data['x']+190,$data['y']+200,'KELL2',array($data['KELL2'],"Positif","negatif"));
	$this->hide(215,670,'REGION',0,$_SESSION['REGION']);$this->hide(215,670,'WILAYA',0,$_SESSION['WILAYA']);$this->hide(215,670,'STRUCTURE',0,$_SESSION['STRUCTURE']);$this->hide(215,670,'login',0,$_SESSION['login']);
	$this->photosurl($data['x']+1070,$data['y']-20,URL.'public/webcam/dnr/'.$data['photos'].'.jpg');	
	$this->label($data['x']+720,$data['y']+150,'Date');$this->date($data['x']+785,$data['y']+140,'DINS',0,$data['DINS']);
	$this->label($data['x']+875,$data['y']+150,'Heures'); $this->date($data['x']+915,$data['y']+140,'HINS',0,$data['HINS']);	
	$this->submit($data['x']+785,$data['y']+180,$data['butun']);$this->f1();$this->sautligne(10);
	}
	function DECES($data)
	{
	$this->verifsession();
	$this->button($data['btn'],$data['id']);
	echo'<h2>'.$data['titre'].'</h2>';   
	$this->sautligne(0);$this->hr();
	$this->f0(URL.$data['action'],'post');
	$this->label($data['x'],$data['y'],'Nom');$this->txtautofocus($data['x']+60,$data['y']-10,'NOM',0,$data['NOM']);
	$this->label($data['x']+350,$data['y'],'Prénom ');$this->txt($data['x']+430,$data['y']-10,'PRENOM',0,$data['PRENOM']);
	$this->label($data['x']+720,$data['y'],'Fils de ');$this->txt($data['x']+785,$data['y']-10,'FILSDE',0,$data['FILSDE']);
	$this->label($data['x'],$data['y']+30,'Sexe');$this->combovsex($data['x']+58,$data['y']+20,'SEXE',$data['SEXE']);
	$this->label($data['x']+150,$data['y']+30,'Née le');$this->txts($data['x']+60+130,$data['y']+20,'DATENS',0,$data['DATENS'],'date');
	$this->label($data['x']+350,$data['y']+30,'Wilaya de');
	$this->WILAYA($data['x']+430,$data['y']+20,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);$this->label($data['x']+720,$data['y']+30,'Commune');$this->COMMUNE($data['x']+785,$data['y']+20,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
	$this->label($data['x'],$data['y']+60,'Mobile ');$this->txts($data['x']+60,$data['y']+50,'TEL',0,$data['TEL'],'port');$this->label($data['x']+350,$data['y']+60,'Fixe');$this->txt($data['x']+430,$data['y']+50,'TELF',0,$data['TELF']);$this->label($data['x']+720,$data['y']+60,'E-Mail');$this->txt($data['x']+785,$data['y']+50,'EMAIL',0,$data['EMAIL']); 
	$this->label($data['x'],$data['y']+90,'Wilaya');$this->WILAYA($data['x']+60,$data['y']+80,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);$this->label($data['x']+350,$data['y']+90,'Commune'); 
	$this->COMMUNE($data['x']+430,$data['y']+80,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);$this->label($data['x']+720,$data['y']+90,'Citée');
	
	$this->txt($data['x']+785,$data['y']+80,'ADRESSE',0,$data['ADRESSE2']); 
	//$this->ADRESSE($data['x']+785,$data['y']+80,'ADRESSE','ADRESSE','mvc','adr',$data['ADRESSE1'],$data['ADRESSE2']);
	
	$this->label($data['x'],$data['y']+120,'Poids(kg)'); $this->txt($data['x']+60,$data['y']+110,'POIDS',0,$data['POIDS']);
	$this->label($data['x']+350,$data['y']+120,'Taille (Cm)'); $this->txt($data['x']+430,$data['y']+110,'TAILLE',0,$data['TAILLE']);
	
	$this->label($data['x'],$data['y']+150,'HB()'); $this->txt($data['x']+60,$data['y']+140,'HB',0,$data['HB']);
	$this->label($data['x']+350,$data['y']+150,'HT ()'); $this->txt($data['x']+430,$data['y']+140,'HT',0,$data['HT']);
	
	
	
	
	//$this->combovsex($data['x']+60,$data['y']+110,'GRABO',array($data['GRABO'],"A","B","AB","O"));
	// $this->label($data['x']+165,$data['y']+120,'RH');$this->combovsex($data['x']+190,$data['y']+110,'GRRH',array($data['GRRH'],"Positif","negatif"));
	// $this->label($data['x'],$data['y']+150,'C');$this->combovsex($data['x']+60,$data['y']+140,'CRH2',array($data['CRH2'],"Positif","negatif"));
	// $this->label($data['x']+165,$data['y']+150,'c');$this->combovsex($data['x']+190,$data['y']+140,'CRH4',array($data['CRH4'],"Positif","negatif"));
	// $this->label($data['x'],$data['y']+180,'E');$this->combovsex($data['x']+60,$data['y']+170,'ERH3',array($data['ERH3'],"Positif","negatif"));
	// $this->label($data['x']+165,$data['y']+180,'e');$this->combovsex($data['x']+190,$data['y']+170,'ERH5',array($data['ERH5'],"Positif","negatif"));
	// $this->label($data['x'],$data['y']+210,'K1');$this->combovsex($data['x']+60,$data['y']+200,'KELL1',array($data['KELL1'],"Positif","negatif"));
	// $this->label($data['x']+165,$data['y']+210,'K2');$this->combovsex($data['x']+190,$data['y']+200,'KELL2',array($data['KELL2'],"Positif","negatif"));
	$this->hide(215,670,'REGION',0,$_SESSION['REGION']);$this->hide(215,670,'WILAYA',0,$_SESSION['WILAYA']);$this->hide(215,670,'STRUCTURE',0,$_SESSION['STRUCTURE']);$this->hide(215,670,'login',0,$_SESSION['login']);
	$this->photosurl($data['x']+1070,$data['y']-20,URL.'public/images/photos/'.$data['photos']);	
	$this->label($data['x']+720,$data['y']+150,'Date');$this->date($data['x']+785,$data['y']+140,'DINS',0,$data['DINS']);
	$this->label($data['x']+875,$data['y']+150,'Heures'); $this->date($data['x']+915,$data['y']+140,'HINS',0,$data['HINS']);	
	$this->submit($data['x']+785,$data['y']+180,$data['butun']);$this->f1();$this->sautligne(10);
	$this->sautligne(3);
	}
	
	
	function MNPE($data)
	{
	$this->verifsession();
	$this->button($data['btn'],$data['id']);
	echo'<h2>'.$data['titre'].'</h2>';   
	$this->sautligne(0);$this->hr();
	$this->f0(URL.$data['action'],'post');
	$this->label($data['x'],$data['y'],'Nom');$this->txtautofocus($data['x']+60,$data['y']-10,'NOM',0,$data['NOM']);
	$this->label($data['x']+350,$data['y'],'Prénom ');$this->txt($data['x']+430,$data['y']-10,'PRENOM',0,$data['PRENOM']);
	$this->label($data['x']+720,$data['y'],'Fils de ');$this->txt($data['x']+785,$data['y']-10,'FILSDE',0,$data['FILSDE']);
	$this->label($data['x'],$data['y']+30,'Sexe');$this->combovsex($data['x']+58,$data['y']+20,'SEXE',$data['SEXE']);
	$this->label($data['x']+150,$data['y']+30,'Née le');$this->txts($data['x']+60+130,$data['y']+20,'DATENS',0,$data['DATENS'],'date');
	$this->label($data['x']+350,$data['y']+30,'Wilaya de');
	$this->WILAYA($data['x']+430,$data['y']+20,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);$this->label($data['x']+720,$data['y']+30,'Commune');$this->COMMUNE($data['x']+785,$data['y']+20,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
	$this->label($data['x'],$data['y']+60,'Mobile ');$this->txts($data['x']+60,$data['y']+50,'TEL',0,$data['TEL'],'port');$this->label($data['x']+350,$data['y']+60,'Fixe');$this->txt($data['x']+430,$data['y']+50,'TELF',0,$data['TELF']);$this->label($data['x']+720,$data['y']+60,'E-Mail');$this->txt($data['x']+785,$data['y']+50,'EMAIL',0,$data['EMAIL']); 
	$this->label($data['x'],$data['y']+90,'Wilaya');$this->WILAYA($data['x']+60,$data['y']+80,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);$this->label($data['x']+350,$data['y']+90,'Commune'); 
	$this->COMMUNE($data['x']+430,$data['y']+80,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);$this->label($data['x']+720,$data['y']+90,'Citée');
	$this->txt($data['x']+785,$data['y']+80,'ADRESSE',0,$data['ADRESSE2']); 
	//$this->ADRESSE($data['x']+785,$data['y']+80,'ADRESSE','ADRESSE','mvc','adr',$data['ADRESSE1'],$data['ADRESSE2']);
	$this->label($data['x'],$data['y']+120,'Poids(kg)'); $this->txt($data['x']+60,$data['y']+110,'POIDS',0,$data['POIDS']);
	$this->label($data['x']+350,$data['y']+120,'Taille (Cm)'); $this->txt($data['x']+430,$data['y']+110,'TAILLE',0,$data['TAILLE']);
	$this->label($data['x'],$data['y']+150,'HB()'); $this->txt($data['x']+60,$data['y']+140,'HB',0,$data['HB']);
	$this->label($data['x']+350,$data['y']+150,'HT ()'); $this->txt($data['x']+430,$data['y']+140,'HT',0,$data['HT']);
	//$this->combovsex($data['x']+60,$data['y']+110,'GRABO',array($data['GRABO'],"A","B","AB","O"));
	// $this->label($data['x']+165,$data['y']+120,'RH');$this->combovsex($data['x']+190,$data['y']+110,'GRRH',array($data['GRRH'],"Positif","negatif"));
	// $this->label($data['x'],$data['y']+150,'C');$this->combovsex($data['x']+60,$data['y']+140,'CRH2',array($data['CRH2'],"Positif","negatif"));
	// $this->label($data['x']+165,$data['y']+150,'c');$this->combovsex($data['x']+190,$data['y']+140,'CRH4',array($data['CRH4'],"Positif","negatif"));
	// $this->label($data['x'],$data['y']+180,'E');$this->combovsex($data['x']+60,$data['y']+170,'ERH3',array($data['ERH3'],"Positif","negatif"));
	// $this->label($data['x']+165,$data['y']+180,'e');$this->combovsex($data['x']+190,$data['y']+170,'ERH5',array($data['ERH5'],"Positif","negatif"));
	// $this->label($data['x'],$data['y']+210,'K1');$this->combovsex($data['x']+60,$data['y']+200,'KELL1',array($data['KELL1'],"Positif","negatif"));
	// $this->label($data['x']+165,$data['y']+210,'K2');$this->combovsex($data['x']+190,$data['y']+200,'KELL2',array($data['KELL2'],"Positif","negatif"));
	$this->hide(215,670,'REGION',0,$_SESSION['REGION']);$this->hide(215,670,'WILAYA',0,$_SESSION['WILAYA']);$this->hide(215,670,'STRUCTURE',0,$_SESSION['STRUCTURE']);$this->hide(215,670,'login',0,$_SESSION['login']);
	$this->photosurl($data['x']+1070,$data['y']-20,URL.'public/images/photos/'.$data['photos']);	
	$this->label($data['x']+720,$data['y']+150,'Date');$this->date($data['x']+785,$data['y']+140,'DINS',0,$data['DINS']);
	$this->label($data['x']+875,$data['y']+150,'Heures'); $this->date($data['x']+915,$data['y']+140,'HINS',0,$data['HINS']);	
	$this->submit($data['x']+785,$data['y']+180,$data['butun']);$this->f1();$this->sautligne(10);
	$this->sautligne(3);
	}
	function MNPEPA($data)
	{
	$this->verifsession();
	$this->button($data['btn'],$data['id']);
	echo'<h2>'.$data['titre'].'</h2>';
	$this->sautligne(0);$this->hr();
	$this->f0(URL.$data['action'],'post');
	$this->label($data['x'],$data['y'],'AGE');      $this->txtautofocus($data['x']+60,$data['y']-10,'AGE',0,$data['AGE']);
	$this->label($data['x'],$data['y']+30,'SEXE');  $this->combovsex($data['x']+60,$data['y']+20,'SEXE',$data['SEXE']); 
	$this->label($data['x'],$data['y']+60,'<STRONG>-3ET</STRONG>');  $this->txt($data['x']+60,$data['y']+50,'M3ET',0,$data['M3ET']);
	$this->label($data['x'],$data['y']+90,'<STRONG>-2ET</STRONG>');  $this->txt($data['x']+60,$data['y']+80,'M2ET',0,$data['M2ET']);
	$this->label($data['x'],$data['y']+120,'<STRONG>-1ET</STRONG>'); $this->txt($data['x']+60,$data['y']+110,'M1ET',0,$data['M1ET']);
	$this->label($data['x'],$data['y']+150,'<STRONG>0 ME</STRONG>');  $this->txt($data['x']+60,$data['y']+140,'MED',0,$data['MED']);
	$this->label($data['x'],$data['y']+180,'<STRONG>+1ET</STRONG>'); $this->txt($data['x']+60,$data['y']+170,'P1ET',0,$data['P1ET']);
	$this->label($data['x'],$data['y']+210,'<STRONG>+2ET</STRONG>'); $this->txt($data['x']+60,$data['y']+200,'P2ET',0,$data['P2ET']);
	$this->label($data['x'],$data['y']+240,'<STRONG>+3ET</STRONG>'); $this->txt($data['x']+60,$data['y']+230,'P3ET',0,$data['P3ET']);
	$this->photosurl($data['x']+1070,$data['y']-20,URL.'public/images/photos/'.$data['photos']);
	$this->submit($data['x']+60,$data['y']+270,$data['butun']);$this->f1();$this->sautligne(10);
	$this->sautligne(3);
	}
	function NOMPRENOMHEMO1($name) 
		{
		mysqlconnect();
		// echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
		echo "<select size=1 class=\"CHAP\" name=\"".$name."\">"."\n";
		echo"<option value=\"1\" selected=\"selected\">Selectionner Malade </option>"."\n";
		mysql_query("SET NAMES 'UTF8' ");
		$result = mysql_query("SELECT * FROM hemo where SORTI=''  order by NOM" );
		while($data =  mysql_fetch_array($result))
		{
		echo '<option value="'.$data[0].'">'.$data[1].'_'.''.$data[2].'</option>';
		}
		echo '</select>'."\n"; 
		// echo "</div>";
		}
	function NOMPRENOMHEMO($x,$y,$name) 
		{
		mysqlconnect();
		echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
		echo "<select size=1 class=\"CHAP\" name=\"".$name."\">"."\n";
		echo"<option value=\"1\" selected=\"selected\">Selectionner Malade </option>"."\n";
		mysql_query("SET NAMES 'UTF8' ");
		$result = mysql_query("SELECT * FROM hemo where SORTI=''  order by NOM" );
		while($data =  mysql_fetch_array($result))
		{
		echo '<option value="'.$data[0].'">'.$data[1].'_'.''.$data[2].'</option>';
		}
		echo '</select>'."\n"; 
		echo "</div>";
		}
	
	function datahemod($data)
	{
	//hemodialyse
	$this->verifsession();
	$this->button($data['btn'],$data['id']);
	echo'<h2>'.$data['titre'].'</h2>';
	$this->sautligne(0);$this->hr();
	$this->f0(URL.$data['action'],'post');
	$this->label($data['x'],$data['y'],'Nom');$this->txtautofocus($data['x']+60,$data['y']-10,'NOM',0,$data['NOM']);
	$this->label($data['x']+350,$data['y'],'Prénom ');$this->txt($data['x']+430,$data['y']-10,'PRENOM',0,$data['PRENOM']);
	$this->label($data['x']+720,$data['y'],'Fils de ');$this->date($data['x']+785+15,$data['y']-10,'FILSDE',0,$data['FILSDE']);
    $this->label($data['x']+880+15,$data['y'],'Et de ');$this->date($data['x']+915+15,$data['y']-10,'ETDE',0,$data['ETDE']);
	$this->label($data['x'],$data['y']+30,'Sexe');$this->combovsex($data['x']+58,$data['y']+20,'SEXE',$data['SEXE']);
	$this->label($data['x']+150,$data['y']+30,'Née le');$this->txts($data['x']+60+130,$data['y']+20,'DATENS',0,$data['DATENS'],'date');
	$this->label($data['x']+350,$data['y']+30,'Wilaya de');
	$this->WILAYA($data['x']+430,$data['y']+20,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);$this->label($data['x']+720,$data['y']+30,'Commune');$this->COMMUNE($data['x']+800,$data['y']+20,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
	$this->label($data['x'],$data['y']+60,'Mobile ');$this->txts($data['x']+60,$data['y']+50,'TEL',0,$data['TEL'],'port');$this->label($data['x']+350,$data['y']+60,'Fixe');$this->txt($data['x']+430,$data['y']+50,'TELF',0,$data['TELF']);$this->label($data['x']+720,$data['y']+60,'E-Mail');$this->txt($data['x']+800,$data['y']+50,'EMAIL',0,$data['EMAIL']); 
	$this->label($data['x'],$data['y']+90,'Wilaya');$this->WILAYA($data['x']+60,$data['y']+80,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);$this->label($data['x']+350,$data['y']+90,'Commune'); 
	$this->COMMUNE($data['x']+430,$data['y']+80,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);$this->label($data['x']+720,$data['y']+90,'Citée');
	
	$this->ADRESSE($data['x']+800,$data['y']+80,'ADRESSE','ADRESSE','mvc','adr',$data['ADRESSE1'],$data['ADRESSE2']);
	
	
	
	$this->label($data['x'],$data['y']+140,'ABO');$this->combovsex($data['x']+60,$data['y']+130,'GRABO',array($data['GRABO'],"A","B","AB","O"));
	$this->label($data['x']+165,$data['y']+140,'RH');$this->combovsex($data['x']+190,$data['y']+130,'GRRH',array($data['GRRH'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+170,'C');$this->combovsex($data['x']+60,$data['y']+160,'CRH2',array($data['CRH2'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+170,'c');$this->combovsex($data['x']+190,$data['y']+160,'CRH4',array($data['CRH4'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+200,'E');$this->combovsex($data['x']+60,$data['y']+190,'ERH3',array($data['ERH3'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+200,'e');$this->combovsex($data['x']+190,$data['y']+190,'ERH5',array($data['ERH5'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+230,'K1');$this->combovsex($data['x']+60,$data['y']+220,'KELL1',array($data['KELL1'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+230,'K2');$this->combovsex($data['x']+190,$data['y']+220,'KELL2',array($data['KELL2'],"Positif","negatif"));
	$this->label($data['x']+350,$data['y']+140,'HVB');$this->combov($data['x']+430,$data['y']+130,'HVB',array($data['HVB'],"negatif","douteux","Positif"));
	$this->label($data['x']+350,$data['y']+170,'HVC');$this->combov($data['x']+430,$data['y']+160,'HVC',array($data['HVC'],"negatif","douteux","Positif"));
	$this->label($data['x']+350,$data['y']+200,'HIV');$this->combov($data['x']+430,$data['y']+190,'HIV',array($data['HIV'],"negatif","douteux","Positif"));
	$this->label($data['x']+350,$data['y']+230,'TPHA');$this->combov($data['x']+430,$data['y']+220,'TPHA',array($data['TPHA'],"negatif","douteux","Positif"));
	
	
	
	$this->label($data['x']+720,$data['y']+140,'Cause initial');    $this->combov($data['x']+800,$data['y']+130,'CAUSE',array($data['CAUSE'],"HTA","DIABET","PKR"));
	$this->label($data['x']+720,$data['y']+170,'Comorbidité');      $this->combov($data['x']+800,$data['y']+160,'COMOR',array($data['COMOR'],"HTA","DIABET","PKR"));
	$this->hide(215,690,'REGION',0,$_SESSION['REGION']);$this->hide(215,670,'WILAYA',0,$_SESSION['WILAYA']);$this->hide(215,670,'STRUCTURE',0,$_SESSION['STRUCTURE']);$this->hide(215,670,'login',0,$_SESSION['login']);
	$this->photosurl($data['x']+1070,$data['y']-20,URL.'public/webcam/hemo/'.$data['photos']);	
	$this->label($data['x']+720,$data['y']+150+50,'1ere dialyse');$this->date($data['x']+785+15,$data['y']+140+50,'DPD',0,$data['DPD']);
	$this->label($data['x']+875+20,$data['y']+150+50,'poids'); $this->date($data['x']+915+15,$data['y']+140+50,'POIDS',0,$data['POIDS']);	
	$this->label($data['x']+720,$data['y']+150+80,'Date insc');$this->date($data['x']+785+15,$data['y']+140+80,'DINS',0,$data['DINS']);
	$this->label($data['x']+875+15,$data['y']+150+80,'Heures'); $this->date($data['x']+915+15,$data['y']+140+80,'HINS',0,$data['HINS']);	
	
	$this->label($data['x'],$data['y']+210+70,'N_P/Ass');               $this->txt($data['x']+60,$data['y']+210+60,'ASSURE',0,$data['ASSURE']);
	$this->label($data['x']+350,$data['y']+210+70,'D_N/Assuré');        $this->txt($data['x']+430,$data['y']+210+60,'DNASSURE',0,$data['DNASSURE']);
	$this->label($data['x']+720,$data['y']+210+70,'Qualite Assuré');    $this->combov($data['x']+800,$data['y']+210+60,'QUALITE',array($data['QUALITE'],"Assure","Conjoint","Enfant","Ascendant","Autre"));
	$this->label($data['x'],$data['y']+310,'Agence');                   $this->combovsex($data['x']+60,$data['y']+300,'CAISSE',array($data['CAISSE'],"CNAS","CASNOS"));
	$this->label($data['x']+160,$data['y']+310,'NCP');                  $this->date($data['x']+190,$data['y']+300,'NCP',0,$data['NCP']);                      
	
	
	$this->label($data['x']+350,$data['y']+310,'adresse');              $this->txt($data['x']+430,$data['y']+300,'ADRESSENSS',0,$data['ADRESSENSS']);
	$this->label($data['x']+720,$data['y']+310,'NSS');                  $this->txt($data['x']+800,$data['y']+300,'NSS',0,$data['NSS']);
	$this->label($data['x'],$data['y']+360,'Groupe');                   $this->combovsex($data['x']+60,$data['y']+350,'GROUPE',array($data['GROUPE'],"A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"));
	$this->label($data['x']+155,$data['y']+360,'Jours');                $this->combovsex($data['x']+190,$data['y']+350,'JOURS',array($data['JOURS'],"SLM","DMJ"));
	$this->label($data['x']+350,$data['y']+360,'Branchement');          $this->combovsex($data['x']+430,$data['y']+350,'BRANCHEMENT',array($data['BRANCHEMENT'],"1","2","3"));
	$this->label($data['x']+530,$data['y']+360,'Gen');                  $this->combovsex($data['x']+560,$data['y']+350,'APP',array($data['APP'],"1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20"));
	$this->label($data['x']+720,$data['y']+360,'Forfait');              $this->forfait($data['x']+800,$data['y']+350,'FORFAIT','mvc','forfait',$data['FORFAIT0'],$data['FORFAIT1']);
	
	$this->label($data['x']+785+300,$data['y']+360,'Transport');  $this->combovsex($data['x']+840+400,$data['y']+350,'TRANS',array($data['TRANS'],"VSL","ACB"));
	
	$this->submit($data['x']+785+300,$data['y']+180+20+90,$data['butun']);
	$this->f1();
	$this->sautligne(16);
	
	}
	function datass($data)
	{
	//hemodialyse
	$this->verifsession();
	$this->button($data['btn'],$data['id']);
	echo'<h2>'.$data['titre'].'</h2>';
	$this->sautligne(0);$this->hr();
	$this->f0(URL.$data['action'],'post');
	$this->label($data['x'],$data['y'],'Nom');$this->txtautofocus($data['x']+60,$data['y']-10,'NOM',0,$data['NOM']);
	$this->label($data['x']+350,$data['y'],'Prénom ');$this->txt($data['x']+430,$data['y']-10,'PRENOM',0,$data['PRENOM']);
	$this->label($data['x']+720,$data['y'],'Fils de ');$this->date($data['x']+785+15,$data['y']-10,'FILSDE',0,$data['FILSDE']);
    $this->label($data['x']+880+15,$data['y'],'Et de ');$this->date($data['x']+915+15,$data['y']-10,'ETDE',0,$data['ETDE']);
	$this->label($data['x'],$data['y']+30,'Sexe');$this->combovsex($data['x']+58,$data['y']+20,'SEXE',$data['SEXE']);
	$this->label($data['x']+150,$data['y']+30,'Née le');$this->txts($data['x']+60+130,$data['y']+20,'DATENS',0,$data['DATENS'],'date');
	$this->label($data['x']+350,$data['y']+30,'Wilaya de');
	$this->WILAYA($data['x']+430,$data['y']+20,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);$this->label($data['x']+720,$data['y']+30,'Commune');$this->COMMUNE($data['x']+800,$data['y']+20,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
	$this->label($data['x'],$data['y']+60,'Mobile ');$this->txts($data['x']+60,$data['y']+50,'TEL',0,$data['TEL'],'port');$this->label($data['x']+350,$data['y']+60,'Fixe');$this->txt($data['x']+430,$data['y']+50,'TELF',0,$data['TELF']);$this->label($data['x']+720,$data['y']+60,'E-Mail');$this->txt($data['x']+800,$data['y']+50,'EMAIL',0,$data['EMAIL']); 
	$this->label($data['x'],$data['y']+90,'Wilaya');$this->WILAYA($data['x']+60,$data['y']+80,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);$this->label($data['x']+350,$data['y']+90,'Commune'); 
	$this->COMMUNE($data['x']+430,$data['y']+80,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);$this->label($data['x']+720,$data['y']+90,'Citée');$this->ADRESSE($data['x']+800,$data['y']+80,'ADRESSE','ADRESSE','mvc','adr',$data['ADRESSE1'],$data['ADRESSE2']);
	$this->label($data['x'],$data['y']+120,'ABO');$this->combovsex($data['x']+60,$data['y']+110,'GRABO',array($data['GRABO'],"A","B","AB","O"));
	$this->label($data['x']+165,$data['y']+120,'RH');$this->combovsex($data['x']+190,$data['y']+110,'GRRH',array($data['GRRH'],"Positif","negatif"));
	$this->label($data['x']+350,$data['y']+120,'NEC');
	$this->txt($data['x']+430,$data['y']+110,'NEC',0,$data['NEC']);
	$this->label($data['x']+720,$data['y']+120,'Date');
	$this->txt($data['x']+800,$data['y']+110,'DATEINS',0,$data['DATEINS']);
	
	$this->label($data['x'],$data['y']+150,'Wilaya');     $this->WILAYA($data['x']+60,$data['y']+140,'WILAYASS','countryss','mvc','wil',$data['WILAYASS1'],$data['WILAYASS2']);
	$this->label($data['x']+350,$data['y']+150,'Commune');$this->COMMUNE($data['x']+430,$data['y']+140,'COMMUNESS','COMMUNESS',$data['COMMUNESS1'],$data['COMMUNESS2']);
	$this->label($data['x']+720,$data['y']+150,'Ecole');  $this->COMMUNE($data['x']+800,$data['y']+140,'ETASS','ETASS',$data['ETASS1'],$data['ETASS2']);
   
	$this->photosurl($data['x']+1070,$data['y']-20,URL.'public/webcam/ss/'.$data['photos']);	
	$this->submit($data['x']+785+15,$data['y']+180+20+30,$data['butun']);
	$this->f1();
	$this->sautligne(10);
	$this->sautligne(3);
	}
	function Message($data)
	{
	$this->verifsession();
	$this->button($data['btn'],$data['id']);
	echo'<h2>'.$data['titre'].'</h2>';
	$this->sautligne(0);$this->hr();
	$this->f0(URL.$data['action'],'post');
	$this->label($data['x'],$data['y'],'Numero');           $this->txtautofocus($data['x']+100,$data['y'],'Numero',0,$data['Numero']);
	$this->label($data['x'],$data['y']+30,'Etat');          $this->txt($data['x']+100,$data['y']+30,'Etat',0,$data['Etat']);
	$this->label($data['x'],$data['y']+60,'Source');        $this->combov($data['x']+100,$data['y']+60,'Source',$data['Source']);
	$this->label($data['x'],$data['y']+90,'Objet');         $this->txt($data['x']+100,$data['y']+90,'Objet',0,$data['Objet']);
	$this->label($data['x'],$data['y']+120,'Destination');  $this->combov($data['x']+100,$data['y']+120,'Destination',$data['Destination']);
	$this->label($data['x'],$data['y']+150,'Date');         $this->txt($data['x']+100,$data['y']+150,'Date',0,$data['Date']);
	$this->label($data['x']+500,$data['y'],'catégorie');
	$this->photosurl($data['x']+1070,$data['y']-20,URL.'public/webcam/ss/'.$data['photos']);	
	$this->submit($data['x'],$data['y']+180+20+30,$data['butun']);
	$this->reset($data['x']+250,$data['y']+180+20+30,$data['butun1']);
	$this->f1();
	$this->sautligne(13);
	}
	
	
	//***********************fonction globale   dnr/edit_dnr/rec/edit_rec  
	function data($data)
	{
	$this->verifsession();
	$this->button($data['btn'],$data['id']);
	echo'<h2>'.$data['titre'].'</h2>';
	$this->sautligne(0);$this->hr();
	$this->f0(URL.$data['action'],'post');
	$this->label($data['x'],$data['y'],'Nom');$this->txtautofocus($data['x']+60,$data['y']-10,'NOM',0,$data['NOM']);
	$this->label($data['x']+350,$data['y'],'Prénom ');$this->txt($data['x']+430,$data['y']-10,'PRENOM',0,$data['PRENOM']);
	$this->label($data['x']+720,$data['y'],'Fils de ');$this->txt($data['x']+785,$data['y']-10,'FILSDE',0,$data['FILSDE']);
	$this->label($data['x'],$data['y']+30,'Sexe');$this->combovsex($data['x']+58,$data['y']+20,'SEXE',$data['SEXE']);
	$this->label($data['x']+150,$data['y']+30,'Née le');$this->txts($data['x']+60+130,$data['y']+20,'DATENS',0,$data['DATENS'],'date');
	$this->label($data['x']+350,$data['y']+30,'Wilaya de');
	$this->WILAYA($data['x']+430,$data['y']+20,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);$this->label($data['x']+720,$data['y']+30,'Commune');$this->COMMUNE($data['x']+785,$data['y']+20,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
	$this->label($data['x'],$data['y']+60,'Mobile ');$this->txts($data['x']+60,$data['y']+50,'TEL',0,$data['TEL'],'port');$this->label($data['x']+350,$data['y']+60,'Fixe');$this->txt($data['x']+430,$data['y']+50,'TELF',0,$data['TELF']);$this->label($data['x']+720,$data['y']+60,'E-Mail');$this->txt($data['x']+785,$data['y']+50,'EMAIL',0,$data['EMAIL']); 
	$this->label($data['x'],$data['y']+90,'Wilaya');$this->WILAYA($data['x']+60,$data['y']+80,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);$this->label($data['x']+350,$data['y']+90,'Commune'); 
	$this->COMMUNE($data['x']+430,$data['y']+80,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);$this->label($data['x']+720,$data['y']+90,'Citée');$this->ADRESSE($data['x']+785,$data['y']+80,'ADRESSE','ADRESSE','mvc','adr',$data['ADRESSE1'],$data['ADRESSE2']);
	$this->label($data['x'],$data['y']+120,'ABO');$this->combovsex($data['x']+60,$data['y']+110,'GRABO',array($data['GRABO'],"A","B","AB","O"));
	$this->label($data['x']+165,$data['y']+120,'RH');$this->combovsex($data['x']+190,$data['y']+110,'GRRH',array($data['GRRH'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+150,'C');$this->combovsex($data['x']+60,$data['y']+140,'CRH2',array($data['CRH2'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+150,'c');$this->combovsex($data['x']+190,$data['y']+140,'CRH4',array($data['CRH4'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+180,'E');$this->combovsex($data['x']+60,$data['y']+170,'ERH3',array($data['ERH3'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+180,'e');$this->combovsex($data['x']+190,$data['y']+170,'ERH5',array($data['ERH5'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+210,'K1');$this->combovsex($data['x']+60,$data['y']+200,'KELL1',array($data['KELL1'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+210,'K2');$this->combovsex($data['x']+190,$data['y']+200,'KELL2',array($data['KELL2'],"Positif","negatif"));
	$this->hide(215,670,'REGION',0,$_SESSION['REGION']);$this->hide(215,670,'WILAYA',0,$_SESSION['WILAYA']);$this->hide(215,670,'STRUCTURE',0,$_SESSION['STRUCTURE']);$this->hide(215,670,'login',0,$_SESSION['login']);
	$this->photosurl($data['x']+1070,$data['y']-20,URL.'public/images/photos/'.$data['photos']);	
	$this->label($data['x']+720,$data['y']+150,'Date');$this->date($data['x']+785,$data['y']+140,'DINS',0,$data['DINS']);
	$this->label($data['x']+875,$data['y']+150,'Heures'); $this->date($data['x']+915,$data['y']+140,'HINS',0,$data['HINS']);	
	$this->submit($data['x']+785,$data['y']+180,$data['butun']);$this->f1();$this->sautligne(10);
	$this->sautligne(3);
	}
	//******************************************************************************************************************************************//
	function PSL($x,$y,$tb_name,$groupage,$rhesus,$p,$c) //date premtion =active
	{
	mysqlconnect();
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	echo "<select size=1 class=\"ARS\" name=\"NDP\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">IDP ".$tb_name." : ".$groupage." : ".$rhesus."</option>"."\n";
	if($tb_name=='CGR')
	{
	    $date=date('y-m-d');
		if($p=='y')
		{
			$result = mysql_query("SELECT * FROM $tb_name where DIST ='' and DATEPER >= '$date' and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
		}
		if($p=='n')
		{
		$result = mysql_query("SELECT * FROM $tb_name where DIST =''  and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
		}
		
		// if($c=='y')
		// {
		// $result = mysql_query("SELECT * FROM $tb_name where DIST ='' order by NDP " );
		// }
		
	}
	if($tb_name=='PFC')
	{
	    $date=date('y-m-d');
	    if($p=='y')
		{
		$result = mysql_query("SELECT * FROM $tb_name where DIST ='' and DATEPER >= '$date' and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
		}
		 if($p=='n')
		{
		$result = mysql_query("SELECT * FROM $tb_name where DIST =''  and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
		}
	}
	if($tb_name=='CPS')
	{
		$date=date('y-m-d');
	    if($p=='y')
		{
		$result = mysql_query("SELECT * FROM $tb_name where DIST ='' and DATEPER >= '$date' and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
		}
		if($p=='n')
		{
		$result = mysql_query("SELECT * FROM $tb_name where DIST =''  and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
		}	
	}
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.trim($data['NDP']).'">'.trim($data['NDP']).' : '.trim($data['GROUPAGE']).'_'.trim($data['RHESUS']).'</option>';
	}
	echo '</select>'."\n"; 
	echo "</div>";
	}
	function combom($x,$y,$name,$db_name,$tb_name,$value,$selected) //combo avec base de donnes POUR LISTE MEDECIN 
	{
	mysqlconnect();
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo '<select size=1 name="'.$name.'">'."\n";
    echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name where rnvgradear=5 or rnvgradear=6 or rnvgradear=1 order by Nomlatin" );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.$data['Nomlatin']."_".$data['Prenom_Latin'];
    echo '</option>'."\n";
    }
    echo '</select>'."\n"; 
	echo "</div>";
	}
	function datacgrpfccps($data)
	{
	$this->verifsession();
	$this->button($data['btn'],$data['id']);
	echo'<h2>'.$data['titre'].': '.$data['NOM'].'_'.$data['PRENOM'].'</h2>';
	$this->fieldset($data['css'],$data['titre']);
	$this->sautligne(1);
    // $this->hr();
	$this->sautligne(2);
	$this->f0(URL.$data['action'],'post');
	$this->label($data['x'],$data['y'],'Nom');$this->txtautofocus($data['x']+60,$data['y']-10,'NOM',0,$data['NOM']);
	$this->label($data['x']+350,$data['y'],'Prénom ');$this->txt($data['x']+430,$data['y']-10,'PRENOM',0,$data['PRENOM']);
	$this->label($data['x']+720,$data['y'],'Fils de ');$this->txt($data['x']+785,$data['y']-10,'FILSDE',0,$data['FILSDE']);
	$this->label($data['x'],$data['y']+30,'Sexe');$this->combovsex($data['x']+58,$data['y']+20,'SEXE',$data['SEXE']);
	$this->label($data['x']+150,$data['y']+30,'Née le');$this->txts($data['x']+60+130,$data['y']+20,'DATENS',0,$data['DATENS'],'date');
	$this->label($data['x']+350,$data['y']+30,'Wilaya de');
	$this->WILAYA($data['x']+430,$data['y']+20,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);$this->label($data['x']+720,$data['y']+30,'Commune');$this->COMMUNE($data['x']+785,$data['y']+20,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
	$this->label($data['x'],$data['y']+60,'Mobile ');$this->txts($data['x']+60,$data['y']+50,'TEL',0,$data['TEL'],'port');$this->label($data['x']+350,$data['y']+60,'Fixe');$this->txt($data['x']+430,$data['y']+50,'TELF',0,$data['TELF']);$this->label($data['x']+720,$data['y']+60,'E-Mail');$this->txt($data['x']+785,$data['y']+50,'EMAIL',0,$data['EMAIL']); 
	$this->label($data['x'],$data['y']+90,'Wilaya');$this->WILAYA($data['x']+60,$data['y']+80,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);$this->label($data['x']+350,$data['y']+90,'Commune'); 
	$this->COMMUNE($data['x']+430,$data['y']+80,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);$this->label($data['x']+720,$data['y']+90,'Citée');$this->ADRESSE($data['x']+785,$data['y']+80,'ADRESSE','ADRESSE','mvc','adr',$data['ADRESSE1'],$data['ADRESSE2']);
		
	$this->label($data['x'],$data['y']+120,'ABO');$this->combovsex($data['x']+60,$data['y']+110,'GRABO',array($data['GRABO'],"A","B","AB","O"));
	$this->label($data['x']+165,$data['y']+120,'RH');$this->combovsex($data['x']+190,$data['y']+110,'GRRH',array($data['GRRH'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+150,'C');$this->combovsex($data['x']+60,$data['y']+140,'CRH2',array($data['CRH2'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+150,'c');$this->combovsex($data['x']+190,$data['y']+140,'CRH4',array($data['CRH4'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+180,'E');$this->combovsex($data['x']+60,$data['y']+170,'ERH3',array($data['ERH3'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+180,'e');$this->combovsex($data['x']+190,$data['y']+170,'ERH5',array($data['ERH5'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+210,'K1');$this->combovsex($data['x']+60,$data['y']+200,'KELL1',array($data['KELL1'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+210,'K2');$this->combovsex($data['x']+190,$data['y']+200,'KELL2',array($data['KELL2'],"Positif","negatif"));
	
	$this->label($data['x']+350,$data['y']+120,'Poly trans');$this->combovsex($data['x']+430,$data['y']+110,'POLYT',array($data['POLYT'],"YES","NO"));
	$this->label($data['x']+530,$data['y']+120,'DDT');$this->date($data['x']+560,$data['y']+110,'DDT',0,$data['DDT']);
    $this->label($data['x']+350,$data['y']+150,'RTA');$this->combovsex($data['x']+430,$data['y']+140,'RTA',array($data['RTA'],"YES","NO"));
	$this->label($data['x']+530,$data['y']+150,'TYPE');$this->combovsex($data['x']+560,$data['y']+140,'TYPERTA',array($data['TYPERTA'],"IMM","INF","AUTRES"));
	$this->label($data['x']+350,$data['y']+180,'RAI');$this->combovsex($data['x']+430,$data['y']+170,'RAI',array($data['RAI'],"YES","NO"));
	$this->label($data['x']+530,$data['y']+180,'DRAI');$this->date($data['x']+560,$data['y']+170,'DRAI',0,$data['DRAI']);
	$this->label($data['x']+350,$data['y']+210,'Resultat');$this->combov($data['x']+430,$data['y']+200,'RESULTAT',array($data['RESULTAT'],"Positif","negatif"));
	$this->label($data['x']+350,$data['y']+240,'Diagnostic');$this->combov($data['x']+430,$data['y']+230,'DGC',$data['DGC']);
	$this->hide(215,670,'REGION',0,$_SESSION['REGION']);$this->hide(215,670,'WILAYA',0,$_SESSION['WILAYA']);$this->hide(215,670,'STRUCTURE',0,$_SESSION['STRUCTURE']);$this->hide(215,670,'login',0,$_SESSION['login']);
	$this->hide(215,670,'id',0,$data['id']);
	$this->hide(215,670,'AGE',0,$data['AGE']);
	$this->hide(215,670,'PSL',0,$data['PSL']);
	
	$this->photosurl($data['x']+1070,$data['y']-20,URL.'public/images/photos/'.$data['photos']);	
	
	$this->urlbutton(828,$data['y']+118,URL.'rec/discgr/'.$data['id'],'CGR',10);
	$this->urlbutton(880,$data['y']+118,URL.'rec/dispfc/'.$data['id'],'PFC',10);
	$this->urlbutton(930,$data['y']+118,URL.'rec/discps/'.$data['id'],'CPS',10);
	
	$this->urlbutton(930+62,$data['y']+118,URL.'rec/','NEW',10);
	
	$this->label($data['x']+720,$data['y']+120+30,'Psl');$this->PSL($data['x']+785,$data['y']+140,$data['PSL'],$data['GRABO'],$data['GRRH'],'n','y');
	$this->label($data['x']+720,$data['y']+150+30,'Service');$this->SER($data['x']+785,$data['y']+140+30,'SERVICE','mvc','ser');
	$this->label($data['x']+720,$data['y']+180+30,'Medecin');$this->combom($data['x']+785,$data['y']+170+30,'MED','mvc','grh',$data['valuemed'],$data['selectedmed']) ;
	
	$this->label($data['x']+720,$data['y']+240,'Date');$this->date($data['x']+785,$data['y']+230,'DINS',0,$data['DINS']);
	$this->label($data['x']+875,$data['y']+240,'Heures'); $this->date($data['x']+915,$data['y']+230,'HINS',0,$data['HINS']);	
	$this->submit($data['x']+785,$data['y']+260,$data['butun']);$this->f1();$this->sautligne(10);
	}
	
	//*malade*//
	function datamalade($data)
	{
	$this->verifsession();
	$this->button($data['btn'],$data['id']);
	echo'<h2>'.$data['titre'].'</h2>';
	$this->sautligne(0);$this->hr();
	$this->f0(URL.$data['action'],'post');
	$this->label($data['x'],$data['y'],'Nom');$this->txtautofocus($data['x']+60,$data['y']-10,'NOM',0,$data['NOM']);
	$this->label($data['x']+350,$data['y'],'Prénom ');$this->txt($data['x']+430,$data['y']-10,'PRENOM',0,$data['PRENOM']);
	$this->label($data['x']+720,$data['y'],'Fils de ');$this->txt($data['x']+785,$data['y']-10,'FILSDE',0,$data['FILSDE']);
	$this->label($data['x'],$data['y']+30,'Sexe');$this->combovsex($data['x']+58,$data['y']+20,'SEXE',$data['SEXE']);
	$this->label($data['x']+150,$data['y']+30,'Née le');$this->txts($data['x']+60+130,$data['y']+20,'DATENS',0,$data['DATENS'],'date');
	$this->label($data['x']+350,$data['y']+30,'Wilaya de');
	$this->WILAYA($data['x']+430,$data['y']+20,'WILAYAN','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);$this->label($data['x']+720,$data['y']+30,'Commune');$this->COMMUNE($data['x']+785,$data['y']+20,'COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
	$this->label($data['x'],$data['y']+60,'Mobile ');$this->txts($data['x']+60,$data['y']+50,'TEL',0,$data['TEL'],'port');$this->label($data['x']+350,$data['y']+60,'Fixe');$this->txt($data['x']+430,$data['y']+50,'TELF',0,$data['TELF']);$this->label($data['x']+720,$data['y']+60,'E-Mail');$this->txt($data['x']+785,$data['y']+50,'EMAIL',0,$data['EMAIL']); 
	$this->label($data['x'],$data['y']+90,'Wilaya');$this->WILAYA($data['x']+60,$data['y']+80,'WILAYAR','countryr','mvc','wil',$data['WILAYAR1'],$data['WILAYAR2']);$this->label($data['x']+350,$data['y']+90,'Commune'); 
	$this->COMMUNE($data['x']+430,$data['y']+80,'COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);$this->label($data['x']+720,$data['y']+90,'Citée');$this->ADRESSE($data['x']+785,$data['y']+80,'ADRESSE','ADRESSE','mvc','adr',$data['ADRESSE1'],$data['ADRESSE2']);
	$this->label($data['x'],$data['y']+120,'ABO');$this->combovsex($data['x']+60,$data['y']+110,'GRABO',array($data['GRABO'],"A","B","AB","O"));
	$this->label($data['x']+165,$data['y']+120,'RH');$this->combovsex($data['x']+190,$data['y']+110,'GRRH',array($data['GRRH'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+150,'C');$this->combovsex($data['x']+60,$data['y']+140,'CRH2',array($data['CRH2'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+150,'c');$this->combovsex($data['x']+190,$data['y']+140,'CRH4',array($data['CRH4'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+180,'E');$this->combovsex($data['x']+60,$data['y']+170,'ERH3',array($data['ERH3'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+180,'e');$this->combovsex($data['x']+190,$data['y']+170,'ERH5',array($data['ERH5'],"Positif","negatif"));
	$this->label($data['x'],$data['y']+210,'K1');$this->combovsex($data['x']+60,$data['y']+200,'KELL1',array($data['KELL1'],"Positif","negatif"));
	$this->label($data['x']+165,$data['y']+210,'K2');$this->combovsex($data['x']+190,$data['y']+200,'KELL2',array($data['KELL2'],"Positif","negatif"));
	$this->hide(215,670,'REGION',0,$_SESSION['REGION']);$this->hide(215,670,'WILAYA',0,$_SESSION['WILAYA']);$this->hide(215,670,'STRUCTURE',0,$_SESSION['STRUCTURE']);$this->hide(215,670,'login',0,$_SESSION['login']);
	$this->photosurl($data['x']+1070,$data['y']-20,URL.'public/images/photos/'.$data['photos']);	
	$this->label($data['x']+350,$data['y']+120,'HVB');   $this->combov($data['x']+430,$data['y']+110,'HVB',array($data['HVB'],"negatif","douteux","Positif"));
	$this->label($data['x']+350,$data['y']+120+30,'HVC');$this->combov($data['x']+430,$data['y']+110+30,'HVC',array($data['HVC'],"negatif","douteux","Positif"));
	$this->label($data['x']+350,$data['y']+120+60,'HIV');$this->combov($data['x']+430,$data['y']+110+60,'HIV',array($data['HIV'],"negatif","douteux","Positif"));
	$this->label($data['x']+350,$data['y']+120+90,'TPHA');$this->combov($data['x']+430,$data['y']+110+90,'TPHA',array($data['TPHA'],"negatif","douteux","Positif"));
	$this->label($data['x']+720,$data['y']+120,'Num');$this->txt($data['x']+785,$data['y']+110,'NUM',0,$data['NUM']);//$this->PSL($data['x']+785,$data['y']+110,$data['PSL'],$data['GRABO'],$data['GRRH']);
	$this->label($data['x']+720,$data['y']+150,'Service');$this->SER($data['x']+785,$data['y']+140,'SERVICE','mvc','ser');
	$this->label($data['x']+720,$data['y']+180,'Medecin');$this->combom($data['x']+785,$data['y']+170,'MED','mvc','grh',$data['valuemed'],$data['selectedmed']) ;
	$this->label($data['x']+720,$data['y']+210,'Date');$this->date($data['x']+785,$data['y']+200,'DINS',0,$data['DINS']);
	$this->label($data['x']+875,$data['y']+210,'Heures'); $this->date($data['x']+915,$data['y']+200,'HINS',0,$data['HINS']);	
	$this->submit($data['x']+785,$data['y']+240,$data['butun']);$this->f1();$this->sautligne(10);
	}
	
	/*graphemois*/
	function valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR) 
	{
	mysqlconnect();
	$sql = " select $COLONE1,$COLONE2,SRS,STR,TDNR from $TBL where (SRS='$SRS' and $STR and $COLONE2='$VALEUR2') and ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function graphemoisf($data) 
	{
	$this->verifsession();
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet(); 
	$dataSet->addPoint(new Point("JAN", $data['JAN']));
	$dataSet->addPoint(new Point("FEV", $data['FEV']));
	$dataSet->addPoint(new Point("MAR", $data['MAR']));
	$dataSet->addPoint(new Point("AVR", $data['AVR']));
	$dataSet->addPoint(new Point("MAI", $data['MAI']));
	$dataSet->addPoint(new Point("JUIN",$data['JUIN']));
	$dataSet->addPoint(new Point("JUIL",$data['JUIL']));
	$dataSet->addPoint(new Point("AOUT",$data['AOUT']));
	$dataSet->addPoint(new Point("SEP", $data['SEP']));
	$dataSet->addPoint(new Point("OCT", $data['OCT']));
	$dataSet->addPoint(new Point("NOV", $data['NOV']));
	$dataSet->addPoint(new Point("DEC", $data['DEC']));
	$chart->setDataSet($dataSet);
	$chart->setTitle($data['TITRE']);
	$chart->render($fichier);	
	$this->button($data['btn'],$data['id']);
	echo '<h2>'.$data['TITRE'].'</h2>';
	echo '<hr /><br />';
	echo '<div align="center"  > ';
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";echo "<br />";
	BOUTONGRAPHE() ;
	}
	

	//***//
	function txtauto($x,$y,$name,$size,$value)
	{
	 echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" id=\"langages\"  />";
	 echo "</div>";
	}
	
	
	function datetime ($x,$y,$name)
	{
	 echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <input type=\"date\" name=\"".$name."\"   />";
	 echo "</div>";
	}
	
	function nbr ($x,$y,$name,$size) //poids 
	{
	 echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <input type=\"number\" name=\"".$name."\" size=\"".$size."\" min=\"60\" max=\"100\" />";
	 echo "</div>";
	}
	
	function nbr1 ($x,$y,$name,$size) //taille
	{
	 echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <input type=\"number\" name=\"".$name."\" size=\"".$size."\" min=\"150\" max=\"200\" />";
	 echo "</div>";
	}
	function tas ($x,$y,$name,$size) //ta systolique 
	{
	 echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <input type=\"number\" name=\"".$name."\" size=\"".$size."\" min=\"100\" max=\"200\" />";
	 echo "</div>";
	}
	function tad ($x,$y,$name,$size) //ta diastolique
	{
	 echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <input type=\"number\" name=\"".$name."\" size=\"".$size."\" min=\"50\" max=\"100\" />";
	 echo "</div>";
	}
	
	function combo($x,$y,$name,$db_name,$tb_name) //combo avec base de donnes
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sꭥction de la base de donn꦳ par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo '<select size=1 name="'.$name.'">'."\n";
    echo '<option   value="-1">choisir</option>'."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name   " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[1].'">'.$data['0']."/".$data['1'];
    echo '</option>'."\n";
    }
    echo '</select>'."\n"; 
	echo "</div>";
	}
	function comboupdate($x,$y,$name,$db_name,$tb_name,$choisir) //combo avec base de donnes $per ->comboupdate(600,370,'COMMUNE','gpts2012','com',$result->str);
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sꭥction de la base de donn꦳ par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo '<select size=1 name="'.$name.'">'."\n";
    echo '<option   value="-1">'.$choisir.'</option>'."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name   " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[1].'">'.$data['0']."/".$data['1'];
    echo '</option>'."\n";
    }
    echo '</select>'."\n"; 
	echo "</div>";
	}
	function combodyn($x,$y,$name,$db_name,$tb_name) 
	{
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select name=\"".$name."\" onchange=\"showUser(this.value)\"> ";             
	echo "<option value=\"\">selectionner wilaya:</option> ";          
	$con = mysql_connect('localhost','root','');
	mysql_select_db($db_name, $con);			
	$sql="SELECT * FROM $tb_name order by WILAYAS "; 
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
	echo "<option value=\"".$row["IDWIL"]."\">".$row["WILAYAS"]."</option>";
	}
	echo"</select>";
	echo "</div>";
	}
	function combodyn1($x,$y) 
	{
	echo "<div id=\"txtHint\" class=\"label\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">Commune de naissance</div>";	 
	}
	function combodyn2($x,$y,$name,$db_name,$tb_name) 
	{
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select name=\"".$name."\" onchange=\"showUser1(this.value)\"> ";             
	echo "<option value=\"\">selectionner wilaya:</option> ";          
	$con = mysql_connect('localhost','root','');
	mysql_select_db($db_name, $con);			
	$sql="SELECT * FROM $tb_name order by WILAYAS "; 
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
	echo "<option value=\"".$row["IDWIL"]."\">".$row["WILAYAS"]."</option>";
	}
	echo"</select>";
	echo "</div>";
	}
	function combodyn12($x,$y) 
	{
	echo "<div id=\"txtHint1\" class=\"label\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">Commune de residence</div>";	 
	}
	
	function photos($x,$y)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <img   src=\"./IMAGES/5.jpg\" width=\"250\" height=\"250\" alt=\"1\" />";
	 echo "</div>";
	}
	//
	function photosx($x,$y,$nom)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <img   src=\"./IMAGES/$nom\" width=\"250\" height=\"250\" alt=\"1\" />";
	 echo "</div>";
	}
	function photosuser($x,$y,$nom)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <img   src=\"./IMAGES/photos/$nom\" width=\"250\" height=\"250\" alt=\"1\" />";
	 echo "</div>";
	}
	function photoscaptacha($x,$y)
	{
	 echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <img   src=\"./connec/captcha.php\"  />";
	 echo "</div>";
	}
	
	function forfait($x,$y,$name,$db_name,$tb_name,$value,$selected) 
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"ARS\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[2].'">'.$data[1].'</option>';
    }
	echo '</select>'."\n"; 
	echo "</div>";
	}
    function MDO($x,$y,$name,$db_name,$tb_name,$value,$selected) 
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"ARS\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name order by mdo" );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.ucwords(strtolower ($data[1])).'</option>';
    }
	echo '</select>'."\n"; 
	echo "</div>";
	}
	
   
	
	function ARS($x,$y,$name,$db_name,$tb_name,$value,$selected) 
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
	// echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"ARS\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name order by WILAYAS" );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.$data[1].'</option>';
    }
	echo '</select>'."\n"; 
	// echo "</div>";
	}
	function WRS($x,$y,$name,$value,$selected) 
	{
	// echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"WRS\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
    echo '</select>'."\n"; 
	// echo "</div>";
	}
	function STR($x,$y,$name,$value,$selected) 
	{
	// echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"STR\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
    echo '</select>'."\n"; 
	// echo "</div>";
	}
	/////////////////////specialite chapitre diagnostique 
	function SPC($x,$y,$name,$db_name,$tb_name) 
	{
	$db_host="localhost"; 
    $db_user="root";
    $db_pass="";
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($db_name,$cnx) ;
    mysql_query("SET NAMES 'UTF8' ");
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"SPESC\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">choisir une specialite</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM $tb_name order by IDS" );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.$data[3].'</option>';
    }
	echo '</select>'."\n"; 
	echo "</div>";
	}
	function CHA($x,$y,$name) 
	{
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"CHA\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">choisir un chapitre</option>"."\n";
    echo '</select>'."\n"; 
	echo "</div>";
	}
	function DGC($x,$y,$name) 
	{
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"DGC\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">choisir un diagnostique</option>"."\n";
    echo '</select>'."\n"; 
	echo "</div>";
	}
	//////////////////////////////////////////////
	// function WILAYA($x,$y,$name,$class,$db_name,$tb_name,$value,$selected) 
	// {
	// mysqlconnect();
	// echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";		 
	// echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
	// echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	// mysql_query("SET NAMES 'UTF8' ");
	// $result = mysql_query("SELECT * FROM $tb_name order by WILAYAS" );
	// while($data =  mysql_fetch_array($result))
	// {
	// echo '<option value="'.$data[0].'">'.$data[1].'</option>';
	// }
	// echo '</select>'."\n"; 
	// echo "</div>";
	// }
	// function COMMUNE($x,$y,$name,$class,$value,$selected) 
	// {
	// echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";		 
	// echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
	// echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
	// echo '</select>'."\n";
	// echo "</div>";
	// }
	
	
	
	
	function cim1($x,$y,$name,$db_name,$tb_name,$value,$selected) 
	{
	mysqlconnect();
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"cim1\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM chapitre " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.$data[1].'</option>';
    }
	echo '</select>'."\n"; 
	echo "</div>";
	}
	function cim2($x,$y,$name,$value,$selected) 
	{
	echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo "<select size=1 class=\"cim2\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
    echo '</select>'."\n"; 
	echo "</div>";
	}
	
	function NOMUTILISATEUR($x,$y,$name) 
	{
	    echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	    echo "<select size=1 name=\"".$name."\">"."\n";
		echo "<option   value=\"-1\">user</option>"."\n";
		mysql_query("SET NAMES 'UTF8' ");
		$result = mysql_query("SELECT * FROM USERS " );
		while($data =  mysql_fetch_array($result))
		{
		echo '<option value="'.$data[5].'">'.$data['USER'];
		echo '</option>'."\n";
		}
		echo '</select>'."\n"; 
		echo "</div>";
	}
	function PSW($x,$y,$name,$size,$value)
	{
	 echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	 echo " <input type=\"password\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" />";
	 echo "</div>";
	}
	//graphe dons
	function valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR) 
	{
	mysqlconnect();
	$sql = " select $COLONE1,$COLONE2,SRS from $TBL where (SRS='$SRS' and $STR and $COLONE2='$VALEUR2') and ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	
	
	function graphemnpe($x,$y,$TITRE,$TBL,$SEXE) //,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$STR
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new LineChart();
    $fichier='./CHART/demo/generated/demo6.png';
	//***serie1***//
	$serie1 = new XYDataSet();
	mysqlconnect();
	$query="SELECT * FROM $TBL WHERE SEXE='$SEXE' ";           
	$resultat=mysql_query($query);
	while($row=mysql_fetch_object($resultat))
	{
	$serie1->addPoint(new Point($row->AGE,$row->M3ET));
	}
	
	//***serie2***//
	$serie2 = new XYDataSet();
	mysqlconnect();
	$query="SELECT * FROM $TBL WHERE SEXE='$SEXE' ";           
	$resultat=mysql_query($query);
	while($row=mysql_fetch_object($resultat))
	{
	$serie2->addPoint(new Point($row->AGE,$row->M2ET));
	}
	
	//***serie3***//
	$serie3 = new XYDataSet();
	mysqlconnect();
	$query="SELECT * FROM $TBL WHERE SEXE='$SEXE' ";           
	$resultat=mysql_query($query);
	while($row=mysql_fetch_object($resultat))
	{
	$serie3->addPoint(new Point($row->AGE,$row->M1ET));
	}
	
	//***serie4***//
	$serie4 = new XYDataSet();
	mysqlconnect();
	$query="SELECT * FROM $TBL WHERE SEXE='$SEXE' ";           
	$resultat=mysql_query($query);
	while($row=mysql_fetch_object($resultat))
	{
	$serie4->addPoint(new Point($row->AGE,$row->MED));
	}
	
	//***serie5***//
	$serie5 = new XYDataSet();
	mysqlconnect();
	$query="SELECT * FROM $TBL WHERE SEXE='$SEXE' ";           
	$resultat=mysql_query($query);
	while($row=mysql_fetch_object($resultat))
	{
	$serie5->addPoint(new Point($row->AGE,$row->P1ET));
	}
	
	//***serie6***//
	$serie6 = new XYDataSet();
	mysqlconnect();
	$query="SELECT * FROM $TBL WHERE SEXE='$SEXE' ";           
	$resultat=mysql_query($query);
	while($row=mysql_fetch_object($resultat))
	{
	$serie6->addPoint(new Point($row->AGE,$row->P2ET));
	}
	
	//***serie7***//
	$serie7 = new XYDataSet();
	mysqlconnect();
	$query="SELECT * FROM $TBL WHERE SEXE='$SEXE' ";           
	$resultat=mysql_query($query);
	while($row=mysql_fetch_object($resultat))
	{
	$serie7->addPoint(new Point($row->AGE,$row->P3ET));
	}
	
	$dataSet = new XYSeriesDataSet();
	$dataSet->addSerie("+3ET", $serie7);
	$dataSet->addSerie("+2ET", $serie6);
	$dataSet->addSerie("+1ET", $serie5);
	$dataSet->addSerie("MED",  $serie4);
	$dataSet->addSerie("-1ET", $serie3);
	$dataSet->addSerie("-2ET", $serie2);
	$dataSet->addSerie("-3ET", $serie1);

	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->getPlot()->setGraphCaptionRatio(0.62);
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
	
	
	
	
	
    function graphemoisdnr($x,$y,$TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$STR) 
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet(); 
	$dataSet->addPoint(new Point("JAN", valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-01-01",$ANNEE."-01-31",$IND,$STR)));
	$dataSet->addPoint(new Point("FEV", valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-02-01",$ANNEE."-02-28",$IND,$STR)));
	$dataSet->addPoint(new Point("MAR", valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-03-01",$ANNEE."-03-31",$IND,$STR)));
	$dataSet->addPoint(new Point("AVR", valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-04-01",$ANNEE."-04-30",$IND,$STR)));
	$dataSet->addPoint(new Point("MAI", valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-05-01",$ANNEE."-05-31",$IND,$STR)));
	$dataSet->addPoint(new Point("JUIN",valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-06-01",$ANNEE."-06-30",$IND,$STR)));
	$dataSet->addPoint(new Point("JUIL",valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-07-01",$ANNEE."-07-31",$IND,$STR)));
	$dataSet->addPoint(new Point("AOUT",valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-08-01",$ANNEE."-08-31",$IND,$STR)));
	$dataSet->addPoint(new Point("SEP", valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-09-01",$ANNEE."-09-30",$IND,$STR)));
	$dataSet->addPoint(new Point("OCT", valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-10-01",$ANNEE."-10-31",$IND,$STR)));
	$dataSet->addPoint(new Point("NOV", valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-11-01",$ANNEE."-11-30",$IND,$STR)));
	$dataSet->addPoint(new Point("DEC", valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-12-01",$ANNEE."-12-31",$IND,$STR)));
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
	
	function graphemois($x,$y,$TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$STR) 
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();$dataSet = new XYDataSet(); 
	$dataSet->addPoint(new Point("JAN", valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-01-01",$ANNEE."-01-31",$IND,$STR)));
	$dataSet->addPoint(new Point("FEV", valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-02-01",$ANNEE."-02-28",$IND,$STR)));
	$dataSet->addPoint(new Point("MAR", valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-03-01",$ANNEE."-03-31",$IND,$STR)));
	$dataSet->addPoint(new Point("AVR", valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-04-01",$ANNEE."-04-30",$IND,$STR)));
	$dataSet->addPoint(new Point("MAI", valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-05-01",$ANNEE."-05-31",$IND,$STR)));
	$dataSet->addPoint(new Point("JUIN",valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-06-01",$ANNEE."-06-30",$IND,$STR)));
	$dataSet->addPoint(new Point("JUIL",valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-07-01",$ANNEE."-07-31",$IND,$STR)));
	$dataSet->addPoint(new Point("AOUT",valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-08-01",$ANNEE."-08-31",$IND,$STR)));
	$dataSet->addPoint(new Point("SEP", valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-09-01",$ANNEE."-09-30",$IND,$STR)));
	$dataSet->addPoint(new Point("OCT", valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-10-01",$ANNEE."-10-31",$IND,$STR)));
	$dataSet->addPoint(new Point("NOV", valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-11-01",$ANNEE."-11-30",$IND,$STR)));
	$dataSet->addPoint(new Point("DEC", valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-12-01",$ANNEE."-12-31",$IND,$STR)));
	$chart->setDataSet($dataSet);$chart->setTitle($TITRE.date("d-m-Y"));
	$fichier ='./CHART/demo/generated/demo1.png';$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 1px solid red;"/>';
	echo "</div>";
	}
	
	function BOUTONGRAPHE($x,$y) 
	{
	echo "<div id=\"smenug\" class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	echo '<a href="'.URL.'don/IND/">IND</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/CIDT/">CIT</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/CIDD/">CID</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/F/">FIX</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/M/">MOB</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/DFM/">DFM</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/OCC/">OCC</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/REG/">REG</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/DOR/">DOR</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/A/">A</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/B/">B</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/AB/">AB</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/O/">O</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/ABO/">ABO</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/RHP/">RHP</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/RHN/">RHN</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/RHNP/">RHNP</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/SM/">M</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/SF/">F</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/SMF/">MF</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'don/ST/">ST</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'don/AP/">AP</a>'; echo '&nbsp;';
	// echo '<a href="'.URL.'don/STA/">STA</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/AGE/">AGE</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/HIVP/">HIV</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/HVBP/">HVB</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/HVCP/">HVC</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'don/TPHAP/">TPHA</a>'; echo '&nbsp;';
	echo "</div>";
	}
	function BOUTONGRAPHE1($x,$y) 
	{
	echo "<div id=\"smenug\" class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	echo '<a href="'.URL.'dnr/">DNR MOIS</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/dnranne">DNR ANNEE</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/donanne">DON ANNEE IND</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/donanne1">DON ANNEE SEXE</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/donanne2">STR ANNEE STR</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/donanne3">STR ANNEE TDNR</a>'; echo '&nbsp;';
	echo '<a href="'.URL.'dnr/donaborh">DON ABO RH</a>'; echo '&nbsp;';
	echo "</div>";
	}
	function BOUTONGRAPHE2($x,$y) 
	{
	echo "<div id=\"smenug\" class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	echo '<a href="'.URL.'rec/">REC</a>'; echo '&nbsp;';
	
	echo "</div>";
	}
	function BOUTONGRAPHE3($x,$y) 
	{
	echo "<div id=\"smenug\" class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	// echo '<a href="'.URL.'dis/PSLCGR/">PSL M</a>'; echo '&nbsp;';//ok
	// echo '<a href="'.URL.'dis/PSLSERVICE/">PSL S</a>'; echo '&nbsp;';//ok
	// echo '<a href="'.URL.'dis/PSLSTOK1/">PSL G</a>'; echo '&nbsp;';//ok
	// echo '<a href="'.URL.'dis/PSLSTOK/">PSL ST</a>'; echo '&nbsp;';//ok
	echo '<a href="'.URL.'dis/CGR/">CGR M</a>'; echo '&nbsp;';//ok
	echo '<a href="'.URL.'dis/SERVICECGR/">CGR S</a>'; echo '&nbsp;';//ok
	echo '<a href="'.URL.'dis/STOKCGR1/">CGR G</a>'; echo '&nbsp;';//ok
	echo '<a href="'.URL.'dis/STOKCGR/">CGR ST</a>'; echo '&nbsp;';//ok
	
	echo '<a href="'.URL.'dis/PFC/">PFC M</a>'; echo '&nbsp;';//ok
	echo '<a href="'.URL.'dis/SERVICEPFC/">PFC S</a>'; echo '&nbsp;';//ok
	echo '<a href="'.URL.'dis/STOKPFC1/">PFC G</a>'; echo '&nbsp;';//ok
	echo '<a href="'.URL.'dis/STOKPFC/">PFC ST</a>'; echo '&nbsp;';//ok
	
	echo '<a href="'.URL.'dis/CPS/">CPS M</a>'; echo '&nbsp;';//ok
	echo '<a href="'.URL.'dis/SERVICECPS/">CPS S</a>'; echo '&nbsp;';//ok
	echo '<a href="'.URL.'dis/STOKCPS1/">CPS G</a>'; echo '&nbsp;';//ok
	echo '<a href="'.URL.'dis/STOKCPS/">CPS ST</a>'; echo '&nbsp;';//ok
	
	echo "</div>";
	}
	function BOUTONGRAPHE4($x,$y) 
	{
	echo "<div id=\"smenug\" class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	echo '<a href="'.URL.'/mal/">Malade MOIS</a>'; echo '&nbsp;';
	
	echo "</div>";
	}
	
	function valeurbi($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR) 
	{
	mysqlconnect();
	$sql = " select $COLONE1,$COLONE2,SRS,STR,TDNR from $TBL where (SRS='$SRS' and $STR and $COLONE2='$VALEUR2') and ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function graphebi($x,$y,$TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$val1,$val2,$TI1,$TI2) 
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new PieChart();
	$fichier='./CHART/demo/generated/demo3.png';
	$dataSet = new XYDataSet();
	$datem=valeurbi($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE.'-01-01',$ANNEE.'-12-31',$IND,$val1);
	$datef=valeurbi($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE.'-01-01',$ANNEE.'-12-31',$IND,$val2);
	$dataSet->addPoint(new Point($TI1,$datef));
	$dataSet->addPoint(new Point($TI2,$datem));
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render("./CHART/demo/generated/demo3.png");	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
	
	function valeurbibi($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR) 
	{
	mysqlconnect();
	$sql = " select $COLONE1,$COLONE2,SRS,STR,TDNR from $TBL where (SRS='$SRS' and $STR and $COLONE2='$VALEUR2') and ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function graphebibi($x,$y,$TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$val1,$val2,$val3,$val4,$TI1,$TI2,$TI3,$TI4) 
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new PieChart();
	$fichier='./CHART/demo/generated/demo3.png';
	$dataSet = new XYDataSet();
	$GA=valeurbibi($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE.'-01-01',$ANNEE.'-12-31',$IND,$val1);
	$GB=valeurbibi($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE.'-01-01',$ANNEE.'-12-31',$IND,$val2);
	$GAB=valeurbibi($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE.'-01-01',$ANNEE.'-12-31',$IND,$val3);
	$GO=valeurbibi($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE.'-01-01',$ANNEE.'-12-31',$IND,$val4);
	$dataSet->addPoint(new Point($TI1,$GA));
	$dataSet->addPoint(new Point($TI2,$GB));
	$dataSet->addPoint(new Point($TI3,$GAB));
	$dataSet->addPoint(new Point($TI4,$GO));
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render("./CHART/demo/generated/demo3.png");	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
	
	function AGEDON($colone2,$colone3,$datejour1,$datejour2)
	{
	mysqlconnect();
	$sql = " select SEXEDNR,AGEDNR,DATEDON,IND from don where IND='IND'and  AGEDNR >=$colone2 and AGEDNR <=$colone3  and DATEDON >='$datejour1'and DATEDON <='$datejour2'";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$collecte=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $collecte;
	}
	function GRAPHEAGEDON($x,$y,$TITRE,$datejour1,$datejour2) 
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("18-19",  AGEDON(18,19,$datejour1.'-01-01',$datejour2)));
	$dataSet->addPoint(new Point("20-29",  AGEDON(20,29,$datejour1.'-01-01',$datejour2)));
	$dataSet->addPoint(new Point("30-39",  AGEDON(30,39,$datejour1.'-01-01',$datejour2)));
	$dataSet->addPoint(new Point("40-49",  AGEDON(40,49,$datejour1.'-01-01',$datejour2)));
	$dataSet->addPoint(new Point("50-59",  AGEDON(50,59,$datejour1.'-01-01',$datejour2)));
	$dataSet->addPoint(new Point("60-69",  AGEDON(60,69,$datejour1.'-01-01',$datejour2)));
	$dataSet->addPoint(new Point("70-79",  AGEDON(70,79,$datejour1.'-01-01',$datejour2)));
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
	function dnrparadresse($ADRESSE) 
	{
	mysqlconnect();
	$sql = " select * from dnr where ADRESSE='$ADRESSE' ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function dnrparcommune($WILAYAR,$COMMUNER) 
	{
	mysqlconnect();
	$sql = " select * from dnr where WILAYAR=$WILAYAR and  COMMUNER=$COMMUNER   ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
		
	function dnrparwilaya($WILAYAR) 
	{
	mysqlconnect();
	$sql = " select * from dnr where WILAYAR=$WILAYAR ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR) 
	{
	mysqlconnect();
	$sql = " select $COLONE1,$COLONE2,SRS,SERVICE,MED from $TBL where (SRS='$SRS' and $STR and $COLONE2='$VALEUR2') and ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function graphemoisd($x,$y,$TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$STR) 
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet(); 
	$dataSet->addPoint(new Point("JAN", valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-01-01",$ANNEE."-01-31",$IND,$STR)));
	$dataSet->addPoint(new Point("FEV", valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-02-01",$ANNEE."-02-28",$IND,$STR)));
	$dataSet->addPoint(new Point("MAR", valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-03-01",$ANNEE."-03-31",$IND,$STR)));
	$dataSet->addPoint(new Point("AVR", valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-04-01",$ANNEE."-04-30",$IND,$STR)));
	$dataSet->addPoint(new Point("MAI", valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-05-01",$ANNEE."-05-31",$IND,$STR)));
	$dataSet->addPoint(new Point("JUIN",valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-06-01",$ANNEE."-06-30",$IND,$STR)));
	$dataSet->addPoint(new Point("JUIL",valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-07-01",$ANNEE."-07-31",$IND,$STR)));
	$dataSet->addPoint(new Point("AOUT",valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-08-01",$ANNEE."-08-31",$IND,$STR)));
	$dataSet->addPoint(new Point("SEP", valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-09-01",$ANNEE."-09-30",$IND,$STR)));
	$dataSet->addPoint(new Point("OCT", valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-10-01",$ANNEE."-10-31",$IND,$STR)));
	$dataSet->addPoint(new Point("NOV", valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-11-01",$ANNEE."-11-30",$IND,$STR)));
	$dataSet->addPoint(new Point("DEC", valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-12-01",$ANNEE."-12-31",$IND,$STR)));
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
	function DISSERV($datejour1,$datejour2,$service,$PSL) 
	{
	mysqlconnect();
	$sql = " select * from dis where DATEDIS >='$datejour1'and DATEDIS <='$datejour2'  and  SERVICE='$service' and PSL='$PSL' ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function SERVICECGR($x,$y,$PSL,$titre)
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet(); 
	$DATEMOIS=date("Y");
	$pts=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','1',$PSL);
	$MEDECINEHOMME=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','2',$PSL);
	$MEDECINEFEMME=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','3',$PSL);
	$CHIRURGIEHOMME=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','4',$PSL);
	$CHIRURGIEFEMME=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','5',$PSL);
	$GYNECO=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','6',$PSL);
	$MATERNITE=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','7',$PSL);
	$PEDIATRIE=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','8',$PSL);
	$BLOCOPPA=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','9',$PSL);
	$BLOCOPPB=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','10',$PSL);
	$UMC=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','11',$PSL);
	$HEMODIALYSE=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','12',$PSL);
	$public=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','13',$PSL);
	$prive=DISSERV($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','14',$PSL);
	$dataSet->addPoint(new Point("Med H",$MEDECINEHOMME));
	$dataSet->addPoint(new Point("Med F",$MEDECINEFEMME));
	$dataSet->addPoint(new Point("Chr H",$CHIRURGIEHOMME));
	$dataSet->addPoint(new Point("Chr F",$CHIRURGIEFEMME));
	$dataSet->addPoint(new Point("GYN",$GYNECO));
	$dataSet->addPoint(new Point("MAT",$MATERNITE));
	$dataSet->addPoint(new Point("PED",$PEDIATRIE));
	$dataSet->addPoint(new Point("BLOCA",$BLOCOPPA));
	$dataSet->addPoint(new Point("BLOCB",$BLOCOPPB));
	$dataSet->addPoint(new Point("UMC",$UMC));
	$dataSet->addPoint(new Point("HEM",$HEMODIALYSE));
	$dataSet->addPoint(new Point("pub",$public));
	$dataSet->addPoint(new Point("pri",$prive));
	$dataSet->addPoint(new Point("total",$prive+$public+$HEMODIALYSE+$UMC+$BLOCOPPB+$BLOCOPPA+$PEDIATRIE+$MATERNITE+$GYNECO+$CHIRURGIEFEMME+$CHIRURGIEHOMME+$MEDECINEFEMME+$MEDECINEHOMME));
	$chart->setDataSet($dataSet);
	$chart->setTitle($titre);
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
//************************************* la base du graphique  *******************************************//
    function DISSERVX($DATEJOUR1,$DATEJOUR2,$SERVICE,$TBL) 
	{
	mysqlconnect();
	$sql = " select * from $TBL where (DIST='1'  and  SERVICE='$SERVICE') and (DATEDIS BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function SERVICECGRX($x,$y,$titre,$TBL)
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet(); 
	$DATEMOIS=date("Y");
	$pts=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','1',$TBL);
	$MEDECINEHOMME=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','2',$TBL);
	$MEDECINEFEMME=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','3',$TBL);
	$CHIRURGIEHOMME=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','4',$TBL);
	$CHIRURGIEFEMME=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','5',$TBL);
	$GYNECO=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','6',$TBL);
	$MATERNITE=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','7',$TBL);
	$PEDIATRIE=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','8',$TBL);
	$BLOCOPPA=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','9',$TBL);
	$BLOCOPPB=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','10',$TBL);
	$UMC=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','11',$TBL);
	$HEMODIALYSE=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','12',$TBL);
	$public=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','13',$TBL);
	$prive=$this->DISSERVX($DATEMOIS.'-01-01',$DATEMOIS.'-12-31','14',$TBL);
	$dataSet->addPoint(new Point("Med H",$MEDECINEHOMME));
	$dataSet->addPoint(new Point("Med F",$MEDECINEFEMME));
	$dataSet->addPoint(new Point("Chr H",$CHIRURGIEHOMME));
	$dataSet->addPoint(new Point("Chr F",$CHIRURGIEFEMME));
	$dataSet->addPoint(new Point("GYN",$GYNECO));
	$dataSet->addPoint(new Point("MAT",$MATERNITE));
	$dataSet->addPoint(new Point("PED",$PEDIATRIE));
	$dataSet->addPoint(new Point("BLOCA",$BLOCOPPA));
	$dataSet->addPoint(new Point("BLOCB",$BLOCOPPB));
	$dataSet->addPoint(new Point("UMC",$UMC));
	$dataSet->addPoint(new Point("HEM",$HEMODIALYSE));
	$dataSet->addPoint(new Point("pub",$public));
	$dataSet->addPoint(new Point("pri",$prive));
	$dataSet->addPoint(new Point("total",$prive+$public+$HEMODIALYSE+$UMC+$BLOCOPPB+$BLOCOPPA+$PEDIATRIE+$MATERNITE+$GYNECO+$CHIRURGIEFEMME+$CHIRURGIEHOMME+$MEDECINEFEMME+$MEDECINEHOMME));
	$chart->setDataSet($dataSet);
	$chart->setTitle($titre);
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
    function valeurmoisdx($TBL,$DIST,$DATEJOUR1,$DATEJOUR2) 
	{
	mysqlconnect();
	$sql = " select * from $TBL where (DIST='$DIST')  and (DATEDIS BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function graphemoisdx($x,$y,$TITRE,$TBL,$DIST) 
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet(); $ANNEE=date("Y");
	$dataSet->addPoint(new Point("JAN", $this->valeurmoisdx($TBL,$DIST,$ANNEE."-01-01",$ANNEE."-01-31")));
	$dataSet->addPoint(new Point("FEV", $this->valeurmoisdx($TBL,$DIST,$ANNEE."-02-01",$ANNEE."-02-28")));
	$dataSet->addPoint(new Point("MAR", $this->valeurmoisdx($TBL,$DIST,$ANNEE."-03-01",$ANNEE."-03-31")));
	$dataSet->addPoint(new Point("AVR", $this->valeurmoisdx($TBL,$DIST,$ANNEE."-04-01",$ANNEE."-04-30")));
	$dataSet->addPoint(new Point("MAI", $this->valeurmoisdx($TBL,$DIST,$ANNEE."-05-01",$ANNEE."-05-31")));
	$dataSet->addPoint(new Point("JUIN",$this->valeurmoisdx($TBL,$DIST,$ANNEE."-06-01",$ANNEE."-06-30")));
	$dataSet->addPoint(new Point("JUIL",$this->valeurmoisdx($TBL,$DIST,$ANNEE."-07-01",$ANNEE."-07-31")));
	$dataSet->addPoint(new Point("AOUT",$this->valeurmoisdx($TBL,$DIST,$ANNEE."-08-01",$ANNEE."-08-31")));
	$dataSet->addPoint(new Point("SEP", $this->valeurmoisdx($TBL,$DIST,$ANNEE."-09-01",$ANNEE."-09-30")));
	$dataSet->addPoint(new Point("OCT", $this->valeurmoisdx($TBL,$DIST,$ANNEE."-10-01",$ANNEE."-10-31")));
	$dataSet->addPoint(new Point("NOV", $this->valeurmoisdx($TBL,$DIST,$ANNEE."-11-01",$ANNEE."-11-30")));
	$dataSet->addPoint(new Point("DEC", $this->valeurmoisdx($TBL,$DIST,$ANNEE."-12-01",$ANNEE."-12-31")));
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
	function nbrpsl($PSL,$GROUPAGE,$RHESUS,$DIST) 
	{
	mysqlconnect();
	$date=date('Y-01-01');
	$sql = " select * from $PSL where (DATEDIS >='$date' and DIST='$DIST') and (GROUPAGE='$GROUPAGE' and  RHESUS='$RHESUS') "; 
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function NBRPSL0($x,$y,$PSL,$titre,$DIST)
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet(); 
	$DATEMOIS=date("Y");
	///$dataSet->addPoint(new Point("DON TOTAL", $this ->PSL()));
	$dataSet->addPoint(new Point("O+", $this->nbrpsl($PSL,'O','Positif',$DIST)));
	$dataSet->addPoint(new Point("O-", $this->nbrpsl($PSL,'O','negatif',$DIST)));
	$dataSet->addPoint(new Point("A+", $this->nbrpsl($PSL,'A','Positif',$DIST)));
	$dataSet->addPoint(new Point("A-", $this->nbrpsl($PSL,'A','negatif',$DIST)));
	$dataSet->addPoint(new Point("B+", $this->nbrpsl($PSL,'B','Positif',$DIST)));
	$dataSet->addPoint(new Point("B-", $this->nbrpsl($PSL,'B','negatif',$DIST)));
	$dataSet->addPoint(new Point("AB+",$this->nbrpsl($PSL,'AB','Positif',$DIST)));
	$dataSet->addPoint(new Point("AB-",$this->nbrpsl($PSL,'AB','negatif',$DIST)));
	$chart->setDataSet($dataSet);
	$chart->setTitle($titre);
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
	function nbrpsls($PSL,$GROUPAGE,$RHESUS,$DIST) 
	{
	mysqlconnect();
	$date=date('Y-m-d');
	$sql = " select * from $PSL where (DATEPER >='$date' and DIST='$DIST') and (GROUPAGE='$GROUPAGE' and  RHESUS='$RHESUS') "; 
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function NBRPSL0S($x,$y,$PSL,$titre,$DIST)
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet(); 
	$DATEMOIS=date("Y");
	///$dataSet->addPoint(new Point("DON TOTAL", $this ->PSL()));
	$dataSet->addPoint(new Point("O+", $this->nbrpsls($PSL,'O','Positif',$DIST)));
	$dataSet->addPoint(new Point("O-", $this->nbrpsls($PSL,'O','negatif',$DIST)));
	$dataSet->addPoint(new Point("A+", $this->nbrpsls($PSL,'A','Positif',$DIST)));
	$dataSet->addPoint(new Point("A-", $this->nbrpsls($PSL,'A','negatif',$DIST)));
	$dataSet->addPoint(new Point("B+", $this->nbrpsls($PSL,'B','Positif',$DIST)));
	$dataSet->addPoint(new Point("B-", $this->nbrpsls($PSL,'B','negatif',$DIST)));
	$dataSet->addPoint(new Point("AB+",$this->nbrpsls($PSL,'AB','Positif',$DIST)));
	$dataSet->addPoint(new Point("AB-",$this->nbrpsls($PSL,'AB','negatif',$DIST)));
	$chart->setDataSet($dataSet);
	$chart->setTitle($titre);
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
	
	
//************************************************************************************************//
	
	function stockpsl($PSL,$GROUPAGE,$RHESUS) 
	{
	mysqlconnect();
	$date=date('Y-01-01');
	$sql = " select * from $PSL where (DATEDON >='$date' and DIST='') and (GROUPAGE='$GROUPAGE' and  RHESUS='$RHESUS') "; 
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function STOKCGR($x,$y,$PSL,$titre)
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet(); 
	$DATEMOIS=date("Y");
	///$dataSet->addPoint(new Point("DON TOTAL", $this ->PSL()));
	$dataSet->addPoint(new Point("O+", $this->stockpsl($PSL,'O','Positif')));
	$dataSet->addPoint(new Point("O-", $this->stockpsl($PSL,'O','negatif')));
	$dataSet->addPoint(new Point("A+", $this->stockpsl($PSL,'A','Positif')));
	$dataSet->addPoint(new Point("A-", $this->stockpsl($PSL,'A','negatif')));
	$dataSet->addPoint(new Point("B+", $this->stockpsl($PSL,'B','Positif')));
	$dataSet->addPoint(new Point("B-", $this->stockpsl($PSL,'B','negatif')));
	$dataSet->addPoint(new Point("AB+",$this->stockpsl($PSL,'AB','Positif')));
	$dataSet->addPoint(new Point("AB-",$this->stockpsl($PSL,'AB','negatif')));
	$chart->setDataSet($dataSet);
	$chart->setTitle($titre);
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
	
	function valeurmultigraphe($TBL,$COLONE1,$DATEJOUR1,$DATEJOUR2,$COLONE2,$VALEUR2) 
	{
	mysqlconnect();
	$sql = " select $COLONE1,$COLONE2 from $TBL where $COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2'  AND $COLONE2='$VALEUR2' ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function multigraphe($x,$y,$TITRE,$TBL,$COL,$COLONE,$VALEUR1,$VALEUR2) //,$data$data[$DATE-4]
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$dataSet = new XYSeriesDataSet();
	$fichier='./CHART/demo/generated/demo7.png';
	$DATE=date("Y");
	$serie1 = new XYDataSet();
	
	$serie1->addPoint(new Point($DATE-9,$this->valeurmultigraphe($TBL,$COL,($DATE-9)."-01-01",($DATE-9)."-12-31",$COLONE,$VALEUR1)));
	$serie1->addPoint(new Point($DATE-8,$this->valeurmultigraphe($TBL,$COL,($DATE-8)."-01-01",($DATE-8)."-12-31",$COLONE,$VALEUR1)));
	$serie1->addPoint(new Point($DATE-7,$this->valeurmultigraphe($TBL,$COL,($DATE-7)."-01-01",($DATE-7)."-12-31",$COLONE,$VALEUR1)));
	$serie1->addPoint(new Point($DATE-6,$this->valeurmultigraphe($TBL,$COL,($DATE-6)."-01-01",($DATE-6)."-12-31",$COLONE,$VALEUR1)));
	$serie1->addPoint(new Point($DATE-5,$this->valeurmultigraphe($TBL,$COL,($DATE-5)."-01-01",($DATE-5)."-12-31",$COLONE,$VALEUR1)));
	$serie1->addPoint(new Point($DATE-4,$this->valeurmultigraphe($TBL,$COL,($DATE-4)."-01-01",($DATE-4)."-12-31",$COLONE,$VALEUR1)));
	$serie1->addPoint(new Point($DATE-3,$this->valeurmultigraphe($TBL,$COL,($DATE-3)."-01-01",($DATE-3)."-12-31",$COLONE,$VALEUR1)));
	$serie1->addPoint(new Point($DATE-2,$this->valeurmultigraphe($TBL,$COL,($DATE-2)."-01-01",($DATE-2)."-12-31",$COLONE,$VALEUR1)));
	$serie1->addPoint(new Point($DATE-1,$this->valeurmultigraphe($TBL,$COL,($DATE-1)."-01-01",($DATE-1)."-12-31",$COLONE,$VALEUR1)));
	$serie1->addPoint(new Point($DATE-0,$this->valeurmultigraphe($TBL,$COL,($DATE-0)."-01-01",($DATE-0)."-12-31",$COLONE,$VALEUR1)));
	$dataSet->addSerie($VALEUR1, $serie1);
	
	$serie2 = new XYDataSet();
	$serie2->addPoint(new Point($DATE-9, $this->valeurmultigraphe($TBL,$COL,($DATE-9)."-01-01",($DATE-9)."-12-31",$COLONE,$VALEUR2)));
	$serie2->addPoint(new Point($DATE-8, $this->valeurmultigraphe($TBL,$COL,($DATE-8)."-01-01",($DATE-8)."-12-31",$COLONE,$VALEUR2)));
	$serie2->addPoint(new Point($DATE-7, $this->valeurmultigraphe($TBL,$COL,($DATE-7)."-01-01",($DATE-7)."-12-31",$COLONE,$VALEUR2)));
	$serie2->addPoint(new Point($DATE-6, $this->valeurmultigraphe($TBL,$COL,($DATE-6)."-01-01",($DATE-6)."-12-31",$COLONE,$VALEUR2)));
	$serie2->addPoint(new Point($DATE-5, $this->valeurmultigraphe($TBL,$COL,($DATE-5)."-01-01",($DATE-5)."-12-31",$COLONE,$VALEUR2)));
	$serie2->addPoint(new Point($DATE-4, $this->valeurmultigraphe($TBL,$COL,($DATE-4)."-01-01",($DATE-4)."-12-31",$COLONE,$VALEUR2)));
	$serie2->addPoint(new Point($DATE-3, $this->valeurmultigraphe($TBL,$COL,($DATE-3)."-01-01",($DATE-3)."-12-31",$COLONE,$VALEUR2)));
	$serie2->addPoint(new Point($DATE-2, $this->valeurmultigraphe($TBL,$COL,($DATE-2)."-01-01",($DATE-2)."-12-31",$COLONE,$VALEUR2)));
	$serie2->addPoint(new Point($DATE-1, $this->valeurmultigraphe($TBL,$COL,($DATE-1)."-01-01",($DATE-1)."-12-31",$COLONE,$VALEUR2)));
	$serie2->addPoint(new Point($DATE-0, $this->valeurmultigraphe($TBL,$COL,($DATE-0)."-01-01",($DATE-0)."-12-31",$COLONE,$VALEUR2)));
	$dataSet->addSerie($VALEUR2, $serie2);
	
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphCaptionRatio(0.65);

	$chart->setTitle($TITRE.date("d-m-Y"));
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}
	
	
	
	//GRAPHE ABO RH
	function valeurmultigraphe1($TBL,$COLONE1,$DATEJOUR1,$DATEJOUR2,$COLONE2,$VALEUR2,$COLONE3,$VALEUR3) 
	{
	mysqlconnect();
	$sql = " select $COLONE1,$COLONE2 from $TBL where $COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2'  AND $COLONE2='$VALEUR2'  AND $COLONE3='$VALEUR3'  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function multigraphe1($x,$y,$TITRE,$VALEUR1,$VALEUR2) //,$data$data[$DATE-4]
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$dataSet = new XYSeriesDataSet();
	$fichier='./CHART/demo/generated/demo7.png';
	
	
	$DATE=date("Y");
	$serie1 = new XYDataSet();//rh+
	$serie1->addPoint(new Point('A',$this->valeurmultigraphe1('don','DATEDON',($DATE)."-01-01",($DATE)."-12-31",'GROUPAGE','A','RHESUS',$VALEUR1)));
	$serie1->addPoint(new Point('B',$this->valeurmultigraphe1('don','DATEDON',($DATE)."-01-01",($DATE)."-12-31",'GROUPAGE','B','RHESUS',$VALEUR1)));
	$serie1->addPoint(new Point('AB',$this->valeurmultigraphe1('don','DATEDON',($DATE)."-01-01",($DATE)."-12-31",'GROUPAGE','AB','RHESUS',$VALEUR1)));
	$serie1->addPoint(new Point('O',$this->valeurmultigraphe1('don','DATEDON',($DATE)."-01-01",($DATE)."-12-31",'GROUPAGE','O','RHESUS',$VALEUR1)));
	$dataSet->addSerie('RH '.$VALEUR1, $serie1);
	
	$serie2 = new XYDataSet();//rh-
	$serie2->addPoint(new Point('A',$this->valeurmultigraphe1('don','DATEDON',($DATE)."-01-01",($DATE)."-12-31",'GROUPAGE','A','RHESUS',$VALEUR2)));
	$serie2->addPoint(new Point('B',$this->valeurmultigraphe1('don','DATEDON',($DATE)."-01-01",($DATE)."-12-31",'GROUPAGE','B','RHESUS',$VALEUR2)));
	$serie2->addPoint(new Point('AB',$this->valeurmultigraphe1('don','DATEDON',($DATE)."-01-01",($DATE)."-12-31",'GROUPAGE','AB','RHESUS',$VALEUR2)));
	$serie2->addPoint(new Point('O',$this->valeurmultigraphe1('don','DATEDON',($DATE)."-01-01",($DATE)."-12-31",'GROUPAGE','O','RHESUS',$VALEUR2)));
	$dataSet->addSerie('RH '.$VALEUR2, $serie2);
	
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphCaptionRatio(0.65);

	$chart->setTitle($TITRE.date("d-m-Y"));
	$chart->render($fichier);	
	echo "<div class=\"data\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
	echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
	echo "</div>";
	}

 
function barre_navigation ($nb_total,$nb_affichage_par_page,$o,$q,$p,$nb_liens_dans_la_barre,$c,$m)//$c= controleure ,$m=methode
{
$barre = '';
// 1 on recherche l'URL courante munie de ses param鵲e auxquels on ajoute le param鵲e'debut' qui jouera le role du premier ꭩment de notre LIMIT
$query = URL.$c.'/'.$m.'/'.$p.'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.'';	 
// on calcul le num곯 de la page active
$page_active = floor(($p/$nb_affichage_par_page)+1);
// on calcul le nombre de pages total que va prendre notre affichage
$nb_pages_total = ceil($nb_total/$nb_affichage_par_page);
// la fonction ceil arrondie au nbr sup
// on calcul le premier numero de la barre qui va s'afficher, ainsi que le dernier($cpt_deb et $cpt_fin) 
// exemple : 2 3 4 5 6 7 8 9 10 11 << $cpt_deb = 2 et $cpt_fin = 11
	if ($nb_liens_dans_la_barre%2==0) 
	{
		$cpt_deb1 = $page_active - ($nb_liens_dans_la_barre/2)+1;
		$cpt_fin1 = $page_active + ($nb_liens_dans_la_barre/2);
	}
	else 
	{
		$cpt_deb1 = $page_active - floor(($nb_liens_dans_la_barre/2));
		$cpt_fin1 = $page_active + floor(($nb_liens_dans_la_barre/2));
	}
	
	if ($cpt_deb1 <= 1) 
	{
		$cpt_deb = 1;
		$cpt_fin = $nb_liens_dans_la_barre;
	}
	elseif ($cpt_deb1>1 && $cpt_fin1<$nb_pages_total) 
	{
		$cpt_deb = $cpt_deb1;
		$cpt_fin = $cpt_fin1;
	}
	else 
	{
		$cpt_deb = ($nb_pages_total-$nb_liens_dans_la_barre)+1;
		$cpt_fin = $nb_pages_total;
	}
	
	if ($nb_pages_total <= $nb_liens_dans_la_barre) {
	$cpt_deb=1;
	$cpt_fin=$nb_pages_total;
	}
	// si le premier num곯 qui s'affiche est diff곥nt de 1, on affiche << qui sera unlien vers la premiere page
	if ($cpt_deb != 1) 
	{
		$cible = URL.$c.'/'.$m.'/'.(0).'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.''; 
		$lien = '<A HREF="'.$cible.'">&lt;&lt;</A>&nbsp;&nbsp;';
	}
	else 
	{
	$lien='';
	}
	
	$barre .= $lien;

	// on affiche tous les liens de notre barre, tout en v곩fiant de ne pas mettre delien pour la page active

	for ($cpt = $cpt_deb; $cpt <= $cpt_fin; $cpt++) 
	{
		if ($cpt == $page_active) 
		{
			if ($cpt == $nb_pages_total) {
			$barre .= $cpt;
			}
			else {
			$barre .= $cpt.'&nbsp;-&nbsp;';
			}
		}
		else 
		{
			if ($cpt == $cpt_fin) {
			$barre .= "<A HREF='".URL.$c.'/'.$m.'/'.(($cpt-1)*$nb_affichage_par_page).'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.'';  
			$barre .= "'>".'['.$cpt.']'."</A>";
			}
			else {
			$barre .= "<A HREF='".URL.$c.'/'.$m.'/'.(($cpt-1)*$nb_affichage_par_page).'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.'';  
			$barre .= "'>".'['.$cpt.']'."</A>&nbsp;-&nbsp;";
			}
		}
	}

    $fin = ($nb_total - ($nb_total % $nb_affichage_par_page));
	if (($nb_total % $nb_affichage_par_page) == 0) 
	{
	$fin = $fin - $nb_affichage_par_page;
	}
   // si $cpt_fin ne vaut pas la derni鳥 page de la barre de navigation, on afficheun >> qui sera un lien vers la derni鳥 page de navigation

	if ($cpt_fin != $nb_pages_total) 
	{
	$cible = URL.$c.'/'.$m.'/'.$fin.'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.''; 
	$lien = '&nbsp;&nbsp;<A HREF="'.$cible.'">&gt;&gt;</A>';
	}
	else {
	$lien='';
	}

	$barre .= $lien;

	return $barre;
}   	
}
