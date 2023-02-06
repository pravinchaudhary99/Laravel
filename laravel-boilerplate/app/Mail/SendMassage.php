<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMassage extends Mailable
{
    use Queueable, SerializesModels;

    public $data,$path;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$path)
    {
        $this->data = $data;
        $this->path = $path;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $path = public_path('/uploads/');
        $email = $this->subject($this->data['subject'])->markdown('mail.mail')->with([
            "data" => $this->data,
            ]);
        if(!empty($this->data->cc)){
            $email->cc($this->data->cc);
        }
        if(!empty($this->path)){
            foreach ($this->path as $key => $value) {
                $email->attach($path . $value);
            }
        }
        return $email;
    }
}