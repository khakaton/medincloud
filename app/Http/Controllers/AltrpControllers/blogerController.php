<?php

namespace App\Http\Controllers\AltrpControllers;

use App\Altrp\Model;
use App\Altrp\Relationship;
use App\Altrp\Builders\Traits\DynamicVariables;
use App\Http\Controllers\ApiController;

use App\AltrpModels\bloger;
use App\Http\Requests\ApiRequest;
use App\Services\ChatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AltrpRequests\blogerStoreRequest;
use App\Http\Requests\AltrpRequests\blogerUpdateRequest;
// CUSTOM_NAMESPACES_BEGIN - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

// CUSTOM_NAMESPACES_END - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

class blogerController extends ApiController
{
    use DynamicVariables;
    // CUSTOM_TRAITS_BEGIN - IMPORTANT: Don't remove this comment! Write your traits between these comments.
    
    // CUSTOM_TRAITS_END - IMPORTANT: Don't remove this comment! Write your traits between these comments.

    // CUSTOM_PROPERTIES_BEGIN - IMPORTANT: Don't remove this comment! Write your properties between these comments.
    
    // CUSTOM_PROPERTIES_END - IMPORTANT: Don't remove this comment! Write your properties between these comments.

    /**
     * blogerController constructor.
     */
    public function __construct()
    {
        $this->modelClass = bloger::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(blogerStoreRequest $request)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $bloger = new bloger;

        $regChat = ChatService::registerInChat($bloger->getTable(), $data);

        $data = $this->hashPasswordAttributeIfExists($bloger->getTable(), $data);

        $bloger->fill($data);

        $res = $bloger->save();
        if($res){
            return response()->json(['success'=>true, 'data'=>$bloger], 200, [], JSON_UNESCAPED_UNICODE);
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
        $bloger = bloger::find($id);

        if(! $bloger) {
            return response()->json(trans("responses.not_found.bloger"), 404, [], JSON_UNESCAPED_UNICODE);
        }

        $model = Model::where('name', 'bloger')->first();
        $relations = Relationship::where([['model_id',$model->id],['always_with',1]])->get()->implode('name',',');
        $relations = $relations ? explode(',',$relations) : false;

        if ($relations) {
            $bloger = $bloger->load($relations);
        }

        $bloger = $this->getRemoteData($model, $bloger, true);

        return response()->json($bloger, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(blogerUpdateRequest $request, $id)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $bloger = bloger::find($id);

        if(! $bloger) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.bloger")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $data = $this->hashPasswordAttributeIfExists($bloger->getTable(), $data);

        $result = $bloger->update($data);

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
        $bloger = bloger::find($id);

        if(! $bloger) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.bloger")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $result = $bloger->delete();

        if($result) {
            return response()->json(['success'=>true, 'message' => trans("responses.delete.bloger")], 200, [], JSON_UNESCAPED_UNICODE);
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
        $bloger = bloger::find($id);

        if(! $bloger) {
            return response()->json(['success'=>false, 'message' =>"bloger not found"], 404, [], JSON_UNESCAPED_UNICODE);
        }

        if (! isset($bloger->$column)) {
            return response()->json(['success'=>false, 'message'=>'Column not exists'], 400, [], JSON_UNESCAPED_UNICODE);
        }

        $bloger->$column = $request->column_value;

        if ($bloger->save()) {
            return response()->json(['success'=>true], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json('Failed to update', 400, [], JSON_UNESCAPED_UNICODE);
    }

    public function getIndexedColumnsValueWithCount($column)
    {
        $blogers = bloger::selectRaw("$column as value, COUNT($column) as count")
                            ->havingRaw("COUNT($column)")
                            ->groupBy("$column")
                            ->get();
        return response()->json($blogers, 200, [], JSON_UNESCAPED_UNICODE);
    }

    // SQL_EDITORS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    

    public function get_blogers(ApiRequest $request)
    {
        $entity = Model::where('name', 'bloger')->first()->altrp_sql_editors->where('name', 'get_blogers')->first();

        $res = selectForSQLEditor(
        "SELECT `b`.*, CONCAT(`surname`,\" \",`name`,\" \",`patronymic`) fio , DATE_FORMAT(birthday,\"%d.%m.%Y\") AS birthdate, `ma`.`url` as `image_url` 
FROM `med_blogers` as `b`
LEFT JOIN `med_altrp_media` as `ma`
    ON `b`.`media_id` = `ma`.`id`
ORDER BY `fio`",  [], [
           'sql_name' => 'get_blogers',
           'table_name' => 'blogers',
         ], $request );



        $res['data'] = $this->getRemoteData($entity, $res, $entity->is_object);

        return response()->json( $res, 200, [], JSON_UNESCAPED_UNICODE );
    }

    public function get_bloger(ApiRequest $request)
    {
        $entity = Model::where('name', 'bloger')->first()->altrp_sql_editors->where('name', 'get_bloger')->first();

        $res = selectForSQLEditor(
        "SELECT `b`.*, CONCAT(`surname`,\" \",`name`,\" \",`patronymic`) fio , DATE_FORMAT(birthday,\"%d.%m.%Y\") AS birthdate, `ma`.`url` as `image_url` 
FROM `med_blogers` as `b`
LEFT JOIN `med_altrp_media` as `ma` ON `b`.`media_id` = `ma`.`id`
WHERE `b`.`id` = \"" . request()->id . "\"",  [], [
           'sql_name' => 'get_bloger',
           'table_name' => 'blogers',
         ], $request );



        $res['data'] = $this->getRemoteData($entity, $res, $entity->is_object);

        return response()->json( $res, 200, [], JSON_UNESCAPED_UNICODE );
    }
    // SQL_EDITORS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.

    // CUSTOM_METHODS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    
    // CUSTOM_METHODS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.
}