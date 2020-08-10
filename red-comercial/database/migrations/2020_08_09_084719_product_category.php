<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductCategory extends Migration{
    
    public function up(){
        Schema::create('product_category', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('title',100)->default()->nullable();
            $table->string('url',150)->default()->nullable();
            $table->integer('id_media')->default()->nullable();
            $table->integer('id_lang')->default()->nullable();
            $table->boolean('status')->default(0)->nullable();

            $table->string('meta_title',100)->default()->nullable();
            $table->string('meta_description')->default()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });
    }

    public function down(){
        Schema::dropIfExists('product_category');
    }
}
