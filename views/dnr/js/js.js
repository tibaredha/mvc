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
   