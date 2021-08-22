<?php

namespace App\Repositories\AltrpRepositories\Eloquent;

use App\AltrpModels\test as Model;
use App\Repositories\AltrpRepositories\Interfaces\testRepositoryInterface;
use App\Repositories\Repository;
use Carbon\Carbon;

class testRepository extends Repository implements testRepositoryInterface
{
    protected function getModelClass()
    {
        return Model::class;
    }

    // CUSTOM_METHODS_BEGIN
    

    public function test()
    {
        $model = $this->model();
        $model = $model->with(['inner2']);
        $model = $model->select(['tests.title','tests.title_2']);
        $filters = [];
        if (request()->filters) {
            $_filters = json_decode(request()->filters, true);
            foreach ($_filters as $key => $value) {
                $filters[$key] = $value;
            }
        }
        if (count($filters)) $model = $model->whereLikeMany($filters);
        $model = $model->where([['tests.title','=',"1"]])
        ->where([['tests.title','=',"1"]]);
        $model = $model->groupBy('tests.title','tests.title_2','tests.id','tests.title3');
        $model = $model->get();
        return $model;
    }
    // CUSTOM_METHODS_END
}