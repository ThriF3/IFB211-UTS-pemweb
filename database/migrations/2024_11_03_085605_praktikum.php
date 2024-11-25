<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Praktikum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praktikum', function (Blueprint $table) {
            $table->char('id_praktikum', 5)->primary(); // Primary key with char(6) type

            $table->char('id_matkul', 6);
            $table->foreign('id_matkul') // Defines a foreign key
                  ->references('id_matkul')
                  ->on('mata_kuliah')
                  ->onDelete('restrict') // Cascade delete if the room is deleted
                  ->onUpdate('cascade'); // Cascade delete if the room is deleted

            $table->string('kelas', 50); // Example additional column
            

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
        Schema::dropIfExists('praktikum');
    }
}
