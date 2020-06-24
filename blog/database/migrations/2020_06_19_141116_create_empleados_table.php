<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 30);
            $table->string('apellidos', 30);
            $table->string('cedula', 30);
            $table->string('email', 50)->unique();
            $table->string('lugar_nacimiento', 30);
            $table->enum('sexo',['masculino', 'femenino']);
            $table->enum('estado_civil',['soltero', 'casado']);
            $table->string('telefono',10);
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
        Schema::dropIfExists('empleados');
    }
}
