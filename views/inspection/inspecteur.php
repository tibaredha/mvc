<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'image','weigth=toolbar=no,scrollbars=no,resizable=yes, width=220, height=268');	
	w.document.write("<HTML><BODY onblur=\"window.close();\"><IMG src='"+img+"'>");
	w.document.write("</BODY></HTML>");
	w.document.close();
}
</script>
  <script>
  $(function() {
    $( "#accordion" ).accordion({
      heightStyle: "content"
    });
  });
  </script>
<?php 
verifsession();	
view::button('inspecteur','');
lang(Session::get('lang'));
ob_start();
//view::munu('inspecteur'); 
$colspan=17;				
if (isset($this->userListview)) 
{

}
else 
{
view::sautligne(20);
view::graphemoisdeces(30,200,'structures inspectées Par Mois Arret Au  : ','','insp','DATE','',date("Y"),'',"");	
?>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th style="width:50px;">
		<?php
		echo'************';
		//echo '<a target="_blank" title="fiche Inspection"  href="'.URL.'tcpdf/inspection/odm.php?uc='.$this->user[0]['id'].'" > Ordre de mission : </a>';
		?>
		</th> 
		<th  colspan=15   style="width:50px;">
		<?php
		echo'************';
        //echo '<a target="_blank" title="fiche Inspection"  href="'.URL.'pdf/inspection/insp.php?uc='.$this->user[0]['id'].'" > fiche Inspection  De : '.strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) ".'</a>';
		?>
		</th>
		</tr>
		<tr>
		<th style="width:70px;">Date Inspection</th>
		<th style="width:300px;">Nom_Prenom</th>
		<th style="width:10px;">Ajout   Anomalie</th>
		<th style="width:10px;">Rapport Inspection</th>
		<th style="width:10px;">Mesure Prise</th>
		<th style="width:10px;">Imp Mesure Prise</th>
		<th style="width:10px;">Update Inspection</th>
		<th style="width:10px;">Delete Inspection</th>
		</tr>
<?php
foreach($this->Listview as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="center"><?php echo view::dateUS2FR($value['DATE']);?></td>
						<td align="left"><?php echo view::nbrtostring('structure','id',$value['ids'],'NOM').'_'.view::nbrtostring('structure','id',$value['ids'],'PRENOM') ;?></td>
						<?php		
						 echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"Ajout anomalie\" href=\"".URL.'inspection/anomalie/'.$value['id'].'/'.$value['ids']."\" ><img  src=\"".URL.'public/images/icons/anom.PNG'."\"  width='35' height='16' border='0' alt='' ></a> [ ".view::nbranoinsp($value['id'])." ]</td>" ;		
						 echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"rapport inspection\" href=\"".URL.'tcpdf/inspection/rapportinsp.php?uc='.$value['id'].'&uc1='.$value['ids'].'&date='.$value['DATE']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.PNG'."\"  width='16' height='16' border='0' alt='' ></a> </td>" ;		
						?>
						<td align="center"><a title="Mesure Prise" href="<?php echo URL.'inspection/MesurePrise/'.$value['id'].'/'.$value['ids'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<?php		 
						  if ($value['MP']==0) echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"Ras\" href=\"".URL.'tcpdf/inspection/***.php?uc='.$value['id'].'&uc1='.$value['ids'].'&date='.$value['DATE']."\" ><img  src=\"".URL.'public/images/icons/cvc.jpg'."\"  width='26' height='16' border='0' alt='' ></a> </td>" ;		
						  if ($value['MP']==2) echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"questionnaire\" href=\"".URL.'tcpdf/inspection/qes.php?uc='.$value['id'].'&uc1='.$value['ids'].'&date='.$value['DATE']."\" ><img  src=\"".URL.'public/images/icons/cvc.jpg'."\"  width='26' height='16' border='0' alt='' ></a> </td>" ;		
						  if ($value['MP']==1) echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"convocation\" href=\"".URL.'tcpdf/inspection/cvc.php?uc='.$value['id'].'&uc1='.$value['ids'].'&date='.$value['DATE']."\" ><img  src=\"".URL.'public/images/icons/cvc.jpg'."\"  width='26' height='16' border='0' alt='' ></a> </td>" ;		
						  if ($value['MP']==3) echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"Mise en Demeure\" href=\"".URL.'tcpdf/inspection/med.php?uc='.$value['id'].'&uc1='.$value['ids'].'&date='.$value['DATE']."\" ><img  src=\"".URL.'public/images/icons/cvc.jpg'."\"  width='26' height='16' border='0' alt='' ></a> </td>" ;		
                          if ($value['MP']==4) echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"Rappel à l'ordre\" href=\"".URL.'tcpdf/inspection/rao.php?uc='.$value['id'].'&uc1='.$value['ids'].'&date='.$value['DATE']."\" ><img  src=\"".URL.'public/images/icons/cvc.jpg'."\"  width='26' height='16' border='0' alt='' ></a> </td>" ;		
						?>
						<td align="center"><a title="editer inspection" href="<?php echo URL.'inspection/editInspection/'.$value['id'].'/'.$value['ids'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete inspection" title="supprimer" href="<?php echo URL.'inspection/deleteInspection/'.$value['id'].'/'.$value['ids'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
						</tr>
				<?php 
				}
				$total_count=count($this->Listview);
				if ($total_count <= 0 )
				{
				echo '<tr><td align="center" colspan="16" ><span> No record found for inspection </span></td> </tr>';
				echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="16" ><span>' .$total_count.'/'.$total_count.' inspection(s) found.</span></td></tr>';					
				}
				else
				{		
				//echo '<tr bgcolor=""  ><td align="center" colspan="16" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb).'</td></tr>';	
			    echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="16" ><span>' .$total_count.' inspection(s) found.</span></td></tr>';					
				}		
echo "</table>";
}				
echo "</table>";
ob_end_flush();
?>

















