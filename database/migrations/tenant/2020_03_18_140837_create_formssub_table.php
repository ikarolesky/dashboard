<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormssubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms_sub', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('forms_id');
            $table->string('nome')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('selecione')->nullable();
            $table->string('observacao')->nullable();
            $table->string('status')->default('Atender');
            $table->timestamps();
        });

        Schema::create('forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_form');
            $table->text('conteudo1');
            $table->text('conteudo2');
            $table->text('conteudo3');
            $table->text('conteudo4');
            $table->string('url');
            $table->string('produto');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->string('whatsapp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formssub');
    }
}
