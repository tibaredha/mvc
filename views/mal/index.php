<?php 
verifsession();	
view::button('qua','');
?>

<hr /><br />
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
            <form  onsubmit="return validateForm1(this);"   name="form11" action="<?php echo URL; ?>mal/search/0/10" method="GET">
            <tr bgcolor='#EDF7FF' >
                <td align="left"  >
                    <select name="o" style="width: 100px;">
							<option value="NOM" >Nom Patient</option>
							<option value="NUM" >ID Patient</option>
							<option value="SEX" >Gender Patient</option>
					</select>
                    <input type="text" name="q"  value=""  autofocus />  <!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
					<img src="<?php echo URL.'public/images/icons/search.PNG';?>" width='20' height='20' border='0' alt=''/>
					<input type="submit" name="" value="Search Patient" />   
					</form>
					<button onclick=" document.location='<?php echo URL.'mal/newmal/';?>'  "   title="New Patient"  ><img src="<?php echo URL.'public/images/icons/add.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;New Patient</button>
                </td>   
              
				<td align="center"> 
				
				<button onclick=" document.location='<?php echo URL.'mal/impmal/';?>'  "   title="New Patient"  ><img src="<?php echo URL.'public/images/icons/add.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;Imprimer Patient</button>
				</td>
            </tr>
</table>

<?php				
if (isset($this->userListview)) 
{
?>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:80px;">NUM</th>
<th style="width:50px;">Qualifier</th>
<th>First_Last_Name</th>
<th style="width:100px;">Date Naissance</th> 
<th style="width:80px;">Gender</th> 
<th style="width:80px;">Blood Type</th>
<th style="width:110px;">Telephone</th> 
<th style="width:25px;">HVB</th> 
<th style="width:25px;">HVC</th> 
<th style="width:25px;">HIV</th> 
<th style="width:25px;">TPHA</th> 
<th style="width:120px;">Date Qualification</th>
<th style="width:50px;">Update </th>
<th style="width:50px;">Delete</th>
<th style="width:50px;">Print</th>
<th style="width:50px;">CPN</th>
</tr>

<?php	
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = allow_donate($value['DQ']);
		$bgcolor_donate = bgcolor_donate ($allow_donate);
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" >  <?php echo $value['NUM'];    ?></td>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'mal/qualifier/'.$value['id'];?>'" title="Donate <?php echo $value['NOM'].', '.$value['PRENOM']?>'s Record" <?php //echo ($allow_donate==FALSE)?'disabled':'';?> >&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/gs.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="left">     <?php echo trim($value['NOM'])."_". strtolower(trim($value['PRENOM'])); ?></td>
			<td align="center" >  <?php echo $value['DATENAISSANCE'];    ?></td>
			<td align="center" >  <?php echo $value['SEX'];    ?></td>
			<td <?php echo bgcolor_ABO(trim($value['GRABO']))  ;?> align="center" >  <?php echo trim($value['GRABO'])."_[".trim($value['GRRH'])."]";   ?></td>
			<td align="center" >  <?php echo $value['TELEPHONE'];    ?></td>
			<td align="center" ><button onclick=" document.location='<?php echo URL.'PDF/FHVBM.php?uc='.$value['id'];?>'"title="HVB" <?php //echo ($value['HVB']=='negatif')?'disabled':'';?> ><?php echo $value['HVB'];?></button></td>
			<td align="center" ><button onclick=" document.location='<?php echo URL.'PDF/FHVCM.php?uc='.$value['id'];?>'"title="HVC" <?php echo ($value['HVC']=='negatif')?'disabled':'';?> ><?php echo $value['HVC'];?></button></td>
			<td align="center" ><button onclick=" document.location='<?php echo URL.'PDF/FHIVM.php?uc='.$value['id'];?>'"title="HIV" <?php echo ($value['HIV']=='negatif')?'disabled':'';?> ><?php echo $value['HIV'];?></button></td>
			<td align="center" ><button onclick=" document.location='<?php echo URL.'MAL/FICHEIPA/'.$value['id'];?>'"title="TPHA" <?php //echo ($value['TPHA']=='negatif')?'disabled':'';?> ><?php echo $value['TPHA'];?></button></td>
			<td align="center" >  <?php echo $value['DQ'];    ?></td>
			<td align="center"><a title="Editer" href="<?php echo URL.'mal/edit/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="Delete" title="supprimer" href="<?php echo URL.'mal/delete/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="Resultat qualification <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'s Record"" href="<?php echo URL.'pdf/RESMALPDF.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="Certificat Prenuptial <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'s Record"" href="<?php echo URL.'pdf/CPNMAL.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="16" ><span> No record found for malade </span></td> </tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="16" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor=""><td align="center" colspan="16" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'mal').'</td></tr>';	
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="16" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'mal/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'mal/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor=""  ><td align="center" colspan="16" >';	
		?> 
		<button <?php echo ($page<=0)?'disabled':'';?>           onclick="document.location='<?php echo $prev_url; ?>'"> Previews</button>&nbsp;&nbsp;&nbsp;<?php //echo $page. ' / ' . $total_page; ?>&nbsp;&nbsp;&nbsp;                              
		<button <?php echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'">Next</button>
		<?php 
		echo '</td></tr>';	     
	   }
}
else 
{

view::sautligne(14);
view::graphemoisdnr(30,220,'New Patient Par Mois Arret Au  : ','4','mal','DINS','SRS',date("Y"),'4',"SRS IS NOT NULL");	
view::BOUTONGRAPHE4(30,555);
$x=1120;
$y=220;
echo "<div class=\"mydiv\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
echo "<marquee behavior=\"scroll\" direction=\"up\" scrollamount=\"3\" scrolldelay=\"80\" onmouseover=\"this.stop()\"onmouseout=\"this.start()\" height=\"252\" width=\"350\" bgcolor=\"GREEN\">";
echo "<H2 align=\"center\">Bienvenue sur G-PTS 4.0 </H2>";
echo "<p align=\"center\"><img  id=\"mydiv2\"   align=\"center\"  src=\"".URL.'public/images/photos/1.JPG'."\" width=\"300\" height=\"300\" alt=\"1\" /></p>";
echo "<H3 align=\"center\">1. l PTS  ain oussera </H3>";
echo "<p align=\"center\"><img  id=\"mydiv2\"   align=\"center\"  src=\"".URL.'public/images/photos/3.JPG'."\" width=\"300\" height=\"300\" alt=\"1\" /></p>";
echo "</marquee>";
echo "</div>";				  			      
}				
echo "</table>";
?>
        

