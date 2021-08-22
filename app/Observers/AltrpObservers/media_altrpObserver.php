<?php

namespace App\Observers\AltrpObservers;

use App\Altrp\Model;
// use App\Events\AltrpEvents\media_altrpEvent;
use App\Helpers\Classes\CurrentEnvironment;
use App\Jobs\RunRobotsJob;
use App\Observers\BaseObserver;
use App\Services\Robots\RobotsService;
use App\AltrpModels\media_altrp;
use Illuminate\Foundation\Bus\DispatchesJobs;

class media_altrpObserver extends BaseObserver
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
     * Handle the media_altrp "created" event.
     *
     * @param  \App\AltrpModels\media_altrp $media_altrp
     * @return void
     */
    public function created(media_altrp $media_altrp)
    {
        $model = Model::where('name', 'media_altrp')->first();
        $source = $model->altrp_sources->where('type', 'add')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $media_altrp,
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
     * Handle the media_altrp "updated" event.
     *
     * @param  \App\AltrpModels\media_altrp $media_altrp
     * @return void
     */
    public function updated(media_altrp $media_altrp)
    {
        $model = Model::where('name', 'media_altrp')->first();
        $source = $model->altrp_sources->where('type', 'update')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $media_altrp,
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
     * Handle the media_altrp "deleted" event.
     *
     * @param  \App\AltrpModels\media_altrp $media_altrp
     * @return void
     */
    public function deleted(media_altrp $media_altrp)
    {
        $model = Model::where('name', 'media_altrp')->first();
        $source = $model->altrp_sources->where('type', 'delete')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $media_altrp,
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
     * Handle the media_altrp "restored" event.
     *
     * @param  \App\AltrpModels\media_altrp $media_altrp
     * @return void
     */
    public function restored(media_altrp $media_altrp)
    {
        //
    }

    /**
     * Handle the media_altrp "force deleted" event.
     *
     * @param  \App\AltrpModels\media_altrp $media_altrp
     * @return void
     */
    public function forceDeleted(media_altrp $media_altrp)
    {
        //
    }
}