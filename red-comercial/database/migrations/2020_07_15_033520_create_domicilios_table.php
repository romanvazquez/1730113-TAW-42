<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->increments('id')->unsigned()->autoIncrement();
            $table->tinyInteger('id_estado')->lenght(2);
            $table->smallInteger('id_municipio')->lenght(4);
            $table->mediumInteger('id_localidad')->lenght(6);
            $table->string('codigo_postal',6);
            $table->tinyInteger('id_tipo_calle')->lenght(2);

            $table->string('calle',40);
            $table->string('num_exterior',5);
            $table->string('num_interior',5)->nullable();
            $table->decimal('latitud', 18, 15);
            $table->decimal('longitud', 18, 15);
            $table->integer('id_empresa');

            $table->foreign('id_estado')->references('id')->on('estados')->constrained()->onDelete('cascade');
            $table->foreign('id_municipio')->references('id')->on('municipios')->constrained()->onDelete('cascade');
            $table->foreign('id_localidad')->references('id')->on('localidades')->constrained()->onDelete('cascade');
            $table->foreign('id_empresa')->references('id')->on('empresas')->constrained()->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domicilios');
    }
}
