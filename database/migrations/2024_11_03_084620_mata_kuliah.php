<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MataKuliah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->char('id_matkul', 6)->primary(); // Primary key with char(6) type
            $table->char('semester', 1); // Example additional column
            $table->string('fakultas', 50); // Example additional column
            $table->string('nama', 50); // Example additional column
            $table->tinyInteger('sks')->unsigned();

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
        Schema::dropIfExists('mata_kuliah');
        Schema::dropIfExists('mata_kuliah');
    }
}
