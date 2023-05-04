<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$text)
    {
        $this->subject = $subject;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject($this->subject)
        ->view('email.welcome');
    }
}
