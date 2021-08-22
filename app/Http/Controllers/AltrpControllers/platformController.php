<?php

namespace App\Http\Controllers\AltrpControllers;

use App\Altrp\Model;
use App\Altrp\Relationship;
use App\Altrp\Builders\Traits\DynamicVariables;
use App\Http\Controllers\ApiController;

use App\AltrpModels\platform;
use App\Http\Requests\ApiRequest;
use App\Services\ChatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AltrpRequests\platformStoreRequest;
use App\Http\Requests\AltrpRequests\platformUpdateRequest;
// CUSTOM_NAMESPACES_BEGIN - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

// CUSTOM_NAMESPACES_END - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

class platformController extends ApiController
{
    use DynamicVariables;
    // CUSTOM_TRAITS_BEGIN - IMPORTANT: Don't remove this comment! Write your traits between these comments.
    
    // CUSTOM_TRAITS_END - IMPORTANT: Don't remove this comment! Write your traits between these comments.

    // CUSTOM_PROPERTIES_BEGIN - IMPORTANT: Don't remove this comment! Write your properties between these comments.
    
    // CUSTOM_PROPERTIES_END - IMPORTANT: Don't remove this comment! Write your properties between these comments.

    /**
     * platformController constructor.
     */
    public function __construct()
    {
        $this->modelClass = platform::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(platformStoreRequest $request)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $platform = new platform;

        $regChat = ChatService::registerInChat($platform->getTable(), $data);

        $data = $this->hashPasswordAttributeIfExists($platform->getTable(), $data);

        $platform->fill($data);

        $res = $platform->save();
        if($res){
            return response()->json(['success'=>true, 'data'=>$platform], 200, [], JSON_UNESCAPED_UNICODE);
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
        $platform = platform::find($id);

        if(! $platform) {
            return response()->json(trans("responses.not_found.platform"), 404, [], JSON_UNESCAPED_UNICODE);
        }

        $model = Model::where('name', 'platform')->first();
        $relations = Relationship::where([['model_id',$model->id],['always_with',1]])->get()->implode('name',',');
        $relations = $relations ? explode(',',$relations) : false;

        if ($relations) {
            $platform = $platform->load($relations);
        }

        $platform = $this->getRemoteData($model, $platform, true);

        return response()->json($platform, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(platformUpdateRequest $request, $id)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $platform = platform::find($id);

        if(! $platform) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.platform")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $data = $this->hashPasswordAttributeIfExists($platform->getTable(), $data);

        $result = $platform->update($data);

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
        $platform = platform::find($id);

        if(! $platform) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.platform")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $result = $platform->delete();

        if($result) {
            return response()->json(['success'=>true, 'message' => trans("responses.delete.platform")], 200, [], JSON_UNESCAPED_UNICODE);
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
        $platform = platform::find($id);

        if(! $platform) {
            return response()->json(['success'=>false, 'message' =>"platform not found"], 404, [], JSON_UNESCAPED_UNICODE);
        }

        if (! isset($platform->$column)) {
            return response()->json(['success'=>false, 'message'=>'Column not exists'], 400, [], JSON_UNESCAPED_UNICODE);
        }

        $platform->$column = $request->column_value;

        if ($platform->save()) {
            return response()->json(['success'=>true], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json('Failed to update', 400, [], JSON_UNESCAPED_UNICODE);
    }

    public function getIndexedColumnsValueWithCount($column)
    {
        $platforms = platform::selectRaw("$column as value, COUNT($column) as count")
                            ->havingRaw("COUNT($column)")
                            ->groupBy("$column")
                            ->get();
        return response()->json($platforms, 200, [], JSON_UNESCAPED_UNICODE);
    }

    // SQL_EDITORS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    

    public function get_platforms(ApiRequest $request)
    {
        $entity = Model::where('name', 'platform')->first()->altrp_sql_editors->where('name', 'get_platforms')->first();

        $res = selectForSQLEditor(
        "SELECT `p`.* 
FROM `med_platforms` as `p`
ORDER BY `name`",  [], [
           'sql_name' => 'get_platforms',
           'table_name' => 'platforms',
         ], $request );



        $res['data'] = $this->getRemoteData($entity, $res, $entity->is_object);

        return response()->json( $res, 200, [], JSON_UNESCAPED_UNICODE );
    }
    // SQL_EDITORS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.

    // CUSTOM_METHODS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    
    // CUSTOM_METHODS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.
}