<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyUser extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $verify;
    public $otp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($verify,$subject,$otp)
    {
        $this->verify = $verify;
        $this->subject = $subject;
        $this->otp = $otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $otp = $this->otp;
        $verify = $this->verify;

        return $this->subject($this->subject)->markdown('mail_view')->with([
            "otp" =>$this->otp,
            "verify" =>$this->verify
        ]);
    }
}