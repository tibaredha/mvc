<?php
// function dateUS2FR($date)//2013-01-01
    // {
	// $J      = substr($date,8,2);
    // $M      = substr($date,5,2);
    // $A      = substr($date,0,4);
	// $dateUS2FR =  $J."-".$M."-".$A ;
    // return $dateUS2FR;//01-01-2013
    // }

   

	
// function service($servicea)
// {
// switch ($servicea) 
	// { 
    // case 'M HOMME':    $SERVICE=1;break;
	// case 'M FEMME':    $SERVICE=2;break;
	// case 'C HOMME':    $SERVICE=3;break;
	// case 'C FEMME':    $SERVICE=4;break;
	// case 'PEDIATRIE':  $SERVICE=5;break;
	// case 'BLOC':       $SERVICE=6;break;
    // case 'GYNECO':     $SERVICE=7;break;
	// case 'MATERNITE':  $SERVICE=8;break;
	// case 'PUMC':       $SERVICE=9;break;
	// case 'HEMODIALYS': $SERVICE=15;break;
	// default:           $SERVICE='';
	// }
// return $SERVICE; 	
// }	
// function commune($communea)
// {
// switch ($communea) 
	// { 
		// case 'SIDILAADJAL': $communeb=926;  break;
		// case 'HASSIFEDOUL': $communeb=927;  break;
		// case 'HADSAHARI': $communeb=932;  break;
		// case 'GUERNINI': $communeb=925;  break;
		// case 'ELKHMISSE': $communeb=928;  break;
		// case 'BOUIRATLAHDAB': $communeb=933;  break;
		// case 'BIRINE': $communeb=929;  break;
		// case 'BENAHAR': $communeb=931;  break;
		// case 'AINFAKA': $communeb=934;  break;
		// case 'AIN OUSSERA': $communeb=924;  break;
		// case 'HORS SECTEUR': $communeb=1;  break;
		// default:          $communeb=1;
	// }
// return $communeb; 	
// }
// echo commune('SIDILAADJAL');
// echo 'ok';
// echo '</br>';
 function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
$db_host="localhost";
$db_name="mvc"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$sql=mysql_query("SELECT * FROM ephdjelfa  order by  CODECIM");
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;

 while($value=mysql_fetch_array($sql))
	{
	echo '<tr>';
	echo '<td>';echo $value['DINS'];echo '</td>';
    echo '<td>';echo $value['WILAYAD'];echo '</td>';
	echo '<td>';echo $value['COMMUNED'];echo '</td>';
	echo '<td>';echo $value['STRUCTURED'];echo '</td>';
	echo '<td>';echo $value['NOM'];echo '</td>';
	echo '<td>';echo $value['PRENOM'];echo '</td>';
	echo '<td>';echo $value['FILSDE'];echo '</td>';
	echo '<td>';echo $value['ETDE'];echo '</td>';
	echo '<td>';echo $value['SEX'];echo '</td>';
	echo '<td>';echo $value['DATENAISSANCE'];echo '</td>';
	echo '<td>';echo $value['COMMUNE'];echo '</td>';
	echo '<td>';echo $value['WILAYA'];echo '</td>';
	echo '<td>';echo $value['COMMUNE'];echo '</td>';
	echo '<td>';echo $value['WILAYAR'];echo '</td>';
	echo '<td>';echo $value['DATEHOSPI'];echo '</td>';
    echo '<td>';echo $value['SERVICEHOSPIT'];echo '</td>';
    echo '<td>';echo $value['CODECIM'];echo '</td>';
    echo '<td>';echo $value['MEDECINHOSPIT'];echo '</td>';
   $sql1 = "INSERT INTO deceshosp ( WILAYAD,
	                                COMMUNED,
									STRUCTURED,
									NOM,
									PRENOM,
									FILSDE,
									ETDE,
									SEX,
									DATENAISSANCE,
									Days,
									Weeks,
									Months,
									Years,
									WILAYA,
									WILAYAR,
									COMMUNE,
									COMMUNER,
									ADRESSE,
									CD,	
									LD,
									AUTRES,
									CIM1,
									CIM2,
									CIM3,
									CIM4,
									CIM5,
									NDLM,
									NDLMAAP,
									DECEMAT,
									GRS,
									DATEHOSPI,
									SERVICEHOSPIT,
									DUREEHOSPIT,
									MEDECINHOSPIT,
									CODECIM0,
									CODECIM,
									DINS,
									HINS) 
	VALUES (
	        '".$value['WILAYAD']."',
			'".$value['COMMUNED']."',
	        '".$value['STRUCTURED']."',
	        '".$value['NOM']."',
	        '".$value['PRENOM']."',
			'".$value['FILSDE']."',
			'".$value['ETDE']."',
			'".$value['SEX']."',
			'".$value['DATENAISSANCE']."',
			'0',
			'0',
			'0',
			'0',
			'".$value['WILAYA']."',
			'".$value['WILAYAR']."',
			'".$value['COMMUNE']."',
			'".$value['COMMUNER']."',
			'*',
			'CN',
			'SSP',
			'*',
			'*',
			'*',
			'*',
			'*',
			'*',
			'NAT',
			'*',
			'0',
			'IDETER',
			'".dateFR2US($value['DATEHOSPI'])."',
			'".$value['SERVICEHOSPIT']."',
			'0',
			'".$value['MEDECINHOSPIT']."',
		    '*',
			'".$value['CODECIM']."',
			'".dateFR2US($value['DINS'])."',
			''
			);";
			
		
    //manque age  j s m a 	
	// $query1 = mysql_query($sql1);


	
	echo '</tr>';
	}
	
 echo "</table>";
 ?>