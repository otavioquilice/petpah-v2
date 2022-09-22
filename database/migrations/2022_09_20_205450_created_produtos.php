<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->unsignedBigInteger('tipo_produto_id');
            $table->text('nome');
            $table->text('descricao');
            $table->text('codigo');
            $table->integer('quantidade');
            $table->double('preco_id');
            $table->timestamps();

            $table->foreign('tipo_produto_id')->references('id')->on('tipo_produtos');

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
};
