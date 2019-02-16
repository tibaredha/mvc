//*****SCORE DE glasgow///
num1 = 0 ; 
num2 = 0 ; 
num3 = 0;    
function calcul() 
{ 
chaine = " " ;  
num = num1+num2+num3;  
document.form2.res.value = num ;  
}
//*****SCORE DE ISS RTS TRISS///
function Comparaison(a,b) 
{
	if ((a)< (b)) return -1;
	else
	if ((b) == (a)) return 0;
	return 1;
	
	}
/* function comparaison was written by:trauma.org http://www.trauma.org/scores/triss.html*/

var isPaediatric=false

function  CalcISS(form){

form.zhead.value = form.head[form.head.selectedIndex].value
form.zface.value = form.face[form.face.selectedIndex].value
form.zchest.value = form.chest[form.chest.selectedIndex].value
form.zabdo.value = form.abdo[form.abdo.selectedIndex].value
form.zextre.value = form.extre[form.extre.selectedIndex].value
form.zexter.value = form.exter[form.exter.selectedIndex].value

organe = new Array(6);
	
	organe[0] = form.zhead.value;
	organe[1] = form.zface.value;
	organe[2] = form.zchest.value;
	organe[3] = form.zabdo.value;
	organe[4] = form.zextre.value;
	organe[5] = form.zexter.value;

	valeur = organe.sort(Comparaison);
	
	organe3 = Math.pow(valeur[3],2);
	organe4 = Math.pow(valeur[4],2);
	organe5 = Math.pow(valeur[5],2);
	
	
	if (organe5 == 36){iss = 75}
		else{iss = organe3 + organe4 + organe5}
			
form.ziss.value= iss
form.ztriss.value = CalcTRISS(form)
form.ztrisss.value = CalcTRISSS(form)
return z
}


function CalcFR(form) {
form.zfr.value = form.fr[form.fr.selectedIndex].value
form.zrts.value = CalcRTS(form)
form.ztriss.value = CalcTRISS(form)
form.ztrisss.value = CalcTRISSS(form)

}

function CalcPAS(form) {
form.zpas.value = form.pas[form.pas.selectedIndex].value
form.zrts.value = CalcRTS(form)
form.ztriss.value = CalcTRISS(form)
form.ztrisss.value = CalcTRISSS(form)

}

function CalcGLASGOW(form) {
form.zglasgow.value = form.glasgow[form.glasgow.selectedIndex].value
form.zrts.value = CalcRTS(form)
form.ztriss.value = CalcTRISS(form)
form.ztrisss.value = CalcTRISSS(form)


}function CalcRTS(form){
z = eval(form.zfr.value)
z = z *0.2908
t=eval(form.zpas.value)
t = t *0.7326
z = z+t
t = eval(form.zglasgow.value)
t = t *0.9368
z = z+t
z = Math.round(1000 * z)/1000
form.zrts.value = z
return z}




function CalcAGE(form) {
isPaediatric=form.age[form.age.selectedIndex].value==-1
form.zage.value=isPaediatric?0:form.age[form.age.selectedIndex].value
form.ztriss.value = CalcTRISS(form)
form.ztrisss.value = CalcTRISSS(form)
}
/* function CalcAGE was written for usby Jean Marc Rosengard  http://www.jmrosengard.com*/

function CalcTRISS(form){

z = -0.4499
t = eval(form.zrts.value)
t = t*0.8085
z = z + t
t = eval(form.ziss.value)
t = -t*0.0835
z = z + t
t = eval(form.zage.value)
t = -t*1.7430
z = z + t
z = 1/(1 + Math.exp(z))
z = Fmt(100 * z)+ " %"
form.ztriss.value = z
return z
}

function  CalcTRISSS(form)  {
if(isPaediatric) return form.ztrisss.value=CalcTRISS(form)

z =-2.5355
t = eval(form.zrts.value)
t = t*0.9934
z = z + t
t = eval(form.ziss.value)
t = -t*0.0651
z = z+ t
t = eval(form.zage.value)
t = -t*1.1360
z = z + t
z =1/(1 + Math.exp(z))
z = Fmt(100 * z)+ " %"
form.ztrisss.value = z
return z
}
/* function Fmt(x )was written by John C. Pezzullo  http://www.pezzullo.net*/


function Fmt(x) {
var v
if(x>=0) { v=''+(x+0.05)}else{ v=''+(x-0.05) }
return v.substring(0,v.indexOf('.')+2)
}


