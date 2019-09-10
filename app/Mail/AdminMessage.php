<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from = explode(',', env('ADMIN_EMAILS'));
        $this->from('badopiece.inquire@gmail.com', 'Badopiece Team');
        $this->to($this->request['user_email']);
        $this->replyTo($from, 'Badopiece Team');
        $this->subject('Replied from your message');

        return $this->markdown('emails.conversation')
                        ->with('data',$this->request);
    }
}
