!function(t){var e={};function n(i){if(e[i])return e[i].exports;var s=e[i]={i:i,l:!1,exports:{}};return t[i].call(s.exports,s,s.exports,n),s.l=!0,s.exports}n.m=t,n.c=e,n.d=function(t,e,i){n.o(t,e)||Object.defineProperty(t,e,{configurable:!1,enumerable:!0,get:i})},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="/",n(n.s=0)}([function(t,e,n){n(1),t.exports=n(2)},function(t,e,n){var i,s="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t};i=jQuery,"undefined"===s(Craft.AssetMetadata)&&(Craft.AssetMetadata={}),Craft.AssetMetadata.Field=Garnish.Base.extend({$field:null,$refreshBtn:null,$spinner:null,init:function(t){this.setSettings(t),this.$field=i("#"+this.settings.id+"-field"),this.$refreshBtn=this.$field.find(".assetmetadata-refresh"),this.$spinner=this.$field.find(".spinner"),this.addListener(this.$refreshBtn,"activate","updateField")},updateField:function(){this.$spinner.removeClass("hidden");var t={fieldId:this.settings.fieldId,elementId:this.settings.elementId};Craft.postActionRequest("asset-metadata/metadata/get-field-value",t,i.proxy(function(t,e){i.each(t,i.proxy(function(t,e){this.$field.find('input[name="'+this.settings.name+"["+t+']"]').val(e)},this)),this.$spinner.addClass("hidden")},this))}})},function(t,e){}]);