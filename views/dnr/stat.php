
<script type="text/javascript">
 </script>
<?php
/* 
individu statisique  *  variables
listing  individus
synthese  
	A graphique 
		qualitative  modalites ordone /nominale   /binaire
			*donnees brutees      tableau  base de donnees statistique 
			n individu  x	      individu statistique 
			*donnees agregees     
			modalite  /frequence=comptage  /frequence cumulee  /pourcentage   /pourcentage cumulee
			*diagramme en batons x=modalite de la variable	 y=effectifs
			*diagramme circulaire
		quatitative  intervales  continue  discontinue
			*donnees brutees
			n individu  x	
			*donnees agregees
			intervales  frequence=comptage /frequence cumulee /pourcentage   /pourcentage cumulee
			*histogramme  x=intervales de la variable	 y=densites	
			*polygone de frequence
	B indicateur parametres
		1- parametres de position 
			a-tendance centrale
				*-moyenne:sum x/n
				*-mediane:tri     n paire      n impaire=n/2  val x
				*-mode:max effectif de x 
			b-quantiles
				*-quartiles:   tri n/4    val x  Q1Q2Q3
				*-deciles:     tri n/10   val x  D1-D9
				*-centiles:    tri n/100  val x
				*-percentiles: tri n/1000 val x
		2- parametres de dispersion   
			a-extremes: xmax xmin
			b-etendue:  xmax-xmin
			c-intervalle interquartile:Q3-Q1     intervalle SEMI-interquartile:Q3-Q1/2
			d-box plote=boite de dispersion  array('min'=>$min, 'q1'=>$q1, 'median'=>$median, 'q3'=>$q3, 'max'=>$max, 'outliers'=>$outliers);
			e-ecart absolu moyen  sum des ecart x-m (en valeur absolu)/n
			e-variance: sigma2   sum  (x-m)2/n
			f-ecartype: sigma    rc variance   
				ecartype eleve =etalement des valeurs autour de la moyenne           
				ecartype faible = reserement des valeurs autour de la moyenne 
				SI DISTRIBUTION SYMETRIQUE ET NORMALE
				1 ecartype=68%   de la distribution autour de la moyenne      
				2 ecartype=95%   de la distribution autour de la moyenne
				3 ecartype=99.7% de la distribution autour de la moyenne
			f-cv ecartype/moyenne	
		3- centrage et reduction des donnes  opperation de stardisation dun tableau de donnees
		l=x-m/s 
on decrit un ensemble de valeures  sans reference  a un ensemble  plus grand  dt il sera issus    
inference = reference a la population  generalisation  sur la population generale 
	POPULATION   = (U,ECARTYPE,Normale) valeur certaine inconu  x suite  une loie normale 
	de cette population on extrait de facon aleatoire un  
	echantillon  = (m,ecartype,n)  n>30
		valeur observe  x1   xi    xn  apres tirage  xbar s2 
	    valeur aleatoir X1   Xi    Xn  avant tirage  Xbar S2  entant  que   variable aleatoire  	
	Estimation
		Estimation ponctuelle
		  moyenne dune population	
			xbar    apres tirrage
			Xbar    avant tirage
			moyenne  de X = U
			varience de X = VARIENCE/n
				VARIENCE==petit =>  homogene  
				VARIENCE==grand =>  heterogene 
				n=petit =>varience de X grande   
				n=grand =>variance de X petite 
				NB si on veut diminuer  variance par 2  il faut augment n*2	
			ponctuelle
					mu chapeau = xbar estimation = valeur numerique  
					mu chapeau = Xbar estimateur = procedure 
			la loi de  X  N(U,v)       ecartype 
			la loi de  Xbar  N(U,v/n)  ecartype /rc n
		  variance dune population 
		  proportion (loi binomial) 
		Estimation par interval 
		 sigma connu 
		 sigma inconnu
		     pourcentage
				 la distribution d echantillonage des pourcentage
				 P < >  p observe+-(episilone*rc pq/n * facteur d exhaustivite si n/N SUP 10 % = rc N-n/N-1 )=precision depend de n=p*q*epsilone au carre/i au carre  , alfa
				 episilone=1.96 si alfa =0.05  ic=0.95
				 condition
				    n>=30
					n*pinf sup 5
					n*psup sup 5
					n/N INF 10 %
			moyenne
				la distribution d echantillonage des moyennes	
		        M < > mobserve +-(epsilone*s/rc n  * facteur d exhaustivite si n/N SUP 10 % = rc N-n/N-1 )=precision depend de n= s caree * epsilone au carre/i au carre  , alfa
		       episilone=1.96 si alfa =0.05 ic=0.95
			   condition
			   n>=30
			   n/N INF 10 %
    comaparaison  test statistique
      moyenne
	    ma mb:  independante 
			z=(ma-mb)/rc( (s1care/n1)+(s2care/n2) ) => p	condition  n>30
			t=(ma-mb)/rc( (s care/n1)+(s care/n2) ) => p	condition  n<30  s2=(n1-1)*s1care+s2=(n2-1)*s2care  /n1+n2-2   s= variance commune   dll=n1+n2-2
			test de wilcocsone-mann-whitney
		ma mb:  appariées
			z=
			t=
			test de wilcocsone-mann-whitney
        ma mt:
			z=m-mu/(s/rc n) => p condition  n>30
			t=m-mu/(s/rc n) => p condition  n<30 dll=n-1
		plusieures moyennes: test f	
	  proportion 
		pa pb:  independante (test x2           dll => x2 => p )  +  (test fisher exact)  
		pa pb:  appariées    (test x2mac nemar  dll => x2 => p ) 
        pa pt:  (test x2           dll => x2 => p )
       	plusieures proportion: test x2	
	  variance
       ANOVA 	  

 
*/
verifsession();	
view::button('dnr','');
View::sautligne(2);
echo'STATISTIQUE';

// View::sautligne(20);

/*

reference
1-video
-ThierryAncelle
-gerome pges
2-tuto
*/
?>


<body onload="remplir1(); remplir2(); remplir3();">
<h1>LOIS NORMALES</h1>
<p>On considère une variable aléatoire X normale d'espérance 
<input id="entmu" value="0" onchange="maj();"> et d'écart-type 
<input id="entsigma" value="1" onchange="maj();">.</p>
<p>La probabilité qu'elle soit comprise entre 
<input id="enta" value="-1.96" onchange="maj();"> et 
<input id="entb" value="1.96" onchange="maj();"> est <span id="sorPab">0.95</span> 
(à 0,0001 près):
</p>
<canvas id="can1" width="400" height="240"></canvas>
<p>La probabilité qu'elle soit inférieure à <span id="sorb">1.96</span> 
est <span id="sorPb">0.975</span> :
</p>
<canvas id="can2" width="400" height="240"></canvas>
<p>La probabilité qu'elle soit supérieure à <span id="sora">-1.96</span> 
est <span id="sorPa">0.975</span> :
</p>
<canvas id="can3" width="400" height="240"></canvas>


</body>














