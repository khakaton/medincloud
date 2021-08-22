<?php

namespace App\Events\AltrpEvents;

use App\AltrpModels\media_altrp;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class media_altrpEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $media_altrp;

    /**
     * Create a new event instance.
     *
     * @param media_altrp $media_altrp
     * @return void
     */
    public function __construct(media_altrp $media_altrp)
    {
        $this->media_altrp = $media_altrp;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel("altrpchannel.media_altrp");
    }
}
