<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertidaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certidoes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('validade');
            $table->integer('id_fornecedor')->unsigned();
            $table->integer('id_tipo')->unsigned();
            $table->string('url');
            $table->timestamps();
            $table->foreign('id_fornecedor')->references('id')->on('fornecedores')->onDelete('cascade');
            $table->foreign('id_tipo')->references('id')->on('tipo_certidoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certidoes');
    }
}
