<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration{

    public function up(){
        
        Schema::create('post', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('title',100)->nullable();
            $table->string('url',150)->nullable();
            $table->longText('content')->nullable();
            
            $table->integer('id_media')->nullable();
            $table->tinyInteger('id_author')->nullable();
            
            $table->boolean('published')->default(0)->nullable();
            $table->date('post_date')->nullable()->useCurrent();
            $table->string('meta_title',100)->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });
    }

    public function down(){
        Schema::dropIfExists('post');
    }
}
