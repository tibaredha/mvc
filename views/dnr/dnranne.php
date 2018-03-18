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
view::button('dnr','');
lang(Session::get('lang'));
ob_start();
view::munu('dnr'); 
view::multigraphe(30,220,'Donneurs M/F Par annee Arret Au  : ','dnr','DINS','SEX','M','F') ;
// view::graphemoisdnr(30,380,'Donneurs Par Mois Arret Au  : ','4','dnr','DINS','SRS',date("Y"),'4',"SRS IS NOT NULL");	
view::BOUTONGRAPHE1(30,555);
view::sautligne(12);				     
ob_end_flush();
?>

 








