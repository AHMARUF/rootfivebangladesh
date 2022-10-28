 var app = {
            mgs_type: "popup",
            enablePopup: true,
            popupDuration: 6,
            onReady: function(d, a, e, f, t) {
                a = Array.isArray(a) ? a : [a];
                t = t || 2E3;
                for (var g = !0, b = d, c = 0; c < a.length; c++) {
                    var h = a[c];
                    if ("undefined" == typeof b[h]) {
                        g = !1;
                        break
                    }
                    b = b[h]
                }
                g ? e() : f && setTimeout(function() {
                    app.onReady(d, a, e, --f)
                }, t)
            }
        };/*
 nouislider - 11.1.0 - 2018-04-02 11:18:13 */
var $jscomp=$jscomp||{};
$jscomp.scope={};
$jscomp.ASSUME_ES5=!1;
$jscomp.ASSUME_NO_NATIVE_MAP=!1;
$jscomp.ASSUME_NO_NATIVE_SET=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(c,n,e){
            c!=Array.prototype&&c!=Object.prototype&&(c[n]=e.value)};
            $jscomp.getGlobal=function(c){
                return"undefined"!=typeof window&&window===c?c:"undefined"!=typeof global&&null!=global?global:c};
                $jscomp.global=$jscomp.getGlobal(this);
                $jscomp.SYMBOL_PREFIX="jscomp_symbol_";
                $jscomp.initSymbol=function(){$jscomp.initSymbol=function(){};$jscomp.global.Symbol||($jscomp.global.Symbol=$jscomp.Symbol)};$jscomp.Symbol=function(){var c=0;return function(n){return $jscomp.SYMBOL_PREFIX+(n||"")+c++}}();
$jscomp.initSymbolIterator=function(){
    $jscomp.initSymbol();
    var c=$jscomp.global.Symbol.iterator;
    c||(c=$jscomp.global.Symbol.iterator=$jscomp.global.Symbol("iterator"));
    "function"!=typeof Array.prototype[c]&&$jscomp.defineProperty(Array.prototype,c,{
        configurable:!0,writable:!0,value:function(){
        return $jscomp.arrayIterator(this)
    }
});

    $jscomp.initSymbolIterator=function(){}};
    $jscomp.arrayIterator=function(c){
        var n=0;
        return $jscomp.iteratorPrototype(function(){
            return n<c.length?{done:!1,value:c[n++]}:{done:!0}
        })
    };
$jscomp.iteratorPrototype=function(c){
    $jscomp.initSymbolIterator();
    c={next:c};
    c[$jscomp.global.Symbol.iterator]=function(){
        return this
    };
    return c
};
$jscomp.iteratorFromArray=function(c,n){
    $jscomp.initSymbolIterator();
    c instanceof String&&(c+="");
    var e=0,g={
        next:function(){
            if(e<c.length){
                var q=e++;
                return{
                    value:n(q,c[q]),done:!1
                }
            }g.next=function(){
                return{
                    done:!0,value:void 0
                }
            };

            return g.next()
        }
    };
    g[Symbol.iterator]=function(){return g};return g
};


$jscomp.polyfill=function(c,n,e,g){
    if(n){
        e=$jscomp.global;c=c.split(".");
        for(g=0;g<c.length-1;g++){var q=c[g];
            q in e||(e[q]={});e=e[q]}c=c[c.length-1];
            g=e[c];
            n=n(g);
            n!=g&&null!=n&&$jscomp.defineProperty(e,c,{configurable:!0,writable:!0,value:n})
        }
    };

    $jscomp.polyfill("Array.prototype.keys",function(c){
        return c?c:function(){
            return $jscomp.iteratorFromArray(this,function(c){
                return c
            })
        }
    },"es6","es3");

$jscomp.polyfill("Array.prototype.values",function(c){
    return c?c:function(){
        return $jscomp.iteratorFromArray(this,function(c,e){
            return e
        })
    }
},"es8","es3");

$jscomp.findInternal=function(c,n,e){
    c instanceof String&&(c=String(c));
    for(var g=c.length,q=0;q<g;q++){
        var x=c[q];
        if(n.call(e,x,q,c))return{i:q,v:x}}return{i:-1,v:void 0}
    };

$jscomp.polyfill("Array.prototype.find",function(c){
    return c?c:function(c,e){
        return $jscomp.findInternal(this,c,e).v}
    },"es6","es3");

