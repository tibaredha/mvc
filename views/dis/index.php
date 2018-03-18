<?php 
verifsession();
view::button('rec','');
lang(Session::get('lang'));
ob_start();
view::munu('dis'); 

$colspan=14;				
if (isset($this->userListview)) 
{
?>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:50px;">F.S.T</th> 
<th style="width:50px;">F.I.T</th>
<th > nom prenom  </th> 
<th style="width:100px;">DATEDIS</th> 
<th style="width:50px;">HEUREDIS</th>
<th style="width:50px;">AGE</th>
<th style="width:50px;">PSL</th>
<th style="width:80px;">Blood Type</th>
<th style="width:50px;">IDP</th>
<th style="width:140px;">SERVICE</th>
<th style="width:140px;">MED</th>
<th style="width:50px;">I.T</th>
<th style="width:50px;">Update </th>
<th style="width:50px;">Delete</th>
</tr>
<?php	
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = allow_donate($value['DATEDIS']);
		$bgcolor_donate ='#EDF7FF';
        ?>
			            <tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="fiche de surveillance transfusionnelle" href="<?php echo URL.'pdf/fst.php?id='.$value['id'].'&IDDNR='.$value['IDREC'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='20' height='20' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="fiche d’incident transfusionnel" href="<?php echo URL.'pdf/inc.php?id='.$value['id'].'&IDDNR='.$value['IDREC'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='20' height='20' border='0' alt=''/></a></td>       
						<td align="left"> <strong><?php echo trim(nbrtostring('rec','id',$value['IDREC'],'NOM'))  ."_". strtolower(trim(nbrtostring('rec','id',$value['IDREC'],'PRENOM'))); ?></strong></td>
						<td align="center"><?php echo $value['DATEDIS']; ?></td>
						<td align="center"><?php echo $value['HEUREDIS'];?></td>
						<td align="center"><?php echo $value['AGE'];    ?></td>
						<td align="center"><?php echo $value['PSL'];    ?></td>
						<td <?php echo bgcolor_ABO($value['GROUPAGE'])  ;?> align="center" >  <?php echo $value['GROUPAGE']."_[".$value['RHESUS']."]";   ?></td>
						<td align="center"><?php echo $value['IDP'];    ?></td>
						<td align="left"><?php echo view::nbrtostring('ser','id',$value['SERVICE'],'service'); //echo $value['SERVICE'];?></td>
						<td align="left"><?php echo 'Dr: '.view::nbrtostring('grh','idp',$value['MED'],'Nomlatin');?></td>
						<td align="center"><a title="incident" href="<?php echo URL.'dis/incident/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/cancel.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a title="editer" href="<?php echo URL.'dis/editdis/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'dis/deletedis/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						</tr>
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for Distribution </span></td> </tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor="#00CED1"><td align="center" colspan="'.$colspan.'" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'dis').'</td></tr>';	
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'dis/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'dis/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor="#00CED1"  ><td align="center" colspan="'.$colspan.'" >';	
		?> 
		<button <?php echo ($page<=0)?'disabled':'';?>           onclick="document.location='<?php echo $prev_url; ?>'"> Previews</button>&nbsp;<?php echo'[<span>' .$total_count1.'/'.$total_count.' Record(s) found.</span>]';//echo $page. ' / ' . $total_page; ?>                              
		<button <?php echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'">Next</button>
		<?php 
		echo '</td></tr>';	
		//echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ></td></tr>';					
	   }
}
else 
{
view::sautligne(12);
view::graphemoisdx(30,220,'Etat Des Etat Des Distributions CGR  ARRET AU  :','CGR','1');
view::BOUTONGRAPHE3(30,555);				      
}				
echo "</table>";
?>

