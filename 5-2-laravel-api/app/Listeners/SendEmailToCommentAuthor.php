<?php

namespace App\Listeners;

use App\Mail\CommentAuthorMail;
use App\Events\CommentStoredEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToCommentAuthor implements ShouldQueue
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
     * @param  CommentStoredEvent  $event
     * @return void
     */
    public function handle(CommentStoredEvent $event)
    {
        Mail::to($event->comment->user->email)->send(new CommentAuthorMail($event->comment));
    }
}
