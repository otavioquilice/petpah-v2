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
        Schema::create('ongs', function (Blueprint $table) {
            
            $table->id();
            $table->string('uuid')->unique();
            $table->boolean('ativo')->nullable();
            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('cnpj');
            $table->string('estatuto_social');
            $table->string('nome_representante_legal');
            $table->string('email_representante_legal');
            $table->string('telefone_representante_legal');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ongs');
    }
};
