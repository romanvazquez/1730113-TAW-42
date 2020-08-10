<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration{
    
    public function up(){
        Schema::create('product', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('title',100)->nullable();
            $table->string('codigo',15)->nullable();
            $table->string('url',150)->nullable();
            $table->longText('content')->nullable();
            
            $table->decimal('precio_min', 10, 3)->nullable();
            $table->decimal('precio_max', 10, 3);
            $table->boolean('en_oferta')->default(0)->nullable();
            $table->smallInteger('stock')->default(null)->nullable();
            $table->boolean('stock_status')->default(0)->nullable();
            $table->enum('rating',['1','2','3','4','5'])->nullable();
            $table->decimal('average_rating', 3, 2)->nullable();

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
        Schema::dropIfExists('product');
    }
}
