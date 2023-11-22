<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMailHelper extends Mailable
{
    use Queueable, SerializesModels;

    public  $subject, $order, $orderItems ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $order, $orderItems)
    {
        $this->subject = $subject;
        $this->order = $order;
        $this->orderItems = $orderItems;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from($address = "mail@houseofeppagelia.com", $name = "Eppagelia")
        ->subject($this->subject)
        ->view('mail.orderconfirmation');
    }
    
}
