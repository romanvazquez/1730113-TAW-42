<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTable extends Migration{
    
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->tinyInteger('id',2);
            $table->string('nombre',32);
            $table->string('codigo',6);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
