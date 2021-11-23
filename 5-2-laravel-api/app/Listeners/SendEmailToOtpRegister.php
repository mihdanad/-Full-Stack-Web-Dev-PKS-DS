<?php

namespace App\Listeners;

use App\Mail\OtpRegisterMail;
use App\Events\OtpStoredEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToOtpRegister implements ShouldQueue
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
     * @param  OtpStoredEvent  $event
     * @return void
     */
    public function handle(OtpStoredEvent $event)
    {
        Mail::to($event->otp_code->user->email)->send(new OtpRegisterMail($event->otp_code));
    }
}
