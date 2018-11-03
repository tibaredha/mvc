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
view::button('deces','');
lang(Session::get('lang'));
ob_start();
view::munu('deces'); 
$colspan=15;				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\"  colspan=\"10\"    >" ;
// echo '<a href="'.URL.'pdf/lisdeceshospita.php">Releve Des Causes De Deces en pdf </a>'; echo '&nbsp;';	
echo "Releve Des Causes De Deces </th>" ;
echo "<th style=\"width:50px;\"  colspan=\"2\"    >Maternel</th>" ;
echo "<th style=\"width:50px;\"  rowspan=\"2\"    >Perinatal</th>" ;
echo "</tr>" ;	
echo "<tr>" ;
echo "<th style=\"width:100px;\">Date Deces</th>" ;
echo "<th style=\"width:300px;\">Nom_Prénom</th>" ;
echo "<th style=\"width:10px;\">Sexe</th> " ;
echo "<th style=\"width:100px;\">Date Naissance</th> " ;
echo "<th style=\"width:10px;\">Age</th>" ;
echo "<th style=\"width:210px;\">Commune de Residence</th>" ;
echo "<th style=\"width:10px;\">CIM10</th>" ;
echo "<th style=\"width:10px;\">Update</th>" ;
echo "<th style=\"width:10px;\">Delete</th>" ;
echo "<th style=\"width:10px;\">Certificat</th>" ;
echo "<th style=\"width:50px;\">Certificat</th>" ;
echo "<th style=\"width:50px;\">Audit</th>" ;
echo "</tr>" ;		
		foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate = 'white';
        echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
		echo "<td style=\"width:50px;\" align=\"center\" >".view::dateUS2FR($value['DINS'])."</td>" ;
		echo "<td style=\"width:50px;\" align=\"left\" ><STRONG>".$value['NOM'].'_'.strtolower ($value['PRENOM']).'_ ['.strtolower ($value['FILSDE']).']'."</STRONG></td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" >".$value['SEX']."</td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" >".$value['DATENAISSANCE']."</td>" ;
		if ($value['Years'] > 0 ) 
		{
		echo "<td style=\"width:50px;\" align=\"center\" >".$value['Years']." A </td>" ;
		} 
		else 
		{
			if ($value['Days'] <= 30 ) 
			{
			echo "<td style=\"width:50px;\" align=\"center\" >".$value['Days']." J </td>" ;
			} 
			else
			{
			echo "<td style=\"width:50px;\" align=\"center\" >".$value['Months']." M </td>" ;
			} 
		}
		echo "<td style=\"width:50px;\" align=\"left\" >".view::nbrtostring('com','IDCOM',$value['COMMUNER'],'COMMUNE')."</td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" >".$value['CODECIM']."</td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" ><a title=\"editer\"    href=\"".URL.'deces/editdeces/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/edit.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" ><a class=\"delete\" title=\"supprimer\" href=\"".URL.'deces/deletedeces/'.$value['id']."\" ><img  src=\"".URL.'public/images/icons/delete.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		echo "<td style=\"width:50px;\" align=\"center\" bgcolor=\"green\" ><a title=\"certificat de deces : ".trim($value['NOM']).', '.trim($value['PRENOM'])."\" href=\"".URL.'pdf/deceshosp.php?uc='.$value['id']."\" ><img  src=\"".URL.'public/images/icons/print.PNG'."\"  width='16' height='16' border='0' alt='' ></a></td>" ;
		?>	
			<td align="center"<?php if ($value['SEX']=='F'){echo'bgcolor="green"'; }  else {echo'bgcolor="red"';} ?>><a title="certificat de deces <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."pdf/certdecesmat.php?uc=".$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"<?php if ($value['SEX']=='F'){echo'bgcolor="green"';}   else {echo'bgcolor="red"';} ?>><a title="certificat de deces <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."deces/STEP1/".$value['id']; //echo URL."pdf/decesmaternels.php?uc=".$value['id'];  ?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>   
			<td align="center"<?php if ($value['Days'] <= 28){echo'bgcolor="green"';} else {echo'bgcolor="red"';} ?>><a title="certificat de deces <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL."pdf/decesperinat.php?uc=".$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>   		
        <?php 
		echo'</tr>';
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
			echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for deces </span></td> </tr>';
			header('location: ' . URL . 'deces/NDECES/'.$this->userListviewq);
			echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
			echo '<tr bgcolor="#00CED1"><td align="center" colspan="'.$colspan.'" >'. view::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'deces','search').'</td></tr>';	
			
			$limit=$this->userListviewl;		
			$page=$this->userListviewp;
			if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
			$total_page = ceil($total_count/$limit); echo "<br>" ;  
			$prev_url = URL.'deces/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
			$next_url = URL.'deces/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
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
view::graphemoisdeces(30,220,'Deces Par Mois Arret Au  : ','','deceshosp','DINS','',date("Y"),'',"");	
View::url(700,220,URL.'views/doc/deces/inhumation.pdf','1- L\'inhumation,le transport de corps, Conforme au Décret exécutif N° 16-77 du 24/02/2016',3);
View::url(700,250,URL.'views/doc/deces/decesfr.pdf','2- Modèle du certificat médical de décés Conforme au Décret exécutif N° 16-80 du 24/02/2016',3);
View::url(700,280,URL.'views/doc/deces/certdecesmat1.pdf','3- Déclaration obligatoiredes des décés maternels.Conforme a l Arrété du 4juillet 2013',3);
View::url(700,310,URL.'views/doc/deces/DM2013.pdf','4- Audit des deces maternels',3);
View::url(700,340,URL.'views/doc/deces/perinatal06-09.pdf','4- Programme National périnatalité',3);
View::url(700,370,URL.'views/doc/deces/Dh006.pdf','5- Declaration des causes de décès Conforme a la circulaire N° 607 du 24/09/1994',3);
View::url(700,400,URL.'views/doc/deces/Dh007.pdf','6- Institution du certificat de deces périnatale et neonatale tardif',3);
// View::url(700,460,URL.'views/doc/deces/1 Presentation_CertDc.pdf','A- Presentation_CertDc',3);
// View::url(700,490,URL.'views/doc/deces/2 Demarche_miseenplace_CertDc.pdf','B- Demarche_miseenplace_CertDc',3);
// View::url(700,490+30,URL.'views/doc/deces/3 Modes _organisation_possibles.pdf','C- Modes _organisation_possibles',3);
// View::url(700,490+60,URL.'views/doc/deces/4 Kit presentation CertDcLib vf .pdf','D- Kit presentation CertDcLib vf ',3);
// View::url(700,490+90,URL.'views/doc/deces/5 Fiche technique.pdf','E- Fiche technique',3);
view::sautligne(10);
?>	
<div id="accordion">
 
