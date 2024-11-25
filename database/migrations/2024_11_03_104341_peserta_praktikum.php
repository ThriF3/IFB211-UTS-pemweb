<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PesertaPraktikum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_praktikum', function (Blueprint $table) {
            $table->bigIncrements('id_peserta'); // Primary key with char(6) type

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
        Schema::dropIfExists('peserta_praktikum');
    }
}
