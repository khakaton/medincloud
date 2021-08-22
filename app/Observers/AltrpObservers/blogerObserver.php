<?php

namespace App\Observers\AltrpObservers;

use App\Altrp\Model;
// use App\Events\AltrpEvents\blogerEvent;
use App\Helpers\Classes\CurrentEnvironment;
use App\Jobs\RunRobotsJob;
use App\Observers\BaseObserver;
use App\Services\Robots\RobotsService;
use App\AltrpModels\bloger;
use Illuminate\Foundation\Bus\DispatchesJobs;

class blogerObserver extends BaseObserver
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
     * Handle the bloger "created" event.
     *
     * @param  \App\AltrpModels\bloger $bloger
     * @return void
     */
    public function created(bloger $bloger)
    {
        $model = Model::where('name', 'bloger')->first();
        $source = $model->altrp_sources->where('type', 'add')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $bloger,
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
     * Handle the bloger "updated" event.
     *
     * @param  \App\AltrpModels\bloger $bloger
     * @return void
     */
    public function updated(bloger $bloger)
    {
        $model = Model::where('name', 'bloger')->first();
        $source = $model->altrp_sources->where('type', 'update')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $bloger,
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
     * Handle the bloger "deleted" event.
     *
     * @param  \App\AltrpModels\bloger $bloger
     * @return void
     */
    public function deleted(bloger $bloger)
    {
        $model = Model::where('name', 'bloger')->first();
        $source = $model->altrp_sources->where('type', 'delete')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $bloger,
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
     * Handle the bloger "restored" event.
     *
     * @param  \App\AltrpModels\bloger $bloger
     * @return void
     */
    public function restored(bloger $bloger)
    {
        //
    }

    /**
     * Handle the bloger "force deleted" event.
     *
     * @param  \App\AltrpModels\bloger $bloger
     * @return void
     */
    public function forceDeleted(bloger $bloger)
    {
        //
    }
}