<?php

namespace App\Observers\AltrpObservers;

use App\Altrp\Model;
// use App\Events\AltrpEvents\reward_typesEvent;
use App\Helpers\Classes\CurrentEnvironment;
use App\Jobs\RunRobotsJob;
use App\Observers\BaseObserver;
use App\Services\Robots\RobotsService;
use App\AltrpModels\reward_types;
use Illuminate\Foundation\Bus\DispatchesJobs;

class reward_typesObserver extends BaseObserver
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
     * Handle the reward_types "created" event.
     *
     * @param  \App\AltrpModels\reward_types $reward_types
     * @return void
     */
    public function created(reward_types $reward_types)
    {
        $model = Model::where('name', 'reward_types')->first();
        $source = $model->altrp_sources->where('type', 'add')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $reward_types,
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
     * Handle the reward_types "updated" event.
     *
     * @param  \App\AltrpModels\reward_types $reward_types
     * @return void
     */
    public function updated(reward_types $reward_types)
    {
        $model = Model::where('name', 'reward_types')->first();
        $source = $model->altrp_sources->where('type', 'update')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $reward_types,
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
     * Handle the reward_types "deleted" event.
     *
     * @param  \App\AltrpModels\reward_types $reward_types
     * @return void
     */
    public function deleted(reward_types $reward_types)
    {
        $model = Model::where('name', 'reward_types')->first();
        $source = $model->altrp_sources->where('type', 'delete')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $reward_types,
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
     * Handle the reward_types "restored" event.
     *
     * @param  \App\AltrpModels\reward_types $reward_types
     * @return void
     */
    public function restored(reward_types $reward_types)
    {
        //
    }

    /**
     * Handle the reward_types "force deleted" event.
     *
     * @param  \App\AltrpModels\reward_types $reward_types
     * @return void
     */
    public function forceDeleted(reward_types $reward_types)
    {
        //
    }
}