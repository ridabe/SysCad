<?php
namespace App\Modules\General\DbProdutos\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\General\DbProdutos\Repositories\DbProdutosRepository;

class DbProdutosController extends Controller
{
    private $dbprodutosRepository;
    function __construct(DbProdutosRepository $dbprodutosRepository ){
        $this->dbprodutosRepository = $dbprodutosRepository;
    }


    public function index(Request $request){
        try {
            $data =  $this->dbprodutosRepository->index($request);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 401);
        }
    }



    public function showProdutos($ean){
                       
                

        try {
            $data = $this->dbprodutosRepository->showProdutos($ean);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

    public function show($id){
        try {
            $data = $this->dbprodutosRepository->show($id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }
/*
    public function store(Request $request){
        try {
            $data = $this->dbprodutosRepository->store($request);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

    public function update(Request $request, $id){
        try {
            $data = $this->dbprodutosRepository->update($request, $id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

    public function destroy($id){
        try {
            $data = $this->dbprodutosRepository->destroy($id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }
*/
}