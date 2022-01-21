<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('especialidad_id')->unique()->nullable();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('last_name')->nullable();
            $table->enum('rol', ['admin', 'paciente'])->default('paciente');
            $table->string('photo')->nullable();
            $table->string('telefono')->nullable();
            $table->string('password');
            $table->enum('status', ['activo', 'inactivo'])->default('inactivo');
            // $table->string('titulo_medico')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();

            // $table->foreign('especialidad_id')->references('id')->on('especialidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
