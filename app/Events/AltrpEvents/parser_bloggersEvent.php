<?php

namespace App\Events\AltrpEvents;

use App\AltrpModels\parser_bloggers;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class parser_bloggersEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $parser_bloggers;

    /**
     * Create a new event instance.
     *
     * @param parser_bloggers $parser_bloggers
     * @return void
     */
    public function __construct(parser_bloggers $parser_bloggers)
    {
        $this->parser_bloggers = $parser_bloggers;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel("altrpchannel.parser_bloggers");
    }
}
