<?php 
verifsession();	
view::button('qua','');
lang(Session::get('lang'));
ob_start();
echo "<hr/><br/>" ;
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
	echo "<form   onsubmit=\"return validateForm11(this);\" name=\"form1\"  action=\"".URL."qua/search/0/10\"   method=\"GET\"   >" ;
		echo "<tr bgcolor='#EDF7FF' >" ;
			echo "<td align=\"left\"  >" ;
				echo "<select name=\"o\" style=\"width: 100px;\">" ;
					echo "<option value=\"IDP\">IDP</option>" ;
					echo "<option value=\"GROUPAGE\">GROUPAGE</option>" ;
				echo "</select>" ;
				echo "<input type=\"text\" name=\"q\"  value=\"\"  autofocus /> " ;//<!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
				echo "<img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>" ;
				echo "<input type=\"submit\" name=\"\" value=\"Search qual\"/> " ;
	echo "</form>" ;
				echo "<button  onclick=\"document.location='".URL."qua/';  \"   title=\"New qua\"><img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>New qua</button> " ;
			echo "</td>" ;
            echo "<td align=\"right\"> " ;
				echo "<button  onclick=\"document.location='".URL."qua/imp/';  \"   title=\"Print qual\"><img src=\"".URL."public/images/icons/print.PNG\" width='20' height='20' border='0' alt=''/>Print qual</button> " ;
				echo "<button  onclick=\"document.location='".URL."qua/imp/';  \"   title=\"graphe qual\"><img src=\"".URL."public/images/icons/graph.PNG\" width='20' height='20' border='0' alt=''/>graphe qual</button> " ;
				echo "<button  onclick=\"document.location='".URL."dnr/';  \"       title=\"Search dnr\"><img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>Search dnr</button> " ;
            echo "</td>" ;
        echo "</tr>" ;
echo "</table>" ;
				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style=\"width:50px;\">IDP</th> 
<th style=\"width:80px;\">DATE DON</th> 
<th style=\"width:80px;\">HEURE DON</th>
<th style=\"width:80px;\">GROUPAGE</th>
<th style=\"width:80px;\">RHESUS</th>
<th style=\"width:80px;\">HVB</th>
<th style=\"width:80px;\">HVC</th>
<th style=\"width:80px;\">HIV</th>
<th style=\"width:80px;\">TPHA</th>
<th style=\"width:80px;\">MODIFIER</th>
</tr>";	
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = allow_donate($value['DATEDON']);
		$bgcolor_donate = '#EDF7FF';
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" >  <?php echo $value['IDP'];    ?></td>
			<td align="center" >  <?php echo $value['DATEDON'];    ?></td>
			<td align="center" >  <?php echo $value['HEUREDON'];    ?></td>
			<td <?php echo bgcolor_ABO(trim($value['GROUPAGE']))  ;?>   align="center" >  <?php echo $value['GROUPAGE'];    ?></td>
			<td align="center" >  <?php echo $value['RHESUS'];    ?></td>
			<td <?php echo serologie(trim($value['HVB']));?>  align="center"><?php echo $value['HVB'];?></td>
			<td <?php echo serologie(trim($value['HVC']));?>  align="center" ><?php echo $value['HVC'];?></td>
			<td <?php echo serologie(trim($value['HIV']));?>  align="center" ><?php echo $value['HIV'];?></td>
			<td <?php echo serologie(trim($value['TPHA']));?>  align="center" ><?php echo $value['TPHA'];?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'qua/editqua/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/main_blood_drop.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="12" ><span> No record found for qualification </span></td> </tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="12" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor=""><td align="center" colspan="12" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'qua').'</td></tr>';	
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="12" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'qua/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'qua/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
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
echo '<tr><td align="center" colspan="12" ><span> Click search button to start searching a qualification.</span></td></tr>';
echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="12" ><span>&nbsp;</span></td></tr>';					      
}				
echo "</table>";
?>			

