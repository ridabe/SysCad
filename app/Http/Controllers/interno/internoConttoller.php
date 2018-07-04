<?php

namespace App\Http\Controllers\interno;

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

class internoConttoller extends Controller
{


   public function abrirInterno(){

    //pagar dados de usuarios on line

       $pegarOnLine = new crud_usuario;
       $onLine = $pegarOnLine->localizaOnLine();
       $contagem = count( $onLine);

      //////////////////////////////


     $admin = session('admin');
    //verifica se uma seccao esta ativa
    if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
        //return view('login', compact('erros_bd'));
    }else{

           $totalForn =dbFornecedor::count();
           $totalCli =dbClientes::count();
           $totalprod =dbprodutos::count();
                 
  if ($admin == 1) {

               return view('admin.admin')->with(compact('confirmacao'))->with(compact('totalCli',$totalCli))->with(compact('totalForn',$totalForn))->with(compact('totalprod',$totalprod))->with(compact('onLine',$onLine))->with(compact('admin',$admin));
             } else {
              
              return view('interno.interno')->with(compact('confirmacao'))->with(compact('totalCli',$totalCli))->with(compact('totalForn',$totalForn))->with(compact('totalprod',$totalprod))->with(compact('onLine',$onLine))->with(compact('admin',$admin));
             }
                        
 
        //return view('interno.interno');
    }


   }


   //Criar PDF //Não esta sendo usado
   public function criaPdf()
{
    //$products = Product::all();
    $dadosCliente =dbClientes::all();
 


    return \PDF::loadView('interno.lista_cliente', compact('dadosCliente'))
                // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                ->stream();
}



public function trocarSenha(request $request)
{

  //pagar dados de usuarios on line

       $pegarOnLine = new crud_usuario;
       $onLine = $pegarOnLine->localizaOnLine();
       $contagem = count( $onLine);

      //////////////////////////////

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

               $admin = session('admin');

               $confirmacao = ['Senha Alterada com sucesso!!!'];
                     
                 
     return view('interno.interno')->with(compact('confirmacao'))->with(compact('totalCli',$totalCli))->with(compact('totalForn',$totalForn))->with(compact('totalprod',$totalprod))->with(compact('admin',$admin))->with(compact('onLine',$onLine));


      }

    }
}
