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
view::button('deces','');

// echo mnpe('PA',1,'M',2);

lang(Session::get('lang'));
ob_start();
view::munu('deces'); 
$colspan=15;				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\"  colspan=\"12\"    >" ;
echo '<a href="'.URL.'pdf/lisdeceshospita.php">Releve Des Causes De Deces en pdf </a>'; echo '&nbsp;';	
echo "photos</th>" ;
echo "<th style=\"width:50px;\"  colspan=\"2\"    >Maternel</th>" ;
echo "<th style=\"width:50px;\"  rowspan=\"2\"    >Perinatal</th>" ;
echo "</tr>" ;	
echo "<tr>" ;
echo "<th style=\"width:100px;\">Date Deces</th>" ;
echo "<th style=\"width:100px;\">Nom_Prénom</th>" ;
echo "<th style=\"width:100px;\">Père</th>" ;
echo "<th style=\"width:100px;\">Mère</th>" ;
echo "<th style=\"width:10px;\">Sexe</th> " ;
echo "<th style=\"width:100px;\">Date Naissance</th> " ;
echo "<th style=\"width:10px;\">Age</th>" ;
echo "<th style=\"width:110px;\">COMMUNER</th>" ;
echo "<th style=\"width:10px;\">CIM10</th>" ;
echo "<th style=\"width:10px;\">Update</th>" ;
echo "<th style=\"width:10px;\">Delete</th>" ;
echo "<th style=\"width:10px;\">Certificat</th>" ;
echo "<th style=\"width:50px;\">Certificat</th>" ;
echo "<th style=\"width:50px;\">Audit</th>" ;
echo "</tr>" ;		
		foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate = 'white';
        echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
		echo "<td style=\"width:50px;\" align=\"center\" >".view::dateUS2FR($value['DINS'])."</td>" ;
		echo "<td style=\"width:50px;\" align=\"left\" ><STRONG>".$value['NOM'].'_'.$value['PRENOM']."</STRONG></td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" >".$value['FILSDE']."</td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" >".$value['ETDE']."</td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" >".$value['SEX']."</td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" >".$value['DATENAISSANCE']."</td>" ;
		if ($value['Years'] > 0 ) 
		{
		echo "<td style=\"width:50px;\" align=\"center\" >".$value['Years']." A </td>" ;
		} 
		else 
		{
			if ($value['Days'] <= 30 ) 
			{
			echo "<td style=\"width:50px;\" align=\"center\" >".$value['Days']." J </td>" ;
			} 
			else
			{
			echo "<td style=\"width:50px;\" align=\"center\" >".$value['Months']." M </td>" ;
			} 
		}
		echo "<td style=\"width:50px;\" align=\"center\" >".view::nbrtostring('com','IDCOM',$value['COMMUNER'],'COMMUNE')."</td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" >".$value['CODECIM']."</td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" ><a title=\"editer\"    href=\"".URL.'deces/editdeces/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/edit.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" ><a class=\"delete\" title=\"supprimer\" href=\"".URL.'deces/deletedeces/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/delete.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" bgcolor=\"green\" ><a title=\"certificat de deces : ".trim($value['NOM']).', '.trim($value['PRENOM'])."\" href=\"".URL.'pdf/deceshosp.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/print.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		?>	
			<td align="center"<?php if ($value['SEX']=='F'){echo'bgcolor="green"'; }  else {echo'bgcolor="red"';} ?>><a title="certificat de deces <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."pdf/certdecesmat.php?uc=".$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"<?php if ($value['SEX']=='F'){echo'bgcolor="green"';}   else {echo'bgcolor="red"';} ?>><a title="certificat de deces <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."pdf/decesmaternels.php?uc=".$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>   
			<td align="center"<?php if ($value['Days'] <= 28){echo'bgcolor="green"';} else {echo'bgcolor="red"';} ?>><a title="certificat de deces <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."pdf/decesperinat.php?uc=".$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>   		
        <?php 
		echo'</tr>';
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
			echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for deces </span></td> </tr>';
			header('location: ' . URL . 'deces/NDECES/'.$this->userListviewq);
			echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
			echo '<tr bgcolor="#00CED1"><td align="center" colspan="'.$colspan.'" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'deceshosp').'</td></tr>';	
			
			$limit=$this->userListviewl;		
			$page=$this->userListviewp;
			if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
			$total_page = ceil($total_count/$limit); echo "<br>" ;  
			$prev_url = URL.'deces/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
			$next_url = URL.'deces/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
			echo '<tr bgcolor="#00CED1"  ><td align="center" colspan="'.$colspan.'" >';	
			?> 
			<?php echo '<button '; echo ($page<=0)?'disabled':'';?>                  onclick="document.location='<?php echo $prev_url; ?>'"> <?php echo ""; echo 'Previews</button>&nbsp;<span>[' .$total_count1.'/'.$total_count.' Record(s) found.]</span>'; ?>                              
			<?php echo '<button '; echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'"> <?php echo "Next</button>";?> 
			<?php 
	    }
}
else 
{
view::sautligne(14);
// view::graphemoisdeces(30,220,'Deces Par Mois Arret Au  : ','4','deceshosp','DINS','SRS',date("Y"),'4',"SRS IS NOT NULL");	
view::multigraphe(30,220,'Deces M/F Par annee Arret Au  : ','deceshosp','DINS','SEX','M','F') ;




View::url(700,220,URL.'views/doc/deces/inhumation.pdf','1- L\'inhumation,le transport de corps, Conforme au Décret exécutif N° 16-77 du 24/02/2016',3);
View::url(700,250,URL.'views/doc/deces/decesfr.pdf','2- Modèle du certificat médical de décés Conforme au Décret exécutif N° 16-80 du 24/02/2016',3);
View::url(700,280,URL.'views/doc/deces/certdecesmat1.pdf','3- Déclaration obligatoiredes des décés maternels.Conforme a l Arrété du 4juillet 2013',3);
View::url(700,310,URL.'views/doc/deces/DM2013.pdf','4- Audit des deces maternels',3);
View::url(700,340,URL.'views/doc/deces/perinatal06-09.pdf','4- Programme National périnatalité',3);
View::url(700,370,URL.'views/doc/deces/Dh006.pdf','5- Declaration des causes de décès Conforme a la circulaire N° 607 du 24/09/1994',3);
View::url(700,400,URL.'views/doc/deces/Dh007.pdf','6- Institution du certificat de deces périnatale et neonatale tardif',3);
view::BOUTONGRAPHEDECES(30,555);				      
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
<!-- 
</br>
<h4>Print Test</h4>
<input type="button" onClick="window.print()" value="Print This Page"/>
-->
