<?php

namespace App\Jobs;

use App\Mail\OrderConfirmationMailHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOrderConfirmationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subject, $order, $orderItems;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Logic to send the email
        Mail::to($this->order->email)
            ->send(new OrderConfirmationMailHelper($this->subject, $this->order, $this->orderItems));
    }
}
