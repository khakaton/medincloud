<?php

namespace App\Http\Controllers\AltrpControllers;

use App\Altrp\Model;
use App\Altrp\Relationship;
use App\Altrp\Builders\Traits\DynamicVariables;
use App\Http\Controllers\ApiController;

use App\AltrpModels\partner;
use App\Http\Requests\ApiRequest;
use App\Services\ChatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AltrpRequests\partnerStoreRequest;
use App\Http\Requests\AltrpRequests\partnerUpdateRequest;
// CUSTOM_NAMESPACES_BEGIN - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

// CUSTOM_NAMESPACES_END - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

class partnerController extends ApiController
{
    use DynamicVariables;
    // CUSTOM_TRAITS_BEGIN - IMPORTANT: Don't remove this comment! Write your traits between these comments.
    
    // CUSTOM_TRAITS_END - IMPORTANT: Don't remove this comment! Write your traits between these comments.

    // CUSTOM_PROPERTIES_BEGIN - IMPORTANT: Don't remove this comment! Write your properties between these comments.
    
    // CUSTOM_PROPERTIES_END - IMPORTANT: Don't remove this comment! Write your properties between these comments.

    /**
     * partnerController constructor.
     */
    public function __construct()
    {
        $this->modelClass = partner::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(partnerStoreRequest $request)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $partner = new partner;

        $regChat = ChatService::registerInChat($partner->getTable(), $data);

        $data = $this->hashPasswordAttributeIfExists($partner->getTable(), $data);

        $partner->fill($data);

        $res = $partner->save();
        if($res){
            return response()->json(['success'=>true, 'data'=>$partner], 200, [], JSON_UNESCAPED_UNICODE);
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
        $partner = partner::find($id);

        if(! $partner) {
            return response()->json(trans("responses.not_found.partner"), 404, [], JSON_UNESCAPED_UNICODE);
        }

        $model = Model::where('name', 'partner')->first();
        $relations = Relationship::where([['model_id',$model->id],['always_with',1]])->get()->implode('name',',');
        $relations = $relations ? explode(',',$relations) : false;

        if ($relations) {
            $partner = $partner->load($relations);
        }

        $partner = $this->getRemoteData($model, $partner, true);

        return response()->json($partner, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(partnerUpdateRequest $request, $id)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $partner = partner::find($id);

        if(! $partner) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.partner")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $data = $this->hashPasswordAttributeIfExists($partner->getTable(), $data);

        $result = $partner->update($data);

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
        $partner = partner::find($id);

        if(! $partner) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.partner")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $result = $partner->delete();

        if($result) {
            return response()->json(['success'=>true, 'message' => trans("responses.delete.partner")], 200, [], JSON_UNESCAPED_UNICODE);
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
        $partner = partner::find($id);

        if(! $partner) {
            return response()->json(['success'=>false, 'message' =>"partner not found"], 404, [], JSON_UNESCAPED_UNICODE);
        }

        if (! isset($partner->$column)) {
            return response()->json(['success'=>false, 'message'=>'Column not exists'], 400, [], JSON_UNESCAPED_UNICODE);
        }

        $partner->$column = $request->column_value;

        if ($partner->save()) {
            return response()->json(['success'=>true], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json('Failed to update', 400, [], JSON_UNESCAPED_UNICODE);
    }

    public function getIndexedColumnsValueWithCount($column)
    {
        $partners = partner::selectRaw("$column as value, COUNT($column) as count")
                            ->havingRaw("COUNT($column)")
                            ->groupBy("$column")
                            ->get();
        return response()->json($partners, 200, [], JSON_UNESCAPED_UNICODE);
    }

    // SQL_EDITORS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    

    public function get_partners_count(ApiRequest $request)
    {
        $entity = Model::where('name', 'partner')->first()->altrp_sql_editors->where('name', 'get_partners_count')->first();

        $res = selectForSQLEditor(
        "SELECT
     COUNT(`id`) as `count`,
    `created_at` as `date`
FROM med_partners
ORDER BY `created_at`",  [], [
           'sql_name' => 'get_partners_count',
           'table_name' => 'partners',
         ], $request );



        $res['data'] = $this->getRemoteData($entity, $res, $entity->is_object);

        return response()->json( $res, 200, [], JSON_UNESCAPED_UNICODE );
    }
    // SQL_EDITORS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.

    // CUSTOM_METHODS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    
    // CUSTOM_METHODS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.
}