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
view::button('pat','');
lang(Session::get('lang'));
ob_start();
echo "<hr/><br/>" ;
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
	echo "<form   onsubmit=\"return validateForm11(this);\" name=\"form1\"  action=\"".URL."Pat/search/0/10\"   method=\"GET\"   >" ;
		echo "<tr bgcolor='#EDF7FF' >" ;
			echo "<td align=\"left\"  >" ;
				echo "<select name=\"o\" style=\"width: 100px;\">" ;
					echo "<option value=\"NOM\">".Donor1."</option>" ;
					echo "<option value=\"GRABO\">".Blood_Type1."</option>" ;
					echo "<option value=\"SEX\">".Gender1."</option>" ;
				echo "</select>" ;
				echo "<input type=\"text\" name=\"q\"  value=\"\"  autofocus /> " ;//<!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
				echo "<img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>" ;
				echo "<input type=\"submit\" name=\"\" value=\"".Search_donor1."\"/> " ;
	echo "</form>" ;
				echo "<button  onclick=\"document.location='".URL."Pat/newpat/';  \"   title=\"".New_donor1."\"><img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>".New_donor1."</button> " ;
			echo "</td>" ;
            echo "<td align=\"right\"> " ;
				echo "<button  onclick=\"document.location='".URL."Pat/imp/';  \"   title=\"".Print_donor1."\"><img src=\"".URL."public/images/icons/print.PNG\" width='20' height='20' border='0' alt=''/>".Print_donor1."</button> " ;
				echo "<button  onclick=\"document.location='".URL."Pat/Pat/';  \"   title=\"".graphe_donor1."\"><img src=\"".URL."public/images/icons/graph.PNG\" width='20' height='20' border='0' alt=''/>".graphe_donor1."</button> " ;
				echo "<button  onclick=\"document.location='".URL."con/';  \"       title=\"".Search_Don1."\"><img src=\"".URL."public/images/icons/search.PNG\" width='20' height='20' border='0' alt=''/>".Search_Don1."</button> " ;
            echo "</td>" ;
        echo "</tr>" ;
echo "</table>" ;




				


$x=30;
$y=220;
echo "<div class=\"mydiv\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
?>
<form method="post" action="<?php echo URL.'pdf/imppat.php' ;?>">
	<label>Ordre</label><?php   combov1('ordre',array("Nom"=>"NOM","Prenom"=>"PRENOM"));    ?><br />
	<label>Ascdesc</label><?php combov1('ascdesc',array("croissant"=>"asc","décroissant"=>"desc"));    ?><br />
	<label>MFT</label><?php     combov1('SEXE',array("Tous Masculin et Feminin"=>"IS NOT NULL","Masculin"=>"='M'","Feminin"=>"='F'"));?><br />
	<label>Groupage</label><?php combov1('groupage',array("Tous Groupage"=>"IS NOT NULL","A"=>"='A'","B"=>"='B'","AB"=>"='AB'","O"=>"='O'"));   ?><br />
	<label>Rhesus</label><?php   combov1('rhesus',array("Tous Rhesus "=>"IS NOT NULL","Positif"=>"='Positif'","negatif"=>"='negatif'"));?><br />
	<label>Nbrlimit</label><?php combov1('nbrlimit',array("Limiter A 10"=>"10","Limiter A 20"=>"20","Limiter A 30"=>"30","Limiter A 40"=>"40","Limiter A 50"=>"50","Limiter A 60"=>"60","Limiter A 70"=>"70","Limiter A 80"=>"80","Limiter A 90"=>"90","Limiter A 100"=>"100","Limiter A 1000"=>"1000","Limiter A 10000"=>"10000"));?><br />
	<label>&nbsp;</label><input type="submit" />
</form>
<?php
echo "</div>";
$x=1120;
$y=220;
echo "<div class=\"mydiv\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	 
echo "<marquee behavior=\"scroll\" direction=\"up\" scrollamount=\"3\" scrolldelay=\"80\" onmouseover=\"this.stop()\"onmouseout=\"this.start()\" height=\"252\" width=\"350\" bgcolor=\"GREEN\">";
echo "<H2 align=\"center\">Bienvenue sur G-PTS 4.0 </H2>";
echo "<p align=\"center\"><img  id=\"mydiv2\"   align=\"center\"  src=\"".URL.'public/images/photos/1.JPG'."\" width=\"300\" height=\"300\" alt=\"1\" /></p>";
echo "<H3 align=\"center\">1. l PTS  ain oussera </H3>";
echo "<p align=\"center\"><img  id=\"mydiv2\"   align=\"center\"  src=\"".URL.'public/images/photos/3.JPG'."\" width=\"300\" height=\"300\" alt=\"1\" /></p>";
echo "</marquee>";
echo "</div>";
					      
echo '</br>';echo '</br>';echo '</br>';echo '</br>';echo '</br>';echo '</br>';echo '</br>';echo '</br>';	echo '</br>';	echo '</br>';	echo '</br>';	echo '</br>';	echo '</br>';	echo '</br>';					

ob_end_flush();
?>










