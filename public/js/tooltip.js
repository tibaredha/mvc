var tooltipOptions=
{
    showDelay: 100,
    hideDelay: 300,
    effect: "fade",
    duration: 200,
    relativeTo: "element",
    position: 1,
    smartPosition: true,
    offsetX: 0,
    offsetY: 0,
    maxWidth: 400,
    calloutSize: 9,
    calloutPosition: 0.3,
    cssClass: "",
    sticky: false,
    overlay: false,
    license: "64628"
};

/* JavaScript Tooltip v2014.9.16. Copyright www.menucool.com */
var tooltip=function(L)
{
var i="length",
    Gb="addEventListener",
	ab,
	hc,
	Ob=function(){},
	qb=function(a,c,b){if(a[Gb])a[Gb](c,b,false);else a.attachEvent&&a.attachEvent("on"+c,b)},
	a={},
	O=function(a){if(a&&a.stopPropagation)a.stopPropagation();else{if(!a)a=window.event;if(a)a.cancelBubble=true}},
	gc=function(b){var a=b?b:window.event;if(a.preventDefault)a.preventDefault();else if(a)a.returnValue=false},
	Zb=function(d){var a=d.childNodes,c=[];if(a)for(var b=0,e=a[i];b<e;b++)a[b].nodeType==1&&c.push(a[b]);return c},
	Y={a:0,b:0},
	g=null,
	dc=function(a){if(!a)a=window.event;Y.a=a.clientX;Y.b=a.clientY},
	bc=function(a){return a.currentStyle?a.currentStyle:document.defaultView&&document.defaultView.getComputedStyle?document.defaultView.getComputedStyle(a,""):a.style},
	v="offsetLeft",
	w="offsetTop",
	pb="clientWidth",
	ob="clientHeight",
	A="appendChild",
	Nb="display",
	t="border",
	G="opacity",
	T=0,
	M="createElement",
	lb="getElementsByTagName",
	D="parentNode",
	fb="calloutSize",
	Q="position",
	Hb="calloutPosition",
	m=Math.round,
	ib="overlay",
	F="sticky",
	V="hideDelay",
	cb="onmouseout",
	ub="onclick",
	Kb=function(){this.a=[];this.b=null},
	N="firstChild",
	xb=0,
	z=document,
	U="getElementById",
	W=navigator,
	P="innerHTML",
	o=function(a,b){return b?z[a](b):z[a]},
	Ib=function(){var c=50,b=W.userAgent,a;if((a=b.indexOf("MSIE "))!=-1)c=parseInt(b.substring(a+5,b.indexOf(".",a)));return c},
	wb=Ib()<9,
	Ab=!!W.msMaxTouchPoints,
	mb=!!("ontouchstart"in window||window.DocumentTouch&&document instanceof DocumentTouch),
	Lb=(W.msPointerEnabled||W.pointerEnabled)&&Ab;if(Lb)var Wb=W.msPointerEnabled?"onmspointerout":"onpointerOut";
	var Rb=function(a){return a.pointerType==a.MSPOINTER_TYPE_MOUSE||a.pointerType=="mouse"},
	C="marginTop",
	gb="marginLeft",
	r="offsetWidth",
	u="offsetHeight",
	vb="documentElement",
	rb="borderColor",
	sb="nextSibling",
	b="style",
	H="width",
	y="left",
	s="top",
	S="height",
	fc=["$1$2$3","$1$2$3","$1$24","$1$23","$1$22"],x,nb,B=function(c,a,b){return setTimeout(c,a?a.showDelay:b)},
	bb=function(a){clearTimeout(a);return null};
	Kb.prototype={d:{b:Ob,c:function(a){return-Math.cos(a*Math.PI)/2+.5}},e:function(i,d,h,f){for(var a=[],g=h-d,c=Math.ceil((l.duration||9)/15),e,b=1;b<=c;b++){e=d+f.c(b/c)*g;a.push(e)}a.d=0;return a},f:function(){this.b==null&&this.g()},g:function(){this.h();var a=this;this.b=setInterval(function(){a.h()},15)},h:function(){var a=this.a[i];if(a){for(var c=0;c<a;c++)this.i(this.a[c]);while(a--){var b=this.a[a];if(b.c.d==b.c[i]){b.d();this.a.splice(a,1)}}}else{clearInterval(this.b);this.b=null}},i:function(a){if(a.c.d<a.c[i]){var d=a.b,c=a.c[a.c.d];if(a.b==G){a.a.op=c;if(wb){d="filter";c="alpha(opacity="+m(c*100)+")"}}else c+="px";a.a[b][d]=c;a.c.d++}},j:function(e,b,d,f,a){a=this.k(this.d,a);var c=this.e(b,d,f,a);this.a.push({a:e,b:b,c:c,d:a.b});this.f()},k:function(c,b){b=b||{};var a,d={};for(a in c)d[a]=b[a]!==undefined?b[a]:c[a];return d}};var hb=new Kb,h=function(d,b,c,e,a){hb.j(d,b,c,e,a)},ec=[/(?:.*\.)?(\w)([\w\-])[^.]*(\w)\.[^.]+$/,/.*([\w\-])\.(\w)(\w)\.[^.]+$/,/^(?:.*\.)?(\w)(\w)\.[^.]+$/,/.*([\w\-])([\w\-])\.com\.[^.]+$/,/^(\w)[^.]*(\w)$/],jb=function(d,a){var c=[];if(xb)return xb;for(var b=0;b<d[i];b++)c[c[i]]=String.fromCharCode(d.charCodeAt(b)-(a&&a>7?a:3));return c.join("")},Pb=function(a){return a.replace(/(?:.*\.)?(\w)([\w\-])?[^.]*(\w)\.[^.]*$/,"$1$3$2")},Tb=function(e,c){var d=function(a){for(var c=a.substr(0,a[i]-1),e=a.substr(a[i]-1,1),d="",b=0;b<c[i];b++)d+=c.charCodeAt(b)-e;return unescape(d)},a=Pb(z.domain)+Math.random(),b=d(a);nb="%66%75%6E%63%74%69%6F%6E%20%71%51%28%73%2C%6B%29%7B%76%61%72%20%72%3D%27%27%3B%66%6F%72%28%76%61%72%20%69%";if(b[i]==39)try{a=(new Function("$","_",jb(nb))).apply(this,[b,c]);nb=a}catch(f){}},cc=function(c,a){var b=function(b){var a=b.charCodeAt(0).toString();return a.substring(a[i]-1)};return c+b(a[parseInt(jb("4"))])+a[2]+b(a[0])},d,c,e,X,f,k,I=0,l,R=null,E=null,db=function(){if(R!=null)R=bb(R)},q=function(){if(E!=null)E=bb(E)},eb=function(a,c){if(a){a.op=c;if(wb)a[b].filter="alpha(opacity="+c*100+")";else a[b][G]=c}},Qb=function(a,c,b,d,g,e,h,f){var j=b>=a,l=d>=c,m=j?b-a<g:a-b<h,n=l?d-c<e:c-d<f,i=m?b-a:j?g:-h,k=n?d-c:l?e:-f;if(m&&n)if(Math.abs(i)>Math.abs(k))i=j?g:-h;else k=l?e:-f;return[i,k]},ac=function(m,h,l){Z(c,1);var a=o(M,"div");a[b][H]=m+"px";e=o(M,"div");e.className="mcTooltipInner";if(l==1){e[P]=h;var f=1}else{var d=o(U,h);if(d[D].w)e=d[D];else{e.w=d[D];e[A](d);f=1}}if(wb){var j=e[lb]("select"),k=j[i];while(k--)j[k][cb]=O}a[A](e);c[A](a);if(e[r]<20){var g=c.className;c.className=""}e[b][H]=e[r]+(f?1:0)+"px";e[b][S]=e[u]+(f?1:0)+"px";e[b][y]=e[b][s]="auto";e=c.insertBefore(e,c[N]);e[b][Q]="absolute";a=c.removeChild(a);a=null;delete a;if(g)c.className=g;return e},Sb=function(a){if(a.w){a.w[A](a);eb(a,1)}else{a=a[D].removeChild(a);a=null;delete a}},Z=function(b,c){for(var a=c;a<b.childNodes[i];a++)Sb(b.childNodes[a])},j=function(c,a){c[b][Nb]=a?"block":"none"},Vb=function(){d.v=T=0;j(X,0);j(d,0);j(f,0);j(I,0);Z(c,0)},n=null,Yb={a:function(d,b,a){var e=null,f=null,h=null,c="html";if(a){f=a.success||null;c=a.responseType||"html";e=a.context&&f?a.context:null;h=a.fail||null}n=this.b();n.onreadystatechange=function(){if(n&&n.readyState===4){q();if(n.status===200){if(l==d&&R){q();var j=c.toLowerCase()=="xml"?n.responseXML:n.responseText,k=j;if(c.toLowerCase()=="json")k=eval("("+j+")");if(c=="html"){var p=b.match(/.+#([^?]+)/);if(p){var s=function(e,b){var d=null;if(b.id==e)return b;for(var c=b[lb]("*"),a=0,f=c[i];a<f;a++)if(c[a].id==e){d=c[a];break}return d},o=z[M]("div");o[P]=j;var m=s(p[1],o);if(m)j=k=m[P];o=null}if(!m){var r=j.split(/<\/?body[^>]*>/i);if(r[i]>1)j=k=r[1]}}if(f)j=a.success(k,e);g.f(d,j,1)}}else if(h)g.f(d,h(e),1);else g.f(d,"Failed to get data.",1);n=null}};if(b.indexOf("#")!=-1&&Ib()<19)b=b.replace("#","?#");n.open("GET",b,true);n.send(null)},b:function(){var a;try{if(window.XMLHttpRequest)a=new XMLHttpRequest;else a=new ActiveXObject("Microsoft.XMLHTTP")}catch(b){throw new Error("AJAX not supported.");}return a}},Mb=function(){d=o(M,"div");d.id="mcTooltipWrapper";d[P]='<div id="mcTooltip"><div>&nbsp;</div></div><div id="mcttCo"><em></em><b></b></div><div id="mcttCloseButton"></div>';x=z.body;k=x;k[A](d);a.a=L.license||"4321";c=d[N];d.b=d.c=d.v=0;Tb(d,a.a);X=d.lastChild;f=c[sb];j(d,1);this.m(L,1);j(d,0);var e=this.k();ab=function(a){q();e.i();O(a)};X[ub]=ab;this.l();I[ub]=function(a){if(l[ib]!==1)ab(a);else O(a)};c[cb]=function(){R!=1&&db();!l[F]&&e.a(l[V])};c[ub]=O;qb(z,"click",function(a){if(l&&l[F]!==1)E=B(function(){ab(a)},0,l[V]+100)});eb(d,0);d[b].visibility="visible"},Db=function(a){if(a[D]){var b=a[D].nodeName.toLowerCase();return b!="form"&&b!="body"?Db(a[D]):a[D]}else return x},p=function(c,b){var a=c.getBoundingClientRect();return b?a[s]:a[y]},J=function(b){return b?z[vb][ob]:z[vb][pb]},Xb=function(){var a=z[vb];return[window.pageXOffset||a.scrollLeft,window.pageYOffset||a.scrollTop]},Ub=function(h,g,c,d){var f=J(0),e=J(1),a=0,b=0;if(k!=x){a=p(k,0)-k[v];b=p(k,1)-k[w]}if(c+a+h>f)c=f-h-a;if(c+a<0)c=-a;if(d+b+g>e)d=e-g-b;if(d+b<0)d=-b;return{l:c,t:d}};Mb.prototype={j:function(){var d=f[N],c=f.lastChild;d[b].margin=c[b].margin=f[b].margin=d[b][t]=c[b][t]="0";var h=a.f,l=h*2+"px",m=a.b+h+"px",g=a.b+"px",i="",k="",e="";d[b][rb]=a.d;c[b][rb]=a.c;if(/rgba\(/.test(a.c)){d[b][rb]=a.c;j(c,0)}else j(c,1);switch(a.e){case 0:case 2:i="Left";k="Right";f[b][H]=l;f[b][S]=m;c[b][gb]=c[b].marginRight="auto";break;case 3:default:i="Top";k="Bottom";f[b][H]=m;f[b][S]=l}switch(a.e){case 0:e="Top";f[b][C]="-"+g;d[b][C]=g;c[b][C]="-"+m;break;case 2:e="Bottom";f[b][C]=g;d[b][C]="-"+g;c[b][C]=-(h-a.b)+"px";break;case 3:e="Left";f[b][gb]="-"+g;d[b][gb]=g;c[b][C]="-"+l;break;default:e="Right";f[b].marginRight="-"+g;c[b][C]="-"+l;c[b][gb]=g}d[b][t+i]=d[b][t+k]=c[b][t+i]=c[b][t+k]="dashed "+h+"px transparent";d[b][t+e+"Style"]=c[b][t+e+"Style"]="solid";d[b][t+e+"Width"]=c[b][t+e+"Width"]=h+"px"},d:function(a,c,b){db();q();E=B(function(){(T!=1||a!=d.v)&&g.f(a,c,b)},a)},e:function(a,c,b){db();q();E=B(function(){g.g(a,c,b)},a)},f:function(i,B,A){j(d,1);T=1;q();hb.a=[];j(I,i[ib]);j(X,i[F]);mb&&j(X,1);var g=this.n(i,B,A);if(d.v){h(d,y,d[v],g.l);h(d,s,d[w],g.t);h(c,H,c.b,c.tw);h(c,S,c.c,c.th);h(f,y,f[v],g.x);h(f,s,f[w],g.y)}else if(a.e==4){var C=p(i,0),D=p(i,1);h(d,y,C,g.l);h(d,s,D,g.t);h(c,H,i[r],c.tw);h(c,S,i[u],c.th)}else{if(a.e>4)h(d,s,g.t+6,g.t);else d[b][s]=g.t+"px";d[b][y]=g.l+"px";c[b][H]=c.tw+"px";c[b][S]=c.th+"px";f[b][y]=g.x+"px";f[b][s]=g.y+"px"}if(i.effect=="slide"){var k,l;if(!d.v&&a.e<4){switch(a.e){case 0:k=0;l=1;break;case 1:k=-1;l=0;break;case 2:k=0;l=-1;break;case 3:k=1;l=0}var n=[k*e[r],l*e[u]]}else{if(!d.v&&a.e>3){k=i[v];l=i[w]}else{k=d[v];l=d[w];if(a.e>3){k+=d.v[v]-i[v];l+=d.v[w]-i[w]}}var x=a.l+a.b+a.b,z=a.m+a.b+a.b;n=Qb(k,l,g.l,g.t,c.b+x,c.c+z,c.tw+x,c.th+z)}var o=a.l/2,t=a.m/2;h(e,y,n[0]+o,o);h(e,s,n[1]+t,t);var m=e[sb];if(m){h(m,y,o,-n[0]+o,{b:function(){Z(c,1)}});h(m,s,t,-n[1]+t)}eb(e,1)}else{h(e,G,e.op-.1,1,{b:function(){Z(c,1)}});var m=e[sb];m&&h(m,G,m.op,0)}h(d,G,d.op,1);d.v=i},g:function(a,c,b){n=null;q();E=B(function(){g.f(a,'<div id="tooltipAjaxSpin">&nbsp;</div>',1)},a);R=1;Yb.a(a,c,b)},a:function(a){q();E=B(function(){g.i()},0,a)},i:function(){T=-1;db();hb.a=[];h(d,G,d.op,0,{b:Vb})},l:function(){if(o(U,"mcOverlay")==null){I=o(M,"div");I.id="mcOverlay";x[A](I);I[b][Q]="fixed"}},m:function(g,h){var i=0;if(h||a.e!=g[Q]||a.f!=g[fb]){a.e=g[Q];a.f=g[fb];d[b].padding=a.f+"px";i=1}if(h||c.className!=g.cssClass){c.className=g.cssClass?g.cssClass.trim():"";var k=bc(c),l=parseInt(k.borderLeftWidth),n=k.backgroundColor,m=k.borderLeftColor;if(h||a.b!=l||a.c!=n||a.d!=m){a.b=l;a.c=n;a.d=m;i=1}a.l=h?c[pb]-c[N][r]:e[v]*2;a.m=h?c[ob]-c[N][u]:e[w]*2}if(i)if(a.e<4)this.j();else j(f,0)},k:function(){return(new Function("a","b","c","d","e","f","g","h","i",function(e){var b=[];c.onmouseover=function(a){if(!l[F]){q();if(T==-1){hb.a=[];h(d,G,d.op,1)}}O(a)};for(var a=0,f=e[i];a<f;a++)b[b[i]]=String.fromCharCode(e.charCodeAt(a)-4);return b.join("")}("zev$pAi,k,g,+kvthpu+0405--\u0080\u0080+6+-?zev$qAe2e\u0080\u0080+55+0rAtevwiMrx,q2glevEx,4--0sA,,k,g,+kvthpu+0405--\u0080\u0080+px+-2vitpegi,h_r16a0l_r16a--2wtpmx,++-?mj,e2e%Aj,r/+8+0s--qAQexl_g,+yhukvt+-a,-?mj,q@259-wixXmqisyx,jyrgxmsr,-m,40g,+Ch'oylmD.o{{wA66~~~5tlu|jvvs5jvt6.E[vvs{pw'W|yjohzl'YltpuklyC6hE+-0tswmxmsr>:\u0081-?\u008106444-?\u0081\u0081vixyvr$xlmw?"))).apply(this,[a,N,jb,ec,Pb,cc,o,fc,kb])},n:function(g,z,s){var n=x;if(s==2){var B=o(U,z),y=B[lb]("*"),C=y[i];while(C--)if(y[C].type=="submit")n=Db(B)}if(k!=n){k=n;k[A](d)}c.b=c[pb]-a.l;c.c=c[ob]-a.m;e=ac(g.maxWidth,z,s);this.m(g,0);c.tw=e[r];c.th=e[u];g.effect=="fade"&&eb(e,0);var q=c.tw+a.l+a.b+a.b,p=c.th+a.m+a.b+a.b,l=this.p(g,q,p);if(g.smartPosition)var b=Ub(q+a.f,p+a.f,l.x,l.y);else b={l:l.x,t:l.y};var h=g[Q],m=this.u(h,g[Hb],q,p);if(g.smartPosition&&h<4){var v=b.l-l.x,w=b.t-l.y;if(h==0||h==2)m[0]-=v;else v&&j(f,0);if(h==1||h==3)m[1]-=w;else w&&j(f,0)}if(k==x){var t=Xb();b.l=b.l+t[0];b.t=b.t+t[1]}b.x=m[0];b.y=m[1];return b},p:function(b,z,y){var c,d,g,f,q=b[Q],n=b[Hb];if(q<4)if(b.nodeType!=1)c=d=g=f=0;else if(b.relativeTo=="mouse"){c=Y.a;d=Y.b;if(Y.a==null){c=p(b,0)+m(b[r]/2);d=p(b,1)+m(b[u]/2)}g=0;f=0}else{var h=b,e=Zb(b);if(e[i]){e=e[0];if(e[r]>=b[r]||e[u]>=b[u])h=e}c=p(h,0);d=p(h,1);g=h[r];f=h[u]}var o=20,l=z+2*b[fb],j=y+2*b[fb];switch(q){case 0:c+=m(g/2-l*n);d-=j+o;break;case 2:c+=m(g/2-l*n);d+=f+o;break;case 3:c-=l+o;d+=m(f/2-j*n);break;case 4:c=m((J(0)-l)/2);d=m((J(1)-j)/2);break;case 5:c=d=0;break;case 6:c=J(0)-l-Math.ceil(a.l/2);d=J(1)-j-Math.ceil(a.m/2);break;case 1:default:c+=g+o;d+=m(f/2-j*n)}var s=0,t=0;if(k!=x){s=k[v]-p(k,0);t=k[w]-p(k,1)}return{x:c+s+b.offsetX,y:d+t+b.offsetY}},u:function(g,c,e,d){j(f,g<4);var b=[0,0];switch(g){case 0:b=[e*c,m(d+a.f)];break;case 1:b=[0,d*c];break;case 2:b=[e*c,0];break;case 3:b=[m(e+a.f),d*c]}return b}};var Eb=function(){if(g==null){if(typeof console!=="undefined"&&typeof console.log==="function"){var a=console.log;console.log=function(){a.call(this,++xb,arguments)}}g=new Mb;if(a)console.log=a}if(l&&l.m&&d[P].indexOf(jb("kdvh#Uh"))!=-1)g.i=Ob;return g},yb=function(d,c,b){b=b||{};var a;for(a in c)d[a]=b[a]!==undefined?b[a]:c[a]},tb=0,K,Jb=function(a){if(!a){a=o(M,"div");a.m=1;a[b][Nb]="none";x[A](a)}if(typeof a==="string")a=o(U,a);l=a;return a},zb=function(b,a){return mb&&b.target==a?0:1},Bb=function(a,b){yb(a,L,b);if(Ab||mb){a.showDelay=1;a[V]=30}if(a[ib])if(!a[F])a[F]=a[ib];qb(a,"click",O);if(a[F])a[cb]=function(a){zb(a,this)&&q()};else if(Lb)a[Wb]=function(a){Rb(a)&&g.a(this[V])};else a[cb]=function(a){zb(a,this)&&g.a(this[V])};if(a.relativeTo=="mouse")a.onmousemove=dc;a.set=1},kb=function(a,c,f){a=Jb(a);var b=0;if(c.charAt(0)=="#"){if(c[i]>2&&c.charAt(1)=="#")b=2;else b=1;var d=c.substring(b),e=o(U,d);if(e){if(b==2)c=e[P]}else b=-1}if(!a||!g||b==-1){if(++tb<40)K=B(function(){kb(a,c,f)},0,90)}else{K=bb(K);!a.set&&Bb(a,f);if(b==1)g.d(a,d,2);else g.d(a,c,1)}},Cb=function(a,d,b,c){a=Jb(a);if(!a||!g){if(++tb<40)K=B(function(){Cb(a,d,b,c)},0,90)}else{K=bb(K);!a.set&&Bb(a,c);g.e(a,d,b)}};qb(window,"load",Eb);var Fb=function(a){if(++tb<20)if(!g)B(function(){Fb(a)},0,90);else{yb(L,L,a);j(d,1);g.m(L,0);j(d,0)}};return{changeOptions:function(L_options){Fb(L_options)},pop:function(L_sender,L_text,L_options){kb(L_sender,L_text,L_options)},ajax:function(L_sender,L_url,L_ajaxSettings,L_options){Cb(L_sender,L_url,L_ajaxSettings,L_options)},hide:function(){var a=Eb();a.i()}}}(tooltipOptions)