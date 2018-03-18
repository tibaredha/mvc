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

function forwardChi(form) {
// Peizer & Pratt's approx. to cumulative chi-square distribution.
// Journal of American Statistical Assoc., 63, 1416-1456.
// See: J.H. Maindonald, Statistical Computation, p.294.
// Calculates right tail level prob. given chi-squared value & df.

    var chiType = parent.getTail(),
	chi = form.chi.value,
	df = form.df.value;

    if (chi=='infinity') form.p.value = (chiType=='left')? 1 : 0

    else if (!chi || !df || chi<0 || df<=0) form.p.value = ""

    else {
	var p = chi_p(chi, df);		// right tail probability
	if (chiType == 'left') p=1-p;	// left tail probability
	form.p.value = parent.RoundDP(p, 4)
    }
}

function chi_p(chi, df) {
// Returns right tail p given chi, and df.
    var p;
    if (df<11) p = chi_p_dflt11(chi, df)
	  else p = chi_p_dfge11(chi, df);
    return p
}

function chi_p_dflt11(chi, df) {
// Gives right tail probability level p given chi and df < 11.
    with (Math) {
	var z = chi/2,
	    z2 = z*z,
	    c = 1, 
	    g = 1, 
	    d = df/2, 
	    a = d, 
	    d3 = d + 2;
	while (c/g > 0.5E-6) {
	    a += 1;
 	    c *= z/a;
 	    g += c
	}
	g = g*exp(d*log(z) - d3*fnl(d3*d3) - (d3-0.5)*log(d3) + d3 - z)*(d+1);
	var p = 1 - g/sqrt(2*PI)
    }
    return p
}


function chi_p_dfge11(chi, df) {
// Gives right tail probability level p given chi and df >= 11.
    if (chi<=0) return 1;
    var d = chi - df + 2/3 - 0.08/df,
	g = gfn( (df-1)/chi ),
	z = d*Math.sqrt( (1+g)/(2*chi) ),
	p = parent.Norm_p(z)/2; 
    if (z<0) p = 1-p;
    return p
}

function fnl(a) {
// Requires a <> 0.
    var g = 1/(12*a) * (1-1/a*(1/30-1/a*(1/105-1/(140*a))));
    return g
}

function gfn(t) {
// Requires t > 0; ok as called by chi_p_dfge11 & t=(df-1)/chi.
    var g, j;
    with (Math) {
        if (abs(1-t) <= 0.1) {
	    g=0;
	    for (j=1; j<=5; j++) {
                g += 2*pow(1-t, j)/((j + 1)*(j + 2))
	    }
        }
	else g=( 1 - t*t + 2*t*log(t) )/((1 - t)*(1 - t));
    }
    return g
}


function backwardChi(form) {
// Keith Dear & Robert Brennan.
// Calculates chi given p, df, and tail type.
// Uses an existing cumulative chi-squared function.

    var p = form.p.value,
	df = eval(form.df.value);

    if (!p || !df || df<=0) { 
	form.chi.value=""; 
	return 
    }

    var chiType = parent.getTail();
    p = (chiType=='left')? eval(1-p) : eval(p);		// make numeric
    if (p<=0 || p>=1) {
	form.chi.value = (p==0)? 'infinity' : (p==1)? 0 : "";
	return
    }

// Find initial bounds to left and right of the solution
	var left=0,
	    right=df,
	    p1 = chi_p(right, df);
	while (p1 > p) {
	    left = right;
	    right *= 2;
	    p1 = chi_p(right, df)
	}

// Bisect the solution-range until converged for p.
	var tol=Math.pow(10, -5),
	    middle=right;
	while (Math.abs(p1-p) > tol) {
	    middle = (left+right)/2;
	    p1 = chi_p(middle, df);
	    if (p1<p) right=middle
		else left=middle
	    }	

	form.chi.value = parent.RoundSF(middle, 4)
}

</script>

<form method="post" action=""> 
	
</form>      
			
<center><h1><font color="#D03050">
<i>chi-squared calculator</i>
</font></h1></center>

<p></p><form><center>
<table cellpadding="5">
<tbody>
<tr align="center">
    <td>
	<img src="<?php echo URL.'public/images/icons/chileft.gif';?>"><br>
	<input type="radio" name="chiType" onclick="0">
    </td>
	<td>
	<img src="<?php echo URL.'public/images/icons/chiright.gif';?>"><br>
	<input type="radio" name="chiType" onclick="0" checked="">
    </td>
</tr>
</tbody></table>

<p>
<table cellpadding="5">
<tbody>
<tr>
   <td align="center" width="90"  rowspan="2" bgcolor="#FFD0D0">d.f.
	<br><input type="text" name="df" size="7">
   </td>
   <td align="center" width="90" rowspan="2" bgcolor="#FFD0D0">
	<font face="symbol">c</font><sup>2</sup> value
	<br><input type="text" name="chi" size="7">
   </td>
   <td align="center">
	<input type="button" value="----&gt;" onclick="forwardChi(this.form)">
   </td>
   <td align="center" width="90" rowspan="2" bgcolor="#FFD0D0">probability
	<br><input type="text" name="p" size="7">
   </td>
</tr>
<tr>
   <td align="center">
	<input type="button" value="&lt;----" onclick="backwardChi(this.form)">
</td></tr></tbody></table>
</p></center>
</form>







