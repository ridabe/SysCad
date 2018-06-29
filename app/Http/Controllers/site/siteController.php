<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\hash;
use App\Http\Controllers\mailController;

use App\crud_usuario;
use App\dbFornecedor;
use App\dbClientes;
use App\dbProdutos;
use Session;

class siteController extends Controller
{
    //Controlar as rotas do site
    public function index()
    {
        return view('welcome');
    }


    public function login()
    {
       // return view('login');
        return $this->usuarioLogin();
    }

    public function usuarioLogin(){
        return view('login');
    }




//Area de cadastro de conta
    public function cadastro()
    {
        return view('cadastro');
    }


//area de verificação de dados

public function executarLogin(Request $request){


   // $formSenha = $request->input('formSenha');
    //$senhaHashed = Hash::make($formSenha);
    //VErificar se os dados do formularios estao corretos
    $this->validate($request,[
       'formEmail' => 'required',
        'formSenha' => 'required|between:6,15'


    ]);

//VErificar se o usuario tem acesso ao sistema
    $usuario = crud_usuario::where('email',$request->formEmail)->first();

if(count($usuario) == 0){
$erros_bd = ['Esta conta nao existe!!!'];

return view('login', compact('erros_bd'));

}

//verificar se a hash que chega aqui e igual a hash que esta no banco
if(Hash::check($request->formSenha,$usuario->senha)){
    //Criar uma sessão para poder logar na pagina restrito

   session::put('chave','validado');
   session::put('usuario',$usuario->usuario);

     $totalForn =dbFornecedor::count();
     $totalCli =dbClientes::count();
     $totalprod =dbprodutos::count();
           
   return view('interno.interno')->with(compact('totalCli',$totalCli))->with(compact('totalForn',$totalForn))->with(compact('totalprod',$totalprod));
//return redirect('interno/interno');


}else{
    $confirmacao = ['Senha Incorreta'];
    return view('login', compact('confirmacao'));
}


}//VErificação do login

//Destruir a sessao
    public function logout()
    {
        session::flush();
        //$confirmacao = ['Obrigado por usar nosso sistema!!'];
        return redirect('login');
    }


    public function executaCriarConta(Request $request){
         //VErificar se os dados do formularios estao corretos
         $this->validate($request,[
            'formCadNome' => 'required|between:3,30|alpha_num',
            'formCadEmail' => 'required',
            'formCadSenha' => 'required|between:6,15',
            'formCadSenhaRepetir' => 'required|same:formCadSenha',// Aqui verifica se as senha sao iguais
            'contratoCheck' => 'accepted'


        ]);

            //Checar se ja existe este usuario no banco

            $dados = crud_usuario::where('usuario',"=",$request->formCadNome)
                                ->orWhere('email',"=",$request->formCadEmail)->get();
            if($dados->count() !=0){
                $erros_bd = ['Este usuario ja esta Cadastrado!'];
                return view('cadastro', compact('erros_bd'));
            }else{
                //Fazer uma incersao no banco

                $inserir = new crud_usuario;
                $inserir->usuario = $request->formCadNome;
                $inserir->email = $request->formCadEmail;
                $inserir->senha = Hash::make($request->formCadSenha);
                $inserir->save();

                $confirmacao = ['Dados Gravados Com sucesso!!'];
                return view('login', compact('confirmacao'));
            }


    }//Verificação do cadastro


//Area de recuperacao de senha
    public function recupera_senha()//Direciona para tela de relembrar senha
    {
        return view('index_mail');
    }




    public function executaRecuperarSenha(Request $request){
        //VErificar se os dados do formularios estao corretos
        $this->validate($request,[
            'formEmail' => 'required|email',

        ]);

        $email = $request->formEmail; //pega o campo do formulario
        $pegarEmail = new crud_usuario;//Estancia a classe model com a inforacao do banco
      
       $respostaEmail = $pegarEmail->localizaEmail($email); //pega a função que criei na model do banco

       

       if (!isset($respostaEmail->email)) // se existir o email na consulta vai para a funçao de enviar email senao ele volta para tela de relembrar senha com a mensagem de erro
       {

         $erros_bd = ['Este usuário nao existe!!!'];

            return view('index_mail', compact('erros_bd'));

       } else {

           $enviaEmail = new  mailController; //Chamei a classe do email controller que tem as configuracoes das mensagens
           $enviaEmail->setEmail($email);//Enviei o email para outra classe
           $enviaEmail-> mailSenha(); //estanciei o metodo que contem o endereco do email outr classe



           $confirmacao = ['Email enviado Com sucesso!!'];
                return view('login', compact('confirmacao'));
       }
       

     

      



   

      
       

       
        
        //return 'DEu certo';
    }
    //_______________________________
}
