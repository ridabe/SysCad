<?php
namespace App\Modules\General\DbProdutos\Repositories;
use App\Modules\General\DbProdutos\Models\DbProdutos;
use App\Modules\General\DbProdutos\Repositories\DbProdutosSearchRepository;

use Illuminate\Http\Request;

class DbProdutosRepository
{
    private $dbprodutosSearchRepository;
    function __construct(DbProdutosSearchRepository $dbprodutosSearchRepository){
        $this->dbprodutosSearchRepository = $dbprodutosSearchRepository;
    }

    public function index(Request $request){
        return $this->dbprodutosSearchRepository->search(DbProdutos::with([""]), $request);
    }

    public function show($id){
    	return DbProdutos::where(["id"=>$id])->first();
    }

     public function showProdutos($ean){
        return DbProdutos::where(["ean"=>$ean])->first();
    }

    public function store($request){
        $data = [
            "codint"=>$request->codint,
            "ean"=>$request->ean,
            "nomeprod"=>$request->nomeprod,
            "descricao"=>$request->descricao,
            "codforn"=>$request->codforn,
            "precocusto"=>$request->precocusto,
            "precovenda"=>$request->precovenda,
            "sessao"=>$request->sessao,
            "quantidade"=>$request->quantidade,
            "status1"=>$request->status1,
        ];
    	return DbProdutos::create($data);
    }

    public function update($request, $id){
        $data = [
            "codint"=>$request->codint,
            "ean"=>$request->ean,
            "nomeprod"=>$request->nomeprod,
            "descricao"=>$request->descricao,
            "codforn"=>$request->codforn,
            "precocusto"=>$request->precocusto,
            "precovenda"=>$request->precovenda,
            "sessao"=>$request->sessao,
            "quantidade"=>$request->quantidade,
            "status1"=>$request->status1,
        ];
    	return DbProdutos::where(["id"=>$id])->update($data);
    }

    public function destroy($id){
    	return DbProdutos::where(["id"=>$id])->delete();
    }

}