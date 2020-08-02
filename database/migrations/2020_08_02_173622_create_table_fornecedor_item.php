<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFornecedorItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedor_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_fornecedor')->unsigned();
            $table->integer('id_item')->unsigned();
            $table->timestamps();
            $table->foreign('id_fornecedor')->references('id')->on('fornecedores');
            $table->foreign('id_item')->references('id')->on('items');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedor_item');
    }
}
