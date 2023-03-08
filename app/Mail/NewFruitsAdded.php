<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewFruitsAdded extends Mailable
{
    use Queueable, SerializesModels;
    public $new_fruits;
    /**
     * Create a new message instance.
     */
    public function __construct($new_fruits)
    {
        $this->new_fruits = $new_fruits;
    }
    
    public function build()
    {
        return $this->subject('New Fruits Added')
                    ->view('emails.new_fruits_added')
                    ->with(['new_fruits' => $this->new_fruits]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Fruits Added',
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
