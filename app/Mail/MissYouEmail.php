<?php

namespace App\Mail;

use App\Models\Client;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MissYouEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $url;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, string $url)
    {
        $this->user = $user;
        $this->url = $url;
    }
    public function build()
    {
        return $this->subject('We Miss You!')
                    ->view('emails.miss_you');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Miss You Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
