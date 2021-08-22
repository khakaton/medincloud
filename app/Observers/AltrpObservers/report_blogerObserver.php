<?php

namespace App\Observers\AltrpObservers;

use App\Altrp\Model;
// use App\Events\AltrpEvents\report_blogerEvent;
use App\Helpers\Classes\CurrentEnvironment;
use App\Jobs\RunRobotsJob;
use App\Observers\BaseObserver;
use App\Services\Robots\RobotsService;
use App\AltrpModels\report_bloger;
use Illuminate\Foundation\Bus\DispatchesJobs;

class report_blogerObserver extends BaseObserver
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
     * Handle the report_bloger "created" event.
     *
     * @param  \App\AltrpModels\report_bloger $report_bloger
     * @return void
     */
    public function created(report_bloger $report_bloger)
    {
        $model = Model::where('name', 'report_bloger')->first();
        $source = $model->altrp_sources->where('type', 'add')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $report_bloger,
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
     * Handle the report_bloger "updated" event.
     *
     * @param  \App\AltrpModels\report_bloger $report_bloger
     * @return void
     */
    public function updated(report_bloger $report_bloger)
    {
        $model = Model::where('name', 'report_bloger')->first();
        $source = $model->altrp_sources->where('type', 'update')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $report_bloger,
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
     * Handle the report_bloger "deleted" event.
     *
     * @param  \App\AltrpModels\report_bloger $report_bloger
     * @return void
     */
    public function deleted(report_bloger $report_bloger)
    {
        $model = Model::where('name', 'report_bloger')->first();
        $source = $model->altrp_sources->where('type', 'delete')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $report_bloger,
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
     * Handle the report_bloger "restored" event.
     *
     * @param  \App\AltrpModels\report_bloger $report_bloger
     * @return void
     */
    public function restored(report_bloger $report_bloger)
    {
        //
    }

    /**
     * Handle the report_bloger "force deleted" event.
     *
     * @param  \App\AltrpModels\report_bloger $report_bloger
     * @return void
     */
    public function forceDeleted(report_bloger $report_bloger)
    {
        //
    }
}