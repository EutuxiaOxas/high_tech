<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactionCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Nuevo pago en el sitio web - High Tech Bearings";
    public $amount;
    public $account;
    public $reference;
    public $buyer;
    public $observations;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($amount, $account, $reference, $buyer, $observations){
        $this->amount       = $amount;
        $this->amount       = $account;
        $this->buyer        = $reference;
        $this->account      = $buyer;
        $this->observations = $observations;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.order-created');
    }
}
