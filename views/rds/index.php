<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'image','weigth=toolbar=no,scrollbars=no,resizable=yes, width=220, height=268');	
	w.document.write("<HTML><BODY onblur=\"window.close();\"><IMG src='"+img+"'>");
	w.document.write("</BODY></HTML>");
	w.document.close();
}
</script>
  <script>
  $(function() {
    $( "#accordion" ).accordion({
      heightStyle: "content"
    });
  });
  </script>
<?php 
verifsession();	
view::button('rds','');
lang(Session::get('lang'));
ob_start();
view::munu('rds'); 
$colspan=17;				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\" colspan=\"3\" >" ;
echo "*** </th>" ;
echo "</th>" ;
echo "<th style=\"width:50px;\"  colspan=\"15\">" ;
echo "Releve Des rds </th>" ;
echo "</th>" ;	
echo "<tr>" ;
echo "<th style=\"width:10px;\">view</th>" ;
echo "<th style=\"width:10px;\">id</th>" ;
echo "<th style=\"width:10px;\">Date</th>" ;
echo "<th style=\"width:10px;\">Structure</th>" ;
echo "<th style=\"width:200px;\">Produit</th>" ;
echo "<th style=\"width:10px;\">Presentation</th>" ;
echo "<th style=\"width:5px;\">Nature</th>" ;
echo "<th style=\"width:5px;\">CMM</th>" ;
echo "<th style=\"width:5px;\">RES</th>" ;
echo "<th style=\"width:5px;\">UPD</th>" ;
echo "<th style=\"width:5px;\">DEL</th>" ;
echo "</tr>" ;		
		foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate = 'white';
        echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
		echo "<td style=\"width:10px;\" align=\"center\" ><button onclick=\"document.location='".URL.'rds/view/'.$value['id']."'\" ><img  src=\"".URL.'public/images/icons/pers.PNG'."\"  width='16' height='16' border='0' alt='' >         " ; 
		echo "</td>" ;
		echo "<td style=\"width:10px;\" align=\"center\" >".$value['id']."</td>" ;
		echo "<td style=\"width:10px;\" align=\"center\" >".view::dateUS2FR($value['DATE'])."</td>" ;
		if ($value['STRUCTURE']==1) echo "<td style=\"width:10px;\" align=\"left\" >"."EPH AO"."</td>" ;               
		if ($value['STRUCTURE']==2) echo "<td style=\"width:10px;\" align=\"left\" >"."EPH HBB"."</td>" ;               
		if ($value['STRUCTURE']==3) echo "<td style=\"width:10px;\" align=\"left\" >"."EPH DJELFA"."</td>" ;               
		if ($value['STRUCTURE']==4) echo "<td style=\"width:10px;\" align=\"left\" >"."EPH MESSAAD"."</td>" ;               
		if ($value['STRUCTURE']==5) echo "<td style=\"width:10px;\" align=\"left\" >"."EPH IDRISSIA"."</td>" ;               
		if ($value['STRUCTURE']==6) echo "<td style=\"width:10px;\" align=\"left\" >"."EPH CHAOUA"."</td>" ;               
		if ($value['STRUCTURE']==7) echo "<td style=\"width:10px;\" align=\"left\" >"."EHS DJELFA"."</td>" ;               
		if ($value['STRUCTURE']==8) echo "<td style=\"width:10px;\" align=\"left\" >"."EPSP AO"."</td>" ;               
		if ($value['STRUCTURE']==9) echo "<td style=\"width:10px;\" align=\"left\" >"."EPSP HBB"."</td>" ;               
		if ($value['STRUCTURE']==10) echo "<td style=\"width:10px;\" align=\"left\" >"."EPSP DJELFA"."</td>" ;               
		if ($value['STRUCTURE']==11) echo "<td style=\"width:10px;\" align=\"left\" >"."EPSP MESSAAD"."</td>" ;               
		if ($value['STRUCTURE']==12) echo "<td style=\"width:10px;\" align=\"left\" >"."EPSP GUETARA"."</td>" ;               
		if ($value['STRUCTURE']==13) echo "<td style=\"width:10px;\" align=\"left\" >"."EHP  OPHTALMO"."</td>" ;               
					
		echo "<td style=\"width:200px;\" align=\"left\" >".view::nbrtostring('pha','id',$value['PRODUIT'],'mecicament')."</td>" ;
		echo "<td style=\"width:10px;\" align=\"left\" >".view::nbrtostring('pha','id',$value['PRODUIT'],'pre')."</td>" ;
		if ($value['NATURE']==1) echo "<td style=\"width:5px;\" align=\"center\" >"."Medicament"."</td>" ;  
		if ($value['NATURE']==2) echo "<td style=\"width:5px;\" align=\"center\" >"."Reactif"."</td>" ;  
		if ($value['NATURE']==3) echo "<td style=\"width:5px;\" align=\"center\" >"."Vaccin"."</td>" ;  
		if ($value['NATURE']==4) echo "<td style=\"width:5px;\" align=\"center\" >"."Produit Dentaire"."</td>" ;  
		if ($value['NATURE']==5) echo "<td style=\"width:5px;\" align=\"center\" >"."Consomable"."</td>" ;  
		
		echo "<td style=\"width:5px;\" align=\"center\" >".$value['CMM']."</td>" ;
		echo "<td style=\"width:5px;\" align=\"center\" >".$value['RES']."</td>" ;
		
		
		echo "<td style=\"width:5px;\" align=\"center\" ><a title=\"editer\"    href=\"".URL.'rds/editrds/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/edit.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		echo "<td style=\"width:5px;\" align=\"center\" ><a class=\"delete\" title=\"supprimer\"  href=\"".URL.'rds/deleterds/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/delete.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ; 
		echo'</tr>';
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
			echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for structures </span></td> </tr>';
			header('location: ' . URL . 'rds/nrds/'.$this->userListviewq);
			echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
			echo '<tr bgcolor="#00CED1"><td align="center" colspan="'.$colspan.'" >'. view::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'rds','search').'</td></tr>';	
			
			$limit=$this->userListviewl;		
			$page=$this->userListviewp;
			if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
			$total_page = ceil($total_count/$limit); echo "<br>" ;  
			$prev_url = URL.'rds/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
			$next_url = URL.'rds/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
			echo '<tr bgcolor="#00CED1"  ><td align="center" colspan="'.$colspan.'" >';	
			?> 
			<?php echo '<button '; echo ($page<=0)?'disabled':'';?>                  onclick="document.location='<?php echo $prev_url; ?>'"> <?php echo ""; echo 'Previews</button>&nbsp;<span>[' .$total_count1.'/'.$total_count.' Record(s) found.]</span>'; ?>                              
			<?php echo '<button '; echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'"> <?php echo "Next</button>";?> 
			<?php 
	    }
		
}
else 
{
view::sautligne(15);
view::graphemoisdeces(30,220,'Produit Pharmaceutique Par Mois Arret Au  : ','','rds','DATE','',date("Y"),'',"");	
View::url(700,220,URL.'views/doc/deces/***','***',3);
// View::url(700,250,URL.'views/doc/deces/***','12-officine pharmaceutique',3);
// View::url(700,280,URL.'views/doc/deces/***','15-cabinet chirurugien dentiste generaliste',3);
// View::url(700,310,URL.'views/doc/deces/***','17-cabinet medecin generaliste ',3);
// View::url(700,340,URL.'views/doc/deces/***','21-transport sanitaire ',3);
// View::url(700,370,URL.'views/doc/deces/***f','23-OPTICIEN ',3);
// View::url(700,400,URL.'views/doc/deces/****',' ',3);
// View::url(700,460,URL.'views/doc/deces/***','7-Polyclinique',3);
// View::url(700,490,URL.'views/doc/deces/***','8-Salle de soins  ',3);
// View::url(700,490+30,URL.'views/doc/deces/***','C- ',3);
// View::url(700,490+60,URL.'views/doc/deces/***','D-  ',3);
// View::url(700,490+90,URL.'views/doc/deces/***','E- ',3);
view::sautligne(10);
?>

<?php


// view::BOUTONGRAPHEDECES(30,555);				      
}				
echo "</table>";
ob_end_flush();
view::sautligne(10);
$mail = new PHPMailer;
$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'tibaredhaamranemimi@gmail.com'; // SMTP username
$mail->Password = '030570170176';                  // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to
$mail->setFrom('tibaredha@yahoo.fr', 'DSP DJELFA');
$mail->addReplyTo('tibaredha@yahoo.fr', 'DSP DJELFA');
$mail->addAddress('tibaredha@yahoo.fr');                // Add a recipient
$mail->addCC('tibaredhaamranemimi@gmail.com');
///$mail->addBCC('bcc@example.com');
$mail->isHTML(true);  // Set email format to HTML
$mail->Subject = 'Email from Dr R.TIBA ';
$bodyContent = '<h1> Dr R.TIBA </h1>';
$bodyContent .= '<br/>';
$bodyContent .= '<p>dsp wilaya de djelfa</p>';
$url=URL.'views/doc/deces/inhumation.pdf';
// Ajouter une pièce jointe
// $mail->AddAttachment(URL.'public/images/gs.jpg');
$mail->addStringAttachment(file_get_contents($url), 'inhumationhh.pdf');
$mail->Body    = $bodyContent;



// view::sautligne(10);
// echo view::generateRandomString();

// function logout()
	// {
		// Session::destroy();
		// header('location: ' . URL .  'Authentification/login');
		// exit;
	// }
// logout();
// if(!$mail->send()) {
    // echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
    // echo 'Message has been sent';
// }
?>
<!-- 
</br>
<h4>Print Test</h4>
<input type="button" onClick="window.print()" value="Print This Page"/>
-->

















