<?php

namespace App\Http\Controllers\interno;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\dbFornecedor;
use App\dbClientes;
use App\dbProdutos;
use Session;

class produtosController extends Controller
{
    
    public function index()
    {
        if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
       
    }else{
        
            $dadosProdutos =dbProdutos::all(); 

            $admin = session('admin');

        return view('interno.lista_produtos')->with(compact('dadosProdutos',$dadosProdutos))->with(compact('admin',$admin));
        }
    }

    
    public function create() //Mostra o formulario para inserção de dados
    {
        if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
        //return view('login', compact('erros_bd'));
    }else{  

          $dadosForn =dbFornecedor::all();


           
        $admin = session('admin');
        return view('interno.cad_produtos')->with(compact('dadosForn',$dadosForn))->with(compact('admin',$admin));
      
        }
    }

    
    public function store(Request $request)//insere os dados vendo do formulario no BD
    {
        

       
            $produtos = new dbProdutos;

                        

        $produtos->codint = $request->codigo;
        $produtos->ean = $request->ean;
        $produtos->nomeprod = $request->produto;
        $produtos->descricao = $request->descricao;
        $produtos->codforn = $request->codigofornecedor;
        $produtos->precocusto = $request->precocusto;
        $produtos->precovenda = $request->precovenda;
        $produtos->sessao = $request->secao;
        $produtos->quantidade = $request->quantidade;
        $produtos->status1 = $request->status1;
       
        $produtos->save();
        
//Validação

         if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
        //return view('login', compact('erros_bd'));
          }
//Fim da Validação

        $confirmacao = ['Dados Gravados com sucesso!!!'];

           $totalForn =dbFornecedor::count();
           $totalCli =dbClientes::count();
           $totalprod =dbprodutos::count();
           $admin = session('admin');
                 
             
        return view('interno.interno')
        ->with(compact('confirmacao'))
        ->with(compact('totalCli',$totalCli))
        ->with(compact('totalForn',$totalForn))
        ->with(compact('totalprod',$totalprod))
        ->with(compact('admin',$admin));
       
    }




    
    public function show($id)//Cria um formulario para edicao dos dados
    {

        
       $dados =dbProdutos::find($id);

       $status = $dados->status1;

       if ($status == 1) {
           $descStatus = 'Ativo';
           $valorStatus = '1';
       } else {
           $descStatus = 'Não Ativo';
           $valorStatus = '0';
       }
       
       
           
            // $dados = dbFornecedor::select('*')->where('id_forn', '=', $id_forn)->get();

        //Validação

       $id = $dados->codforn;

        $dadosForn =dbFornecedor::find($id);
        $totalForn =dbFornecedor::all();

        

                 if(!Session::has('chave')){
                    $erros_bd = ['Voce nao tem permissão!!!'];
                    return redirect('login');
                    //return view('login', compact('erros_bd'));
                  }
        //Fim da Validação
                  $admin = session('admin');
            
    return view('interno.show_Produtos')->with(compact('dadosForn',$dadosForn))->with(compact('dados',$dados))->with(compact('totalForn',$totalForn))->with(compact('descStatus',$descStatus))->with(compact('valorStatus',$valorStatus))->with(compact('admin',$admin));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request)
    {
        
         $produtos = new dbProdutos;
             $fornecedor = new dbFornecedor;

              $id = $request->id;



        $produtos =dbProdutos::find($id);

        $produtos->codint = $request->codigo;
        $produtos->ean = $request->ean;
        $produtos->nomeprod = $request->produto;
        $produtos->descricao = $request->descricao;
        $produtos->codforn = $request->fornecedorescod;
        $produtos->precocusto = $request->precocusto;
        $produtos->precovenda = $request->precovenda;
        $produtos->sessao = $request->secao;
        $produtos->quantidade = $request->quantidade;
        $produtos->status1 = $request->status1;
       
        $produtos->save();
        
//Validação

         if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
        //return view('login', compact('erros_bd'));
          }
//Fim da Validação

        $confirmacao = ['Dados Atualizados com sucesso!!!'];

            $totalForn =dbFornecedor::count();
           $totalCli =dbClientes::count();
           $totalprod =dbprodutos::count();
         $dadosProdutos =dbprodutos::all();
         $admin = session('admin');

          $confirmacao = ['Dados Alterados com sucesso!!!'];
        return view('interno.lista_produtos')->with (compact('confirmacao'))->with(compact('dadosProdutos'))->with(compact('admin',$admin));
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
         $pegarProdutos =dbProdutos::find($id);
         $pegarProdutos->delete();
         $dadosProdutos =dbprodutos::all();
         $admin = session('admin');
          $confirmacao = ['Dados Deletados com sucesso!!!'];
        return view('interno.lista_produtos')->with (compact('confirmacao'))->with(compact('dadosProdutos'))->with(compact('admin',$admin));
      }


     public function imprimeProdutos($id)//Imprimir Produtos
    {
            $dados =dbProdutos::find($id);



       $status = $dados->status1;



       if ($status == 1) {
           $descStatus = 'Ativo';
           
       } else {
           $descStatus = 'Não Ativo';
           
       }
       
       
           
            // $dados = dbFornecedor::select('*')->where('id_forn', '=', $id_forn)->get();

        //Validação

       $id = $dados->codforn;



        $dadosForn =dbFornecedor::find($id);


        //Validação

         if(!Session::has('chave')){
            $erros_bd = ['Voce nao tem permissão!!!'];
            return redirect('login');
            //return view('login', compact('erros_bd'));
          }
        //Fim da Validação

          $id = $dados->id;
         
         $dados =dbProdutos::find($id);



          return \PDF::loadView('interno.imprime_produtos',compact('dados','$descStatus'))->stream();// Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
         
          
       //return view('interno.imprime_cliente')->with(compact('pegarCliente'));
       
    }
}