/*zoom image */
function changeTaille(dl) {
document.getElementById('image').style.width  = Math.max(parseInt(document.getElementById('image').style.width)+dl,20)+'px';
document.getElementById('image').style.height = Math.max(parseInt(document.getElementById('image').style.height)+dl,20)+'px';
}

/*Activates the Tabs*/
function tabSwitch(new_tab, new_content) {    
    document.getElementById('content_1').style.display = 'none';  
    document.getElementById('content_2').style.display = 'none';  
    document.getElementById('content_3').style.display = 'none';  
	/*document.getElementById('content_3').style.display = 'none';*/ 
	document.getElementById(new_content).style.display = 'block';     
    document.getElementById('tab_1').className = '';  
    document.getElementById('tab_2').className = '';  
    document.getElementById('tab_3').className = '';  
	/*document.getElementById('tab_3').className = ''; */        
    document.getElementById(new_tab).className = 'active';        
}

 
function BMI()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.form.WEIGHT.value);                 
var b = parseFloat(this.document.form.HEIGHT.value);                 
var result = Math.round( a / Math.pow( b, 2));               
this.document.form.bmi.value = result;                   
}
//jvs pour chapitre categorie de la cim10
$(document).ready(function()
{
		$(".CHAPITRE").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/mvc//public/js/AJAXCIM.PHP",                // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".CATEGORIECIM").html(html);   // On peut faire ce qu'on veut avec ici
						} 
					
			});

		});
});
//etablissement scolaire  wilaya commune etablissemnt  
$(document).ready(function()
{
		$(".countryss").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/mvc//public/js/AJAXSS.PHP",             // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".COMMUNESS").html(html);        // On peut faire ce qu'on veut avec ici
						} 
					
			});

		});
});

$(document).ready(function()
{
		$(".COMMUNESS").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",
				url: "/mvc//public/js/AJAXET.PHP",
				data: dataString,
				cache: false,
				success: function(html)
						{
						$(".ETASS").html(html);
						} 
			});

		});
});

//etablissement scolaire  wilaya commune numero etat civile  
$(document).ready(function()
{
		$(".WILAYANEC").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/mvc//public/js/AJAXNEC.PHP",             // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".COMMUNENNEC").html(html);        // On peut faire ce qu'on veut avec ici
						} 
					
			});

		});
});

$(document).ready(function()
{
		$(".COMMUNENNEC").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",
				url: "/mvc//public/js/AJAXNEC1.PHP",
				data: dataString,
				cache: false,
				success: function(html)
						{
						$(".NEC").html(html);
						} 
			});

		});
});



//metode avec jquery AGENCE REGIONAL DU SANG ET WILAYA REGIONAL DU SANG
$(document).ready(function()
{
		$(".ARS").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/mvc//public/js/AJAXWRS.PHP",             // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".WRS").html(html);   // On peut faire ce qu'on veut avec ici
						} 
					
			});

		});
});
$(document).ready(function()
{
		$(".WRS").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",
				url: "/mvc//public/js/AJAXSTR.PHP",
				data: dataString,
				cache: false,
				success: function(html)
						{
						$(".STR").html(html);
						} 
			});

		});
});
//**//

//metode avec jquery
$(document).ready(function()
{
		$(".countryd").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/mvc/public/js/AJAXWC.PHP",     // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".COMMUNED").html(html);   // On peut faire ce qu'on veut avec ici
						} 		
			});

		});
});
$(document).ready(function()
{
		$(".country").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/mvc/public/js/AJAXWC.PHP",     // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".COMMUNEN").html(html);   // On peut faire ce qu'on veut avec ici
						} 		
			});

		});
});
$(document).ready(function()
{
		$(".countryr").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",
				url: "/mvc/public/js/AJAXWC.PHP",
				data: dataString,
				cache: false,
				success: function(html)
						{
						$(".COMMUNER").html(html);
						} 
			});

		});
});

$(document).ready(function()
{
		$(".SERVICE").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/mvc/public/js/AJAX.PHP",                // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".NLIT").html(html);   // On peut faire ce qu'on veut avec ici
						} 
					
			});

		});
});
//cime1 cime2
$(document).ready(function()
{
		$(".cim1").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/mvc/public/js/cim.PHP",                // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".cim2").html(html);   // On peut faire ce qu'on veut avec ici
						} 
					
			});

		});
});
function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}


/*
logiciel libre sous licence MIT
auteur: Alain Busser
date: 27 mai 2013
*/



