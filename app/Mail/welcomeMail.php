<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\CountrylistController;


class welcomeMail extends Mailable
{
    use Queueable, SerializesModels;

public $emailData;

    /**
     * Create a new message instance.
     */
    public function __construct($emailData)
    {
       $this->emailData = $emailData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): \Illuminate\Mail\Mailables\Envelope
{
    return (new Envelope())
        ->from('fgajera@gmail.com', 'first laramail')
        ->replyTo('falgunibabariya07@gmail.com')
        ->subject($this->emailData['subject']);
}

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
        view: 'mailfile' );
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
