<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class newReplyReciever extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $mail, $replies, $studentView;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $mail, $replies, $studentView)
    {
        $this->user = $user;
        $this->mail = $mail;
        $this->replies = $replies;
        $this->studentView = $studentView;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Reply - ' . $this->mail->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.newReplyReciever',
            with: [
                'user' => $this->user,
                'mail' => $this->mail,
                'replies' => $this->replies,
                'studentView' => $this->studentView,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
