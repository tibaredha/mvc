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
view::button('scolaire','');
lang(Session::get('lang'));
ob_start();
// view::munu('scolaire'); 
?>

<h2>New  visite medicale </h2 >
<hr /><br />

<?php
View::fieldset("ss0","<strong>Identification</strong>");View::fieldset("ss","<strong>Date Exament</strong>");
View::fieldset("ss1","<strong>Vaccination</strong>");View::fieldset("ss3","<strong>Ophtalmologie</strong>");View::fieldset("ss5","<strong>Neurologie</strong>");View::fieldset("ss7","<strong>Pneumologie</strong>");View::fieldset("ss9","<strong>Locomoteur</strong>");
View::fieldset("ss2","<strong>Parasitose</strong>");View::fieldset("ss4","<strong>ORL</strong>");View::fieldset("ss6","<strong>Endocrinologie</strong>");View::fieldset("ss8","<strong>Cardiologie</strong>");View::fieldset("ss10","<strong>Uro-Nephrologie</strong>");

$this->f0(URL.'scolaire/create/','post');
View::photosurl(1195,200,URL.'public/images/photos/PYRAMIDE.jpg');

$x=35;$y=220+90;

$this->label($x,230,'Date Examen');       $this->date($x+125,220,'DATE',0,'2016/01/01','date');
$this->label($x+400,230,'Palier');       
$this->combov1($x+440,220,'PALIER',array(
"1p"=>"1",
"2p"=>"2",
"3p"=>"3",
"4p"=>"4",
"5m"=>"5",
"1m"=>"6",
"2m"=>"7",
"3m"=>"8",
"1s"=>"9",
"2s"=>"10",
"3s"=>"11"
));

$this->WILAYA($x-5,250,'WILAYAN','WILAYANEC','mvc','wil','17000','Wilaya De Naissance');
$this->COMMUNE($x+220,250,'COMMUNEN','COMMUNENNEC','924','Commune De Naissance');
$this->COMMUNE($x+440,250,'NEC','NEC','924','Numero Etat Civil');

$this->WILAYA($x-5,280,'WILAYAR','countryss','mvc','wil','17000','Wilaya Etablissement');
$this->COMMUNE($x+220,280,'COMMUNER','COMMUNESS','924','Commune Etablissement');
$this->COMMUNE($x+440,280,'ETA','ETASS','924','Nom Etablissement');


View::label($x+700,240,'Convoqué Pour Un Suivi ');         View::chekbox($x+870,240,"CPS","CPS");
View::label($x+700,270,'Presenté Pour Un Suivi ');         View::chekbox($x+870,270,"PPS","PPS");

View::label($x+925,240,'Orienté Specialisee ');            View::chekbox($x+1095,240,"OS","OS");
View::label($x+925,270,'Pris En Charge ');                 View::chekbox($x+1095,270,"PS","PS");



View::label($x,$y+30,'Vaccination incomplète');             View::chekbox($x+170,$y+30,"AD1","AD1");
View::label($x,$y+60,'Absence cicatrice BCG');              View::chekbox($x+170,$y+60,"AD2","AD2");

View::label($x,$y+120,'Pédiculose');                        View::chekbox($x+170,$y+120,"AD3","AD3");
View::label($x,$y+150,'Gale');                              View::chekbox($x+170,$y+150,"AD4","AD4");
View::label($x,$y+180,'Oxyurose');                          View::chekbox($x+170,$y+180,"AD5","AD5");

View::label($x+240,$y+30,'Ptosis Nystagmus');               View::chekbox($x+410,$y+30,"AD6","AD6");
View::label($x+240,$y+60,'Paleur conjonctivale');           View::chekbox($x+410,$y+60,"AD7","AD7");
View::label($x+240,$y+90,'Strabisme');                      View::chekbox($x+410,$y+90,"AD8","AD8");
View::label($x+240,$y+120,'Baisse acuité visuelle');        View::chekbox($x+410,$y+120,"AD9","AD9");
View::label($x+240,$y+150,'Trachome');                      View::chekbox($x+410,$y+150,"AD10","AD10"); 

View::label($x+240,$y+210,'Surdité Hypoacousie');           View::chekbox($x+410,$y+210,"AD11","AD11");

View::label($x+480,$y+30,'Difficultés scolaires');          View::chekbox($x+650,$y+30,"AD12","AD12");
View::label($x+480,$y+60,'Troubles comportement');          View::chekbox($x+650,$y+60,"AD13","AD13");
View::label($x+480,$y+90,'Troubles langage');               View::chekbox($x+650,$y+90,"AD14","AD14");
View::label($x+480,$y+120,'Epilepsie');                     View::chekbox($x+650,$y+120,"AD15","AD15");

View::label($x+480,$y+180,'Diabète');                       View::chekbox($x+650,$y+180,"AD16","AD16");
View::label($x+480,$y+210,'Goitre');                        View::chekbox($x+650,$y+210,"AD17","AD17");

View::label($x+700,$y+30,'Asthme');                         View::chekbox($x+870,$y+30,"AD18","AD18");

View::label($x+700,$y+90,'Souffle cardiaque');              View::chekbox($x+870,$y+90,"AD19","AD19");
View::label($x+700,$y+120,'Antécédents de RAA');            View::chekbox($x+870,$y+120,"AD20","AD20");


View::label($x+925,$y+30,'Déformation des Mbres');       View::chekbox($x+1095,$y+30,"AD21","AD21");
View::label($x+925,$y+60,'Déformations du rachis');        View::chekbox($x+1095,$y+60,"AD22","AD22");
                             
