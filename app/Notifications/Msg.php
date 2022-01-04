<?php

namespace App\Notifications;

use App\Lib\MsgContent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Msg extends Notification
{
    use Queueable;

    protected $msg;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(MsgContent $msg)
    {
        $this->msg = $msg;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'phone' => $this->msg->phone,
            'name' => $this->msg->name,
            'email' => $this->msg->email,
            'content' => $this->msg->content,
        ];
    }
}
