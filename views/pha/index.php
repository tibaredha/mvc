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
view::button('ord','');
lang(Session::get('lang'));
ob_start();
echo "<hr/><br/>" ;
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
	echo "<form   onsubmit=\"return validateForm11(this);\" name=\"form1\"  action=\"".URL."pha/search/0/10\"   method=\"GET\"   >" ;
		echo "<tr bgcolor='#EDF7FF' >" ;
			echo "<td align=\"left\"  >" ;
				echo "<select name=\"o\" style=\"width: 100px;\">" ;
					echo "<option value=\"mecicament\">DCI</option>" ;
					// echo "<option value=\"GRABO\">".Blood_Type."</option>" ;
					// echo "<option value=\"SEX\">".Gender."</option>" ;
				echo "</select>" ;
				echo "<input type=\"text\" name=\"q\"  value=\"\"  autofocus /> " ;//<!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
				echo "<img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>" ;
				echo "<input type=\"submit\" name=\"\" value=\"Search_Medicament\"/> " ;
	echo "</form>" ;
				echo "<button  onclick=\"document.location='".URL."pha/newpro/';  \"   title=\"New_Mecicament\"><img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>New_Medicament</button> " ;
			echo "</td>" ;
            echo "<td align=\"right\"> " ;
				echo "<button  onclick=\"document.location='".URL."pha/imp/';  \"   title=\"".Print_donor."\"><img src=\"".URL."public/images/icons/print.PNG\" width='20' height='20' border='0' alt=''/>Print_Medicament</button> " ;
				echo "<button  onclick=\"document.location='".URL."pha/dnr/';  \"   title=\"".graphe_donor."\"><img src=\"".URL."public/images/icons/graph.PNG\" width='20' height='20' border='0' alt=''/>graphe_Medicament</button> " ;
            echo "</td>" ;
        echo "</tr>" ;
echo "</table>" ;
$colspan=12;				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\">photos</th>" ;
echo "<th style=\"width:50px;\">View</th>" ;
echo "<th style=\"width:50px;\">Donate</th>" ;
echo "<th>DCI</th>" ;
echo "<th style=\"width:50px;\">Update </th>" ;
echo "<th style=\"width:50px;\">Delete</th>" ;
echo "<th style=\"width:50px;\">Print</th>" ;
echo "</tr>" ;		
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = '#9FF781';
		$bgcolor_donate = bgcolor_donate ($allow_donate);
		$fichier = photosmf($value['id'].'.jpg',$value['id']) ;
        echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
		      echo "<td align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."pha/upl/".$value['id']."\" ><img  src=\"".URL."public/webcam/".$fichier."\"  width='25' height='25' border='1' alt='photos'></td> " ;
		      // echo "<td align=\"center\" class=\"bg-gray\" style=\"padding: 5px 5px;\"><button  onclick=\"document.location='".URL."dnr/imp/';  \"   title=\"".Print_donor."\"><img src=\"".URL."public/images/icons/print.PNG\" width='20' height='20' border='0' alt=''/>".Print_donor."</button></td>" ;
		?>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'pha/view/'.$value['id'];?>'"   title="View <?php   echo $value['id'].', '.$value['id']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'pha/Donate/'.$value['id'];?>'" title="Donate <?php echo $value['id'].', '.$value['id']?>'s Record" <?php echo ($allow_donate==FALSE)?'disabled':'';?> >&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/gs.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="left"><a title="view" href="<?php echo URL.'pha/view/'.$value['id'];?>"> <strong><?php echo trim($value['mecicament'])."_". strtolower(trim($value['pre'])).' ['.strtolower(trim($value['id'])).'] '; ?></strong></a></td>
			
			<td align="center"><a title="editer" href="<?php echo URL.'pha/edit/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'pha/delete/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche donneur<?php echo trim($value['id']).', '.trim($value['id'])?>'s Record"" href="<?php echo URL.'pdf/***.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>	
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for medicament </span></td> </tr>';
		header('location: ' . URL . 'pha/newdnr/'.$this->userListviewq);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor=""><td align="center" colspan="'.$colspan.'" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'pha').'</td></tr>';	
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'pha/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'pha/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor=""  ><td align="center" colspan="'.$colspan.'" >';	
		?> 
		<button <?php echo ($page<=0)?'disabled':'';?>                  onclick="document.location='<?php echo $prev_url; ?>'"> Previews</button>&nbsp;&nbsp;&nbsp;<?php //echo $page. ' / ' . $total_page; ?>&nbsp;&nbsp;&nbsp;                              
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
// view::graphemoisdnr(30,380,'Donneurs Par Mois Arret Au  : ','4','dnr','DINS','SRS',date("Y"),'4',"SRS IS NOT NULL");	
// view::BOUTONGRAPHE1(30,645);
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
}				
echo "</table>";
ob_end_flush();
?>

 








