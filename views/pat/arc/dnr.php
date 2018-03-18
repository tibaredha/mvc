<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'image','weigth=toolbar=no,scrollbars=no,resizable=yes, width=220, height=268');	
	w.document.write("<HTML><BODY onblur=\"window.close();\"><IMG src='"+img+"'>");
	w.document.write("</BODY></HTML>");
	w.document.close();
}
</script>
<?php 
verifsession();	
view::button('dnr','');
lang(Session::get('lang'));
ob_start();
?>
<hr/><br/>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
            <form  onsubmit="return validateForm11(this);"   name="form1" action="<?php echo URL; ?>Dnr/search/0/10" method="GET">
             <tr bgcolor='#EDF7FF' >
                <td align="left"  >
				    <select name="o" style="width: 100px;">
							<option value="NOM"><?php echo Donor ; ?></option>
							<option value="GRABO"><?php echo Blood_Type ; ?></option>
							<option value="SEX"><?php echo Gender ; ?></option>
					</select>
                    <input type="text" name="q"  value=""  autofocus />  <!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
					<img src="<?php echo URL.'public/images/icons/search.PNG';?>" width='20' height='20' border='0' alt=''/>	                   
					<input type="submit" name="" value="<?php echo Search_donor ; ?>" /> 
			</form>
				<button onclick=" document.location='<?php echo URL.'dnr/newdnr/';?>'"  title="<?php echo New_donor ; ?>"><img src="<?php echo URL.'public/images/icons/add.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;<?php echo New_donor ; ?> </button>
                </td>   
				<td align="right"> 
				
                <button onclick=" document.location='<?php echo URL.'dnr/imp/';?>'"     title="<?php echo Print_donor ; ?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;<?php echo Print_donor ; ?> </button>
				<button onclick=" document.location='<?php echo URL.'dnr/dnr/';?>'"     title="<?php echo graphe_donor ; ?>"><img src="<?php echo URL.'public/images/icons/graph.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;<?php echo graphe_donor ; ?> </button>
			    <button onclick=" document.location='<?php echo URL.'don/';?>'"         title="<?php echo Search_Don ; ?>"><img src="<?php echo URL.'public/images/icons/search.PNG';?>" width='20' height='20' border='0' alt=''/>&nbsp;<?php echo Search_Don ; ?> </button>
				</td>
			</tr>
</table>

<?php
$colspan=12;				
if (isset($this->userListview)) 
{
?>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:50px;">photos</th>
<th style="width:50px;">View</th> 
<th style="width:50px;">Donate</th>
<th>Last_First_Name</th>
<th style="width:100px;">Birthday</th> 
<th style="width:80px;">Gender</th> 
<th style="width:80px;">Blood Type</th>
<th style="width:110px;">Telephone</th>
<th style="width:100px;">Last Donated</th>
<th style="width:50px;">Update </th>
<th style="width:50px;">Delete</th>
<th style="width:50px;">Print</th>
</tr>
<?php		
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = allow_donate($value['DDD']);
		$bgcolor_donate = bgcolor_donate ($allow_donate);
		$fichier = photosmf($value['id'].'.jpg',$value['SEX']) ;
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" ><a title="Modifier Photos" href="<?php echo URL."dnr/upl/".$value['id']; ?>"><img src="<?php echo URL.'public/webcam/'.$fichier;?>" width='25' height='25' border='1' alt='photos'/></td> 
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'dnr/view/'.$value['id'];?>'"   title="View <?php   echo $value['NOM'].', '.$value['PRENOM']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'dnr/Donate/'.$value['id'];?>'" title="Donate <?php echo $value['NOM'].', '.$value['PRENOM']?>'s Record" <?php echo ($allow_donate==FALSE)?'disabled':'';?> >&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/gs.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="left"><a title="view" href="<?php echo URL.'dnr/view/'.$value['id'];?>"> <strong><?php echo trim($value['NOM'])."_". strtolower(trim($value['PRENOM'])).' ['.strtolower(trim($value['FILSDE'])).'] '; ?></strong></a></td>
			<td align="center" >  <?php echo $value['DATENAISSANCE'];?></td>
			<td align="center" > <a href="javascript:PopupImage('<?php echo URL.'public/webcam/'.$fichier;?>')"><?php echo $value['SEX'];?></a> </td>
			<td <?php echo bgcolor_ABO(trim($value['GRABO']))  ;?> align="center" >  <?php echo trim($value['GRABO'])."_[".trim($value['GRRH'])."]";   ?></td>
			<td align="center" >  <?php echo $value['TELEPHONE'];?></td>
			<td align="center" >  <?php echo $value['DDD'];    ?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'dnr/edit/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'dnr/delete/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche donneur<?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'s Record"" href="<?php echo URL.'pdf/FDNRPDF.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>	
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for donor </span></td> </tr>';
		header('location: ' . URL . 'dnr/newdnr/'.$this->userListviewq);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor=""><td align="center" colspan="'.$colspan.'" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'dnr').'</td></tr>';	
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'Dnr/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'Dnr/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor=""  ><td align="center" colspan="'.$colspan.'" >';	
		?> 
		<button <?php echo ($page<=0)?'disabled':'';?>                 onclick="document.location='<?php echo $prev_url; ?>'"> Previews</button>&nbsp;&nbsp;&nbsp;<?php //echo $page. ' / ' . $total_page; ?>&nbsp;&nbsp;&nbsp;                              
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
view::graphemoisdnr(30,380,'Donneurs Par Mois Arret Au  : ','4','dnr','DINS','SRS',date("Y"),'4',"SRS IS NOT NULL");	
view::BOUTONGRAPHE1(30,645);
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
// echo '<tr><td align="center" colspan="'.$colspan.'" ><span> Click search button to start searching a donor.</span></td></tr>';
// echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="'.$colspan.'" ><span>&nbsp;</span></td></tr>';					      
}				
echo "</table>";
ob_end_flush();
?>

