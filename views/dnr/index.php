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

// echo mnpe('PA',1,'M',2);

lang(Session::get('lang'));
ob_start();
view::munu('dnr'); 
$colspan=13;				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\">photos</th>" ;
echo "<th style=\"width:50px;\">View</th>" ;
echo "<th style=\"width:50px;\">Donate</th>" ;
echo "<th>Last_First_Name</th>" ;
echo "<th style=\"width:100px;\">Birthday</th> " ;
echo "<th style=\"width:80px;\">Gender</th> " ;
echo "<th style=\"width:80px;\">Blood Type</th>" ;
echo "<th style=\"width:110px;\">Telephone</th>" ;
echo "<th style=\"width:100px;\">Last Donated</th>" ;
echo "<th style=\"width:50px;\">Update </th>" ;
echo "<th style=\"width:50px;\">Delete</th>" ;
echo "<th style=\"width:50px;\">Fdnr</th>" ;
echo "<th style=\"width:50px;\">Cdnr</th>" ;


echo "</tr>" ;		
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = allow_donate($value['DDD']);
		$bgcolor_donate = bgcolor_donate ($allow_donate);
		$fichier = photosmfx('dnr',$value['id'].'.jpg',$value['SEX']) ;
        echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
		      echo "<td align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."dnr/upl/".$value['id']."\" ><img  src=\"".URL."public/webcam/dnr/".$fichier."\"  width='20' height='20' border='1' alt='photos'></td> " ;
		      // echo "<td align=\"center\" class=\"bg-gray\" style=\"padding: 5px 5px;\"><button  onclick=\"document.location='".URL."dnr/imp/';  \"   title=\"".Print_donor."\"><img src=\"".URL."public/images/icons/print.PNG\" width='20' height='20' border='0' alt=''/>".Print_donor."</button></td>" ;
		?>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'dnr/view/'.$value['id'];?>'"   title="View <?php   echo $value['NOM'].', '.$value['PRENOM']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'dnr/Donate/'.$value['id'];?>'" title="Donate <?php echo $value['NOM'].', '.$value['PRENOM']?>'s Record" <?php echo ($allow_donate==FALSE)?'disabled':'';?> >&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/gs.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="left"><a title="view" href="<?php echo URL.'dnr/view/'.$value['id'];?>"> <strong><?php echo trim($value['NOM'])."_". strtolower(trim($value['PRENOM'])).' ['.strtolower(trim($value['FILSDE'])).'] '; ?></strong></a></td>
			<td align="center" >  <?php echo $value['DATENAISSANCE'];?></td>
			<td align="center" > <a href="javascript:PopupImage('<?php echo URL.'public/webcam/dnr/'.$fichier;?>')"><?php echo $value['SEX'];?></a> </td>
			<td <?php echo bgcolor_ABO(trim($value['GRABO']))  ;?> align="center" >  <?php echo trim($value['GRABO'])."_[".trim($value['GRRH'])."]";   ?></td>
			<td align="center" >  <?php echo $value['TELEPHONE'];?></td>
			<td align="center" >  <?php echo $value['DDD'];    ?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'dnr/edit/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'dnr/delete/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche donneur <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL.'pdf/FDNRPDF.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="carte donneur <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL.'pdf/CARTDNRPDF.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			
			
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
		echo '<tr bgcolor="#00CED1"><td align="center" colspan="'.$colspan.'" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'dnr').'</td></tr>';	
		
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'Dnr/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'Dnr/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor="#00CED1"  ><td align="center" colspan="'.$colspan.'" >';	
		?> 
		<button <?php echo ($page<=0)?'disabled':'';?>                  onclick="document.location='<?php echo $prev_url; ?>'"> Previews</button>&nbsp;<?php echo '<span>[' .$total_count1.'/'.$total_count.' Record(s) found.]</span>'; ?>                              
		<button <?php echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'">Next</button>
		<?php 
	    }
}
else 
{
view::sautligne(14);
view::graphemoisdnr(30,220,'Donneurs Par Mois Arret Au  : ','4','dnr','DINS','SRS',date("Y"),'4',"SRS IS NOT NULL");	
view::BOUTONGRAPHE1(30,555);				      
}				
echo "</table>";
ob_end_flush();
function normCDF ($z)
    {
        $max = 6;

        if ($z == 0) {
            $x = 0;
        } else {
            $y = abs($z) / 2;
            if ($y >= ($max / 2)) {
                $x = 1;
            } elseif ($y < 1) {
                $w = $y * $y;
                $x = ((((((((0.000124818987 * $w
                          - 0.001075204047) * $w + 0.005198775019) * $w
                          - 0.019198292004) * $w + 0.059054035642) * $w
                          - 0.151968751364) * $w + 0.319152932694) * $w
                          - 0.531923007300) * $w + 0.797884560593) * $y * 2;
            } else {
                $y -= 2;
                $x = (((((((((((((-0.000045255659 * $y
                                + 0.000152529290) * $y - 0.000019538132) * $y
                                - 0.000676904986) * $y + 0.001390604284) * $y
                                - 0.000794620820) * $y - 0.002034254874) * $y
                                + 0.006549791214) * $y - 0.010557625006) * $y
                                + 0.011630447319) * $y - 0.009279453341) * $y
                                + 0.005353579108) * $y - 0.002141268741) * $y
                                + 0.000535310849) * $y + 0.999936657524;
            }
        }

        if ($z > 0) {
            $result = ($x + 1) / 2;
        } else {
            $result = (1 - $x) / 2;
        }

        return $result;
    }

// echo normCDF (1.96) ;

?>

</br>
<h4>Print Test</h4>
<input type="button" onClick="window.print()" value="Print This Page"/>




