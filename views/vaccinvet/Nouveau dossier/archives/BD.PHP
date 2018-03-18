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

function makeMV(form) {
    var n=eval(form.n.value),
	p=eval(form.p.value),
	mean = n*p,
	variance = n*p*(1-p);
    form.mu.value = parent.RoundSF(mean,5);
    form.sd.value = parent.RoundSF(Math.sqrt(variance),6)
}

function makeNP(form) {
    var mu=eval(form.mu.value),
	sd=eval(form.sd.value),
	n = Math.round(mu*mu/(mu-sd*sd));
    if (n<1) n=1;
    form.p.value = parent.RoundDP(mu/n,6);
    form.n.value = n;
    form.sd.value = ""
}

function binomial(form) {
    var n=eval(form.n.value),
	p=eval(form.p.value),
	r=eval(form.r.value);
    if (n<=0 | p<0 | p>1) {
	form.left.value = "Don't";
	form.prob.value = "be";
	form.right.value = "silly!";
	return
    }
    if (r<0 | r>n) {
	form.left.value = (r>n)? "one" : "";
	form.prob.value = "";
	form.right.value = (r<0)? "one" : "";
	return
    }
    var left = cdf(n,p,r,form);
    var prob = pmf(n,p,r);
    var right = 1-left-prob;
    form.left.value = parent.RoundSF(left,4);
    form.right.value = parent.RoundSF(right,4);
    form.prob.value = parent.RoundSF(prob,4);
}

function pmf(n,p,r) {
    var prob = comb(n,r)*Math.pow(p,r)*Math.pow(1-p,n-r);
    return prob
}

function comb(n,r) {
    if (r==0) return 1;
    if (r==1) return n;
    if (r>n/2) return comb(n,n-r);
    var i, c=1;
    for (i=n-r+1; i<=n; i++) {
	c = c*i
    }
    for (i=2; i<=r; i++) {
	c = c/i
    }
    return c
}

function cdf(n,p,r) {
// returns prob binomial(n,p)<r
    var i, s=0;
    if (r<=(n+1)/2) {
	for (i=0; i<r; i++) { s += pmf(n,p,i) }
    }
    else {
	s = 1 - cdf(n,1-p,n-r+1)
    }
    return s
}

</script>

<form method="post" action=""> 
	
</form>      




<center><h1><font color="#D03050">
<i>binomial calculator</i>
</font></h1></center>

<form>
<center>

<table cellpadding="5">
<tbody><tr> 
   <td align="center" width="90" rowspan="2" bgcolor="#FFD0D0"> n
	<br><input type="text" name="n" size="7">
   </td><td align="center" width="90" rowspan="2" bgcolor="#FFD0D0"> p
	<br><input type="text" name="p" size="7">
   </td><td align="center" width="50">
	<input type="button" value="----&gt;" onclick="makeMV(this.form)">
   </td><td align="center" width="90" rowspan="2" bgcolor="#FFD0D0">mean 
	<br><input type="text" name="mu" size="7"> 
   </td><td align="center" width="90" rowspan="2" bgcolor="#FFD0D0">std.dev 
	<br><input type="text" name="sd" size="7"> 
</td></tr><tr>
   <td align="center">
	<input type="button" value="&lt;----" onclick="makeNP(this.form)">
</td></tr></tbody></table>

<p>

<table cellpadding="5">
<tbody>
<tr>
   <td align="center" width="90" rowspan="2" bgcolor="#FFD0D0"> r
	<input type="text" name="r" size="7">
   </td>
   <td align="center" width="50">
	<input type="button" value="----&gt;" onclick="binomial(this.form)">
   </td>
   <td align="center" width="90" rowspan="2" bgcolor="#FFD0D0">Pr(&lt; r)
	<br><input type="text" name="left" size="7"> 
   </td>
   <td align="center" width="90" rowspan="2" bgcolor="#FFD0D0">Pr(= r)
	<br><input type="text" name="prob" size="7"> 
   </td>
   <td align="center" width="90" rowspan="2" bgcolor="#FFD0D0">Pr(&gt; r)
	<br><input type="text" name="right" size="7"> 
   </td>
</tr>
</tbody>
</table>
</p>
</center>
</form>
</BR></BR></BR></BR>


















			
