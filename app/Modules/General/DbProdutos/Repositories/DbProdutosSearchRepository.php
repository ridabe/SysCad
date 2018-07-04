<?php
namespace App\Modules\General\DbProdutos\Repositories;
use App\Modules\General\DbProdutos\Models\DbProdutos;

use Illuminate\Http\Request;

class DbProdutosSearchRepository
{
    public function search($queryBuilder, $request){

    if ($request->id) {
        $queryBuilder->where("id","=",$request->id);
    }

    if ($request->codint) {
        $queryBuilder->where("codint","=",$request->codint);
    }

    if ($request->ean) {
        $queryBuilder->where("ean","=",$request->ean);
    }

    if ($request->nomeprod) {
        $queryBuilder->where("nomeprod","=",$request->nomeprod);
    }

    if ($request->descricao) {
        $queryBuilder->where("descricao","=",$request->descricao);
    }

    if ($request->codforn) {
        $queryBuilder->where("codforn","=",$request->codforn);
    }

    if ($request->precocusto) {
        $queryBuilder->where("precocusto","=",$request->precocusto);
    }

    if ($request->precovenda) {
        $queryBuilder->where("precovenda","=",$request->precovenda);
    }

    if ($request->sessao) {
        $queryBuilder->where("sessao","=",$request->sessao);
    }

    if ($request->quantidade) {
        $queryBuilder->where("quantidade","=",$request->quantidade);
    }

    if ($request->status1) {
        $queryBuilder->where("status1","=",$request->status1);
    }

        return $queryBuilder->paginate(($request->count) ? $request->count : 20);
    }
}