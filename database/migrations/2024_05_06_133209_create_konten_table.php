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
        Schema::create('konten', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug');
            $table->longText('ringkas');
            $table->longText('isi');
            $table->string('img');
            $table->string('vidio')->nullable();
            $table->longText('keyword');
            $table->string('status');
            $table->integer('views');
            $table->integer('type');
            $table->foreignId('kategori_id')->references('id')->on('kategori')->index()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konten');
    }
};
