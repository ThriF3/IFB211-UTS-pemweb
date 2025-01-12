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
            $table->bigIncrements('id_nilai');

            $table->char('id_praktikum', 6); // Primary key with char(6) type
            $table->foreign('id_praktikum') // Defines a foreign key
                ->references('id_praktikum')
                ->on('praktikum')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->char('NRP', 9); // Primary key with char(6) type
            $table->foreign('NRP') // Defines a foreign key
                ->references('NRP')
                ->on('mahasiswa')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('id_post'); // Primary key with char(6) type
            $table->foreign('id_post') // Defines a foreign key
                ->references('id_post')
                ->on('postingan')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->char('predikat', 1)->nullable();
            $table->unsignedTinyInteger('nilai')->nullable();
            $table->string('file_content');

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
        Schema::dropIfExists('nilai');
    }
}
