<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('nombres', 30);            
            $table->string('apellidos', 30);
            $table->string('email',72)->unique();
            $table->string('password',72);
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('sexo',['H', 'M']);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 10);
            $table->boolean('estatus_confirmacion')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::hasTable('users');
        Schema::dropIfExists('users');
    }
}
