<?php

namespace App\Mail;

use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PropertiesNotificationSend extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * PropertiesSendEmails constructor.
     *
     * @param Email $email
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->to($this->email->to)
            ->subject($this->email->subject)
            ->text('emails.properties.notification-send');
    }
}
