<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'image','weigth=toolbar=no,scrollbars=no,resizable=yes, width=220, height=268');	
	w.document.write("<HTML><BODY onblur=\"window.close();\"><IMG src='"+img+"'>");
	w.document.write("</BODY></HTML>");
	w.document.close();
}
</script>
<?php 
verifsession();	ob_start();lang(Session::get('lang'));
view::button('scolaire','');
view::munu('scolaire'); 
$colspan=13;				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\">photos</th>" ;
echo "<th style=\"width:50px;\">View</th>" ;
echo "<th style=\"width:50px;\">Vms</th>" ;
echo "<th style=\"width:50px;\">Vac</th>" ;

echo "<th>Last_First_Name</th>" ;
echo "<th style=\"width:100px;\">Birthday</th> " ;
echo "<th style=\"width:80px;\">Gender</th> " ;
echo "<th style=\"width:80px;\">Blood Type</th>" ;
echo "<th style=\"width:110px;\">Mode Sorti</th>" ;
echo "<th style=\"width:100px;\">Last Vms</th>" ;
echo "<th style=\"width:50px;\">Update </th>" ;
echo "<th style=\"width:50px;\">Delete</th>" ;
echo "<th style=\"width:50px;\">Prot</th>" ;
echo "</tr>" ;		
		foreach($this->userListview as $key => $value)
		{ 
	     $bgcolor_donate= '#EDF7FF' ;
		//$fichier = photosmfx('hemo',$value['id'].'.jpg',$value['SEX']) ;
		$fichier = $value['id'].'.jpg' ;
	    echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
		    echo "<td align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."scolaire/upl/".$value['id']."\" ><img  src=\"".URL."public/webcam/ss/".$fichier."\"  width='20' height='20' border='1' alt='photos'></td> " ;      
		?>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'scolaire/view/'.$value['id'];?>'"   title="View <?php   echo $value['NOM'].', '.$value['PRENOM']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'scolaire/VMSID/'.$value['id'];?>'"   title="View <?php   echo $value['NOM'].', '.$value['PRENOM']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/gs.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'scolaire/VMSID/'.$value['id'];?>'"   title="View <?php   echo $value['NOM'].', '.$value['PRENOM']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/gs.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			
			
			<td align="left"><a title="view" href="<?php echo URL.'scolaire/view/'.$value['id'];?>"> <strong><?php echo trim($value['NOM'])."_". strtolower(trim($value['PRENOM'])).' ['.strtolower(trim($value['FILSDE'])).'] '; ?></strong></a></td>
			
			
			
			<td align="center" >  <?php echo $value['DATENS'];?></td>
			<td align="center" > <a href="javascript:PopupImage('<?php echo URL.'public/webcam/ss/'.$fichier;?>')"><?php echo $value['SEXE'];?></a> </td>
			<td <?php echo bgcolor_ABO(trim($value['GRABO']))  ;?> align="center" >  <?php echo trim($value['GRABO'])."_[".trim($value['GRRH'])."]";   ?></td>
			<td align="center" >  <?php //echo $value['SORTI'];?></td>
			<td align="center" ><?php echo $value['DDE'];    ?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'scolaire/edit/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'scolaire/delete/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			
			
			<td align="center"><a title="fiche hemod <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL.'tcpdf/protocole.php?id='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			
			</tr>	
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for donor </span></td> </tr>';
		header('location: ' . URL . 'scolaire/eleve/'.$this->userListviewq);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor="#00CED1"><td align="center" colspan="'.$colspan.'" >'. view::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'scolaire','search').'</td></tr>';	//$c= controleure ,$m=methode
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'scolaire/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'scolaire/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor="#00CED1"  ><td align="center" colspan="'.$colspan.'" >';	
		?> 
		<button <?php echo ($page<=0)?'disabled':'';?>                  onclick="document.location='<?php echo $prev_url; ?>'"> Previews</button>&nbsp;<?php echo '<span>[' .$total_count1.'/'.$total_count.' Record(s) found.]</span>'; ?>                              
		<button <?php echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'">Next</button>
		<?php 
	    }
}
else 
{
view::sautligne(10);
$colone='DATE';
$tbl='scolaire';
$col='id';
$val='IS NOT NULL';
$annee=date ('Y');
$data = array(
			"x"     => 30,
			"y"     => 220,
			"titre" => 'Visite medicale  Par Mois Arret Au  : ',						
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
								"scolaire" => 'scolaire',
								"a***"      => 'methode1',
			                    "b***"      => 'methode2',
			                    "c***"      => 'methode3',
			                    "d***"      => 'methode4'
			                   
							  ),
			"x2"        => 1120,
			"y2"        => 220,
            "dossier"   => "ss",
		   "combo1"   => array( 
								"1"      => 'Bienvenue sur G-scolaire 4.0',
			                    "2"      => '2',
			                    "3"      => '3',
			                    "4"      => '4' 
							  )
			);
view::graphe12mois($data);			      
}				
echo "</table>";
view::sautligne(5);
ob_end_flush();
?>