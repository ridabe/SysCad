<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\hash;
use App\dbClientes;
use App\dbFornecedor;
use App\dbProdutos;
use Session;

class clienteController extends Controller
{
   
    public function index()
    {
        if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
       
    }else{

      $admin = session('admin');
        
            $dadosCliente =dbClientes::all(); 

        return view('interno.lista_cliente')->with(compact('dadosCliente',$dadosCliente))->with(compact('admin',$admin));
        }
    }

    
    public function create()//Chama a view onde tera o fromullario de cadastro
    {

       if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
        //return view('login', compact('erros_bd'));
    }else{  
      $admin = session('admin');
       return view('interno.cad_cliente')->with(compact('admin',$admin));; 
      
        }
    }

   
    public function store(Request $request) //Aqui recebe as informações do formulario
    {

         try {

        // Se tudo der certo...

             $cliente = new dbClientes;

        $cliente->nomecli = $request->nome;
        $cliente->cidade = $request->cidadeCliente;
        $cliente->estado = $request->ufCliente;
        $cliente->bairro = $request->bairroCliente;
        $cliente->rua = $request->ruaCliente;
        $cliente->numero = $request->numRuaCliente;
        $cliente->cep = $request->cepCliente;
        $cliente->emailcli = $request->emailCliente;
        $cliente->telcli = $request->telCliente;
        $cliente->cpfcli = $request->cpfCliente;
        $cliente->obscli = $request->obsCliente;
        $cliente->save();
        
//Validação

         if(!Session::has('chave')){
        $erros_bd = ['Voce nao tem permissão!!!'];
        return redirect('login');
        //return view('login', compact('erros_bd'));
          }
//Fim da Validação

          $admin = session('admin');

        $confirmacao = ['Dados Gravados com sucesso!!!'];

          $totalForn =dbFornecedor::count();
           $totalCli =dbClientes::count();
           $totalprod =dbprodutos::count();
                 
             
 return view('interno.interno')->with(compact('confirmacao'))->with(compact('totalCli',$totalCli))->with(compact('totalForn',$totalForn))->with(compact('totalprod',$totalprod))->with(compact('admin',$admin));

       

    } catch (Exception $e) {
       // report($e);

        $erros_bd = report($e);

            return view('interno.interno', compact('erros_bd'));

        }

    }

    
    public function show($id)//Mostrar Um unico Cliente pelo GET (Nao estou usando)
    {
       return dbClientes::find();
    }


    public function clienteShow(Request $request)//Mostrar Um unico Cliente pelo Form
    {
       
            $id = $request->id;
            $dados = dbClientes::find($id);


//Validação

         if(!Session::has('chave')){
            $erros_bd = ['Voce nao tem permissão!!!'];
            return redirect('login');
            //return view('login', compact('erros_bd'));
          }
//Fim da Validação
            $admin = session('admin');
         return view('interno.show_cliente')->with(compact('dados',$dados))->with(compact('admin',$admin));
          

    }
   

    public function edit($id)//Mostra um form com as informações para editar
    {
            //Validação

                     if(!Session::has('chave')){
                    $erros_bd = ['Voce nao tem permissão!!!'];
                    return redirect('login');
                    //return view('login', compact('erros_bd'));
                      }
            //Fim da Validação

                      $admin = session('admin');

        $dadosCliente =dbClientes::find($id); 

         return view('interno.show_cliente_edit')->with(compact('dadosCliente',$dadosCliente))->with(compact('admin',$admin));

    }

    
    public function update(Request $request)//Atuaiza os dados
    {


        //Validação

             if(!Session::has('chave')){
            $erros_bd = ['Voce nao tem permissão!!!'];
            return redirect('login');
            //return view('login', compact('erros_bd'));
              }
        //Fim da Validação


        $id = $request->id;

        $dadosCliente =dbClientes::find($id);

        //Atualizar
        $dadosCliente->nomecli = $request->nome;
        $dadosCliente->cidade = $request->cidadeCliente;
        $dadosCliente->estado = $request->ufCliente;
        $dadosCliente->bairro = $request->bairroCliente;
        $dadosCliente->rua = $request->ruaCliente;
        $dadosCliente->numero = $request->numRuaCliente;
        $dadosCliente->cep = $request->cepCliente;
        $dadosCliente->emailcli = $request->emailCliente;
        $dadosCliente->telcli = $request->telCliente;
        $dadosCliente->cpfcli = $request->cpfCliente;
        $dadosCliente->obscli = $request->obsCliente;
        $dadosCliente->save(); 

            $confirmacao = ['Dados Atualizados com sucesso!!!'];

            $totalForn =dbFornecedor::count();
           $totalCli =dbClientes::count();
           $totalprod =dbProdutos::count();
           $dadosCliente =dbClientes::all(); 
             $admin = session('admin');    
             
 return view('interno.lista_cliente')->with(compact('confirmacao'))->with(compact('dadosCliente',$dadosCliente))->with(compact('admin',$admin));


            

       
    }

    
    public function destroy($id)//Deleta os dados
    {


        //Validação

         if(!Session::has('chave')){
            $erros_bd = ['Voce nao tem permissão!!!'];
            return redirect('login');
            //return view('login', compact('erros_bd'));
          }
        //Fim da Validação
         $pegarCliente =dbClientes::find($id);
         $pegarCliente->delete();
         $dadosCliente =dbClientes::all();

         $admin = session('admin');

          $confirmacao = ['Dados Apagados com sucesso!!!'];
          
        return view('interno.lista_cliente')->with (compact('confirmacao'))->with(compact('dadosCliente'))->with(compact('admin',$admin));
       
    }


     public function imprimeCliente($id)//Imprimir Cliente
    {


        //Validação

         if(!Session::has('chave')){
            $erros_bd = ['Voce nao tem permissão!!!'];
            return redirect('login');
            //return view('login', compact('erros_bd'));
          }
        //Fim da Validação
         
         $pegarCliente =dbClientes::find($id);

          return \PDF::loadView('interno.imprime_cliente',compact('pegarCliente'))     
                ->stream();// Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
         
          
       //return view('interno.imprime_cliente')->with(compact('pegarCliente'));
       
    }
}
