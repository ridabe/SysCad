<?php

namespace App\Http\Controllers\admin;

use Session;
use App\dbFornecedor;
use App\dbClientes;
use App\dbProdutos;
use App\crud_usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\hash;
use App\Http\Controllers\mailController;
use App\Http\Controllers\Diversos;
use PDF;

class adminController extends Controller
{


 //Controlar as rotas do site

   //pagar dados de usuarios on line

     $pegarOnLine = new crud_usuario;

     $onLine = $pegarOnLine->localizaOnLine();

      $contagem = count( $onLine);

      //////////////////////////////




 public function index()
    {
        if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
       
    }else{

      $admin = session('admin');
        
            $dadosUsuario =crud_usuario::all(); 

        return view('admin.lista_usuario')->with(compact('dadosUsuario',$dadosUsuario))->with(compact('admin',$admin));
        }
    }


     public function cadastroUsuario()
    {
      $admin = session('admin');
        return view('admin.cad_usuario')->with(compact('admin',$admin));
    }


    public function executaCriarConta(Request $request)
    {

       $admin = session('admin');

         //VErificar se os dados do formularios estao corretos
         $this->validate($request,[
            'formCadNome' => 'required|between:3,30|alpha_num',
            'formCadEmail' => 'required'
            
            
        ]);

        //'contratoCheck' => 'accepted' (se tiver um botao par aceitar as regras do site) 
         //'formCadSenha' => 'required|between:6,15',
           // 'formCadSenhaRepetir' => 'required|same:formCadSenha'// Aqui verifica se as senha sao iguais

            //Checar se ja existe este usuario no banco

            $dados = crud_usuario::Where('email',"=",$request->formCadEmail)->get();
            if($dados->count() !=0){

                $dadosUsuario =crud_usuario::all();
                $erros_bd = ['Este usuario ja esta Cadastrado!'];
                return view('admin.lista_usuario')->with (compact('erros_bd',$erros_bd))->with(compact('dadosUsuario',$dadosUsuario))->with(compact('admin',$admin));
            }else{
                //Fazer uma incersao no banco

 //GErar uma nova senha
                $geraSenha = new Diversos(); //Classe Criada para ser usada como um tipo de Helper
                $novaSenha = $geraSenha->geraSenha(9);
                
                $inserir = new crud_usuario;
                $inserir->usuario = $request->formCadNome;
                $inserir->email = $request->formCadEmail;
                $inserir->senha = Hash::make($novaSenha);
                $inserir->senha_provisoria = $novaSenha;
                $inserir->save();


                //Enviar email para o novo usuario
                  $usuario = $request->formCadNome;
                  $email = $request->formCadEmail;
                  

                  //Criar o user pra passar os dados para o email
                   $pegaDados = new crud_usuario;
                

                  $user =  ([
                  'user' => $usuario,
                  'email' => $email,
                  'senha' => $novaSenha
                  ]);


                  $enviaEmail = new  mailController; //Chamei a classe do email controller que tem as configuracoes das mensagens
                 //$enviaEmail->setEmail($email);//Enviei o email para outra classe
                 $enviaEmail-> mailNovoUsuario($user); //estanciei o metodo que contem o endereco do email e a funcao para enviar.


                //////////////////////////////////

                $confirmacao = ['Usuário Add com sucesso!!'];

            
        $dadosUsuario =crud_usuario::all();
        
         
        return view('admin.lista_usuario')->with (compact('confirmacao'))->with(compact('dadosUsuario',$dadosUsuario))->with(compact('admin',$admin));
            }


    }//Verificação do cadastro



   public function abrirInterno(){
    //verifica se uma seccao esta ativa
    if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
        //return view('login', compact('erros_bd'));
    }else{

           $totalForn =dbFornecedor::count();
           $totalCli =dbClientes::count();
           $totalprod =dbprodutos::count();
                 
             
 return view('admin.admin')->with(compact('confirmacao'))->with(compact('totalCli',$totalCli))->with(compact('totalForn',$totalForn))->with(compact('totalprod',$totalprod))->with(compact('onLine',$onLine));
        //return view('interno.interno');
    }


   }

    public function show($id_usuario)//Mostra um form com as informações para editar
    {
            //Validação

                     if(!Session::has('chave')){
                    $erros_bd = ['Voce nao tem permissão!!!'];
                    return redirect('login');
                    //return view('login', compact('erros_bd'));
                      }
            //Fim da Validação

                      $admin = session('admin');

        $dadosUsuario =crud_usuario::find($id_usuario); 


        return view('admin.show_usuario')->with(compact('dadosUsuario',$dadosUsuario))->with(compact('admin',$admin));

    }


    public function update(Request $request)
    {
        
         $usuario = new crud_usuario;
        
              $id_usuario = $request->id_usuario;


              if ($request->adminCheck == 1) {
               $admincheck = 1;
              } else {
                 $admincheck = 0;
              }
              



        $usuario =crud_usuario::find($id_usuario);

        $usuario->usuario = $request->nome;
        $usuario->email = $request->email;
        $usuario->admin = $admincheck;
        
       
        $usuario->save();
        
//Validação

         if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
        //return view('login', compact('erros_bd'));
          }
