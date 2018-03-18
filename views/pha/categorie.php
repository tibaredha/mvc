<?php 
verifsession();	
view::button('pan','');
?>
<h2>Categoies  Produits </h2><hr/><br/>
<table  width='70%' border='1' cellpadding='5' cellspacing='1' align='center'>
<tr>
<th style="width:25px;">PHOTOS</th> 
<th style="width:50px;">PRODUIT</th> 
<th style="width:80px;">DESCRIPTION</th> 
<th style="width:80px;">PRIX</th>
<th style="width:80px;">Ajouter au panier</th>
</tr>
<?php
View::CATEGORIEM() ;
echo "</br>";
echo "Nombre total d'article : ".pha::compterArticles();
echo "</br>";
echo "Total HT: ".pha::MontantGlobal()." DA ";
if (isset($this->userListview)) 
{	
		foreach($this->userListview as $key => $value)
		{ 
		//$allow_donate = allow_donate($value['DATEDON']);
		$bgcolor_donate ='#EDF7FF';
        ?>
			<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >
			
			<td align="center" >  
			<img src="<?php echo  URL.'public/images/images/'.$value['id'].'.jpg'; ?>" width="60" height="60" alt="<?php echo $value['name'];?>"/>
			</td>
			<td align="left" >  <?php echo $value['name'];    ?></td>
			<td align="left" >  <?php echo $value['description'];    ?></td>
			<td align="center" >  <?php echo $value['price'];    ?></td>
			<td align="center"><a title="Ajouter au panier <?php echo trim($value['name']);?>'s Record" href="<?php echo URL.'pan/ajouterArticle/'.$value['name'].'/'.$value['price'].'/'.$value['categorie'];?>"> <img src="<?php echo URL.'public/images/icons/pan.png';?>"   width='26' height='26' border='0' alt=''/></a></td>
			</tr>
        <?php 
		}
		$total_count=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="12" ><span> No record found for cgr </span></td> </tr>';
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
?>