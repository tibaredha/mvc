$bgcolor_donate = 'white';
        echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
		if ($value['val']==1) {?><td align="center"><a  title="désaprouver" href="<?php echo URL.'inspection/editvalstr/'.$value['id'].'/0';?>"><img src="<?php echo URL.'public/images/icons/ok.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	<?php }
		if ($value['val']==0) {?><td align="center"><a  title="aprouver" href="<?php echo URL.'inspection/editvalstr/'.$value['id'].'/1';?>"><img src="<?php echo URL.'public/images/icons/non.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	<?php }
		echo "<td style=\"width:5px;\" align=\"center\" ><button onclick=\"document.location='".URL.'inspection/view/'.$value['id']."'\" ><img  src=\"".URL.'public/images/icons/pers.PNG'."\"  width='16' height='16' border='0' alt='' ></td>" ; 	
		$fichier = photosmfx('str',$value['id'].'.jpg',$value['SEX']) ;
		echo "<td align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."inspection/upl/".$value['id']."\" ><img  src=\"".URL."public/webcam/str/".$fichier."?t=".time()."\"  width='25' height='25' border='0'></td> " ;
		
		
		echo "<td style=\"width:5px;\" align=\"center\" ><button onclick=\"document.location='".URL.'tcpdf/inspection/authdiplome.php?uc='.$value['id']."'\" ><img  src=\"".URL.'public/images/icons/cvc.jpg'."\"  width='16' height='16' border='0' alt='' ></td>" ; 	
	    echo "<td style=\"width:5px;\" align=\"center\" ><button onclick=\"document.location='".URL.'tcpdf/inspection/attestation_frar.php?uc='.$value['id']."'\" ><img  src=\"".URL.'public/images/icons/cvc.jpg'."\"  width='16' height='16' border='0' alt='' ></td>" ; 	
		
		
		echo "<td style=\"width:270px;\" align=\"left\" >".strtoupper($value['NOM']).'_'.strtolower ($value['PRENOM'])."</td>" ;
		echo "<td"; if ($value['FINCONTRAT'] > date('Y-m-d')) { echo " bgcolor=\"#7BCCB5\" ";} else { echo " bgcolor=\"red\" ";}echo " style=\"width:110px;\" align=\"center\" >".strtolower (view::dateUS2FR($value['FINCONTRAT']))."</td>" ;
		
		echo "<td style=\"width:50px;\" align=\"left\" >".view::nbrtostring('com','IDCOM',$value['COMMUNE'],'COMMUNE')."</td>" ;
		
		switch ($value['STRUCTURE']) {
		case 21://transport
		        echo "<td style=\"width:10px;\" align=\"center\" ><img  src=\"".URL.'public/images/icons/SAMB.PNG'."\"  width='30' height='16' border='0' alt='' ></td>" ;
				echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"Editer Home\"           href=\"".URL.'inspection/home21/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/b_home.png'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrhome($value['id'])." ] </td>" ;
				break;

		default:
		echo "<td style=\"width:50px;\" align=\"left\" >".view::stringtostring('structurebis','id',$value['STRUCTURE'],'structure') ."</td>" ;
		echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"Editer Home\"             href=\"".URL.'inspection/home25/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/b_home.png'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrhome($value['id'])." ] </td>" ;
		}
		
		
		echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"Editer Personel\"    href=\"".URL.'inspection/pers/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/pers.PNG'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrpers($value['id'])." ] </td>" ;
		echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"editer Vehicule\"    href=\"".URL.'inspection/auto/'.$value['id']."/"."\" ><img  src=\"".URL.'public/images/icons/auto.png'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrveh($value['id'])." ] </td>" ;
		echo "<td style=\"width:70px;\" align=\"center\" ><a title=\"editer Inspection\"  href=\"".URL.'inspection/insp/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/search.PNG'."\"  width='16' height='16' border='0' alt='' ></a> [ ".view::nbrano($value['id'])." ]</td>" ;
       
		if ($value['ETAT']==0) {?><td align="center"><a  title="désactivé" href="<?php echo URL.'inspection/editetatstr/'.$value['id'].'/1';?>"><img src="<?php echo URL.'public/images/icons/ok.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	<?php }
		if ($value['ETAT']==1) {?><td align="center"><a  title="activé" href="<?php echo URL.'inspection/editetatstr/'.$value['id'].'/0';?>"><img src="<?php echo URL.'public/images/icons/non.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	<?php }
		
		echo "<td style=\"width:50px;\" align=\"center\" ><a title=\"editer\"    href=\"".URL.'inspection/editstructure/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/edit.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" ><a class=\"delete\" title=\"supprimer\"  href=\"".URL.'inspection/deletestructure/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/delete.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		 
		echo'</tr>';