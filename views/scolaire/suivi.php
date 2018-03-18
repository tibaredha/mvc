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
view::button('scolaire','');
lang(Session::get('lang'));
ob_start();
// view::munu('scolaire'); 
?>
<h2>Suivi medicale </h2 ><hr /><br />
<?php
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\">photos</th>" ;
echo "<th style=\"width:50px;\">View</th>" ;
echo "<th style=\"width:50px;\">Donate</th>" ;
echo "<th style=\"width:50px;\">Last_First_Name</th>" ;
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
if (isset($this->userListview)) 
{

foreach($this->userListview as $key => $value)
{ 
        $allow_donate = allow_donate($value['DATE']);
		$bgcolor_donate = bgcolor_donate ($allow_donate);
		$fichier = photosmfx('dnr',$value['id'].'.jpg',$value['NEC']) ;
        echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
		      echo "<td align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."dnr/upl/".$value['id']."\" ><img  src=\"".URL."public/webcam/dnr/".$fichier."\"  width='20' height='20' border='1' alt='photos'></td> " ;
		      // echo "<td align=\"center\" class=\"bg-gray\" style=\"padding: 5px 5px;\"><button  onclick=\"document.location='".URL."dnr/imp/';  \"   title=\"".Print_donor."\"><img src=\"".URL."public/images/icons/print.PNG\" width='20' height='20' border='0' alt=''/>".Print_donor."</button></td>" ;
		?>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'scolaire/view/'.$value['NEC'];?>'"   title="View <?php   echo $value['NEC'].', '.$value['NEC']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'scolaire/Donate/'.$value['NEC'];?>'" title="Donate <?php echo $value['NEC'].', '.$value['NEC']?>'s Record" <?php echo ($allow_donate==FALSE)?'disabled':'';?> >&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/gs.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" >  <?php echo $value['DATE'];    ?></td>
			<td align="center" >  <?php echo $value['NEC'];    ?></td>
			<td align="center" >  <?php echo $value['ETA'];    ?></td>
			<td align="center" >  <?php echo $value['PALIER'];    ?></td>
			<td align="center" >  <?php //echo $value['DDD'];    ?></td>
			<td align="center" >  <?php //echo $value['DDD'];    ?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'dnr/edit/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'scolaire/delete/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche donneur <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL.'pdf/FDNRPDF.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="carte donneur <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL.'pdf/CARTDNRPDF.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>	
        <?php 
}
        // $total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		
       
}
echo "<tr>" ;
echo "<th style=\"width:50px;\">".$total_count1."</th>" ;
echo "<th style=\"width:50px;\"></th>" ;
echo "<th style=\"width:50px;\"></th>" ;
echo "<th style=\"width:50px;\"></th>" ;
echo "<th style=\"width:100px;\"></th> " ;
echo "<th style=\"width:80px;\"></th> " ;
echo "<th style=\"width:80px;\"></th>" ;
echo "<th style=\"width:110px;\"></th>" ;
echo "<th style=\"width:100px;\"></th>" ;
echo "<th style=\"width:50px;\"></th>" ;
echo "<th style=\"width:50px;\"></th>" ;
echo "<th style=\"width:50px;\"></th>" ;
echo "<th style=\"width:50px;\"></th>" ;
echo "</tr>" ;	
echo "</table>";
// view::sautligne(5);
ob_end_flush();
?>






