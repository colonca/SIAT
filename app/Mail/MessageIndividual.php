<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class MessageIndividual extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $asunto;

    public function __construct($msg,$asunto)
    {
        $this->msg = $msg;
        $this->asunto = $asunto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.message')
            ->subject($this->asunto)->with('name','PEBI');
    }
}
