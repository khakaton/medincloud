<?php

// =======> '/' <=======
Route::get('/', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(1);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Главная',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 1);

// =======> '/login' <=======
Route::get('/login', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(2);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Логин',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 2);

// =======> '/registration' <=======
Route::get('/registration', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(3);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Регистрация',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 3);

// =======> '/blogers' <=======
Route::get('/blogers', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(4);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Блогеры',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 4);

// =======> '/blogers/add' <=======
Route::get('/blogers/add', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(5);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Добавить блогера',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 5);

// =======> '/blogers/{id}' <=======
Route::get('/blogers/{id}', function ($id) {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(6);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '$id';
  if( 1 !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( $id );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Редактировать блогера',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 6);

// =======> '/dashboard' <=======
Route::get('/dashboard', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(7);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Дашборд',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 7);

// =======> '/partners' <=======
Route::get('/partners', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(8);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Партнеры',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 8);

// =======> '/events' <=======
Route::get('/events', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(9);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'События',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 9);

// =======> '/reports' <=======
Route::get('/reports', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(10);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Отчеты',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 10);

// =======> '/rewards' <=======
Route::get('/rewards', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(11);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Награды',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 11);

// =======> '/settings' <=======
Route::get('/settings', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(12);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Настройки',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 12);

// =======> '/partners/add' <=======
Route::get('/partners/add', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(13);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Добавить партнера',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 13);

// =======> '/partners/{id}' <=======
Route::get('/partners/{id}', function ($id) {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(14);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '$id';
  if( 1 !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( $id );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Редактировать партнера',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 14);

// =======> '/events/add' <=======
Route::get('/events/add', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(15);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Добавить событие',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 15);

// =======> '/events/{id}' <=======
Route::get('/events/{id}', function ($id) {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(16);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '$id';
  if( 1 !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( $id );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Редактировать событие',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 16);

// =======> '/reports-add' <=======
Route::get('/reports-add', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(17);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Добавить отчет',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 17);

// =======> '/reports/edit/{id}' <=======
Route::get('/reports/edit/{id}', function ($id) {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(18);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '$id';
  if( 1 !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( $id );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Редактировать отчет',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 18);

// =======> '/rewards-add' <=======
Route::get('/rewards-add', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(19);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Добавить награду',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 19);

// =======> '/rewards/{id}' <=======
Route::get('/rewards/{id}', function ($id) {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(20);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '$id';
  if( 1 !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( $id );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Редактировать награду',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 20);

// =======> '/settings/platforms' <=======
Route::get('/settings/platforms', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(21);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Платформы',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 21);

// =======> '/settings/reward-types' <=======
Route::get('/settings/reward-types', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(22);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Типы наград',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 22);

// =======> '/settings/platforms/add' <=======
Route::get('/settings/platforms/add', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(23);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Добавить платформу',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 23);

// =======> '/settings/reward-types-add' <=======
Route::get('/settings/reward-types-add', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(24);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Добавить тип награды',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 24);

// =======> '/settings/reward-types/{id}' <=======
Route::get('/settings/reward-types/{id}', function ($id) {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(25);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '$id';
  if( 1 !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( $id );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Редактировать тип награды',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 25);

// =======> '/map' <=======
Route::get('/map', function () {
  global $altrp_env;
  global $altrp_current_page;
  $_frontend_route = \App\Page::find(26);
  $altrp_current_page = $_frontend_route;
  $_frontend_route['data_sources'] = $_frontend_route->page_data_sources->map(function (App\PageDatasource $page_data_source) {
    if ($page_data_source->source) {
      $page_data_source->source->web_url = $page_data_source->source->web_url;
    }
    return $page_data_source;
  });
  $model_data = [];
  $params_string = '';
  if( false !== false && $_frontend_route['model'] ) {
    $model = $_frontend_route['model']->toArray();
    if( isset( $model['namespace'] ) ){
      try {
        $relations = App\Altrp\Relationship::where( [['model_id',$model['id']],['always_with',1]] )->get()->implode( 'name', ',' );
        $relations = $relations ? explode( ',',$relations ) : false;
        $model = new $model['namespace'];
        if ( $relations ) {
          $model = $model->load( $relations );
        }
        $model = $model->find( 0 );
        if( ! $model ){
          throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException( 'Model not found' );
        }
        $model_data = $model->toArray();
        $altrp_env = $model_data;
      } catch( Exception $e ) {
        $model_data = [];
      }
    }
  }
  $datasources = getDataSources( $_frontend_route['id'], func_get_args(), $params_string );
  $preload_content = \App\Page::getPreloadPageContent( $_frontend_route['id'] );
  $preload_content['content'] = replaceContentWithData( $preload_content['content'] );
  $page_areas = \App\Page::get_areas_for_page( $_frontend_route['id'] );
  $lazy_sections = [];
  $elements_list = extractElementsNames( $page_areas , ! ! $preload_content['content']);
  $altrp_settings = getAltrpSettings( $_frontend_route['id'] );

  if (\App\Page::isCached( $_frontend_route['id'] )) {
    global $altrp_need_cache;
    $altrp_need_cache = true;
    global $altrp_route_id;
    $altrp_route_id = $_frontend_route['id'];
  }
  $pages = \App\Page::get_pages_for_frontend( true );
  return view( 'front-app', [
    'page_areas' => json_encode( $page_areas ),
    'altrp_settings' => json_encode( $altrp_settings ),
    'lazy_sections' => json_encode( $lazy_sections ),
    'elements_list' => json_encode( $elements_list ),
    'page_id' => $_frontend_route['id'],
    'title' => 'Карта партнеров',
    '_frontend_route' => $_frontend_route,
    'pages'=> $pages,
    'preload_content' => $preload_content,
    'model_data' => $model_data,
    'datasources' => $datasources,
    'is_admin' => isAdmin(),
  ]);
})->middleware(['web', 'installation.checker', 'after'])->name( 'page_' . 26);