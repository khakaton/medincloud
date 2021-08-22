import styled,  { ServerStyleSheet, createGlobalStyle } from "styled-components";
import Area from "../resources/modules/front-app/src/js/classes/Area";
import { parse } from "node-html-parser";
import{Link} from "react-router-dom"
import React from "react";
import lodash from "lodash";
import {StaticRouter as Router, Route, Switch} from "react-router-dom";
import {setAreas} from "../resources/modules/front-app/src/js/store/areas/actions";
import getAltrpSetting from "./functions/get-altrp-setting";
import {changeCurrentUser} from "../resources/modules/front-app/src/js/store/current-user/actions";
import {setCurrentScreen} from "../resources/modules/front-app/src/js/store/media-screen-storage/actions";
import CONSTANTS from "../resources/modules/editor/src/js/consts"
if (typeof performance === "undefined") {
  global.performance = require("perf_hooks").performance;
}
global.styled = styled;
global.parse = parse;
global._ = lodash;
global.createGlobalStyle = createGlobalStyle;
/**
 * Эмулируем окружение клиента
 * @type {{parent: {}}}
 */
global.window = {
  parent: {},
  Link,
};
global.window.altrpMenus = [];
global.SSR = true;
global.window.SSR = true;
// global.document = {
//   addEventListener: () => {
//   },
// };
require( '../resources/modules/front-app/src/js/libs/react-lodash');
require('../resources/modules/front-app/src/js/libs/altrp');
global.frontElementsManager = require("./classes/modules/FrontElementsManager").default;
global.history = {
  back() {}
};
global.iconsManager = new (require("../resources/modules/editor/src/js/classes/modules/IconsManager").default)();
const AltrpModel = require('../resources/modules/editor/src/js/classes/AltrpModel').default
global.currentRouterMatch = new AltrpModel({});
global.Component = global.React.Component;
window.frontElementsFabric = require("../resources/modules/front-app/src/js/classes/FrontElementsFabric").default;
const FrontElement = require("../resources/modules/front-app/src/js/classes/FrontElement")
  .default;
require("../resources/modules/editor/src/js/classes/modules/FormsManager.js");
window.elementDecorator = require("../resources/modules/front-app/src/js/decorators/front-element-component").default;
window.ElementWrapper = require("../resources/modules/front-app/src/js/components/ElementWrapper").default;

window.stylesModulePromise = new Promise(function(resolve) {
  window.stylesModuleResolve = resolve;
});

const express = require("express");
require("dotenv").config();
let PORT = process.env.ALTRP_SETTING_SSR_PORT || 9000;
const { Provider } = require("react-redux");
global.appStore = require("../resources/modules/front-app/src/js/store/store").default;
window.parent.appStore = global.appStore;
window.container_width = getAltrpSetting('container_width')
const ReactDOMServer = require("react-dom/server");
const AreaComponent = require("../resources/modules/front-app/src/js/components/AreaComponent")
  .default;
const Styles = require("../resources/modules/editor/src/js/components/Styles")
  .default;

// const { HTML5Backend } = require("react-dnd-html5-backend");
// const { DndProvider } = require("react-dnd");


var bodyParser = require("body-parser");
const GlobalStyles = require('../resources/modules/front-app/src/js/components/GlobalStyles').default

const app = express();
app.use(bodyParser.json({ limit: "500mb", extended: true }));
app.use(
  bodyParser.urlencoded({
    limit: "500mb",
    extended: true
  })
);

app.use(express.static("public"));
app.get("/*", (req, res) => {
  return res.json({ success: true });

});
const addSettingsToStore = (require("../resources/modules/front-app/src/js/functions/load-global-styles")).addSettingsToStore
app.post("/", (req, res) => {
  const sheet = new ServerStyleSheet();
  const store = window.appStore;
  let json = JSON.parse(req.body.json) || [];
  let page = json.page || [];
  global.window.currentPage = json.currentPage || {};
  let page_id = json.page_id || "";
  let page_model = json.page_model || {};
  let current_device = json.current_device || 'DEFAULT_BREAKPOINT';
  const changedScreen = CONSTANTS.SCREENS.find(screen=>screen.name === current_device)
  if(changedScreen){
    store.dispatch(setCurrentScreen(changedScreen))
  }
  // delete page[3];
  global.altrp = json.altrp || {};
  /**
   * todo: починить серверную отрисовку для склетона
   * @type {*[]}
   */
  global.window.altrpImageLazy = json.altrpImageLazy || "none";
  global.window.altrpSkeletonColor = json.altrpSkeletonColor || "#ccc";
  appStore.dispatch(changeCurrentUser(json.current_user || {}));
  global.window.altrpSkeletonHighlightColor =
    json.altrpSkeletonHighlightColor || "#d0d0d0";
  let elements = [];
  global.window.location = {
    href: req.protocol + "://" + req.get("host") + req.originalUrl
  };
  page.forEach(area => {
    if (area?.template?.data?.children) {
      area.template.data.id && elements.push(area.template.data);
      area.template.data.children.forEach(item => {
        extractChildren(item, elements);
      });
    }
  });
  elements = elements.map(item => new FrontElement(item));

  window.currentRouterMatch = new AltrpModel({});
  window.page_areas = page;
  page = page.map(area => (Area.areaFactory(area)));
  store.dispatch(setAreas(page));
  addSettingsToStore();
  let resultSSRApp = ReactDOMServer.renderToString(
    sheet.collectStyles(
      <Router>
        <Switch>
          <Route path='*' exact>
            <Provider store={store}>
              <div className="route-content" id="route-content" areas={page}>
                {page.map((area, idx) => {
                  return (
                    <AreaComponent
                      {...area}
                      area={area}
                      areas={page}
                      page={page_id}
                      models={[page_model]}
                      key={"appArea_" + area.id}
                    />
                  );
                })}
                <GlobalStyles/>
              </div>
            </Provider>
          </Route>
        </Switch>
      </Router>
    )
  );

  let styleTags = sheet.getStyleTags();
  let _app = parse(resultSSRApp);
  if (_app.querySelector(".styles-container")) {
    styleTags += `<style>${
      _app.querySelector(".styles-container").textContent
    }</style>`;
    _app.removeChild(_app.querySelector(".styles-container"));
    resultSSRApp = _app.toString();
  }
  let styledStylesTags = parse(styleTags);
  if(styledStylesTags.querySelector('[data-styled]')){
    styledStylesTags.querySelector('[data-styled]')?.removeAttribute('data-styled-version')
    styledStylesTags.querySelector('[data-styled]')?.removeAttribute('data-styled');
    styledStylesTags.querySelector('style')?.setAttribute('data-altrp-ssr-styles', 'true');
    styleTags = styledStylesTags.toString();
  }
  sheet.seal();
  const result = {
    important_styles: unEntity(styleTags),
    content: unEntity(resultSSRApp)
  };
  return res.json(result);
});

app.use(express.static("../server-build"));

app.listen(PORT, () => {
  console.log(`Express server started at http://localhost:${PORT}`);
});

function extractChildren(item, list) {
  list = list || [];
  list.push(item);
  if (item?.children?.length) {
    item.children.forEach(item => {
      extractChildren(item, list);
    });
  }
}
function unEntity(str) {
  return str
    .replace(/&amp;/g, "&")
    .replace(/&lt;/g, "<")
    .replace(/&gt;/g, ">")
    .replace(/\/\*!sc\*\//g, "")
    .replace(/\n/g, '');
}
