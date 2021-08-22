<?php

namespace App\Events\AltrpEvents;

use App\AltrpModels\user_altrp;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class user_altrpEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_altrp;

    /**
     * Create a new event instance.
     *
     * @param user_altrp $user_altrp
     * @return void
     */
    public function __construct(user_altrp $user_altrp)
    {
        $this->user_altrp = $user_altrp;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel("altrpchannel.user_altrp");
    }
}
