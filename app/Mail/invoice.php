<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class invoice extends Mailable
{
    use Queueable, SerializesModels;
  

    public $order_details;
    public $order;
    public $diliveryFree;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,$order_details,$diliveryFree)
    {
        $this->order = $order;
        $this->order_details = $order_details;
        $this->diliveryFree=$diliveryFree;

    }

  

    public function build()
    {
        return $this->subject('Mail from myproduct.lk')
                    ->view('emails.invoice');
    }

}
