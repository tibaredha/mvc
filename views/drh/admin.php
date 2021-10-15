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
$fichier = photosmfy('drh',$this->user[0]['idp'].'.jpg',$this->user[0]['Sexe']);
ob_start();
$data = array(
"Date"       => date('Y-m-j'), 
"btn"        => 'drh', 
"id"         => '', 
"butun"      => 'Inser New congé', 
"photos"     => 'public/webcam/drh/'.$fichier
);
view::button($data['btn'],'');
echo "<h2>ادارة المستخدم : ".strtoupper($this->user[0]['Nomlatin'])."_".$this->user[0]['Prenom_Latin']." ( ".$this->stringtostring("grade","idg",$this->user[0]['rnvgradear'],"gradear") ." ) "."</h2 ><hr /><br />";
View::photosurl(1170,230,URL.$data['photos']);
View::fieldset("field1","***");View::fieldset("field2","***");

//View::gestion (40,260,$_GET['idp'],' شهادة عمل عربى','ctravail','b_props');

View::url(50,230,URL.'tcpdf/drh/convocation.php?uc='.$this->user[0]['idp'],'1- convocation',3);

View::url(50,260,URL.'tcpdf/drh/notation.php?uc='.$this->user[0]['idp'],'2- notation',3);

View::url(50,260+30,URL.'tcpdf/drh/attestation_trav_ar.php?uc='.$this->user[0]['idp'],'3- ATS',3);

View::url(50,290+30,URL.'tcpdf/drh/attestation_trav_ar.php?uc='.$this->user[0]['idp'],'4- DRT',3);


view::sautligne(19);
ob_end_flush();
?>