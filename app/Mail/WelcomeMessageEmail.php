<?php

namespace App\Mail;

use App\general_setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMessageEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */



    public function __construct($msg)
    {
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $gen = general_setting::first();
        return $this->view('frontend.mail.welcmeMessage')
            ->subject('afwa shopping')
            ->from($gen->site_email,$gen->site_name);
    }
}
