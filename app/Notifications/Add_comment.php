<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class Add_comment extends Notification
{
    use Queueable;
    private $comment;
    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment, $user)
    {
        $this->comment = $comment;
        $this->user = $user;
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
    public function toDatabase($notifiable)
    {

        // dd($this->comment->parent_id);
        if ($this->comment->parent_id == null) {
            return [
                'id' => $this->comment->id,
                'order_id' => $this->comment->order_id,
                'title' => 'علق لك على منتجك الجديد',
                'user_fname' => $this->user->firstName,
                'user_lname' => $this->user->lastName,
                'user_img' => $this->user->photo,

            ];
        }
        return [
            'id' => $this->comment->id,
            'order_id' => $this->comment->order_id,
            'title' => 'رد على تعليقك',
            'user_fname' => $this->user->firstName,
            'user_lname' => $this->user->lastName,
            'user_img' => $this->user->photo,

        ];
    }
}
