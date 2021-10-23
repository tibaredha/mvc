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
"butun"     => 'Inser New Inspection ', 
"photos"    => 'public/images/photos/msp.jpg',
"action"    => 'inspection/createinspection/'.$this->user[0]['id'],
"DATE"      => '', 
"ANOMALIE"  => 'x' , 
);
view::button($data['btn'],'');
echo "<h2>Inspection Structure Sanitaire : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+220,'Date');              $this->txts($x+100,$y+210,'DATE',1000,$data['DATE'],'dateus');
$this->label($x,$y+280,'Anomalie');          $this->ANOMALIE($x+100,$y+270,'ANOMALIE',200,$data['ANOMALIE'],'ANOMALIE');
$this->submit($x+800,$y+340,$data['butun']);
$this->f1();
view::sautligne(19);
ob_end_flush();

?>

<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th  colspan=16    style="width:50px;">
		<?php
		echo '<a target="_blank" title="Fiche vehicules"  href="'.URL.'pdf/inspection/anomalie.php?uc='.$this->user[0]['id'].'" > Anomalies de : '.strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) ".'</a>';
		?>
		</th> 
		</tr>
		<tr>
		<th style="width:70px;">Date</th>
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
						<td align="center"><?php echo view::dateUS2FR($value['DATE']);?></td>
						<td align="left"><?php echo $value['ANOMALIE'];?></td>
						<?php 
		                if ($value['ETAT']==0) {
		                ?>
						<td align="center"><a  title="désactivé" href="<?php echo URL.'inspection/editAnomaliesetat/'.$value['id'].'/'.$value['ids'].'/1';?>"><img src="<?php echo URL.'public/images/icons/non.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	
		                <?php 
		                }
		                if ($value['ETAT']==1) {
		                ?>
						<td align="center"><a  title="activé" href="<?php echo URL.'inspection/editAnomaliesetat/'.$value['id'].'/'.$value['ids'].'/0';?>"><img src="<?php echo URL.'public/images/icons/ok.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	
						 <?php 
		                }
		                ?>
						<td align="center"><a title="editer" href="<?php echo URL.'inspection/editAnomalies/'.$value['id'].'/'.$value['ids'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'inspection/deleteAnomalies/'.$value['id'].'/'.$value['ids'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
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