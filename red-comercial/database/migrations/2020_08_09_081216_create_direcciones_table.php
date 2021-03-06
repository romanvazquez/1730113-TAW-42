<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration{
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->tinyInteger('id_estado')->lenght(2);
            $table->smallInteger('id_municipio')->lenght(4);
            $table->string('colonia',60);
            $table->string('codigo_postal',6);

            $table->tinyInteger('id_tipo_calle')->lenght(2);
            $table->string('calle',40);
            $table->string('num_exterior',5);
            $table->string('num_interior',5)->nullable();
            $table->decimal('latitud', 18, 15)->nullable();
            $table->decimal('longitud', 18, 15)->nullable();
            $table->integer('id_empresa')->nullable();

            $table->foreign('id_tipo_calle')->references('id')->on('tipo_de_calles')->constrained()->onDelete('cascade');
            $table->foreign('id_estado')->references('id')->on('estados')->constrained()->onDelete('cascade');
            $table->foreign('id_municipio')->references('id')->on('municipios')->constrained()->onDelete('cascade');
            $table->foreign('id_empresa')->references('id')->on('empresas')->constrained()->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('direcciones');
    }
}
