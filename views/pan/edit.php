<?php 
verifsession();	
view::button('pan','');
View::h('2',25,290,'Produit : Edit produit n °:'.$this->user[0]['id']);
View::sautligne(2);
View::hr();
View::f0(URL.'pan/editSave/'.$this->user[0]['id'],'post');
View::label(25,370,'Categorie');View::combov(215,370,'categorie',array($this->user[0]['categorie'],"A","B","C","b"));
View::label(25,400,'Nom Produit');View::txt(215,400,'NOM',0,$this->user[0]['name']);
View::label(25,430,'decription Produit');View::txt(215,430,'PRENOM',0,$this->user[0]['description']);
View::label(25,460,'C M M');                        View::txtjs(215,460,'cmm',29,$this->user[0]['cmm'],'stock()'); //FONCTION JAVASCRIPT
View::label(25,490,'Stock min');                    View::txtjs(215,490,'smin',29,$this->user[0]['smin'],'stock()'); 
View::label(25,520,'Periodicite (en mois)');        View::txtjs(215,520,'per',29,'03','stock()'); 
View::label(25,550,'Delai de livraison (en mois)'); View::txtjs(215,550,'dlv',29,'01','stock()'); 
View::label(25,580,'Quantite seuil');               View::txtjs(215,580,'qts',29,$this->user[0]['qts'],'stock()'); 
View::label(25,610,'Stock max');                    View::txtjs(215,610,'smax',29,$this->user[0]['smax'],'stock()'); 
View::label(25,640,'Stock actuel');                 View::txtjs(215,640,'qte',29,$this->user[0]['qte'],'stock()');  
View::label(25,670,'Prix');                         View::txtjs(215,670,'PRIX',29,$this->user[0]['price'],'stock()');
View::photosurl(1100,350,URL.'public/images/images/'.$this->user[0]['id'].'.jpg');	
View::hide(215,370,'date',0,date('Y-m-d'));
$url1 = explode('/',$_GET['url']);
View::hide(215,370,'categorie',0,$url1[3]);
View::submit(215,700,'update');									
View::f1();	
View::sautligne(15);
?>
	
	