var a=-1.96, b=1.96;
var coef=Math.sqrt(2*Math.PI);
var mu=0;
var sigma=1;
var odg=0, pdec=1;

function arrondi(x,e){
	var p10=Math.pow(10,e);
	return(Math.round(p10*x)/p10);
}

function arrondi_inf(x,e){
	var p10=Math.pow(10,e);
	return(Math.floor(p10*x)/p10);
}

function arrondi_sup(x,e){
	var p10=Math.pow(10,e);
	return(Math.ceil(p10*x)/p10);
}


function phi(x){
	return Math.exp(-x*x/2)/coef;
}

function erf(x){
	var t=1/(1+0.3275911*x);
	var ye=1.061405429;
	ye=ye*t-1.453152027;
	ye=ye*t+1.421413741;
	ye=ye*t-0.284496736;
	ye=ye*t+0.254829592;
	ye*=t;
	ye*=Math.exp(-x*x);
	return (1-ye);
}

function Pi(x){
	if(x<0){return(1-Pi(-x));} else {
		if(x<100){
		return((1+erf(x/Math.SQRT2))/2);
		} else {
			return(1);
		}
	}
}

function maj(){
	mu=parseFloat(document.getElementById('entmu').value);
	sigma=Math.abs(parseFloat(document.getElementById('entsigma').value));
	Xmin=Math.max(mu-100*sigma,parseFloat(document.getElementById('enta').value));
	Xmax=Math.min(mu+100*sigma,parseFloat(document.getElementById('entb').value));
	a=(Xmin-mu)/sigma;
	b=(Xmax-mu)/sigma;
	document.getElementById('sorPab').innerHTML=arrondi(Pi(b)-Pi(a),4);
	odg=1-Math.round(Math.log(8*sigma)/Math.LN10);
	pdec=Math.pow(10,-odg);
	remplir1();
	document.getElementById("sorb").innerHTML=Xmax;
	document.getElementById("sorPb").innerHTML=arrondi(Pi(b),4);
	remplir2();
	document.getElementById("sora").innerHTML=Xmin;
	document.getElementById("sorPa").innerHTML=arrondi(1-Pi(a),4);
	remplir3();
}

function remplir1(){
	var ctx1=document.getElementById('can1');
	if (ctx1.getContext){
		var ctx1=ctx1.getContext('2d');
		ctx1.fillStyle="White";
		ctx1.fillRect(0,0,400,240);
		ctx1.fillStyle="Cyan";
		ctx1.strokeStyle="Green";
		ctx1.beginPath();
		ctx1.moveTo(Math.floor(200+50*a),220);
		for(x=Math.ceil(200+50*a);x<=Math.round(200+50*b);x++){
			ctx1.lineTo(x,220-500*phi((x-200)/50));
		}
		ctx1.lineTo(200+50*b,220);
		ctx1.lineTo(200+50*a,220);
		ctx1.stroke();
		ctx1.fill();
		
		ctx1.strokeStyle="Red";
		ctx1.beginPath();
		ctx1.moveTo(0,220);
		for(x=1;x<=400;x++){
			ctx1.lineTo(x,220-500*phi((x-200)/50));
		}
		ctx1.stroke();
		

		ctx1.strokeStyle="Blue";
		ctx1.fillStyle="Magenta";
		ctx1.beginPath();
		for(var xg=arrondi_sup(mu-4*sigma,odg);xg<arrondi_inf(mu+4*sigma,odg);xg=arrondi(xg+pdec,odg)){
			x=(xg-mu)/sigma;
			x=x*50+200;
			ctx1.moveTo(x,220);
			ctx1.lineTo(x,225);
			ctx1.fillText(xg.toString(),x-5,235);
		}
		ctx1.moveTo(0,220);
		ctx1.lineTo(400,220);
		ctx1.stroke();
		
	}
}
    
