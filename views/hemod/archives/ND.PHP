<?php 
verifsession();	
view::button('dnr','');
// urlbutton(1000,370,URL.'pdf/impcomp.php','IMP COMPAGNE','',5);
?>

<script language="JavaScript">

//--------------COMMON FUNCTIONS------------------------------------------------

function Norm_p(z) {
// Returns the two-tailed standard normal probability of z
    z = Math.abs(z);
    var a1 = 0.0000053830, a2 = 0.0000488906, a3 = 0.0000380036,
        a4 = 0.0032776263, a5 = 0.0211410061, a6 = 0.0498673470;
    var p = (((((a1*z+a2)*z+a3)*z+a4)*z+a5)*z+a6)*z+1;
    p = Math.pow(p, -16);
    return p
}
 
function Norm_z(p) {
// Returns z given a half-middle tail type p.
 
    var a0= 2.5066282,  a1=-18.6150006,  a2= 41.3911977,   a3=-25.4410605,
        b1=-8.4735109,  b2= 23.0833674,  b3=-21.0622410,   b4=  3.1308291,
        c0=-2.7871893,  c1= -2.2979648,  c2=  4.8501413,   c3=  2.3212128,
        d1= 3.5438892,  d2=  1.6370678, r, z;
 
    if (p>0.42) {
        r=Math.sqrt(-Math.log(0.5-p));
        z=(((c3*r+c2)*r+c1)*r+c0)/((d2*r+d1)*r+1)
    }
    else {
        r=p*p;
        z=p*(((a3*r+a2)*r+a1)*r+a0)/((((b4*r+b3)*r+b2)*r+b1)*r+1)
    }
    return z
}
 
function getTail() {
    with (document.forms[1]) {
	     if (elements[0].checked) return 'left'
	else if (elements[1].checked) return 'right'
	else if (elements[2].checked) return 'middle'
	else if (elements[3].checked) return 'twotail'
    }
}

function RoundDP(x, dp) {
// Rounds x to dp decimal places.
    var powten = Math.pow(10, dp);
    return (Math.round(x*powten)/powten)
}

function RoundSF(x, sf) {
// Rounds x to sf significant figures, but max 6 decimal places.
    if (x==0) return 0;
    with (Math) {
        var magnitude = ceil(log(abs(x))/LN10);	// digits before decimal point
	var dp = max(0, min(6, sf-magnitude));	// no rounding left of the .
	return RoundDP(x, dp)
    }
}

function checkneg(p, tailType) {
// determines whether this p implies a negative deviate
	if (tailType=='left' & p<.5) return true;
	if (tailType=='right' & p>.5) return true;
	return false
}

function diddle(p, fromType, toType, negative) {
// converts p's tailType from fromType to toType via 'left'
// negative is logical, indicating a negative deviate: see checkneg
    var newp = any2left(p, fromType, negative);
	newp = left2any(newp, toType, negative);
    return newp
}

function any2left(p, from, negative) {
// converts any tailType to 'left'

   if (from=='left') return p;
   if (from=='right') return (1-p);	// no negative check for these

   if (from=='twotail')		p = 1 - p/2
   else if (from=='middle')	p = p/2 + 0.5
   else if (from=='half')	p = p + 0.5;

   if (negative) p = 1-p;
   return p
}

function left2any(p, to, negative) {
// converts p from tailType 'left' to any other

    if (to=='left')	return p;
    if (to=='right')	return (1-p);

    if (negative) p = 1-p;			// corrects to p>0.5;

    if (to=='twotail')	return 2*(1-p);
    if (to=='middle')	return (2*p-1);
    if (to=='half')	return (p-0.5)
}

//--------------END OF COMMON FUNCTIONS----------------------------------------

function forwardNormal(form) {
// Calculates p given z and tailtype.
    var normType = getTail(),
	z = form.z.value;
    if (!z | z=="NaN") form.p.value = ""
    else {
	z = eval(z);			// make numeric
	var p = Norm_p(z);	// returns twotail p
	p = diddle(p, 'twotail', normType, z<0);
	form.p.value = RoundDP(p, 4)
    }
}

function backwardNormal(form) {
// Beasley Springer approx. to inverse norm, Applied Stats. 26, 118-121.
// See: J.H.Maindonald "Statistical Computation" p.295.

    var p = eval(form.p.value);
    if (p<0 || p>1) form.z.value=""
    else {
	var normType = getTail();
	var negative = checkneg(p, normType);
	p = diddle(p, normType, 'half', negative);
	var z = Norm_z(p);
	if (negative) z=-z;
	form.z.value=RoundSF(z, 4)
    }
}		

</script>
       
			



<form method="post" action=""> 
	
</form>
<center>
<h1>
<font color="#D03050">
<i>standard normal calculator</i>
</font>
</h1>
</center>

<form method="post" action=""     >
<center>

<table cellpadding="5">
<tbody>
<tr align="center">
    <td>
	<img src="<?php echo URL.'public/images/icons/normalLeft.gif';?>" alt="left"><br>
	<input type="radio" name="normType" checked="">
    </td>
	<td>
	<img src="<?php echo URL.'public/images/icons/normalRight.gif';?>" alt="right"><br>
	<input type="radio" name="normType">
    </td>
	<td>
	<img src="<?php echo URL.'public/images/icons/normalMiddle.gif';?>" alt="middle"><br>
	<input type="radio" name="normType">
    </td>
	<td>
	<img src="<?php echo URL.'public/images/icons/normal2Tail.gif';?>" alt="twotail"><br>
	<input type="radio" name="normType">
	</td>
</tr>
</tbody>
</table>


<p>

<table cellpadding="5">
<tbody>
<tr> 
   <td align="center" width="90" rowspan="2" bgcolor="#FFD0D0"> z value
	<br><input type="text" name="z" size="7">
   </td>
   <td align="center" width="50">
	<input type="button" value="----&gt;"         onclick="forwardNormal(this.form)">
   </td>
   <td align="center" width="90" rowspan="2" bgcolor="#FFD0D0">probability 
	<br><input type="text" name="p" size="7"> 
   </td>
</tr>
<tr>
<td align="center">
<input type="button" value="&lt;----" onclick="backwardNormal(this.form)">
</td>
</tr>
</tbody>
</table>
</p>
</center>
</form>
</BR></BR>

<p>Standard Normal Distribution Table</p>
<p>You can also use the table below. The table shows the area from 0 to Z</p>
<p>Instead of one LONG table, we have put the "0,1"s running down, then the "0,01"s running along. (Example of how to use is below)</p>

</BR></BR>
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









