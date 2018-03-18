
<?php	
$url1 = explode('/',$_GET['url']);
ob_start();
view::button('deces','');

?>

<hr/><br/><br/><br/>
<?php
View::url(30,155,URL.'views/deces/cim10.pdf','CLASSIFICATION STATISTIQUE INTERNATIONALE DES MALADIES ET DES PROBLÈMES DE SANTÉ CONNEXES',3);
?>

<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:10px;">Idchapitre</th>
<th style="width:300px;">Categorie</th>
<th style="width:10px;">Diag_cod</th>
<th style="width:20px;">S/categorie</th>
<th style="width:20px;">Update</th>
<th style="width:20px;">Delete</th>
</tr>
<?php
		
if (isset($this->userListview)) 
{	
		foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate ='#EDF7FF';
        ?>
		<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			
		
        <?php
        
		echo "<td style=\"width:50px;\" align=\"center\" ><a title=\"chapitre\"    href=\"".URL.'deces/CIM/'."\" >".$value['c_chapi']."<img  src=\"".URL.'public/images/icons/b_prevpage.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		echo '<td align="LEFT"   >';echo utf8_decode($value['diag_nom']);echo '</td>';
		echo '<td align="center"   >';echo $value['diag_cod'];echo '</td>';
		echo "<td style=\"width:50px;\" align=\"center\" ><a title=\"categorie\" href=\"".URL.'deces/Scatecim/'.$value['row_id']."\" ><img  src=\"".URL.'public/images/icons/s_reload.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" ><a title=\"editer\"    href=\"".URL.'deces/editcatecim/'.$value['row_id'].'/'.$value['c_chapi']."\" ><img  src=\"".URL.'public/images/icons/edit.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" ><a class=\"delete\" title=\"supprimer\" href=\"".URL.'deces/deletecatecim/'.$value['row_id']."\" ><img  src=\"".URL.'public/images/icons/delete.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		echo "</tr>";


		
		}
		$total_count=count($this->userListview);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="15" ><span>' .$total_count.' record(s) found.</span></td></tr>';			
}				
echo "</table>";
view::sautligne(9);
ob_end_flush();
?>
	