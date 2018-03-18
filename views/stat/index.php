<?php verifsession();view::button('eva','');?>

<script type="text/javascript">
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
    
	  
	  
	  
	  
    </script>

<h2>PTS: STAT LOIS NORMALES</h2 ><br/><br/><hr/><br/>
<body onload="remplir1(); remplir2(); remplir3();">

<p>On considère une variable aléatoire X normale d'espérance <input type="number" id="entmu" value=0 onChange="maj();"> et d'écart-type <input type="number" id="entsigma" value=1 onChange="maj();">.</p>
<canvas id="can1" width="400" height="240"></canvas>

<p>La probabilité qu'elle soit comprise entre <br/><br/><input type="number" id="enta" value=-1.96 onChange="maj();"> et <input type="number"  id="entb" value=1.96 onChange="maj();"><br/><br/> est <span id="sorPab">0.95</span> (à 0,0001 près):</p>

<?php 
$x=500;
$y=320;
echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
?>
<canvas id="can2" width="400" height="240"></canvas>
<p>La probabilité qu'elle soit inférieure à <span id="sorb">1.96</span>est <span id="sorPb">0.975</span> : </p>
<?php echo "</div>"; ?>



<?php 
$x=1000;
$y=320;
echo "<div style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
?>	 
<canvas id="can3" width="400" height="240"></canvas>
<p>La probabilité qu'elle soit supérieure à <span id="sora">-1.96</span> est <span id="sorPa">0.975</span> :</p>
<?php echo "</div>"; ?>



<?php echo "<br/>Moyenne d age  des dons ";echo avg ('don','AGEDNR');echo "<br/>"; ?>
<?php echo "<br/>ecart type ";echo std ('don','AGEDNR');echo "<br/>"; ?>
<?php echo "<br/>min ";echo min2 ('don','AGEDNR');echo "<br/>"; ?>
<?php echo "<br/>max ";echo max2 ('don','AGEDNR');echo "<br/>"; ?>

<p>Standard Normal Distribution Table</p>
<p>You can also use the table below. The table shows the area from 0 to Z</p>
<p>Instead of one LONG table, we have put the "0,1"s running down, then the "0,01"s running along. (Example of how to use is below)</p>


