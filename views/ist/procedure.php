<?php 
verifsession();	
view::button('eva','');
?>


<!--  

<label><img src=\"".URL."public/images/archives/".$value3." \" width='100' height='100' border='2' alt=''/></label>
-->





<?php	
function ligne4($label,$value1,$value2,$value3) 
{
echo "
<tr>
<td>
<label>$label</label>
</td>
<td>
<label>$value1</label>
</td>
<td>
<label>$value2</label>
</td>
<td>
<label>$value3</label>
</td>
</tr>
";	
}
?>
<h2> collecte de sang homologue en cabine fixe  </h2>
<hr /><br />
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<tr align="left"   > 
<th colspan="4"  >1 ACCUEIL ET INFORMATION</th>	
</tr>
<?php
ligne4("N° Opération","Description détaillée de la procédure","Intervenants","Commentaires") ; 
ligne4("1.1","Accueillir le donneur de façon conviviale et personnalisée","Agent d’acceuil","") ;
ligne4("1.2","Présenter une information pré-don claire et compréhensible","Agent d’acceuil","") ;
ligne4("1.3","Etablir la fiche de donneur","Agent d’acceuil","") ;
ligne4("1.4","Orienter le donneur vers le cabinet de consultation médicale","Agent d’acceuil","") ;
?>
</table>
</BR>
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<tr align="left"   > 
<th colspan="4"  >2 SELECTION DU DONNEUR</th>	
</tr>
<?php
ligne4("N° Opération","Description détaillée de la procédure","Intervenants","Commentaires") ; 
ligne4("2.1","Pratiquer l’interrogatoire médical du donneur","Médecin de prélèvement","") ;
ligne4("2.2","Pratiquer l’examen clinique du donneur","Médecin de prélèvement","") ;
ligne4("2.3","Noter les informations comportementales et médicales pouvant autoriser ou interdire le don","Médecin de prélèvement","") ;
ligne4("2.4","Mentionner la quantité de sang à prélever et le type de poches de prélèvement sur la fiche de donneur","Médecin de prélèvement","") ;
ligne4("2.5","Attribuer un numéro permettant de faire le lien entre le donneur et ses différents prélèvements (poches et échantillons)","Médecin de prélèvement","") ;
ligne4("2.6","Coller l’étiquette portant le numéro sur la fiche de donneur","Médecin de prélèvement","") ;
ligne4("2.7","Accompagner le donneur à la salle de prélèvement","Médecin de prélèvement","") ;
ligne4("2.8","Remettre la fiche de donneur et le jeu des étiquettes à l’agent de prélèvement","Médecin de prélèvement","") ;
?>
</table>

</BR>
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<tr align="left"   > 
<th colspan="4"  >3 PRELEVEMENT DU DONNEUR</th>	
</tr>
<?php
ligne4("N° Opération","Description détaillée de la procédure","Intervenants","Commentaires") ; 
ligne4("3.1","Accueillir et installer confortablement le donneur","Agent de prélèvement","") ;
ligne4("3.2","Vérifier l’identité du donneur et sa concordance avec celle inscrite sur la fiche de donneur","Agent de prélèvement","") ;
ligne4("3.3","Remplir le bordereau de prélèvement de sang","Agent de prélèvement","") ;
ligne4("3.4","Coller les étiquettes sur les poches, les tubes pour analyses biologiques et le bordereau de prélèvement de sang","Agent de prélèvement","") ;
ligne4("3.5","Calibrer le peson agitateur pour la quantité à prélever","Agent de prélèvement","") ;
ligne4("3.6","Poser les poches sur l’agitateur","Agent de prélèvement","") ;
ligne4("3.7","Tarer l’agitateur","Agent de prélèvement","") ;
ligne4("3.8","Mettre en place le garrot","Agent de prélèvement","") ;
ligne4("3.9","Choisir la veine à ponctionner au niveau du M veineux du pli du coude","Agent de prélèvement","") ;
ligne4("3.10","Désinfecter le point de ponction","Agent de prélèvement","") ;
ligne4("3.11","Pratiquer la phlébotomie","Agent de prélèvement","") ;
ligne4("3.12","Déclencher l’agitateur","Agent de prélèvement","") ;
ligne4("3.13","Surveiller et rassurer le donneur pendant le prélèvement","Agent de prélèvement","") ;
ligne4("3.14","Arrêter le prélèvement quand la quantité prévue est atteinte ou en cas d’incident","Agent de prélèvement","") ;
ligne4("3.15","Désolidariser la poche de prélèvement","Agent de prélèvement","") ;
ligne4("3.16","Prélever les échantillons nécessaires aux examens biologiques obligatoires","Agent de prélèvement","") ;
ligne4("3.17","Dépiquer le donneur et appliquer une compression sur le point de ponction","Agent de prélèvement","") ;
ligne4("3.18","Inviter le donneur à observer quelques minutes de repos dans le fauteuil de prélèvement","Agent de prélèvement","") ;
ligne4("3.19","Stripper la tubulure trois fois en homogénéisant, à chaque fois, le contenu de la poche","Agent de prélèvement","") ;
ligne4("3.20","Ranger la poche et les échantillons","Agent de prélèvement","") ;
ligne4("3.21","Eliminer les déchets ayant servi au prélèvement","Agent de prélèvement","") ;
ligne4("3.22","Appliquer un pansement compressif sur le point de ponction","Agent de prélèvement","") ;
ligne4("3.23","Remercier le donneur et l’inviter à passer dans la salle de collation","Agent de prélèvement","") ;
ligne4("3.24","Archiver les informations concernant le don","Agent de prélèvement","") ;
ligne4("3.25","Acheminer les poches de sang au service de préparation, dans un délai maximum de 2 heures","Surveillant de cabine","") ;
?>
</table>


</BR>
<table width='90%' border='1' cellpadding='5' cellspacing='1' align='center'  >
<tr align="left"   > 
<th colspan="4"  >4 COLLATION ET SUIVI POST-DON</th>	
</tr>
<?php
ligne4("N° Opération","Description détaillée de la procédure","Intervenants","Commentaires") ; 
ligne4("4.1","Donner une collation essentiellement liquide et sucrée","Agent de collation","") ;
ligne4("4.","Donner des recommandations post-don et remercier le donneur avant son départ","Agent de collation","") ;
ligne4("4.","Délivrer, dans les meilleurs délais, au donneur se présentant pour la première fois, une carte de donneur de sang","Agent de collation","") ;
?>
</table>
<br /><br />
<h1> collecte de sang homologue en equipe mobile  </h1 >
<br /><br />


