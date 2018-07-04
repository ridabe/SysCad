<?php
namespace App\Modules\General\DbProdutos\Models;
use Illuminate\Database\Eloquent\Model;

class DbProdutos extends Model
{
    protected $table    = "db_produtos";
    protected $fillable = ['id','codint','ean','nomeprod','descricao','codforn','precocusto','precovenda','sessao','quantidade','status1','created_at','updated_at'];



}