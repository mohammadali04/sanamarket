<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentNotification extends Notification
{
    use Queueable;
    public $product;
    public $comment;

    /**
     * Create a new notification instance.
     */
    public function __construct($product,$comment)
    {
        $this->product=$product;
        $this->comment=$comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url=('/product/index/'.$this->product->id);
        return (new MailMessage)
                    ->line('ثبت شد '.$this->product->name.'عزیز نظر شما برای '.$this->comment->name.'سلام')
                    ->action('جزِِِئیات نظر خود را بدانید', $url)
                    ->line('پس از تایید ادمین نظر شما به نمایش در خواهد آمد');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
