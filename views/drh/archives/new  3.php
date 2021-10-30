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
"DATE"   => date('Y-m-j'), 
"btn"       => 'inspection', 
"id"        => '', 
"butun"     => 'Inser New Structure', 
"photos"    => 'public/images/photos/MADO.jpg',
"action"    => 'inspection/createstructure/',
"STRUCTURE"  => array(      
                        "EHU"=>"1",
					    "CHU"=>"2",
						"EPH"=>"3",
						"EH"=>"4",
						"EHS"=>"5",
						"EPSP"=>"6",
						"Polyclinique"=>"7",
						"Salle de soins"=>"8",
						"EHP"=>"9",
						"centre d hemodialyse"=>"10",
						"centre de diagnostic"=>"11",
						"officine pharmaceutique"=>"12",
						"laboratoire"=>"13",
						"cabinet chirurugien dentiste specialiste"=>"14",
						"cabinet chirurugien dentiste generaliste"=>"15",
						"cabinet medecin specialiste"=>"16",
						"cabinet medecin generaliste"=>"17",
						"cabinet sagefemme"=>"18", 
						"cabinet psychologue"=>"19", 
						"cabinet de soins "=>"20", 
						"transport sanitairee"=>"21" 
					  ),
"NATURE"  => array(      
                        "PUBLIC"=>"1",
					    "PRIVEE"=>"2"	   
					  ),					  
"SEXE"  => array(      
                       "Masculin"=>"M",
					   "Feminin"=>"F"					   			   
					  ),					  
"NOM"  => 'x' ,
"PRENOM"  => 'x' ,					  
"AGE"  => '0' ,
"WILAYAN1"  => '17000' ,
"WILAYAN2"  => 'DJELFA',
"COMMUNEN1" => '924' ,
"COMMUNEN2" => 'Ain-oussera',
"ADRESSE"  => 'x', 
"OBSERVATION"  => 'x' 
);
view::button($data['btn'],'');
echo "<h2>Structure Sanitaire</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+250,'Date');              $this->txt($x+100,$y+240,'DATE',0,$data['DATE'],'date');  
$this->label($x+350,$y+250,'Type');          $this->combov1($x+450,$y+240,'STRUCTURE',$data['STRUCTURE']);
$this->label($x+700,$y+250,'Nature');        $this->combov1($x+800,$y+240,'NATURE',$data['NATURE']);
$this->label($x,$y+280,'Nom');               $this->txt($x+100,$y+270,'NOM',0,$data['NOM'],'date');
$this->label($x+350,$y+280,'Prenom');        $this->txt($x+450,$y+270,'PRENOM',0,$data['PRENOM'],'date');
$this->label($x+700,$y+280,'Sexe');          $this->combov1($x+800,$y+270,'SEXE',$data['SEXE']);
$this->label($x,$y+310,'Wilaya');            $this->WILAYA($x+100,$y+300,'WILAYA','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+350,$y+310,'Commune');       $this->COMMUNE($x+100+350,$y+300,'COMMUNE','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
$this->label($x+700,$y+310,'Adresse');       $this->txt($x+100+350+350,$y+300,'ADRESSE',0,$data['ADRESSE'],'date');
$this->submit($x+800,$y+340,$data['butun']);
$this->f1();
view::sautligne(19);
?>

<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:10px;"  colspan="9"    >
<?php
// echo '<a href="'.URL.'pdf/lisdeceshospita.php">Releve Des Causes De Deces en pdf </a>'; echo '&nbsp;';
echo 'Releve Des structures sanitaire  '; echo '&nbsp;';	
	
?>
</th>
<th style="width:10px;" colspan="2">Maternel</th>
<th style="width:10px;" rowspan="2">Perinatal</th>
</tr>
<tr>
<th style="width:100px;">Date D'ouverture</th>
<th style="width:100px;">Structure</th>
<th style="width:100px;">Nature</th>
<th style="width:200px;">Nom_Prénom</th>
<th style="width:60px;">Sexe</th>
<th style="width:10px;">Commune</th>
<th style="width:10px;">Update</th>
<th style="width:10px;">Delete</th>
<th style="width:100px;">Inspection</th>
<th style="width:50px;">Certificat</th>
<th style="width:50px;">Audit</th>
</tr>
<?php		
if (isset($this->userListview)) 
{	
		foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate ='#EDF7FF';
        ?>
		<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" ><?php echo view::dateUS2FR($value['DATE']);?></td>	
			<td align="center" ><?php echo $value['STRUCTURE'];?></td>
			<td align="center" ><?php echo $value['NATURE'];?></td>
			<td align="left" ><STRONG> <?php echo strtoupper($value['NOM']).'_'.strtolower ($value['PRENOM']);?></STRONG></td>
			<td align="center" <?php if ($value['SEX']=='M'){echo'bgcolor="#81DAF5"'; }  else {echo'bgcolor="red"';} ?> ><?php echo $value['SEX'];?></td>
			<td align="center" ><?php echo nbrtostring('com','IDCOM',$value['COMMUNE'],'COMMUNE')   ;?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'inspection/editstructure/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'inspection/deletestructure/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center" bgcolor="green"><a title="inspection <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."pdf/inspection/inspection.php?uc=".$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center" ><a title="certificat de deces <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."pdf/certdecesmat.php?uc=".$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center" <?php //if ($value['SEX']=='F'){echo'bgcolor="RED"';}   else {echo'bgcolor="red"';} ?>><a title="certificat de deces <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."pdf/decesmaternels.php?uc=".$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>   
			<td align="center" <?php //if ($value['SEX'] <= 28){echo'bgcolor="green"';} else {echo'bgcolor="red"';} ?>><a title="certificat de deces <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."pdf/decesperinat.php?uc=".$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>   		
		</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="15" ><span>' .$total_count.' record(s) found.</span></td></tr>';			
}				
echo "</table>";

ob_end_flush();
?>

<?php
view::sautligne(12);
ob_end_flush();
?>

