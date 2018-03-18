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
"btn"        => 'rds', 
"id"         => '', 
"butun"      => 'Inser Nouveau Retrait ', 
"photos"     => 'public/images/photos/rtr.png',
"action"     => 'rds/creatertr/' 
);
view::button($data['btn'],'');
echo "<h2>Nouveau Retrait de produit Pharmaceutique  </h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;
$this->label($x,$y+250,'Date Retrait');  $this->txts($x+100,$y+240,'DATE',0,date('j-m-Y'),'dateus');  
View::url($x,$y+250+10,URL.'rds/newpro/','Produit +',4);View::medicament($x+100,$y+270,'PRODUIT','mvc','pha');//$this->combords1($x+100,$y+300,'PRODUIT','pha1','','','$class',0,2,3,4,5,6) ; 
$this->label($x,$y+310,'NLOT');          $this->txt($x+100,$y+300,'NLOT',0,'0','date');
$this->label($x,$y+340,'DDP');           $this->txtS($x+100,$y+330,'DDP',0,date('j-m-Y'),'dateus1');
$this->label($x,$y+370,'MOTIF');         $this->txt($x+100,$y+360,'MOTIF',0,'X','date');
$this->label($x,$y+400,'REF');           $this->txt($x+100,$y+390,'REF',0,'X','date');
$this->submit($x+100,$y+250+180,$data['butun']);
$this->f1();
view::sautligne(22);
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\" colspan=\"3\" >" ;
echo '<a target="_blank" title="Retrait et Mise en Quarantaine"  href="'.URL.'pdf/rds/rtr.php" > Retrait et Mise en Quarantaine : </a>';
echo "</th>" ;
echo "</th>" ;
echo "<th style=\"width:50px;\"  colspan=\"15\">" ;
echo "Releve Des Retraits de produits Pharmaceutiques </th>" ;
echo "</th>" ;	
echo "<tr>" ;
echo "<th style=\"width:10px;\">DATE</th>" ;
echo "<th style=\"width:10px;\">PRODUIT</th>" ;
echo "<th style=\"width:10px;\">NLOT</th>" ;
echo "<th style=\"width:10px;\">DDP</th>" ;
echo "<th style=\"width:200px;\">Update</th>" ;
echo "<th style=\"width:10px;\">Delete</th>" ;
echo "<th style=\"width:5px;\">Print</th>" ;
echo "</tr>" ;
		foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate ='#EDF7FF';
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			<td align="center" ><?php echo $value['DATE'];?></td>
			<td align="left" ><?php echo $value['PRODUIT'];?></td>
			<td align="left" ><?php echo $value['NLOT'];?></td>
			<td align="center" ><?php echo $value['DDP'];?></td>
			<td align="center"><a title="editer <?php echo trim($value['id']);?>'s Record"                        href="<?php echo URL.'rds/editrtr/'.$value['id'].'/'.$value['categorie'];?>">      <img src="<?php echo URL.'public/images/icons/edit.PNG';?>"   width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="supprimer <?php echo trim($value['id']);?>'s Record"  class="delete"     href="<?php echo URL.'rds/deletertr/'.$value['id'];?>">    <img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche stock <?php echo trim($value['id']);?>'s Record"                   href="<?php echo URL.'pdf/***.php?uc='.$value['id'];?>">   <img src="<?php echo URL.'public/images/icons/print.PNG';?>"  width='16' height='16' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="12" ><span> No record found for rtr </span></td> </tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="12" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
		}
		else
		{
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="12" ><span>' .$total_count.' Record(s) found.</span></td></tr>';	
		}
}
else 
{
echo '<tr><td align="center" colspan="12" ><span> No record found.</span></td></tr>';
echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="12" ><span>&nbsp;</span></td></tr>';					      
}				
echo "</table>";
ob_end_flush();
?>


