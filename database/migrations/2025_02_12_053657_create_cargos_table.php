<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('Area');
            $table->string('Roles');
            $table->string('Cargos');
            $table->string('Jefe');
            $table->unsignedBigInteger('Empleados_id');
            $table->unsignedBigInteger('jefe_id')->nullable();
            $table->boolean('presidente')->default(false);
            $table->foreign('Empleados_id')->references('id')->on('Empleados')->onDelete('cascade');
            $table->foreign('jefe_id')->references('id')->on('Empleados')->onDelete('set null');
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
        Schema::dropIfExists('cargos');
    }
}
