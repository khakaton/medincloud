(self.webpackChunk=self.webpackChunk||[]).push([[3401],{4314:function(t,e,r){"use strict";r.d(e,{Z:function(){return s}});var o=r(85061),n=r(76593),a=r(32360);function s(t){var e=(0,o.Z)(function(t){var e=function(){var e=(0,n.getResponsiveSetting)(t,"style_font_typographic");if(e&&e.family&&_.isString(e.family))return'font-family: "'.concat(e.family,'" sans-serif !important;')};return["altrp-dashboard__card--background",["background-color","style_background_color","color","",!0],"}","altrp-dashboard__card--settings-tooltip-background",["background-color","style_settings_tooltip_background_color","color","",!0],"}","altrp-dashboard__card--settings-tooltip-icon-background",["background-color","style_settings_tooltip_icon_background_color","color","",!0],"}","altrp-dashboard__card--border-color",["border-color","style_border_color","color"],"}","altrp-dashboard__card--border-style",["border-style","style_border_style"],"}","altrp-dashboard__card--border",["border-width","style_border_width","slider"],"}","altrp-dashboard__card--border-radius",["border-radius","style_border_radius","slider"],"}","altrp-dashboard__card--font",["border-style","border_type_card"],["border-width","border_width_card","dimensions"],["border-color","altrp-dashboard__card--font","color"],["border-radius","border_radius_card","dimensions"],["","style_background_shadow","shadow"],e(),"& text",e(),"}","}","altrp-dashboard__card--font-color",["color","style_font_color","color"],"}","altrp-dashboard__card--font-size",["font-size","style_font_size","slider"],"}","altrp-dashboard__card--font-weight",["font-weight","style_font_weight","slider"],"}","altrp-dashboard__tooltip--label-background",["margin","style_margin_tooltip","dimensions"],["background-color","style_background_color_tooltip","color","",!0],["","style_background_tooltip_shadow","shadow"],["border-style","border_type_tooltip"],["border-width","border_width_tooltip","dimensions"],["border-color","border_color_tooltip","color"],"}","altrp-dashboard__tooltip--font",["padding","style_padding_tooltip","dimensions"],["","style_font_tooltip","typographic"],["color","style_font_color_tooltip","color"],"}"]}(t));return(0,a.styledString)(e,t)}},40660:function(t,e,r){"use strict";r.d(e,{Z:function(){return n}}),r(76593);var o=r(32360);function n(t){return(0,o.styledString)(["altrp-dashboard__tooltip--margin",["margin","style_margin_tooltip","dimensions"],["padding","style_padding_tooltip","dimensions"],"}","altrp-dashboard__tooltip--width",["padding-top","style_width_tooltip"],"}","altrp-dashboard__tooltip--font",["","style_font_tooltip","typographic"],"}","altrp-dashboard__tooltip--font-color",["color","style_font_color_tooltip","color"],"}","altrp-dashboard__tooltip--label-background",["background-color","style_background_color_tooltip","color"],"}","altrp-dashboard__tooltip--label-background-shadow",["background-color","style_background_tooltip_shadow","shadow"],"}","altrp-dashboard__tooltip--border-type",["border-style","border_type_tooltip"],"}","altrp-dashboard__tooltip--border-width",["border-width","border_width_tooltip","dimensions"],"}","altrp-dashboard__tooltip--border-color",["border-color","border_color_tooltip","color"],"}","altrp-diagram",["width","width","slider"],["height","height","slider"],"}","altrp-btn",["margin","margin","dimensions"],"}"],t)}},62537:function(t,e,r){"use strict";r.r(e);var o=r(96156),n=r(6610),a=r(5991),s=r(63349),l=r(10379),i=r(46070),p=r(77608),d=r(1196),c=r(61113),u=r(16455),h=r(90628),g=r(40660),m=r(4314),f=r(57865),y=r(17698);function b(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(t);e&&(o=o.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,o)}return r}function S(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?b(Object(r),!0).forEach((function(e){(0,o.Z)(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):b(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}var w=function(t){(0,l.Z)(b,t);var e,r,o=(e=b,r=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(t){return!1}}(),function(){var t,o=(0,p.Z)(e);if(r){var n=(0,p.Z)(this).constructor;t=Reflect.construct(o,arguments,n)}else t=o.apply(this,arguments);return(0,i.Z)(this,t)});function b(t){var e;return(0,n.Z)(this,b),(e=o.call(this,t)).updateStore=function(){e.state.currentModel!==appStore.getState().currentModel&&e.setState((function(t){return S(S({},t),{},{currentModel:appStore.getState().currentModel})})),e.state.currentUser!==appStore.getState().currentUser&&e.setState((function(t){return S(S({},t),{},{currentModel:appStore.getState().currentUser})})),e.state.currentDataStorage!==appStore.getState().currentDataStorage&&e.setState((function(t){return S(S({},t),{},{currentDataStorage:appStore.getState().currentDataStorage})}))},e.state={elementDisplay:!e.props.element.getSettings("default_hidden")},t.element.wrapper=(0,s.Z)(e),e.elementWrapperRef=e.props.elementWrapperRef,e.elementRef=React.createRef(),e.settings=t.element.getSettings(),appStore.dispatch((0,d.MN)((0,s.Z)(e))),e}return(0,a.Z)(b,[{key:"componentDidCatch",value:function(t,e){this.setState((function(r){return S(S({},r),{},{error:t,errorInfo:e})}))}},{key:"componentDidMount",value:function(){var t,e;!window.altrpHelpers.isEditor()&&(null===(t=window)||void 0===t||null===(e=t.frontApp)||void 0===e||e.onWidgetMount()),_.isFunction(this.props.element.update)&&(this.props.element.update(),this.props.element.updateFonts()),this.checkElementDisplay()}},{key:"getStylesHTMLElement",value:function(){return _.get(window,"stylesModule.stylesContainer.current")&&window.stylesModule.stylesContainer.current.getElementsByClassName("altrp-styles".concat(this.props.element.getId()))[0]||null}},{key:"componentDidUpdate",value:function(t,e){if(this.checkElementDisplay(),appStore.getState().currentModel.getProperty("altrpModelUpdated")&&appStore.getState().currentDataStorage.getProperty("currentDataStorageLoaded")&&!window.altrpHelpers.isEditor()&&"section"===this.props.element.getName()){var r=appStore.getState().currentTitle;r=window.altrpHelpers.replaceContentWithData(r),appStore.getState().altrpPage.getProperty("title")!==r&&appStore.dispatch((0,c.qs)("title",r)),window.altrpHelpers.setTitle(r)}}},{key:"updateElement",value:function(){this.setState((function(t){return S(S({},t),{},{updateToken:window.altrpHelpers.altrpRandomId()})}))}},{key:"checkElementDisplay",value:function(t,e){var r=this.props.element;if(r.getSettings("conditional_other")){var o=r.getSettings("conditions",[]);o=o.map((function(t){return{modelField:t.conditional_model_field,operator:t.conditional_other_operator,value:t.conditional_other_condition_value}}));var n=window.altrpHelpers.conditionsChecker(o,"AND"===r.getSettings("conditional_other_display"),this.props.element.getCurrentModel(),!0);this.state.elementDisplay!==n&&this.setState((function(t){return S(S({},t),{},{elementDisplay:n})}))}}},{key:"toggleElementDisplay",value:function(){this.setState((function(t){return S(S({},t),{},{elementDisplay:!t.elementDisplay})}))}},{key:"inputIsDisplay",value:function(){var t=this.state.formsStore,e=this.props.element.getSettings("form_id",""),r=this.props.element.getSettings("form_condition_display_on","AND"),o=this.props.element.getSettings("form_conditions",[]),n=!0;return o.forEach((function(o){"AND"===r?n*=window.altrpHelpers.altrpCompare(_.get(t,"".concat(e,".").concat(o.field_id)),o.value,o.operator):n+=window.altrpHelpers.altrpCompare(_.get(t,"".concat(e,".").concat(o.field_id)),o.value,o.operator)})),n}},{key:"render",value:function(){var t=this.props.element.settings,e=t.hide_on_trigger,r=t.tooltip_position,o=this.props.element.settings.tooltip_text;if(this.state.errorInfo)return React.createElement("div",{className:"altrp-error","data-eltype":this.props.element.getType()},React.createElement("h2",null,"Something went wrong."),React.createElement("details",{style:{whiteSpace:"pre-wrap"}},this.state.error&&this.state.error.toString(),React.createElement("br",null),this.state.errorInfo.componentStack));var n={};this.props.element.getResponsiveSetting("layout_column_width")&&(Number(this.props.element.getResponsiveSetting("layout_column_width"))?n.width=this.props.element.getResponsiveSetting("layout_column_width")+"%":n.width=this.props.element.getResponsiveSetting("layout_column_width")),this.state.elementDisplay||(n.display="none");var a=this.props.element.getSettings("advanced_element_id","");a=window.altrpHelpers.replaceContentWithData(a,this.props.element.getCurrentModel().getData()),this.CSSId!==a&&(this.CSSId=a);var s=frontElementsManager.getComponentClass(this.props.element.getName()),l=React.createElement(s,{ref:this.elementRef,rootElement:this.props.rootElement,ElementWrapper:this.props.ElementWrapper,element:this.props.element,children:this.props.element.getChildren(),match:this.props.match,currentModel:this.props.currentModel,currentUser:this.props.currentUser,currentDataStorage:this.props.currentDataStorage,altrpresponses:this.props.altrpresponses,formsStore:this.props.formsStore,elementDisplay:this.state.elementDisplay,altrpPageState:this.props.altrpPageState,altrpMeta:this.props.altrpMeta,updateToken:this.state.updateToken,currentScreen:this.props.currentScreen,baseRender:this.props.baseRender,history:this.props.history,appStore:appStore});"table"===this.props.element.getName()&&(l=React.createElement(y.W,{backend:f.PD},l));var i=React.Fragment;switch(this.props.element.getName()){case"diagram":i=g.Z;break;case"dashboards":i=m.Z;break;case"nav":i=h.Z}o=window.altrpHelpers.replaceContentWithData(o,this.props.element.getCurrentModel().getData());var p={elementId:this.elementId,settings:this.settings,styles:n};return i===React.Fragment&&(delete p.elementId,delete p.settings,delete p.styles,this.state.elementDisplay?this.elementWrapperRef.current.style.display=null:this.elementWrapperRef.current.style.display="none"),this.props.hideTriggers.includes(e)?null:React.createElement(i,p,l,o&&React.createElement(u.Z,{position:r},o))}}]),b}(Component);e.default=window.reactRedux.connect((function(t){return{hideTriggers:t.hideTriggers,altrpresponses:t.altrpresponses,formsStore:t.formsStore,currentDataStorage:t.currentDataStorage,currentModel:t.currentModel,currentUser:t.currentUser,altrpMeta:t.altrpMeta,altrpPageState:t.altrpPageState,currentScreen:t.currentScreen}}))(w)},1196:function(t,e,r){"use strict";r.d(e,{FQ:function(){return o},ME:function(){return n},MN:function(){return a}});var o="ADD_ELEMENT",n="CLEAR_ELEMENTS";function a(t){return{type:o,elementComponent:t}}}}]);
//# sourceMappingURL=SimpleElementWrapper.c39d73f5290119c42959.bundle.js.map