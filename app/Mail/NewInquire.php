<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewInquire extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $inquire; 

    public function __construct($inquire)
    {
        $this->inquire = $inquire;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from($this->inquire['email'], $this->inquire['fullname']);
        $this->to('Proprints.ph@gmail.com');
        $this->replyTo($this->inquire['email'], $this->inquire['name']);
        $this->subject('Asking or Inquiring about Pro Prints Enerprise');

        return $this->markdown('emails.inquire')
                        ->with('data',$this->inquire);
    }
}