View::label($x+925,$y+120,'Troubles urinaires');           View::chekbox($x+1095,$y+120,"AD23","AD23");
View::label($x+925,$y+150,'Ectopie testiculaire');         View::chekbox($x+1095,$y+150,"AD24","AD24");
View::label($x+925,$y+180,'Enurésie');                     View::chekbox($x+1095,$y+180,"AD25","AD25");


$this->submit($x+1180,$y+180+30,'Inser New scolaire');
$this->f1();


$colspan=13;				
if (isset($this->userListview)) 
{
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
echo "<tr>" ;
echo "<th style=\"width:50px;\">photos</th>" ;
echo "<th style=\"width:50px;\">View</th>" ;
echo "<th style=\"width:50px;\">Donate</th>" ;
echo "<th>Last_First_Name</th>" ;
echo "<th style=\"width:100px;\">Birthday</th> " ;
echo "<th style=\"width:80px;\">Gender</th> " ;
echo "<th style=\"width:80px;\">Blood Type</th>" ;
echo "<th style=\"width:110px;\">Telephone</th>" ;
echo "<th style=\"width:100px;\">Last Donated</th>" ;
echo "<th style=\"width:50px;\">Update </th>" ;
echo "<th style=\"width:50px;\">Delete</th>" ;
echo "<th style=\"width:50px;\">Fdnr</th>" ;
echo "<th style=\"width:50px;\">Cdnr</th>" ;


echo "</tr>" ;		
		foreach($this->userListview as $key => $value)
		{ 
		$allow_donate = allow_donate($value['DDD']);
		$bgcolor_donate = bgcolor_donate ($allow_donate);
		$fichier = photosmfx('dnr',$value['id'].'.jpg',$value['SEX']) ;
        echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
		      echo "<td align=\"center\"><a title=\"Modifier Photos\" href=\"".URL."dnr/upl/".$value['id']."\" ><img  src=\"".URL."public/webcam/dnr/".$fichier."\"  width='20' height='20' border='1' alt='photos'></td> " ;
		      // echo "<td align=\"center\" class=\"bg-gray\" style=\"padding: 5px 5px;\"><button  onclick=\"document.location='".URL."dnr/imp/';  \"   title=\"".Print_donor."\"><img src=\"".URL."public/images/icons/print.PNG\" width='20' height='20' border='0' alt=''/>".Print_donor."</button></td>" ;
		?>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'dnr/view/'.$value['id'];?>'"   title="View <?php   echo $value['NOM'].', '.$value['PRENOM']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="center" class="bg-gray" style="padding: 5px 5px;"><button onclick="document.location='<?php echo URL.'dnr/Donate/'.$value['id'];?>'" title="Donate <?php echo $value['NOM'].', '.$value['PRENOM']?>'s Record" <?php echo ($allow_donate==FALSE)?'disabled':'';?> >&nbsp;&nbsp;<img src="<?php echo URL.'public/images/icons/gs.jpg';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
			<td align="left"><a title="view" href="<?php echo URL.'dnr/view/'.$value['id'];?>"> <strong><?php echo trim($value['NOM'])."_". strtolower(trim($value['PRENOM'])).' ['.strtolower(trim($value['FILSDE'])).'] '; ?></strong></a></td>
			<td align="center" >  <?php echo $value['DATENAISSANCE'];?></td>
			<td align="center" > <a href="javascript:PopupImage('<?php echo URL.'public/webcam/dnr/'.$fichier;?>')"><?php echo $value['SEX'];?></a> </td>
			<td <?php echo bgcolor_ABO(trim($value['GRABO']))  ;?> align="center" >  <?php echo trim($value['GRABO'])."_[".trim($value['GRRH'])."]";   ?></td>
			<td align="center" >  <?php echo $value['TELEPHONE'];?></td>
			<td align="center" >  <?php echo $value['DDD'];    ?></td>
			<td align="center"><a title="editer" href="<?php echo URL.'dnr/edit/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'dnr/delete/'.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="fiche donneur <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL.'pdf/FDNRPDF.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			<td align="center"><a title="carte donneur <?php echo trim($value['NOM']).', '.trim($value['PRENOM'])?>'"" href="<?php echo URL.'pdf/CARTDNRPDF.php?uc='.$value['id'];?>"><img src="<?php echo URL.'public/images/icons/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
			
			
			</tr>	
        <?php 
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
		echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for donor </span></td> </tr>';
		header('location: ' . URL . 'dnr/newdnr/'.$this->userListviewq);
		echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
		echo '<tr bgcolor="#00CED1"><td align="center" colspan="'.$colspan.'" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'dnr').'</td></tr>';	
		
		$limit=$this->userListviewl;		
		$page=$this->userListviewp;
		if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
		$total_page = ceil($total_count/$limit); echo "<br>" ;  
		$prev_url = URL.'Dnr/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
		$next_url = URL.'Dnr/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
		echo '<tr bgcolor="#00CED1"  ><td align="center" colspan="'.$colspan.'" >';	
		?> 
		<button <?php echo ($page<=0)?'disabled':'';?>                  onclick="document.location='<?php echo $prev_url; ?>'"> Previews</button>&nbsp;<?php echo '<span>[' .$total_count1.'/'.$total_count.' Record(s) found.]</span>'; ?>                              
		<button <?php echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'">Next</button>
		<?php 
	    }
}
else 
{
view::sautligne(12);
// view::graphemoisdnr(30,220,'Donneurs Par Mois Arret Au  : ','4','dnr','DINS','SRS',date("Y"),'4',"SRS IS NOT NULL");	
// view::BOUTONGRAPHE1(30,555);				      
}				
echo "</table>";
ob_end_flush();


// echo normCDF (1.96) ;

?>






