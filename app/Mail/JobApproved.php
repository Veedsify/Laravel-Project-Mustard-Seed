<?php

namespace App\Mail;

use App\Models\MyJob;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobApproved extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public MyJob $myJob;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, MyJob $myJob)
    {
        $this->user = $user;
        $this->myJob = $myJob;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Job Approved',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.jobapproved',
            with: [
                'user' => $this->user,
                'myJob' => $this->myJob,
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
