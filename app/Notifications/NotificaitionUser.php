<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;

class NotificaitionUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $event;
    public function __construct(array $event)
    {
        $this->event=$event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // $title = 'Có người đăng ký';
        // if(isset($this->event['title'])) {
        //     $title = $this->event['title'];
        // }
        // $url = '/';
        // if(isset($this->event['id'])) {
        //     $url = route('student/info', ['id' => $this->event['id']]);
        // }
        // $description = '';
        // if(isset($this->event['id']))
        // {
        //     $description = $this->event['description'];
        // }
        // return (new MailMessage)
        //             ->line($title)
        //             ->action('Xem chi tiết', $url)
        //             ->line($description)
        //             ->subject('Thông báo sự kiện mới');
    }

    public function toDatabase($notifiable) {
        // return [
        //     'repliedTime'=>Carbon::now();
        // ];
    }

    public function toBroadcast($notifiable){
        dd(123);
        return new BroadcastMessage([
                'content_event' => $this->event->entent_event
            ]);
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
}
