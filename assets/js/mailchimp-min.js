!function(e,t,r){"use strict";var i=function(){var e=t.createElement("input");return"validity"in e&&"badInput"in e.validity&&"patternMismatch"in e.validity&&"rangeOverflow"in e.validity&&"rangeUnderflow"in e.validity&&"stepMismatch"in e.validity&&"tooLong"in e.validity&&"tooShort"in e.validity&&"typeMismatch"in e.validity&&"valid"in e.validity&&"valueMissing"in e.validity},a=function(e){var r=e.getAttribute("type")||input.nodeName.toLowerCase(),i="number"===r||"range"===r,a=e.value.length,n=!0;if("radio"===e.type&&e.name){var s=t.getElementsByName(e.name);if(s.length>0)for(var o=0;o<s.length;o++)if(s[o].form===e.form&&e.checked){e=s[o];break}}var l={badInput:i&&a>0&&!/[-+]?[0-9]/.test(e.value),patternMismatch:e.hasAttribute("pattern")&&a>0&&!1===new RegExp(e.getAttribute("pattern")).test(e.value),rangeOverflow:e.hasAttribute("max")&&i&&e.value>0&&Number(e.value)>Number(e.getAttribute("max")),rangeUnderflow:e.hasAttribute("min")&&i&&e.value>0&&Number(e.value)<Number(e.getAttribute("min")),stepMismatch:i&&(e.hasAttribute("step")&&"any"!==e.getAttribute("step")&&Number(e.value)%Number(e.getAttribute("step"))!=0||!e.hasAttribute("step")&&Number(e.value)%1!=0),tooLong:e.hasAttribute("maxLength")&&e.getAttribute("maxLength")>0&&a>parseInt(e.getAttribute("maxLength"),10),tooShort:e.hasAttribute("minLength")&&e.getAttribute("minLength")>0&&a>0&&a<parseInt(e.getAttribute("minLength"),10),typeMismatch:a>0&&("email"===r&&!/^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$/.test(e.value)||"url"===r&&!/^(?:(?:https?|HTTPS?|ftp|FTP):\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-zA-Z\u00a1-\uffff0-9]-*)*[a-zA-Z\u00a1-\uffff0-9]+)(?:\.(?:[a-zA-Z\u00a1-\uffff0-9]-*)*[a-zA-Z\u00a1-\uffff0-9]+)*)(?::\d{2,5})?(?:[\/?#]\S*)?$/.test(e.value)),valueMissing:e.hasAttribute("required")&&(("checkbox"===r||"radio"===r)&&!e.checked||"select"===r&&e.options[e.selectedIndex].value<1||"checkbox"!==r&&"radio"!==r&&"select"!==r&&a<1)};for(var u in l)if(l.hasOwnProperty(u)&&l[u]){n=!1;break}return l.valid=n,l};Object.defineProperty(HTMLInputElement.prototype,"validity",{get:function e(){return a(this)},configurable:!0})}(window,document),
/*! @source http://purl.eligrey.com/github/classList.js/blob/master/classList.js */
"document"in self&&((!("classList"in document.createElement("_"))||document.createElementNS&&!("classList"in document.createElementNS("http://www.w3.org/2000/svg","g")))&&function(e){"use strict";if("Element"in e){var t="classList",r="prototype",i=e.Element.prototype,a=Object,n=String.prototype.trim||function(){return this.replace(/^\s+|\s+$/g,"")},s=Array.prototype.indexOf||function(e){for(var t=0,r=this.length;t<r;t++)if(t in this&&this[t]===e)return t;return-1},o=function(e,t){this.name=e,this.code=DOMException[e],this.message=t},l=function(e,t){if(""===t)throw new o("SYNTAX_ERR","An invalid or illegal string was specified");if(/\s/.test(t))throw new o("INVALID_CHARACTER_ERR","String contains an invalid character");return s.call(e,t)},u=function(e){for(var t=n.call(e.getAttribute("class")||""),r=t?t.split(/\s+/):[],i=0,a=r.length;i<a;i++)this.push(r[i]);this._updateClassName=function(){e.setAttribute("class",this.toString())}},c=u.prototype=[],d=function(){return new u(this)};if(o.prototype=Error.prototype,c.item=function(e){return this[e]||null},c.contains=function(e){return-1!==l(this,e+="")},c.add=function(){var e=arguments,t=0,r=e.length,i,a=!1;do{i=e[t]+"",-1===l(this,i)&&(this.push(i),a=!0)}while(++t<r);a&&this._updateClassName()},c.remove=function(){var e=arguments,t=0,r=e.length,i,a=!1,n;do{for(i=e[t]+"",n=l(this,i);-1!==n;)this.splice(n,1),a=!0,n=l(this,i)}while(++t<r);a&&this._updateClassName()},c.toggle=function(e,t){e+="";var r=this.contains(e),i=r?!0!==t&&"remove":!1!==t&&"add";return i&&this[i](e),!0===t||!1===t?t:!r},c.toString=function(){return this.join(" ")},a.defineProperty){var f={get:d,enumerable:!0,configurable:!0};try{a.defineProperty(i,t,f)}catch(e){void 0!==e.number&&-2146823252!==e.number||(f.enumerable=!1,a.defineProperty(i,t,f))}}else a.prototype.__defineGetter__&&i.__defineGetter__(t,d)}}(self),function(){"use strict";var e=document.createElement("_");if(e.classList.add("c1","c2"),!e.classList.contains("c2")){var t=function(e){var t=DOMTokenList.prototype[e];DOMTokenList.prototype[e]=function(e){var r,i=arguments.length;for(r=0;r<i;r++)e=arguments[r],t.call(this,e)}};t("add"),t("remove")}if(e.classList.toggle("c3",!1),e.classList.contains("c3")){var r=DOMTokenList.prototype.toggle;DOMTokenList.prototype.toggle=function(e,t){return 1 in arguments&&!this.contains(e)==!t?t:r.call(this,e)}}e=null}());for(var forms=document.querySelectorAll(".validate"),i=0;i<forms.length;i++)forms[i].setAttribute("novalidate",!0);var hasError=function(e){if(!e.disabled&&"file"!==e.type&&"reset"!==e.type&&"submit"!==e.type&&"button"!==e.type){var t=e.validity;if(!t.valid){if(t.valueMissing)return"Please fill out this field.";if(t.typeMismatch){if("email"===e.type)return"Please enter an email address.";if("url"===e.type)return"Please enter a URL."}return t.tooShort?"Please lengthen this text to "+e.getAttribute("minLength")+" characters or more. You are currently using "+e.value.length+" characters.":t.tooLong?"Please shorten this text to no more than "+e.getAttribute("maxLength")+" characters. You are currently using "+e.value.length+" characters.":t.patternMismatch?e.hasAttribute("title")?e.getAttribute("title"):"Please match the requested format.":t.badInput?"Please enter a number.":t.stepMismatch?"Please select a valid value.":t.rangeOverflow?"Please select a value that is no more than "+e.getAttribute("max")+".":t.rangeUnderflow?"Please select a value that is no less than "+e.getAttribute("min")+".":"The value you entered for this field is invalid."}}},showError=function(e,t){if(e.classList.add("error"),"radio"===e.type&&e.name){var r=e.form.querySelectorAll('[name="'+e.name+'"]');if(r.length>0){for(var i=0;i<r.length;i++)r[i].classList.add("error");e=r[r.length-1]}}var a=e.id||e.name;if(a){var n=e.form.querySelector(".error-message#error-for-"+a),s;if(!n)(n=document.createElement("div")).className="error-message",n.id="error-for-"+a,"radio"!==e.type&&"checkbox"!==e.type||(s=e.form.querySelector('label[for="'+a+'"]')||e.parentNode)&&s.parentNode.insertBefore(n,s.nextSibling),s||e.parentNode.insertBefore(n,e.nextSibling);e.setAttribute("aria-describedby","error-for-"+a),n.innerHTML=t,n.style.display="block",n.style.visibility="visible"}},removeError=function(e){if(e.classList.remove("error"),e.removeAttribute("aria-describedby"),"radio"===e.type&&e.name){var t=e.form.querySelectorAll('[name="'+e.name+'"]');if(t.length>0){for(var r=0;r<t.length;r++)t[r].classList.remove("error");e=t[t.length-1]}}var i=e.id||e.name;if(i){var a=e.form.querySelector(".error-message#error-for-"+i);a&&(a.innerHTML="",a.style.display="none",a.style.visibility="hidden")}},serialize=function(e){var t="";for(i=0;i<e.elements.length;i++){var r=e.elements[i];r.name&&!r.disabled&&"file"!==r.type&&"reset"!==r.type&&"submit"!==r.type&&"button"!==r.type&&(("checkbox"!==r.type&&"radio"!==r.type||r.checked)&&(t+="&"+encodeURIComponent(r.name)+"="+encodeURIComponent(r.value)))}return t};window.displayMailChimpStatus=function(e){var t=window.document.querySelector(".mc-status");if(e.result&&e.msg&&t){if(t.innerHTML=e.msg,t.focus(),"error"===e.result)return t.classList.remove("success-message"),void t.classList.add("error-message");t.classList.remove("error-message"),t.classList.add("success-message")}};var submitMailChimpForm=function(e){var t=e.getAttribute("action");t=t.replace("/post?u=","/post-json?u="),t+=serialize(e)+"&c=displayMailChimpStatus";var r=window.document.getElementsByTagName("script")[0],i=window.document.createElement("script");i.src=t,window.mcStatus=e.querySelector(".mc-status"),r.parentNode.insertBefore(i,r);var a="/assets/VeryCool_TrialFonts.zip";window.open(a,"_blank"),i.onload=function(){this.remove()}};document.addEventListener("blur",(function(e){if(e.target.form.classList.contains("validate")){var t=hasError(e.target);t?showError(e.target,t):removeError(e.target)}}),!0),document.addEventListener("submit",(function(e){if(e.target.classList.contains("validate")){e.preventDefault();for(var t=e.target.elements,r,i,a=0;a<t.length;a++)(r=hasError(t[a]))&&(showError(t[a],r),i||(i=t[a]));i&&i.focus(),submitMailChimpForm(e.target)}}),!1);