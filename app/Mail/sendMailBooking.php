<?php

namespace App\Mail;

use App\Models\Booking_detail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMailBooking extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     protected $booking_detail;
    public function __construct(Booking_detail $booking_detail)
    {
        return $this->booking_detail = $booking_detail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME')),
            subject: 'Send Mail Booking',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'layouts.client.sendmailbooking',
            with:[
                'booking_detail' => $this->booking_detail
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
        return [];
    }
}
