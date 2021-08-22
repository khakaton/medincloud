<?php

namespace App\Events\AltrpEvents;

use App\AltrpModels\reward_type;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class reward_typeEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reward_type;

    /**
     * Create a new event instance.
     *
     * @param reward_type $reward_type
     * @return void
     */
    public function __construct(reward_type $reward_type)
    {
        $this->reward_type = $reward_type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel("altrpchannel.reward_type");
    }
}