//Fim da Validação

        $confirmacao = ['Dados Atualizados com sucesso!!!'];

            
        $dadosUsuario =crud_usuario::all();
         $admin = session('admin');


          $confirmacao = ['Dados Alterados com sucesso!!!'];
        return view('admin.lista_usuario')->with (compact('confirmacao'))->with(compact('dadosUsuario',$dadosUsuario))->with(compact('admin',$admin));
    }





public function trocarSenha(request $request)
{


  $this->validate($request,[
       'senha' => 'required'
       
    ]);
  $email = $request->email;
  $senha = $request->senha;

  $pegaDados = new crud_usuario();
  $dados= $pegaDados->localizaEmail($email);

  $dados->senha = Hash::make($senha);
  $dados->senha_provisoria = '';
  $dados->save();

      if(!Session::has('chave')){
            $erros_bd = ['Voce nao tem permissão!!!'];
            return redirect('login');
            //return view('login', compact('erros_bd'));
        }else{

          $totalForn =dbFornecedor::count();
               $totalCli =dbClientes::count();
               $totalprod =dbprodutos::count();

               $confirmacao = ['Senha Alterada com sucesso!!!'];
                     
                 
     return view('admin.admin')->with(compact('confirmacao'))->with(compact('totalCli',$totalCli))->with(compact('totalForn',$totalForn))->with(compact('totalprod',$totalprod))->with(compact('onLine',$onLine));


      }

    }


    public function destroy($id)
    {
        //Validação

         if(!Session::has('chave')){
            $erros_bd = ['Voce nao tem permissão!!!'];
            return redirect('login');
            //return view('login', compact('erros_bd'));
          }
        //Fim da Validação
         $pegarUsuario =crud_usuario::find($id);
         $pegarUsuario->delete();

         $dadosUsuario =crud_usuario::all();
         $admin = session('admin');
          $confirmacao = ['Dados Deletados com sucesso!!!'];
        return view('admin.lista_usuario')->with (compact('confirmacao'))->with(compact('dadosUsuario',$dadosUsuario))->with(compact('admin',$admin));
      }







     public function imprimeUsuario($id)//Imprimir Produtos
    {
            $dadosUsuario =crud_usuario::find($id);



           
            // $dados = dbFornecedor::select('*')->where('id_forn', '=', $id_forn)->get();

       
        //Validação

         if(!Session::has('chave')){
            $erros_bd = ['Voce nao tem permissão!!!'];
            return redirect('login');
            //return view('login', compact('erros_bd'));
          }
        //Fim da Validação


         return \PDF::loadView('admin.imprime_usuario',compact('dadosUsuario','$dadosUsuario'))->stream();// Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
         
          
       //return view('interno.imprime_cliente')->with(compact('pegarCliente'));
       
    }
}
