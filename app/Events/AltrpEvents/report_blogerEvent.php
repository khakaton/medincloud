<?php

namespace App\Events\AltrpEvents;

use App\AltrpModels\report_bloger;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class report_blogerEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $report_bloger;

    /**
     * Create a new event instance.
     *
     * @param report_bloger $report_bloger
     * @return void
     */
    public function __construct(report_bloger $report_bloger)
    {
        $this->report_bloger = $report_bloger;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel("altrpchannel.report_bloger");
    }
}
