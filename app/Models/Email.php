<?php


namespace App\Models;


use App\Mail\ApplicationMail;

use Illuminate\Support\Facades\Mail;

class Email implements BaseApplication
{

    public $mail="test@mail.ru";

    public function save(){
        $mail=$this->mail;
        $subject="Applicition From ".$this->name;
        try {
            Mail::to($mail)->send(new ApplicationMail($this->name,$this->phone, $this->description));
        } catch (\Exception $e) {
            return response()->json(
                    [
                            'errors'=>['server'=>[$e->getMessage()]]
                    ],
                    500
            );
        }
        return $this;
    }
}
