/* SCEditor v2.1.2 | (C) 2017, Sam Clarke | sceditor.com/license */

!function(t,e){"use strict";function n(t){if(t._scePatched)return t;var n=function(){for(var n=[],c=0;c<arguments.length;c++){var r=arguments[c];r&&r.nodeType?n.push(e(r)):n.push(r)}return t.apply(this,n)};return n._scePatched=!0,n}function c(t){if(t._scePatched)return t;var n=function(){return e(t.apply(this,arguments))};return n._scePatched=!0,n}var r=t.plugins,o=t.command.set;if(t.command.set=function(t,e){return e&&"function"==typeof e.exec&&(e.exec=n(e.exec)),e&&"function"==typeof e.txtExec&&(e.txtExec=n(e.txtExec)),o.call(this,t,e)},r.bbcode){var a=r.bbcode.bbcode.set;r.bbcode.bbcode.set=function(t,e){return e&&"function"==typeof e.format&&(e.format=n(e.format)),a.call(this,t,e)}}var i=t.create;t.create=function(t,e){if(i.call(this,t,e),t&&t._sceditor){var n=t._sceditor;n.getBody=c(n.getBody),n.getContentAreaContainer=c(n.getContentAreaContainer)}}}(sceditor,jQuery);