<h3>Déclaration d’un décès</h3>
 <div>
 </div>
 <h3>Déclaration d’un décès</h3>
  <div>
  <p>La déclaration est faite au niveau de la commune de décès, pour la délivrance de certificat de décès est au niveau de n’importe quelle commune ou annexe administrative communale.</p>
  <p> La déclaration de décès se fait par l'un des personnes suivantes :</p>
		<ul>
		<li>Personne possédant sur son état civil les renseignements les plus exacts et les plus complets possibles.</li>
		<li>Les hôpitaux ou les structures de santé ou les hôpitaux maritimes.</li>
		<li>Les responsables des établissements pénitentiaires, …Etc.  </li>
		</ul> 
  
		 <p>Quels sont les délais de la déclaration ?</p>
		<ul>
		<li>Les déclarations de décès doivent être faites dans un délai de vingt quatre (24) heures à compter du décès.</li>
		<li>Pour les habitants des wilayas du sud, la déclaration du décès est de vingt (20) jours.</li>
		</ul>
		<p>Les cas exceptionnels</p>
		<ul>
		<li>Lorsqu’un décès n’a pas été déclaré dans le délai légal, l’officier de l’état civil ne peut le relater sur ses registres qu’en vertu d’une ordonnance rendue par le président du tribunal de l’arrondissement dans lequel est né l’enfant, et mention sommaire est faite en marge à la date de la naissance.</li>
		<li>L'inobservance de ce délai imparti aux personnes entraîne l'application des peines prévues à l'article 441 alinéas 02 du code pénal.</li>
		<li>La déclaration de décès même tardive est reçue des lors qu'elle peut encore être vérifiée par l'examen du corps.</li>
		</ul>
		
		<p>Quels documents sont demandés ?</p>
		<ul>
		<li>L'officier de l'état civil ne peut délivrer l'acte de décès que sur production d'un certificat établi par un médecin ou, à défaut, par l'officier de police judiciaire qu'il a chargé de s'assurer du décès. </li>
		<li>La présentation du livret famille et, le cas échéant, un extrait de naissance du défunt.</li>
		</ul>
		<p>Où peut être retiré l’acte de décès ?</p>
		<p>Il peut être retiré auprès de n’importe quelle commune ou annexe administrative (pas nécessairement là où il a été transcrit)</p>
		<p>Quelle est la durée de validité de l'acte de décès ?</p>
		<p>La durée de validité est illimitée.</p>
		<p>Quels sont les délais de délivrance ? </p>
		<p>La délivrance se fait immédiatement.</p>

  <p>Le demandeur de l'extrait de décès a le droit de choisir entre sa présence lui-même au service de l'état civil de la commune, lieu de décès ou l'envoi d'une demande manuscrite par voie postale :</p>
