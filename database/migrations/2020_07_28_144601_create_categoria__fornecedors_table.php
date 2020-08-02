<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaFornecedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_fornecedor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_fornecedor')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->timestamps();
            $table->foreign('id_fornecedor')->references('id')->on('fornecedores')->onDelete('cascade');;
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_fornecedor');
    }
}
