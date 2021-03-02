<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationMail extends Mailable
{
    use Queueable, SerializesModels;


    public $text;

    public $name;
    public $phone;
    public $subject="New Application";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$phone,$description)
    {
        $this->name=$name;
        $this->text = $description;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.application')->with(['name'=>$this->subject,'text' => $this->text])->subject($this->subject);
    }
}
