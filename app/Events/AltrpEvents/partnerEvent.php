<?php

namespace App\Events\AltrpEvents;

use App\AltrpModels\partner;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class partnerEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $partner;

    /**
     * Create a new event instance.
     *
     * @param partner $partner
     * @return void
     */
    public function __construct(partner $partner)
    {
        $this->partner = $partner;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel("altrpchannel.partner");
    }
}
