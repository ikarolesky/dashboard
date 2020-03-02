<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->default(1);
            $table->integer('6digitos');
            $table->string('tipo');
            $table->float('saldo', 10, 2);
            $table->unsignedInteger('cartao_ciclo_id');
            $table->unsignedInteger('cartao_banco_id');
            $table->timestamps();
        });

        Schema::create('cartao_ciclo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->float('ciclo', 10, 2);
        });

        Schema::create('cartao_banco', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartao');
    }
}
