<?php

namespace App\Http\Controllers\interno;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\dbFornecedor;
use App\dbClientes;
use App\dbProdutos;
use App\crud_usuario;
use Session;

class fornecedorController extends Controller
{
      

    public function index()
    {

        $admin = session('admin');


       if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
       
    }else{
        
            $dadosFornecedor =dbFornecedor::all(); 

            

        return view('interno.lista_fornecedor')->with(compact('dadosFornecedor',$dadosFornecedor))->with(compact('admin',$admin));
        }
    }

   
    public function create()
    {

        $admin = session('admin');

        if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
        //return view('login', compact('erros_bd'));
    }else{  

        return view('interno.cad_fornecedor')->with(compact('admin',$admin));
      
        }
    }

    
    public function store(Request $request)
    {
         try {


            //pagar dados de usuarios on line

       $pegarOnLine = new crud_usuario;
       $onLine = $pegarOnLine->localizaOnLine();
       $contagem = count( $onLine);

      //////////////////////////////
            $admin = session('admin');

        // Se tudo der certo...
            $cliente = new dbClientes;
             $fornecedor = new dbFornecedor;

        $fornecedor->empresa = $request->empresa;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->nomeforn = $request->nomeForn;
        $fornecedor->cidade = $request->cidadeForn;
        $fornecedor->estado = $request->ufForn;
        $fornecedor->bairro = $request->bairroForn;
        $fornecedor->rua = $request->ruaForn;
        $fornecedor->numero = $request->numRuaForn;
        $fornecedor->cep = $request->cepFornecedor;
       // $fornecedor->emailforn = $request->email;
        $fornecedor->telforn = $request->telForn;
        $fornecedor->cpfforn = $request->cpfForn;
        $fornecedor->obsforn = $request->obsForn;
        $fornecedor->save();
        
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
                 
      
 return view('interno.interno')->with(compact('confirmacao'))->with(compact('totalCli',$totalCli))->with(compact('totalForn',$totalForn))->with(compact('totalprod',$totalprod))->with(compact('admin',$admin))->with(compact('onLine',$onLine));
        

    } catch (Exception $e) {
       // report($e);

        $erros_bd = report($e);

            return view('interno.interno', compact('erros_bd'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function fornecedorShow(Request $request)//Mostrar Um unico fornecedor pelo Form
    {
       $admin = session('admin');
            $id_forn = $request->id;
            $dados =dbfornecedor::find($id_forn);
           
            // $dados = dbFornecedor::select('*')->where('id_forn', '=', $id_forn)->get();




//Validação

         if(!Session::has('chave')){
            $erros_bd = ['Voce nao tem permissão!!!'];
            return redirect('login');
            //return view('login', compact('erros_bd'));
          }
//Fim da Validação

          
            
         return view('interno.show_fornecedor')->with(compact('dados',$dados))->with(compact('admin',$admin));
          

    }

    
    public function edit($id)
    {
        $admin = session('admin');
         if(!Session::has('chave')){
                    $erros_bd = ['Voce nao tem permissão!!!'];
                    return redirect('login');
                    //return view('login', compact('erros_bd'));
                      }
            //Fim da Validação

        $dadosFornecedor =dbfornecedor::find($id); 


         return view('interno.show_fornecedor_edit')->with(compact('dadosFornecedor',$dadosFornecedor))->with(compact('admin',$admin));
    }

   
    public function update(Request $request)
    {
        $admin = session('admin');
         $cliente = new dbClientes;
             $fornecedor = new dbFornecedor;

              $id = $request->id;

        $fornecedor =dbFornecedor::find($id);

        $fornecedor->empresa = $request->empresa;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->nomeforn = $request->nomeForn;
        $fornecedor->cidade = $request->cidadeForn;
        $fornecedor->estado = $request->ufForn;
        $fornecedor->bairro = $request->bairroForn;
        $fornecedor->rua = $request->ruaForn;
        $fornecedor->numero = $request->numRuaForn;
        $fornecedor->cep = $request->cepFornecedor;
        $fornecedor->emailforn = $request->email;
        $fornecedor->telforn = $request->telForn;
        $fornecedor->cpfforn = $request->cpfForn;
        $fornecedor->obsforn = $request->obsForn;
        $fornecedor->save();
        
//Validação

         if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
        //return view('login', compact('erros_bd'));
          }
//Fim da Validação

        $confirmacao = ['Dados alterados com sucesso!!!'];

         $totalForn =dbFornecedor::count();
           $totalCli =dbClientes::count();
           $totalprod =dbprodutos::count();

           $dadosFornecedor = dbFornecedor::all();
                 
             
 return view('interno.lista_fornecedor')
 ->with(compact('confirmacao',$confirmacao))
 ->with(compact('dadosFornecedor',$dadosFornecedor))
 ->with(compact('admin',$admin));

            

       
    }

    
    public function destroy($id)
    {
        $admin = session('admin');
         //Validação

         if(!Session::has('chave')){
            $erros_bd = ['Voce nao tem permissão!!!'];
            return redirect('login');
            //return view('login', compact('erros_bd'));
          }
        //Fim da Validação
         $pegarFornecedor =dbFornecedor::find($id);
         $pegarFornecedor->delete();
         $dadosFornecedor =dbFornecedor::all();
          $confirmacao = ['Dados Apagados com sucesso!!!'];
        return view('interno.lista_fornecedor')->with (compact('confirmacao'))->with(compact('dadosFornecedor'))
        ->with(compact('admin',$admin));
       
    }

     public function imprimeFornecedor($id)//Imprimir Cliente
    {


        //Validação

         if(!Session::has('chave')){
            $erros_bd = ['Voce nao tem permissão!!!'];
            return redirect('login');
            //return view('login', compact('erros_bd'));
          }
        //Fim da Validação
         
         $pegarFornecedor =dbFornecedor::find($id);

          return \PDF::loadView('interno.imprime_fornecedor',compact('pegarFornecedor'))     
                ->stream();// Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
         
          
       //return view('interno.imprime_cliente')->with(compact('pegarCliente'));
       
    }
}
