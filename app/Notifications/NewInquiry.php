<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Support\Carbon;

class NewInquiry extends Notification
{
    use Queueable;
    public $inquiry;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($inquiry)
    {
        $this->inquiry = $inquiry;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'createdTime' => Carbon::now(),
            'inquiry' => $this->inquiry,
            'type' => 'inquiry'
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage ([
            'createdTime' => Carbon::now(),
            'inquiry' => $this->inquiry,
            'type' => 'inquiry'
        ]);
    }
}
