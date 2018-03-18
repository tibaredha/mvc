<?php 
verifsession();	
view::button('dnr','');
lang(Session::get('lang'));
ob_start();
view::munu('don'); 
			
if (isset($this->userListview)) 
{
?>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:50px;">View</th> 
<th style="width:50px;">Donate</th>
<th style="width:50px;">IDP</th>
<th>Last_First_Name</th>
<th style="width:50px;">Age</th> 
<th style="width:50px;">Gender</th> 
<th style="width:80px;">Blood Type</th>
<th style="width:100px;">Structure</th> 
<th style="width:100px;">Date Donate</th>
<th style="width:50px;">Update </th>
<th style="width:50px;">Delete</th>
<th style="width:50px;">Fdnr</th>
<th style="width:50px;">Cdnr</th>
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
			<td align="left"><a title="EDIT DNR" href="<?php echo URL.'dnr/edit/'.$value['IDDNR'];?>"> <strong><?php echo trim(nbrtostring('dnr','id',$value['IDDNR'],'NOM'))  ."_". strtolower(trim(nbrtostring('dnr','id',$value['IDDNR'],'PRENOM'))); ?></strong></a></td>
			<td align="center" >  <?php echo $value['AGEDNR'];    ?></td>
			<td align="center" >  <?php echo $value['SEXEDNR'];    ?></td>
			<td <?php echo bgcolor_ABO(trim($value['GROUPAGE']))  ;?> align="center" >  <?php echo trim($value['GROUPAGE'])."_[".trim($value['RHESUS'])."]";   ?></td>
			<td align="center" >  <?php echo $value['STR'];    ?></td>
			<td align="center" >  <?php echo $value['DATEDON'];    ?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'don/editdon/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'don/deletedon/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche donneur <?php echo trim($value['IDDNR']).', '.trim($value['IDDNR'])?>'s Record"" href="<?php echo URL.'pdf/FDNRPDF.php?uc='.$value['IDDNR'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="carte donneur <?php echo trim($value['IDDNR']).', '.trim($value['IDDNR'])?>'s Record"" href="<?php echo URL.'pdf/CARTDNRPDF.php?uc='.$value['IDDNR'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			
			</tr>
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="13" ><span> No record found for don </span></td> </tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="13" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor="#00CED1"><td align="center" colspan="13" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'don').'</td></tr>';	
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'Don/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'Don/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor="#00CED1"  ><td align="center" colspan="13" >';	
		?> 
		<button <?php echo ($page<=0)?'disabled':'';?>                  onclick="document.location='<?php echo $prev_url; ?>'"> Previews</button>&nbsp;<?php echo '<span>[' .$total_count1.'/'.$total_count.' Record(s) found.</span>]'; ?>                              
		<button <?php echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'">Next</button>
		<?php 
		echo '</td></tr>';
	   }
}
else 
{
view::sautligne(14);
view::graphemois(30,220,'Dons Par Mois Arret Au  : ','4','don','DATEDON','IND',date("Y"),'IND',"STR IS NOT NULL") ;
view::BOUTONGRAPHE(30,555);				      
}				
echo "</table>";

?>
        
			

