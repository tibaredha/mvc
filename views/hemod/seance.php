<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'','top=400,left=500 ,width=20, height=28');	
	w.document.write("<IMG src='"+img+"'>");
	w.document.close();
}
</script>
<?php 
verifsession();ob_start();
view::lang(Session::get('lang'),'d:\mvc\views\hemod\langan.php');  
view::button('hemod','');
view::munu('hemos'); 
$colspan=13;
$c='hemod';     //controlleur
$m='searchs';    //methode
$dphotos='hemo';//dossier photos				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\">".photos."</th>" ;
echo "<th style=\"width:50px;\">".View."</th>" ;
echo "<th style=\"width:50px;\">".Seance."</th>" ;
echo "<th style=\"width:50px;\">Date Dialyse</th>" ;
echo "<th style=\"width:50px;\">Debut</th> " ;
echo "<th style=\"width:50px;\">Ref mal</th> " ;
echo "<th style=\"width:50px;\">Type Dialyse</th>" ;
echo "<th style=\"width:50px;\">Mode_Dialyse</th>" ;
echo "<th style=\"width:50px;\">N APP</th>" ;
echo "<th style=\"width:50px;\">Fin</th>" ;
echo "<th style=\"width:50px;\">".Update."</th>" ;
echo "<th style=\"width:50px;\">".Delete."</th>" ;
echo "<th style=\"width:50px;\">".Prot."</th>" ;
// echo "<th style=\"width:50px;\">".Cert."</th>" ;
echo "</tr>" ;	
		foreach($this->userListview as $key => $value)
		{
		echo '<tr>';
			$fichier1 = "C:/wamp/www/mvc/public/webcam/".$dphotos."/".$value['id'].'.jpg' ;
			if (file_exists($fichier1)){$fichier = URL."public/webcam/".$dphotos."/".$value['id'].'.jpg' ;}else {$fichier = URL."public/webcam/".$dphotos."/".$value['id'].'.jpg' ;}
			if ('1'=='') {$disabled='disabled';$bgcolor_donate= '#A4A4A4' ;}else {$disabled='';$bgcolor_donate= '#EDF7FF' ;} 
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			echo "<td align=\"center\"><a title=\"Modifier Photos\" href=\"".URL.$c."/upl/".$value['id']."\" ><img  src=\"".$fichier."\"  width='20' height='20' border='1' alt='photos'></td> " ; 
			echo"<td align=\"center\" class=\"bg-gray\" style=\"padding: 5px 5px;\"><button ".$disabled." title=\" Seance".$value['id'].', '.$value['id']."'s Record \" onclick=\" document.location='".URL.$c."/view/".$value['id']."'\"  >&nbsp;&nbsp;".'<img src="'.URL.'public/images/icons/open.PNG" width="16" height="16" border="0" alt=""/>'."&nbsp;&nbsp;</button></td>";
			echo"<td align=\"center\" class=\"bg-gray\" style=\"padding: 5px 5px;\"><button ".$disabled." title=\" Seance".$value['id'].', '.$value['id']."'s Record \" onclick=\" document.location='".URL."tcpdf/hemod/seance.php?id=".$value['id']."'\"  >&nbsp;&nbsp;".'<img src="'.URL.'public/images/icons/gs.jpg" width="16" height="16" border="0" alt=""/>'."&nbsp;&nbsp;</button></td>";
			
			
			
			// echo'<td align="center" ></td>';
			//echo'<td align="center" ></td>';
			//echo'<td align="center" ></td>';
			// echo'<td align="center" >'.$value['ids'].'</td>';
			echo'<td align="center" >'.$value['dateseance'].'</td>';
			
			echo'<td align="center" >'.$value['HEUREDD'].'</td>';
			echo'<td align="center" >'.$value['id'].'</td>';
			echo'<td align="center" >'.$value['TYPEDIA'].'</td>';
			echo'<td align="center" >'.$value['ACCSANG'].'</td>';
			echo'<td align="center" >'.$value['NAPP'].'</td>';
			echo'<td align="center" >'.$value['HEUREFD'].'</td>';
			// echo'<td align="center" ></td>';
			// echo'<td align="center" ></td>';
			// echo'<td align="center" ></td>';
			
			
			
			
			
			
			
			
			
			
			
			
			
			// echo'<td align="left"><a title="view'.trim($value['NOM']).', '.trim($value['PRENOM']).'"   href="'.URL.$c.'/view/'.$value['id'].'"><strong>'.trim($value['NOM'])."_". strtolower(trim($value['PRENOM'])).' ['.strtolower(trim($value['FILS'])).'] '.'</strong></a></td>';
			// echo'<td align="center" >'.$value['DATENAISSA'].'</td>';
			// echo"<td align=\"center\" ><a  href=\" javascript:PopupImage('".$fichier."')\">".$value['SEX'].'</a></td>';
			// echo'<td '.bgcolor_ABO(trim($value['GRABO'])).'align="center" >'.trim($value['GRABO'])."_[".trim($value['GRRH'])."]".'</td>';
			// if ($value['SORTI']!='') {echo'<td bgcolor="red"  style="color:black" align="center" >'.$value['SORTI'].'</td>';} else {echo'<td bgcolor="green"  style="color:white"   align="center" >Dialyse</td>';}
			// echo'<td align="center" >'.$value['id'].'</td>';
			echo '<td align="center"><a title="Editer'.trim($value['ids']).', '.trim($value['ids']).'"   href="'.URL.$c.'/edit/'.$value['ids'].'"><img src="'.URL.'public/images/icons/edit.PNG" width="16" height="16" border="0" alt=""/></a></td>';
			echo '<td align="center"><a  class="delete"  title="Supprimer'.trim($value['ids']).', '.trim($value['ids']).'"   href="'.URL.$c.'/delete/'.$value['ids'].'"><img src="'.URL.'public/images/icons/delete.PNG" width="16" height="16" border="0" alt=""/></a></td>';
			echo '<td align="center"><a title="Carte hemod'.trim($value['ids']).', '.trim($value['ids']).'  "   href="'.URL.'tcpdf/hemod/protocole.php?id='.$value['ids'].'"><img src="'.URL.'public/images/icons/print.PNG" width="16" height="16" border="0" alt=""/></a></td>';
			//echo '<td align="center"><a title="Carte hemod'.trim($value['NOM']).', '.trim($value['PRENOM']).'  "   href="'.URL.'tcpdf/hemod/certificat.php?id='.$value['id'].'"><img src="'.URL.'public/images/icons/print.PNG" width="16" height="16" border="0" alt=""/></a></td>';
			echo '</tr>';
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
			echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found </span></td> </tr>';
			header('location: ' . URL .$c.'/newhemod/'.$this->userListviewq);
			echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{	$limit=$this->userListviewl;		
			$page=$this->userListviewp;
			echo '<tr bgcolor="#00CED1"><td align="center" colspan="'.$colspan.'" >'. view::barre_navigation ($total_count,$limit,$this->userListviewo,$this->userListviewq,$page,$this->userListviewb,$c,$m).'</td></tr>';	
			if ($page <= 0){$prev_page = $page;}else{$prev_page = $page-$limit;}
			$total_page = ceil($total_count/$limit); echo "<br>" ;  
			$prev_url = URL.$c.'/'.$m.'/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
			$next_url = URL.$c.'/'.$m.'/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
			echo '<tr bgcolor="#00CED1"  ><td align="center" colspan="'.$colspan.'" >';	
			if ($page<=0) {$disabledbp='disabled';} else {$disabledbp='';}
			if ($page>=$total_page*$limit) {$disabledbn='disabled';} else {$disabledbn='';}
			echo "<button id=\"btenavg\" ".$disabledbp."  onclick=\" document.location='".$prev_url."'\">Previews</button>&nbsp;&nbsp;&nbsp;";
			echo '<strong><span>[' .$total_count1.'] / ['.$total_count.'] Record(s) found.</span></strong>';
			echo "&nbsp;<button id=\"btenavg\" ".$disabledbn."  onclick=\" document.location='".$next_url."'\">Next</button>";	
	    }
}
else 
{
view::sautligne(14);
$colone='dateseance';
$tbl='hemoseance';
$col='ids';
$val='IS NOT NULL';
$annee=date('Y');

$data = array(
			"x"     => 30,
			"y"     => 220,
			"titre" => 'Seance Total Hemodialyse Par Mois Arret Au  : ',						
			"JAN"	=> view::graphe1mois($colone,$tbl,$annee.'-01-01',$annee.'-01-31',$col,$val) ,
			"FEV"	=> view::graphe1mois($colone,$tbl,$annee.'-02-01',$annee.'-02-28',$col,$val) ,			
			"MAR"	=> view::graphe1mois($colone,$tbl,$annee.'-03-01',$annee.'-03-31',$col,$val) ,			
			"AVR"	=> view::graphe1mois($colone,$tbl,$annee.'-04-01',$annee.'-04-30',$col,$val) ,			
			"MAI"	=> view::graphe1mois($colone,$tbl,$annee.'-05-01',$annee.'-05-31',$col,$val) ,			
			"JUIN"	=> view::graphe1mois($colone,$tbl,$annee.'-06-01',$annee.'-06-30',$col,$val) ,			
			"JUIL"	=> view::graphe1mois($colone,$tbl,$annee.'-07-01',$annee.'-07-31',$col,$val) ,			
			"AOUT"	=> view::graphe1mois($colone,$tbl,$annee.'-08-01',$annee.'-08-31',$col,$val) ,
			"SEP"	=> view::graphe1mois($colone,$tbl,$annee.'-09-01',$annee.'-09-30',$col,$val) ,
			"OCT"	=> view::graphe1mois($colone,$tbl,$annee.'-10-01',$annee.'-10-31',$col,$val) ,
			"NOV"	=> view::graphe1mois($colone,$tbl,$annee.'-11-01',$annee.'-11-30',$col,$val) ,
			"DEC"	=> view::graphe1mois($colone,$tbl,$annee.'-12-01',$annee.'-12-31',$col,$val) ,
			"DATE"	=> date('Y-m-d'), 
			"x1"     => 30,
			"y1"     => 490,
			"combo"   => array( 
								"Seance T" => 'hemod',
								"Seance P" => 'hemod/PROGRAMME',
			                    "Seance U" => 'hemod/URGENCE',
			                    "Seance FAV" => 'hemod/FAV',
			                    "Seance CAT" => 'hemod/methode4', 
								"Seance PER" => 'hemod/methode4' 
							 ),				  
			"x2"        => 1120,
			"y2"        => 220	,
            "dossier"   => "hemo",
			"combo1"   => array( 
								"1"      => 'Bienvenue sur G-dialyse 4.0',
			                    "2"      => 'Service de dialyse'
							  )			  
			);
view::graphe12mois($data);				      
}				
echo "</table>";
view::sautligne(5);
ob_end_flush();
?>







