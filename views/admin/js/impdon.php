<?php 
verifsession();	
view::button('dnr','');
?>
<hr/><br/>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
            <form  onsubmit="return validateForm11(this);"   name="form1" action="<?php echo URL; ?>Don/search/0/10" method="GET">
            <tr bgcolor='#EDF7FF' >
                <td align="left"  >
				<select name="o" style="width: 100px;">
							<option value="IDP" >IDP</option>
							<option value="IDDNR" >IDDNR</option>	
							<option value="GROUPAGE" >Blood Type</option>
							<option value="SEXEDNR" >Gender</option>
					</select>
                    <input type="text" name="q"  value=""  autofocus />  
					<img src="<?php echo URL.'public/images/icons/search.PNG';?>" width='20' height='20' border='0' alt=''/>
					<input type="submit" name="" value="Search don" /> 	
                </td>   
                </form>
				<td align="right"> 

                 <button onclick=" document.location='<?php echo URL.'don/impdon/';?>'  "  title="Print don"> <img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;Print don </button>
				 <button onclick=" document.location='<?php echo URL.'don/IND/';?>'  "     title="graphe don"><img src="<?php echo URL.'public/images/icons/graph.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;graphe don </button>
				 <button onclick=" document.location='<?php echo URL.'dnr/';?>'  "         title="Print don"> <img src="<?php echo URL.'public/images/icons/search.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;Search dnr </button>
				</td>			
			</tr>
</table>

<?php				
if (isset($this->userListview)) 
{
?>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:50px;">View</th> 
<th style="width:50px;">Donate</th>
<th style="width:100px;">IDP</th>
<th>Last_First_Name</th>
<th style="width:100px;">Age</th> 
<th style="width:80px;">Gender</th> 
<th style="width:80px;">Blood Type</th>
<th style="width:110px;">Structure</th> 
<th style="width:100px;">Date Donate</th>
<th style="width:50px;">Update </th>
<th style="width:50px;">Delete</th>
<th style="width:50px;">Print</th>
</tr>
<?php		
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = allow_donate($value['DATEDON']);
		$bgcolor_donate = bgcolor_donate ($allow_donate);
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'dnr/view/'.$value['IDDNR'];?>'"   title="View <?php   echo $value['IDDNR'].', '.$value['IDDNR']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'dnr/Donate/'.$value['IDDNR'];?>'" title="Donate <?php echo $value['IDDNR'].', '.$value['IDDNR']?>'s Record" <?php echo ($allow_donate==FALSE)?'disabled':'';?> >&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/gs.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" >  <?php echo $value['IDP'];    ?></td>
			<td align="left"><a title="view" href="<?php echo URL.'dnr/view/'.$value['IDDNR'];?>"> <strong><?php echo trim(nbrtostring('dnr','id',$value['IDDNR'],'NOM'))  ."_". strtolower(trim(nbrtostring('dnr','id',$value['IDDNR'],'PRENOM'))); ?></strong></a></td>
			<td align="center" >  <?php echo $value['AGEDNR'];    ?></td>
			<td align="center" >  <?php echo $value['SEXEDNR'];    ?></td>
			<td <?php echo bgcolor_ABO(trim($value['GROUPAGE']))  ;?> align="center" >  <?php echo trim($value['GROUPAGE'])."_[".trim($value['RHESUS'])."]";   ?></td>
			<td align="center" >  <?php echo $value['STR'];    ?></td>
			<td align="center" >  <?php echo $value['DATEDON'];    ?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'don/editdon/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'don/deletedon/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche don<?php echo trim($value['IDDNR']).', '.trim($value['IDDNR'])?>'s Record"" href="<?php echo URL.'pdf/FDNRPDF.php?uc='.$value['IDDNR'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="12" ><span> No record found for don </span></td> </tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="12" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor=""><td align="center" colspan="12" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'don').'</td></tr>';	
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="12" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'Don/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'Don/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor=""  ><td align="center" colspan="12" >';	
		?> 
		<button <?php echo ($page<=0)?'disabled':'';?>           onclick="document.location='<?php echo $prev_url; ?>'"> Previews</button>&nbsp;&nbsp;&nbsp;<?php //echo $page. ' / ' . $total_page; ?>&nbsp;&nbsp;&nbsp;                              
		<button <?php echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'">Next</button>
		<?php 
		echo '</td></tr>';	     
	   }
}
else 
{
echo '</br>';
echo '</br>';
echo '</br>';
echo '</br>';
echo '</br>';
echo '</br>';
echo '</br>';
echo '</br>';
$x=30;
$y=380;
echo "<div class=\"mydiv\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
?>
<form method="post" action="<?php echo URL.'pdf/impdon.php' ;?>">
	<label>ordre</label><?php   combov1('ordre',array("IDP"=>"IDP","IDDNR"=>"IDDNR","DATE DON"=>"DATEDON"));   ?><br />
	<label>ascdesc</label><?php combov1('ascdesc',array("décroissant"=>"desc","croissant"=>"asc"));    ?><br />
	<label>groupage</label><?php combov1('groupage',array("Tous Groupage"=>"IS NOT NULL","A"=>"='A'","B"=>"='B'","AB"=>"='AB'","O"=>"='O'"));   ?><br />
	<label>rhesus</label><?php   combov1('rhesus',array("Tous Rhesus "=>"IS NOT NULL","Positif"=>"='Positif'","negatif"=>"='negatif'"));?><br />
	<label>fixemobile</label><?php combov1('fixemobile',array("Tous Fixe et Mobile"=>"IS NOT NULL","fixe"=>"='FIXE'","mobile"=>"='MOBILE'"));?><br />
	<label>indication</label><?php combov1('IND',array("IND"=>"='IND'","CIDT"=>"='CIDT'","CIDD"=>"='CIDD'"));?><br />
	<label>nbrlimit</label><?php combov1('nbrlimit',array("Limiter A 10"=>"10","Limiter A 20"=>"20","Limiter A 30"=>"30","Limiter A 40"=>"40","Limiter A 50"=>"50","Limiter A 60"=>"60","Limiter A 70"=>"70","Limiter A 80"=>"80","Limiter A 90"=>"90","Limiter A 100"=>"100","Limiter A 1000"=>"1000","Limiter A 10000"=>"10000"));?><br />
	<label>&nbsp;</label><input type="submit" />
</form>

<?php
echo "</div>";
$x=1120;
$y=380;
echo "<div class=\"mydiv\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
echo "<marquee behavior=\"scroll\" direction=\"up\" scrollamount=\"3\" scrolldelay=\"80\" onmouseover=\"this.stop()\"onmouseout=\"this.start()\" height=\"252\" width=\"350\" bgcolor=\"GREEN\">";
echo "<H2 align=\"center\">Bienvenue sur G-PTS 4.0 </H2>";
echo "<p align=\"center\"><img  id=\"mydiv2\"   align=\"center\"  src=\"".URL.'public/images/photos/1.JPG'."\" width=\"300\" height=\"300\" alt=\"1\" /></p>";
echo "<H3 align=\"center\">1. l PTS  ain oussera </H3>";
echo "<p align=\"center\"><img  id=\"mydiv2\"   align=\"center\"  src=\"".URL.'public/images/photos/3.JPG'."\" width=\"300\" height=\"300\" alt=\"1\" /></p>";
echo "</marquee>";
echo "</div>";
// echo '<tr><td align="center" colspan="12" ><span> Click search button to start searching a don.</span></td></tr>';
// echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="12" ><span>&nbsp;</span></td></tr>';					      
}				
echo "</table>";
?>
        
			




    
    
	
	
	
	





