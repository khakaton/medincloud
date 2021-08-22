<?php

namespace App\Events\AltrpEvents;

use App\AltrpModels\bloger;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class blogerEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $bloger;

    /**
     * Create a new event instance.
     *
     * @param bloger $bloger
     * @return void
     */
    public function __construct(bloger $bloger)
    {
        $this->bloger = $bloger;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel("altrpchannel.bloger");
    }
}
