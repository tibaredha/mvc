<?php	
verifsession();	
view::button('mnpe','');
lang(Session::get('lang'));
ob_start();
?>

<h2>Rapport</h2>

<hr/><br/>
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:10px;"  colspan="14"    >
Selon Le Degre De Gravite De MPE Depiste
<?php
echo '<a href="'.URL.'pdf/imprapmnpe.php">Imprimer</a>'; echo '&nbsp;';
$bgcolor_donate ='#EDF7FF';	
?>
</th>
</tr>
<tr>
<th style="width:300px;" rowspan="2"     >Tranche d'age</th>
<th style="width:300px;" rowspan="2"  >Nombre Enfant Examines</th>
<th style="width:10px;"  colspan="4"    >
Insuffisance  ponderale  poids /age
</th>
<th style="width:10px;"  colspan="4"    >
Retard statural  taille / age
</th>
<th style="width:10px;"  colspan="4"    >
Maigreur poids /taille
</th>
</tr>
<tr>
<th style="width:100px;">A</th>
<th style="width:100px;">B</th>
<th style="width:100px;">C</th>
<th style="width:100px;">D</th>

<th style="width:100px;">A</th>
<th style="width:100px;">B</th>
<th style="width:100px;">C</th>
<th style="width:100px;">D</th>

<th style="width:100px;">A</th>
<th style="width:100px;">B</th>
<th style="width:100px;">C</th>
<th style="width:100px;">D</th>
</tr>

<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
<td align="center" > 0 a 28 jours </td>
<td align="center" > <?php echo nbrmnpeabcd0(0,0);?></td>
<td align="center" > <?php echo nbrmnpeabcd(0,0,'IPA','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(0,0,'IPA','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(0,0,'IPA','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(0,0,'IPA','D');?></td>

<td align="center" > <?php echo nbrmnpeabcd(0,0,'ISTA','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(0,0,'ISTA','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(0,0,'ISTA','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(0,0,'ISTA','D');?></td>

<td align="center" > <?php echo nbrmnpeabcd(0,0,'IPT','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(0,0,'IPT','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(0,0,'IPT','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(0,0,'IPT','D');?></td>
</tr>

<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
<td align="center" > 29j a 05mois </td>
<td align="center" > <?php echo nbrmnpeabcd0(1,5);?></td>
<td align="center" > <?php echo nbrmnpeabcd(1,5,'IPA','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(1,5,'IPA','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(1,5,'IPA','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(1,5,'IPA','D');?></td>

<td align="center" > <?php echo nbrmnpeabcd(1,5,'ISTA','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(1,5,'ISTA','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(1,5,'ISTA','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(1,5,'ISTA','D');?></td>

<td align="center" > <?php echo nbrmnpeabcd(1,5,'IPT','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(1,5,'IPT','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(1,5,'IPT','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(1,5,'IPT','D');?></td>
</tr>			

<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
<td align="center" > 06 a 11 mois </td>
<td align="center" > <?php echo nbrmnpeabcd0(6,11);?></td>
<td align="center" > <?php echo nbrmnpeabcd(6,11,'IPA','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(6,11,'IPA','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(6,11,'IPA','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(6,11,'IPA','D');?></td>

<td align="center" > <?php echo nbrmnpeabcd(6,11,'ISTA','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(6,11,'ISTA','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(6,11,'ISTA','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(6,11,'ISTA','D');?></td>

<td align="center" > <?php echo nbrmnpeabcd(6,11,'IPT','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(6,11,'IPT','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(6,11,'IPT','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(6,11,'IPT','D');?></td>
</tr>


<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
<td align="center" > 12 a 23 mois </td>
<td align="center" > <?php echo nbrmnpeabcd0(12,23);?></td>
<td align="center" > <?php echo nbrmnpeabcd(12,23,'IPA','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(12,23,'IPA','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(12,23,'IPA','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(12,23,'IPA','D');?></td>

<td align="center" > <?php echo nbrmnpeabcd(12,23,'ISTA','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(12,23,'ISTA','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(12,23,'ISTA','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(12,23,'ISTA','D');?></td>

<td align="center" > <?php echo nbrmnpeabcd(12,23,'IPT','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(12,23,'IPT','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(12,23,'IPT','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(12,23,'IPT','D');?></td>
</tr>

<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
<td align="center" > 24 a 35 mois </td>
<td align="center" > <?php echo nbrmnpeabcd0(24,35);?></td>
<td align="center" > <?php echo nbrmnpeabcd(24,35,'IPA','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(24,35,'IPA','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(24,35,'IPA','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(24,35,'IPA','D');?></td>

<td align="center" > <?php echo nbrmnpeabcd(24,35,'ISTA','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(24,35,'ISTA','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(24,35,'ISTA','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(12,35,'ISTA','D');?></td>

<td align="center" > <?php echo nbrmnpeabcd(24,35,'IPT','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(24,35,'IPT','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(24,35,'IPT','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(24,35,'IPT','D');?></td>
</tr>

<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
<td align="center" > 36 a 59 mois <?php //echo $value['AGE'];?></td>
<td align="center" > <?php echo nbrmnpeabcd0(36,59);?></td>
<td align="center" > <?php echo nbrmnpeabcd(36,59,'IPA','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(36,59,'IPA','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(36,59,'IPA','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(36,59,'IPA','D');?></td>

<td align="center" > <?php echo nbrmnpeabcd(36,59,'ISTA','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(36,59,'ISTA','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(36,59,'ISTA','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(36,59,'ISTA','D');?></td>

<td align="center" > <?php echo nbrmnpeabcd(36,59,'IPT','A');?></td>
<td align="center" > <?php echo nbrmnpeabcd(36,59,'IPT','B');?></td>
<td align="center" > <?php echo nbrmnpeabcd(36,59,'IPT','C');?></td>
<td align="center" > <?php echo nbrmnpeabcd(36,59,'IPT','D');?></td>
</tr>			
			
<tr>
<th style="width:300px;">Total</th>
<th style="width:300px;"> <?php echo nbrmnpeabcdt();?> </th>
<th style="width:100px;"> <?php echo nbrmnpeabcdtc('IPA','A');?></th>
<th style="width:100px;"> <?php echo nbrmnpeabcdtc('IPA','B');?></th>
<th style="width:100px;"> <?php echo nbrmnpeabcdtc('IPA','C');?></th>
<th style="width:100px;"> <?php echo nbrmnpeabcdtc('IPA','D');?></th>

<th style="width:100px;"> <?php echo nbrmnpeabcdtc('ISTA','A');?></th>
<th style="width:100px;"> <?php echo nbrmnpeabcdtc('ISTA','B');?></th>
<th style="width:100px;"> <?php echo nbrmnpeabcdtc('ISTA','C');?></th>
<th style="width:100px;"> <?php echo nbrmnpeabcdtc('ISTA','D');?></th>

<th style="width:100px;"> <?php echo nbrmnpeabcdtc('IPT','A');?></th>
<th style="width:100px;"> <?php echo nbrmnpeabcdtc('IPT','B');?></th>
<th style="width:100px;"> <?php echo nbrmnpeabcdtc('IPT','C');?></th>
<th style="width:100px;"> <?php echo nbrmnpeabcdtc('IPT','D');?></th>
</tr>
<?php
echo "</table>";
// view::sautligne(6);
ob_end_flush();
?>



	