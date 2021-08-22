<?php
/*Api routes*/
// Routes for the user_altrps resource
Route::get('/user_altrps', ['uses' =>'AltrpControllers\user_altrpController@index']);
Route::get('/user_altrp_options', ['uses' =>'AltrpControllers\user_altrpController@options']);
Route::post('/user_altrps', ['uses' =>'AltrpControllers\user_altrpController@store']);
Route::get('/user_altrps/{user_altrp}', ['uses' =>'AltrpControllers\user_altrpController@show']);
Route::put('/user_altrps/{user_altrp}', ['uses' =>'AltrpControllers\user_altrpController@update']);
Route::delete('/user_altrps/{user_altrp}', ['uses' =>'AltrpControllers\user_altrpController@destroy']);
Route::put('/user_altrps/{user_altrp}/{column}', ['uses' =>'AltrpControllers\user_altrpController@updateColumn']);
Route::get('/filters/user_altrps/{column}', ['uses' =>'AltrpControllers\user_altrpController@getIndexedColumnsValueWithCount']);
// Routes for the media_altrps resource
Route::get('/media_altrps', ['uses' =>'AltrpControllers\media_altrpController@index']);
Route::get('/media_altrp_options', ['uses' =>'AltrpControllers\media_altrpController@options']);
Route::post('/media_altrps', ['uses' =>'AltrpControllers\media_altrpController@store']);
Route::get('/media_altrps/{media_altrp}', ['uses' =>'AltrpControllers\media_altrpController@show']);
Route::put('/media_altrps/{media_altrp}', ['uses' =>'AltrpControllers\media_altrpController@update']);
Route::delete('/media_altrps/{media_altrp}', ['uses' =>'AltrpControllers\media_altrpController@destroy']);
Route::put('/media_altrps/{media_altrp}/{column}', ['uses' =>'AltrpControllers\media_altrpController@updateColumn']);
Route::get('/filters/media_altrps/{column}', ['uses' =>'AltrpControllers\media_altrpController@getIndexedColumnsValueWithCount']);
// Routes for the reward_types resource
Route::get('/reward_types', ['uses' =>'AltrpControllers\reward_typeController@index']);
Route::get('/reward_type_options', ['uses' =>'AltrpControllers\reward_typeController@options']);
Route::post('/reward_types', ['uses' =>'AltrpControllers\reward_typeController@store']);
Route::get('/reward_types/{reward_type}', ['uses' =>'AltrpControllers\reward_typeController@show']);
Route::put('/reward_types/{reward_type}', ['uses' =>'AltrpControllers\reward_typeController@update']);
Route::delete('/reward_types/{reward_type}', ['uses' =>'AltrpControllers\reward_typeController@destroy']);
Route::put('/reward_types/{reward_type}/{column}', ['uses' =>'AltrpControllers\reward_typeController@updateColumn']);
Route::get('/filters/reward_types/{column}', ['uses' =>'AltrpControllers\reward_typeController@getIndexedColumnsValueWithCount']);
// Routes for the rewards resource
Route::get('/rewards', ['uses' =>'AltrpControllers\rewardController@index']);
Route::get('/reward_options', ['uses' =>'AltrpControllers\rewardController@options']);
Route::post('/rewards', ['uses' =>'AltrpControllers\rewardController@store']);
Route::get('/rewards/{reward}', ['uses' =>'AltrpControllers\rewardController@show']);
Route::put('/rewards/{reward}', ['uses' =>'AltrpControllers\rewardController@update']);
Route::delete('/rewards/{reward}', ['uses' =>'AltrpControllers\rewardController@destroy']);
Route::put('/rewards/{reward}/{column}', ['uses' =>'AltrpControllers\rewardController@updateColumn']);
Route::get('/filters/rewards/{column}', ['uses' =>'AltrpControllers\rewardController@getIndexedColumnsValueWithCount']);
// Routes for the report_blogers resource
Route::get('/queries/report_blogers/get_report', ['uses' =>'AltrpControllers\report_blogerController@get_report']);
Route::get('/report_blogers', ['uses' =>'AltrpControllers\report_blogerController@index']);
Route::get('/report_bloger_options', ['uses' =>'AltrpControllers\report_blogerController@options']);
Route::post('/report_blogers', ['uses' =>'AltrpControllers\report_blogerController@store']);
Route::get('/report_blogers/{report_bloger}', ['uses' =>'AltrpControllers\report_blogerController@show']);
Route::put('/report_blogers/{report_bloger}', ['uses' =>'AltrpControllers\report_blogerController@update']);
Route::delete('/report_blogers/{report_bloger}', ['uses' =>'AltrpControllers\report_blogerController@destroy']);
Route::put('/report_blogers/{report_bloger}/{column}', ['uses' =>'AltrpControllers\report_blogerController@updateColumn']);
Route::get('/filters/report_blogers/{column}', ['uses' =>'AltrpControllers\report_blogerController@getIndexedColumnsValueWithCount']);
// Routes for the platforms resource
Route::get('/queries/platforms/get_platforms', ['uses' => 'AltrpControllers\platformController@get_platforms']);
Route::get('/platforms', ['uses' =>'AltrpControllers\platformController@index']);
Route::get('/platform_options', ['uses' =>'AltrpControllers\platformController@options']);
Route::post('/platforms', ['uses' =>'AltrpControllers\platformController@store']);
Route::get('/platforms/{platform}', ['uses' =>'AltrpControllers\platformController@show']);
Route::put('/platforms/{platform}', ['uses' =>'AltrpControllers\platformController@update']);
Route::delete('/platforms/{platform}', ['uses' =>'AltrpControllers\platformController@destroy']);
Route::put('/platforms/{platform}/{column}', ['uses' =>'AltrpControllers\platformController@updateColumn']);
Route::get('/filters/platforms/{column}', ['uses' =>'AltrpControllers\platformController@getIndexedColumnsValueWithCount']);
// Routes for the partners resource
Route::get('/queries/partners/get_partners_count', ['uses' => 'AltrpControllers\partnerController@get_partners_count']);
Route::get('/partners', ['uses' =>'AltrpControllers\partnerController@index']);
Route::get('/partner_options', ['uses' =>'AltrpControllers\partnerController@options']);
Route::post('/partners', ['uses' =>'AltrpControllers\partnerController@store']);
Route::get('/partners/{partner}', ['uses' =>'AltrpControllers\partnerController@show']);
Route::put('/partners/{partner}', ['uses' =>'AltrpControllers\partnerController@update']);
Route::delete('/partners/{partner}', ['uses' =>'AltrpControllers\partnerController@destroy']);
Route::put('/partners/{partner}/{column}', ['uses' =>'AltrpControllers\partnerController@updateColumn']);
Route::get('/filters/partners/{column}', ['uses' =>'AltrpControllers\partnerController@getIndexedColumnsValueWithCount']);
// Routes for the events resource
Route::get('/queries/events/get_event', ['uses' => 'AltrpControllers\eventController@get_event']);
Route::get('/queries/events/get_events', ['uses' => 'AltrpControllers\eventController@get_events']);
Route::get('/events', ['uses' =>'AltrpControllers\eventController@index']);
Route::get('/event_options', ['uses' =>'AltrpControllers\eventController@options']);
Route::post('/events', ['uses' =>'AltrpControllers\eventController@store']);
Route::get('/events/{event}', ['uses' =>'AltrpControllers\eventController@show']);
Route::put('/events/{event}', ['uses' =>'AltrpControllers\eventController@update']);
Route::delete('/events/{event}', ['uses' =>'AltrpControllers\eventController@destroy']);
Route::put('/events/{event}/{column}', ['uses' =>'AltrpControllers\eventController@updateColumn']);
Route::get('/filters/events/{column}', ['uses' =>'AltrpControllers\eventController@getIndexedColumnsValueWithCount']);
// Routes for the blogers resource
Route::get('/queries/blogers/get_bloger', ['uses' => 'AltrpControllers\blogerController@get_bloger']);
Route::get('/queries/blogers/get_blogers', ['uses' => 'AltrpControllers\blogerController@get_blogers']);
Route::get('/blogers', ['uses' =>'AltrpControllers\blogerController@index']);
Route::get('/bloger_options', ['uses' =>'AltrpControllers\blogerController@options']);
Route::post('/blogers', ['uses' =>'AltrpControllers\blogerController@store']);
Route::get('/blogers/{bloger}', ['uses' =>'AltrpControllers\blogerController@show']);
Route::put('/blogers/{bloger}', ['uses' =>'AltrpControllers\blogerController@update']);
Route::delete('/blogers/{bloger}', ['uses' =>'AltrpControllers\blogerController@destroy']);
Route::put('/blogers/{bloger}/{column}', ['uses' =>'AltrpControllers\blogerController@updateColumn']);
Route::get('/filters/blogers/{column}', ['uses' =>'AltrpControllers\blogerController@getIndexedColumnsValueWithCount']);
// Routes for the parser_bloggers resource
Route::get('/parser_bloggers', ['uses' =>'AltrpControllers\parser_bloggersController@index']);
Route::get('/parser_blogger_options', ['uses' =>'AltrpControllers\parser_bloggersController@options']);
Route::post('/parser_bloggers', ['uses' =>'AltrpControllers\parser_bloggersController@store']);
Route::get('/parser_bloggers/{parser_blogger}', ['uses' =>'AltrpControllers\parser_bloggersController@show']);
Route::put('/parser_bloggers/{parser_blogger}', ['uses' =>'AltrpControllers\parser_bloggersController@update']);
Route::delete('/parser_bloggers/{parser_blogger}', ['uses' =>'AltrpControllers\parser_bloggersController@destroy']);
Route::put('/parser_bloggers/{parser_blogger}/{column}', ['uses' =>'AltrpControllers\parser_bloggersController@updateColumn']);
Route::get('/filters/parser_bloggers/{column}', ['uses' =>'AltrpControllers\parser_bloggersController@getIndexedColumnsValueWithCount']);