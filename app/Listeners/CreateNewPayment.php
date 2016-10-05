<?php

namespace App\Listeners;

use App\Core\Services\Payment\PrimaryPaymentInterface;
use App\Events\NewOrder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateNewPayment
{
    protected $payment;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  NewOrder $event
     * @return void
     */
    public function handle(NewOrder $event)
    {
        return $event->payment->proccedPayment();
    }
}
