<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->bigIncrements('id_nilai'); // Primary key, auto-incrementing

            $table->char('id_praktikum', 6); // Primary key with char(6) type
            $table->foreign('id_praktikum') // Defines a foreign key
                  ->references('id_praktikum')
                  ->on('praktikum')
                  ->onDelete('restrict') // Cascade delete if the room is deleted
                  ->onUpdate('cascade'); // Cascade delete if the room is deleted

            $table->char('NRP', 9); // Primary key with char(6) type
            $table->foreign('NRP') // Defines a foreign key
                ->references('NRP')
                ->on('mahasiswa')
                ->onDelete('restrict') // Cascade delete if the room is deleted
                ->onUpdate('cascade'); // Cascade delete if the room is deleted
            $table->char('predikat', 1); // Example additional column
            $table->unsignedTinyInteger('nilai')->nullable(); // Accepts values from 0 to 255

            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}
