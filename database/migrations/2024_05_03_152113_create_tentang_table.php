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
        Schema::create('tentang', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('judul');
            $table->text('tentang_kami');
            $table->string('alamat');
            $table->string('telephone');
            $table->string('email');
            $table->string('gmap');
            $table->string('img');
            $table->text('visi');
            $table->string('imgvisi');
            $table->text('misi');
            $table->string('imgmisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang');
    }
};
