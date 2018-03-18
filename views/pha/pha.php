<?php 
verifsession();	
view::button('ord','');
View::h('2',25,290,'Ordonnace : new produit:');
View::sautligne(2);
View::hr();
echo 'Nombre de medicament : '.Pha::compterArticles();
View::f0(URL.'pha/ajouterArticle/','post');
View::label(25,400,'Designation Produit');          View::medicament(215,390,'libelleProduit','mvc','pha');//View::txt(215,390,'libelleProduit',0,'');
View::label(25,430,'Dose par prise ');              View::txt(215,420,'doseparprise',0,'1');
View::label(25,460,'Nbr de fois par jour');         View::txt(215,450,'nbrdrfoisparjours',0,'3');  
View::label(25,490,'Nbr de jours');                 View::txt(215,480,'nbrdejours',0,'10');  
View::label(25,520,'qteProduit');                   View::txt(215,510,'qteProduit',0,'1'); 
View::label(25,550,'prix');                         View::txt(215,540,'prixProduit',0,'0');  
View::hide(215,370,'date',0,date('Y-m-d'));
View::photosurl(1100,350,URL.'public/images/icons/pha.jpg');	
View::submit(215,570,'ENREGISTRER');									
View::f1();	
View::sautligne(15);
// echo '<pre>';print_r ($_SESSION);echo '<pre>';
?>
