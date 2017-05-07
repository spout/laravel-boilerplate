<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactSend extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    /**
     * ContactSend constructor.
     *
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->contact->email)
            ->to(config('mail.to.address'), config('mail.to.name'))
            ->subject($this->contact->subject)
            ->view('emails.contact.send');
    }
}
