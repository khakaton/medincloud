<?php

namespace App\Events\AltrpEvents;

use App\AltrpModels\reward;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class rewardEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reward;

    /**
     * Create a new event instance.
     *
     * @param reward $reward
     * @return void
     */
    public function __construct(reward $reward)
    {
        $this->reward = $reward;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel("altrpchannel.reward");
    }
}
