<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrudUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crud_usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('usuario');
            $table->string('email');
            $table->string('senha');
            $table->string('senha_provisoria')->nullable();
            $table->string('admin');

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
        Schema::dropIfExists('crud_usuarios');
    }
}
