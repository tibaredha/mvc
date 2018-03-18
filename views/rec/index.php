<?php 
verifsession();
view::button('rec','');
lang(Session::get('lang'));
ob_start();
view::munu('rec'); 
?>

<?php
$colspan=13;				
if (isset($this->userListview)) 
{
?>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:50px;">Photos</th> 
<th style="width:50px;">View</th> 
<th style="width:50px;">PSL</th>
<th>First_Last_Name</th>
<th style="width:100px;">Birthday</th> 
<th style="width:80px;">Gender</th> 
<th style="width:80px;">Blood Type</th>
<th style="width:110px;">Telephone</th> 
<th style="width:100px;">nbr dis</th>
<th style="width:100px;">Last reception</th>
<th style="width:50px;">Update </th>
<th style="width:50px;">Delete</th>
<th style="width:50px;">Print</th>
</tr>
<?php
	
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = allow_donate($value['DDT']);
		$bgcolor_donate ='#EDF7FF';
        $fichier = photosmfx('rec',$value['id'].'.jpg',$value['SEX']) ;
            echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
		    echo "<td align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."rec/upl/".$value['id']."\" ><img  src=\"".URL."public/webcam/rec/".$fichier."\"  width='20' height='20' border='1' alt='photos'></td> " ;
		?>
			
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'rec/view/'.$value['id'];?>'"   title="View <?php   echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'rec/discgr/'.$value['id'];?>'" title="Distribution CGR <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'s Record" <?php //echo ($allow_donate==FALSE)?'disabled':'';?> >&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/gs.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			
			<td align="left"><a title="view" href="<?php echo URL.'rec/view/'.$value['id'];?>"><strong><?php echo $value['NOM']."_". strtolower($value['PRENOM']).' ['.strtolower(trim($value['FILSDE'])).'] '; ?></strong></a></td>
			<td align="center" >  <?php echo $value['DATENAISSANCE'];    ?></td>
			<td align="center" >  <?php echo $value['SEX'];    ?></td>
			<td <?php echo bgcolor_ABO($value['GRABO'])  ;?> align="center" >  <?php echo $value['GRABO']."_[".$value['GRRH']."]";   ?></td>
			<td align="center" >  <?php echo $value['TELEPHONE'];    ?></td>
			<td align="center" >  <?php echo disparrec($value['id']);?></td>
			<td align="center" >  <?php echo $value['DDT'];    ?></td>
			<td align="center"><a title="editer <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'s Record" href="<?php echo URL.'rec/edit/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="supprimer dabord les distribution  <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'s Record"  class="delete"   href="<?php echo URL.'rec/delete/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche transfusionnelle   <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'s Record" href="<?php echo URL.'pdf/fichetrans.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for receveur </span></td> </tr>';
		header('location: ' . URL . 'rec/newrec/'.$this->userListviewq);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor="#00CED1"><td align="center" colspan="'.$colspan.'" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'rec').'</td></tr>';	
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'rec/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'rec/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor="#00CED1"  ><td align="center" colspan="'.$colspan.'" >';	
		?> 
		<button <?php echo ($page<=0)?'disabled':'';?>           onclick="document.location='<?php echo $prev_url; ?>'"> Previews</button>&nbsp;<?php echo '[<span>' .$total_count1.'/'.$total_count.' Record(s) found.</span>]';   //echo $page. ' / ' . $total_page; ?>                              
		<button <?php echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'">Next</button>
		<?php 
		echo '</td></tr>';	
	   }
}
else 
{
view::sautligne(12);
view::graphemoisdnr(30,220,'Receveurs Par Mois Arret Au  : ','4','rec','DINS','SRS',date("Y"),'4',"SRS IS NOT NULL");	
view::BOUTONGRAPHE2(30,555);					      
}				
echo "</table>";
?>

