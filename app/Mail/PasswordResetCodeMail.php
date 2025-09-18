<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $code;
    public $formattedDate;
    public $formattedTime;

    public function __construct($user, string $code, string $formattedDate, string $formattedTime)
    {
        $this->user = $user;
        $this->code = $code;
        $this->formattedDate = $formattedDate;
        $this->formattedTime = $formattedTime;
    }

    public function build()
    {
        return $this->subject('Código para Recuperação de Senha')
                    ->view('emails.password_reset_code');
    }
}