<?php

namespace App\Events;

use App\OtpCode;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OtpGenerateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $otp_code;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(OtpCode $otp_code)
    {
        $this->otp_code = $otp_code;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
}
