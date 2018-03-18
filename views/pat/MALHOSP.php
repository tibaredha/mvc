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

$colspan=12;				
if (isset($this->user)) 
{
echo "<table  width='60%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th colspan=\"2\"style=\"width:50px;\"><a href=\"".URL."pdf/***.php\">AJOUT SERVICE</a></th>" ;
echo "<th colspan=\"2\"style=\"width:50px;\"><a href=\"".URL."pdf/***.php\">AJOUT LIT</a></th>" ;
echo "<th colspan=\"5\" style=\"width:150px;\"><a href=\"".URL."pdf/***.php\">IMPRIME SERVICE</a></th>" ;	
echo "</tr>" ;

echo "<tr>" ;
echo "<th style=\"width:50px;\">VIEW</th>" ;
echo "<th style=\"width:200px;\">IDSERVICE</th>" ;

echo "<th>NOM_PRENOM</th>" ;
echo "<th style=\"width:50px;\">Update </th>" ;
echo "<th style=\"width:50px;\">Delete</th>" ;
echo "<th style=\"width:50px;\">F PAT</th>" ;
echo "</tr>" ;		
		foreach($this->user as $key => $value)
		{ 
		$allow_donate = allow_donate($value['idlit']);
		$bgcolor_donate = bgcolor_donate ($allow_donate);
        echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;    
		?>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'Pat/view/'.$value['idpt'];?>'"   title="View <?php   //echo $value['NOM'].', '.$value['PRENOM']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="left" >  <?php echo view::nbrtostring('service','ids',$value['idservice'],'servicefr').': ( '.$value['nlit'].' )';?></td>
			<td align="center" >  <?php echo view::nbrtostring('pat','id',$value['idpt'],'NOM');;?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'Pat/***/'.$value['idpt'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'Pat/***/'.$value['idpt'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche patient <?php //echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'s Record"" href="<?php echo URL.'pdf/***.php?uc='.$value['idpt'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			
			</tr>	
        <?php 
		}
}		
ob_end_flush();
echo "</table>" ;
?>









