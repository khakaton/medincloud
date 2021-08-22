<?php

namespace App\Http\Controllers\AltrpControllers;

use App\Altrp\Model;
use App\Altrp\Relationship;
use App\Altrp\Builders\Traits\DynamicVariables;
use App\Http\Controllers\ApiController;

use App\AltrpModels\media_altrp;
use App\Http\Requests\ApiRequest;
use App\Services\ChatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AltrpRequests\media_altrpStoreRequest;
use App\Http\Requests\AltrpRequests\media_altrpUpdateRequest;
// CUSTOM_NAMESPACES_BEGIN - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

// CUSTOM_NAMESPACES_END - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

class media_altrpController extends ApiController
{
    use DynamicVariables;
    // CUSTOM_TRAITS_BEGIN - IMPORTANT: Don't remove this comment! Write your traits between these comments.
    
    // CUSTOM_TRAITS_END - IMPORTANT: Don't remove this comment! Write your traits between these comments.

    // CUSTOM_PROPERTIES_BEGIN - IMPORTANT: Don't remove this comment! Write your properties between these comments.
    
    // CUSTOM_PROPERTIES_END - IMPORTANT: Don't remove this comment! Write your properties between these comments.

    /**
     * media_altrpController constructor.
     */
    public function __construct()
    {
        $this->modelClass = media_altrp::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(media_altrpStoreRequest $request)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $media_altrp = new media_altrp;

        $regChat = ChatService::registerInChat($media_altrp->getTable(), $data);

        $data = $this->hashPasswordAttributeIfExists($media_altrp->getTable(), $data);

        $media_altrp->fill($data);

        $res = $media_altrp->save();
        if($res){
            return response()->json(['success'=>true, 'data'=>$media_altrp], 200, [], JSON_UNESCAPED_UNICODE);
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
        $media_altrp = media_altrp::find($id);

        if(! $media_altrp) {
            return response()->json(trans("responses.not_found.media_altrp"), 404, [], JSON_UNESCAPED_UNICODE);
        }

        $model = Model::where('name', 'media_altrp')->first();
        $relations = Relationship::where([['model_id',$model->id],['always_with',1]])->get()->implode('name',',');
        $relations = $relations ? explode(',',$relations) : false;

        if ($relations) {
            $media_altrp = $media_altrp->load($relations);
        }

        $media_altrp = $this->getRemoteData($model, $media_altrp, true);

        return response()->json($media_altrp, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(media_altrpUpdateRequest $request, $id)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $media_altrp = media_altrp::find($id);

        if(! $media_altrp) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.media_altrp")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $data = $this->hashPasswordAttributeIfExists($media_altrp->getTable(), $data);

        $result = $media_altrp->update($data);

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
        $media_altrp = media_altrp::find($id);

        if(! $media_altrp) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.media_altrp")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $result = $media_altrp->delete();

        if($result) {
            return response()->json(['success'=>true, 'message' => trans("responses.delete.media_altrp")], 200, [], JSON_UNESCAPED_UNICODE);
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
        $media_altrp = media_altrp::find($id);

        if(! $media_altrp) {
            return response()->json(['success'=>false, 'message' =>"media_altrp not found"], 404, [], JSON_UNESCAPED_UNICODE);
        }

        if (! isset($media_altrp->$column)) {
            return response()->json(['success'=>false, 'message'=>'Column not exists'], 400, [], JSON_UNESCAPED_UNICODE);
        }

        $media_altrp->$column = $request->column_value;

        if ($media_altrp->save()) {
            return response()->json(['success'=>true], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json('Failed to update', 400, [], JSON_UNESCAPED_UNICODE);
    }

    public function getIndexedColumnsValueWithCount($column)
    {
        $media_altrps = media_altrp::selectRaw("$column as value, COUNT($column) as count")
                            ->havingRaw("COUNT($column)")
                            ->groupBy("$column")
                            ->get();
        return response()->json($media_altrps, 200, [], JSON_UNESCAPED_UNICODE);
    }

    // SQL_EDITORS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    
    // SQL_EDITORS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.

    // CUSTOM_METHODS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    
    // CUSTOM_METHODS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.
}
