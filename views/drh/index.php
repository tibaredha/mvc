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
<style>
hr.new1 {border-top: 10px solid red; width:100px  }
hr.new2 {border-top: 1px dashed red;}
hr.new3 {border-top: 1px dotted red;}
hr.new4 {border: 1px solid red;}
hr.new5 {border: 10px solid green;border-radius: 5px;}
</style>
<?php 
verifsession();	
view::button('drh','');
lang(Session::get('lang'));
ob_start();
view::munu('drh'); 
$colspan=16;				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
	echo "<th style=\"width:50px;\" colspan=\"5\" >" ;
		echo '<a target="_blank" title="fiche Inspection"  href="'.URL.'***" > *** : </a>';
	echo "</th>" ;
	echo "<th style=\"width:50px;\"  colspan=\"15\">" ;
		echo '<a target="_blank" title="fiche Inspection"  href="'.URL.'***" > **** : </a>';
	echo "</th>" ;
echo "</tr>" ;	
echo "<tr>" ;
	echo "<th style=\"width:10px;\">Photos</th>" ;
	echo "<th style=\"width:10px;\">Congé</th>" ;
	echo "<th style=\"width:10px;\">ِCT-FR</th>" ;
	echo "<th id =\"nom_prenom_fr\">Nom_Prenom</th>" ;
	echo "<th id =\"actif\">Sitiuation</th>" ;
	echo "<th id =\"nom_prenom_ar\">الاسم و اللقب</th>" ;
	echo "<th style=\"width:10px;\">CT-AR</th>" ;
    echo "<th style=\"width:10px;\">Dep</th>" ;
	echo "<th style=\"width:10px;\">Upd</th>" ;
	echo "<th style=\"width:10px;\">Del</th>" ;
