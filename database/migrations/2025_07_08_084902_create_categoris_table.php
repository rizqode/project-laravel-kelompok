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
        Schema::create('categoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // ← WAJIB!
            $table->string('foto_path')->nullable(); // ← untuk simpan path gambarnya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoris');
    }
};
