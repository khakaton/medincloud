(self.webpackChunk=self.webpackChunk||[]).push([[3564,8008],{15975:function(e,t,r){"use strict";r.d(t,{S:function(){return n},Y:function(){return o}});var n="EDIT_ELEMENT";function o(e){return{type:n,payload:e}}},62309:function(e,t,r){"use strict";r.d(t,{K:function(){return n},o:function(){return o}});var n="DASHBOARD_EXPORT";function o(e){return{type:n,payload:e}}},26553:function(e,t,r){"use strict";r.d(t,{I3:function(){return n},En:function(){return o},Tg:function(){return a},zM:function(){return i},cC:function(){return c},qS:function(){return u},vt:function(){return s},PL:function(){return l}});var n="CHANGE_CURRENT_DATASOURCE",o="CLEAR_CURRENT_DATASOURCE",a="SET_CURRENT_DATASOURCE_LOADED",i="SET_CURRENT_DATASOURCE_LOADING";function c(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};return{type:n,data:t,dataStorageName:e}}function u(){return{type:o}}function s(){return{type:a}}function l(){return{type:i}}},86094:function(e,t,r){"use strict";r.d(t,{X:function(){return n},f:function(){return o}});var n="CHANGE_CURRENT_EMAIL_TEMPLATE";function o(e){return{type:n,template:e}}},1966:function(e,t,r){"use strict";r.d(t,{E:function(){return n},D:function(){return o}});var n="CHANGE_CURRENT_MODEL";function o(e){return{type:n,model:e}}},61113:function(e,t,r){"use strict";r.d(t,{rh:function(){return n},Gk:function(){return o},qs:function(){return a}});var n="CHANGE_CURRENT_PAGE",o="CHANGE_CURRENT_PAGE_PROPERTY";function a(e,t){return{type:o,propertyName:e,value:t}}},99585:function(e,t,r){"use strict";r.d(t,{E:function(){return n},x:function(){return o}});var n="CHANGE_CURRENT_TITLE";function o(e){return{type:n,title:e}}},1196:function(e,t,r){"use strict";r.d(t,{FQ:function(){return n},ME:function(){return o},MN:function(){return a},L2:function(){return i}});var n="ADD_ELEMENT",o="CLEAR_ELEMENTS";function a(e){return{type:n,elementComponent:e}}function i(){return{type:o}}},65215:function(e,t,r){"use strict";r.d(t,{xV:function(){return n},v3:function(){return o},gZ:function(){return a}});var n="ADD_FONT",o="REMOVE_FONT";function a(e,t,r){return{type:n,elementId:e,controllerName:t,fontName:r}}},63081:function(e,t,r){"use strict";r.r(t),r.d(t,{SET_CURRENT_SCREEN:function(){return n},setCurrentScreen:function(){return o}});var n="SET_CURRENT_SCREEN";function o(e){return{type:n,screen:e}}},5998:function(e,t,r){"use strict";r.d(t,{Q:function(){return n},b:function(){return o}});var n="ADD_MENU";function o(e){return{type:n,menu:e}}},54534:function(e,t,r){"use strict";r.d(t,{$:function(){return n},z:function(){return o}});var n="TRIGGER_POPUP",o=function(e){return{type:n,payload:e}}},72337:function(e,t,r){"use strict";r.d(t,{X:function(){return n},y:function(){return o}});var n="SET_SCROLL_TOP",o=function(e){return e.top&&window.pageUpdater&&window.pageUpdater.startUpdating(),{type:n,payload:e}}},43564:function(e,t,r){"use strict";r.r(t),r.d(t,{default:function(){return Ie}});var n=r(14890),o=r(69456),a=r(25037);function i(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}var c=[];if(window.altrpPages){var u,s=function(e,t){var r="undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(!r){if(Array.isArray(e)||(r=function(e,t){if(e){if("string"==typeof e)return i(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?i(e,t):void 0}}(e))){r&&(e=r);var n=0,o=function(){};return{s:o,n:function(){return n>=e.length?{done:!0}:{done:!1,value:e[n++]}},e:function(e){throw e},f:o}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var a,c=!0,u=!1;return{s:function(){r=r.call(e)},n:function(){var e=r.next();return c=e.done,e},e:function(e){u=!0,a=e},f:function(){try{c||null==r.return||r.return()}finally{if(u)throw a}}}}(window.altrpPages);try{for(s.s();!(u=s.n()).done;){var l=u.value;c.push(a.Z.routeFabric(l))}}catch(e){s.e(e)}finally{s.f()}}var p={routes:c},f=r(96156),d=r(1966),y=r(71743);function v(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}_.isArray(window.model_data)&&(window.model_data=function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?v(Object(r),!0).forEach((function(t){(0,f.Z)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):v(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}({},window.model_data));var w=window.model_data||{};window.model_data&&(w.altrpModelUpdated=!0);var h=r(48379),g={},E=r(85061),m=r(46221),O=r(6610),b=r(5991),A=r(10379),R=r(46070),S=r(77608);var P=function(e){(0,A.Z)(o,e);var t,r,n=(t=o,r=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,n=(0,S.Z)(t);if(r){var o=(0,S.Z)(this).constructor;e=Reflect.construct(n,arguments,o)}else e=n.apply(this,arguments);return(0,R.Z)(this,e)});function o(){return(0,O.Z)(this,o),n.apply(this,arguments)}return(0,b.Z)(o,[{key:"isGuest",value:function(){return this.getProperty("is_guest",!1)}},{key:"isAuth",value:function(){return this.getProperty("created_at",!1)}},{key:"hasPermissions",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];_.isArray(e)||(e=[e]);var t=this.getProperty("permissions",[]);return _.find(t,(function(t){return _.find(e,(function(e){return parseInt(e)?parseInt(e)===parseInt(t.id):_.isString(e)?e===t.name:void 0}))}))}},{key:"hasRoles",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];_.isArray(e)||(e=[e]);var t=this.getProperty("roles",[]);return _.find(t,(function(t){return _.find(e,(function(e){return parseInt(e)?parseInt(e)===parseInt(t.id):_.isString(e)?e===t.name:void 0}))}))}},{key:"checkUserAllowed",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:[];return!!this.isAuth()&&(t=_.isArray(t)?t:[],!(e=_.isArray(e)?e:[]).length&&!t.length||!!this.hasPermissions(e)||!!this.hasRoles(t))}}]),o}(y.Z),D=r(38773);function T(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function N(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?T(Object(r),!0).forEach((function(t){(0,f.Z)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):T(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}var C=window.current_user||{},j=r(26553),L=r(76593),I={},Z=r(72337),k={},U=r(54534),M={popupID:null},G=r(1196),H=[],x="TOGGLE_TRIGGER",F="SET_DEFAULT_TRIGGERS",V=[],Q=r(15272),X={},$=r(15975);"undefined"==typeof _&&r(96486);var B={},Y=r(13974),q=window.altrpHelpers,z=q.AltrpModel,K=q.setAltrpIndex,J=q.saveDataToLocalStorage,W=q.isSSR,ee=W()?{}:window.altrpHelpers.getDataFromLocalStorage("altrpmeta",{});W()||window.addEventListener("storage",(function(){var e=window.altrpHelpers.getDataFromLocalStorage("altrpmeta",{});void 0!==e&&_.isObject(e)&&appStore.dispatch((0,Y.RH)(e,!0))}));var te=r(86817),re={},ne=r(65215),oe=new y.Z({}),ae={element:"test"},ie=r(62309),ce={},ue=r(63081),se=r(12027),le=se.default.SCREENS.find((function(e){var t;if(!e.fullMediaQuery)return!1;var r=e.fullMediaQuery;return r=r.replace("@media",""),void 0!==window.matchMedia&&(null===(t=window)||void 0===t?void 0:t.matchMedia(r).matches)}))||se.default.SCREENS[0];window.altrpHelpers.isEditor()||window.Cookies.set("__altrp_current_device",le.name);var pe,fe,de,ye,ve=r(99585),we=(null===(pe=document)||void 0===pe?void 0:pe.title)||"",_e=r(86094),he=r(61113),ge={url:(null===(fe=location)||void 0===fe?void 0:fe.href)||"",title:(null===(de=window)||void 0===de||null===(ye=de.currentPage)||void 0===ye?void 0:ye.title)||""},Ee=r(5998),me=window.altrpMenus||[],Oe=r(45530),be=r(69852),Ae=r.n(be);function Re(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function Se(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?Re(Object(r),!0).forEach((function(t){(0,f.Z)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):Re(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}var Pe={},De=r(99627),Te=[];window["h-altrp"]&&(Te=window.page_areas.map((function(e){return new window.altrpHelpers.Area.areaFactory(e)})));var Ne=(0,n.UY)({appRoutes:function(e,t){switch(e=e||p,t.type){case o.d:e={routes:t.routes}}return e},currentModel:function(e,t){switch(e=e||w,t.type){case d.E:e=t.model}return e instanceof y.Z?e:new y.Z(e)},formsStore:function(e,t){var r=t.type,n=t.formId,o=t.fieldName,a=t.value,i=t.changedField;switch(e=e||g,r){case h.sc:_.get(e,[n,o])!==a&&((e=_.cloneDeep(e)).changedField=i,_.set(e,[n,o],a));break;case h.Yw:n?(e=_.cloneDeep(e),_.set(e,[n],{})):e={}}return e},currentUser:function(e,t){var r;switch(e=e||C,null===(r=t.user)||void 0===r||r.local_storage,t.type){case m.rA:e=t.user,Array.isArray(e.local_storage)&&(e.local_storage={});break;case m.XR:var n=t.path,o=t.value;e.setProperty(n,o);var a={local_storage:_.cloneDeep(e.getProperty("local_storage"))};new D.Z({route:"/ajax/current-user"}).put("",a).then((function(e){appStore.dispatch((0,m.a2)(e.data))})).catch((function(e){return console.error(e)}));break;case m.$L:var i,c=t.notice;e=N(N({},e),{},{notice:[].concat((0,E.Z)((null===(i=e.data)||void 0===i?void 0:i.notice)||[]),[c])});break;case m.$:e=N(N({},e),{},{members:t.members})}if(e instanceof P||(e=new P(e)),!window.SSR){var u=document.getElementById("front-app");e.hasRoles("admin")?u&&u.classList.add("front-app_admin"):u&&u.classList.remove("front-app_admin")}return e},currentDataStorage:function(e,t){switch(e=e||new y.Z(I),t.type){case j.I3:var r=t.data;_.isArray(r)&&(0,L.setAltrpIndex)(r),(e=_.cloneDeep(e)).setProperty(t.dataStorageName,r);break;case j.En:(e=new y.Z({})).setProperty("currentDataStorageLoaded",!1);break;case j.Tg:(e=_.cloneDeep(e)).setProperty("currentDataStorageLoaded",!0);break;case j.zM:(e=_.cloneDeep(e)).setProperty("currentDataStorageLoaded",!1)}return e instanceof y.Z?e:new y.Z(e)},scrollPosition:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:k,t=arguments.length>1?arguments[1]:void 0,r=t.type,n=t.payload;switch(r){case Z.X:return n;default:return e}},popupTrigger:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:M,t=arguments.length>1?arguments[1]:void 0,r=t.type,n=t.payload;switch(r){case U.$:return{popupID:e.popupID===n?null:n};default:return e}},elements:function(e,t){switch(e=e||H,t.type){case G.ME:e=H;break;case G.FQ:_.isArray(e)||(e=H),e.push(t.elementComponent),e=(0,E.Z)(e)}return e},hideTriggers:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:V,t=arguments.length>1?arguments[1]:void 0,r=t.type,n=t.payload;switch(r){case x:return e.includes(n)?e.filter((function(e){return e!==n})):[].concat((0,E.Z)(e),[n]);case F:return e.concat(n);default:return e}},altrpresponses:function(e,t){switch(e=e||new y.Z(X),t.type){case Q.OQ:var r=t.data;_.isArray(r)&&(0,L.setAltrpIndex)(r),(e=_.cloneDeep(e)).setProperty(t.formId,r);break;case Q.as:e=new y.Z({})}return e instanceof y.Z?e:new y.Z(e)},editElement:function(e,t){e=e||B;var r=_.cloneDeep(t.payload);switch(t.type){case $.S:e=r}return e},altrpMeta:function(e,t){switch(e=e||new z(ee),t.type){case Y.yE:var r=t.metaValue,n=t.metaName;e=_.cloneDeep(e),_.isArray(r)&&K(r),e.setProperty(n,r),J("altrpmeta",e.getData());break;case Y.cV:var o=t.metaValue;e=new z(o),_.isArray(o)&&K(o),J("altrpmeta",e.getData());break;case Y.q7:var a=t.metaValue;e=new z(a),_.isArray(a)&&K(a)}return e instanceof z?e:new z(e)},altrpPageState:function(e,t){switch(e=e||new y.Z(re),t.type){case te.H_:var r=t.stateValue;e=_.cloneDeep(e),_.isArray(r)&&(0,L.setAltrpIndex)(r),e.setProperty(t.stateName,r);break;case te.$d:e=new y.Z(re)}return e instanceof y.Z?e:new y.Z(e)},altrpFonts:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:oe,t=arguments.length>1?arguments[1]:void 0;switch(t.type){case ne.xV:var r=t.elementId,n=t.controllerName,o=t.fontName;e.setProperty("".concat(r,"_").concat(n),o),e=_.clone(e);break;case ne.v3:var a=t.elementId,i=t.controllerName;e.unsetProperty("".concat(a,"_").concat(i)),e=_.clone(e)}return e},userLocalStorage:function(e,t){var r=e||ae;switch(t.type){case"CHANGE_USER_LOCAL_STORAGE":r=e}return r},exportDashboard:function(e,t){e=e||ce;var r=_.cloneDeep(t.payload);switch(t.type){case ie.K:e=r}return e},currentScreen:function(e,t){switch(e=e||le,t.type){case ue.SET_CURRENT_SCREEN:window.Cookies.set("__altrp_current_device",t.screen.name,{expires:365}),e=t.screen}return e},currentTitle:function(e,t){switch(e=e||we,t.type){case ve.E:e=t.title}return e},currentEmailTemplate:function(e,t){switch(e=e||null,t.type){case _e.X:e=t.template}return e},altrpPage:function(e,t){switch(e=e||ge,t.type){case he.rh:e=t.page;break;case he.Gk:(e=_.clone(e)).setProperty(t.propertyName,t.value)}return e instanceof y.Z?e:new y.Z(e)},altrpMenus:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:me,t=arguments.length>1?arguments[1]:void 0;switch(t.type){case Ee.Q:if(e.find((function(e){return e.guid===t.menu.guid})))return e;(e=(0,E.Z)(e)).push(t.menu)}return e},elementsSettings:function(e,t){switch(e=e||Pe,t.type){case Oe.MO:e[t.elementId]&&Ae().delete(e,t.elementId),e=Ae().set(e,t.elementId,{settings:Se({},t.settings),name:t.elementName,childrenLength:t.childrenLength});break;case Oe.k9:e=t.settings}return e},areas:function(e,t){switch(e=e||Te,t.type){case De.D:e=t.areas}return e}}),Ce=window.__PRELOADED_STATE__;delete window.__PRELOADED_STATE__;var je=(0,n.MT)(Ne,Ce);if(window.appStore=je,window.ALTRP_DEBUG){var Le=je.dispatch;je.dispatch=function(e){console.trace(e),Le.bind(je)(e)}}var Ie=je}}]);
//# sourceMappingURL=3564.1f41b21376a96ba378ca.bundle.js.map