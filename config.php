<?php


//PHP INI POUR ACCELERE WAMP 
// realpath_cache_size = 50M (si vous avez beaucoup de fichiers dans les répertoires)
// memory_limit = 1024M (pour les chargements importants / scripts)
// max_execution_time = 30000  (délai d’exécution prolongé)
// max_input_vars = 10000 (nom de champs supportés dans un formulaire)

// Merci pour votre demande de compte. Votre compte est actuellement en attente d'approbation par l'administrateur du site.
// Une fois votre demande approuvée, vous recevrez un mail détaillant les instructions.
// get timestamp from current date time
function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."-".$M."-".$A ;
    return $dateUS2FR;//01-01-2013
    }	
	
	
function nbrmnpeabcd0($Months1,$Months2)
{
mysqlconnect();
$sql = " select Months from mnpe where  Months >=$Months1  and  Months <=$Months2 ";//and  AGEDNR >=$colone2  and AGEDNR <=$colone3  and DATEDON >='$datejour1'and DATEDON <='$datejour2'
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$collecte=mysql_num_rows($requete);
mysql_free_result($requete);
return $collecte;
}	
function nbrmnpeabcd($Months1,$Months2,$COL,$ABCD)
{
mysqlconnect();
$sql = " select Months,IPA,ISTA,IPT from mnpe where $COL='$ABCD' and  Months >=$Months1  and  Months <=$Months2 ";//and  AGEDNR >=$colone2  and AGEDNR <=$colone3  and DATEDON >='$datejour1'and DATEDON <='$datejour2'
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$collecte=mysql_num_rows($requete);
mysql_free_result($requete);
return $collecte;
}
function nbrmnpeabcdtc($COL,$ABCD)
{
mysqlconnect();
$sql = " select Months,IPA,ISTA,IPT from mnpe where $COL='$ABCD'";//and  AGEDNR >=$colone2  and AGEDNR <=$colone3  and DATEDON >='$datejour1'and DATEDON <='$datejour2'
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$collecte=mysql_num_rows($requete);
mysql_free_result($requete);
return $collecte;
}
function nbrmnpeabcdt()
{
mysqlconnect();
$sql = " select Months from mnpe  ";//and  AGEDNR >=$colone2  and AGEDNR <=$colone3  and DATEDON >='$datejour1'and DATEDON <='$datejour2'
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$collecte=mysql_num_rows($requete);
mysql_free_result($requete);
return $collecte;
}	
function CalculateTimestampFromCurrDatetime($DateTime = -1) 
{

	if ($DateTime == -1 || $DateTime == '' || $DateTime == '0000-00-00 00:00:00' || $DateTime == '0000-00-00') 
	{
		$DateTime = date("Y-m-d H:i:s");
	}

	$NewDate['year']   = substr($DateTime,0,4);
	$NewDate['month']  = substr($DateTime,5,2);
	$NewDate['day']    = substr($DateTime,8,2);
	$NewDate['hour']   = substr($DateTime,11,2);
	$NewDate['minute'] = substr($DateTime,14,2);
	$NewDate['second'] = substr($DateTime,17,2);

	return mktime($NewDate['hour'], $NewDate['minute'], $NewDate['second'], $NewDate['month'], $NewDate['day'], $NewDate['year']);
}

// calculate date difference
function CalculateDateDifference($TimestampFirst, $TimestampSecond = -1)	
{
	if ($TimestampSecond == -1) 
	{
		$TimestampSecond = CalculateTimestampFromCurrDatetime();
	}

	if ($TimestampSecond < $TimestampFirst) 
	{
		$TempTimestamp = $TimestampFirst;
		$TimestampFirst = $TimestampSecond;
		$TimestampSecond = $TempTimestamp;
		
		$NegativeDifference = true;
	}
	else 
	{
		$NegativeDifference = false;
	}

	list($Year1, $Month1, $Day1) = explode('-', date('Y-m-d', $TimestampFirst));
	list($Year2, $Month2, $Day2) = explode('-', date('Y-m-d', $TimestampSecond));
	$Time1 = (date('H',$TimestampFirst)*3600) + (date('i',$TimestampFirst)*60) + (date('s',$TimestampFirst));
	$Time2 = (date('H',$TimestampSecond)*3600) + (date('i',$TimestampSecond)*60) + (date('s',$TimestampSecond));

	$YearDiff = $Year2 - $Year1;
	$MonthDiff = ($Year2 * 12 + $Month2) - ($Year1 * 12 + $Month1);

	if($Month1 > $Month2)
	{
		$YearDiff -= 1;
	}
	elseif($Month1 == $Month2)
	{
		if($Day1 > $Day2) 
		{
			$YearDiff -= 1;
		}
		elseif($Day1 == $Day2) 
		{
			if($Time1 > $Time2) 
			{
				$YearDiff -= 1;
			}
		}
	}

	// handle over flow of month difference
	if($Day1 > $Day2) 
	{
		$MonthDiff -= 1;
	}
	elseif($Day1 == $Day2) 
	{
		if($Time1 > $Time2) 
		{
			$MonthDiff -= 1;
		}
	}

	$DateDifference = Array();
	$TotalSeconds = $TimestampSecond - $TimestampFirst;

	$WeekDiff = floor(($TotalSeconds / 604800));
	$DayDiff = floor(($TotalSeconds / 86400));

	if ($NegativeDifference == true) 
	{
		$DateDifference['years'] = ($YearDiff == 0) ? $YearDiff : -($YearDiff);
		$DateDifference['months'] = ($MonthDiff == 0) ? $MonthDiff : -($MonthDiff);
		$DateDifference['weeks'] = ($WeekDiff == 0) ? $WeekDiff : -($WeekDiff);
		$DateDifference['days'] = ($DayDiff == 0) ? $DayDiff : -($DayDiff);
	}
	else 
	{
		$DateDifference['years'] = $YearDiff;
		$DateDifference['months'] = $MonthDiff;
		$DateDifference['weeks'] = $WeekDiff;
		$DateDifference['days'] = $DayDiff;
	}
	
	return $DateDifference;
}
	
	
function mnpe($TBL,$AGE,$SEXE,$PDS) 
{
mysqlconnect();
$sql = " select * from $TBL WHERE AGE=$AGE    AND  SEXE='$SEXE' ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$row = mysql_fetch_array($requete); 
$M3ET=$row['M3ET'];
$M2ET=$row['M2ET'];
$M1ET=$row['M1ET'];
$MED=$row['MED'];
$P1ET=$row['P1ET'];
$P2ET=$row['P2ET'];
$P3ET=$row['P3ET'];

if ($PDS >= $M1ET ) 
{
$ABCD="A";return $ABCD;
}
if ($PDS >= $M2ET  and   $PDS <= $M1ET) 
{
$ABCD="B";return $ABCD;
}
if ($PDS >= $M3ET  and   $PDS <= $M2ET) 
{
$ABCD="C";return $ABCD;
}
if ( $PDS <= $M3ET) 
{
$ABCD="D";return $ABCD;
}
mysql_free_result($requete);	
}

