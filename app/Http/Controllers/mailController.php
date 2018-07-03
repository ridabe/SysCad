<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\lembrarSenha;
use App\Mail\novoUsuario;

class mailController extends Controller
{

	private $pegaEmail;

    public function index()
    {
    	//TEla principal do email

    	return view('index_mail');
    }

    public function getEmail() //Funcao get que retornara o email
    {
    	return $this->pegaEmail;

    }

    public function setEmail($emaildoCliente)
    {
    		$this->pegaEmail = $emaildoCliente;
    }


    public function mailSenha($emaildoCliente,$user)
    {


       //$textoEmail = new lembrarSenha();


    	
    	Mail::to($emaildoCliente->email)->send(new lembrarSenha($user)); //Esta e uma frma de enviar ja testado



/*Aqui podemos enviar informaçoes para a view
    	Mail::send('email.corpoEmail',[], function($message){

    			//$enderecos = [] //Crio esta array se qyuiser mais de um destinatario
    		$enviarPara = mailController::getEmail();//chamei a funcao da propria classe

    		$message->from('ricardo@algoritmum.com.br', $name = 'Ricardo Bene');
    		$message->to($enviarPara);
    		$message->subject('Nova Senha Sistema Ridabe');



    	});
*/
    
    }

     public function mailNovoUsuario($user)
    {

       
        Mail::to($user['email'])->send(new novoUsuario($user)); //Esta e uma frma de enviar ja testado


    
    }
}
