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
lang(Session::get('lang'));
ob_start();
$data = array(
"btn"       => 'inspection', 
"id"        => '', 
"butun"     => 'Ajout  Anomalie ', 
"photos"    => 'public/images/photos/msp.jpg',
"action"    => 'inspection/createanomalie/'.$this->user[0]['id'],
"DATE"      => '', 
"ANOMALIEX" => array( 
				""=>"",
				"Absence non justifiée du titulaire de l'agrément"=>"Absence non justifiée du titulaire de l'agrément",
				"Absence d'agrément au local indiqué"=>"Absence d'agrément au local indiqué",
				"Absence de convention d'incinération"=>"Absence de convention d'incinération",
				"Cabinet non équipé d'un autoclave fonctionnel"=>"Cabinet non équipé d'un autoclave fonctionnel",	  
				"Local non conforme"=>"Local non conforme",
				"Local inexistant  a l’adresse indiquée  le jour de l’inspection"=>"Local inexistant  a l’adresse indiquée  le jour de l’inspection",
				"Local fermé au public le jour de l'inspection"=>"Local fermé au public le jour de l'inspection",
				"Non respect des protocoles d'hygienne"=>"Non respect des protocoles d'hygienne",			 
				"Obstruction a l'inspection"=>"Obstruction a l'inspection",	
				"Plaque signaletique non conforme aux normes "=>"Plaque signaletique non conforme aux normes",
				"Présence d'un Stérilisateur a chaleur sèche Poupinel dont l'usage est désormais interdit"=>"Présence d'un Stérilisateur a chaleur sèche Poupinel dont l'usage est désormais interdit",
				"Présence d'un appareil de radiologie sans autorisation préalable du centre de radio protection "=>"Présence d'un appareil de radiologie sans autorisation préalable du centre de radio protection",
				"Présence d’un laboratoire non autorisé par la DSP en dehors du périmètre de la pharmacie "=>"Présence d’un laboratoire non autorisé par la DSP en dehors du périmètre de la pharmacie",
				"Présence d’un échographe non autorisé par la DSP "=>"Présence d’un échographe non autorisé par la DSP",
				"Remplacement non autorisé par la DSP"=>"Remplacement non autorisé par la DSP",
				"Transfert du Local non autorisé par la DSP"=>"Transfert du Local non autorisé par la DSP"
				),
"ANOMALIE"  => ''  
);
view::button($data['btn'],'');
echo "<h2>Anomalies Inspection du  : ".$this->user[0]['DATE']." structure : ".strtoupper($this->stringtostring("structure","id",$this->user[0]['ids'],"NOM")).'_'.$this->stringtostring("structure","id",$this->user[0]['ids'],"PRENOM")."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;

$this->label($x,$y+220,'Anomalie fixe');           $this->combov2($x+110,$y+210,'ANOMALIEX',$data['ANOMALIEX']);
$this->label($x,$y+280,'Anomalie (<11)');          $this->ANOMALIE($x+110,$y+270,'ANOMALIE',200,$data['ANOMALIE'],'ANOMALIE');
View::hide(215,670,'DATE',0,$this->user[0]['DATE']);
View::hide(215,670,'ids',0,$this->user[0]['ids']);
// echo $this->user[0]['STRUCTURE'];
View::hide(215,670,'STRUCTURE',0,$this->user[0]['STRUCTURE']);
$this->submit($x+800,$y+340,$data['butun']);
$this->f1();
view::sautligne(19);
ob_end_flush();

?>

<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th  colspan=16    style="width:50px;">
		<?php
		echo '<a  title="Retour inspection"  href="'.URL.'inspection/insp/'.$this->user[0]['ids'].'" > Retour inspection </a>';echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		
		echo '<a target="_blank" title="rapport inspection"  href="'.URL.'tcpdf/inspection/rapportinsp.php?uc='.$this->user[0]['id'].'&uc1='.$this->user[0]['ids'].'&date='.$this->user[0]['DATE'].'" > Rapport inspection du '.$this->user[0]['DATE'].' </a>';
		
		?>
		</th> 
		</tr>
		<tr>
		
		<th style="width:800px;">Anomalies</th>
		<th style="width:10px;">ETAT</th>
		<th style="width:10px;">Update </th>
		<th style="width:10px;">Delete</th>
		</tr>
		<?php
		if (isset($this->userListview)) 
		{		
				foreach($this->userListview as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="left"><?php echo $value['ANOMALIE'];?></td>
						<?php 
		                if ($value['ETAT']==0) {
		                ?>
						<td align="center"><a  title="désactivé" href="<?php echo URL.'inspection/editAnomaliesetat/'.$value['id'].'/'.$value['ids'].'/1/'.$value['idinsp'];?>"><img src="<?php echo URL.'public/images/icons/non.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	
		                <?php 
		                }
		                if ($value['ETAT']==1) {
		                ?>
						<td align="center"><a  title="activé" href="<?php echo URL.'inspection/editAnomaliesetat/'.$value['id'].'/'.$value['ids'].'/0/'.$value['idinsp'];?>"><img src="<?php echo URL.'public/images/icons/ok.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	
						 <?php 
		                }
		                ?>
						<td align="center"><a title="editer" href="<?php echo URL.'inspection/editAnomalies/'.$value['id'].'/'.$value['ids'].'/'.$value['idinsp'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'inspection/deleteAnomalies/'.$value['id'].'/'.$value['ids'].'/'.$value['idinsp'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
						</tr>
				<?php 
				}
				$total_count=count($this->userListview);
				if ($total_count <= 0 )
				{
				echo '<tr><td align="center" colspan="16" ><span> No record found for autos </span></td> </tr>';
				echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="16" ><span>' .$total_count.'/'.$total_count.' Record(s) found.</span></td></tr>';					
				}
				else
				{		
				//echo '<tr bgcolor=""  ><td align="center" colspan="16" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb).'</td></tr>';	
			    echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="16" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
				}		
		}
		else 
		{
		echo '<tr><td align="center" colspan="16" ><span> Click search button to start searching a vms.</span></td></tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="16" ><span>&nbsp;</span></td></tr>';					      
		} 
		echo "</table>";
		?>
		<br/><br/>


