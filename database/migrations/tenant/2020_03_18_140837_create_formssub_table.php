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
            $table->text('conteudo1')->nullable();
            $table->text('conteudo2')->nullable();
            $table->text('conteudo3')->nullable();
            $table->text('conteudo4')->nullable();
            $table->text('conteudo5')->nullable();
            $table->text('conteudo6')->nullable();
            $table->text('conteudo7')->nullable();
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
