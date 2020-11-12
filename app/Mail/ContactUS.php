<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUS extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$subject,$body)
    {
        $this->name=$name;
        $this->email=$email;
        $this->subject=$subject;
        $this->body=$body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // No need to pass argument because they are public in the class
        return $this->view('email.contact');
    }
}
