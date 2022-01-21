<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('description');


            $table->string('sala_meet_cita')->nullable();
            $table->enum('estado', ['rechazado', 'aceptado']);
            $table->timestamps();

            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete('set null');
            $table->foreignId('medico_id')->nullable()->constrained('medicos')->nullOnDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
