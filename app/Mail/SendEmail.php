<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // if($this->email->from){
        //     return $this->from($this->email->from)
        //     ->subject($this->email->subject)
        //             ->view('email-template.first');
        // }else{
            return $this->subject($this->email->subject)
            ->view('email-template.first');
        // }
        
    }
}
