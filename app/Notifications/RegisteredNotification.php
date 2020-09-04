<?php

namespace App\Notifications;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;

class RegisteredNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $user;

    public function __construct(User $user)
    {
        //
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }
    public function toMail($notifiable)
    {
        return (new MailMessage)
                        ->subject('Inscription réussie')
                        ->greeting('Bonjour '.$this->user->name)
                        ->line('Vous venez de vous inscrire au service Streaming de Web Creation.')
                        ->action('Consulter nos offres', url('https://streaming.lazarefortune.com'))
                        ->line('Merci d\'avoir choisi notre service.')
                        ->line('')
                        ->line('Si vous n\'êtes pas à l\'origine de cette inscription veuillez contacter le support technique en cliquant sur le lien suivant: https://streaming.lazarefortune.com/contact');
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
        ];
    }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage())
                    ->content('Vous avez bien été enregistré sur notre site !');
    }
}
