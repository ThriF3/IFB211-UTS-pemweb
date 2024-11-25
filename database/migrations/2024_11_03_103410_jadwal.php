<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->char('id_jadwal', 6)->primary(); // Primary key with char(6) type

            $table->char('id_praktikum', 6); // Primary key with char(6) type
            $table->foreign('id_praktikum') // Defines a foreign key
                  ->references('id_praktikum')
                  ->on('praktikum')
                  ->onDelete('restrict') // Cascade delete if the room is deleted
                  ->onUpdate('cascade'); // Cascade delete if the room is deleted

            $table->char('id_ruang', 6); // Primary key with char(6) type
            $table->foreign('id_ruang') // Defines a foreign key
                ->references('id_ruang')
                ->on('ruang')
                ->onDelete('restrict') // Cascade delete if the room is deleted
                ->onUpdate('cascade'); // Cascade delete if the room is deleted

            $table->string('hari', 50); // Example additional column
            $table->time('waktu'); // Example additional column
            

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
        Schema::dropIfExists('jadwal');
    }
}
