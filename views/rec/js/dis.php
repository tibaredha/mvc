<?php 
verifsession();
buttondis();
?>
<script type="text/javascript">
function showCustomer(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","dis/search/0/10?q="+str+"&o=NOM ",true);
xmlhttp.send();
}
//oninput="showCustomer(this.value)"<div id="txtHint">Customer info will be listed here...</div> en cour dexploration 
</script>
<h2>Distribution : Search </h2 >
<br /><br />
<hr /><br />

<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
            <form  onsubmit="return validateForm1(this);"   name="form1" action="<?php echo URL; ?>dis/search/0/10" method="GET">
            <tr bgcolor='#EDF7FF' >
                <td align="left"  >
					<label for="q">Search Keyword</label>
                    <input type="text" name="q"  value=""   />  <!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
					<img src="<?php echo URL.'public/images/icons/search.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
				</td>
                <td align="center"  >
                <select name="o" style="width: 100px;">
							<option value="IDREC" >Recever</option>
							<option value="GROUPAGE" >Blood Type</option>
							<option value="SEX" >Gender</option>
					</select>
					<input type="submit" name="" value="Search Distribution" /> 
					<img src="<?php echo URL.'public/images/icons/search.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>   
                </form>
				<td align="center"> <button onclick=" document.location='<?php echo URL.'rec/';?>'  "         title="New Distribution"><img src="<?php echo URL.'public/images/icons/add.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;New Dist </button></td>
				<td align="center"> <button onclick=" document.location='<?php echo URL.'dis/impdis/';?>'  "  title="Print Distribution"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;Print Dist </button></td>
			    <td align="center"> <button onclick=" document.location='<?php echo URL.'dis/CGR/';?>'  "  title="Graphe Distribution"><img src="<?php echo URL.'public/images/icons/graph.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;Graphe Dist </button></td>
				<td align="center"> <button onclick=" document.location='<?php echo URL.'rec/';?>'  "         title="Search receveur"><img src="<?php echo URL.'public/images/icons/search.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;Search rec </button></td>
			</tr>
</table>
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
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
<th style="width:120px;">SERVICE</th>
<th style="width:100px;">MED</th>
<th style="width:50px;">I.T</th>
<th style="width:50px;">Update </th>
<th style="width:50px;">Delete</th>
</tr>
<?php				
if (isset($this->userListview)) 
{	
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = allow_donate($value['DATEDIS']);
		$bgcolor_donate ='#EDF7FF';
        ?>
			            <tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="fiche de surveillance transfusionnelle" href="<?php echo URL.'pdf/fst.php?id='.$value['id'].'&IDDNR='.$value['IDREC'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="fiche d’incident transfusionnel" href="<?php echo URL.'pdf/inc.php?id='.$value['id'].'&IDDNR='.$value['IDREC'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="left"> <strong><?php echo trim(nbrtostring('rec','id',$value['IDREC'],'NOM'))  ."_". strtolower(trim(nbrtostring('rec','id',$value['IDREC'],'PRENOM'))); ?></strong></td>
						<td align="center"><?php echo $value['DATEDIS']; ?></td>
						<td align="center"><?php echo $value['HEUREDIS'];?></td>
						<td align="center"><?php echo $value['AGE'];    ?></td>
						<td align="center"><?php echo $value['PSL'];    ?></td>
						<td <?php echo bgcolor_ABO($value['GROUPAGE'])  ;?> align="center" >  <?php echo $value['GROUPAGE']."_[".$value['RHESUS']."]";   ?></td>
						<td align="center"><?php echo $value['IDP'];    ?></td>
						<td align="center"><?php echo nbrtostring('ser','id',$value['SERVICE'],'service');?></td>
						<td align="center"><?php echo nbrtostring('med','id',$value['MED'],'medecin');?></td>
						<td align="center"><a title="incident" href="<?php echo URL.'dis/incident/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/cancel.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a title="editer" href="<?php echo URL.'dis/editdon/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'dis/deletedis/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						</tr>
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="14" ><span> No record found for receveur </span></td> </tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="14" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor=""><td align="center" colspan="14" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'dis').'</td></tr>';	
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="14" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'dis/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'dis/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor=""  ><td align="center" colspan="14" >';	
		?> 
		<button <?php echo ($page<=0)?'disabled':'';?>           onclick="document.location='<?php echo $prev_url; ?>'"> Previews</button>&nbsp;&nbsp;&nbsp;<?php //echo $page. ' / ' . $total_page; ?>&nbsp;&nbsp;&nbsp;                              
		<button <?php echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'">Next</button>
		<?php 
		echo '</td></tr>';	     
	   }
}
else 
{
echo '<tr><td align="center" colspan="14" ><span> Click search button to start searching a receveur.</span></td></tr>';
echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="14" ><span>&nbsp;</span></td></tr>';					      
}				
echo "</table>";
?>

