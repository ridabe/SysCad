<?php

namespace App\Mail;


use App\crud_usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class lembrarSenha extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
   
    public function __construct($user)
    {
        $this->user = $user;
    }

    
    public function build()
    {

       
        return $this->markdown('email.textoLembrarSenha')->subject('Alteração de Senha');
    }
}
