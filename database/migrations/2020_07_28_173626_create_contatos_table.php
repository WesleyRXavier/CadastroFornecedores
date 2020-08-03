<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->unique();
            $table->smallInteger('status');
            $table->integer('id_fornecedor')->unsigned();
            $table->timestamps();
            $table->foreign('id_fornecedor')->references('id')->on('fornecedores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contatos');
    }
}
