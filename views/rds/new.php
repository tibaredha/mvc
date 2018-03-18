<?php 
verifsession();	
view::button('rds','');
lang(Session::get('lang'));
ob_start();
View::h('2',25,150,'Produit : new produit:');
View::sautligne(3);
View::hr();
View::f0(URL.'rds/createnewpro/','post');
// View::label(25,370,'Categorie');          View::combov(215,370,'categorie',array("A","B","C","b"));
View::label(25,250,'Designation Produit');              View::txt(215,240,'mecicament',0,'');
View::label(25,250+30,'Decription Produit');            View::txt(215,240+30,'pre',0,'');
View::label(25,250+60,'C M M');                         View::txtjs(215,240+60,'cmm',29,'00','stock()'); //FONCTION JAVASCRIPT
View::label(25,250+90,'Stock min');                     View::txtjs(215,240+90,'smin',29,'00','stock()'); 
View::label(25,250+120,'Periodicite (en mois)');        View::txtjs(215,240+120,'per',29,'03','stock()'); 
View::label(25,250+150,'Delai de livraison (en mois)'); View::txtjs(215,240+150,'dlv',29,'01','stock()'); 
View::label(25,250+180,'Quantite seuil');               View::txtjs(215,240+180,'qts',29,'00','stock()'); 
View::label(25,250+210,'Stock max');                    View::txtjs(215,240+210,'smax',29,'00','stock()'); 
View::label(25,250+240,'Stock actuel');                 View::txtjs(215,240+240,'qte',29,'00','stock()');  
View::label(25,250+270,'Prix');                         View::txtjs(215,240+270,'price',29,'00','stock()');
// View::hide(215,370,'date',0,date('Y-m-d'));
View::photosurl(1100,250,URL.'public/images/images/pan.png');	
View::submit(215,550,'ENREGISTRER');									
View::f1();	
View::sautligne(15);
ob_end_flush();
?>
	
	
