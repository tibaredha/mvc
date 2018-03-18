	<style type="text/css">
			a {	
				text-decoration: none;
				color: green;
				font-weight: bold;
				font-style: italic;
			}
			a:hover {
				color: red;
				text-decoration: none; 
			}
			td.today { border: 1px solid darkred; color: #000000; font-weight: bold; text-align: center;}
			td.clic{ border: 1px solid red; color: #000000;text-align: center; }
			td.small { font-size:20px; width:86px; text-align: center;}
			.red { color: darkred;text-align: center; }
			.petit { color: darkred; font-size:10px; text-align: center; }
			.gros { color: darkred; font-size:14px; text-align: center; }
			.m { background: white; }
			
			td.monthdays {border: 1px solid #434470; color: #000000; background: #EEEEEE; text-align: center;}
			td.nonmonthdays { border: 1px solid black; color: #000000; background: #CCCCCC;text-align: center;}
	</style>
<?php
// header("Refresh: 5; ");//URL=$url1

$datedujours = date('d/m/Y');
$la = mktime(0, 0, 0, date('m'), date('d'), date('Y'));  //date du jour en seconde
if (!isset($_REQUEST['date'])) 
{
$date = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
} 
else 
{
$date = $_REQUEST['date'];
}
$day   = date('d', $date);  //le jours 
$month = date('m', $date);  //le mois
$year  = date('Y', $date);  //l'annee
if ($month == 1)
{
$num_days_last = cal_days_in_month(0,12,($year - 1)); //Retourne le nombre de jours dans un mois precedent , pour une année
} 
else 
{
$num_days_last = cal_days_in_month(0, ($month - 1),$year); //Retourne le nombre de jours dans un mois precedent, pour une année
}
$month_start = mktime(0,0,0,$month,1,$year);// la date du 1er jour du mois en second
$month_start_day = date('D', $month_start);

switch ($month_start_day) 
{
    case "Sun": $offset = 0;
        break;
    case "Mon": $offset = 1;
        break;
    case "Tue": $offset = 2;
        break;
    case "Wed": $offset = 3;
        break;
    case "Thu": $offset = 4;
        break;
    case "Fri": $offset = 5;
        break;
    case "Sat": $offset = 6;
        break;
}
$month_name = date('M',$month_start); //le nom du mois en cours
$anneTitre['jan'] = "Janvier";
$anneTitre['jun'] = "Juin";
$anneTitre['feb'] = "Février";
$anneTitre['aug'] = "Aout";
$anneTitre['mar'] = "Mars";
$anneTitre['sep'] = "Septembre";
$anneTitre['apr'] = "Avril";
$anneTitre['oct'] = "Octobre";
$anneTitre['may'] = "Mai";
$anneTitre['nov'] = "Novembre";
$anneTitre['jul'] = "Juillet";
$anneTitre['dec'] = "Décembre";
$monthTitre = $anneTitre[strtolower($month_name)];
$num_days_current = cal_days_in_month(0, $month, $year); //Retourne le nombre de jours du mois  en cours , pour une année
for ($i = 1; $i <= $num_days_current; $i++) 
{
   $num_days_array[] = $i;
}
for ($i = 1; $i <= $num_days_last; $i++) 
{
    $num_days_last_array[] = $i;
}

if ($offset > 0) 
{
    $offset_correction = array_slice($num_days_last_array,-$offset,$offset); //Extrait une portion de tableau
    $new_count = array_merge($offset_correction, $num_days_array);
    $offset_count = count($offset_correction);
} 
else 
{
    $offset_count = 0;
    $new_count = $num_days_array;
}


$current_num = count($new_count);
if ($current_num > 35) 
{
    $num_weeks = 6;
    $outset = (42 - $current_num);
} 
elseif ($current_num < 35) 
{
    $num_weeks = 5;
    $outset = (35 - $current_num);
}
if ($current_num == 35) 
{
    $num_weeks = 5;
    $outset = 0;
}
for ($i = 1; $i <= $outset; $i++) 
{
    $new_count[] = $i;
}
$weeks = array_chunk($new_count, 7); //Sépare un tableau en tableaux de taille inférieure

//***********************************************$previous_link************************************************************//
if ($month == 1)
{
    $previous_link2 = mktime(0, 0, 0, 12, $day, ($year - 1));
} 
else 
{
    $previous_link2 = mktime(0, 0, 0, ($month - 1), $day, $year);
}
$previous_link= "<a href=\"./index.php?a=agenda&uc=agendax&date=".$previous_link2."\"><img src='./images/b_firstpage.png' width='16' height='16' border='0' alt=''/></a>";
//************************************************$next_link**************************************************************//
if ($month == 12) 
{
    $next_link1 = mktime(0, 0, 0, 1, $day, ($year + 1));
} 
else 
{
    $next_link1 = mktime(0, 0, 0, ($month + 1), $day, $year);
}
$next_link = "<a href=\"./index.php?a=agenda&uc=agendax&date=".$next_link1."\"><img src='./images/b_lastpage.png' width='16' height='16' border='0' alt=''/></a>";
//*************************************************************************************************************************//
$per-> sautligne (4);
echo "<table align=\"center\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\" width=\"700\" class=\"calendar\">";
echo "<tr height=\"10\">";
echo "<td bgcolor=\"white\" colspan=\"7\">";
echo "<table width=\"100%\" align=\"center\"> ";
echo "<tr>";
echo "<td colspan=\"2\" width=\"100\" align=\"left   \">$previous_link   </td>";
echo "<td colspan=\"3\"               align=\"center \">$monthTitre $year</td>";
echo "<td colspan=\"2\" width=\"100\" align=\"right  \">$next_link       </td>";
echo "</tr>";
echo "</table>";
echo "</td>";
echo "</tr>";
echo "<tr height=\"10\">";
echo "<td  class=\"small\">الاحد</td><td class=\"small\">الاثنين</td><td class=\"small\">الثلاثاء</td><td class=\"small\">الأربعاء</td><td class=\"small\">الخميس</td><td class=\"small\">الجمعة</td><td class=\"small\">السبت</td>";
echo "</tr>";


$site_Content = "";               
$i = 0;
foreach ($weeks AS $week)
{
$site_Content .= "<tr   bgcolor=\"white\"  height=\"20\">";
					
					
					foreach ($week as $d)
						{
							if ($i < $offset_count) 
							{
								$day_link = $d;
								$site_Content .= "<td class=\"nonmonthdays\">$day_link</td>";
							}
							//*****************************************************************************//
							if (($i >= $offset_count) && ($i < ($num_weeks * 7) - $outset))
							{
							    $per-> mysqlconnect();
							
								$dateLa = mktime(0, 0, 0, $month, $d, $year);
								$extraire1 = mysql_query("select * from agenda_events WHERE date='$dateLa'");
								$nbrEvents1 = mysql_numrows($extraire1);

								if ($nbrEvents1 > 0) {
									$eventsHere = " <span class=\"gros\"> :$nbrEvents1</span>";
								} else {
									$eventsHere = "";
								}

								$day_link = "<a href=\"./index.php?a=agenda&uc=agendax&date=" . mktime(0, 0, 0, $month, $d, $year) . "\">$d</a>$eventsHere";
								if ($la == mktime(0, 0, 0, $month, $d, $year)) 
								{
									$site_Content .= "<td class=\"today\">$day_link</td>";
								} 
								elseif ($day == $d) 
								{
									$site_Content .="<td class=\"clic\">$day_link</td>";
								} 
								else 
{
									$site_Content .= "<td class=\"days\">$day_link</td>";
								}

							} 
							elseif (($outset > 0)) 
							{

								if (($i >= ($num_weeks * 7) - $outset)) 
								{
									$day_link = $d;
									$site_Content .= "<td class=\"nonmonthdays\">$day_link</td>";
								}

							}

							$i++;
						}
echo "</tr>";
}


echo $site_Content;

echo'</table>';
echo'<br/><br/><br/><br/>';
	
//**************************************************************************************************************************//
$per ->h(2,600,180,'اخذ موعد');
$per ->f0('index.php?uc=adevent&a=add_events&date='.$date,'post');
$x=265;
$per ->label(50,$x,'عنوان');     $per ->txt(100,$x,'titre',20,"");
$per ->label(50,$x+30,'نوع');    $per ->combo(100,$x+30,"type","grh","agenda_theme","-----","****","id","titre");
$per ->label(50,$x+60,'النص');    $per ->textarea1(100,$x+60,"texte",2,20);
$per ->submit(90,$x+120,'Envoyer');
$per ->f1();
$per ->rdv ("قائمة المواعيد وعددهم  ",$date);
echo("<pre>") ;
print_r($weeks) ;
echo("</pre>") ;
echo "<table align=\"center\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\" width=\"700\" class=\"calendar\">";
echo "<tr height=\"10\">";
echo "<td bgcolor=\"white\" colspan=\"7\">";
echo "<table width=\"100%\" align=\"center\"> ";
echo "<tr>";
echo "<td colspan=\"2\" width=\"100\" align=\"left   \">$previous_link   </td>";
echo "<td colspan=\"3\"               align=\"center \">$monthTitre $year</td>";
echo "<td colspan=\"2\" width=\"100\" align=\"right  \">$next_link       </td>";
echo "</tr>";
echo "</table>";
echo "</td>";
echo "</tr>";
echo "<tr height=\"10\">";
echo "<td  class=\"small\">الاحد</td><td class=\"small\">الاثنين</td><td class=\"small\">الثلاثاء</td><td class=\"small\">الأربعاء</td><td class=\"small\">الخميس</td><td class=\"small\">الجمعة</td><td class=\"small\">السبت</td>";
echo "</tr>";
foreach ($weeks AS $week)
{
echo "<tr height=\"10\">";
							foreach ($week as $d)
							{
							
							$day_link = "<a href=\"./index.php?a=agenda&uc=agendax&date=" . mktime(0, 0, 0, $month, $d, $year) . "\">$d</a>$eventsHere";
							echo "<td class=\"\">$day_link</td>";
							
							}
echo "</tr>";
}
echo'</table>';
?>

