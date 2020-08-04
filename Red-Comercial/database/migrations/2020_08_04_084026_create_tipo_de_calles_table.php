<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoDeCallesTable extends Migration{
    public function up()
    {
        Schema::create('tipo_de_calles', function (Blueprint $table) {
            $table->tinyInteger('id',2);
            $table->string('nombre',20);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_de_calles');
    }
}
