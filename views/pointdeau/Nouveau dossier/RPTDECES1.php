<?php	
verifsession();	
view::button('deces','');
lang(Session::get('lang'));
ob_start();

if (!ISSET($_POST['annee'])||!ISSET($_POST['mois'])||!ISSET($_POST['jour'])||!ISSET($_POST['annee1'])||!ISSET($_POST['mois1'])||!ISSET($_POST['jour1']))
{
$datejour1 =date("Y-m-d");
$datejour2 =date("Y-m-d");
}
else
{
 if(empty($_POST['annee'])||empty($_POST['mois'])||empty($_POST['jour'])||empty($_POST['annee1'])||empty($_POST['mois1'])||empty($_POST['jour1']))
 {
 $datejour1 =date("Y-m-d");
 $datejour2 =date("Y-m-d");
 }
 else
 {
 $datejour1 = $_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour'];
 $datejour2 = $_POST['annee1'].'-'.$_POST['mois1'].'-'.$_POST['jour1'];
 }
}
$datejour11 = $_POST['jour'].'-'.$_POST['mois'] .'-'.$_POST['annee'];
$datejour22 = $_POST['jour1'].'-'.$_POST['mois1'].'-'.$_POST['annee1'];
if ($datejour1>$datejour2 or  $datejour1==$datejour2)
{
header("Location: ../deces/EVALUATION") ;
}
?>

<h2>Rapport Mortalite Hospitaliere </h2>

<hr/><br/>
<table  width='50%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th   colspan="5"    >Mortalite Hospitaliere par Communes De Residence Année :
<?php
echo 'Du '.dateUS2FR($datejour1).' Au '.dateUS2FR($datejour2) ;

$bgcolor_donate ='#EDF7FF';	
?>
</th>
</tr>
<tr>
<th style="width:50px;"  >Communes De Residence</th>
<th style="width:50px;"  >Population</th>
<th style="width:50px;"  >Superfi</th>
<th style="width:10px;"  >Total</th>
<th style="width:10px;"  >Tx/P1000</th>
</tr>

<?php
$IDWIL='17000';
mysqlconnect();
$query="SELECT * FROM com where IDWIL='$IDWIL' and yes='1' order by COMMUNE "; //    % %will search form 0-9,a-z            
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
?>	
<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
<td align="left" >   <?php echo $row->COMMUNE.':('.$row->IDCOM.')' ;?> </td>
<td align="right">   <?php echo $row->POPULATION ;?></td>
<td align="right">   <?php echo $row->SUPER ;?></td>
<td align="right">   <?php echo view::valeurmoisdeces('','deceshosp','DINS','COMMUNER',$datejour1,$datejour2,$row->IDCOM,'')?></td>
<td align="right">   <?php echo round((view::valeurmoisdeces('','deceshosp','DINS','COMMUNER',$datejour1,$datejour2,$row->IDCOM,'')*1000)/$row->POPULATION,2) ;?></td>
</tr>
<?php			   
}
?>

<?php
echo "</table>";
// view::sautligne(16);
ob_end_flush();
?>



	