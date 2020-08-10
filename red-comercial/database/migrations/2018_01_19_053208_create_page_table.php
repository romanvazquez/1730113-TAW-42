<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration{

    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name',100);
            $table->longText('content')->nullable();
            $table->string('url',150)->nullable();
            
            $table->boolean('status')->default(0)->nullable();

            $table->integer('id_featured_image')->unsigned()->nullable();
            
            $table->tinyInteger('id_lang')->unsigned()->default(1);

            $table->string('meta_title',100)->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });
    }
    
    public function down(){
        Schema::dropIfExists('page');
    }
}
