<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('usuario',30)->primary();
            $table->string('nombres', 30);            
            $table->string('apellidos', 30);
            $table->string('email',72)->unique();
            $table->string('password',72);
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('sexo',['H', 'M']);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 10);
            $table->enum('tipo',['Administrador','Empresario','Usuario']);
            $table->boolean('estatus_confirmacion')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
