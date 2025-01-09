<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Peserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->char('NRP', 9)->primary(); // Primary key with char(6) type

            $table->foreignId('id_user');
            $table->foreign('id_user')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->char('nama', 50); // Example additional column
            $table->string('alamat'); // Example additional column
            $table->enum('gender', ['P', 'W']);
            $table->char('no_telp', 15); // Example additional column
            $table->char('angkatan', 4); // Example additional column
            $table->tinyInteger('total_sks')->unsigned();
            $table->char('jurusan', 50); // Example additional column
            $table->char('semester', 50); // Example additional column

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
        //
    }
}
