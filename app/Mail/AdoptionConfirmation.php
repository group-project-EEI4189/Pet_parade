<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdoptionConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $adoption;

    public function __construct($adoption)
    {
        $this->adoption = $adoption;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pet Parade Adoption Request Confirmation',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.adoptionconfirmation',
            with: [
                'adoption' => $this->adoption,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
