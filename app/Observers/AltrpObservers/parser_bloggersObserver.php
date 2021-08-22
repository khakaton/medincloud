<?php

namespace App\Observers\AltrpObservers;

use App\Altrp\Model;
// use App\Events\AltrpEvents\parser_bloggersEvent;
use App\Helpers\Classes\CurrentEnvironment;
use App\Jobs\RunRobotsJob;
use App\Observers\BaseObserver;
use App\Services\Robots\RobotsService;
use App\AltrpModels\parser_bloggers;
use Illuminate\Foundation\Bus\DispatchesJobs;

class parser_bloggersObserver extends BaseObserver
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
     * Handle the parser_bloggers "created" event.
     *
     * @param  \App\AltrpModels\parser_bloggers $parser_bloggers
     * @return void
     */
    public function created(parser_bloggers $parser_bloggers)
    {
        $model = Model::where('name', 'parser_bloggers')->first();
        $source = $model->altrp_sources->where('type', 'add')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $parser_bloggers,
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
     * Handle the parser_bloggers "updated" event.
     *
     * @param  \App\AltrpModels\parser_bloggers $parser_bloggers
     * @return void
     */
    public function updated(parser_bloggers $parser_bloggers)
    {
        $model = Model::where('name', 'parser_bloggers')->first();
        $source = $model->altrp_sources->where('type', 'update')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $parser_bloggers,
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
     * Handle the parser_bloggers "deleted" event.
     *
     * @param  \App\AltrpModels\parser_bloggers $parser_bloggers
     * @return void
     */
    public function deleted(parser_bloggers $parser_bloggers)
    {
        $model = Model::where('name', 'parser_bloggers')->first();
        $source = $model->altrp_sources->where('type', 'delete')->first();
        $columns = explode(',',$model->table->columns->implode('name',','));

        $data = [
            'model' => $model,
            'source' => $source,
            'columns' => $columns,
            'record' => $parser_bloggers,
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
     * Handle the parser_bloggers "restored" event.
     *
     * @param  \App\AltrpModels\parser_bloggers $parser_bloggers
     * @return void
     */
    public function restored(parser_bloggers $parser_bloggers)
    {
        //
    }

    /**
     * Handle the parser_bloggers "force deleted" event.
     *
     * @param  \App\AltrpModels\parser_bloggers $parser_bloggers
     * @return void
     */
    public function forceDeleted(parser_bloggers $parser_bloggers)
    {
        //
    }
}