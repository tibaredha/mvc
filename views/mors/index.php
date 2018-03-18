<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'','top=400,left=500 ,width=20, height=28');	
	w.document.write("<IMG src='"+img+"'>");
	w.document.close();
}
</script>
<?php 
verifsession();ob_start();
view::lang(Session::get('lang'),'C:\wamp\www\mvc\views\hemod\langan.php');  
view::button('mors','');
view::munu('mors'); 
$colspan=14;
$c='mors';      //controlleur
$m='search';         //methode
$dphotos='mors';//dossier photos				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:10px;\">ETAB</th>" ;
echo "<th style=\"width:100px;\">DATE</th>" ;
echo "<th style=\"width:250px;\">NomPrenom</th>" ;
echo "<th style=\"width:50px;\">Sexe</th>" ;
echo "<th style=\"width:50px;\">Age</th>" ;
echo "<th >Commune</th>" ;
echo "<th >Maladie</th>" ;
echo "<th >Obseravation</th>" ;
echo "<th style=\"width:50px;\">".Update."</th>" ;
echo "<th style=\"width:50px;\">".Delete."</th>" ;
echo "<th style=\"width:50px;\">Enquete</th>" ;
echo "</tr>" ;	
		foreach($this->userListview as $key => $value)
		{
			$fichier1 = "C:/wamp/www/mvc/public/webcam/".$dphotos."/".$value['id'].'.jpg' ;
			if ($value['id'] =='') {$disabled='disabled';$bgcolor_donate= '#A4A4A4' ;}else {$disabled='';$bgcolor_donate= '#EDF7FF' ;} 
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			echo'<td align="center" >'.trim($value['STRUCTURE']).'</td>';
			echo'<td align="center" >'.trim($this->dateUS2FR($value['DATEMORS'])).'</td>';
			echo'<td align="left" >'.trim($value['NOMPRENOM']).'</td>';
			echo'<td align="center" >'.trim($value['SEXE']).'</td>';
			echo'<td align="center" >'.trim($value['AGE']).'</td>';
			echo'<td align="left" >'.trim(view::nbrtostring('com','IDCOM',$value['COMMUNE'],'COMMUNE')).'</td>';
			echo'<td align="left" >'.trim($value['ANIMAL']).'</td>';
			echo'<td align="left" >'.trim($value['POIDS']).'</td>';
			echo '<td align="center"><a title="Editer '.trim($value['id']).', '.trim($value['id']).'"   href="'.URL.$c.'/edit/'.$value['id'].'"><img src="'.URL.'public/images/icons/edit.PNG" width="16" height="16" border="0" alt=""/></a></td>';
			echo '<td align="center"><a  class="delete"  title="Supprimer '.trim($value['id']).', '.trim($value['id']).'"   href="'.URL.$c.'/delete/'.$value['id'].'"><img src="'.URL.'public/images/icons/delete.PNG" width="16" height="16" border="0" alt=""/></a></td>';
			echo '<td align="center"><a title="fd '.trim($value['id']).', '.trim($value['id']).'  "   href="'.URL.'pdf/mdo/fmdo.php?id='.$value['id'].'&mdo='.$value['POIDS'].'"><img src="'.URL.'public/images/icons/print.PNG" width="16" height="16" border="0" alt=""/></a></td>';
		echo '</tr>';
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
			echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found </span></td> </tr>';
			header('location: ' . URL .$c.'/nmaldecobl/'.$this->userListviewq);
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
$colone='DATEMORS';
$tbl='mors';
$col='id';
$val='IS NOT NULL';
$annee=date('Y');

$data = array(
			"x"     => 30,
			"y"     => 220,
			"titre" => 'Maladie A Declaration Obligatoire Total  Par Mois Arret Au  : ',						
			"JAN"	=> view::mdomois($annee.'-01-01',$annee.'-01-30') ,
			"FEV"	=> view::mdomois($annee.'-02-01',$annee.'-02-30') ,			
			"MAR"	=> view::mdomois($annee.'-03-01',$annee.'-03-30') ,			
			"AVR"	=> view::mdomois($annee.'-04-01',$annee.'-04-30') ,			
			"MAI"	=> view::mdomois($annee.'-05-01',$annee.'-05-30') ,			
			"JUIN"	=> view::mdomois($annee.'-06-01',$annee.'-06-30') ,			
			"JUIL"	=> view::mdomois($annee.'-07-01',$annee.'-07-30') ,			
			"AOUT"	=> view::mdomois($annee.'-08-01',$annee.'-08-30') ,
			"SEP"	=> view::mdomois($annee.'-09-01',$annee.'-09-30') ,
			"OCT"	=> view::mdomois($annee.'-10-01',$annee.'-10-30') ,
			"NOV"	=> view::mdomois($annee.'-11-01',$annee.'-11-30') ,
			"DEC"	=> view::mdomois($annee.'-12-01',$annee.'-12-30') ,
			"DATE"	=> date('Y-m-d'), 
			"x1"     => 30,
			"y1"     => 490,
			"combo"   => array( 
								"maldecobl" => 'maldecobl'
								 
							 ),				  
			"x2"        => 1120,
			"y2"        => 220	,
            "dossier"   => "mdo",
			"combo1"   => array( 
								"1"      => 'Bienvenue sur G-MORS 4.0',
			                    "2"      => 'Service de Prevention'
							  )			  
			);
view::graphe12mois($data);				      
}				
echo "</table>";
view::sautligne(5);
ob_end_flush();
?>