<ul>
<li>Le premier cas : Il doit lui identifier en précisant le degré de parenté avec la personne décédée, et fournir tous les renseignements qui faciliteront la recherche.</li>
<li>Le deuxième cas : Il doit envoyer une demande dans une enveloppe timbrée et libellée à l'adresse du demandeur ;  comporte le nom, le prénom, la date et lieu du décès du défunt et la filiation.</li>
</ul>
  </div>
  <h3>Inhumation et transport de corps</h3>
  <div>
    <p>Le dossier de transport de corps est réglementé par les dispositions du décret exécutif n° 19 - 77 du 24. 02. 2016 fixant les règles relatives à l’inhumation, au transport de corps, à l’exhumation et à la ré-inhumation</p>
<p>Que faut il pour avoir un permis d’Inhumation ?</p>
<ul>
<li>Certificat de constatation du décès établi par un médecin en cas de décès naturel (domicile ou hôpital).</li>
<li>Certificat établi par le procureur de la république dans le cas d’un décès suspect.</li>
</ul>
<p>Quels documents fournir pour une autorisation de transport du corps ?</p>
<p>A l’intérieur du territoire de la wilaya ou hors- wilaya ?</p>
<ul>
<li>Demande manuscrite signée par la personne habilitée à la préparation des funérailles, contenant le nom et le prénom du défunt, son âge et son adresse.</li>
<li>Certificat de constatation de décès établi par un médecin en cas de décès naturel (domicile ou hôpital).</li>
<li>Autorisation d’inhumation établie par le procureur de la république dans le cas d’un décès suspect.</li>
<li>Bulletin de décès ou le certificat de décès.</li>
<li>Copie de la pièce d’identité (carte d’identité national ou permis de conduire) du demandeur.</li>
</ul>
<p>De l’étranger vers le pays ?</p>
<p>Dans le cas ou le décès a lieu à l’étranger, l’inhumation du corps est subordonné à une autorisation de rapatriement et de transport du défunt au lieu de sépulture, délivrée par la représentation diplomatique ou consulaire accréditée auprès du pays du lieu de décès.</p>
<p>L’autorisation d’inhumation d’une personne décédée à l’étranger, dans le cimetière de la Commune est délivrée par le P/APC concerné.</p>

  </div>
</div>

<?php


view::BOUTONGRAPHEDECES(30,555);				      
}				
echo "</table>";
ob_end_flush();

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












