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

//public $infoUsuarios = new crud_usuario;



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
                 
             
 return view('admin.admin')->with(compact('confirmacao'))->with(compact('totalCli',$totalCli))->with(compact('totalForn',$totalForn))->with(compact('totalprod',$totalprod));;
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
                     
                 
     return view('admin.admin')->with(compact('confirmacao'))->with(compact('totalCli',$totalCli))->with(compact('totalForn',$totalForn))->with(compact('totalprod',$totalprod));


      }

    }
}
