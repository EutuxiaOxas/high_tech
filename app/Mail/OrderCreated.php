<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Nueva venta en el sitio web - High Tech Bearings";

    public $amount;
    public $buyer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($amount, $buyer)
    {
        $this->amount = $amount;
        $this->buyer  = $buyer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->view('mails.order-created');
    }
}
