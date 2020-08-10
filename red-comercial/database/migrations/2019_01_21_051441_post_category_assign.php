<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostCategoryAssign extends Migration{

    public function up(){
        Schema::create('post_category_assign', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_post')->default()->nullable();
            $table->integer('id_category')->default()->nullable();
            $table->tinyInteger('id_lang')->unsigned()->default(1);

            $table->foreign('id_post')->references('id')->on('post')->constrained()->onDelete('cascade');
            $table->foreign('id_category')->references('id')->on('post_category')->constrained()->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });
    }

    public function down(){
        Schema::dropIfExists('post_category_assign');
    }
}
