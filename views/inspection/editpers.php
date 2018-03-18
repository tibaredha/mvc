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
"Date"       => date('Y-m-j'), 
"btn"        => 'inspection', 
"id"         => '', 
"butun"      => 'Inser New personnel', 
"photos"     => 'public/images/icons/pers.PNG',
"action"     => 'inspection/editSavespers/'.$this->user[0]['id'].'/'.$this->user[0]['idt'],

"CASNOS"        => $this->user[0]['CASNOS'],
"DEBUTCONTRAT"  => $this->user[0]['DEBUTCONTRAT'],
"FINCONTRAT"    => $this->user[0]['FINCONTRAT'],

"NOMAR"      => $this->user[0]['NOMAR'],
"PRENOMAR"   => $this->user[0]['PRENOMAR'] ,	

"Categorie"  => array(  
                        $this->user[0]['Categorie']=>$this->user[0]['Categorie'],
                        "MEDECIN"=>"M",
						"PARAMEDICALE"=>"P",
					    "CHAUFFEUR"=>"C"						
					  )
);
view::button($data['btn'],'');
echo "<h2> edite personnel : ".strtoupper($this->user[0]['NOMAR'])."_".$this->user[0]['PRENOMAR']." </h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x+970,$y+300,'اللقـــب');           $this->txtar($x+690,$y+290,'PRENOMAR',0,$data['PRENOMAR'],'date');
$this->label($x+640,$y+300,'الاســـــــم');        $this->txtar($x+340,$y+290,'NOMAR',0,$data['NOMAR'],'date');
$this->label($x+290,$y+300,'المهنة');             $this->combov1($x,$y+290,'Categorie',$data['Categorie'],'date');
$this->label($x,$y+370,'__________________________________________________________________________________________________________________');
$this->label($x,$y+400,'N°_Casnos');              $this->txt($x+100,$y+390,'CASNOS',0,$data['CASNOS'],'date');
$this->label($x+350,$y+400,'Début contrat');      $this->txt($x+450,$y+390,'DEBUTCONTRAT',0,$data['DEBUTCONTRAT'],'date');
$this->label($x+700,$y+400,'Fin contrat');        $this->txt($x+100+350+350,$y+390,'FINCONTRAT',0,$data['FINCONTRAT'],'date');
$this->submit($x+800,$y+450,$data['butun']);
$this->f1();
view::sautligne(15);
ob_end_flush();
echo "<h2>List des personnels :</h2 ><hr /><br />";

?>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th  colspan=16    style="width:50px;">
		
		<?php
		echo '<a target="_blank" title="Fiche vehicules"  href="'.URL.'inspection/pers/'.$this->user[0]['idt'].'" >NOUVEAU </a>';
		?>
		
		</th> 
		</tr>
		<tr>
		<th style="width:50px;">Categorie</th>
		<th style="width:50px;">CASNOS</th>
		<th style="width:70px;">debut contrat</th>
		<th style="width:70px;">fin contrat</th>
		<th style="width:70px;">الاســـــــم</th>
		<th style="width:50px;">اللقب</th>
		
		<th style="width:10px;">Upd </th>
		<th style="width:10px;">Del</th>
		</tr>
		<?php
		if (isset($this->userListview)) 
		{		
				foreach($this->userListview as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						
						
						<td align="center"><?php echo $value['Categorie'];?></td>
						<td align="center"><?php echo $value['CASNOS'];?></td>
						<td align="center"><?php echo view::dateUS2FR($value['DEBUTCONTRAT']);?></td>
						<td align="center"><?php echo view::dateUS2FR($value['FINCONTRAT']) ;?></td>
						
						<td align="center"><?php echo $value['NOMAR'];?></td>
						<td align="center"><?php echo $value['PRENOMAR'];?></td>
						
						
						<td align="center"><a title="editer" href="<?php echo URL.'inspection/editpers/'.$value['id'].'/'.$value['idt'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'inspection/deletepers/'.$value['id'].'/'.$value['idt'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
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
		