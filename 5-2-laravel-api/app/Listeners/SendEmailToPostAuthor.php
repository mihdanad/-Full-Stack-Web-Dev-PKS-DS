<?php

namespace App\Listeners;

use App\Mail\PostAuthorMail;
use App\Events\CommentStoredEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToPostAuthor implements ShouldQueue
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
        Mail::to($event->comment->post->user->email)->send(new PostAuthorMail($event->comment));
    }
}
