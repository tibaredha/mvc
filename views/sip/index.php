<?php 
verifsession();	
?>
<script>

// alert('Women: Search');
//Commentaires de fin de ligne
/*
Commentaires multilignes
*/
// var myVariable;
// myVariable = 2;
//Le type numérique (alias number) :var number = 5.5;
//Les chaînes de caractères (alias string) :var text = 'Ça c\'est quelque chose !';
//Les booléens (alias boolean) :var isTrue = true  var isFalse = false;
// alert(typeof myVariable);
// var text = prompt('Tapez quelque chose :');

// if (confirm('Voulez-vous exécuter le code Javascript de cette page ?')) {
// alert('Le code a bien été exécuté !');
// }


 
</script>

<h2>Women: Search </h2 >
<input type="button" onClick="history.back();" value="<-- Back">
<input type="button" onClick="history.forward();" value="Forward -->">
<hr /><br />
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
            <form  onsubmit="return validateForm1(this);"   name="form1" action="<?php echo URL; ?>sip/search/0/10" method="GET">
            <tr bgcolor='#EDF7FF' >
                <td align="left"  >
                    <label for="q">Search Keyword</label>
                    <input type="text" name="q"  value=""  autofocus />  <!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
					<img src="<?php echo URL.'public/images/icons/search.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
				</td>
                <td align="center"  >
                <select name="o" style="width: 100px;">
							<option value="NOM" >women</option>
							<option value="GRABO" >Blood Type</option>
							<option value="SEX" >Gender</option>
					</select>
					<input type="submit" name="" value="Search women" /> 
					<img src="<?php echo URL.'public/images/icons/search.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>   
                </form>
				<td align="center"> <button onclick=" document.location='<?php echo URL.'sip/newdnr/';?>'  "   title="New donor"  ><img src="<?php echo URL.'public/images/icons/add.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;New Women 
					</button></td>
					
            </tr>
</table>
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:50px;">View</th> 
<th style="width:100px;">New </th>
<th>First_Last_Name</th>
<th style="width:80px;">Gender</th> 
<th style="width:80px;">Blood Type</th>
<th style="width:100px;">Last Delivery</th>
<th style="width:50px;">Update </th>
<th style="width:50px;">Delete</th>
<th style="width:50px;">Print</th>
</tr>
<?php				
if (isset($this->userListview)) 
{	
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = allow_donate($value['DATE']);
		$bgcolor_donate = bgcolor_donate ($allow_donate);
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'sip/view/'.$value['id'];?>'"   title="View pregnancy <?php   echo $value['NOM'].', '.$value['PRENOM']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'sip/Donate/'.$value['id'];?>'" title="New pregnancy <?php echo $value['NOM'].', '.$value['PRENOM']?>'s Record" <?php echo ($allow_donate==FALSE)?'disabled':'';?> >&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/gs.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="left">     <?php echo $value['NOM']."_". strtolower($value['PRENOM']); ?></td>
			<td align="center" >  <?php echo $value['SEX'];    ?></td>
			<td <?php echo bgcolor_ABO($value['GRABO'])  ;?> align="center" >  <?php echo $value['GRABO']."_[".$value['GRRH']."]";   ?></td>
			<td align="center" >  <?php echo $value['DATE'];    ?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'sip/edit/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'sip/delete/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="imprimer pdf" href="<?php echo URL.'sip/pdf/pdf.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="9" ><span> No record found for donor </span></td> </tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="9" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor=""><td align="center" colspan="9" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'sip').'</td></tr>';	
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="9" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'sip/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'sip/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor=""  ><td align="center" colspan="9" >';	
		?> 
		<button <?php echo ($page<=0)?'disabled':'';?>           onclick="document.location='<?php echo $prev_url; ?>'"> Previews</button>&nbsp;&nbsp;&nbsp;<?php //echo $page. ' / ' . $total_page; ?>&nbsp;&nbsp;&nbsp;                              
		<button <?php echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'">Next</button>
		<?php 
		echo '</td></tr>';	     
	   }
}
else 
{
echo '<tr><td align="center" colspan="9" ><span> Click search button to start searching a donor.</span></td></tr>';
echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="9" ><span>&nbsp;</span></td></tr>';					      
}				
echo "</table>";
?>
        


