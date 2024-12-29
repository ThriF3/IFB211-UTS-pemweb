<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('postingan', function (Blueprint $table) {
            $table->id('id_post'); // Auto Increment

            $table->char('id_praktikum', 6); // Primary key with char(6) type
            $table->foreign('id_praktikum') // Defines a foreign key
                  ->references('id_praktikum')
                  ->on('praktikum')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->string('judul', 50);
            $table->text('description')->nullable();
            $table->enum('tipe', ['modul', 'penugasan']);
            $table->date('startDate');
            $table->date('endDate')->nullable();
            $table->string('file_content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postingan');
    }
};
