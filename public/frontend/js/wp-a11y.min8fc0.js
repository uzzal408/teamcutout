window.wp=window.wp||{},function(e,a){"use strict";var i,n;function t(e){e=a("<div>",{id:"wp-a11y-speak-"+(e=e||"polite"),"aria-live":e,"aria-relevant":"additions text","aria-atomic":"true","class":"screen-reader-text wp-a11y-speak-region"});return a(document.body).append(e),e}a(document).ready(function(){i=a("#wp-a11y-speak-polite"),n=a("#wp-a11y-speak-assertive"),i.length||(i=t("polite")),n.length||(n=t("assertive"))}),e.a11y=e.a11y||{},e.a11y.speak=function(e,t){a(".wp-a11y-speak-region").text(""),e=a("<p>").html(e).text(),n&&"assertive"===t?n.text(e):i&&i.text(e)}}(window.wp,window.jQuery);