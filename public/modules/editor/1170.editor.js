(self.webpackChunk=self.webpackChunk||[]).push([[1170],{56269:function(e,o,t){"use strict";t.r(o),t.d(o,{default:function(){return P}});var l=t(85061),i=t(96156),a=t(67294),r=t(86817),n=t(14494),u=t(28481),d=t(87757),c=t.n(d),s=t(65056),v=t(5367),h=t(23233),k=t(58965),m=t(10895),p=t(22683),g=_.find(h.Z,{value:"regagro"}).colors,b=_.find(h.Z,{value:"milk"}).colors,y=_.find(h.Z,{value:"milk2"}).colors,f=p.Z,x=function(e){var o=e.widget,t=e.width,l=void 0===t?300:t,r=e.height,n=void 0===r?450:r,d=e.margin,h=e.dataSource,p=void 0===h?[]:h,x=e.groupMode,M=void 0===x?"stacked":x,C=e.layout,S=void 0===C?"vertical":C,w=e.colorScheme,D=void 0===w?"regagro":w,L=e.reverse,Z=void 0!==L&&L,P=e.enableLabel,R=void 0!==P&&P,Y=e.padding,G=void 0===Y?.1:Y,E=e.innerPadding,V=void 0===E?0:E,A=e.borderRadius,W=void 0===A?0:A,z=e.borderWidth,B=void 0===z?0:z,T=e.sort,O=void 0===T?"":T,X=e.tickRotation,I=void 0===X?0:X,q=(e.bottomAxis,e.enableGridX),H=void 0===q||q,N=e.enableGridY,F=void 0===N||N,j=e.customColorSchemeChecker,J=void 0!==j&&j,K=e.customColors,Q=void 0===K?[]:K,U=(e.yScaleMax,e.widgetID),$=e.useCustomTooltips,ee=(0,a.useState)(!1),oe=(0,u.Z)(ee,2),te=oe[0],le=oe[1],ie=(0,a.useState)([]),ae=(0,u.Z)(ie,2),re=ae[0],ne=ae[1],ue=(0,a.useCallback)((function(){return e=void 0,t=void 0,l=void 0,a=c().mark((function e(){var t,l;return c().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(le(!0),0!=p.length){e.next=8;break}return e.next=4,(0,m.O)(o.source,o.filter);case 4:200===(t=e.sent).status&&(l=t.data.data.map((function(e,o){var t;return t={},(0,i.Z)(t,e.key,Number(e.data)),(0,i.Z)(t,"key",e.key),(0,i.Z)(t,"value",Number(e.data)),t})),ne(l||[]),le(!1)),e.next=20;break;case 8:if(null==O||void 0===p){e.next=18;break}e.t0=O,e.next="value"===e.t0?12:"key"===e.t0?14:16;break;case 12:return p=_.sortBy(p,["value"]),e.abrupt("break",18);case 14:return p=_.sortBy(p,["key"]),e.abrupt("break",18);case 16:return p=p,e.abrupt("break",18);case 18:ne(p||[]),le(!1);case 20:case"end":return e.stop()}}),e)})),new(l||(l=Promise))((function(o,i){function r(e){try{u(a.next(e))}catch(e){i(e)}}function n(e){try{u(a.throw(e))}catch(e){i(e)}}function u(e){var t;e.done?o(e.value):(t=e.value,t instanceof l?t:new l((function(e){e(t)}))).then(r,n)}u((a=a.apply(e,t||[])).next())}));var e,t,l,a}),[o]);return(0,a.useEffect)((function(){ue()}),[re]),te?a.createElement(s.Z,null):0===re.length?a.createElement(v.Z,null):a.createElement(a.Fragment,null,a.createElement("div",{style:{height:"".concat(n),width:"".concat(l)}},a.createElement(k.jM,{data:re,margin:{top:(null==d?void 0:d.top)||30,right:(null==d?void 0:d.right)||30,bottom:(null==d?void 0:d.bottom)||30,left:(null==d?void 0:d.left)||30},indexBy:"key",colors:J&&Q.length>0?Q:"regagro"===D?g:"milk"===D?b:"milk2"===D?y:{scheme:D},layout:S,tooltip:function(e){return a.createElement(f,{enable:$,datum:e,widgetID:U})},enableGridX:H,enableGridY:F,enableLabel:R,reverse:Z,groupMode:M,padding:G,innerPadding:V,borderRadius:W,borderWidth:B,axisBottom:{tickSize:5,tickPadding:5,tickRotation:I,legendOffset:32}})))},M=t(78478),C=t(26568),S=t(53723),w=t(57167),D=t(64367),L=t(32543),Z=(t(47249),window.altrpHelpers.moment),P=(0,n.connect)((function(e){return{currentDataStorage:e.currentDataStorage}}))((function(e){var o,t,u,d,c,s,v,k,m,p,g,b,y,f,P,R,Y,G,E,V,A,W,z=e.settings,B=e.id,T=(0,n.useDispatch)(),O=null==z?void 0:z.margin,X=(null==z?void 0:z.widget_name)||B,I=null==z?void 0:z.isCustomColor,q=null==z||null===(o=z.customScheme)||void 0===o?void 0:o.map((function(e){return _.get(e,"color.colorPickedHex")})),H=null==z?void 0:z.yScaleMax,N=null==z?void 0:z.axisY,F=null==z||null===(t=z.repTooltips)||void 0===t?void 0:t.map((function(e){var o;return{label:_.get(e,"label"),field:_.get(e,"value"),color:null===(o=_.get(e,"color"))||void 0===o?void 0:o.colorPickedHex}})),j=null==z?void 0:z.customTooltip,J=(null==N?void 0:N.map((function(e){var o=(0,L.getDataByPath)(e.yMarkerValue);return{axis:"y",value:Number(null!==o?o:e.yMarkerValue),lineStyle:{stroke:null!=e.yMarkerColor?e.yMarkerColor.colorPickedHex:"#000000",strokeWidth:e.yMarkerWidth},textStyle:{fill:null!=e.yMarkerLabelColor?e.yMarkerLabelColor.colorPickedHex:"#000000"},legend:e.yMarkerLabel,legendOrientation:e.yMarkerOrientation}})))||[],K=null==z?void 0:z.axisX,Q=(null==K?void 0:K.map((function(e){var o=(0,L.getDataByPath)(e.xMarkerValue);return{axis:"x",value:null!==o?o:e.xMarkerIsDate?Z(e.xMarkerValue).format("DD.MM.YYYY"):e.xMarkerValue,lineStyle:{stroke:null!=e.xMarkerColor?e.xMarkerColor.colorPickedHex:"#000000",strokeWidth:e.xMarkerWidth},textStyle:{fill:null!=e.xMarkerLabelColor?e.xMarkerLabelColor.colorPickedHex:"#000000"},legend:e.xMarkerLabel,legendOrientation:e.xMarkerOrientation}})))||[],U=[];Q.length>0&&(U.push(Q),U=U.flat()),J.length>0&&(U.push(J),U=U.flat());var $,ee,oe=null===(u=z.query)||void 0===u||null===(d=u.dataSource)||void 0===d?void 0:d.value,te=z.isMultiple,le=z.isCustomColors,ie=z.key_is_date,ae=null==z?void 0:z.sort,re=null==z?void 0:z.tickRotation,ne=null==z?void 0:z.bottomAxis,ue=null==z?void 0:z.enableGridX,de=null==z?void 0:z.enableGridY,ce=(null==z?void 0:z.xScaleType)||"point",se=(null==z?void 0:z.precision)||"month",ve=(null==z?void 0:z.curve)||"line",he=null==z?void 0:z.lineWidth,ke=null==z?void 0:z.colorScheme,me=null==z?void 0:z.enableArea,pe=null==z?void 0:z.enablePoints,ge=null==z?void 0:z.pointSize,be=null==z?void 0:z.pointColor,ye=null==z?void 0:z.yMarker,fe=null==z?void 0:z.yMarkerValue,xe=null==z?void 0:z.yMarkerOrientation,Me=null==z?void 0:z.yMarkerColor,Ce=null==z?void 0:z.yMarkerWidth,Se=null==z?void 0:z.yMarkerLabel,we=null==z?void 0:z.yMarkerLabelColor,_e=null==z?void 0:z.xMarker,De=ie?Z(null==z?void 0:z.xMarkerValueDate).toDate():null==z?void 0:z.xMarkerValue,Le=null==z?void 0:z.xMarkerOrientation,Ze=null==z?void 0:z.xMarkerColor,Pe=null==z?void 0:z.xMarkerWidth,Re=null==z?void 0:z.xMarkerLabel,Ye=null==z?void 0:z.xMarkerLabelColor,Ge=null==z?void 0:z.layout,Ee=null==z?void 0:z.groupMode,Ve=null==z?void 0:z.reverse,Ae=null==z?void 0:z.borderRadius,We=null==z?void 0:z.borderWidth,ze=null==z?void 0:z.enableLabel,Be=null==z?void 0:z.padding,Te=null==z?void 0:z.innerRadius,Oe=null==z?void 0:z.enableSliceLabels,Xe=null==z?void 0:z.padAngle,Ie=null==z?void 0:z.cornerRadius,qe=null==z?void 0:z.sortByValue,He=null==z?void 0:z.enableRadialLabels,Ne=[],Fe=function(e,o){return e.map((function(e,t){var l=_.get(e,o.key),a=Z(l).isValid()?Z(l).format("DD.MM.YYYY"):l,r=void 0!==F?null==F?void 0:F.map((function(o){return{label:null==o?void 0:o.label,value:_.get(e,o.field),color:null==o?void 0:o.color}})):[];switch(z.type){case D.fq:case D.Fe:case D.e_:return{y:Number(_.get(e,o.data)),x:ie?a:l,tooltip:r};case D.u3:var n,u=ie?a:l;return n={},(0,i.Z)(n,u,Number(_.get(e,o.data))),(0,i.Z)(n,"key",u),(0,i.Z)(n,"value",Number(_.get(e,o.data))),(0,i.Z)(n,"tooltip",r),n;case D.en:return{value:Number(_.get(e,o.data)),id:ie?a:l,tooltip:r}}}))},je=[],Je=le?q:_.find(h.Z,{value:null==z?void 0:z.colorScheme}).colors,Ke=Je.length;if(te)Ne=_.cloneDeep(z.rep,[]).map((function(e,o){var t=(0,L.getDataByPath)(e.path,[]);return t.length>0&&(z.type!==D.fq&&z.type!==D.en||(t=_.uniqBy(t,e.key)),t=Fe(t,e)),z.type===D.en||z.type===D.u3?t:(z.type!==D.en&&je.push({color:Je[o%Ke],label:e.title||e.path}),{id:e.title||e.path,data:t})})),(z.type===D.en||z.type===D.u3)&&(Ne=($=[]).concat.apply($,(0,l.Z)(Ne)),je=null===(ee=Ne)||void 0===ee?void 0:ee.map((function(e,o){return{color:z.type===D.u3?Je[0]:Je[o%Ke],label:e.id||e.key}})));else if(null!=z.datasource_path)try{Ne=(0,L.getDataByPath)(z.datasource_path,[]),z.type===D.fq&&(Ne=_.uniqBy(Ne,z.key_name));var Qe,Ue={key:z.key_name,data:z.data_name};z.type===D.en||z.type===D.u3?(Ne=Fe(Ne,Ue),je=null===(Qe=Ne)||void 0===Qe?void 0:Qe.map((function(e,o){return{color:z.type===D.u3?Je[0]:Je[o%Ke],label:e.id||e.key}}))):(je.push({color:Je[0],label:z.datasource_title||z.datasource_path}),Ne=[{id:z.datasource_title||z.datasource_path,data:Fe(Ne,Ue)}])}catch(e){console.log("===================================="),console.error(e),console.log("===================================="),Ne=[{id:z.datasource_title||z.datasource_path,data:[]}]}if(le)var $e=_.cloneDeep(z.repcolor,[]).map((function(e){return e.color.colorPickedHex}));if(!oe&&0===Ne.length)return a.createElement("div",{className:"altrp-chart ".concat(z.legendPosition)},"Идет загрузка данных...");var eo={source:oe+function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"";if(!e)return"";var o=e.split("\n"),t=o.map((function(e){return e.replace("|","=")})).join("&");return"?".concat(t)}(null===(c=z.query)||void 0===c?void 0:c.defaultParams),options:{colorScheme:z.colorScheme,legend:z.legend,animated:z.animated,isVertical:z.isVertical},filter:{}};switch((0,a.useEffect)((function(){je.length>0&&function(e){T((0,r.Xe)(X,{legend:e}))}(je)}),[je]),console.log("===================================="),console.log(Ne),console.log("===================================="),z.type){case D.fq:return a.createElement(C.Z,{widgetID:B,margin:O,useCustomTooltips:j,yScaleMax:H,customColorSchemeChecker:I,customColors:q,widget:eo,dataSource:Ne,keyIsDate:ie,xScaleType:ce,precision:se,curve:ve,colorScheme:ke,enableArea:me,enablePoints:pe,lineWidth:he,pointColor:be,pointSize:ge,yMarker:ye,width:"".concat(null===(s=z.width)||void 0===s?void 0:s.size).concat(null===(v=z.width)||void 0===v?void 0:v.unit),height:"".concat(null===(k=z.height)||void 0===k?void 0:k.size).concat(null===(m=z.height)||void 0===m?void 0:m.unit),yMarkerValue:fe,yMarkerOrientation:xe,yMarkerColor:Me,yMarkerWidth:Ce,yMarkerLabel:Se,xMarker:_e,xMarkerValue:De,xMarkerOrientation:Le,xMarkerColor:Ze,xMarkerWidth:Pe,xMarkerLabel:Re,yMarkerLabelColor:we,xMarkerLabelColor:Ye,constantsAxises:U,sort:ae,tickRotation:re,bottomAxis:ne,enableGridX:ue,enableGridY:de});case D.e_:return a.createElement(w.Z,{widgetID:B,margin:O,useCustomTooltips:j,yScaleMax:H,customColorSchemeChecker:I,customColors:q,dataSource:Ne,constantsAxises:U,colorScheme:ke,width:"".concat(null===(p=z.width)||void 0===p?void 0:p.size).concat(null===(g=z.width)||void 0===g?void 0:g.unit),height:"".concat(null===(b=z.height)||void 0===b?void 0:b.size).concat(null===(y=z.height)||void 0===y?void 0:y.unit),widget:eo,nodeSize:ge,xScaleType:ce,precision:se,sort:ae,tickRotation:re,bottomAxis:ne,enableGridX:ue,enableGridY:de});case D.u3:return a.createElement(x,{widgetID:B,margin:O,useCustomTooltips:j,yScaleMax:H,customColorSchemeChecker:I,customColors:q,isMultiple:te,colorScheme:ke,dataSource:Ne,widget:eo,enableLabel:ze,width:"".concat(null===(f=z.width)||void 0===f?void 0:f.size).concat(null===(P=z.width)||void 0===P?void 0:P.unit),height:"".concat(null===(R=z.height)||void 0===R?void 0:R.size).concat(null===(Y=z.height)||void 0===Y?void 0:Y.unit),layout:Ge,groupMode:Ee,reverse:Ve,borderRadius:Ae,borderWidth:We,padding:Be,sort:ae,tickRotation:re,bottomAxis:ne,enableGridX:ue,enableGridY:de});case D.en:return a.createElement(M.Z,{widgetID:B,margin:O,useCustomTooltips:j,yScaleMax:H,customColorSchemeChecker:I,customColors:q,isMultiple:te,dataSource:Ne,colorScheme:ke,widget:eo,width:"".concat(null===(G=z.width)||void 0===G?void 0:G.size).concat(null===(E=z.width)||void 0===E?void 0:E.unit),height:"".concat(null===(V=z.height)||void 0===V?void 0:V.size).concat(null===(A=z.height)||void 0===A?void 0:A.unit),innerRadius:Te,enableSliceLabels:Oe,padAngle:Xe,cornerRadius:Ie,sortByValue:qe,enableRadialLabels:He,sort:ae,tickRotation:re,bottomAxis:ne,enableGridX:ue,enableGridY:de});case D.Fe:return a.createElement(S.Z,{widgetID:B,useCustomTooltips:j,isCustomColor:le,colorArray:$e,isMultiple:te,dataSource:Ne,widget:eo,width:null===(W=z.width)||void 0===W?void 0:W.size,sort:ae,tickRotation:re,bottomAxis:ne,enableGridX:ue,enableGridY:de});default:return a.createElement(a.Fragment,null)}}))}}]);
//# sourceMappingURL=1170.editor.js.map