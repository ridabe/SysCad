<?php

namespace App\Http\Controllers\interno;

use Session;
use App\dbFornecedor;
use App\dbClientes;
use App\dbProdutos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class internoConttoller extends Controller
{
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
                 
             
 return view('interno.interno')->with(compact('confirmacao'))->with(compact('totalCli',$totalCli))->with(compact('totalForn',$totalForn))->with(compact('totalprod',$totalprod));;
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


}
