<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TraineePasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    public $username, $reset_url, $password_token_expire_time;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $reset_url, $password_token_expire_time)
    {
        $this->username = $username;
        $this->reset_url = $reset_url;
        $this->password_token_expire_time = $password_token_expire_time;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Trainee Password Reset',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email.trainee-password-reset',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
