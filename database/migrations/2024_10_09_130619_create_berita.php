<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->text('isi_p')->nullable();
            $table->date('tanggal');
            $table->foreignId('kategori_id')->constrained('kategori_berita')->onDelete('cascade');
            $table->string('kategori_nama');
            $table->integer('views')->default(0);
            $table->string('gambar');
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->string('author');
            $table->string('img_slider')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};