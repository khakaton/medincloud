(self.webpackChunk=self.webpackChunk||[]).push([[3510],{71743:function(t,e,n){"use strict";var r=n(6610),a=n(5991),i=n(83465),o=n.n(i),l=n(29208),u=n.n(l),c=n(31468),s=n.n(c),d=n(38394),f=n.n(d),v=n(96633),p=n.n(v),g=n(99245),h=n.n(g),y=function(){function t(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};(0,r.Z)(this,t),this.data=o()(e)}return(0,a.Z)(t,[{key:"getData",value:function(){var t=!(arguments.length>0&&void 0!==arguments[0])||arguments[0];return t?o()(this.data):this.data}},{key:"isEmpty",value:function(){return h()(this.data)}},{key:"getProperty",value:function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";return u()(this.data,t,e)}},{key:"hasProperty",value:function(t){return f()(this.data,t)}},{key:"setProperty",value:function(e){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";return n instanceof t&&(n=n.getData(!1)),s()(this.data,e,n)}},{key:"unsetProperty",value:function(t){return p()(this.data,t)}}]),t}();window.AltrpModel=y,e.Z=y},96984:function(t,e,n){"use strict";n.r(e),n.d(e,{default:function(){return f}});var r=n(67576);function a(t,e){var n="undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(!n){if(Array.isArray(t)||(n=function(t,e){if(t){if("string"==typeof t)return i(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);return"Object"===n&&t.constructor&&(n=t.constructor.name),"Map"===n||"Set"===n?Array.from(t):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?i(t,e):void 0}}(t))||e&&t&&"number"==typeof t.length){n&&(t=n);var r=0,a=function(){};return{s:a,n:function(){return r>=t.length?{done:!0}:{done:!1,value:t[r++]}},e:function(t){throw t},f:a}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var o,l=!0,u=!1;return{s:function(){n=n.call(t)},n:function(){var t=n.next();return l=t.done,t},e:function(t){u=!0,o=t},f:function(){try{l||null==n.return||n.return()}finally{if(u)throw o}}}}function i(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=new Array(e);n<e;n++)r[n]=t[n];return r}function o(t){var e,n,i=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},o=null,c=appStore.getState().elements;if(null!==(e=o=c.find((function(e){return e.props.element.getId()===t&&u(e.props.element,i)}))||o)&&void 0!==e&&null!==(n=e.props)&&void 0!==n&&n.element)return o.props.element;var s,d=a(page_areas);try{for(d.s();!(s=d.n()).done;){var f,v=s.value;if(o=l(null==v||null===(f=v.template)||void 0===f?void 0:f.data,t,i))return o instanceof r.Z||(o=new r.Z(o,!0)),o}}catch(t){d.e(t)}finally{d.f()}return o instanceof r.Z||(o=new r.Z(o)),o}function l(t,e){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};if(null==t||!t.id)return null;if(t.id===e&&u(t,n))return t;if(null!=t&&t.children){var r,i=a(t.children);try{for(i.s();!(r=i.n()).done;){var o=r.value;if(o.id===e&&u(o,n))return o;var c=l(o,e,n);if(c)return c}}catch(t){i.e(t)}finally{i.f()}}return null}function u(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=!1;return _.isEmpty(e.settings)||!_.isArray(e.settings)?!n:(!t instanceof r.Z&&(t=new r.Z(t,!0)),n=e.settings.find((function(e){var n=t.getSettings(null==e?void 0:e.settingName);return(null==e?void 0:e.checks.length)===(null==e?void 0:e.checks.filter((function(t){return _.isFunction(t)&&t(n)})))})))}var c=n(55877),s=[],d=window.altrp.ACTIONS_CACHE=window.altrp.ACTIONS_CACHE||{};function f(t){var e=t.target;if(!(s.indexOf(t.target.tagName.toLowerCase())>=0)){var r,a;if(t.target.dataset.elementUuid&&_.get(d,"clickActions.".concat(t.target.dataset.elementUuid)))r=_.get(d,"clickActions.".concat(t.target.dataset.elementUuid,".actions")),a=_.get(d,"clickActions.".concat(t.target.dataset.elementUuid,".element"));else for(;e=null===(i=e)||void 0===i?void 0:i.closest("[data-altrp-wrapper-click-actions]");){var i,l,u,f=o(null===(l=e)||void 0===l||null===(u=l.dataset)||void 0===u?void 0:u.altrpWrapperClickActions);if(f&&!_.isEmpty(f.getSettings("wrapper_click_actions"))){r=f.getSettings("wrapper_click_actions"),a=f,t.target.dataset.elementUuid=(0,c.v4)(),_.set(d,"clickActions.".concat(t.target.dataset.elementUuid),{actions:r,element:a});break}e=e.parentElement}r&&(t.preventDefault(),Promise.all([n.e(4079),n.e(6593),n.e(2167),n.e(6737)]).then(n.bind(n,2167)).then((function(){window.actionsManager.callAllWidgetActions(a.getIdForAction(),"wrapper_click_actions",r,a)})))}}}}]);
//# sourceMappingURL=click-actions.9667e1d5bb8c8a61d404.bundle.js.map