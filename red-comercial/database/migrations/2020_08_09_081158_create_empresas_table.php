<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration{

    public function up(){
        Schema::create('empresas', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('nombre',50);
            $table->string('descripcion',80);
            $table->string('telefono',10);
            $table->enum('giro_comercio',['Productos','Servicios']);
            $table->string('palabras_clave',255);
            $table->string('logotipo',100)->nullable();
            $table->boolean('status')->default(0);
            $table->string('url')->nullable();
            
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('users')->constrained()->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('empresas');
    }
}