function mnpept($TBL,$AGE,$SEXE,$PDS) 
{
mysqlconnect();
$sql = " select * from $TBL WHERE AGE=$AGE AND SEXE='$SEXE' ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$row = mysql_fetch_array($requete); 
$M3ET=$row['M3ET'];
$M2ET=$row['M2ET'];
$M1ET=$row['M1ET'];
$MED=$row['MED'];
$P1ET=$row['P1ET'];
$P2ET=$row['P2ET'];
$P3ET=$row['P3ET'];
if ($PDS >= $M1ET ) 
{
$ABCD="A";return $ABCD;
}
if ($PDS >= $M2ET  and   $PDS <= $M1ET) 
{
$ABCD="B";return $ABCD;
}
if ($PDS >= $M3ET  and   $PDS <= $M2ET) 
{
$ABCD="C";return $ABCD;
}
if ( $PDS <= $M3ET) 
{
$ABCD="D";return $ABCD;
}
mysql_free_result($requete);	
}



function dump_MySQL($serveur, $login, $password, $base, $mode)
{
    $connexion = mysql_connect($serveur, $login, $password);
    mysql_select_db($base, $connexion);
    
    $entete  = "-- ----------------------\n";
    $entete .= "-- dump de la base ".$base." au ".date("d-M-Y")."\n";
    $entete .= "-- ----------------------\n\n\n";
    $creations = "";
    $insertions = "\n\n";
    
    $listeTables = mysql_query("show tables", $connexion);
    while($table = mysql_fetch_array($listeTables))
    {
        // structure ou la totalité de la BDD
        if($mode == 1 || $mode == 2)
        {
            $creations .= "-- -----------------------------\n";
            $creations .= "-- Structure de la table ".$table[0]."\n";
            $creations .= "-- -----------------------------\n";
            $listeCreationsTables = mysql_query("show create table ".$table[0],$connexion); 

            while($creationTable = mysql_fetch_array($listeCreationsTables))
            {
              $creations .= $creationTable[1].";\n\n";
            }
        }
        // données ou la totalité
        if($mode > 1)
        {
		    mysql_query("SET NAMES 'UTF8' ");
            $donnees = mysql_query("SELECT * FROM ".$table[0]);
            $insertions .= "-- -----------------------------\n";
            $insertions .= "-- Contenu de la table ".$table[0]."\n";
            $insertions .= "-- -----------------------------\n";
            while($nuplet = mysql_fetch_array($donnees))
            {
			mysql_query("SET NAMES 'UTF8' ");
                $insertions .= "INSERT INTO ".$table[0]." VALUES(";
                for($i=0; $i < mysql_num_fields($donnees); $i++)
                {
                  if($i != 0)
                     $insertions .=  ", ";
                  if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
                     $insertions .=  "'";
                  $insertions .= addslashes($nuplet[$i]);
                  if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
                    $insertions .=  "'";
                }
                $insertions .=  ");\n";
            }
            $insertions .= "\n";
        }
    }
    mysql_close($connexion);
	$time=date('d-m-y');
    $fichierDump = fopen("D:/deces".$time.".sql", "wb");
	
	fwrite($fichierDump, $entete);
    fwrite($fichierDump, $creations);
    fwrite($fichierDump, $insertions);
    fclose($fichierDump);

    echo "Sauvegarde terminÃ©e";
	// header("Location:index.php?uc=accueil") ;
}

function photosmfx ($type,$id,$sexe)
{
$file = photosmfx."$type/".$id;  
if (file_exists($file)) {
   return $filename = trim($id);
} 
else 
{
	if  (trim($sexe) =='M') 
	{
	return $filename ='m.jpg';
	}
	if  (trim($sexe) =='F') 
	{
	return $filename ='f.jpg';
	}  
}
}

function lang ($lang)
{
	if($lang=='1') 
	{
	include 'langan.php';	
	}
	if($lang=='2') 
	{
	 include 'langfr.php';
	}
	if($lang=='3') 
	{
	 include 'langar.php';
	}
}
function jours()
{
echo "<option value=\"01\">01</option><br />"; 	
echo "<option value=\"02\">02</option><br />"; 	
echo "<option value=\"03\">03</option><br />"; 	
echo "<option value=\"04\">04</option><br />"; 	
echo "<option value=\"05\">05</option><br />"; 	
echo "<option value=\"06\">06</option><br />"; 	
echo "<option value=\"07\">07</option><br />"; 	
echo "<option value=\"08\">08</option><br />"; 	
echo "<option value=\"09\">09</option><br />"; 	
echo "<option value=\"10\">10</option><br />"; 	
echo "<option value=\"11\">11</option><br />"; 	
echo "<option value=\"12\">12</option><br />"; 	
echo "<option value=\"13\">13</option><br />"; 	
echo "<option value=\"14\">14</option><br />"; 	
echo "<option value=\"15\">15</option><br />"; 	
echo "<option value=\"16\">16</option><br />"; 	
echo "<option value=\"17\">17</option><br />"; 	
echo "<option value=\"18\">18</option><br />"; 	
echo "<option value=\"19\">19</option><br />"; 	
echo "<option value=\"20\">20</option><br />"; 	
echo "<option value=\"21\">21</option><br />"; 	
echo "<option value=\"22\">22</option><br />"; 	
echo "<option value=\"23\">23</option><br />"; 	
echo "<option value=\"24\">24</option><br />"; 	
echo "<option value=\"25\">25</option><br />"; 	
echo "<option value=\"26\">26</option><br />"; 	
echo "<option value=\"27\">27</option><br />"; 	
echo "<option value=\"28\">28</option><br />"; 	
echo "<option value=\"29\">29</option><br />"; 	
echo "<option value=\"30\">30</option><br />"; 	
echo "<option value=\"31\">31</option><br />"; 	
}
function mois()
{
echo "<option value=\"01\">01</option><br />"; 
echo "<option value=\"02\">02</option><br />"; 
echo "<option value=\"03\">03</option><br />"; 
echo "<option value=\"04\">04</option><br />"; 
echo "<option value=\"05\">05</option><br />"; 
echo "<option value=\"06\">06</option><br />"; 
echo "<option value=\"07\">07</option><br />"; 
echo "<option value=\"08\">08</option><br />"; 
echo "<option value=\"09\">09</option><br />"; 
echo "<option value=\"10\">10</option><br />"; 
echo "<option value=\"11\">11</option><br />"; 
echo "<option value=\"12\">12</option><br />"; 
}
function annee()
{
for ($i=2015; $i<=2020; $i++) 
{ 
echo "<option value=\"$i\">". $i."</option><br />"; 
}  
}
function heurs()
{
for ($i=00; $i<=24; $i++) 
{ 
echo "<option value=\"$i\">". $i."</option><br />"; 
}  
}
function eva1($action)
{ 
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<form ALIGN=\"center\" action=\"$action\" method=\"post\">";
echo "<p> ";
echo "<select name=\"jour\">";
jours();
echo "</select>";
echo "<select name=\"mois\">";
mois();
echo "</select>";
echo "<select name=\"annee\">";
annee();
echo "</select>";
echo "</p>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p> GROUPAGE ";
echo "<select name=\"GROUPAGE\">";
echo"<option value=\"IS NOT NULL\" selected=\"selected\">Tous Groupage</option>"."\n";
echo"<option value=\"='A'\">A</option>"."\n";
echo"<option value=\"='B'\">B</option>"."\n";
echo"<option value=\"='AB'\">AB</option>"."\n";
echo"<option value=\"='O'\">O</option>"."\n";
echo "</select>";
echo " &nbsp;&nbsp;RHESUS ";
echo "<select name=\"RHESUS\">";
echo"<option value=\"IS NOT NULL\" selected=\"selected\">Tous Rhesus</option>"."\n";
echo"<option value=\"='Positif'\" >Positif</option>"."\n";
echo"<option value=\"='negatif'\" >negatif</option>"."\n";
echo "</select>";
echo "</p> ";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p><input type=\"submit\" value=\"calculer\" /></p>";
echo "</form>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
}

