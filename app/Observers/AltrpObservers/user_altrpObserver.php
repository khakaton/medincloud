<?php

namespace App\Observers\AltrpObservers;

use App\Altrp\Model;
// use App\Events\AltrpEvents\user_altrpEvent;
use App\Helpers\Classes\CurrentEnvironment;
use App\Jobs\RunRobotsJob;
use App\Observers\BaseObserver;
use App\Services\Robots\RobotsService;
use App\AltrpModels\user_altrp;
use Illuminate\Foundation\Bus\DispatchesJobs;

class user_altrpObserver extends BaseObserver
{
    use DispatchesJobs;

    /**
     * @var RobotsService
     */
    protected $robotsService;

    /**
     * @var CurrentEnvironment|mixed
     */
    protected $currentEnvironment;

    /**
     * test_postObserver constructor.
     * @param RobotsService $robotsService
     */
    public function __construct(RobotsService $robotsService)
    {
        $this->robotsService = $robotsService;
        $this->currentEnvironment = CurrentEnvironment::getInstance();
    }

    /**
     * Handle the user_altrp "created" event.
     *
     * @param  \App\AltrpModels\user_altrp $user_altrp
     * @return void
     */
    public function created(user_altrp $user_altrp)
    {
        $model = Model::where('name', 'user_altrp')->first();
        $source = $model->altrp_sources->where('type', 'add')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $user_altrp,
            'action_type' => 'create'
        ];

        $robots = $this->robotsService->getCurrentModelRobots($model);

        $this->dispatch(new RunRobotsJob(
            $robots,
            $this->robotsService,
            $data,
            'created',
            $this->currentEnvironment
        ));
    }

    /**
     * Handle the user_altrp "updated" event.
     *
     * @param  \App\AltrpModels\user_altrp $user_altrp
     * @return void
     */
    public function updated(user_altrp $user_altrp)
    {
        $model = Model::where('name', 'user_altrp')->first();
        $source = $model->altrp_sources->where('type', 'update')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $user_altrp,
            'action_type' => 'update'
        ];

        $robots = $this->robotsService->getCurrentModelRobots($model);

        $this->dispatch(new RunRobotsJob(
            $robots,
            $this->robotsService,
            $data,
            'updated',
            $this->currentEnvironment
        ));
    }

    /**
     * Handle the user_altrp "deleted" event.
     *
     * @param  \App\AltrpModels\user_altrp $user_altrp
     * @return void
     */
    public function deleted(user_altrp $user_altrp)
    {
        $model = Model::where('name', 'user_altrp')->first();
        $source = $model->altrp_sources->where('type', 'delete')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $user_altrp,
            'action_type' => 'delete'
        ];

        $robots = $this->robotsService->getCurrentModelRobots($model);

        $this->dispatch(new RunRobotsJob(
            $robots,
            $this->robotsService,
            $data,
            'deleted',
            $this->currentEnvironment
        ));
    }

    /**
     * Handle the user_altrp "restored" event.
     *
     * @param  \App\AltrpModels\user_altrp $user_altrp
     * @return void
     */
    public function restored(user_altrp $user_altrp)
    {
        //
    }

    /**
     * Handle the user_altrp "force deleted" event.
     *
     * @param  \App\AltrpModels\user_altrp $user_altrp
     * @return void
     */
    public function forceDeleted(user_altrp $user_altrp)
    {
        //
    }
}