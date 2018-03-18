<h1> Wilayas </h1 >
<hr />
<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th>IDWIL</th>
<th>WILAYAS</th>
<th>Update </th>
<th>Delete</th>
</tr>
<?php				

		foreach($this->wilayaview as $key => $value)
		{ 
		
		
?>
			<tr bgcolor='#EDF7FF' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='#EDF7FF';" >
			<td align="center" >  <?php  echo $value['IDWIL'];   ?></td>
			<td align="left" >  <?php  echo $value['WILAYAS'];    ?></td>
			<td align="center"><a title="editer" href="<?php //echo URL.'dnr/edit/'.$value['IDWIL'];?>"><img src="<?php echo URL.'public/images/e.png';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php //echo URL.'dnr/delete/'.$value['IDWIL'];?>"><img src="<?php echo URL.'public/images/s.png';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>
<?php 
		}
            $total_count=count($this->wilayaview);		
		    echo '<tr> <td   align="left"     colspan="8"    ><span>' .$total_count.' Record(s) found.    </span></td> </tr>';							
echo "</table>";	
?>



 
 
 