<table border="0" align="center" cellspacing="2" cellpadding="3" width="1050">
				<tr>
					<th bgcolor="#003366"><font color="#FFFFFF" class="Larger">Z</font></th>
					<th bgcolor="#FF99FF">0.00</th>
					<th bgcolor="#FF99FF">0.01</th>
					<th bgcolor="#FF99FF">0.02</th>
					<th bgcolor="#FF99FF">0.03</th>
					<th bgcolor="#FF99FF">0.04</th>
					<th bgcolor="#FF99FF">0.05</th>
					<th bgcolor="#FF99FF">0.06</th>
					<th bgcolor="#FF99FF">0.07</th>
					<th bgcolor="#FF99FF">0.08</th>
					<th bgcolor="#FF99FF">0.09</th>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">0.0</th>
					<td bgcolor="#FFCCFF">0.0000</td>
					<td bgcolor="#FFCCFF">0.0040</td>
					<td bgcolor="#FFCCFF">0.0080</td>
					<td bgcolor="#FFCCFF">0.0120</td>
					<td bgcolor="#FFCCFF">0.0160</td>
					<td bgcolor="#FFCCFF">0.0199</td>
					<td bgcolor="#FFCCFF">0.0239</td>
					<td bgcolor="#FFCCFF">0.0279</td>
					<td bgcolor="#FFCCFF">0.0319</td>
					<td bgcolor="#FFCCFF">0.0359</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">0.1</th>
					<td bgcolor="#FFCCFF">0.0398</td>
					<td bgcolor="#FFCCFF">0.0438</td>
					<td bgcolor="#FFCCFF">0.0478</td>
					<td bgcolor="#FFCCFF">0.0517</td>
					<td bgcolor="#FFCCFF">0.0557</td>
					<td bgcolor="#FFCCFF">0.0596</td>
					<td bgcolor="#FFCCFF">0.0636</td>
					<td bgcolor="#FFCCFF">0.0675</td>
					<td bgcolor="#FFCCFF">0.0714</td>
					<td bgcolor="#FFCCFF">0.0753</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">0.2</th>
					<td bgcolor="#FFCCFF">0.0793</td>
					<td bgcolor="#FFCCFF">0.0832</td>
					<td bgcolor="#FFCCFF">0.0871</td>
					<td bgcolor="#FFCCFF">0.0910</td>
					<td bgcolor="#FFCCFF">0.0948</td>
					<td bgcolor="#FFCCFF">0.0987</td>
					<td bgcolor="#FFCCFF">0.1026</td>
					<td bgcolor="#FFCCFF">0.1064</td>
					<td bgcolor="#FFCCFF">0.1103</td>
					<td bgcolor="#FFCCFF">0.1141</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">0.3</th>
					<td bgcolor="#FFCCFF">0.1179</td>
					<td bgcolor="#FFCCFF">0.1217</td>
					<td bgcolor="#FFCCFF">0.1255</td>
					<td bgcolor="#FFCCFF">0.1293</td>
					<td bgcolor="#FFCCFF">0.1331</td>
					<td bgcolor="#FFCCFF">0.1368</td>
					<td bgcolor="#FFCCFF">0.1406</td>
					<td bgcolor="#FFCCFF">0.1443</td>
					<td bgcolor="#FFCCFF">0.1480</td>
					<td bgcolor="#FFCCFF">0.1517</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">0.4</th>
					<td bgcolor="#FFCCFF">0.1554</td>
					<td bgcolor="#FFCCFF">0.1591</td>
					<td bgcolor="#FFCCFF">0.1628</td>
					<td bgcolor="#FFCCFF">0.1664</td>
					<td bgcolor="#FFCCFF">0.1700</td>
					<td bgcolor="#FFCCFF">0.1736</td>
					<td bgcolor="#FFCCFF">0.1772</td>
					<td bgcolor="#FFCCFF">0.1808</td>
					<td bgcolor="#FFCCFF">0.1844</td>
					<td bgcolor="#FFCCFF">0.1879</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">0.5</th>
					<td bgcolor="#FFCCFF">0.1915</td>
					<td bgcolor="#FFCCFF">0.1950</td>
					<td bgcolor="#FFCCFF">0.1985</td>
					<td bgcolor="#FFCCFF">0.2019</td>
					<td bgcolor="#FFCCFF">0.2054</td>
					<td bgcolor="#FFCCFF">0.2088</td>
					<td bgcolor="#FFCCFF">0.2123</td>
					<td bgcolor="#FFCCFF">0.2157</td>
					<td bgcolor="#FFCCFF">0.2190</td>
					<td bgcolor="#FFCCFF">0.2224</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">0.6</th>
					<td bgcolor="#FFCCFF">0.2257</td>
					<td bgcolor="#FFCCFF">0.2291</td>
					<td bgcolor="#FFCCFF">0.2324</td>
					<td bgcolor="#FFCCFF">0.2357</td>
					<td bgcolor="#FFCCFF">0.2389</td>
					<td bgcolor="#FFCCFF">0.2422</td>
					<td bgcolor="#FFCCFF">0.2454</td>
					<td bgcolor="#FFCCFF">0.2486</td>
					<td bgcolor="#FFCCFF">0.2517</td>
					<td bgcolor="#FFCCFF">0.2549</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">0.7</th>
					<td bgcolor="#FFCCFF">0.2580</td>
					<td bgcolor="#FFCCFF">0.2611</td>
					<td bgcolor="#FFCCFF">0.2642</td>
					<td bgcolor="#FFCCFF">0.2673</td>
					<td bgcolor="#FFCCFF">0.2704</td>
					<td bgcolor="#FFCCFF">0.2734</td>
					<td bgcolor="#FFCCFF">0.2764</td>
					<td bgcolor="#FFCCFF">0.2794</td>
					<td bgcolor="#FFCCFF">0.2823</td>
					<td bgcolor="#FFCCFF">0.2852</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">0.8</th>
					<td bgcolor="#FFCCFF">0.2881</td>
					<td bgcolor="#FFCCFF">0.2910</td>
					<td bgcolor="#FFCCFF">0.2939</td>
					<td bgcolor="#FFCCFF">0.2967</td>
					<td bgcolor="#FFCCFF">0.2995</td>
					<td bgcolor="#FFCCFF">0.3023</td>
					<td bgcolor="#FFCCFF">0.3051</td>
					<td bgcolor="#FFCCFF">0.3078</td>
					<td bgcolor="#FFCCFF">0.3106</td>
					<td bgcolor="#FFCCFF">0.3133</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">0.9</th>
					<td bgcolor="#FFCCFF">0.3159</td>
					<td bgcolor="#FFCCFF">0.3186</td>
					<td bgcolor="#FFCCFF">0.3212</td>
					<td bgcolor="#FFCCFF">0.3238</td>
					<td bgcolor="#FFCCFF">0.3264</td>
					<td bgcolor="#FFCCFF">0.3289</td>
					<td bgcolor="#FFCCFF">0.3315</td>
					<td bgcolor="#FFCCFF">0.3340</td>
					<td bgcolor="#FFCCFF">0.3365</td>
					<td bgcolor="#FFCCFF">0.3389</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">1.0</th>
					<td bgcolor="#FFCCFF">0.3413</td>
					<td bgcolor="#FFCCFF">0.3438</td>
					<td bgcolor="#FFCCFF">0.3461</td>
					<td bgcolor="#FFCCFF">0.3485</td>
					<td bgcolor="#FFCCFF">0.3508</td>
					<td bgcolor="#FFCCFF">0.3531</td>
					<td bgcolor="#FFCCFF">0.3554</td>
					<td bgcolor="#FFCCFF">0.3577</td>
					<td bgcolor="#FFCCFF">0.3599</td>
					<td bgcolor="#FFCCFF">0.3621</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">1.1</th>
					<td bgcolor="#FFCCFF">0.3643</td>
					<td bgcolor="#FFCCFF">0.3665</td>
					<td bgcolor="#FFCCFF">0.3686</td>
					<td bgcolor="#FFCCFF">0.3708</td>
					<td bgcolor="#FFCCFF">0.3729</td>
					<td bgcolor="#FFCCFF">0.3749</td>
					<td bgcolor="#FFCCFF">0.3770</td>
					<td bgcolor="#FFCCFF">0.3790</td>
					<td bgcolor="#FFCCFF">0.3810</td>
					<td bgcolor="#FFCCFF">0.3830</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">1.2</th>
					<td bgcolor="#FFCCFF">0.3849</td>
					<td bgcolor="#FFCCFF">0.3869</td>
					<td bgcolor="#FFCCFF">0.3888</td>
					<td bgcolor="#FFCCFF">0.3907</td>
					<td bgcolor="#FFCCFF">0.3925</td>
					<td bgcolor="#FFCCFF">0.3944</td>
					<td bgcolor="#FFCCFF">0.3962</td>
					<td bgcolor="#FFCCFF">0.3980</td>
					<td bgcolor="#FFCCFF">0.3997</td>
					<td bgcolor="#FFCCFF">0.4015</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">1.3</th>
					<td bgcolor="#FFCCFF">0.4032</td>
					<td bgcolor="#FFCCFF">0.4049</td>
					<td bgcolor="#FFCCFF">0.4066</td>
					<td bgcolor="#FFCCFF">0.4082</td>
					<td bgcolor="#FFCCFF">0.4099</td>
					<td bgcolor="#FFCCFF">0.4115</td>
					<td bgcolor="#FFCCFF">0.4131</td>
					<td bgcolor="#FFCCFF">0.4147</td>
					<td bgcolor="#FFCCFF">0.4162</td>
					<td bgcolor="#FFCCFF">0.4177</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">1.4</th>
					<td bgcolor="#FFCCFF">0.4192</td>
					<td bgcolor="#FFCCFF">0.4207</td>
					<td bgcolor="#FFCCFF">0.4222</td>
					<td bgcolor="#FFCCFF">0.4236</td>
					<td bgcolor="#FFCCFF">0.4251</td>
					<td bgcolor="#FFCCFF">0.4265</td>
					<td bgcolor="#FFCCFF">0.4279</td>
					<td bgcolor="#FFCCFF">0.4292</td>
					<td bgcolor="#FFCCFF">0.4306</td>
					<td bgcolor="#FFCCFF">0.4319</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">1.5</th>
					<td bgcolor="#FFCCFF">0.4332</td>
					<td bgcolor="#FFCCFF">0.4345</td>
					<td bgcolor="#FFCCFF">0.4357</td>
					<td bgcolor="#FFCCFF">0.4370</td>
					<td bgcolor="#FFCCFF">0.4382</td>
					<td bgcolor="#FFCCFF">0.4394</td>
					<td bgcolor="#FFCCFF">0.4406</td>
					<td bgcolor="#FFCCFF">0.4418</td>
					<td bgcolor="#FFCCFF">0.4429</td>
					<td bgcolor="#FFCCFF">0.4441</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">1.6</th>
					<td bgcolor="#FFCCFF">0.4452</td>
					<td bgcolor="#FFCCFF">0.4463</td>
					<td bgcolor="#FFCCFF">0.4474</td>
					<td bgcolor="#FFCCFF">0.4484</td>
					<td bgcolor="#FFCCFF">0.4495</td>
					<td bgcolor="#FFCCFF">0.4505</td>
					<td bgcolor="#FFCCFF">0.4515</td>
					<td bgcolor="#FFCCFF">0.4525</td>
					<td bgcolor="#FFCCFF">0.4535</td>
					<td bgcolor="#FFCCFF">0.4545</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">1.7</th>
					<td bgcolor="#FFCCFF">0.4554</td>
					<td bgcolor="#FFCCFF">0.4564</td>
					<td bgcolor="#FFCCFF">0.4573</td>
					<td bgcolor="#FFCCFF">0.4582</td>
					<td bgcolor="#FFCCFF">0.4591</td>
					<td bgcolor="#FFCCFF">0.4599</td>
					<td bgcolor="#FFCCFF">0.4608</td>
					<td bgcolor="#FFCCFF">0.4616</td>
					<td bgcolor="#FFCCFF">0.4625</td>
					<td bgcolor="#FFCCFF">0.4633</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">1.8</th>
					<td bgcolor="#FFCCFF">0.4641</td>
					<td bgcolor="#FFCCFF">0.4649</td>
					<td bgcolor="#FFCCFF">0.4656</td>
					<td bgcolor="#FFCCFF">0.4664</td>
					<td bgcolor="#FFCCFF">0.4671</td>
					<td bgcolor="#FFCCFF">0.4678</td>
					<td bgcolor="#FFCCFF">0.4686</td>
					<td bgcolor="#FFCCFF">0.4693</td>
					<td bgcolor="#FFCCFF">0.4699</td>
					<td bgcolor="#FFCCFF">0.4706</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">1.9</th>
					<td bgcolor="#FFCCFF">0.4713</td>
					<td bgcolor="#FFCCFF">0.4719</td>
					<td bgcolor="#FFCCFF">0.4726</td>
					<td bgcolor="#FFCCFF">0.4732</td>
					<td bgcolor="#FFCCFF">0.4738</td>
					<td bgcolor="#FFCCFF">0.4744</td>
					<td bgcolor="#FFCCFF">0.4750</td>
					<td bgcolor="#FFCCFF">0.4756</td>
					<td bgcolor="#FFCCFF">0.4761</td>
					<td bgcolor="#FFCCFF">0.4767</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">2.0</th>
					<td bgcolor="#FFCCFF">0.4772</td>
					<td bgcolor="#FFCCFF">0.4778</td>
					<td bgcolor="#FFCCFF">0.4783</td>
					<td bgcolor="#FFCCFF">0.4788</td>
					<td bgcolor="#FFCCFF">0.4793</td>
					<td bgcolor="#FFCCFF">0.4798</td>
					<td bgcolor="#FFCCFF">0.4803</td>
					<td bgcolor="#FFCCFF">0.4808</td>
					<td bgcolor="#FFCCFF">0.4812</td>
					<td bgcolor="#FFCCFF">0.4817</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">2.1</th>
					<td bgcolor="#FFCCFF">0.4821</td>
					<td bgcolor="#FFCCFF">0.4826</td>
					<td bgcolor="#FFCCFF">0.4830</td>
					<td bgcolor="#FFCCFF">0.4834</td>
					<td bgcolor="#FFCCFF">0.4838</td>
					<td bgcolor="#FFCCFF">0.4842</td>
					<td bgcolor="#FFCCFF">0.4846</td>
					<td bgcolor="#FFCCFF">0.4850</td>
					<td bgcolor="#FFCCFF">0.4854</td>
					<td bgcolor="#FFCCFF">0.4857</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">2.2</th>
					<td bgcolor="#FFCCFF">0.4861</td>
					<td bgcolor="#FFCCFF">0.4864</td>
					<td bgcolor="#FFCCFF">0.4868</td>
					<td bgcolor="#FFCCFF">0.4871</td>
					<td bgcolor="#FFCCFF">0.4875</td>
					<td bgcolor="#FFCCFF">0.4878</td>
					<td bgcolor="#FFCCFF">0.4881</td>
					<td bgcolor="#FFCCFF">0.4884</td>
					<td bgcolor="#FFCCFF">0.4887</td>
					<td bgcolor="#FFCCFF">0.4890</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">2.3</th>
					<td bgcolor="#FFCCFF">0.4893</td>
					<td bgcolor="#FFCCFF">0.4896</td>
					<td bgcolor="#FFCCFF">0.4898</td>
					<td bgcolor="#FFCCFF">0.4901</td>
					<td bgcolor="#FFCCFF">0.4904</td>
					<td bgcolor="#FFCCFF">0.4906</td>
					<td bgcolor="#FFCCFF">0.4909</td>
					<td bgcolor="#FFCCFF">0.4911</td>
					<td bgcolor="#FFCCFF">0.4913</td>
					<td bgcolor="#FFCCFF">0.4916</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">2.4</th>
					<td bgcolor="#FFCCFF">0.4918</td>
					<td bgcolor="#FFCCFF">0.4920</td>
					<td bgcolor="#FFCCFF">0.4922</td>
					<td bgcolor="#FFCCFF">0.4925</td>
					<td bgcolor="#FFCCFF">0.4927</td>
					<td bgcolor="#FFCCFF">0.4929</td>
					<td bgcolor="#FFCCFF">0.4931</td>
					<td bgcolor="#FFCCFF">0.4932</td>
					<td bgcolor="#FFCCFF">0.4934</td>
					<td bgcolor="#FFCCFF">0.4936</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">2.5</th>
					<td bgcolor="#FFCCFF">0.4938</td>
					<td bgcolor="#FFCCFF">0.4940</td>
					<td bgcolor="#FFCCFF">0.4941</td>
					<td bgcolor="#FFCCFF">0.4943</td>
					<td bgcolor="#FFCCFF">0.4945</td>
					<td bgcolor="#FFCCFF">0.4946</td>
					<td bgcolor="#FFCCFF">0.4948</td>
					<td bgcolor="#FFCCFF">0.4949</td>
					<td bgcolor="#FFCCFF">0.4951</td>
					<td bgcolor="#FFCCFF">0.4952</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">2.6</th>
					<td bgcolor="#FFCCFF">0.4953</td>
					<td bgcolor="#FFCCFF">0.4955</td>
					<td bgcolor="#FFCCFF">0.4956</td>
					<td bgcolor="#FFCCFF">0.4957</td>
					<td bgcolor="#FFCCFF">0.4959</td>
					<td bgcolor="#FFCCFF">0.4960</td>
					<td bgcolor="#FFCCFF">0.4961</td>
					<td bgcolor="#FFCCFF">0.4962</td>
					<td bgcolor="#FFCCFF">0.4963</td>
					<td bgcolor="#FFCCFF">0.4964</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">2.7</th>
					<td bgcolor="#FFCCFF">0.4965</td>
					<td bgcolor="#FFCCFF">0.4966</td>
					<td bgcolor="#FFCCFF">0.4967</td>
					<td bgcolor="#FFCCFF">0.4968</td>
					<td bgcolor="#FFCCFF">0.4969</td>
					<td bgcolor="#FFCCFF">0.4970</td>
					<td bgcolor="#FFCCFF">0.4971</td>
					<td bgcolor="#FFCCFF">0.4972</td>
					<td bgcolor="#FFCCFF">0.4973</td>
					<td bgcolor="#FFCCFF">0.4974</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">2.8</th>
					<td bgcolor="#FFCCFF">0.4974</td>
					<td bgcolor="#FFCCFF">0.4975</td>
					<td bgcolor="#FFCCFF">0.4976</td>
					<td bgcolor="#FFCCFF">0.4977</td>
					<td bgcolor="#FFCCFF">0.4977</td>
					<td bgcolor="#FFCCFF">0.4978</td>
					<td bgcolor="#FFCCFF">0.4979</td>
					<td bgcolor="#FFCCFF">0.4979</td>
					<td bgcolor="#FFCCFF">0.4980</td>
					<td bgcolor="#FFCCFF">0.4981</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">2.9</th>
					<td bgcolor="#FFCCFF">0.4981</td>
					<td bgcolor="#FFCCFF">0.4982</td>
					<td bgcolor="#FFCCFF">0.4982</td>
					<td bgcolor="#FFCCFF">0.4983</td>
					<td bgcolor="#FFCCFF">0.4984</td>
					<td bgcolor="#FFCCFF">0.4984</td>
					<td bgcolor="#FFCCFF">0.4985</td>
					<td bgcolor="#FFCCFF">0.4985</td>
					<td bgcolor="#FFCCFF">0.4986</td>
					<td bgcolor="#FFCCFF">0.4986</td>
				</tr>
				<tr>
					<th bgcolor="#FF99FF">3.0</th>
					<td bgcolor="#FFCCFF">0.4987</td>
					<td bgcolor="#FFCCFF">0.4987</td>
					<td bgcolor="#FFCCFF">0.4987</td>
					<td bgcolor="#FFCCFF">0.4988</td>
					<td bgcolor="#FFCCFF">0.4988</td>
					<td bgcolor="#FFCCFF">0.4989</td>
					<td bgcolor="#FFCCFF">0.4989</td>
					<td bgcolor="#FFCCFF">0.4989</td>
					<td bgcolor="#FFCCFF">0.4990</td>
					<td bgcolor="#FFCCFF">0.4990</td>
				</tr>
			</table>






