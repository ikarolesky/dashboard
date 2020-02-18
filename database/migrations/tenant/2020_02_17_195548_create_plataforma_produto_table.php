<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlataformaProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plataforma_produto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_key');
            $table->string('basic_authentication');
            $table->unsignedInteger('product_id');
            $table->timestamps();
            $table->unsignedInteger('plataforma_id');
            $table->string('codigo_produto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plataforma_produto');
    }
}
