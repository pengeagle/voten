<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ConversationRead implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $contact_id;
    public $user_id;


    /**
    * Create a new event instance.
	*
    * @return void
    */
    public function __construct($contact_id, $user_id)
    {
        $this->contact_id = $user_id;
        $this->user_id = $contact_id;
    }

    /**
    *   Get the channels the event should broadcast on.
    *
    *   @return Channel|array
    */
    public function broadcastOn()
    {
        return new PrivateChannel('App.User.' . $this->user_id);
    }
}
