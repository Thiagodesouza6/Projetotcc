<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao');
            $table->integer('quantidade');
            $table->decimal('valor',15,2);
            $table->string('image');
            $table->string('categoria');
            $table->string('tag');
            $table->decimal('peso',15,2);
            $table->decimal('largura',15,2);
            $table->decimal('comprimento',15,2);
            $table->decimal('altura',15,2);
            $table->string('capacidade');

            $table->string('cor');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
