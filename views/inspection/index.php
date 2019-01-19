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
view::button('inspection','');
lang(Session::get('lang'));
ob_start();
view::munu('inspection'); 
$colspan=17;				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\" colspan=\"3\" >" ;
echo '<a target="_blank" title="fiche Inspection"  href="'.URL.'tcpdf/inspection/odm.php?uc=" > Ordre de mission : </a>';

//echo "Ordre de mission </th>" ;



echo "</th>" ;
echo "<th style=\"width:50px;\"  colspan=\"15\">" ;
echo "Releve Des structures sanitaire </th>" ;
echo "</th>" ;	
echo "<tr>" ;
echo "<th style=\"width:10px;\">view</th>" ;
echo "<th style=\"width:10px;\">view</th>" ;
echo "<th style=\"width:390px;\">Responssable</th>" ;
// echo "<th style=\"width:150px;\">Proprietaire</th>" ;
echo "<th style=\"width:100px;\">Contrat Du </th>" ;
echo "<th style=\"width:200px;\">Residence</th>" ;
echo "<th style=\"width:200px;\">Structure</th>" ;

echo "<th style=\"width:10px;\">PV</th>" ;
echo "<th style=\"width:10px;\">Ouv</th>" ;
echo "<th style=\"width:10px;\">Cha</th>" ;