function eva11($name,$Jour,$action)
{ 
echo "<hr size=8 width=\"700\" COLOR=\"RED\">";
echo "<form ALIGN=\"center\" action=\"$action\" method=\"post\">";
echo "<p> du";
echo "<select name=\"jour\">";
jours();
echo "</select>";
echo "<select name=\"mois\">";
mois();
echo "</select>";
echo "<select name=\"annee\">";
annee();
echo "</select>";
// echo "<select name=\"HEURS\">";
// heurs();
// echo "</select>";
echo "</p>";
echo "<p> au";
echo "<select name=\"jour1\">";
jours();
echo "</select>";
echo "<select name=\"mois1\">";
mois();
echo "</select>";
echo "<select name=\"annee1\">";
annee();
echo "</select>";
// echo "<select name=\"HEURS1\">";
// heurs();
// echo "</select>";
echo "</p>";
echo "<hr size=8 width=\"700\" COLOR=\"RED\">";
echo "<p> ";
echo "<select name=\"$name\">";
foreach ($Jour as $cle => $value) 
{
echo"<OPTION VALUE=\"".$value."\">".$cle."</OPTION>";
}
echo "</select>";
echo "</p> ";
echo "<hr size=8 width=\"700\" COLOR=\"RED\">";
echo "<p><input type=\"submit\" value=\"calculer\" /></p>";
echo "</form>";
echo "<hr size=8 width=\"700\" COLOR=\"RED\">";
}
function evadeces($action)
{ 
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<form ALIGN=\"center\" action=\"$action\" method=\"post\">";
echo "<p> du";
echo "<select name=\"jour\">";
jours();
echo "</select>";
echo "<select name=\"mois\">";
mois();
echo "</select>";
echo "<select name=\"annee\">";
annee();
echo "</select>";
echo "</p>";
echo "<p> au";
echo "<select name=\"jour1\">";
jours();
echo "</select>";
echo "<select name=\"mois1\">";
mois();
echo "</select>";
echo "<select name=\"annee1\">";
annee();
echo "</select>";
echo "</p>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p> ";
echo "<select name=\"deces\">";
echo"<option value=\"1\">RAPPORT</option>"."\n";
echo"<option value=\"2\">RELEVE</option>"."\n";
echo "</select>";
echo "</p> ";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p><input type=\"submit\" value=\"calculer\" /></p>";
echo "</form>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
}
function inspection($action)
{ 
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<form ALIGN=\"center\" action=\"$action\" method=\"post\">";
echo "<p> du";
echo "<select name=\"jour\">";
jours();
echo "</select>";
echo "<select name=\"mois\">";
mois();
echo "</select>";
echo "<select name=\"annee\">";
annee();
echo "</select>";
echo "</p>";
echo "<p> au";
echo "<select name=\"jour1\">";
jours();
echo "</select>";
echo "<select name=\"mois1\">";
mois();
echo "</select>";
echo "<select name=\"annee1\">";
annee();
echo "</select>";
echo "</p>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "</br>";echo "</br>";echo "</br>";echo "</br>";
echo "<p> ";
echo "<select name=\"type\">";
echo"<option value=\"1\">sig_commune</option>"."\n";
echo"<option value=\"2\">demo_commne</option>"."\n";
echo"<option value=\"3\">list_global</option>"."\n";
echo"<option value=\"4\">list_commune</option>"."\n";
echo"<option value=\"5\">list_materiel</option>"."\n";
echo"<option value=\"6\">list_anomalie</option>"."\n";
echo"<option value=\"7\">list_inspection</option>"."\n";

echo "</select>";
echo "</p> ";
$x=200;$y=140;
view::combostructure($x+440,$y+240,'EPH','structurebis','0','structure','class','id','structure');
// echo "<p> ";
// echo "<select name=\"EPH\">";
// echo"<option value=\"1\">EHU  </option>"."\n";
// echo"<option value=\"2\">CHU  </option>"."\n";
// echo"<option value=\"3\">EPH  </option>"."\n";
// echo"<option value=\"4\">EH  </option>"."\n";
// echo"<option value=\"5\">EHS  </option>"."\n";
// echo"<option value=\"6\">EPSP  </option>"."\n";
// echo"<option value=\"7\">Polyclinique  </option>"."\n";
// echo"<option value=\"8\">Salle de soins  </option>"."\n";
// echo"<option value=\"9\">EHP  </option>"."\n";
// echo"<option value=\"10\">centre d hemodialyse  </option>"."\n";
// echo"<option value=\"11\">centre de diagnostic  </option>"."\n";
// echo"<option value=\"12\">officine pharmaceutique  </option>"."\n";
// echo"<option value=\"13\">laboratoire  </option>"."\n";
// echo"<option value=\"14\">chirurugien dentiste specialiste  </option>"."\n";
// echo"<option value=\"15\">chirurugien dentiste generaliste  </option>"."\n";
// echo"<option value=\"16\">medecin specialiste  </option>"."\n";
// echo"<option value=\"17\">medecin generaliste  </option>"."\n";
// echo"<option value=\"18\">sagefemme  </option>"."\n";
// echo"<option value=\"19\">psychologue  </option>"."\n";
// echo"<option value=\"20\">cabinet de soins  </option>"."\n";
// echo"<option value=\"21\">transport sanitairee  </option>"."\n";
// echo"<option value=\"22\">UDS</option>"."\n";
// echo"<option value=\"23\">OPTICIEN</option>"."\n";
// echo"<option value=\"0\">structure </option>"."\n";
// echo "</select>";
// echo "</p> ";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p><input type=\"submit\" value=\"calculer\" /></p>";
echo "</form>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
}

