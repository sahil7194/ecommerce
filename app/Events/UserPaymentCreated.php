<?php

namespace App\Events;

use App\Models\UserPayment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserPaymentCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userPayment;

    /**
     * Create a new event instance.
     */
    public function __construct(UserPayment $userPayment)
    {
        $this->userPayment = $userPayment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
