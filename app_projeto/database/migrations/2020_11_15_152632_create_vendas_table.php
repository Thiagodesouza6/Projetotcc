<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('datanascimento');
            $table->string('cpf');
            $table->string('cep')->nullable();
            $table->string('ruaenumero');
            $table->string('complemento')->nullable();
            $table->string('cidade');
            $table->string('estado');
            $table->string('valortotal');
            $table->string('numerotelefone');
            $table->string('prazo')->nullable();
            $table->string('checked');
            $table->integer('venda_user_id')->unsigned(); 
            $table->timestamps();
          
            $table->foreign('venda_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
