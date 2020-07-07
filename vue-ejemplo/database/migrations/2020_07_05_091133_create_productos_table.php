<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('productos', function (Blueprint $table) {
            $table->unsignedInteger('id', 11);
            $table->string('code_product', 10);
            $table->string('name_product', 30);
            $table->decimal('price_product', 10,2);
            $table->unsignedSmallInteger('stock')->length(6)->unsigned();
            $table->unsignedSmallInteger('id_categoria');
            $table->timestamps();

            $table->foreign('id_categoria')->references('id')->on('categorias')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
