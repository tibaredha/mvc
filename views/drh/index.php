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
view::button('inspection','');
lang(Session::get('lang'));
ob_start();
view::munu('drh'); 
$colspan=16;				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\" colspan=\"5\" >" ;
echo '<a target="_blank" title="fiche Inspection"  href="'.URL.'cour/odm/" > Ordre de mission : </a>';
echo "</th>" ;
echo "<th style=\"width:50px;\"  colspan=\"15\">" ;
echo '<a target="_blank" title="fiche Inspection"  href="'.URL.'tcpdf/inspection/releve.php?uc=" > Releve Des structures sanitaire : </a>';
echo "</th>" ;	
echo "<tr>" ;
echo "<th style=\"width:10px;\">val</th>" ;
echo "<th style=\"width:10px;\">view</th>" ;
echo "<th style=\"width:10px;\">ِCT</th>" ;
echo "<th style=\"width:10px;\">FS</th>" ;
echo "<th style=\"width:10px;\">Photos</th>" ;
echo "<th style=\"width:10px;\">Nom_Prenom</th>" ;
echo "<th style=\"width:390px;\">الاسم و اللقب</th>" ;
// echo "<th style=\"width:100px;\">Contrat Du </th>" ;
// echo "<th style=\"width:200px;\">Residence</th>" ;
// echo "<th style=\"width:200px;\">Structure</th>" ;
// echo "<th style=\"width:10px;\">PV</th>" ;
// echo "<th style=\"width:10px;\">Ins</th>" ;
// echo "<th style=\"width:10px;\">Ouv</th>" ;
// echo "<th style=\"width:10px;\">Cha</th>" ;
// echo "<th style=\"width:70px;\">Home</th>" ;
// echo "<th style=\"width:70px;\">Pers</th>" ;
// echo "<th style=\"width:70px;\">Vehi</th>" ;
// echo "<th style=\"width:70px;\">Insp</th>" ;
// echo "<th style=\"width:10px;\">Etat</th>" ;
echo "<th style=\"width:10px;\">Upd</th>" ;
echo "<th style=\"width:10px;\">Del</th>" ;
echo "</tr>" ;		
		foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate = 'white';
        echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
		
		echo "<td style=\"width:5px;\" align=\"center\" ><button onclick=\"document.location='".URL.'inspection/view/'.$value['idp']."'\" ><img  src=\"".URL.'public/images/icons/pers.PNG'."\"  width='16' height='16' border='0' alt='' ></td>" ; 	
		$fichier = photosmfy('str',$value['idp'].'.jpg',$value['Sexe']);
		echo "<td align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."inspection/upl/".$value['idp']."\" ><img  src=\"".URL."public/webcam/str/".$fichier."?t=".time()."\"  width='25' height='25' border='0'></td> " ;
		echo "<td style=\"width:5px;\" align=\"center\" ><button onclick=\"document.location='".URL.'tcpdf/drh/attestation_trav.php?uc='.$value['idp']."'\" ><img  src=\"".URL.'public/images/icons/cvc.jpg'."\"  width='16' height='16' border='0' alt='' ></td>" ; 	
		echo "<td style=\"width:5px;\" align=\"center\" ><button onclick=\"document.location='".URL.'tcpdf/drh/attestation_frar.php?uc='.$value['idp']."'\" ><img  src=\"".URL.'public/images/icons/cvc.jpg'."\"  width='16' height='16' border='0' alt='' ></td>" ; 	
		$num = URL.'./public/photos/'.$value['idp'].'.jpg';
		echo "<td><div align=\"center\">";
		echo "<img src='$num'  width='30' height='30' border='1' alt=''/>";
		echo "</div></td>\n" ;
		echo "<td style=\"width:270px;\" align=\"left\" >".strtoupper($value['Nomlatin']).'_'.strtolower ($value['Prenom_Latin'])."</td>" ;
		echo "<td style=\"width:270px;\" align=\"right\" >".$value['Nomarab'].'_'.$value['Prenom_Arabe'].' : ('.$value['pere'].")</td>" ;
		
		// echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"Editer Personel\"    href=\"".URL.'inspection/pers/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/pers.PNG'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrpers($value['idp'])." ] </td>" ;
		// echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"editer Vehicule\"    href=\"".URL.'inspection/auto/'.$value['idp']."/"."\" ><img  src=\"".URL.'public/images/icons/auto.png'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrveh($value['idp'])." ] </td>" ;
		// echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"editer Inspection\"  href=\"".URL.'inspection/insp/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/search.PNG'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrano($value['idp'])." ]</td>" ;
        // echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"Editer Personel\"    href=\"".URL.'inspection/pers/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/pers.PNG'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrpers($value['idp'])." ] </td>" ;
		// echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"editer Vehicule\"    href=\"".URL.'inspection/auto/'.$value['idp']."/"."\" ><img  src=\"".URL.'public/images/icons/auto.png'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrveh($value['idp'])." ] </td>" ;
		// echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"editer Inspection\"  href=\"".URL.'inspection/insp/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/search.PNG'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrano($value['idp'])." ]</td>" ;
        // echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"editer Inspection\"  href=\"".URL.'inspection/insp/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/search.PNG'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrano($value['idp'])." ]</td>" ;
        // echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"editer Inspection\"  href=\"".URL.'inspection/insp/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/search.PNG'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrano($value['idp'])." ]</td>" ;
       
	   
	   
	   
		echo "<td style=\"width:50px;\" align=\"center\" ><a                  title=\"editer\"     href=\"".URL.'drh/editstructure/'.$value['idp']."\" >  <img  src=\"".URL.'public/images/icons/edit.PNG'."\"    width='30' height='30' border='0' alt='' ></a></td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" ><a class=\"delete\" title=\"supprimer\"  href=\"".URL.'dth/deletestructure/'.$value['idp']."\" ><img  src=\"".URL.'public/images/icons/delete.PNG'."\"  width='30' height='30' border='0' alt='' ></a></td>" ; 
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
// view::sautligne(10);			      
}				
echo "</table>";
ob_end_flush();

?>