<?php

namespace App\Notifications;
use App\User;
use App\Streaming;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $user;
    protected $stream;

    public function __construct(User $user, Streaming $stream)
    {
        $this->user = $user;
        $this->stream = $stream;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->line($this->user->name.' Votre paiement a été accepté.')
                    ->line('Nous avons reçu '.$this->stream->forfait_price.' Fcfa pour :.')
                    ->action('Récuperer vos identifiants', url('/'))
                    ->line('Merci d\'utiliser notre application!');
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
            'name' => $this->user->name,
            'type' => $this->stream->forfait_type,
            'price' => $this->stream->forfait_price,
            'price' => $this->stream->forfait_price,
        ];
    }
}
