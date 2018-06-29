<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codint')->nullable();
            $table->integer('ean');
            $table->string('nomeprod');
            $table->string('descricao');
            $table->string('codforn')->nullable();
            $table->float('precocusto',8,2);
            $table->float('precovenda',8,2);
            $table->string('sessao')->nullable();
             $table->string('quantidade');
            $table->string('status1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('db_produtos');
    }
}
