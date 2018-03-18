<?php 
verifsession();	
view::button('eva','');
lang(Session::get('lang'));
ob_start();
$date=$_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour']; 
$GROUPAGE=$_POST['GROUPAGE'];
$RHESUS=$_POST['RHESUS']; 
function datePlus($dateDo,$nbrJours)
	{
	$timeStamp = strtotime($dateDo); 
	$timeStamp += 24 * 60 * 60 * $nbrJours;
	$newDate = date("Y-m-d", $timeStamp);
	return  $newDate;
	}	
?>
<h2>Evaluation : Mouvement Du Stock PSL </h2 >
<hr /><br />
<table  width='70%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:10px;"  colspan="10"    >
<?php
//echo '<a href="'.URL.'pdf/***.php">Imprimer Fiche De Stock</a>'; echo '&nbsp;';
echo 'Movement du stock PSL : '.$GROUPAGE.' [ '.$RHESUS.' ] '.' Appartir : '.$date.'  [+30 jours]';	
?>
</th>
</tr>
<tr>
	<th style="width:100px;"rowspan="2">DATE</th>
	<th style="width:10px;"colspan="3">Concentré de globules rouges (CGR*)</th>
	<th style="width:10px;"colspan="3">Plasma frais congelé (PFC*)</th>
	<th style="width:10px;"colspan="3">Concentré de Plaquettes Standard (CPS*)</th>	
</tr>
<tr>
	<th style="width:100px;">Entree</th>
	<th style="width:100px;">Sortie</th>
	<th style="width:100px;">Balance</th>
	
	<th style="width:100px;">Entree</th>
	<th style="width:100px;">Sortie</th>
	<th style="width:100px;">Balance</th>
	
	<th style="width:100px;">Entree</th>
	<th style="width:100px;">Sortie</th>
	<th style="width:100px;">Balance</th>
</tr>

<?php
//for($i=350;$i<=9900;$i +=26) 
for($i=350;$i<=1200;$i +=26) 
{
$cgr=0;
$pfc=0;
$cps=0;
// view::txt($x=250,$i,'name',8,datePlus(date('Y-01-01'),($i/26)-13));
// view::txt($x=250+100,$i,'name',8,fichestock('cgr',datePlus(date('Y-01-01'),($i/26)-13)) );
// view::txt($x=250+200,$i,'name',8,'');
 
?>
<tr bgcolor="white"   >
	<td align="center" ><?php echo datePlus($date,($i/26)-13);?></td>
	
	<td align="center" ><font size="3" color="red"><?php echo fichestock('cgr',datePlus($date,($i/26)-13),$GROUPAGE,$RHESUS);?></font></td>
	<td align="center" ><font size="3" color="green"><?php echo fichestock1('CGR',datePlus($date,($i/26)-13),$GROUPAGE,$RHESUS);?></font></td>
	<td align="center" ><font size="3" color="blue"><?php echo difffichestock('cgr',datePlus($date,($i/26)-13),0,$GROUPAGE,$RHESUS);?></font></td>
	
	<td align="center" ><font size="3" color="red"><?php echo fichestock('pfc',datePlus($date,($i/26)-13),$GROUPAGE,$RHESUS);?></font></td>
	<td align="center" ><font size="3" color="green"><?php echo fichestock1('PFC',datePlus($date,($i/26)-13),$GROUPAGE,$RHESUS);?></font></td>
	<td align="center" ><font size="3" color="blue"><?php echo difffichestock('PFC',datePlus($date,($i/26)-13),0,$GROUPAGE,$RHESUS);?></font></td>
	
	<td align="center" ><font size="3" color="red"><?php echo fichestock('cps',datePlus($date,($i/26)-13),$GROUPAGE,$RHESUS);?></font></td>
	<td align="center" ><font size="3" color="green"><?php echo fichestock1('CPS',datePlus($date,($i/26)-13),$GROUPAGE,$RHESUS);?></font></td>
	<td align="center" ><font size="3" color="blue"><?php echo difffichestock('CPS',datePlus($date,($i/26)-13),0,$GROUPAGE,$RHESUS);?></font></td>
		
</tr>
<?php
}
?>
<tr>
	<th style="width:100px;">DATE</th>
	<th style="width:100px;">ENTREE</th>
	<th style="width:100px;">SORTIE</th>
	<th style="width:100px;">STOCK </th>
	
	<th style="width:100px;">ENTREE</th>
	<th style="width:100px;">SORTIE</th>
	<th style="width:100px;">STOCK</th>
	
	<th style="width:100px;">ENTREE</th>
	<th style="width:100px;">SORTIE</th>
	<th style="width:100px;">STOCK</th>
</tr>


<?php
echo "</table>"; 
// view::sautligne(20);
ob_end_flush();
?>