echo "</tr>" ;		
	foreach($this->userListview as $key => $value)
	{
		$bgcolor_donate = 'white';
		$fichier = photosmfy('drh',$value['idp'].'.jpg',$value['Sexe']);
		echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			
			echo "<td align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."drh/upl/".$value['idp']."\" ><img  src=\"".URL."public/webcam/drh/".$fichier."?t=".time()."\"  width='50' height='50' border='0'></td> " ;
			
			if($value['cessation']=='')
			{
				echo "<td style=\"width:5px;\" align=\"center\" ><button onclick=\"document.location='".URL.'drh/conge/'.$value['idp']."'\" ><img  src=\"".URL.'public/images/icons/pers.PNG'."\"  width='40' height='40' border='0' alt='' ></td>" ; 	
			
			}else {
				
				echo "<td style=\"width:5px;\" align=\"center\" ><button onclick=\"document.location='".URL.'drh/search/0/10?o=idp&q='.$value['idp']."'\" ><img  src=\"".URL.'public/images/icons/pers.PNG'."\"  width='40' height='40' border='0' alt='' ></td>" ; 	
				
			}
			echo "<td style=\"width:5px;\" align=\"center\" ><button onclick=\"document.location='".URL.'tcpdf/drh/attestation_trav_fr.php?uc='.$value['idp']."'\" ><img  src=\"".URL.'public/images/icons/cvc.jpg'."\"  width='40' height='40' border='0' alt='' ></td>" ; 	
			
			if($value['cessation']=='')
			{
				echo "<td id =\"nom_prenom_fr\" ><a title=\"Fiche\" href=\"".URL.'tcpdf/drh/attestation_frar.php?uc='.$value['idp']."\" > ".strtoupper($value['Nomlatin']).'_'.strtolower ($value['Prenom_Latin'])."</a></td>" ;
				echo "<td id =\"actif\" ><a title=\"mouvement\" href=\"".URL.'drh/service/'.$value['idp']."\" >".View::nbrtostring('servicegrh','ids',trim($value['SERVICEAR']),'servicear')." </a></td>" ;//".$value['SERVICEAR']."
				echo "<td id =\"nom_prenom_ar\" ><a title=\"إستمارة\" href=\"".URL.'tcpdf/drh/attestation_frar.php?uc='.$value['idp']."\" >".$value['Nomarab'].'_'.$value['Prenom_Arabe'].' : ('.$value['pere'].")</a></td>" ;	
			}
			else
			{
				echo "<td id =\"nom_prenom_fr_n\" ><a title=\"Fiche\" href=\"".URL.'tcpdf/drh/attestation_frar.php?uc='.$value['idp']."\" >".strtoupper($value['Nomlatin']).'_'.strtolower ($value['Prenom_Latin'])."</a></td>" ;
				if($value['Motif_Cessation']==1){
					echo "<td id =\"actif_n\" ><a title=\"Fiche\" href=\"".URL.'tcpdf/drh/demission.php?uc='.$value['idp']."\" >".View::nbrtostring('motif_cessation','idcausedepart',trim($value['Motif_Cessation']),'causedepartar')."</a>&ensp;(<a title=\"annulation\" href=\"".URL.'drh/an_cesation/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/back.PNG'."\"    width='25' height='25' border='0' alt='' ></a>)</td>" ;	
				}
				if($value['Motif_Cessation']==2){
					echo "<td id =\"actif_n\" ><a title=\"Fiche\" href=\"".URL.'tcpdf/drh/deces.php?uc='.$value['idp']."\" >".View::nbrtostring('motif_cessation','idcausedepart',trim($value['Motif_Cessation']),'causedepartar')."</a>&ensp;(<a title=\"annulation\" href=\"".URL.'drh/an_cesation/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/back.PNG'."\"    width='25' height='25' border='0' alt='' ></a>)</td>" ;	
				}
				if($value['Motif_Cessation']==3){
					echo "<td id =\"actif_n\" ><a title=\"Fiche\" href=\"".URL.'tcpdf/drh/retraite.php?uc='.$value['idp']."\" >".View::nbrtostring('motif_cessation','idcausedepart',trim($value['Motif_Cessation']),'causedepartar')."</a>&ensp;(<a title=\"annulation\" href=\"".URL.'drh/an_cesation/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/back.PNG'."\"    width='25' height='25' border='0' alt='' ></a>)</td>" ;	
				}
				if($value['Motif_Cessation']==4){
					echo "<td id =\"actif_n\" ><a title=\"Fiche\" href=\"".URL.'tcpdf/drh/revocation.php?uc='.$value['idp']."\" >".View::nbrtostring('motif_cessation','idcausedepart',trim($value['Motif_Cessation']),'causedepartar')."</a>&ensp;(<a title=\"annulation\" href=\"".URL.'drh/an_cesation/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/back.PNG'."\"    width='25' height='25' border='0' alt='' ></a>)</td>" ;	
				}
				if($value['Motif_Cessation']==5){
					echo "<td id =\"actif_n\" ><a title=\"Fiche\" href=\"".URL.'tcpdf/drh/liberation.php?uc='.$value['idp']."\" >".View::nbrtostring('motif_cessation','idcausedepart',trim($value['Motif_Cessation']),'causedepartar')."</a>&ensp;(<a title=\"annulation\" href=\"".URL.'drh/an_cesation/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/back.PNG'."\"    width='25' height='25' border='0' alt='' ></a>)</td>" ;	
				}
				if($value['Motif_Cessation']==6){
					echo "<td id =\"actif_n\" ><a title=\"Fiche\" href=\"".URL.'tcpdf/drh/resiliationcontrat.php?uc='.$value['idp']."\" >".View::nbrtostring('motif_cessation','idcausedepart',trim($value['Motif_Cessation']),'causedepartar')."</a>&ensp;(<a title=\"annulation\" href=\"".URL.'drh/an_cesation/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/back.PNG'."\"    width='25' height='25' border='0' alt='' ></a>)</td>" ;	
				}
				if($value['Motif_Cessation']==7){
					echo "<td id =\"actif_n\" ><a title=\"Fiche\" href=\"".URL.'tcpdf/drh/mutation.php?uc='.$value['idp']."\" >".View::nbrtostring('motif_cessation','idcausedepart',trim($value['Motif_Cessation']),'causedepartar')."</a>&ensp;(<a title=\"annulation\" href=\"".URL.'drh/an_cesation/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/back.PNG'."\"    width='25' height='25' border='0' alt='' ></a>)</td>" ;
				}
				if($value['Motif_Cessation']==8){
					echo "<td id =\"actif_n\" ><a title=\"Fiche\" href=\"".URL.'tcpdf/drh/fincontrat.php?uc='.$value['idp']."\" >".View::nbrtostring('motif_cessation','idcausedepart',trim($value['Motif_Cessation']),'causedepartar')."</a>&ensp;(<a title=\"annulation\" href=\"".URL.'drh/an_cesation/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/back.PNG'."\"    width='25' height='25' border='0' alt='' ></a>)</td>" ;	
				}
				echo "<td id =\"nom_prenom_ar_n\" ><a title=\"إستمارة\" href=\"".URL.'tcpdf/drh/attestation_frar.php?uc='.$value['idp']."\" >".$value['Nomarab'].'_'.$value['Prenom_Arabe'].' : ('.$value['pere'].")</a></td>" ;
			}
			echo "<td style=\"width:5px;\" align=\"center\" ><button onclick=\"document.location='".URL.'tcpdf/drh/attestation_trav_ar.php?uc='.$value['idp']."'\" ><img  src=\"".URL.'public/images/icons/cvc.jpg'."\"  width='40' height='40' border='0' alt='' ></td>" ; 	
			
			if($value['cessation']=='')
			{
				echo "<td style=\"width:50px;\" align=\"center\" ><a title=\"Depart\" href=\"".URL.'drh/cesation/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/s_loggoff.png'."\"    width='50' height='50' border='0' alt='' ></a></td>" ;
			}else
			{
				echo "<td style=\"width:50px;\" align=\"center\" ><a title=\"Editer Depart\" href=\"".URL.'drh/editcesation/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/s_process.png'."\"    width='50' height='50' border='0' alt='' ></a></td>" ;	
			}
			
			
			echo "<td style=\"width:50px;\" align=\"center\" ><a                  title=\"Editer\"     href=\"".URL.'drh/***/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/edit.PNG'."\"    width='50' height='50' border='0' alt='' ></a></td>" ;
			echo "<td style=\"width:50px;\" align=\"center\" ><a class=\"delete\" title=\"Supprimer\"  href=\"".URL.'drh/***/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/delete.PNG'."\"  width='50' height='50' border='0' alt='' ></a></td>" ; 
		echo'</tr>';
	}
	$total_count=count($this->userListview1);
	$total_count1=count($this->userListview);
	if ($total_count <= 0 )
	{
		echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for structures </span></td> </tr>';
		header('location: ' . URL . 'drh/ndrh/'.$this->userListviewq);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
	}
	else
	{		
		echo '<tr bgcolor="#00CED1"><td align="center" colspan="'.$colspan.'" >'. view::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'drh','search').'</td></tr>';	
		
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'drh/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'drh/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor="#00CED1"  ><td align="center" colspan="'.$colspan.'" >';	
		?> 
		<?php echo '<button '; echo ($page<=0)?'disabled':'';?>                  onclick="document.location='<?php echo $prev_url; ?>'"> <?php echo ""; echo 'Previews</button>&nbsp;<span>[' .$total_count1.'/'.$total_count.' Record(s) found.]</span>'; ?>                              
		<?php echo '<button '; echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'"> <?php echo "Next</button>";?> 
		<?php 
	}
}
else 
{
// view::sautligne(15);//View::hr(700,260);//View::hr(700,450);
// view::graphemoisdeces(30,220,'structure Par Mois Arret Au  : ','','structure','DATE','',date("Y"),'',"");	
// View::url(700,220,URL.'inspection/search/0/10?o=STRUCTURE&q=26','26-entreprise de distribution de produit pharmaceutique',3);
// View::url(700,250,URL.'inspection/search/0/10?o=STRUCTURE&q=12','12-officine pharmaceutique',3);         View::url(1000,250,URL.'inspection/search/0/10?o=STRUCTURE&q=13','13-laboratoire',3);

// View::url(700,280,URL.'inspection/search/0/10?o=STRUCTURE&q=15','15-chirurugien dentiste generaliste',3);View::url(1000,280,URL.'inspection/search/0/10?o=STRUCTURE&q=14','14-chirurugien dentiste specialiste',3);
// View::url(700,310,URL.'inspection/search/0/10?o=STRUCTURE&q=17','17-medecin generaliste ',3);            View::url(1000,310,URL.'inspection/search/0/10?o=STRUCTURE&q=16','16-medecin specialiste ',3);
// View::url(700,340,URL.'inspection/search/0/10?o=STRUCTURE&q=21','21-transport sanitaire ',3);            View::url(1000,340,URL.'inspection/search/0/10?o=STRUCTURE&q=10','10-centre dhemodialyse ',3);
// View::url(700,370,URL.'inspection/search/0/10?o=STRUCTURE&q=23','23-OPTICIEN ',3);                       View::url(1000,370,URL.'inspection/search/0/10?o=STRUCTURE&q=24','24-sage femme ',3);
// View::url(700,400,URL.'inspection/search/0/10?o=STRUCTURE&q=19','19-psychologue ',3);                    View::url(1000,400,URL.'inspection/search/0/10?o=STRUCTURE&q=25','25-kinesitherapie  ',3);

// View::url(700,460,URL.'inspection/search/0/10?o=STRUCTURE&q=7','7-Polyclinique',3);                      View::url(1000,460,URL.'inspection/search/0/10?o=STRUCTURE&q=22','22-UDS',3);
// View::url(700,490,URL.'inspection/search/0/10?o=STRUCTURE&q=8','8-Salle de soins  ',3);
// View::url(700,520,URL.'inspection/search/0/10?o=STRUCTURE&q=3','3-EPH ',3);                              View::url(1000,520,URL.'inspection/search/0/10?o=STRUCTURE&q=5','5-EHS ',3);
// View::url(700,550,URL.'inspection/search/0/10?o=STRUCTURE&q=9','9-EHP  ',3);                             View::url(1000,550,URL.'inspection/search/0/10?o=STRUCTURE&q=4','4-EH  ',3);
// View::url(700,580,URL.'inspection/search/0/10?o=STRUCTURE&q=6','6-EPSP ',3);
// View::url(700,610,URL.'inspection/search/0/10?o=STRUCTURE&q=11','11-CENTER DE DIAGNOSTIQUE ',3);
view::sautligne(20);			      
}				
echo "</table>";
ob_end_flush();

?>