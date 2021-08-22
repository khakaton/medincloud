<?php

namespace App\Http\Controllers\AltrpControllers;

use App\Altrp\Model;
use App\Altrp\Relationship;
use App\Altrp\Builders\Traits\DynamicVariables;
use App\Http\Controllers\ApiController;

use App\AltrpModels\report_bloger;
use App\Http\Requests\ApiRequest;
use App\Services\ChatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AltrpRequests\report_blogerStoreRequest;
use App\Http\Requests\AltrpRequests\report_blogerUpdateRequest;
// CUSTOM_NAMESPACES_BEGIN - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

// CUSTOM_NAMESPACES_END - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

class report_blogerController extends ApiController
{
    use DynamicVariables;
    // CUSTOM_TRAITS_BEGIN - IMPORTANT: Don't remove this comment! Write your traits between these comments.
    
    // CUSTOM_TRAITS_END - IMPORTANT: Don't remove this comment! Write your traits between these comments.

    // CUSTOM_PROPERTIES_BEGIN - IMPORTANT: Don't remove this comment! Write your properties between these comments.
    
    // CUSTOM_PROPERTIES_END - IMPORTANT: Don't remove this comment! Write your properties between these comments.

    /**
     * report_blogerController constructor.
     */
    public function __construct()
    {
        $this->modelClass = report_bloger::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(report_blogerStoreRequest $request)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $report_bloger = new report_bloger;

        $regChat = ChatService::registerInChat($report_bloger->getTable(), $data);

        $data = $this->hashPasswordAttributeIfExists($report_bloger->getTable(), $data);

        $report_bloger->fill($data);

        $res = $report_bloger->save();
        if($res){
            return response()->json(['success'=>true, 'data'=>$report_bloger], 200, [], JSON_UNESCAPED_UNICODE);
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
        $report_bloger = report_bloger::find($id);

        if(! $report_bloger) {
            return response()->json(trans("responses.not_found.report_bloger"), 404, [], JSON_UNESCAPED_UNICODE);
        }

        $model = Model::where('name', 'report_bloger')->first();
        $relations = Relationship::where([['model_id',$model->id],['always_with',1]])->get()->implode('name',',');
        $relations = $relations ? explode(',',$relations) : false;

        if ($relations) {
            $report_bloger = $report_bloger->load($relations);
        }

        $report_bloger = $this->getRemoteData($model, $report_bloger, true);

        return response()->json($report_bloger, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(report_blogerUpdateRequest $request, $id)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $report_bloger = report_bloger::find($id);

        if(! $report_bloger) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.report_bloger")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $data = $this->hashPasswordAttributeIfExists($report_bloger->getTable(), $data);

        $result = $report_bloger->update($data);

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
        $report_bloger = report_bloger::find($id);

        if(! $report_bloger) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.report_bloger")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $result = $report_bloger->delete();

        if($result) {
            return response()->json(['success'=>true, 'message' => trans("responses.delete.report_bloger")], 200, [], JSON_UNESCAPED_UNICODE);
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
        $report_bloger = report_bloger::find($id);

        if(! $report_bloger) {
            return response()->json(['success'=>false, 'message' =>"report_bloger not found"], 404, [], JSON_UNESCAPED_UNICODE);
        }

        if (! isset($report_bloger->$column)) {
            return response()->json(['success'=>false, 'message'=>'Column not exists'], 400, [], JSON_UNESCAPED_UNICODE);
        }

        $report_bloger->$column = $request->column_value;

        if ($report_bloger->save()) {
            return response()->json(['success'=>true], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json('Failed to update', 400, [], JSON_UNESCAPED_UNICODE);
    }

    public function getIndexedColumnsValueWithCount($column)
    {
        $report_blogers = report_bloger::selectRaw("$column as value, COUNT($column) as count")
                            ->havingRaw("COUNT($column)")
                            ->groupBy("$column")
                            ->get();
        return response()->json($report_blogers, 200, [], JSON_UNESCAPED_UNICODE);
    }

    // SQL_EDITORS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    

    public function get_report(ApiRequest $request)
    {
        $entity = Model::where('name', 'report_bloger')->first()->altrp_sql_editors->where('name', 'get_report')->first();

        $res = selectForSQLEditor(
        "SELECT `r`.*, `p`.`name` as `platform`, CONCAT(`b`.`surname`,\" \",`b`.`name`,\" \",`b`.`patronymic`) fio 
FROM `med_report_blogers` as `r`
LEFT JOIN `med_blogers` as `b` on `r`.`bloger_id` = `b`.`id`
LEFT JOIN `med_platforms` as `p` on `r`.`platform_id` = `p`.`id`",  [], [
           'sql_name' => 'get_report',
           'table_name' => 'report_blogers',
         ], $request );



        $res['data'] = $this->getRemoteData($entity, $res, $entity->is_object);

        return response()->json( $res, 200, [], JSON_UNESCAPED_UNICODE );
    }
    // SQL_EDITORS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.

    // CUSTOM_METHODS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    
    // CUSTOM_METHODS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.
}