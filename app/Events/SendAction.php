<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Nette\Utils\Arrays;

class SendAction
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ids = [];
    public $activity;
    public $payload;
    public $notification;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $ids, array $payload, $activity = true, $notification = true)
    {
        $this->ids = $ids;
        $this->payload = $payload;
        $this->activity = $activity;
        $this->notification = $notification;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
