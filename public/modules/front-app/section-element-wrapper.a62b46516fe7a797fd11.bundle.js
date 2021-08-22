(self.webpackChunk=self.webpackChunk||[]).push([[2305],{71743:function(e,t,n){"use strict";var r=n(6610),a=n(5991),o=n(83465),i=n.n(o),s=n(29208),p=n.n(s),l=n(31468),c=n.n(l),u=n(38394),d=n.n(u),g=n(96633),h=n.n(g),m=n(99245),f=n.n(m),S=function(){function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};(0,r.Z)(this,e),this.data=i()(t)}return(0,a.Z)(e,[{key:"getData",value:function(){var e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0];return e?i()(this.data):this.data}},{key:"isEmpty",value:function(){return f()(this.data)}},{key:"getProperty",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";return p()(this.data,e,t)}},{key:"hasProperty",value:function(e){return d()(this.data,e)}},{key:"setProperty",value:function(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";return n instanceof e&&(n=n.getData(!1)),c()(this.data,t,n)}},{key:"unsetProperty",value:function(e){return h()(this.data,e)}}]),e}();window.AltrpModel=S,t.Z=S},11914:function(e,t,n){"use strict";n.r(t),n.d(t,{default:function(){return Z}});var r,a=n(22122),o=n(96156),i=n(6610),s=n(5991),p=n(63349),l=n(10379),c=n(46070),u=n(77608),d=n(5977),g=n(1196),h=n(16455),m=n(61113),f=n(32465),S=n(76593),y=styled.div(r||(r=(0,f.Z)(["",""])),(function(e){var t=e.settings,n="";n+="&.altrp-column{";var r=(0,S.getResponsiveSetting)(t,"layout_column_width");return r&&(Number(r)?n+="width:".concat(r,"%;"):n+="width:".concat(r,";")),n+"}"})),v=n(90628),w=["input","input-select","input-select2","input-radio","input-checkbox","input-wysiwyg","input-textarea","input-slider","input-image-select","input-accept","input-text","input-text-common","input-password","input-number","input-tel","input-email","input-date","input-hidden","input-file","input-gallery","breadcrumbs","map","map_builder","menu","diagram","input","nav","dashboards","tour","icon","export","template","gallery","dropbar","posts","table","tabs","heading-type-animating"];function D(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function E(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?D(Object(n),!0).forEach((function(t){(0,o.Z)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):D(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}var R,b=window.altrpHelpers,k=b.altrpCompare,M=b.altrpRandomId,C=b.conditionsChecker,P=b.isEditor,O=b.replaceContentWithData,I=b.setTitle,N=function(e){(0,l.Z)(o,e);var t,n,r=(t=o,n=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,r=(0,u.Z)(t);if(n){var a=(0,u.Z)(this).constructor;e=Reflect.construct(r,arguments,a)}else e=r.apply(this,arguments);return(0,c.Z)(this,e)});function o(e){var t;return(0,i.Z)(this,o),(t=r.call(this,e)).updateStore=function(){t.state.currentModel!==appStore.getState().currentModel&&t.setState((function(e){return E(E({},e),{},{currentModel:appStore.getState().currentModel})})),t.state.currentUser!==appStore.getState().currentUser&&t.setState((function(e){return E(E({},e),{},{currentModel:appStore.getState().currentUser})})),t.state.currentDataStorage!==appStore.getState().currentDataStorage&&t.setState((function(e){return E(E({},e),{},{currentDataStorage:appStore.getState().currentDataStorage})}))},t.state={elementDisplay:!t.props.element.getSettings("default_hidden")},t.reactElement=t.props.element.getSettings("react_element"),t.elementId=t.props.element.getId(),t.settings=t.props.element.getSettings(),e.element.wrapper=(0,p.Z)(t),t.elementWrapperRef=React.createRef(),t.elementRef=React.createRef(),P()||appStore.dispatch((0,g.MN)((0,p.Z)(t))),t}return(0,s.Z)(o,[{key:"componentDidCatch",value:function(e,t){this.setState((function(n){return E(E({},n),{},{error:e,errorInfo:t})}))}},{key:"componentDidMount",value:function(){var e,t;!P()&&(null===(e=window)||void 0===e||null===(t=e.frontApp)||void 0===t||t.onWidgetMount()),_.isFunction(this.props.element.update)&&(this.props.element.update(),this.props.element.updateFonts()),this.checkElementDisplay()}},{key:"getStylesHTMLElement",value:function(){return _.get(window,"stylesModule.stylesContainer.current")&&window.stylesModule.stylesContainer.current.getElementsByClassName("altrp-styles".concat(this.props.element.getId()))[0]||null}},{key:"componentDidUpdate",value:function(e,t){if(this.checkElementDisplay(),appStore.getState().currentModel.getProperty("altrpModelUpdated")&&appStore.getState().currentDataStorage.getProperty("currentDataStorageLoaded")&&!P()&&"section"===this.props.element.getName()){var n=appStore.getState().currentTitle;n=O(n),appStore.getState().altrpPage.getProperty("title")!==n&&appStore.dispatch((0,m.qs)("title",n)),I(n)}}},{key:"updateElement",value:function(){this.setState((function(e){return E(E({},e),{},{updateToken:M()})}))}},{key:"checkElementDisplay",value:function(e,t){var n=this.props.element;if(n.getSettings("conditional_other")){var r=n.getSettings("conditions",[]);r=r.map((function(e){return{modelField:e.conditional_model_field,operator:e.conditional_other_operator,value:e.conditional_other_condition_value}}));var a=C(r,"AND"===n.getSettings("conditional_other_display"),this.props.element.getCurrentModel(),!0);this.state.elementDisplay!==a&&this.setState((function(e){return E(E({},e),{},{elementDisplay:a})}))}}},{key:"toggleElementDisplay",value:function(){this.setState((function(e){return E(E({},e),{},{elementDisplay:!e.elementDisplay})}))}},{key:"inputIsDisplay",value:function(){var e=this.state.formsStore,t=this.props.element.getSettings("form_id",""),n=this.props.element.getSettings("form_condition_display_on","AND"),r=this.props.element.getSettings("form_conditions",[]),a=!0;return r.forEach((function(r){"AND"===n?a*=k(_.get(e,"".concat(t,".").concat(r.field_id)),r.value,r.operator):a+=k(_.get(e,"".concat(t,".").concat(r.field_id)),r.value,r.operator)})),a}},{key:"render",value:function(){var e=this.props.element,t=e.settings,n=t.hide_on_wide_screen,r=t.hide_on_desktop,o=t.hide_on_laptop,i=t.hide_on_tablet,s=t.hide_on_big_phone,p=t.hide_on_small_phone,l=(t.hide_on_trigger,t.isFixed),c=t.tooltip_position,u=e.settings.tooltip_text,d="altrp-element altrp-element".concat(e.getId()," altrp-element_").concat(e.getType());if(d+=e.getPrefixClasses()+" ","widget"===e.getType()&&(d+=" altrp-widget_".concat(e.getName())),this.props.element.getResponsiveSetting("css_class")&&(d+=" ".concat(O(this.props.element.getResponsiveSetting("css_class"),this.props.element.getCurrentModel().getData())," ")),n&&(d+=" hide_on_wide_screen"),r&&(d+=" hide_on_desktop"),o&&(d+=" hide_on_laptop"),i&&(d+=" hide_on_tablet"),s&&(d+=" hide_on_big_phone"),p&&(d+=" hide_on_small_phone"),l&&(d+=" fixed-section"),this.state.errorInfo)return React.createElement("div",{className:"altrp-error","data-eltype":e.getType()},React.createElement("h2",null,"Something went wrong."),React.createElement("details",{style:{whiteSpace:"pre-wrap"}},this.state.error&&this.state.error.toString(),React.createElement("br",null),this.state.errorInfo.componentStack));var g={};e.getResponsiveSetting("layout_column_width")&&(Number(e.getResponsiveSetting("layout_column_width"))?g.width=e.getResponsiveSetting("layout_column_width")+"%":g.width=e.getResponsiveSetting("layout_column_width")),this.state.elementDisplay||(g.display="none");var m=e.getSettings("advanced_element_id","");m=O(m,e.getCurrentModel().getData()),this.CSSId!==m&&(this.CSSId=m);var f=frontElementsManager.getComponentClass(e.getName()),S=React.createElement(f,{ref:this.elementRef,rootElement:this.props.rootElement,ElementWrapper:this.props.ElementWrapper,element:e,children:e.getChildren(),match:this.props.match,currentModel:this.props.currentModel,currentUser:this.props.currentUser,currentDataStorage:this.props.currentDataStorage,altrpresponses:this.props.altrpresponses,formsStore:this.props.formsStore,elementDisplay:this.state.elementDisplay,altrpPageState:this.props.altrpPageState,altrpMeta:this.props.altrpMeta,updateToken:this.state.updateToken,currentScreen:this.props.currentScreen,baseRender:this.props.baseRender,history:this.props.history,appStore:appStore});if("email"===e.getTemplateType())return this.state.elementDisplay?React.createElement(React.Fragment,null,S):null;var D=y;switch(e.getName()){case"nav":D=v.Z}u=O(u,e.getCurrentModel().getData());var E={className:d,ref:this.elementWrapperRef,elementId:this.elementId,settings:this.settings,style:g,id:this.CSSId};return(this.reactElement||-1!==w.indexOf(e.getName()))&&(E["data-react-element"]=e.getId()),_.isEmpty(e.getResponsiveSetting("wrapper_click_actions"))||(E["data-altrp-wrapper-click-actions"]=e.getId()),E["data-altrp-id"]=e.getId(),React.createElement(D,(0,a.Z)({},E,{element:e.getId()}),S,u&&React.createElement(h.Z,{position:c},u))}}]),o}(Component);R=window["h-altrp"]?N:(0,d.EN)(N);var Z=window.reactRedux.connect((function(e){return{altrpresponses:e.altrpresponses,formsStore:e.formsStore,currentDataStorage:e.currentDataStorage,currentModel:e.currentModel,currentUser:e.currentUser,altrpMeta:e.altrpMeta,altrpPageState:e.altrpPageState,currentScreen:e.currentScreen}}),null,null,{forwardRef:!0})(R)},44689:function(e,t,n){"use strict";n.r(t);var r=n(11914);window.SectionElementWrapper=r.default},1196:function(e,t,n){"use strict";n.d(t,{FQ:function(){return r},ME:function(){return a},MN:function(){return o},L2:function(){return i}});var r="ADD_ELEMENT",a="CLEAR_ELEMENTS";function o(e){return{type:r,elementComponent:e}}function i(){return{type:a}}}}]);
//# sourceMappingURL=section-element-wrapper.a62b46516fe7a797fd11.bundle.js.map