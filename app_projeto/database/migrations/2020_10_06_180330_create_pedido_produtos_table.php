<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_produtos', function (Blueprint $table) {
         
          
                $table->increments('id');
                $table->integer('pedido_id')->unsigned(); 
                $table->integer('produto_id')->unsigned();  
                $table->decimal('valor',15,2)->default(0);
                $table->timestamps();
                $table->foreign('pedido_id')->references('id')->on('pedidos');
                $table->foreign('produto_id')->references('id')->on('produtos');
               
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_produtos');
    }
}
