<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration{

    public function up(){
        Schema::create('municipios', function (Blueprint $table) {
            $table->smallInteger('id',4);
            $table->string('nombre',76);

            $table->tinyInteger('id_estado')->lenght(2);
            $table->foreign('id_estado')->references('id')->on('estados')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('municipios');
    }
}
