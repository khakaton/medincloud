(self.webpackChunk=self.webpackChunk||[]).push([[4211],{59011:function(e,t,r){"use strict";r.r(t),r.d(t,{default:function(){return ct}});var n=r(92137),a=r(6610),o=r(5991),c=r(63349),s=r(10379),i=r(46070),u=r(77608),p=r(87757),l=r.n(p),f=r(43564),d=r(73727),h=r(5977),m=r(14494),g=r(22122),w=r(96156),v=r(99627),y=r(67294),b=r(91552);var k=function(e){(0,s.Z)(p,e);var t,r,n=(t=p,r=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,n=(0,u.Z)(t);if(r){var a=(0,u.Z)(this).constructor;e=Reflect.construct(n,arguments,a)}else e=n.apply(this,arguments);return(0,i.Z)(this,e)});function p(e){var t;return(0,a.Z)(this,p),t=n.call(this,e),e.area.component=(0,c.Z)(t),t}return(0,o.Z)(p,[{key:"componentWillUnmount",value:function(){var e;window.pageUpdater&&window.pageUpdater.startUpdating(),window.stylesModule.removeStyleById(null===(e=this.rootElement)||void 0===e?void 0:e.id)}},{key:"render",value:function(){var e,t,r=["app-area","app-area_".concat(this.props.id)];if(void 0!==this.props.area.getTemplates&&this.props.area.getTemplates().length)return y.createElement("div",{className:r.join(" ")},this.props.area.getTemplates().map((function(e){return y.createElement(b.default,{key:e.id,template:e})})));if(null===(e=this.props)||void 0===e||null===(t=e.template)||void 0===t||!t.data)return y.createElement("div",{className:r.join(" ")});"footer"===this.props.id&&(this.props.template.data.lastElement=!0);var n=this.rootElement?this.rootElement:window.frontElementsFabric.parseData(this.props.template.data,null,this.props.page,this.props.models);this.rootElement=n,window["".concat(this.props.id,"_root_element")]=this.rootElement,this.props.scrollPosition.top>0&&this.rootElement.children.forEach((function(e){e.lazySection=!1}));var a=this.rootElement.children;return a=a.filter((function(e){return!e.lazySection})),this.props.area.isCustomArea()&&(r=r.concat(this.props.area.getAreaClasses())),y.createElement("div",{className:r.join(" ")},y.createElement(this.rootElement.componentClass,{element:this.rootElement,children:a}))}}]),p}(y.Component),R=(0,m.connect)((function(e){return{scrollPosition:e.scrollPosition}}))(k),Z=r(38773),S=function(){function e(){(0,a.Z)(this,e),this.resource=new Z.Z({route:"/ajax/pages"})}var t;return(0,o.Z)(e,[{key:"loadPage",value:(t=(0,n.Z)(l().mark((function e(t){var r;return l().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(!_.isObject(window.pageStorage[t])){e.next=2;break}return e.abrupt("return",window.pageStorage[t]);case 2:return e.next=4,this.resource.get(t);case 4:return r=e.sent,window.pageStorage[t]=r,e.abrupt("return",r);case 7:case"end":return e.stop()}}),e,this)}))),function(e){return t.apply(this,arguments)})}]),e}();window.pageLoader=new S;var x=window.pageLoader,E=r(87977),P=r(1966),O=r(49981),D=r(71743),U=r(26553),j=r(46221),M=r(32869);function C(e,t){var r="undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(!r){if(Array.isArray(e)||(r=function(e,t){if(e){if("string"==typeof e)return A(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?A(e,t):void 0}}(e))||t&&e&&"number"==typeof e.length){r&&(e=r);var n=0,a=function(){};return{s:a,n:function(){return n>=e.length?{done:!0}:{done:!1,value:e[n++]}},e:function(e){throw e},f:a}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var o,c=!0,s=!1;return{s:function(){r=r.call(e)},n:function(){var e=r.next();return c=e.done,e},e:function(e){s=!0,o=e},f:function(){try{c||null==r.return||r.return()}finally{if(s)throw o}}}}function A(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}var F=window.altrpHelpers,T=F.Resource,B=F.isJSON,N=F.mbParseJSON,q=F.replaceContentWithData,W=function(e){(0,s.Z)(d,e);var t,r,c,p,f=(c=d,p=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,t=(0,u.Z)(c);if(p){var r=(0,u.Z)(this).constructor;e=Reflect.construct(t,arguments,r)}else e=t.apply(this,arguments);return(0,i.Z)(this,e)});function d(e){var t;return(0,a.Z)(this,d),(t=f.call(this,e)).onStoreUpdate=(0,n.Z)(l().mark((function e(){var r;return l().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(r=appStore.getState().formsStore,_.isEqual(t.getProperty("formsStore"),r)||!t.getProperty("updated")){e.next=5;break}return t.setProperty("formsStore",r),e.next=5,t.onFormsUpdate();case 5:case"end":return e.stop()}}),e)}))),t.setProperty("dataSourcesFormsDependent",[]),t.setProperty("formsStore",appStore.getState().formsStore),appStore.subscribe(t.onStoreUpdate),t}return(0,o.Z)(d,[{key:"updateCurrent",value:(r=(0,n.Z)(l().mark((function e(){var t,r,a,o,c,s,i=this,u=arguments;return l().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(t=u.length>0&&void 0!==u[0]?u[0]:null,r=!(u.length>1&&void 0!==u[1])||u[1],t=t.map((function(e){return e instanceof M.Z?e:new M.Z(e)})),!appStore.getState().currentUser.isEmpty()){e.next=9;break}return e.next=6,new T({route:"/ajax/current-user"}).getAll();case 6:a=(a=e.sent).data,appStore.dispatch((0,j.a2)(a));case 9:r||_.get(t,"length")||(t=this.getProperty("currentDataSources")),t||(t=[]),r&&(this.setProperty("currentDataSources",t),this.setProperty("updated",!1),t=t.filter((function(e){return e.getProperty("autoload")}))),t=t.filter((function(e){var t=e.getProperty("parameters");return!B(t)||!((t=N(t,[]))&&t.find((function(t){if(-1===t.paramValue.toString().indexOf("altrpforms."))return!1;var n=e.getParams(window.currentRouterMatch.data.params,"altrpforms.");if(r&&i.subscribeToFormsUpdate(e,n),!t.required)return!1;var a=t.paramValue||"";return-1!==a.indexOf("{{")&&(a=q(a)),!a})))})),o={},t.forEach((function(e){o[e.getProperty("priority")]=o[e.getProperty("priority")]||[],o[e.getProperty("priority")].push(e)})),r&&appStore.dispatch((0,U.PL)()),e.t0=l().keys(o);case 17:if((e.t1=e.t0()).done){e.next=31;break}if(c=e.t1.value,o.hasOwnProperty(c)){e.next=21;break}return e.abrupt("continue",17);case 21:return r&&appStore.dispatch((0,U.PL)()),s=o[c].map(function(){var e=(0,n.Z)(l().mark((function e(n){var a,o,c,s,u,p;return l().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(!n.getWebUrl()){e.next=46;break}if(a=n.getParams(window.currentRouterMatch.params,"altrpforms."),o=_.cloneDeep(a),c=!1,_.each(a,(function(e,t){0===e.toString().indexOf("altrpforms.")&&(a[t]=_.get(appStore.getState().formsStore,e.toString().replace("altrpforms.",""),""),c=!0)})),c&&r&&i.subscribeToFormsUpdate(n,_.cloneDeep(o)),s={},e.prev=7,!(u=_.get(window.altrpPreloadedDatasources,n.getAlias()))){e.next=14;break}s=u,_.unset(window.altrpPreloadedDatasources,n.getAlias()),e.next=32;break;case 14:if("show"!==n.getType()){e.next=22;break}if(!(p=_.get(a,"id",_.get(i.props,"match.params.id")))){e.next=20;break}return e.next=19,new T({route:n.getWebUrl()}).get(p);case 19:s=e.sent;case 20:e.next=32;break;case 22:if(_.isEmpty(a)){e.next=29;break}return e.next=25,new T({route:n.getWebUrl()}).getQueried(a);case 25:s=e.sent,n.params=_.cloneDeep(a),e.next=32;break;case 29:return e.next=31,new T({route:n.getWebUrl()}).getAll();case 31:s=e.sent;case 32:e.next=41;break;case 34:if(e.prev=34,e.t0=e.catch(7),!(e.t0 instanceof Promise)){e.next=40;break}return e.next=39,e.t0.then();case 39:e.t0=e.sent;case 40:console.error(e.t0);case 41:return s=_.get(s,"data",s),(t=t.filter((function(e){return e!==n}))).length||i.setProperty("updated",!0),appStore.dispatch((0,U.cC)(n.getAlias(),s)),e.abrupt("return",s);case 46:case"end":return e.stop()}}),e,null,[[7,34]])})));return function(t){return e.apply(this,arguments)}}()),console.log("Update Datasource Start: ",performance.now()),e.next=26,Promise.all(s);case 26:e.sent,console.log("Update Datasource End: ",performance.now()),r&&appStore.dispatch((0,U.vt)()),e.next=17;break;case 31:t.length||appStore.dispatch((0,U.vt)());case 32:case"end":return e.stop()}}),e,this)}))),function(){return r.apply(this,arguments)})},{key:"clearCurrent",value:function(){this.unsetProperty("currentDataSources"),this.setProperty("dataSourcesFormsDependent",[]),appStore.dispatch((0,U.qS)())}},{key:"subscribeToFormsUpdate",value:function(e,t){var r=this.getProperty("dataSourcesFormsDependent");-1===_.findIndex(r,(function(t){return t.dataSource===e}))&&r.push({dataSource:e,params:t})}},{key:"onFormsUpdate",value:(t=(0,n.Z)(l().mark((function e(){var t,r,n,a,o;return l().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:t=(t=this.getProperty("dataSourcesFormsDependent",[])).filter((function(e){var t=e.dataSource.getProperty("parameters");return!B(t)||!(t=N(t,[])).find((function(e){if(!e.required)return!1;var t=e.paramValue||"";return-1!==t.indexOf("{{")&&(t=q(t)),!t}))})),t=_.sortBy(t,(function(e){return e.priority})),r=appStore.getState().formsStore,n=C(t),e.prev=5,o=l().mark((function e(){var t,n,o,c,s,i;return l().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(t=a.value,n=t.dataSource,o=t.updating,c=_.cloneDeep(n.params),s=n.getParams(window.currentRouterMatch.params,"altrpforms."),_.forEach(s,(function(e,t){0===e.toString().indexOf("altrpforms.")&&(s[t]=_.get(r,e.replace("altrpforms.","")))})),_.isEqual(s,c)||o){e.next=52;break}return n.params=_.cloneDeep(s),t.updating=!0,i={},e.prev=10,e.next=13,new T({route:n.getWebUrl()}).getQueried(s);case 13:i=e.sent,i=_.get(i,"data",i),appStore.dispatch((0,U.cC)(n.getAlias(),i)),e.next=26;break;case 18:if(e.prev=18,e.t0=e.catch(10),!(e.t0 instanceof Promise)){e.next=25;break}return e.next=23,e.t0.then();case 23:e.t0=e.sent,e.t0=N(e.t0);case 25:console.error(e.t0);case 26:if(e.prev=26,void 0===t.pendingParameters||_.isEqual(t.pendingParameters,s)){e.next=48;break}return e.prev=28,e.next=31,new T({route:n.getWebUrl()}).getQueried(t.pendingParameters);case 31:i=e.sent,i=_.get(i,"data",i),appStore.dispatch((0,U.cC)(n.getAlias(),i)),n.params=_.cloneDeep(t.pendingParameters),e.next=45;break;case 37:if(e.prev=37,e.t1=e.catch(28),!(e.t1 instanceof Promise)){e.next=44;break}return e.next=42,e.t1.then();case 42:e.t1=e.sent,e.t1=N(e.t1);case 44:console.error(e.t1);case 45:return e.prev=45,_.unset(t,"pendingParameters"),e.finish(45);case 48:return t.updating=!1,e.finish(26);case 50:e.next=53;break;case 52:!_.isEqual(s,c)&&o&&(t.pendingParameters=_.cloneDeep(s));case 53:case"end":return e.stop()}}),e,null,[[10,18,26,50],[28,37,45,48]])})),n.s();case 8:if((a=n.n()).done){e.next=12;break}return e.delegateYield(o(),"t0",10);case 10:e.next=8;break;case 12:e.next=17;break;case 14:e.prev=14,e.t1=e.catch(5),n.e(e.t1);case 17:return e.prev=17,n.f(),e.finish(17);case 20:case"end":return e.stop()}}),e,this,[[5,14,17,20]])}))),function(){return t.apply(this,arguments)})}]),d}(AltrpModel);window.dataStorageUpdater=window.dataStorageUpdater||new W;var L=window.dataStorageUpdater,H=r(1196),I=r(15272),V=r(86817),z=r(99585),J=r(61113);function Q(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function G(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?Q(Object(r),!0).forEach((function(t){(0,w.Z)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):Q(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}"undefined"==typeof window&&({}.window.ssr=!0);var K=React.lazy((function(){return r.e(9499).then(r.bind(r,16070))})),X=function(e){(0,s.Z)(k,e);var t,r,p,d,m,w,y,b=(w=k,y=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,t=(0,u.Z)(w);if(y){var r=(0,u.Z)(this).constructor;e=Reflect.construct(t,arguments,r)}else e=t.apply(this,arguments);return(0,i.Z)(this,e)});function k(e){var t,r;(0,a.Z)(this,k);var n=(r=b.call(this,e)).props.title;return f.default.dispatch((0,z.x)(n)),r.state={areas:!0===window.ssr?r.props.areas.map((function(e){return E.Z.areaFactory(e)})):r.props.areas||[],admin:r.props.currentUser.hasRoles("admin")},r.scrollbar=React.createRef(),r.isReport=(null===(t=window.location)||void 0===t?void 0:t.href.includes("reports"))||!1,f.default.dispatch((0,H.L2)()),window.currentRouterMatch=new D.Z(e.match),window.currentPageId=e.id,window.currentRouteComponent=(0,c.Z)(r),window.altrpHistory=r.props.history,console.log("Route constructor: ",performance.now()),r.updateAppData(),r}return(0,o.Z)(k,[{key:"componentWillReceiveProps",value:(m=(0,n.Z)(l().mark((function e(t){return l().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(O.sJ.clear(),_.get(this.props,"model.modelName")===_.get(t,"model.modelName")&&_.get(this.props,"match.params.id")===_.get(t,"match.params.id")){e.next=5;break}return e.next=4,this.changeRouteCurrentModel(t);case 4:f.default.dispatch((0,J.qs)("url",location.href));case 5:_.isEqual(_.get(this.props,"match.params"),_.get(t,"match.params"))||this.updateAppData(),this.setState((function(e){return G(G({},e),{},{admin:t.currentUser.hasRoles("admin")})}));case 7:case"end":return e.stop()}}),e,this)}))),function(e){return m.apply(this,arguments)})},{key:"componentDidMount",value:(d=(0,n.Z)(l().mark((function e(){var t,r,n;return l().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(window.mainScrollbars=this.scrollbar.current,f.default.dispatch((0,J.qs)("url",location.href)),!this.props.lazy||!this.props.allowed){e.next=9;break}return e.next=5,x.loadPage(this.props.id);case 5:t=e.sent,r=t.areas.map((function(e){return E.Z.areaFactory(e)})),f.default.dispatch((0,v.t)(r)),this.setState((function(e){return G(G({},e),{},{areas:r})}));case 9:this.changeRouteCurrentModel(),f.default.dispatch((0,I.sG)()),window.formsManager.clearFieldsStorage(),console.log("Route Mounted: ",performance.now()),n=new Event("render-altrp"),window.dispatchEvent(n);case 15:case"end":return e.stop()}}),e,this)}))),function(){return d.apply(this,arguments)})},{key:"componentWillUnmount",value:function(){}},{key:"updateAppData",value:(p=(0,n.Z)(l().mark((function e(){var t;return l().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:L.clearCurrent(),window.formsManager&&formsManager.clearFormsStore(),t=this.props.data_sources,L.updateCurrent(t),f.default.dispatch((0,V.aH)());case 5:case"end":return e.stop()}}),e,this)}))),function(){return p.apply(this,arguments)})},{key:"changeRouteCurrentModel",value:(r=(0,n.Z)(l().mark((function e(t){var r,n,a;return l().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(!_.get(this.props,"model.modelName")||!_.get(this.props,"match.params.id")){e.next=17;break}return r=t||this.props,e.prev=2,e.next=5,new Z.Z({route:"/ajax/models/".concat(r.model.modelName)}).get(r.match.params.id);case 5:n=e.sent,a=f.default.getState().currentModel.getData(),n.altrpModelUpdated=!0,_.isEqual(n,a)||(f.default.dispatch((0,P.D)({altrpModelUpdated:!1})),f.default.dispatch((0,P.D)(n))),e.next=15;break;case 11:e.prev=11,e.t0=e.catch(2),console.error(e.t0),f.default.dispatch((0,P.D)({altrpModelUpdated:!0}));case 15:e.next=18;break;case 17:f.default.dispatch((0,P.D)({altrpModelUpdated:!0}));case 18:case"end":return e.stop()}}),e,this,[[2,11]])}))),function(e){return r.apply(this,arguments)})},{key:"componentDidUpdate",value:(t=(0,n.Z)(l().mark((function e(t){return l().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:_.isEqual(_.get(this.props,"match"),_.get(t,"match"))||(window.currentRouterMatch=new D.Z(this.props.match));case 1:case"end":return e.stop()}}),e,this)}))),function(e){return t.apply(this,arguments)})},{key:"render",value:function(){var e=this;return this.props.allowed?React.createElement(React.Fragment,null,React.createElement(Suspense,{fallback:React.createElement("div",null)},this.state.admin&&React.createElement(K,{areas:this.state.areas,data:this.props.currentUser.data,idPage:this.props.id})," "),React.createElement("div",{className:"route-content",id:"route-content"},this.state.areas.map((function(t,r){return React.createElement(R,(0,g.Z)({},t,{area:t,areas:e.state.areas,page:e.props.id,models:[e.props.model],key:"appArea_"+t.id}))})))):React.createElement(h.l_,{to:this.props.redirect||"/"})}}]),k}(Component),Y=(0,m.connect)((function(e){return{currentUser:e.currentUser}}))((0,h.EN)(X)),$=r(76593);var ee=function(e){(0,s.Z)(p,e);var t,r,n=(t=p,r=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,n=(0,u.Z)(t);if(r){var a=(0,u.Z)(this).constructor;e=Reflect.construct(n,arguments,a)}else e=n.apply(this,arguments);return(0,i.Z)(this,e)});function p(e){var t;return(0,a.Z)(this,p),(t=n.call(this,e)).state={baseEmailRender:window.baseEmailRender},t.emailTemplate=React.createRef(),window.emailTemplatesRenderer=(0,c.Z)(t),t}return(0,o.Z)(p,[{key:"render",value:function(){if(!this.props.currentEmailTemplate||!this.state.baseEmailRender)return null;var e=window.altrpHelpers.mbParseJSON(this.props.currentEmailTemplate.data);(e=window.frontElementsFabric.parseData(e)).templateType="email";var t=React.createElement(e.componentClass,{element:e,children:e.children,baseRender:this.state.baseEmailRender});return React.createElement("table",{id:"altrp-email-renderer",style:{width:"100%",display:"none"},ref:this.emailTemplate},React.createElement("tbody",null,React.createElement("tr",null,React.createElement("td",null,t))))}}]),p}(window.Component),te=window.reactRedux.connect((function(e){return{altrpresponses:e.altrpresponses,formsStore:e.formsStore,currentDataStorage:e.currentDataStorage,currentModel:e.currentModel,currentUser:e.currentUser,altrpMeta:e.altrpMeta,altrpPageState:e.altrpPageState,currentEmailTemplate:e.currentEmailTemplate}}))(ee),re=r(72337);var ne=function(e){(0,s.Z)(c,e);var t,r,n=(t=c,r=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,n=(0,u.Z)(t);if(r){var a=(0,u.Z)(this).constructor;e=Reflect.construct(n,arguments,a)}else e=n.apply(this,arguments);return(0,i.Z)(this,e)});function c(e){var t;return(0,a.Z)(this,c),(t=n.call(this,e)).mainScroller=React.createRef(),t.router=React.createRef(),t}return(0,o.Z)(c,[{key:"componentDidMount",value:function(){this.router.current&&(window.frontAppRouter=this.router.current),this.mainScroller.current&&this.mainScroller.current.addEventListener("scroll",(function(e){f.default.dispatch((0,re.y)({top:e.target.scrollTop}))}))}},{key:"render",value:function(){return React.createElement(d.VK,{ref:this.router},React.createElement(te,null),React.createElement("div",{ref:this.mainScroller,className:"front-app-content ".concat((0,$.isAltrpTestMode)()?"front-app-content_test":"")},React.createElement(h.rs,null,this.props.routes.map((function(e){return React.createElement(h.AW,{key:e.id,children:React.createElement(Y,e),path:e.path,exact:!0})})))),React.createElement(window.StylesComponent,null))}}]),c}(Component),ae=(0,m.connect)((function(e){return{routes:e.appRoutes.routes}}))(ne),oe=r(28481),ce=r(64593);function se(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function ie(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?se(Object(r),!0).forEach((function(t){(0,w.Z)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):se(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}var ue,pe=function(e){(0,s.Z)(f,e);var t,r,c,p=(r=f,c=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,t=(0,u.Z)(r);if(c){var n=(0,u.Z)(this).constructor;e=Reflect.construct(t,arguments,n)}else e=t.apply(this,arguments);return(0,i.Z)(this,e)});function f(e){var t;return(0,a.Z)(this,f),(t=p.call(this,e)).state={fonts:[]},t.helmetRef=React.createRef(),window.helmetRef=t.helmetRef,t}return(0,o.Z)(f,[{key:"componentDidMount",value:(t=(0,n.Z)(l().mark((function e(){return l().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,(0,$.delay)(1e3);case 2:this.setState((function(e){return ie(ie({},e),{},{renderFonts:!0})}));case 3:case"end":return e.stop()}}),e,this)}))),function(){return t.apply(this,arguments)})},{key:"componentDidUpdate",value:function(e,t){if(this.state.renderFonts){var r=new Set;_.toPairs(this.props.altrpFonts.getData()).forEach((function(e){var t=(0,oe.Z)(e,2),n=(t[0],t[1]);r.add(n)})),r=_.toArray(r),_.isEqual(r,this.state.fonts)||this.setState((function(e){return ie(ie({},e),{},{fonts:r})}))}}},{key:"render",value:function(){var e=this.state.fonts;return React.createElement(ce.q,{ref:this.helmetRef},e.map($.renderFontLink))}}]),f}(Component),le=window.reactRedux.connect((function(e){return{altrpFonts:e.altrpFonts}}))(pe),fe=r(84554),de=r(57865),he=r(17698),me=r(32465),ge=r(56911),we=r(6238),ve=r(50040),ye=r(65339),be=r(3030),ke=r(73783),Re=r(70226),Ze=r(21466),Se=r(74378),xe=r(4627),Ee=r(34399),Pe=r(95597),_e=r(5911),Oe=r(39070),De=r(7727),Ue=r(4314),je=r(78524),Me=r(37310),Ce=r(80610),Ae=r(14215),Fe=r(51469),Te=r(22873),Be=r(61007),Ne=r(29738),qe=r(45149),We=r(98936),Le=r(40660),He=r(86844),Ie=r(24033),Ve=r(78071),ze=r(94366),Je=r(21850),Qe=r(36653),Ge=r(73988),Ke=r(3670),Xe=r(2e4),Ye=r(93569),$e=r(64324),et=window.altrpHelpers.isEditor,tt=createGlobalStyle(ue||(ue=(0,me.Z)(["",""])),(function(e){var t=e.elementsSettings,r=e.areas,n="";r&&(n+=(0,Be.Z)(r));var a="altrp-element";return _.each(t,(function(e,t){if(e){switch(e.name){case"image-lightbox":n+=(0,He.Z)(e.settings,t);break;case"diagram":n+=".".concat(a).concat(t," {").concat((0,Le.Z)(e.settings),"}");break;case"tabs-switcher":n+=".".concat(a).concat(t," {").concat((0,We.Z)(e.settings),"}");break;case"button":n+=".".concat(a).concat(t," {").concat((0,xe.Z)(e.settings),"}");break;case"carousel":n+=".".concat(a).concat(t," {").concat((0,Ee.Z)(e.settings),"}");break;case"gallery":n+=".".concat(a).concat(t," {").concat((0,Pe.Z)(e.settings),"}");break;case"divider":n+=".".concat(a).concat(t," {").concat((0,_e.Z)(e.settings),"}");break;case"video":n+=".".concat(a).concat(t," {").concat((0,Oe.Z)(e.settings),"}");break;case"list":n+=".".concat(a).concat(t," {").concat((0,De.Z)(e.settings),"}");break;case"accordion":n+=".".concat(a).concat(t," {").concat((0,Te.Z)(e.settings),"}");break;case"section":case"section_widget":n+=".".concat(a).concat(t," {").concat((0,Me.Z)(e.settings,e.childrenLength||1),"}");break;case"column":n+=".".concat(a).concat(t," {").concat((0,Ce.Z)(e.settings),"}");break;case"dropbar":n+=".".concat(a).concat(t," {").concat((0,Ae.Z)(e.settings),"}");break;case"dashboard":n+=".".concat(a).concat(t," {").concat((0,Ue.Z)(e.settings),"}");break;case"image":n+=(0,ke.Z)(e.settings,t);break;case"tabs":n+=(0,Re.Z)(e.settings,t);break;case"menu":n+=(0,Ze.Z)(e.settings,t);break;case"breadcrumbs":n+=(0,Se.Z)(e.settings,t);break;case"heading":n+=(0,ge.e)(e.settings,t);break;case"heading-type-animating":n+=(0,we.o)(e.settings,t);break;case"text":n+=(0,ve.m)(e.settings,t);break;case"table":n+=(0,ye.V)(e.settings,t);break;case"posts":n+=(0,be.X)(e.settings,t);break;case"input-select2":n+=".".concat(a).concat(t," {").concat(Fe.Z.FormComponent(e.settings,t),"}"),n+="".concat(Fe.Z.select2Options(e.settings,t),"}");break;case"input-date":n+=(0,Ie.Z)(e.settings,t,a),n+="".concat((0,Ve.Z)(e.settings,t));break;case"input-checkbox":n+=".".concat(a).concat(t," {").concat((0,ze.Z)(e.settings,t),"}");break;case"input-slider":n+=".".concat(a).concat(t," {").concat((0,Ke.Z)(e.settings),"}");break;case"input-range-slider":n+=".".concat(a).concat(t," {").concat((0,$e.Z)(e.settings),"}");break;case"input-text-common":n+=".".concat(a).concat(t," {").concat((0,Je.Z)(e.settings,t),"}");break;case"input-select":n+=".".concat(a).concat(t," {").concat((0,Qe.Z)(e.settings,t),"}"),n+="".concat((0,Qe.N)(e.settings,t));break;case"input-radio":n+=(0,Ge.Z)(e.settings,t,a);break;case"input-text":case"input-password":case"input-number":case"input-email":case"input-tel":case"input-file":n+=".".concat(a).concat(t," {").concat((0,Xe.Z)(e.settings,t),"}");break;case"input-gallery":n+=".".concat(a).concat(t," {").concat((0,Ye.Z)(e.settings,t),"}");break;case"input-image-select":case"input-accept":case"input-textarea":case"input-wysiwyg":n+=".".concat(a).concat(t," {").concat(Fe.Z.FormComponent(e.settings,t),"}");break;case"map":n+=".".concat(a).concat(t," {").concat((0,Ne.Z)(e.settings),"}");break;case"map_builder":n+=".".concat(a).concat(t," {").concat((0,qe.Z)(e.settings),"}")}n+="div.".concat(a).concat(t,".").concat(a).concat(t," {").concat((0,je.Z)(e.settings),"}");var r=(0,$.getResponsiveSetting)(e.settings,"element_css_editor");_.isString(r)&&(n+=r.replace(/__selector__/g,"".concat(a).concat(t)))}})),n+="} ",window.globalDefaults&&(n+=window.globalDefaults.join("")),n})),rt=window.reactRedux.connect((function(e){return et()?{}:{elementsSettings:e.elementsSettings,areas:e.areas,currentScreen:e.currentScreen}}))(tt);e=r.hmd(e);var nt=window.altrpHelpers,at=(nt.getRoutes,nt.Resource),ot=function(e){(0,s.Z)(g,e);var t,p,d,h=(p=g,d=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,t=(0,u.Z)(p);if(d){var r=(0,u.Z)(this).constructor;e=Reflect.construct(t,arguments,r)}else e=t.apply(this,arguments);return(0,i.Z)(this,e)});function g(e){var t;return(0,a.Z)(this,g),t=h.call(this,e),window.frontApp=(0,c.Z)(t),t.getRoutes(),console.log("FRONT APP: ",performance.now()),t}return(0,o.Z)(g,[{key:"getRoutes",value:function(){var e=this;return window.altrpHelpers.getRoutes().then((function(t){e.routes=t.default}))}},{key:"onWidgetMount",value:function(){console.log(performance.now())}},{key:"componentDidMount",value:(t=(0,n.Z)(l().mark((function e(){var t,n,a,o,c,s,i,u,p,d;return l().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return new at({route:"/ajax/"}).get("current-user").then((function(e){_.isEqual(f.default.getState().currentUser.getData(),e.data)||f.default.dispatch((0,j.a2)(e.data))})),e.next=3,new at({route:"/admin/ajax/settings"}).get("pusher_app_key");case 3:return o=e.sent,e.next=6,new at({route:"/admin/ajax/settings"}).get("websockets_port");case 6:return c=e.sent,e.next=9,new at({route:"/admin/ajax/settings"}).get("pusher_host");case 9:if(s=e.sent,o=null===(t=o)||void 0===t?void 0:t.pusher_app_key,c=null===(n=c)||void 0===n?void 0:n.websockets_port,s=null===(a=s)||void 0===a?void 0:a.pusher_host,o&&c){try{window.Pusher=r(86606),window.Echo=new fe.Z({broadcaster:"pusher",key:o,wsHost:s,wsPort:c,forceTLS:!1,disableStats:!0})}catch(e){console.error(e)}i=f.default.getState(),u=i.currentUser,window.Echo.private("App.User."+u.id).notification((function(e){f.default.dispatch((0,j.jk)(e)),console.log(f.default.getState().currentUser,"STORE NOTICE")})),p=window.Echo.join("online"),d=[],p.here((function(e){d=e,f.default.dispatch((0,j.Br)(d))})).joining((function(e){d.push(e),f.default.dispatch((0,j.Br)(d))})).leaving((function(e){d.splice(d.indexOf(e),1),f.default.dispatch((0,j.Br)(d))}))}else console.log("Вебсокеты выключены");case 14:case"end":return e.stop()}}),e)}))),function(){return t.apply(this,arguments)})},{key:"render",value:function(){return React.createElement(m.Provider,{store:f.default},React.createElement(he.W,{backend:de.PD},React.createElement(ae,null)),React.createElement(le,null),React.createElement(rt,null))}}]),g}(Component),ct=window.__hot(e)(ot)}}]);
//# sourceMappingURL=FrontApp.01c762d3f870a1ac099f.bundle.js.map