function remplir2(){
	var ctx2=document.getElementById('can2');
	if (ctx2.getContext){
		var ctx2=ctx2.getContext('2d');
		ctx2.fillStyle="White";
		ctx2.fillRect(0,0,400,240);
		ctx2.fillStyle="Lightgreen";
		ctx2.strokeStyle="Cyan";
		ctx2.beginPath();
		ctx2.moveTo(0,220);
		for(x=0;x<=Math.round(200+50*b);x++){
			ctx2.lineTo(x,220-500*phi((x-200)/50));
		}
		ctx2.lineTo(200+50*b,220);
		ctx2.lineTo(0,220);
		ctx2.stroke();
		ctx2.fill();
		
		ctx2.strokeStyle="Red";
		ctx2.beginPath();
		ctx2.moveTo(0,220);
		for(x=1;x<=400;x++){
			ctx2.lineTo(x,220-500*phi((x-200)/50));
		}
		ctx2.stroke();
		

		ctx2.strokeStyle="Blue";
		ctx2.fillStyle="Magenta";
		ctx2.beginPath();
		for(var xg=arrondi_sup(mu-4*sigma,odg);xg<arrondi_inf(mu+4*sigma,odg);xg=arrondi(xg+pdec,odg)){
			x=(xg-mu)/sigma;
			x=x*50+200;
			ctx2.moveTo(x,220);
			ctx2.lineTo(x,225);
			ctx2.fillText(xg.toString(),x-5,235);
		}
		ctx2.moveTo(0,220);
		ctx2.lineTo(400,220);
		ctx2.stroke();
		
	}
}
    
function remplir3(){
	var ctx3=document.getElementById('can3');
	if (ctx3.getContext){
		var ctx3=ctx3.getContext('2d');
		ctx3.fillStyle="White";
		ctx3.fillRect(0,0,400,240);
		ctx3.fillStyle="Yellow";
		ctx3.strokeStyle="Green";
		ctx3.beginPath();
		ctx3.moveTo(Math.floor(200+50*a),220);
		for(x=Math.ceil(200+50*a);x<=400;x++){
			ctx3.lineTo(x,220-500*phi((x-200)/50));
		}
		ctx3.lineTo(400,220);
		ctx3.lineTo(200+50*a,220);
		ctx3.stroke();
		ctx3.fill();
		
		ctx3.strokeStyle="Red";
		ctx3.beginPath();
		ctx3.moveTo(0,220);
		for(x=1;x<=400;x++){
			ctx3.lineTo(x,220-500*phi((x-200)/50));
		}
		ctx3.stroke();
		

		ctx3.strokeStyle="Blue";
		ctx3.fillStyle="Magenta";
		ctx3.beginPath();
		for(var xg=arrondi_sup(mu-4*sigma,odg);xg<arrondi_inf(mu+4*sigma,odg);xg=arrondi(xg+pdec,odg)){
			x=(xg-mu)/sigma;
			x=x*50+200;
			ctx3.moveTo(x,220);
			ctx3.lineTo(x,225);
			ctx3.fillText(xg.toString(),x-5,235);
		}
		ctx3.moveTo(0,220);
		ctx3.lineTo(400,220);
		ctx3.stroke();
		
	}
}


function stock()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.form1.cmm.value);  //consomation moyene mensuel                
var b = parseFloat(this.document.form1.smin.value); //stock min                
var c = parseFloat(this.document.form1.per.value);  //periodicite               
var d = parseFloat(this.document.form1.dlv.value);  //delai de livraison              
//stock maxi = smin+(per*cmm)    
var result =  parseFloat( b +(c * a) );             
this.document.form1.smax.value = result;  //  
// quantite seuil de commande 
var result1 =  parseFloat( b +(d * a) );  
this.document.form1.qts.value = result1;  //  smin+(dlv*cmm)              
}


function bilan()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.form1.GR.value);  //consomation moyene mensuel                
var b = parseFloat(this.document.form1.HT.value); //stock min                
var c = parseFloat(this.document.form1.HB.value);  //periodicite               
            
   
var result =  Math.round(parseFloat( (b / a)*10 ));             
this.document.form1.VGM.value = result;  

var result1 =  Math.round(parseFloat( (c / b)*100 ));             
this.document.form1.CCMH.value = result1;


var result2 = Math.round( parseFloat( (c / a)*10 ));             
this.document.form1.TCMH.value = result2; 
           
}

function cholesterol()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.form1.CT.value);  //consomation moyene mensuel                
var b = parseFloat(this.document.form1.HDL.value); //stock min                
var c = parseFloat(this.document.form1.TGL.value);  //periodicite               
            
   
var result =  Math.round(parseFloat((a -(b + (c/5)))));             
this.document.form1.LDL.value = result;  

var result1 =  Math.round(parseFloat((a/b)));             
this.document.form1.CTHDL.value = result1;  
 
var result2 =  Math.round(parseFloat((result/b)));             
this.document.form1.LDLHDL.value = result2; 
 
 
           
}
