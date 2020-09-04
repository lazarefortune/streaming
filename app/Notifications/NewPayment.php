<?php

namespace App\Notifications;
use App\Streaming;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPayment extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     protected $stream;

     public function __construct(Streaming $stream)
     {
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
        return ['mail'];
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
                    ->subject('Nouveau Paiement')
                    ->line('Nouveau paiement sur le site.')
                    ->line('L\'utilisateur "'.$this->stream->user->name.'" vient d\'achever la procédure de paiement.')
                    ->line('Détails: ')
                    ->line('Commande numéro '.$this->stream->id)
                    ->line('Compte : '.$this->stream->forfait_name)
                    ->line('Montant : '.$this->stream->forfait_price.' Fcfa')
                    ->action('Consulter', url('http://streaming.lazarefortune.com/admin/streaming/command-list/'.$this->stream->id))
                    ->line('Gérer ça rapidement!');
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
