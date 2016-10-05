<?php

namespace App\Events;

use App\Core\Services\Payment\PrimaryPayment;
use App\Src\Cart\Cart;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewOrder
{
    use SerializesModels;
    public $payment;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Cart $cart, $orderDetails)
    {
        $this->payment = new PrimaryPayment($cart, $orderDetails);
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
