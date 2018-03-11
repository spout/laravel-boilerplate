<?php

namespace App\Mail;

use App\Models\Form;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormSend extends Mailable
{
    use Queueable, SerializesModels;

    public $form;
    public $data;

    public function __construct($form, $data)
    {
        $this->form = $form;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // TODO
        return $this
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->to('spoutnik@gmail.com')
            ->subject(_i("Contact"))
            ->view('emails.forms.send');
    }
}
