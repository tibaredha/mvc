<script>
$(document).ready(function(){
/*     $("#hide").click(function(){
        $("p").hide();
    });
    $("#show").click(function(){
        $("p").show();
    }); */
	$("#soustitre").hide();
	 $("#soustitre1").click(function(){
        $("#soustitre").toggle();
    });
});
</script>
<?php 
verifsession();	
view::button('hemow',$this->user[0]['id']);
lang(Session::get('lang'));ob_start();
View::h('2',25,160,'Historique Bilan  :  [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
// View::fieldset("fns","FNS");
// View::fieldset("lip","Bilan Lipdique");
// View::fieldset("ren","Bilan Renal");
// View::fieldset("thy","Bilan Thyroidien");
// View::fieldset("hep","Bilan Hepatique");
// View::fieldset("iono","Ionograme");
// View::fieldset("inf","Autres");
// View::fieldset("sero","Serologie");
// View::fieldset("infla","Inflamatoire");
// view::munu('hemob');
if (isset($_POST["BL"]))
{
switch($_POST["BL"])  
{
    case 'GB':{$parametre="GB";break;} 
	case 'GR':{$parametre="GR";break;}	
	case 'HB':{$parametre="HB";break;}
    case 'HT':{$parametre="HT";break;}
    case 'PLQT':{$parametre="PLQT";break;}
	case 'TP':{$parametre="TP";break;}
	case 'INR':{$parametre="INR";break;}
	case 'VS1H':{$parametre="VS1H";break;}
	case 'VS2H':{$parametre="VS2H";break;}
	case 'GLYCE':{$parametre="GLYCE";break;}
	case 'UREE':{$parametre="UREE";break;}
	case 'CREAT':{$parametre="CREAT";break;}
	case 'ACURIQUE':{$parametre="ACURIQUE";break;}
    case 'BILIT':{$parametre="BILIT";break;}
    case 'TGO':{$parametre="TGO";break;}
	case 'TGP':{$parametre="TGP";break;}
	case 'ASLO':{$parametre="ASLO";break;}
	case 'CRP':{$parametre="CRP";break;}
	case 'TG':{$parametre="TG";break;}
	case 'CHOLES':{$parametre="CHOLES";break;}
	case 'NA':{$parametre="NA";break;}
	case 'K':{$parametre="K";break;}
	case 'PHOS':{$parametre="PHOS";break;}
	case 'CL':{$parametre="CL";break;}
	case 'CA':{$parametre="CA";break;}
	default:$parametre="GB";;	
}
}
else
{
$parametre="GB";
}
echo "<form action=\"".URL.'hemod/sbilans/'.$this->user[0]['id']."\" method=\"post\" name=\"form2\" id=\"form2\">";
$x=350;
View::label(50,$x+136,'GB');                 View::radioed(100,$x+135,"BL","GB");
View::label(50,$x+136+30,'GR');              View::radio(100,$x+135+30,"BL","GR"); 
View::label(50,$x+136+60,'HB');              View::radio(100,$x+135+60,"BL","HB");
View::label(50,$x+136+90,'HT');              View::radio(100,$x+135+90,"BL","HT");
View::label(50,$x+136+120,'PLQT');           View::radio(100,$x+135+120,"BL","PLQT");
View::label(150,$x+136,'TP');                View::radio(200,$x+135,"BL","TP");
View::label(150,$x+136+30,'INR');            View::radio(200,$x+135+30,"BL","INR");
View::label(150,$x+136+60,'VS1H');           View::radio(200,$x+135+60,"BL","VS1H");
View::label(150,$x+136+90,'VS2H');           View::radio(200,$x+135+90,"BL","VS2H");
View::label(250,$x+136,'GLYCE');             View::radio(300,$x+135,"BL","GLYCE");
View::label(250,$x+136+30,'UREE');           View::radio(300,$x+135+30,"BL","UREE");
View::label(250,$x+136+60,'CRAET');          View::radio(300,$x+135+60,"BL","CREAT");
View::label(250,$x+136+90,'ACURI');          View::radio(300,$x+135+90,"BL","ACURIQUE"); 
View::label(350,$x+136,'BILI T');            View::radio(400,$x+135,"BL","BILIT");
View::label(350,$x+136+30,'BILI D');         View::radio(400,$x+135+30,"BL","BILID");
View::label(350,$x+136+60,'TGO');            View::radio(400,$x+135+60,"BL","TGO");
View::label(350,$x+136+90,'TGP');            View::radio(400,$x+135+90,"BL","TGP");
View::label(450,$x+136,'ASLO');              View::radio(500,$x+135,"BL","ASLO");
View::label(450,$x+136+30,'CRP');            View::radio(500,$x+135+30,"BL","CRP");
View::label(450,$x+136+60,'TRIGLI');         View::radio(500,$x+135+60,"BL","TG");
View::label(450,$x+136+90,'CHOLES');         View::radio(500,$x+135+90,"BL","CHOLES"); 
View::label(550,$x+136,'NA+');               View::radio(600,$x+135,"BL","NA");
View::label(550,$x+136+30,'K+');             View::radio(600,$x+135+30,"BL","K");
View::label(550,$x+136+60,'PHOS');           View::radio(600,$x+135+60,"BL","PHOS");
View::label(550,$x+136+90,'CL');             View::radio(600,$x+135+90,"BL","CL");
View::label(550,$x+136+120,'CA++');          View::radio(600,$x+135+120,"BL","CA"); 
view::submit(1090,$x+230,' Bilan D\'Hémodialyse');
view::f1();
// view::sautligne(20);
$colone=$parametre;
$tbl='hemobio';
$col=$this->user[0]['id'];
$annee=date('Y');
// $annee='2016';
$data = array(
			"x"     => 30,
			"y"     => 220,
			"titre" => 'Suivi  Bilan Biologique Par Mois Arret Au  : ',						
			"JAN"	=> view::hemomois($colone,$tbl,$annee.'-01-01',$annee.'-01-31',$col) ,
			"FEV"	=> view::hemomois($colone,$tbl,$annee.'-02-01',$annee.'-02-28',$col) ,			
			"MAR"	=> view::hemomois($colone,$tbl,$annee.'-03-01',$annee.'-03-31',$col) ,			
			"AVR"	=> view::hemomois($colone,$tbl,$annee.'-04-01',$annee.'-04-30',$col) ,			
			"MAI"	=> view::hemomois($colone,$tbl,$annee.'-05-01',$annee.'-05-31',$col) ,			
			"JUIN"	=> view::hemomois($colone,$tbl,$annee.'-06-01',$annee.'-06-30',$col) ,			
			"JUIL"	=> view::hemomois($colone,$tbl,$annee.'-07-01',$annee.'-07-31',$col) ,			
			"AOUT"	=> view::hemomois($colone,$tbl,$annee.'-08-01',$annee.'-08-31',$col) ,
			"SEP"	=> view::hemomois($colone,$tbl,$annee.'-09-01',$annee.'-09-30',$col) ,
			"OCT"	=> view::hemomois($colone,$tbl,$annee.'-10-01',$annee.'-10-31',$col) ,
			"NOV"	=> view::hemomois($colone,$tbl,$annee.'-11-01',$annee.'-11-30',$col) ,
			"DEC"	=> view::hemomois($colone,$tbl,$annee.'-12-01',$annee.'-12-31',$col) ,
			"DATE"	=> date('Y-m-d'), 
			"x1"     => 30,
			"y1"     => 490,
			"combo"   => array( 
								// "Seance T" => 'hemod',
								// "Seance P" => 'hemod/PROGRAMME',
			                    // "Seance U" => 'hemod/URGENCE',
			                    // "Seance FAV" => 'hemod/FAV',
			                    // "Seance CAT" => 'hemod/methode4', 
								// "Seance PER" => 'hemod/methode4' 
							 ),				  
			"x2"        => 1120,
			"y2"        => 220	,
            "dossier"   => "hemo",
			"combo1"   => array( 
								"1"      => 'Bienvenue sur G-dialyse 4.0',
			                    "2"      => 'Service de dialyse'
							  )			  
			);
view::graphe12mois($data);			
?>

