!function(c){"function"==typeof define&&define.amd?define([],c):"object"==typeof exports?module.exports=c():window.noUiSlider=c()}(function(){function c(b){
    return null!==b&&void 0!==b}
    function n(b){
        b.preventDefault()
    }
    function e(b){
        return b.filter(function(a){
            return!this[a]&&(this[a]=!0)},{}
            )}function g(b){
            return"number"==typeof b&&!isNaN(b)&&isFinite(b)
        }function q(b,a,c){0<c&&(p(b,a),setTimeout(function(){D(b,a)},c))}function x(b){return Array.isArray(b)?b:[b]}function O(b){b=String(b);b=b.split(".");
return 1<b.length?b[1].length:0}function p(b,a){b.classList?b.classList.add(a):b.className+=" "+a}function D(b,a){b.classList?b.classList.remove(a):b.className=b.className.replace(new RegExp("(^|\\b)"+a.split(" ").join("|")+"(\\b|$)","gi")," ")}function K(b){var a=void 0!==window.pageXOffset,c="CSS1Compat"===(b.compatMode||"");return{x:a?window.pageXOffset:c?b.documentElement.scrollLeft:b.body.scrollLeft,y:a?window.pageYOffset:c?b.documentElement.scrollTop:b.body.scrollTop}}function P(){var b=!1;
try{var a=Object.defineProperty({},"passive",{get:function(){b=!0}});window.addEventListener("test",null,a)}catch(pa){}return b}function d(b,a){return 100*a/(b[1]-b[0])}function l(b,a){for(var c=1;b>=a[c];)c+=1;return c}function ea(b,a,c){var d;if("number"==typeof a&&(a=[a]),!Array.isArray(a))throw Error("noUiSlider ("+h+"): 'range' contains invalid value.");if(d="min"===b?0:"max"===b?100:parseFloat(b),!g(d)||!g(a[0]))throw Error("noUiSlider ("+h+"): 'range' value isn't numeric.");c.xPct.push(d);
c.xVal.push(a[0]);d?c.xSteps.push(!isNaN(a[1])&&a[1]):isNaN(a[1])||(c.xSteps[0]=a[1]);c.xHighestCompleteStep.push(0)}function T(b,a,c){if(!a)return!0;c.xSteps[b]=d([c.xVal[b],c.xVal[b+1]],a)/(100/(c.xPct[b+1]-c.xPct[b]));a=Math.ceil(Number(((c.xVal[b+1]-c.xVal[b])/c.xNumSteps[b]).toFixed(3))-1);c.xHighestCompleteStep[b]=c.xVal[b]+c.xNumSteps[b]*a}function y(b,a,c){this.xPct=[];this.xVal=[];this.xSteps=[c||!1];this.xNumSteps=[!1];this.xHighestCompleteStep=[];this.snap=a;var d;a=[];for(d in b)b.hasOwnProperty(d)&&
a.push([b[d],d]);a.length&&"object"==typeof a[0][0]?a.sort(function(a,b){return a[0][0]-b[0][0]}):a.sort(function(a,b){return a[0]-b[0]});for(d=0;d<a.length;d++)ea(a[d][1],a[d][0],this);this.xNumSteps=this.xSteps.slice(0);for(d=0;d<this.xNumSteps.length;d++)T(d,this.xNumSteps[d],this)}function U(b){if("object"==typeof b&&"function"==typeof b.to&&"function"==typeof b.from)return!0;throw Error("noUiSlider ("+h+"): 'format' requires 'to' and 'from' methods.");}function G(b,a){if(!g(a))throw Error("noUiSlider ("+
h+"): 'step' is not numeric.");b.singleStep=a}function B(b,a){if("object"!=typeof a||Array.isArray(a))throw Error("noUiSlider ("+h+"): 'range' is not an object.");if(void 0===a.min||void 0===a.max)throw Error("noUiSlider ("+h+"): Missing 'min' or 'max' in 'range'.");if(a.min===a.max)throw Error("noUiSlider ("+h+"): 'range' 'min' and 'max' cannot be equal.");b.spectrum=new y(a,b.snap,b.singleStep)}function fa(b,a){if(a=x(a),!Array.isArray(a)||!a.length)throw Error("noUiSlider ("+h+"): 'start' option is incorrect.");
b.handles=a.length;b.start=a}function Q(b,a){if(b.snap=a,"boolean"!=typeof a)throw Error("noUiSlider ("+h+"): 'snap' option must be a boolean.");}function V(b,a){if(b.animate=a,"boolean"!=typeof a)throw Error("noUiSlider ("+h+"): 'animate' option must be a boolean.");}function ha(b,a){if(b.animationDuration=a,"number"!=typeof a)throw Error("noUiSlider ("+h+"): 'animationDuration' option must be a number.");}function ia(b,a){var c,d=[!1];if("lower"===a?a=[!0,!1]:"upper"===a&&(a=[!1,!0]),!0===a||!1===
a){for(c=1;c<b.handles;c++)d.push(a);d.push(!1)}else{if(!Array.isArray(a)||!a.length||a.length!==b.handles+1)throw Error("noUiSlider ("+h+"): 'connect' option doesn't match handle count.");d=a}b.connect=d}function va(b,a){switch(a){case "horizontal":b.ort=0;break;case "vertical":b.ort=1;break;default:throw Error("noUiSlider ("+h+"): 'orientation' option is invalid.");}}function W(b,a){if(!g(a))throw Error("noUiSlider ("+h+"): 'margin' option must be numeric.");if(0!==a&&(b.margin=b.spectrum.getMargin(a),
!b.margin))throw Error("noUiSlider ("+h+"): 'margin' option is only supported on linear sliders.");}function wa(b,a){if(!g(a))throw Error("noUiSlider ("+h+"): 'limit' option must be numeric.");if(b.limit=b.spectrum.getMargin(a),!b.limit||2>b.handles)throw Error("noUiSlider ("+h+"): 'limit' option is only supported on linear sliders with 2 or more handles.");}function xa(b,a){if(!g(a)&&!Array.isArray(a))throw Error("noUiSlider ("+h+"): 'padding' option must be numeric or array of exactly 2 numbers.");
if(Array.isArray(a)&&2!==a.length&&!g(a[0])&&!g(a[1]))throw Error("noUiSlider ("+h+"): 'padding' option must be numeric or array of exactly 2 numbers.");if(0!==a){if(Array.isArray(a)||(a=[a,a]),b.padding=[b.spectrum.getMargin(a[0]),b.spectrum.getMargin(a[1])],!1===b.padding[0]||!1===b.padding[1])throw Error("noUiSlider ("+h+"): 'padding' option is only supported on linear sliders.");if(0>b.padding[0]||0>b.padding[1])throw Error("noUiSlider ("+h+"): 'padding' option must be a positive number(s).");
if(100<=b.padding[0]+b.padding[1])throw Error("noUiSlider ("+h+"): 'padding' option must not exceed 100% of the range.");}}function ya(b,a){switch(a){case "ltr":b.dir=0;break;case "rtl":b.dir=1;break;default:throw Error("noUiSlider ("+h+"): 'direction' option was not recognized.");}}function za(b,a){if("string"!=typeof a)throw Error("noUiSlider ("+h+"): 'behaviour' must be a string containing options.");var c=0<=a.indexOf("tap"),d=0<=a.indexOf("drag"),l=0<=a.indexOf("fixed"),e=0<=a.indexOf("snap");
a=0<=a.indexOf("hover");if(l){if(2!==b.handles)throw Error("noUiSlider ("+h+"): 'fixed' behaviour must be used with 2 handles");W(b,b.start[1]-b.start[0])}b.events={tap:c||e,drag:d,fixed:l,snap:e,hover:a}}function Aa(b,a){if(!1!==a)if(!0===a)for(b.tooltips=[],a=0;a<b.handles;a++)b.tooltips.push(!0);else{if(b.tooltips=x(a),b.tooltips.length!==b.handles)throw Error("noUiSlider ("+h+"): must pass a formatter for all handles.");b.tooltips.forEach(function(a){if("boolean"!=typeof a&&("object"!=typeof a||
"function"!=typeof a.to))throw Error("noUiSlider ("+h+"): 'tooltips' must be passed a formatter or 'false'.");})}}function Ba(b,a){b.ariaFormat=a;U(a)}function Ca(b,a){b.format=a;U(a)}function Da(b,a){if("string"!=typeof a&&!1!==a)throw Error("noUiSlider ("+h+"): 'cssPrefix' must be a string or `false`.");b.cssPrefix=a}function Ea(b,a){if("object"!=typeof a)throw Error("noUiSlider ("+h+"): 'cssClasses' must be an object.");if("string"==typeof b.cssPrefix){b.cssClasses={};for(var c in a)a.hasOwnProperty(c)&&
(b.cssClasses[c]=b.cssPrefix+a[c])}else b.cssClasses=a}function qa(b){var a={margin:0,limit:0,padding:0,animate:!0,animationDuration:300,ariaFormat:X,format:X},d={step:{r:!1,t:G},start:{r:!0,t:fa},connect:{r:!0,t:ia},direction:{r:!0,t:ya},snap:{r:!1,t:Q},animate:{r:!1,t:V},animationDuration:{r:!1,t:ha},range:{r:!0,t:B},orientation:{r:!1,t:va},margin:{r:!1,t:W},limit:{r:!1,t:wa},padding:{r:!1,t:xa},behaviour:{r:!0,t:za},ariaFormat:{r:!1,t:Ba},format:{r:!1,t:Ca},tooltips:{r:!1,t:Aa},cssPrefix:{r:!0,
t:Da},cssClasses:{r:!0,t:Ea}},l={connect:!1,direction:"ltr",behaviour:"tap",orientation:"horizontal",cssPrefix:"noUi-",cssClasses:{target:"target",base:"base",origin:"origin",handle:"handle",handleLower:"handle-lower",handleUpper:"handle-upper",horizontal:"horizontal",vertical:"vertical",background:"background",connect:"connect",connects:"connects",ltr:"ltr",rtl:"rtl",draggable:"draggable",drag:"state-drag",tap:"state-tap",active:"active",tooltip:"tooltip",pips:"pips",pipsHorizontal:"pips-horizontal",
pipsVertical:"pips-vertical",marker:"marker",markerHorizontal:"marker-horizontal",markerVertical:"marker-vertical",markerNormal:"marker-normal",markerLarge:"marker-large",markerSub:"marker-sub",value:"value",valueHorizontal:"value-horizontal",valueVertical:"value-vertical",valueNormal:"value-normal",valueLarge:"value-large",valueSub:"value-sub"}};b.format&&!b.ariaFormat&&(b.ariaFormat=b.format);Object.keys(d).forEach(function(e){if(!c(b[e])&&void 0===l[e]){if(d[e].r)throw Error("noUiSlider ("+h+"): '"+
e+"' is required.");return!0}d[e].t(a,c(b[e])?b[e]:l[e])});a.pips=b.pips;var e=document.createElement("div"),g=void 0!==e.style.msTransform;a.transformRule=void 0!==e.style.transform?"transform":g?"msTransform":"webkitTransform";return a.style=[["left","top"],["right","bottom"]][a.dir][a.ort],a}function Fa(b,a,c){function d(a,b){var f=L.createElement("div");return b&&p(f,b),a.appendChild(f),f}function l(b,k){b=d(b,a.cssClasses.origin);var f=d(b,a.cssClasses.handle);return f.setAttribute("data-handle",
k),f.setAttribute("tabindex","0"),f.setAttribute("role","slider"),f.setAttribute("aria-orientation",a.ort?"vertical":"horizontal"),0===k?p(f,a.cssClasses.handleLower):k===a.handles-1&&p(f,a.cssClasses.handleUpper),b}function g(b,k){return!!a.tooltips[k]&&d(b.firstChild,a.cssClasses.tooltip)}function ea(){var b=r.map(g);ja("update",function(f,m,c){b[m]&&(f=f[m],!0!==a.tooltips[m]&&(f=a.tooltips[m].to(c[m])),b[m].innerHTML=f)})}function pa(a,b,m){if("range"===a||"steps"===a)return t.xVal;if("count"===
a){if(2>b)throw Error("noUiSlider ("+h+"): 'values' (>= 2) required for mode 'count'.");a=b-1;var f=100/a;for(b=[];a--;)b[a]=a*f;b.push(100);a="positions"}return"positions"===a?b.map(function(a){return t.fromStepping(m?t.getStep(a):a)}):"values"===a?m?b.map(function(a){return t.fromStepping(t.getStep(t.toStepping(a)))}):b:void 0}function y(a,b,m){var f={},k=t.xVal[0],c=t.xVal[t.xVal.length-1],d=!1,l=!1,h=0;return m=e(m.slice().sort(function(a,b){return a-b})),m[0]!==k&&(m.unshift(k),d=!0),m[m.length-
1]!==c&&(m.push(c),l=!0),m.forEach(function(k,c){var z,u=m[c+1];if("steps"===b&&(z=t.xNumSteps[c]),z||(z=u-k),!1!==k&&void 0!==u)for(z=Math.max(z,1E-7);k<=u;k=(k+z).toFixed(7)/1){var e=t.toStepping(k);var M=e-h;var H=M/a;H=Math.round(H);var g=M/H;for(M=1;M<=H;M+=1){var Ga=h+M*g;f[Ga.toFixed(5)]=["x",0]}H=-1<m.indexOf(k)?1:"steps"===b?2:0;!c&&d&&(H=0);k===u&&l||(f[e.toFixed(5)]=[k,H]);h=e}}),f}function fa(b,k,m){function f(b,f){var k=f===a.cssClasses.value;return f+" "+(k?h:g)[a.ort]+" "+(k?e:l)[b]}
var c=L.createElement("div"),e=[a.cssClasses.valueNormal,a.cssClasses.valueLarge,a.cssClasses.valueSub],l=[a.cssClasses.markerNormal,a.cssClasses.markerLarge,a.cssClasses.markerSub],h=[a.cssClasses.valueHorizontal,a.cssClasses.valueVertical],g=[a.cssClasses.markerHorizontal,a.cssClasses.markerVertical];return p(c,a.cssClasses.pips),p(c,0===a.ort?a.cssClasses.pipsHorizontal:a.cssClasses.pipsVertical),Object.keys(b).forEach(function(z){var u=b[z];u[1]=u[1]&&k?k(u[0],u[1]):u[1];var e=d(c,!1);e.className=
f(u[1],a.cssClasses.marker);e.style[a.style]=z+"%";u[1]&&(e=d(c,!1),e.className=f(u[1],a.cssClasses.value),e.setAttribute("data-value",u[0]),e.style[a.style]=z+"%",e.innerText=m.to(u[0]))}),c}function T(){R&&(R.parentElement.removeChild(R),R=null)}function Q(a){T();var b=a.mode,f=a.density||1,c=a.filter||!1,d=pa(b,a.values||!1,a.stepped||!1);b=y(f,b,d);return R=w.appendChild(fa(b,c,a.format||{to:Math.round}))}function B(){var b=E.getBoundingClientRect(),k="offset"+["Width","Height"][a.ort];return 0===
a.ort?b.width||E[k]:b.height||E[k]}function I(b,k,m,c){var f=function(f){var d;if(d=!!(f=U(f,c.pageOffset,c.target||k)))if(d=!(w.hasAttribute("disabled")&&!c.doNotReject)){d=w;var z=a.cssClasses.tap;d=!((d.classList?d.classList.contains(z):(new RegExp("\\b"+z+"\\b")).test(d.className))&&!c.doNotReject)&&!(b===J.start&&void 0!==f.buttons&&1<f.buttons)&&(!c.hover||!f.buttons)&&(ra||f.preventDefault(),f.calcPoint=f.points[a.ort],void m(f,c))}return d},d=[];return b.split(" ").forEach(function(a){k.addEventListener(a,
f,!!ra&&{passive:!0});d.push([a,f])}),d}function U(a,b,c){var f=0===a.type.indexOf("touch"),k=0===a.type.indexOf("mouse"),m=0===a.type.indexOf("pointer");if(0===a.type.indexOf("MSPointer")&&(m=!0),f){var d=function(a){return a.target===c||c.contains(a.target)};if("touchstart"===a.type){var e=Array.prototype.filter.call(a.touches,d);if(1<e.length)return!1;d=e[0].pageX;e=e[0].pageY}else{e=Array.prototype.find.call(a.changedTouches,d);if(!e)return!1;d=e.pageX;e=e.pageY}}return b=b||K(L),(k||m)&&(d=a.clientX+
b.x,e=a.clientY+b.y),a.pageOffset=b,a.points=[d,e],a.cursor=k||m,a}function G(b){var f=E;var c=a.ort;var d=f.getBoundingClientRect(),e=f.ownerDocument;f=e.documentElement;e=K(e);c=(/webkit.*Chrome.*Mobile/i.test(navigator.userAgent)&&(e.x=0),c?d.top+e.y-f.clientTop:d.left+e.x-f.clientLeft);b=100*(b-c)/B();return b=Math.max(Math.min(b,100),0),a.dir?100-b:b}function ha(a){var b=100,f=!1;return r.forEach(function(c,k){c.hasAttribute("disabled")||(c=Math.abs(v[k]-a),(c<b||100===c&&100===b)&&(f=k,b=c))}),
f}function O(a,b){"mouseout"===a.type&&"HTML"===a.target.nodeName&&null===a.relatedTarget&&ka(a,b)}function V(b,c){if(-1===navigator.appVersion.indexOf("MSIE 9")&&0===b.buttons&&0!==c.buttonsProperty)return ka(b,c);b=(a.dir?-1:1)*(b.calcPoint-c.startCalcPoint);sa(0<b,100*b/c.baseSize,c.locations,c.handleNumbers)}function ka(b,c){c.handle&&(D(c.handle,a.cssClasses.active),--la);c.listeners.forEach(function(a){Y.removeEventListener(a[0],a[1])});0===la&&(D(w,a.cssClasses.drag),ma(),b.cursor&&(Z.style.cursor=
"",Z.removeEventListener("selectstart",n)));c.handleNumbers.forEach(function(a){A("change",a);A("set",a);A("end",a)})}function na(b,c){if(1===c.handleNumbers.length){var f=r[c.handleNumbers[0]];if(f.hasAttribute("disabled"))return!1;var d=f.children[0];la+=1;p(d,a.cssClasses.active)}b.stopPropagation();f=[];var k=I(J.move,Y,V,{target:b.target,handle:d,listeners:f,startCalcPoint:b.calcPoint,baseSize:B(),pageOffset:b.pageOffset,handleNumbers:c.handleNumbers,buttonsProperty:b.buttons,locations:v.slice()}),
e=I(J.end,Y,ka,{target:b.target,handle:d,listeners:f,doNotReject:!0,handleNumbers:c.handleNumbers});d=I("mouseout",Y,O,{target:b.target,handle:d,listeners:f,doNotReject:!0,handleNumbers:c.handleNumbers});f.push.apply(f,k.concat(e,d));b.cursor&&(Z.style.cursor=getComputedStyle(b.target).cursor,1<r.length&&p(w,a.cssClasses.drag),Z.addEventListener("selectstart",n,!1));c.handleNumbers.forEach(function(a){A("start",a)})}function W(b){b.stopPropagation();var c=G(b.calcPoint),f=ha(c);if(!1===f)return!1;
a.events.snap||q(w,a.cssClasses.tap,a.animationDuration);aa(f,c,!0,!0);ma();A("slide",f,!0);A("update",f,!0);A("change",f,!0);A("set",f,!0);a.events.snap&&na(b,{handleNumbers:[f]})}function X(a){a=G(a.calcPoint);a=t.getStep(a);var b=t.fromStepping(a);Object.keys(C).forEach(function(a){"hover"===a.split(".")[0]&&C[a].forEach(function(a){a.call(ba,b)})})}function ja(a,b){C[a]=C[a]||[];C[a].push(b);"update"===a.split(".")[0]&&r.forEach(function(a,b){A("update",b)})}function A(b,c,d){Object.keys(C).forEach(function(f){var k=
f.split(".")[0];b===k&&C[f].forEach(function(b){b.call(ba,S.map(a.format.to),c,S.slice(),d||!1,v.slice())})})}function ca(b,c,d,e,u,l){return 1<r.length&&(e&&0<c&&(d=Math.max(d,b[c-1]+a.margin)),u&&c<r.length-1&&(d=Math.min(d,b[c+1]-a.margin))),1<r.length&&a.limit&&(e&&0<c&&(d=Math.min(d,b[c-1]+a.limit)),u&&c<r.length-1&&(d=Math.max(d,b[c+1]-a.limit))),a.padding&&(0===c&&(d=Math.max(d,a.padding[0])),c===r.length-1&&(d=Math.min(d,100-a.padding[1]))),d=t.getStep(d),!((d=Math.max(Math.min(d,100),0))===
b[c]&&!l)&&d}function oa(b,c){var d=a.ort;return(d?c:b)+", "+(d?b:c)}function sa(a,b,c,d){var f=c.slice(),k=[!a,a],e=[a,!a];d=d.slice();a&&d.reverse();1<d.length?d.forEach(function(a,c){c=ca(f,a,f[a]+b,k[c],e[c],!1);!1===c?b=0:(b=c-f[a],f[a]=c)}):k=e=[!0];var m=!1;d.forEach(function(a,d){m=aa(a,c[a]+b,k[d],e[d])||m});m&&d.forEach(function(a){A("update",a);A("slide",a)})}function ma(){N.forEach(function(a){r[a].style.zIndex=3+(r.length+(50<v[a]?-1:1)*a)})}function aa(b,c,d,e){if(d=!1!==(c=ca(v,b,c,
d,e,!1)))v[b]=c,S[b]=t.fromStepping(c),c="translate("+oa((a.dir?100-c:c)-ia+"%","0")+")",r[b].style[a.transformRule]=c,ta(b),ta(b+1),d=!0;return d}function ta(b){if(F[b]){var c=0,d=100;0!==b&&(c=v[b-1]);b!==F.length-1&&(d=v[b]);d-=c;c="translate("+oa((a.dir?100-c-d:c)+"%","0")+")";d="scale("+oa(d/100,"1")+")";F[b].style[a.transformRule]=c+" "+d}}function da(b,c){var d=x(b);b=void 0===v[0];c=void 0===c||!!c;a.animate&&!b&&q(w,a.cssClasses.tap,a.animationDuration);N.forEach(function(b){var c=d[b];var f=
null===c||!1===c||void 0===c?v[b]:("number"==typeof c&&(c=String(c)),c=a.format.from(c),c=t.toStepping(c),!1===c||isNaN(c)?v[b]:c);aa(b,f,!0,!1)});N.forEach(function(a){aa(a,v[a],!0,!0)});ma();N.forEach(function(a){A("update",a);null!==d[a]&&c&&A("set",a)})}function ua(){var b=S.map(a.format.to);return 1===b.length?b[0]:b}var E,r,F,ba,R,J=window.navigator.pointerEnabled?{start:"pointerdown",move:"pointermove",end:"pointerup"}:window.navigator.msPointerEnabled?{start:"MSPointerDown",move:"MSPointerMove",
end:"MSPointerUp"}:{start:"mousedown touchstart",move:"mousemove touchmove",end:"mouseup touchend"},ra=window.CSS&&CSS.supports&&CSS.supports("touch-action","none")&&P(),w=b,v=[],N=[],la=0,t=a.spectrum,S=[],C={},L=b.ownerDocument,Y=L.documentElement,Z=L.body,ia="rtl"===L.dir||1===a.ort?0:100;return function(b){p(b,a.cssClasses.target);0===a.dir?p(b,a.cssClasses.ltr):p(b,a.cssClasses.rtl);0===a.ort?p(b,a.cssClasses.horizontal):p(b,a.cssClasses.vertical);E=d(b,a.cssClasses.base)}(w),function(b,c){var f=
d(c,a.cssClasses.connects);r=[];F=[];F.push(!!b[0]&&d(f,a.cssClasses.connect));for(var e=0;e<a.handles;e++)r.push(l(c,e)),N[e]=e,F.push(!!b[e+1]&&d(f,a.cssClasses.connect))}(a.connect,E),function(b){b.fixed||r.forEach(function(a,b){I(J.start,a.children[0],na,{handleNumbers:[b]})});b.tap&&I(J.start,E,W,{});b.hover&&I(J.move,E,X,{hover:!0});b.drag&&F.forEach(function(c,d){if(!1!==c&&0!==d&&d!==F.length-1){var f=r[d-1],e=r[d],k=[c];p(c,a.cssClasses.draggable);b.fixed&&(k.push(f.children[0]),k.push(e.children[0]));
k.forEach(function(a){I(J.start,a,na,{handles:[f,e],handleNumbers:[d-1,d]})})}})}(a.events),da(a.start),ba={destroy:function(){for(var b in a.cssClasses)a.cssClasses.hasOwnProperty(b)&&D(w,a.cssClasses[b]);for(;w.firstChild;)w.removeChild(w.firstChild);delete w.noUiSlider},steps:function(){return v.map(function(a,b){var c=t.getNearbySteps(a),d=S[b];b=c.thisStep.step;!1!==b&&d+b>c.stepAfter.startValue&&(b=c.stepAfter.startValue-d);c=d>c.thisStep.startValue?c.thisStep.step:!1!==c.stepBefore.step&&d-
c.stepBefore.highestStep;100===a?b=null:0===a&&(c=null);a=t.countStepDecimals();return null!==b&&!1!==b&&(b=Number(b.toFixed(a))),null!==c&&!1!==c&&(c=Number(c.toFixed(a))),[c,b]})},on:ja,off:function(a){var b=a&&a.split(".")[0],c=b&&a.substring(b.length);Object.keys(C).forEach(function(a){var d=a.split(".")[0],e=a.substring(d.length);b&&b!==d||c&&c!==e||delete C[a]})},get:ua,set:da,reset:function(b){da(a.start,b)},__moveHandles:function(a,b,c){sa(a,b,v,c)},options:c,updateOptions:function(b,d){var e=
ua(),f="margin limit padding range animate snap step format".split(" ");f.forEach(function(a){void 0!==b[a]&&(c[a]=b[a])});var l=qa(c);f.forEach(function(c){void 0!==b[c]&&(a[c]=l[c])});t=l.spectrum;a.margin=l.margin;a.limit=l.limit;a.padding=l.padding;a.pips&&Q(a.pips);v=[];da(b.start||e,d)},target:w,removePips:T,pips:Q},a.pips&&Q(a.pips),a.tooltips&&ea(),function(){ja("update",function(b,c,d,e,l){N.forEach(function(b){var c=r[b],e=ca(v,b,0,!0,!0,!0),f=ca(v,b,100,!0,!0,!0),k=l[b];b=a.ariaFormat.to(d[b]);
c.children[0].setAttribute("aria-valuemin",e.toFixed(1));c.children[0].setAttribute("aria-valuemax",f.toFixed(1));c.children[0].setAttribute("aria-valuenow",k.toFixed(1));c.children[0].setAttribute("aria-valuetext",b)})})}(),ba}var h="11.1.0";y.prototype.getMargin=function(b){var a=this.xNumSteps[0];if(a&&0!=b/a%1)throw Error("noUiSlider ("+h+"): 'limit', 'margin' and 'padding' must be divisible by step.");return 2===this.xPct.length&&d(this.xVal,b)};y.prototype.toStepping=function(b){var a=this.xVal,
c=this.xPct;if(b>=a.slice(-1)[0])var e=100;else{var h=l(b,a);e=c[h-1];c=c[h];a=[a[h-1],a[h]];b=d(a,0>a[0]?b+Math.abs(a[0]):b-a[0]);e+=b/(100/(c-e))}return e};y.prototype.fromStepping=function(b){var a=this.xVal,c=this.xPct;if(100<=b)b=a.slice(-1)[0];else{var d=l(b,c),e=c[d-1];a=[a[d-1],a[d]];b=100/(c[d]-e)*(b-e)*(a[1]-a[0])/100+a[0]}return b};y.prototype.getStep=function(b){var a=this.xPct,c=this.xSteps,d=this.snap;if(100!==b){var e=l(b,a),h=a[e-1],g=a[e];d?b=b-h>(g-h)/2?g:h:c[e-1]&&(c=c[e-1],b=a[e-
1]+Math.round((b-a[e-1])/c)*c)}return b};y.prototype.getNearbySteps=function(b){b=l(b,this.xPct);return{stepBefore:{startValue:this.xVal[b-2],step:this.xNumSteps[b-2],highestStep:this.xHighestCompleteStep[b-2]},thisStep:{startValue:this.xVal[b-1],step:this.xNumSteps[b-1],highestStep:this.xHighestCompleteStep[b-1]},stepAfter:{startValue:this.xVal[b-0],step:this.xNumSteps[b-0],highestStep:this.xHighestCompleteStep[b-0]}}};y.prototype.countStepDecimals=function(){var b=this.xNumSteps.map(O);return Math.max.apply(null,
b)};
y.prototype.convert=function(b){
    return this.getStep(this.toStepping(b))
};
var X={to:function(b){
    return void 0!==b&&b.toFixed(2)
},from:Number};
return{
    version:h,create:function(b,a){
        if(!b||!b.nodeName)throw Error("noUiSlider ("+h+"): create requires a single element, got: "+b);
        if(b.noUiSlider)throw Error("noUiSlider ("+h+"): Slider was already initialized.");
        var c=qa(a,b);a=Fa(b,c,a);return b.noUiSlider=a,a
    }
}

});
 app.onReady(window,"$",function(){$(function(){function c(){var c=e.noUiSlider.get(),l=parseInt(c[0]),g=parseInt(c[1]);c=location.search;c=updateURLVar(c,"filter_price","");c=updateURLVar(c,"filter","");
    c=updateURLVar(c,"filter_status","");
    c=updateURLVar(c,"sort","");
    c=updateURLVar(c,"order","");
    c=updateURLVar(c,"limit","");
    var n=$("<div class='popup f-in'><div class='loader popup-inner'></div></div>");$("body").append(n);var y=[],x=null,G=null;q.each(function(){var c=[],d=$(this);d.find(".filter input").each(function(d,e){
    e.checked&&c.push(e.value)
});
0<c.length&&("category"===d.attr("data-group-type")?x=c.join(","):"status"===d.attr("data-group-type")?G=c.join(","):y.push(c.join(",")))});
c=updateURLVar(c,"filter_status",G);
c=updateURLVar(updateURLVar(c,"page"),"filter",y.join("_"));if(l!==p||g!==D)c=updateURLVar(c,"filter_price",l+"-"+g);
c=updateURLVar(c,"filter_category",x);l=K.val()?K.val().split("-"):[];
2===l.length&&(c=updateURLVar(c,"sort",l[0]),c=updateURLVar(c,"order",l[1]));
P&&(c=updateURLVar(c,"limit",P));
var B=location.pathname+c;

!0===localStorage.reloadPage?location.href=B:$.ajax({
    url:B,
    success:function(c){
        try{var d=Date.now();
            c=$(c);
            history.pushState(null,"",B);
$("#content .main-content").html(c.find("#content .main-content").html());
$("#content .bottom-bar").html(c.find("#content .bottom-bar").html());

n.remove();
addClearFix&&addClearFix();
console.log(Date.now()-d)}catch(V){localStorage.reloadPage=!0,location.href=B}}})}function n(c,l){var d=[null,null];d[c]=l;e.noUiSlider.set(d)}var e=$("#rang-slider"),
g=[$("#range-to"),$("#range-from")],q=$(".filters .filter-group"),x=parseInt(e.attr("data-from")),O=parseInt(e.attr("data-to")),p=parseInt(e.attr("data-min")),D=parseInt(e.attr("data-max"));
p=p===D?0:p;
e=e.get(0);
noUiSlider.create(e,{
    start:[x,O],connect:!0,range:{min:p,max:D}

});
$(".noUi-handle-lower").attr("title","Lower Handle");
$(".noUi-handle-upper").attr("title","Upper Handle");

var K=$("#input-sort");
x=$("#input-limit");
var P=getURLVar("limit");
e.noUiSlider.on("update",function(c,e){
    g[e].val(parseInt(c[e]).toCommaFormat())
});

e.noUiSlider.on("change",c);
g.forEach(function(d,l){
    d.on("change",function(){
        n(l,d.val().replaceAll(",",""));
        c()
    });
    d.on("keydown",function(g){
        var p=e.noUiSlider.get();
        p=Number(p[l]);
        var q=e.noUiSlider.steps()[l];
        switch(g.which){case 13:n(l,this.value.replaceAll(",",""));
        d.dirty=!1;c();break;case 38:g=q[1];
        !1===g&&(g=1);null!==g&&(d.dirty=!0,n(l,p+g));
        break;
        case 40:g=q[0],!1===g&&(g=1),null!==g&&(d.dirty=!0,n(l,p-g))}});
    d.on("blur",function(){d.dirty&&(d.trigger("change"),d.dirty=!1)})});
        decodeURIComponent(getURLVar("filter")).split("_").forEach(function(c){
        c.split(",").forEach(function(c){
         c=$(".filters input[name=filter][value='"+c+"']");
         c.size()&&(c.get(0).checked=!0,c.parents(".filter-group").addClass("show"))
        })
    });

decodeURIComponent(getURLVar("filter_category")).split("_").forEach(function(c){
    c.split(",").forEach(function(c){c=$(".filters input[name=category][value='"+c+"']");
        c.size()&&(c.get(0).checked=!0,c.parents(".filter-group").addClass("show"))
    })
});

q.each(function(){
    var d=$(this);
    d.find(".label").on("click",function(){
        d.toggleClass("show")
    });
    d.on("change",c)
});
    K.on("change",c);
    x.on("change",function(){
        P=this.value;c()
    });
    window.onpopstate=function(c){
        location.reload(!0)
    }
})
},
20);
