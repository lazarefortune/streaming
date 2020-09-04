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
                    ->subject('Confirmation du paiement')
                    ->greeting('Bonjour '. $this->user->name.' !')
                    ->line('Votre paiement a été confirmé.')
                    ->line('Nous avons bien reçu '.$this->stream->forfait_price.' Fcfa pour la commande de votre compte '.$this->stream->forfait_name.'')
                    ->action('Télécharger votre reçu', url('https://streaming.lazarefortune.com/mes-commandes'))
                    ->line('Vous allez recevoir un autre mail contenant vos identifiants de connexion à votre compte '.$this->stream->forfait_name)
                    ->line('Merci d\'avoir choisi notre service.');
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
            'user_name' => $this->user->name,
            'name' => $this->stream->name,
            'type' => $this->stream->forfait_type,
            'price' => $this->stream->forfait_price,
        ];
    }
}
