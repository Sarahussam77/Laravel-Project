<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\User;


class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mainUser;

    /**
     * Create a new message instance.
     */
    public function __construct( $mainUser)
    {
        $this->mainUser = $mainUser;
    }
    
   
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('pharmacysystem@gmail.com', 'Pharmacy-System'),
            subject: 'Verification',
                );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.verification',
            with: [
                'mainUser' => $this->mainUser,              
                
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            view()
        ];
    }
}