echo "<th style=\"width:70px;\">Pers</th>" ;
echo "<th style=\"width:70px;\">Vehi</th>" ;
echo "<th style=\"width:70px;\">Insp</th>" ;
echo "<th style=\"width:10px;\">Etat</th>" ;
echo "<th style=\"width:10px;\">Upd</th>" ;
echo "<th style=\"width:10px;\">Del</th>" ;
echo "</tr>" ;		
		foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate = 'white';
        echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
		echo "<td style=\"width:5px;\" align=\"center\" ><button onclick=\"document.location='".URL.'inspection/view/'.$value['id']."'\" ><img  src=\"".URL.'public/images/icons/pers.PNG'."\"  width='16' height='16' border='0' alt='' >         " ; 
		echo "</td>" ;
		$fichier = photosmfx('str',$value['id'].'.jpg',$value['SEX']) ;
		echo "<td align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."inspection/upl/".$value['id']."\" ><img  src=\"".URL."public/webcam/str/".$fichier."?t=".time()."\"  width='25' height='25' border='0'></td> " ;
		echo "<td style=\"width:270px;\" align=\"left\" >".strtoupper($value['NOM']).'_'.strtolower ($value['PRENOM'])."</td>" ;
		echo "<td"; 
		if ($value['FINCONTRAT'] > date('Y-m-d')) { echo " bgcolor=\"#7BCCB5\" ";} else { echo " bgcolor=\"red\" ";}
		echo " style=\"width:110px;\" align=\"center\" >".strtolower (view::dateUS2FR($value['FINCONTRAT']))."</td>" ;
		echo "<td style=\"width:50px;\" align=\"left\" >".view::nbrtostring('com','IDCOM',$value['COMMUNE'],'COMMUNE')."</td>" ;
		
		switch ($value['STRUCTURE']) {
		case 21://transport
		        echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/SAMB.PNG'."\"  width='30' height='16' border='0' alt='' ></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_ouverture\"    href=\"".URL.'tcpdf/inspection/decision.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
			    echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_modification\" href=\"".URL.'tcpdf/inspection/decisionm.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		case 14://dentiste specialiste		
				echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/SDEN.PNG'."\"  width='30' height='16' border='0' alt='' ></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"pv conformite\"         href=\"".URL.'tcpdf/inspection/pvconf15.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_ouverture\"    href=\"".URL.'tcpdf/inspection/decision_15.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
			    echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_changement\"   href=\"".URL.'tcpdf/inspection/decision_15_c.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		case 15://dentiste 		
				echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/SDEN.PNG'."\"  width='30' height='16' border='0' alt='' ></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"pv conformite\"         href=\"".URL.'tcpdf/inspection/pvconf15.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_ouverture\"    href=\"".URL.'tcpdf/inspection/decision_15.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
			    echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_changement\"   href=\"".URL.'tcpdf/inspection/decision_15_c.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		case 16://medecin  specialiste 		
				echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/SDEN.PNG'."\"  width='30' height='16' border='0' alt='' ></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"pv conformite\"         href=\"".URL.'tcpdf/inspection/pvconf15.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_ouverture\"    href=\"".URL.'tcpdf/inspection/decision_15.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
			    echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_changement\"   href=\"".URL.'tcpdf/inspection/decision_15_c.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		case 17://medecin generaliste 
		        echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/SMED.PNG'."\"  width='30' height='16' border='0' alt='' ></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_ouverture\"    href=\"".URL.'tcpdf/inspection/decision_17.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
			    echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_changement\"   href=\"".URL.'tcpdf/inspection/decision_17_c.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		case 18://sage femme 
		        echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/SMED.PNG'."\"  width='30' height='16' border='0' alt='' ></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_ouverture\"    href=\"".URL.'tcpdf/inspection/decision_17.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
			    echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_changement\"   href=\"".URL.'tcpdf/inspection/decision_17_c.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		case 19://psychologue
		        echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/SMED.PNG'."\"  width='30' height='16' border='0' alt='' ></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_ouverture\"    href=\"".URL.'tcpdf/inspection/decision_17.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
			    echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_changement\"   href=\"".URL.'tcpdf/inspection/decision_17_c.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		case 12://pharmacie 
		        echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/PHA.JPG'."\"  width='30' height='16' border='0' alt='' ></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"PV de conformite\"    href=\"".URL.'inspection/conformite/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a>  </td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_ouverture\"    href=\"".URL.'tcpdf/inspection/decision_12.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
			    echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_changement\"   href=\"".URL.'tcpdf/inspection/decision_12_c.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		case 23://opticien 
		        echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/SOPT.png'."\"  width='30' height='16' border='0' alt='' ></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_ouverture\"    href=\"".URL.'tcpdf/inspection/decision_23.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
			    echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision_changement\"   href=\"".URL.'tcpdf/inspection/decision_23_c.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		case 22://SANTE SCOLAIRE UDS 
		        echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/SS.png'."\"  width='30' height='16' border='0' alt='' ></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		case 16://SANTE  
		        echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/SMED.PNG'."\"  width='30' height='16' border='0' alt='' ></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		case 13://LABO 
		        echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/lab1.jpg'."\"  width='30' height='25' border='0' alt='' ></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/lab1.jpg'."\"  width='30' height='25' border='0' alt='' ></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/lab1.jpg'."\"  width='30' height='25' border='0' alt='' ></td>" ;
				echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/lab1.jpg'."\"  width='30' height='25' border='0' alt='' ></td>" ;
				break;
		case 10://HEMODIALYSE 
		        echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/HEMOD.jpg'."\"  width='30' height='25' border='0' alt='' ></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		case 3://EPH 
		        echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/HOPI.png'."\"  width='30' height='25' border='0' alt='' ></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		case 8://SALLE DE SOINS 
		        echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/SS.jpg'."\"  width='30' height='25' border='0' alt='' ></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"pv conformite\"     href=\"".URL.'tcpdf/inspection/pvconf.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/document-pdf.png'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
				break;
		default:
		echo "<td style=\"width:50px;\" align=\"left\" >".view::stringtostring('structurebis','id',$value['STRUCTURE'],'structure') ."</td>" ;
		echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Decision\"      href=\"".URL.'tcpdf/inspection/***.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/print.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Fiche\"         href=\"".URL.'tcpdf/inspection/***.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/print.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		echo "<td style=\"width:10px;\" align=\"center\" ><a title=\"Fiche\"         href=\"".URL.'tcpdf/inspection/***.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/print.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		}
		
		echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"editer\"    href=\"".URL.'inspection/pers/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/pers.PNG'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrpers($value['id'])." ] </td>" ;
		echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"editer\"    href=\"".URL.'inspection/auto/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/auto.png'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrveh($value['id'])." ] </td>" ;
		echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"Insp\"      href=\"".URL.'inspection/insp/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/search.PNG'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrano($value['id'])." ]</td>" ;
       
		if ($value['ETAT']==0) {?><td align="center"><a  title="désactivé" href="<?php echo URL.'inspection/editetatstr/'.$value['id'].'/1';?>"><img src="<?php echo URL.'public/images/icons/ok.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	<?php }
		if ($value['ETAT']==1) {?><td align="center"><a  title="activé" href="<?php echo URL.'inspection/editetatstr/'.$value['id'].'/0';?>"><img src="<?php echo URL.'public/images/icons/non.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	<?php }
		echo "<td style=\"width:50px;\" align=\"center\" ><a title=\"editer\"    href=\"".URL.'inspection/editstructure/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/edit.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" ><a class=\"delete\" title=\"supprimer\"  href=\"".URL.'inspection/deletestructure/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/delete.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		 
		echo'</tr>';
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
			echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for structures </span></td> </tr>';
			header('location: ' . URL . 'inspection/nstructure/'.$this->userListviewq);
			echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
			echo '<tr bgcolor="#00CED1"><td align="center" colspan="'.$colspan.'" >'. view::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'inspection','search').'</td></tr>';	
			
			$limit=$this->userListviewl;		
			$page=$this->userListviewp;
			if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
			$total_page = ceil($total_count/$limit); echo "<br>" ;  
			$prev_url = URL.'inspection/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
			$next_url = URL.'inspection/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
			echo '<tr bgcolor="#00CED1"  ><td align="center" colspan="'.$colspan.'" >';	
			?> 
			<?php echo '<button '; echo ($page<=0)?'disabled':'';?>                  onclick="document.location='<?php echo $prev_url; ?>'"> <?php echo ""; echo 'Previews</button>&nbsp;<span>[' .$total_count1.'/'.$total_count.' Record(s) found.]</span>'; ?>                              
			<?php echo '<button '; echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'"> <?php echo "Next</button>";?> 
			<?php 
	    }
}
else 
{
view::sautligne(15);
view::graphemoisdeces(30,220,'structure Par Mois Arret Au  : ','','structure','DATE','',date("Y"),'',"");	
View::url(700,220,URL.'inspection/search/0/10?o=STRUCTURE&q=5','5-EHS ',3);
View::url(700,250,URL.'inspection/search/0/10?o=STRUCTURE&q=12','12-officine pharmaceutique',3);View::url(1000,250,URL.'inspection/search/0/10?o=STRUCTURE&q=13','13-laboratoire',3);
View::url(700,280,URL.'inspection/search/0/10?o=STRUCTURE&q=15','15-chirurugien dentiste generaliste',3);View::url(1000,280,URL.'inspection/search/0/10?o=STRUCTURE&q=14','14-chirurugien dentiste specialiste',3);
View::url(700,310,URL.'inspection/search/0/10?o=STRUCTURE&q=17','17-medecin generaliste ',3);View::url(1000,310,URL.'inspection/search/0/10?o=STRUCTURE&q=16','16-medecin specialiste ',3);
View::url(700,340,URL.'inspection/search/0/10?o=STRUCTURE&q=21','21-transport sanitaire ',3);View::url(1000,340,URL.'inspection/search/0/10?o=STRUCTURE&q=10','10-centre dhemodialyse ',3);
View::url(700,370,URL.'inspection/search/0/10?o=STRUCTURE&q=23','23-OPTICIEN ',3);View::url(1000,370,URL.'inspection/search/0/10?o=STRUCTURE&q=24','24-sage femme ',3);
View::url(700,400,URL.'views/doc/deces/****',' ',3);
View::url(700,460,URL.'inspection/search/0/10?o=STRUCTURE&q=7','7-Polyclinique',3);View::url(1000,460,URL.'inspection/search/0/10?o=STRUCTURE&q=22','22-UDS',3);
View::url(700,490,URL.'inspection/search/0/10?o=STRUCTURE&q=8','8-Salle de soins  ',3);View::url(1000,490,URL.'inspection/search/0/10?o=STRUCTURE&q=25','25-kinesitherapie  ',3);
View::url(700,490+30,URL.'inspection/search/0/10?o=STRUCTURE&q=3','3-EPH ',3);View::url(1000,490+30,URL.'inspection/search/0/10?o=STRUCTURE&q=19','19-psychologue ',3);
View::url(700,490+60,URL.'inspection/search/0/10?o=STRUCTURE&q=9','9-EHP  ',3);
View::url(700,490+90,URL.'inspection/search/0/10?o=STRUCTURE&q=6','6-EPSP ',3);
view::sautligne(10);
?>

<?php


// view::BOUTONGRAPHEDECES(30,555);				      
}				
echo "</table>";
ob_end_flush();

$mail = new PHPMailer;
$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'tibaredhaamranemimi@gmail.com'; // SMTP username
$mail->Password = '030570170176';                  // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to
$mail->setFrom('tibaredha@yahoo.fr', 'DSP DJELFA');
$mail->addReplyTo('tibaredha@yahoo.fr', 'DSP DJELFA');
$mail->addAddress('tibaredha@yahoo.fr');                // Add a recipient
$mail->addCC('tibaredhaamranemimi@gmail.com');
///$mail->addBCC('bcc@example.com');
$mail->isHTML(true);  // Set email format to HTML
$mail->Subject = 'Email from Dr R.TIBA ';
$bodyContent = '<h1> Dr R.TIBA </h1>';
$bodyContent .= '<br/>';
$bodyContent .= '<p>dsp wilaya de djelfa</p>';
$url=URL.'views/doc/deces/inhumation.pdf';
// Ajouter une pièce jointe
// $mail->AddAttachment(URL.'public/images/gs.jpg');
$mail->addStringAttachment(file_get_contents($url), 'inhumationhh.pdf');
$mail->Body    = $bodyContent;



// view::sautligne(10);
// echo view::generateRandomString();

// function logout()
	// {
		// Session::destroy();
		// header('location: ' . URL .  'Authentification/login');
		// exit;
	// }
// logout();
// if(!$mail->send()) {
    // echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
    // echo 'Message has been sent';
// }
?>
<!-- 
</br>
<h4>Print Test</h4>
<input type="button" onClick="window.print()" value="Print This Page"/>
-->

















