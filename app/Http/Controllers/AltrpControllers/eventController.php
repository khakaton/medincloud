<?php

namespace App\Http\Controllers\AltrpControllers;

use App\Altrp\Model;
use App\Altrp\Relationship;
use App\Altrp\Builders\Traits\DynamicVariables;
use App\Http\Controllers\ApiController;

use App\AltrpModels\event;
use App\Http\Requests\ApiRequest;
use App\Services\ChatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AltrpRequests\eventStoreRequest;
use App\Http\Requests\AltrpRequests\eventUpdateRequest;
// CUSTOM_NAMESPACES_BEGIN - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

// CUSTOM_NAMESPACES_END - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

class eventController extends ApiController
{
    use DynamicVariables;
    // CUSTOM_TRAITS_BEGIN - IMPORTANT: Don't remove this comment! Write your traits between these comments.
    
    // CUSTOM_TRAITS_END - IMPORTANT: Don't remove this comment! Write your traits between these comments.

    // CUSTOM_PROPERTIES_BEGIN - IMPORTANT: Don't remove this comment! Write your properties between these comments.
    
    // CUSTOM_PROPERTIES_END - IMPORTANT: Don't remove this comment! Write your properties between these comments.

    /**
     * eventController constructor.
     */
    public function __construct()
    {
        $this->modelClass = event::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(eventStoreRequest $request)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $event = new event;

        $regChat = ChatService::registerInChat($event->getTable(), $data);

        $data = $this->hashPasswordAttributeIfExists($event->getTable(), $data);

        $event->fill($data);

        $res = $event->save();
        if($res){
            return response()->json(['success'=>true, 'data'=>$event], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['success'=>false, 'message' => trans("responses.dberror")], 400, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $event = event::find($id);

        if(! $event) {
            return response()->json(trans("responses.not_found.event"), 404, [], JSON_UNESCAPED_UNICODE);
        }

        $model = Model::where('name', 'event')->first();
        $relations = Relationship::where([['model_id',$model->id],['always_with',1]])->get()->implode('name',',');
        $relations = $relations ? explode(',',$relations) : false;

        if ($relations) {
            $event = $event->load($relations);
        }

        $event = $this->getRemoteData($model, $event, true);

        return response()->json($event, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(eventUpdateRequest $request, $id)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $event = event::find($id);

        if(! $event) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.event")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $data = $this->hashPasswordAttributeIfExists($event->getTable(), $data);

        $result = $event->update($data);

        if($result){
            return response()->json(['success'=>true], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['success'=>false, 'message' => trans("responses.dberror")], 400, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $event = event::find($id);

        if(! $event) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.event")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $result = $event->delete();

        if($result) {
            return response()->json(['success'=>true, 'message' => trans("responses.delete.event")], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['success'=>false, 'message' => trans("deleteerror")], 400, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update column of resource from storage.
     *
     * @param ApiRequest $request
     * @param $id
     * @param $column
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateColumn(ApiRequest $request, $id, $column)
    {
        $event = event::find($id);

        if(! $event) {
            return response()->json(['success'=>false, 'message' =>"event not found"], 404, [], JSON_UNESCAPED_UNICODE);
        }

        if (! isset($event->$column)) {
            return response()->json(['success'=>false, 'message'=>'Column not exists'], 400, [], JSON_UNESCAPED_UNICODE);
        }

        $event->$column = $request->column_value;

        if ($event->save()) {
            return response()->json(['success'=>true], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json('Failed to update', 400, [], JSON_UNESCAPED_UNICODE);
    }

    public function getIndexedColumnsValueWithCount($column)
    {
        $events = event::selectRaw("$column as value, COUNT($column) as count")
                            ->havingRaw("COUNT($column)")
                            ->groupBy("$column")
                            ->get();
        return response()->json($events, 200, [], JSON_UNESCAPED_UNICODE);
    }

    // SQL_EDITORS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    

    public function get_events(ApiRequest $request)
    {
        $entity = Model::where('name', 'event')->first()->altrp_sql_editors->where('name', 'get_events')->first();

        $res = selectForSQLEditor(
        "SELECT `e`.*, DATE_FORMAT(`event_day`,\"%d.%m.%Y\") AS `event_day`, `p`.`name` as `partner_name` , `ma`.`url` as `image_url`
 FROM `med_events` as `e`
LEFT JOIN `med_partners` as `p`
    on `e`.`partner_id` = `p`.`id`
LEFT JOIN `med_altrp_media` as `ma` ON `e`.`media_id` = `ma`.`id`
ORDER BY `name`",  [], [
           'sql_name' => 'get_events',
           'table_name' => 'events',
         ], $request );



        $res['data'] = $this->getRemoteData($entity, $res, $entity->is_object);

        return response()->json( $res, 200, [], JSON_UNESCAPED_UNICODE );
    }

    public function get_event(ApiRequest $request)
    {
        $entity = Model::where('name', 'event')->first()->altrp_sql_editors->where('name', 'get_event')->first();

        $res = selectForSQLEditor(
        "SELECT `e`.*, DATE_FORMAT(`date`,\"%d.%m.%Y\") AS `date`, `p`.`name` as `partner_name`, `ma`.`url` as `image_url`
FROM `med_events` as `e`
LEFT JOIN `med_partners` as `p`
    on `e`.`partner_id` = `p`.`id`
LEFT JOIN `med_altrp_media` as `ma` ON `e`.`media_id` = `ma`.`id`
WHERE `e`.`id` = \"" . request()->id . "\"
ORDER BY `name`",  [], [
           'sql_name' => 'get_event',
           'table_name' => 'events',
         ], $request );



        $res['data'] = $this->getRemoteData($entity, $res, $entity->is_object);

        return response()->json( $res, 200, [], JSON_UNESCAPED_UNICODE );
    }
    // SQL_EDITORS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.

    // CUSTOM_METHODS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    
    // CUSTOM_METHODS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.
}