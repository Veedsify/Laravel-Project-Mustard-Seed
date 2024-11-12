<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApprovalNotification extends Notification
{
    public function title(): string
    {
        return 'Approval Status Changed';
    }

    public function body(): string
    {
        return 'The item has been marked as received.';
    }

    public function icon(): string
    {
        return 'heroicon-o-check-circle';
    }

    public function success(): self
    {
        return $this;
    }
}
