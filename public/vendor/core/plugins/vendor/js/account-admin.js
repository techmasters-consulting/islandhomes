!function(e){var t={};function o(n){if(t[n])return t[n].exports;var r=t[n]={i:n,l:!1,exports:{}};return e[n].call(r.exports,r,r.exports,o),r.l=!0,r.exports}o.m=e,o.c=t,o.d=function(e,t,n){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(e,t){if(1&t&&(e=o(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(o.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)o.d(n,r,function(t){return e[t]}.bind(null,r));return n},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="/",o(o.s=325)}({325:function(e,t,o){e.exports=o(326)},326:function(e,t){$(document).ready((function(){$(document).on("click","#is_change_password",(function(e){$(e.currentTarget).is(":checked")?$("input[type=password]").closest(".form-group").removeClass("hidden").fadeIn():$("input[type=password]").closest(".form-group").addClass("hidden").fadeOut()})),$(document).on("click",".btn-trigger-add-credit",(function(e){e.preventDefault(),$("#add-credit-modal").modal("show")})),$(document).on("click","#confirm-add-credit-button",(function(e){e.preventDefault();var t=$(e.currentTarget);t.addClass("button-loading"),$.ajax({type:"POST",cache:!1,url:t.closest(".modal-content").find("form").prop("action"),data:t.closest(".modal-content").find("form").serialize(),success:function(e){e.error?Botble.showNotice("error",e.message):(Botble.showNotice("success",e.message),$("#add-credit-modal").modal("hide"),$("#credit-histories").load($(".page-content form").prop("action")+" #credit-histories > *")),t.removeClass("button-loading")},error:function(e){Botble.handleError(e),t.removeClass("button-loading")}})})),$(document).on("click",".show-timeline-dropdown",(function(e){e.preventDefault(),$($(e.currentTarget).data("target")).slideToggle(),$(e.currentTarget).closest(".comment-log-item").toggleClass("bg-white")}))}))}});