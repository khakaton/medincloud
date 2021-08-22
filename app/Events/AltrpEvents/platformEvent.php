<?php

namespace App\Events\AltrpEvents;

use App\AltrpModels\platform;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class platformEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $platform;

    /**
     * Create a new event instance.
     *
     * @param platform $platform
     * @return void
     */
    public function __construct(platform $platform)
    {
        $this->platform = $platform;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel("altrpchannel.platform");
    }
}
