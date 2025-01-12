<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ruang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruang', function (Blueprint $table) {
            $table->char('id_ruang', 6)->primary(); // Primary key with char(6) type
            $table->string('lokasi', 15); // Example additional column
            $table->enum('tipe', ['lab', 'kelas']);
            $table->tinyInteger('kapasitas')->unsigned();

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
        Schema::dropIfExists('ruang');
    }
}
