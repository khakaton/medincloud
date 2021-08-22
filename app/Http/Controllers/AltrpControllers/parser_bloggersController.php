<?php

namespace App\Http\Controllers\AltrpControllers;

use App\Altrp\Model;
use App\Altrp\Relationship;
use App\Altrp\Builders\Traits\DynamicVariables;
use App\Http\Controllers\ApiController;

use App\AltrpModels\parser_bloggers;
use App\Http\Requests\ApiRequest;
use App\Services\ChatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AltrpRequests\parser_bloggersStoreRequest;
use App\Http\Requests\AltrpRequests\parser_bloggersUpdateRequest;
// CUSTOM_NAMESPACES_BEGIN - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

// CUSTOM_NAMESPACES_END - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

class parser_bloggersController extends ApiController
{
    use DynamicVariables;
    // CUSTOM_TRAITS_BEGIN - IMPORTANT: Don't remove this comment! Write your traits between these comments.
    
    // CUSTOM_TRAITS_END - IMPORTANT: Don't remove this comment! Write your traits between these comments.

    // CUSTOM_PROPERTIES_BEGIN - IMPORTANT: Don't remove this comment! Write your properties between these comments.
    
    // CUSTOM_PROPERTIES_END - IMPORTANT: Don't remove this comment! Write your properties between these comments.

    /**
     * parser_bloggersController constructor.
     */
    public function __construct()
    {
        $this->modelClass = parser_bloggers::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(parser_bloggersStoreRequest $request)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $parser_blogger = new parser_bloggers;

        $regChat = ChatService::registerInChat($parser_blogger->getTable(), $data);

        $data = $this->hashPasswordAttributeIfExists($parser_blogger->getTable(), $data);

        $parser_blogger->fill($data);

        $res = $parser_blogger->save();
        if($res){
            return response()->json(['success'=>true, 'data'=>$parser_blogger], 200, [], JSON_UNESCAPED_UNICODE);
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
        $parser_blogger = parser_bloggers::find($id);

        if(! $parser_blogger) {
            return response()->json(trans("responses.not_found.parser_blogger"), 404, [], JSON_UNESCAPED_UNICODE);
        }

        $model = Model::where('name', 'parser_bloggers')->first();
        $relations = Relationship::where([['model_id',$model->id],['always_with',1]])->get()->implode('name',',');
        $relations = $relations ? explode(',',$relations) : false;

        if ($relations) {
            $parser_blogger = $parser_blogger->load($relations);
        }

        $parser_blogger = $this->getRemoteData($model, $parser_blogger, true);

        return response()->json($parser_blogger, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(parser_bloggersUpdateRequest $request, $id)
    {
        $data = $request->all();
        if ($fileInfo = $this->hasFileInRequest($request)) {
            $medias = $this->saveMedias($request, $fileInfo['relation']);
            foreach ($medias as $media) {
                $data[$fileInfo['foreign_key']] = $media->id;
            }
        }

        $parser_blogger = parser_bloggers::find($id);

        if(! $parser_blogger) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.parser_blogger")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $data = $this->hashPasswordAttributeIfExists($parser_blogger->getTable(), $data);

        $result = $parser_blogger->update($data);

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
        $parser_blogger = parser_bloggers::find($id);

        if(! $parser_blogger) {
            return response()->json(['success'=>false, 'message' => trans("responses.not_found.parser_blogger")], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $result = $parser_blogger->delete();

        if($result) {
            return response()->json(['success'=>true, 'message' => trans("responses.delete.parser_blogger")], 200, [], JSON_UNESCAPED_UNICODE);
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
        $parser_blogger = parser_bloggers::find($id);

        if(! $parser_blogger) {
            return response()->json(['success'=>false, 'message' =>"parser_bloggers not found"], 404, [], JSON_UNESCAPED_UNICODE);
        }

        if (! isset($parser_blogger->$column)) {
            return response()->json(['success'=>false, 'message'=>'Column not exists'], 400, [], JSON_UNESCAPED_UNICODE);
        }

        $parser_blogger->$column = $request->column_value;

        if ($parser_blogger->save()) {
            return response()->json(['success'=>true], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json('Failed to update', 400, [], JSON_UNESCAPED_UNICODE);
    }

    public function getIndexedColumnsValueWithCount($column)
    {
        $parser_bloggers = parser_bloggers::selectRaw("$column as value, COUNT($column) as count")
                            ->havingRaw("COUNT($column)")
                            ->groupBy("$column")
                            ->get();
        return response()->json($parser_bloggers, 200, [], JSON_UNESCAPED_UNICODE);
    }

    // SQL_EDITORS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    
    // SQL_EDITORS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.

    // CUSTOM_METHODS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    
    // CUSTOM_METHODS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.
}
