(self.webpackChunk=self.webpackChunk||[]).push([[7576],{67576:function(t,e,n){"use strict";n.d(e,{Z:function(){return S}});var i=n(28481),s=n(90484),r=n(92137),o=n(85061),a=n(96156),u=n(6610),l=n(5991),c=n(87757),g=n.n(c),h=n(12027),d=n(76593),p=n(71743),f=n(65215),m=n(45530),y=["input","input-select","input-select2","input-switch","input-wysiwyg","input-checkbox","input-radio","input-image-select","input-file","input-gallery","input-accept","input-date","input-textarea","input-slider","input-text-common","input-password","input-tel","input-number","input-email","input-date"];function v(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(t);e&&(i=i.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,i)}return n}function k(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?v(Object(n),!0).forEach((function(e){(0,a.Z)(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):v(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}var S=function(){function t(){var e,n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},i=arguments.length>1&&void 0!==arguments[1]&&arguments[1];(0,u.Z)(this,t),this.name=n.name,this.settings=n.settings,this.lazySection=n.lazySection,this.children=n.children,this.cssClassStorage=n.cssClassStorage,this.type=n.type,this.id=n.id,window.frontElementsManager&&!i&&(this.componentClass=window.frontElementsManager.getComponentClass(this.getName())),this.parent=null,this.forms=[],this.component=null,this.root=null,this.modelsList=[],this.getId()&&appStore.dispatch((0,m.zZ)(this.getId(),this.getName(),k({},this.settings),(null==this||null===(e=this.children)||void 0===e?void 0:e.length)||0))}var e,a;return(0,l.Z)(t,[{key:"setParent",value:function(t){t||console.error(this),this.parent=t}},{key:"getRoot",value:function(){return this.root||(this.root=this.findClosestByType("root-element")),this.root}},{key:"findClosestByType",value:function(t){return"widget"===t&&"widget"!==this.getType()||"column"===t&&-1!==["root-element","section"].indexOf(this.getType())||"section"===t&&"root-element"===this.getType()?null:this.getType()===t?this:this.parent?this.parent.findClosestByType(t):null}},{key:"update",value:function(){this.updateStyles();var t=["button"].concat((0,o.Z)(y));["button"].concat((0,o.Z)(y)).indexOf(this.getName())>=0&&this.getSettings("actions",[]).length,(t.indexOf(this.getName())>=0&&this.getFormId()||t.indexOf(this.getName())>=0&&"delete"===this.getSettings("form_actions"))&&this.formInit()}},{key:"registerActions",value:(a=(0,r.Z)(g().mark((function t(){var e;return g().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if(!this.actionsRegistered){t.next=2;break}return t.abrupt("return");case 2:return t.next=4,Promise.all([n.e(4079),n.e(6593),n.e(2167),n.e(6737)]).then(n.bind(n,2167));case 4:e=t.sent.default,t.t0=this.getName(),t.next="button"===t.t0?8:"input"===t.t0?10:11;break;case 8:return e.registerWidgetActions(this.getIdForAction(),this.getSettings("actions",[]),"click",this),t.abrupt("break",11);case 10:e.registerWidgetActions(this.getIdForAction(),this.getSettings("actions",[]),"blur",this);case 11:this.actionsRegistered=!0;case 12:case"end":return t.stop()}}),t,this)}))),function(){return a.apply(this,arguments)})},{key:"formInit",value:(e=(0,r.Z)(g().mark((function t(){var e,i,s,r,o=this;return g().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if(this.component){t.next=2;break}return t.abrupt("return");case 2:if(!this.formsIsInit){t.next=4;break}return t.abrupt("return");case 4:return this.formsIsInit=!0,t.next=7,Promise.all([n.e(4079),n.e(6593),n.e(1720)]).then(n.bind(n,80955));case 7:e=(e=t.sent).default,t.t0=this.getName(),t.next="button"===t.t0?12:"input-select"===t.t0||"input-select2"===t.t0||"input-switch"===t.t0||"input-wysiwyg"===t.t0||"input-checkbox"===t.t0||"input-radio"===t.t0||"input-image-select"===t.t0||"input-file"===t.t0||"input-gallery"===t.t0||"input-accept"===t.t0||"input-date"===t.t0||"input-textarea"===t.t0||"input-password"===t.t0||"input-email"===t.t0||"input-tel"===t.t0||"input-number"===t.t0||"input-text"===t.t0||"input-text-common"===t.t0||"input"===t.t0?37:39;break;case 12:i="POST",t.t1=this.getSettings("form_actions"),t.next="add_new"===t.t1?16:"delete"===t.t1?18:"edit"===t.t1?22:"login"===t.t1?26:"logout"===t.t1?29:"email"===t.t1?32:35;break;case 16:return this.addForm(e.registerForm(this.getFormId(),this.getSettings("choose_model"),i)),t.abrupt("break",35);case 18:return i="DELETE",(s=this.getModelName())&&this.addForm(e.registerForm(this.getId(),s,i)),t.abrupt("break",35);case 22:return i="PUT",(r=this.getModelName())&&this.addForm(e.registerForm(this.getFormId(),r,i)),t.abrupt("break",35);case 26:return i="POST",this.addForm(e.registerForm(this.getFormId(),"login",i,{afterLoginRedirect:this.getSettings("redirect_after")})),t.abrupt("break",35);case 29:return i="POST",this.addForm(e.registerForm(this.getFormId(),"logout",i,{afterLogoutRedirect:this.getSettings("redirect_after")})),t.abrupt("break",35);case 32:return i="POST",this.addForm(e.registerForm(this.getFormId(),"email",i,{afterLogoutRedirect:this.getSettings("redirect_after")})),t.abrupt("break",35);case 35:return this.getForms().forEach((function(t){t.addSubmitButton(o)})),t.abrupt("break",39);case 37:return e.addField(this.getFormId(),this),t.abrupt("break",39);case 39:case"end":return t.stop()}}),t,this)}))),function(){return e.apply(this,arguments)})},{key:"getForms",value:function(){return this.forms}},{key:"addForm",value:function(t){this.forms.push(t)}},{key:"getChildren",value:function(){return this.children}},{key:"getId",value:function(){return this.id}},{key:"getIdForAction",value:function(){return this.idForAction||(this.idForAction=(0,d.altrpRandomId)()),this.idForAction}},{key:"getName",value:function(){return this.name}},{key:"getType",value:function(){return this.type}},{key:"getSettings",value:function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";return t?!1===_.get(this.settings,t)||0===_.get(this.settings,t)?_.get(this.settings,t):_.get(this.settings,t)||e:_.cloneDeep(this.settings)}},{key:"updateStyles",value:function(){var t=this;window.stylesModulePromise.then((function(e){e.addElementStyles(t.getId(),t.getStringifyStyles())}))}},{key:"getStringifyStyles",value:function(){var t=this,e="";if("object"!==(0,s.Z)(this.settings.styles))return e;var n=_.cloneDeep(h.default.SCREENS);n.splice(0,1);var i=function(i){var s={};if(t.settings.styles.hasOwnProperty(i)){for(var r in t.settings.styles[i])if(t.settings.styles[i].hasOwnProperty(r))for(var o in t.settings.styles[i][r])t.settings.styles[i][r].hasOwnProperty(o)&&(s[o]=s[o]||[],s[o]=s[o].concat(t.settings.styles[i][r][o]));if(i===h.default.DEFAULT_BREAKPOINT)for(var a in s)s.hasOwnProperty(a)&&(e+="".concat(a," {")+s[a].join("")+"}");else n.forEach((function(t){t.name===i&&(t.rules=s)}))}};for(var r in this.settings.styles)i(r);return n.forEach((function(t){if(_.isObject(t.rules)){for(var n in e+="".concat(t.mediaQuery,"{"),t.rules)t.rules.hasOwnProperty(n)&&(e+="".concat(n," {")+t.rules[n].join("")+"}");e+="}"}})),e+=this.settings.stringStyles||"",this.settings.stringStyles&&console.log(this.settings.stringStyles),e}},{key:"getSelector",value:function(){return"root-element"===this.type?".altrp-template-root".concat(this.getId()):".altrp-element".concat(this.getId())}},{key:"getColumnsCount",value:function(){return this.children.length}},{key:"fieldValidate",value:function(){return-1===y.indexOf(this.getName())||!this.getSettings("content_required")||(_.has(this,"maskIsValid")?this.getValue()&&this.maskIsValid:this.getValue())}},{key:"elementIsDisplay",value:function(){return"root-element"===this.getName()||!(!this.component.props.elementDisplay&&!this.getSettings("conditional_ignore_in_forms"))&&(!this.parent||this.parent.elementIsDisplay())}},{key:"getValue",value:function(){if(-1===y.indexOf(this.getName()))return null;if(!this.elementIsDisplay())return null;this.getSettings();var t=this.component.state.value;switch(t&&t.dynamic&&(t=this.getContent("content_default_value")),this.getSettings("content_type")){case"checkbox":t=_.isArray(t)?t:t?[t]:[];break;case"accept":var e=this.getSettings("accept_checked")||!0,n=this.getSettings("accept_unchecked")||!1;n=(0,d.valueReplacement)(n),e=(0,d.valueReplacement)(e),t=t?e:n}return t}},{key:"getModelsList",value:function(){return this.getRoot().modelsList||[]}},{key:"getModelName",value:function(){var t=null;return this.getModelsList().forEach((function(e){"page"===e.modelName||e.related||(t=e.modelName)})),t}},{key:"getModelsInfoByModelName",value:function(t){var e=this.getModelsList(),n=null;return e.forEach((function(e){e.modelName===t&&(n=e)})),n}},{key:"setModelsList",value:function(t){this.getRoot().modelsList=t}},{key:"addModelInfo",value:function(t){this.getRoot().modelsList=this.getRoot().modelsList||[],this.getRoot().modelsList.push(k({},t))}},{key:"setModelsIds",value:function(t){}},{key:"getContent",value:function(t){return this.component?this.component.getContent(t):""}},{key:"setModelData",value:function(t,e){this.modelsStorage=this.modelsStorage||{},this.modelsStorage[t]=k({},e),this.modelCallbacksStorage&&this.modelCallbacksStorage[t]&&this.modelCallbacksStorage[t](this.modelsStorage[t])}},{key:"onUpdateModelStorage",value:function(t,e){this.modelCallbacksStorage=this.modelCallbacksStorage||{},this.modelCallbacksStorage[t]=e,this.modelsStorage&&this.modelsStorage[t]&&e(this.modelsStorage[t])}},{key:"getPrefixClasses",value:function(){var t=_.toPairs(this.cssClassStorage),e=" ";return t.forEach((function(t){e+="".concat(t[1]," ")})),e}},{key:"setCardModel",value:function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,n=this.getRoot();if(!t)return n.cardModel=null,void(n.isCard=!1);!t instanceof p.Z&&(t=new p.Z(t)),e=Number(e),n.cardModel=t,n.isCard=!0}},{key:"hasCardModel",value:function(){var t=this.getRoot();return!!t&&!(!t.cardModel||!t.isCard)}},{key:"getCardModel",value:function(){var t;return!(t="root-element"===this.getType()?this.cardModel:this.getRoot().cardModel)instanceof p.Z&&(t=new p.Z(t)),t}},{key:"getCurrentModel",value:function(){return this.hasCardModel()?this.getCardModel():appStore.getState().currentModel||new p.Z}},{key:"getFieldId",value:function(){var t=this.getSettings("field_id");return t?(-1!==t.indexOf("{{")&&(t=(0,d.replaceContentWithData)(t,this.getCurrentModel().getData())),t):t}},{key:"getFormId",value:function(){var t=this.getSettings("form_id");return t?(-1!==t.indexOf("{{")&&this.component&&(t=(0,d.replaceContentWithData)(t,this.getCurrentModel().getData())),t):t}},{key:"updateFonts",value:function(){var t=this,e=_.get(this.settings,"__altrpFonts__",{});(e=_.toPairs(e)).forEach((function(e){var n=(0,i.Z)(e,2),s=n[0],r=n[1];appStore.dispatch((0,f.gZ)(t.getId(),s,r))}))}},{key:"getDynamicSetting",value:function(t){return _.get(this.settings,"altrpDynamicSetting.".concat(t),null)}},{key:"getResponsiveSetting",value:function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",n=arguments.length>2?arguments[2]:void 0;return(0,d.getResponsiveSetting)(this.getSettings(),t,e,n)}},{key:"getTemplateType",value:function(){var t=this.getRoot();return t&&t.templateType||"content"}},{key:"updateSetting",value:function(t){var e,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";!n&&_.isObject(t)&&(e=k({},_.assign(this.settings,t))),n&&(e=k({},this.settings),_.set(e,n,t)),e&&(this.settings=e,this.component&&this.component.setState((function(t){return k(k({},t),{},{settings:e})})))}}]),t}()},65215:function(t,e,n){"use strict";n.d(e,{xV:function(){return i},v3:function(){return s},gZ:function(){return r}});var i="ADD_FONT",s="REMOVE_FONT";function r(t,e,n){return{type:i,elementId:t,controllerName:e,fontName:n}}}}]);
//# sourceMappingURL=7576.6d25795366fc0bb5a18e.bundle.js.map