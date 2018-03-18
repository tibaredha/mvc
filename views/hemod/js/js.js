// window.alert(5 + 6);
function calcule()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.form2.PI.value);                 
var b = parseFloat(this.document.form2.PJ.value);                                
// calcul et affectation du résultat à la variable ... result
var result =  parseFloat(b - a);               
// affichage du résultat
this.document.form2.PP.value = result;
this.document.form2.PAP.value = result;                   
}
function calcule1()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.form2.PI.value);                 
var b = parseFloat(this.document.form2.PJ.value);                                
// calcul et affectation du résultat à la variable ... result
var result =  parseFloat(b - a);               
// affichage du résultat
this.document.form2.PP.value = result;
this.document.form2.PAP.value = result;                   
}



function bilan()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.form2.GR.value);  //consomation moyene mensuel                
var b = parseFloat(this.document.form2.HT.value);  //stock min                
var c = parseFloat(this.document.form2.HB.value);  //periodicite               
var result =  Math.round(parseFloat( (b / a)*10 ));             
this.document.form2.VGM.value = result;  
var result1 =  Math.round(parseFloat( (c / b)*100 ));             
this.document.form2.CCMH.value = result1;
var result2 = Math.round( parseFloat( (c / a)*10 ));             
this.document.form2.TCMH.value = result2;           
}

function cholesterol()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.form2.CHOLES.value);  //consomation moyene mensuel                
var b = parseFloat(this.document.form2.HDL.value); //stock min                
var c = parseFloat(this.document.form2.TG.value);  //periodicite               
var result =  Math.round(parseFloat((a -(b + (c/5)))));             
this.document.form2.LDL.value = result;  
var result1 =  Math.round(parseFloat((a/b)));             
this.document.form2.CTHDL.value = result1;  
var result2 =  Math.round(parseFloat((result/b)));             
this.document.form2.LDLHDL.value = result2;           
}

function calculClairance (a,b,c,d,e,f) {
                var result= 0;
                var heures=parseFloat(a);
                var volume=parseFloat(b);
                var Ucreat=parseFloat(c);
                var Pcreat=parseFloat(d);
                var taille=parseFloat(e);
                var poids=parseFloat(f);
                var calculClairance=0;
                calculClairance=Ucreat * 1000 * volume / heures / 60 / Pcreat
                calculClairance=Math.round(calculClairance * 10) / 10
                document.formClairance.resClairance.value=calculClairance;
				var calculSurface=0;
				calculSurface=0.007184 * Math.pow(taille,0.725)*Math.pow(poids,0.425)
				calculSurface=Math.round(calculSurface * 100) / 100
                document.formClairance.resSurface.value=calculSurface;
				var calculCorrigee=0;
				calculCorrigee=calculClairance / calculSurface * 1.73
				calculCorrigee=Math.round(calculCorrigee * 10) / 10
				document.formClairance.resCorrigee.value=calculCorrigee;
				var calculTheorH=0;
				calculTheorH=0.2 * (1.1 * poids - 128 * Math.pow(poids,2) / Math.pow(taille,2))
				calculTheorH=Math.round(calculTheorH * 10) / 10
				document.formClairance.resTheorH.value=calculTheorH;
				var calculTheorF=0;
				calculTheorF=0.2 * (1.07 * poids - 148 * Math.pow(poids,2) / Math.pow(taille,2))
				calculTheorF=Math.round(calculTheorF * 10) / 10
				document.formClairance.resTheorF.value=calculTheorF;
				var calculUV=0;
				calculUV=Ucreat * volume / 1000
				calculUV=Math.round(calculUV * 10) / 10 / heures * 24
				document.formClairance.resUV.value=calculUV;
        }















