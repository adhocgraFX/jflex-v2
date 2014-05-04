/**
 * Created by Johannes Hock on 04.05.14.
 */

// allgemein
// jquery.smooth-scroll.min.js
(function(e){var c="@VERSION",f={exclude:[],excludeWithin:[],offset:0,direction:"top",scrollElement:null,scrollTarget:null,beforeScroll:function(){},afterScroll:function(){},easing:"swing",speed:400,autoCoefficent:2},a=function(i){var j=[],h=false,g=i.dir&&i.dir=="left"?"scrollLeft":"scrollTop";this.each(function(){if(this==document||this==window){return}var k=e(this);if(k[g]()>0){j.push(this)}else{k[g](1);h=k[g]()>0;if(h){j.push(this)}k[g](0)}});if(!j.length){this.each(function(k){if(this.nodeName==="BODY"){j=[this]}})}if(i.el==="first"&&j.length>1){j=[j[0]]}return j},b="ontouchend" in document;e.fn.extend({scrollable:function(g){var h=a.call(this,{dir:g});return this.pushStack(h)},firstScrollable:function(g){var h=a.call(this,{el:"first",dir:g});return this.pushStack(h)},smoothScroll:function(g){g=g||{};var h=e.extend({},e.fn.smoothScroll.defaults,g),i=e.smoothScroll.filterPath(location.pathname);this.unbind("click.smoothscroll").bind("click.smoothscroll",function(k){var s=this,r=e(this),m=h.exclude,p=h.excludeWithin,t=0,o=0,l=true,u={},n=((location.hostname===s.hostname)||!s.hostname),j=h.scrollTarget||(e.smoothScroll.filterPath(s.pathname)||i)===i,q=d(s.hash);if(!h.scrollTarget&&(!n||!j||!q)){l=false}else{while(l&&t<m.length){if(r.is(d(m[t++]))){l=false}}while(l&&o<p.length){if(r.closest(p[o++]).length){l=false}}}if(l){k.preventDefault();e.extend(u,h,{scrollTarget:h.scrollTarget||q,link:s});e.smoothScroll(u)}});return this}});e.smoothScroll=function(r,n){var g,h,q,j,p=0,k="offset",m="scrollTop",o={},l={},i=[];if(typeof r==="number"){g=e.fn.smoothScroll.defaults;q=r}else{g=e.extend({},e.fn.smoothScroll.defaults,r||{});if(g.scrollElement){k="position";if(g.scrollElement.css("position")=="static"){g.scrollElement.css("position","relative")}}}g=e.extend({link:null},g);m=g.direction=="left"?"scrollLeft":m;if(g.scrollElement){h=g.scrollElement;p=h[m]()}else{h=e("html, body").firstScrollable()}g.beforeScroll.call(h,g);q=(typeof r==="number")?r:n||(e(g.scrollTarget)[k]()&&e(g.scrollTarget)[k]()[g.direction])||0;o[m]=q+p+g.offset;j=g.speed;if(j==="auto"){j=o[m]||h.scrollTop();j=j/g.autoCoefficent}l={duration:j,easing:g.easing,complete:function(){g.afterScroll.call(g.link,g)}};if(g.step){l.step=g.step}if(h.length){h.stop().animate(o,l)}else{g.afterScroll.call(g.link,g)}};e.smoothScroll.version=c;e.smoothScroll.filterPath=function(g){return g.replace(/^\//,"").replace(/(index|default).[a-zA-Z]{3,4}$/,"").replace(/\/$/,"")};e.fn.smoothScroll.defaults=f;function d(g){return g.replace(/(:|\.)/g,"\\$1")}})(jQuery);
// footable-0.1.min.js
(function(d,a,f){a.footable={options:{delay:10,breakpoints:{phone:480,tablet:1024},parsers:{alpha:function(g){return d(g).data("value")||d.trim(d(g).text())}},toggleSelector:" > tbody > tr:not(.footable-row-detail)",createDetail:function(h,j){for(var g=0;g<j.length;g++){h.append("<div><em>"+j[g].name+"</em> : "+j[g].display+"</div>")}},classes:{loading:"footable-loading",loaded:"footable-loaded",sorted:"footable-sorted",descending:"footable-sorted-desc",indicator:"footable-sort-indicator"},debug:false},version:{major:0,minor:1,toString:function(){return a.footable.version.major+"."+a.footable.version.minor},parse:function(g){version=/(\d+)\.?(\d+)?\.?(\d+)?/.exec(g);return{major:parseInt(version[1])||0,minor:parseInt(version[2])||0,patch:parseInt(version[3])||0}}},plugins:{_validate:function(g){if(typeof g.name!=="string"){if(a.footable.options.debug==true){console.error('Validation failed, plugin does not implement a string property called "name".',g)}return false}if(!d.isFunction(g.init)){if(a.footable.options.debug==true){console.error('Validation failed, plugin "'+g.name+'" does not implement a function called "init".',g)}return false}if(a.footable.options.debug==true){console.log('Validation succeeded for plugin "'+g.name+'".',g)}return true},registered:[],register:function(h,g){if(a.footable.plugins._validate(h)){a.footable.plugins.registered.push(h);if(g!=f&&typeof g==="object"){d.extend(true,a.footable.options,g)}if(a.footable.options.debug==true){console.log('Plugin "'+h.name+'" has been registered with the Foobox.',h)}}},init:function(g){for(var h=0;h<a.footable.plugins.registered.length;h++){try{a.footable.plugins.registered[h]["init"](g)}catch(j){if(a.footable.options.debug==true){console.error(j)}}}}}};var c=0;d.fn.footable=function(g){g=g||{};var h=d.extend(true,{},a.footable.options,g);return this.each(function(){c++;this.footable=new e(this,h,c)})};function b(){var g=this;g.id=null;g.busy=false;g.start=function(i,h){if(g.busy){return}g.stop();g.id=setTimeout(function(){i();g.id=null;g.busy=false},h);g.busy=true};g.stop=function(){if(g.id!=null){clearTimeout(g.id);g.id=null;g.busy=false}}}function e(i,j,l){var k=this;k.id=l;k.table=i;k.options=j;k.breakpoints=[];k.breakpointNames="";k.columns={};var h=k.options;var g=h.classes;k.timers={resize:new b(),register:function(m){k.timers[m]=new b();return k.timers[m]}};a.footable.plugins.init(k);k.init=function(){var o=d(a),n=d(k.table);if(n.hasClass(g.loaded)){k.raise("footable_already_initialized");return}n.addClass(g.loading);n.find("> thead > tr > th, > thead > tr > td").each(function(){var q=k.getColumnData(this);k.columns[q.index]=q;var p=q.index+1;var r=n.find("> tbody > tr > td:nth-child("+p+")");if(q.className!=null){r.not(".footable-cell-detail").addClass(q.className)}});for(var m in h.breakpoints){k.breakpoints.push({name:m,width:h.breakpoints[m]});k.breakpointNames+=(m+" ")}k.breakpoints.sort(function(q,p){return q.width-p.width});k.bindToggleSelectors();k.raise("footable_initializing");n.bind("footable_initialized",function(p){k.resize();n.removeClass(g.loading);n.find('[data-init="hide"]').hide();n.find('[data-init="show"]').show();n.addClass(g.loaded)});o.bind("resize.footable",function(){k.timers.resize.stop();k.timers.resize.start(function(){k.raise("footable_resizing");k.resize();k.raise("footable_resized")},h.delay)});k.raise("footable_initialized")};k.bindToggleSelectors=function(){var m=d(k.table);m.find(h.toggleSelector).unbind("click.footable").bind("click.footable",function(o){if(m.is(".breakpoint")){var n=d(this).is("tr")?d(this):d(this).parents("tr:first");k.toggleDetail(n.get(0))}})};k.parse=function(m,n){var o=h.parsers[n.type]||h.parsers.alpha;return o(m)};k.getColumnData=function(p){var o=d(p),n=o.data("hide");n=n||"";n=n.split(",");var q={index:o.index(),hide:{},type:o.data("type")||"alpha",name:o.data("name")||d.trim(o.text()),ignore:o.data("ignore")||false,className:o.data("class")||null};q.hide["default"]=(o.data("hide")==="all")||(d.inArray("default",n)>=0);for(var m in h.breakpoints){q.hide[m]=(o.data("hide")==="all")||(d.inArray(m,n)>=0)}var r=k.raise("footable_column_data",{column:{data:q,th:p}});return r.column.data};k.getViewportWidth=function(){return window.innerWidth||(document.body?document.body.offsetWidth:0)};k.getViewportHeight=function(){return window.innerHeight||(document.body?document.body.offsetHeight:0)};k.hasBreakpointColumn=function(m){for(var n in k.columns){if(k.columns[n].hide[m]){return true}}return false};k.resize=function(){var n=d(k.table);var s={width:n.width(),height:n.height(),viewportWidth:k.getViewportWidth(),viewportHeight:k.getViewportHeight(),orientation:null};s.orientation=s.viewportWidth>s.viewportHeight?"landscape":"portrait";if(s.viewportWidth<s.width){s.width=s.viewportWidth}if(s.viewportHeight<s.height){s.height=s.viewportHeight}var t=n.data("footable_info");n.data("footable_info",s);if(!t||((t&&t.width&&t.width!=s.width)||(t&&t.height&&t.height!=s.height))){var r=null,m;for(var p=0;p<k.breakpoints.length;p++){m=k.breakpoints[p];if(m&&m.width&&s.width<=m.width){r=m;break}}var o=(r==null?"default":r.name);var q=k.hasBreakpointColumn(o);n.removeClass("default breakpoint").removeClass(k.breakpointNames).addClass(o+(q?" breakpoint":"")).find("> thead > tr > th").each(function(){var v=k.columns[d(this).index()];var u=v.index+1;var w=n.find("> tbody > tr > td:nth-child("+u+"), > tfoot > tr > td:nth-child("+u+"), > colgroup > col:nth-child("+u+")").add(this);if(v.hide[o]==false){w.show()}else{w.hide()}}).end().find("> tbody > tr.footable-detail-show").each(function(){k.createOrUpdateDetailRow(this)});n.find("> tbody > tr.footable-detail-show:visible").each(function(){var u=d(this).next();if(u.hasClass("footable-row-detail")){if(o=="default"&&!q){u.hide()}else{u.show()}}});k.raise("footable_breakpoint_"+o,{info:s})}};k.toggleDetail=function(p){var m=d(p),o=k.createOrUpdateDetailRow(m.get(0)),n=m.next();if(!o&&n.is(":visible")){m.removeClass("footable-detail-show");n.hide()}else{m.addClass("footable-detail-show");n.show()}};k.createOrUpdateDetailRow=function(s){var m=d(s),n=m.next(),q,o=[];if(m.is(":hidden")){return}m.find("> td:hidden").each(function(){var t=k.columns[d(this).index()];if(t.ignore==true){return true}o.push({name:t.name,value:k.parse(this,t),display:d.trim(d(this).html())})});var r=m.find("> td:visible").length;var p=n.hasClass("footable-row-detail");if(!p){n=d('<tr class="footable-row-detail"><td class="footable-cell-detail"><div class="footable-row-detail-inner"></div></td></tr>');m.after(n)}n.find("> td:first").attr("colspan",r);q=n.find(".footable-row-detail-inner").empty();h.createDetail(q,o);return !p};k.raise=function(m,n){n=n||{};var o={ft:k};d.extend(true,o,n);var p=d.Event(m,o);if(!p.ft){d.extend(true,p,o)}d(k.table).trigger(p);return p};k.init();return k}})(jQuery,window);
// jquery.cookie.min.js
jQuery.cookie=function(b,j,m){if(typeof j!="undefined"){m=m||{};if(j===null){j="";m.expires=-1}var e="";if(m.expires&&(typeof m.expires=="number"||m.expires.toUTCString)){var f;if(typeof m.expires=="number"){f=new Date();f.setTime(f.getTime()+(m.expires*24*60*60*1000))}else{f=m.expires}e="; expires="+f.toUTCString()}var l=m.path?"; path="+(m.path):"";var g=m.domain?"; domain="+(m.domain):"";var a=m.secure?"; secure":"";document.cookie=[b,"=",encodeURIComponent(j),e,l,g,a].join("")}else{var d=null;if(document.cookie&&document.cookie!=""){var k=document.cookie.split(";");for(var h=0;h<k.length;h++){var c=jQuery.trim(k[h]);if(c.substring(0,b.length+1)==(b+"=")){d=decodeURIComponent(c.substring(b.length+1));break}}}return d}};
// jquery.textresizer.min.js
(function(f){var k=false;f.fn.textresizer=function(m){if(k){a(this)}if(this.size()==0){return}var l=b(this.size());var n=f.extend({selector:f(this).selector,sizes:l,selectedIndex:-1},f.fn.textresizer.defaults,m);if(this.size()>n.sizes.length){if(k){a("ERROR: Number of defined sizes incompatible with number of buttons => elements: "+this.size()+"; defined sizes: "+n.sizes.length+"; target: "+n.target)}return}i(n);return this.each(function(p){var q=f(this);var o=n.sizes[p];if(n.selectedIndex==p){f(this).addClass("textresizer-active")}q.bind("click",{index:p},function(r){n.selectedIndex=r.data.index;c(o,n);e(o,n);h(this,n)})})};f.fn.textresizer.defaults={type:"fontSize",target:"body"};function c(l,n){if(k){a(["target: "+n.target,"newSize: "+l,"type: "+n.type].join(", "))}var o=f(n.target);switch(n.type){case"css":o.css(l);break;case"cssClass":var m=n.sizes;f.each(m,function(p,q){o.each(function(){if(f(this).hasClass(q)){f(this).removeClass(q)}})});o.addClass(l);break;default:o.css("font-size",l);break}}function h(m,l){f(l.selector).removeClass("textresizer-active");f(m).addClass("textresizer-active")}function d(l,m,n){return"JQUERY.TEXTRESIZER["+l+","+m+"]."+n}function g(q,s,l){var m=d(q,s,l);var n=f.cookie(m);if(f.cookie(m+".valueType")=="dict"&&n){var p={};var t=n.split("|");for(var r=0;r<t.length;r++){var o=t[r].split("=");p[o[0]]=unescape(o[1])}return p}return n}function j(o,q,l,t){var m=d(o,q,l);var s={expires:365,path:"/"};if(typeof(t)=="object"){f.cookie(m+".valueType","dict",s);var n=t;var r=new Array();for(var u in n){r.push(u+"="+escape(n[u]))}var p=r.join("|");f.cookie(m,p,s);if(k){a("In setCookie: Cookie: "+m+": "+p)}}else{f.cookie(m,t,s);if(k){a("In setCookie: Cookie: "+m+": "+t)}}}function i(m){if(f.cookie){if(k){a("In loadPreviousState(): jquery.cookie: INSTALLED")}var l=g(m.selector,m.target,"selectedIndex");if(k){a("In loadPreviousState: selectedIndex: "+l+"; type: "+typeof(l))}if(l){m.selectedIndex=l}var n=g(m.selector,m.target,"size");if(k){a("In loadPreviousState: prevSize: "+n+"; type: "+typeof(n))}if(n){c(n,m)}}else{if(k){a("In loadPreviousState(): jquery.cookie: NOT INSTALLED")}}}function e(l,m){if(f.cookie){if(k){a("In saveState(): jquery.cookie: INSTALLED")}j(m.selector,m.target,"size",l);j(m.selector,m.target,"selectedIndex",m.selectedIndex)}else{if(k){a("In saveState(): jquery.cookie: NOT INSTALLED")}}}function a(l){if(window.console&&window.console.log){if(typeof(l)=="string"){window.console.log("jquery.textresizer => "+l)}else{window.console.log("jquery.textresizer => selection count: "+l.size())}}}function b(n){var p=8;var l=new Array();if(k){a("In buildDefaultFontSizes: numElms = "+n)}if(k){for(var m=0;m<n;m++){var o=(p+(m*2))/10;l.push(o+"em");if(k){a("In buildDefaultFontSizes: mySizes["+m+"] = "+l[m])}}}else{for(var m=0;m<n;m++){var o=(p+(m*2))/10;l.push(o+"em")}}return l}})(jQuery);

// für desktop - teils für tablet laden
// jquery.syncheight.min.js
(function(a){var b=function(){var c=0;var g=[["min-height","0px"],["height","1%"]];var d=/(msie) ([\w.]+)/.exec(navigator.userAgent.toLowerCase())||[],f=d[1]||"",e=d[2]||"0";if(f==="msie"&&e<7){c=1}return{name:g[c][0],autoheightVal:g[c][1]}};a.getSyncedHeight=function(d){var c=0;var e=b();a(d).each(function(){a(this).css(e.name,e.autoheightVal);var f=parseInt(a(this).css("height"),10);if(f>c){c=f}});return c};a.fn.syncHeight=function(g){var i={updateOnResize:false,height:false};var f=a.extend(i,g);var h=this;var c=0;var d=b().name;if(typeof(f.height)==="number"){c=f.height}else{c=a.getSyncedHeight(this)}a(this).each(function(){a(this).css(d,c+"px")});if(f.updateOnResize===true){a(window).resize(function(){a(h).syncHeight()})}return this};a.fn.unSyncHeight=function(){var c=b().name;a(this).each(function(){a(this).css(c,"")})}})(jQuery);
// responsiveslides.min.js
(function(c,b,a){c.fn.responsiveSlides=function(d){var e=c.extend({auto:true,speed:500,timeout:4000,pager:false,nav:false,random:false,pause:false,pauseControls:true,prevText:"Previous",nextText:"Next",maxwidth:"",navContainer:"",manualControls:"",namespace:"rslides",before:c.noop,after:c.noop},d);return this.each(function(){a++;var q=c(this),G,F,s,t,C,h,r=0,z=q.children(),m=z.size(),o=parseFloat(e.speed),k=parseFloat(e.timeout),n=parseFloat(e.maxwidth),v=e.namespace,D=v+a,u=v+"_nav "+D+"_nav",H=v+"_here",y=D+"_on",j=D+"_s",i=c("<ul class='"+v+"_tabs "+D+"_tabs' />"),l={"float":"left",position:"relative",opacity:1,zIndex:2},B={"float":"none",position:"absolute",opacity:0,zIndex:1},x=(function(){var J=document.body||document.documentElement;var K=J.style;var L="transition";if(typeof K[L]==="string"){return true}G=["Moz","Webkit","Khtml","O","ms"];L=L.charAt(0).toUpperCase()+L.substr(1);var I;for(I=0;I<G.length;I++){if(typeof K[G[I]+L]==="string"){return true}}return false})(),w=function(I){e.before(I);if(x){z.removeClass(y).css(B).eq(I).addClass(y).css(l);r=I;setTimeout(function(){e.after(I)},o)}else{z.stop().fadeOut(o,function(){c(this).removeClass(y).css(B).css("opacity",1)}).eq(I).fadeIn(o,function(){c(this).addClass(y).css(l);e.after(I);r=I})}};if(e.random){z.sort(function(){return(Math.round(Math.random())-0.5)});q.empty().append(z)}z.each(function(I){this.id=j+I});q.addClass(v+" "+D);if(d&&d.maxwidth){q.css("max-width",n)}z.hide().css(B).eq(0).addClass(y).css(l).show();if(x){z.show().css({"-webkit-transition":"opacity "+o+"ms ease-in-out","-moz-transition":"opacity "+o+"ms ease-in-out","-o-transition":"opacity "+o+"ms ease-in-out",transition:"opacity "+o+"ms ease-in-out"})}if(z.size()>1){if(k<o+100){return}if(e.pager&&!e.manualControls){var A=[];z.each(function(I){var J=I+1;A+="<li><a href='#' class='"+j+J+"'>"+J+"</a></li>"});i.append(A);if(d.navContainer){c(e.navContainer).append(i)}else{q.after(i)}}if(e.manualControls){i=c(e.manualControls);i.addClass(v+"_tabs "+D+"_tabs")}if(e.pager||e.manualControls){i.find("li").each(function(I){c(this).addClass(j+(I+1))})}if(e.pager||e.manualControls){h=i.find("a");F=function(I){h.closest("li").removeClass(H).eq(I).addClass(H)}}if(e.auto){s=function(){C=setInterval(function(){z.stop(true,true);var I=r+1<m?r+1:0;if(e.pager||e.manualControls){F(I)}w(I)},k)};s()}t=function(){if(e.auto){clearInterval(C);s()}};if(e.pause){q.hover(function(){clearInterval(C)},function(){t()})}if(e.pager||e.manualControls){h.bind("click",function(J){J.preventDefault();if(!e.pauseControls){t()}var I=h.index(this);if(r===I||c("."+y).queue("fx").length){return}F(I);w(I)}).eq(0).closest("li").addClass(H);if(e.pauseControls){h.hover(function(){clearInterval(C)},function(){t()})}}if(e.nav){var f="<a href='#' class='"+u+" prev'>"+e.prevText+"</a><a href='#' class='"+u+" next'>"+e.nextText+"</a>";if(d.navContainer){c(e.navContainer).append(f)}else{q.after(f)}var g=c("."+D+"_nav"),E=g.filter(".prev");g.bind("click",function(M){M.preventDefault();var K=c("."+y);if(K.queue("fx").length){return}var I=z.index(K),J=I-1,L=I+1<m?r+1:0;w(c(this)[0]===E[0]?J:L);if(e.pager||e.manualControls){F(c(this)[0]===E[0]?J:L)}if(!e.pauseControls){t()}});if(e.pauseControls){g.hover(function(){clearInterval(C)},function(){t()})}}}if(typeof document.body.style.maxWidth==="undefined"&&d.maxwidth){var p=function(){q.css("width","100%");if(q.width()>n){q.css("width",n)}};p();c(b).bind("resize",function(){p()})}})}})(jQuery,this,0);

// off canvas navigation by David Bushell
// off-canvas.min.js
(function(r,q,v){var u=function(a){return a.trim?a.trim():a.replace(/^\s+|\s+$/g,"")};var t=function(a,b){return(" "+a.className+" ").indexOf(" "+b+" ")!==-1};var s=function(a,b){if(!t(a,b)){a.className=(a.className==="")?b:a.className+" "+b}};var n=function(a,b){a.className=u((" "+a.className+" ").replace(" "+b+" "," "))};var m=function(a,b){if(a){do{if(a.id===b){return true}if(a.nodeType===9){break}}while((a=a.parentNode))}return false};var o=q.documentElement;var p=r.Modernizr.prefixed("transform"),w=r.Modernizr.prefixed("transition"),x=(function(){var a={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",msTransition:"MSTransitionEnd",transition:"transitionend"};return a.hasOwnProperty(w)?a[w]:false})();r.App=(function(){var c=false,b={};var a=q.getElementById("inner-wrapper"),d=false,e="js-nav";b.init=function(){if(c){return}c=true;var f=function(g){if(g&&g.target===a){q.removeEventListener(x,f,false)}d=false};b.closeNav=function(){if(d){var g=(x&&w)?parseFloat(r.getComputedStyle(a,"")[w+"Duration"]):0;if(g>0){q.addEventListener(x,f,false)}else{f(null)}}n(o,e)};b.openNav=function(){if(d){return}s(o,e);d=true};b.toggleNav=function(g){if(d&&t(o,e)){b.closeNav()}else{b.openNav()}if(g){g.preventDefault()}};q.getElementById("nav-open-btn").addEventListener("click",b.toggleNav,false);q.getElementById("nav-close-btn").addEventListener("click",b.toggleNav,false);q.addEventListener("click",function(g){if(d&&!m(g.target,"nav")){g.preventDefault();b.closeNav()}},true);s(o,"js-ready")};return b})();if(r.addEventListener){r.addEventListener("DOMContentLoaded",r.App.init,false)}})(window,window.document);

// experimente: für tablets tap event by Osvaldas Valutis
//doubletaptogo.min.js
(function(c,b,a,d){c.fn.doubleTapToGo=function(e){if(!("ontouchstart" in b)&&!navigator.msMaxTouchPoints&&!navigator.userAgent.toLowerCase().match(/windows phone os 7/i)){return false}this.each(function(){var f=false;c(this).on("click",function(h){var g=c(this);if(g[0]!=f[0]){h.preventDefault();f=g}});c(a).on("click touchstart MSPointerDown",function(k){var j=true,g=c(k.target).parents();for(var h=0;h<g.length;h++){if(g[h]==f[0]){j=false}}if(j){f=false}})});return this}})(jQuery,window,document);
