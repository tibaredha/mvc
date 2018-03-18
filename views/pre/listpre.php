<?php 
verifsession();	
view::button('pre','');
?>       
<h2>Preparation  : list </h2 >

<hr/><br/>
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
            <form  onsubmit="return validateForm11(this);"   name="form1" action="<?php echo URL; ?>pre/search/0/10" method="GET">
            <tr bgcolor='#EDF7FF' >
                <td align="left"  >
                    <label for="q">Search Keyword</label>
                    <input type="text" name="q"  value=""  autofocus />  
					<img src="<?php echo URL.'public/images/icons/search.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
				</td>
                <td align="center"  >
                <select name="o" style="width: 100px;">
							<option value="IDP" >IDP</option>
							<option value="GROUPAGE" >Blood Type</option>
					</select>
					<input type="submit" name="" value="Search pre" /> 
					<img src="<?php echo URL.'public/images/icons/search.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>   
                </form>
				<td align="center"> <button onclick=" document.location='<?php echo URL.'pre/';?>'  "         title="New pre">  <img src="<?php echo URL.'public/images/icons/add.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;New pre </button></td>
                <td align="center"> <button onclick=" document.location='<?php echo URL.'pre/imp/';?>'  "  title="Print pre"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;Print pre </button></td>
				<td align="center"> <button onclick=" document.location='<?php //echo URL.'don/IND/';?>'  "  title="graphe pre"><img src="<?php echo URL.'public/images/icons/graph.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;graphe pre </button></td>
				<td align="center"> <button onclick=" document.location='<?php echo URL.'dnr/';?>'  "  title="Print pre"><img src="<?php echo URL.'public/images/icons/search.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;Search dnr </button></td>			
			</tr>
</table>
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:50px;">IDP</th> 
<th style="width:80px;">DATE DON</th> 
<th style="width:80px;">HEURE DON</th>
<th style="width:80px;">GROUPAGE</th>
<th style="width:80px;">RHESUS</th>
<th style="width:80px;">VI</th>
<th style="width:80px;">FDS</th>
<th style="width:80px;">AC</th>
<th style="width:80px;">PCC</th>
<th style="width:80px;">CGR</th>
<th style="width:80px;">PFC</th>
<th style="width:80px;">CPS</th>
<th style="width:80px;">MODIFIER</th>
</tr>
<?php				
if (isset($this->userListview)) 
{	
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
			<td   align="center"><?php echo $value['VI'];?></td>
			<td   align="center" ><?php echo $value['FDS'];?></td>
			<td   align="center" ><?php echo $value['AC'];?></td>
			<td   align="center" ><?php echo $value['PCC'];?></td>
			<td   align="center" ><?php echo $value['CGR'];?></td>
			<td   align="center" ><?php echo $value['PFC'];?></td>
			<td   align="center" ><?php echo $value['CPS'];?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'pre/editpre/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="13" ><span> No record found for Preparation </span></td> </tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="13" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor=""><td align="center" colspan="13" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'pre').'</td></tr>';	
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="13" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'pre/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'pre/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor=""  ><td align="center" colspan="13" >';	
		?> 
		<button <?php echo ($page<=0)?'disabled':'';?>           onclick="document.location='<?php echo $prev_url; ?>'"> Previews</button>&nbsp;&nbsp;&nbsp;<?php //echo $page. ' / ' . $total_page; ?>&nbsp;&nbsp;&nbsp;                              
		<button <?php echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'">Next</button>
		<?php 
		echo '</td></tr>';	     
	    }
}
else 
{
echo '<tr><td align="center" colspan="13" ><span> Click search button to start searching a Preparation.</span></td></tr>';
echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="13" ><span>&nbsp;</span></td></tr>';					      
}				
echo "</table>";
?>			

