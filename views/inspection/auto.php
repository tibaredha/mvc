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

"btn"        => 'inspection', 
"id"         => '', 
"butun"      => 'Inser New Vehicule', 
"photos"     => 'public/images/icons/auto.png',
"action"     => 'inspection/creatauto/'.$this->user[0]['id'],

"Date"       => date('Y-m-j'), 
"WILAYAN1"  => '17000' ,
"WILAYAN2"  => 'DJELFA',
"COMMUNEN1" => '924' ,
"COMMUNEN2" => 'Ain-oussera',
"Categorie"  => array(      
                        "Ambulance médicalisée"=>"A",
						"Ambulance sanitaire"=>"B",
					    "Véhicule sanitaire léger"=>"C"						
					  ),
"Type"  => '0' ,					  
"Serie_Type"  => '0' ,					  
"Marque"  => array(      
                        "PEUGEOT"=>"PEUGEOT",
						"RENAULT"=>"RENAULT",
					    "DACIA"=>"DACIA",
						"KIA"=>"KIA",
						"NISSANE"=>"NISSANE",
						"BALARUS"=>"BALARUS","JMC"=>"JMC","BOULARSANE"=>"BOULARSANE","CHEVROLET"=>"CHEVROLET","JINBEI"=>"JINBEI",
						"HYUNDAI"=>"HYUNDAI"
					  ),
"Immatri"  => '0' ,
"Precedent"  => '0' ,					  
"Annee"  => date('Y'), 
					  
"NASS"  => '0', 
"DUNASS"  => '', 
"AUNASS"  => '', 
"CTRL"  => '0', 
"DUCTRL"  => '', 
"AUCTRL"  => '' 
);
view::button($data['btn'],'');
echo "<h2>Nouveau Vehicule : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;

$this->label($x,$y+220,'Date');              $this->txts($x+100,$y+210,'Date',0,$data['Date'],'dateus');  

$this->label($x,$y+250,'Wilaya aff');        $this->WILAYA($x+100,$y+240,'WILAYA','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+350,$y+250,'Commune Aff');   $this->COMMUNE($x+100+350,$y+240,'COMMUNE','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
$this->label($x+700,$y+250,'Categorie');     $this->combov1($x+800,$y+240,'Categorie',$data['Categorie']);

$this->label($x,$y+280,'Type');               $this->txt0($x+100,$y+270,'Type',20,$data['Type'],'date');
$this->label($x+350,$y+280,'Serie_Type');     $this->txt0($x+450,$y+270,'Serie_Type',20,$data['Serie_Type'],'date');
$this->label($x+700,$y+280,'Marque');         $this->combov1($x+800,$y+270,'Marque',$data['Marque']);

$this->label($x,$y+310,'Immatriculation');   $this->txts($x+100,$y+300,'Immatri',0,$data['Immatri'],'immat');
$this->label($x+350,$y+310,'Precedent num'); $this->txts($x+450,$y+300,'Precedent',0,$data['Precedent'],'immat1');
$this->label($x+700,$y+310,'Annee');         $this->txt($x+100+350+350,$y+300,'Annee',0,$data['Annee'],'date');

$this->label($x,$y+340,'_______________________________________________________________________________________'); 
$this->label($x,$y+380,'N ASSURANCE');       $this->txt($x+100,$y+370,'NASS',0,$data['NASS'],'date');
$this->label($x+350,$y+380,'DU');            $this->txts($x+450,$y+370,'DUNASS',0,$data['DUNASS'],'dateus1');
$this->label($x+700,$y+380,'AU');            $this->txts($x+100+350+350,$y+370,'AUNASS',0,$data['AUNASS'],'dateus2');
$this->label($x,$y+420,'N CONTROLE');        $this->txt($x+100,$y+410,'CTRL',0,$data['CTRL'],'date');
$this->label($x+350,$y+420,'DU');            $this->txts($x+450,$y+410,'DUCTRL',0,$data['DUCTRL'],'dateus3');
$this->label($x+700,$y+420,'AU');            $this->txts($x+100+350+350,$y+410,'AUCTRL',0,$data['AUCTRL'],'dateus4');
$this->submit($x+800,$y+450,$data['butun']);
$this->f1();
view::sautligne(15);
ob_end_flush();
echo "<h2>List des vehicules : ".strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) "."</h2 ><hr /><br />";
?>
		
		<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th  colspan=16    style="width:50px;">
		<?php
		echo '<a target="_blank" title="Fiche vehicules"  href="'.URL.'pdf/inspection/vehicule.php?uc='.$this->user[0]['id'].'" > Fiche vehicules de : '.strtoupper($this->user[0]['NOM'])."_".$this->user[0]['PRENOM']." ( ".$this->stringtostring("structurebis","id",$this->user[0]['STRUCTURE'],"structure") ." ) ".'</a>';
		?>
		</th> 
		</tr>
		<tr>
		<th style="width:70px;">WILAYA</th>
		<th style="width:70px;">COMMUNE</th>
		<th style="width:50px;">Categorie</th>
		
		
		<th style="width:70px;">Type</th>
		<th style="width:50px;">Serie_Type</th>
		<th style="width:50px;">Marque</th>
		
		<th style="width:80px;">Immatri</th>
		<th style="width:80px;">Precedent</th>
		<th style="width:100px;">Annee</th>
		
		
		<th style="width:70px;">ASS</th>
		<th style="width:70px;">CTRL</th>
		<th style="width:70px;">ETAT</th>
		
		<th style="width:50px;">PVC </th>
		<th style="width:50px;">Update </th>
		<th style="width:50px;">Delete</th>
		</tr>
		<?php
		if (isset($this->userListview)) 
		{		
				foreach($this->userListview as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="center"><?php echo View::nbrtostring('wil','IDWIL',$value['WILAYA'],'WILAYAS');?></td>
						<td align="center"><?php echo View::nbrtostring('com','IDCOM',$value['COMMUNE'],'COMMUNE');?></td>
						<td align="center"><?php echo $value['Categorie'];?></td>
						<td align="center"><?php echo $value['Type'];?></td>
						<td align="center"><?php echo $value['Serie_Type'];?></td>
						<td align="center"><?php echo $value['Marque'];?></td>
						<td align="center"><?php echo $value['Immatri'];?></td>
						<td align="center"><?php echo $value['Precedent'];?></td>
					    <td align="center"><?php echo $value['Annee'];?></td>
						<td align="center"><?php echo $value['AUNASS'];?></td>
						<td align="center"><?php echo $value['AUCTRL'];?></td>
						
						<?php 
		                if ($value['ETAT']==0) {
		                ?>
						<td align="center"><a  title="désactivé" href="<?php echo URL.'inspection/editetat/'.$value['id'].'/'.$value['idt'].'/1';?>"><img src="<?php echo URL.'public/images/icons/ok.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	
		                <?php 
		                }
		                if ($value['ETAT']==1) {
		                ?>
						<td align="center"><a  title="activé" href="<?php echo URL.'inspection/editetat/'.$value['id'].'/'.$value['idt'].'/0';?>"><img src="<?php echo URL.'public/images/icons/non.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	
						 <?php 
		                }
		                ?>
						<td align="center"><a title="PV de conformité" href="<?php echo URL.'tcpdf/inspection/pvconfv.php?uc='.$value['id'].'/'.$value['idt'];?>"><img src='<?php echo URL.'public/images/icons/document-pdf.png';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a title="editer" href="<?php echo URL.'inspection/editauto/'.$value['id'].'/'.$value['idt'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'inspection/deleteauto/'.$value['id'].'/'.$value['idt'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
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