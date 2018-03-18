<?php 
verifsession();	
view::button('pan','');
View::h('2',25,290,'Produit : new produit:');
View::sautligne(2);
View::hr();
View::f0(URL.'pan/create/','post');
View::label(25,370,'Categorie');          View::combov(215,370,'categorie',array("A","B","C","b"));
View::label(25,400,'Designation Produit');View::txt(215,400,'NOM',0,'');
View::label(25,430,'Decription Produit');View::txt(215,430,'PRENOM',0,'');
View::label(25,460,'C M M');                        View::txtjs(215,460,'cmm',29,'00','stock()'); //FONCTION JAVASCRIPT
View::label(25,490,'Stock min');                    View::txtjs(215,490,'smin',29,'00','stock()'); 
View::label(25,520,'Periodicite (en mois)');        View::txtjs(215,520,'per',29,'03','stock()'); 
View::label(25,550,'Delai de livraison (en mois)'); View::txtjs(215,550,'dlv',29,'01','stock()'); 
View::label(25,580,'Quantite seuil');               View::txtjs(215,580,'qts',29,'00','stock()'); 
View::label(25,610,'Stock max');                    View::txtjs(215,610,'smax',29,'00','stock()'); 
View::label(25,640,'Stock actuel');                 View::txtjs(215,640,'qte',29,'00','stock()');  
View::label(25,670,'Prix');                         View::txtjs(215,670,'PRIX',29,'00','stock()');
View::hide(215,370,'date',0,date('Y-m-d'));
View::photosurl(1100,350,URL.'public/images/images/pan.png');	
View::submit(215,700,'ENREGISTRER');									
View::f1();	
View::sautligne(15);

?>
	
	
