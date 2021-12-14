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
    public $products;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($amount, $buyer, $products)
    {
        $this->amount    = $amount;
        $this->buyer     = $buyer;
        $this->products  = $products;
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
