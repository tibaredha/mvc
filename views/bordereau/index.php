<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'','top=400,left=500 ,width=20, height=28');	
	w.document.write("<IMG src='"+img+"'>");
	w.document.close();
}
</script>
<?php 
verifsession();ob_start();
//view::lang(Session::get('lang'),'C:\wamp\www\mvc\views\hemod\langan.php');  
view::button('Bordereau','');
view::munu('Bordereau'); 
$colspan=14;
$c='Bordereau';      //controlleur
$m='search';         //methode
$dphotos='Bordereau';//dossier photos				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\">Annee</th>" ;
echo "<th style=\"width:50px;\">Mois</th>" ;
echo "<th style=\"width:50px;\">Commune</th>" ;
echo "<th style=\"width:50px;\">Naissance</th>" ;
echo "<th style=\"width:50px;\">Mort Nee</th>" ;
echo "<th style=\"width:50px;\">Maraige</th>" ;
echo "<th style=\"width:50px;\">Deces</th>" ;
echo "<th style=\"width:50px;\">Update</th>" ;
echo "<th style=\"width:50px;\">Delete</th>" ;
echo "<th style=\"width:50px;\">BNM</th>" ;
echo "</tr>" ;	
		foreach($this->userListview as $key => $value)
		{
			$fichier1 = "C:/wamp/www/mvc/public/webcam/".$dphotos."/".$value['id'].'.jpg' ;
			if ($value['id'] =='') {$disabled='disabled';$bgcolor_donate= '#A4A4A4' ;}else {$disabled='';$bgcolor_donate= '#EDF7FF' ;} 
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			echo'<td align="center" >'.$value['annee'].'</td>';
			echo'<td align="center" >'.$value['mois'].'</td>';
			echo'<td align="center" >'.view::nbrtostring('com','IDCOM',$value['COMMUNEN'],'COMMUNE').'</td>';
			echo'<td align="center" >'.intval($value['nm1']+$value['nf1']+$value['nm2']+$value['nf2']).'</td>';
			echo'<td align="center" >'.intval($value['mnm1']+$value['mnf1']).'</td>';
			echo'<td align="center" >'.intval($value['m1']+$value['m2']).'</td>';
			echo'<td align="center" >'.intval($value['dm1']+$value['dm2']+$value['dm3']+$value['dm4']+$value['dm5']+$value['dm6']+$value['dm7']+$value['dm8']+$value['dm9']+$value['dm10']+$value['dm11']+$value['dm12']+$value['dm13']+$value['dm14']+$value['dm15']+$value['dm16']+$value['dm17']+$value['dm18']+$value['dm19']+$value['df1']+$value['df2']+$value['df3']+$value['df4']+$value['df5']+$value['df6']+$value['df7']+$value['df8']+$value['df9']+$value['df10']+$value['df11']+$value['df12']+$value['df13']+$value['df14']+$value['df15']+$value['df16']+$value['df17']+$value['df18']+$value['df19']).'</td>';
			echo '<td align="center"><a title="Editer '.trim($value['id']).', '.trim($value['id']).'"   href="'.URL.$c.'/edit/'.$value['id'].'"><img src="'.URL.'public/images/icons/edit.PNG" width="16" height="16" border="0" alt=""/></a></td>';
			echo '<td align="center"><a  class="delete"  title="Supprimer '.trim($value['id']).', '.trim($value['id']).'"   href="'.URL.$c.'/delete/'.$value['id'].'"><img src="'.URL.'public/images/icons/delete.PNG" width="16" height="16" border="0" alt=""/></a></td>';
			echo '<td align="center"><a title="bnm '.trim($value['id']).', '.trim($value['id']).'  "   href="'.URL.'pdf/bnm/fbnm.php?id='.$value['id'].'"><img src="'.URL.'public/images/icons/print.PNG" width="16" height="16" border="0" alt=""/></a></td>';
		echo '</tr>';
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
			echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found </span></td> </tr>';
			header('location: ' . URL .$c.'/NBordereau/'.$this->userListviewq);
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
$colone='mois';
$tbl='bordereau';
$col='id';
$val='IS NOT NULL';
$annee=date('Y');

$data = array(
			"x"     => 30,
			"y"     => 220,
			"titre" => 'Bordereau Total  Par Mois Arret Au  : ',						
			"JAN"	=> view::graphe1mois($colone,$tbl,'01','01') ,
			"FEV"	=> view::graphe1mois($colone,$tbl,'02','02') ,			
			"MAR"	=> view::graphe1mois($colone,$tbl,'03','03') ,			
			"AVR"	=> view::graphe1mois($colone,$tbl,'04','04') ,			
			"MAI"	=> view::graphe1mois($colone,$tbl,'05','05') ,			
			"JUIN"	=> view::graphe1mois($colone,$tbl,'06','06') ,			
			"JUIL"	=> view::graphe1mois($colone,$tbl,'07','07') ,			
			"AOUT"	=> view::graphe1mois($colone,$tbl,'08','08') ,
			"SEP"	=> view::graphe1mois($colone,$tbl,'09','09') ,
			"OCT"	=> view::graphe1mois($colone,$tbl,'10','10') ,
			"NOV"	=> view::graphe1mois($colone,$tbl,'11','11') ,
			"DEC"	=> view::graphe1mois($colone,$tbl,'12','12') ,
			"DATE"	=> date('Y-m-d'), 
			"x1"     => 30,
			"y1"     => 490,
			"combo"   => array( 
								"Bordereau" => 'Bordereau'
								 
							 ),				  
			"x2"        => 1120,
			"y2"        => 220	,
            "dossier"   => "Bordereau",
			"combo1"   => array( 
								"1"      => 'Bienvenue sur G-Demographie 4.0',
			                    "2"      => 'Service de Prevention'
							  )			  
			);
view::graphe12mois($data);				      
}				
echo "</table>";
view::sautligne(5);
ob_end_flush();
?>











