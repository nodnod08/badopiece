<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTransaction extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $transaction;

    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from('badopiece.store@gmail.com', 'Badopiece Collection');
        $this->attachData(base64_decode($this->transaction['data']), 'Transaction.pdf', ['mime' => 'application/pdf']);
        $this->to($this->transaction['email']);
        $this->subject('Thank you for purchasing Badopiece Collection product(s).');

        return $this->markdown('emails.sendTransaction')
                        ->with('data',$this->transaction);
    }
}