function rds($action)
{ 
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<form ALIGN=\"center\" action=\"$action\" method=\"post\">";
echo "<p> du";
echo "<select name=\"jour\">";
jours();
echo "</select>";
echo "<select name=\"mois\">";
mois();
echo "</select>";
echo "<select name=\"annee\">";
annee();
echo "</select>";
echo "</p>";
echo "<p> au";
echo "<select name=\"jour1\">";
jours();
echo "</select>";
echo "<select name=\"mois1\">";
mois();
echo "</select>";
echo "<select name=\"annee1\">";
annee();
echo "</select>";
echo "</p>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "</br>";echo "</br>";echo "</br>";echo "</br>";
echo "<p> ";
echo "<select name=\"type\">";
echo"<option value=\"1\">Global</option>"."\n";
echo"<option value=\"2\">Par Etablissemnt</option>"."\n";
echo"<option value=\"3\">Par Mois</option>"."\n";

echo "</select>";
echo "</p> ";
$x=200;$y=140;    
echo "<p> ";
echo "<select name=\"EPH\">";
echo"<option value=\"0\">0-ES DJELFA</option>"."\n";
echo"<option value=\"1\">1-EPH AO</option>"."\n";
echo"<option value=\"2\">2-EPH HBB</option>"."\n";
echo"<option value=\"3\">3-EPH DJELFA</option>"."\n";
echo"<option value=\"4\">4-EPH MESSAAD</option>"."\n";
echo"<option value=\"5\">5-EPH IDRISSIA</option>"."\n";
echo"<option value=\"6\">6-EPH CHAOUA</option>"."\n";
echo"<option value=\"7\">7-EHS DJELFA</option>"."\n";
echo"<option value=\"8\">8-EPSP AO</option>"."\n";
echo"<option value=\"9\">9-EPSP HBB</option>"."\n";
echo"<option value=\"10\">10-EPSP DJELFA</option>"."\n";
echo"<option value=\"11\">11-EPSP MESSAAD</option>"."\n";
echo"<option value=\"12\">12-EPSP GUETARA</option>"."\n";
echo"<option value=\"13\">13-EHP  OPHTALMO</option>"."\n";

echo "</select>";
echo "</p> ";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p><input type=\"submit\" value=\"calculer\" /></p>";
echo "</form>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
}
function evadeces1($action)
{ 
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<form ALIGN=\"center\" action=\"$action\" method=\"post\">";
echo "<p> du";
echo "<select name=\"jour\">";
jours();
echo "</select>";
echo "<select name=\"mois\">";
mois();
echo "</select>";
echo "<select name=\"annee\">";
annee();
echo "</select>";
echo "</p>";
echo "<p> au";
echo "<select name=\"jour1\">";
jours();
echo "</select>";
echo "<select name=\"mois1\">";
mois();
echo "</select>";
echo "<select name=\"annee1\">";
annee();
echo "</select>";
echo "</p>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p> ";
echo "<select name=\"deces\">";
echo"<option value=\"1\">html</option>"."\n";
echo"<option value=\"2\">sig</option>"."\n";
echo "</select>";
echo "</p> ";

echo "<p> ";
echo "<select name=\"EPH\">";
echo"<option value=\"1\">EPH_DJALFA</option>"."\n";
echo"<option value=\"2\">EPH_AIN_OUSSERA</option>"."\n";
echo"<option value=\"3\">EPH_HASSI_BAHBAH</option>"."\n";
echo"<option value=\"4\">EPH_MESSAAD</option>"."\n";
echo"<option value=\"5\">EHS_DJELFA</option>"."\n";
echo"<option value=\"6\">EPH_IDRISSIA</option>"."\n";
echo"<option value=\"0\">TOTAL_DJELFA</option>"."\n";
echo "</select>";
echo "</p> ";






echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p><input type=\"submit\" value=\"calculer\" /></p>";
echo "</form>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
}
function eva($action)
{ 
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<form ALIGN=\"center\" action=\"$action\" method=\"post\">";
echo "<p> du";
echo "<select name=\"jour\">";
jours();
echo "</select>";
echo "<select name=\"mois\">";
mois();
echo "</select>";
echo "<select name=\"annee\">";
annee();
echo "</select>";
echo "</p>";
echo "<p> au";
echo "<select name=\"jour1\">";
jours();
echo "</select>";
echo "<select name=\"mois1\">";
mois();
echo "</select>";
echo "<select name=\"annee1\">";
annee();
echo "</select>";
echo "</p>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p> ";


echo "<select name=\"PTS\">";
echo"<option value=\"ANS\">ANS</option>"."\n";
echo"<option value=\"EPH\">EPH</option>"."\n";
echo"<option value=\"SEM\">SEM</option>"."\n";

echo "</select>";


echo "</p> ";


echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
echo "<p><input type=\"submit\" value=\"calculer\" /></p>";
echo "</form>";
echo "<hr size=8 width=\"700\" COLOR=\"#C0C0C0\">";
}
function mysqlconnect()
{
$nomprenom ="tibaredha";
$db_host="localhost";
$db_name="mvc";   
$db_user="root";
$db_pass="";
$utf8 = "" ;
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
return $db;
}
//SELECT avg(nom_de_la_colonne) FROM `nom_de_la_table`;
//SELECT count(nom_de_la_colonne) FROM `nom_de_la_table`;
//SELECT std(nom_de_la_colonne) FROM `nom_de_la_table`;
//SELECT min(nom_de_la_colonne) FROM `nom_de_la_table`;
//SELECT max(nom_de_la_colonne) FROM `nom_de_la_table`;
//SELECT sum(nom_de_la_colonne) FROM `nom_de_la_table`;
function avg ($tb_name,$colonename) 
{
mysqlconnect();
$result = mysql_query("SELECT AVG($colonename) FROM $tb_name where $colonename > '0' and  $colonename <= '100'  " );
$moyenne = mysql_result($result,0); 
return $moyenne;
}
function std ($tb_name,$colonename) 
{
mysqlconnect();
$result = mysql_query("SELECT std($colonename) FROM $tb_name where $colonename > '0' and  $colonename <= '100' " );
$moyenne = mysql_result($result,0); 
return $moyenne;
}
function max2 ($tb_name,$colonename) 
{
mysqlconnect();
$result = mysql_query("SELECT max($colonename) FROM $tb_name where $colonename > '0' and  $colonename <= '100' " );
$moyenne = mysql_result($result,0); 
return $moyenne;
}
function min2 ($tb_name,$colonename) 
{
mysqlconnect();
$result = mysql_query("SELECT min($colonename) FROM $tb_name where $colonename > '0' and  $colonename <= '100' " );
$moyenne = mysql_result($result,0); 
return $moyenne;
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
function PN($rhesus) 
{
	if ($rhesus=='Positif') 
	{
	echo"+";
	}
	if ($rhesus=='negatif') 
	{
	echo"-";
	}
}
function PSL($tb_name,$groupage,$rhesus) 
{
mysqlconnect();	 
echo "<select size=1 class=\"ARS\" name=\"NDP\">"."\n";
echo"<option value=\"1\" selected=\"selected\">PSL = ".$tb_name.":".$groupage.":".$rhesus."</option>"."\n";
if($tb_name=='CGR')
{
	if($groupage=='O')
	{
	//$date=date('y-m-d');
	//$result = mysql_query("SELECT * FROM $tb_name where DIST ='' and DATEPER >= '$date' and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
	$result = mysql_query("SELECT * FROM $tb_name where DIST =''  and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
	}
	if($groupage=='A')
	{
	//$date=date('y-m-d');
	//$result = mysql_query("SELECT * FROM $tb_name where DIST ='' and DATEPER >= '$date' and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
	$result = mysql_query("SELECT * FROM $tb_name where DIST =''  and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
	}
	if($groupage=='B')
	{
	//$date=date('y-m-d');
	//$result = mysql_query("SELECT * FROM $tb_name where DIST ='' and DATEPER >= '$date' and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
	$result = mysql_query("SELECT * FROM $tb_name where DIST =''  and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
	}
	if($groupage=='AB')
	{
	//$date=date('y-m-d');
	//$result = mysql_query("SELECT * FROM $tb_name where DIST ='' and DATEPER >= '$date' and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
	$result = mysql_query("SELECT * FROM $tb_name where DIST =''  and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
	}
}
if($tb_name=='PFC')
{
//$date=date('y-m-d');
//$result = mysql_query("SELECT * FROM $tb_name where DIST ='' and DATEPER >= '$date' and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
$result = mysql_query("SELECT * FROM $tb_name where DIST =''  and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
}
if($tb_name=='CPS')
{
//$date=date('y-m-d');
//$result = mysql_query("SELECT * FROM $tb_name where DIST ='' and DATEPER >= '$date' and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
$result = mysql_query("SELECT * FROM $tb_name where DIST =''  and GROUPAGE='$groupage' and  RHESUS='$rhesus'  order by NDP " );
}
while($data =  mysql_fetch_array($result))
{
echo '<option value="'.trim($data['NDP']).'">'.trim($data['NDP']).':'.trim($data['GROUPAGE']).':'.trim($data['RHESUS']).'</option>';
}
echo '</select>'."\n"; 
}
function NAV()
{
$y=260;
backforward(1100,$y,'history.back','PrÃ©cÃ©dent');
backforward(1180,$y,'location.reload','Recharger la page');  
backforward(1310,$y,'history.forward','Suivant');
backforward(1373,$y,'toggleFullScreen','fullscreen');//la fonctin se trouve au niveau du fichier fonction js
}
function buttoneva()
{
$y=300;
urlbutton(30,$y,URL.'eva/','ANS','',5);
urlbutton(90,$y,URL.'eva/eph/','EPH','',5);
urlbutton(90+60,$y,URL.'eva/upl/','UPL','',5);
urlbutton(90+120,$y,URL.'eva/download/','DOW','',5);
urlbutton(90+180,$y,URL.'ist/','IST','',5);
urlbutton(90+180+60,$y,URL.'ist/procedure','PRO','',5);
urlbutton(90+180+120,$y,URL.'ist/map','MAP','',5);
urlbutton(90+180+180,$y,URL.'don/COMP/','COM','',5);
NAV();
}
function buttondnr()
{
echo '<a href="'.URL.'stock/cgr">CGR</a>'; echo '&nbsp;';
echo '<a href="'.URL.'stock/pfc">PFC</a>'; echo '&nbsp;';
echo '<a href="'.URL.'stock/cps">CPS</a>'; echo '&nbsp;';
echo '<a href="'.URL.'stat/">STAT</a>'; echo '&nbsp;';
echo '<a href="'.URL.'MDO/">MDO</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/HVB/">HVB</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/HVC/">HVC</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/HIV/">HIV</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/SYS/">SYS</a>'; echo '&nbsp;';
echo '<a href="'.URL.'dnr/DPD/">Don/Dnr</a>'; echo '&nbsp;';
echo '<a href="'.URL.'pdf/impdpd.php">imp Don/Dnr</a>'; echo '&nbsp;';
echo '<a href="'.URL.'doc">stat</a>'; echo '&nbsp;';
echo '<a href="'.URL.'doc/trans">trans</a>'; echo '&nbsp;';
NAV();
}
function buttondnr1($id)
{
$y=300;
urlbutton(30,$y,URL.'pdf/CARTDNRPDF.php?uc='.$id,'Carte dnr',5);
urlbutton(130,$y,URL.'pdf/CARTABORDNR.php?uc='.$id,'Carte grp',5);
urlbutton(237,$y,URL.'pdf/PROSDNRFR.php?uc='.$id,'Prospectus fr',5);
urlbutton(333,$y,URL.'tcpdf/pdf.php?uc='.$id,'Prospectus ar',5);
urlbutton(432,$y,URL.'pdf/CPNDNR.php?uc='.$id,'prÃ©nuptial',5);
urlbutton(560,$y,URL.'pdf/LABODNR.php?uc='.$id,'Bilan std',5);
urlbutton(660,$y,URL.'pdf/FDNRPDF.php?uc='.$id,'fiche dnr',5);
urlbutton(755,$y,URL.'dnr/view/'.$id,'view dnr',5);
urlbutton(850,$y,URL.'dnr/Donate/'.$id,'faire un don',5);
NAV();
}
//**************************************************************************************//
function AGEDON($colone2,$colone3,$datejour1,$datejour2)
{
mysqlconnect();
$sql = " select SEXEDNR,AGEDNR,DATEDON,IND from don where IND='IND'and  AGEDNR >=$colone2  and AGEDNR <=$colone3  and DATEDON >='$datejour1'and DATEDON <='$datejour2'";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$collecte=mysql_num_rows($requete);
mysql_free_result($requete);
return $collecte;
}
function GRAPHEAGEDON($TITRE) 
{
include "./CHART/libchart/classes/libchart.php";
$chart = new VerticalBarChart();
$fichier='./CHART/demo/generated/demo1.png';
$dataSet = new XYDataSet();$datejour1="2015";$datejour2=date("Y-m-d");
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
buttondnr();
echo '<h1>dnr: Graphe </h1>
<br /><br />
<hr /><br />';
echo '<div align="center"  > ';
echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
echo "</div>";echo "<br />";
BOUTONGRAPHE();	
}
//***************************************************************************************//
function consparpat($IDDNR) 
{
mysqlconnect();
$sql = " select IDDNR from cons where IDDNR=$IDDNR ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
function hospparpat($IDDNR) 
{
mysqlconnect();
$sql = " select IDDNR from hosp where IDDNR=$IDDNR ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
function donpardnr($IDDNR) 
{
mysqlconnect();
$sql = " select IDDNR from don where IDDNR=$IDDNR ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
function disparrec($IDREC) 
{
mysqlconnect();
$sql = " select IDREC from dis where IDREC=$IDREC ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
function valeurmoisdnr($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR) 
{
mysqlconnect();
$sql = " select $COLONE1,$COLONE2,SRS from $TBL where (SRS='$SRS' and $STR and $COLONE2='$VALEUR2') and ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
function graphemoisdnr($TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$STR) 
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
buttondnr();
echo '<h1>dnr: Graphe </h1>
<br /><br />
<hr /><br />';
echo '<div align="center"  > ';
echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
echo "</div>";echo "<br />";
/* BOUTONGRAPHE() ; */
}
//**********************************************************************************************************//
function valeurbibi($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR) 
{
mysqlconnect();
$sql = " select $COLONE1,$COLONE2,SRS,STR,TDNR from $TBL where (SRS='$SRS' and $STR and $COLONE2='$VALEUR2') and ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
function graphebibi($TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$val1,$val2,$val3,$val4,$TI1,$TI2,$TI3,$TI4) 
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
buttondnr();
echo '<h1>Don: Graphe </h1>
<br /><br />
<hr /><br />';
echo '<div align="center"  > ';
echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
echo "</div>";
echo "<br />";
BOUTONGRAPHE();	
}
//**********************************************************************************************************//
function valeurbi($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR) 
{
mysqlconnect();
$sql = " select $COLONE1,$COLONE2,SRS,STR,TDNR from $TBL where (SRS='$SRS' and $STR and $COLONE2='$VALEUR2') and ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
function graphebi($TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$val1,$val2,$TI1,$TI2) 
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
buttondnr();
echo '<h1>Don: Graphe </h1>
<br /><br />
<hr /><br />';
echo '<div align="center"  > ';
echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
echo "</div>";echo "<br />";
BOUTONGRAPHE();	
}
//***************************************************************************************//
function valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR) 
{
mysqlconnect();
$sql = " select $COLONE1,$COLONE2,SRS,STR,TDNR from $TBL where (SRS='$SRS' and $STR and $COLONE2='$VALEUR2') and ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
function graphemois($TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$STR) 
{
include "./CHART/libchart/classes/libchart.php";
$chart = new VerticalBarChart();
$fichier='./CHART/demo/generated/demo1.png';
$dataSet = new XYDataSet(); 
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
$chart->setDataSet($dataSet);
$DATE=date("d-m-Y");
$chart->setTitle($TITRE.$DATE);
$chart->render($fichier);	
buttondnr();
echo '<h1>Don: Graphe </h1>
<br /><br />
<hr /><br />';
echo '<div align="center"  > ';
echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
echo "</div>";echo "<br />";
BOUTONGRAPHE() ;
}
function BOUTONGRAPHE() 
{
echo "<div id=\"smenug\">";
echo '<a href="'.URL.'don/IND/">IND</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/CIDT/">CIT</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/CIDD/">CID</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/F/">F</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/M/">M</a>'; echo '&nbsp;';
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
echo '<a href="'.URL.'don/SM/">SM</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/SF/">SF</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/SMF/">SMF</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/ST/">ST</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/AP/">AP</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/STA/">STA</a>'; echo '&nbsp;';
echo '<a href="'.URL.'don/AGE/">AGE M</a>'; echo '&nbsp;';
echo '<a href="'.URL.'"></a>'; echo '&nbsp;';
echo '<a href="'.URL.'"></a>'; echo '&nbsp;';
echo "</div>";
// urlbutton(1120+$x,$y,URL.'don/HIVP/','HIV','');
// urlbutton(1120+$x,$y+22,URL.'don/HVBP/','HVB','');
// urlbutton(1120+$x,$y+44,URL.'don/HVCP/','HVC','');
// urlbutton(1120+$x,$y+66,URL.'don/TPHAP/','TPHA',''); 
// urlbutton(890+$x,$y,URL.'dnr/imp/','A DON',''); 
}



//***************************************************************************************//
function valeurmoisd($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR) 
{
mysqlconnect();
$sql = " select $COLONE1,$COLONE2,SRS,SERVICE,MED from $TBL where (SRS='$SRS' and $STR and $COLONE2='$VALEUR2') and ($COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
function graphemoisd($TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$STR) 
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
buttondis();
echo '<h1>Distribution: Graphe </h1>
<br /><br />
<hr /><br />';
echo '<div align="center"  > ';
echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
echo "</div>";echo "<br />";
BOUTONGRAPHEDIS() ;
}
function BOUTONGRAPHEDIS() 
{
$y=380;
$x=0;
urlbutton(30,380,URL.'dis/CGRPFCCPS/','PSL','');
urlbutton(30,$y+22,URL.'dis/CGR/','CGR','');  
urlbutton(30,$y+44,URL.'dis/PFC/','PFC',''); 
urlbutton(30,$y+66,URL.'dis/CPS/','CPS',''); 

urlbutton(100+$x,$y,URL.'dis/STOKCGR/','Stok CGR',''); 
urlbutton(100+$x,$y+22,URL.'dis/STOKPFC/','Stok PFC',''); 
urlbutton(100+$x,$y+44,URL.'dis/STOKCPS/','stok CPS',''); 

urlbutton(200+$x,$y,URL.'dis/SERVICECGR/','Service CGR',''); 
urlbutton(200+$x,$y+22,URL.'dis/SERVICEPFC/','Service PFC',''); 
urlbutton(200+$x,$y+44,URL.'dis/SERVICECPS/','Service CPS',''); 
}
function fichestock($PSL,$date,$GROUPAGE,$RHESUS) 
{
mysqlconnect();
$sql = " select * from $PSL where GROUPAGE $GROUPAGE and  RHESUS $RHESUS  and  DATEDON ='$date'";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
function fichestock1($PSL,$date,$GROUPAGE,$RHESUS) 
{
mysqlconnect();
$sql = " select * from dis where PSL='$PSL' and GROUPAGE $GROUPAGE  and  RHESUS $RHESUS  and DATEDIS ='$date'";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}

function difffichestock($PSL,$date,$stockant,$GROUPAGE,$RHESUS) 
{
$diff=$stockant+fichestock($PSL,$date,$GROUPAGE,$RHESUS)-fichestock1($PSL,$date,$GROUPAGE,$RHESUS);
return $diff; 
}

//***********************************************************//
function stockpsl($PSL,$GROUPAGE,$RHESUS) 
{
mysqlconnect();
$date=date('Y');
$annee=date('Y');
$sql = " select * from $PSL where GROUPAGE='$GROUPAGE' and  RHESUS='$RHESUS' and DIST=''  AND  DATEPER >='$date' ";
$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
$OP=mysql_num_rows($requete);
mysql_free_result($requete);
return $OP;
}
function STOKCGR($PSL,$titre)
{
include "./CHART/libchart/classes/libchart.php";
$chart = new VerticalBarChart();
$fichier='./CHART/demo/generated/demo1.png';
$dataSet = new XYDataSet(); 
$DATEMOIS=date("Y");
///$dataSet->addPoint(new Point("DON TOTAL", $this ->PSL()));
$dataSet->addPoint(new Point("O+", stockpsl($PSL,'o','Positif')));
$dataSet->addPoint(new Point("O-", stockpsl($PSL,'o','negatif')));
$dataSet->addPoint(new Point("A+", stockpsl($PSL,'A','Positif')));
$dataSet->addPoint(new Point("A-", stockpsl($PSL,'A','negatif')));
$dataSet->addPoint(new Point("B+", stockpsl($PSL,'B','Positif')));
$dataSet->addPoint(new Point("B-", stockpsl($PSL,'B','negatif')));
$dataSet->addPoint(new Point("AB+",stockpsl($PSL,'AB','Positif')));
$dataSet->addPoint(new Point("AB-",stockpsl($PSL,'AB','negatif')));
$chart->setDataSet($dataSet);
$chart->setTitle($titre);
$chart->render($fichier);	
buttondis();
echo '<h1>Distribution: Graphe</h1>
<br /><br />
<hr /><br />';
echo '<div align="center"  > ';
echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
echo "</div>";
BOUTONGRAPHEDIS() ;	
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
function SERVICECGR($PSL,$titre)
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
buttondis();
echo '<h1>Distribution: Graphe</h1>
<br /><br />
<hr /><br />';
echo '<div align="center"  > ';
echo '<img alt="Pie chart"  src="'.URL.$fichier.'" style="border: 2px solid red;"/>';
echo "</div>";
BOUTONGRAPHEDIS() ;	
}
function buttondis()
{
//urlbutton(30,300,URL.'dis/imp/','Imprimer Recs',5);
//urlbutton(136,300,URL.'dis/impdis/','Imprimer Diss',5);
// urlbutton(237,300,URL.'dis/grapherec/','graphic Recs','',5);
// urlbutton(333,300,URL.'dis/graphedis/','graphic Diss','',5);
// urlbutton(432,300,'','',5);
// urlbutton(560,300,'','',5);
urlbutton(710,300,URL.'rec/DPR/','dis/rec','',5);
urlbutton(780,300,URL.'pdf/impdpr.php','imp dis/rec','',5);
NAV();
}
function buttondis1($id)
{
urlbutton(30,300,URL.'pdf/CARTABORREC.php?uc='.$id,'Carte groupage',5);
urlbutton(138,300,URL.'pdf/info.php?uc='.$id,'Information sur la Transfusion',5);
urlbutton(329,300,URL.'pdf/LABODIS.php?uc='.$id,'Bilan standard',5);
urlbutton(430,300,URL.'pdf/fichetrans.php?uc='.$id,'Fiche Transfusionnelle',5);
urlbutton(578,300,URL.'pdf/commande.php?uc='.$id,'Commande PSL ',5);
urlbutton(699,300,URL.'rec/view/'.$id,'VIEW',5);
urlbutton(752,300,URL.'rec/discgr/'.$id,'CGR',5);
urlbutton(800,300,URL.'rec/dispfc/'.$id,'PFC',5);
urlbutton(846,300,URL.'rec/discps/'.$id,'CPS',5);
NAV();
}
//***************************************************************************************************************//
function buttonmal()
{
// urlbutton(237,300,URL.'dnr/graphednr/','graphic Dnrs','',5);
// urlbutton(333,300,URL.'dnr/graphedon/','graphic Dons','',5);
// urlbutton(432,300,URL.'dnr/HVB/','HVB','',5);
// urlbutton(478,300,URL.'dnr/HVC/','HVC','',5);
// urlbutton(525,300,URL.'dnr/HIV/','HIV','',5);
// urlbutton(566,300,URL.'dnr/SYS/','SYS','',5);
// urlbutton(610,300,URL.'dnr/COMP/','COMPAGNE','',5);
NAV();
}
function buttonqua()
{
urlbutton(30,300,URL.'qua/search/0/10?q=&o=IDP','Dons Qualifier',5);
urlbutton(138,300,URL.'qua/','qua Dons ',5);
urlbutton(220,300,URL.'mal/','Malade',5);
urlbutton(285,300,URL.'mal/impmal/','Imprimer Malades',5);
//urlbutton(130,300,URL.'qua/imp/','Imprimer qual',5);
//urlbutton(237,300,URL.'qua/grapherec/','graphic qual','',5);
//urlbutton(333,300,URL.'qua/','qua','',5);
// urlbutton(432,300,'','',5);
// urlbutton(560,300,'','',5);
NAV();
}
function buttonpre()
{
urlbutton(30,300,URL.'pre/search/0/10?q=&o=IDP','Dons prepares',5);

//urlbutton(30,300,URL.'pre/imp/','Imprimer pre',5);
// urlbutton(136,300,URL.'dis/impdis/','Imprimer Diss',5);
// urlbutton(237,300,URL.'pre/grapherec/','graphic pre','',5);
// urlbutton(333,300,URL.'dis/graphedis/','graphic Diss','',5);
// urlbutton(432,300,'','',5);
// urlbutton(560,300,'','',5);
NAV();
}
//*****************************************************************************************************************//
function urlbutton($x,$y,$url,$value,$h)
{
echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
echo "<a href=\"".$url."\"><input type=\"button\"value=\"".$value."\"style=\"color: red  \" /></a>";
echo "</div>";
}
function backforward($x,$y,$backforward,$value)
{
echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
echo "<button onclick=\"javascript:".$backforward."();\">".$value."</button>";
echo "</div>";
}
function combov1($name,$Jour)  
{	 
echo "<select name=\"".$name."\" >";
foreach ($Jour as $cle => $value) 
{
echo"<OPTION VALUE=\"".$value."\">".$cle."</OPTION>";
}
echo "</select> ";	
} 
function SER($name,$db_name,$tb_name) 
{
mysqlconnect();	 
echo "<select size=1 class=\"ARS\" name=\"".$name."\">"."\n";
echo"<option value=\"1\" selected=\"selected\">Service</option>"."\n";
$result = mysql_query("SELECT * FROM $tb_name  " );
while($data =  mysql_fetch_array($result))
{
echo '<option value="'.$data['id'].'">'.$data['service'].'</option>';
}
echo '</select>'."\n"; 
}
function MED($name,$db_name,$tb_name) 
{
mysqlconnect();	 
echo "<select size=1 class=\"ARS\" name=\"".$name."\">"."\n";
echo"<option value=\"1\" selected=\"selected\">medecin</option>"."\n";
$result = mysql_query("SELECT * FROM $tb_name  " );
while($data =  mysql_fetch_array($result))
{
echo '<option value="'.$data['id'].'">'.$data['medecin'].'</option>';
}
echo '</select>'."\n"; 
}

function ARS($x,$y,$name,$db_name,$tb_name) 
{
mysqlconnect(); 
echo "<select size=1 class=\"ARS\" name=\"".$name."\">"."\n";
echo"<option value=\"7000\" selected=\"selected\">AGENCE REGIONAL DU SANG</option>"."\n";
$result = mysql_query("SELECT * FROM $tb_name order by WILAYAS" );
while($data =  mysql_fetch_array($result))
{
echo '<option value="'.$data[0].'">'.$data[1].'</option>';
}
echo '</select>'."\n"; 
}
function WRS($x,$y,$name) 
{	 
echo "<select size=1 class=\"WRS\" name=\"".$name."\">"."\n";
echo"<option value=\"17000\" selected=\"selected\">WILAYA</option>"."\n";
echo '</select>'."\n"; 
}
function STR($x,$y,$name) 
{	 
echo "<select size=1 class=\"STR\" name=\"".$name."\">"."\n";
echo"<option value=\"4\" selected=\"selected\">STRUCTURE</option>"."\n";
echo '</select>'."\n"; 
}
function WILAYA($x,$y,$name,$class,$db_name,$tb_name) 
{
mysqlconnect(); 	 
echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
echo"<option value=\"1\" selected=\"selected\">selectionner wilaya</option>"."\n";
mysql_query("SET NAMES 'UTF8' ");
$result = mysql_query("SELECT * FROM $tb_name order by WILAYAS" );
while($data =  mysql_fetch_array($result))
{
echo '<option value="'.$data[0].'">'.$data[1].'</option>';
}
echo '</select>'."\n"; 
}
function COMMUNE($x,$y,$name,$class) 
{	 
echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
echo"<option value=\"1\" selected=\"selected\">selectionner commune</option>"."\n";
echo '</select>'."\n"; 
}

function ADRESSE($x,$y,$name,$class,$db_name,$tb_name) 
{
mysqlconnect(); 	 
echo "<select size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
echo"<option value=\"1\" selected=\"selected\">selectionner Adresse</option>"."\n";
mysql_query("SET NAMES 'UTF8' ");
$result = mysql_query("SELECT * FROM $tb_name order by Adresse" );
while($data =  mysql_fetch_array($result))
{
echo '<option value="'.$data[1].'">'.ucwords($data[1]).'</option>';
}
echo '</select>'."\n"; 
}
function combov($x,$y,$name,$Jour)  //como vierge
{ 
echo "<select name=\"".$name."\" >";
foreach ($Jour as $value) 
{
echo "<option>$value</option>";
}
echo "</select> ";	
}
function bgcolor_donate($allow_donate) 
{
	if($allow_donate==true) {
	$bgcolor_donate= '#EDF7FF' ;
	}
	else{
	$bgcolor_donate= '#A4A4A4' ;
	}
	return $bgcolor_donate ;
} 

function bgcolor_ABO($ABO) 
{
switch($ABO)  
{
   case 'A' :
		{ return   $bgcolor_ABO= 'bgcolor="#8DBCFD"     style="color:white"  ';break;}
   case 'B' :
		{ return   $bgcolor_ABO= 'bgcolor="yellow"      style="color:black"  ';break;}
   case 'AB' :
		{ return   $bgcolor_ABO= 'bgcolor="#ed1c24"     style="color:white"  ';break;}
   case 'O' :
		{ return   $bgcolor_ABO= 'bgcolor="white"       style="color:red"  ';break;}
		
}		
}
function serologie($ABO) 
{
switch($ABO)  
{
   case 'Positif' :
		{ return   $bgcolor_ABO= 'bgcolor="#ed1c24"     style="color:white"  ';break;}
   case 'douteux' :
		{ return   $bgcolor_ABO= 'bgcolor="#ed1c24"     style="color:white"  ';break;}
   case 'negatif' :
		{ return   $bgcolor_ABO= 'bgcolor=""     style=""  ';break;}
   case '' :
		{ return   $bgcolor_ABO= 'bgcolor="yellow"      style="color:black"  ';break;}
		
}		
}
function bgcolor_dis($dis) 
{
switch($dis)  
{
   case '1' :
		{ return   $bgcolor_ABO= 'bgcolor="#E90008"     style="color:white"  ';break;}
   case '' :
		{ return   $bgcolor_ABO= 'bgcolor="#088C20"      style="color:black"  ';break;}		
}		
}
function allow_donate($donate) 
{
  $months_for_donor_allow_donate = 3;
  $diff = abs(time() - strtotime($donate)); 
  $years = floor($diff / (365*60*60*24));        
  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
  $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
  $allow_donate = FALSE; 
	if ($years > 0)
	{
	   $due = "" ; 
	   $allow_donate = TRUE;
	}
	else if ($months > 0)
	{
		if ($months > $months_for_donor_allow_donate)
			$allow_donate = TRUE;
	}
return $allow_donate ;	$due;
}
function photos($x,$y,$nom)
{
echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
echo " <img   src=\" ".URL.'public/images/photos/'.$nom."\" width=\"250\" height=\"250\" alt=\"Photos\" />";
echo "</div>";
}
function photosurl($x,$y,$nom)
{
echo "<div style=\"position:absolute;left:".$x."px;top:".$y."px;\">";
echo "<p><input type=\"button\" value=\"zoom (&ndash;)\" onClick=\"changeTaille(-5)\"><input type=\"button\" value=\"zoom (+)\" onClick=\"changeTaille(5)\"></p>";
echo "<p>&nbsp;&nbsp;<img id=\"image\" src = \"".$nom."\" style=\"height:250px; width:250px\" alt=\"Photos\" ></p>";	 
echo "</div>";
}
function barre_navigation ($nb_total,$nb_affichage_par_page,$o,$q,$p,$nb_liens_dans_la_barre,$c)
{
$barre = '';
// 1 on recherche l'URL courante munie de ses paramètre auxquels on ajoute le paramètre'debut' qui jouera le role du premier élément de notre LIMIT
$query = URL.$c.'/search/'.$p.'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.'';	 
// on calcul le numéro de la page active
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
	// si le premier numéro qui s'affiche est différent de 1, on affiche << qui sera unlien vers la premiere page
	if ($cpt_deb != 1) 
	{
		$cible = URL.$c.'/search/'.(0).'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.''; 
		$lien = '<A HREF="'.$cible.'">&lt;&lt;</A>&nbsp;&nbsp;';
	}
	else 
	{
	$lien='';
	}
	
	$barre .= $lien;

	// on affiche tous les liens de notre barre, tout en vérifiant de ne pas mettre delien pour la page active

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
			$barre .= "<A HREF='".URL.$c.'/search/'.(($cpt-1)*$nb_affichage_par_page).'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.'';  
			$barre .= "'>".'['.$cpt.']'."</A>";
			}
			else {
			$barre .= "<A HREF='".URL.$c.'/search/'.(($cpt-1)*$nb_affichage_par_page).'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.'';  
			$barre .= "'>".'['.$cpt.']'."</A>&nbsp;-&nbsp;";
			}
		}
	}

    $fin = ($nb_total - ($nb_total % $nb_affichage_par_page));
	if (($nb_total % $nb_affichage_par_page) == 0) 
	{
	$fin = $fin - $nb_affichage_par_page;
	}
   // si $cpt_fin ne vaut pas la dernière page de la barre de navigation, on afficheun >> qui sera un lien vers la dernière page de navigation

	if ($cpt_fin != $nb_pages_total) 
	{
	$cible = URL.$c.'/search/'.$fin.'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.''; 
	$lien = '&nbsp;&nbsp;<A HREF="'.$cible.'">&gt;&gt;</A>';
	}
	else {
	$lien='';
	}

	$barre .= $lien;

	return $barre;
}   
function verifsession() 
{
//aspirateur();
if (Session::get('loggedIn') == 1) 
{
// echo "oui";
// echo "</br>";
// echo "loggedIn : ".Session::get('loggedIn');
//header("Location: ".URL."login") ;
}
else
{
// echo "non";
// echo "</br>";
// echo "loggedIn : ".Session::get('loggedIn');
header("Location: ".URL."login") ;
}
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
// Always provide a TRAILING SLASH (/) AFTER A PATH
define('uploadLocationusers', 'd:\\mvc/public/webcam/users/');
define('uploadLocationpat', 'd:\\mvc/public/webcam/pat/');
define('uploadLocationdnr', 'd:\\mvc/public/webcam/dnr/');
define('uploadLocationrec', 'd:\\mvc/public/webcam/rec/');
define('dump_mysql', 'd:/mvc/data/datasql/');
define('photosmfx', 'd:\\mvc/public/webcam/');


// error_reporting(0);
// session_set_cookie_params(0);// kill session when browser closed
// session_start(); 
// define('ROOT', dirname(__FILE__) . '/'); // root folder 
// define('CLS', ROOT . 'installation/classes/'); // classes folder
// define('FUNC', ROOT . 'installation/functions/'); // functions folder
// define('SITE', 'http://' . $_SERVER['SERVER_NAME'] . '/setupphp/');
// require_once FUNC . 'autoload.php';
// require_once FUNC . 'testConnection.php';
// spl_autoload_register('autoloader');





define('URL', 'http://'.$_SERVER['SERVER_NAME'].'/mvc/');
define('LIBS', 'libs/');
define('MVC', 'GPTS');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'mvc');
define('DB_USER', 'root');
define('DB_PASS', '');
// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');
// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');
error_reporting(E_ALL);
define("DS", DIRECTORY_SEPARATOR);
define("EXT", '.php');
define("LIB_PATH", dirname(__FILE__) . DS . 'lib' . DS);
define("APP_PATH", dirname(__FILE__) . DS . 'app' . DS);
define("i18_PATH", APP_PATH . 'i18n' . DS);
define("CFG_PATH", APP_PATH . 'config' . DS);
define('APP_NAME', 'POSTE DE TRANSFUSION SANGUINE');
define('APP_SNAME', 'PTS');
define('APP_VERSION', '1.0');
define('APP_DEFAULT', 'http://' . $_SERVER['SERVER_NAME'] . '/mvc/'); //**********chemin par defaut  tres important pour le head.php************//                        
define('ENV', 'dev');
define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/mcv/');

//acces php 
function accdb($dbName,$tblName)
{

if (!file_exists($dbName)) {
    die("Could not find database file.");
}
else {
$conn = new COM ("ADODB.Connection") or die("Cannot start ADO"); 
$connStr = "PROVIDER=Microsoft.Ace.OLEDB.12.0;Data Source =".$dbName; 
$conn->open($connStr);
$query = "SELECT * FROM  $tblName "; 
$rs = $conn->execute($query);
$num_columns = $rs->Fields->Count();   
for ($i=0; $i < $num_columns; $i++) { 
    $fld[$i] = $rs->Fields($i); 
}  

echo $num_columns . "<br>";   
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
  
while (!$rs->EOF)  
{ 
    echo "<tr>"; 
    // echo "<td>" . utf8_encode($fld[0]->value) . "</td>";
	
	for ($i=0; $i < $num_columns; $i++) { 
        echo "<td>" . utf8_encode($fld[$i]->value) . "</td>"; 
    } 
    echo "</tr>"; 
    $rs->MoveNext(); 
}   
echo "</table>";   
$rs->Close(); 
$conn->Close(); 
$rs = null; 
$conn = null;  
} 

}
