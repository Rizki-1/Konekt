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
        Schema::create('barangpenjuals', function (Blueprint $table) {
            $table->id();
            $table->string('namamenu');
            $table->string('keterangan_makanan');
            $table->foreignId('nama_toko')->constrained('penjuallogins')->onUpdate('cascade');
            $table->string('toko_id');
            $table->foreignId('kategori_id')->constrained('adminkategoris')->cascadeOnDelete();
            $table->string('harga');
            $table->string('fotomakanan');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangpenjuals');
    }
};
