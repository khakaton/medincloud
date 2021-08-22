<?php

namespace App\Events\AltrpEvents;

use App\AltrpModels\reward_types;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class reward_typesEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reward_types;

    /**
     * Create a new event instance.
     *
     * @param reward_types $reward_types
     * @return void
     */
    public function __construct(reward_types $reward_types)
    {
        $this->reward_types = $reward_types;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel("altrpchannel.reward_types");
    }
}
