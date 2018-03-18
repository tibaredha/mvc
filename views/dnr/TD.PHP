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

function forwardT(form) {
// Hill's approx. to cumulative t-dist, Commun.A.C.M. 13,617-619.
// See: J.H.Maindonald, Computational Statistics, p.295.
// Calculates p given t and tail type.
    var df = form.df.value,
	t = form.t.value;
    if (!t || !df || df<1) form.p.value = ""
    else {
	var tType = parent.getTail();
	p = T_p(t, df);
	p = parent.diddle(p,'twotail', tType, t<0);
	form.p.value = parent.RoundDP(p, 4)
    }
}

function T_p(t, df) {
// Returns two-tail probability level given t and df.
    with (Math) {
        var abst = abs(t), tsq = t*t, p;
	if      (df == 1) p = 1 - 2*atan(abst)/PI
	else if (df == 2) p = 1 - abst/sqrt(tsq + 2)
	else if (df == 3) p = 1 - 2*(atan(abst/sqrt(3)) + abst*sqrt(3)/(tsq + 3))/PI
	else if (df == 4) p = 1 - abst*(1 + 2/(tsq + 4))/sqrt(tsq + 4)
	else {
// finds the z equivalent of t and df st they yield same probs.
	    var z = T_z(abst, df);	 
	    if (df>4) p = parent.Norm_p(z)
		 else p = parent.Norm_p(z); // small non-integer df
	}
    }
    return p
}


function T_z(t, df) {   
// Converts a t value to an approximate z value w.r.t the given df
// s.t. std.norm.(z) = t(z, df) at the two-tail probability level.
    var A9 = df - 0.5, 
        B9 = 48*A9*A9,
        T9 = t*t/df, Z8, P7, B7, z;
    with (Math) {
        if (T9 >= 0.04) Z8 = A9*log(1+T9)
	    else  Z8 = A9*(((1 - T9*0.75)*T9/3 - 0.5)*T9 + 1)*T9;
        P7 = ((0.4*Z8 + 3.3)*Z8 + 24)*Z8 + 85.5;
        B7 = 0.8*pow(Z8, 2) + 100 + B9;
        z = (1 + (-P7/B7 + Z8 + 3)/B9)*sqrt(Z8);
	return z
    }
}


function Hills_inv_t(p, df) {
// Hill's approx. inverse t-dist.: Comm. of A.C.M Vol.13 No.10 1970 pg 620.
// Calculates t given df and two-tail probability.
    var a, b, c, d, t, x, y;
    with (Math) {
        if      (df == 1) t = cos(p*PI/2)/sin(p*PI/2)
	else if (df == 2) t = sqrt(2/(p*(2 - p)) - 2)
        else {
	    a = 1/(df - 0.5);
	    b = 48/(a*a);
	    c = ((20700*a/b - 98)*a - 16)*a + 96.36;
	    d = ((94.5/(b + c) - 3)/b + 1)*sqrt(a*PI*0.5)*df;
	    x = d*p;
	    y = pow(x, 2/df);
	    if (y > 0.05 + a) {
	        x = parent.Norm_z(0.5*(1 - p)); 
		y = x*x;
		if (df < 5) c = c + 0.3*(df - 4.5)*(x + 0.6);
		c = (((0.05*d*x - 5)*x - 7)*x - 2)*x + b + c;
		y = (((((0.4*y + 6.3)*y + 36)*y + 94.5)/c - y - 3)/b + 1)*x;
		y = a*y*y;
		if (y > 0.002) y = exp(y) - 1;
	  	else y = 0.5*y*y + y;
	        t = sqrt(df*y)
	    }            
	    else {
		y = ((1/(((df + 6)/(df*y) - 0.089*d - 0.822)*(df + 2)*3) 
		    + 0.5/(df + 4))*y - 1)*(df + 1)/(df + 2) + 1/y;
	        t = sqrt(df*y)
            }
	}
    }
    return t
}


function backwardT(form) {
// Keith Dear & Robert Brennan.
// Returns an accurate t to tol sig. fig.'s given p & df.  

    var p = form.p.value,
	df = form.df.value;

    if (!p || !df || p<=0 || p>=1 || df<1) { 
	form.t.value = "";
	return 
    }

    var tType = parent.getTail(),
	negative = parent.checkneg(p, tType), 
	p0 = parent.diddle(p, tType, 'twotail', negative),
	p1 = p0,
	diff = 1,
	t;

    while (Math.abs(diff) > .0001) {
	t = Hills_inv_t(p1, df);	// initial rough value
	diff = T_p(t,df) - p0;		// compare result with forward fn
	p1 -= diff;			// small adjustment to p1
    }

    if (negative) t = -t;
    form.t.value = parent.RoundSF(t, 4)
}

</script>
       
			



<form method="post" action=""> 
	
</form>


<center><h1><font color="#D03050">
<i>t-distribution calculator</i>
</font></h1></center>

<p></p><form><center>

<table cellpadding="5">
<tbody><tr align="center">
    <td><img src="<?php echo URL.'public/images/icons/Tleft.gif';?>" alt="left"><br>
	<input type="radio" name="tType" onclick="0">
    </td><td><img src="<?php echo URL.'public/images/icons/Tright.gif';?>" alt="right"><br>
	<input type="radio" name="tType" checked="" onclick="0">
    </td><td><img src="<?php echo URL.'public/images/icons/Tmiddle.gif';?>" alt="middle"><br>
	<input type="radio" name="tType" onclick="0">
    </td><td><img src="<?php echo URL.'public/images/icons/T2tail.gif';?>" alt="twotail"><br>
	<input type="radio" name="tType" onclick="0">
</td></tr>
</tbody></table>
<p>

<table cellpadding="5">
<tbody><tr>
   <td align="center" width="90" rowspan="2" bgcolor="#FFD0D0">d.f.
	<br><input type="text" name="df" size="7">
   </td><td align="center" width="90" rowspan="2" bgcolor="#FFD0D0">t value
	<br><input type="text" name="t" size="7">
   </td><td align="center">
	<input type="button" value="----&gt;" onclick="forwardT(this.form)">
   </td><td align="center" width="90" rowspan="2" bgcolor="#FFD0D0">probability
	<br><input type="text" name="p" size="7">
</td></tr><tr>
   <td align="center">
	<input type="button" value="&lt;----" onclick="backwardT(this.form)">
</td></tr></tbody></table>
</p></center>
</form>
</BR></BR>




