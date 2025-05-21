<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RecoveryPassword extends Mailable
{
    use Queueable, SerializesModels;
    private $recovery_code;
    public function __construct($random_recovery_code)
    {
        $this->recovery_code = $random_recovery_code;
    }

   
      public function build()
    {
        return $this->view('emails.recovery-password')
        ->subject('Recuperação de Senha')
        ->with(['recovery_code' => $this->recovery_code]);          
    }
        

}
