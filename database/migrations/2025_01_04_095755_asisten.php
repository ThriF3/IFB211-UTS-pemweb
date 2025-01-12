<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asisten', function (Blueprint $table) {
            $table->char('NRP', 9)->primary(); // Primary key with char(6) type

            $table->foreignId('id_user'); // Primary key with char(6) type
            $table->foreign('id_user') // Defines a foreign key
                ->references('id')
                ->on('users')
                ->onDelete('restrict') // Cascade delete if the room is deleted
                ->onUpdate('cascade'); // Cascade delete if the room is deleted

            $table->char('id_praktikum', 6); // Primary key with char(6) type
            $table->foreign('id_praktikum') // Defines a foreign key
                ->references('id_praktikum')
                ->on('praktikum')
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
};
