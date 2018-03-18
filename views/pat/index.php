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
view::button('pat','');
lang(Session::get('lang'));
ob_start();
echo "<hr/><br/>" ;
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
	echo "<form   onsubmit=\"return validateForm11(this);\" name=\"form1\"  action=\"".URL."Pat/search/0/10\"   method=\"GET\"   >" ;
		echo "<tr bgcolor='#EDF7FF' >" ;
			echo "<td align=\"left\"  >" ;
				echo "<select name=\"o\" style=\"width: 100px;\">" ;
					echo "<option value=\"NOM\">".Donor1."</option>" ;
					echo "<option value=\"GRABO\">".Blood_Type1."</option>" ;
					echo "<option value=\"SEX\">".Gender1."</option>" ;
				echo "</select>" ;
				echo "<input type=\"text\" name=\"q\"  value=\"\"  autofocus /> " ;//<!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
				echo "<img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>" ;
				echo "<input type=\"submit\" name=\"\" value=\"".Search_donor1."\"/> " ;
	echo "</form>" ;
				echo "<button  onclick=\"document.location='".URL."Pat/newpat/';  \"   title=\"".New_donor1."\"><img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>".New_donor1."</button> " ;
			echo "</td>" ;
            echo "<td align=\"right\"> " ;
				echo "<button  onclick=\"document.location='".URL."Pat/imp/';  \"   title=\"".Print_donor1."\"><img src=\"".URL."public/images/icons/print.PNG\" width='20' height='20' border='0' alt=''/>".Print_donor1."</button> " ;
				echo "<button  onclick=\"document.location='".URL."Pat/Pat/';  \"   title=\"".graphe_donor1."\"><img src=\"".URL."public/images/icons/graph.PNG\" width='20' height='20' border='0' alt=''/>".graphe_donor1."</button> " ;
				echo "<button  onclick=\"document.location='".URL."con/';  \"       title=\"".Search_Don1."\"><img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>".Search_Don1."</button> " ;
            echo "</td>" ;
        echo "</tr>" ;
echo "</table>" ;
$colspan=13;				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\">photos</th>" ;
echo "<th style=\"width:50px;\">View</th>" ;
echo "<th style=\"width:50px;\">Cons</th>" ;
echo "<th style=\"width:50px;\">F Exa</th>" ;
echo "<th>Last_First_Name</th>" ;
echo "<th style=\"width:100px;\">Birthday</th> " ;
echo "<th style=\"width:80px;\">Gender</th> " ;
echo "<th style=\"width:80px;\">Blood Type</th>" ;
echo "<th style=\"width:110px;\">Telephone</th>" ;
echo "<th style=\"width:100px;\">Last consult</th>" ;
echo "<th style=\"width:50px;\">Update </th>" ;
echo "<th style=\"width:50px;\">Delete</th>" ;
echo "<th style=\"width:50px;\">F PAT</th>" ;

echo "</tr>" ;		
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = allow_donate($value['DDD']);
		$bgcolor_donate = bgcolor_donate ($allow_donate);
		$fichier = photosmfx('pat',$value['id'].'.jpg',$value['SEX']) ;
	        echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
	        echo "<td align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."Pat/upl/".$value['id']."\" ><img  src=\"".URL."public/webcam/pat/".$fichier."\"  width='25' height='25' border='1' alt='photos'></td> " ;
		      // echo "<td align=\"center\" class=\"bg-gray\" style=\"padding: 5px 5px;\"><button  onclick=\"document.location='".URL."Pat/imp/';  \"   title=\"".Print_donor."\"><img src=\"".URL."public/images/icons/print.PNG\" width='20' height='20' border='0' alt=''/>".Print_donor."</button></td>" ;
		?>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'Pat/view/'.$value['id'];?>'"   title="View <?php   echo $value['NOM'].', '.$value['PRENOM']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'Pat/Hosp/'.$value['id'];?>'"   title="View <?php   echo $value['NOM'].', '.$value['PRENOM']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/med.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			
			
			<td align="center"><a title="fiche examen <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'s Record"" href="<?php echo URL.'pdf/FEXAPDF.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="left"><a title="view" href="<?php echo URL.'Pat/view/'.$value['id'];?>"> <strong><?php echo trim($value['NOM'])."_". strtolower(trim($value['PRENOM'])).' ['.strtolower(trim($value['FILSDE'])).'] '; ?></strong></a></td>
			<td align="center" >  <?php echo $value['DATENAISSANCE'];?></td>
			<td align="center" > <a href="javascript:PopupImage('<?php echo URL.'public/webcam/pat'.$fichier;?>')"><?php echo $value['SEX'];?></a> </td>
			<td <?php echo bgcolor_ABO(trim($value['GRABO']))  ;?> align="center" >  <?php echo trim($value['GRABO'])."_[".trim($value['GRRH'])."]";   ?></td>
			<td align="center" >  <?php echo $value['TELEPHONE'];?></td>
			<td align="center" >  <?php echo $value['DDD'];    ?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'Pat/edit/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'Pat/delete/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche patient <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'s Record"" href="<?php echo URL.'pdf/FPATPDF.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			
			</tr>	
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for donor </span></td> </tr>';
		header('location: ' . URL . 'Pat/newpat/'.$this->userListviewq);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor=""><td align="center" colspan="'.$colspan.'" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'Pat').'</td></tr>';	
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'Pat/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'Pat/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
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
view::graphemoisdnr(30,220,'Patients Par Mois Arret Au  : ','4','Pat','DINS','SRS',date("Y"),'4',"SRS IS NOT NULL");	
// view::BOUTONGRAPHE1(30,645);
$x=1120;
$y=220;
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
view::sautligne(6);
ob_end_flush();
?>









