<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductCategoryAssign extends Migration{

    public function up(){
        Schema::create('product_category_assign', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_product')->default()->nullable();
            $table->integer('id_category')->default()->nullable();

            $table->integer('id_lang')->default()->nullable();

            $table->foreign('id_product')->references('id')->on('product')->constrained()->onDelete('cascade');
            $table->foreign('id_category')->references('id')->on('product_category')->constrained()->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });
    }

    public function down(){
        Schema::dropIfExists('product_category_assign');
    }
}
