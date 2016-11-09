<?php

namespace App\Mail;

use App\Src\Order\OrderRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmUserOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $emailToAdmin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $emailToAdmin = 0)
    {
        $this->order = $order;
        $this->emailToAdmin = $emailToAdmin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('order@meemonoon.com')->view('emails.order');
    }
}
