(self.webpackChunk=self.webpackChunk||[]).push([[3905],{71743:function(e,t,r){"use strict";var s=r(6610),a=r(5991),o=r(83465),n=r.n(o),i=r(29208),l=r.n(i),c=r(31468),u=r.n(c),p=r(38394),d=r.n(p),h=r(96633),m=r.n(h),g=r(99245),f=r.n(g),v=function(){function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};(0,s.Z)(this,e),this.data=n()(t)}return(0,a.Z)(e,[{key:"getData",value:function(){var e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0];return e?n()(this.data):this.data}},{key:"isEmpty",value:function(){return f()(this.data)}},{key:"getProperty",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";return l()(this.data,e,t)}},{key:"hasProperty",value:function(e){return d()(this.data,e)}},{key:"setProperty",value:function(t){var r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";return r instanceof e&&(r=r.getData(!1)),u()(this.data,t,r)}},{key:"unsetProperty",value:function(e){return m()(this.data,e)}}]),e}();window.AltrpModel=v,t.Z=v},6423:function(e,t,r){"use strict";r.r(t),r.d(t,{default:function(){return T}});var s,a=r(22122),o=r(85061),n=r(96156),i=r(6610),l=r(5991),c=r(63349),u=r(10379),p=r(46070),d=r(77608),h=r(67294),m=r(46066),g=r(49e3),f=r(76593),v=r(32465),y=r(71893),b=r(32360),k=y.ZP.div(s||(s=(0,v.Z)(["\n& .altrp-carousel-slide{\n","\n}\n& .slick-current .altrp-carousel-slide{\n","\n}"])),(function(e){var t="",r=e.settings,s=r.border_color_slides_style,a=r.border_width_slides_style,o=r.border_type_slide;return s&&(t+="border-color:".concat(s.color,";")),o&&(t+="border-style:".concat(o,";")),a&&(t+=(0,b.borderWidthStyled)(a)),t}),(function(e){var t="",r=e.settings,s=(0,f.getResponsiveSetting)(r,"border_color_slides_style",".active"),a=(0,f.getResponsiveSetting)(r,"border_width_slides_style",".active"),o=(0,f.getResponsiveSetting)(r,"border_type_slide",".active");return s&&(t+="border-color:".concat(s.color,";")),o&&(t+="border-style:".concat(o,";")),a&&(t+=(0,b.borderWidthStyled)(a)),t}));function w(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(e);t&&(s=s.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,s)}return r}function S(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?w(Object(r),!0).forEach((function(t){(0,n.Z)(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):w(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}var E=function(e){return h.createElement("svg",e,h.createElement("path",{fill:"none",stroke:"#000",strokeWidth:"1.03",d:"M13 16l-6-6 6-6"}))};E.defaultProps={width:"38",height:"38",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},r.e(3473).then(r.bind(r,63473)),r.e(4853).then(r.bind(r,34853)),r.e(8071).then(r.bind(r,88071));var N=window.altrpHelpers.TemplateLoader,T=function(e){(0,u.Z)(n,e);var t,r,s=(t=n,r=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,s=(0,d.Z)(t);if(r){var a=(0,d.Z)(this).constructor;e=Reflect.construct(s,arguments,a)}else e=s.apply(this,arguments);return(0,p.Z)(this,e)});function n(e){var t;return(0,i.Z)(this,n),(t=s.call(this,e)).next=t.next.bind((0,c.Z)(t)),t.previous=t.previous.bind((0,c.Z)(t)),t.state={activeSlide:0,openLightBox:!1,sliderImages:[]},t}return(0,l.Z)(n,[{key:"componentDidMount",value:function(){var e=this;this.props.slides_repeater.forEach((function(t){e.setState((function(e){var r=S({},t.image_slides_repeater)||{};return r.url=r.url||"/img/nullImage.png",e.sliderImages.push(r.url),S({},e)}))}))}},{key:"componentDidUpdate",value:function(e){var t=this;if(this.props.slides_repeater!==e.slides_repeater&&"custom"!==(0,f.getResponsiveSetting)(this.props,"slides_item_source","","custom")){var r=[];this.props.slides_repeater.forEach((function(e){var t=S({},e.image_slides_repeater)||{};t.url=t.url||"/img/nullImage.png",r.push(t.url)})),this.setState((function(e){return S(S({},e),{},{sliderImages:r})}))}if("path"===(0,f.getResponsiveSetting)(this.props,"slides_item_source","","custom")){var s=(0,f.getDataByPath)((0,f.getResponsiveSetting)(this.props,"slides_path"));!_.isArray(s)&&_.isObject(s)?s=[s]:_.isArray(s)||(s=[]),s=s.map((function(e){return _.get(e,"media.url")?_.get(e,"media.url"):e.url})),_.isEqual(s,this.state.sliderImages)||this.setState((function(e){return S(S({},e),{},{sliderImages:s})}))}var a=this.props.synchronized_id;a&&(a=a.split(",")).forEach((function(e){var r=(0,f.getComponentByElementId)(e);r&&t.pushSliderToSynchronize(r)}))}},{key:"pushSliderToSynchronize",value:function(e){var t=this;if(_.isArray(e))return this.carouselsToSynchronize=(0,o.Z)(e),void(this.carouselsToSynchronize=this.carouselsToSynchronize.filter((function(e){return e!==t})));var r=this.carouselsToSynchronize||[];(e=_.get(e,"elementRef.current.carousel.current"))&&-1===r.indexOf(e)&&(r.push(e),r.push(this),r.forEach((function(e){e.pushSliderToSynchronize(r)})))}},{key:"setSlide",value:function(e){this.slider.slickGoTo(e)}},{key:"next",value:function(){this.slider.slickNext()}},{key:"previous",value:function(){this.slider.slickPrev()}},{key:"render",value:function(){var e=this,t="altrp-carousel-container";t+=this.props.arrows_navigation_content?"":" altrp-carousel-container-no-arrow";var r=(0,f.getResponsiveSetting)(this.props,"slides_repeater","",[]),s="altrp-carousel-dots",o="altrp-carousel-slides";if(this.props.dots_navigation_content)switch(this.props.dots_position_navigation_content){case"topLeft":s+=" altrp-carousel-dots-top-left",o+=" altrp-carousel-slides-dots-top";break;case"top":s+=" altrp-carousel-dots-top",o+=" altrp-carousel-slides-dots-top";break;case"topRight":s+=" altrp-carousel-dots-top-right",o+=" altrp-carousel-slides-dots-top";break;case"bottomLeft":s+=" altrp-carousel-dots-bottom-left",o+=" altrp-carousel-slides-dots-bottom";break;case"bottom":o+=" altrp-carousel-slides-dots-bottom";break;case"bottomRight":s+=" altrp-carousel-dots-bottom-right",o+=" altrp-carousel-slides-dots-bottom"}var n,i={arrows:!1,customPaging:function(t){var r=!1;return e.slider&&(r=e.slider.innerSlider.state.currentSlide===t),h.createElement("a",null,h.createElement("div",{className:"altrp-carousel-paging "+(r?"active":"")}))},dotsClass:s,dots:this.props.dots_navigation_content,infinite:this.props.infinite_loop_additional_content,pauseOnHover:this.props.pause_on_interaction_loop_additional_content,autoplay:this.props.autoplay_additional_content,className:o,autoplaySpeed:Number(this.props.transition_autoplay_duration_additional_content),speed:Number(this.props.transition_duration_additional_content),slidesToShow:Number(this.props.per_view_slides_content),slidesToScroll:Number(this.props.to_scroll_slides_content),rows:Number(this.props.per_row_slides_content),afterChange:function(t){return e.setState({activeSlide:t})},beforeChange:function(t,r){e.carouselsToSynchronize&&e.carouselsToSynchronize.forEach((function(e){e.setSlide(r)}))},adaptiveHeight:!0};switch((0,f.getResponsiveSetting)(this.props,"slides_item_source","","custom")){case"custom":n=r.map((function(t,r){var s=t.switch_slides_repeater||!1,a=t.image_slides_repeater?S({},t.image_slides_repeater):{};a.url=a.url||"/img/nullImage.png",a.name=a.name||"null",a.assetType=a.assetType||"mediaBackground","media"===a.assetType&&(a.assetType="mediaBackground");var o=(0,f.renderAsset)(a,{className:"altrp-carousel-slide-img"});return!0===s&&(o=h.createElement(N,{templateId:t.card_slides_repeater})),h.createElement("div",{className:"altrp-carousel-slide",key:r,onClick:function(){e.slider.slickGoTo(r)},onDoubleClick:function(){e.slider.slickGoTo(r),e.props.lightbox_slides_content&&e.setState((function(e){return S(S({},e),{},{openLightBox:!0})}))}},o,"text"===e.props.overlay_select_heading_additional_content?h.createElement("div",{className:"altrp-carousel-slide-overlay"},h.createElement("p",{className:"altrp-carousel-slide-overlay-text"},t.overlay_text_repeater)):null)}));break;case"path":(0,f.isEditor)()?n=[h.createElement("div",{className:"altrp-carousel-slide",key:1},(0,f.renderAsset)({url:"/img/nullImage.png",assetType:"mediaBackground"},{key:1,className:"altrp-carousel-slide-img"})),h.createElement("div",{className:"altrp-carousel-slide",key:2},(0,f.renderAsset)({url:"/img/nullImage.png",assetType:"mediaBackground"},{key:1,className:"altrp-carousel-slide-img"})),h.createElement("div",{className:"altrp-carousel-slide",key:3},(0,f.renderAsset)({url:"/img/nullImage.png",assetType:"mediaBackground"},{key:1,className:"altrp-carousel-slide-img"})),h.createElement("div",{className:"altrp-carousel-slide",key:4},(0,f.renderAsset)({url:"/img/nullImage.png",assetType:"mediaBackground"},{key:1,className:"altrp-carousel-slide-img"})),h.createElement("div",{className:"altrp-carousel-slide",key:5},(0,f.renderAsset)({url:"/img/nullImage.png",assetType:"mediaBackground"},{key:1,className:"altrp-carousel-slide-img"})),h.createElement("div",{className:"altrp-carousel-slide",key:6},(0,f.renderAsset)({url:"/img/nullImage.png",assetType:"mediaBackground"},{key:1,className:"altrp-carousel-slide-img"}))]:(n=(0,f.getDataByPath)((0,f.getResponsiveSetting)(this.props,"slides_path")),!_.isArray(n)&&_.isObject(n)?n=[n]:_.isArray(n)||(n=[]),n=n.map((function(t,r){_.isObject(t.media)&&(t=t.media),t.url=t.url||"/img/nullImage.png",t.name=t.name||"null",t.assetType=t.assetType||"mediaBackground","media"===t.assetType&&(t.assetType="mediaBackground");var s=(0,f.renderAsset)(t,{className:"altrp-carousel-slide-img"});return h.createElement("div",{className:"altrp-carousel-slide",key:r,onClick:function(){e.slider.slickGoTo(r)},onDoubleClick:function(){e.slider.slickGoTo(r),e.props.lightbox_slides_content&&e.setState((function(e){return S(S({},e),{},{openLightBox:!0})}))}},s)})))}var l,c,u="";switch(this.props.arrows_position_navigation_content){case"topLeft":u+=" altrp-carousel-arrow-top-left altrp-carousel-arrow-top-wrapper";break;case"top":u+=" altrp-carousel-arrow-top altrp-carousel-arrow-top-wrapper";break;case"topRight":u+=" altrp-carousel-arrow-top-right altrp-carousel-arrow-top-wrapper";break;case"bottomLeft":u+=" altrp-carousel-arrow-bottom-left altrp-carousel-arrow-bottom-wrapper";break;case"bottom":u+=" altrp-carousel-arrow-bottom altrp-carousel-arrow-bottom-wrapper";break;case"bottomRight":u+=" altrp-carousel-arrow-bottom-right altrp-carousel-arrow-bottom-wrapper"}l=this.props.arrows_navigation_content?h.createElement("div",{className:"altrp-carousel-arrow-prev altrp-carousel-arrow",onClick:this.previous},h.createElement(E,null)):"",c=this.props.arrows_navigation_content?h.createElement("div",{className:"altrp-carousel-arrow-next altrp-carousel-arrow",onClick:this.next},h.createElement(E,null)):"";var p="";if(this.props.lightbox_slides_content){var d=this.props.slides_repeater.map((function(e){return e.image_slides_repeater?e.image_slides_repeater.url:"/img/nullImage.png"}));p=this.state.openLightBox?h.createElement(g.Z,{images:d,current:this.state.activeSlide,settings:{onCloseRequest:function(){return e.setState({openLightBox:!1})}},color:this.props.color_lightbox_style}):""}return h.createElement(k,{settings:S({},this.props),className:"altrp-carousel"},this.props.lightbox_slides_content?p:"","center"===this.props.arrows_position_navigation_content?l:"",h.createElement("div",{className:t},"center"!==this.props.arrows_position_navigation_content?h.createElement("div",{className:"altrp-carousel-arrows-container"+u},l,c):"",h.createElement(m.Z,(0,a.Z)({ref:function(t){return e.slider=t}},i),n)),"center"===this.props.arrows_position_navigation_content?c:"")}}]),n}(h.Component)},49e3:function(e,t,r){"use strict";var s=r(22122),a=r(6610),o=r(5991),n=r(10379),i=r(46070),l=r(77608),c=r(67294),u=r(92895),p=r.n(u);r(76593),r.e(3912).then(r.bind(r,53912));var d=function(e){(0,n.Z)(d,e);var t,r,u=(t=d,r=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,s=(0,l.Z)(t);if(r){var a=(0,l.Z)(this).constructor;e=Reflect.construct(s,arguments,a)}else e=s.apply(this,arguments);return(0,i.Z)(this,e)});function d(e){var t;return(0,a.Z)(this,d),(t=u.call(this,e)).state={current:e.current||0},t}return(0,o.Z)(d,[{key:"render",value:function(){var e=this,t=this.props.images,r=this.props.settings,a=null,o=null,n=this.state.current;return 0!==t.length&&""!==t[0]||(t=["/img/nullImage.png"]),t.length>1&&(a=t[(n+1)%t.length],o=t[(n+t.length-1)%t.length]),c.createElement(p(),(0,s.Z)({},r,{mainSrc:t[n],onMovePrevRequest:function(){e.setState({current:(n+t.length-1)%t.length})},onMoveNextRequest:function(){e.setState({current:(n+1)%t.length})},prevSrc:o,nextSrc:a,wrapperClassName:"altrp-lightbox"}))}}]),d}(c.Component);t.Z=d}}]);
//# sourceMappingURL=AltrpCarousel.60f889c3c5b608ee02ca.bundle.js.map