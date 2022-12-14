<?php

namespace App\Listeners;

use App\Mail\OtpRegenerateMail;
use App\Events\OtpGenerateEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToOtpRegenerate implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OtpGenerateEvent  $event
     * @return void
     */
    public function handle(OtpGenerateEvent $event)
    {
        Mail::to($event->otp_code->user->email)->send(new OtpRegenerateMail($event->otp_code));
    }
}
