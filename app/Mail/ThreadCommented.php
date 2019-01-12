<?php

namespace App\Mail;

use App\Models\ThreadMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ThreadCommented extends Mailable
{
    use Queueable, SerializesModels;

    public $thread_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ThreadMessage $message) {
        $this->thread_message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('mail.thread_commented')
	        ->to($this->thread_message->thread->user->email)
	        ->subject('Thread was commented');
    }
}
